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
                    <form action="{{ route('report_comparison_process') }}" id="comparison_form" method="POST">
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
                        <input type="submit" name="btnUnduhData" id="btnUnduhData" class="mt-4 mb-4 btn btn-primary" value="Unduh Data">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-12 layout-spacing" id="panelData">
            <div class="widget-content mt-1 mb-5">
                <div class="table-responsive">
                    <table id="tbl_daily_submited" class="table">
                        <thead>
                            <tr>
                                <th width="31%">Nama Laporan</th>
                                <th width="27%">tahun 2020</th>
                                <th width="27%">tahun 2021</th>
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
                                <td id="pelanggaran_lalu_lintas_tilang_prev">0</td>
                                <td id="pelanggaran_lalu_lintas_tilang">0</td>
                                <td id="status_pelanggaran_lalin_tilang">-</td>
                                <td id="persentase_pelanggaran_lalin_tilang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Teguran</td>
                                <td id="pelanggaran_lalu_lintas_teguran_prev">0</td>
                                <td id="pelanggaran_lalu_lintas_teguran">0</td>
                                <td id="status_pelanggaran_lalin_teguran">-</td>
                                <td id="persentase_pelanggaran_lalin_teguran">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">2. JENIS PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Sepeda Motor</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Gun Helm SNI</td>
                                <td id="pelanggaran_lalin_motor_gunhelm_prev">0</td>
                                <td id="pelanggaran_lalin_motor_gunhelm">0</td>
                                <td id="status_pelanggaran_lalin_motor_gunhelm">-</td>
                                <td  id="persentase_pelanggaran_lalin_motor_gunhelm">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melawan Arus</td>
                                <td id="pelanggaran_lalin_motor_lawan_arus_prev">0</td>
                                <td id="pelanggaran_lalin_motor_lawan_arus">0</td>
                                <td id="status_pelanggaran_lalin_motor_lawan_arus">-</td>
                                <td  id="persentase_pelanggaran_lalin_motor_lawan_arus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Gun HP Saat Berkendara</td>
                                <td id="pelanggaran_lalin_motor_gunhp_prev">0</td>
                                <td id="pelanggaran_lalin_motor_gunhp">0</td>
                                <td id="status_pelanggaran_lalin_motor_gunhp">-</td>
                                <td  id="persentase_pelanggaran_lalin_motor_gunhp">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berkendara Di Bawah Pengaruh Alkohol</td>
                                <td id="pelanggaran_lalin_motor_pengaruh_alkohol_prev">0</td>
                                <td id="pelanggaran_lalin_motor_pengaruh_alkohol">0</td>
                                <td id="status_pelanggaran_lalin_motor_pengaruh_alkohol">-</td>
                                <td  id="persentase_pelanggaran_lalin_motor_pengaruh_alkohol">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melebihi Batas Kecepatan</td>
                                <td id="pelanggaran_lalin_motor_batas_kecepatan_prev">0</td>
                                <td id="pelanggaran_lalin_motor_batas_kecepatan">0</td>
                                <td id="status_pelanggaran_lalin_motor_batas_kecepatan">-</td>
                                <td id="persentase_pelanggaran_lalin_motor_batas_kecepatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berkendara Di Bawah Umur</td>
                                <td id="pelanggaran_lalin_motor_bawah_umur_prev">0</td>
                                <td id="pelanggaran_lalin_motor_bawah_umur">0</td>
                                <td id="status_pelanggaran_lalin_motor_bawah_umur">-</td>
                                <td  id="persentase_pelanggaran_lalin_motor_bawah_umur">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Lain - Lain</td>
                                <td id="pelanggaran_lalin_motor_lain_lain_prev">0</td>
                                <td id="pelanggaran_lalin_motor_lain_lain">0</td>
                                <td id="status_pelanggaran_lalin_motor_lain_lain">-</td>
                                <td id="persentase_pelanggaran_lalin_motor_lain_lain">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Mobil Dan Kendaraan Khusus</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melawan Arus</td>
                                <td id="pelanggaran_lalin_mobil_lawan_arus_prev">0</td>
                                <td id="pelanggaran_lalin_mobil_lawan_arus">0</td>
                                <td id="status_pelanggaran_lalin_mobil_lawan_arus">-</td>
                                <td  id="persentase_pelanggaran_lalin_mobil_lawan_arus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Gun HP Saat Berkendara</td>
                                <td id="pelanggaran_lalin_mobil_gunhp_prev">0</td>
                                <td id="pelanggaran_lalin_mobil_gunhp">0</td>
                                <td id="status_pelanggaran_lalin_mobil_gunhp">-</td>
                                <td  id="persentase_pelanggaran_lalin_mobil_gunhp">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berkendara Di Bawah Pengaruh Alkohol</td>
                                <td id="pelanggaran_lalin_mobil_pengaruh_alkohol_prev">0</td>
                                <td id="pelanggaran_lalin_mobil_pengaruh_alkohol">0</td>
                                <td id="status_pelanggaran_lalin_mobil_pengaruh_alkohol">-</td>
                                <td  id="persentase_pelanggaran_lalin_mobil_pengaruh_alkohol">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melebihi Batas Kecepatan</td>
                                <td id="pelanggaran_lalin_mobil_batas_kecepatan_prev">0</td>
                                <td id="pelanggaran_lalin_mobil_batas_kecepatan">0</td>
                                <td id="status_pelanggaran_lalin_mobil_batas_kecepatan">-</td>
                                <td id="persentase_pelanggaran_lalin_mobil_batas_kecepatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berkendara Di Bawah Umur</td>
                                <td id="pelanggaran_lalin_mobil_bawah_umur_prev">0</td>
                                <td id="pelanggaran_lalin_mobil_bawah_umur">0</td>
                                <td id="status_pelanggaran_lalin_mobil_bawah_umur">-</td>
                                <td  id="persentase_pelanggaran_lalin_mobil_bawah_umur">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Gun Safety Belt</td>
                                <td id="pelanggaran_lalin_mobil_gunsafety_belt_prev">0</td>
                                <td id="pelanggaran_lalin_mobil_gunsafety_belt">0</td>
                                <td id="status_pelanggaran_lalin_mobil_gunsafety_belt">-</td>
                                <td  id="persentase_pelanggaran_lalin_mobil_gunsafety_belt">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Lain - Lain</td>
                                <td id="pelanggaran_lalin_mobil_lain_lain_prev">0</td>
                                <td id="pelanggaran_lalin_mobil_lain_lain">0</td>
                                <td id="status_pelanggaran_lalin_mobil_lain_lain">-</td>
                                <td id="persentase_pelanggaran_lalin_mobil_lain_lain">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">3. BARANG BUKTI YANG DISITA</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>SIM</td>
                                <td id="pelanggaran_lalin_barang_bukti_sim_prev">0</td>
                                <td id="pelanggaran_lalin_barang_bukti_sim">0</td>
                                <td id="status_pelanggaran_lalin_barang_bukti_sim">-</td>
                                <td  id="persentase_pelanggaran_lalin_barang_bukti_sim">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>STNK</td>
                                <td id="pelanggaran_lalin_barang_bukti_stnk_prev">0</td>
                                <td id="pelanggaran_lalin_barang_bukti_stnk">0</td>
                                <td id="status_pelanggaran_lalin_barang_bukti_stnk">-</td>
                                <td  id="persentase_pelanggaran_lalin_barang_bukti_stnk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kendaraan</td>
                                <td id="pelanggaran_lalin_barang_bukti_kendaraan_prev">0</td>
                                <td id="pelanggaran_lalin_barang_bukti_kendaraan">0</td>
                                <td id="status_pelanggaran_lalin_barang_bukti_kendaraan">-</td>
                                <td  id="persentase_pelanggaran_lalin_barang_bukti_kendaraan">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">4. KENDARAAN YANG TERLIBAT PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>sepeda motor</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_motor_prev">0</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_motor">0</td>
                                <td id="status_pelanggaran_lalin_terlibat_pelanggaran_motor">-</td>
                                <td  id="persentase_pelanggaran_lalin_terlibat_pelanggaran_motor">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>mobil penumpang</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_png_prev">0</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_png">0</td>
                                <td id="status_pelanggaran_lalin_terlibat_pelanggaran_mob_png">-</td>
                                <td  id="persentase_pelanggaran_lalin_terlibat_pelanggaran_mob_png">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>mobil bus</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_bus_prev">0</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_bus">0</td>
                                <td id="status_pelanggaran_lalin_terlibat_pelanggaran_bus">-</td>
                                <td  id="persentase_pelanggaran_lalin_terlibat_pelanggaran_bus">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>mobil barang</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_brg_prev">0</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_brg">0</td>
                                <td id="status_pelanggaran_lalin_terlibat_pelanggaran_mob_brg">-</td>
                                <td  id="persentase_pelanggaran_lalin_terlibat_pelanggaran_mob_brg">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>kendaraan khusus</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_khusus_prev">0</td>
                                <td id="pelanggaran_lalin_terlibat_pelanggaran_khusus">0</td>
                                <td id="status_pelanggaran_lalin_terlibat_pelanggaran_khusus">-</td>
                                <td  id="persentase_pelanggaran_lalin_terlibat_pelanggaran_khusus">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">5. PROFESI PELAKU PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>pegawai negeri sipil</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_pns_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_pns">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_pns">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_pns">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>karyawan / swasta</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_swasta_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_swasta">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_swasta">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_swasta">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>pelajar / mahasiswa</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_pelajar_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_pelajar">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_pelajar">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_pelajar">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>pengemudi (supir)</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_supir_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_supir">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_supir">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_supir">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>TNI</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_tni_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_tni">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_tni">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_tni">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>POLRI</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_polri_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_polri">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_polri">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_polri">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>lain - lain</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_lainnya_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_lainnya">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_lainnya">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_lainnya">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">6. USIA PELAKU PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>< 15 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_15tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_15tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_15tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_15tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>16 - 20 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_1620tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_1620tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_1620tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_1620tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>21 - 25 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_2125tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_2125tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_2125tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_2125tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>26 - 30 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_2630tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_2630tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_2630tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_2630tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>31 - 35 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_3135tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_3135tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_3135tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_3135tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>36 - 40 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_3640tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_3640tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_3640tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_3640tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>41 - 45 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_4145tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_4145tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_4145tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_4145tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>46 - 50 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_4650tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_4650tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_4650tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_4650tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>51 - 55 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_5155tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_5155tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_5155tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_5155tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>56 - 60 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_5660tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_5660tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_5660tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_5660tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>> 60 Tahun</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_60tahun_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_60tahun">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_60tahun">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_60tahun">-</td>
                            </tr>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">7. SIM PELAKU PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_a_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_a">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_a">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_a">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A Umum</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_a_umum_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_a_umum">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_a_umum">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_a_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_b1_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_b1">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_b1">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_b1">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1 Umum</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_b1umum_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_b1umum">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_b1umum">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_b1umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>BII</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_bii_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_bii">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_bii">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_bii">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B II Umum</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_bii_umum_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_bii_umum">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_bii_umum">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_bii_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>C</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_c_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_c">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_c">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_c">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>D</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_d_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_d">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_d">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_d">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>SIM Internasional</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_sim_internasional_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_sim_internasional">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_sim_internasional">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_sim_internasional">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>Tanpa SIM</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_tanpa_sim_prev">0</td>
                                <td id="pelanggaran_lalin_profesi_pelaku_tanpa_sim">0</td>
                                <td id="status_pelanggaran_lalin_profesi_pelaku_tanpa_sim">-</td>
                                <td  id="persentase_pelanggaran_lalin_profesi_pelaku_tanpa_sim">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">8. LOKASI PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan pemukiman</td>
                                <td id="pelanggaran_lalin_kawasan_pemukiman_prev">0</td>
                                <td id="pelanggaran_lalin_kawasan_pemukiman">0</td>
                                <td id="status_pelanggaran_lalin_kawasan_pemukiman">-</td>
                                <td  id="persentase_pelanggaran_lalin_kawasan_pemukiman">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan perbelanjaan</td>
                                <td id="pelanggaran_lalin_kawasan_perbelanjaan_prev">0</td>
                                <td id="pelanggaran_lalin_kawasan_perbelanjaan">0</td>
                                <td id="status_pelanggaran_lalin_kawasan_perbelanjaan">-</td>
                                <td  id="persentase_pelanggaran_lalin_kawasan_perbelanjaan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>perkantoran</td>
                                <td id="pelanggaran_lalin_kawasan_perkantoran_prev">0</td>
                                <td id="pelanggaran_lalin_kawasan_perkantoran">0</td>
                                <td id="status_pelanggaran_lalin_kawasan_perkantoran">-</td>
                                <td  id="persentase_pelanggaran_lalin_kawasan_perkantoran">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan wisata</td>
                                <td id="pelanggaran_lalin_kawasan_wisata_prev">0</td>
                                <td id="pelanggaran_lalin_kawasan_wisata">0</td>
                                <td id="status_pelanggaran_lalin_kawasan_wisata">-</td>
                                <td  id="persentase_pelanggaran_lalin_kawasan_wisata">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan industri</td>
                                <td id="pelanggaran_lalin_kawasan_industri_prev">0</td>
                                <td id="pelanggaran_lalin_kawasan_industri">0</td>
                                <td id="status_pelanggaran_lalin_kawasan_industri">-</td>
                                <td  id="persentase_pelanggaran_lalin_kawasan_industri">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Status Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>nasional</td>
                                <td id="pelanggaran_lalin_status_jalan_nasional_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_nasional">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_nasional">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_nasional">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>propinsi</td>
                                <td id="pelanggaran_lalin_status_jalan_propinsi_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_propinsi">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_propinsi">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_propinsi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kab/kota</td>
                                <td id="pelanggaran_lalin_status_jalan_kabkota_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_kabkota">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_kabkota">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_kabkota">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>desa / lingkungan</td>
                                <td id="pelanggaran_lalin_status_jalan_desa_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_desa">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_desa">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_desa">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>arteri</td>
                                <td id="pelanggaran_lalin_status_jalan_arteri_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_arteri">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_arteri">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_arteri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kolektor</td>
                                <td id="pelanggaran_lalin_status_jalan_kolektor_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_kolektor">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_kolektor">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_kolektor">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lokal</td>
                                <td id="pelanggaran_lalin_status_jalan_lokal_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_lokal">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_lokal">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_lokal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lingkungan</td>
                                <td id="pelanggaran_lalin_status_jalan_lingkungan_prev">0</td>
                                <td id="pelanggaran_lalin_status_jalan_lingkungan">0</td>
                                <td id="status_pelanggaran_lalin_status_jalan_lingkungan">-</td>
                                <td  id="persentase_pelanggaran_lalin_status_jalan_lingkungan">-</td>
                            </tr>
                            <tr>
                                <td class="titlletd" bgcolor="#fff" colspan="5">II. DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">9. KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_jumlah_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_jumlah_kejadian">-</td>
                                <td  id="persentase_kecelakaan_lalin_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_korban_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_korban_meninggal">-</td>
                                <td  id="persentase_kecelakaan_lalin_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_korban_lukaberat_prev">0</td>
                                <td id="kecelakaan_lalin_korban_lukaberat">0</td>
                                <td id="status_kecelakaan_lalin_korban_lukaberat">-</td>
                                <td  id="persentase_kecelakaan_lalin_korban_lukaberat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_korban_lukaringan_prev">0</td>
                                <td id="kecelakaan_lalin_korban_lukaringan">0</td>
                                <td id="status_kecelakaan_lalin_korban_lukaringan">-</td>
                                <td  id="persentase_kecelakaan_lalin_korban_lukaringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kerugian materil</td>
                                <td id="kecelakaan_lalin_kerugian_materil_prev">0</td>
                                <td id="kecelakaan_lalin_kerugian_materil">0</td>
                                <td id="status_kecelakaan_lalin_kerugian_materil">-</td>
                                <td  id="persentase_kecelakaan_lalin_kerugian_materil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">10. BARANG BUKTI YANG DISITA</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>SIM</td>
                                <td id="kecelakaan_lalin_barbuk_sim_prev">0</td>
                                <td id="kecelakaan_lalin_barbuk_sim">0</td>
                                <td id="status_kecelakaan_lalin_barbuk_sim">-</td>
                                <td  id="persentase_kecelakaan_lalin_barbuk_sim">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>STNK</td>
                                <td id="kecelakaan_lalin_barbuk_stnk_prev">0</td>
                                <td id="kecelakaan_lalin_barbuk_stnk">0</td>
                                <td id="status_kecelakaan_lalin_barbuk_stnk">-</td>
                                <td  id="persentase_kecelakaan_lalin_barbuk_stnk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kendaraan</td>
                                <td id="kecelakaan_lalin_barbuk_kendaraan_prev">0</td>
                                <td id="kecelakaan_lalin_barbuk_kendaraan">0</td>
                                <td id="status_kecelakaan_lalin_barbuk_kendaraan">-</td>
                                <td  id="persentase_kecelakaan_lalin_barbuk_kendaraan">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">11. PROFESI KORBAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pegawai negeri sipil</td>
                                <td id="kecelakaan_lalin_pns_prev">0</td>
                                <td id="kecelakaan_lalin_pns">0</td>
                                <td id="status_kecelakaan_lalin_pns">-</td>
                                <td  id="persentase_kecelakaan_lalin_pns">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>karyawan / swasta</td>
                                <td id="kecelakaan_lalin_swasta_prev">0</td>
                                <td id="kecelakaan_lalin_swasta">0</td>
                                <td id="status_kecelakaan_lalin_swasta">-</td>
                                <td  id="persentase_kecelakaan_lalin_swasta">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pelajar / mahasiswa</td>
                                <td id="kecelakaan_lalin_pelajar_prev">0</td>
                                <td id="kecelakaan_lalin_pelajar">0</td>
                                <td id="status_kecelakaan_lalin_pelajar">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelajar">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengemudi</td>
                                <td id="kecelakaan_lalin_pengemudi_prev">0</td>
                                <td id="kecelakaan_lalin_pengemudi">0</td>
                                <td id="status_kecelakaan_lalin_pengemudi">-</td>
                                <td  id="persentase_kecelakaan_lalin_pengemudi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>TNI</td>
                                <td id="kecelakaan_lalin_tni_prev">0</td>
                                <td id="kecelakaan_lalin_tni">0</td>
                                <td id="status_kecelakaan_lalin_tni">-</td>
                                <td  id="persentase_kecelakaan_lalin_tni">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>POLRI</td>
                                <td id="kecelakaan_lalin_polri_prev">0</td>
                                <td id="kecelakaan_lalin_polri">0</td>
                                <td id="status_kecelakaan_lalin_polri">-</td>
                                <td  id="persentase_kecelakaan_lalin_polri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lain - lain</td>
                                <td id="kecelakaan_lalin_lain_prev">0</td>
                                <td id="kecelakaan_lalin_lain">0</td>
                                <td id="status_kecelakaan_lalin_lain">-</td>
                                <td  id="persentase_kecelakaan_lalin_lain">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">12. USIA KORBAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>< 15 Tahun</td>
                                <td id="kecelakaan_lalin_15tahun_prev">0</td>
                                <td id="kecelakaan_lalin_15tahun">0</td>
                                <td id="status_kecelakaan_lalin_15tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_15tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>16 - 20 Tahun</td>
                                <td id="kecelakaan_lalin_1620tahun_prev">0</td>
                                <td id="kecelakaan_lalin_1620tahun">0</td>
                                <td id="status_kecelakaan_lalin_1620tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_1620tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>21 - 25 Tahun</td>
                                <td id="kecelakaan_lalin_2125tahun_prev">0</td>
                                <td id="kecelakaan_lalin_2125tahun">0</td>
                                <td id="status_kecelakaan_lalin_2125tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_2125tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>26 - 30 Tahun</td>
                                <td id="kecelakaan_lalin_2630tahun_prev">0</td>
                                <td id="kecelakaan_lalin_2630tahun">0</td>
                                <td id="status_kecelakaan_lalin_2630tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_2630tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>31 - 35 Tahun</td>
                                <td id="kecelakaan_lalin_3135tahun_prev">0</td>
                                <td id="kecelakaan_lalin_3135tahun">0</td>
                                <td id="status_kecelakaan_lalin_3135tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_3135tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>36 - 40 Tahun</td>
                                <td id="kecelakaan_lalin_3640tahun_prev">0</td>
                                <td id="kecelakaan_lalin_3640tahun">0</td>
                                <td id="status_kecelakaan_lalin_3640tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_3640tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>41 - 45 Tahun</td>
                                <td id="kecelakaan_lalin_4145tahun_prev">0</td>
                                <td id="kecelakaan_lalin_4145tahun">0</td>
                                <td id="status_kecelakaan_lalin_4145tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_4145tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>46 - 50 Tahun</td>
                                <td id="kecelakaan_lalin_4650tahun_prev">0</td>
                                <td id="kecelakaan_lalin_4650tahun">0</td>
                                <td id="status_kecelakaan_lalin_4650tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_4650tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>51 - 55 Tahun</td>
                                <td id="kecelakaan_lalin_5155tahun_prev">0</td>
                                <td id="kecelakaan_lalin_5155tahun">0</td>
                                <td id="status_kecelakaan_lalin_5155tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_5155tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>56 - 60 Tahun</td>
                                <td id="kecelakaan_lalin_5660tahun_prev">0</td>
                                <td id="kecelakaan_lalin_5660tahun">0</td>
                                <td id="status_kecelakaan_lalin_5660tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_5660tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>> 60 Tahun</td>
                                <td id="kecelakaan_lalin_60tahun_prev">0</td>
                                <td id="kecelakaan_lalin_60tahun">0</td>
                                <td id="status_kecelakaan_lalin_60tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_60tahun">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">13. SIM KORBAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>A</td>
                                <td id="kecelakaan_lalin_sima_prev">0</td>
                                <td id="kecelakaan_lalin_sima">0</td>
                                <td id="status_kecelakaan_lalin_sima">-</td>
                                <td  id="persentase_kecelakaan_lalin_sima">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>A Umum</td>
                                <td id="kecelakaan_lalin_sima_umum_prev">0</td>
                                <td id="kecelakaan_lalin_sima_umum">0</td>
                                <td id="status_kecelakaan_lalin_sima_umum">-</td>
                                <td  id="persentase_kecelakaan_lalin_sima_umum">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>B1</td>
                                <td id="kecelakaan_lalin_b1_prev">0</td>
                                <td id="kecelakaan_lalin_b1">0</td>
                                <td id="status_kecelakaan_lalin_b1">-</td>
                                <td  id="persentase_kecelakaan_lalin_b1">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>B1 Umum</td>
                                <td id="kecelakaan_lalin_b1umum_prev">0</td>
                                <td id="kecelakaan_lalin_b1umum">0</td>
                                <td id="status_kecelakaan_lalin_b1umum">-</td>
                                <td  id="persentase_kecelakaan_lalin_b1umum">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>BII</td>
                                <td id="kecelakaan_lalin_bii_prev">0</td>
                                <td id="kecelakaan_lalin_bii">0</td>
                                <td id="status_kecelakaan_lalin_bii">-</td>
                                <td  id="persentase_kecelakaan_lalin_bii">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>BII Umum</td>
                                <td id="kecelakaan_lalin_bii_umum_prev">0</td>
                                <td id="kecelakaan_lalin_bii_umum">0</td>
                                <td id="status_kecelakaan_lalin_bii_umum">-</td>
                                <td  id="persentase_kecelakaan_lalin_bii_umum">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>C</td>
                                <td id="kecelakaan_lalin_simc_prev">0</td>
                                <td id="kecelakaan_lalin_simc">0</td>
                                <td id="status_kecelakaan_lalin_simc">-</td>
                                <td  id="persentase_kecelakaan_lalin_simc">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>D</td>
                                <td id="kecelakaan_lalin_simd_prev">0</td>
                                <td id="kecelakaan_lalin_simd">0</td>
                                <td id="status_kecelakaan_lalin_simd">-</td>
                                <td  id="persentase_kecelakaan_lalin_simd">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>SIM Internasional</td>
                                <td id="kecelakaan_lalin_sim_internasional_prev">0</td>
                                <td id="kecelakaan_lalin_sim_internasional">0</td>
                                <td id="status_kecelakaan_lalin_sim_internasional">-</td>
                                <td  id="persentase_kecelakaan_lalin_sim_internasional">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tanpa SIM</td>
                                <td id="kecelakaan_lalin_tanpa_sim_prev">0</td>
                                <td id="kecelakaan_lalin_tanpa_sim">0</td>
                                <td id="status_kecelakaan_lalin_tanpa_sim">-</td>
                                <td  id="persentase_kecelakaan_lalin_tanpa_sim">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">14. KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sepeda motor</td>
                                <td id="kecelakaan_lalin_motor_prev">0</td>
                                <td id="kecelakaan_lalin_motor">0</td>
                                <td id="status_kecelakaan_lalin_motor">-</td>
                                <td  id="persentase_kecelakaan_lalin_motor">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mobil penumpang</td>
                                <td id="kecelakaan_lalin_mobil_penumpang_prev">0</td>
                                <td id="kecelakaan_lalin_mobil_penumpang">0</td>
                                <td id="status_kecelakaan_lalin_mobil_penumpang">-</td>
                                <td  id="persentase_kecelakaan_lalin_mobil_penumpang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mobil bus</td>
                                <td id="kecelakaan_lalin_bus_prev">0</td>
                                <td id="kecelakaan_lalin_bus">0</td>
                                <td id="status_kecelakaan_lalin_bus">-</td>
                                <td  id="persentase_kecelakaan_lalin_bus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mobil barang</td>
                                <td id="kecelakaan_lalin_barang_prev">0</td>
                                <td id="kecelakaan_lalin_barang">0</td>
                                <td id="status_kecelakaan_lalin_barang">-</td>
                                <td  id="persentase_kecelakaan_lalin_barang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kendaraan Khusus</td>
                                <td id="kecelakaan_lalin_kendaraankhusus_prev">0</td>
                                <td id="kecelakaan_lalin_kendaraankhusus">0</td>
                                <td id="status_kecelakaan_lalin_kendaraankhusus">-</td>
                                <td  id="persentase_kecelakaan_lalin_kendaraankhusus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kendaraan tidak bermotor</td>
                                <td id="kecelakaan_lalin_tidak_bermotor_prev">0</td>
                                <td id="kecelakaan_lalin_tidak_bermotor">0</td>
                                <td id="status_kecelakaan_lalin_tidak_bermotor">-</td>
                                <td  id="persentase_kecelakaan_lalin_tidak_bermotor">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">15. JENIS KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tunggal / out of control</td>
                                <td id="kecelakaan_lalin_tunggal_prev">0</td>
                                <td id="kecelakaan_lalin_tunggal">0</td>
                                <td id="status_kecelakaan_lalin_tunggal">-</td>
                                <td  id="persentase_kecelakaan_lalin_tunggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>depan-depan</td>
                                <td id="kecelakaan_lalin_depan_prev">0</td>
                                <td id="kecelakaan_lalin_depan">0</td>
                                <td id="status_kecelakaan_lalin_depan">-</td>
                                <td  id="persentase_kecelakaan_lalin_depan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>depan-belakang</td>
                                <td id="kecelakaan_lalin_depan_belakang_prev">0</td>
                                <td id="kecelakaan_lalin_depan_belakang">0</td>
                                <td id="status_kecelakaan_lalin_depan_belakang">-</td>
                                <td  id="persentase_kecelakaan_lalin_depan_belakang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>depan-samping</td>
                                <td id="kecelakaan_lalin_depan_samping_prev">0</td>
                                <td id="kecelakaan_lalin_depan_samping">0</td>
                                <td id="status_kecelakaan_lalin_depan_samping">-</td>
                                <td  id="persentase_kecelakaan_lalin_depan_samping">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>beruntun</td>
                                <td id="kecelakaan_lalin_beruntun_prev">0</td>
                                <td id="kecelakaan_lalin_beruntun">0</td>
                                <td id="status_kecelakaan_lalin_beruntun">-</td>
                                <td  id="persentase_kecelakaan_lalin_beruntun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tabrak pejalan kaki</td>
                                <td id="kecelakaan_lalin_pejalan_kaki_prev">0</td>
                                <td id="kecelakaan_lalin_pejalan_kaki">0</td>
                                <td id="status_kecelakaan_lalin_pejalan_kaki">-</td>
                                <td  id="persentase_kecelakaan_lalin_pejalan_kaki">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tabrak lari</td>
                                <td id="kecelakaan_lalin_tabrak_lari_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari">-</td>
                                <td  id="persentase_kecelakaan_lalin_tabrak_lari">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tabrak hewan</td>
                                <td id="kecelakaan_lalin_tabrak_hewan_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_hewan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_hewan">-</td>
                                <td  id="persentase_kecelakaan_lalin_tabrak_hewan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>samping-samping</td>
                                <td id="kecelakaan_lalin_samping_prev">0</td>
                                <td id="kecelakaan_lalin_samping">0</td>
                                <td id="status_kecelakaan_lalin_samping">-</td>
                                <td  id="persentase_kecelakaan_lalin_samping">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lainnya</td>
                                <td id="kecelakaan_lalin_lainnya_prev">0</td>
                                <td id="kecelakaan_lalin_lainnya">0</td>
                                <td id="status_kecelakaan_lalin_lainnya">-</td>
                                <td  id="persentase_kecelakaan_lalin_lainnya">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">16. PROFESI PELAKU KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pegawai negeri sipil</td>
                                <td id="kecelakaan_lalin_pelaku_pns_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_pns">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_pns">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_pns">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>karyawan / swasta</td>
                                <td id="kecelakaan_lalin_pelaku_swasta_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_swasta">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_swasta">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_swasta">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pelajar / mahasiswa</td>
                                <td id="kecelakaan_lalin_pelaku_pelajar_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_pelajar">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_pelajar">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_pelajar">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengemudi</td>
                                <td id="kecelakaan_lalin_pelaku_pengemudi_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_pengemudi">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_pengemudi">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_pengemudi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>TNI</td>
                                <td id="kecelakaan_lalin_pelaku_tni_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_tni">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_tni">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_tni">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>POLRI</td>
                                <td id="kecelakaan_lalin_pelaku_polri_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_polri">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_polri">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_polri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lain - lain</td>
                                <td id="kecelakaan_lalin_pelaku_lain_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_lain">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_lain">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_lain">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">17. USIA PELAKU KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>< 15 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_15tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_15tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_15tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_15tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>16 - 20 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_1620tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_1620tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_1620tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_1620tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>21 - 25 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_2125tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_2125tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_2125tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_2125tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>26 - 30 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_2630tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_2630tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_2630tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_2630tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>31 - 35 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_3135tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_3135tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_3135tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_3135tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>36 - 40 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_3640tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_3640tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_3640tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_3640tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>41 - 45 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_4145tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_4145tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_4145tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_4145tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>46 - 50 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_4650tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_4650tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_4650tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_4650tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>51 - 55 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_5155tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_5155tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_5155tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_5155tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>56 - 60 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_5660tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_5660tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_5660tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_5660tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>> 60 Tahun</td>
                                <td id="kecelakaan_lalin_pelaku_60tahun_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_60tahun">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_60tahun">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_60tahun">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">18. SIM PELAKU KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A</td>
                                <td id="kecelakaan_lalin_pelaku_sim_a_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_a">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_a">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_a">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A Umum</td>
                                <td id="kecelakaan_lalin_pelaku_sim_a_umum_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_a_umum">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_a_umum">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_a_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1</td>
                                <td id="kecelakaan_lalin_pelaku_sim_b1_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_b1">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_b1">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_b1">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1 Umum</td>
                                <td id="kecelakaan_lalin_pelaku_sim_b1umum_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_b1umum">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_b1umum">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_b1umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>BII</td>
                                <td id="kecelakaan_lalin_pelaku_sim_bii_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_bii">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_bii">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_bii">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B II Umum</td>
                                <td id="kecelakaan_lalin_pelaku_sim_bii_umum_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_bii_umum">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_bii_umum">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_bii_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>C</td>
                                <td id="kecelakaan_lalin_pelaku_sim_c_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_c">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_c">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_c">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>D</td>
                                <td id="kecelakaan_lalin_pelaku_sim_d_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_d">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_d">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_d">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>SIM Internasional</td>
                                <td id="kecelakaan_lalin_pelaku_sim_sim_internasional_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_sim_internasional">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_sim_internasional">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_sim_internasional">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>Tanpa SIM</td>
                                <td id="kecelakaan_lalin_pelaku_sim_tanpa_sim_prev">0</td>
                                <td id="kecelakaan_lalin_pelaku_sim_tanpa_sim">0</td>
                                <td id="status_kecelakaan_lalin_pelaku_sim_tanpa_sim">-</td>
                                <td  id="persentase_kecelakaan_lalin_pelaku_sim_tanpa_sim">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">19. LOKASI KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan pemukiman</td>
                                <td id="kecelakaan_lalin_kawasan_pemukiman_prev">0</td>
                                <td id="kecelakaan_lalin_kawasan_pemukiman">0</td>
                                <td id="status_kecelakaan_lalin_kawasan_pemukiman">-</td>
                                <td  id="persentase_kecelakaan_lalin_kawasan_pemukiman">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan perbelanjaan</td>
                                <td id="kecelakaan_lalin_kawasan_perbelanjaan_prev">0</td>
                                <td id="kecelakaan_lalin_kawasan_perbelanjaan">0</td>
                                <td id="status_kecelakaan_lalin_kawasan_perbelanjaan">-</td>
                                <td  id="persentase_kecelakaan_lalin_kawasan_perbelanjaan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>perkantoran</td>
                                <td id="kecelakaan_lalin_kawasan_perkantoran_prev">0</td>
                                <td id="kecelakaan_lalin_kawasan_perkantoran">0</td>
                                <td id="status_kecelakaan_lalin_kawasan_perkantoran">-</td>
                                <td  id="persentase_kecelakaan_lalin_kawasan_perkantoran">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan wisata</td>
                                <td id="kecelakaan_lalin_kawasan_wisata_prev">0</td>
                                <td id="kecelakaan_lalin_kawasan_wisata">0</td>
                                <td id="status_kecelakaan_lalin_kawasan_wisata">-</td>
                                <td  id="persentase_kecelakaan_lalin_kawasan_wisata">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan industri</td>
                                <td id="kecelakaan_lalin_kawasan_industri_prev">0</td>
                                <td id="kecelakaan_lalin_kawasan_industri">0</td>
                                <td id="status_kecelakaan_lalin_kawasan_industri">-</td>
                                <td  id="persentase_kecelakaan_lalin_kawasan_industri">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Status Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>nasional</td>
                                <td id="kecelakaan_lalin_status_jalan_nasional_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_nasional">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_nasional">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_nasional">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>propinsi</td>
                                <td id="kecelakaan_lalin_status_jalan_propinsi_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_propinsi">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_propinsi">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_propinsi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kab/kota</td>
                                <td id="kecelakaan_lalin_status_jalan_kabkota_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_kabkota">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_kabkota">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_kabkota">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>desa / lingkungan</td>
                                <td id="kecelakaan_lalin_status_jalan_desa_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_desa">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_desa">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_desa">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>arteri</td>
                                <td id="kecelakaan_lalin_status_jalan_arteri_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_arteri">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_arteri">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_arteri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kolektor</td>
                                <td id="kecelakaan_lalin_status_jalan_kolektor_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_kolektor">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_kolektor">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_kolektor">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lokal</td>
                                <td id="kecelakaan_lalin_status_jalan_lokal_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_lokal">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_lokal">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_lokal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lingkungan</td>
                                <td id="kecelakaan_lalin_status_jalan_lingkungan_prev">0</td>
                                <td id="kecelakaan_lalin_status_jalan_lingkungan">0</td>
                                <td id="status_kecelakaan_lalin_status_jalan_lingkungan">-</td>
                                <td  id="persentase_kecelakaan_lalin_status_jalan_lingkungan">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">20. FAKTOR PENYEBAB KECELAKAAN</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">A. MANUSIA</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_manusia_prev">0</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_manusia">0</td>
                                <td class="subtitle" id="status_kecelakaan_lalin_penyebab_manusia">-</td>
                                <td class="subtitle" id="persentase_kecelakaan_lalin_penyebab_manusia">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>ngantuk/lelah (PSL 283)</td>
                                <td id="kecelakaan_lalin_penyebab_ngantuk_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_ngantuk">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_ngantuk">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_ngantuk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mabuk/pengaruh alkohol dan obat (PSL 283)</td>
                                <td id="kecelakaan_lalin_penyebab_mabuk_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_mabuk">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_mabuk">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_mabuk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sakit (PSL 283)</td>
                                <td id="kecelakaan_lalin_penyebab_sakit_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_sakit">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_sakit">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_sakit">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>hand phone/alat elektronik lain (PSL 283)</td>
                                <td id="kecelakaan_lalin_penyebab_hp_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_hp">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_hp">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_hp">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>menerobos lampu merah(PSL 287 ay 2)</td>
                                <td id="kecelakaan_lalin_penyebab_lampu_merah_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_lampu_merah">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_lampu_merah">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_lampu_merah">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>melanggar batas kecepatan (PSL 287 ay 7)</td>
                                <td id="kecelakaan_lalin_penyebab_batas_cepat_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_batas_cepat">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_batas_cepat">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_batas_cepat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak menjaga jarak</td>
                                <td id="kecelakaan_lalin_penyebab_jaga_jarak_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_jaga_jarak">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_jaga_jarak">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_jaga_jarak">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mendahului/berbelok/berpindah jalur (PSL 294)</td>
                                <td id="kecelakaan_lalin_penyebab_pindah_jalur_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_pindah_jalur">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_pindah_jalur">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_pindah_jalur">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>berpindah lajur ( PSL 295)</td>
                                <td id="kecelakaan_lalin_penyebab_pindah_lajur_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_pindah_lajur">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_pindah_lajur">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_pindah_lajur">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak memberikan lampu isyarat berhenti/berbelok/berubah arah</td>
                                <td id="kecelakaan_lalin_penyebab_lampu_isyarat_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_lampu_isyarat">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_lampu_isyarat">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_lampu_isyarat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak mengutamakan pejalan kaki (PSL 284 jo 106 ay 2)</td>
                                <td id="kecelakaan_lalin_penyebab_pejalan_kaki_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_pejalan_kaki">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_pejalan_kaki">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_pejalan_kaki">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lainnya</td>
                                <td id="kecelakaan_lalin_penyebab_lainnya_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_lainnya">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_lainnya">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_lainnya">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">B. ALAM</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_alam_prev">0</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_alam">0</td>
                                <td class="subtitle" id="status_kecelakaan_lalin_penyebab_alam">-</td>
                                <td class="subtitle" id="persentase_kecelakaan_lalin_penyebab_alam">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">C. KELAIKAN KENDARAAN</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_kendaraan_prev">0</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_kendaraan">0</td>
                                <td class="subtitle" id="status_kecelakaan_lalin_penyebab_kendaraan">-</td>
                                <td class="subtitle" id="persentase_kecelakaan_lalin_penyebab_kendaraan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">D. JALAN (KONDISI JALAN)</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_kondisi_jalan_prev">0</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_kondisi_jalan">0</td>
                                <td class="subtitle" id="status_kecelakaan_lalin_penyebab_kondisi_jalan">-</td>
                                <td class="subtitle" id="persentase_kecelakaan_lalin_penyebab_kondisi_jalan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">E. PRASARANA JALAN</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_prasarana_prev">0</td>
                                <td class="subtitle" id="kecelakaan_lalin_penyebab_prasarana">0</td>
                                <td class="subtitle" id="status_kecelakaan_lalin_penyebab_prasarana">-</td>
                                <td class="subtitle" id="persentase_kecelakaan_lalin_penyebab_prasarana">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>rambu</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_rambu_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_rambu">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_prasarana_rambu">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_prasarana_rambu">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>makna</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_makna_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_makna">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_prasarana_makna">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_prasarana_makna">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>apil</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_apil_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_apil">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_prasarana_apil">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_prasarana_apil">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Perlintasan KA Tanpa Palang Pintu</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_palangpintu_prev">0</td>
                                <td id="kecelakaan_lalin_penyebab_prasarana_palangpintu">0</td>
                                <td id="status_kecelakaan_lalin_penyebab_prasarana_palangpintu">-</td>
                                <td id="persentase_kecelakaan_lalin_penyebab_prasarana_palangpintu">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">21. WAKTU KEJADIAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>00.00 - 03.00</td>
                                <td id="kecelakaan_lalin_waktu_0003_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_0003">0</td>
                                <td id="status_kecelakaan_lalin_waktu_0003">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_0003">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>03.00 - 06.00</td>
                                <td id="kecelakaan_lalin_waktu_0306_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_0306">0</td>
                                <td id="status_kecelakaan_lalin_waktu_0306">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_0306">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>06.00 - 09.00</td>
                                <td id="kecelakaan_lalin_waktu_0609_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_0609">0</td>
                                <td id="status_kecelakaan_lalin_waktu_0609">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_0609">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>09.00 - 12.00</td>
                                <td id="kecelakaan_lalin_waktu_0912_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_0912">0</td>
                                <td id="status_kecelakaan_lalin_waktu_0912">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_0912">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>12.00 - 15.00</td>
                                <td id="kecelakaan_lalin_waktu_1215_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_1215">0</td>
                                <td id="status_kecelakaan_lalin_waktu_1215">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_1215">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>15.00 - 18.00</td>
                                <td id="kecelakaan_lalin_waktu_1518_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_1518">0</td>
                                <td id="status_kecelakaan_lalin_waktu_1518">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_1518">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>18.00 - 21.00</td>
                                <td id="kecelakaan_lalin_waktu_1821_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_1821">0</td>
                                <td id="status_kecelakaan_lalin_waktu_1821">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_1821">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>21.00 - 24.00</td>
                                <td id="kecelakaan_lalin_waktu_2124_prev">0</td>
                                <td id="kecelakaan_lalin_waktu_2124">0</td>
                                <td id="status_kecelakaan_lalin_waktu_2124">-</td>
                                <td id="persentase_kecelakaan_lalin_waktu_2124">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">22. KECELAKAAN LALU LINTAS MENONJOL</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_menonjol_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_menonjol_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_menonjol_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_menonjol_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_menonjol_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_menonjol_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_menonjol_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_menonjol_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_menonjol_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_menonjol_materiil">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">23. KECELAKAAN LALU LINTAS TUNGGAL / OUT OF CONTROL</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tunggal_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_tunggal_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tunggal_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_tunggal_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tunggal_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_tunggal_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tunggal_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_tunggal_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tunggal_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_tunggal_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">24. TABRAK PEJALAN KAKI</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_jalan_kaki_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_jalan_kaki_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_jalan_kaki_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_jalan_kaki_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_jalan_kaki_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_jalan_kaki_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_jalan_kaki_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_jalan_kaki_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_jalan_kaki_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_jalan_kaki_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_jalan_kaki_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_jalan_kaki_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_jalan_kaki_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_jalan_kaki_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_jalan_kaki_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_jalan_kaki_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_jalan_kaki_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_jalan_kaki_materiil">0</td>
                                <td id="status_kecelakaan_lalin_jalan_kaki_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_jalan_kaki_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">25. TABRAK LARI</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_lari_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_lari_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_lari_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_lari_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_lari_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">26. TABRAK SEPEDA MOTOR ( R2 )</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_motor_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_motor_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_motor_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_motor_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_motor_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_motor_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_motor_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_motor_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_motor_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_motor_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_motor_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_motor_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_motor_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_motor_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_motor_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_motor_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_motor_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_motor_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_motor_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_motor_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">27. TABRAK RANMOR RODA EMPAT ( R4 )</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda4_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda4_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda4_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda4_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda4_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda4_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda4_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda4_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda4_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda4_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda4_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">28. TABRAK KENDARAAN TIDAK BERMOTOR (SEPEDA,BECAK DAYUNG, DELMAN, DOKAR DLL)</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tidak_motor_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_tidak_motor_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tidak_motor_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tidak_motor_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tidak_motor_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_tidak_motor_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tidak_motor_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tidak_motor_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tidak_motor_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_tidak_motor_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tidak_motor_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tidak_motor_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tidak_motor_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_tidak_motor_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tidak_motor_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tidak_motor_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tidak_motor_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_tidak_motor_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tidak_motor_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tidak_motor_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">29. KECELAKAAN DI PERLINTASAN KA</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_kejadian_prev">0</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_pelintasan_ka_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_pelintasan_ka_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>berpalang pintu</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_berpalang_prev">0</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_berpalang">0</td>
                                <td id="status_kecelakaan_lalin_pelintasan_ka_berpalang">-</td>
                                <td id="persentase_kecelakaan_lalin_pelintasan_ka_berpalang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak berpalang pintu</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_tidak_berpalang_prev">0</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_tidak_berpalang">0</td>
                                <td id="status_kecelakaan_lalin_pelintasan_ka_tidak_berpalang">-</td>
                                <td id="persentase_kecelakaan_lalin_pelintasan_ka_tidak_berpalang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_luka_ringan_prev">0</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_pelintasan_ka_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_pelintasan_ka_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_luka_berat_prev">0</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_pelintasan_ka_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_pelintasan_ka_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_meninggal_prev">0</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_pelintasan_ka_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_pelintasan_ka_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_materiil_prev">0</td>
                                <td id="kecelakaan_lalin_pelintasan_ka_materiil">0</td>
                                <td id="status_kecelakaan_lalin_pelintasan_ka_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_pelintasan_ka_materiil">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">30. KECELAKAAN TRANSPORTASI</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kecelakaan kereta api</td>
                                <td id="kecelakaan_lalin_transportasi_ka_prev">0</td>
                                <td id="kecelakaan_lalin_transportasi_ka">0</td>
                                <td id="status_kecelakaan_lalin_transportasi_ka">-</td>
                                <td id="persentase_kecelakaan_lalin_transportasi_ka">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kecelakaan laut/perairan</td>
                                <td id="kecelakaan_lalin_transportasi_laut_prev">0</td>
                                <td id="kecelakaan_lalin_transportasi_laut">0</td>
                                <td id="status_kecelakaan_lalin_transportasi_laut">-</td>
                                <td id="persentase_kecelakaan_lalin_transportasi_laut">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kecelakaan udara</td>
                                <td id="kecelakaan_lalin_transportasi_udara_prev">0</td>
                                <td id="kecelakaan_lalin_transportasi_udara">0</td>
                                <td id="status_kecelakaan_lalin_transportasi_udara">-</td>
                                <td id="persentase_kecelakaan_lalin_transportasi_udara">-</td>
                            </tr>
                            <tr>
                                <td class="titlletd" bgcolor="#fff" colspan="5">III. DATA TERKAIT DIKMAS LANTAS</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">31. DIKMAS LANTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Penluh</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>melalui media cetak</td>
                                <td id="dikmas_lantas_penluh_cetak_prev">0</td>
                                <td id="dikmas_lantas_penluh_cetak">0</td>
                                <td id="status_dikmas_lantas_penluh_cetak">-</td>
                                <td id="persentase_dikmas_lantas_penluh_cetak">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>melalui media elektronik</td>
                                <td id="dikmas_lantas_penluh_elektronik_prev">0</td>
                                <td id="dikmas_lantas_penluh_elektronik">0</td>
                                <td id="status_dikmas_lantas_penluh_elektronik">-</td>
                                <td id="persentase_dikmas_lantas_penluh_elektronik">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tempat keramaian</td>
                                <td id="dikmas_lantas_penluh_keramaian_prev">0</td>
                                <td id="dikmas_lantas_penluh_keramaian">0</td>
                                <td id="status_dikmas_lantas_penluh_keramaian">-</td>
                                <td id="persentase_dikmas_lantas_penluh_keramaian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tempat istirahat</td>
                                <td id="dikmas_lantas_penluh_istirahat_prev">0</td>
                                <td id="dikmas_lantas_penluh_istirahat">0</td>
                                <td id="status_dikmas_lantas_penluh_istirahat">-</td>
                                <td id="persentase_dikmas_lantas_penluh_istirahat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>daerah rawan laka & langgar</td>
                                <td id="dikmas_lantas_penluh_langgar_prev">0</td>
                                <td id="dikmas_lantas_penluh_langgar">0</td>
                                <td id="status_dikmas_lantas_penluh_langgar">-</td>
                                <td id="persentase_dikmas_lantas_penluh_langgar">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Penyebaran / Pemasangan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>spanduk</td>
                                <td id="dikmas_lantas_penluh_spanduk_prev">0</td>
                                <td id="dikmas_lantas_penluh_spanduk">0</td>
                                <td id="status_dikmas_lantas_penluh_spanduk">-</td>
                                <td id="persentase_dikmas_lantas_penluh_spanduk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>leaflet</td>
                                <td id="dikmas_lantas_penluh_leaflet_prev">0</td>
                                <td id="dikmas_lantas_penluh_leaflet">0</td>
                                <td id="status_dikmas_lantas_penluh_leaflet">-</td>
                                <td id="persentase_dikmas_lantas_penluh_leaflet">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sticker</td>
                                <td id="dikmas_lantas_penluh_sticker_prev">0</td>
                                <td id="dikmas_lantas_penluh_sticker">0</td>
                                <td id="status_dikmas_lantas_penluh_sticker">-</td>
                                <td id="persentase_dikmas_lantas_penluh_sticker">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>bilboard</td>
                                <td id="dikmas_lantas_penluh_bilboard_prev">0</td>
                                <td id="dikmas_lantas_penluh_bilboard">0</td>
                                <td id="status_dikmas_lantas_penluh_bilboard">-</td>
                                <td id="persentase_dikmas_lantas_penluh_bilboard">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. Program Nasional Keamanan Lalu Lintas</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>polisi sahabat anak</td>
                                <td id="dikmas_lantas_penluh_polisi_anak_prev">0</td>
                                <td id="dikmas_lantas_penluh_polisi_anak">0</td>
                                <td id="status_dikmas_lantas_penluh_polisi_anak">-</td>
                                <td id="persentase_dikmas_lantas_penluh_polisi_anak">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>cara aman sekolah</td>
                                <td id="dikmas_lantas_penluh_cara_aman_prev">0</td>
                                <td id="dikmas_lantas_penluh_cara_aman">0</td>
                                <td id="status_dikmas_lantas_penluh_cara_aman">-</td>
                                <td id="persentase_dikmas_lantas_penluh_cara_aman">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>patroli keamanan sekolah</td>
                                <td id="dikmas_lantas_penluh_patroli_prev">0</td>
                                <td id="dikmas_lantas_penluh_patroli">0</td>
                                <td id="status_dikmas_lantas_penluh_patroli">-</td>
                                <td id="persentase_dikmas_lantas_penluh_patroli">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pramuka saka bhayangkara krida lalu lintas</td>
                                <td id="dikmas_lantas_penluh_pramuka_prev">0</td>
                                <td id="dikmas_lantas_penluh_pramuka">0</td>
                                <td id="status_dikmas_lantas_penluh_pramuka">-</td>
                                <td id="persentase_dikmas_lantas_penluh_pramuka">-</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">D. Program Nasional Keselamatan Lalu Lintas</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>police goes to campus</td>
                                <td id="dikmas_lantas_penluh_police_campus_prev">0</td>
                                <td id="dikmas_lantas_penluh_police_campus">0</td>
                                <td id="status_dikmas_lantas_penluh_police_campus">-</td>
                                <td id="persentase_dikmas_lantas_penluh_police_campus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>safety riding & driving</td>
                                <td id="dikmas_lantas_penluh_safety_riding_prev">0</td>
                                <td id="dikmas_lantas_penluh_safety_riding">0</td>
                                <td id="status_dikmas_lantas_penluh_safety_riding">-</td>
                                <td id="persentase_dikmas_lantas_penluh_safety_riding">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>forum lalu lintas & angkutan jalan</td>
                                <td id="dikmas_lantas_forum_lalin_prev">0</td>
                                <td id="dikmas_lantas_forum_lalin">0</td>
                                <td id="status_dikmas_lantas_forum_lalin">-</td>
                                <td id="persentase_dikmas_lantas_forum_lalin">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kampanye keselamatan</td>
                                <td id="dikmas_lantas_penluh_kampanye_prev">0</td>
                                <td id="dikmas_lantas_penluh_kampanye">0</td>
                                <td id="status_dikmas_lantas_penluh_kampanye">-</td>
                                <td id="persentase_dikmas_lantas_penluh_kampanye">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sekolah mengemudi</td>
                                <td id="dikmas_lantas_penluh_mengemudi_prev">0</td>
                                <td id="dikmas_lantas_penluh_mengemudi">0</td>
                                <td id="status_dikmas_lantas_penluh_mengemudi">-</td>
                                <td id="persentase_dikmas_lantas_penluh_mengemudi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>taman lalu lintas</td>
                                <td id="dikmas_lantas_penluh_taman_lalin_prev">0</td>
                                <td id="dikmas_lantas_penluh_taman_lalin">0</td>
                                <td id="status_dikmas_lantas_penluh_taman_lalin">-</td>
                                <td id="persentase_dikmas_lantas_penluh_taman_lalin">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>global road safety partnership action</td>
                                <td id="dikmas_lantas_penluh_global_road_prev">0</td>
                                <td id="dikmas_lantas_penluh_global_road">0</td>
                                <td id="status_dikmas_lantas_penluh_global_road">-</td>
                                <td id="persentase_dikmas_lantas_penluh_global_road">-</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">32. DATA TERKAIT GIAT KEPOLISIAN GIAT LANTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengaturan</td>
                                <td id="dikmas_lantas_giatlantas_pengaturan_prev">0</td>
                                <td id="dikmas_lantas_giatlantas_pengaturan">0</td>
                                <td id="status_dikmas_lantas_giatlantas_pengaturan">-</td>
                                <td id="persentase_dikmas_lantas_giatlantas_pengaturan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>penjagaan</td>
                                <td id="dikmas_lantas_giatlantas_penjagaan_prev">0</td>
                                <td id="dikmas_lantas_giatlantas_penjagaan">0</td>
                                <td id="status_dikmas_lantas_giatlantas_penjagaan">-</td>
                                <td id="persentase_dikmas_lantas_giatlantas_penjagaan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengawalan</td>
                                <td id="dikmas_lantas_giatlantas_pengawalan_prev">0</td>
                                <td id="dikmas_lantas_giatlantas_pengawalan">0</td>
                                <td id="status_dikmas_lantas_giatlantas_pengawalan">-</td>
                                <td id="persentase_dikmas_lantas_giatlantas_pengawalan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>patroli</td>
                                <td id="dikmas_lantas_giatlantas_patroli_prev">0</td>
                                <td id="dikmas_lantas_giatlantas_patroli">0</td>
                                <td id="status_dikmas_lantas_giatlantas_patroli">-</td>
                                <td id="persentase_dikmas_lantas_giatlantas_patroli">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-12 d-none" id="panelLoading">
            <div class="centerContent">
                <img src="{{ secure_asset('template/assets/img/loader.gif') }}" alt="" srcset="">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="debugModal" tabindex="-1" role="dialog" aria-labelledby="debugModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content" id="debugdata"></div>
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
<link href="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ secure_asset('template/custom.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ secure_asset('template/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>
<script src="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_js')
<script>
    function percentageValue(tahunKedua, tahunPertama) {
        var output1 = tahunKedua - tahunPertama
        var output2 = output1 / tahunPertama
        var output3 = output2 * 100
        var output4 = Math.round(output3, 2)

        if(!output4) {
            return "-"
        } else {
            return output4+"%";
        }
    }

    function percentageStatus(tahunKedua, tahunPertama) {
        if(!tahunKedua || !tahunPertama) {
            return "-"
        } else {
            if(tahunKedua > tahunPertama) {
                tanda = '<svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"> <defs> <style>.a{fill:#00adef;}</style> </defs> <path class="a" d="M9.125,6.394,6.881,8.631,6,7.75,9.75,4,13.5,7.75l-.881.881L10.375,6.394V14H9.125Z" transform="translate(-6 -4)"/> </svg> Naik ';
            } else if(tahunKedua < tahunPertama) {
                tanda = '<svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"> <defs> <style>.a{fill:#00adef;}</style> </defs> <path class="a" d="M9.125,11.606,6.881,9.369,6,10.25,9.75,14l3.75-3.75-.881-.881-2.244,2.238V4H9.125Z" transform="translate(-6 -4)"/> </svg> Turun';
            } else if(tahunKedua == tahunPertama) {
                tanda = "Sama";
            } else {
                tanda = "";
            }
            return tanda;
        }
    }

    $(document).ready(function () {
        var f1 = flatpickr(document.getElementById('tanggal'), {
            mode: "range",
            onClose: function(selectedDates, dateStr, instance) {
                $("#panelData").addClass("d-none")
                $("#panelLoading").removeClass("d-none")

                axios.post(route('comparison_get_data'), {
                    operation_id: $("#operation_id").val(),
                    start_year: $("#tahun_pembanding_pertama").val(),
                    end_year: $("#tahun_pembanding_kedua").val(),
                    date_range: dateStr,
                }).then(function(response) {
                    var dataPrev = response.data.prev
                    var dataCurrent = response.data.current

                    $("#panelLoading").addClass("d-none")
                    $("#panelData").removeClass("d-none")

$("#pelanggaran_lalu_lintas_tilang_prev").html(dataPrev.pelanggaran_lalu_lintas_tilang)
$("#pelanggaran_lalu_lintas_tilang").html(dataCurrent.pelanggaran_lalu_lintas_tilang)
$("#status_pelanggaran_lalin_tilang").html(percentageStatus(dataCurrent.pelanggaran_lalu_lintas_tilang, dataPrev.pelanggaran_lalu_lintas_tilang))
$("#persentase_pelanggaran_lalin_tilang").html(percentageValue(dataCurrent.pelanggaran_lalu_lintas_tilang, dataPrev.pelanggaran_lalu_lintas_tilang))


$("#pelanggaran_lalu_lintas_teguran_prev").html(dataPrev.pelanggaran_lalu_lintas_teguran)
$("#pelanggaran_lalu_lintas_teguran").html(dataCurrent.pelanggaran_lalu_lintas_teguran)
$("#status_pelanggaran_lalin_teguran").html(percentageStatus(dataCurrent.pelanggaran_lalu_lintas_teguran, dataPrev.pelanggaran_lalu_lintas_teguran))
$("#persentase_pelanggaran_lalin_teguran").html(percentageValue(dataCurrent.pelanggaran_lalu_lintas_teguran, dataPrev.pelanggaran_lalu_lintas_teguran))


$("#pelanggaran_lalin_motor_gunhelm_prev").html(dataPrev.pelanggaran_sepeda_motor_gun_helm_sni)
$("#pelanggaran_lalin_motor_gunhelm").html(dataCurrent.pelanggaran_sepeda_motor_gun_helm_sni)
$("#status_pelanggaran_lalin_motor_gunhelm").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_gun_helm_sni, dataPrev.pelanggaran_sepeda_motor_gun_helm_sni))
$("#persentase_pelanggaran_lalin_motor_gunhelm").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_gun_helm_sni, dataPrev.pelanggaran_sepeda_motor_gun_helm_sni))

$("#pelanggaran_lalin_motor_lawan_arus_prev").html(dataPrev.pelanggaran_sepeda_motor_melawan_arus)
$("#pelanggaran_lalin_motor_lawan_arus").html(dataCurrent.pelanggaran_sepeda_motor_melawan_arus)
$("#status_pelanggaran_lalin_motor_lawan_arus").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_melawan_arus, dataPrev.pelanggaran_sepeda_motor_melawan_arus))
$("#persentase_pelanggaran_lalin_motor_lawan_arus").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_melawan_arus, dataPrev.pelanggaran_sepeda_motor_melawan_arus))

