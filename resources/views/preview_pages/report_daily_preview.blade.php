<div class="modal fade" id="daily_preview" tabindex="-1" role="dialog" aria-labelledby="daily_preview" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <span class="colorblue">PREVIEW LAPORAN</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                            <div class="row imgpopup">
                                <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                            </div>
                        </div>



                        <div class="table-responsive">
                            <table id="tbl_report_daily_preview" class="table">
                                <thead>
                                    <tr>
                                        <th width="50%">Nama Laporan</th>
                                        <th width="25%">tahun 2020</th>
                                        <th width="25%">tahun 2021</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="titlletd" colspan="5" bgcolor="#fff">I. DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">1. PELANGGARAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Tilang</td>
                                        <td id="pelanggaran_lalu_lintas_tilang_prev">0</td>
                                        <td id="pelanggaran_lalu_lintas_tilang">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Teguran</td>
                                        <td id="pelanggaran_lalu_lintas_teguran_prev">0</td>
                                        <td id="pelanggaran_lalu_lintas_teguran">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">2. JENIS PELANGGARAN LALU LINTAS</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">A. Sepeda Motor</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun Helm SNI</td>
                                        <td id="pelanggaran_lalin_motor_gunhelm_prev">0</td>
                                        <td id="pelanggaran_lalin_motor_gunhelm">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melawan Arus</td>
                                        <td id="pelanggaran_lalin_motor_lawan_arus_prev">0</td>
                                        <td id="pelanggaran_lalin_motor_lawan_arus">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun HP Saat Berkendara</td>
                                        <td id="pelanggaran_lalin_motor_gunhp_prev">0</td>
                                        <td id="pelanggaran_lalin_motor_gunhp">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Pengaruh Alkohol</td>
                                        <td id="pelanggaran_lalin_motor_pengaruh_alkohol_prev">0</td>
                                        <td id="pelanggaran_lalin_motor_pengaruh_alkohol">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melebihi Batas Kecepatan</td>
                                        <td id="pelanggaran_lalin_motor_batas_kecepatan_prev">0</td>
                                        <td id="pelanggaran_lalin_motor_batas_kecepatan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Umur</td>
                                        <td id="pelanggaran_lalin_motor_bawah_umur_prev">0</td>
                                        <td id="pelanggaran_lalin_motor_bawah_umur">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Lain - Lain</td>
                                        <td id="pelanggaran_lalin_motor_lain_lain_prev">0</td>
                                        <td id="pelanggaran_lalin_motor_lain_lain">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Mobil Dan Kendaraan Khusus</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melawan Arus</td>
                                        <td id="pelanggaran_lalin_mobil_lawan_arus_prev">0</td>
                                        <td id="pelanggaran_lalin_mobil_lawan_arus">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun HP Saat Berkendara</td>
                                        <td id="pelanggaran_lalin_mobil_gunhp_prev">0</td>
                                        <td id="pelanggaran_lalin_mobil_gunhp">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Pengaruh Alkohol</td>
                                        <td id="pelanggaran_lalin_mobil_pengaruh_alkohol_prev">0</td>
                                        <td id="pelanggaran_lalin_mobil_pengaruh_alkohol">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melebihi Batas Kecepatan</td>
                                        <td id="pelanggaran_lalin_mobil_batas_kecepatan_prev">0</td>
                                        <td id="pelanggaran_lalin_mobil_batas_kecepatan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Umur</td>
                                        <td id="pelanggaran_lalin_mobil_bawah_umur_prev">0</td>
                                        <td id="pelanggaran_lalin_mobil_bawah_umur">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun Safety Belt</td>
                                        <td id="pelanggaran_lalin_mobil_gunsafety_belt_prev">0</td>
                                        <td id="pelanggaran_lalin_mobil_gunsafety_belt">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Lain - Lain</td>
                                        <td id="pelanggaran_lalin_mobil_lain_lain_prev">0</td>
                                        <td id="pelanggaran_lalin_mobil_lain_lain">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">3. BARANG BUKTI YANG DISITA</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>SIM</td>
                                        <td id="pelanggaran_lalin_barang_bukti_sim_prev">0</td>
                                        <td id="pelanggaran_lalin_barang_bukti_sim">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>STNK</td>
                                        <td id="pelanggaran_lalin_barang_bukti_stnk_prev">0</td>
                                        <td id="pelanggaran_lalin_barang_bukti_stnk">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Kendaraan</td>
                                        <td id="pelanggaran_lalin_barang_bukti_kendaraan_prev">0</td>
                                        <td id="pelanggaran_lalin_barang_bukti_kendaraan">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">4. KENDARAAN YANG TERLIBAT PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>sepeda motor</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_motor_prev">0</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_motor">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>mobil penumpang</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_png_prev">0</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_png">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>mobil bus</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_bus_prev">0</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_bus">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>mobil barang</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_brg_prev">0</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_mob_brg">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>kendaraan khusus</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_khusus_prev">0</td>
                                        <td id="pelanggaran_lalin_terlibat_pelanggaran_khusus">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">5. PROFESI PELAKU PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>pegawai negeri sipil</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_pns_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_pns">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>karyawan / swasta</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_swasta_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_swasta">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>pelajar / mahasiswa</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_pelajar_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_pelajar">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>pengemudi (supir)</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_supir_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_supir">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>TNI</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_tni_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_tni">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>POLRI</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_polri_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_polri">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>lain - lain</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_lainnya_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_lainnya">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">6. USIA PELAKU PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>&lt; 15 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_15tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_15tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>16 - 20 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_1620tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_1620tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>21 - 25 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_2125tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_2125tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>26 - 30 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_2630tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_2630tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>31 - 35 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_3135tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_3135tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>36 - 40 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_3640tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_3640tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>41 - 45 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_4145tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_4145tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>46 - 50 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_4650tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_4650tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>51 - 55 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_5155tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_5155tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>56 - 60 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_5660tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_5660tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>&gt; 60 Tahun</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_60tahun_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_60tahun">0</td>
                                    </tr>

                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">7. SIM PELAKU PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_a_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_a">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A Umum</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_a_umum_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_a_umum">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_b1_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_b1">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1 Umum</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_b1umum_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_b1umum">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>BII</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_bii_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_bii">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B II Umum</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_bii_umum_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_bii_umum">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>C</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_c_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_c">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>D</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_d_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_d">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>SIM Internasional</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_sim_internasional_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_sim_internasional">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>Tanpa SIM</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_tanpa_sim_prev">0</td>
                                        <td id="pelanggaran_lalin_profesi_pelaku_tanpa_sim">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">8. LOKASI PELANGGARAN LALU LINTAS</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan pemukiman</td>
                                        <td id="pelanggaran_lalin_kawasan_pemukiman_prev">0</td>
                                        <td id="pelanggaran_lalin_kawasan_pemukiman">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan perbelanjaan</td>
                                        <td id="pelanggaran_lalin_kawasan_perbelanjaan_prev">0</td>
                                        <td id="pelanggaran_lalin_kawasan_perbelanjaan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>perkantoran</td>
                                        <td id="pelanggaran_lalin_kawasan_perkantoran_prev">0</td>
                                        <td id="pelanggaran_lalin_kawasan_perkantoran">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan wisata</td>
                                        <td id="pelanggaran_lalin_kawasan_wisata_prev">0</td>
                                        <td id="pelanggaran_lalin_kawasan_wisata">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan industri</td>
                                        <td id="pelanggaran_lalin_kawasan_industri_prev">0</td>
                                        <td id="pelanggaran_lalin_kawasan_industri">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Status Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>nasional</td>
                                        <td id="pelanggaran_lalin_status_jalan_nasional_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_nasional">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>propinsi</td>
                                        <td id="pelanggaran_lalin_status_jalan_propinsi_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_propinsi">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kab/kota</td>
                                        <td id="pelanggaran_lalin_status_jalan_kabkota_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_kabkota">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>desa / lingkungan</td>
                                        <td id="pelanggaran_lalin_status_jalan_desa_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_desa">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>arteri</td>
                                        <td id="pelanggaran_lalin_status_jalan_arteri_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_arteri">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kolektor</td>
                                        <td id="pelanggaran_lalin_status_jalan_kolektor_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_kolektor">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lokal</td>
                                        <td id="pelanggaran_lalin_status_jalan_lokal_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_lokal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lingkungan</td>
                                        <td id="pelanggaran_lalin_status_jalan_lingkungan_prev">0</td>
                                        <td id="pelanggaran_lalin_status_jalan_lingkungan">0</td>
                                    </tr>
                                    <tr>
                                        <td class="titlletd" colspan="5" bgcolor="#fff">II. DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">9. KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_jumlah_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_jumlah_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_korban_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_korban_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_korban_lukaberat_prev">0</td>
                                        <td id="kecelakaan_lalin_korban_lukaberat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_korban_lukaringan_prev">0</td>
                                        <td id="kecelakaan_lalin_korban_lukaringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kerugian materil</td>
                                        <td id="kecelakaan_lalin_kerugian_materil_prev">0</td>
                                        <td id="kecelakaan_lalin_kerugian_materil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">10. BARANG BUKTI YANG DISITA</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>SIM</td>
                                        <td id="kecelakaan_lalin_barbuk_sim_prev">0</td>
                                        <td id="kecelakaan_lalin_barbuk_sim">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>STNK</td>
                                        <td id="kecelakaan_lalin_barbuk_stnk_prev">0</td>
                                        <td id="kecelakaan_lalin_barbuk_stnk">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kendaraan</td>
                                        <td id="kecelakaan_lalin_barbuk_kendaraan_prev">0</td>
                                        <td id="kecelakaan_lalin_barbuk_kendaraan">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">11. PROFESI KORBAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pegawai negeri sipil</td>
                                        <td id="kecelakaan_lalin_pns_prev">0</td>
                                        <td id="kecelakaan_lalin_pns">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>karyawan / swasta</td>
                                        <td id="kecelakaan_lalin_swasta_prev">0</td>
                                        <td id="kecelakaan_lalin_swasta">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pelajar / mahasiswa</td>
                                        <td id="kecelakaan_lalin_pelajar_prev">0</td>
                                        <td id="kecelakaan_lalin_pelajar">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengemudi</td>
                                        <td id="kecelakaan_lalin_pengemudi_prev">0</td>
                                        <td id="kecelakaan_lalin_pengemudi">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>TNI</td>
                                        <td id="kecelakaan_lalin_tni_prev">0</td>
                                        <td id="kecelakaan_lalin_tni">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>POLRI</td>
                                        <td id="kecelakaan_lalin_polri_prev">0</td>
                                        <td id="kecelakaan_lalin_polri">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lain - lain</td>
                                        <td id="kecelakaan_lalin_lain_prev">0</td>
                                        <td id="kecelakaan_lalin_lain">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">12. USIA KORBAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&lt; 15 Tahun</td>
                                        <td id="kecelakaan_lalin_15tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_15tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>16 - 20 Tahun</td>
                                        <td id="kecelakaan_lalin_1620tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_1620tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>21 - 25 Tahun</td>
                                        <td id="kecelakaan_lalin_2125tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_2125tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>26 - 30 Tahun</td>
                                        <td id="kecelakaan_lalin_2630tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_2630tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>31 - 35 Tahun</td>
                                        <td id="kecelakaan_lalin_3135tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_3135tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>36 - 40 Tahun</td>
                                        <td id="kecelakaan_lalin_3640tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_3640tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>41 - 45 Tahun</td>
                                        <td id="kecelakaan_lalin_4145tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_4145tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>46 - 50 Tahun</td>
                                        <td id="kecelakaan_lalin_4650tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_4650tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>51 - 55 Tahun</td>
                                        <td id="kecelakaan_lalin_5155tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_5155tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>56 - 60 Tahun</td>
                                        <td id="kecelakaan_lalin_5660tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_5660tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&gt; 60 Tahun</td>
                                        <td id="kecelakaan_lalin_60tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_60tahun">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">13. SIM KORBAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>A</td>
                                        <td id="kecelakaan_lalin_sima_prev">0</td>
                                        <td id="kecelakaan_lalin_sima">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>A Umum</td>
                                        <td id="kecelakaan_lalin_sima_umum_prev">0</td>
                                        <td id="kecelakaan_lalin_sima_umum">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>B1</td>
                                        <td id="kecelakaan_lalin_b1_prev">0</td>
                                        <td id="kecelakaan_lalin_b1">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>B1 Umum</td>
                                        <td id="kecelakaan_lalin_b1umum_prev">0</td>
                                        <td id="kecelakaan_lalin_b1umum">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>BII</td>
                                        <td id="kecelakaan_lalin_bii_prev">0</td>
                                        <td id="kecelakaan_lalin_bii">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>BII Umum</td>
                                        <td id="kecelakaan_lalin_bii_umum_prev">0</td>
                                        <td id="kecelakaan_lalin_bii_umum">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>C</td>
                                        <td id="kecelakaan_lalin_simc_prev">0</td>
                                        <td id="kecelakaan_lalin_simc">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>D</td>
                                        <td id="kecelakaan_lalin_simd_prev">0</td>
                                        <td id="kecelakaan_lalin_simd">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>SIM Internasional</td>
                                        <td id="kecelakaan_lalin_sim_internasional_prev">0</td>
                                        <td id="kecelakaan_lalin_sim_internasional">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Tanpa SIM</td>
                                        <td id="kecelakaan_lalin_tanpa_sim_prev">0</td>
                                        <td id="kecelakaan_lalin_tanpa_sim">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">14. KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sepeda motor</td>
                                        <td id="kecelakaan_lalin_motor_prev">0</td>
                                        <td id="kecelakaan_lalin_motor">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mobil penumpang</td>
                                        <td id="kecelakaan_lalin_mobil_penumpang_prev">0</td>
                                        <td id="kecelakaan_lalin_mobil_penumpang">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mobil bus</td>
                                        <td id="kecelakaan_lalin_bus_prev">0</td>
                                        <td id="kecelakaan_lalin_bus">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mobil barang</td>
                                        <td id="kecelakaan_lalin_barang_prev">0</td>
                                        <td id="kecelakaan_lalin_barang">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Kendaraan Khusus</td>
                                        <td id="kecelakaan_lalin_kendaraankhusus_prev">0</td>
                                        <td id="kecelakaan_lalin_kendaraankhusus">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kendaraan tidak bermotor</td>
                                        <td id="kecelakaan_lalin_tidak_bermotor_prev">0</td>
                                        <td id="kecelakaan_lalin_tidak_bermotor">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">15. JENIS KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tunggal / out of control</td>
                                        <td id="kecelakaan_lalin_tunggal_prev">0</td>
                                        <td id="kecelakaan_lalin_tunggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>depan-depan</td>
                                        <td id="kecelakaan_lalin_depan_prev">0</td>
                                        <td id="kecelakaan_lalin_depan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>depan-belakang</td>
                                        <td id="kecelakaan_lalin_depan_belakang_prev">0</td>
                                        <td id="kecelakaan_lalin_depan_belakang">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>depan-samping</td>
                                        <td id="kecelakaan_lalin_depan_samping_prev">0</td>
                                        <td id="kecelakaan_lalin_depan_samping">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>beruntun</td>
                                        <td id="kecelakaan_lalin_beruntun_prev">0</td>
                                        <td id="kecelakaan_lalin_beruntun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tabrak pejalan kaki</td>
                                        <td id="kecelakaan_lalin_pejalan_kaki_prev">0</td>
                                        <td id="kecelakaan_lalin_pejalan_kaki">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tabrak lari</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_lari">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tabrak hewan</td>
                                        <td id="kecelakaan_lalin_tabrak_hewan_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_hewan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>samping-samping</td>
                                        <td id="kecelakaan_lalin_samping_prev">0</td>
                                        <td id="kecelakaan_lalin_samping">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lainnya</td>
                                        <td id="kecelakaan_lalin_lainnya_prev">0</td>
                                        <td id="kecelakaan_lalin_lainnya">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">16. PROFESI PELAKU KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pegawai negeri sipil</td>
                                        <td id="kecelakaan_lalin_pelaku_pns_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_pns">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>karyawan / swasta</td>
                                        <td id="kecelakaan_lalin_pelaku_swasta_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_swasta">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pelajar / mahasiswa</td>
                                        <td id="kecelakaan_lalin_pelaku_pelajar_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_pelajar">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengemudi</td>
                                        <td id="kecelakaan_lalin_pelaku_pengemudi_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_pengemudi">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>TNI</td>
                                        <td id="kecelakaan_lalin_pelaku_tni_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_tni">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>POLRI</td>
                                        <td id="kecelakaan_lalin_pelaku_polri_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_polri">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lain - lain</td>
                                        <td id="kecelakaan_lalin_pelaku_lain_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_lain">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">17. USIA PELAKU KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&lt; 15 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_15tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_15tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>16 - 20 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_1620tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_1620tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>21 - 25 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_2125tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_2125tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>26 - 30 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_2630tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_2630tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>31 - 35 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_3135tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_3135tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>36 - 40 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_3640tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_3640tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>41 - 45 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_4145tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_4145tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>46 - 50 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_4650tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_4650tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>51 - 55 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_5155tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_5155tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>56 - 60 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_5660tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_5660tahun">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&gt; 60 Tahun</td>
                                        <td id="kecelakaan_lalin_pelaku_60tahun_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_60tahun">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">18. SIM PELAKU KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_a_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_a">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A Umum</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_a_umum_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_a_umum">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_b1_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_b1">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1 Umum</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_b1umum_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_b1umum">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>BII</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_bii_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_bii">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B II Umum</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_bii_umum_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_bii_umum">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>C</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_c_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_c">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>D</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_d_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_d">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>SIM Internasional</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_sim_internasional_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_sim_internasional">0</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>Tanpa SIM</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_tanpa_sim_prev">0</td>
                                        <td id="kecelakaan_lalin_pelaku_sim_tanpa_sim">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">19. LOKASI KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan pemukiman</td>
                                        <td id="kecelakaan_lalin_kawasan_pemukiman_prev">0</td>
                                        <td id="kecelakaan_lalin_kawasan_pemukiman">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan perbelanjaan</td>
                                        <td id="kecelakaan_lalin_kawasan_perbelanjaan_prev">0</td>
                                        <td id="kecelakaan_lalin_kawasan_perbelanjaan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>perkantoran</td>
                                        <td id="kecelakaan_lalin_kawasan_perkantoran_prev">0</td>
                                        <td id="kecelakaan_lalin_kawasan_perkantoran">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan wisata</td>
                                        <td id="kecelakaan_lalin_kawasan_wisata_prev">0</td>
                                        <td id="kecelakaan_lalin_kawasan_wisata">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan industri</td>
                                        <td id="kecelakaan_lalin_kawasan_industri_prev">0</td>
                                        <td id="kecelakaan_lalin_kawasan_industri">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Lain - Lain</td>
                                        <td id="kecelakaan_lalin_kawasan_lainlain_prev">0</td>
                                        <td id="kecelakaan_lalin_kawasan_lainlain">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Status Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>nasional</td>
                                        <td id="kecelakaan_lalin_status_jalan_nasional_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_nasional">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>propinsi</td>
                                        <td id="kecelakaan_lalin_status_jalan_propinsi_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_propinsi">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kab/kota</td>
                                        <td id="kecelakaan_lalin_status_jalan_kabkota_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_kabkota">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>desa / lingkungan</td>
                                        <td id="kecelakaan_lalin_status_jalan_desa_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_desa">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>arteri</td>
                                        <td id="kecelakaan_lalin_status_jalan_arteri_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_arteri">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kolektor</td>
                                        <td id="kecelakaan_lalin_status_jalan_kolektor_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_kolektor">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lokal</td>
                                        <td id="kecelakaan_lalin_status_jalan_lokal_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_lokal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lingkungan</td>
                                        <td id="kecelakaan_lalin_status_jalan_lingkungan_prev">0</td>
                                        <td id="kecelakaan_lalin_status_jalan_lingkungan">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">20. FAKTOR PENYEBAB KECELAKAAN</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">A. MANUSIA</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_manusia_prev">0</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_manusia">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>ngantuk/lelah (PSL 283)</td>
                                        <td id="kecelakaan_lalin_penyebab_ngantuk_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_ngantuk">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mabuk/pengaruh alkohol dan obat (PSL 283)</td>
                                        <td id="kecelakaan_lalin_penyebab_mabuk_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_mabuk">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sakit (PSL 283)</td>
                                        <td id="kecelakaan_lalin_penyebab_sakit_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_sakit">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>hand phone/alat elektronik lain (PSL 283)</td>
                                        <td id="kecelakaan_lalin_penyebab_hp_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_hp">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>menerobos lampu merah(PSL 287 ay 2)</td>
                                        <td id="kecelakaan_lalin_penyebab_lampu_merah_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_lampu_merah">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>melanggar batas kecepatan (PSL 287 ay 7)</td>
                                        <td id="kecelakaan_lalin_penyebab_batas_cepat_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_batas_cepat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak menjaga jarak</td>
                                        <td id="kecelakaan_lalin_penyebab_jaga_jarak_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_jaga_jarak">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mendahului/berbelok/berpindah jalur (PSL 294)</td>
                                        <td id="kecelakaan_lalin_penyebab_pindah_jalur_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_pindah_jalur">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>berpindah lajur ( PSL 295)</td>
                                        <td id="kecelakaan_lalin_penyebab_pindah_lajur_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_pindah_lajur">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak memberikan lampu isyarat berhenti/berbelok/berubah arah</td>
                                        <td id="kecelakaan_lalin_penyebab_lampu_isyarat_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_lampu_isyarat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak mengutamakan pejalan kaki (PSL 284 jo 106 ay 2)</td>
                                        <td id="kecelakaan_lalin_penyebab_pejalan_kaki_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_pejalan_kaki">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lainnya</td>
                                        <td id="kecelakaan_lalin_penyebab_lainnya_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_lainnya">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">B. ALAM</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_alam_prev">0</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_alam">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">C. KELAIKAN KENDARAAN</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kendaraan_prev">0</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kendaraan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">D. JALAN (KONDISI JALAN)</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kondisi_jalan_prev">0</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kondisi_jalan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">E. PRASARANA JALAN</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_prasarana_prev">0</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_prasarana">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>rambu</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_rambu_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_rambu">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>makna</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_makna_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_makna">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>apil</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_apil_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_apil">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Perlintasan KA Tanpa Palang Pintu</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_palangpintu_prev">0</td>
                                        <td id="kecelakaan_lalin_penyebab_prasarana_palangpintu">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">21. WAKTU KEJADIAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>00.00 - 03.00</td>
                                        <td id="kecelakaan_lalin_waktu_0003_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_0003">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>03.00 - 06.00</td>
                                        <td id="kecelakaan_lalin_waktu_0306_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_0306">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>06.00 - 09.00</td>
                                        <td id="kecelakaan_lalin_waktu_0609_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_0609">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>09.00 - 12.00</td>
                                        <td id="kecelakaan_lalin_waktu_0912_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_0912">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>12.00 - 15.00</td>
                                        <td id="kecelakaan_lalin_waktu_1215_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_1215">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>15.00 - 18.00</td>
                                        <td id="kecelakaan_lalin_waktu_1518_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_1518">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>18.00 - 21.00</td>
                                        <td id="kecelakaan_lalin_waktu_1821_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_1821">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>21.00 - 24.00</td>
                                        <td id="kecelakaan_lalin_waktu_2124_prev">0</td>
                                        <td id="kecelakaan_lalin_waktu_2124">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">22. KECELAKAAN LALU LINTAS MENONJOL</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_menonjol_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_menonjol_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_menonjol_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_menonjol_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_menonjol_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_menonjol_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_menonjol_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_menonjol_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_menonjol_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_menonjol_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">23. KECELAKAAN LALU LINTAS TUNGGAL / OUT OF CONTROL</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_tunggal_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_tunggal_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_tunggal_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_tunggal_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_tunggal_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_tunggal_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_tunggal_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_tunggal_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_tunggal_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_tunggal_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">24. TABRAK PEJALAN KAKI</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_jalan_kaki_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">25. TABRAK LARI</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_lari_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">26. TABRAK SEPEDA MOTOR ( R2 )</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_motor_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">27. TABRAK RANMOR RODA EMPAT ( R4 )</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_tabrak_roda4_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">28. TABRAK KENDARAAN TIDAK BERMOTOR (SEPEDA,BECAK DAYUNG, DELMAN, DOKAR DLL)</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_tidak_motor_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_tidak_motor_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_tidak_motor_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_tidak_motor_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_tidak_motor_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_tidak_motor_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_tidak_motor_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_tidak_motor_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_tidak_motor_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_tidak_motor_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">29. KECELAKAAN DI PERLINTASAN KA</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_kejadian_prev">0</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_kejadian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>berpalang pintu</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_berpalang_prev">0</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_berpalang">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak berpalang pintu</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_tidak_berpalang_prev">0</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_tidak_berpalang">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_luka_ringan_prev">0</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_luka_ringan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_luka_berat_prev">0</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_luka_berat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_meninggal_prev">0</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_meninggal">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_materiil_prev">0</td>
                                        <td id="kecelakaan_lalin_pelintasan_ka_materiil">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">30. KECELAKAAN TRANSPORTASI</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kecelakaan kereta api</td>
                                        <td id="kecelakaan_lalin_transportasi_ka_prev">0</td>
                                        <td id="kecelakaan_lalin_transportasi_ka">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kecelakaan laut/perairan</td>
                                        <td id="kecelakaan_lalin_transportasi_laut_prev">0</td>
                                        <td id="kecelakaan_lalin_transportasi_laut">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kecelakaan udara</td>
                                        <td id="kecelakaan_lalin_transportasi_udara_prev">0</td>
                                        <td id="kecelakaan_lalin_transportasi_udara">0</td>
                                    </tr>
                                    <tr>
                                        <td class="titlletd" colspan="5" bgcolor="#fff">III. DATA TERKAIT DIKMAS LANTAS</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">31. DIKMAS LANTAS</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">A. Penluh</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>melalui media cetak</td>
                                        <td id="dikmas_lantas_penluh_cetak_prev">0</td>
                                        <td id="dikmas_lantas_penluh_cetak">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>melalui media elektronik</td>
                                        <td id="dikmas_lantas_penluh_elektronik_prev">0</td>
                                        <td id="dikmas_lantas_penluh_elektronik">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tempat keramaian</td>
                                        <td id="dikmas_lantas_penluh_keramaian_prev">0</td>
                                        <td id="dikmas_lantas_penluh_keramaian">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tempat istirahat</td>
                                        <td id="dikmas_lantas_penluh_istirahat_prev">0</td>
                                        <td id="dikmas_lantas_penluh_istirahat">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>daerah rawan laka &amp; langgar</td>
                                        <td id="dikmas_lantas_penluh_langgar_prev">0</td>
                                        <td id="dikmas_lantas_penluh_langgar">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Penyebaran / Pemasangan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>spanduk</td>
                                        <td id="dikmas_lantas_penluh_spanduk_prev">0</td>
                                        <td id="dikmas_lantas_penluh_spanduk">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>leaflet</td>
                                        <td id="dikmas_lantas_penluh_leaflet_prev">0</td>
                                        <td id="dikmas_lantas_penluh_leaflet">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sticker</td>
                                        <td id="dikmas_lantas_penluh_sticker_prev">0</td>
                                        <td id="dikmas_lantas_penluh_sticker">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>bilboard</td>
                                        <td id="dikmas_lantas_penluh_bilboard_prev">0</td>
                                        <td id="dikmas_lantas_penluh_bilboard">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">C. Program Nasional Keamanan Lalu Lintas</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>polisi sahabat anak</td>
                                        <td id="dikmas_lantas_penluh_polisi_anak_prev">0</td>
                                        <td id="dikmas_lantas_penluh_polisi_anak">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>cara aman sekolah</td>
                                        <td id="dikmas_lantas_penluh_cara_aman_prev">0</td>
                                        <td id="dikmas_lantas_penluh_cara_aman">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>patroli keamanan sekolah</td>
                                        <td id="dikmas_lantas_penluh_patroli_prev">0</td>
                                        <td id="dikmas_lantas_penluh_patroli">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pramuka saka bhayangkara krida lalu lintas</td>
                                        <td id="dikmas_lantas_penluh_pramuka_prev">0</td>
                                        <td id="dikmas_lantas_penluh_pramuka">0</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">D. Program Nasional Keselamatan Lalu Lintas</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>police goes to campus</td>
                                        <td id="dikmas_lantas_penluh_police_campus_prev">0</td>
                                        <td id="dikmas_lantas_penluh_police_campus">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>safety riding &amp; driving</td>
                                        <td id="dikmas_lantas_penluh_safety_riding_prev">0</td>
                                        <td id="dikmas_lantas_penluh_safety_riding">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>forum lalu lintas &amp; angkutan jalan</td>
                                        <td id="dikmas_lantas_forum_lalin_prev">0</td>
                                        <td id="dikmas_lantas_forum_lalin">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kampanye keselamatan</td>
                                        <td id="dikmas_lantas_penluh_kampanye_prev">0</td>
                                        <td id="dikmas_lantas_penluh_kampanye">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sekolah mengemudi</td>
                                        <td id="dikmas_lantas_penluh_mengemudi_prev">0</td>
                                        <td id="dikmas_lantas_penluh_mengemudi">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>taman lalu lintas</td>
                                        <td id="dikmas_lantas_penluh_taman_lalin_prev">0</td>
                                        <td id="dikmas_lantas_penluh_taman_lalin">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>global road safety partnership action</td>
                                        <td id="dikmas_lantas_penluh_global_road_prev">0</td>
                                        <td id="dikmas_lantas_penluh_global_road">0</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">32. DATA TERKAIT GIAT KEPOLISIAN GIAT LANTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengaturan</td>
                                        <td id="dikmas_lantas_giatlantas_pengaturan_prev">0</td>
                                        <td id="dikmas_lantas_giatlantas_pengaturan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>penjagaan</td>
                                        <td id="dikmas_lantas_giatlantas_penjagaan_prev">0</td>
                                        <td id="dikmas_lantas_giatlantas_penjagaan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengawalan</td>
                                        <td id="dikmas_lantas_giatlantas_pengawalan_prev">0</td>
                                        <td id="dikmas_lantas_giatlantas_pengawalan">0</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>patroli</td>
                                        <td id="dikmas_lantas_giatlantas_patroli_prev">0</td>
                                        <td id="dikmas_lantas_giatlantas_patroli">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>