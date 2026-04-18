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
<div class="col-span-12">
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]" >
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">BackLog</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">24.7K</h4>
        </div>

        <div class="flex items-center gap-1">
          <span class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
            +20%
          </span>

          <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span>
        </div>
      </div>
    </div>
    <!-- Metric Item End -->

    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Delivered</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">55.9K</h4>
        </div>

        <div class="flex items-center gap-1">
          <span class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
            +4%
          </span>

          <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span>
        </div>
      </div>
    </div>
    <!-- Metric Item End -->

    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Pending for Delivery</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">54%</h4>
        </div>

        <div class="flex items-center gap-1">
          <span class="flex items-center gap-1 rounded-full bg-error-50 px-2 py-0.5 text-theme-xs font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
            -1.59%
          </span>

          <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span>
        </div>
      </div>
    </div>
    <!-- Metric Item End -->

    <!-- Metric Item Start -->

    <!-- Metric Item End -->
  </div>
</div>


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