$("#pelanggaran_lalin_motor_gunhp_prev").html(dataPrev.pelanggaran_sepeda_motor_gun_hp_saat_berkendara)
$("#pelanggaran_lalin_motor_gunhp").html(dataCurrent.pelanggaran_sepeda_motor_gun_hp_saat_berkendara)
$("#status_pelanggaran_lalin_motor_gunhp").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_gun_hp_saat_berkendara, dataPrev.pelanggaran_sepeda_motor_gun_hp_saat_berkendara))
$("#persentase_pelanggaran_lalin_motor_gunhp").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_gun_hp_saat_berkendara, dataPrev.pelanggaran_sepeda_motor_gun_hp_saat_berkendara))

$("#pelanggaran_lalin_motor_pengaruh_alkohol_prev").html(dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol)
$("#pelanggaran_lalin_motor_pengaruh_alkohol").html(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol)
$("#status_pelanggaran_lalin_motor_pengaruh_alkohol").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol, dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol))
$("#persentase_pelanggaran_lalin_motor_pengaruh_alkohol").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol, dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol))

$("#pelanggaran_lalin_motor_batas_kecepatan_prev").html(dataPrev.pelanggaran_sepeda_motor_melebihi_batas_kecepatan)
$("#pelanggaran_lalin_motor_batas_kecepatan").html(dataCurrent.pelanggaran_sepeda_motor_melebihi_batas_kecepatan)
$("#status_pelanggaran_lalin_motor_batas_kecepatan").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_melebihi_batas_kecepatan, dataPrev.pelanggaran_sepeda_motor_melebihi_batas_kecepatan))
$("#persentase_pelanggaran_lalin_motor_batas_kecepatan").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_melebihi_batas_kecepatan, dataPrev.pelanggaran_sepeda_motor_melebihi_batas_kecepatan))

