@extends('layouts.app')

@section('content')

    <div class="flex items-center justify-between mb-4 relative">

    <!-- Breadcrumb -->
    <x-common.page-breadcrumb pageTitle="Delivery" />

    <!-- Calendar Icon -->
    <button onclick="toggleDateFilter()"
        class="p-2 rounded-lg border border-gray-200 bg-white hover:bg-gray-100 shadow-sm">

        <!-- Calendar SVG -->
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M6 2V5M14 2V5M3 8H17M4 5H16C16.55 5 17 5.45 17 6V17C17 17.55 16.55 18 16 18H4C3.45 18 3 17.55 3 17V6C3 5.45 3.45 5 4 5Z"/>
        </svg>

    </button>

    <!-- DATE FILTER DROPDOWN -->
    <div id="dateFilterBox"
        class="hidden absolute right-0 top-12 bg-white border border-gray-200 rounded-xl shadow-lg p-4 w-72 z-50">

        <div class="space-y-3">

            <div>
                <label class="text-xs text-gray-500">Start Date</label>
                <input type="date"
                    class="w-full mt-1 px-3 py-2 border border-gray-200 rounded-lg text-sm">
            </div>

            <div>
                <label class="text-xs text-gray-500">End Date</label>
                <input type="date"
                    class="w-full mt-1 px-3 py-2 border border-gray-200 rounded-lg text-sm">
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button onclick="toggleDateFilter()"
                    class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg hover:bg-gray-200">
                    Cancel
                </button>

                <button
                    class="px-3 py-1.5 text-sm bg-blue-600 text-blue rounded-lg hover:bg-blue-700">
                    Apply
                </button>
            </div>

        </div>

    </div>

</div>

    <div class="space-y-6">



        <div class="rounded-2xl border border-gray-200 bg-white pt-4">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Ready for delivery
        </h3>


    </div>

    <!-- Table -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

           <table id="orderTable" class="min-w-full">
    <thead>
        <tr class="border-y">
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Order No</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Customer No</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Order Date</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Delivery Date</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Items</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Status</th>
            <th class="px-4 py-3 text-right text-gray-500 text-sm">Action</th>
        </tr>
    </thead>

    <tbody class="divide-y">

@foreach($orders as $order)

@php

    $totalItems = $order->items->count();

    $readyItems = 0;

    foreach($order->items as $item){

        foreach($item->tracks as $track){

            if($track->status == 'completed'){

                $readyItems++;
            }
        }
    }

@endphp

<tr>

    <td class="px-4 py-4 font-medium">

        <button onclick="toggleRow(this)"
            class="mr-2 text-blue-600">

            ▶

        </button>

        {{ $order->order_no }}

    </td>

    <td class="px-4 py-4">

        {{ $order->customer->phone ?? '-' }}

    </td>

    <td class="px-4 py-4">

        {{ date('d M Y', strtotime($order->order_date)) }}

    </td>

    <td class="px-4 py-4">

        {{ ($order->delivery_date && $order->delivery_date != '0000-00-00' && $order->delivery_date != '0000-00-00 00:00:00') ? date('d M Y', strtotime($order->delivery_date)) : 'Not Assigned' }}

    </td>

    <td class="px-4 py-4">

        {{ $totalItems }} Items

    </td>

    <td class="px-4 py-4">

        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">

            Ready For Delivery
            ({{ $readyItems }})

        </span>

    </td>

    <td class="px-4 py-4 text-right">

        <button onclick="openDeliveryModal(this)">

            <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21" fill="none">

                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206Z"
                    fill="">

                </path>

            </svg>

        </button>

    </td>

</tr>

{{-- ACCORDION --}}
<tr class="hidden bg-gray-50">

<td colspan="7">

<div class="p-4">

<table class="w-full text-sm">

<thead>

<tr class="text-gray-500 text-left">

    <th>
        <input type="checkbox"
            onclick="toggleAll(this)">
    </th>

    <th>Sub Order</th>

    <th>Item</th>

    <th>Type</th>

    <th>Tailor</th>

    <th>Order Date</th>

    <th>Delivery</th>

    <th>Status</th>

    <th>Delay</th>

    <th>Notes</th>

</tr>

</thead>

<tbody>

