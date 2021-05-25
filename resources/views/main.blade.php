@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>BERANDA</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @foreach ($poldaAtas as $key => $val)
                <a href="{{ route('korlantas_open_polda', $val->short_name) }}">
                    <div class="cols-sm-1">
                        <div id="{{ $val->short_name }}" class="grid-polda line glowred">
                            <p>{{ $val->short_name }}</p>
                            <img src="{{ asset('/img/polda/'.$val->logo) }}">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-1 mb-n2">
            @foreach ($poldaBawah as $key => $val)
                <a href="{{ route('korlantas_open_polda', $val->short_name) }}">
                    <div class="cols-sm-1">
                        <div id="{{ $val->short_name }}" class="grid-polda line glowred">
                            <p>{{ $val->short_name }}</p>
                            <img src="{{ asset('/img/polda/'.$val->logo) }}">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mb-n22">
            <img src="{{ asset('/img/line-poldaup.png') }}" width="100%">
        </div>

        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="">
                <div class="widget-heading">
                    <h5 class="mar20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                    </svg>
                    <span class="tour-step tour-step-one">Total Laporan</span> <span class="dash_operasi" id="projectName"></span>
                    </h5>
                    <p>data laporan harian setiap polda</p>
                </div>
                <div class="widget-content" style="margin-top: 5%;">
                    <div class="mx-auto">
                         <img class="poldametro" src="{{ asset('/img/polda/mabes.png') }}">
                        <div id="donut-chart" class=""></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three bgblue">
                <div class="widget-heading">
                    <h5 class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20.002" height="25.002" viewBox="0 0 20.002 25.002">
                    <path id="notification_outline" d="M14,27a2.5,2.5,0,0,1-2.5-2.5h5A2.5,2.5,0,0,1,14,27Zm10-3.75H4v-2.5L6.5,19.5V12.626c0-4.328,1.776-7.134,5-7.9V2h5V4.725c3.224.765,5,3.57,5,7.9V19.5l2.5,1.25ZM14,6.688A4.5,4.5,0,0,0,10.094,8.5,7.116,7.116,0,0,0,9,12.626v8.126H19V12.626A7.117,7.117,0,0,0,17.907,8.5,4.5,4.5,0,0,0,14,6.688Z" transform="translate(-4 -2)" fill="#00adef"/>
                    </svg>
                    <span>Notifikasi</span>
                    <p>info laporan harian setiap polda</p>
                    </h5>
                </div>
                <div class="widget-content mb-4">
                    <div id="loadingPanel" class="centered">Loading Data</div>
                    <div id="dataPanel" class="mt-container mx-auto invisible">
                        <div class="timeline-line"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-n22">
            <img src="{{ asset('/img/line-polda.png') }}" width="100%">
        </div>

        @role('access_pusat|administrator')
            @if (!empty(operationPlans()))
                @if (authUser()->id == 1)
                    @include('home_tabs.tab')
                @else
                    @include('home_tabs.tab_absensi')
                @endif
            @endif
        @endrole

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-heading mt-2">
                <h5 class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
                    <path id="Union_2" data-name="Union 2" d="M-2852-2201a2,2,0,0,1-2-2v-16a2,2,0,0,1,2-2h7a.118.118,0,0,1,.032.006.131.131,0,0,0,.03.006,1.043,1.043,0,0,1,.259.051l.028.009a.492.492,0,0,1,.066.028.993.993,0,0,1,.293.2l6,6a.98.98,0,0,1,.2.293.639.639,0,0,1,.025.068l.009.026a1,1,0,0,1,.049.258.144.144,0,0,0,.007.027.139.139,0,0,1,0,.028v11a2,2,0,0,1-2,2Zm0-2h12v-10h-5a1,1,0,0,1-1-1v-5h-6Zm8-12h2.586l-2.586-2.586Zm-5.333,10v-2h6.667v2Zm0-4v-2h6.667v2Z" transform="translate(2854 2221)" fill="#00adef"/>
                    </svg>
                    <span class="ml-1">data status pelaporan</span>
                </h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table id="tbl_daily_submited" class="table">
                        <thead>
                            <tr>
                                <th><span>No</span></th>
                                <th><span>Nama Kesatuan</span></th>
                                <th><span>Status Laporan</span></th>
                                <th class="text-center" width="6%"><span>Lihat</span></th>
                                <th class="text-center" width="6%"><span>Pilihan</span></th>
                                <th class="text-center" width="6%"><span>Lampiran</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailyInput as $index => $daily)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $daily->name }}</td>
                                    <td>
                                        @php
                                            if(empty($daily->dailyInput)) {
                                                echo "<p class='red'>BELUM MENGIRIM LAPORAN</p>";
                                            } else {
                                                echo "<p>SUDAH MENGIRIM LAPORAN</p>";
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @if (!empty($daily->dailyInput))
                                            <div class="text-center icon-container">
                                                <a href="{{ route('previewPhroDashboard', $daily->uuid) }}" class="previewPhro" data-id="{{ $daily->uuid }}"><i class="far fa-eye"></i></a>
                                            </div>
                                        @else
                                        <div class="text-center">-</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($daily->dailyInput))
                                            <div class="text-center icon-container">
                                                <a href="{{ route('downloadPrho', $daily->uuid) }}"><i class="far fa-download"></i></a>
                                            </div>
                                        @else
                                            <div class="text-center">-</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (empty($daily->dailyInput))
                                            <div class="text-center icon-container">-</div>
                                        @else
                                            <div class="text-center icon-container">
                                                <a href="{{ route('downloadAttachment', $daily->uuid) }}"><i class="far fa-paperclip"></i></a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@include('preview_pages.report_daily_preview')
