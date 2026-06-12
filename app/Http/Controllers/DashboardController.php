<?php

namespace App\Http\Controllers;

use App\Models\stage;
use App\Models\State;
use App\Models\Workflow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function taskkanban_bkp()

    {
     $stages = stage::orderBy('order_id','asc')
    ->pluck('name')
    ->mapWithKeys(function($name){
        return [$name => 5]; // same value
    })
    ->toArray();
        return view('pages.taskkanban', ['title' => 'Kanban'], compact('stages'));
    }

public function  taskkanban(Request $request)
{
   $workflows = stage::orderBy('id')->get();

    $board = [];

    // ✅ Date Range Filter
    $fromDate = null;
    $toDate = null;

    if($request->filled('delivery_date')){

        $dates = explode(' to ', $request->delivery_date);

        $fromDate = $dates[0] ?? null;

        $toDate = $dates[1] ?? $dates[0];
    }

    foreach($workflows as $workflow){

        $items = DB::table('order_item_tracks as oit')

            ->join('order_items as oi', 'oi.id', '=', 'oit.order_item_id')
            ->join('orders as o', 'o.id', '=', 'oi.order_id')
            ->join('types as t', 't.id', '=', 'oi.type_id')
            ->leftJoin('tailors as u', 'u.id', '=', 'oit.assigned_to')

            ->where('oit.stage_id', $workflow->id)

            ->whereIn(
                'oit.status',
                ['pending', 'in_progress']
            )

            // ✅ Delivery Date Filter
            ->when(
                $fromDate && $toDate,
                function($query) use ($fromDate, $toDate){

                    $query->whereBetween(
                        'o.delivery_date',
                        [
                            $fromDate,
                            $toDate
                        ]
                    );
                }
            )

            // ✅ urgent first
            ->orderByDesc('oi.urgent')

            // ✅ in progress first
            ->orderByRaw("
                CASE
                    WHEN oit.status = 'in_progress' THEN 0
                    WHEN oit.status = 'pending' THEN 1
                    ELSE 2
                END
            ")

            // ✅ oldest first
            ->orderBy('oit.created_at', 'asc')

            ->select(

                'oit.id as track_id',
                'oit.status',

                'oit.created_at',
                'oit.started_at',

                'oi.item_no',
                'oi.notes',
                'oi.urgent',

                'o.order_no',
                'o.delivery_date',

                't.type',

                'u.name as tailor_name'

            )

            ->get();

        $board[] = [

            'stage' => $workflow,

            'items' => $items

        ];
    }

   return view('pages.taskkanban', ['title' => 'Kanban'], compact('board'));
    //return view('orders.kanban', compact('board'));
}



}
