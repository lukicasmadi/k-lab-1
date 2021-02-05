@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <blockquote class="blockquote">
            <p class="d-inline">TIDAK ADA PROJECT YANG SEDANG BERJALAN DI HARI INI</p>
        </blockquote>
    </div>
</div>
@endsection

@push('library_js')
<script src="{{ secure_asset('template/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ secure_asset('template/plugins/apex/apexcharts.min.js') }}"></script>
@endpush

@push('library_css')
<link href="{{ secure_asset('template/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ secure_asset('template/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_js')
<script>
$(document).ready(function () {

});
</script>
@endpush