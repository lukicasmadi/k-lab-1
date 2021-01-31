@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="col-md-12 text-right mb-3">
                    <a href="{{ route('rencana_operasi_create') }}" class="btn btn-success">Add New</a>
                </div>
                <div class="table-responsive">
                    <table id="tbl_operation" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Operation Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description</th>
                                <th>Attachment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/components/custom-sweetalert.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_js')
<script>
    $(document).ready(function () {
        var table = $('#tbl_operation').DataTable({
            processing: true,
            serverSide: true,
            columnDefs: [
                {
                    className: "tengah", "targets": [6]
                }
            ],
            ajax: route('operation_plan_data'),
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<i class="fas fa-arrow-circle-left dtIconSize"></i>',
                    "sNext": '<i class="fas fa-arrow-circle-right dtIconSize"></i>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
                "sProcessing": '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>',
            },
            order: [
                [0, "desc"]
            ],
            columns: [
                {
                    data: 'id',
                    visible: false,
                    searchable: false
                },
                {
                    data: 'name',
                },
                {
                    data: 'operation_type',
                    render: function(data, type, row) {
                        return ifEmptyData(data);
                    },
                },
                {
                    data: 'start_date',
                },
                {
                    data: 'end_date',
                },
                {
                    data: 'desc',
                    render: function(data, type, row) {
                        return ifEmptyData(data);
                    },
                    sortable: false
                },
                {
                    data: 'attachement',
                    render: function(data, type, row) {
                        return operationDownload(data);
                    },
                    sortable: false,
                    searchable: false,
                },
                {
                    data: 'uuid',
                    render: function(data, type, row) {
                        return `
                        <div class="icon-container">
                            <a href="`+route('rencana_operasi_edit', data)+`"><i class="far fa-edit"></i></a> <a href="`+route('rencana_operasi_destroy', data)+`" class="delete" data-id="`+data+`"><i class="far fa-trash-alt"></i><span class="icon-name"></span></a>
                        </div>
                        `;
                    },
                    searchable: false,
                    sortable: false,
                }
            ]
        })

        $('#tbl_operation tbody').on('click', '.delete', function(e) {
            e.preventDefault()
            var id = $(this).attr('data-id')

            $(".alert").remove()

            swal({
                title: 'Are you sure?',
                text: "Detele this data!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                padding: '2em',
            }).then(function(result) {
                if (result.value) {
                    axios.delete(route('rencana_operasi_destroy', id)).then(function(response) {
                        table.ajax.reload()
                        swal('Deleted!', response.data.output, 'success')
                    })
                    .catch(function(error) {
                        swal("Deletion failed! Maybe you miss something", error.response.data.output, "error")
                    })
                }
            })
        })
    })
    </script>
@endpush