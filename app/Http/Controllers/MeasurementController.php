<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Measurement;
use App\Models\OrderItem;
use App\Models\Types;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $measurements = Measurement::with('type')
            ->latest()
            ->get();

        $types = Types::where(
                'status',
                'active'
            )
            ->get();

        return view(
            'settings.measurement.index',
            ['title' => 'Measurements'],
            compact(
                'measurements',
                'types'
            )
        );
    }

    // STORE
    public function store(Request $req)
    {
        try {

            $req->validate([

                'type_id' => 'required',

                'field_name' => 'required',

                'display_name' => 'required',

                'status' => 'required'
            ]);

            Measurement::create([

                'type_id'
                    => $req->type_id,

                'field_name'
                    => $req->field_name,

                'display_name'
                    => $req->display_name,

                'status'
                    => $req->status
            ]);

            return response()->json([

                'success' => true,

                'message'
                    => 'Measurement Created'
            ]);

        } catch(\Exception $e){

            return response()->json([

                'success' => false,

                'message'
                    => $e->getMessage()
            ]);
        }
    }

    // EDIT
    public function edit($id)
    {
        return Measurement::findOrFail($id);
    }

    // UPDATE
    public function update(Request $req, $id)
    {
        try {

            $req->validate([

                'type_id' => 'required',

                'field_name' => 'required',

                'display_name' => 'required',

                'status' => 'required'
            ]);

            Measurement::findOrFail($id)
                ->update([

                    'type_id'
                        => $req->type_id,

                    'field_name'
                        => $req->field_name,

                    'display_name'
                        => $req->display_name,

                    'status'
                        => $req->status
                ]);

            return response()->json([

                'success' => true,

                'message'
                    => 'Measurement Updated'
            ]);

        } catch(\Exception $e){

            return response()->json([

                'success' => false,

                'message'
                    => $e->getMessage()
            ]);
        }
    }

    // STATUS
    public function toggleStatus(Request $req)
    {
        try {

            Measurement::where(
                'id',
                $req->id
            )->update([

                'status'
                    => $req->status
            ]);

            return response()->json([

                'success' => true
            ]);

        } catch(\Exception $e){

            return response()->json([

                'success' => false
            ]);
        }
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMeasurements($id, Request $request)
{
    try {

        // ✅ measurement fields
        $measurements = Measurement::where('type_id', $id)->where('status','active')->get();

        // ✅ latest order item
        $latestItem = OrderItem::join(
                'orders',
                'orders.id',
                '=',
                'order_items.order_id'
            )
            ->where('orders.customer_id', $request->customer_id)
            ->where('order_items.type_id', $id)
            ->select('order_items.measurements')
            ->latest('order_items.id')
            ->first();

        $oldMeasurements = [];

        // ✅ already array
        if($latestItem && $latestItem->measurements){

            $oldMeasurements = $latestItem->measurements;
        }

        // ✅ append old values
        $data = $measurements->map(function($m) use ($oldMeasurements){

            return [

                'id' => $m->id,

                'field_name' => $m->field_name,
                'display_name' => $m->display_name,

                'value' => $oldMeasurements[$m->id]['value']
                    ?? ''

            ];
        });

        return response()->json($data);

    } catch(\Exception $e){

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}
}
