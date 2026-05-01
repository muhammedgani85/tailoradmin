@extends('layouts.app')

@section('content')
    <div class="rounded-2xl border border-gray-200 bg-white pt-4">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            WorkFlow Management
        </h3>

      <!--  <button onclick="openModal()"
    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
    + Add Flow
</button> -->



    </div>
<div class="flex items-center justify-between mb-4" style="padding-top:5px;">

    <!-- LEFT: EXPORT -->
        <div id="exportButtons" class="flex gap-2" style="padding-left: 10px;"></div>

        <!-- RIGHT: SEARCH -->
        <input type="text" id="customSearch"
            placeholder="Search..."
            class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-200" style="margin-right: 10px;">
    </div>
    <!-- Table -->
    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

           <table class="min-w-full mt-6" id="worktable">
    <thead style="background-color: lightgrey;">
        <tr class="border-y">
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Flow</th>
           <!--  <th class="px-4 py-3 text-left text-gray-500 text-sm">Status</th> -->
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Types</th>

        </tr>
    </thead>

    <tbody class="divide-y">

        @foreach ($workflows as $workflowvalues )


        <tr>
            <td class="px-4 py-4 font-medium">{{ ucfirst($workflowvalues->name) }}</td>
            <!-- <td class="px-4 py-4">

 <div x-data="{ switcherToggle: {{ json_encode($workflowvalues->status == 'active') }} }">
    <label class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none">

        <div class="relative">
            <input type="checkbox" class="sr-only"
                x-model="switcherToggle"
                @change="updateStatus({{ $workflowvalues->id }}, switcherToggle)"
            />

            <div class="block h-6 w-11 rounded-full"
                :class="switcherToggle ? 'bg-green-500' : 'bg-gray-300'">
            </div>

            <div :class="switcherToggle ? 'translate-x-full' : 'translate-x-0'"
                class="absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white duration-300">
            </div>
        </div>

        <span x-text="switcherToggle ? 'Active' : 'InActive'"></span>

    </label>
</div>


</td> -->

          <td class="px-4 py-4">

    <div class="flex flex-wrap gap-2">

        @foreach($types as $type)
        <label class="flex items-center gap-1 text-xs bg-gray-100 px-2 py-1 rounded cursor-pointer">

            <input type="checkbox"
                class="workflow-type"
                data-workflow="{{ $workflowvalues->id }}"
                value="{{ $type->id }}"

                {{ isset($mapping[$workflowvalues->id]) && in_array($type->id, $mapping[$workflowvalues->id]) ? 'checked' : '' }}
            >

            {{ $type->type }}

        </label>
        @endforeach

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
<!-- GLOBAL MODAL (PUT BEFORE </body>) -->
<div id="customerModal"
    onclick="if(event.target.id==='customerModal') closeModal()"
    class=" hidden fixed inset-0 z-[99999] hidden flex items-center justify-center bg-white/40 backdrop-blur-md" style="background-color: lightgrey;">

    <!-- Modal Box -->
    <div class="relative" style="width: 900px !important;background: #FFFFFF; border-radius: 12px;">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-t-2xl">
            <h3 class="text-lg font-semibold text-gray-800">
                Add Flow
            </h3>
            <button onclick="closeModal()" class="text-xl text-gray-500 hover:text-red-500">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6 max-h-[80vh] overflow-y-auto">

           <form id="workflowForm" method="POST">
    @csrf
    <input type="hidden" id="flow_id">

    <div class="col-span-2 mt-4">

    <label class="text-sm font-semibold text-gray-700 mb-3 block">
        Workflow Stages :
    </label>

    <div class="grid grid-cols-2 gap-3 max-h-60 overflow-y-auto border p-3 rounded">

        @foreach($workflows as $flow)
        <div class="flex items-center gap-2">

            <input type="checkbox"
                name="workflows[]"
                value="{{ $flow->id }}"
                id="flow{{ $flow->id }}">

            <label for="flow{{ $flow->id }}" class="text-sm">
                {{ $flow->name }}
            </label>

        </div>
        @endforeach

    </div>

