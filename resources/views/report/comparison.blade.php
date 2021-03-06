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
                    <form action="{{ route('report_comparison_process') }}" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Tahun Pembanding Pertama</label>
                            <select id="tahun_pembanding_pertama" name="tahun_pembanding_pertama" class="form-control form-control-lg"></select>
                        </div>

                        <div class="form-group mb-4">
                            <label>Tahun Pembanding Kedua</label>
                            <select id="tahun_pembanding_kedua" name="tahun_pembanding_kedua" class="form-control form-control-lg"></select>
                        </div>

                        <div class="form-group mb-4">
                            <label>Operasi</label>
                            <select class="form-control form-control-lg" name="operation_id" id="operation_id">
                                @foreach($rencanaOperasi as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" name="submit" class="mt-4 mb-4 btn btn-primary" value="Generate">
                    </form>
                </div>
            </div>
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

var min = new Date().getFullYear()
var max = min + 5
var select = document.getElementById('tahun_pembanding_pertama')
var select_kedua = document.getElementById('tahun_pembanding_kedua')

for (var i = min; i<=max; i++) {
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);

    var opt_kedua = document.createElement('option');
    opt_kedua.value = i;
    opt_kedua.innerHTML = i;
    select_kedua.appendChild(opt_kedua);
}
</script>
@endpush