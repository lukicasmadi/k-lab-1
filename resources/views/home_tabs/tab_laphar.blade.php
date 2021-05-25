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
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="mx-auto">
                        <div id="total_laphar_pelanggaran_lalin" class=""></div>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="mx-auto">
                        <div id="total_laphar_kecelakaan_lalin" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-n3">
    <img src="{{ asset('/img/line-poldaup.png') }}" width="100%">
</div>

@push('page_js')
<script>
$(document).ready(function () {
    loadChartProjectDaily()

    setInterval(function() {
        loadChartProjectDaily()
    }, $('meta[name=reload_time]').attr('content'))
})

function loadChartProjectDaily()
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
        colors:['#00adef', '#ea1c26'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
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
                fontSize: '15px',
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
    }

    var leftChart = new ApexCharts(
        document.querySelector("#total_laphar_pelanggaran_lalin"),
        sCol
    )

    leftChart.render()

    var chartKanan = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        colors:['#00adef', '#ea1c26', '#fd7e14', '#ffc107'],
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
                fontSize: '15px',
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

    axios.get(route('chart_laphar')).then(function(response) {

        if(!_.isEmpty(response.data)) {
            leftChart.updateOptions({
                xaxis: {
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

            rightChart.updateOptions({
                xaxis: {
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
</script>
@endpush