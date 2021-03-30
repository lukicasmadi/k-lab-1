@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>RENCANA OPERASI</span>
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
                            <a id="btn-add-notes" class="btn add-operasi" href="javascript:void(0);"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/>
                            </svg>
                            Tambah Rencana Operasi
                            </a>
                            <a class="btn del-operasi" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18.001" height="18.001" viewBox="0 0 18.001 18.001">
                            <path id="Union_24" data-name="Union 24" d="M-2992-9019a2,2,0,0,1-2-2v-14a2,2,0,0,1,2-2h14a2,2,0,0,1,2,2v14a2,2,0,0,1-2,2Zm0-2h14v-14h-14Zm7-5.586-2.831,2.828-1.415-1.415,2.83-2.828-2.828-2.829,1.413-1.415,2.828,2.828,2.83-2.828,1.415,1.415-2.831,2.829,2.831,2.83-1.415,1.413Z" transform="translate(2994.001 9037.001)" fill="#fff"/>
                            </svg>
                            Hapus Operasi</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tbl_operation" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Operasi</th>
                                <th>Operasi</th>
                                <th>Deskripsi</th>
                                <th>TGL Mulai</th>
                                <th>Durasi</th>
                                <th>Lihat</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalCreateRencanaOperasi" tabindex="-1" role="dialog" aria-labelledby="modalCreateRencanaOperasi" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('create_rencana_operasi_new') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="notes-box">
                                <div class="notes-content">
                                    <span class="colorblue">TAMBAH RENCANA OPERASI</span>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                        <div class="row imgpopup">
                                            <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="text-popup">Jenis Operasi Yang Akan Dilaksanakan</label>
                                            <input type="text" name="jenis_operasi" id="jenis_operasi" class="form-control" value="" placeholder="-   Tulis jenis operasi">
                                        </div>

                                        <div class="col-md-12">
                                            <label class="text-popup">Nama Operasi</label>
                                            <input type="text" name="nama_operasi" id="nama_operasi" class="form-control" value="" placeholder="-   Tulis nama operasi">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="text-popup">Tanggal Mulai</label>
                                            <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="" placeholder="-   Input tanggal mulai">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="text-popup">Tanggal Selesai</label>
                                            <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="" placeholder="-   Input tanggal selesai">
                                        </div>

                                        <div class="col-md-12">
                                        <label class="text-popup">Deskripsi</label>
                                            <div class="d-flex note-description">
                                                <textarea name="deskripsi" id="deskripsi" class="form-control " maxlength="60" placeholder="-   Tulis dekripsi rencana operasi Anda" rows="3"></textarea>
                                            </div>
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" class="btn" value="SIMPAN" id="btn-n-add">
                        </div>
                    </form>
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
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ secure_asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('page_js')
<script>

    $("#btn-add-notes").click(function (e) {
        e.preventDefault();
        $('#modalCreateRencanaOperasi').modal('show');
    });


    $(document).ready(function () {
        $('#tanggal_mulai').datepicker({
            format: 'yyyy-mm-dd',
        })

        $('#tanggal_selesai').datepicker({
            format: 'yyyy-mm-dd',
        })

        $('#notesMailModal').on('hidden.bs.modal', function () {
            $("#nama_operasi").val('')
            $("#jenis_operasi").val('')
            $("#tanggal_mulai").val('')
            $("#tanggal_selesai").val('')
        })

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
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> <img src="{{ secure_asset("/img/cloud_down.png") }}">',
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
                    data: 'desc',
                    render: function(data, type, row) {
                        return ifEmptyData(data);
                    },
                    sortable: false
                },
                {
                    data: 'start_date',
                },
                {
                    data: 'end_date',
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

        $('#tbl_operation tbody').on('click', '.fa-edit', function(e) {
            e.preventDefault()
            alert("edit")
        })
    })
    </script>
@endpush