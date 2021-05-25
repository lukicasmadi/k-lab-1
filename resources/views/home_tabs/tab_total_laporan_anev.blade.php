<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-activity-three">
        <div class="widget-heading">
            <div class="row">
                <h5 class="ml-n3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-n1" width="20" height="20" viewBox="0 0 20 20">
                        <path id="bar_chart_alt" d="M22,22H2V11.474A2.055,2.055,0,0,1,4,9.368H8V4.105A2.055,2.055,0,0,1,10,2h4a2.055,2.055,0,0,1,2,2.105V7.263h4a2.055,2.055,0,0,1,2,2.105ZM16,9.368V19.895h4V9.368ZM10,4.105V19.895h4V4.105ZM4,11.474v8.421H8V11.474Z" transform="translate(-2 -2)" fill="#00adef"/>
                    </svg>
                    <span>DATA TOTAL LAPORAN ANEV [ {{ indonesiaDayAndDate(operationPlans()->start_date) }} S/D {{ indonesiaDayAndDate(operationPlans()->end_date) }} ]</span>
                </h5>
            </div>
        </div>
        <div class="widget-content">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="mx-auto">
                        <div id="anev_pelanggaran_lalin_total" class=""></div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="mx-auto">
                        <div id="anev_kecelakaan_lalin_total" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('page_js')
<script>
$(document).ready(function () {
    loadAnevTotalChart()
})

function loadAnevTotalChart()
{
    var configAnevChartPelanggaran = {
        chart: {
            height: 350,
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

    var anevLeftChart = new ApexCharts(
        document.querySelector("#anev_pelanggaran_lalin_total"),
        configAnevChartPelanggaran
    )

    anevLeftChart.render()

    var configAnevChartKecelakaan = {
        chart: {
            height: 350,
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

    var anevRightChart = new ApexCharts(
        document.querySelector("#anev_kecelakaan_lalin_total"),
        configAnevChartKecelakaan
    )

    anevRightChart.render()

    setInterval(function() {
        axios.get(route('chart_anev_all'))
        .then(function(response) {

            if(!_.isEmpty(response.data)) {

                anevLeftChart.updateOptions({
                    xaxis: {
                        categories: [response.data.prev_year, response.data.year]
                    },
                })

                anevLeftChart.updateSeries(
                [
                    {
                        name: "Tilang",
                        data: [response.data.tilang_prev, response.data.teguran_prev]
                    },
                    {
                        name: "Teguran",
                        data: [response.data.tilang, response.data.teguran]
                    }
                ])

                anevRightChart.updateOptions({
                    xaxis: {
                        categories: [response.data.prev_year, response.data.year]
                    },
                })

                anevRightChart.updateSeries(
                [
                    {
                        name: "Kejadian",
                        data:
                        [
                            response.data.jumlah_kejadian_prev,
                            response.data.jumlah_kejadian,
                        ]
                    },
                    {
                        name: "Meninggal",
                        data:
                        [
                            response.data.jumlah_korban_meninggal_prev,
                            response.data.jumlah_korban_meninggal,
                        ]
                    },
                    {
                        name: "Luka Berat",
                        data:
                        [
                            response.data.jumlah_korban_luka_berat_prev,
                            response.data.jumlah_korban_luka_berat,
                        ]
                    },
                    {
                        name: "Luka Ringan",
                        data:
                        [
                            response.data.jumlah_korban_luka_ringan_prev,
                            response.data.jumlah_korban_luka_ringan,
                        ]
                    },
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
    }, 10000)
}
</script>
@endpush