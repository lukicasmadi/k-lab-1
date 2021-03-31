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
    @if ($errors->any())
        <div class="alert alert-danger custom">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
                <div class="col-md-12 text-left mb-3">
                    <div class="text-left">
                        <div class="row">
                            <a id="btnShowModal" class="btn add-operasi" href="javascript:void(0);"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/>
</svg>
    REKAP LAPORAN
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tbl_rekap_daily" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Laporan</th>
                                <th>Polda</th>
                                <th>Tahun</th>
                                <th>Nama Operasi</th>
                                <th>Tanggal Operasi</th>
                                <th>Lihat</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('korlantas_rekap_store') }}" id="form_add_rekap">
                        @csrf
                        <div class="modal-body">
                            <div class="notes-box">
                                <div class="notes-content">
                                    <span class="colorblue">TAMBAH LAPORAN</span>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                        <div class="row imgpopup">
                                            <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="text-popup">Nama Laporan</label>
                                            <input type="text" name="report_name" id="report_name" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-popup">Pilih Polda</label>
                                            <select class="form-control height-form" id="polda" name="polda">
                                                <option selected="selected" value="polda_all">-   Semua Polda</option>
                                                @foreach($listPolda as $key => $val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-popup">Tahun</label>
                                            <select class="form-control height-form" id="year" name="year">
                                                <option selected="">-   Pilih Tahun</option>
                                                @foreach($cleanYear as $key => $val)
                                                    <option value="{{$val}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-popup">Nama Operasi</label>
                                            <select class="form-control height-form" id="rencana_operasi_id" name="rencana_operasi_id">
                                                <option selected="selected" value="">-   Pilih operasi yang akan Anda laksanakan</option>
                                                @foreach($rencanaOperasi as $key => $val)
                                                    <option value="{{$key}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-popup">Hari Operasi</label>
                                            <select class="form-control height-form" id="operation_date" name="operation_date">
                                                <option value="semua_hari" selected="selected">-   Semua Hari</option>
                                                <option value="pilih_hari">-   Pilih Hari</option>
                                            </select>
                                            <input type="text" name="hari" id="hari" class="form-control d-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <input type="submit" value="SIMPAN" id="btn-n-add">
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

$('#modalForm').on('hidden.bs.modal', function () {
    $("#modalForm input").val('')
    $("#modalForm select").prop('selectedIndex', 0)
})

$('#modalForm').on('show.bs.modal', function () {
    $("#report_name").focus()
})

$(document).ready(function () {

    $("#btnShowModal").click(function (e) {
        e.preventDefault()
        $('#modalForm').modal('show')
    })

    $("#selected_hari").change(function (e) {
        e.preventDefault()
        $("#hari").val('')
        if($(this).val() == "pilih_hari") {
            $("#hari").removeClass("d-none")
        } else {
            $("#hari").addClass("d-none")
        }
    });

    $('#hari').datepicker({
        format: 'yyyy-mm-dd',
    })

    var table = $('#tbl_rekap_daily').DataTable({
        processing: true,
        serverSide: true,
        columnDefs: [
            {
                className: "tengah", "targets": [6]
            }
        ],
        ajax: route('korlantas_rekap_data'),
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
                searchable: false,
                sortable: false
            },
            {
                data: 'report_name',
            },
            {
                data: 'polda',
            },
            {
                data: 'year',
            },
            {
                data: 'rencana_operasi_id',
            },
            {
                data: 'operation_date',
                render: function (data, type, row, meta) {
                    if(data == "semua_hari") {
                        return "Semua Hari"
                    } else {
                        return data
                    }
                }
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href=""><i class="far fa-edit"></i></a>
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
                    <div class="icon-container">
                        <a href=""><i class="far fa-edit"></i></a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            }
        ]
    })

    // $('#tbl_rekap_daily tbody').on('click', '.delete', function(e) {
    //     e.preventDefault()
    //     var id = $(this).attr('data-id')

    //     $(".alert").remove()

    //     swal({
    //         title: 'Are you sure?',
    //         text: "Detele this data!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Delete',
    //         padding: '2em',
    //     }).then(function(result) {
    //         if (result.value) {
    //             axios.delete(route('rencana_operasi_destroy', id)).then(function(response) {
    //                 table.ajax.reload()
    //                 swal('Deleted!', response.data.output, 'success')
    //             })
    //             .catch(function(error) {
    //                 swal("Deletion failed! Maybe you miss something", error.response.data.output, "error")
    //             })
    //         }
    //     })
    // })
})
</script>
@endpush