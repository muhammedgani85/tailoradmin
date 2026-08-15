<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\State;
use App\Models\District;
use App\Models\Measurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemTrack;
use App\Models\Workflow;
use App\Models\OrderImage;
use App\Models\stage;
use App\Models\Tailors;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Log;

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

//dd($req->all());
    DB::beginTransaction();

    try {

        // 🔥 Generate Order No
        $last = Order::latest()->first();
        $next = $last ? intval(substr($last->order_no, 2)) + 1 : 1;
        $orderNo = 'OR'.str_pad($next, 3, '0', STR_PAD_LEFT);

       // $delivery_date = null;
        if($req->delivery_date){
             $delivery_date = $req->delivery_date;
        } else {
            /* $deliverydate = DB::table('delivery_dates')->where('status', 'active')->orderBy('id', 'asc')->first();


            $delivery_date = now()->addDays($deliverydate->days + 5)->format('Y-m-d'); */
            $delivery_date = $req->delivery_date;

        }
         Log::info('Calculated Delivery Date: '.$delivery_date);


         if(!$req->delivery_date){
            throw new \Exception('No active delivery date found');
        }



        // 🔥 Create Order
        $order = Order::create([
            'order_no' => $orderNo,
            'customer_id' => $req->customer_id,
            'phone' => $req->phone,
            'order_date' => now(),
            'delivery_date' => date('Y-m-d',strtotime($req->delivery_date)),
            'status' => 'Order Received',
            'created_by' => 1
        ]);

        // 🔥 Get all workflow stages
        $stages = stage::orderBy('id')->where('id',3)->get();

        //Log::info('Workflow Stages Retrieved: '.dd($stages));

        // 🔥 Loop items

        foreach($req->items as $index => $item){

            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'item_no' => $orderNo.'-'.($index+1),
                'type_id' => $item['type_id'],
                'measurements' => $item['measurements'],
                'notes' => $item['correctionnotes'] ?? null,
                'urgent' => filter_var($item['urgent'] ?? false,FILTER_VALIDATE_BOOLEAN),

            ]);

            // 🔥 Loop stages
                foreach($stages as $stage){

                if($stage->name == 'Washing' && empty($item['washing'])){
                continue;
                }
                $hasWashing = filter_var(
                    $item['washing'] ?? false,
                    FILTER_VALIDATE_BOOLEAN
                );

                log::info('Processing Item: '.$orderItem->item_no.', Stage: '.$stage->name.', Washing Required: '.($hasWashing ? 'Yes' : 'No'));

                $stage_id = $hasWashing ? 2 : $stage->id;

                $role_id = $hasWashing ? 1 : $stage->role_id;
                Log::info('Processing Stage: '.$stage->name.', Role ID: '.$role_id.', Type ID: '.$item['type_id'].', Stage ID: '.$stage_id);
                $assignedUser = $this->assignUser(
                $role_id,

                $item['type_id'],
                $stage_id,

                );

                OrderItemTrack::create([
                'order_item_id' => $orderItem->id,
                'stage_id' => $stage_id,
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

        // ✅ get mime type
        preg_match(
            '/^data:image\/(\w+);base64,/',
            $img['src'],
            $matches
        );

        // ✅ extension
        $extension = $matches[1] ?? 'png';

        // ✅ remove header
        $image = preg_replace(
            '/^data:image\/\w+;base64,/',
            '',
            $img['src']
        );

        $image = base64_decode($image);

        // ✅ filename
        $fileName = 'order_'
            .time().'_'
            .Str::random(5)
            .'.'.$extension;

        // ✅ save
        file_put_contents(
            $path.'/'.$fileName,
            $image
        );

        // ✅ insert
        OrderImage::create([

            'order_id' => $order->id,

            'image_path' => 'uploads/'.$fileName
        ]);
    }
}

        DB::commit();

        return response()->json([
            'success'=>true,
            'message'=>'Order Created Successfully',
            'order_id' => $order->id,
            'order_no' => $order->order_no

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
    Log::info('TEST LOG WORKING');
    Log::info('Assigning User for Role ID: '.$role_id.', Type ID: '.$type_id.', Stage ID: '.$stage_id);
    $tailors = DB::table('tailor_types as tt')
        ->join('tailors as u', 'u.id', '=', 'tt.tailor_id')
        ->where('u.roles', $role_id)
        ->where('tt.type_id', $type_id)
        ->where('u.status', 'active')
        ->select('u.id as user_id', 'tt.qty as capacity')
        ->get();


        Log::info('Tailors Found: '.count($tailors));

    if($tailors->isEmpty()){
        return null;
    }

    $withCapacity = [];
    $withoutCapacity = [];




    foreach($tailors as $t){
        if($t->capacity > 0){
            $withCapacity[] = $t;
        } else {
            $withoutCapacity[] = $t;
        }
    }
    Log::info('With Capacity: '.count($withCapacity).', Without Capacity: '.count($withoutCapacity));

    // ✅ STEP 1: HANDLE CAPACITY USERS
    $selectedUser = null;
    $minLoad = PHP_INT_MAX;

    foreach($withCapacity as $t){

        $load = DB::table('order_item_tracks')
            ->where('assigned_to', $t->user_id)
            ->where('stage_id', $stage_id)
             ->whereIn('status', ['pending', 'in_progress'])
            ->count();

        if($load < $t->capacity && $load < $minLoad){
            $minLoad = $load;
            $selectedUser = $t;
        }
    }

    // 👉 If found → return
    if($selectedUser){
        return $selectedUser;
    }

    // ✅ STEP 2: EQUAL DISTRIBUTION (NO CAPACITY USERS)

    $minLoad = PHP_INT_MAX;
    $selectedUser = null;

    foreach($withoutCapacity as $t){

        $load = DB::table('order_item_tracks')
            ->where('assigned_to', $t->user_id)
            ->where('stage_id', $stage_id)
             ->whereIn('status', ['pending', 'in_progress'])
            ->count();

        if($load < $minLoad){
            $minLoad = $load;
            $selectedUser = $t;
        }
    }

    //dd($selectedUser);

    return $selectedUser;
}


public function tailororder()
{
    return view('orders.tailororder', ['title' => 'Tailor Order']);

}


public function tailorwork($id, $order_no)
{
    try {

        $orders = DB::table('order_item_tracks as oit')

            ->join('order_items as oi', 'oi.id', '=', 'oit.order_item_id')

            ->join('orders as o', 'o.id', '=', 'oi.order_id')

            ->join('types as t', 't.id', '=', 'oi.type_id')

            ->join('stages as w', 'w.id', '=', 'oit.stage_id')

            ->join('tailors as u', 'u.id', '=', 'oit.assigned_to')

            ->where('oit.assigned_to', str_replace('E', '', $id))
           // ->where('oi.item_no', $order_no)
            ->whereIn('oit.status', [
                'pending',
                'in_progress'
            ])

            // ✅ urgent first
            ->orderByDesc('oi.urgent')

            // ✅ latest next
            ->orderBy('oit.id', 'desc')

            ->select(

                'oit.id as track_id',

                'oit.status',

                'oit.created_at as assigned_date',

                'oi.notes as correction_notes',

                'oi.item_no',

                'o.order_no',

                'o.order_date',

                't.type',

                'w.name as stage_name',

                'u.name as tailor_name',

                'oi.measurements',

                'oi.urgent'

            )

            ->get();

        // ✅ format measurements
        foreach($orders as $order){

            $measurements = json_decode(
                $order->measurements,
                true
            );

            $formatted = [];

            if(is_array($measurements)){

                foreach($measurements as $key => $m){

                    $master = DB::table('measurements')
                        ->where('id', $key)
                        ->first();

                    $formatted[] = [

                        'field_name'
                            => $master->field_name ?? '',

                        'display_name'
                            => $master->display_name ?? '',

                        'value'
                            => $m['value'] ?? ''
                    ];
                }
            }

            $order->measurements = $formatted;
        }

        return response()->json([

            'success' => true,

            'data' => $orders
        ]);

    } catch(\Exception $e){

        return response()->json([

            'success' => false,

            'message' => $e->getMessage()
        ]);
    }
}

public function startWork(Request $request, $id)
{

    try {
        $tailor_id = str_replace('E', '', $request->tailor_id);


        $track = OrderItemTrack::findOrFail($id);

        $track->update([
            'status' => 'in_progress',
            'assigned_to' => $tailor_id,
            'started_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Work Started'
        ]);

    } catch(\Exception $e){

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

public function completeWork($id)
{
    DB::beginTransaction();

    try {

        // ✅ current track
        $track = OrderItemTrack::find($id);



        if(!$track){

            return response()->json([
                'success' => false,
                'message' => 'Track not found'
            ]);
        }

        // ✅ mark completed
        $track->update([
            'status' => 'completed',
            'completed_at' => now()
        ]);
      // ✅ current workflow stage
        $currentStage = stage::find($track->stage_id);
        //dd($currentStage->id);

        if(!$currentStage){

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Current workflow stage not found'
            ]);
        }


        // ✅ order_no validation
        if(is_null($currentStage->id)){

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Workflow order_no missing'
            ]);
        }

        // ✅ get next workflow
        $nextStage = stage::where(
                'id',
                '>',
                $currentStage->id
            )
            ->orderBy('id', 'asc')
            ->first();

        // ✅ if no next stage
        if(!$nextStage){

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order Fully Completed'
            ]);
        }

        // ✅ current order item
        $orderItem = OrderItem::find($track->order_item_id);

        if(!$orderItem){

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Order item not found'
            ]);
        }

        // ✅ skip washing if not required
        if(
            strtolower($nextStage->name) == 'washing'
            &&
            empty($orderItem->washing)
        ){

            $nextStage = stage::where(
                    'id',
                    '>',
                    $nextStage->id
                )
                ->orderBy('id', 'asc')
                ->first();
        }

        // ✅ assign user
        $assignedUser = $this->assignUser(
            $nextStage->role_id,
            $orderItem->type_id,
            $nextStage->id

        );

        // ✅ insert next stage
        OrderItemTrack::create([

            'order_item_id' => $track->order_item_id,

            'stage_id' => $nextStage->id,

            'assigned_to' => $assignedUser?->user_id,

            'status' => 'pending',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Moved To Next Stage'
        ]);

    } catch(\Exception $e){

        DB::rollBack();

        \Log::error($e);

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

public function orderList(Request $request)
{
    $query = Order::with([

        'customer',

        'items.tracks.stage',

        'items.tracks.tailor',

        'items.type'

    ]);

    // ✅ customer filter
    if($request->customer_phone){

        $query->where(
            'phone',
            $request->customer_phone
        );
    }

    if($request->order_id){

        $query->where(
            'order_no',
            $request->order_id
        );
    }

    if($request->customer_id){

        $query->where(
            'customer_id',
            $request->customer_id
        );
    }

    // ✅ due filter
    if($request->due){

        if($request->due == 'today'){

            $query->whereDate(
                'delivery_date',
                today()
            );
        }

        if($request->due == 'tomorrow'){

            $query->whereDate(
                'delivery_date',
                today()->addDay()
            );
        }

        if($request->due == 'week'){

            $query->whereBetween(

                'delivery_date',

                [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]
            );
        }

        if($request->due == 'month'){

            $query->whereMonth(
                'delivery_date',
                now()->month
            );
        }
    }

    // ✅ date range
    if($request->from_date && $request->to_date){

        $query->whereBetween(

            'delivery_date',

            [
                $request->from_date,
                $request->to_date
            ]
        );
    }

    // ✅ status filter
    if($request->status){

        $query->whereHas(

            'items.tracks',

            function($q) use ($request){

                $q->where(
                    'status',
                    $request->status
                );
            }
        );
    }

    $orders = $query

        ->latest()

        ->get();

    // ✅ append counts
    foreach($orders as $order){

        $inProgress = 0;

        $completed = 0;

        foreach($order->items as $item){

            foreach($item->tracks as $track){

                if($track->status == 'in_progress'){

                    $inProgress++;
                }

                if($track->status == 'ready for delivery'){

                    $completed++;
                }
            }
        }

        $order->in_progress_count = $inProgress;

        $order->completed_count = $completed;
    }

    // ✅ totals
    $totalInProgress = $orders->sum(
        'in_progress_count'
    );

    $totalCompleted = $orders->sum(
        'completed_count'
    );

    // ✅ dropdown customers
    $customers = Customer::whereIn(

        'id',

        Order::select('customer_id')
            ->distinct()

    )

    ->orderBy('name')

    ->get();



    // ✅ dropdown statuses
    $statuses = DB::table('order_item_tracks')
        ->select('status')
        ->distinct()
        ->pluck('status');

    return view(

        'orders.orderlist',

        compact(

            'orders',

            'customers',

            'statuses',

            'totalInProgress',

            'totalCompleted'
        )
    );
}

public function getStageTailors($trackId)
{
    try {

        $track = OrderItemTrack::findOrFail($trackId);

        $orderItem = OrderItem::findOrFail(
            $track->order_item_id
        );

        // ✅ current stage
        $stageId = $track->stage_id;

        // ✅ get stage
        $stage = Stage::find($stageId);

        // ✅ users for same role + type
        $tailors = DB::table('tailor_types as tt')

            ->join('tailors as t', 't.id', '=', 'tt.tailor_id')

            ->where('t.roles', $stage->role_id)

            ->where('tt.type_id', $orderItem->type_id)

            ->where('t.status', 'active')

            ->select(
                't.id',
                't.name'
            )

            ->get();

        $data = [];

        foreach($tailors as $t){

            $total = OrderItemTrack::where(
                    'assigned_to',
                    $t->id
                )
                ->count();

            $pending = OrderItemTrack::where(
                    'assigned_to',
                    $t->id
                )
                ->where('status', 'pending')
                ->count();

            $inProgress = OrderItemTrack::where(
                    'assigned_to',
                    $t->id
                )
                ->where('status', 'in_progress')
                ->count();

            $data[] = [

                'id' => $t->id,

                'name' => $t->name,

                'total' => $total,

                'pending' => $pending,

                'in_progress' => $inProgress
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    } catch(\Exception $e){

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}


public function reassignTailor(Request $request)
{
    try {

        OrderItemTrack::where('id', $request->track_id)

            ->update([

                'assigned_to' => $request->tailor_id
            ]);

        return response()->json([

            'success' => true,

            'message' => 'Reassigned Successfully'
        ]);

    } catch(\Exception $e){

        return response()->json([

            'success' => false,

            'message' => $e->getMessage()
        ]);
    }
}

public function getOrderImages($id)
{
    try {

        $images = OrderImage::where(
                'order_id',
                $id
            )
            ->get();

        return response()->json([
            'success' => true,
            'data' => $images->map(function($img){

        return [

            'id' => $img->id,

            'image_path' => $img->image_path

        ];
    })
        ]);

    } catch(\Exception $e){

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

public function printDetails($id)
{
    try {

        $order = Order::with([

            'customer',

            'items.type',

            'items.tracks.stage',

            'items.tracks.tailor'

        ])->find($id);

        // ✅ order not found
        if(!$order){

            return response()->json([

                'success' => false,

                'message' => 'Order not found'

            ]);
        }

        // ✅ format measurements
        foreach($order->items as $item){

            $measurements = $item->measurements;

            $formattedMeasurements = [];

            // ✅ if array
            if(is_array($measurements)){

                foreach($measurements as $key => $m){

                    // 👉 measurement master
                    $master = Measurement::find($key);

                    $formattedMeasurements[] = [

                        'id' => $key,

                        // ✅ always from DB
                        'field_name'
                            => $master->field_name ?? '',

                        'display_name'
                            => $master->display_name ?? '',

                        // ✅ value from order
                        'value'
                            => $m['value'] ?? ''

                    ];
                }
            }

            // 👉 replace
            $item->formatted_measurements
                = $formattedMeasurements;
        }

        return response()->json([

            'success' => true,

            'data' => $order

        ]);

    } catch(\Exception $e){

        return response()->json([

            'success' => false,

            'message' => $e->getMessage()

        ]);
    }
}




public function deliveryList(Request $request)
{
    $query = Order::with([

        'customer',

        'items.tracks.stage',

        'items.tracks.tailor',

        'items.type'

    ])

    // ✅ only completed + stage 12
    ->whereHas(

        'items.tracks',

        function($q){

            $q->whereRaw(
                    'LOWER(status) = ?',
                    ['completed']
                )

                ->where(
                    'stage_id',
                    12
                );
        }
    );

    $orders = $query

        ->latest()

        ->get();

    // ✅ ready count
    foreach($orders as $order){

        $ready = 0;

        foreach($order->items as $item){

            foreach($item->tracks as $track){

                if(

                    strtolower(trim($track->status))
                        == 'completed'

                    &&

                    $track->stage_id == 12

                ){

                    $ready++;
                }
            }
        }

        $order->ready_count = $ready;
    }

    // ✅ total ready
    $totalReady = $orders->sum(
        'ready_count'
    );

    // ✅ metrics
    $totalInProgress = 0;

    $totalCompleted = 0;

    // ✅ statuses
    $statuses = DB::table('order_item_tracks')

        ->select('status')

        ->whereRaw(
            'LOWER(status) = ?',
            ['completed']
        )

        ->where(
            'stage_id',
            12
        )

        ->distinct()

        ->pluck('status');

    // ✅ customers
    $customers = Customer::whereIn(

            'id',

            Order::whereHas(

                'items.tracks',

                function($q){

                    $q->whereRaw(
                            'LOWER(status) = ?',
                            ['completed']
                        )

                        ->where(
                            'stage_id',
                            12
                        );
                }

            )->select('customer_id')

        )

        ->orderBy('name')

        ->get();

    return view(

        'delivery.deliverylist',

        compact(

            'orders',

            'customers',

            'totalReady',

            'statuses',

            'totalInProgress',

            'totalCompleted'
        )
    );
}




}
