@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white pt-4">

    <div class="flex items-center justify-between px-6 mb-4">
        <h3 class="text-lg font-semibold text-gray-800">
            Correction Notes
        </h3>

        <button type="button"
            onclick="openCorrectionNoteModal()"
            class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600">
            + Add Correction Note
        </button>
    </div>

    <div class="flex items-center justify-between mb-4 gap-3 flex-wrap"
         style="padding-top:5px;">

        <div id="exportButtons" class="flex gap-2" style="padding-left:10px;"></div>

        <div class="flex items-center gap-2" style="margin-right:10px;">

            <select
                id="typeFilter"
                class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-200"
                style="min-width:180px;">

                <option value="">All Types</option>

                @foreach($types as $type)
                    <option value="{{ $type->type }}">
                        {{ $type->type }}
                    </option>
                @endforeach

            </select>

            <input
                type="text"
                id="customSearch"
                placeholder="Search..."
                class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-200">

        </div>
    </div>

    <div class="overflow-hidden">
        <div class="max-w-full px-5 overflow-x-auto">

            <table class="min-w-full mt-6" id="correctionNoteTable">

                <thead style="background-color:lightgrey;">
                    <tr class="border-y">
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">Type</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">Correction Note</th>
                        <th class="px-4 py-3 text-left text-gray-500 text-sm">Added Date</th>
                        <th class="px-4 py-3 text-right text-gray-500 text-sm">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach($correctionNotes as $note)
                        <tr>
                            <td class="px-4 py-4 font-medium">
                                {{ ucfirst($note->type?->type ?? '-') }}
                            </td>

                            <td class="px-4 py-4">
                                <div class="whitespace-pre-line">
                                    {{ $note->description }}
                                </div>
                            </td>

                            <td class="px-4 py-4">
                                {{ $note->created_at?->format('d-m-Y') ?? '--' }}
                            </td>

                            <td class="px-4 py-4 text-right">
                                <div class="inline-flex items-center gap-3">

                                    <button type="button"
                                        onclick="editCorrectionNote({{ $note->id }})"
                                        class="text-green-600 hover:text-green-800"
                                        title="Edit">
                                        <svg class="fill-current" width="21" height="21" viewBox="0 0 21 21">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206Z" />
                                        </svg>
                                    </button>

                                    <button type="button"
                                        onclick="deleteCorrectionNote({{ $note->id }})"
                                        class="text-red-600 hover:text-red-800"
                                        title="Delete">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4h8v2"/>
                                            <path d="M19 6l-1 14H6L5 6"/>
                                            <path d="M10 11v5"/>
                                            <path d="M14 11v5"/>
                                        </svg>
                                    </button>

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
<div id="correctionNoteModal"
    onclick="if(event.target.id==='correctionNoteModal') closeCorrectionNoteModal()"
    class="hidden fixed inset-0 z-[99999] items-center justify-center"
    style="background-color:rgba(0,0,0,.35);">

    <div class="relative"
        style="width:700px;max-width:95%;background:#fff;border-radius:12px;">

        <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-t-2xl">
            <h3 id="correctionNoteModalTitle" style="color:#000;font-size:18px;font-weight:600;">
                Add Correction Note
            </h3>

            <button type="button"
                onclick="closeCorrectionNoteModal()" style="color:#000;font-size:18px;font-weight:600;"
                class="hover:text-red-200">
                ✕
            </button>
        </div>

        <div class="p-6">

            <form id="correctionNoteForm">
                @csrf

                <input type="hidden" id="correction_note_id">

                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Type <span class="text-red-500">*</span>
                        </label>

                        <select name="type_id" id="type_id" class="input" required>
                            <option value="">Select Type</option>

                            @foreach($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->type }}
                                </option>
                            @endforeach
                        </select>

                        <div id="type_id_error" class="text-red-500 text-xs mt-1"></div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Correction Note <span class="text-red-500">*</span>
                        </label>

                        <textarea name="description"
                            id="description"
                            rows="6"
                            maxlength="5000"
                            class="input"
                            placeholder="Enter correction note..."
                            required></textarea>

                        <div id="description_error" class="text-red-500 text-xs mt-1"></div>
                    </div>

                </div>

                <div class="flex justify-end gap-3 mt-6">

                    <button type="button"
                        onclick="closeCorrectionNoteModal()"
                        class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit"
                        id="saveCorrectionNoteButton"
                        class="px-4 py-2 bg-brand-500 text-white rounded-lg">
                        Save
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>



