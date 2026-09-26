@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Re-Assign Orders" />


        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-white/[0.05] dark:bg-white/[0.03]">

    <!-- Header -->
   <div class="flex items-center justify-between px-6 mb-4">

    <h3 class="text-lg font-semibold text-gray-800">
         Assign Order
    </h3>

    <!-- RIGHT SIDE -->
    <div class="flex items-center gap-3 flex-wrap">


        <!-- Due Dropdown -->


        <form method="GET" action="{{ route('orders.printorders') }}"
      class="flex items-center gap-3 flex-wrap">

    {{-- ORDER DUE --}}

    <input type="text" id="order_no" name="order_no" style="width:200px" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-200" placeholder="Order Number" />
    <select
        name="due"
        class="px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white
               focus:ring-2 focus:ring-brand-300 focus:border-brand-400">

        <option value="">All Orders</option>

        <option value="today"
            {{ request('due') == 'today' ? 'selected' : '' }}>
            Today
        </option>

        <option value="tomorrow"
            {{ request('due') == 'tomorrow' ? 'selected' : '' }}>
            Tomorrow
        </option>

        <option value="week"
            {{ request('due') == 'week' ? 'selected' : '' }}>
            This Week
        </option>

        <option value="month"
            {{ request('due') == 'month' ? 'selected' : '' }}>
            This Month
        </option>

    </select>


    {{-- TAILOR --}}
    <select
        name="tailor_id"
        class="px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white
               focus:ring-2 focus:ring-brand-300 focus:border-brand-400">

        <option value="All">All Tailors</option>
        <option value="">UnAssigned</option>

        @foreach($tailors as $tailor)

            <option value="{{ $tailor->id }}"
                {{ request('tailor_id') == $tailor->id ? 'selected' : '' }}>
                {{ $tailor->name }}
            </option>

        @endforeach

    </select>


    {{-- DATE RANGE --}}
    <div class="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg px-2 py-1">

        <input
            type="date"
            name="from_date"
            value="{{ request('from_date') }}"
            class="px-2 py-1 text-sm bg-white border border-gray-200 rounded-md
                   focus:ring-1 focus:ring-brand-300">

        <span class="text-gray-400 text-sm">to</span>

        <input
            type="date"
            name="to_date"
            value="{{ request('to_date') }}"
            class="px-2 py-1 text-sm bg-white border border-gray-200 rounded-md
                   focus:ring-1 focus:ring-brand-300">

    </div>


    {{-- SEARCH --}}
   <button type="submit"
    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg
           transition px-4 py-3 text-sm bg-brand-500 text-white
           shadow-theme-xs hover:bg-brand-600">

    <svg xmlns="http://www.w3.org/2000/svg"
         width="20"
         height="20"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2"
         stroke-linecap="round"
         stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"></circle>
        <path d="m21 21-4.3-4.3"></path>
    </svg>

</button>

 <button type="reset"
        title="Reset"
        aria-label="Reset"
        onclick="this.form.reset(); window.location.href = window.location.pathname;"
        class="inline-flex items-center justify-center rounded-lg
               transition p-3 text-sm bg-gray-100 text-gray-700
               shadow-theme-xs hover:bg-gray-200">

        <svg xmlns="http://www.w3.org/2000/svg"
             width="20"
             height="20"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="2"
             stroke-linecap="round"
             stroke-linejoin="round">
            <path d="M3 12a9 9 0 1 0 3-6.7"></path>
            <path d="M3 4v6h6"></path>
        </svg>

    </button>

</form>
        <button  onclick="openReassignModal()"
            class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
           Re-Assign
        </button>

        <!-- ADD ORDER BUTTON -->

    </div>

</div>

    <!-- Table -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">
<div id="printArea">
          <form id="reassignForm" method="POST"  action="{{ route('order-items.reassign-tailor') }}">
    @csrf

    <table class="min-w-full text-sm" style="font-size: 12px; font-family: Arial, sans-serif; border-collapse: collapse; width: 100%;">

        <!-- HEADER -->
        <thead class="bg-gray-50 border-b" >
            <tr>
                 <th class="px-4 py-3 text-left">
                    <input
                        type="checkbox"
                        id="selectAll"
                        onclick="selectAllItems(this)"
                    >

                <th class="px-4 py-3 text-left text-gray-500">
                    Order ID
                </th>

                 <th class="px-4 py-3 text-left text-gray-500">
                    Tailor Name
                </th>

                 <th class="px-4 py-3 text-left text-gray-500">
                    Stage
                </th>

                <th class="px-4 py-3 text-left text-gray-500">
                    Customer Name
                </th>

                <th class="px-4 py-3 text-left text-gray-500">
                    Order Date
                </th>
            </tr>
        </thead>

        <!-- BODY -->
        <tbody class="divide-y">

           @foreach($orders as $order)

    @foreach($order->items as $item)

        @php
            $assignedTrack = $item->tracks->firstWhere('assigned_to', '!=', null);
        @endphp

        <tr>
            <td class="px-4 py-3">
                <input
                    type="checkbox"
                    name="item_ids[]"
                    value="{{ $item->id }}"
                    class="item-checkbox rounded border-gray-300"
                >
            </td>

            <td class="px-4 py-3 font-medium text-blue-600">
                {{ $item->item_no }}
            </td>

            <td class="px-4 py-3">
                {{ $assignedTrack?->tailor?->name ?? 'UnAssigned' }}
            </td>

              <td class="px-4 py-3">
                {{ $assignedTrack?->stage?->name ?? '-' }}
            </td>

            <td class="px-4 py-3">
                {{ $order->customer->name }}
            </td>

            <td class="px-4 py-3">
                {{ $order->order_date }}
            </td>
        </tr>

    @endforeach

