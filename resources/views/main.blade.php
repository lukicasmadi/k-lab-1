@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header">
        <div class="page-title">
            <h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
            <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
            </svg>
            <span>daftar polda</span>
            </h3>
        </div>                    
        <div class="toggle-switch">
            <label class="switch s-icons s-outline  s-outline-secondary">
                <input type="checkbox" checked="" class="theme-shifter" id="changeTheme">
                <span class="slider round">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                </span>
            </label>
        </div>
    </div>
</div>
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @foreach ($polda as $key => $val)
                @if ($key >= 0 && $key <= 16)
                    @if (empty($val->dailyInput))
                        <div class="grid-polda line glowred">
                            <p>{{ $val->short_name }}</p>
                            <img src="{{ secure_asset('/img/polda/'.$val->logo) }}">
                        </div>
                    @else
                        <div class="grid-polda line glowblue">
                            <p>{{ $val->short_name }}</p>
                            <img src="{{ secure_asset('/img/polda/'.$val->logo) }}">
                        </div>
                    @endif
                @endif
            @endforeach
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            @foreach ($polda as $key => $val)
                @if ($key >= 17 && $key <= 33)
                    @if (empty($val->dailyInput))
                        <div class="grid-polda line glowred">
                            <p>{{ $val->short_name }}</p>
                            <img src="{{ secure_asset('/img/polda/'.$val->logo) }}">
                        </div>
                    @else
                        <div class="grid-polda line glowblue">
                            <p>{{ $val->short_name }}</p>
                            <img src="{{ secure_asset('/img/polda/'.$val->logo) }}">
                        </div>
                    @endif
                @endif
            @endforeach
        </div>

        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="">
                <div class="widget-heading">
                    <h5 class="mar20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                    </svg>
                    <span>Total Laporan</span>
                    </h5>
                    <p>data laporan harian setiap polda</p>
                </div>
                <div class="widget-content" style="margin-top: 5%;">
                    <div class="mx-auto">
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
                <div class="widget-content">
                    <div id="loadingPanel" class="centered">Loading Data</div>
                    <div id="dataPanel" class="mt-container mx-auto invisible">
                        <div class="timeline-line"></div>
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
                                <th>Nama Kesatuan</th>
                                <th>Status Laporan</th>
                                <th>Preview</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailyInput as $daily)
                                <tr>
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
                                            <div class="icon-container">
                                                <a href="{{ route('previewPhroDashboard', $daily->uuid) }}" class="previewPhro" data-id="{{ $daily->uuid }}"><i class="far fa-eye"></i></a>
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($daily->dailyInput))
                                            <div class="icon-container">
                                                <a href="{{ route('downloadPrho', $daily->uuid) }}"><i class="far fa-download"></i></a>
                                            </div>
                                        @else
                                            -
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
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/animate/animate.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/components/custom-modal.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}"/>
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
    font-size: 14px;
    font-weight: 500;
    color: #888ea8;
}
.widget.widget-activity-three .timeline-line .item-timeline .t-content .t-uppercontent span {
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #888ea8;
}
</style>
@endpush

@push('page_js')
<script>
$(document).ready(function () {

    $("#changeTheme").change(function (e) { 
        if($(this).is(":checked")) {
            console.log("mode terang")
        } else {
            console.log("mode gelap")
        }
    })

    notificationLoad()
    projectDaily()
    donutData()

    $("#filterOperasi").click(function (e) {
        e.preventDefault();
        alert("filter")
    })

    const ps = new PerfectScrollbar(document.querySelector('.mt-container'))

    $('#tbl_daily_submited tbody').on('click', '.previewPhro', function(e) {
        e.preventDefault()
        var uuid = $(this).attr('data-id')
        $("#dataPreview").hide()
        $(".lds-ring").show()
        $("#status").html("Memuat Data...")
        $('.bd-example-modal-lg').modal('show')

        axios.get(route('previewPhroDashboard', uuid)).then(function(response) {
            $('#dataPreview').html(response.data)
            $('#dataPreview').show()
            $("input").attr('type', 'text').attr("readonly", "readonly");
            $(".lds-ring").hide()
            $("#status").html("Preview")
        })
    })
})

function notificationLoad() {
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
                            <span class="">`+moment(created_at).fromNow()+`</span>
                        </div>
                        <p>STATUS : `+status+`</p>
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
                            <a href="`+route('previewPhroDashboard', data)+`" class="previewPhro" data-id="`+data+`"><i class="far fa-eye"></i></a>
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

    setInterval(function() {
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
    }, 5000)
}
</script>
@endpush