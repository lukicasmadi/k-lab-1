@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="col-md-12 text-right mb-3">
                    <a href="{{ route('unit_create') }}" class="btn btn-success">Add New</a>
                </div>
                <div class="table-responsive">
                    <table id="tbl_unit" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="30%">Name</th>
                                <th width="20%">Unit Called</th>
                                <th width="30%">Profile</th>
                                <th width="10%">Logo</th>
                                <th width="10%">Action</th>
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
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/sweetalerts/sweetalert.css') }}"/>
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
    var table = $('#tbl_unit').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('unit_data'),
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
                data: 'aka',
                render: function(data, type, row) {
                    return ifEmptyData(data);
                },
            },
            {
                data: 'profile',
                render: function(data, type, row) {
                    return ifEmptyData(trimString(data));
                },
            },
            {
                data: 'logo',
                render: function(data, type, row) {
                    return ifEmptyData(data);
                },
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href="`+route('unit_edit', data)+`"><i class="far fa-edit"></i></a> <a href="`+route('unit_destroy', data)+`" class="delete" data-id="`+data+`"><i class="far fa-trash-alt"></i><span class="icon-name"></span></a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            }
        ]
    })

    $('#tbl_unit tbody').on('click', '.delete', function(e) {
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
                axios.delete(route('unit_destroy', id)).then(function(response) {
                    table.ajax.reload()
                    swal('Deleted!', response.data.output, 'success')
                })
                .catch(function(error) {
                    swal("Error delete! Please refresh the page and try again", error.response.data.output, "error")
                })
            }
        })
    })
})
</script>
@endpush