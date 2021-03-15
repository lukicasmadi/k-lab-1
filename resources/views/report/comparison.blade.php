@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header mb-25">
        <div class="page-title">
            <h3>
            <svg style="margin-top:-5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
            <path id="Union_2" data-name="Union 2" d="M-2852-2201a2,2,0,0,1-2-2v-16a2,2,0,0,1,2-2h7a.118.118,0,0,1,.032.006.131.131,0,0,0,.03.006,1.043,1.043,0,0,1,.259.051l.028.009a.492.492,0,0,1,.066.028.993.993,0,0,1,.293.2l6,6a.98.98,0,0,1,.2.293.639.639,0,0,1,.025.068l.009.026a1,1,0,0,1,.049.258.144.144,0,0,0,.007.027.139.139,0,0,1,0,.028v11a2,2,0,0,1-2,2Zm0-2h12v-10h-5a1,1,0,0,1-1-1v-5h-6Zm8-12h2.586l-2.586-2.586Zm-5.333,10v-2h6.667v2Zm0-4v-2h6.667v2Z" transform="translate(2854 2221)" fill="#00adef"/>
            </svg>
            <span>Laporan Analisa Dan Evaluasi</span>
            </h3>
        </div>
        <div class="toggle-switch">
            <label class="switch s-icons s-outline  s-outline-secondary">
                <input type="checkbox" checked="" class="theme-shifter" id="changeTheme">
                <span class="slider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="83" height="19.762" viewBox="0 0 83 19.762" class="feather feather-sun">
                    <g id="Group_3821" data-name="Group 3821" transform="translate(-1550 -140)">
                        <text id="gelap" transform="translate(1580 155)" fill="#fff" font-size="16" font-family="Bahnschrift" letter-spacing="0.05em"><tspan x="0" y="0">GELAP</tspan></text>
                        <path id="moon" d="M18.248,17,18,17A11,11,0,0,1,7,6q0-.124,0-.248A8,8,0,1,0,18.248,17Zm1.218-2.116A9.071,9.071,0,0,1,18,15,9,9,0,0,1,9.822,2.238a10,10,0,1,0,11.94,11.94A8.932,8.932,0,0,1,19.466,14.881Z" transform="translate(1548 137.762)" fill="#fff" fill-rule="evenodd"/>
                    </g>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="94" height="20" viewBox="0 0 94 20" class="feather feather-moon">
                    <g id="Group_3823" data-name="Group 3823" transform="translate(-1670 -140)">
                        <text id="terang" transform="translate(1700 155)" fill="#fff" font-size="16" font-family="Bahnschrift" letter-spacing="0.05em"><tspan x="0" y="0">TERANG</tspan></text>
                        <path id="sun" d="M13,22H11V19h2Zm5.364-2.222-2.121-2.121,1.414-1.414,2.122,2.122-1.413,1.413Zm-12.728,0L4.219,18.364l2.12-2.122,1.415,1.414-2.12,2.121ZM12,17.007A5.007,5.007,0,1,1,17.007,12,5.007,5.007,0,0,1,12,17.007Zm0-8.014A3.007,3.007,0,1,0,15.007,12,3.007,3.007,0,0,0,12,8.993ZM22,13H19V11h3ZM5,13H2V11H5ZM17.654,7.758,16.241,6.343l2.121-2.122,1.415,1.415L17.655,7.757Zm-11.313,0L4.221,5.637,5.636,4.223l2.12,2.122L6.342,7.757ZM13,5H11V2h2Z" transform="translate(1668.002 138)" fill="#fff"/>
                    </g>
                    </svg>
                </span>
            </label>
        </div>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-lg-4 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-content  widget-content-area mt-3">
                    <form action="{{ route('report_comparison_process') }}" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Operasi</label>
                            <select class="form-control form-control-lg" name="operation_id" id="operation_id">
                                @foreach($rencanaOperasi as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label>Pilih Tahun Pembanding 1</label>
                            <select id="tahun_pembanding_pertama" name="tahun_pembanding_pertama" class="form-control form-control-lg">
                                @foreach($yearFiltered as $yf){
                                    <option value="{{ $yf }}">{{ $yf }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label>Pilih Tahun Pembanding 2</label>
                            <select id="tahun_pembanding_kedua" name="tahun_pembanding_kedua" class="form-control form-control-lg">
                                @foreach($yearFiltered as $yf){
                                    <option value="{{ $yf }}">{{ $yf }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>Pilih Hari</label>
                            <select id="pilihan_hari" name="pilihan_hari" class="form-control height-form"></select>
                        </div> --}}

                        <input type="button" id="rekap" name="rekap" class="mt-4 mb-4 btn btn-primary" value="Rekap Data">
                        <input type="submit" name="submit" class="mt-4 mb-4 btn btn-primary" value="Unduh Data">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12  layout-spacing">

        </div>
    </div>
</div>
@endsection

@push('library_css')
<link href="{{ secure_asset('template/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ secure_asset('template/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ secure_asset('template/plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ secure_asset('template/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>
@endpush

@push('page_js')
<script>
$(document).ready(function () {

})
</script>
@endpush