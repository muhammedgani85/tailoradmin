@extends('layouts.app')

@section('content')
    <div class="rounded-2xl border border-gray-200 bg-white pt-4">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Type Management
        </h3>

       <button onclick="openModal()"
    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
    + Add Types
</button>



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

           <table class="min-w-full mt-6" id="typetable">
    <thead style="background-color: lightgrey;">
        <tr class="border-y">
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Type</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Status</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Icons</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Added By</th>
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Added Date</th>
            <th class="px-4 py-3 text-right text-gray-500 text-sm">Action</th>
        </tr>
    </thead>

    <tbody class="divide-y">

        @foreach ($types as $typevalues )


        <tr>
            <td class="px-4 py-4 font-medium">{{ ucfirst($typevalues->type) }}</td>
            <td class="px-4 py-4">

 <div x-data="{ switcherToggle: {{ json_encode($typevalues->status == 'active') }} }">
    <label class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none">

        <div class="relative">
            <input type="checkbox" class="sr-only"
                x-model="switcherToggle"
                @change="updateStatus({{ $typevalues->id }}, switcherToggle)"
            />

            <div class="block h-6 w-11 rounded-full"
                :class="switcherToggle ? 'bg-green-500' : 'bg-gray-300'">
            </div>

            <div :class="switcherToggle ? 'translate-x-full' : 'translate-x-0'"
                class="absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white duration-300">
            </div>
        </div>

        <!-- <span x-text="switcherToggle ? 'ON' : 'OFF'"></span> -->

    </label>
</div>


</td>
            <td class="px-4 py-4">{!! $typevalues->description !!}</td>

            <td class="px-4 py-4">{{ $typevalues->created_by }}</td>
            <td class="px-4 py-4">{{ $typevalues->created_at->format('d-m-Y') }}</td>
            <td class="px-4 py-4 text-right space-x-2">
               <button onclick="editType({{ $typevalues->id }})" class="text-green-600">
    <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206Z" />
    </svg>
</button>

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
                Add Type
            </h3>
            <button onclick="closeModal()" class="text-xl text-gray-500 hover:text-red-500">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6 max-h-[80vh] overflow-y-auto">

           <form id="typeForm" method="POST">
    @csrf
    <input type="hidden" id="type_id">

    <div class="grid grid-cols-2 gap-4">

        <!-- TYPE -->
        <div class="flex items-center gap-2">
            <label class="w-24 text-sm text-gray-700">Type :</label>
            <input name="type" class="input flex-1" placeholder="Enter Type" required>
        </div>

        <!-- STATUS -->
        <div class="flex items-center gap-2">
            <label class="w-20 text-sm text-gray-700">Status :</label>
            <select name="status" class="input flex-1">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <!-- COMMENTS -->
        <div class="col-span-2 flex items-start gap-2">
            <label class="w-24 text-sm text-gray-700 mt-2">Icons</label>
            <textarea name="comments" class="input flex-1"></textarea>

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

    $('#typeForm').on('submit', function(e){
        e.preventDefault();   // VERY IMPORTANT

        console.log("Form blocked ✅");

        let id = $('#type_id').val();
        let url = id ? '/types/'+id : '/types';

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
                //$('#typeForm')[0].reset();


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

    var table = $('#typetable').DataTable({

        dom: 't<"flex justify-end mt-4"p>', // table + right pagination

        pageLength: 5,
        paging: true,
        ordering: true,
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
        url: '/types/toggle-status',
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

    $.get('/types/' + id + '/edit', function(data){

        // fill form
        $('#type_id').val(data.id);
        $('input[name=type]').val(data.type);
        $('select[name=status]').val(data.status);
        $('textarea[name=comments]').val(data.description);

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


@endsection
