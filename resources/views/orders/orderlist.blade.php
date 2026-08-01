@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Orders" />
    <div class="space-y-6">

    <div class="col-span-12">
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]" >
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Total</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">{{ count($orders) }}</h4>
        </div>

        <div class="flex items-center gap-1">
          <!-- <span class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
            +20%
          </span>

          <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span> -->
        </div>
      </div>
    </div>
    <!-- Metric Item End -->

    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">In Progres </p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">

    {{ $totalInProgress }}

</h4>
        </div>

        <div class="flex items-center gap-1">
          <!-- <span class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
            +4%
          </span> -->

          <!-- <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span> -->
        </div>
      </div>
    </div>
    <!-- Metric Item End -->

    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Completed</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">{{ $totalCompleted }}</h4>
        </div>

        <div class="flex items-center gap-1">
          <!-- <span class="flex items-center gap-1 rounded-full bg-error-50 px-2 py-0.5 text-theme-xs font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
            -1.59%
          </span> -->

          <!-- <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span> -->
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


<form method="GET">

    <!-- RIGHT SIDE -->
    <div class="flex items-center gap-3 flex-wrap">


        <!-- Due Dropdown -->


         <select name="due"
        class="px-3 py-2 text-sm border border-gray-200 rounded-lg">

        <option value="">All Due</option>

        <option value="today">Today</option>

        <option value="tomorrow">Tomorrow</option>

        <option value="week">This Week</option>

        <option value="month">This Month</option>

    </select>

    <input type="text" name="customer_phone" placeholder="Customer Phone" class="px-3 py-2 text-sm border border-gray-200 rounded-lg" value="{{ request('customer_phone') }}">
    <input type="text" name="order_id" placeholder="Order ID" class="px-3 py-2 text-sm border border-gray-200 rounded-lg" value="{{ request('order_id') }}">



        <!-- DATE RANGE -->
    <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1">

    <input
        type="text"
        name="from_date" id="from_date"
        value="{{ request('from_date') }}"
        placeholder="YYYY-MM-DD"
        onfocus="this.type='date'"
        class="px-2 py-1 text-sm bg-white border border-gray-200 rounded-md">

    <span class="text-gray-400 text-sm">
        to
    </span>

    <input
        type="text"
        name="to_date" id="to_date"
        value="{{ request('to_date') }}"
        placeholder="YYYY-MM-DD"
        onfocus="this.type='date'"
        class="px-2 py-1 text-sm bg-white border border-gray-200 rounded-md">

</div>

    <!-- BUTTON -->
    <button
        type="submit"
        class="px-4 py-2 bg-brand-500 text-white rounded-lg">

        Search

    </button>

    <button
        type="button" onclick="page_reload();"
       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">

        Clear

    </button>

        <!-- ADD ORDER BUTTON -->


    </div>

</form>

</div>

    <!-- Table List Start -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

           <table id="myTable" class="min-w-full">
    <thead>
        <tr class="border-y">
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Order No</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Customer No</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Customer Name</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Order Date</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Delivery Date</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Items</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Status</th>
             <th class="px-4 py-3 text-left text-gray-500 text-sm">Doc</th>

            <th class="px-4 py-3 text-right text-gray-500 text-sm">Notes</th>
        </tr>
    </thead>

   <tbody class="divide-y">

@foreach($orders as $order)

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
        {{ $order->customer->name ?? '-' }}
    </td>

    <td class="px-4 py-4">
        {{ date('d-m-y', strtotime($order->order_date)) }}
    </td>

    <td class="px-4 py-4 {{ ($order->delivery_date && $order->delivery_date != '0000-00-00' && $order->delivery_date != '0000-00-00 00:00:00' && strtotime($order->delivery_date) < time()) ? 'text-red-600 font-semibold' : '' }}">

    {{ ($order->delivery_date && $order->delivery_date != '0000-00-00' && $order->delivery_date != '0000-00-00 00:00:00') ? date('d-m-y', strtotime($order->delivery_date)) : 'Not Assigned' }}

