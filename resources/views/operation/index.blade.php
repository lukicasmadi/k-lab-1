@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
            <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
            </svg>
            <span>rencana operasi</span>
            </h3>
        </div>                    
        <div class="toggle-switch">
            <label class="switch s-icons s-outline  s-outline-secondary">
                <input type="checkbox" checked="" class="theme-shifter" id="changeTheme">
                <span class="slider round">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                </span>
            </label>
        </div>
    </div>
</div>
<div class="layout-px-spacing">
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content">
                <div class="col-md-12 text-left mb-3">
                    <a href="{{ route('rencana_operasi_create') }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
            <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
            </svg> Tambah Rencana Operasi</a>
                </div>
                <div class="table-responsive">
                    <table id="tbl_operation" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Operasi</th>
                                <th>Jenis Operasi</th>
                                <th>TGL Mulai</th>
                                <th>Durasi</th>
                                <th>Deskripsi</th>
                                <th>Lihat</th>
                                <th>Pilihan</th>
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
                    "sPrevious": '<i class="fas fa-chevron-left dtIconSize"></i>',
                    "sNext": '<i class="fas fa-chevron-right dtIconSize"></i>'
                },
                "sInfo": "Menampilkan _PAGE_ hingga 12 dari _PAGES_ baris",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "CARI DATA...",
                "sLengthMenu": " _MENU_ Baris per halaman",
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