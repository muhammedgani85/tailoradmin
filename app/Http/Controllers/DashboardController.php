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

public function  taskkanban()
{
    $workflows = stage::orderBy('id')->get();

    $board = [];

    foreach($workflows as $workflow){

        $items = DB::table('order_item_tracks as oit')
            ->join('order_items as oi', 'oi.id', '=', 'oit.order_item_id')
            ->join('orders as o', 'o.id', '=', 'oi.order_id')
            ->join('types as t', 't.id', '=', 'oi.type_id')
            ->leftJoin('tailors as u', 'u.id', '=', 'oit.assigned_to')

            ->where('oit.stage_id', $workflow->id)
            ->where('oit.status', 'pending')

            ->select(
                'oit.id as track_id',
                'oit.status',
                'oit.created_at',

                'oi.item_no',
                'oi.notes',

                'o.order_no',

                't.type',

                'u.name as tailor_name'
            )
            ->get();

        $board[] = [
            'stage' => $workflow,
            'items' => $items
        ];
    }
   // dd($board);

   return view('pages.taskkanban', ['title' => 'Kanban'], compact('board'));
    //return view('orders.kanban', compact('board'));
}



}
