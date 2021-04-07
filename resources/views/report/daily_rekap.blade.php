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
                                <th width="20%">Nama Laporan</th>
                                <th width="13%">Polda</th>
                                <th width="10%">Tahun</th>
                                <th width="21%">Nama Operasi</th>
                                <th width="20%">Tanggal Operasi</th>
                                <th width="6%">Lihat</th>
                                <th width="10%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('preview_pages.report_daily_add')
        @include('preview_pages.report_daily_preview')
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
    $("#report_name").val('')
    $("#hari").val('')
    $("#hari").addClass('d-none')
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

    $("#operation_date").change(function (e) {
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
            "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> <img src="{{ secure_asset("/img/cloud_down.png") }}">',
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
                name: 'rencaraOperasi.name',
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
                        <a href="#" id="btnView" data-id="`+data+`">
                            <img src="{{ secure_asset('/img/search.png') }}" width="45%">
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
                        <a href="`+route('report_download_excel', data)+`" id="btnDownload" data-id="`+data+`">Unduh</a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            }
        ]
    })
})

$('body').on('click', '#btnView', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('data-id')

    axios.get(route('korlantas_rekap_data_byuuid', uuid)).then(function(response) {
        var output = response.data

        if(output.operation_date == "semua_hari") {
            var redate = "Semua Hari"
        } else {
            var redate = output.operation_date
        }

        // $('#preiew_report_name').html(output.report_name)
        // $('#preiew_polda').html(output.polda_data.name)
        // $('#preiew_year').html(output.year)
        // $('#preiew_rencana_operasi_id').html(output.rencara_operasi.name)
        // $('#preiew_operation_date').html(redate)

        $('#daily_preview').modal('show')
    })
    .catch(function(error) {
        swal("Deletion failed! Maybe you miss something", error.response.data.output, "error")
    })
})
</script>
@endpush