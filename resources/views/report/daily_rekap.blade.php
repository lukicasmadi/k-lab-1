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
                            <a id="btnShowModal" class="btn add-operasi" href="javascript:void(0);"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/></svg>
                            REKAP LAPORAN
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table id="tbl_rekap_daily" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="15%">Nama Laporan</th>
                                <th width="10%">Polda</th>
                                <th width="7%">Tahun</th>
                                <th width="15%">Nama Operasi</th>
                                <th width="10%">Hari</th>
                                <th width="10%">Mulai</th>
                                <th width="10%">Selesai</th>
                                <th width="3%">Lihat</th>
                                <th width="10%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('preview_pages.report_daily_add')
        @include('preview_pages.report_daily_edit')
        @include('preview_pages.report_daily_preview')
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
<link rel="stylesheet" type="text/css" href="{{ asset('css/loading.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
<script src="{{ asset('js/popup.js') }}"></script>
@endpush

@push('page_js')
<script>

$('#modalForm').on('hidden.bs.modal', function () {
    $("#report_name").val('')
    $("#tanggal_mulai").val('')
    $("#tanggal_selesai").val('')

    $(".custom_hari").addClass('d-none')
    // $(".div_hari_operasi").addClass('d-none')
    $(".div_tanggal_mulai").addClass('d-none')
    $(".div_tanggal_selesai").addClass('d-none')

    $("#modalForm select").prop('selectedIndex', 0)
})

$('#daily_preview').on('hidden.bs.modal', function () {
    $(".data_load").empty()
})

$('#form_edit_rekap').on('hidden.bs.modal', function () {
    $("#tanggal_mulai_edit").val('')
    $("#tanggal_selesai_edit").val('')

    $(".custom_hari").addClass('d-none')
    // $(".div_hari_operasi").addClass('d-none')
    $(".div_tanggal_mulai").addClass('d-none')
    $(".div_tanggal_selesai").addClass('d-none')

    $("#modalForm select").prop('selectedIndex', 0)
})

$(document).ready(function () {

    var DateTime = luxon.DateTime;
    var now = DateTime.now().setLocale("id")

    $("#btnShowModal").click(function (e) {
        e.preventDefault()
        $('#modalForm').modal('show')
    })

    $("#config_date").change(function (e) {
        e.preventDefault()
        $("#tanggal_mulai").val('')
        $("#tanggal_selesai").val('')

        if($(this).val() == "custom") {
            $(".custom_hari").removeClass('d-none')
        } else {
            $(".custom_hari").addClass('d-none')
        }
    })

    $("#config_date_edit").change(function (e) {
        e.preventDefault()
        $("#tanggal_mulai").val('')
        $("#tanggal_selesai").val('')

        if($(this).val() == "custom") {
            $(".custom_hari").removeClass("d-none")
        } else {
            $(".custom_hari").addClass("d-none")
        }
    })

    var table = $('#tbl_rekap_daily').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 2000,
        columnDefs: [
            {
                className: "tengah", "targets": [6]
            }
        ],
        ajax: route('korlantas_rekap_data_new'),
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
                searchable: false,
                sortable: true
            },
            {
                data: 'report_name',
            },
            {
                data: 'polda_relation',
                name: 'poldaData.name',
            },
            {
                data: 'year',
            },
            {
                data: 'rencana_operasi_relation',
                name: 'rencanaOperasi.name',
            },
            {
                data: 'config_date',
                render: function (data, type, row, meta) {
                    if(data == "all") {
                        return "Semua Hari"
                    } else {
                        return "Rentang Hari"
                    }
                }
            },
            {
                data: 'operation_date_start',
                render: function(data, type, row) {
                    return DateTime.fromISO(data).toFormat('dd-MM-yyyy')
                }
            },
            {
                data: 'operation_date_end',
                render: function(data, type, row) {
                    return DateTime.fromISO(data).toFormat('dd-MM-yyyy')
                }
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href="#" id="btnView" data-id="`+data+`">
                            <img src="{{ asset('/img/search.png') }}" width="22px">
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
                        <a href="`+route('daily_dowmload_excel', data)+`" id="btnDownload" data-id="`+data+`">Unduh</a> | <a href="#" id="btnEdit" data-id="`+data+`">Ubah</a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            }
        ]
    })
})

$('body').on('change', '#rencana_operasi_id', function(e) {
    e.preventDefault()

    $("#div_hari_operasi").prop('selectedIndex', 0)

    if($(this).val() != "") {
        checkDateRange()
        $("#config_date").prop('selectedIndex', 0)
    } else {
        // $(".div_hari_operasi").addClass("d-none")
        $(".div_tanggal_mulai").addClass('d-none')
        $(".div_tanggal_selesai").addClass('d-none')
    }
})

