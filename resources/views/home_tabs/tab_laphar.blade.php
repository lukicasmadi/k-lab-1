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
                        <div id="total_laphar" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('page_js')
<script>
$(document).ready(function () {
    var sCol = {
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
        series: [{
            name: 'Tilang',
            data: [44]
        }, {
            name: 'Teguran',
            data: [76]
        }],
        xaxis: {
            categories: ['2021'],
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

    var chart = new ApexCharts(
        document.querySelector("#total_laphar"),
        sCol
    )

    chart.render()
})
</script>
@endpush