</div>

    <div class="flex justify-end gap-3 mt-6">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-lg">
            Cancel
        </button>

        <button type="submit"
            class="px-4 py-2 bg-brand-500 text-white rounded-lg">
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){

    $('#workflowForm').on('submit', function(e){
        e.preventDefault();   // VERY IMPORTANT

        console.log("Form blocked ✅");

        let id = $('#flow_id').val();
        let url = id ? '/workflow/'+id : '/workflow';

        let formData = $(this).serialize();

        if(id){
            formData += '&_method=PUT';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function(res){
            if(res.success){
                Swal.fire({
                icon: 'success',
                title: 'Success',
                text: res.message,

                width: '300px',        // 👈 reduce width
                padding: '1rem',       // 👈 reduce height

                showConfirmButton: false,
                timer: 1200,

                customClass: {
                popup: 'rounded-xl',
                title: 'text-sm font-semibold',
                htmlContainer: 'text-xs text-gray-500'
                }
                }).then(() => {
                    location.reload(); // 👈 reload after alert closes
                });
                //$('#workflowForm')[0].reset();


            } else {
                Swal.fire('Warning', res.message, 'warning');
            }
        },
            error: function(err){
                console.log(err.responseText);
            }
        });
    });

});
</script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<!-- Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script>
$(document).ready(function () {

    var table = $('#worktable').DataTable({

        dom: 't<"flex justify-end mt-4"p>', // table + right pagination

        pageLength: 15,
    paging: true,
   ordering: false,

    order: [[0, 'asc']], // ✅ FIX

    info: false,
    lengthChange: false,
    pagingType: "simple_numbers",

        buttons: [
            {
                extend: 'excelHtml5',
                text: ' Export',

                className: 'shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]'
            },
            /* {
                extend: 'csvHtml5',
                text: '📄 CSV',
                className: 'px-3 py-2 bg-blue-600 text-white rounded-lg text-sm'
            } */
        ]
    });

    // Move export buttons
    table.buttons().container().appendTo('#exportButtons');

    // Custom search
    $('#customSearch').on('keyup', function () {
        table.search(this.value).draw();
    });

});
</script>




<script>
function updateStatus(id, status){

    $.ajax({
        url: '/workflow/toggle-status',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
            status: status ? 'active' : 'inactive'
        },
        success: function(res){
            if(res.success){
               Swal.fire({
    icon: 'success',
    title: 'Updated',
    text: 'Status changed successfully',

    width: '320px',          // 👈 reduce width
    padding: '1.2rem',       // 👈 compact spacing
    background: '#fff',

    showConfirmButton: false,
    timer: 1200,

    customClass: {
        popup: 'rounded-xl shadow-lg',
        title: 'text-sm font-semibold',
        htmlContainer: 'text-xs text-gray-500'
    }
});
            } else {
                Swal.fire('Error','Update failed','error');


            }
        },
        error: function(){
            Swal.fire('Error','Server error','error');


        }
    });

}
</script>


<script>
function editType(id){

    $.get('/workflow/' + id + '/edit', function(data){

        // fill form
        $('#flow_id').val(data.id);
        $('input[name=name]').val(data.name);
        $('select[name=status]').val(data.status);
        $('input[name=order_id]').val(data.order_id);

        // open modal
        const modal = document.getElementById('customerModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

}
</script>

<style>
.dataTables_paginate {
    display: flex !important;
    justify-content: flex-end !important;
    gap: 6px;
}

/* buttons */
.dataTables_paginate .paginate_button {
    padding: 6px 12px !important;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    background: white;
    font-size: 13px;
    color: #374151 !important;
    cursor: pointer;
    transition: 0.2s;
}

/* hover */
.dataTables_paginate .paginate_button:hover {
    background: #f3f4f6 !important;
}

/* active */
.dataTables_paginate .paginate_button.current {
    background: linear-gradient(135deg, #3b82f6, #6366f1) !important;
    color: white !important;
    border: none;
}

/* disabled */
.dataTables_paginate .paginate_button.disabled {
    opacity: 0.4;
    cursor: not-allowed;
}

</style>

<script>
    $('.workflow-type').on('change', function(){

    let workflow_id = $(this).data('workflow');

    let types = [];

    // collect all checked for this row
    $('.workflow-type[data-workflow="'+workflow_id+'"]:checked').each(function(){
        types.push($(this).val());
    });

    $.ajax({
        url: '/workflow/save-types',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            workflow_id: workflow_id,
            types: types
        },
        success: function(){
            console.log('Saved');
        }
    });

});
</script>

@endsection