$('body').on('click', '#btnView', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('data-id')

    popupCenter({
        url: route('daily_rekap_show_with_input', {
            uuid: uuid,
        }),
        title: 'Detail',
        w: 1000, h: 600
    })
})

$('body').on('click', '#btnEdit', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('data-id')

    var DateTime = luxon.DateTime;
    var now = DateTime.now().setLocale("id")

    axios.get(route('daily_rekap_show', uuid)).then(function(response) {

        $("#uuid_edit").val(response.data.uuid)

        $("#report_name_edit").val(response.data.report_name)

        $("#kesatuan_edit").val(response.data.kesatuan)
        $("#atasan_edit").val(response.data.atasan)
        $("#pangkat_nrp_edit").val(response.data.pangkat_nrp)
        $("#jabatan_edit").val(response.data.jabatan)
        $("#kota_edit").val(response.data.kota)

        if(response.data.polda != "polda_all") {
            $('#polda_edit option[value='+response.data.polda+']').prop("selected", true)
        }

        $('#year_edit option[value="'+response.data.year+'"]').prop("selected", true)

        $('#rencana_operasi_id_edit option[value='+response.data.rencana_operasi_id+']').prop("selected", true)

        if(response.data.config_date == "custom") {
            $('#config_date_edit option[value="custom"]').prop("selected", true)
            $(".custom_hari").removeClass("d-none")
            $("#tanggal_mulai_edit").val(DateTime.fromISO(response.data.operation_date_start).toFormat('dd-MM-yyyy'))
            $("#tanggal_selesai_edit").val(DateTime.fromISO(response.data.operation_date_end).toFormat('dd-MM-yyyy'))

            $('#tanggal_mulai_edit').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
                // startDate: DateTime.fromISO(response.data.operation_date_start).toFormat('dd-MM-yyyy'),
                // endDate: DateTime.fromISO(response.data.operation_date_end).toFormat('dd-MM-yyyy'),
            })

            $('#tanggal_selesai_edit').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
                // startDate: DateTime.fromISO(response.data.operation_date_start).toFormat('dd-MM-yyyy'),
                // endDate: DateTime.fromISO(response.data.operation_date_end).toFormat('dd-MM-yyyy'),
            })
        } else {
            $('#config_date_edit option[value="all"]').prop("selected", true)
            $(".custom_hari").addClass("d-none")
            $("#tanggal_mulai_edit").val('')
            $("#tanggal_selesai_edit").val('')
        }

        $('#form_edit_rekap').modal('show')
    })
    .catch(function(error) {
        if(error.response.status == 404) {
            swal("Data tidak ditemukan. Periksa kembali data anda", null, "error")
        }
        if(error.response.status == 401) {
            swal("Anda tidak diijinkan mengakses data ini", null, "error")
        }
    })
})

function checkDateRange() {
    var rencana_operasi_id = $("#rencana_operasi_id").val()

    $(".loadingPanel").removeClass('d-none')

    axios.get(route('get_rencana_operasi_date_range', rencana_operasi_id))
    .then(response => {

        var DateTime = luxon.DateTime;
        var now = DateTime.now().setLocale("id")

        $(".loadingPanel").addClass('d-none')

        var data = response.data
        var startDate = data.start_date
        var endDate = data.end_date

        // $(".div_hari_operasi").removeClass("d-none")

        $('#tanggal_mulai').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
            startDate: DateTime.fromISO(startDate).toFormat('dd-MM-yyyy'),
            endDate: DateTime.fromISO(endDate).toFormat('dd-MM-yyyy'),
        })

        $('#tanggal_selesai').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
            startDate: DateTime.fromISO(startDate).toFormat('dd-MM-yyyy'),
            endDate: DateTime.fromISO(endDate).toFormat('dd-MM-yyyy'),
        })

        $('#tanggal_mulai_edit').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
            startDate: DateTime.fromISO(startDate).toFormat('dd-MM-yyyy'),
            endDate: DateTime.fromISO(endDate).toFormat('dd-MM-yyyy'),
        })

        $('#tanggal_selesai_edit').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
            startDate: DateTime.fromISO(startDate).toFormat('dd-MM-yyyy'),
            endDate: DateTime.fromISO(endDate).toFormat('dd-MM-yyyy'),
        })
    })
    .catch(err => {
        console.error(err);
    })
}
</script>
@endpush