@foreach($order->items as $item)

    @php

        // ✅ completed stage 12 tracks
        $tracks = $item->tracks

            ->where('status', 'completed')

            ->where('stage_id', 12);

    @endphp

    @foreach($tracks as $track)

        @php

            $isDelayed = false;

            if(
                $order->delivery_date &&
                $order->delivery_date != '0000-00-00'
            ){

                $isDelayed =
                    strtotime($order->delivery_date) < time();
            }

        @endphp

        <tr class="border-t {{ $isDelayed ? 'bg-red-50' : 'bg-green-50' }}">

            <!-- CHECKBOX -->
            <td>

                <input type="checkbox"
                    class="itemCheckbox">

            </td>

            <!-- SUB ORDER -->
            <td class="text-blue-600 font-medium">

                {{ $item->item_no }}

            </td>

            <!-- ITEM -->
            <td>

                {{ $item->type->type ?? '-' }}

            </td>

            <!-- TYPE -->
            <td>

                {{ $item->type->type ?? '-' }}

            </td>

            <!-- TAILOR -->
            <td>

                {{ $track->tailor->name ?? '-' }}

            </td>

            <!-- ORDER DATE -->
            <td>

                {{ date('d M', strtotime($order->order_date)) }}

            </td>

            <!-- DELIVERY DATE -->
            <td>

                {{

                    (
                        $order->delivery_date &&
                        $order->delivery_date != '0000-00-00'
                    )

                    ? date(
                        'd M',
                        strtotime($order->delivery_date)
                    )

                    : '-'

                }}

            </td>

            <!-- STATUS -->
            <td>

                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">

                    Completed

                </span>

            </td>

            <!-- DELAY -->
            <td>

                @if($isDelayed)

                    <span class="text-red-600 font-medium">

                        Delayed

                    </span>

                @else

                    <span class="text-green-600 font-medium">

                        On Time

                    </span>

                @endif

            </td>

            <!-- NOTES -->
            <td>

                {{ $item->notes ?? '-' }}

            </td>

        </tr>

    @endforeach

@endforeach

</tbody>

</table>

</div>

</td>

</tr>

@endforeach

</tbody>
</table>

        </div>
    </div>

</div>

<!-- Modal -->
<div id="deliveryModal"
    class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-white/40 backdrop-blur-md">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl">

        <!-- Header -->
        <div class="flex items-center justify-between px-5 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">
                Confirm Delivery
            </h3>
            <button onclick="closeDeliveryModal()" class="text-gray-400 hover:text-red-500 text-xl">✕</button>
        </div>

        <!-- Body -->
        <div class="p-5 space-y-4 text-sm text-gray-600">

            <!-- MESSAGE -->



            <div class="relative">

    <!-- 🔥 RIBBON -->
    <div class="absolute -top-2 right-0 bg-red-500 text-white text-xs px-3 py-1 rounded-l-lg shadow">
        Partial Paid
    </div>

    <!-- PARTIAL VERSION (use this instead if needed) -->
    <!--
    <div class="absolute -top-2 right-0 bg-yellow-500 text-white text-xs px-3 py-1 rounded-l-lg shadow">
        Partially Paid
    </div>
    -->

    <!-- PAYMENT MODE -->
    <label class="block mb-1 text-gray-700 font-medium">Payment Mode</label>

    <div class="flex gap-4">
        <label class="flex items-center gap-2">
            <input type="radio" name="payment_mode" value="gpay" class="accent-blue-600">
            GPay
        </label>
        <label class="flex items-center gap-2">
            <input type="radio" name="payment_mode" value="cash" class="accent-blue-600">
            Cash
        </label>
        <label class="flex items-center gap-2">
            <input type="radio" name="payment_mode" value="bank" class="accent-blue-600">
            Bank Transfer
        </label>
    </div>

    <!-- 🔥 PAYMENT INFO -->
    <div class="mt-3 bg-gray-50 border rounded-lg p-3 text-xs text-gray-600" style="background-color: lightblue;">

        <div class="flex justify-between">
            <span>Payment Type</span>
            <span class="font-medium text-gray-800">GPay</span>
        </div>

        <div class="flex justify-between mt-1">
            <span>Amount</span>
            <span class="font-medium text-green-600">₹1500</span>
        </div>

        <div class="flex justify-between mt-1">
            <span>Date</span>
            <span class="font-medium text-gray-800">18 Apr 2026</span>
        </div>

    </div>