$("#pelanggaran_lalin_motor_bawah_umur_prev").html(dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_umur)
$("#pelanggaran_lalin_motor_bawah_umur").html(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_umur)
$("#status_pelanggaran_lalin_motor_bawah_umur").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_umur, dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_umur))
$("#persentase_pelanggaran_lalin_motor_bawah_umur").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_umur, dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_umur))

$("#pelanggaran_lalin_motor_lain_lain_prev").html(dataPrev.pelanggaran_sepeda_motor_lain_lain)
$("#pelanggaran_lalin_motor_lain_lain").html(dataCurrent.pelanggaran_sepeda_motor_lain_lain)
$("#status_pelanggaran_lalin_motor_lain_lain").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_lain_lain, dataPrev.pelanggaran_sepeda_motor_lain_lain))
$("#persentase_pelanggaran_lalin_motor_lain_lain").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_lain_lain, dataPrev.pelanggaran_sepeda_motor_lain_lain))

$("#pelanggaran_lalin_mobil_lawan_arus_prev").html(dataPrev.pelanggaran_mobil_melawan_arus)
$("#pelanggaran_lalin_mobil_lawan_arus").html(dataCurrent.pelanggaran_mobil_melawan_arus)
$("#status_pelanggaran_lalin_mobil_lawan_arus").html(percentageStatus(dataCurrent.pelanggaran_mobil_melawan_arus, dataPrev.pelanggaran_mobil_melawan_arus))
$("#persentase_pelanggaran_lalin_mobil_lawan_arus").html(percentageValue(dataCurrent.pelanggaran_mobil_melawan_arus, dataPrev.pelanggaran_mobil_melawan_arus))

