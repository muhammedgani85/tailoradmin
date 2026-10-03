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
                'required',
                'string',
                'max:20',
            ],
        ]);

        $phone = trim($validated['phone']);

        $orders = Order::query()
            ->where('phone', $phone)
            ->with([
                'customer',
                'items.type',
                'items.tracks.stage',
                'items.tracks.tailor',
            ])
            ->latest('id')
            ->get();

        if ($orders->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No orders found for this mobile number.',
                'orders' => [],
            ], 404);
        }

        $stages = stage::where('status', 'active')
            ->orderBy('id')
            ->get(['id', 'name']);

        $result = $orders->map(function ($order) use ($stages) {

            $timeline = [];

            foreach ($stages as $stage) {

                $tracks = $order->items
                    ->flatMap(function ($item) {
                        return $item->tracks;
                    })
                    ->filter(function ($track) use ($stage) {
                        return (int) $track->stage_id === (int) $stage->id;
                    })
                    ->values();

                $completedTracks = $tracks
                    ->filter(function ($track) {
                        return strtolower((string) $track->status) === 'completed';
                    });

                $hasTrack = $tracks->isNotEmpty();

                $allCompleted = $hasTrack
                    && $completedTracks->count() === $tracks->count();

                $hasPending = $tracks->contains(function ($track) {
                    return strtolower((string) $track->status) !== 'completed';
                });

                $firstTrack = $tracks->sortBy(function ($track) {
                    return $track->started_at ?? $track->created_at;
                })->first();

                $lastTrack = $tracks->sortByDesc(function ($track) {
                    return $track->completed_at
                        ?? $track->updated_at
                        ?? $track->created_at;
                })->first();

                $timeline[] = [
                    'id' => $stage->id,
                    'name' => $stage->name,
                    'exists' => $hasTrack,
                    'completed' => $allCompleted,
                    'current' => $hasTrack && $hasPending,
                    'start_date' => $firstTrack?->started_at
                    ? \Carbon\Carbon::parse($firstTrack->started_at)->format('d-m-Y')
                    : null,

                    'end_date' => $lastTrack?->completed_at
                    ? \Carbon\Carbon::parse($lastTrack->completed_at)->format('d-m-Y')
                    : null,
                    'status' => $allCompleted
                        ? 'Completed'
                        : ($hasTrack ? 'In Progress' : 'Not Started'),
                ];
            }

            /*
             * Current stage = first stage which exists and is not completed.
             * If every existing stage is completed, use Ready for Delivery
             * when that stage exists.
             */
            $currentIndex = collect($timeline)
                ->search(function ($stage) {
                    return $stage['exists'] && !$stage['completed'];
                });

            if ($currentIndex === false) {
                $currentIndex = collect($timeline)
                    ->search(function ($stage) {
                        return $stage['exists'];
                    });
            }

            $status = 'In Progress';

            $lastStage = collect($timeline)->last();

            if ($lastStage && $lastStage['exists'] && $lastStage['completed']) {
                $status = 'Ready for Delivery';
            }

            return [
                'id' => $order->id,
                'order_no' => $order->order_no,
                'phone' => $order->phone,
                'customer' => $order->customer?->name,
                'order_date' => $order->order_date
                    ? \Carbon\Carbon::parse($order->order_date)->format('d-m-Y')
                    : null,
                'delivery_date' => $order->delivery_date
                    ? \Carbon\Carbon::parse($order->delivery_date)->format('d-m-Y')
                    : null,
                'status' => $status,
                'current_index' => $currentIndex,
                'stages' => $timeline,
                'items' => $order->items->map(function ($item) {
                    return [
                        'item_no' => $item->item_no,
                        'type' => $item->type?->type,
                        'qty' => $item->qty,
                    ];
                })->values(),
            ];
        })->values();

        return response()->json([
            'success' => true,
            'orders' => $result,
        ]);
    }
}