</td>

    <td class="px-4 py-4">
        {{ $order->items->count() }} Items
    </td>

    <td class="px-4 py-4">
        In Progress
    </td>
    <td class="px-4 py-4">
        <a href="#"  onclick="openOrderImages({{ $order->id }})">
        <svg width="24" height="24" fill="none"><path d="M4 4H20V20H4V4Z" stroke="currentColor" stroke-width="1.5"></path><path d="M8 16V10M12 16V6M16 16V12" stroke="currentColor" stroke-width="1.5"></path></svg>
        </a>


    </td>
<td><a href="#" onclick="openPrintModal({{ $order->id }})" class="" >Print</a></td>

</tr>

{{-- ACCORDION --}}
<tr class="hidden bg-gray-50">

<td colspan="8">

<div class="p-4">

<table class="w-full text-sm">

<thead>

<tr class="text-gray-500 text-left">

    <th>Sub Order</th>
    <th>Type</th>
    <th>Tailor</th>
    <th>Stage</th>
    <th>Status</th>
    <th>Delay</th>
    <th></th>

</tr>

</thead>

<tbody>

@foreach($order->items as $item)

<tr class="border-t">

    <td class="py-2">
        {{ $item->item_no }}
    </td>

    <td>
        {{ $item->type->type ?? '-' }}
    </td>

    <td>
       <a href="#" onclick="openTailorModal('{{ $item->tracks->last()->id  }}')"> {{ optional($item->tracks->last()?->tailor)->name ?? '-' }} </a>
    </td>

    <td>
        {{ optional($item->tracks->last()?->stage)->name ?? '-' }}
    </td>

    <td>
        {{ ucfirst($item->tracks->last()?->status ?? '-') }}
    </td>

    <td>

        @php

            $track = $item->tracks->last();

            $days = $track
                ? round(
                    \Carbon\Carbon::parse($track->created_at)
                        ->floatDiffInDays(now()),
                    2
                )
                : 0;

        @endphp

        @if($days > 2)

            <span class="text-red-600">
                {{ $days }} Days
            </span>

        @else

            <span class="text-green-600">
               {{ ($days > 2) ?'Delay' : 'On Time' }}
            </span>

        @endif

    </td>
    <td></td>

</tr>

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
    </td>
</tr>
</table>

        </div>
    </div>

    <!-- Table List End -->

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

    <tbody id="tailorTableBody"></tbody>
</table>

        </div>

        <!-- FOOTER -->
        <div class="flex justify-end gap-3 p-4 border-t">
            <button onclick="closeTailorModal()"
                class="px-4 py-2 bg-gray-200 rounded-lg text-sm">
                Close
            </button>

            <button
                class="px-4 py-2 bg-blue-600 text-black rounded-lg text-sm hover:bg-blue-700" style="background-color: #3b82f6;">
                Save
            </button>
        </div>

    </div>

</div>


<!-- ORDER IMAGE MODAL -->
<div id="orderImageModal"
    class="fixed inset-0 z-[99999] hidden items-center justify-center bg-black/70 overflow-y-auto p-5">

    <div
        class="bg-white rounded-2xl w-[900px] overflow-y-auto p-5 relative"
        style="
            min-height:300px;
            max-height:500px;
            overflow-y:auto;
        ">

        <!-- CLOSE -->
        <button onclick="closeOrderImageModal()"
            class="absolute top-3 right-4 text-2xl text-gray-500 hover:text-red-500">

            ✕

        </button>

        <!-- TITLE -->
        <h3 class="text-lg font-semibold mb-5">
            Order Images
        </h3>

        <!-- IMAGE LIST -->
        <div id="orderImageList"
            class="grid grid-cols-2 md:grid-cols-4 gap-4">

        </div>

    </div>

</div>

