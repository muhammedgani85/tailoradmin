@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Orders" />
    <div class="space-y-6">

        <div class="rounded-2xl border border-gray-200 bg-white pt-4">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Order Management
        </h3>

       <button onclick="openModal()"
    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
    + Add Order
</button>
    </div>

    <!-- Table -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

           <table id="myTable" class="min-w-full border border-gray-200 rounded-xl overflow-hidden">
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

    <!-- ORDER 1 -->
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
                In Progress
            </span>
        </td>
        <td class="px-4 py-4 text-right space-x-2">
            <a href="{{ route('profile') }}" class="text-blue-600">👁️</a>
            <button class="text-green-600">✏️</button>
            <button class="text-red-600">🗑️</button>
        </td>
    </tr>

    <!-- ACCORDION CONTENT -->
    <tr class="hidden bg-gray-50">
    <td colspan="8">
        <div class="p-4">
            <table class="w-full text-sm">
    <thead>
        <tr class="text-gray-500 text-left">
            <th class="py-2">Sub Order</th>
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
            <td class="py-2 font-medium text-blue-600">ORD001-1</td>
            <td class="font-medium">Shirt</td>
            <td>Full Sleeve</td>
            <td>Ravi</td>
            <td>02 Apr</td>
            <td>08 Apr</td>

            <td>
                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                    Stitching
                </span>
            </td>

            <td>
                <span class="text-red-600 font-medium">
                    2 Days
                </span>
            </td>

            <td><a href="{{ route('profile') }}" class="text-blue-600">👁️</a></td>
        </tr>

        <tr class="border-t">
            <td class="py-2 font-medium text-blue-600">ORD001-2</td>
            <td class="font-medium">Pant</td>
            <td>Formal</td>
            <td>Kumar</td>
            <td>01 Apr</td>
            <td>07 Apr</td>

            <td>
                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                    Completed
                </span>
            </td>

            <td>
                <span class="text-green-600">
                    On Time
                </span>
            </td>

            <td>-</td>
        </tr>

    </tbody>
</table>
        </div>
    </td>
</tr>

    <!-- ORDER 2 -->
    <tr>
        <td class="px-4 py-4 font-medium">
            <button onclick="toggleRow(this)" class="mr-2 text-blue-600">▶</button>
            ORD002
        </td>
        <td class="px-4 py-4">CUS002</td>
        <td class="px-4 py-4">05 Apr 2026</td>
        <td class="px-4 py-4">05 Apr 2026</td>
        <td class="px-4 py-4">5 Items</td>
        <td class="px-4 py-4">
            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                Completed
            </span>
        </td>
        <td class="px-4 py-4 text-right space-x-2">
            <a href="{{ route('profile') }}" class="text-blue-600">👁️</a>
            <button class="text-green-600">✏️</button>
            <button class="text-red-600">🗑️</button>
        </td>
    </tr>

    <!-- ACCORDION -->
    <tr class="hidden bg-gray-50">
        <td colspan="6">
            <div class="p-4 text-sm text-gray-600">
                No items added
            </div>
        </td>
    </tr>

</tbody>
</table>

        </div>
    </div>

</div>

<!-- Modal -->
<!-- GLOBAL MODAL (PUT BEFORE </body>) -->
<div id="customerModal"
    onclick="if(event.target.id==='customerModal') closeModal()"
    class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-white/40 backdrop-blur-md">

    <!-- Modal Box -->
    <div class="relative" style="width: 900px !important;background: #FFFFFF; border-radius: 12px;">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-t-2xl">
            <h3 class="text-lg font-semibold text-gray-800">
                Add Customer
            </h3>
            <button onclick="closeModal()" class="text-xl text-gray-500 hover:text-red-500">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6 max-h-[80vh] overflow-y-auto">

            <form>
                <div class="grid grid-cols-2 gap-4">

    <!-- Row 1 -->
    <div class="flex items-center gap-2">
        <label class="w-24 text-sm text-gray-700">Name :</label>
        <input class="input flex-1" placeholder="Enter Name">
    </div>

    <div class="flex items-center gap-2">
        <label class="w-20 text-sm text-gray-700">Age :</label>
        <input class="input flex-1" placeholder="Enter Age">
    </div>

    <!-- Row 2 -->
    <div class="flex items-center gap-2">
        <label class="w-24 text-sm text-gray-700">State :</label>
        <input class="input flex-1" placeholder="Enter State">
    </div>

    <div class="flex items-center gap-2">
        <label class="w-20 text-sm text-gray-700">City :</label>
        <input class="input flex-1" placeholder="Enter City">
    </div>

    <!-- Row 3 -->
    <div class="flex items-center gap-2">
        <label class="w-24 text-sm text-gray-700">Phone :</label>
        <input class="input flex-1" placeholder="Enter Phone">
    </div>

    <div class="flex items-center gap-2">
        <label class="w-20 text-sm text-gray-700">District :</label>
        <input class="input flex-1" placeholder="Enter District">
    </div>




    <!-- Address Full Width -->
    <div class="col-span-2 flex items-start gap-2">
        <label class="w-24 text-sm text-gray-700 mt-2">Address :</label>
        <textarea class="input flex-1" placeholder="Enter Address"></textarea>
    </div>

</div>

                <!-- Footer -->
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit" class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
                        Save
                    </button>
                </div>
            </form>

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
function toggleRow(btn) {
    let tr = btn.closest('tr');
    let next = tr.nextElementSibling;

    next.classList.toggle('hidden');

    // rotate arrow
    if (btn.innerText === '▶') {
        btn.innerText = '▼';
    } else {
        btn.innerText = '▶';
    }
}
</script>



    </div>
@endsection
