<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-activity-three">
        <div class="widget-heading">
            <div class="row">
                <h5 class="ml-n3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-n1" width="20" height="20" viewBox="0 0 20 20">
                        <path id="bar_chart_alt" d="M22,22H2V11.474A2.055,2.055,0,0,1,4,9.368H8V4.105A2.055,2.055,0,0,1,10,2h4a2.055,2.055,0,0,1,2,2.105V7.263h4a2.055,2.055,0,0,1,2,2.105ZM16,9.368V19.895h4V9.368ZM10,4.105V19.895h4V4.105ZM4,11.474v8.421H8V11.474Z" transform="translate(-2 -2)" fill="#00adef"/>
                    </svg>
                    <span>DATA LAPORAN HARIAN [ {{ indonesiaDayAndDate(date("Y-m-d")) }} ]</span>
                </h5>
            </div>
        </div>
        <div class="widget-content">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="mx-auto">
                        <div id="total_laphar_pelanggaran_lalin" class=""></div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="mx-auto">
                        <div id="total_laphar_kecelakaan_lalin" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('page_js')
<script>
$(document).ready(function () {
    loadLeftChart()
    loadRightChart()
})

function loadRightChart()
{
    var chartKanan = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
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
            width: 2,
            colors: ['transparent']
        },
        series: [],
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: 'Total'
            }
        },
        fill: {
            opacity: 1
        },
    }

    var rightChart = new ApexCharts(
        document.querySelector("#total_laphar_kecelakaan_lalin"),
        chartKanan
    )

    rightChart.render()

    setInterval(function() {
        axios.get(route('chart_laphar'))
        .then(function(response) {

            rightChart.updateOptions({
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
                    categories: [response.data.year]
                },
            })

            rightChart.updateSeries([
                {
                    name: 'Jumlah Kejadian',
                    data: [response.data.jumlah_kejadian]
                },
                {
                    name: 'Korban Meninggal Dunia',
                    data: [response.data.jumlah_korban_meninggal]
                },
                {
                    name: 'Korban Luka Berat',
                    data: [response.data.jumlah_korban_luka_berat]
                },
                {
                    name: 'Korban Luka Ringan',
                    data: [response.data.jumlah_korban_luka_ringan]
                }
            ])

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

function loadLeftChart()
{
    var sCol = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
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
            width: 2,
            colors: ['transparent']
        },
        series: [],
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: 'Total'
            }
        },
        fill: {
            opacity: 1
        },
    }

    var leftChart = new ApexCharts(
        document.querySelector("#total_laphar_pelanggaran_lalin"),
        sCol
    )

    leftChart.render()

    setInterval(function() {
        axios.get(route('chart_laphar'))
        .then(function(response) {

            leftChart.updateOptions({
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
                    categories: [response.data.year]
                },
            })

            leftChart.updateSeries([{
                name: 'Tilang',
                data: [response.data.tilang]
            }, {
                name: 'Teguran',
                data: [response.data.teguran]
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
    }, 5000)
}
</script>
@endpush