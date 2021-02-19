@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Laporan Harian</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <p>Test</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection