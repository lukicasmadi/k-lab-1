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
    @if ($errors->any())
        <div class="alert alert-danger custom">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row layout-top-spacing">
        <div class="col-lg-4 col-12 mb-25 layout-spacing">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-content mt-3 widget-content-area">
                    <form action="{{ route('report_anev_daily_process') }}" id="form_anev_harian" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-popup">Pilih Operasi</label>
                            <select class="form-control form-custom height-form" name="operation_id" id="operation_id">
                                <option value=""> - Pilih Nama Operasi</option>
                                @foreach($rencanaOperasi as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="blocked">
                            <div class="form-group pembanding d-none">
                                <label class="text-popup">Pilih Hari Pembanding 1</label>
                                <input id="tanggal_pembanding_1" name="tanggal_pembanding_1" class="form-control popoups inp-icon flatpickr flatpickr-input active form-control-lg" type="text" placeholder="- Pilih Tanggal -">
                            </div>

                            <div class="form-group pembanding d-none">
                                <label class="text-popup">Pilih Hari Pembanding 2</label>
                                <input id="tanggal_pembanding_2" name="tanggal_pembanding_2" class="form-control popoups inp-icon flatpickr flatpickr-input active form-control-lg" type="text" placeholder="- Pilih Tanggal -">
                            </div>
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
                            <tr bgcolor="#0E7096">
                                <th width="31%">Nama Laporan</th>
                                <th width="27%" id="lbl_tahun_prev">tahun -</th>
                                <th width="27%" id="lbl_tahun_current">tahun -</th>
                                <th width="5%">angka</th>
                                <th width="10%">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="titlletd" colspan="5">I. DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">1. PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tilang</td>
                                <td id="pelanggaran_lalu_lintas_tilang_p">0</td>
                                <td id="pelanggaran_lalu_lintas_tilang">0</td>
                                <td id="status_pelanggaran_lalin_tilang">-</td>
                                <td id="persentase_pelanggaran_lalin_tilang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Teguran</td>
                                <td id="pelanggaran_lalu_lintas_teguran_p">0</td>
                                <td id="pelanggaran_lalu_lintas_teguran">0</td>
                                <td id="status_pelanggaran_lalin_teguran">-</td>
                                <td id="persentase_pelanggaran_lalin_teguran">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">2. JENIS PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Sepeda Motor (psl 47)</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kecepatan</td>
                                <td id="pelanggaran_sepeda_motor_kecepatan_p">0</td>
                                <td id="pelanggaran_sepeda_motor_kecepatan">0</td>
                                <td id="status_pelanggaran_sepeda_motor_kecepatan">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_kecepatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Helm</td>
                                <td id="pelanggaran_sepeda_motor_helm_p">0</td>
                                <td id="pelanggaran_sepeda_motor_helm">0</td>
                                <td id="status_pelanggaran_sepeda_motor_helm">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_helm">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Boncengan Lebih Dari 1 (satu) Orang</td>
                                <td id="pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p">0</td>
                                <td id="pelanggaran_sepeda_motor_bonceng_lebih_dari_satu">0</td>
                                <td id="status_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Marka menerus / Rambu menyalip</td>
                                <td id="pelanggaran_sepeda_motor_marka_menerus_menyalip_p">0</td>
                                <td id="pelanggaran_sepeda_motor_marka_menerus_menyalip">0</td>
                                <td id="status_pelanggaran_sepeda_motor_marka_menerus_menyalip">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_marka_menerus_menyalip">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melawan Arus</td>
                                <td id="pelanggaran_sepeda_motor_melawan_arus_p">0</td>
                                <td id="pelanggaran_sepeda_motor_melawan_arus">0</td>
                                <td id="status_pelanggaran_sepeda_motor_melawan_arus">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_melawan_arus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melanggar Lampu Lalu Lintas</td>
                                <td id="pelanggaran_sepeda_motor_melanggar_lampu_lalin_p">0</td>
                                <td id="pelanggaran_sepeda_motor_melanggar_lampu_lalin">0</td>
                                <td id="status_pelanggaran_sepeda_motor_melanggar_lampu_lalin">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_melanggar_lampu_lalin">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Mengemudikan kendaraan dengan tidak wajar(psl 283)</td>
                                <td id="pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p">0</td>
                                <td id="pelanggaran_sepeda_motor_mengemudikan_tidak_wajar">0</td>
                                <td id="status_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Syarat teknis dan layak jalan</td>
                                <td id="pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p">0</td>
                                <td id="pelanggaran_sepeda_motor_syarat_teknis_layak_jalan">0</td>
                                <td id="status_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tidak menyalakan lampu utama siang/malam</td>
                                <td id="pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p">0</td>
                                <td id="pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam">0</td>
                                <td id="status_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berbelok tanpa isyarat</td>
                                <td id="pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p">0</td>
                                <td id="pelanggaran_sepeda_motor_berbelok_tanpa_isyarat">0</td>
                                <td id="status_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berbalapan di jalan raya (psl 297)</td>
                                <td id="pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p">0</td>
                                <td id="pelanggaran_sepeda_motor_berbalapan_di_jalan_raya">0</td>
                                <td id="status_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melanggar Rambu berhenti dan parkir</td>
                                <td id="pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p">0</td>
                                <td id="pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir">0</td>
                                <td id="status_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melanggar marka berhenti</td>
                                <td id="pelanggaran_sepeda_motor_melanggar_marka_berhenti_p">0</td>
                                <td id="pelanggaran_sepeda_motor_melanggar_marka_berhenti">0</td>
                                <td id="status_pelanggaran_sepeda_motor_melanggar_marka_berhenti">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_melanggar_marka_berhenti">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tidak mematuhi perintah petugas Polri(psl 104)</td>
                                <td id="pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p">0</td>
                                <td id="pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas">0</td>
                                <td id="status_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Surat-surat</td>
                                <td id="pelanggaran_sepeda_motor_surat_surat_p">0</td>
                                <td id="pelanggaran_sepeda_motor_surat_surat">0</td>
                                <td id="status_pelanggaran_sepeda_motor_surat_surat">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_surat_surat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kelengkapan Kendaraan</td>
                                <td id="pelanggaran_sepeda_motor_kelengkapan_kendaraan_p">0</td>
                                <td id="pelanggaran_sepeda_motor_kelengkapan_kendaraan">0</td>
                                <td id="status_pelanggaran_sepeda_motor_kelengkapan_kendaraan">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_kelengkapan_kendaraan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Lain - Lain</td>
                                <td id="pelanggaran_sepeda_motor_lain_lain_p">0</td>
                                <td id="pelanggaran_sepeda_motor_lain_lain">0</td>
                                <td id="status_pelanggaran_sepeda_motor_lain_lain">-</td>
                                <td id="persentase_pelanggaran_sepeda_motor_lain_lain">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Mobil Dan Kendaraan Khusus (psl 47)</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kecepatan ( psl 287 ay 5 jo 106  ay 4)</td>
                                <td id="pelanggaran_mobil_kecepatan_p">0</td>
                                <td id="pelanggaran_mobil_kecepatan">0</td>
                                <td id="status_pelanggaran_mobil_kecepatan">-</td>
                                <td id="persentase_pelanggaran_mobil_kecepatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Safety belt</td>
                                <td id="pelanggaran_mobil_safety_belt_p">0</td>
                                <td id="pelanggaran_mobil_safety_belt">0</td>
                                <td id="status_pelanggaran_mobil_safety_belt">-</td>
                                <td id="persentase_pelanggaran_mobil_safety_belt">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Muatan (over loading)</td>
                                <td id="pelanggaran_mobil_muatan_overload_p">0</td>
                                <td id="pelanggaran_mobil_muatan_overload">0</td>
                                <td id="status_pelanggaran_mobil_muatan_overload">-</td>
                                <td id="persentase_pelanggaran_mobil_muatan_overload">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Marka menerus / Rambu menyalip</td>
                                <td id="pelanggaran_mobil_marka_menerus_menyalip_p">0</td>
                                <td id="pelanggaran_mobil_marka_menerus_menyalip">0</td>
                                <td id="status_pelanggaran_mobil_marka_menerus_menyalip">-</td>
                                <td id="persentase_pelanggaran_mobil_marka_menerus_menyalip">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melawan Arus (psl 105)</td>
                                <td id="pelanggaran_mobil_melawan_arus_p">0</td>
                                <td id="pelanggaran_mobil_melawan_arus">0</td>
                                <td id="status_pelanggaran_mobil_melawan_arus">-</td>
                                <td id="persentase_pelanggaran_mobil_melawan_arus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melanggar Lampu Lalu Lintas (psl 287 ayt 2 jo 106 ay 4)</td>
                                <td id="pelanggaran_mobil_melanggar_lampu_lalin_p">0</td>
                                <td id="pelanggaran_mobil_melanggar_lampu_lalin">0</td>
                                <td id="status_pelanggaran_mobil_melanggar_lampu_lalin">-</td>
                                <td id="persentase_pelanggaran_mobil_melanggar_lampu_lalin">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Mengemudikan kendaraan dengan tidak wajar(psl 283)</td>
                                <td id="pelanggaran_mobil_mengemudi_tidak_wajar_p">0</td>
                                <td id="pelanggaran_mobil_mengemudi_tidak_wajar">0</td>
                                <td id="status_pelanggaran_mobil_mengemudi_tidak_wajar">-</td>
                                <td id="persentase_pelanggaran_mobil_mengemudi_tidak_wajar">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Syarat teknis dan layak jalan</td>
                                <td id="pelanggaran_mobil_syarat_teknis_layak_jalan_p">0</td>
                                <td id="pelanggaran_mobil_syarat_teknis_layak_jalan">0</td>
                                <td id="status_pelanggaran_mobil_syarat_teknis_layak_jalan">-</td>
                                <td id="persentase_pelanggaran_mobil_syarat_teknis_layak_jalan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tidak menyalakan lampu utama mlm hari (psl 293 jo 107)</td>
                                <td id="pelanggaran_mobil_tidak_nyala_lampu_malam_p">0</td>
                                <td id="pelanggaran_mobil_tidak_nyala_lampu_malam">0</td>
                                <td id="status_pelanggaran_mobil_tidak_nyala_lampu_malam">-</td>
                                <td id="persentase_pelanggaran_mobil_tidak_nyala_lampu_malam">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berbelok tanpa isyarat (psl 295)</td>
                                <td id="pelanggaran_mobil_berbelok_tanpa_isyarat_p">0</td>
                                <td id="pelanggaran_mobil_berbelok_tanpa_isyarat">0</td>
                                <td id="status_pelanggaran_mobil_berbelok_tanpa_isyarat">-</td>
                                <td id="persentase_pelanggaran_mobil_berbelok_tanpa_isyarat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Berbalapan di jalan raya (psl 297)</td>
                                <td id="pelanggaran_mobil_berbalapan_di_jalan_raya_p">0</td>
                                <td id="pelanggaran_mobil_berbalapan_di_jalan_raya">0</td>
                                <td id="status_pelanggaran_mobil_berbalapan_di_jalan_raya">-</td>
                                <td id="persentase_pelanggaran_mobil_berbalapan_di_jalan_raya">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melanggar Rambu berhenti dan parkir</td>
                                <td id="pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p">0</td>
                                <td id="pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir">0</td>
                                <td id="status_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir">-</td>
                                <td id="persentase_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Melanggar marka berhenti</td>
                                <td id="pelanggaran_mobil_melanggar_marka_berhenti_p">0</td>
                                <td id="pelanggaran_mobil_melanggar_marka_berhenti">0</td>
                                <td id="status_pelanggaran_mobil_melanggar_marka_berhenti">-</td>
                                <td id="persentase_pelanggaran_mobil_melanggar_marka_berhenti">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tidak mematuhi perintah petugas Polri(psl 104)</td>
                                <td id="pelanggaran_mobil_tidak_patuh_perintah_petugas_p">0</td>
                                <td id="pelanggaran_mobil_tidak_patuh_perintah_petugas">0</td>
                                <td id="status_pelanggaran_mobil_tidak_patuh_perintah_petugas">-</td>
                                <td id="persentase_pelanggaran_mobil_tidak_patuh_perintah_petugas">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Surat-surat</td>
                                <td id="pelanggaran_mobil_surat_surat_p">0</td>
                                <td id="pelanggaran_mobil_surat_surat">0</td>
                                <td id="status_pelanggaran_mobil_surat_surat">-</td>
                                <td id="persentase_pelanggaran_mobil_surat_surat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kelengkapan Kendaraan</td>
                                <td id="pelanggaran_mobil_kelengkapan_kendaraan_p">0</td>
                                <td id="pelanggaran_mobil_kelengkapan_kendaraan">0</td>
                                <td id="status_pelanggaran_mobil_kelengkapan_kendaraan">-</td>
                                <td id="persentase_pelanggaran_mobil_kelengkapan_kendaraan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Lain - Lain</td>
                                <td id="pelanggaran_mobil_lain_lain_p">0</td>
                                <td id="pelanggaran_mobil_lain_lain">0</td>
                                <td id="status_pelanggaran_mobil_lain_lain">-</td>
                                <td id="persentase_pelanggaran_mobil_lain_lain">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. Kendaraan Tidak Bermotor dan Pejalan Kaki</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Menyebrang tidak pada tempatnya</td>
                                <td id="pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p">0</td>
                                <td id="pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat">0</td>
                                <td id="status_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat">-</td>
                                <td id="persentase_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">3. BARANG BUKTI YANG DISITA</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>SIM</td>
                                <td id="barang_bukti_yg_disita_sim_p">0</td>
                                <td id="barang_bukti_yg_disita_sim">0</td>
                                <td id="status_barang_bukti_yg_disita_sim">-</td>
                                <td id="persentase_barang_bukti_yg_disita_sim">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>STNK</td>
                                <td id="barang_bukti_yg_disita_stnk_p">0</td>
                                <td id="barang_bukti_yg_disita_stnk">0</td>
                                <td id="status_barang_bukti_yg_disita_stnk">-</td>
                                <td id="persentase_barang_bukti_yg_disita_stnk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kendaraan</td>
                                <td id="barang_bukti_yg_disita_kendaraan_p">0</td>
                                <td id="barang_bukti_yg_disita_kendaraan">0</td>
                                <td id="status_barang_bukti_yg_disita_kendaraan">-</td>
                                <td id="persentase_barang_bukti_yg_disita_kendaraan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">4. KENDARAAN YANG TERLIBAT PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>sepeda motor</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p">0</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_sepeda_motor">0</td>
                                <td id="status_kendaraan_yang_terlibat_pelanggaran_sepeda_motor">-</td>
                                <td id="persentase_kendaraan_yang_terlibat_pelanggaran_sepeda_motor">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>mobil penumpang</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p">0</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_mobil_penumpang">0</td>
                                <td id="status_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang">-</td>
                                <td id="persentase_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>mobil bus</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_mobil_bus_p">0</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_mobil_bus">0</td>
                                <td id="status_kendaraan_yang_terlibat_pelanggaran_mobil_bus">-</td>
                                <td id="persentase_kendaraan_yang_terlibat_pelanggaran_mobil_bus">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>mobil barang</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_mobil_barang_p">0</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_mobil_barang">0</td>
                                <td id="status_kendaraan_yang_terlibat_pelanggaran_mobil_barang">-</td>
                                <td id="persentase_kendaraan_yang_terlibat_pelanggaran_mobil_barang">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>kendaraan khusus</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p">0</td>
                                <td id="kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus">0</td>
                                <td id="status_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus">-</td>
                                <td id="persentase_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">5. PROFESI PELAKU PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>pegawai negeri sipil</td>
                                <td id="profesi_pelaku_pelanggaran_pns_p">0</td>
                                <td id="profesi_pelaku_pelanggaran_pns">0</td>
                                <td id="status_profesi_pelaku_pelanggaran_pns">-</td>
                                <td id="persentase_profesi_pelaku_pelanggaran_pns">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>karyawan / swasta</td>
                                <td id="profesi_pelaku_pelanggaran_karyawan_swasta_p">0</td>
                                <td id="profesi_pelaku_pelanggaran_karyawan_swasta">0</td>
                                <td id="status_profesi_pelaku_pelanggaran_karyawan_swasta">-</td>
                                <td id="persentase_profesi_pelaku_pelanggaran_karyawan_swasta">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>pelajar / mahasiswa</td>
                                <td id="profesi_pelaku_pelanggaran_pelajar_mahasiswa_p">0</td>
                                <td id="profesi_pelaku_pelanggaran_pelajar_mahasiswa">0</td>
                                <td id="status_profesi_pelaku_pelanggaran_pelajar_mahasiswa">-</td>
                                <td id="persentase_profesi_pelaku_pelanggaran_pelajar_mahasiswa">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>pengemudi (supir)</td>
                                <td id="profesi_pelaku_pelanggaran_pengemudi_supir_p">0</td>
                                <td id="profesi_pelaku_pelanggaran_pengemudi_supir">0</td>
                                <td id="status_profesi_pelaku_pelanggaran_pengemudi_supir">-</td>
                                <td id="persentase_profesi_pelaku_pelanggaran_pengemudi_supir">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>TNI</td>
                                <td id="profesi_pelaku_pelanggaran_tni_p">0</td>
                                <td id="profesi_pelaku_pelanggaran_tni">0</td>
                                <td id="status_profesi_pelaku_pelanggaran_tni">-</td>
                                <td id="persentase_profesi_pelaku_pelanggaran_tni">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>POLRI</td>
                                <td id="profesi_pelaku_pelanggaran_polri_p">0</td>
                                <td id="profesi_pelaku_pelanggaran_polri">0</td>
                                <td id="status_profesi_pelaku_pelanggaran_polri">-</td>
                                <td id="persentase_profesi_pelaku_pelanggaran_polri">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>lain - lain</td>
                                <td id="profesi_pelaku_pelanggaran_lain_lain_p">0</td>
                                <td id="profesi_pelaku_pelanggaran_lain_lain">0</td>
                                <td id="status_profesi_pelaku_pelanggaran_lain_lain">-</td>
                                <td id="persentase_profesi_pelaku_pelanggaran_lain_lain">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">6. USIA PELAKU PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>< 15 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_kurang_dari_15_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_kurang_dari_15_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_kurang_dari_15_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_kurang_dari_15_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>16 - 20 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_16_20_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_16_20_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_16_20_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_16_20_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>21 - 25 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_21_25_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_21_25_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_21_25_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_21_25_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>26 - 30 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_26_30_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_26_30_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_26_30_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_26_30_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>31 - 35 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_31_35_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_31_35_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_31_35_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_31_35_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>36 - 40 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_36_40_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_36_40_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_36_40_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_36_40_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>41 - 45 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_41_45_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_41_45_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_41_45_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_41_45_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>46 - 50 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_46_50_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_46_50_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_46_50_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_46_50_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>51 - 55 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_51_55_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_51_55_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_51_55_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_51_55_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>56 - 60 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_56_60_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_56_60_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_56_60_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_56_60_tahun">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>> 60 Tahun</td>
                                <td id="usia_pelaku_pelanggaran_diatas_60_tahun_p">0</td>
                                <td id="usia_pelaku_pelanggaran_diatas_60_tahun">0</td>
                                <td id="status_usia_pelaku_pelanggaran_diatas_60_tahun">-</td>
                                <td id="persentase_usia_pelaku_pelanggaran_diatas_60_tahun">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">7. SIM PELAKU PELANGGARAN</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A</td>
                                <td id="sim_pelaku_pelanggaran_sim_a_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_a">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_a">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_a">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A Umum</td>
                                <td id="sim_pelaku_pelanggaran_sim_a_umum_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_a_umum">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_a_umum">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_a_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1</td>
                                <td id="sim_pelaku_pelanggaran_sim_b1_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_b1">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_b1">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_b1">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1 Umum</td>
                                <td id="sim_pelaku_pelanggaran_sim_b1_umum_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_b1_umum">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_b1_umum">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_b1_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>BII</td>
                                <td id="sim_pelaku_pelanggaran_sim_b2_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_b2">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_b2">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_b2">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B II Umum</td>
                                <td id="sim_pelaku_pelanggaran_sim_b2_umum_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_b2_umum">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_b2_umum">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_b2_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>C</td>
                                <td id="sim_pelaku_pelanggaran_sim_c_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_c">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_c">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_c">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>D</td>
                                <td id="sim_pelaku_pelanggaran_sim_d_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_d">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_d">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_d">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>SIM Internasional</td>
                                <td id="sim_pelaku_pelanggaran_sim_internasional_p">0</td>
                                <td id="sim_pelaku_pelanggaran_sim_internasional">0</td>
                                <td id="status_sim_pelaku_pelanggaran_sim_internasional">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_sim_internasional">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>Tanpa SIM</td>
                                <td id="sim_pelaku_pelanggaran_tanpa_sim_p">0</td>
                                <td id="sim_pelaku_pelanggaran_tanpa_sim">0</td>
                                <td id="status_sim_pelaku_pelanggaran_tanpa_sim">-</td>
                                <td id="persentase_sim_pelaku_pelanggaran_tanpa_sim">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">8. LOKASI PELANGGARAN LALU LINTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan pemukiman</td>
                                <td id="lokasi_pelanggaran_pemukiman_p">0</td>
                                <td id="lokasi_pelanggaran_pemukiman">0</td>
                                <td id="status_lokasi_pelanggaran_pemukiman">-</td>
                                <td id="persentase_lokasi_pelanggaran_pemukiman">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan perbelanjaan</td>
                                <td id="lokasi_pelanggaran_perbelanjaan_p">0</td>
                                <td id="lokasi_pelanggaran_perbelanjaan">0</td>
                                <td id="status_lokasi_pelanggaran_perbelanjaan">-</td>
                                <td id="persentase_lokasi_pelanggaran_perbelanjaan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>perkantoran</td>
                                <td id="lokasi_pelanggaran_perkantoran_p">0</td>
                                <td id="lokasi_pelanggaran_perkantoran">0</td>
                                <td id="status_lokasi_pelanggaran_perkantoran">-</td>
                                <td id="persentase_lokasi_pelanggaran_perkantoran">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan wisata</td>
                                <td id="lokasi_pelanggaran_wisata_p">0</td>
                                <td id="lokasi_pelanggaran_wisata">0</td>
                                <td id="status_lokasi_pelanggaran_wisata">-</td>
                                <td id="persentase_lokasi_pelanggaran_wisata">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan industri</td>
                                <td id="lokasi_pelanggaran_industri_p">0</td>
                                <td id="lokasi_pelanggaran_industri">0</td>
                                <td id="status_lokasi_pelanggaran_industri">-</td>
                                <td id="persentase_lokasi_pelanggaran_industri">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Status Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>nasional</td>
                                <td id="lokasi_pelanggaran_status_jalan_nasional_p">0</td>
                                <td id="lokasi_pelanggaran_status_jalan_nasional">0</td>
                                <td id="status_lokasi_pelanggaran_status_jalan_nasional">-</td>
                                <td id="persentase_lokasi_pelanggaran_status_jalan_nasional">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>propinsi</td>
                                <td id="lokasi_pelanggaran_status_jalan_propinsi_p">0</td>
                                <td id="lokasi_pelanggaran_status_jalan_propinsi">0</td>
                                <td id="status_lokasi_pelanggaran_status_jalan_propinsi">-</td>
                                <td id="persentase_lokasi_pelanggaran_status_jalan_propinsi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kab/kota</td>
                                <td id="lokasi_pelanggaran_status_jalan_kab_kota_p">0</td>
                                <td id="lokasi_pelanggaran_status_jalan_kab_kota">0</td>
                                <td id="status_lokasi_pelanggaran_status_jalan_kab_kota">-</td>
                                <td id="persentase_lokasi_pelanggaran_status_jalan_kab_kota">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>desa / lingkungan</td>
                                <td id="lokasi_pelanggaran_status_jalan_desa_lingkungan_p">0</td>
                                <td id="lokasi_pelanggaran_status_jalan_desa_lingkungan">0</td>
                                <td id="status_lokasi_pelanggaran_status_jalan_desa_lingkungan">-</td>
                                <td id="persentase_lokasi_pelanggaran_status_jalan_desa_lingkungan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>arteri</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_arteri_p">0</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_arteri">0</td>
                                <td id="status_lokasi_pelanggaran_fungsi_jalan_arteri">-</td>
                                <td id="persentase_lokasi_pelanggaran_fungsi_jalan_arteri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kolektor</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_kolektor_p">0</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_kolektor">0</td>
                                <td id="status_lokasi_pelanggaran_fungsi_jalan_kolektor">-</td>
                                <td id="persentase_lokasi_pelanggaran_fungsi_jalan_kolektor">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lokal</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_lokal_p">0</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_lokal">0</td>
                                <td id="status_lokasi_pelanggaran_fungsi_jalan_lokal">-</td>
                                <td id="persentase_lokasi_pelanggaran_fungsi_jalan_lokal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lingkungan</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_lingkungan_p">0</td>
                                <td id="lokasi_pelanggaran_fungsi_jalan_lingkungan">0</td>
                                <td id="status_lokasi_pelanggaran_fungsi_jalan_lingkungan">-</td>
                                <td id="persentase_lokasi_pelanggaran_fungsi_jalan_lingkungan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="titlletd" colspan="5">II. DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">9. KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_jumlah_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_jumlah_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_jumlah_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_jumlah_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_jumlah_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_jumlah_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_jumlah_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_jumlah_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_jumlah_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_jumlah_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_jumlah_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_jumlah_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kerugian materil</td>
                                <td id="kecelakaan_lalin_jumlah_kerugian_materiil_p">0</td>
                                <td id="kecelakaan_lalin_jumlah_kerugian_materiil">0</td>
                                <td id="status_kecelakaan_lalin_jumlah_kerugian_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_jumlah_kerugian_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">10. BARANG BUKTI YANG DISITA</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>SIM</td>
                                <td id="kecelakaan_barang_bukti_yg_disita_sim_p">0</td>
                                <td id="kecelakaan_barang_bukti_yg_disita_sim">0</td>
                                <td id="status_kecelakaan_barang_bukti_yg_disita_sim">-</td>
                                <td id="persentase_kecelakaan_barang_bukti_yg_disita_sim">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>STNK</td>
                                <td id="kecelakaan_barang_bukti_yg_disita_stnk_p">0</td>
                                <td id="kecelakaan_barang_bukti_yg_disita_stnk">0</td>
                                <td id="status_kecelakaan_barang_bukti_yg_disita_stnk">-</td>
                                <td id="persentase_kecelakaan_barang_bukti_yg_disita_stnk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kendaraan</td>
                                <td id="kecelakaan_barang_bukti_yg_disita_kendaraan_p">0</td>
                                <td id="kecelakaan_barang_bukti_yg_disita_kendaraan">0</td>
                                <td id="status_kecelakaan_barang_bukti_yg_disita_kendaraan">-</td>
                                <td id="persentase_kecelakaan_barang_bukti_yg_disita_kendaraan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">11. PROFESI KORBAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pegawai negeri sipil</td>
                                <td id="kecelakaan_lalin_pns_p">0</td>
                                <td id="kecelakaan_lalin_pns">0</td>
                                <td id="status_kecelakaan_lalin_pns">-</td>
                                <td id="persentase_kecelakaan_lalin_pns">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>karyawan / swasta</td>
                                <td id="profesi_korban_kecelakaan_lalin_karwayan_swasta_p">0</td>
                                <td id="profesi_korban_kecelakaan_lalin_karwayan_swasta">0</td>
                                <td id="status_profesi_korban_kecelakaan_lalin_karwayan_swasta">-</td>
                                <td id="persentase_profesi_korban_kecelakaan_lalin_karwayan_swasta">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pelajar / mahasiswa</td>
                                <td id="profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p">0</td>
                                <td id="profesi_korban_kecelakaan_lalin_pelajar_mahasiswa">0</td>
                                <td id="status_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa">-</td>
                                <td id="persentase_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengemudi</td>
                                <td id="profesi_korban_kecelakaan_lalin_pengemudi_p">0</td>
                                <td id="profesi_korban_kecelakaan_lalin_pengemudi">0</td>
                                <td id="status_profesi_korban_kecelakaan_lalin_pengemudi">-</td>
                                <td id="persentase_profesi_korban_kecelakaan_lalin_pengemudi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>TNI</td>
                                <td id="profesi_korban_kecelakaan_lalin_tni_p">0</td>
                                <td id="profesi_korban_kecelakaan_lalin_tni">0</td>
                                <td id="status_profesi_korban_kecelakaan_lalin_tni">-</td>
                                <td id="persentase_profesi_korban_kecelakaan_lalin_tni">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>POLRI</td>
                                <td id="profesi_korban_kecelakaan_lalin_polri_p">0</td>
                                <td id="profesi_korban_kecelakaan_lalin_polri">0</td>
                                <td id="status_profesi_korban_kecelakaan_lalin_polri">-</td>
                                <td id="persentase_profesi_korban_kecelakaan_lalin_polri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lain - lain</td>
                                <td id="profesi_korban_kecelakaan_lalin_lain_lain_p">0</td>
                                <td id="profesi_korban_kecelakaan_lalin_lain_lain">0</td>
                                <td id="status_profesi_korban_kecelakaan_lalin_lain_lain">-</td>
                                <td id="persentase_profesi_korban_kecelakaan_lalin_lain_lain">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">12. USIA KORBAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>< 15 Tahun</td>
                                <td id="usia_korban_kecelakaan_kurang_15_p">0</td>
                                <td id="usia_korban_kecelakaan_kurang_15">0</td>
                                <td id="status_usia_korban_kecelakaan_kurang_15">-</td>
                                <td id="persentase_usia_korban_kecelakaan_kurang_15">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>16 - 20 Tahun</td>
                                <td id="usia_korban_kecelakaan_16_20_p">0</td>
                                <td id="usia_korban_kecelakaan_16_20">0</td>
                                <td id="status_usia_korban_kecelakaan_16_20">-</td>
                                <td id="persentase_usia_korban_kecelakaan_16_20">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>21 - 25 Tahun</td>
                                <td id="usia_korban_kecelakaan_21_25_p">0</td>
                                <td id="usia_korban_kecelakaan_21_25">0</td>
                                <td id="status_usia_korban_kecelakaan_21_25">-</td>
                                <td id="persentase_usia_korban_kecelakaan_21_25">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>26 - 30 Tahun</td>
                                <td id="usia_korban_kecelakaan_26_30_p">0</td>
                                <td id="usia_korban_kecelakaan_26_30">0</td>
                                <td id="status_usia_korban_kecelakaan_26_30">-</td>
                                <td id="persentase_usia_korban_kecelakaan_26_30">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>31 - 35 Tahun</td>
                                <td id="usia_korban_kecelakaan_31_35_p">0</td>
                                <td id="usia_korban_kecelakaan_31_35">0</td>
                                <td id="status_usia_korban_kecelakaan_31_35">-</td>
                                <td id="persentase_usia_korban_kecelakaan_31_35">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>36 - 40 Tahun</td>
                                <td id="usia_korban_kecelakaan_36_40_p">0</td>
                                <td id="usia_korban_kecelakaan_36_40">0</td>
                                <td id="status_usia_korban_kecelakaan_36_40">-</td>
                                <td id="persentase_usia_korban_kecelakaan_36_40">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>41 - 45 Tahun</td>
                                <td id="usia_korban_kecelakaan_41_45_p">0</td>
                                <td id="usia_korban_kecelakaan_41_45">0</td>
                                <td id="status_usia_korban_kecelakaan_41_45">-</td>
                                <td id="persentase_usia_korban_kecelakaan_41_45">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>46 - 50 Tahun</td>
                                <td id="usia_korban_kecelakaan_45_50_p">0</td>
                                <td id="usia_korban_kecelakaan_45_50">0</td>
                                <td id="status_usia_korban_kecelakaan_45_50">-</td>
                                <td id="persentase_usia_korban_kecelakaan_45_50">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>51 - 55 Tahun</td>
                                <td id="usia_korban_kecelakaan_51_55_p">0</td>
                                <td id="usia_korban_kecelakaan_51_55">0</td>
                                <td id="status_usia_korban_kecelakaan_51_55">-</td>
                                <td id="persentase_usia_korban_kecelakaan_51_55">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>56 - 60 Tahun</td>
                                <td id="usia_korban_kecelakaan_56_60_p">0</td>
                                <td id="usia_korban_kecelakaan_56_60">0</td>
                                <td id="status_usia_korban_kecelakaan_56_60">-</td>
                                <td id="persentase_usia_korban_kecelakaan_56_60">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>> 60 Tahun</td>
                                <td id="usia_korban_kecelakaan_diatas_60_p">0</td>
                                <td id="usia_korban_kecelakaan_diatas_60">0</td>
                                <td id="status_usia_korban_kecelakaan_diatas_60">-</td>
                                <td id="persentase_usia_korban_kecelakaan_diatas_60">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">13. SIM KORBAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>A</td>
                                <td id="sim_korban_kecelakaan_sim_a_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_a">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_a">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_a">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>A Umum</td>
                                <td id="sim_korban_kecelakaan_sim_a_umum_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_a_umum">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_a_umum">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_a_umum">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>B1</td>
                                <td id="sim_korban_kecelakaan_sim_b1_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_b1">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_b1">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_b1">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>B1 Umum</td>
                                <td id="sim_korban_kecelakaan_sim_b1_umum_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_b1_umum">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_b1_umum">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_b1_umum">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>BII</td>
                                <td id="sim_korban_kecelakaan_sim_b2_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_b2">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_b2">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_b2">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>BII Umum</td>
                                <td id="sim_korban_kecelakaan_sim_b2_umum_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_b2_umum">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_b2_umum">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_b2_umum">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>C</td>
                                <td id="sim_korban_kecelakaan_sim_c_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_c">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_c">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_c">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>D</td>
                                <td id="sim_korban_kecelakaan_sim_d_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_d">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_d">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_d">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>SIM Internasional</td>
                                <td id="sim_korban_kecelakaan_sim_internasional_p">0</td>
                                <td id="sim_korban_kecelakaan_sim_internasional">0</td>
                                <td id="status_sim_korban_kecelakaan_sim_internasional">-</td>
                                <td id="persentase_sim_korban_kecelakaan_sim_internasional">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Tanpa SIM</td>
                                <td id="sim_korban_kecelakaan_tanpa_sim_p">0</td>
                                <td id="sim_korban_kecelakaan_tanpa_sim">0</td>
                                <td id="status_sim_korban_kecelakaan_tanpa_sim">-</td>
                                <td id="persentase_sim_korban_kecelakaan_tanpa_sim">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">14. KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sepeda motor</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p">0</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_sepeda_motor">0</td>
                                <td id="status_kendaraan_yg_terlibat_kecelakaan_sepeda_motor">-</td>
                                <td id="persentase_kendaraan_yg_terlibat_kecelakaan_sepeda_motor">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mobil penumpang</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p">0</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_mobil_penumpang">0</td>
                                <td id="status_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang">-</td>
                                <td id="persentase_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mobil bus</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_mobil_bus_p">0</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_mobil_bus">0</td>
                                <td id="status_kendaraan_yg_terlibat_kecelakaan_mobil_bus">-</td>
                                <td id="persentase_kendaraan_yg_terlibat_kecelakaan_mobil_bus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mobil barang</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_mobil_barang_p">0</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_mobil_barang">0</td>
                                <td id="status_kendaraan_yg_terlibat_kecelakaan_mobil_barang">-</td>
                                <td id="persentase_kendaraan_yg_terlibat_kecelakaan_mobil_barang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Kendaraan Khusus</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p">0</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus">0</td>
                                <td id="status_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus">-</td>
                                <td id="persentase_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kendaraan tidak bermotor</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p">0</td>
                                <td id="kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor">0</td>
                                <td id="status_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor">-</td>
                                <td id="persentase_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">15. JENIS KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tunggal / out of control</td>
                                <td id="jenis_kecelakaan_tunggal_ooc_p">0</td>
                                <td id="jenis_kecelakaan_tunggal_ooc">0</td>
                                <td id="status_jenis_kecelakaan_tunggal_ooc">-</td>
                                <td id="persentase_jenis_kecelakaan_tunggal_ooc">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>depan-depan</td>
                                <td id="jenis_kecelakaan_depan_depan_p">0</td>
                                <td id="jenis_kecelakaan_depan_depan">0</td>
                                <td id="status_jenis_kecelakaan_depan_depan">-</td>
                                <td id="persentase_jenis_kecelakaan_depan_depan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>depan-belakang</td>
                                <td id="jenis_kecelakaan_depan_belakang_p">0</td>
                                <td id="jenis_kecelakaan_depan_belakang">0</td>
                                <td id="status_jenis_kecelakaan_depan_belakang">-</td>
                                <td id="persentase_jenis_kecelakaan_depan_belakang">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>depan-samping</td>
                                <td id="jenis_kecelakaan_depan_samping_p">0</td>
                                <td id="jenis_kecelakaan_depan_samping">0</td>
                                <td id="status_jenis_kecelakaan_depan_samping">-</td>
                                <td id="persentase_jenis_kecelakaan_depan_samping">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>beruntun</td>
                                <td id="jenis_kecelakaan_beruntun_p">0</td>
                                <td id="jenis_kecelakaan_beruntun">0</td>
                                <td id="status_jenis_kecelakaan_beruntun">-</td>
                                <td id="persentase_jenis_kecelakaan_beruntun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tabrak pejalan kaki</td>
                                <td id="jenis_kecelakaan_pejalan_kaki_p">0</td>
                                <td id="jenis_kecelakaan_pejalan_kaki">0</td>
                                <td id="status_jenis_kecelakaan_pejalan_kaki">-</td>
                                <td id="persentase_jenis_kecelakaan_pejalan_kaki">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tabrak lari</td>
                                <td id="jenis_kecelakaan_tabrak_lari_p">0</td>
                                <td id="jenis_kecelakaan_tabrak_lari">0</td>
                                <td id="status_jenis_kecelakaan_tabrak_lari">-</td>
                                <td id="persentase_jenis_kecelakaan_tabrak_lari">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tabrak hewan</td>
                                <td id="jenis_kecelakaan_tabrak_hewan_p">0</td>
                                <td id="jenis_kecelakaan_tabrak_hewan">0</td>
                                <td id="status_jenis_kecelakaan_tabrak_hewan">-</td>
                                <td id="persentase_jenis_kecelakaan_tabrak_hewan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>samping-samping</td>
                                <td id="jenis_kecelakaan_samping_samping_p">0</td>
                                <td id="jenis_kecelakaan_samping_samping">0</td>
                                <td id="status_jenis_kecelakaan_samping_samping">-</td>
                                <td id="persentase_jenis_kecelakaan_samping_samping">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lainnya</td>
                                <td id="jenis_kecelakaan_lainnya_p">0</td>
                                <td id="jenis_kecelakaan_lainnya">0</td>
                                <td id="status_jenis_kecelakaan_lainnya">-</td>
                                <td id="persentase_jenis_kecelakaan_lainnya">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">16. PROFESI PELAKU KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pegawai negeri sipil</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_pns_p">0</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_pns">0</td>
                                <td id="status_profesi_pelaku_kecelakaan_lalin_pns">-</td>
                                <td id="persentase_profesi_pelaku_kecelakaan_lalin_pns">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>karyawan / swasta</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p">0</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_karyawan_swasta">0</td>
                                <td id="status_profesi_pelaku_kecelakaan_lalin_karyawan_swasta">-</td>
                                <td id="persentase_profesi_pelaku_kecelakaan_lalin_karyawan_swasta">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pelajar / mahasiswa</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p">0</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar">0</td>
                                <td id="status_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar">-</td>
                                <td id="persentase_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengemudi</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_pengemudi_p">0</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_pengemudi">0</td>
                                <td id="status_profesi_pelaku_kecelakaan_lalin_pengemudi">-</td>
                                <td id="persentase_profesi_pelaku_kecelakaan_lalin_pengemudi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>TNI</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_tni_p">0</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_tni">0</td>
                                <td id="status_profesi_pelaku_kecelakaan_lalin_tni">-</td>
                                <td id="persentase_profesi_pelaku_kecelakaan_lalin_tni">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>POLRI</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_polri_p">0</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_polri">0</td>
                                <td id="status_profesi_pelaku_kecelakaan_lalin_polri">-</td>
                                <td id="persentase_profesi_pelaku_kecelakaan_lalin_polri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lain - lain</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_lain_lain_p">0</td>
                                <td id="profesi_pelaku_kecelakaan_lalin_lain_lain">0</td>
                                <td id="status_profesi_pelaku_kecelakaan_lalin_lain_lain">-</td>
                                <td id="persentase_profesi_pelaku_kecelakaan_lalin_lain_lain">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">17. USIA PELAKU KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>< 15 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_kurang_dari_15_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_kurang_dari_15_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_kurang_dari_15_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_kurang_dari_15_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>16 - 20 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_16_20_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_16_20_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_16_20_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_16_20_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>21 - 25 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_21_25_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_21_25_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_21_25_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_21_25_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>26 - 30 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_26_30_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_26_30_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_26_30_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_26_30_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>31 - 35 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_31_35_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_31_35_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_31_35_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_31_35_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>36 - 40 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_36_40_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_36_40_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_36_40_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_36_40_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>41 - 45 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_41_45_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_41_45_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_41_45_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_41_45_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>46 - 50 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_46_50_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_46_50_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_46_50_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_46_50_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>51 - 55 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_51_55_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_51_55_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_51_55_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_51_55_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>56 - 60 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_56_60_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_56_60_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_56_60_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_56_60_tahun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>> 60 Tahun</td>
                                <td id="usia_pelaku_kecelakaan_diatas_60_tahun_p">0</td>
                                <td id="usia_pelaku_kecelakaan_diatas_60_tahun">0</td>
                                <td id="status_usia_pelaku_kecelakaan_diatas_60_tahun">-</td>
                                <td id="persentase_usia_pelaku_kecelakaan_diatas_60_tahun">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">18. SIM PELAKU KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A</td>
                                <td id="sim_pelaku_kecelakaan_sim_a_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_a">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_a">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_a">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>A Umum</td>
                                <td id="sim_pelaku_kecelakaan_sim_a_umum_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_a_umum">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_a_umum">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_a_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1</td>
                                <td id="sim_pelaku_kecelakaan_sim_b1_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_b1">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_b1">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_b1">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B1 Umum</td>
                                <td id="sim_pelaku_kecelakaan_sim_b1_umum_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_b1_umum">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_b1_umum">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_b1_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>BII</td>
                                <td id="sim_pelaku_kecelakaan_sim_b2_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_b2">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_b2">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_b2">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>B II Umum</td>
                                <td id="sim_pelaku_kecelakaan_sim_b2_umum_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_b2_umum">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_b2_umum">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_b2_umum">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>C</td>
                                <td id="sim_pelaku_kecelakaan_sim_c_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_c">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_c">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_c">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>D</td>
                                <td id="sim_pelaku_kecelakaan_sim_d_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_d">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_d">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_d">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>SIM Internasional</td>
                                <td id="sim_pelaku_kecelakaan_sim_internasional_p">0</td>
                                <td id="sim_pelaku_kecelakaan_sim_internasional">0</td>
                                <td id="status_sim_pelaku_kecelakaan_sim_internasional">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_sim_internasional">-</td>
                            </tr>
                            <tr class="evaluasi comreport">
                                <td>Tanpa SIM</td>
                                <td id="sim_pelaku_kecelakaan_tanpa_sim_p">0</td>
                                <td id="sim_pelaku_kecelakaan_tanpa_sim">0</td>
                                <td id="status_sim_pelaku_kecelakaan_tanpa_sim">-</td>
                                <td id="persentase_sim_pelaku_kecelakaan_tanpa_sim">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">19. LOKASI KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan pemukiman</td>
                                <td id="lokasi_kecelakaan_lalin_pemukiman_p">0</td>
                                <td id="lokasi_kecelakaan_lalin_pemukiman">0</td>
                                <td id="status_lokasi_kecelakaan_lalin_pemukiman">-</td>
                                <td id="persentase_lokasi_kecelakaan_lalin_pemukiman">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan perbelanjaan</td>
                                <td id="lokasi_kecelakaan_lalin_perbelanjaan_p">0</td>
                                <td id="lokasi_kecelakaan_lalin_perbelanjaan">0</td>
                                <td id="status_lokasi_kecelakaan_lalin_perbelanjaan">-</td>
                                <td id="persentase_lokasi_kecelakaan_lalin_perbelanjaan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>perkantoran</td>
                                <td id="lokasi_kecelakaan_lalin_perkantoran_p">0</td>
                                <td id="lokasi_kecelakaan_lalin_perkantoran">0</td>
                                <td id="status_lokasi_kecelakaan_lalin_perkantoran">-</td>
                                <td id="persentase_lokasi_kecelakaan_lalin_perkantoran">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan wisata</td>
                                <td id="lokasi_kecelakaan_lalin_wisata_p">0</td>
                                <td id="lokasi_kecelakaan_lalin_wisata">0</td>
                                <td id="status_lokasi_kecelakaan_lalin_wisata">-</td>
                                <td id="persentase_lokasi_kecelakaan_lalin_wisata">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kawasan industri</td>
                                <td id="lokasi_kecelakaan_lalin_industri_p">0</td>
                                <td id="lokasi_kecelakaan_lalin_industri">0</td>
                                <td id="status_lokasi_kecelakaan_lalin_industri">-</td>
                                <td id="persentase_lokasi_kecelakaan_lalin_industri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Lain - Lain</td>
                                <td id="lokasi_kecelakaan_lalin_lain_lain_p">0</td>
                                <td id="lokasi_kecelakaan_lalin_lain_lain">0</td>
                                <td id="status_lokasi_kecelakaan_lalin_lain_lain">-</td>
                                <td id="persentase_lokasi_kecelakaan_lalin_lain_lain">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Status Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>nasional</td>
                                <td id="lokasi_kecelakaan_status_jalan_nasional_p">0</td>
                                <td id="lokasi_kecelakaan_status_jalan_nasional">0</td>
                                <td id="status_lokasi_kecelakaan_status_jalan_nasional">-</td>
                                <td id="persentase_lokasi_kecelakaan_status_jalan_nasional">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>propinsi</td>
                                <td id="lokasi_kecelakaan_status_jalan_propinsi_p">0</td>
                                <td id="lokasi_kecelakaan_status_jalan_propinsi">0</td>
                                <td id="status_lokasi_kecelakaan_status_jalan_propinsi">-</td>
                                <td id="persentase_lokasi_kecelakaan_status_jalan_propinsi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kab/kota</td>
                                <td id="lokasi_kecelakaan_status_jalan_kab_kota_p">0</td>
                                <td id="lokasi_kecelakaan_status_jalan_kab_kota">0</td>
                                <td id="status_lokasi_kecelakaan_status_jalan_kab_kota">-</td>
                                <td id="persentase_lokasi_kecelakaan_status_jalan_kab_kota">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>desa / lingkungan</td>
                                <td id="lokasi_kecelakaan_status_jalan_desa_lingkungan_p">0</td>
                                <td id="lokasi_kecelakaan_status_jalan_desa_lingkungan">0</td>
                                <td id="status_lokasi_kecelakaan_status_jalan_desa_lingkungan">-</td>
                                <td id="persentase_lokasi_kecelakaan_status_jalan_desa_lingkungan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>arteri</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_arteri_p">0</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_arteri">0</td>
                                <td id="status_lokasi_kecelakaan_fungsi_jalan_arteri">-</td>
                                <td id="persentase_lokasi_kecelakaan_fungsi_jalan_arteri">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kolektor</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_kolektor_p">0</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_kolektor">0</td>
                                <td id="status_lokasi_kecelakaan_fungsi_jalan_kolektor">-</td>
                                <td id="persentase_lokasi_kecelakaan_fungsi_jalan_kolektor">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lokal</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_lokal_p">0</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_lokal">0</td>
                                <td id="status_lokasi_kecelakaan_fungsi_jalan_lokal">-</td>
                                <td id="persentase_lokasi_kecelakaan_fungsi_jalan_lokal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lingkungan</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_lingkungan_p">0</td>
                                <td id="lokasi_kecelakaan_fungsi_jalan_lingkungan">0</td>
                                <td id="status_lokasi_kecelakaan_fungsi_jalan_lingkungan">-</td>
                                <td id="persentase_lokasi_kecelakaan_fungsi_jalan_lingkungan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">20. FAKTOR PENYEBAB KECELAKAAN</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">A. MANUSIA</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_manusia_p">0</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_manusia">0</td>
                                <td class="subtitle" id="status_faktor_penyebab_kecelakaan_manusia">-</td>
                                <td class="subtitle" id="persentase_faktor_penyebab_kecelakaan_manusia">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>ngantuk/lelah (PSL 283)</td>
                                <td id="faktor_penyebab_kecelakaan_ngantuk_lelah_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_ngantuk_lelah">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_ngantuk_lelah">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_ngantuk_lelah">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mabuk/pengaruh alkohol dan obat (PSL 283)</td>
                                <td id="faktor_penyebab_kecelakaan_mabuk_obat_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_mabuk_obat">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_mabuk_obat">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_mabuk_obat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sakit (PSL 283)</td>
                                <td id="faktor_penyebab_kecelakaan_sakit_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_sakit">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_sakit">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_sakit">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>hand phone/alat elektronik lain (PSL 283)</td>
                                <td id="faktor_penyebab_kecelakaan_handphone_elektronik_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_handphone_elektronik">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_handphone_elektronik">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_handphone_elektronik">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>menerobos lampu merah(PSL 287 ay 2)</td>
                                <td id="faktor_penyebab_kecelakaan_menerobos_lampu_merah_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_menerobos_lampu_merah">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_menerobos_lampu_merah">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_menerobos_lampu_merah">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>melanggar batas kecepatan (PSL 287 ay 7)</td>
                                <td id="faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_melanggar_batas_kecepatan">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak menjaga jarak</td>
                                <td id="faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_tidak_menjaga_jarak">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_tidak_menjaga_jarak">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_tidak_menjaga_jarak">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>mendahului/berbelok/berpindah jalur (PSL 294)</td>
                                <td id="faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>berpindah lajur ( PSL 295)</td>
                                <td id="faktor_penyebab_kecelakaan_berpindah_jalur_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_berpindah_jalur">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_berpindah_jalur">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_berpindah_jalur">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak memberikan lampu isyarat berhenti/berbelok/berubah arah</td>
                                <td id="faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak mengutamakan pejalan kaki (PSL 284 jo 106 ay 2)</td>
                                <td id="faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>lainnya</td>
                                <td id="faktor_penyebab_kecelakaan_lainnya_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_lainnya">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_lainnya">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_lainnya">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="evaluasi">
                                <td class="subtitle">B. ALAM</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_alam_p">0</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_alam">0</td>
                                <td class="subtitle" id="status_faktor_penyebab_kecelakaan_alam">-</td>
                                <td class="subtitle" id="persentase_faktor_penyebab_kecelakaan_alam">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">C. KELAIKAN KENDARAAN</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_kelaikan_kendaraan_p">0</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_kelaikan_kendaraan">0</td>
                                <td class="subtitle" id="status_faktor_penyebab_kecelakaan_kelaikan_kendaraan">-</td>
                                <td class="subtitle" id="persentase_faktor_penyebab_kecelakaan_kelaikan_kendaraan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">D. JALAN (KONDISI JALAN)</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_kondisi_jalan_p">0</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_kondisi_jalan">0</td>
                                <td class="subtitle" id="status_faktor_penyebab_kecelakaan_kondisi_jalan">-</td>
                                <td class="subtitle" id="persentase_faktor_penyebab_kecelakaan_kondisi_jalan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td class="subtitle">E. PRASARANA JALAN</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_prasarana_jalan_p">0</td>
                                <td class="subtitle" id="faktor_penyebab_kecelakaan_prasarana_jalan">0</td>
                                <td class="subtitle" id="status_faktor_penyebab_kecelakaan_prasarana_jalan">-</td>
                                <td class="subtitle" id="persentase_faktor_penyebab_kecelakaan_prasarana_jalan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>rambu</td>
                                <td id="faktor_penyebab_kecelakaan_rambu_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_rambu">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_rambu">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_rambu">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>makna</td>
                                <td id="faktor_penyebab_kecelakaan_marka_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_marka">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_marka">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_marka">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>apil</td>
                                <td id="faktor_penyebab_kecelakaan_apil_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_apil">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_apil">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_apil">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Perlintasan KA Tanpa Palang Pintu</td>
                                <td id="faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p">0</td>
                                <td id="faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu">0</td>
                                <td id="status_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu">-</td>
                                <td id="persentase_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">21. WAKTU KEJADIAN KECELAKAAN LALU LINTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>00.00 - 03.00</td>
                                <td id="waktu_kejadian_kecelakaan_00_03_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_00_03">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_00_03">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_00_03">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>03.00 - 06.00</td>
                                <td id="waktu_kejadian_kecelakaan_03_06_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_03_06">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_03_06">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_03_06">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>06.00 - 09.00</td>
                                <td id="waktu_kejadian_kecelakaan_06_09_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_06_09">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_06_09">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_06_09">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>09.00 - 12.00</td>
                                <td id="waktu_kejadian_kecelakaan_09_12_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_09_12">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_09_12">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_09_12">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>12.00 - 15.00</td>
                                <td id="waktu_kejadian_kecelakaan_12_15_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_12_15">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_12_15">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_12_15">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>15.00 - 18.00</td>
                                <td id="waktu_kejadian_kecelakaan_15_18_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_15_18">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_15_18">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_15_18">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>18.00 - 21.00</td>
                                <td id="waktu_kejadian_kecelakaan_18_21_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_18_21">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_18_21">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_18_21">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>21.00 - 24.00</td>
                                <td id="waktu_kejadian_kecelakaan_21_24_p">0</td>
                                <td id="waktu_kejadian_kecelakaan_21_24">0</td>
                                <td id="status_waktu_kejadian_kecelakaan_21_24">-</td>
                                <td id="persentase_waktu_kejadian_kecelakaan_21_24">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">22. KECELAKAAN LALU LINTAS MENONJOL</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_menonjol_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_menonjol_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_menonjol_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_menonjol_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_menonjol_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_menonjol_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_menonjol_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_menonjol_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_menonjol_materiil_p">0</td>
                                <td id="kecelakaan_lalin_menonjol_materiil">0</td>
                                <td id="status_kecelakaan_lalin_menonjol_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_menonjol_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">23. KECELAKAAN LALU LINTAS TUNGGAL / OUT OF CONTROL</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tunggal_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_tunggal_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tunggal_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_tunggal_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tunggal_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_tunggal_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tunggal_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_tunggal_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tunggal_materiil_p">0</td>
                                <td id="kecelakaan_lalin_tunggal_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tunggal_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tunggal_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">24. TABRAK PEJALAN KAKI</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_pejalan_kaki_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_pejalan_kaki_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_pejalan_kaki_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">25. TABRAK LARI</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_lari_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_lari_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_lari_materiil_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_lari_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_lari_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_lari_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">26. TABRAK SEPEDA MOTOR ( R2 )</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_materiil_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_sepeda_motor_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_sepeda_motor_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_sepeda_motor_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">27. TABRAK RANMOR RODA EMPAT ( R4 )</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_materiil_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_roda_empat_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_roda_empat_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_roda_empat_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">28. TABRAK KENDARAAN TIDAK BERMOTOR (SEPEDA,BECAK DAYUNG, DELMAN, DOKAR DLL)</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p">0</td>
                                <td id="kecelakaan_lalin_tabrak_tidak_bermotor_materiil">0</td>
                                <td id="status_kecelakaan_lalin_tabrak_tidak_bermotor_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_tabrak_tidak_bermotor_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">29. KECELAKAAN DI PERLINTASAN KA</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>jumlah kejadian</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p">0</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_jumlah_kejadian">0</td>
                                <td id="status_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian">-</td>
                                <td id="persentase_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>berpalang pintu</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p">0</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_berpalang_pintu">0</td>
                                <td id="status_kecelakaan_lalin_perlintasan_ka_berpalang_pintu">-</td>
                                <td id="persentase_kecelakaan_lalin_perlintasan_ka_berpalang_pintu">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tidak berpalang pintu</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p">0</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu">0</td>
                                <td id="status_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu">-</td>
                                <td id="persentase_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka ringan</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p">0</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_korban_luka_ringan">0</td>
                                <td id="status_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan">-</td>
                                <td id="persentase_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban luka berat</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p">0</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_korban_luka_berat">0</td>
                                <td id="status_kecelakaan_lalin_perlintasan_ka_korban_luka_berat">-</td>
                                <td id="persentase_kecelakaan_lalin_perlintasan_ka_korban_luka_berat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>korban meninggal dunia</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_korban_meninggal_p">0</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_korban_meninggal">0</td>
                                <td id="status_kecelakaan_lalin_perlintasan_ka_korban_meninggal">-</td>
                                <td id="persentase_kecelakaan_lalin_perlintasan_ka_korban_meninggal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>materiil</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_materiil_p">0</td>
                                <td id="kecelakaan_lalin_perlintasan_ka_materiil">0</td>
                                <td id="status_kecelakaan_lalin_perlintasan_ka_materiil">-</td>
                                <td id="persentase_kecelakaan_lalin_perlintasan_ka_materiil">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">30. KECELAKAAN TRANSPORTASI</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kecelakaan kereta api</td>
                                <td id="kecelakaan_transportasi_kereta_api_p">0</td>
                                <td id="kecelakaan_transportasi_kereta_api">0</td>
                                <td id="status_kecelakaan_transportasi_kereta_api">-</td>
                                <td id="persentase_kecelakaan_transportasi_kereta_api">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kecelakaan laut/perairan</td>
                                <td id="kecelakaan_transportasi_laut_perairan_p">0</td>
                                <td id="kecelakaan_transportasi_laut_perairan">0</td>
                                <td id="status_kecelakaan_transportasi_laut_perairan">-</td>
                                <td id="persentase_kecelakaan_transportasi_laut_perairan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kecelakaan udara</td>
                                <td id="kecelakaan_transportasi_udara_p">0</td>
                                <td id="kecelakaan_transportasi_udara">0</td>
                                <td id="status_kecelakaan_transportasi_udara">-</td>
                                <td id="persentase_kecelakaan_transportasi_udara">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="titlletd" colspan="5">III. DATA TERKAIT DIKMAS LANTAS</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">31. DIKMAS LANTAS</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. Penluh</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>melalui media cetak</td>
                                <td id="penlu_melalui_media_cetak_p">0</td>
                                <td id="penlu_melalui_media_cetak">0</td>
                                <td id="status_penlu_melalui_media_cetak">-</td>
                                <td id="persentase_penlu_melalui_media_cetak">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>melalui media elektronik</td>
                                <td id="penlu_melalui_media_elektronik_p">0</td>
                                <td id="penlu_melalui_media_elektronik">0</td>
                                <td id="status_penlu_melalui_media_elektronik">-</td>
                                <td id="persentase_penlu_melalui_media_elektronik">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Media Sosial</td>
                                <td id="penlu_melalui_media_sosial_p">0</td>
                                <td id="penlu_melalui_media_sosial">0</td>
                                <td id="status_penlu_melalui_media_sosial">-</td>
                                <td id="persentase_penlu_melalui_media_sosial">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tempat keramaian</td>
                                <td id="penlu_melalui_tempat_keramaian_p">0</td>
                                <td id="penlu_melalui_tempat_keramaian">0</td>
                                <td id="status_penlu_melalui_tempat_keramaian">-</td>
                                <td id="persentase_penlu_melalui_tempat_keramaian">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>tempat istirahat</td>
                                <td id="penlu_melalui_tempat_istirahat_p">0</td>
                                <td id="penlu_melalui_tempat_istirahat">0</td>
                                <td id="status_penlu_melalui_tempat_istirahat">-</td>
                                <td id="persentase_penlu_melalui_tempat_istirahat">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>daerah rawan laka & langgar</td>
                                <td id="penlu_melalui_daerah_rawan_laka_dan_langgar_p">0</td>
                                <td id="penlu_melalui_daerah_rawan_laka_dan_langgar">0</td>
                                <td id="status_penlu_melalui_daerah_rawan_laka_dan_langgar">-</td>
                                <td id="persentase_penlu_melalui_daerah_rawan_laka_dan_langgar">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. Penyebaran / Pemasangan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>spanduk</td>
                                <td id="penyebaran_pemasangan_spanduk_p">0</td>
                                <td id="penyebaran_pemasangan_spanduk">0</td>
                                <td id="status_penyebaran_pemasangan_spanduk">-</td>
                                <td id="persentase_penyebaran_pemasangan_spanduk">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>leaflet</td>
                                <td id="penyebaran_pemasangan_leaflet_p">0</td>
                                <td id="penyebaran_pemasangan_leaflet">0</td>
                                <td id="status_penyebaran_pemasangan_leaflet">-</td>
                                <td id="persentase_penyebaran_pemasangan_leaflet">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sticker</td>
                                <td id="penyebaran_pemasangan_sticker_p">0</td>
                                <td id="penyebaran_pemasangan_sticker">0</td>
                                <td id="status_penyebaran_pemasangan_sticker">-</td>
                                <td id="persentase_penyebaran_pemasangan_sticker">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>bilboard</td>
                                <td id="penyebaran_pemasangan_bilboard_p">0</td>
                                <td id="penyebaran_pemasangan_bilboard">0</td>
                                <td id="status_penyebaran_pemasangan_bilboard">-</td>
                                <td id="persentase_penyebaran_pemasangan_bilboard">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. Program Nasional Keamanan Lalu Lintas</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>polisi sahabat anak</td>
                                <td id="polisi_sahabat_anak_p">0</td>
                                <td id="polisi_sahabat_anak">0</td>
                                <td id="status_polisi_sahabat_anak">-</td>
                                <td id="persentase_polisi_sahabat_anak">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>cara aman sekolah</td>
                                <td id="cara_aman_sekolah_p">0</td>
                                <td id="cara_aman_sekolah">0</td>
                                <td id="status_cara_aman_sekolah">-</td>
                                <td id="persentase_cara_aman_sekolah">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>patroli keamanan sekolah</td>
                                <td id="patroli_keamanan_sekolah_p">0</td>
                                <td id="patroli_keamanan_sekolah">0</td>
                                <td id="status_patroli_keamanan_sekolah">-</td>
                                <td id="persentase_patroli_keamanan_sekolah">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pramuka saka bhayangkara krida lalu lintas</td>
                                <td id="pramuka_bhayangkara_krida_lalu_lintas_p">0</td>
                                <td id="pramuka_bhayangkara_krida_lalu_lintas">0</td>
                                <td id="status_pramuka_bhayangkara_krida_lalu_lintas">-</td>
                                <td id="persentase_pramuka_bhayangkara_krida_lalu_lintas">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">D. Program Nasional Keselamatan Lalu Lintas</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>police goes to campus</td>
                                <td id="police_goes_to_campus_p">0</td>
                                <td id="police_goes_to_campus">0</td>
                                <td id="status_police_goes_to_campus">-</td>
                                <td id="persentase_police_goes_to_campus">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>safety riding & driving</td>
                                <td id="safety_riding_driving_p">0</td>
                                <td id="safety_riding_driving">0</td>
                                <td id="status_safety_riding_driving">-</td>
                                <td id="persentase_safety_riding_driving">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>forum lalu lintas & angkutan jalan</td>
                                <td id="forum_lalu_lintas_angkutan_umum_p">0</td>
                                <td id="forum_lalu_lintas_angkutan_umum">0</td>
                                <td id="status_forum_lalu_lintas_angkutan_umum">-</td>
                                <td id="persentase_forum_lalu_lintas_angkutan_umum">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>kampanye keselamatan</td>
                                <td id="kampanye_keselamatan_p">0</td>
                                <td id="kampanye_keselamatan">0</td>
                                <td id="status_kampanye_keselamatan">-</td>
                                <td id="persentase_kampanye_keselamatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>sekolah mengemudi</td>
                                <td id="sekolah_mengemudi_p">0</td>
                                <td id="sekolah_mengemudi">0</td>
                                <td id="status_sekolah_mengemudi">-</td>
                                <td id="persentase_sekolah_mengemudi">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>taman lalu lintas</td>
                                <td id="taman_lalu_lintas_p">0</td>
                                <td id="taman_lalu_lintas">0</td>
                                <td id="status_taman_lalu_lintas">-</td>
                                <td id="persentase_taman_lalu_lintas">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>global road safety partnership action</td>
                                <td id="global_road_safety_partnership_action_p">0</td>
                                <td id="global_road_safety_partnership_action">0</td>
                                <td id="status_global_road_safety_partnership_action">-</td>
                                <td id="persentase_global_road_safety_partnership_action">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="titlletd" colspan="5">IV. DATA GIAT KEPOLISIAN</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">32. GIAT LANTAS</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengaturan</td>
                                <td id="giat_lantas_pengaturan_p">0</td>
                                <td id="giat_lantas_pengaturan">0</td>
                                <td id="status_giat_lantas_pengaturan">-</td>
                                <td id="persentase_giat_lantas_pengaturan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>penjagaan</td>
                                <td id="giat_lantas_penjagaan_p">0</td>
                                <td id="giat_lantas_penjagaan">0</td>
                                <td id="status_giat_lantas_penjagaan">-</td>
                                <td id="persentase_giat_lantas_penjagaan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>pengawalan</td>
                                <td id="giat_lantas_pengawalan_p">0</td>
                                <td id="giat_lantas_pengawalan">0</td>
                                <td id="status_giat_lantas_pengawalan">-</td>
                                <td id="persentase_giat_lantas_pengawalan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>patroli</td>
                                <td id="giat_lantas_patroli_p">0</td>
                                <td id="giat_lantas_patroli">0</td>
                                <td id="status_giat_lantas_patroli">-</td>
                                <td id="persentase_giat_lantas_patroli">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="titlletd" colspan="5">V. DATA TERKAIT ARUS PEMUDIK</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">33. JUMLAH PENUMPANG</td>
                            </tr>
                            <tr>
                                <td class="subtitle" colspan="5">A. TERMINAL</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Bus Keberangkatan</td>
                                <td id="arus_mudik_jumlah_bus_keberangkatan_p">0</td>
                                <td id="arus_mudik_jumlah_bus_keberangkatan">0</td>
                                <td id="status_arus_mudik_jumlah_bus_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_jumlah_bus_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Penumpang Keberangkatan</td>
                                <td id="arus_mudik_jumlah_penumpang_keberangkatan_p">0</td>
                                <td id="arus_mudik_jumlah_penumpang_keberangkatan">0</td>
                                <td id="status_arus_mudik_jumlah_penumpang_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_jumlah_penumpang_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Bus Kedatangan</td>
                                <td id="arus_mudik_jumlah_bus_kedatangan_p">0</td>
                                <td id="arus_mudik_jumlah_bus_kedatangan">0</td>
                                <td id="status_arus_mudik_jumlah_bus_kedatangan">-</td>
                                <td id="persentase_arus_mudik_jumlah_bus_kedatangan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Penumpang Kedatangan</td>
                                <td id="arus_mudik_jumlah_penumpang_kedatangan_p">0</td>
                                <td id="arus_mudik_jumlah_penumpang_kedatangan">0</td>
                                <td id="status_arus_mudik_jumlah_penumpang_kedatangan">-</td>
                                <td id="persentase_arus_mudik_jumlah_penumpang_kedatangan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="evaluasi">
                                <td>Total Terminal</td>
                                <td id="arus_mudik_total_terminal_p">0</td>
                                <td id="arus_mudik_total_terminal">0</td>
                                <td id="status_arus_mudik_total_terminal">-</td>
                                <td id="persentase_arus_mudik_total_terminal">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Bus Keberangkatan</td>
                                <td id="arus_mudik_total_bus_keberangkatan_p">0</td>
                                <td id="arus_mudik_total_bus_keberangkatan">0</td>
                                <td id="status_arus_mudik_total_bus_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_total_bus_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Keberangkatan</td>
                                <td id="arus_mudik_penumpang_keberangkatan_p">0</td>
                                <td id="arus_mudik_penumpang_keberangkatan">0</td>
                                <td id="status_arus_mudik_penumpang_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_penumpang_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Bus Kedatangan</td>
                                <td id="arus_mudik_total_bus_kedatangan_p">0</td>
                                <td id="arus_mudik_total_bus_kedatangan">0</td>
                                <td id="status_arus_mudik_total_bus_kedatangan">-</td>
                                <td id="persentase_arus_mudik_total_bus_kedatangan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Kedatangan</td>
                                <td id="arus_mudik_penumpang_kedatangan_p">0</td>
                                <td id="arus_mudik_penumpang_kedatangan">0</td>
                                <td id="status_arus_mudik_penumpang_kedatangan">-</td>
                                <td id="persentase_arus_mudik_penumpang_kedatangan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">B. STASIUN KERETA API</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Stasiun</td>
                                <td id="arus_mudik_kereta_api_total_stasiun_p">0</td>
                                <td id="arus_mudik_kereta_api_total_stasiun">0</td>
                                <td id="status_arus_mudik_kereta_api_total_stasiun">-</td>
                                <td id="persentase_arus_mudik_kereta_api_total_stasiun">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Keberangkatan</td>
                                <td id="arus_mudik_kereta_api_total_penumpang_keberangkatan_p">0</td>
                                <td id="arus_mudik_kereta_api_total_penumpang_keberangkatan">0</td>
                                <td id="status_arus_mudik_kereta_api_total_penumpang_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_kereta_api_total_penumpang_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Kedatangan</td>
                                <td id="arus_mudik_kereta_api_total_penumpang_kedatangan_p">0</td>
                                <td id="arus_mudik_kereta_api_total_penumpang_kedatangan">0</td>
                                <td id="status_arus_mudik_kereta_api_total_penumpang_kedatangan">-</td>
                                <td id="persentase_arus_mudik_kereta_api_total_penumpang_kedatangan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">C. PELABUHAN</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Kendaraan Keberangkatan</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>R4</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>R2</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Penumpang Keberangkatan</td>
                                <td id="arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Kendaraan Kedatangan</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>R4</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>R2</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Penumpang Kedatangan</td>
                                <td id="arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p">0</td>
                                <td id="arus_mudik_pelabuhan_jumlah_penumpang_kedatangan">0</td>
                                <td id="status_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="evaluasi">
                                <td>Total Pelabuhan</td>
                                <td id="arus_mudik_total_pelabuhan_p">0</td>
                                <td id="arus_mudik_total_pelabuhan">0</td>
                                <td id="status_arus_mudik_total_pelabuhan">-</td>
                                <td id="persentase_arus_mudik_total_pelabuhan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Kendaraan Keberangkatan</td>
                                <td id="arus_mudik_pelabuhan_kendaraan_keberangkatan_p">0</td>
                                <td id="arus_mudik_pelabuhan_kendaraan_keberangkatan">0</td>
                                <td id="status_arus_mudik_pelabuhan_kendaraan_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_kendaraan_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Kendaraan Kedatangan</td>
                                <td id="arus_mudik_pelabuhan_kendaraan_kedatangan_p">0</td>
                                <td id="arus_mudik_pelabuhan_kendaraan_kedatangan">0</td>
                                <td id="status_arus_mudik_pelabuhan_kendaraan_kedatangan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_kendaraan_kedatangan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Keberangkatan</td>
                                <td id="arus_mudik_pelabuhan_total_penumpang_keberangkatan_p">0</td>
                                <td id="arus_mudik_pelabuhan_total_penumpang_keberangkatan">0</td>
                                <td id="status_arus_mudik_pelabuhan_total_penumpang_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_total_penumpang_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Kedatangan</td>
                                <td id="arus_mudik_pelabuhan_total_penumpang_kedatangan_p">0</td>
                                <td id="arus_mudik_pelabuhan_total_penumpang_kedatangan">0</td>
                                <td id="status_arus_mudik_pelabuhan_total_penumpang_kedatangan">-</td>
                                <td id="persentase_arus_mudik_pelabuhan_total_penumpang_kedatangan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="subtitle" colspan="5">D. BANDARA</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Penumpang Keberangkatan</td>
                                <td id="arus_mudik_bandara_jumlah_penumpang_keberangkatan_p">0</td>
                                <td id="arus_mudik_bandara_jumlah_penumpang_keberangkatan">0</td>
                                <td id="status_arus_mudik_bandara_jumlah_penumpang_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_bandara_jumlah_penumpang_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Penumpang Kedatangan</td>
                                <td id="arus_mudik_bandara_jumlah_penumpang_kedatangan_p">0</td>
                                <td id="arus_mudik_bandara_jumlah_penumpang_kedatangan">0</td>
                                <td id="status_arus_mudik_bandara_jumlah_penumpang_kedatangan">-</td>
                                <td id="persentase_arus_mudik_bandara_jumlah_penumpang_kedatangan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr class="evaluasi">
                                <td>Total Bandara</td>
                                <td id="arus_mudik_total_bandara_p">0</td>
                                <td id="arus_mudik_total_bandara">0</td>
                                <td id="status_arus_mudik_total_bandara">-</td>
                                <td id="persentase_arus_mudik_total_bandara">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Keberangkatan</td>
                                <td id="arus_mudik_bandara_total_penumpang_keberangkatan_p">0</td>
                                <td id="arus_mudik_bandara_total_penumpang_keberangkatan">0</td>
                                <td id="status_arus_mudik_bandara_total_penumpang_keberangkatan">-</td>
                                <td id="persentase_arus_mudik_bandara_total_penumpang_keberangkatan">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Total Penumpang Kedatangan</td>
                                <td id="arus_mudik_bandara_total_penumpang_kedatangan_p">0</td>
                                <td id="arus_mudik_bandara_total_penumpang_kedatangan">0</td>
                                <td id="status_arus_mudik_bandara_total_penumpang_kedatangan">-</td>
                                <td id="persentase_arus_mudik_bandara_total_penumpang_kedatangan">-</td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td></tr>
                            <tr>
                                <td class="titlletd" colspan="5">VI. DATA TERKAIT PROKES COVID-19</td>
                            </tr>
                            <tr class="padd-title">
                                <td bgcolor="#0E7096" colspan="5">34. Giat Protokol Kesehatan</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Teguran Gar Protokol Kesehatan</td>
                                <td id="prokes_covid_teguran_gar_prokes_p">0</td>
                                <td id="prokes_covid_teguran_gar_prokes">0</td>
                                <td id="status_prokes_covid_teguran_gar_prokes">-</td>
                                <td id="persentase_prokes_covid_teguran_gar_prokes">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Pembagian Masker</td>
                                <td id="prokes_covid_pembagian_masker_p">0</td>
                                <td id="prokes_covid_pembagian_masker">0</td>
                                <td id="status_prokes_covid_pembagian_masker">-</td>
                                <td id="persentase_prokes_covid_pembagian_masker">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Sosialisasi ttg Protokol Kesehatan</td>
                                <td id="prokes_covid_sosialisasi_tentang_prokes_p">0</td>
                                <td id="prokes_covid_sosialisasi_tentang_prokes">0</td>
                                <td id="status_prokes_covid_sosialisasi_tentang_prokes">-</td>
                                <td id="persentase_prokes_covid_sosialisasi_tentang_prokes">-</td>
                            </tr>
                            <tr class="evaluasi">
                                <td>Jumlah Bus Keberangkatan</td>
                                <td id="prokes_covid_giat_baksos_p">0</td>
                                <td id="prokes_covid_giat_baksos">0</td>
                                <td id="status_prokes_covid_giat_baksos">-</td>
                                <td id="persentase_prokes_covid_giat_baksos">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-12 d-none" id="panelLoading">
            <div class="centerContent">
                <img src="{{ asset('template/assets/img/loader.gif') }}" alt="" srcset="">
            </div>
        </div>
    </div>
</div>

@endsection

@push('library_css')
<link href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
<link href="{{ asset('template/custom.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('page_js')
<script>
    function percentageValue(tahunKedua, tahunPertama) {
        var output1 = parseInt(tahunKedua) - parseInt(tahunPertama)
        var output2 = parseInt(output1) / parseInt(tahunPertama)
        var output3 = parseInt(output2) * 100
        var output4 = Math.round(parseInt(output3), 2)

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
            if(parseInt(tahunKedua) > parseInt(tahunPertama)) {
                tanda = '<svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"> <defs> <style>.a{fill:#00adef;}</style> </defs> <path class="a" d="M9.125,6.394,6.881,8.631,6,7.75,9.75,4,13.5,7.75l-.881.881L10.375,6.394V14H9.125Z" transform="translate(-6 -4)"/> </svg> Naik ';
            } else if(parseInt(tahunKedua) < parseInt(tahunPertama)) {
                tanda = '<svg xmlns="http://www.w3.org/2000/svg" width="7.5" height="10" viewBox="0 0 7.5 10"> <defs> <style>.a{fill:#00adef;}</style> </defs> <path class="a" d="M9.125,11.606,6.881,9.369,6,10.25,9.75,14l3.75-3.75-.881-.881-2.244,2.238V4H9.125Z" transform="translate(-6 -4)"/> </svg> Turun';
            } else if(parseInt(tahunKedua) == parseInt(tahunPertama)) {
                tanda = "Sama";
            } else {
                tanda = "";
            }
            return tanda;
        }
    }

    $("#operation_id").on("change", function (e) {
        e.preventDefault()

        $(".pembanding").addClass("d-none")
        $('#tanggal_pembanding_1').val('')
        $('#tanggal_pembanding_2').val('')

        if($(this).val()) {
            axios.get(route('operation_plan_show', $(this).val()))
            .then(function (response) {
                var startDate = response.data.start_date
                var endDate = response.data.end_date

                $(".pembanding").removeClass("d-none")

                $('#tanggal_pembanding_1').datepicker({
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true,
                    startDate: startDate,
                    endDate: endDate,
                })

                $('#tanggal_pembanding_2').datepicker({
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true,
                    startDate: startDate,
                    endDate: endDate,
                })
            })
            .catch(function (error) {
                swal("Data tidak ditemukan. Silakan periksa data yang akan diproses", null, "error")
            })
            $("#btnUnduhData").prop('disabled', false)
        } else {
            $("#btnUnduhData").prop('disabled', true)
        }
    })

    $(document).ready(function () {
        $("#btnUnduhData").prop('disabled', true)
    })
</script>
@endpush