@endsection

@push('library_js')
<script src="{{ asset('template/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('template/plugins/dist-apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
<script src="{{ asset('js/popup.js') }}"></script>
@endpush

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/dist-apex/apexcharts.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/dashboard/dash_2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/animate/animate.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/components/custom-modal.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('template/custom.css') }}"/>
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
        padding-right: 20px;
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

    var DateTime = luxon.DateTime;
    DateTime.now().setZone('Asia/Jakarta');

    var now = DateTime.now().setLocale("id");

    $("#changeTheme").change(function (e) {
        if($(this).is(":checked")) {
            console.log("mode terang")
        } else {
            console.log("mode gelap")
        }
    })

    changePoldaClass()
    notificationLoad()
    absensiPolda()
    donutData()

    $("#filterOperasi").click(function (e) {
        e.preventDefault();
    })

    const ps = new PerfectScrollbar(document.querySelector('.mt-container'))

    $('#tbl_daily_submited tbody').on('click', '.previewPhro', function(e) {
        e.preventDefault()
        var uuid = $(this).attr('data-id')

        popupCenter({
            url: route('previewPhroDashboard', {
                uuid: uuid,
            }),
            title: 'Detail',
            w: 1000, h: 600
        })
    })

    setInterval(function() {
        notificationLoad()
        changePoldaClass()
        donutData()
        absensiPolda()
    }, 10000)
})

function changePoldaClass() {
    axios.get(route('today_check'))
    .then(response => {
        $.each(response.data, function(key, value) {
            if(_.isEmpty(value.daily_input)) {
                $('#' + value.short_name).removeClass("glowblue").addClass("glowred")
            } else {
                $('#' + value.short_name).removeClass("glowred").addClass("glowblue")
            }
        })
    })
    .catch(err => {
        console.error(err);
    })
}

function notificationLoad() {
    var DateTime = luxon.DateTime
    $(".timeline-line").empty()

    axios.get(route('notifikasi'))
    .then(res => {
        if(_.isEmpty(res.data)) {
            $(".timeline-line").append("<p class='centered'>Belum ada polda yang mengirim data hari ini</p>")
            $("#loadingPanel").addClass("invisible")
            $("#dataPanel").removeClass("invisible")
        } else {
            $.each(res.data, function(key, value) {
                var status = value.status
                var created_at = value.created_at
                var polda_name = value.polda.name

                var html = `
                <div class="item-timeline timeline-new">
                    <div class="t-dot">
                        <div class="t-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                    </div>
                    <div class="t-content">
                        <div class="t-uppercontent">
                            <h5>`+polda_name+`</h5>
                            <span class="">` + DateTime.fromISO(created_at, { locale: "id" }).toRelative() + `</span>
                        </div>
                        <p>STATUS : `+status.toUpperCase()+`</p>
                    </div>
                </div>
                `;

                $(".timeline-line").append(html)

                $("#loadingPanel").addClass("invisible")
                $("#dataPanel").removeClass("invisible")
            })
        }
    })
    .catch(err => {
        console.error(err);
    })
}

