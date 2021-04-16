@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>DATA STATISTIK</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three">
                <div class="widget-heading">
                    <h5 class="ml-n3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-n1" width="20" height="20" viewBox="0 0 20 20">
                            <path id="bar_chart_alt" d="M22,22H2V11.474A2.055,2.055,0,0,1,4,9.368H8V4.105A2.055,2.055,0,0,1,10,2h4a2.055,2.055,0,0,1,2,2.105V7.263h4a2.055,2.055,0,0,1,2,2.105ZM16,9.368V19.895h4V9.368ZM10,4.105V19.895h4V4.105ZM4,11.474v8.421H8V11.474Z" transform="translate(-2 -2)" fill="#00adef"/>
                        </svg>
                        <span>PELANGGARAN LALU LINTAS</span>
                        <p class="mar20 ml-n1">total data laporan</p>
                        <b class="ml-n1">34 laporan</b>
                    </h5>
                </div>

                <div class="widget-content widget-content-area">
                    <div id="statistik_pelanggaran_lalin"></div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_js')
<script src="{{ asset('template/plugins/apex/apexcharts.min.js') }}"></script>
<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
@endpush

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/apex/apexcharts.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/dashboard/dash_2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/custom.css') }}"/>
@endpush

@push('page_css')

@endpush

@push('page_js')
<script>
$(document).ready(function () {
    statistikLanggarLalin()
})

function statistikLanggarLalin() {

    axios.get(route('statistics_data'))
    .then(response => {
        console.log(response)
    })
    .catch(err => {
        console.error(err);
    })

    var sLineArea = {
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        series: [{
            name: 'TILANG',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'TEGURAN',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],

        xaxis: {
            type: 'string',
            categories: ["aceh", "sumut", "sumbar", "riau", "kepri", "jambi", "bengkulu"],
        },
        grid: {
            show: true,      // you can either change hear to disable all grids
            xaxis: {
                lines: {
                    show: false  //or just here to disable only x axis grids
                }
            },
            yaxis: {
                lines: {
                    show: false  //or just here to disable only y axis
                }
            },
        },
    }

    var chart = new ApexCharts(document.querySelector("#statistik_pelanggaran_lalin"), sLineArea)
    chart.render();
}
</script>
@endpush