<style>
/* =========================================================
   CORRECTION NOTE DATATABLE PAGINATION
========================================================= */

#correctionNoteTable_wrapper {
    width: 100%;
}

.dt-bottom {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-top: 16px;
    padding: 0 4px 12px;
}

.dt-info {
    display: none !important;
}

.dt-pagination {
    margin-left: auto;
}

.dataTables_paginate {
    display: flex !important;
    align-items: center;
    justify-content: flex-end;
    gap: 5px;
}

.dataTables_paginate .paginate_button {
    min-width: 34px;
    height: 34px;
    padding: 0 10px !important;
    margin: 0 !important;

    display: inline-flex !important;
    align-items: center;
    justify-content: center;

    border: 1px solid #e5e7eb !important;
    border-radius: 8px !important;

    background: #ffffff !important;
    color: #374151 !important;

    font-size: 13px;
    line-height: 1;

    cursor: pointer;
    transition: all .15s ease;
}

.dataTables_paginate .paginate_button:hover {
    background: #f3f4f6 !important;
    border-color: #d1d5db !important;
    color: #111827 !important;
}

.dataTables_paginate .paginate_button.current,
.dataTables_paginate .paginate_button.current:hover {
    background: #3b82f6 !important;
    border-color: #3b82f6 !important;
    color: #ffffff !important;
}

.dataTables_paginate .paginate_button.disabled,
.dataTables_paginate .paginate_button.disabled:hover {
    opacity: .45;
    cursor: not-allowed;
    background: #ffffff !important;
    color: #9ca3af !important;
}

.dataTables_paginate .ellipsis {
    padding: 0 5px;
    color: #6b7280;
}

@media (max-width: 640px) {
    .dt-bottom {
        justify-content: center;
    }

    .dataTables_paginate {
        justify-content: center;
    }
}
</style>

<style>
.input {
    width:100%;
    margin-top:6px;
    padding:10px 12px;
    border:1px solid #000;
    border-radius:10px;
    outline:none;
}

.input:focus {
    border-color:#3b82f6;
    box-shadow:0 0 0 2px rgba(59,130,246,.2);
}
</style>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


<script>
let correctionNoteTable;

