@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>LAPORAN OPERASI</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">

        @if (isAdmin() || isPusat() || isMonitoring())
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <input type="hidden" name="pilihan_operasi_flag" id="pilihan_operasi_flag" value="{{ $filter_operation }}">
                <select class="form-control form-custom height-form" id="pilihan_operasi" name="pilihan_operasi">
                    @foreach($allOperations as $key => $val)
                        <option value="{{$val->slug_name}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
            @include('home_tabs.tab_no_operation')
        @endif

        <div class="col-xl-12 col-lg-12 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
                <div class="table-responsive mb-5">
                    <table id="tbl_operation" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="25%">Laporan Operasi</th>
                                <th width="25%">Jenis Operasi</th>
                                <th width="15%">Tgl Mulai</th>
                                <th width="15%">Tgl Selesai</th>
                                <th width="3%">Lihat</th>
                                <th width="25%">Laporan</th>
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
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/dashboard/dash_2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/components/custom-sweetalert.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/custom.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
@endpush

@push('page_css')
<style>
    .theme-light {
        --piechart-color: #fff;
        --piechart-legend: #fff;
    }

    .theme-dark {
        --piechart-color: #105c7c;
        --piechart-legend: #105c7c;
    }
    .apexcharts-canvas {
        margin: 0 auto;
    }

    .apexcharts-title-text {
        fill: #ffffff;
    }
    .apexcharts-yaxis-label {
        fill: #ffffff;
    }
    .apexcharts-xaxis-label {
        fill: #ffffff;
    }
    .apexcharts-legend-text {
        color: var(--piechart-legend) !important;
        padding-right: 20px;
    }
    .apexcharts-radialbar-track.apexcharts-track .apexcharts-radialbar-area {
        stroke: #191e3a;
    }
    .apexcharts-datalabel, .apexcharts-datalabel-label, .apexcharts-datalabel-value {
        fill: var(--piechart-color);
    }
.widget.widget-activity-three .timeline-line .item-timeline .t-content p {
    margin-bottom: 8px;
    font-size: 12px;
    font-weight: 500;
    color: #00adef;
}
.widget.widget-activity-three .timeline-line .item-timeline .t-content .t-uppercontent span {
    margin-bottom: 0;
    font-size: 10px !important;
    font-weight: 500;
    color: #888ea8;
}
.icon-container a {
    color: var(--piechart-color);
}
.icon-container a i {
    font-size: 16px;
}
tbody tr:nth-child(odd){
  /* opacity: 0.05; */
  background-color: rgba(0, 173, 239, 0.05);
  border-top: solid 1px rgba(17, 62, 81, 0.1);
  border-bottom: solid 1px rgba(17, 62, 81, 0.1);
  color: #105c7c;
}
</style>
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/dist-apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
<script src="{{ asset('js/popup.js') }}"></script>
@endpush

@push('page_js')
<script src="{{ asset('js/tabs_no_operation.js') }}"></script>
<script>

$("#btn-add-notes").click(function (e) {
    e.preventDefault();
    // $('#modalCreateRencanaOperasi').modal('show');
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
                            <img src="{{ asset('/img/search.png') }}" class="searh-on" width="22px">
                            <img src="{{ asset('/img/searchoff.png') }}" class="searh-off" width="22px">
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
                        <a href="`+route('report_by_operation', data)+`">
                            Baku
                        </a>
                        |
                        <a href="`+route('report_all_polda_compare')+`" class="redirect">
                            Perpolda
                        </a>
                        |
                        <a href="`+route('report_all_polda_compare')+`" class="redirect report_polda_all_no_operation">
                            Perhari
                        </a>
                    </div>
                    `;
                },
                searchable: false,
                visible: true,
                sortable: false,
            }
        ]
    })
})

$('body').on('click', '.viewData', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('idval')

    popupCenter({
        url: route('daily_rekap_popup_laporan_operasi', {
            uuid: uuid,
        }),
        title: 'Detail',
        w: 1000, h: 600
    })
})
</script>
@endpush