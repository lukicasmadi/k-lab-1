@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h5 class="">Laporan Kegitan Tiap Polda</h5>
                    <ul class="tabs tab-pills">
                        <li><a href="#" id="filter_daily" class="tabmenu">Daily</a></li>
                    </ul>
                </div>

                <div class="widget-content">
                    <div class="tabs tab-content">
                        <div id="content_1" class="tabcontent">
                            <div id="incoming_report"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_js')
<script src="{{ secure_asset('template/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ secure_asset('template/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ secure_asset('js/dashboard.js') }}"></script>
@endpush

@push('library_css')
<link href="{{ secure_asset('template/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ secure_asset('template/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endpush