</div>

            <!-- PAYMENT MODE -->
            <div>
                <label class="block mb-1 text-gray-700 font-medium">Payment Mode</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment_mode" value="gpay" class="accent-blue-600">
                        GPay
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment_mode" value="cash" class="accent-blue-600">
                        Cash
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="payment_mode" value="bank" class="accent-blue-600">
                        Bank Transfer
                    </label>
                </div>
            </div>

            <!-- Payment Type -->

            <div>
                <label class="block mb-1 text-gray-700 font-medium">Payment</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="delivery_type" value="in_person" class="accent-blue-600">
                        Partial
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="delivery_type" value="courier" class="accent-blue-600">
                        Full
                    </label>
                </div>
            </div>

            <!-- Payment Type End -->

            <!-- DELIVERY TYPE -->
            <div>
                <label class="block mb-1 text-gray-700 font-medium">Delivery Type</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="delivery_type" value="in_person" class="accent-blue-600">
                        In-Person
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="delivery_type" value="courier" class="accent-blue-600">
                        Courier
                    </label>
                </div>
            </div>

            <!-- AMOUNT -->
            <div>
                <label class="block mb-1 text-gray-700 font-medium">Amount</label>
                <input type="number" placeholder="Enter amount"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400 text-sm">
            </div>

            <div>
                <label class="block mb-1 text-gray-700 font-medium">Discount</label>
                <input type="number" placeholder="Enter amount"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400 text-sm">
            </div>

             <div>
                <label class="block mb-1 text-gray-700 font-medium">Final Amount</label>
                <input type="number" placeholder="Enter amount"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400 text-sm">
            </div>

        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 px-5 py-4 border-t">
            <button onclick="closeDeliveryModal()"
                class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
                Cancel
            </button>

            <button onclick="confirmDeliveryAction()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
                Yes, Deliver
            </button>
        </div>

    </div>
</div>

<!-- JS -->

<style>
.input {
    width: 100%;
    margin-top: 6px;
    padding: 10px 12px;
    border: 1px solid #000;
    border-radius: 10px;
    outline: none;
}
.input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 2px rgba(59,130,246,0.2);
}
</style>
<script>
function openModal() {

    const modal = document.getElementById('customerModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('customerModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

<script>
// accordion toggle
function toggleRow(btn) {
    let tr = btn.closest('tr');
    let next = tr.nextElementSibling;

    next.classList.toggle('hidden');
    btn.innerText = btn.innerText === '▶' ? '▼' : '▶';
}

// select all (inside same table only)
function toggleAll(source) {
    let table = source.closest('table');
    let checkboxes = table.querySelectorAll('.itemCheckbox');
    checkboxes.forEach(cb => cb.checked = source.checked);
}


</script>

<script>
let currentBtn = null;

// open modal
function openDeliveryModal(btn) {
    currentBtn = btn;
    document.getElementById('deliveryModal').classList.remove('hidden');
}

// close modal
function closeDeliveryModal() {
    document.getElementById('deliveryModal').classList.add('hidden');
}

// confirm delivery
function confirmDeliveryAction() {

    let parentRow = currentBtn.closest('tr');
    let accordionRow = parentRow.nextElementSibling;

    let checkboxes = accordionRow.querySelectorAll('.itemCheckbox');
    let selected = accordionRow.querySelectorAll('.itemCheckbox:checked');

    let itemsToDeliver = selected.length > 0 ? selected : checkboxes;

    itemsToDeliver.forEach(cb => {
        let row = cb.closest('tr');

        row.querySelector('td:nth-child(8)').innerHTML =
            '<span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Delivered</span>';

        row.querySelector('td:nth-child(9)').innerHTML =
            '<span class="text-green-600">Done</span>';

        cb.checked = false;
    });

    // update parent status
    parentRow.querySelector('td:nth-child(6)').innerHTML =
        '<span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Delivered</span>';

    closeDeliveryModal();
}
</script>

    </div>
@endsection
<script>
function toggleDateFilter() {
    const box = document.getElementById('dateFilterBox');
    box.classList.toggle('hidden');
}

// close when clicking outside
document.addEventListener('click', function (e) {
    const box = document.getElementById('dateFilterBox');
    const btn = e.target.closest('button');

    if (!e.target.closest('#dateFilterBox') && !btn) {
        box.classList.add('hidden');
    }
});

function confirmDeliveryAction() {
    let payment = document.querySelector('input[name="payment_mode"]:checked')?.value;
    let delivery = document.querySelector('input[name="delivery_type"]:checked')?.value;
    let amount = document.querySelector('input[type="number"]').value;

    console.log(payment, delivery, amount);
}
</script>
