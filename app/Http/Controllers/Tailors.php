<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TailorsModel;
use App\Models\City;
use App\Models\State;
use App\Models\District;
use App\Models\OrderItemTrack;
use App\Models\Types;
use App\Models\UsersTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tailors extends Controller
{
     public function index(){
       /*  return view('TailorsModel.index', [
            'TailorsModel' => TailorsModel::latest()->get()
        ]); */
          $city_list = City::where('status','active')->get();
          $state_list = State::where('status','active')->get();
          $district_list = District::where('status','active')->get();
          $user_type = UsersTypeModel::where('status','active')->get();
          $types = Types::where('status','active')->get();

         $tailors = TailorsModel::with('roleType')->withSum('tailorTypes', 'qty')->latest('id')->get();

         return view('taillors.tailorlist', ['title' => 'Tailor List'],compact('tailors','city_list','state_list','district_list','user_type','types'
         ));
    }

    public function store(Request $req){
        DB::beginTransaction();
        try{

            if(TailorsModel::where('phone',$req->phone)->exists()){
                return response()->json([
                    'success'=>false,
                    'message'=>'Phone already exists'
                ]);
            }

            $tailor = TailorsModel::create([
                'name'=>$req->name,
                'phone'=>$req->phone,
                'state'=>$req->state,
                'city'=>$req->city,
                'district'=>$req->district,
                'address'=>$req->address,
                'roles'=>$req->roles
            ]);

            if($req->type){
            foreach($req->type as $type_id => $qty){

                if($qty){ // only if value entered
                    DB::table('tailor_types')->insert([
                        'tailor_id' => $tailor->id,
                        'type_id'   => $type_id,
                        'qty'       => $qty,
                        'created_at'=> now(),
                        'updated_at'=> now(),
                    ]);
                }
            }
        }
    DB::commit(); // ✅ SUCCESS
            return response()->json([
                'success'=>true,
                'message'=>'Saved successfully'
            ]);

        }catch(\Exception $e){
              DB::rollBack(); // ❌ REVERT ALL
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ]);
        }
    }

   public function edit($id){
    return TailorsModel::with('tailorTypes')->find($id);
}



public function update(Request $req, $id)
{
    DB::beginTransaction();

    try {

        // ✅ duplicate phone check
        $exists = TailorsModel::where('phone', $req->phone)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Phone already exists'
            ]);
        }

        // ✅ find tailor
        $t = TailorsModel::find($id);

        // ✅ update main table
        $t->update([
            'name'     => $req->name,
            'age'      => $req->age,
            'phone'    => $req->phone,
            'state'    => $req->state,
            'city'     => $req->city,
            'district' => $req->district,
            'address'  => $req->address,
            'roles'    => $req->roles
        ]);

        // ❌ remove old types
        DB::table('tailor_types')
            ->where('tailor_id', $id)
            ->delete();

        // ✅ insert new types (same as store)
        if ($req->type) {
            foreach ($req->type as $type_id => $qty) {

                if ($qty) {
                    DB::table('tailor_types')->insert([
                        'tailor_id' => $id,
                        'type_id'   => $type_id,
                        'qty'       => $qty,
                        'created_at'=> now(),
                        'updated_at'=> now(),
                    ]);
                }
            }
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Updated successfully'
        ]);

    } catch (\Exception $e) {

        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

    public function toggleStatus(Request $req){
        $t = TailorsModel::find($req->id);
        $t->status = $t->status=='active' ? 'inactive':'active';
        $t->save();

        return response()->json(['success'=>true]);
    }


    public function workbalance()
{
    /*
    |--------------------------------------------------------------------------
    | Active User Types
    |--------------------------------------------------------------------------
    */

    $user_type = UsersTypeModel::where('status', 'active')
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Active Types
    |--------------------------------------------------------------------------
    */

    $types = Types::where('status', 'active')
        ->orderBy('id')
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Active Tailors
    |--------------------------------------------------------------------------
    */

    $tailors = TailorsModel::with('roleType')
        ->where('status', 'active')
        ->orderBy('id')
        ->get();


    /*
    |--------------------------------------------------------------------------
    | Get Work Balance
    |
    | order_item_tracks.assigned_to
    |              ↓
    | tailors.id
    |
    | order_item_tracks.order_item_id
    |              ↓
    | order_items.id
    |
    | order_items.type_id
    |              ↓
    | types.id
    |--------------------------------------------------------------------------
    */

    $workBalance = OrderItemTrack::query()

        ->join(
            'order_items',
            'order_item_tracks.order_item_id',
            '=',
            'order_items.id'
        )

        ->whereNotNull('order_item_tracks.assigned_to')

        ->select(
            'order_item_tracks.assigned_to',
            'order_items.type_id'
        )

        ->selectRaw('COUNT(*) as total')

        ->groupBy(
            'order_item_tracks.assigned_to',
            'order_items.type_id'
        )

        ->get();


    /*
    |--------------------------------------------------------------------------
    | Convert into easy lookup
    |
    | Example:
    |
    | [
    |     tailor_id => [
    |         type_id => count
    |     ]
    | ]
    |--------------------------------------------------------------------------
    */

    $balance = [];

    foreach ($workBalance as $row) {

        $balance[$row->assigned_to][$row->type_id] =
            (int) $row->total;

    }


    return view(
        'taillors.workbalance',
        compact(
            'tailors',
            'user_type',
            'types',
            'balance'
        )
    );
}


}
