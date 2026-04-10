@extends('layouts.app')

@section('content')
    <div class="rounded-2xl border border-gray-200 bg-white pt-4">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Workflow Management
        </h3>

       <button onclick="openModal()"
    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
    + Add Workflow
</button>
    </div>

    <!-- Table -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

           <table class="min-w-full mt-6">
    <thead>
        <tr class="border-y">
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Type</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Status</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Added By</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Added Date</th>
            <th class="px-4 py-3 text-right text-gray-500 text-sm">Action</th>
        </tr>
    </thead>

    <tbody class="divide-y">

        <tr>
            <td class="px-4 py-4 font-medium">Cutting</td>
            <td class="px-4 py-4">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                    Active
                </span>
            </td>
            <td class="px-4 py-4">Admin</td>
            <td class="px-4 py-4">05 Apr 2026</td>
            <td class="px-4 py-4 text-right space-x-2">
                <button class="text-green-600">✏️</button>
                <button class="text-red-600">🗑️</button>
            </td>
        </tr>

        <tr>
            <td class="px-4 py-4 font-medium">Stitching</td>
            <td class="px-4 py-4">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                    Active
                </span>
            </td>
            <td class="px-4 py-4">Admin</td>
            <td class="px-4 py-4">05 Apr 2026</td>
            <td class="px-4 py-4 text-right space-x-2">
                <button class="text-green-600">✏️</button>
                <button class="text-red-600">🗑️</button>
            </td>
        </tr>

        <tr>
            <td class="px-4 py-4 font-medium">Finishing</td>
            <td class="px-4 py-4">
                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
                    Inactive
                </span>
            </td>
            <td class="px-4 py-4">Admin</td>
            <td class="px-4 py-4">04 Apr 2026</td>
            <td class="px-4 py-4 text-right space-x-2">
                <button class="text-green-600">✏️</button>
                <button class="text-red-600">🗑️</button>
            </td>
        </tr>

        <tr>
            <td class="px-4 py-4 font-medium">Delivered</td>
            <td class="px-4 py-4">
                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
                    Active
                </span>
            </td>
            <td class="px-4 py-4">Admin</td>
            <td class="px-4 py-4">04 Apr 2026</td>
            <td class="px-4 py-4 text-right space-x-2">
                <button class="text-green-600">✏️</button>
                <button class="text-red-600">🗑️</button>
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
                Add Workflow
            </h3>
            <button onclick="closeModal()" class="text-xl text-gray-500 hover:text-red-500">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6 max-h-[80vh] overflow-y-auto">

            <form>
                <div class="grid grid-cols-2 gap-4">

    <!-- Row 1 -->
    <div class="flex items-center gap-2">
        <label class="w-24 text-sm text-gray-700">Type :</label>
        <input class="input flex-1" placeholder="Enter Type">
    </div>

    <div class="flex items-center gap-2">
        <label class="w-20 text-sm text-gray-700">Status :</label>
        <input class="input flex-1" placeholder="Enter Status">
    </div>








    <!-- Address Full Width -->
    <div class="col-span-2 flex items-start gap-2">
        <label class="w-24 text-sm text-gray-700 mt-2">Comments :</label>
        <textarea class="input flex-1" placeholder="Enter Comments"></textarea>
    </div>

</div>

<!-- Specialist Section -->

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
function toggleCount(checkbox, inputId) {
    let input = document.getElementById(inputId);

    if (checkbox.checked) {
        input.classList.remove('hidden');
        input.focus();
    } else {
        input.classList.add('hidden');
        input.value = '';
    }
}
</script>


@endsection
