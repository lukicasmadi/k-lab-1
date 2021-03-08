@extends('layouts.template_admin')

@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing blendingimg">
                @if (poldaAlreadyInputToday())
                    <div class="grid-polda line glowblue" >
                        status laporan hari ini<br />
                        Sudah Mengirimkan
                        <br />
                        {{ dayNameIndonesia(now()) }}, {{ indonesianDate(now()) }} | {{ timeOnly(now()) }}
                    </div>
                @else
                    <div class="grid-polda line glowred" style="display: block; margin: 0 auto;">
                        Status laporan hari ini<br />
                        Belum Mengirimkan
                        <br />
                        {{ dayNameIndonesia(now()) }}, {{ indonesianDate(now()) }} | {{ timeOnly(now()) }}
                    </div>
                @endif
                <img src="{{ secure_asset('/img/polda/'.poldaImage()->polda->logo) }}">
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="widget-heading">
                                    <h5 class="mar20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                    </svg>
                                    <span>TOTAL LAPORAN</span>
                                    </h5>
                                    <p>DATA LAPORAN MINGGUAN</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="widget-content" style="margin-top: 5%;">
                                    <div class="mx-auto">
                                        <div id="donut-chart" class=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="widget-heading">
                                    <h5 class="mar20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                    </svg>
                                    <span>TOTAL LAPORAN</span>
                                    </h5>
                                    <p>DATA LAPORAN KESELURUHAN</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="widget-content" style="margin-top: 5%;">
                                    <div class="mx-auto">
                                        <div id="donut-chart-full" class=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <img src="{{ secure_asset('/img/line-polda.png') }}" width="100%">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tbl_polda_submited" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA LAPORAN</th>
                                <th>TANGGAL</th>
                                <th>JAM</th>
                                <th>PREVIEW</th>
                                <th>PILIHAN</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"><span id="status"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center">
                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                </div>
                <div id="dataPreview"></div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/apex/apexcharts.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/dashboard/dash_2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/animate/animate.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ secure_asset('template/plugins/apex/apexcharts.min.js') }}"></script>
@endpush

@push('page_css')
<style>
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
        color: #ffffff!important;
    }
    .apexcharts-radialbar-track.apexcharts-track .apexcharts-radialbar-area {
        stroke: #191e3a;
    }
    .apexcharts-pie-label, .apexcharts-datalabel, .apexcharts-datalabel-label, .apexcharts-datalabel-value {
        fill: #ffffff;
    }
.widget.widget-activity-three .timeline-line .item-timeline .t-content p {
    margin-bottom: 8px;
    font-size: 12px;
    font-weight: 500;
    color: #00adef;
}
.widget.widget-activity-three .timeline-line .item-timeline .t-content .t-uppercontent span {
    margin-bottom: 0;
    font-size: 12px;
    font-weight: 500;
    color: #888ea8;
}
</style>
@endpush

@push('page_js')
<script>
$(document).ready(function () {
    var table = $('#tbl_polda_submited').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('phro_polda_data'),
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
                data: 'operation_name',
                name: 'rencanaOperasi.name'
            },
            {
                data: 'submited_date',
                name: 'created_at'
            },
            {
                data: 'time_created',
                name: 'created_at'
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href="`+route('previewPhro', data)+`" class="previewPhro" data-id="`+data+`"><i class="far fa-file-search"></i></a>
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
                        <a href="`+route('report_daily_by_id', data)+`">Unduh</a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            },
        ]
    })
    donutDataWeekly()
    donutDataFull()
})

$('#tbl_polda_submited tbody').on('click', '.previewPhro', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('data-id')
    $("#dataPreview").hide()
    $(".lds-ring").show()
    $("#status").html("Memuat Data...")
    $('.bd-example-modal-lg').modal('show')

    axios.get(route('previewPhro', uuid)).then(function(response) {
        $('#dataPreview').html(response.data)
        $('#dataPreview').show()
        $("input").attr('type', 'text').attr("readonly", "readonly");
        $(".lds-ring").hide()
        $("#status").html("Preview")
    })
})

function donutDataWeekly() {
    axios.get(route('weeklyPolda')).then(function(response) {
        var filled = response.data.filled
        var nofilled = response.data.nofilled

        var donutChart = {
        chart: {
            height: 250,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + "%"
            },
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value + " %";
                }
            }
        },
        colors:['#136487', '#bc1d26'],
        stroke: {
            colors: '#0e1726'
        },
        series: [filled, nofilled],
        labels: ['[ MASUK ]', '[ BELUM MASUK ]'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var donut = new ApexCharts(
        document.querySelector("#donut-chart"),
        donutChart
    )

    donut.render()
    }).catch(function(error) {

    })
}

function donutDataFull() {
    axios.get(route('fullPolda')).then(function(response) {
        var filled = response.data.filled
        var nofilled = response.data.nofilled

        var donutChartFull = {
        chart: {
            height: 250,
            type: 'donut',
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val + "%"
            },
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value + " %";
                }
            }
        },
        colors:['#136487', '#bc1d26'],
        stroke: {
            colors: '#0e1726'
        },
        series: [filled, nofilled],
        labels: ['[ MASUK ]', '[ BELUM MASUK ]'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var donutFull = new ApexCharts(
        document.querySelector("#donut-chart-full"),
        donutChartFull
    )

    donutFull.render()
    }).catch(function(error) {

    })
}
</script>
@endpush