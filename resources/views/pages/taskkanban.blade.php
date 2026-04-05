@extends('layouts.app')

@section('content')

<div class="p-5">

    <!-- 🔷 HEADER + DATE FILTER -->
    <div class="flex flex-wrap justify-between items-center mb-6 gap-4">

        <div>
            <h2 class="text-xl font-semibold text-gray-800">
                Production  Board
            </h2>
            <p class="text-sm text-gray-500">
                Manage tailoring workflow
            </p>
        </div>

        <!-- Date Filter -->
        <div class="flex items-center gap-3 bg-gray-100 hover:bg-gray-200 cursor-pointer px-4 py-2 rounded-xl">

            <!-- Calendar Icon -->
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>

            <span class="text-sm text-gray-600">
                Apr 01, 2026 - Apr 10, 2026
            </span>

            <!-- Arrow -->
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 text-gray-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7"/>
            </svg>

        </div>

    </div>

    <!-- 🧩 KANBAN BOARD -->
    <div class="w-full overflow-x-auto">
        <div class="flex gap-6 min-w-[1500px]">

            @php
                $stages = [
                    'Cutting' => 5,
                    'Stitching' => 4,
                    'Finishing' => 3,
                    'Ironing' => 2,
                    'Ready' => 4,
                    'Delivered' => 1
                ];

                $items = ['Shirt', 'Pant', 'Coat'];
                $tailors = ['Ravi', 'Kumar', 'Ali', 'John'];
                $dates = ['Today', 'Tomorrow', 'Jan 8'];
            @endphp

            @foreach($stages as $stage => $count)
            <div class="w-[280px] bg-white border rounded-2xl p-4 flex flex-col h-[80vh]">

                <!-- Column Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-md">
                        {{ $stage }} ({{ $count }})
                    </h3>
                    <span class="text-gray-400">⋯</span>
                </div>

                <!-- Cards -->
                <div class="space-y-4 overflow-y-auto pr-2">

                    @for($i = 1; $i <= $count; $i++)

                    @php
                        $isDelayed = rand(0,1);
                        $delayDays = rand(1,5);
                    @endphp

                    <div class="p-4 rounded-xl shadow-sm border
                        {{ $isDelayed ? 'bg-red-50 border-red-400' : 'bg-white border-gray-200' }}">

                        <!-- Item -->
                        <p class="font-medium">
                            {{ $items[array_rand($items)] }} - Item {{ $i }}
                        </p>

                        <!-- Order -->
                        <p class="text-xs text-gray-500 mt-2">
                            Order #ORD{{ rand(100,999) }}
                        </p>

                        <!-- Tailor -->
                        <p class="text-xs text-gray-500">
                            Tailor: {{ $tailors[array_rand($tailors)] }}
                        </p>

                        <!-- Date -->
                        <p class="text-xs mt-1
                            {{ $isDelayed ? 'text-red-600 font-semibold' : 'text-gray-500' }}">
                            📅 {{ $dates[array_rand($dates)] }}
                        </p>

                        <!-- Footer -->
                        <div class="mt-2 space-y-2">

                            <!-- Stage -->
                            <span class="text-xs px-2 py-1 rounded inline-block
                                @if($stage == 'Cutting') bg-blue-100 text-blue-600
                                @elseif($stage == 'Stitching') bg-purple-100 text-purple-600
                                @elseif($stage == 'Finishing') bg-yellow-100 text-yellow-600
                                @elseif($stage == 'Ironing') bg-pink-100 text-pink-600
                                @elseif($stage == 'Ready') bg-green-100 text-green-600
                                @else bg-gray-100 text-gray-600
                                @endif
                            ">
                                {{ $stage }}
                            </span>

                            <!-- Delay Days -->
                            @if($isDelayed)
                                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded inline-block">
                                    {{ $delayDays }} days
                                </span>
                            @endif

                        </div>

                    </div>

                    @endfor

                </div>

            </div>
            @endforeach

        </div>
    </div>

</div>

@endsection
