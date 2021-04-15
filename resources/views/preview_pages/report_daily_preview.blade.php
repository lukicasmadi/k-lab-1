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
                                <img src="{{ asset('/img/line_popbottom.png') }}">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="tbl_report_daily_preview" class="table">
                                <thead>
                                    <tr>
                                        <th width="50%">Nama Laporan</th>
                                        <th width="25%">tahun <span id="idTahunPrev"></span></th>
                                        <th width="25%">tahun <span id="idTahun"></span></th>
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
                                        <td class="data_load" id="pelanggaran_lalu_lintas_tilang_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalu_lintas_tilang"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Teguran</td>
                                        <td class="data_load" id="pelanggaran_lalu_lintas_teguran_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalu_lintas_teguran"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">2. JENIS PELANGGARAN LALU LINTAS</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">A. Sepeda Motor</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun Helm SNI</td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_gunhelm_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_gunhelm"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melawan Arus</td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_lawan_arus_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_lawan_arus"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun HP Saat Berkendara</td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_gunhp_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_gunhp"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Pengaruh Alkohol</td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_pengaruh_alkohol_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_pengaruh_alkohol"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melebihi Batas Kecepatan</td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_batas_kecepatan_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_batas_kecepatan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Umur</td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_bawah_umur_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_bawah_umur"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Lain - Lain</td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_lain_lain_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_motor_lain_lain"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Mobil Dan Kendaraan Khusus</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melawan Arus</td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_lawan_arus_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_lawan_arus"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun HP Saat Berkendara</td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_gunhp_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_gunhp"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Pengaruh Alkohol</td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_pengaruh_alkohol_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_pengaruh_alkohol"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Melebihi Batas Kecepatan</td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_batas_kecepatan_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_batas_kecepatan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Berkendara Di Bawah Umur</td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_bawah_umur_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_bawah_umur"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Gun Safety Belt</td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_gunsafety_belt_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_gunsafety_belt"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Lain - Lain</td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_lain_lain_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_mobil_lain_lain"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">3. BARANG BUKTI YANG DISITA</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>SIM</td>
                                        <td class="data_load" id="pelanggaran_lalin_barang_bukti_sim_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_barang_bukti_sim"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>STNK</td>
                                        <td class="data_load" id="pelanggaran_lalin_barang_bukti_stnk_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_barang_bukti_stnk"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Kendaraan</td>
                                        <td class="data_load" id="pelanggaran_lalin_barang_bukti_kendaraan_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_barang_bukti_kendaraan"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">4. KENDARAAN YANG TERLIBAT PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>sepeda motor</td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_motor_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_motor"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>mobil penumpang</td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_mob_png_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_mob_png"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>mobil bus</td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_bus_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_bus"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>mobil barang</td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_mob_brg_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_mob_brg"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>kendaraan khusus</td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_khusus_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_terlibat_pelanggaran_khusus"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">5. PROFESI PELAKU PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>pegawai negeri sipil</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_pns_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_pns"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>karyawan / swasta</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_swasta_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_swasta"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>pelajar / mahasiswa</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_pelajar_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_pelajar"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>pengemudi (supir)</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_supir_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_supir"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>TNI</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_tni_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_tni"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>POLRI</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_polri_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_polri"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>lain - lain</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_lainnya_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_lainnya"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">6. USIA PELAKU PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>&lt; 15 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_15tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_15tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>16 - 20 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_1620tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_1620tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>21 - 25 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_2125tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_2125tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>26 - 30 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_2630tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_2630tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>31 - 35 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_3135tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_3135tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>36 - 40 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_3640tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_3640tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>41 - 45 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_4145tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_4145tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>46 - 50 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_4650tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_4650tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>51 - 55 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_5155tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_5155tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>56 - 60 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_5660tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_5660tahun"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>&gt; 60 Tahun</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_60tahun_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_60tahun"></td>
                                    </tr>

                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">7. SIM PELAKU PELANGGARAN</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_a_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_a"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A Umum</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_a_umum_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_a_umum"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_b1_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_b1"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1 Umum</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_b1umum_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_b1umum"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>BII</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_bii_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_bii"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B II Umum</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_bii_umum_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_bii_umum"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>C</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_c_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_c"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>D</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_d_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_d"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>SIM Internasional</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_sim_internasional_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_sim_internasional"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>Tanpa SIM</td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_tanpa_sim_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_profesi_pelaku_tanpa_sim"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">8. LOKASI PELANGGARAN LALU LINTAS</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan pemukiman</td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_pemukiman_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_pemukiman"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan perbelanjaan</td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_perbelanjaan_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_perbelanjaan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>perkantoran</td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_perkantoran_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_perkantoran"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan wisata</td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_wisata_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_wisata"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan industri</td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_industri_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_kawasan_industri"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Status Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>nasional</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_nasional_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_nasional"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>propinsi</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_propinsi_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_propinsi"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kab/kota</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_kabkota_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_kabkota"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>desa / lingkungan</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_desa_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_desa"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>arteri</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_arteri_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_arteri"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kolektor</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_kolektor_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_kolektor"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lokal</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_lokal_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_lokal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lingkungan</td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_lingkungan_prev"></td>
                                        <td class="data_load" id="pelanggaran_lalin_status_jalan_lingkungan"></td>
                                    </tr>
                                    <tr>
                                        <td class="titlletd" colspan="5" bgcolor="#fff">II. DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">9. KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_jumlah_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_jumlah_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_korban_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_korban_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_korban_lukaberat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_korban_lukaberat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_korban_lukaringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_korban_lukaringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kerugian materil</td>
                                        <td class="data_load" id="kecelakaan_lalin_kerugian_materil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kerugian_materil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">10. BARANG BUKTI YANG DISITA</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>SIM</td>
                                        <td class="data_load" id="kecelakaan_lalin_barbuk_sim_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_barbuk_sim"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>STNK</td>
                                        <td class="data_load" id="kecelakaan_lalin_barbuk_stnk_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_barbuk_stnk"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kendaraan</td>
                                        <td class="data_load" id="kecelakaan_lalin_barbuk_kendaraan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_barbuk_kendaraan"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">11. PROFESI KORBAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pegawai negeri sipil</td>
                                        <td class="data_load" id="kecelakaan_lalin_pns_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pns"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>karyawan / swasta</td>
                                        <td class="data_load" id="kecelakaan_lalin_swasta_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_swasta"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pelajar / mahasiswa</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelajar_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelajar"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengemudi</td>
                                        <td class="data_load" id="kecelakaan_lalin_pengemudi_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pengemudi"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>TNI</td>
                                        <td class="data_load" id="kecelakaan_lalin_tni_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tni"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>POLRI</td>
                                        <td class="data_load" id="kecelakaan_lalin_polri_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_polri"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lain - lain</td>
                                        <td class="data_load" id="kecelakaan_lalin_lain_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_lain"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">12. USIA KORBAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&lt; 15 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_15tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_15tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>16 - 20 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_1620tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_1620tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>21 - 25 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_2125tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_2125tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>26 - 30 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_2630tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_2630tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>31 - 35 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_3135tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_3135tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>36 - 40 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_3640tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_3640tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>41 - 45 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_4145tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_4145tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>46 - 50 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_4650tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_4650tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>51 - 55 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_5155tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_5155tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>56 - 60 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_5660tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_5660tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&gt; 60 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_60tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_60tahun"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">13. SIM KORBAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>A</td>
                                        <td class="data_load" id="kecelakaan_lalin_sima_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_sima"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>A Umum</td>
                                        <td class="data_load" id="kecelakaan_lalin_sima_umum_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_sima_umum"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>B1</td>
                                        <td class="data_load" id="kecelakaan_lalin_b1_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_b1"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>B1 Umum</td>
                                        <td class="data_load" id="kecelakaan_lalin_b1umum_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_b1umum"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>BII</td>
                                        <td class="data_load" id="kecelakaan_lalin_bii_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_bii"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>BII Umum</td>
                                        <td class="data_load" id="kecelakaan_lalin_bii_umum_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_bii_umum"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>C</td>
                                        <td class="data_load" id="kecelakaan_lalin_simc_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_simc"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>D</td>
                                        <td class="data_load" id="kecelakaan_lalin_simd_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_simd"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>SIM Internasional</td>
                                        <td class="data_load" id="kecelakaan_lalin_sim_internasional_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_sim_internasional"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Tanpa SIM</td>
                                        <td class="data_load" id="kecelakaan_lalin_tanpa_sim_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tanpa_sim"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">14. KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sepeda motor</td>
                                        <td class="data_load" id="kecelakaan_lalin_motor_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_motor"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mobil penumpang</td>
                                        <td class="data_load" id="kecelakaan_lalin_mobil_penumpang_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_mobil_penumpang"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mobil bus</td>
                                        <td class="data_load" id="kecelakaan_lalin_bus_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_bus"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mobil barang</td>
                                        <td class="data_load" id="kecelakaan_lalin_barang_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_barang"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Kendaraan Khusus</td>
                                        <td class="data_load" id="kecelakaan_lalin_kendaraankhusus_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kendaraankhusus"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kendaraan tidak bermotor</td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_bermotor_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_bermotor"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">15. JENIS KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tunggal / out of control</td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>depan-depan</td>
                                        <td class="data_load" id="kecelakaan_lalin_depan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_depan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>depan-belakang</td>
                                        <td class="data_load" id="kecelakaan_lalin_depan_belakang_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_depan_belakang"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>depan-samping</td>
                                        <td class="data_load" id="kecelakaan_lalin_depan_samping_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_depan_samping"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>beruntun</td>
                                        <td class="data_load" id="kecelakaan_lalin_beruntun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_beruntun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tabrak pejalan kaki</td>
                                        <td class="data_load" id="kecelakaan_lalin_pejalan_kaki_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pejalan_kaki"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tabrak lari</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tabrak hewan</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_hewan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_hewan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>samping-samping</td>
                                        <td class="data_load" id="kecelakaan_lalin_samping_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_samping"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lainnya</td>
                                        <td class="data_load" id="kecelakaan_lalin_lainnya_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_lainnya"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">16. PROFESI PELAKU KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pegawai negeri sipil</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_pns_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_pns"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>karyawan / swasta</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_swasta_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_swasta"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pelajar / mahasiswa</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_pelajar_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_pelajar"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengemudi</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_pengemudi_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_pengemudi"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>TNI</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_tni_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_tni"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>POLRI</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_polri_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_polri"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lain - lain</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_lain_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_lain"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">17. USIA PELAKU KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&lt; 15 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_15tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_15tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>16 - 20 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_1620tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_1620tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>21 - 25 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_2125tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_2125tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>26 - 30 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_2630tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_2630tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>31 - 35 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_3135tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_3135tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>36 - 40 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_3640tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_3640tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>41 - 45 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_4145tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_4145tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>46 - 50 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_4650tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_4650tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>51 - 55 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_5155tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_5155tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>56 - 60 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_5660tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_5660tahun"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>&gt; 60 Tahun</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_60tahun_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_60tahun"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">18. SIM PELAKU KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_a_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_a"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>A Umum</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_a_umum_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_a_umum"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_b1_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_b1"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B1 Umum</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_b1umum_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_b1umum"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>BII</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_bii_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_bii"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>B II Umum</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_bii_umum_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_bii_umum"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>C</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_c_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_c"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>D</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_d_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_d"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>SIM Internasional</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_sim_internasional_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_sim_internasional"></td>
                                    </tr>
                                    <tr class="evaluasi comreport">
                                        <td>Tanpa SIM</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_tanpa_sim_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelaku_sim_tanpa_sim"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">19. LOKASI KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">A. Berdasarkan Kawasan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan pemukiman</td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_pemukiman_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_pemukiman"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan perbelanjaan</td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_perbelanjaan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_perbelanjaan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>perkantoran</td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_perkantoran_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_perkantoran"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan wisata</td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_wisata_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_wisata"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kawasan industri</td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_industri_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_industri"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Lain - Lain</td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_lainlain_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_kawasan_lainlain"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Status Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>nasional</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_nasional_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_nasional"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>propinsi</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_propinsi_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_propinsi"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kab/kota</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_kabkota_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_kabkota"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>desa / lingkungan</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_desa_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_desa"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">C. Berdasarkan Fungsi Jalan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>arteri</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_arteri_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_arteri"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kolektor</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_kolektor_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_kolektor"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lokal</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_lokal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_lokal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lingkungan</td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_lingkungan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_status_jalan_lingkungan"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">20. FAKTOR PENYEBAB KECELAKAAN</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">A. MANUSIA</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_manusia_prev"></td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_manusia"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>ngantuk/lelah (PSL 283)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_ngantuk_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_ngantuk"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mabuk/pengaruh alkohol dan obat (PSL 283)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_mabuk_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_mabuk"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sakit (PSL 283)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_sakit_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_sakit"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>hand phone/alat elektronik lain (PSL 283)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_hp_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_hp"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>menerobos lampu merah(PSL 287 ay 2)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_lampu_merah_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_lampu_merah"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>melanggar batas kecepatan (PSL 287 ay 7)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_batas_cepat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_batas_cepat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak menjaga jarak</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_jaga_jarak_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_jaga_jarak"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>mendahului/berbelok/berpindah jalur (PSL 294)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_pindah_jalur_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_pindah_jalur"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>berpindah lajur ( PSL 295)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_pindah_lajur_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_pindah_lajur"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak memberikan lampu isyarat berhenti/berbelok/berubah arah</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_lampu_isyarat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_lampu_isyarat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak mengutamakan pejalan kaki (PSL 284 jo 106 ay 2)</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_pejalan_kaki_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_pejalan_kaki"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>lainnya</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_lainnya_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_lainnya"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">B. ALAM</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_alam_prev"></td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_alam"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">C. KELAIKAN KENDARAAN</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kendaraan_prev"></td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kendaraan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">D. JALAN (KONDISI JALAN)</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kondisi_jalan_prev"></td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_kondisi_jalan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td class="subtitle">E. PRASARANA JALAN</td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_prasarana_prev"></td>
                                        <td class="subtitle" id="kecelakaan_lalin_penyebab_prasarana"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>rambu</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_rambu_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_rambu"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>makna</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_makna_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_makna"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>apil</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_apil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_apil"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>Perlintasan KA Tanpa Palang Pintu</td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_palangpintu_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_penyebab_prasarana_palangpintu"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">21. WAKTU KEJADIAN KECELAKAAN LALU LINTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>00.00 - 03.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0003_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0003"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>03.00 - 06.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0306_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0306"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>06.00 - 09.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0609_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0609"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>09.00 - 12.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0912_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_0912"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>12.00 - 15.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_1215_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_1215"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>15.00 - 18.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_1518_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_1518"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>18.00 - 21.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_1821_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_1821"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>21.00 - 24.0</td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_2124_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_waktu_2124"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">22. KECELAKAAN LALU LINTAS MENONJOL</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_menonjol_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">23. KECELAKAAN LALU LINTAS TUNGGAL / OUT OF CONTROL</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tunggal_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">24. TABRAK PEJALAN KAKI</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_jalan_kaki_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">25. TABRAK LARI</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_lari_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">26. TABRAK SEPEDA MOTOR ( R2 )</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_motor_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">27. TABRAK RANMOR RODA EMPAT ( R4 )</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tabrak_roda4_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">28. TABRAK KENDARAAN TIDAK BERMOTOR (SEPEDA,BECAK DAYUNG, DELMAN, DOKAR DLL)</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_tidak_motor_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">29. KECELAKAAN DI PERLINTASAN KA</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>jumlah kejadian</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_kejadian_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_kejadian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>berpalang pintu</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_berpalang_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_berpalang"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tidak berpalang pintu</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_tidak_berpalang_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_tidak_berpalang"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka ringan</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_luka_ringan_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_luka_ringan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban luka berat</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_luka_berat_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_luka_berat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>korban meninggal dunia</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_meninggal_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_meninggal"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>materiil</td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_materiil_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_pelintasan_ka_materiil"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">30. KECELAKAAN TRANSPORTASI</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kecelakaan kereta api</td>
                                        <td class="data_load" id="kecelakaan_lalin_transportasi_ka_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_transportasi_ka"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kecelakaan laut/perairan</td>
                                        <td class="data_load" id="kecelakaan_lalin_transportasi_laut_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_transportasi_laut"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kecelakaan udara</td>
                                        <td class="data_load" id="kecelakaan_lalin_transportasi_udara_prev"></td>
                                        <td class="data_load" id="kecelakaan_lalin_transportasi_udara"></td>
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
                                        <td class="data_load" id="dikmas_lantas_penluh_cetak_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_cetak"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>melalui media elektronik</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_elektronik_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_elektronik"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tempat keramaian</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_keramaian_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_keramaian"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>tempat istirahat</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_istirahat_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_istirahat"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>daerah rawan laka &amp; langgar</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_langgar_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_langgar"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">B. Penyebaran / Pemasangan</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>spanduk</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_spanduk_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_spanduk"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>leaflet</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_leaflet_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_leaflet"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sticker</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_sticker_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_sticker"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>bilboard</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_bilboard_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_bilboard"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">C. Program Nasional Keamanan Lalu Lintas</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>polisi sahabat anak</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_polisi_anak_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_polisi_anak"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>cara aman sekolah</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_cara_aman_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_cara_aman"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>patroli keamanan sekolah</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_patroli_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_patroli"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pramuka saka bhayangkara krida lalu lintas</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_pramuka_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_pramuka"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtitle" colspan="5">D. Program Nasional Keselamatan Lalu Lintas</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>police goes to campus</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_police_campus_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_police_campus"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>safety riding &amp; driving</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_safety_riding_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_safety_riding"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>forum lalu lintas &amp; angkutan jalan</td>
                                        <td class="data_load" id="dikmas_lantas_forum_lalin_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_forum_lalin"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>kampanye keselamatan</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_kampanye_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_kampanye"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>sekolah mengemudi</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_mengemudi_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_mengemudi"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>taman lalu lintas</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_taman_lalin_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_taman_lalin"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>global road safety partnership action</td>
                                        <td class="data_load" id="dikmas_lantas_penluh_global_road_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_penluh_global_road"></td>
                                    </tr>
                                    <tr class="padd-title">
                                        <td colspan="5" bgcolor="#0E7096">32. DATA TERKAIT GIAT KEPOLISIAN GIAT LANTAS</td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengaturan</td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_pengaturan_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_pengaturan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>penjagaan</td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_penjagaan_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_penjagaan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>pengawalan</td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_pengawalan_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_pengawalan"></td>
                                    </tr>
                                    <tr class="evaluasi">
                                        <td>patroli</td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_patroli_prev"></td>
                                        <td class="data_load" id="dikmas_lantas_giatlantas_patroli"></td>
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