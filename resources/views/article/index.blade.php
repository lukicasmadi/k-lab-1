@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>REKAP HARIAN</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="col-md-12 text-right mb-3">
                    <a href="{{ route('article_add') }}" class="btn btn-success">Add New</a>
                </div>
                <div class="table-responsive">
                    <table id="tbl_article" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Topic</th>
                                <th>Desc</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Creator</th>
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
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
@endpush

@push('page_js')
<script>
$(document).ready(function() {

    if ($('#tbl_article').length) {
        $('#tbl_article').DataTable({
            processing: true,
            serverSide: true,
            ajax: route('article_data'),
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
            columns: [{
                    data: 'id',
                    visible: false,
                    searchable: false
                },
                {
                    data: 'topic',
                },
                {
                    data: 'desc',
                    render: function(data, type, row) {
                        return trimString(data)
                    },
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        if (data == "active") {
                            return '<td class="text-center"><span class="shadow-none badge badge-success">' + data + '</span></td>'
                        } else {
                            return '<td class="text-center"><span class="shadow-none badge badge-danger">' + data + '</span></td>'
                        }
                    },
                },
                {
                    data: 'category.name',
                    name: 'category.name'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'uuid',
                    render: function(data, type, row) {
                        return '<div class="icon-container"><a href="' + route('article_edit', data) + '"><i class="far fa-edit"></i><span class="icon-name"></span></a> <a href="' + route('article_delete', data) + '"><i class="far fa-trash-alt"></i><span class="icon-name"></span></a></div>';
                    },
                    searchable: false,
                    sortable: false
                }
            ]
        })
    }
})
</script>
@endpush