<!-- PRINT MODAL -->
<div id="printModal"
    class="fixed inset-0 z-[99999] hidden items-center justify-center bg-black/70 overflow-y-auto p-5">

    <div
        class="bg-white rounded-2xl max-h-[95vh] overflow-y-auto p-6 relative"
        style="
            width:55%;
            max-width:800px;
            height:80vh;
        ">

        <!-- CLOSE -->
        <button onclick="closePrintModal()"
            class="absolute top-3 right-4 text-2xl text-gray-500 hover:text-red-500">

            ✕

        </button>

        <!-- TITLE -->
        <h2 class="text-2xl font-bold mb-5">
            Order Print Preview
        </h2>

        <!-- CONTENT -->
        <div id="printContent"></div>

    </div>

</div>

 <!-- Print Modal End -->
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


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
let currentTrackId = null;

function openTailorModal(trackId)
{
    currentTrackId = trackId;

    $('#tailorModal').removeClass('hidden');

    $('#tailorTableBody').html(`
        <tr>
            <td colspan="6" class="text-center py-4">
                Loading...
            </td>
        </tr>
    `);

    $.get('/stage-tailors/' + trackId, function(res){

        let rows = '';

        res.data.forEach(t => {

            rows += `

                <tr class="border-t hover:bg-gray-50">

                    <td class="py-3 px-4 font-medium">
                        ${t.name}
                    </td>

                    <td class="px-4 text-center">
                        ${t.total}
                    </td>

                    <td class="px-4 text-center text-yellow-600 font-medium">
                        ${t.in_progress}
                    </td>

                    <td class="px-4 text-center text-red-600 font-medium">
                        ${t.pending}
                    </td>

                    <td class="px-4">

                        <input type="text"
                            id="note_${t.id}"
                            class="w-full px-3 py-2 border border-gray-200 rounded-lg text-xs"
                            placeholder="Add note">

                    </td>

                    <td>

                        <button
                            onclick="assignTailor(${t.id})"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm" style="background-color: #3b82f6;">

                            Assign

                        </button>

                    </td>

                </tr>
            `;
        });

        $('#tailorTableBody').html(rows);
    });
}

function assignTailor(tailorId)
{
    let note = $('#note_' + tailorId).val();

    $.post('/reassign-tailor', {

        _token: '{{ csrf_token() }}',

        track_id: currentTrackId,

        tailor_id: tailorId,

        note: note

    }, function(res){

        if(res.success){

            alert('Reassigned Successfully');

            closeTailorModal();

            location.reload();
        }
    });
}
function closeTailorModal() {
    document.getElementById('tailorModal').classList.add('hidden');
}
</script>


<script>

function openOrderImages(orderId)
{
    document.getElementById('orderImageModal')
        .classList.remove('hidden');

    document.getElementById('orderImageModal')
        .classList.add('flex');

    document.getElementById('orderImageList').innerHTML = `
        <div class="col-span-4 text-center py-10">
            Loading...
        </div>
    `;

    fetch('/orders/' + orderId + '/images')

    .then(res => res.json())

    .then(res => {

        let html = '';

        if(res.data.length === 0){

            html = `
                <div class="col-span-4 text-center text-gray-400">
                    No Images Found
                </div>
            `;
        }

       res.data.forEach((img, index) => {

    html += `

        <div class="w-full">

            <!-- HEADER -->
            <h4
                style="
                    font-size:14px;
                    font-weight:600;
                    color:#000;
                    margin-bottom:10px;
                ">

                Doc ${index + 1}

            </h4>

            <!-- IMAGE -->
            <img
                   src="/${img.image_path}"
                    onclick="openImagePopup('/${img.image_path}')"

                style="
                    width:100%;
                    height:300px;
                    object-fit:cover;
                    border-radius:12px;
                    cursor:pointer;
                    border:1px solid #ddd;
                ">

            <!-- LINE -->
            <hr style="margin-top:15px; border-color:#ddd;" />

        </div>

    `;
});

        document.getElementById('orderImageList')
            .innerHTML = html;
    });
}

function closeOrderImageModal()
{
    document.getElementById('orderImageModal')
        .classList.remove('flex');

    document.getElementById('orderImageModal')
        .classList.add('hidden');
}

</script>

<script>

