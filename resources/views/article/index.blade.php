@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>MASTER ARTIKEL</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
                @if ($errors->any())
                    <div class="alert alert-danger custom">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-12 text-left mb-3">
                    <div class="text-left">
                        <div class="row">
                            <a id="btnShowModal" class="btn add-operasi" href="{{ route('article_add') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/></svg>
                            TAMBAH ARTIKEL
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table id="tbl_article" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="20%">Topic</th>
                                <th width="20%">Desc</th>
                                <th width="10%">Status</th>
                                <th width="15%">Creator</th>
                                <th width="15%">Action</th>
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
                    "sPrevious": '<i class="fas fa-chevron-left dtIconSize"></i>',
                    "sNext": '<i class="fas fa-chevron-right dtIconSize"></i>'
                },
                "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "CARI DATA...",
                "sLengthMenu": " _MENU_ ",
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
                            return '<td class="text-center"><span class="shadow-none badge badge-success">AKTIF</span></td>'
                        } else {
                            return '<td class="text-center"><span class="shadow-none badge badge-danger">TIDAK AKTIF</span></td>'
                        }
                    },
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'uuid',
                    render: function(data, type, row) {
                        return '<div class="ubah-change"><a href="' + route('article_edit', data) + '">UBAH</a> <span> &nbsp; | &nbsp; </span> <a href="' + route('article_delete', data) + '">HAPUS</a></div>';
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