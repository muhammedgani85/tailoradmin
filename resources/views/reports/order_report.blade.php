@extends('layouts.app')

@section('content')


    <x-common.page-breadcrumb pageTitle="Orders Report" />
    <div class="space-y-6">
<!-- chart section -->
<div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        <div class="space-y-5 sm:space-y-6">

    <!-- Card Header -->


    <!-- Card Body -->
    <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="space-y-6">

    <!-- Detailsed Card -->


    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
      <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851ZM4.86252 15.3208C4.08769 16.0881 3.70377 17.0608 3.51705 17.8611C3.48384 18.0034 3.5211 18.1175 3.60712 18.2112C3.70161 18.3141 3.86659 18.3987 4.07591 18.3987H13.4249C13.6343 18.3987 13.7992 18.3141 13.8937 18.2112C13.9797 18.1175 14.017 18.0034 13.9838 17.8611C13.7971 17.0608 13.4132 16.0881 12.6383 15.3208C11.8821 14.572 10.6899 13.955 8.75042 13.955C6.81096 13.955 5.61877 14.572 4.86252 15.3208ZM3.8071 14.2549C4.87163 13.2009 6.45602 12.455 8.75042 12.455C11.0448 12.455 12.6292 13.2009 13.6937 14.2549C14.7397 15.2906 15.2207 16.5607 15.4446 17.5202C15.7658 18.8971 14.6071 19.8987 13.4249 19.8987H4.07591C2.89369 19.8987 1.73504 18.8971 2.05628 17.5202C2.28015 16.5607 2.76117 15.2906 3.8071 14.2549ZM15.3042 11.4955C14.4702 11.4955 13.7006 11.2193 13.0821 10.7533C13.3742 10.3314 13.6054 9.86419 13.7632 9.36432C14.1597 9.75463 14.7039 9.99545 15.3042 9.99545C16.5176 9.99545 17.5012 9.01185 17.5012 7.79851C17.5012 6.58517 16.5176 5.60156 15.3042 5.60156C14.7039 5.60156 14.1597 5.84239 13.7632 6.23271C13.6054 5.73284 13.3741 5.26561 13.082 4.84371C13.7006 4.37777 14.4702 4.10156 15.3042 4.10156C17.346 4.10156 19.0012 5.75674 19.0012 7.79851C19.0012 9.84027 17.346 11.4955 15.3042 11.4955ZM19.9248 19.8987H16.3901C16.7014 19.4736 16.9159 18.969 16.9827 18.3987H19.9248C20.1341 18.3987 20.2991 18.3141 20.3936 18.2112C20.4796 18.1175 20.5169 18.0034 20.4837 17.861C20.2969 17.0607 19.913 16.088 19.1382 15.3208C18.4047 14.5945 17.261 13.9921 15.4231 13.9566C15.2232 13.6945 14.9995 13.437 14.7491 13.1891C14.5144 12.9566 14.262 12.7384 13.9916 12.5362C14.3853 12.4831 14.8044 12.4549 15.2503 12.4549C17.5447 12.4549 19.1291 13.2008 20.1936 14.2549C21.2395 15.2906 21.7206 16.5607 21.9444 17.5202C22.2657 18.8971 21.107 19.8987 19.9248 19.8987Z" fill=""></path>
        </svg>
      </div>

      <div class="flex items-end justify-between mt-5">
        <div>
          <span class="text-sm text-gray-500 dark:text-gray-400">Customers</span>
          <h4 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">3,782</h4>
        </div>

        <span class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
          <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.1236 1.37432 6.12391 1.37432 6.12422 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z" fill=""></path>
          </svg>

          11.01%
        </span>
      </div>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
      <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.665 3.75621C11.8762 3.65064 12.1247 3.65064 12.3358 3.75621L18.7807 6.97856L12.3358 10.2009C12.1247 10.3065 11.8762 10.3065 11.665 10.2009L5.22014 6.97856L11.665 3.75621ZM4.29297 8.19203V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0366V11.6513C11.1631 11.6205 11.0777 11.5843 10.9942 11.5426L4.29297 8.19203ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19202L13.0066 11.5426C12.9229 11.5844 12.8372 11.6208 12.75 11.6516V20.037ZM13.0066 2.41456C12.3732 2.09786 11.6277 2.09786 10.9942 2.41456L4.03676 5.89319C3.27449 6.27432 2.79297 7.05342 2.79297 7.90566V16.0946C2.79297 16.9469 3.27448 17.726 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.726 21.2079 16.9469 21.2079 16.0946V7.90566C21.2079 7.05342 20.7264 6.27432 19.9641 5.89319L13.0066 2.41456Z" fill=""></path>
        </svg>
      </div>

      <div class="flex items-end justify-between mt-5">
        <div>
          <span class="text-sm text-gray-500 dark:text-gray-400">Orders</span>
          <h4 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">5,359</h4>
        </div>

        <span class="flex items-center gap-1 rounded-full bg-error-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
          <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.31462 10.3761C5.45194 10.5293 5.65136 10.6257 5.87329 10.6257C5.8736 10.6257 5.8739 10.6257 5.87421 10.6257C6.0663 10.6259 6.25845 10.5527 6.40505 10.4062L9.40514 7.4082C9.69814 7.11541 9.69831 6.64054 9.40552 6.34754C9.11273 6.05454 8.63785 6.05438 8.34486 6.34717L6.62329 8.06753L6.62329 1.875C6.62329 1.46079 6.28751 1.125 5.87329 1.125C5.45908 1.125 5.12329 1.46079 5.12329 1.875L5.12329 8.06422L3.40516 6.34719C3.11218 6.05439 2.6373 6.05454 2.3445 6.34752C2.0517 6.64051 2.05185 7.11538 2.34484 7.40818L5.31462 10.3761Z" fill=""></path>
          </svg>

          9.05%
        </span>
      </div>
    </div>



        </div>
    </div>
                 </div>
        <div class="space-y-6">

    <!-- Card Header -->


    <!-- Card Body -->
    <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="space-y-6">
<img src="{{ asset('images/logo/chart.jpg') }}" alt="logo" style="padding:30px;margin-top:-3p0px;">
        </div>
    </div>
</div>                  </div>

<!-- chart section end -->






    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Order Reports
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

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
// BAR CHART
new ApexCharts(document.querySelector("#monthlyChart"), {
    chart: { type: 'bar', height: 250 },
    series: [{
        data: [150, 380, 200, 290, 180, 200, 280, 100, 210, 390, 270, 100]
    }],
    xaxis: {
        categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]
    },
    colors: ['#4F46E5'],
    plotOptions: {
        bar: { borderRadius: 6, columnWidth: '40%' }
    }
}).render();


// RADIAL CHART
new ApexCharts(document.querySelector("#radialChart"), {
    chart: { type: 'radialBar', height: 250 },
    series: [75.55],
    labels: ['Progress'],
    colors: ['#4F46E5'],
    plotOptions: {
        radialBar: {
            hollow: { size: '65%' },
            dataLabels: {
                value: {
                    fontSize: '22px',
                    formatter: function (val) {
                        return val + "%";
                    }
                }
            }
        }
    }
}).render();
</script>

    </div>
@endsection

