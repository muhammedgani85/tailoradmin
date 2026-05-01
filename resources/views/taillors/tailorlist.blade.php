@extends('layouts.app')

@section('content')

    <x-common.page-breadcrumb pageTitle="Users" />
    <div class="space-y-6">
        <div class="col-span-12">
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]" >
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Total Users</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">{{ $tailors->count() }}</h4>
        </div>

        <div class="flex items-center gap-1">
          <!-- <span class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
            +20%
          </span> -->

          <!-- <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span> -->
        </div>
      </div>
    </div>
    <!-- Metric Item End -->

    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">Active Users</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">{{ $tailors->where('status','active')->count() }}</h4>
        </div>

        <div class="flex items-center gap-1">
          <!-- <span class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
            +4%
          </span>

          <!-- <span class="text-gray-500 text-theme-xs dark:text-gray-400"> Vs last month </span> -->
        </div>
      </div>
    </div>
    <!-- Metric Item End -->

    <!-- Metric Item Start -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <p class="text-gray-500 text-theme-sm dark:text-gray-400">InActive Users</p>

      <div class="flex items-end justify-between mt-3">
        <div>
          <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">{{ $tailors->where('status','inactive')->count() }}</h4>
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




            <!-- Detail Page -->
<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-white/[0.05] dark:bg-white/[0.03]">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            List
        </h3>

       <button onclick="openModal()"
    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
    + Add Users
</button>
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
                <thead class="px-6 py-3.5 border-t border-gray-100 border-y bg-gray-50 dark:border-white/[0.05] dark:bg-gray-900">
                    <tr class="border-y">
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">EmpID</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">Name</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">Phone</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">Roles</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">State</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">City</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">District</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">WorkLoad</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">Status</th>
                        <th class="px-4 py-3 text-right text-gray-500 text-sm">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                        @foreach ($tailors as $tail_list)


                    <tr>
                        <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ "E".$tail_list->id }}</td>
                        <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ $tail_list->name }}</td>
                        <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ $tail_list->phone }}</td>
                         <td>{{ $tail_list->roleType->type_name ?? '-' }}</td>

                        <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ $tail_list->state }}</td>
                        <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ $tail_list->city }}</td>
                        <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ $tail_list->district }}</td>
                        <td class="px-4 py-3 text-left text-gray-500 text-sm">{{ $tail_list->tailor_types_sum_qty ?? 0 }}</td>
                        <td>
                            <div x-data="{ switcherToggle: {{ json_encode($tail_list->status == 'active') }} }">
    <label class="flex cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none">

        <div class="relative">
            <input type="checkbox" class="sr-only"
                x-model="switcherToggle"
                @change="updateStatus({{ $tail_list->id }}, switcherToggle)"
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
                        <td class="px-4 py-4 text-right space-x-2">
                            <!-- <a href="{{ route('profile') }}">
    <button class="text-blue-600 hover:text-blue-800">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                fill="currentColor">
            </path>
        </svg>
    </button>
</a> -->
                            <button class="text-green-600" onclick="editTailor({{ $tail_list->id }})"><svg class="fill-current" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206ZM14.9697 4.59272C15.2626 4.29982 15.7375 4.29982 16.0304 4.59272L17.0027 5.56499C17.2956 5.85788 17.2956 6.33276 17.0027 6.62565L16.1043 7.52402L14.0714 5.49109L14.9697 4.59272ZM13.0107 6.55175L6.66806 12.8944C6.56526 12.9972 6.49455 13.1277 6.46454 13.2699L5.96704 15.6283L8.32547 15.1308C8.46772 15.1008 8.59819 15.0301 8.70099 14.9273L15.0436 8.58468L13.0107 6.55175Z" fill=""></path>
                                    </svg></button>



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
    class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-white/40 backdrop-blur-md" style="background-color: lightgray;">

    <!-- Modal Box -->
    <div class="relative" style="width: 900px !important;background: #FFFFFF; border-radius: 12px;" >

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-t-2xl">
            <h3 class="text-lg font-semibold text-gray-800">
                Add Users
            </h3>
            <button onclick="closeModal()" class="text-xl text-gray-500 hover:text-red-500">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6 max-h-[80vh] overflow-y-auto">

            <form id="tailorForm">
                <div class="grid grid-cols-2 gap-4">

    <!-- Row 1 -->
    <div class="flex items-center gap-2">
        <label class="w-24 text-sm text-gray-700">Name :</label>
        <input name="name" class="input flex-1" placeholder="Enter Name">
    </div>

    <div class="flex items-center gap-2">
        <label class="w-20 text-sm text-gray-700">Roles :</label>
        <select name="roles" class="input flex-1">
        @foreach ($user_type as $type)
            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
        @endforeach
        </select>

    </div>

    <!-- Row 2 -->
    <div class="flex items-center gap-2">
        <label class="w-24 text-sm text-gray-700">State :</label>
        <select name="state" class="input flex-1">
        @foreach ($state_list as $state)
            <option value="{{ $state->state_name }}">{{ $state->state_name }}</option>
        @endforeach
        </select>
    </div>

    <div class="flex items-center gap-2">
        <label class="w-20 text-sm text-gray-700">City :</label>
        <select name="city" class="input flex-1">
        @foreach ($city_list as $city)
            <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
            @endforeach
        </select>


    </div>

    <!-- Row 3 -->
    <div class="flex items-center gap-2">
        <label class="w-24 text-sm text-gray-700">Phone :</label>
        <input name="phone" class="input flex-1" placeholder="Enter Phone">
    </div>

    <div class="flex items-center gap-2">
        <label class="w-20 text-sm text-gray-700">District :</label>
        <select name="district" class="input flex-1">
         @foreach ($district_list as $district)
            <option value="{{ $district->district_name }}">{{ $district->district_name }}</option>
            @endforeach
        </select>
    </div>




    <!-- Address Full Width -->
    <div class="col-span-2 flex items-start gap-2">
        <label class="w-24 text-sm text-gray-700 mt-2">Address :</label>
        <textarea name="address" class="input flex-1" placeholder="Enter Address"></textarea>
    </div>

</div>

<!-- Specialist Section -->
<div class="col-span-2 mt-4">

    <label class="text-sm font-medium text-gray-700 mb-2 block">
        Specialist :
    </label>

    <div class="grid grid-cols-2 gap-4">

        @foreach($types as $type)
        <div class="flex items-center gap-2 whitespace-nowrap">

            <!-- CHECKBOX -->
            <input type="checkbox" id="chk{{ $type->id }}" data-target="type{{ $type->id }}"  onchange="toggleCount(this, 'type{{ $type->id }}')">

            <!-- NAME -->
            <span class="text-sm w-24">{{ $type->type }}</span>

            <!-- QTY -->
            <input type="number"
                name="type[{{ $type->id }}]"
                id="type{{ $type->id }}"
                class="input w-14  text-sm px-2 py-1"
                placeholder="Qty">
        </div>
        @endforeach

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
                <input type="hidden" id="tailor_id" name="id">
            </form>

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
