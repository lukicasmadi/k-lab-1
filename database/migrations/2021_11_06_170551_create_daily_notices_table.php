<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_prev_notices', function (Blueprint $table) {
            $table->id();
            $table->string('operation_id');
            $table->date('submited_date');

            $table->float("pelanggaran_sepeda_motor_kecepatan_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_helm_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_marka_menerus_menyalip_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melawan_arus_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melanggar_lampu_lalin_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melanggar_marka_berhenti_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_surat_surat_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_kelengkapan_kendaraan_p", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_lain_lain_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("pelanggaran_mobil_kecepatan_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_safety_belt_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_muatan_overload_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_marka_menerus_menyalip_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melawan_arus_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melanggar_lampu_lalin_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_mengemudi_tidak_wajar_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_syarat_teknis_layak_jalan_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_tidak_nyala_lampu_malam_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_berbelok_tanpa_isyarat_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_berbalapan_di_jalan_raya_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melanggar_marka_berhenti_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_tidak_patuh_perintah_petugas_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_surat_surat_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_kelengkapan_kendaraan_p", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_lain_lain_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p", 8, 0)->default(0);

            $table->float("barang_bukti_yg_disita_sim_p", 8, 0)->default(0);
            $table->float("barang_bukti_yg_disita_stnk_p", 8, 0)->default(0);
            $table->float("barang_bukti_yg_disita_kendaraan_p", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_mobil_bus_p", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_mobil_barang_p", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_pns_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_karyawan_swasta_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_pelajar_mahasiswa_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_pengemudi_supir_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_tni_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_polri_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_lain_lain_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_kurang_dari_15_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_16_20_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_21_25_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_26_30_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_31_35_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_36_40_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_41_45_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_46_50_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_51_55_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_56_60_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_diatas_60_tahun_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_a_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_a_umum_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b1_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b1_umum_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b2_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b2_umum_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_c_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_d_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_internasional_p", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_tanpa_sim_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_pemukiman_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_perbelanjaan_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_perkantoran_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_wisata_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_industri_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_nasional_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_propinsi_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_kab_kota_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_desa_lingkungan_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_arteri_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_kolektor_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_lokal_p", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_lingkungan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_kerugian_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_barang_bukti_yg_disita_sim_p", 8, 0)->default(0);
            $table->float("kecelakaan_barang_bukti_yg_disita_stnk_p", 8, 0)->default(0);
            $table->float("kecelakaan_barang_bukti_yg_disita_kendaraan_p", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_pns_p", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_karwayan_swasta_p", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_pengemudi_p", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_tni_p", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_polri_p", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_lain_lain_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_kurang_15_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_16_20_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_21_25_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_26_30_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_31_35_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_36_40_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_41_45_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_45_50_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_51_55_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_56_60_p", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_diatas_60_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_a_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_a_umum_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b1_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b1_umum_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b2_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b2_umum_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_c_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_d_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_internasional_p", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_tanpa_sim_p", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_mobil_bus_p", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_mobil_barang_p", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_tunggal_ooc_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_depan_depan_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_depan_belakang_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_depan_samping_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_beruntun_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_pejalan_kaki_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_tabrak_lari_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_tabrak_hewan_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_samping_samping_p", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_lainnya_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_pns_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_pengemudi_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_tni_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_polri_p", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_lain_lain_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_kurang_dari_15_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_16_20_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_21_25_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_26_30_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_31_35_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_36_40_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_41_45_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_46_50_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_51_55_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_56_60_tahun_p", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_diatas_60_tahun_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_a_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_a_umum_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b1_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b1_umum_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b2_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b2_umum_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_c_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_d_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_internasional_p", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_tanpa_sim_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_pemukiman_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_perbelanjaan_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_perkantoran_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_wisata_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_industri_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_lain_lain_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_nasional_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_propinsi_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_kab_kota_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_desa_lingkungan_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_arteri_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_kolektor_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_lokal_p", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_lingkungan_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_manusia_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_ngantuk_lelah_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_mabuk_obat_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_sakit_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_handphone_elektronik_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_menerobos_lampu_merah_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_berpindah_jalur_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_lainnya_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_alam_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_kelaikan_kendaraan_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_kondisi_jalan_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_prasarana_jalan_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_rambu_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_marka_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_apil_p", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_00_03_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_03_06_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_06_09_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_09_12_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_12_15_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_15_18_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_18_21_p", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_21_24_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_korban_meninggal_p", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_materiil_p", 8, 0)->default(0);
            $table->float("kecelakaan_transportasi_kereta_api_p", 8, 0)->default(0);
            $table->float("kecelakaan_transportasi_laut_perairan_p", 8, 0)->default(0);
            $table->float("kecelakaan_transportasi_udara_p", 8, 0)->default(0);
            $table->float("penlu_melalui_media_cetak_p", 8, 0)->default(0);
            $table->float("penlu_melalui_media_elektronik_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("penlu_melalui_media_sosial_p", 8, 0)->default(0);

            $table->float("penlu_melalui_tempat_keramaian_p", 8, 0)->default(0);
            $table->float("penlu_melalui_tempat_istirahat_p", 8, 0)->default(0);
            $table->float("penlu_melalui_daerah_rawan_laka_dan_langgar_p", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_spanduk_p", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_leaflet_p", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_sticker_p", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_bilboard_p", 8, 0)->default(0);
            $table->float("polisi_sahabat_anak_p", 8, 0)->default(0);
            $table->float("cara_aman_sekolah_p", 8, 0)->default(0);
            $table->float("patroli_keamanan_sekolah_p", 8, 0)->default(0);
            $table->float("pramuka_bhayangkara_krida_lalu_lintas_p", 8, 0)->default(0);
            $table->float("police_goes_to_campus_p", 8, 0)->default(0);
            $table->float("safety_riding_driving_p", 8, 0)->default(0);
            $table->float("forum_lalu_lintas_angkutan_umum_p", 8, 0)->default(0);
            $table->float("kampanye_keselamatan_p", 8, 0)->default(0);
            $table->float("sekolah_mengemudi_p", 8, 0)->default(0);
            $table->float("taman_lalu_lintas_p", 8, 0)->default(0);
            $table->float("global_road_safety_partnership_action_p", 8, 0)->default(0);
            $table->float("giat_lantas_pengaturan_p", 8, 0)->default(0);
            $table->float("giat_lantas_penjagaan_p", 8, 0)->default(0);
            $table->float("giat_lantas_pengawalan_p", 8, 0)->default(0);
            $table->float("giat_lantas_patroli_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_jumlah_bus_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_jumlah_penumpang_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_jumlah_bus_kedatangan_p", 8, 0)->default(0);
            $table->float("arus_mudik_jumlah_penumpang_kedatangan_p", 8, 0)->default(0);
            $table->float("arus_mudik_total_terminal_p", 8, 0)->default(0);
            $table->float("arus_mudik_total_bus_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_penumpang_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_total_bus_kedatangan_p", 8, 0)->default(0);
            $table->float("arus_mudik_penumpang_kedatangan_p", 8, 0)->default(0);
            $table->float("arus_mudik_kereta_api_total_stasiun_p", 8, 0)->default(0);
            $table->float("arus_mudik_kereta_api_total_penumpang_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_kereta_api_total_penumpang_kedatangan_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_total_pelabuhan_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_kendaraan_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_kendaraan_kedatangan_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_total_penumpang_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_total_penumpang_kedatangan_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_bandara_jumlah_penumpang_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_bandara_jumlah_penumpang_kedatangan_p", 8, 0)->default(0);
            $table->float("arus_mudik_total_bandara_p", 8, 0)->default(0);
            $table->float("arus_mudik_bandara_total_penumpang_keberangkatan_p", 8, 0)->default(0);
            $table->float("arus_mudik_bandara_total_penumpang_kedatangan_p", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("prokes_covid_teguran_gar_prokes_p", 8, 0)->default(0);
            $table->float("prokes_covid_pembagian_masker_p", 8, 0)->default(0);
            $table->float("prokes_covid_sosialisasi_tentang_prokes_p", 8, 0)->default(0);
            $table->float("prokes_covid_giat_baksos_p", 8, 0)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_prev_notices');
    }
}