$("#pelanggaran_lalin_mobil_gunhp_prev").html(dataPrev.pelanggaran_mobil_gun_hp_saat_berkendara)
$("#pelanggaran_lalin_mobil_gunhp").html(dataCurrent.pelanggaran_mobil_gun_hp_saat_berkendara)
$("#status_pelanggaran_lalin_mobil_gunhp").html(percentageStatus(dataCurrent.pelanggaran_mobil_gun_hp_saat_berkendara, dataPrev.pelanggaran_mobil_gun_hp_saat_berkendara))
$("#persentase_pelanggaran_lalin_mobil_gunhp").html(percentageValue(dataCurrent.pelanggaran_mobil_gun_hp_saat_berkendara, dataPrev.pelanggaran_mobil_gun_hp_saat_berkendara))

$("#pelanggaran_lalin_mobil_pengaruh_alkohol_prev").html(dataPrev.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol)
$("#pelanggaran_lalin_mobil_pengaruh_alkohol").html(dataCurrent.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol)
$("#status_pelanggaran_lalin_mobil_pengaruh_alkohol").html(percentageStatus(dataCurrent.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol, dataPrev.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol))
$("#persentase_pelanggaran_lalin_mobil_pengaruh_alkohol").html(percentageValue(dataCurrent.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol, dataPrev.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol))

