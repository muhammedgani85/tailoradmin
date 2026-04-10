@extends('layouts.app')

@section('content')

<div class="col-span-12">
    <div class="flex items-start justify-between mb-4">


    <!-- Right (TOP RIGHT CORNER) -->
    <div class="flex justify-end" align='right'>

    <div class="flex items-center bg-gray-50 border border-gray-200 rounded-xl p-1.5 gap-2 shadow-sm">

        <!-- Buttons Group -->
        <div class="flex bg-white rounded-lg border border-gray-200 overflow-hidden">

            <button class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-100">
                12M
            </button>

            <button class="px-3 py-1.5 text-sm bg-blue-600 text-green rounded-lg">
                30D
            </button>

            <button class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-100">
                7D
            </button>

            <button class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-100">
                24H
            </button>

        </div>

        <!-- Divider -->
        <div class="h-6 w-px bg-gray-200"></div>

        <!-- Dropdown -->
        <select class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg bg-white focus:ring-2 focus:ring-blue-200">
            <option>All Tailors</option>
            <option>Ravi</option>
            <option>Kumar</option>
            <option>Suresh</option>
            <option>Gani</option>
        </select>

    </div>

</div>

</div>
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Total Work</p>

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
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Backlog</p>

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

<br />
<div class="bg-white rounded-2xl border border-gray-200 p-5">

    <!-- Header -->
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-4">

        <!-- Left -->
        <div>
            <h3 class="text-lg font-semibold text-gray-800">Analytics</h3>
            <p class="text-sm text-gray-500">Work analytics of last 30 days</p>
        </div>



    </div>

    <!-- Chart -->
    <div class="overflow-x-auto">
        <div id="chart" class="min-w-[900px]"></div>
    </div>

</div>

<br />

 <div class="rounded-2xl border border-gray-200 bg-white pt-4">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Tailor Performance
        </h3>


    </div>

    <!-- Table -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

           <table class="min-w-full mt-6">
    <thead>
        <tr class="border-y">
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Name</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Order</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">On Time</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Delay</th>
            <th class="px-4 py-3 text-right text-gray-500 text-sm">Percentage</th>
        </tr>
    </thead>

    <tbody class="divide-y">

        <tr>
            <td class="px-4 py-4 font-medium">Suresh</td>
            <td class="px-4 py-4">25</td>
            <td class="px-4 py-4">20</td>
            <td class="px-4 py-4">5</td>
            <td class="px-4 py-4 text-right space-x-2 text-green-500">
                95%
            </td>
        </tr>

        <tr>
            <td class="px-4 py-4 font-medium">Suresh</td>
            <td class="px-4 py-4">25</td>
            <td class="px-4 py-4">20</td>
            <td class="px-4 py-4">5</td>
            <td class="px-4 py-4 text-right space-x-2 text-red-500">
                85%
            </td>
        </tr>



    </tbody>
</table>

        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
    chart: {
        type: 'bar',
        height: 350,
        width:1250,
        toolbar: { show: false }
    },

    series: [{
        name: 'Visitors',
        data: [
            160, 380, 190, 290, 180, 190, 280, 100, 210, 390,
            270, 105, 120, 210, 260, 180, 300, 110, 85, 370,
            105, 220, 280, 165, 280, 100, 110, 280, 370, 305
        ]
    }],

    xaxis: {
        categories: Array.from({length: 30}, (_, i) => i + 1),
        labels: {
            style: {
                fontSize: '12px'
            }
        }
    },

    yaxis: {
        max: 400
    },

    plotOptions: {
        bar: {
            borderRadius: 4,
            columnWidth: '40%'
        }
    },

    colors: ['#4F46E5'], // blue color

    grid: {
        borderColor: '#e5e7eb',
        strokeDashArray: 4
    },

    dataLabels: {
        enabled: false
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
@endsection
