@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>LAPORAN ANALISA & EVALUASI</span>
    </h3>
</div>
@endpush

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
                            <label class="text-popup">Pilih Operasi</label>
                            <select class="form-control height-form" name="operation_id" id="operation_id">
                                @foreach($rencanaOperasi as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Tahun Pembanding 1</label>
                            <select id="tahun_pembanding_pertama" name="tahun_pembanding_pertama" class="form-control height-form">
                                @foreach($prevYear as $py){
                                    <option value="{{ $py }}">{{ $py }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Tahun Pembanding 2</label>
                            <select id="tahun_pembanding_kedua" name="tahun_pembanding_kedua" class="form-control height-form">
                                @foreach($currentYear as $cy){
                                    <option value="{{ $cy }}">{{ $cy }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Hari</label>
                            <input id="tanggal" name="tanggal" class="form-control flatpickr flatpickr-input active form-control-lg" type="text" placeholder="- Pilih Tanggal -">
                        </div>

                        <input type="button" name="btnRekapData" id="btnRekapData" class="mt-4 mb-4 btn btn-primary" value="Rekap Data">
                        <input type="submit" name="btnUnduhData" id="btnUnduhData" class="mt-4 mb-4 btn btn-primary" value="Unduh Data">
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
                                <th width="35%">Nama Laporan</th>
                                <th width="25%">tahun 2020</th>
                                <th width="25%">tahun 2021</th>
                                <th width="5%">status</th>
                                <th width="10%">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="titlletd" bgcolor="#fff" colspan="5">I. DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">1. PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td id="pelanggaran_lalin_tilang_prev">0</td>
                                <td id="pelanggaran_lalin_tilang">0</td>
                                <td id="status_pelanggaran_lalin_tilang"><svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"><defs><style>.a{fill:#00adef;}</style></defs><path class="a" d="M9.125,11.606,6.881,9.369,6,10.25,9.75,14l3.75-3.75-.881-.881-2.244,2.238V4H9.125Z" transform="translate(-6 -4)"/></svg> Turun</td>
                                <td id="persentase_pelanggaran_lalin_tilang">0%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Teguran</td>
                                <td id="pelanggaran_lalin_teguran_prev">0</td>
                                <td id="pelanggaran_lalin_teguran">0</td>
                                <td id="status_pelanggaran_lalin_teguran"><svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"><defs><style>.a{fill:#00adef;}</style></defs><path class="a" d="M9.125,6.394,6.881,8.631,6,7.75,9.75,4,13.5,7.75l-.881.881L10.375,6.394V14H9.125Z" transform="translate(-6 -4)"/></svg> Naik</td>
                                <td id="persentase_pelanggaran_lalin_teguran">0%</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">2. JENIS PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" bgcolor="#fff" colspan="5">A. Sepeda Motor</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Gun Helm SNI</td>
                                <td id="pelanggaran_lalin_motor_gunhelm_prev">0</td>
                                <td id="pelanggaran_lalin_motor_gunhelm">0</td>
                                <td id="status_pelanggaran_lalin_motor_gunhelm"><svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"><defs><style>.a{fill:#00adef;}</style></defs><path class="a" d="M9.125,6.394,6.881,8.631,6,7.75,9.75,4,13.5,7.75l-.881.881L10.375,6.394V14H9.125Z" transform="translate(-6 -4)"/></svg> Naik</td>
                                <td  id="persentase_pelanggaran_lalin_motor_gunhelm">0%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melawan Arus</td>
                                <td id="pelanggaran_lalin_motor_lawan_arus_prev">0</td>
                                <td id="pelanggaran_lalin_motor_lawan_arus">0</td>
                                <td id="status_pelanggaran_lalin_motor_lawan_arus"><svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"><defs><style>.a{fill:#00adef;}</style></defs><path class="a" d="M9.125,6.394,6.881,8.631,6,7.75,9.75,4,13.5,7.75l-.881.881L10.375,6.394V14H9.125Z" transform="translate(-6 -4)"/></svg> Naik</td>
                                <td  id="persentase_pelanggaran_lalin_motor_lawan_arus">0%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Gun HP Saat Berkendara</td>
                                <td id="pelanggaran_lalin_motor_gunhp_prev">0</td>
                                <td id="pelanggaran_lalin_motor_gunhp">0</td>
                                <td id="status_pelanggaran_lalin_motor_gunhp"><svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"><defs><style>.a{fill:#00adef;}</style></defs><path class="a" d="M9.125,11.606,6.881,9.369,6,10.25,9.75,14l3.75-3.75-.881-.881-2.244,2.238V4H9.125Z" transform="translate(-6 -4)"/></svg> Turun</td>
                                <td  id="persentase_pelanggaran_lalin_motor_gunhp">0%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berkendara Di Bawah Pengaruh Alkohol</td>
                                <td id="pelanggaran_lalin_motor_pengaruh_alkohol_prev">0</td>
                                <td id="pelanggaran_lalin_motor_pengaruh_alkohol">0</td>
                                <td id="status_pelanggaran_lalin_motor_pengaruh_alkohol"><svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"><defs><style>.a{fill:#00adef;}</style></defs><path class="a" d="M9.125,6.394,6.881,8.631,6,7.75,9.75,4,13.5,7.75l-.881.881L10.375,6.394V14H9.125Z" transform="translate(-6 -4)"/></svg> Naik</td>
                                <td  id="persentase_pelanggaran_lalin_motor_pengaruh_alkohol">0%</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melebihi Batas Kecepatan</td>
                                <td id="pelanggaran_lalin_batas_kecepatan_prev">0</td>
                                <td id="pelanggaran_lalin_batas_kecepatan">0</td>
                                <td id="status_pelanggaran_lalin_batas_kecepatan"><svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"><defs><style>.a{fill:#00adef;}</style></defs><path class="a" d="M9.125,11.606,6.881,9.369,6,10.25,9.75,14l3.75-3.75-.881-.881-2.244,2.238V4H9.125Z" transform="translate(-6 -4)"/></svg> Turun</td>
                                <td id="persentase_pelanggaran_lalin_batas_kecepatan">0%</td>
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
    var f1 = flatpickr(document.getElementById('tanggal'));

    $("#btnRekapData").click(function (e) {
        e.preventDefault();
        alert("call ajax")
    });
})
</script>
@endpush