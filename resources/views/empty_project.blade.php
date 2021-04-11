@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>DASHBOARD</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-md-12">
            <blockquote class="blockquote">
                <p class="d-inline">KORLANTAS BELUM MENGINPUT DATA PROJEK YANG SEDANG BERLANGSUNG SAAT INI</p>
            </blockquote>
        </div>
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