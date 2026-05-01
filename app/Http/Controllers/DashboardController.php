<?php

namespace App\Http\Controllers;

use App\Models\Workflow;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function taskkanban()
    {
        $stages = Workflow::orderBy('order_id','asc')
    ->pluck('name')
    ->mapWithKeys(function($name){
        return [$name => 5]; // same value
    })
    ->toArray();
        return view('pages.taskkanban', ['title' => 'Kanban'], compact('stages'));
    }
}
