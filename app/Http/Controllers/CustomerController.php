<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // 🔹 LIST
    public function index()
    {
        try {
           $customer = Customer::latest()->where('status','active')->orderby('id','desc')->paginate(10); // 👈 10 per page
            $customercount = Customer::get(); // 👈 for export, remove pagination
              return view('customers.customerlist', ['title' => 'Customer List'],compact('customer','customercount'));

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

            $req->validate([
                'name' => 'required|max:255',
                'phone' => 'required'
            ]);

            // 🔥 duplicate phone check
            $exists = Customer::where('phone', $req->phone)->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Phone number already exists'
                ]);
            }

            Customer::create([
                'name' => $req->name,
                'dob' => $req->dob,
                'phone' => $req->phone,
                'state' => $req->state,
                'city' => $req->city,
                'district' => $req->district,
                'address' => $req->address,
                'created_by' => auth()->id(),
                'date' => $req->date
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Customer created successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Create failed',
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

            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Customer not found'
                ]);
            }

            $customer->status = $customer->status == 'active' ? 'inactive' : 'active';
            $customer->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Status update failed',
                'error' => $e->getMessage()
            ]);
        }
    }
}
