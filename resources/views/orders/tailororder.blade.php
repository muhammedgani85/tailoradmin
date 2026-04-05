<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tailor Work Tracking</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<!-- HEADER -->
<div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white p-4 rounded-b-2xl shadow text-center">

    <img src="/logo.png" class="w-10 h-10 mx-auto mb-2 rounded-full">

    <h1 class="text-lg font-bold">Mohan Tailoring</h1>
    <p class="text-xs opacity-90">Cumbum</p>
    <p class="text-xs opacity-90">📞 +91 98765 43210</p>

</div>

<!-- SEARCH -->
<div class="p-4">
    <div class="bg-white rounded-xl shadow p-3 flex gap-2">
        <input type="text" id="tailorId"
            placeholder="Enter Tailor ID"
            class="flex-1 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-200">

        <button onclick="loadOrders()"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
            Load
        </button>
    </div>
</div>

<!-- ORDER LIST -->
<div id="orderList" class="px-4 space-y-4 pb-20">

    <!-- ORDER CARD -->
    <div class="bg-white rounded-2xl shadow p-4">

        <div class="flex justify-between items-center">
            <div>
                <h3 class="font-semibold text-gray-800">ORD001-1</h3>
                <p class="text-xs text-gray-500">Order Date: 04 Apr 2026</p>
                <p class="text-xs text-gray-500">Assigned: 05 Apr 2026</p>
            </div>

            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">
                Assigned
            </span>
        </div>

        <!-- ACTION -->
        <div class="mt-4 flex justify-end">
            <button onclick="startWork(this)"
                class="px-3 py-1 text-sm bg-green-600 text-white rounded-lg">
                Start
            </button>
        </div>

    </div>

    <!-- ORDER CARD -->
    <div class="bg-white rounded-2xl shadow p-4">

        <div class="flex justify-between items-center">
            <div>
                <h3 class="font-semibold text-gray-800">ORD001-2</h3>
                <p class="text-xs text-gray-500">Order Date: 04 Apr 2026</p>
                <p class="text-xs text-gray-500">Assigned: 05 Apr 2026</p>
            </div>

            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                In Progress
            </span>
        </div>

        <!-- ACTION -->
        <div class="mt-4 flex justify-end">
            <button onclick="stopWork(this)"
                class="px-3 py-1 text-sm bg-red-600 text-white rounded-lg">
                Stop
            </button>
        </div>

    </div>

    <!-- ORDER CARD -->
    <div class="bg-white rounded-2xl shadow p-4">

        <div class="flex justify-between items-center">
            <div>
                <h3 class="font-semibold text-gray-800">ORD002-1</h3>
                <p class="text-xs text-gray-500">Order Date: 05 Apr 2026</p>
                <p class="text-xs text-gray-500">Assigned: 06 Apr 2026</p>
            </div>

            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                Completed
            </span>
        </div>

        <!-- ACTION -->
        <div class="mt-4 flex justify-end">
            <button disabled
                class="px-3 py-1 text-sm bg-gray-300 text-gray-600 rounded-lg cursor-not-allowed">
                Done
            </button>
        </div>

    </div>

</div>

<!-- JS -->
<script>

// simulate load
function loadOrders() {
    let id = document.getElementById('tailorId').value;

    if (!id) {
        alert('Enter Tailor ID');
        return;
    }

    console.log("Load orders for:", id);
}

// START
function startWork(btn) {
    let card = btn.closest('div.bg-white');

    let status = card.querySelector('span');
    status.innerHTML = "In Progress";
    status.className = "px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700";

    btn.innerText = "Stop";
    btn.className = "px-3 py-1 text-sm bg-red-600 text-white rounded-lg";
    btn.setAttribute("onclick", "stopWork(this)");
}

// STOP
function stopWork(btn) {
    let card = btn.closest('div.bg-white');

    let status = card.querySelector('span');
    status.innerHTML = "Completed";
    status.className = "px-2 py-1 text-xs rounded-full bg-green-100 text-green-700";

    btn.innerText = "Done";
    btn.className = "px-3 py-1 text-sm bg-gray-300 text-gray-600 rounded-lg";
    btn.disabled = true;
}

</script>

</body>
</html>