@endforeach

        </tbody>

    </table>

    <!-- RE-ASSIGN BUTTON -->
    <div class="mt-4">
        <button
            type="button"
             id="reassignBtn"

            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
        >
            Re-Assign Tailor
        </button>
    </div>

</form>

</div>

        </div>
    </div>

</div>

<!-- Modal -->
<!-- GLOBAL MODAL (PUT BEFORE </body>) -->
<!-- REASSIGN MODAL -->


<!-- JS -->


<!--worl load Modal -->


<div
    id="reassignModal"
    class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center"
>
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

        <div class="flex justify-between items-center mb-5">

            <h2 class="text-lg font-semibold text-gray-800">
                Re-Assign Tailor
            </h2>

            <button
                type="button"
                onclick="closeReassignModal()"
                class="text-gray-400 hover:text-gray-600 text-xl"
            >
                &times;
            </button>

        </div>


        <div class="mb-4">
            <p class="text-sm text-gray-600">
                Selected Items:
                <span
                    id="selectedCount"
                    class="font-semibold text-blue-600"
                >
                    0
                </span>
            </p>
        </div>


        <!-- TAILOR -->
        <div class="mb-5">

            <label class="block text-sm font-medium text-gray-700 mb-2">
                Select Tailor
            </label>

            <select
                name="tailor_id"
                id="tailor_id" name="tailor_id"
                class="w-full rounded-lg border border-gray-300 px-3 py-2"
            >

                <option value="">
                    -- Select Tailor --
                </option>
                    @foreach($tailors as $tailor)

                    <option value="{{ $tailor->id }}">
                        {{ $tailor->name }}
                    </option>

                @endforeach


            </select>


            <p
                id="tailorError"
                class="hidden text-sm text-red-500 mt-1"
            >
                Please select a tailor.
            </p>

        </div>


        <!-- CONFIRMATION -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mb-5">

            <p class="text-sm text-yellow-800">
                Are you sure you want to re-assign the selected items?
            </p>

        </div>


        <!-- BUTTONS -->
        <div class="flex justify-end gap-3">

            <button
                type="button"
                onclick="closeReassignModal()"
                class="px-4 py-2 border border-gray-300 rounded-lg"
            >
                Cancel
            </button>

            <button
                type="button"
                onclick="confirmReassign()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300"
            >
                Confirm & Re-Assign
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

function selectAllItems(source)
{
    const checkboxes = document.querySelectorAll('.item-checkbox');

    checkboxes.forEach(function(checkbox) {
        checkbox.checked = source.checked;
    });
}


function checkIndividualItems()
{
    const checkboxes = document.querySelectorAll('.item-checkbox');

    const checked =
        document.querySelectorAll('.item-checkbox:checked');

    const selectAll =
        document.getElementById('selectAll');

    if (checkboxes.length === 0) {
        return;
    }

    selectAll.checked =
        checked.length === checkboxes.length;

    selectAll.indeterminate =
        checked.length > 0 &&
        checked.length < checkboxes.length;
}


function openReassignModal()
{

    const selected =
        document.querySelectorAll('.item-checkbox:checked');

    if (selected.length === 0) {

        alert('Please select at least one item.');

        return;
    }

    document.getElementById('selectedCount').innerText =
        selected.length;

    document.getElementById('tailor_id').value = '';

    document
        .getElementById('tailorError')
        .classList.add('hidden');

    document
        .getElementById('reassignModal')
        .classList.remove('hidden');
}


function closeReassignModal()
{
    document
        .getElementById('reassignModal')
        .classList.add('hidden');
}


function confirmReassign()
{
    const tailorId = document.getElementById('tailor_id').value;

    if (!tailorId) {

        document
            .getElementById('tailorError')
            .classList.remove('hidden');

        return;
    }

    const selectedItems =
        document.querySelectorAll('.item-checkbox:checked');

    if (selectedItems.length === 0) {

        alert('Please select at least one item.');

        return;
    }

    const tailorSelect =
        document.getElementById('tailor_id');

    const tailorName =
        tailorSelect.options[tailorSelect.selectedIndex].text;

    const message =
        'Are you sure you want to assign ' +
        selectedItems.length +
        ' item(s) to ' +
        tailorName +
        '?';

    if (!confirm(message)) {
        return;
    }

    // Get form
    const form =
        document.getElementById('reassignForm');

    // Remove existing tailor_id hidden input
    const existing =
        form.querySelector('input[name="tailor_id"]');

    if (existing) {
        existing.remove();
    }

    // Create hidden tailor_id
    const hiddenInput =
        document.createElement('input');

    hiddenInput.type = 'hidden';
    hiddenInput.name = 'tailor_id';
    hiddenInput.value = tailorId;

    // Add to form
    form.appendChild(hiddenInput);

    console.log('Tailor ID:', tailorId);
    console.log('Selected Items:', selectedItems.length);

    // Submit
    form.submit();
}
</script>

    </div>
@endsection