$("#pelanggaran_lalin_mobil_batas_kecepatan_prev").html(dataPrev.pelanggaran_mobil_melebihi_batas_kecepatan)
$("#pelanggaran_lalin_mobil_batas_kecepatan").html(dataCurrent.pelanggaran_mobil_melebihi_batas_kecepatan)
$("#status_pelanggaran_lalin_mobil_batas_kecepatan").html(percentageStatus(dataCurrent.pelanggaran_mobil_melebihi_batas_kecepatan, dataPrev.pelanggaran_mobil_melebihi_batas_kecepatan))
$("#persentase_pelanggaran_lalin_mobil_batas_kecepatan").html(percentageValue(dataCurrent.pelanggaran_mobil_melebihi_batas_kecepatan, dataPrev.pelanggaran_mobil_melebihi_batas_kecepatan))

$("#pelanggaran_lalin_mobil_bawah_umur_prev").html(dataPrev.pelanggaran_mobil_berkendara_dibawah_umur)
$("#pelanggaran_lalin_mobil_bawah_umur").html(dataCurrent.pelanggaran_mobil_berkendara_dibawah_umur)
$("#status_pelanggaran_lalin_mobil_bawah_umur").html(percentageStatus(dataCurrent.pelanggaran_mobil_berkendara_dibawah_umur, dataPrev.pelanggaran_mobil_berkendara_dibawah_umur))
$("#persentase_pelanggaran_lalin_mobil_bawah_umur").html(percentageValue(dataCurrent.pelanggaran_mobil_berkendara_dibawah_umur, dataPrev.pelanggaran_mobil_berkendara_dibawah_umur))

