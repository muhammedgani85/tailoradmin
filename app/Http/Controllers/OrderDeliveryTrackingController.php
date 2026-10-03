<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\stage;
use App\Models\stage as ModelsStage;
use Illuminate\Http\Request;

class OrderDeliveryTrackingController extends Controller
{
    public function index()
    {
        $stages = stage::where('status', 'active')
            ->orderBy('id')
            ->get(['id', 'name']);

        return view('delivery.delivery-tracking', compact('stages'));
    }

    /**
     * Find orders using the customer/order phone number
     * and build the stage timeline from order_item_tracks.
     */
 public function track(Request $request)
{
    $validated = $request->validate([
        'phone' => [
            'nullable',
            'string',
            'max:20',
        ],

        'order_no' => [
            'nullable',
            'string',
            'max:50',
        ],
    ]);

    $phone = trim($validated['phone'] ?? '');
    $orderNo = trim($validated['order_no'] ?? '');

    /*
    |--------------------------------------------------------------------------
    | At least one search value required
    |--------------------------------------------------------------------------
    */
    if ($phone === '' && $orderNo === '') {

        return response()->json([
            'success' => false,
            'message' => 'Please enter mobile number or order number.',
            'orders' => [],
        ], 422);
    }


    /*
    |--------------------------------------------------------------------------
    | Find Orders
    |--------------------------------------------------------------------------
    |
    | Search by:
    | 1. Mobile number
    | 2. Order number
    |
    |--------------------------------------------------------------------------
    */

    $query = Order::query();


    if ($phone !== '') {

        $query->where('phone', $phone);

    }


    if ($orderNo !== '') {

        $query->where('order_no', $orderNo);

    }


    /*
    |--------------------------------------------------------------------------
    | Load Order + Items + Individual Item Tracks
    |--------------------------------------------------------------------------
    */

    $orders = $query
        ->with([
            'customer',
            'items.type',
            'items.tracks.stage',
            'items.tracks.tailor',
        ])
        ->latest('id')
        ->get();


    /*
    |--------------------------------------------------------------------------
    | No Orders
    |--------------------------------------------------------------------------
    */

    if ($orders->isEmpty()) {

        return response()->json([
            'success' => false,

            'message' => $orderNo !== ''
                ? 'No order found for order number: ' . $orderNo
                : 'No orders found for this mobile number.',

            'orders' => [],
        ], 404);
    }


    /*
    |--------------------------------------------------------------------------
    | Active Stages
    |--------------------------------------------------------------------------
    */

    $stages = Stage::where('status', 'active')
        ->orderBy('id')
        ->get([
            'id',
            'name'
        ]);


    /*
    |--------------------------------------------------------------------------
    | Build Orders
    |--------------------------------------------------------------------------
    */

    $result = $orders->map(function ($order) use ($stages) {


        /*
        |--------------------------------------------------------------------------
        | IMPORTANT:
        |
        | Each item gets its OWN timeline.
        |
        | OR002-1 -> own tracks
        | OR002-2 -> own tracks
        | OR002-3 -> own tracks
        |--------------------------------------------------------------------------
        */

        $items = $order->items
            ->map(function ($item) use ($stages) {


                $timeline = [];


                /*
                |--------------------------------------------------------------------------
                | Process every stage for this ITEM
                |--------------------------------------------------------------------------
                */

                foreach ($stages as $stage) {


                    /*
                    |--------------------------------------------------------------------------
                    | ONLY tracks belonging to this item
                    |--------------------------------------------------------------------------
                    */

                    $tracks = $item->tracks
                        ->filter(function ($track) use ($stage) {

                            return (int) $track->stage_id ===
                                   (int) $stage->id;

                        })
                        ->values();


                    $hasTrack = $tracks->isNotEmpty();


                    /*
                    |--------------------------------------------------------------------------
                    | Completed tracks
                    |--------------------------------------------------------------------------
                    */

                    $completedTracks = $tracks
                        ->filter(function ($track) {

                            return strtolower(
                                trim((string) $track->status)
                            ) === 'completed';

                        });


                    /*
                    |--------------------------------------------------------------------------
                    | All completed
                    |--------------------------------------------------------------------------
                    */

                    $allCompleted =
                        $hasTrack &&
                        $completedTracks->count() ===
                        $tracks->count();


                    /*
                    |--------------------------------------------------------------------------
                    | Pending / Current
                    |--------------------------------------------------------------------------
                    */

                    $hasPending = $tracks->contains(
                        function ($track) {

                            return strtolower(
                                trim((string) $track->status)
                            ) !== 'completed';

                        }
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | First Track
                    |--------------------------------------------------------------------------
                    */

                    $firstTrack = $tracks
                        ->sortBy(function ($track) {

                            return $track->started_at
                                ?? $track->created_at;

                        })
                        ->first();


                    /*
                    |--------------------------------------------------------------------------
                    | Last Track
                    |--------------------------------------------------------------------------
                    */

                    $lastTrack = $tracks
                        ->sortByDesc(function ($track) {

                            return $track->completed_at
                                ?? $track->updated_at
                                ?? $track->created_at;

                        })
                        ->first();


                    /*
                    |--------------------------------------------------------------------------
                    | Start Date
                    |--------------------------------------------------------------------------
                    */

                    $startDate = null;

                    if (
                        $firstTrack &&
                        $firstTrack->started_at
                    ) {

                        $startDate =
                            \Carbon\Carbon::parse(
                                $firstTrack->started_at
                            )->format('d-m-Y');

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | End Date
                    |--------------------------------------------------------------------------
                    */

                    $endDate = null;

                    if (
                        $lastTrack &&
                        $lastTrack->completed_at
                    ) {

                        $endDate =
                            \Carbon\Carbon::parse(
                                $lastTrack->completed_at
                            )->format('d-m-Y');

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Stage Status
                    |--------------------------------------------------------------------------
                    */

                    if ($allCompleted) {

                        $stageStatus = 'Completed';

                    } elseif ($hasTrack) {

                        $stageStatus = 'In Progress';

                    } else {

                        $stageStatus = 'Not Started';

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Timeline
                    |--------------------------------------------------------------------------
                    */

                    $timeline[] = [

                        'id' => $stage->id,

                        'name' => $stage->name,

                        'exists' => $hasTrack,

                        'completed' => $allCompleted,

                        'current' =>
                            $hasTrack &&
                            $hasPending,

                        'start_date' => $startDate,

                        'end_date' => $endDate,

                        'status' => $stageStatus,

                        'tailor' =>
                            $lastTrack?->tailor?->name,

                    ];

                }


                /*
                |--------------------------------------------------------------------------
                | Current Stage
                |--------------------------------------------------------------------------
                */

                $currentIndex = collect($timeline)
                    ->search(function ($stage) {

                        return $stage['exists'] &&
                               !$stage['completed'];

                    });


                /*
                |--------------------------------------------------------------------------
                | If all stages completed,
                | use last existing stage
                |--------------------------------------------------------------------------
                */

                if ($currentIndex === false) {

                    $currentIndex = collect($timeline)
                        ->search(function ($stage) {

                            return $stage['exists'];

                        });

                }


                /*
                |--------------------------------------------------------------------------
                | Current Stage Object
                |--------------------------------------------------------------------------
                */

                $currentStage = null;

                if ($currentIndex !== false) {

                    $currentStage =
                        $timeline[$currentIndex] ?? null;

                }


                /*
                |--------------------------------------------------------------------------
                | Item Status
                |--------------------------------------------------------------------------
                */

                $itemStatus = 'Not Started';


                if ($currentStage) {

                    if ($currentStage['completed']) {

                        $itemStatus = 'Completed';

                    } else {

                        $itemStatus = 'In Progress';

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | Check All Item Stages Completed
                |--------------------------------------------------------------------------
                */

                $existingStages = collect($timeline)
                    ->filter(function ($stage) {

                        return $stage['exists'];

                    });


                $allItemStagesCompleted =
                    $existingStages->isNotEmpty() &&
                    $existingStages->every(function ($stage) {

                        return $stage['completed'];

                    });


                if ($allItemStagesCompleted) {

                    $itemStatus =
                        'Ready for Delivery';

                }


                /*
                |--------------------------------------------------------------------------
                | Return ITEM
                |--------------------------------------------------------------------------
                */

                return [

                    'item_id' => $item->id,

                    'item_no' => $item->item_no,

                    'type' => $item->type?->type,

                    'type_id' => $item->type_id,

                    'qty' => $item->qty,

                    'status' => $itemStatus,

                    'current_index' =>
                        $currentIndex === false
                            ? null
                            : $currentIndex,

                    'current_stage' =>
                        $currentStage
                            ? $currentStage['name']
                            : null,

                    /*
                    | Individual item tracking
                    */
                    'stages' => $timeline,

                ];

            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | ORDER STATUS
        |--------------------------------------------------------------------------
        */

        $orderStatus = 'In Progress';


        if ($items->isNotEmpty()) {


            $allItemsReady = $items->every(
                function ($item) {

                    return
                        $item['status'] ===
                            'Ready for Delivery'
                        ||
                        $item['status'] ===
                            'Completed';

                }
            );


            $allItemsCompleted = $items->every(
                function ($item) {

                    return $item['status'] ===
                        'Completed';

                }
            );


            if ($allItemsReady) {

                $orderStatus =
                    'Ready for Delivery';

            } elseif ($allItemsCompleted) {

                $orderStatus =
                    'Completed';

            }

        }


        /*
        |--------------------------------------------------------------------------
        | Order Date
        |--------------------------------------------------------------------------
        */

        $orderDate = null;

        if ($order->order_date) {

            $orderDate =
                \Carbon\Carbon::parse(
                    $order->order_date
                )->format('d-m-Y');

        }


        /*
        |--------------------------------------------------------------------------
        | Delivery Date
        |--------------------------------------------------------------------------
        */

        $deliveryDate = null;

        if ($order->delivery_date) {

            $deliveryDate =
                \Carbon\Carbon::parse(
                    $order->delivery_date
                )->format('d-m-Y');

        }


        /*
        |--------------------------------------------------------------------------
        | Return ORDER
        |--------------------------------------------------------------------------
        */

        return [

            'id' => $order->id,

            'order_no' => $order->order_no,

            'phone' => $order->phone,

            'customer' =>
                $order->customer?->name,

            'order_date' => $orderDate,

            'delivery_date' => $deliveryDate,

            'status' => $orderStatus,

            /*
            | ALL items belonging to this order
            */
            'items' => $items,

        ];

    })->values();


    /*
    |--------------------------------------------------------------------------
    | Response
    |--------------------------------------------------------------------------
    */

    return response()->json([

        'success' => true,

        'orders' => $result,

    ]);
}
}