function openCorrectionNoteModal()
{
    $('#correctionNoteForm')[0].reset();
    $('#correction_note_id').val('');
    $('#correctionNoteModalTitle').text('Add Correction Note');
    clearCorrectionNoteErrors();

    const modal = document.getElementById('correctionNoteModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeCorrectionNoteModal()
{
    const modal = document.getElementById('correctionNoteModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    clearCorrectionNoteErrors();
}

function clearCorrectionNoteErrors()
{
    $('#type_id_error').text('');
    $('#description_error').text('');

    $('#type_id').removeClass('border-red-500');
    $('#description').removeClass('border-red-500');
}

$('#correctionNoteForm').on('submit', function(e)
{
    e.preventDefault();

    clearCorrectionNoteErrors();

    const id = $('#correction_note_id').val();

    const url = id
        ? '/correction-notes/' + id
        : '/correction-notes';

    const method = id ? 'PUT' : 'POST';

    const button = $('#saveCorrectionNoteButton');

    button.prop('disabled', true);

    $.ajax({
        url: url,
        type: method,
        data: $(this).serialize(),

        success: function(res)
        {
            if(res.success)
            {
                closeCorrectionNoteModal();

                Swal.fire({
                    icon:'success',
                    title:'Success',
                    text:res.message,
                    width:'320px',
                    padding:'1rem',
                    showConfirmButton:false,
                    timer:1200
                }).then(function(){
                    location.reload();
                });
            }
        },

        error: function(xhr)
        {
            if(xhr.status === 422)
            {
                const errors = xhr.responseJSON?.errors || {};

                if(errors.type_id)
                {
                    $('#type_id_error').text(errors.type_id[0]);
                    $('#type_id').addClass('border-red-500');
                }

                if(errors.description)
                {
                    $('#description_error').text(errors.description[0]);
                    $('#description').addClass('border-red-500');
                }

                if(xhr.responseJSON?.message)
                {
                    Swal.fire('Validation', xhr.responseJSON.message, 'warning');
                }

                return;
            }

            Swal.fire('Error','Server error. Please try again.','error');
        },

        complete: function()
        {
            button.prop('disabled', false);
        }
    });
});

function editCorrectionNote(id)
{
    clearCorrectionNoteErrors();

    $.get('/correction-notes/' + id + '/edit', function(res)
    {
        if(!res.success)
        {
            Swal.fire('Error','Unable to load correction note.','error');
            return;
        }

        const data = res.data;

        $('#correction_note_id').val(data.id);
        $('#type_id').val(data.type_id);
        $('#description').val(data.description);

        $('#correctionNoteModalTitle').text('Edit Correction Note');

        const modal = document.getElementById('correctionNoteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }).fail(function(){
        Swal.fire('Error','Unable to load correction note.','error');
    });
}

function deleteCorrectionNote(id)
{
    Swal.fire({
        title:'Delete correction note?',
        text:'This correction note will be removed.',
        icon:'warning',
        showCancelButton:true,
        confirmButtonText:'Yes, Delete',
        cancelButtonText:'Cancel',
        confirmButtonColor:'#dc2626'
    }).then(function(result)
    {
        if(!result.isConfirmed) return;

        $.ajax({
            url:'/correction-notes/' + id,
            type:'DELETE',
            data:{
                _token:'{{ csrf_token() }}'
            },

            success:function(res)
            {
                if(res.success)
                {
                    Swal.fire({
                        icon:'success',
                        title:'Deleted',
                        text:res.message,
                        showConfirmButton:false,
                        timer:1200
                    }).then(function(){
                        location.reload();
                    });
                }
            },

            error:function(xhr)
            {
                Swal.fire(
                    'Error',
                    xhr.responseJSON?.message || 'Unable to delete correction note.',
                    'error'
                );
            }
        });
    });
}

$(document).ready(function()
{
    correctionNoteTable = $('#correctionNoteTable').DataTable({

        dom:
            '<"dt-top"t>' +
            '<"dt-bottom"<"dt-info"i><"dt-pagination"p>>',

        pageLength: 15,

        paging: true,

        ordering: true,

        searching: true,

        info: false,

        lengthChange: false,

        autoWidth: false,

        pagingType: 'simple_numbers',

        language: {
            emptyTable: 'No correction notes found',
            zeroRecords: 'No matching correction notes found',
            paginate: {
                previous: '‹',
                next: '›'
            }
        },

        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export',
                className:
                    'shadow-theme-xs inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition hover:bg-gray-50'
            }
        ]

    });


    correctionNoteTable
        .buttons()
        .container()
        .appendTo('#exportButtons');


    /* Search */
    $('#customSearch').on('keyup', function()
    {
        correctionNoteTable
            .search(this.value)
            .draw();
    });


    /* Type filter - Type is column 0 */
    $('#typeFilter').on('change', function()
    {
        const type = this.value;

        correctionNoteTable
            .column(0)
            .search(
                type
                    ? '^' + $.fn.dataTable.util.escapeRegex(type) + '$'
                    : '',
                true,
                false
            )
            .draw();
    });
});
</script>

@endsection
