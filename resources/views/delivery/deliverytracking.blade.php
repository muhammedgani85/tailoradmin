<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Tracking</title>
<script src="https://cdn.tailwindcss.com"></script>

<style>
html, body {
    height: 100%;
    overflow-y: auto;
}
</style>

</head>

<body class="bg-gray-100 min-h-screen overflow-y-auto scroll-smooth">

<!-- HEADER -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-4 text-center text-lg font-semibold rounded-b-2xl">
    Order Tracking
</div>

<!-- SEARCH -->
<div class="p-4">
    <div class="bg-white rounded-xl shadow p-3 flex gap-2">
        <input type="text" placeholder="Enter Mobile Number"
            class="flex-1 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-200">
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
            Track
        </button>
    </div>
</div>

<!-- ORDER LIST -->
<div class="px-4 space-y-4 pb-20">

    <!-- ================= ORDER 1 ================= -->
    <div class="bg-white rounded-2xl shadow p-4">

        <div class="flex justify-between items-center">
            <div>
                <h3 class="font-semibold text-gray-800">ORD001</h3>
                <p class="text-xs text-gray-500">Est Delivery: 08 Apr 2026</p>
            </div>

            <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                Ready
            </span>
        </div>

        <!-- TRACKER -->
        <div class="mt-5 relative">

            <div class="absolute top-4 left-0 w-full h-1 bg-gray-300"></div>

            <div class="absolute top-4 left-0 h-1 bg-blue-500 transition-all duration-500"
                style="width: 66%;"></div>

            <div class="flex justify-between">

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center text-xs">✓</div>
                    <p class="text-xs mt-1">Placed</p>
                </div>

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center text-xs">✓</div>
                    <p class="text-xs mt-1">In Progress</p>
                </div>

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs">3</div>
                    <p class="text-xs mt-1">Ready</p>
                </div>

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-xs">4</div>
                    <p class="text-xs mt-1">Delivered</p>
                </div>

            </div>
        </div>

        <button onclick="toggleDetails(this)"
            class="mt-4 text-blue-600 text-sm font-medium">
            View Details ▼
        </button>

        <div class="hidden mt-4 border-t pt-3 space-y-2">

            <div class="flex justify-between text-sm">
                <span>ORD001-1 (Shirt)</span>
                <span class="text-yellow-600">Stitching</span>
            </div>

            <div class="flex justify-between text-sm">
                <span>ORD001-2 (Pant)</span>
                <span class="text-green-600">Ready</span>
            </div>

        </div>

    </div>

    <!-- ================= ORDER 2 ================= -->
    <div class="bg-white rounded-2xl shadow p-4">

        <div class="flex justify-between items-center">
            <div>
                <h3 class="font-semibold text-gray-800">ORD002</h3>
                <p class="text-xs text-gray-500">Est Delivery: 10 Apr 2026</p>
            </div>

            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                In Progress
            </span>
        </div>

        <!-- TRACKER -->
        <div class="mt-5 relative">

            <div class="absolute top-4 left-0 w-full h-1 bg-gray-300"></div>

            <div class="absolute top-4 left-0 h-1 bg-yellow-400 transition-all duration-500"
                style="width: 33%;"></div>

            <div class="flex justify-between">

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center text-xs">✓</div>
                    <p class="text-xs mt-1">Placed</p>
                </div>

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-yellow-400 text-white rounded-full flex items-center justify-center text-xs">2</div>
                    <p class="text-xs mt-1">In Progress</p>
                </div>

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-xs">3</div>
                    <p class="text-xs mt-1">Ready</p>
                </div>

                <div class="flex flex-col items-center z-10">
                    <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center text-xs">4</div>
                    <p class="text-xs mt-1">Delivered</p>
                </div>

            </div>
        </div>

        <button onclick="toggleDetails(this)"
            class="mt-4 text-blue-600 text-sm font-medium">
            View Details ▼
        </button>

        <div class="hidden mt-4 border-t pt-3 space-y-2">

            <div class="flex justify-between text-sm">
                <span>ORD002-1 (Shirt)</span>
                <span class="text-green-600">Delivered</span>
            </div>

            <div class="flex justify-between text-sm">
                <span>ORD002-2 (Pant)</span>
                <span class="text-red-600">Pending</span>
            </div>

        </div>

    </div>

</div>

<script>
function toggleDetails(btn) {
    let details = btn.nextElementSibling;
    details.classList.toggle('hidden');

    btn.innerText = details.classList.contains('hidden')
        ? 'View Details ▼'
        : 'Hide Details ▲';
}
</script>

</body>
</html>
