@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three">

                <div class="widget-heading">
                    <h5 class="">Total Laporan</h5>
                </div>

                <div class="widget-content">
                    <div class="mx-auto">
                        <div id="donut-chart" class=""></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three">

                <div class="widget-heading">
                    <h5 class="">Notifikasi</h5>
                </div>

                <div class="widget-content">
                    <div class="mt-container mx-auto">
                        <div class="timeline-line">

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Logs</h5>
                                        <span class="">27 Feb, 2020</span>
                                    </div>
                                    <p><span>Updated</span> Server Logs</p>
                                    <div class="tags">
                                        <div class="badge badge-primary">Logs</div>
                                        <div class="badge badge-success">CPanel</div>
                                        <div class="badge badge-warning">Update</div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Mail</h5>
                                        <span class="">28 Feb, 2020</span>
                                    </div>
                                    <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                    <div class="tags">
                                        <div class="badge badge-primary">Admin</div>
                                        <div class="badge badge-success">HR</div>
                                        <div class="badge badge-warning">Mail</div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Task Completed</h5>
                                        <span class="">01 Mar, 2020</span>
                                    </div>
                                    <p>Backup <span>Files EOD</span></p>
                                    <div class="tags">
                                        <div class="badge badge-primary">Backup</div>
                                        <div class="badge badge-success">EOD</div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Collect Docs</h5>
                                        <span class="">10 Mar, 2020</span>
                                    </div>
                                    <p>Collected documents from <a href="javascript:void(0);">Sara</a></p>
                                    <div class="tags">
                                        <div class="badge badge-success">Collect</div>
                                        <div class="badge badge-warning">Docs</div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Reboot</h5>
                                        <span class="">06 Apr, 2020</span>
                                    </div>
                                    <p>Server rebooted successfully</p>
                                    <div class="tags">
                                        <div class="badge badge-warning">Reboot</div>
                                        <div class="badge badge-primary">Server</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three">

                <div class="widget-heading">
                    <h5 class="">Data Statistik <span id="projectName"></span></h5>
                    <ul class="tabs tab-pills">
                        <li><a href="#" id="filterOperasi" class="tabmenu">Filter Operasi <i class="far fa-filter" style="font-size: 12px;"></i></a></li>
                    </ul>
                </div>

                <div class="widget-content">
                    <div class="mx-auto">
                        <div id="incoming_report"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table id="tbl_daily_submited" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kesatuan</th>
                                <th>Status Laporan</th>
                                <th>Preview</th>
                                <th>Pilihan</th>
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

@push('library_js')
<script src="{{ secure_asset('template/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ secure_asset('template/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
@endpush

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/apex/apexcharts.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/dashboard/dash_2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
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
</style>
@endpush

@push('page_js')
<script>
$(document).ready(function () {

    projectDaily()
    donutData()
    loadDataTable()

    setInterval(function() {
        projectDaily()
    }, 5000)

    $("#filterOperasi").click(function (e) {
        e.preventDefault();
        alert("filter")
    })

    const ps = new PerfectScrollbar(document.querySelector('.mt-container'));
})

function donutData() {
    axios.get(route('donut')).then(function(response) {
        var filled = response.data.filled
        var nofilled = response.data.nofilled

        var donutChart = {
        chart: {
            height: 350,
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
        labels: ['SUDAH MASUK', 'BELUM MASUK'],
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
                            <a href="`+route('previewPhro', data)+`"><i class="far fa-eye"></i></a>
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
                        <div class="icon-container">
                            <a href="`+route('downloadPrho', data)+`"><i class="far fa-download"></i></a>
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

function projectDaily() {
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
        series: [],
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

    axios.get(route('dashboardChart')).then(function(response) {
        var rangeDate = response.data.rangeDate
        var totalPerDate = response.data.totalPerDate
        var projectName = response.data.projectName

        $("#projectName").html("[ "+projectName+" ]")

        chartRequest.updateSeries([{
            name: 'Total',
            data: totalPerDate
        }])

        chartRequest.updateOptions({
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

function donutChart() {

}
</script>
@endpush