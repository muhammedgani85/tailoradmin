<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Measurement;
use App\Models\OrderItem;

class MeasurementController extends Controller
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
    public function store(Request $request)
    {
        //
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

    public function getMeasurements($id, Request $request)
{
    try {

        // ✅ measurement fields
        $measurements = Measurement::where('type_id', $id)->get();

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