function openOrderImages(orderId)
{
    let modal = document.getElementById('orderImageModal');

    if(!modal){
        console.error('orderImageModal not found');
        return;
    }

    modal.classList.remove('hidden');

    modal.classList.add('flex');

    fetch('/orders/' + orderId + '/images')

    .then(res => res.json())

    .then(res => {

        let html = '';

        res.data.forEach(img => {

            html += `

                <img
                    src="/${img.image_path}"    style="width: 500px; height: 400px;"
                    onclick="openImagePopup('/${img.image_path}')"
                    class="w-full h-40 object-cover rounded-xl cursor-pointer border">

            `;
        });

        document.getElementById('orderImageList').innerHTML = html;
    });
}

function closeOrderImageModal()
{
    let modal = document.getElementById('orderImageModal');

    if(modal){

        modal.classList.remove('flex');

        modal.classList.add('hidden');
    }
}

function openImagePopup(src)
{
    let modal = document.getElementById('fullImageModal');

    if(!modal){
        console.error('fullImageModal not found');
        return;
    }

    document.getElementById('fullPopupImage').src = src;

    modal.classList.remove('hidden');

    modal.classList.add('flex');
}

function closeImagePopup()
{
    let modal = document.getElementById('fullImageModal');

    if(modal){

        modal.classList.remove('flex');

        modal.classList.add('hidden');
    }
}

</script>

    </div>
    <script>

function openPrintModal(orderId)
{
    $('#printModal')
        .removeClass('hidden')
        .addClass('flex');

    $('#printContent').html(`

        <div class="text-center py-10 text-gray-400">

            Loading...

        </div>

    `);

    $.get('/orders/' + orderId + '/print-details', function(res){

        if(!res.success){

            alert(res.message);

            return;
        }

        let order = res.data;

        let html = '';

        order.items.forEach((item, index) => {

            let track = item.tracks.length
                ? item.tracks[item.tracks.length - 1]
                : null;

            let measurements =
                typeof item.measurements === 'string'
                ? JSON.parse(item.measurements)
                : item.measurements;

            html += `

            <div class="print-block border rounded-2xl mb-6 overflow-hidden">

                <!-- HEADER -->
                <div class="flex justify-between items-center bg-gray-100 px-4 py-3">

                    <div>

                        <h3 class="font-bold text-lg">

                            ${item.item_no}

                        </h3>

                        <p class="text-xs text-gray-500">

                            Order : ${order.order_no}

                        </p>

                    </div>

                    <button
                        onclick="printBlock(this)"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm" style="background-color: #0000FF;">

                        Print

                    </button>

                </div>

                <!-- TABLE -->
                <table class="w-full text-sm border-collapse">

                    <tbody>

                        <!-- CUSTOMER + ASSIGNED + TYPE -->
                        <tr class="border-b">

                            <td class="bg-gray-50 font-semibold px-4 py-3">
                                Customer
                            </td>

                            <td class="px-4 py-3">

                                ${order.customer?.name ?? ''}

                                |

                                ${order.customer?.phone ?? ''}

                                |

                                ${order.customer?.city ?? ''}

                            </td>

                            <td class="bg-gray-50 font-semibold px-4 py-3">
                                Assigned
                            </td>

                            <td class="px-4 py-3">

                                ${track?.tailor?.name ?? '-'}

                                |

                                ${track?.stage?.name ?? '-'}

                                |

                                ${track?.status ?? '-'}

                            </td>

                            <td class="bg-gray-50 font-semibold px-4 py-3">
                                Type
                            </td>

                            <td class="px-4 py-3">

                                ${item.type?.type ?? '-'}

                            </td>

                        </tr>

                        <!-- NOTES -->
                        <tr class="border-b">

                            <td class="bg-gray-50 font-semibold px-4 py-3">

                                Notes

                            </td>

                            <td colspan="5"
                                class="px-4 py-3 leading-7">

                                ${(item.notes || '')
                                    .replace(/\n/g, '<br>')}

                            </td>

                        </tr>

                        <!-- MEASUREMENTS -->
                        <!-- MEASUREMENTS -->
<tr>

    <td class="bg-gray-50 font-semibold px-4 py-3 align-top">

        Measurements

    </td>

    <td colspan="5"
        class="px-4 py-3">

        <table class="w-full text-xs border border-collapse">
<tbody>

${(() => {

    const items = Object.values(measurements || {});
    let html = '';

    for (let i = 0; i < items.length; i += 5) {

        const rowItems = items.slice(i, i + 5);

        html += '<tr>';

        for (let k = 0; k < rowItems.length; k++) {

            const m = rowItems[k];

            // Skip empty heading
            if (!m.name || m.name.trim() === '') {
                continue;
            }

            // Collect values
            let values = [m.value];

            while (
                k + 1 < rowItems.length &&
                (!rowItems[k + 1].name || rowItems[k + 1].name.trim() === '')
            ) {
                values.push(rowItems[k + 1].value);
                k++;
            }

            html += `
                <td class="border p-0 align-top">

                    <table class="w-full border-collapse">

                        <tr>
                            <td colspan="${values.length}"
                                class="border-b bg-gray-100 text-center font-semibold py-1">
                                ${m.name}
                            </td>
                        </tr>

                        <tr>

                            ${values.map(v => `
                                <td class="border text-center py-2">
                                    ${v ?? ''}
                                </td>
                            `).join('')}

                        </tr>

                    </table>

                </td>
            `;

        }

        html += '</tr>';

    }

    return html;

})()}

</tbody>
</table>

    </td>

</tr>

                    </tbody>

                </table>

            </div>

            `;
        });

        $('#printContent').html(html);
    });
}

