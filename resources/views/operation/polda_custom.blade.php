@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20">
        <path id="calendar_check" d="M19,22H5a2,2,0,0,1-2-2V6A2,2,0,0,1,5,4H7V2H9V4h6V2h2V4h2a2,2,0,0,1,2,2V20A2,2,0,0,1,19,22ZM5,10V20H19V10ZM5,6V8H19V6Zm6,12.414L7.293,14.707l1.414-1.414L11,15.586l4.293-4.293,1.414,1.414L11,18.413Z" transform="translate(-3 -2)" fill="#00adef"/></svg>
        <span>TAMBAH ALIAS RENCANA OPERASI</span>
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
                <div class="col-md-12 text-left mb-3"></div>
                <div class="table-responsive mb-5">
                    <table id="tbl_operation" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="19%">Nama Operasi</th>
                                <th width="17%">Nama Alias</th>
                                <th width="15%">Operasi</th>
                                <th width="15%">Deskripsi</th>
                                <th width="14%">Mulai</th>
                                <th width="14%">Selesai</th>
                                <th class="text-center" width="3%">Lihat</th>
                                <th class="text-center" width="3%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="showRencanaOperasi" tabindex="-1" role="dialog" aria-labelledby="showRencanaOperasi" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <span class="colorblue">VIEW RENCANA OPERASI</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                    <div class="row imgpopup">
                                        <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="uuid_preview" id="uuid_preview">

                                    <div class="col-md-12 mb-4">
                                        <label class="text-popup">Alias Nama Operasi</label><br>
                                        <span class="colorgray" id="alias_name"></span>
                                    </div>

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

                                    <div class="col-md-12">
                                        <label class="text-popup">Deskripsi</label><br>
                                        <span class="colorgray" id="view_deskripsi"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addAlias" tabindex="-1" role="dialog" aria-labelledby="showRencanaOperasi" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <span class="colorblue">REKAP LAPORAN</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                                <span class="colorblue">ALIAS RENCANA OPERASI</span>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-1 mb-n3">
                                    <div class="row imgpopup">
                                        <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="rencana_operasi_id" id="rencana_operasi_id" value="">
                                        <label class="text-popup">Tambahkan atau ubah alias dari nama operasi</label><br>
                                        <input type="text" class="form-control popoups mt-1" name="custom_operation_name" id="custom_operation_name" autocomplete="off">
                                        <br>
                                        <div class="text-right" style="margin-right: -5px;">
                                        <button id="submitBtn" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        ajax: route('operation_plan_data_custom_alias'),
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
                data: 'name'
            },
            {
                data: 'alias_name',
                name: 'polda.name'
            },
            {
                data: 'operation_type',
                render: function(data, type, row, meta) {
                    return limitTableText(data, 20);
                },
            },
            {
                data: 'desc',
                render: function(data, type, row, meta) {
                    return limitTableText(data, 20);
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
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container text-center">
                        <a href="#" class="viewData" idval="`+data+`">
                            <img src="{{ secure_asset('/img/search.png') }}" width="55%">
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
                    <div class="ubah-change text-center">
                        <a href="`+route('get_data_polda_custom_name', data)+`" id="addAliasData" idval="`+data+`">
                        Ubah
                        </a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            }
        ]
    })

    $('body').on('click', '#submitBtn', function(e) {
        e.preventDefault()
        axios.post(route('post_data_polda_custom_name'), {
            alias: $("#custom_operation_name").val(),
            operation_id: $("#rencana_operasi_id").val()
        })
        .then(function (response) {
            $("#rencana_operasi_id").val('')
            if(response.status == 201) {
                $('#addAlias').modal('hide')
                swal("Nama alias berhasil anda daftarkan", null, "success")
            } else if(response.status == 200) {
                $('#addAlias').modal('hide')
                swal("Nama alias berhasil diubah", null, "success")
            } else {
                swal("Proses gagal. Silahkan cek inputan anda!", null, "error")
            }
            table.ajax.reload()
        })
        .catch(function (error) {
            swal("Get data failed! Maybe you miss something", error.response.data.output, "error")
        })
    })

    $('body').on('click', '#addAliasData', function(e) {
        e.preventDefault()
        var uuid = $(this).attr("idval")

        axios.get(route('get_data_polda_custom_name', uuid)).then(function(response) {
            if(response.status == 200) {
                $("#rencana_operasi_id").val(response.data.rencana_op_id)
                $("#custom_operation_name").val(response.data.output)
                $('#addAlias').modal('show')
            } else {
                swal("Not found", error.response.data.output, "error")
            }
        })
        .catch(function(error) {
            swal("Get data failed! Maybe you miss something", error.response.data.output, "error")
        })
    })

    $('body').on('keypress', '#custom_operation_name', function(e) {
        if (e.keyCode === 10 || e.keyCode === 13) {
            e.preventDefault()

            axios.post(route('post_data_polda_custom_name'), {
                alias: $("#custom_operation_name").val(),
                operation_id: $("#rencana_operasi_id").val()
            })
            .then(function (response) {
                $("#rencana_operasi_id").val('')
                if(response.status == 201) {
                    $('#addAlias').modal('hide')
                    swal("Nama alias berhasil anda daftarkan", null, "success")
                } else if(response.status == 200) {
                    $('#addAlias').modal('hide')
                    swal("Nama alias berhasil diubah", null, "success")
                } else {
                    swal("Proses gagal. Silahkan cek inputan anda!", null, "error")
                }
                table.ajax.reload()
            })
            .catch(function (error) {
                swal("Get data failed! Maybe you miss something", error.response.data.output, "error")
            })
        }
    })
})

$('#tbl_operation tbody').on('click', 'a.viewData', function(e) {
    e.preventDefault()
    var uuid = $(this).attr("idval")

    Promise.all([getRencanaOperasi(uuid), getDataCustomName(uuid)])
    .then(function (response) {

        const rencana_operasi = response[0]
        const custom_name = response[1]

        if(!rencana_operasi.data.operation_type) {
            var op = "-"
        } else {
            var op = rencana_operasi.data.operation_type
        }

        $("#view_jenis_operasi").html(op)
        $("#view_nama_operasi").html(rencana_operasi.data.name)
        $("#view_tanggal_mulai").html(rencana_operasi.data.start_date)
        $("#view_tanggal_selesai").html(rencana_operasi.data.end_date)
        $("#view_deskripsi").html(rencana_operasi.data.desc)
        $("#alias_name").empty().html(custom_name.data.alias)
        $("#uuid_preview").val(uuid)
        $('#showRencanaOperasi').modal('show')
    })
})

function getDataCustomName(uuid) {
    return axios.get(route('rencana_operasi_custom_name', uuid))
}

function getRencanaOperasi(uuid) {
    return axios.get(route('rencana_operasi_by_uuid', uuid))
}
</script>
@endpush