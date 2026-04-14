@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Blank Page" />

<div class="rounded-2xl border border-gray-200 bg-white p-6 max-w-sm">

    <h3 class="text-lg font-semibold text-gray-800 mb-6">
        Order Status
    </h3>

    <div class="relative">

        <!-- 🔥 FULL CONNECTED LINE -->
        <div class="absolute left-5 top-0 bottom-0 w-[2px] bg-gray-300"></div>

        <!-- STEP -->
        <div class="relative mb-6 flex items-start gap-4">

            <!-- CIRCLE -->
            <div class="relative z-10 mt-2">
                <div class="w-4 h-4 bg-green-500 rounded-full"></div>
            </div>

            <!-- CARD -->
            <div class="flex-1 bg-white border rounded-xl p-4 shadow-sm">

                <p class="font-medium text-gray-800">Placed</p>
                <p class="text-xs text-gray-400">Completed</p>

                <div class="mt-2 text-xs text-gray-600 space-y-1">
                    <p><strong>Tailor:</strong> -</p>
                    <p><strong>Start:</strong> 12 Apr</p>
                    <p><strong>End:</strong> 12 Apr</p>
                </div>

            </div>

        </div>

        <!-- STEP -->
        <div class="relative mb-6 flex items-start gap-4">

            <div class="relative z-10 mt-2">
                <div class="w-4 h-4 bg-green-500 rounded-full"></div>
            </div>

            <div class="flex-1 bg-white border rounded-xl p-4 shadow-sm">

                <p class="font-medium text-gray-800">In Progress</p>
                <p class="text-xs text-gray-400">Completed</p>

                <div class="mt-2 text-xs text-gray-600 space-y-1">
                    <p><strong>Tailor:</strong> Ravi</p>
                    <p><strong>Start:</strong> 13 Apr</p>
                    <p><strong>End:</strong> 14 Apr</p>
                </div>

            </div>

        </div>

        <!-- CURRENT -->
        <div class="relative mb-6 flex items-start gap-4">

            <div class="relative z-10 mt-2">
                <div class="w-4 h-4 border-2 border-blue-500 bg-white rounded-full"></div>
            </div>

            <div class="flex-1 bg-blue-50 border border-blue-200 rounded-xl p-4 shadow-sm">

                <p class="font-medium text-gray-800">Ready</p>
                <p class="text-xs text-blue-500">In Progress</p>

                <div class="mt-2 text-xs text-gray-600 space-y-1">
                    <p><strong>Tailor:</strong> Kumar</p>
                    <p><strong>Start:</strong> 15 Apr</p>
                    <p><strong>End:</strong> -</p>
                </div>

                <!-- PROGRESS BAR -->
                <div class="mt-3 w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width:70%"></div>
                </div>

            </div>

        </div>

        <!-- STEP -->
        <div class="relative mb-6 flex items-start gap-4">

            <div class="relative z-10 mt-2">
                <div class="w-4 h-4 border-2 border-gray-400 rounded-full bg-white"></div>
            </div>

            <div class="flex-1 bg-white border rounded-xl p-4 shadow-sm">

                <p class="font-medium text-gray-500">Delivered</p>
                <p class="text-xs text-gray-400">Pending</p>

                <div class="mt-2 text-xs text-gray-400 space-y-1">
                    <p><strong>Tailor:</strong> -</p>
                    <p><strong>Start:</strong> -</p>
                    <p><strong>End:</strong> -</p>
                </div>

            </div>

        </div>

    </div>

</div>
<script>
function toggleStep(el) {
    let content = el.querySelector(".hidden");
    let arrow = el.querySelector("span:last-child");

    if (content) {
        content.classList.toggle("hidden");
        arrow.classList.toggle("rotate-180");
    }
}
</script>
@endsection
