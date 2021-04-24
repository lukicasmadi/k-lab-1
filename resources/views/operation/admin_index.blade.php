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
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table id="tbl_operation" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="17%">Nama Operasi</th>
                                <th width="16%">Jenis Operasi</th>
                                <th width="13%">Tgl Mulai</th>
                                <th width="14%">Tgl Selesai</th>
                                <th width="6%">Lihat</th>
                                <th width="10%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalCreateRencanaOperasi" tabindex="-1" role="dialog" aria-labelledby="modalCreateRencanaOperasi" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('create_rencana_operasi_new') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="notes-box">
                                <div class="notes-content">
                                    <span class="colorblue">TAMBAH RENCANA OPERASI</span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                                        <div class="row imgpopup">
                                            <img src="{{ asset('/img/line_popbottom.png') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="text-popup">Jenis Operasi Yang Akan Dilaksanakan</label>
                                            <input type="text" name="jenis_operasi" id="jenis_operasi" class="form-control popoups" value="" placeholder="- Tulis jenis operasi yang akan Anda laksanakan" autocomplete="off">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="text-popup">Nama Operasi</label>
                                            <input type="text" name="nama_operasi" id="nama_operasi" class="form-control popoups" value="" placeholder="- Tulislah nama operasi yang akan Anda buat" autocomplete="off">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="text-popup">Tanggal Mulai</label>
                                            <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control popoups inp-icon" value="" placeholder="- dd-mm-yyyy">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="text-popup">Tanggal Selesai</label>
                                            <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control popoups inp-icon" value="" placeholder="- dd-mm-yyyy">
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

        <div class="modal fade" id="editRencanaOperasi" tabindex="-1" role="dialog" aria-labelledby="editRencanaOperasi" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form id="formEdit" method="POST" action="">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="notes-box">
                                <div class="notes-content">
                                    <span class="colorblue">EDIT RENCANA OPERASI</span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                                        <div class="row imgpopup">
                                            <img src="{{ asset('/img/line_popbottom.png') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="uuid_edit" id="uuid_edit">

                                        <div class="col-md-12 mb-3">
                                            <label class="text-popup">Jenis Operasi Yang Akan Dilaksanakan</label>
                                            <input type="text" name="edit_jenis_operasi" id="edit_jenis_operasi" class="form-control popoups">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="text-popup">Nama Operasi</label>
                                            <input type="text" name="edit_nama_operasi" id="edit_nama_operasi" class="form-control popoups">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="text-popup">Tanggal Mulai</label>
                                            <input type="text" name="edit_tanggal_mulai" id="edit_tanggal_mulai" class="form-control popoups inp-icon">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="text-popup">Tanggal Selesai</label>
                                            <input type="text" name="edit_tanggal_selesai" id="edit_tanggal_selesai" class="form-control popoups inp-icon">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" class="btn" value="UPDATE" id="btn-n-add">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="showRencanaOperasi" tabindex="-1" role="dialog" aria-labelledby="showRencanaOperasi" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <span class="colorblue">VIEW RENCANA OPERASI</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                                    <div class="row imgpopup">
                                        <img src="{{ asset('/img/line_popbottom.png') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="uuid_preview" id="uuid_preview">
                                    <div class="col-md-12 mb-4">
                                        <label class="text-popup">Jenis Operasi Yang Akan Dilaksanakan</label><br>
                                        <span class="colorgray" id="view_jenis_operasi"></span>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label class="text-popup">Nama Operasi</label><br>
                                        <span class="colorgray" id="view_nama_operasi"></span>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label class="text-popup">Tanggal Mulai</label><br>
                                        <span class="colorgray" id="view_tanggal_mulai"></span>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label class="text-popup">Tanggal Selesai</label><br>
                                        <span class="colorgray" id="view_tanggal_selesai"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" name="btnRedirectEdit" id="btnRedirectEdit" class="btn btnBlue" value="EDIT">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/components/custom-sweetalert.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/custom.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('page_js')
