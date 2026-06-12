@extends('layouts.app')

@section('content')

<div class="p-5">

    <!-- 🔷 HEADER + DATE FILTER -->
    <div class="flex flex-wrap justify-between items-center mb-6 gap-4">

    <!-- LEFT -->
    <div class="flex items-center gap-4">

        <div>

            <h2 class="text-xl font-semibold text-gray-800">
                Production Board
            </h2>

            <p class="text-sm text-gray-500">
                Manage tailoring workflow
            </p>

        </div>

        <!-- DATE FILTER -->
        <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 text-gray-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

            </svg>

            <input
                type="text"
                id="delivery_date"
                value="{{ request('delivery_date') }}"
                placeholder="Select Date Range"
                class="bg-transparent border-0 focus:ring-0 text-sm w-56">

            <button
                type="button"
                id="clearDateFilter"
                class="px-2 py-1 text-xs bg-red-500 text-white rounded">

                Clear

            </button>

        </div>

    </div>

</div>

    <!-- 🧩 KANBAN BOARD -->
    <div class="flex gap-6 min-w-[1250px]">

@foreach($board as $column)

<div class="w-[420px] bg-white border rounded-2xl p-4 flex flex-col h-[85vh]">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-4" style="width: 180px !important;">

        <h3 class="font-semibold text-md">
            {{ $column['stage']->name }}
            ({{ count($column['items']) }})
        </h3>

        <span class="text-gray-400">⋯</span>
    </div>

    {{-- CARDS --}}
    <div class="space-y-4 overflow-y-auto pr-2">

        @forelse($column['items'] as $item)

        @php

           $days = number_format(
    \Carbon\Carbon::parse($item->created_at)
        ->floatDiffInDays(now()),
    2
);

            $isDelayed = $days > 2;

        @endphp

        <div class="p-4 rounded-xl shadow-sm border

    {{
        $item->urgent == 1 && $isDelayed

        ? 'bg-red-100 border-red-500 text-red-700'

        : (

            $item->urgent == 1

            ? 'bg-red-50 border-red-400 text-red-700'

            : (

                $isDelayed

                ? 'bg-amber-50 border-amber-400 text-amber-700'

                : 'bg-white border-gray-200'

            )

        )
    }}">



            {{-- TYPE --}}
            <div class="flex flex-col">

    <p class="font-semibold text-gray-800" style="font-size: 10px !important;">
        {{ $item->type }}  {{ ($item->urgent == 1) ? '(Urgent)' : ''}}
    </p>

    <p class="text-xs text-gray-400 mt-1">
        {{ $item->order_no }}
    </p>

</div>

            {{-- ORDER --}}
            <p class="text-xs text-gray-500 mt-2">
                Order : {{ $item->item_no }}
            </p>

            {{-- TAILOR --}}
            <p class="text-xs text-gray-500 mt-1">
                👤 {{ $item->tailor_name ?? 'Unassigned' }}
            </p>

             <p class="text-xs text-gray-500 mt-1 flatpickr-input active:bg-transparent">
                 O.Dt :{{ date('d-m-Y',strtotime($item->created_at)) ?? 'Unassigned' }}
            </p>
            <p class="text-xs text-gray-500 mt-1 flatpickr-input active:bg-transparent">
                 Agn.Dt :{{ ($item->created_at!=NULL)? date('d-m-y H:i',strtotime($item->created_at)) : 'Not Start' }}
            </p>
            <p class="text-xs text-gray-500 mt-1 flatpickr-input active:bg-transparent">
                 St.Dt :{{ ($item->started_at!=NULL)? date('d-m-y H:i',strtotime($item->started_at)) : 'Not Start' }}
            </p>
           <p class="text-xs text-gray-500 mt-1 flatpickr-input active:bg-transparent">Dly.Dt : {{ ($item->delivery_date && $item->delivery_date != '0000-00-00' && $item->delivery_date != '0000-00-00 00:00:00') ? date('d-m-y', strtotime($item->delivery_date)) : 'Not Assigned' }}</p>

            {{-- NOTES --}}
            <!-- @if($item->notes)
            <div class="mt-2 text-xs text-gray-600 bg-gray-50 p-2 rounded">
                {{ $item->notes }}
            </div>
            @endif -->

            {{-- FOOTER --}}
            <div class="flex justify-between items-center mt-3">

                {{-- DELAY --}}
                @if($isDelayed)

                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">
                    {{ $days }} days
                </span>

                @endif

                {{-- ACTION --}}
                <button
    onclick="moveNextStage({{ $item->track_id }})"

    class="text-xs text-white px-3 py-1 rounded

    {{
        $item->status == 'pending'

        ? 'bg-blue-500 hover:bg-blue-600'

        : (

            $item->status == 'in_progress'

            ? 'bg-green-500 hover:bg-green-600'

            : 'bg-gray-500 hover:bg-gray-600'

        )
    }}">

    {{ ucfirst(str_replace('_', ' ', $item->status)) }}

</button>

            </div>

        </div>

        @empty

        <div class="text-center text-sm text-gray-400 py-10">
            No Items
        </div>

        @endforelse

    </div>

</div>

@endforeach

</div>

</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

flatpickr("#delivery_date", {

    mode: "range",

    dateFormat: "Y-m-d",

    defaultDate: "{{ request('delivery_date') }}"
        ? "{{ request('delivery_date') }}".split(' to ')
        : null,

    onClose: function(selectedDates, dateStr){

        if(selectedDates.length == 2){

            window.location.href =
                "{{ route('taskkanban') }}" +
                "?delivery_date=" +
                encodeURIComponent(dateStr);
        }
    }

});

// ✅ Clear Filter
$(document).on('click', '#clearDateFilter', function(){

    window.location.href =
        "{{ route('taskkanban') }}";

});

</script>

@endsection
