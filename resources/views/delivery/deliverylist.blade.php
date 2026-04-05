@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Delivery" />
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

    <!-- ================= ORDER 1 ================= -->
    <tr>
        <td class="px-4 py-4 font-medium">
            <button onclick="toggleRow(this)" class="mr-2 text-blue-600">▶</button>
            ORD001
        </td>
        <td class="px-4 py-4">CUS001</td>
        <td class="px-4 py-4">04 Apr 2026</td>
        <td class="px-4 py-4">06 Apr 2026</td>
        <td class="px-4 py-4">3 Items</td>
        <td class="px-4 py-4">
            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                Ready For Delivery
            </span>
        </td>
        <td class="px-4 py-4 text-right">
            <button onclick="openDeliveryModal(this)"
                class="">
                 <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206ZM14.9697 4.59272C15.2626 4.29982 15.7375 4.29982 16.0304 4.59272L17.0027 5.56499C17.2956 5.85788 17.2956 6.33276 17.0027 6.62565L16.1043 7.52402L14.0714 5.49109L14.9697 4.59272ZM13.0107 6.55175L6.66806 12.8944C6.56526 12.9972 6.49455 13.1277 6.46454 13.2699L5.96704 15.6283L8.32547 15.1308C8.46772 15.1008 8.59819 15.0301 8.70099 14.9273L15.0436 8.58468L13.0107 6.55175Z" fill=""></path>
                                    </svg>
            </button>
        </td>
    </tr>

    <!-- ORDER 1 ITEMS -->
    <tr class="hidden bg-gray-50">
        <td colspan="7">
            <div class="p-4">

                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-gray-500 text-left">
                            <th><input type="checkbox" onclick="toggleAll(this)"></th>
                            <th>Sub Order</th>
                            <th>Item</th>
                            <th>Type</th>
                            <th>Tailor</th>
                            <th>Start</th>
                            <th>Delivery</th>
                            <th>Status</th>
                            <th>Delay</th>
                            <th>Notes</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="border-t">
                            <td><input type="checkbox" class="itemCheckbox"></td>
                            <td class="text-blue-600">ORD001-1</td>
                            <td>Shirt</td>
                            <td>Full Sleeve</td>
                            <td>Ravi</td>
                            <td>02 Apr</td>
                            <td>08 Apr</td>
                            <td><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">Stitching</span></td>
                            <td><span class="text-red-600">2 Days</span></td>
                            <td>-</td>
                        </tr>

                        <tr class="border-t">
                            <td><input type="checkbox" class="itemCheckbox"></td>
                            <td class="text-blue-600">ORD001-2</td>
                            <td>Pant</td>
                            <td>Formal</td>
                            <td>Kumar</td>
                            <td>01 Apr</td>
                            <td>07 Apr</td>
                            <td><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Completed</span></td>
                            <td><span class="text-green-600">On Time</span></td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </td>
    </tr>


    <!-- ================= ORDER 2 ================= -->
    <tr>
        <td class="px-4 py-4 font-medium">
            <button onclick="toggleRow(this)" class="mr-2 text-blue-600">▶</button>
            ORD002
        </td>
        <td class="px-4 py-4">CUS002</td>
        <td class="px-4 py-4">05 Apr 2026</td>
        <td class="px-4 py-4">07 Apr 2026</td>
        <td class="px-4 py-4">2 Items</td>
        <td class="px-4 py-4">
            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
                Pending (1 Item)
            </span>
        </td>
        <td class="px-4 py-4 text-right">
            <button onclick="openDeliveryModal(this)"
                class="">
                <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206ZM14.9697 4.59272C15.2626 4.29982 15.7375 4.29982 16.0304 4.59272L17.0027 5.56499C17.2956 5.85788 17.2956 6.33276 17.0027 6.62565L16.1043 7.52402L14.0714 5.49109L14.9697 4.59272ZM13.0107 6.55175L6.66806 12.8944C6.56526 12.9972 6.49455 13.1277 6.46454 13.2699L5.96704 15.6283L8.32547 15.1308C8.46772 15.1008 8.59819 15.0301 8.70099 14.9273L15.0436 8.58468L13.0107 6.55175Z" fill=""></path>
                                    </svg>
            </button>
        </td>
    </tr>

    <!-- ORDER 2 ITEMS -->
    <tr class="hidden bg-gray-50">
        <td colspan="7">
            <div class="p-4">

                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-gray-500 text-left">
                            <th><input type="checkbox" onclick="toggleAll(this)"></th>
                            <th>Sub Order</th>
                            <th>Item</th>
                            <th>Type</th>
                            <th>Tailor</th>
                            <th>Start</th>
                            <th>Delivery</th>
                            <th>Status</th>
                            <th>Delay</th>
                            <th>Notes</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Delivered Item -->
                        <tr class="border-t bg-green-50">
                            <td><input type="checkbox" class="itemCheckbox"></td>
                            <td class="text-blue-600">ORD002-1</td>
                            <td>Shirt</td>
                            <td>Half Sleeve</td>
                            <td>Ravi</td>
                            <td>02 Apr</td>
                            <td>06 Apr</td>
                            <td>
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">
                                    Delivered
                                </span>
                            </td>
                            <td><span class="text-green-600">Done</span></td>
                            <td>-</td>
                        </tr>

                        <!-- Pending Item -->
                        <tr class="border-t bg-red-50">
                            <td><input type="checkbox" class="itemCheckbox"></td>
                            <td class="text-blue-600">ORD002-2</td>
                            <td>Pant</td>
                            <td>Formal</td>
                            <td>Kumar</td>
                            <td>03 Apr</td>
                            <td>07 Apr</td>
                            <td>
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">
                                    Pending
                                </span>
                            </td>
                            <td><span class="text-red-600">1 Day</span></td>
                            <td>Delay in stitching</td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </td>
    </tr>

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
        <div class="p-5 text-sm text-gray-600">
            Are you sure you want to deliver selected items?
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
