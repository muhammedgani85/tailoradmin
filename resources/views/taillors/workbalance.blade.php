@extends('layouts.app')

@section('content')

    <x-common.page-breadcrumb pageTitle="Users" />





            <!-- Detail Page -->
<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-white/[0.05] dark:bg-white/[0.03]">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Work Balance
        </h3>


    </div>

    <!-- Table -->
     <div class="flex items-center justify-between mb-4" style="padding-top:5px;">

    <!-- LEFT: EXPORT -->
    <div id="exportButtons" class="flex gap-2" style="padding-left: 10px;"></div>

    <!-- RIGHT: SEARCH -->
    <input type="text" id="customSearch"
        placeholder="Search..."
        class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-200" style="margin-right: 10px;">
</div>
    <div class="overflow-hidden">
         <div class="max-w-full overflow-x-auto">
           <table class="w-full" id="myTable">

    <!-- HEADER -->
    <thead class="px-6 py-3.5 border-t border-gray-100 border-y bg-gray-50 dark:border-white/[0.05] dark:bg-gray-900">
        <tr class="border-y">
            <th class="px-4 py-3 text-left text-gray-500 text-sm">Tailor</th>

            @foreach($types as $type)
                <th class="p-2 text-center">{{ $type->type }}</th>
            @endforeach

            <th class="px-4 py-3 text-left text-gray-500 text-sm">Total</th>
        </tr>
    </thead>

    <!-- BODY -->
    <tbody class="divide-y">
        @foreach($tailors as $t)
 @php $total = 0; @endphp
        <tr >

            <!-- Tailor Name -->
            <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ $t->name }}</td>



            <!-- LOOP TYPES -->
            @foreach($types as $type)

                @php
                    // find matching qty
                    $qty = optional(
                        $t->tailorTypes->firstWhere('type_id', $type->id)
                    )->qty ?? 0;

                    $total += $qty;
                @endphp

                <td class="p-2 text-center">{{ $qty }}</td>

            @endforeach

            <!-- TOTAL -->
            <td class="p-2 text-center font-bold {{ $total < 10 ? 'text-red-600' : '' }}">
    {{ $total }}
</td>

        </tr>

        @endforeach
    </tbody>

</table>

        </div>
    </div>

</div>



<!-- JS -->
            <!-- Details Page End -->


    </div>
@endsection
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

    var table = $('#myTable').DataTable({

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
                text: '📊 Excel',
                className: 'inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-2 py-2 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300'
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
.bg-red-50{
    background-color: red !important;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   $(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#tailorForm').submit(function(e){
        e.preventDefault();

        let id = $('#tailor_id').val(); // ✅ FIXED
        let url = id ? '/tailors/' + id : '/tailors';

        let formData = $(this).serialize();


        if(id){
            formData += '&_method=PUT';
        }

        console.log("FORM DATA:", formData); // 🔥 debug

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,

            success: function(res){

                console.log("RESPONSE:", res);

                if(typeof res === 'string'){
                    res = JSON.parse(res);
                }

                if(!res.success){
                    Swal.fire('Error', res.message, 'error');
                    return;
                }

                Swal.fire({
                    icon: 'success',
                    title: id ? 'Updated' : 'Saved',
                    text: res.message
                }).then(() => location.reload());
            },

            error: function(err){
                console.log("ERROR:", err.responseText);

                Swal.fire('Error', 'Something went wrong', 'error');
            }
        });

    });

});



function toggleStatus(id){
    $.post('/tailors/toggle-status',{
        _token:'{{ csrf_token() }}',
        id:id
    },()=>location.reload());
}

function toggleCount(el, id){
    let input = document.getElementById(id);

    if(el.checked){
        input.classList.remove('hidden');
        input.focus();
    }else{
        input.classList.add('hidden');
        input.value = ''; // clear value
    }
}
</script>
<script>
function editTailor(id){

    $.get('/tailors/'+id+'/edit', function(data){

        // 👉 set basic fields
        $('#tailor_id').val(data.id);

        $('input[name=name]').val(data.name);
        $('input[name=phone]').val(data.phone);
        $('textarea[name=address]').val(data.address);

        $('select[name=roles]').val(data.roles).trigger('change');
        $('select[name=state]').val(data.state).trigger('change');
        $('select[name=city]').val(data.city).trigger('change');
        $('select[name=district]').val(data.district).trigger('change');

        // 🔥 RESET ALL TYPES
        $('input[type=checkbox]').prop('checked', false);
        $('input[type=number]').addClass('hidden').prop('enabled', true).val('');

        // 🔥 SET TYPES (USE tailor_types)
        if(data.tailor_types){
            data.tailor_types.forEach(t => {

                let typeId = t.type_id;

                // checkbox
                $('#chk'+typeId).prop('checked', true);

                // input
                $('#type'+typeId)
                    .removeClass('hidden')
                    .prop('disabled', false)
                    .val(t.qty);
            });
        }

        openModal();
    });
}


function updateStatus(id, status){

    $.ajax({
        url: '/tailors/toggle-status',
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
