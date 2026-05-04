<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemTrack;
use App\Models\Workflow;
use App\Models\OrderImage;
use App\Models\stage;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


public function store(Request $req)
{
    DB::beginTransaction();

    try {

        // 🔥 Generate Order No
        $last = Order::latest()->first();
        $next = $last ? intval(substr($last->order_no, 2)) + 1 : 1;
        $orderNo = 'OR'.str_pad($next, 3, '0', STR_PAD_LEFT);

        // 🔥 Create Order
        $order = Order::create([
            'order_no' => $orderNo,
            'customer_id' => $req->customer_id,
            'phone' => $req->phone,
            'order_date' => now(),
            'status' => 'Order Received',
            'created_by' => 1
        ]);

        // 🔥 Get all workflow stages
        $stages = stage::orderBy('id')->where('id',2)->get();

        // 🔥 Loop items

        foreach($req->items as $index => $item){

            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'item_no' => $orderNo.'-'.($index+1),
                'type_id' => $item['type_id'],
                'measurements' => $item['measurements'],
                'notes' => $item['correctionnotes'] ?? null
            ]);

            // 🔥 Loop stages
                foreach($stages as $stage){





                if($stage->name == 'Washing' && empty($item['washing'])){
                continue;
                }

                $assignedUser = $this->assignUser(
                $stage->role_id,
                $item['type_id'],
                $stage->id
                );

                OrderItemTrack::create([
                'order_item_id' => $orderItem->id,
                'stage_id' => $stage->id,
                'assigned_to' => $assignedUser?->user_id, // ✅ FIXED
                'status' => 'pending'
                ]);

                }
        }

        // 🔥 Upload folder
        $path = public_path('uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // 🔥 Save Images
        if($req->images){
            foreach($req->images as $img){

                $image = str_replace('data:image/png;base64,', '', $img['src']);
                $image = base64_decode($image);

                $fileName = 'order_'.time().'_'.Str::random(5).'.png';

                file_put_contents($path.'/'.$fileName, $image);

                OrderImage::create([
                    'order_id' => $order->id,
                    'image_path' => 'uploads/'.$fileName
                ]);
            }
        }

        DB::commit();

        return response()->json([
            'success'=>true,
            'message'=>'Order Created Successfully'
        ]);

    } catch(\Exception $e){

        DB::rollBack();

        return response()->json([
            'success'=>false,
            'message'=>$e->getMessage()
        ]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function addorder()
    {
         $city_list = City::where('status','active')->get();
          $state_list = State::where('status','active')->get();
          $district_list = District::where('status','active')->get();
        return view('orders.addorder', ['title' => 'Add Order'],compact('city_list','state_list','district_list'));
    }


    private function assignUser($role_id, $type_id, $stage_id)
{
    $tailors = DB::table('tailor_types as tt')
        ->join('tailors as u', 'u.id', '=', 'tt.tailor_id')
        ->where('u.roles', $role_id)
        ->where('tt.type_id', $type_id) // 👈 KEY LINE
        ->where('u.status', 'active')
        ->select('u.id as user_id', 'tt.qty as capacity')
        ->get();

    if($tailors->isEmpty()){
        return null;
    }

    $selectedUser = null;
    $minLoad = PHP_INT_MAX;

    foreach($tailors as $t){


        $load = DB::table('order_item_tracks')
            ->where('assigned_to', $t->user_id)
            ->where('stage_id', $stage_id)
            ->where('status','pending')
            ->count();

        if($t->capacity > 0){

            if($load < $t->capacity && $load < $minLoad){
                $minLoad = $load;
                $selectedUser = $t;
            }

        } else {
            if($load < $minLoad){
                $minLoad = $load;
                $selectedUser = $t;
            }
        }
    }

    return $selectedUser;
}
}