function closePrintModal()
{
    $('#printModal')
        .removeClass('flex')
        .addClass('hidden');
}



</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<input type="text" id="from_date" name="from_date">

<script>
flatpickr("#from_date", {
    dateFormat: "Y-m-d"
});
flatpickr("#to_date", {
    dateFormat: "Y-m-d"
});

function page_reload() {
    window.location.href = "{{ url('/orderlist') }}";
}
</script>


<script>

window.printBlock = function(btn)
{
    try {

        console.log('Print Started');

        let block = btn.closest('.print-block');

        if(!block){

            alert('Print block not found');

            return;
        }

        let printWindow = window.open('', '_blank');

        if(!printWindow){

            alert('Popup blocked. Please allow popups for this website.');

            return;
        }

        let content = `
            <!DOCTYPE html>
            <html>
            <head>

                <title>Print</title>

                <style>

                    body{
                        font-family: Arial, sans-serif;
                        padding:20px;
                        margin:0;
                    }

                    table{
                        width:100%;
                        border-collapse:collapse;
                    }

                    td,
                    th{
                        border:1px solid #ddd;
                        padding:8px;
                    }

                    .bg-gray-50{
                        background:#f9fafb;
                    }

                    button{
                        display:none !important;
                    }

                    @media print {

                        body{
                            margin:0;
                            padding:10px;
                        }

                        button{
                            display:none !important;
                        }
                    }

                </style>

            </head>

            <body>

                ${block.outerHTML}

            </body>

            </html>
        `;

        printWindow.document.open();

        printWindow.document.write(content);

        printWindow.document.close();

        printWindow.onload = function(){

            setTimeout(function(){

                printWindow.focus();

                printWindow.print();

                // optional
                // printWindow.close();

            }, 1000);

        };

    }
    catch(error){

        console.error(error);

        alert(error.message);
    }
};

</script>

@endsection

@section('scripts')

<script>

window.printBlock = function(btn)
{
    alert('Function Called');

    let block = btn.closest('.print-block');

    if(!block){

        alert('Print block not found');

        return;
    }

    let win = window.open('', '_blank');

    if(!win){

        alert('Popup blocked');

        return;
    }

    win.document.write(
        '<html>' +
        '<head><title>Print</title></head>' +
        '<body>' +
        block.outerHTML +
        '</body>' +
        '</html>'
    );

    win.document.close();

    setTimeout(function(){

        win.print();

    },1000);
};

</script>

@endsection