<script>

    $("#btn-add-notes").click(function (e) {
        e.preventDefault();
        $('#modalCreateRencanaOperasi').modal('show');
    });

    $(document).ready(function () {
        $('#tanggal_mulai').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
        })

        $('#tanggal_selesai').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
        })

        $('#edit_tanggal_mulai').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
        })

        $('#edit_tanggal_selesai').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
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
                "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "CARI DATA...",
                "sLengthMenu": " _MENU_ ",
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
                    data: 'uuid',
                    render: function(data, type, row) {
                        return `
                        <div class="icon-container">
                            <a href="#" class="viewData" idval="`+data+`">
                                <img src="{{ asset('/img/search.png') }}" width="45%">
                            </a>
                        </div>
                        `;
                    },
                    searchable: false,
                    sortable: false,
                },
                {
                    data: 'uuid',
                    render: function(data, type, row) {
                        return `
                        <div class="ubah-change">
                            <a class="editData" idval="`+data+`" href="#">Ubah</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a class="delete" idval="`+data+`" href="#">Hapus</a>
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
            var id = $(this).attr('idval')

            swal({
                title: 'Jika data ini dihapus maka semua inputan polda yang menggunakan data ini akan otomatis terhapus?',
                text: "Anda yakin?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                padding: '2em',
            }).then(function(result) {
                if (result.value) {
                    axios.delete(route('rencana_operasi_destroy', id)).then(function(response) {
                        table.ajax.reload()
                        swal('Sukses!', response.data.output, 'success')
                    })
                    .catch(function(error) {
                        swal("Gagal", "Data gagal dihapus! Silahkan hubungi admin", "error")
                    })
                }
            })
        })

        $('#tbl_operation tbody').on('click', 'a.viewData', function(e) {
            e.preventDefault()
            var uuid = $(this).attr("idval")
            axios.get(route('rencana_operasi_by_uuid', uuid)).then(function(response) {
                if(response.status == 200) {
                    if(!response.data.operation_type) {
                        var op = "-"
                    } else {
                        var op = response.data.operation_type
                    }
                    $("#view_jenis_operasi").html(op)
                    $("#view_nama_operasi").html(response.data.name)
                    $("#view_tanggal_mulai").html(response.data.start_date)
                    $("#view_tanggal_selesai").html(response.data.end_date)
                    $("#view_deskripsi").html(response.data.desc)
                    $("#uuid_preview").val(uuid)
                    $('#showRencanaOperasi').modal('show')
                } else {
                    swal("Not found", error.response.data.output, "error")
                }
            })
            .catch(function(error) {
                swal("Get data failed! Maybe you miss something", error.response.data.output, "error")
            })
        })

        $('#tbl_operation tbody').on('click', 'a.editData', function(e) {
            e.preventDefault()
            var uuid = $(this).attr("idval")
            axios.get(route('rencana_operasi_by_uuid', uuid)).then(function(response) {
                if(response.status == 200) {
                    $("#edit_jenis_operasi").val(response.data.operation_type)
                    $("#edit_nama_operasi").val(response.data.name)
                    $("#edit_tanggal_mulai").val(response.data.start_date)
                    $("#edit_tanggal_selesai").val(response.data.end_date)
                    $("#edit_deskripsi").val(response.data.desc)
                    $("#uuid_edit").val(uuid)
                    $("#formEdit").attr("action", route('edit_rencana_operasi_new'))
                    $('#editRencanaOperasi').modal('show')
                } else {
                    swal("Not found", error.response.data.output, "error")
                }
            })
            .catch(function(error) {
                swal("Get data failed! Maybe you miss something", error.response.data.output, "error")
            })
        })
    })

    $('body').on('click', '#btnRedirectEdit', function(e) {
        e.preventDefault()
        $('#showRencanaOperasi').modal('hide')
        var uuid = $("#uuid_preview").val()
        axios.get(route('rencana_operasi_by_uuid', uuid)).then(function(response) {
            if(response.status == 200) {
                $("#edit_jenis_operasi").val(response.data.operation_type)
                $("#edit_nama_operasi").val(response.data.name)
                $("#edit_tanggal_mulai").val(response.data.start_date)
                $("#edit_tanggal_selesai").val(response.data.end_date)
                $("#edit_deskripsi").val(response.data.desc)
                $("#uuid_edit").val(uuid)
                $("#formEdit").attr("action", route('edit_rencana_operasi_new'))
                $('#editRencanaOperasi').modal('show')
            } else {
                swal("Not found", error.response.data.output, "error")
            }
        })
        .catch(function(error) {
            swal("Get data failed! Maybe you miss something", error.response.data.output, "error")
        })
    })
    </script>
@endpush