function donutData() {

    axios.get(route('donut')).then(function(response) {

        $("#donut-chart").empty()

        if(_.isEmpty(response.data.filled)) {
            var filled = response.data.filled
            var nofilled = response.data.nofilled

            var donutChart = {
                chart: {
                    height: 350,
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
                    offsetY: 0,
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
                    // shade: 'dark',
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
                        fontSize: '12px',
                        fontFamily: 'Bahnschrift',
                        color: undefined,
                        offsetY: -35,
                        },
                        value: {
                            show: true,
                            fontSize: '60px',
                            fontFamily: 'Bahnschrift',
                            color: '20',
                            offsetY: 17,
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
                            width: 300
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
        }

    }).catch(function(error) {
        if (error.response) {
            console.log(error.response.data)
            console.log(error.response.status)
            console.log(error.response.headers)
        } else if (error.request) {
            console.log(error.request)
        } else {
            console.log('Error', error.message)
        }
    })
}

function loadDataTable() {
    var table = $('#tbl_daily_submited').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('dailycheck'),
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<i class="fas fa-arrow-circle-left dtIconSize"></i>',
                "sNext": '<i class="fas fa-arrow-circle-right dtIconSize"></i>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
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
                data: 'has_submited',
                name: 'dailyInput.status',
                render: function(data, type, row) {
                    if(data == "BELUM MENGIRIMKAN LAPORAN") {
                        return `<p class="red">`+data+`</p>`
                    } else {
                        return `<p>`+data+`</p>`
                    }
                },
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    if(row.has_submited == "BELUM MENGIRIMKAN LAPORAN") {
                        return "-"
                    } else {
                        return `
                        <div class="icon-container">
                            <a href="`+route('previewPhroDashboard', data)+`" class="previewPhro" data-id="`+data+`">
                            <img src="{{ asset('/img/search.png') }}" width="55%">
                            </a>
                        </div>
                        `;
                    }
                },
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    if(row.has_submited == "BELUM MENGIRIMKAN LAPORAN") {
                        return "-"
                    } else {
                        return `
                        <div class="ubah-change text-center">
                            <a href="`+route('downloadPrho', data)+`">
                                Unduh
                            </a>
                        </div>
                        `;
                    }
                },
                searchable: false,
                sortable: false,
            }
        ]
    })
}

function checkInputByChart(id) {
    popupCenter({
        url: route('viewInputFromChart', {
            indexData: id,
        }),
        title: 'Detail',
        w: 750, h: 700
    })
}

function absensiPolda() {
    var options = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'area',
            zoom: {
                enabled: false
            },
            dropShadow: {
                enabled: true,
                opacity: 0.3,
                blur: 5,
                left: -7,
                top: 22
            },
            toolbar: {
                show: false
            },
            events: {
                click: function(event, chartContext, config) {
                    checkInputByChart(config.dataPointIndex)
                }
            }
        },
        colors: ['#1490cb'],
        dataLabels: {
            enabled: false
        },
        noData: {
            text: "Loading Data",
            align: 'center',
            verticalAlign: 'middle',
            offsetX: 0,
            offsetY: 0,
            style: {
                color: "#ffffff",
                fontSize: '20px',
                fontFamily: "Quicksand, sans-serif",
            },
        },
        stroke: {
            show: true,
            curve: 'smooth',
            width: 2,
            lineCap: 'square'
        },
        series: [{
            name: "Total",
            data: []
        }],
        xaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                show: true
            },
            labels: {
                offsetX: 0,
                offsetY: 0,
                style: {
                    fontSize: '12px',
                    fontFamily: 'Quicksand, sans-serif',
                    cssClass: 'apexcharts-xaxis-title',
                },
            },
            categories: []
        },
        yaxis: {
            labels: {
                formatter: function(value, index) {
                    return value
                },
                offsetX: -10,
                offsetY: 0,
                style: {
                    fontSize: '12px',
                    fontFamily: 'Quicksand, sans-serif',
                    cssClass: 'apexcharts-yaxis-title',
                },
            }
        },
        grid: {
            borderColor: '#191e3a',
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: true,
                }
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 10
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            offsetY: -50,
            fontSize: '16px',
            fontFamily: 'Quicksand, sans-serif',
            markers: {
                width: 10,
                height: 10,
                strokeWidth: 0,
                strokeColor: '#fff',
                fillColors: undefined,
                radius: 12,
                onClick: undefined,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: {
                horizontal: 0,
                vertical: 20
            }
        },
        tooltip: {
            theme: 'dark',
            marker: {
                show: true,
            },
            x: {
                show: false,
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                type: "vertical",
                shadeIntensity: 1,
                inverseColors: !1,
                opacityFrom: .28,
                opacityTo: .05,
                stops: [45, 100]
            }
        },
        responsive: [{
            breakpoint: 575,
            options: {
                legend: {
                    offsetY: -30,
                },
            },
        }]
    }

    var chartRequest = new ApexCharts(
        document.querySelector("#incoming_report"),
        options
    )

    chartRequest.render()

    axios.get(route('dashboardChart'))
    .then(function(response) {
        var rangeDate = response.data.rangeDate
        var totalPerDate = response.data.totalPerDate
        var projectName = response.data.projectName

        $("#projectName").html(""+projectName+"")

        chartRequest.updateOptions({
            xaxis: {
                labels: {
                    offsetX: 0,
                    offsetY: 5,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Quicksand, sans-serif',
                        cssClass: 'apexcharts-xaxis-title',
                    },
                },
                categories: rangeDate
            },
        })

        chartRequest.updateSeries([{
            name: 'Total',
            data: totalPerDate
        }])

    }).catch(function(error) {
        if (error.response) {
            console.log(error.response.data)
            console.log(error.response.status)
            console.log(error.response.headers)
        } else if (error.request) {
            console.log(error.request)
        } else {
            console.log('Error', error.message)
        }
    })
}
</script>
@endpush