$("#pelanggaran_lalin_mobil_gunsafety_belt_prev").html(dataPrev.pelanggaran_mobil_gun_safety_belt)
$("#pelanggaran_lalin_mobil_gunsafety_belt").html(dataCurrent.pelanggaran_mobil_gun_safety_belt)
$("#status_pelanggaran_lalin_mobil_gunsafety_belt").html(percentageStatus(dataCurrent.pelanggaran_mobil_gun_safety_belt, dataPrev.pelanggaran_mobil_gun_safety_belt))
$("#persentase_pelanggaran_lalin_mobil_gunsafety_belt").html(percentageValue(dataCurrent.pelanggaran_mobil_gun_safety_belt, dataPrev.pelanggaran_mobil_gun_safety_belt))

$("#pelanggaran_lalin_mobil_lain_lain_prev").html(dataPrev.pelanggaran_mobil_lain_lain)
$("#pelanggaran_lalin_mobil_lain_lain").html(dataCurrent.pelanggaran_mobil_lain_lain)
$("#status_pelanggaran_lalin_mobil_lain_lain").html(percentageStatus(dataCurrent.pelanggaran_mobil_lain_lain, dataPrev.pelanggaran_mobil_lain_lain))
$("#persentase_pelanggaran_lalin_mobil_lain_lain").html(percentageValue(dataCurrent.pelanggaran_mobil_lain_lain, dataPrev.pelanggaran_mobil_lain_lain))

$("#pelanggaran_lalin_barang_bukti_sim_prev").html(dataPrev.barang_bukti_yg_disita_sim)
$("#pelanggaran_lalin_barang_bukti_sim").html(dataCurrent.barang_bukti_yg_disita_sim)
$("#status_pelanggaran_lalin_barang_bukti_sim").html(percentageStatus(dataCurrent.barang_bukti_yg_disita_sim, dataPrev.barang_bukti_yg_disita_sim))
$("#persentase_pelanggaran_lalin_barang_bukti_sim").html(percentageValue(dataCurrent.barang_bukti_yg_disita_sim, dataPrev.barang_bukti_yg_disita_sim))

$("#pelanggaran_lalin_barang_bukti_stnk_prev").html(dataPrev.barang_bukti_yg_disita_stnk)
$("#pelanggaran_lalin_barang_bukti_stnk").html(dataCurrent.barang_bukti_yg_disita_stnk)
$("#status_pelanggaran_lalin_barang_bukti_stnk").html(percentageStatus(dataCurrent.barang_bukti_yg_disita_stnk, dataPrev.barang_bukti_yg_disita_stnk))
$("#persentase_pelanggaran_lalin_barang_bukti_stnk").html(percentageValue(dataCurrent.barang_bukti_yg_disita_stnk, dataPrev.barang_bukti_yg_disita_stnk))

$("#pelanggaran_lalin_barang_bukti_kendaraan_prev").html(dataPrev.barang_bukti_yg_disita_kendaraan)
$("#pelanggaran_lalin_barang_bukti_kendaraan").html(dataCurrent.barang_bukti_yg_disita_kendaraan)
$("#status_pelanggaran_lalin_barang_bukti_kendaraan").html(percentageStatus(dataCurrent.barang_bukti_yg_disita_kendaraan, dataPrev.barang_bukti_yg_disita_kendaraan))
$("#persentase_pelanggaran_lalin_barang_bukti_kendaraan").html(percentageValue(dataCurrent.barang_bukti_yg_disita_kendaraan, dataPrev.barang_bukti_yg_disita_kendaraan))

