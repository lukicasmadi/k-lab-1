@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>DATA POLDA {{ $polda->name }}</span>
    </h3>
</div>
@endpush

@section('content')
<div id="content" class="main-content mt-n3">
    <input type="hidden" name="polda_id" id="polda_id" value="{{ $polda->id }}">
    <div class="layout-px-spacing">
        @include('flash::message')
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing blendingimg text-center mt-4">
                @if (poldaAlreadyInputTodayById($polda->id))
                    <div class="grid-polda line glowpolda" >
                        <p class="status-lapor">status laporan hari ini</p>
                        <p class="kirim-lapor">sudah Mengirimkan</p>
                        <p class="tgl-lapor">{{ dayNameIndonesia(now()) }}, {{ indonesianDate(now()) }} | {{ timeOnly(now()) }}</p>
                    </div>
                @else
                    <div class="grid-polda line glowpoldas" style="display: block; margin: 0 auto;">
                        <p class="status-lapor">status laporan hari ini</p>
                        <p class="kirim-lapor">belum Mengirimkan</p>
                        <p class="tgl-lapor">{{ dayNameIndonesia(now()) }}, {{ indonesianDate(now()) }} | {{ timeOnly(now()) }}</p>
                    </div>
                @endif
                <img class="imgdetail-polda" src="{{ asset('/img/polda/'.$polda->logo) }}">
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="widget-heading col-md-12">
                                    <h5 class="mar20">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                                        <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                        </svg>
                                        <span>TOTAL LAPORAN</span>
                                    </h5>
                                    <p>DATA LAPORAN MINGGUAN</p>
                                    <div id="donut-chart" class="mt-4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="widget-heading col-md-12">
                                    <h5 class="mar20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                                    <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                    </svg>
                                    <span>TOTAL LAPORAN</span>
                                    </h5>
                                    <p>DATA LAPORAN KESELURUHAN</p>
                                    <div id="donut-chart-full" class="mt-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-n3">
                    <div class="row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1060.5" height="14.001" viewBox="0 0 1060.5 14.001"><defs><style>.a,.c{fill:none;}.a{stroke:#105c7c;}.b{fill:#105c7c;}.d,.e{stroke:none;}.e{fill:#105c7c;}</style></defs><g transform="translate(-1897.781 -612.292)"><line class="a" x2="1060" transform="translate(1898.281 619.792)"/><g transform="translate(1897.781 612.292)"><path class="b" d="M0-.052H25.578l4.422,7H0Z" transform="translate(0 0.052)"/><path class="b" d="M-3.068,0H3.219l3,4.948H0Z" transform="translate(32.44 0.012)"/><path class="b" d="M-3.068,0H.521l3,4.948H0Z" transform="translate(41.727 0.012)"/><path class="b" d="M-3.068,0H-.316l3,4.948H0Z" transform="translate(48.316 0.012)"/></g><g transform="translate(2906.781 612.292)"><path class="b" d="M30-.052H4.422L0,6.948H30Z" transform="translate(21 0.052)"/><path class="b" d="M6.219,0H-.068l-3,4.948H3.151Z" transform="translate(15.409 0.012)"/><path class="b" d="M3.521,0H-.068l-3,4.948H.453Z" transform="translate(8.82 0.012)"/><path class="b" d="M2.684,0H-.068l-3,4.948H-.384Z" transform="translate(3.068 0.012)"/></g><g transform="translate(2138.781 619.292)"><path class="b" d="M547,0H0L4.178,7H95.872l1.871-3H449.259l1.871,3h91.694L547,0Z" transform="translate(15.999)"/><g transform="translate(0 0.001)"><g class="c" transform="translate(0 0)"><path class="d" d="M559.654,0H529.136l4.5,7H575.5L580,0ZM30.519,0H0L4.5,7H46.366l4.5-7Z"/><path class="e" d="M 0.91571044921875 0.5000286102294922 L 4.7720947265625 6.500171661376953 L 20.34539794921875 6.500171661376953 L 46.0931396484375 6.500171661376953 L 49.94879150390625 0.5000286102294922 L 30.51898193359375 0.5000286102294922 L 0.91571044921875 0.5000286102294922 M 530.0517578125 0.5000286102294922 L 533.9080810546875 6.500171661376953 L 549.4813842773438 6.500171661376953 L 575.2282104492188 6.500171661376953 L 579.0838623046875 0.5000286102294922 L 559.6541137695313 0.5000286102294922 L 530.0517578125 0.5000286102294922 M 0 2.86102294921875e-05 L 30.51898193359375 2.86102294921875e-05 L 50.8643798828125 2.86102294921875e-05 L 46.3662109375 7.000171661376953 L 20.34539794921875 7.000171661376953 L 4.4990234375 7.000171661376953 L 0 2.86102294921875e-05 Z M 529.135986328125 2.86102294921875e-05 L 559.6541137695313 2.86102294921875e-05 L 579.9994506835938 2.86102294921875e-05 L 575.5012817382813 7.000171661376953 L 549.4813842773438 7.000171661376953 L 533.635009765625 7.000171661376953 L 529.135986328125 2.86102294921875e-05 Z"/></g></g></g></g></svg>
                    </div>
                </div>
                <div class="col-md-12 text-left mb-3">
                    <div class="text-left">
                        <div class="row">
                            <a class="btn add-none" id="data_status_pelaporan" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 20"><path id="Union_2" data-name="Union 2" d="M-2852-2201a2,2,0,0,1-2-2v-16a2,2,0,0,1,2-2h7a.118.118,0,0,1,.032.006.131.131,0,0,0,.03.006,1.043,1.043,0,0,1,.259.051l.028.009a.492.492,0,0,1,.066.028.993.993,0,0,1,.293.2l6,6a.98.98,0,0,1,.2.293.639.639,0,0,1,.025.068l.009.026a1,1,0,0,1,.049.258.144.144,0,0,0,.007.027.139.139,0,0,1,0,.028v11a2,2,0,0,1-2,2Zm0-2h12v-10h-5a1,1,0,0,1-1-1v-5h-6Zm8-12h2.586l-2.586-2.586Zm-5.333,10v-2h6.667v2Zm0-4v-2h6.667v2Z" transform="translate(2854 2221)" fill="#00adef"/></svg>
                            Jam pelaporan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table id="tbl_polda_submited" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA LAPORAN</th>
                                <th>TANGGAL</th>
                                <th>JAM</th>
                                <th class="text-center" width="6%">Lihat</th>
                                <th class="text-center">PILIHAN</th>
                                <th class="text-center">LAMPIRAN</th>
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
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/dashboard/dash_2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/animate/animate.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('template/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/popup.js') }}"></script>
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

    var poldaId = $("#polda_id").val()

    if(poldaId) {
        var table = $('#tbl_polda_submited').DataTable({
            processing: true,
            serverSide: true,
            ajax: route('phro_polda_data_id', poldaId),
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
                        <div class="icon-container text-center">
                            <a href="`+route('previewPhro', data)+`" class="previewPhro" data-id="`+data+`">
                            <img src="{{ asset('/img/search.png') }}" width="55%">
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
                            <a href="`+route('report_daily_by_id', data)+`">Unduh</a>
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
                            <a href="`+route('openPoldaDataDownloadAttachment', data)+`">Lampiran</a>
                        </div>
                        `;
                    },
                    searchable: false,
                    sortable: false,
                },
            ]
        })
    }

    donutDataWeekly()
    donutDataFull()
})


$('body').on('click', '#data_status_pelaporan', function(e) {
    e.preventDefault()
    $('#polda_report_date_range').modal('show')
})

$('#polda_report_date_range').on('hidden.bs.modal', function () {
    $("#tanggal_mulai").val('')
    $("#tanggal_selesai").val('')
})

$('#tbl_polda_submited tbody').on('click', '.previewPhro', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('data-id')

    popupCenter({
        url: route('previewPhro', {
            uuid: uuid,
        }),
        title: 'Detail',
        w: 1000, h: 600
    })
})

function donutDataWeekly()
{
    var poldaId = $("#polda_id").val()

    if(poldaId) {
        axios.get(route('weeklyPoldaById', poldaId)).then(function(response) {
            var filled = response.data.filled
            var nofilled = response.data.nofilled

            var donutChart = {
            chart: {
                height: 300,
                width: '100%',
                fontFamily: 'Bahnschrift',
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show: true,
                showForSingleSeries: false,
                showForNullSeries: true,
                showForZeroSeries: true,
                position: 'bottom',
                horizontalAlign: 'center',
                floating: false,
                fontSize: '10px',
                fontFamily: 'Bahnschrift',
                fontWeight: 400,
                formatter: undefined,
                inverseOrder: false,
                width: undefined,
                height: undefined,
                tooltipHoverFormatter: undefined,
                offsetX: 0,
                offsetY: 15,
                labels: {
                    colors: undefined,
                    useSeriesColors: false
                },
                markers: {
                    width: 12,
                    height: 12,
                    strokeWidth: 0,
                    strokeColor: '#fff',
                    fillColors: undefined,
                    radius: 12,
                    customHTML: undefined,
                    onClick: undefined,
                    offsetX: 0,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 10
                },
                onItemClick: {
                    toggleDataSeries: true
                },
                onItemHover: {
                    highlightDataSeries: true
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 0.8,
                    opacityFrom: 0.9,
                    opacityTo: 0.9,
                    stops: [50, 190, 100]
                }
            },
            colors:['#00adef', '#ea1c26'],
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        background: 'transparent',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '11px',
                                fontFamily: 'Bahnschrift',
                                color: undefined,
                                offsetY: -30,
                            },
                            value: {
                                show: true,
                                fontSize: '40px',
                                fontFamily: 'Bahnschrift',
                                color: '20',
                                offsetY: 0,
                                formatter: function (val) {
                                    return val + "%"
                                }
                            },
                            total: {
                                show: true,
                                showAlways: false,
                                label: 'DATA MASUK',
                                color: '#888ea8',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce( function(a, b) {
                                    return a + "%"
                                    })
                                }
                            }
                        }
                    }
                }
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 1,
                dashArray: 0,
            },
            series: [filled, nofilled],
            labels: ['[ MASUK ]', '[ BELUM MASUK ]'],
            responsive: [{
                breakpoint: 500,
                options: {
                    chart: {
                        width: 100
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
}

function donutDataFull()
{
    var poldaId = $("#polda_id").val()

    if(poldaId) {
        axios.get(route('fullPoldaById', poldaId)).then(function(response) {
            var filled = response.data.filled
            var nofilled = response.data.nofilled

            var donutChartFull = {
            chart: {
                height: 300,
                fontFamily: 'Bahnschrift',
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show: true,
                showForSingleSeries: false,
                showForNullSeries: true,
                showForZeroSeries: true,
                position: 'bottom',
                horizontalAlign: 'center',
                floating: false,
                fontSize: '10px',
                fontFamily: 'Bahnschrift',
                fontWeight: 400,
                formatter: undefined,
                inverseOrder: false,
                width: undefined,
                height: undefined,
                tooltipHoverFormatter: undefined,
                offsetX: 0,
                offsetY: 15,
                labels: {
                    colors: undefined,
                    useSeriesColors: false
                },
                markers: {
                    width: 12,
                    height: 12,
                    strokeWidth: 0,
                    strokeColor: '#fff',
                    fillColors: undefined,
                    radius: 12,
                    customHTML: undefined,
                    onClick: undefined,
                    offsetX: 0,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 10
                },
                onItemClick: {
                    toggleDataSeries: true
                },
                onItemHover: {
                    highlightDataSeries: true
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 0.8,
                    opacityFrom: 0.9,
                    opacityTo: 0.9,
                    stops: [50, 190, 100]
                }
            },
            colors:['#00adef', '#ea1c26'],
            plotOptions: {
                pie: {
                    donut: {
                    size: '65%',
                    background: 'transparent',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '11px',
                            fontFamily: 'Bahnschrift',
                            color: undefined,
                            offsetY: -30,
                        },
                        value: {
                            show: true,
                            fontSize: '40px',
                            fontFamily: 'Bahnschrift',
                            color: '20',
                            offsetY: 0,
                            formatter: function (val) {
                                return val + "%"
                            }
                        },
                        total: {
                            show: true,
                            showAlways: false,
                            label: 'DATA MASUK',
                            color: '#888ea8',
                            formatter: function (w) {
                                return w.globals.seriesTotals.reduce( function(a, b) {
                                return a + "%"
                                })
                            }
                        }
                    }
                    }
                }
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 1,
                dashArray: 0,
            },
            series: [filled, nofilled],
            labels: ['[ MASUK ]', '[ BELUM MASUK ]'],
            responsive: [{
                breakpoint: 500,
                options: {
                    chart: {
                        width: 100
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
}
</script>
@endpush