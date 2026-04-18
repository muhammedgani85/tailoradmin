@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Dues" />
    <div class="space-y-6">

    <div class="col-span-12">
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]" >
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Today Due</p>

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
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">This week Due</p>

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
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">This Month Order</p>

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

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-white/[0.05] dark:bg-white/[0.03]">

    <!-- Header -->
   <div class="flex items-center justify-between px-6 mb-4">

    <h3 class="text-lg font-semibold text-gray-800">
        Due  Management
    </h3>

    <!-- RIGHT SIDE -->
    <div class="flex items-center gap-3 flex-wrap">


        <!-- Due Dropdown -->


         <select
            class="px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white focus:ring-2 focus:ring-brand-300 focus:border-brand-400">
            <option value="">All Due</option>
            <option>Today</option>
            <option>Tomorrow</option>
            <option>This Week</option>
            <option>This Month</option>

        </select>

        <!-- CUSTOMER DROPDOWN -->
        <select
            class="px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white focus:ring-2 focus:ring-brand-300 focus:border-brand-400">
            <option value="">All Customers</option>
            <option>Gani - 9876543210</option>
            <option>Ravi - 9123456780</option>
            <option>Kumar - 9988776655</option>
            <option>Suresh - 9012345678</option>
        </select>

        <!-- STATUS DROPDOWN -->
        <select
            class="px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white focus:ring-2 focus:ring-brand-300 focus:border-brand-400">
            <option value="">All Status</option>
            <option>In Progress</option>
            <option>Stitching</option>
            <option>Ironing</option>
            <option>Completed</option>
            <option>Urgent</option>
        </select>

        <!-- DATE RANGE -->
        <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1">

            <input type="date"
                class="px-2 py-1 text-sm bg-white border border-gray-200 rounded-md focus:ring-1 focus:ring-brand-300">

            <span class="text-gray-400 text-sm">to</span>

            <input type="date"
                class="px-2 py-1 text-sm bg-white border border-gray-200 rounded-md focus:ring-1 focus:ring-brand-300">

        </div>



    </div>

</div>

    <!-- Table -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

           <table id="myTable" class="min-w-full">
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
            <td>
    <button onclick="openTailorModal('Ravi')"
        class="text-blue-600 hover:underline">
        Ravi
    </button>
</td>
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


<!-- ORDER 3 (URGENT) -->
<tr class="bg-red-50 border-l-4 border-red-500">
    <td class="px-4 py-4 font-medium">
        <button onclick="toggleRow(this)" class="mr-2 text-blue-600">▶</button>
        ORD003
    </td>
    <td class="px-4 py-4">CUS004</td>
    <td class="px-4 py-4">06 Apr 2026</td>
    <td class="px-4 py-4 text-red-600 font-medium">07 Apr 2026</td>
    <td class="px-4 py-4">2 Items</td>

    <td class="px-4 py-4">
        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
            Urgent
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
                        <td class="py-2 font-medium text-blue-600">ORD003-1</td>
                        <td class="font-medium">Blazer</td>
                        <td>Wedding</td>
                        <td>Arun</td>
                        <td>05 Apr</td>
                        <td class="text-red-600 font-medium">07 Apr</td>

                        <td>
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                Urgent
                            </span>
                        </td>

                        <td>
                            <span class="text-red-600 font-medium">
                                1 Day Left
                            </span>
                        </td>

                        <td>High Priority</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </td>
</tr>
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


<!--worl load Modal -->


<div id="tailorModal"
    onclick="if(event.target.id==='tailorModal') closeTailorModal()"
    class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-black/40 backdrop-blur-sm">

    <div class="bg-white rounded-2xl w-[900px] shadow-lg">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-5 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">
                ReAssign Tailor Work Load
            </h3>
            <button onclick="closeTailorModal()" class="text-gray-500 hover:text-red-500">✕</button>
        </div>

        <!-- BODY -->
        <div class="p-5 max-h-[70vh] overflow-y-auto">

            <table class="w-full text-sm table-auto">

    <thead>
        <tr class="text-gray-500 border-b">
            <th class="py-3 px-4 text-left w-1/5">Tailor</th>
            <th class="px-4 text-center w-1/6">Total</th>
            <th class="px-4 text-center w-1/6">In Progress</th>
            <th class="px-4 text-center w-1/6">Pending</th>
            <th class="px-4 text-left w-2/5">Notes</th>
            <th></th>
        </tr>
    </thead>

    <tbody>

        <tr class="border-t hover:bg-gray-50">
            <td class="py-3 px-4 font-medium">Ravi</td>
            <td class="px-4 text-center">12</td>
            <td class="px-4 text-center text-yellow-600 font-medium">5</td>
            <td class="px-4 text-center text-red-600 font-medium">3</td>
            <td class="px-4">
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg text-xs"
                    placeholder="Add note">
            </td>
             <td><button class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">Assign</button></td>
        </tr>

        <tr class="border-t hover:bg-gray-50">
            <td class="py-3 px-4 font-medium">Kumar</td>
            <td class="px-4 text-center">10</td>
            <td class="px-4 text-center text-yellow-600 font-medium">4</td>
            <td class="px-4 text-center text-red-600 font-medium">2</td>
            <td class="px-4">
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg text-xs"
                    placeholder="Add note">
            </td>
            <td><button class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">Assign</button></td>
        </tr>

        <tr class="border-t hover:bg-gray-50">
            <td class="py-3 px-4 font-medium">Suresh</td>
            <td class="px-4 text-center">8</td>
            <td class="px-4 text-center text-yellow-600 font-medium">3</td>
            <td class="px-4 text-center text-red-600 font-medium">1</td>
            <td class="px-4">
                <input type="text"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg text-xs"
                    placeholder="Add note">
            </td>
            <td><button class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">Assign</button></td>
        </tr>

    </tbody>
</table>

        </div>

        <!-- FOOTER -->
        <div class="flex justify-end gap-3 p-4 border-t">
            <button onclick="closeTailorModal()"
                class="px-4 py-2 bg-gray-200 rounded-lg text-sm">
                Close
            </button>

            <button
                class="px-4 py-2 bg-blue-600 text-black rounded-lg text-sm hover:bg-blue-700">
                Save
            </button>
        </div>

    </div>

</div>


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

<script>
function openTailorModal(name) {
    document.getElementById('tailorModal').classList.remove('hidden');
    document.getElementById('tailorName').innerText = name;
}

function closeTailorModal() {
    document.getElementById('tailorModal').classList.add('hidden');
}
</script>

    </div>
@endsection