$("#pelanggaran_lalin_terlibat_pelanggaran_motor_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_sepeda_motor)
$("#pelanggaran_lalin_terlibat_pelanggaran_motor").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_sepeda_motor)
$("#status_pelanggaran_lalin_terlibat_pelanggaran_motor").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_sepeda_motor, dataPrev.kendaraan_yang_terlibat_pelanggaran_sepeda_motor))
$("#persentase_pelanggaran_lalin_terlibat_pelanggaran_motor").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_sepeda_motor, dataPrev.kendaraan_yang_terlibat_pelanggaran_sepeda_motor))

$("#pelanggaran_lalin_terlibat_pelanggaran_mob_png_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang)
$("#pelanggaran_lalin_terlibat_pelanggaran_mob_png").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang)
$("#status_pelanggaran_lalin_terlibat_pelanggaran_mob_png").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang))
$("#persentase_pelanggaran_lalin_terlibat_pelanggaran_mob_png").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang))

$("#pelanggaran_lalin_terlibat_pelanggaran_bus_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_bus)
$("#pelanggaran_lalin_terlibat_pelanggaran_bus").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_bus)
$("#status_pelanggaran_lalin_terlibat_pelanggaran_bus").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_bus, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_bus))
$("#persentase_pelanggaran_lalin_terlibat_pelanggaran_bus").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_bus, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_bus))

$("#pelanggaran_lalin_terlibat_pelanggaran_mob_brg_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_barang)
$("#pelanggaran_lalin_terlibat_pelanggaran_mob_brg").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_barang)
$("#status_pelanggaran_lalin_terlibat_pelanggaran_mob_brg").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_barang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_barang))
$("#persentase_pelanggaran_lalin_terlibat_pelanggaran_mob_brg").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_barang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_barang))

$("#pelanggaran_lalin_terlibat_pelanggaran_khusus_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus)
$("#pelanggaran_lalin_terlibat_pelanggaran_khusus").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus)
$("#status_pelanggaran_lalin_terlibat_pelanggaran_khusus").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus, dataPrev.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus))
$("#persentase_pelanggaran_lalin_terlibat_pelanggaran_khusus").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus, dataPrev.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus))

$("#pelanggaran_lalin_profesi_pelaku_pns_prev").html(dataPrev.profesi_pelaku_pelanggaran_pns)
$("#pelanggaran_lalin_profesi_pelaku_pns").html(dataCurrent.profesi_pelaku_pelanggaran_pns)
$("#status_pelanggaran_lalin_profesi_pelaku_pns").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_pns, dataPrev.profesi_pelaku_pelanggaran_pns))
$("#persentase_pelanggaran_lalin_profesi_pelaku_pns").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_pns, dataPrev.profesi_pelaku_pelanggaran_pns))

$("#pelanggaran_lalin_profesi_pelaku_swasta_prev").html(dataPrev.profesi_pelaku_pelanggaran_karyawan_swasta)
$("#pelanggaran_lalin_profesi_pelaku_swasta").html(dataCurrent.profesi_pelaku_pelanggaran_karyawan_swasta)
$("#status_pelanggaran_lalin_profesi_pelaku_swasta").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_karyawan_swasta, dataPrev.profesi_pelaku_pelanggaran_karyawan_swasta))
$("#persentase_pelanggaran_lalin_profesi_pelaku_swasta").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_karyawan_swasta, dataPrev.profesi_pelaku_pelanggaran_karyawan_swasta))

$("#pelanggaran_lalin_profesi_pelaku_pelajar_prev").html(dataPrev.profesi_pelaku_pelanggaran_pelajar_mahasiswa)
$("#pelanggaran_lalin_profesi_pelaku_pelajar").html(dataCurrent.profesi_pelaku_pelanggaran_pelajar_mahasiswa)
$("#status_pelanggaran_lalin_profesi_pelaku_pelajar").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_pelajar_mahasiswa, dataPrev.profesi_pelaku_pelanggaran_pelajar_mahasiswa))
$("#persentase_pelanggaran_lalin_profesi_pelaku_pelajar").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_pelajar_mahasiswa, dataPrev.profesi_pelaku_pelanggaran_pelajar_mahasiswa))

$("#pelanggaran_lalin_profesi_pelaku_supir_prev").html(dataPrev.profesi_pelaku_pelanggaran_pengemudi_supir)
$("#pelanggaran_lalin_profesi_pelaku_supir").html(dataCurrent.profesi_pelaku_pelanggaran_pengemudi_supir)
$("#status_pelanggaran_lalin_profesi_pelaku_supir").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_pengemudi_supir, dataPrev.profesi_pelaku_pelanggaran_pengemudi_supir))
$("#persentase_pelanggaran_lalin_profesi_pelaku_supir").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_pengemudi_supir, dataPrev.profesi_pelaku_pelanggaran_pengemudi_supir))

$("#pelanggaran_lalin_profesi_pelaku_tni_prev").html(dataPrev.profesi_pelaku_pelanggaran_tni)
$("#pelanggaran_lalin_profesi_pelaku_tni").html(dataCurrent.profesi_pelaku_pelanggaran_tni)
$("#status_pelanggaran_lalin_profesi_pelaku_tni").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_tni, dataPrev.profesi_pelaku_pelanggaran_tni))
$("#persentase_pelanggaran_lalin_profesi_pelaku_tni").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_tni, dataPrev.profesi_pelaku_pelanggaran_tni))

$("#pelanggaran_lalin_profesi_pelaku_polri_prev").html(dataPrev.profesi_pelaku_pelanggaran_polri)
$("#pelanggaran_lalin_profesi_pelaku_polri").html(dataCurrent.profesi_pelaku_pelanggaran_polri)
$("#status_pelanggaran_lalin_profesi_pelaku_polri").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_polri, dataPrev.profesi_pelaku_pelanggaran_polri))
$("#persentase_pelanggaran_lalin_profesi_pelaku_polri").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_polri, dataPrev.profesi_pelaku_pelanggaran_polri))

$("#pelanggaran_lalin_profesi_pelaku_lainnya_prev").html(dataPrev.profesi_pelaku_pelanggaran_lain_lain)
$("#pelanggaran_lalin_profesi_pelaku_lainnya").html(dataCurrent.profesi_pelaku_pelanggaran_lain_lain)
$("#status_pelanggaran_lalin_profesi_pelaku_lainnya").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_lain_lain, dataPrev.profesi_pelaku_pelanggaran_lain_lain))
$("#persentase_pelanggaran_lalin_profesi_pelaku_lainnya").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_lain_lain, dataPrev.profesi_pelaku_pelanggaran_lain_lain))

$("#pelanggaran_lalin_profesi_pelaku_15tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_kurang_dari_15_tahun)
$("#pelanggaran_lalin_profesi_pelaku_15tahun").html(dataCurrent.usia_pelaku_pelanggaran_kurang_dari_15_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_15tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_kurang_dari_15_tahun, dataPrev.usia_pelaku_pelanggaran_kurang_dari_15_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_15tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_kurang_dari_15_tahun, dataPrev.usia_pelaku_pelanggaran_kurang_dari_15_tahun))

$("#pelanggaran_lalin_profesi_pelaku_1620tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_16_20_tahun)
$("#pelanggaran_lalin_profesi_pelaku_1620tahun").html(dataCurrent.usia_pelaku_pelanggaran_16_20_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_1620tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_16_20_tahun, dataPrev.usia_pelaku_pelanggaran_16_20_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_1620tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_16_20_tahun, dataPrev.usia_pelaku_pelanggaran_16_20_tahun))

$("#pelanggaran_lalin_profesi_pelaku_2125tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_21_25_tahun)
$("#pelanggaran_lalin_profesi_pelaku_2125tahun").html(dataCurrent.usia_pelaku_pelanggaran_21_25_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_2125tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_21_25_tahun, dataPrev.usia_pelaku_pelanggaran_21_25_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_2125tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_21_25_tahun, dataPrev.usia_pelaku_pelanggaran_21_25_tahun))

$("#pelanggaran_lalin_profesi_pelaku_2630tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_26_30_tahun)
$("#pelanggaran_lalin_profesi_pelaku_2630tahun").html(dataCurrent.usia_pelaku_pelanggaran_26_30_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_2630tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_26_30_tahun, dataPrev.usia_pelaku_pelanggaran_26_30_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_2630tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_26_30_tahun, dataPrev.usia_pelaku_pelanggaran_26_30_tahun))

$("#pelanggaran_lalin_profesi_pelaku_3135tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_31_35_tahun)
$("#pelanggaran_lalin_profesi_pelaku_3135tahun").html(dataCurrent.usia_pelaku_pelanggaran_31_35_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_3135tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_31_35_tahun, dataPrev.usia_pelaku_pelanggaran_31_35_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_3135tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_31_35_tahun, dataPrev.usia_pelaku_pelanggaran_31_35_tahun))

$("#pelanggaran_lalin_profesi_pelaku_3640tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_36_40_tahun)
$("#pelanggaran_lalin_profesi_pelaku_3640tahun").html(dataCurrent.usia_pelaku_pelanggaran_36_40_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_3640tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_36_40_tahun, dataPrev.usia_pelaku_pelanggaran_36_40_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_3640tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_36_40_tahun, dataPrev.usia_pelaku_pelanggaran_36_40_tahun))

$("#pelanggaran_lalin_profesi_pelaku_4145tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_41_45_tahun)
$("#pelanggaran_lalin_profesi_pelaku_4145tahun").html(dataCurrent.usia_pelaku_pelanggaran_41_45_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_4145tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_41_45_tahun, dataPrev.usia_pelaku_pelanggaran_41_45_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_4145tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_41_45_tahun, dataPrev.usia_pelaku_pelanggaran_41_45_tahun))

$("#pelanggaran_lalin_profesi_pelaku_4650tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_46_50_tahun)
$("#pelanggaran_lalin_profesi_pelaku_4650tahun").html(dataCurrent.usia_pelaku_pelanggaran_46_50_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_4650tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_46_50_tahun, dataPrev.usia_pelaku_pelanggaran_46_50_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_4650tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_46_50_tahun, dataPrev.usia_pelaku_pelanggaran_46_50_tahun))

$("#pelanggaran_lalin_profesi_pelaku_5155tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_51_55_tahun)
$("#pelanggaran_lalin_profesi_pelaku_5155tahun").html(dataCurrent.usia_pelaku_pelanggaran_51_55_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_5155tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_51_55_tahun, dataPrev.usia_pelaku_pelanggaran_51_55_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_5155tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_51_55_tahun, dataPrev.usia_pelaku_pelanggaran_51_55_tahun))

$("#pelanggaran_lalin_profesi_pelaku_5660tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_56_60_tahun)
$("#pelanggaran_lalin_profesi_pelaku_5660tahun").html(dataCurrent.usia_pelaku_pelanggaran_56_60_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_5660tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_56_60_tahun, dataPrev.usia_pelaku_pelanggaran_56_60_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_5660tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_56_60_tahun, dataPrev.usia_pelaku_pelanggaran_56_60_tahun))

$("#pelanggaran_lalin_profesi_pelaku_60tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_diatas_60_tahun)
$("#pelanggaran_lalin_profesi_pelaku_60tahun").html(dataCurrent.usia_pelaku_pelanggaran_diatas_60_tahun)
$("#status_pelanggaran_lalin_profesi_pelaku_60tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_diatas_60_tahun, dataPrev.usia_pelaku_pelanggaran_diatas_60_tahun))
$("#persentase_pelanggaran_lalin_profesi_pelaku_60tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_diatas_60_tahun, dataPrev.usia_pelaku_pelanggaran_diatas_60_tahun))

$("#pelanggaran_lalin_profesi_pelaku_a_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_a)
$("#pelanggaran_lalin_profesi_pelaku_a").html(dataCurrent.sim_pelaku_pelanggaran_sim_a)
$("#status_pelanggaran_lalin_profesi_pelaku_a").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_a, dataPrev.sim_pelaku_pelanggaran_sim_a))
$("#persentase_pelanggaran_lalin_profesi_pelaku_a").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_a, dataPrev.sim_pelaku_pelanggaran_sim_a))

