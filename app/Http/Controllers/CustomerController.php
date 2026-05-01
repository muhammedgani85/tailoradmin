<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\City;
use App\Models\State;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // 🔹 LIST
    public function index()
    {
        try {
          $customer = Customer::where('status','active')->latest('id')->paginate(10);
          $customercount = Customer::get(); // 👈 for export, remove pagination
          $city_list = City::where('status','active')->get();
          $state_list = State::where('status','active')->get();
          $district_list = District::where('status','active')->get();
              return view('customers.customerlist', ['title' => 'Customer List'],compact('customer','customercount','city_list','state_list','district_list'));

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch customers',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 STORE
   public function store(Request $req)
{
    try {

        // 🔥 VALIDATION
        $req->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        // 🔥 DUPLICATE PHONE CHECK
        $exists = Customer::where('phone', $req->phone)->exists();

            if($exists){
            return response()->json([
            'success' => false,
            'message' => 'Phone number already exists'
            ]);
            }

        // ✅ INSERT
        Customer::create([
            'name' => $req->name,
            'dob' => $req->dob,
            'phone' => $req->phone,
            'state' => $req->state,
            'city' => $req->city,
            'district' => $req->district,
            'address' => $req->address,
            'status' => 'active',
            'created_by' => 1, //auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Customer saved successfully'
        ]);

    } catch(\Exception $e){

        return response()->json([
            'success' => false,
            'message' => 'Insert failed',
            'error' => $e->getMessage()
        ]);
    }
}

    // 🔹 EDIT
    public function edit($id)
    {
        try {

            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Customer not found'
                ]);
            }

            return response()->json($customer);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching customer',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 UPDATE
    public function update(Request $req, $id)
    {
        try {

            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Customer not found'
                ]);
            }

            // 🔥 duplicate phone check (exclude current)
            $exists = Customer::where('phone', $req->phone)
                        ->where('id', '!=', $id)
                        ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Phone number already exists'
                ]);
            }

            $customer->update([
                'name' => $req->name,
                'dob' => $req->dob,
                'phone' => $req->phone,
                'state' => $req->state,
                'city' => $req->city,
                'district' => $req->district,
                'address' => $req->address,
                'updated_by' => auth()->id(),
                'date' => $req->date
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Customer updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Update failed',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 DELETE (SOFT DELETE)
    public function destroy($id)
    {
        try {

            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Customer not found'
                ]);
            }

            $customer->delete();

            return response()->json([
                'success' => true,
                'message' => 'Customer deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Delete failed',
                'error' => $e->getMessage()
            ]);
        }
    }

    // 🔹 TOGGLE STATUS (optional)



    public function toggleStatus(Request $req)
{
    try {

        $customer = Customer::find($req->id);

        if(!$customer){
            return response()->json([
                'success' => false,
                'message' => 'Customer not found'
            ]);
        }

        // 🔄 TOGGLE
        $customer->status = $customer->status == 'active' ? 'inactive' : 'active';
        $customer->save();

        return response()->json([
            'success' => true,
            'message' => 'Status changed to ' . $customer->status
        ]);

    } catch(\Exception $e){
        return response()->json([
            'success' => false,
            'message' => 'Update failed'
        ]);
    }
}

public function search(Request $req)
{
    try {

        $customers = Customer::where('phone', 'like', '%'.$req->phone.'%')
            ->get();

        return response()->json($customers);

    } catch(\Exception $e){

        return response()->json([]);
    }
}

public function newstore(Request $req)
{
    DB::beginTransaction();



    try {

        // 🔥 find existing family
        $existing = Customer::where('phone',$req->phone)->first();

        $family_id = $existing ? $existing->family_id : $req->id;

        // if first person → create new family_id
        if(!$family_id){
            $family_id = Customer::max('id') + 1; // simple group id
        }

        Customer::create([
            'name' => $req->name,
            'relation' => $req->relation,
            'family_id' => $family_id,
            'phone' => $req->phone,
            'state' => $req->state ? $req->state : $existing->stage,
            'city' => $req->city ? $req->city : $existing->city,
            'district' => $req->district ? $req->district : $existing->district,
            'address' => $req->address ? $req->address : $existing->address,
            'status' => 'active',
            'created_by' => 1
        ]);

        DB::commit();

        return response()->json([
            'success'=>true,
            'message'=>'Saved successfully'
        ]);

    } catch(\Exception $e){

        DB::rollBack();

        return response()->json([
            'success'=>false,
            'message'=>$e->getMessage()
        ]);
    }
}



}
