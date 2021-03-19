@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-4 col-12 mb-25 layout-spacing">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-content mt-3 widget-content-area">
                    <form action="{{ route('report_comparison_process') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="text-popup">pilih Operasi</label>
                            <select class="form-control height-form" name="operation_id" id="operation_id">
                                @foreach($rencanaOperasi as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Tahun Pembanding 1</label>
                            <select id="tahun_pembanding_pertama" name="tahun_pembanding_pertama" class="form-control height-form">
                                @foreach($yearFiltered as $yf){
                                    <option value="{{ $yf }}">{{ $yf }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Tahun Pembanding 2</label>
                            <select id="tahun_pembanding_kedua" name="tahun_pembanding_kedua" class="form-control height-form">
                                @foreach($yearFiltered as $yf){
                                    <option value="{{ $yf }}">{{ $yf }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Hari</label>
                            <select id="tahun_pembanding_pertama" name="tahun_pembanding_pertama" class="form-control height-form"></select>
                        </div>

                        <input type="submit" name="submit" class="mt-4 mb-4 btn btn-primary" value="rekap data">
                        <input type="submit" name="submit" class="mt-4 mb-4 btn btn-primary" value="unduh data">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12  layout-spacing">
        <div class="widget-content mt-1 mb-5">
                <div class="table-responsive">
                    <table id="tbl_daily_submited" class="table">
                        <thead>
                            <tr>
                                <th>Nama Laporan</th>
                                <th>tahun 2020</th>
                                <th>tahun 2021</th>
                                <th>status</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td>365</td>
                                <td>309</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Pelanggaran Ringan</td>
                                <td>124</td>
                                <td>144</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td>365</td>
                                <td>309</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Pelanggaran Ringan</td>
                                <td>124</td>
                                <td>144</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td>365</td>
                                <td>309</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Pelanggaran Ringan</td>
                                <td>124</td>
                                <td>144</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td>365</td>
                                <td>309</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Pelanggaran Ringan</td>
                                <td>124</td>
                                <td>144</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td>365</td>
                                <td>309</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Pelanggaran Ringan</td>
                                <td>124</td>
                                <td>144</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td>365</td>
                                <td>309</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Pelanggaran Ringan</td>
                                <td>124</td>
                                <td>144</td>
                                <td>Turun</td>
                                <td>15,34%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
</script>
@endpush