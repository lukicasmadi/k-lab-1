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
<script src="{{ asset('js/tabs.js') }}"></script>
@endpush