$("#pelanggaran_lalin_profesi_pelaku_a_umum_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_a_umum)
$("#pelanggaran_lalin_profesi_pelaku_a_umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_a_umum)
$("#status_pelanggaran_lalin_profesi_pelaku_a_umum").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_a_umum, dataPrev.sim_pelaku_pelanggaran_sim_a_umum))
$("#persentase_pelanggaran_lalin_profesi_pelaku_a_umum").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_a_umum, dataPrev.sim_pelaku_pelanggaran_sim_a_umum))

$("#pelanggaran_lalin_profesi_pelaku_b1_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b1)
$("#pelanggaran_lalin_profesi_pelaku_b1").html(dataCurrent.sim_pelaku_pelanggaran_sim_b1)
$("#status_pelanggaran_lalin_profesi_pelaku_b1").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b1, dataPrev.sim_pelaku_pelanggaran_sim_b1))
$("#persentase_pelanggaran_lalin_profesi_pelaku_b1").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b1, dataPrev.sim_pelaku_pelanggaran_sim_b1))

$("#pelanggaran_lalin_profesi_pelaku_b1umum_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b1_umum)
$("#pelanggaran_lalin_profesi_pelaku_b1umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_b1_umum)
$("#status_pelanggaran_lalin_profesi_pelaku_b1umum").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b1_umum, dataPrev.sim_pelaku_pelanggaran_sim_b1_umum))
$("#persentase_pelanggaran_lalin_profesi_pelaku_b1umum").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b1_umum, dataPrev.sim_pelaku_pelanggaran_sim_b1_umum))

$("#pelanggaran_lalin_profesi_pelaku_bii_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b2)
$("#pelanggaran_lalin_profesi_pelaku_bii").html(dataCurrent.sim_pelaku_pelanggaran_sim_b2)
$("#status_pelanggaran_lalin_profesi_pelaku_bii").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b2, dataPrev.sim_pelaku_pelanggaran_sim_b2))
$("#persentase_pelanggaran_lalin_profesi_pelaku_bii").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b2, dataPrev.sim_pelaku_pelanggaran_sim_b2))

$("#pelanggaran_lalin_profesi_pelaku_bii_umum_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b2_umum)
$("#pelanggaran_lalin_profesi_pelaku_bii_umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_b2_umum)
$("#status_pelanggaran_lalin_profesi_pelaku_bii_umum").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b2_umum, dataPrev.sim_pelaku_pelanggaran_sim_b2_umum))
$("#persentase_pelanggaran_lalin_profesi_pelaku_bii_umum").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b2_umum, dataPrev.sim_pelaku_pelanggaran_sim_b2_umum))

$("#pelanggaran_lalin_profesi_pelaku_c_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_c)
$("#pelanggaran_lalin_profesi_pelaku_c").html(dataCurrent.sim_pelaku_pelanggaran_sim_c)
$("#status_pelanggaran_lalin_profesi_pelaku_c").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_c, dataPrev.sim_pelaku_pelanggaran_sim_c))
$("#persentase_pelanggaran_lalin_profesi_pelaku_c").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_c, dataPrev.sim_pelaku_pelanggaran_sim_c))

$("#pelanggaran_lalin_profesi_pelaku_d_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_d)
$("#pelanggaran_lalin_profesi_pelaku_d").html(dataCurrent.sim_pelaku_pelanggaran_sim_d)
$("#status_pelanggaran_lalin_profesi_pelaku_d").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_d, dataPrev.sim_pelaku_pelanggaran_sim_d))
$("#persentase_pelanggaran_lalin_profesi_pelaku_d").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_d, dataPrev.sim_pelaku_pelanggaran_sim_d))

$("#pelanggaran_lalin_profesi_pelaku_sim_internasional_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_internasional)
$("#pelanggaran_lalin_profesi_pelaku_sim_internasional").html(dataCurrent.sim_pelaku_pelanggaran_sim_internasional)
$("#status_pelanggaran_lalin_profesi_pelaku_sim_internasional").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_internasional, dataPrev.sim_pelaku_pelanggaran_sim_internasional))
$("#persentase_pelanggaran_lalin_profesi_pelaku_sim_internasional").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_internasional, dataPrev.sim_pelaku_pelanggaran_sim_internasional))

$("#pelanggaran_lalin_profesi_pelaku_tanpa_sim_prev").html(dataPrev.sim_pelaku_pelanggaran_tanpa_sim)
$("#pelanggaran_lalin_profesi_pelaku_tanpa_sim").html(dataCurrent.sim_pelaku_pelanggaran_tanpa_sim)
$("#status_pelanggaran_lalin_profesi_pelaku_tanpa_sim").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_tanpa_sim, dataPrev.sim_pelaku_pelanggaran_tanpa_sim))
$("#persentase_pelanggaran_lalin_profesi_pelaku_tanpa_sim").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_tanpa_sim, dataPrev.sim_pelaku_pelanggaran_tanpa_sim))

$("#pelanggaran_lalin_kawasan_pemukiman_prev").html(dataPrev.lokasi_pelanggaran_pemukiman)
$("#pelanggaran_lalin_kawasan_pemukiman").html(dataCurrent.lokasi_pelanggaran_pemukiman)
$("#status_pelanggaran_lalin_kawasan_pemukiman").html(percentageStatus(dataCurrent.lokasi_pelanggaran_pemukiman, dataPrev.lokasi_pelanggaran_pemukiman))
$("#persentase_pelanggaran_lalin_kawasan_pemukiman").html(percentageValue(dataCurrent.lokasi_pelanggaran_pemukiman, dataPrev.lokasi_pelanggaran_pemukiman))

$("#pelanggaran_lalin_kawasan_perbelanjaan_prev").html(dataPrev.lokasi_pelanggaran_perbelanjaan)
$("#pelanggaran_lalin_kawasan_perbelanjaan").html(dataCurrent.lokasi_pelanggaran_perbelanjaan)
$("#status_pelanggaran_lalin_kawasan_perbelanjaan").html(percentageStatus(dataCurrent.lokasi_pelanggaran_perbelanjaan, dataPrev.lokasi_pelanggaran_perbelanjaan))
$("#persentase_pelanggaran_lalin_kawasan_perbelanjaan").html(percentageValue(dataCurrent.lokasi_pelanggaran_perbelanjaan, dataPrev.lokasi_pelanggaran_perbelanjaan))

$("#pelanggaran_lalin_kawasan_perkantoran_prev").html(dataPrev.lokasi_pelanggaran_perkantoran)
$("#pelanggaran_lalin_kawasan_perkantoran").html(dataCurrent.lokasi_pelanggaran_perkantoran)
$("#status_pelanggaran_lalin_kawasan_perkantoran").html(percentageStatus(dataCurrent.lokasi_pelanggaran_perkantoran, dataPrev.lokasi_pelanggaran_perkantoran))
$("#persentase_pelanggaran_lalin_kawasan_perkantoran").html(percentageValue(dataCurrent.lokasi_pelanggaran_perkantoran, dataPrev.lokasi_pelanggaran_perkantoran))

$("#pelanggaran_lalin_kawasan_wisata_prev").html(dataPrev.lokasi_pelanggaran_wisata)
$("#pelanggaran_lalin_kawasan_wisata").html(dataCurrent.lokasi_pelanggaran_wisata)
$("#status_pelanggaran_lalin_kawasan_wisata").html(percentageStatus(dataCurrent.lokasi_pelanggaran_wisata, dataPrev.lokasi_pelanggaran_wisata))
$("#persentase_pelanggaran_lalin_kawasan_wisata").html(percentageValue(dataCurrent.lokasi_pelanggaran_wisata, dataPrev.lokasi_pelanggaran_wisata))

$("#pelanggaran_lalin_kawasan_industri_prev").html(dataPrev.lokasi_pelanggaran_industri)
$("#pelanggaran_lalin_kawasan_industri").html(dataCurrent.lokasi_pelanggaran_industri)
$("#status_pelanggaran_lalin_kawasan_industri").html(percentageStatus(dataCurrent.lokasi_pelanggaran_industri, dataPrev.lokasi_pelanggaran_industri))
$("#persentase_pelanggaran_lalin_kawasan_industri").html(percentageValue(dataCurrent.lokasi_pelanggaran_industri, dataPrev.lokasi_pelanggaran_industri))

$("#pelanggaran_lalin_status_jalan_nasional_prev").html(dataPrev.lokasi_pelanggaran_status_jalan_nasional)
$("#pelanggaran_lalin_status_jalan_nasional").html(dataCurrent.lokasi_pelanggaran_status_jalan_nasional)
$("#status_pelanggaran_lalin_status_jalan_nasional").html(percentageStatus(dataCurrent.lokasi_pelanggaran_status_jalan_nasional, dataPrev.lokasi_pelanggaran_status_jalan_nasional))
$("#persentase_pelanggaran_lalin_status_jalan_nasional").html(percentageValue(dataCurrent.lokasi_pelanggaran_status_jalan_nasional, dataPrev.lokasi_pelanggaran_status_jalan_nasional))

$("#pelanggaran_lalin_status_jalan_propinsi_prev").html(dataPrev.lokasi_pelanggaran_status_jalan_propinsi)
$("#pelanggaran_lalin_status_jalan_propinsi").html(dataCurrent.lokasi_pelanggaran_status_jalan_propinsi)
$("#status_pelanggaran_lalin_status_jalan_propinsi").html(percentageStatus(dataCurrent.lokasi_pelanggaran_status_jalan_propinsi, dataPrev.lokasi_pelanggaran_status_jalan_propinsi))
$("#persentase_pelanggaran_lalin_status_jalan_propinsi").html(percentageValue(dataCurrent.lokasi_pelanggaran_status_jalan_propinsi, dataPrev.lokasi_pelanggaran_status_jalan_propinsi))

$("#pelanggaran_lalin_status_jalan_kabkota_prev").html(dataPrev.lokasi_pelanggaran_status_jalan_kab_kota)
$("#pelanggaran_lalin_status_jalan_kabkota").html(dataCurrent.lokasi_pelanggaran_status_jalan_kab_kota)
$("#status_pelanggaran_lalin_status_jalan_kabkota").html(percentageStatus(dataCurrent.lokasi_pelanggaran_status_jalan_kab_kota, dataPrev.lokasi_pelanggaran_status_jalan_kab_kota))
$("#persentase_pelanggaran_lalin_status_jalan_kabkota").html(percentageValue(dataCurrent.lokasi_pelanggaran_status_jalan_kab_kota, dataPrev.lokasi_pelanggaran_status_jalan_kab_kota))

$("#xxxxxxxx").html(dataPrev.xxxxxxxx)
$("#xxxxxxxx").html(dataCurrent.xxxxxxxx)
$("#xxxxxxxx").html(percentageStatus(dataCurrent.xxxxxxxx, dataPrev.xxxxxxxx))
$("#xxxxxxxx").html(percentageValue(dataCurrent.xxxxxxxx, dataPrev.xxxxxxxx))


                })
                .catch(function(error) {
                    $("#panelLoading").addClass("d-none")
                    $("#panelData").removeClass("d-none")
                    swal("Data belum lengkap. Silahkan periksa data yang akan diproses", error.response.data.output, "error")
                })
            }
        })
    })
</script>
@endpush