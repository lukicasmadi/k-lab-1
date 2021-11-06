<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyNoticeCurrentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_current_notices', function (Blueprint $table) {
            $table->id();
            $table->string('operation_id');
            $table->date('submited_date');

            $table->float("pelanggaran_sepeda_motor_kecepatan", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_helm", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_bonceng_lebih_dari_satu", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_marka_menerus_menyalip", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melawan_arus", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melanggar_lampu_lalin", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_mengemudikan_tidak_wajar", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_syarat_teknis_layak_jalan", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_berbelok_tanpa_isyarat", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_berbalapan_di_jalan_raya", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_melanggar_marka_berhenti", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_surat_surat", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_kelengkapan_kendaraan", 8, 0)->default(0);
            $table->float("pelanggaran_sepeda_motor_lain_lain", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("pelanggaran_mobil_kecepatan", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_safety_belt", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_muatan_overload", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_marka_menerus_menyalip", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melawan_arus", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melanggar_lampu_lalin", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_mengemudi_tidak_wajar", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_syarat_teknis_layak_jalan", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_tidak_nyala_lampu_malam", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_berbelok_tanpa_isyarat", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_berbalapan_di_jalan_raya", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_melanggar_marka_berhenti", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_tidak_patuh_perintah_petugas", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_surat_surat", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_kelengkapan_kendaraan", 8, 0)->default(0);
            $table->float("pelanggaran_mobil_lain_lain", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat", 8, 0)->default(0);

            $table->float("barang_bukti_yg_disita_sim", 8, 0)->default(0);
            $table->float("barang_bukti_yg_disita_stnk", 8, 0)->default(0);
            $table->float("barang_bukti_yg_disita_kendaraan", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_sepeda_motor", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_mobil_penumpang", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_mobil_bus", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_mobil_barang", 8, 0)->default(0);
            $table->float("kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_pns", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_karyawan_swasta", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_pelajar_mahasiswa", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_pengemudi_supir", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_tni", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_polri", 8, 0)->default(0);
            $table->float("profesi_pelaku_pelanggaran_lain_lain", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_kurang_dari_15_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_16_20_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_21_25_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_26_30_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_31_35_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_36_40_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_41_45_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_46_50_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_51_55_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_56_60_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_pelanggaran_diatas_60_tahun", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_a", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_a_umum", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b1", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b1_umum", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b2", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_b2_umum", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_c", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_d", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_sim_internasional", 8, 0)->default(0);
            $table->float("sim_pelaku_pelanggaran_tanpa_sim", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_pemukiman", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_perbelanjaan", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_perkantoran", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_wisata", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_industri", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_nasional", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_propinsi", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_kab_kota", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_status_jalan_desa_lingkungan", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_arteri", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_kolektor", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_lokal", 8, 0)->default(0);
            $table->float("lokasi_pelanggaran_fungsi_jalan_lingkungan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_jumlah_kerugian_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_barang_bukti_yg_disita_sim", 8, 0)->default(0);
            $table->float("kecelakaan_barang_bukti_yg_disita_stnk", 8, 0)->default(0);
            $table->float("kecelakaan_barang_bukti_yg_disita_kendaraan", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_pns", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_karwayan_swasta", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_pelajar_mahasiswa", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_pengemudi", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_tni", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_polri", 8, 0)->default(0);
            $table->float("profesi_korban_kecelakaan_lalin_lain_lain", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_kurang_15", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_16_20", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_21_25", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_26_30", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_31_35", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_36_40", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_41_45", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_45_50", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_51_55", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_56_60", 8, 0)->default(0);
            $table->float("usia_korban_kecelakaan_diatas_60", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_a", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_a_umum", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b1", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b1_umum", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b2", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_b2_umum", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_c", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_d", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_sim_internasional", 8, 0)->default(0);
            $table->float("sim_korban_kecelakaan_tanpa_sim", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_sepeda_motor", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_mobil_penumpang", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_mobil_bus", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_mobil_barang", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus", 8, 0)->default(0);
            $table->float("kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_tunggal_ooc", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_depan_depan", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_depan_belakang", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_depan_samping", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_beruntun", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_pejalan_kaki", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_tabrak_lari", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_tabrak_hewan", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_samping_samping", 8, 0)->default(0);
            $table->float("jenis_kecelakaan_lainnya", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_pns", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_karyawan_swasta", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_pengemudi", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_tni", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_polri", 8, 0)->default(0);
            $table->float("profesi_pelaku_kecelakaan_lalin_lain_lain", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_kurang_dari_15_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_16_20_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_21_25_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_26_30_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_31_35_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_36_40_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_41_45_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_46_50_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_51_55_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_56_60_tahun", 8, 0)->default(0);
            $table->float("usia_pelaku_kecelakaan_diatas_60_tahun", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_a", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_a_umum", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b1", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b1_umum", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b2", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_b2_umum", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_c", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_d", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_sim_internasional", 8, 0)->default(0);
            $table->float("sim_pelaku_kecelakaan_tanpa_sim", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_pemukiman", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_perbelanjaan", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_perkantoran", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_wisata", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_industri", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_lalin_lain_lain", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_nasional", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_propinsi", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_kab_kota", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_status_jalan_desa_lingkungan", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_arteri", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_kolektor", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_lokal", 8, 0)->default(0);
            $table->float("lokasi_kecelakaan_fungsi_jalan_lingkungan", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_manusia", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_ngantuk_lelah", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_mabuk_obat", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_sakit", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_handphone_elektronik", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_menerobos_lampu_merah", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_melanggar_batas_kecepatan", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_tidak_menjaga_jarak", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_berpindah_jalur", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_lainnya", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_alam", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_kelaikan_kendaraan", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_kondisi_jalan", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_prasarana_jalan", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_rambu", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_marka", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_apil", 8, 0)->default(0);
            $table->float("faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_00_03", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_03_06", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_06_09", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_09_12", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_12_15", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_15_18", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_18_21", 8, 0)->default(0);
            $table->float("waktu_kejadian_kecelakaan_21_24", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_menonjol_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tunggal_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_pejalan_kaki_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_lari_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_sepeda_motor_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_roda_empat_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_tabrak_tidak_bermotor_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_jumlah_kejadian", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_berpalang_pintu", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_korban_luka_ringan", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_korban_luka_berat", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_korban_meninggal", 8, 0)->default(0);
            $table->float("kecelakaan_lalin_perlintasan_ka_materiil", 8, 0)->default(0);
            $table->float("kecelakaan_transportasi_kereta_api", 8, 0)->default(0);
            $table->float("kecelakaan_transportasi_laut_perairan", 8, 0)->default(0);
            $table->float("kecelakaan_transportasi_udara", 8, 0)->default(0);
            $table->float("penlu_melalui_media_cetak", 8, 0)->default(0);
            $table->float("penlu_melalui_media_elektronik", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("penlu_melalui_media_sosial", 8, 0)->default(0);

            $table->float("penlu_melalui_tempat_keramaian", 8, 0)->default(0);
            $table->float("penlu_melalui_tempat_istirahat", 8, 0)->default(0);
            $table->float("penlu_melalui_daerah_rawan_laka_dan_langgar", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_spanduk", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_leaflet", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_sticker", 8, 0)->default(0);
            $table->float("penyebaran_pemasangan_bilboard", 8, 0)->default(0);
            $table->float("polisi_sahabat_anak", 8, 0)->default(0);
            $table->float("cara_aman_sekolah", 8, 0)->default(0);
            $table->float("patroli_keamanan_sekolah", 8, 0)->default(0);
            $table->float("pramuka_bhayangkara_krida_lalu_lintas", 8, 0)->default(0);
            $table->float("police_goes_to_campus", 8, 0)->default(0);
            $table->float("safety_riding_driving", 8, 0)->default(0);
            $table->float("forum_lalu_lintas_angkutan_umum", 8, 0)->default(0);
            $table->float("kampanye_keselamatan", 8, 0)->default(0);
            $table->float("sekolah_mengemudi", 8, 0)->default(0);
            $table->float("taman_lalu_lintas", 8, 0)->default(0);
            $table->float("global_road_safety_partnership_action", 8, 0)->default(0);
            $table->float("giat_lantas_pengaturan", 8, 0)->default(0);
            $table->float("giat_lantas_penjagaan", 8, 0)->default(0);
            $table->float("giat_lantas_pengawalan", 8, 0)->default(0);
            $table->float("giat_lantas_patroli", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_jumlah_bus_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_jumlah_penumpang_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_jumlah_bus_kedatangan", 8, 0)->default(0);
            $table->float("arus_mudik_jumlah_penumpang_kedatangan", 8, 0)->default(0);
            $table->float("arus_mudik_total_terminal", 8, 0)->default(0);
            $table->float("arus_mudik_total_bus_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_penumpang_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_total_bus_kedatangan", 8, 0)->default(0);
            $table->float("arus_mudik_penumpang_kedatangan", 8, 0)->default(0);
            $table->float("arus_mudik_kereta_api_total_stasiun", 8, 0)->default(0);
            $table->float("arus_mudik_kereta_api_total_penumpang_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_kereta_api_total_penumpang_kedatangan", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_jumlah_penumpang_kedatangan", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_total_pelabuhan", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_kendaraan_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_kendaraan_kedatangan", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_total_penumpang_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_pelabuhan_total_penumpang_kedatangan", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("arus_mudik_bandara_jumlah_penumpang_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_bandara_jumlah_penumpang_kedatangan", 8, 0)->default(0);
            $table->float("arus_mudik_total_bandara", 8, 0)->default(0);
            $table->float("arus_mudik_bandara_total_penumpang_keberangkatan", 8, 0)->default(0);
            $table->float("arus_mudik_bandara_total_penumpang_kedatangan", 8, 0)->default(0);

            //TAMBAHAN
            $table->float("prokes_covid_teguran_gar_prokes", 8, 0)->default(0);
            $table->float("prokes_covid_pembagian_masker", 8, 0)->default(0);
            $table->float("prokes_covid_sosialisasi_tentang_prokes", 8, 0)->default(0);
            $table->float("prokes_covid_giat_baksos", 8, 0)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_current_notices');
    }
}
