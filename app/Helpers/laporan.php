<?php

use Carbon\Carbon;
use App\Models\DailyInput;
use App\Models\DailyInputPrev;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//================================================================================================================

if (! function_exists('reportPrevToDisplayAnevDateCompare')) {
    function reportPrevToDisplayAnevDateCompare($rencana_operation_id, $start_date, $end_date) {
        $outputLaporanPrev = DailyInputPrev::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
            sum(cara_aman_sekolah_p) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus_p) as police_goes_to_campus,
            sum(safety_riding_driving_p) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan_p) as kampanye_keselamatan,
            sum(sekolah_mengemudi_p) as sekolah_mengemudi,
            sum(taman_lalu_lintas_p) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli_p) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
            sum(penyekatan_motor_p) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
        ->where('rencana_operasi_id', $rencana_operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanPrev;
    }
}

if (! function_exists('reportCurrentToDisplayAnevDateCompare')) {
    function reportCurrentToDisplayAnevDateCompare($rencana_operation_id, $start_date, $end_date) {
        $outputLaporanCurrent = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->where('rencana_operasi_id', $rencana_operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanCurrent;
    }
}

//================================================================================================================

if (! function_exists('reportPrevToDisplayByPoldaId')) {
    function reportPrevToDisplayByPoldaId($year, $rencana_operation_id, $start_date, $end_date, $poldaId) {
        $outputLaporanPrev = DailyInputPrev::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
            sum(cara_aman_sekolah_p) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus_p) as police_goes_to_campus,
            sum(safety_riding_driving_p) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan_p) as kampanye_keselamatan,
            sum(sekolah_mengemudi_p) as sekolah_mengemudi,
            sum(taman_lalu_lintas_p) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli_p) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
            sum(penyekatan_motor_p) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
        ->where('year', $year)
        ->when($poldaId != 'polda_all', function ($query) use ($poldaId) {
            return $query->where('polda_id', $poldaId);
        })
        ->where('rencana_operasi_id', $rencana_operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanPrev;
    }
}

if (! function_exists('reportCurrentToDisplayByPoldaId')) {
    function reportCurrentToDisplayByPoldaId($year, $rencana_operation_id, $start_date, $end_date, $poldaId) {
        $outputLaporanCurrent = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->where('year', $year)
        ->when($poldaId != 'polda_all', function ($query) use ($poldaId) {
            return $query->where('polda_id', $poldaId);
        })
        ->where('rencana_operasi_id', $rencana_operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanCurrent;
    }
}

//================================================================================================================

if (! function_exists('reportPrevToDisplay')) {
    function reportPrevToDisplay($year, $rencana_operation_id, $start_date, $end_date) {
        $outputLaporanPrev = DailyInputPrev::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
            sum(cara_aman_sekolah_p) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus_p) as police_goes_to_campus,
            sum(safety_riding_driving_p) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan_p) as kampanye_keselamatan,
            sum(sekolah_mengemudi_p) as sekolah_mengemudi,
            sum(taman_lalu_lintas_p) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli_p) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
            sum(penyekatan_motor_p) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
        ->where('year', $year)
        ->where('rencana_operasi_id', $rencana_operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanPrev;
    }
}

if (! function_exists('reportCurrentToDisplay')) {
    function reportCurrentToDisplay($year, $rencana_operation_id, $start_date, $end_date) {
        $outputLaporanCurrent = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->where('year', $year)
        ->where('rencana_operasi_id', $rencana_operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanCurrent;
    }
}

//================================================================================================================

if (! function_exists('reportDailyPrev')) {
    function reportDailyPrev($polda, $year, $rencana_operation_id, $config_date, $start_date, $end_date) {

        $check = DailyInputPrev::where('rencana_operasi_id', $rencana_operation_id)->where('year', $year)->where('polda_id', $polda)->first();

        if(empty($check)) {
            $secondCheck = DailyInput::where('rencana_operasi_id', $rencana_operation_id)->where('year', $year)->where('polda_id', $polda)->first();

            if(empty($secondCheck)) {
                $outputLaporanPrev = DailyInputPrev::selectRaw('
                    sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
                    sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
                    sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
                    sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
                    sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
                    sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
                    sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
                    sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
                    sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
                    sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
                    sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
                    sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
                    sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
                    sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
                    sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
                    sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
                    sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
                    sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
                    sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
                    sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
                    sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
                    sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
                    sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
                    sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
                    sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
                    sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
                    sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
                    sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
                    sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
                    sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
                    sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
                    sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
                    sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
                    sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
                    sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
                    sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
                    sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                    sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                    sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
                    sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
                    sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                    sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
                    sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
                    sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
                    sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
                    sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                    sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
                    sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
                    sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
                    sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
                    sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
                    sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
                    sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
                    sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
                    sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
                    sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
                    sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
                    sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
                    sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
                    sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
                    sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
                    sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
                    sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
                    sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
                    sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
                    sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
                    sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
                    sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
                    sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
                    sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
                    sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
                    sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
                    sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
                    sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
                    sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                    sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
                    sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                    sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
                    sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                    sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
                    sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
                    sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
                    sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                    sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
                    sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
                    sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
                    sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                    sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
                    sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                    sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                    sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
                    sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
                    sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
                    sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
                    sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
                    sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
                    sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
                    sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
                    sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
                    sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
                    sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
                    sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
                    sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
                    sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
                    sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
                    sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
                    sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
                    sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
                    sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
                    sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
                    sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
                    sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
                    sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
                    sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
                    sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
                    sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                    sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
                    sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
                    sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
                    sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
                    sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
                    sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
                    sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
                    sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
                    sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
                    sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
                    sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
                    sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                    sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                    sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                    sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
                    sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
                    sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                    sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                    sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
                    sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
                    sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
                    sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
                    sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
                    sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
                    sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
                    sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
                    sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
                    sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
                    sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
                    sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
                    sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
                    sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
                    sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
                    sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
                    sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
                    sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
                    sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
                    sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
                    sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
                    sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
                    sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
                    sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
                    sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
                    sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
                    sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
                    sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
                    sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
                    sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                    sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
                    sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                    sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
                    sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                    sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
                    sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                    sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
                    sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
                    sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
                    sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                    sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                    sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                    sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                    sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
                    sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                    sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                    sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
                    sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
                    sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                    sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
                    sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
                    sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
                    sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
                    sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
                    sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                    sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
                    sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
                    sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
                    sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
                    sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
                    sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
                    sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
                    sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
                    sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                    sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
                    sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
                    sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                    sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
                    sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                    sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
                    sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
                    sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                    sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                    sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                    sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                    sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                    sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                    sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
                    sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
                    sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
                    sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
                    sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
                    sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
                    sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
                    sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
                    sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
                    sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                    sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
                    sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
                    sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
                    sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
                    sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
                    sum(cara_aman_sekolah_p) as cara_aman_sekolah,
                    sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
                    sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
                    sum(police_goes_to_campus_p) as police_goes_to_campus,
                    sum(safety_riding_driving_p) as safety_riding_driving,
                    sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
                    sum(kampanye_keselamatan_p) as kampanye_keselamatan,
                    sum(sekolah_mengemudi_p) as sekolah_mengemudi,
                    sum(taman_lalu_lintas_p) as taman_lalu_lintas,
                    sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
                    sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
                    sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
                    sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
                    sum(giat_lantas_patroli_p) as giat_lantas_patroli,
                    sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
                    sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
                    sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
                    sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
                    sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
                    sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
                    sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
                    sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
                    sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
                    sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
                    sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
                    sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
                    sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
                    sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
                    sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
                    sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
                    sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
                    sum(penyekatan_motor_p) as penyekatan_motor,
                    sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
                    sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
                    sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
                    sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
                ->when($polda != 'polda_all', function ($query) use ($polda) {
                    return $query->where('polda_id', $polda);
                })
                ->where('year', $year)
                ->where('rencana_operasi_id', $rencana_operation_id)
                ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
                ->first();

                return $outputLaporanPrev;
            } else {
                $outputLaporanCurrent = DailyInput::selectRaw('
                    sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
                    sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
                    sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
                    sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
                    sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
                    sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
                    sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
                    sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
                    sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
                    sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
                    sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
                    sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
                    sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
                    sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
                    sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
                    sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
                    sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
                    sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
                    sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
                    sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
                    sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
                    sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
                    sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
                    sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
                    sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
                    sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
                    sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
                    sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
                    sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
                    sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
                    sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
                    sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
                    sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
                    sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
                    sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
                    sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
                    sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                    sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                    sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
                    sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
                    sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                    sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
                    sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
                    sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
                    sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
                    sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                    sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
                    sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
                    sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
                    sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
                    sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
                    sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
                    sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
                    sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
                    sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
                    sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
                    sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
                    sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
                    sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
                    sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
                    sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
                    sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
                    sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
                    sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
                    sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
                    sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
                    sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
                    sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
                    sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
                    sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
                    sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
                    sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
                    sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
                    sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
                    sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                    sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
                    sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                    sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
                    sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                    sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
                    sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
                    sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
                    sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                    sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
                    sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
                    sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
                    sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                    sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
                    sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                    sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                    sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
                    sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
                    sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
                    sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
                    sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
                    sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
                    sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
                    sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
                    sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
                    sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
                    sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
                    sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
                    sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
                    sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
                    sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
                    sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
                    sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
                    sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
                    sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
                    sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
                    sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
                    sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
                    sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
                    sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
                    sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
                    sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                    sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
                    sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
                    sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
                    sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
                    sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
                    sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
                    sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
                    sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
                    sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
                    sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
                    sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
                    sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                    sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                    sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                    sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
                    sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
                    sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                    sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                    sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
                    sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
                    sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
                    sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
                    sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
                    sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
                    sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
                    sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
                    sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
                    sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
                    sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
                    sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
                    sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
                    sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
                    sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
                    sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
                    sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
                    sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
                    sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
                    sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
                    sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
                    sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
                    sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
                    sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
                    sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
                    sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
                    sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
                    sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
                    sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
                    sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                    sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
                    sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                    sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
                    sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                    sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
                    sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                    sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
                    sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
                    sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
                    sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                    sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                    sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                    sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                    sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
                    sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                    sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                    sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
                    sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
                    sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                    sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
                    sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
                    sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
                    sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
                    sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
                    sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                    sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
                    sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
                    sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
                    sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
                    sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
                    sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
                    sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
                    sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
                    sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                    sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
                    sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
                    sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                    sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
                    sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                    sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
                    sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
                    sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                    sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                    sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                    sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                    sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                    sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                    sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
                    sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
                    sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
                    sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
                    sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
                    sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
                    sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
                    sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
                    sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
                    sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                    sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
                    sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
                    sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
                    sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
                    sum(polisi_sahabat_anak) as polisi_sahabat_anak,
                    sum(cara_aman_sekolah) as cara_aman_sekolah,
                    sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
                    sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
                    sum(police_goes_to_campus) as police_goes_to_campus,
                    sum(safety_riding_driving) as safety_riding_driving,
                    sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
                    sum(kampanye_keselamatan) as kampanye_keselamatan,
                    sum(sekolah_mengemudi) as sekolah_mengemudi,
                    sum(taman_lalu_lintas) as taman_lalu_lintas,
                    sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
                    sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
                    sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
                    sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
                    sum(giat_lantas_patroli) as giat_lantas_patroli,
                    sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
                    sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
                    sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
                    sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
                    sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
                    sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
                    sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
                    sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
                    sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
                    sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
                    sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
                    sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
                    sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
                    sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
                    sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
                    sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
                    sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
                    sum(penyekatan_motor) as penyekatan_motor,
                    sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
                    sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
                    sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
                    sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
                ->when($polda != 'polda_all', function ($query) use ($polda) {
                    return $query->where('polda_id', $polda);
                })
                ->where('year', $year)
                ->where('rencana_operasi_id', $rencana_operation_id)
                ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
                ->first();

                return $outputLaporanCurrent;
            }
        } else {
            $outputLaporanPrev = DailyInputPrev::selectRaw('
                sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
                sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
                sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
                sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
                sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
                sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
                sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
                sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
                sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
                sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
                sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
                sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
                sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
                sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
                sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
                sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
                sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
                sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
                sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
                sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
                sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
                sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
                sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
                sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
                sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
                sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
                sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
                sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
                sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
                sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
                sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
                sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
                sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
                sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
                sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
                sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
                sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
                sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
                sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
                sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
                sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
                sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
                sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
                sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
                sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
                sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
                sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
                sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
                sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
                sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
                sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
                sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
                sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
                sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
                sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
                sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
                sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
                sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
                sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
                sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
                sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
                sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
                sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
                sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
                sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
                sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
                sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
                sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
                sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
                sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
                sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
                sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
                sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
                sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
                sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
                sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
                sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
                sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
                sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
                sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
                sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
                sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
                sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
                sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
                sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
                sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
                sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
                sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
                sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
                sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
                sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
                sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
                sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
                sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
                sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
                sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
                sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
                sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
                sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
                sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
                sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
                sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
                sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
                sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
                sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
                sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
                sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
                sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
                sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
                sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
                sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
                sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
                sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
                sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
                sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
                sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
                sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
                sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
                sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
                sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
                sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
                sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
                sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
                sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
                sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
                sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
                sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
                sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
                sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
                sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
                sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
                sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
                sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
                sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
                sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
                sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
                sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
                sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
                sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
                sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
                sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
                sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
                sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
                sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
                sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
                sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
                sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
                sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
                sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
                sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
                sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
                sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
                sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
                sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
                sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
                sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
                sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
                sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
                sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
                sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
                sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
                sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
                sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
                sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
                sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
                sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
                sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
                sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
                sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
                sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
                sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
                sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
                sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
                sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
                sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
                sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
                sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
                sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
                sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
                sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
                sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
                sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
                sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
                sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
                sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
                sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
                sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
                sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
                sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
                sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
                sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
                sum(cara_aman_sekolah_p) as cara_aman_sekolah,
                sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
                sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
                sum(police_goes_to_campus_p) as police_goes_to_campus,
                sum(safety_riding_driving_p) as safety_riding_driving,
                sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
                sum(kampanye_keselamatan_p) as kampanye_keselamatan,
                sum(sekolah_mengemudi_p) as sekolah_mengemudi,
                sum(taman_lalu_lintas_p) as taman_lalu_lintas,
                sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
                sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
                sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
                sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
                sum(giat_lantas_patroli_p) as giat_lantas_patroli,
                sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
                sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
                sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
                sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
                sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
                sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
                sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
                sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
                sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
                sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
                sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
                sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
                sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
                sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
                sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
                sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
                sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
                sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
                sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
                sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
                sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
                sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
                sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
                sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
                sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
                sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
                sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
                sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
                sum(penyekatan_motor_p) as penyekatan_motor,
                sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
                sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
                sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
                sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
            ->when($polda != 'polda_all', function ($query) use ($polda) {
                return $query->where('polda_id', $polda);
            })
            ->where('year', $year)
            ->where('rencana_operasi_id', $rencana_operation_id)
            ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
            ->first();

            return $outputLaporanPrev;
        }
    }
}

if (! function_exists('reportDailyCurrent')) {
    function reportDailyCurrent($polda, $year, $rencana_operation_id, $config_date, $start_date, $end_date) {

        $check = DailyInput::where('rencana_operasi_id', $rencana_operation_id)->where('year', $year)->where('polda_id', $polda)->first();

        if(empty($check)) {
            $secondCheck = DailyInputPrev::where('rencana_operasi_id', $rencana_operation_id)->where('year', $year)->where('polda_id', $polda)->first();

            if(empty($secondCheck)) {
                $outputLaporanCurrent = DailyInput::selectRaw('
                    sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
                    sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
                    sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
                    sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
                    sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
                    sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
                    sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
                    sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
                    sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
                    sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
                    sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
                    sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
                    sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
                    sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
                    sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
                    sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
                    sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
                    sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
                    sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
                    sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
                    sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
                    sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
                    sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
                    sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
                    sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
                    sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
                    sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
                    sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
                    sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
                    sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
                    sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
                    sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
                    sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
                    sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
                    sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
                    sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
                    sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                    sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                    sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
                    sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
                    sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                    sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
                    sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
                    sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
                    sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
                    sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                    sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
                    sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
                    sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
                    sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
                    sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
                    sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
                    sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
                    sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
                    sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
                    sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
                    sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
                    sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
                    sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
                    sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
                    sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
                    sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
                    sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
                    sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
                    sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
                    sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
                    sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
                    sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
                    sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
                    sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
                    sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
                    sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
                    sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
                    sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
                    sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                    sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
                    sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                    sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
                    sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                    sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
                    sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
                    sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
                    sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                    sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
                    sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
                    sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
                    sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                    sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
                    sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                    sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                    sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
                    sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
                    sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
                    sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
                    sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
                    sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
                    sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
                    sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
                    sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
                    sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
                    sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
                    sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
                    sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
                    sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
                    sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
                    sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
                    sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
                    sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
                    sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
                    sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
                    sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
                    sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
                    sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
                    sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
                    sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
                    sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                    sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
                    sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
                    sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
                    sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
                    sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
                    sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
                    sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
                    sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
                    sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
                    sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
                    sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
                    sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                    sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                    sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                    sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
                    sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
                    sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                    sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                    sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
                    sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
                    sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
                    sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
                    sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
                    sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
                    sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
                    sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
                    sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
                    sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
                    sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
                    sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
                    sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
                    sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
                    sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
                    sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
                    sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
                    sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
                    sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
                    sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
                    sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
                    sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
                    sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
                    sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
                    sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
                    sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
                    sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
                    sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
                    sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
                    sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                    sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
                    sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                    sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
                    sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                    sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
                    sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                    sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
                    sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
                    sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
                    sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                    sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                    sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                    sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                    sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
                    sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                    sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                    sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
                    sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
                    sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                    sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
                    sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
                    sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
                    sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
                    sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
                    sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                    sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
                    sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
                    sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
                    sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
                    sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
                    sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
                    sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
                    sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
                    sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                    sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
                    sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
                    sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                    sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
                    sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                    sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
                    sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
                    sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                    sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                    sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                    sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                    sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                    sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                    sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
                    sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
                    sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
                    sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
                    sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
                    sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
                    sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
                    sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
                    sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
                    sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                    sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
                    sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
                    sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
                    sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
                    sum(polisi_sahabat_anak) as polisi_sahabat_anak,
                    sum(cara_aman_sekolah) as cara_aman_sekolah,
                    sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
                    sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
                    sum(police_goes_to_campus) as police_goes_to_campus,
                    sum(safety_riding_driving) as safety_riding_driving,
                    sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
                    sum(kampanye_keselamatan) as kampanye_keselamatan,
                    sum(sekolah_mengemudi) as sekolah_mengemudi,
                    sum(taman_lalu_lintas) as taman_lalu_lintas,
                    sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
                    sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
                    sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
                    sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
                    sum(giat_lantas_patroli) as giat_lantas_patroli,
                    sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
                    sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
                    sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
                    sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
                    sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
                    sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
                    sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
                    sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
                    sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
                    sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
                    sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
                    sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
                    sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
                    sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
                    sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
                    sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
                    sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
                    sum(penyekatan_motor) as penyekatan_motor,
                    sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
                    sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
                    sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
                    sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
                ->when($polda != 'polda_all', function ($query) use ($polda) {
                    return $query->where('polda_id', $polda);
                })
                ->where('year', $year)
                ->where('rencana_operasi_id', $rencana_operation_id)
                ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
                ->first();
                return $outputLaporanCurrent;
            } else {
                $outputLaporanPrev = DailyInputPrev::selectRaw('
                    sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
                    sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
                    sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
                    sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
                    sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
                    sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
                    sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
                    sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
                    sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
                    sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
                    sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
                    sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
                    sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
                    sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
                    sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
                    sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
                    sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
                    sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
                    sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
                    sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
                    sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
                    sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
                    sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
                    sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
                    sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
                    sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
                    sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
                    sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
                    sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
                    sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
                    sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
                    sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
                    sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
                    sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
                    sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
                    sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
                    sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
                    sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
                    sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                    sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                    sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
                    sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
                    sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                    sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
                    sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
                    sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
                    sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
                    sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                    sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
                    sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
                    sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
                    sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
                    sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
                    sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
                    sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
                    sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
                    sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
                    sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
                    sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
                    sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
                    sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
                    sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
                    sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
                    sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
                    sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
                    sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
                    sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
                    sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
                    sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
                    sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
                    sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
                    sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
                    sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
                    sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
                    sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
                    sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
                    sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                    sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
                    sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                    sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
                    sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                    sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
                    sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
                    sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
                    sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                    sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
                    sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
                    sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
                    sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                    sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
                    sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                    sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                    sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
                    sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
                    sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
                    sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
                    sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
                    sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
                    sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
                    sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
                    sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
                    sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
                    sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
                    sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
                    sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
                    sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
                    sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
                    sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
                    sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
                    sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
                    sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
                    sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
                    sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
                    sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
                    sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
                    sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
                    sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
                    sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                    sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
                    sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
                    sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
                    sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
                    sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
                    sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
                    sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
                    sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
                    sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
                    sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
                    sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
                    sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                    sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                    sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                    sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
                    sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
                    sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                    sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                    sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
                    sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
                    sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
                    sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
                    sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
                    sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
                    sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
                    sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
                    sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
                    sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
                    sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
                    sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
                    sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
                    sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
                    sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
                    sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
                    sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
                    sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
                    sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
                    sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
                    sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
                    sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
                    sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
                    sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
                    sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
                    sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
                    sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
                    sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
                    sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
                    sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                    sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
                    sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                    sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
                    sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                    sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
                    sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                    sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
                    sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
                    sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
                    sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                    sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                    sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                    sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                    sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
                    sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                    sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                    sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
                    sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
                    sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                    sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
                    sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
                    sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
                    sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
                    sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
                    sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                    sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
                    sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
                    sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
                    sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
                    sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
                    sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
                    sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
                    sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
                    sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                    sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
                    sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
                    sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                    sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
                    sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                    sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
                    sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
                    sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                    sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                    sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                    sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                    sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                    sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                    sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
                    sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
                    sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
                    sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
                    sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
                    sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
                    sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
                    sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
                    sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
                    sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                    sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
                    sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
                    sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
                    sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
                    sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
                    sum(cara_aman_sekolah_p) as cara_aman_sekolah,
                    sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
                    sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
                    sum(police_goes_to_campus_p) as police_goes_to_campus,
                    sum(safety_riding_driving_p) as safety_riding_driving,
                    sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
                    sum(kampanye_keselamatan_p) as kampanye_keselamatan,
                    sum(sekolah_mengemudi_p) as sekolah_mengemudi,
                    sum(taman_lalu_lintas_p) as taman_lalu_lintas,
                    sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
                    sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
                    sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
                    sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
                    sum(giat_lantas_patroli_p) as giat_lantas_patroli,
                    sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
                    sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
                    sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
                    sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
                    sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
                    sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
                    sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
                    sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
                    sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
                    sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
                    sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
                    sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
                    sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
                    sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
                    sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
                    sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
                    sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
                    sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
                    sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
                    sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
                    sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
                    sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
                    sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
                    sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
                    sum(penyekatan_motor_p) as penyekatan_motor,
                    sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
                    sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
                    sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
                    sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
                ->when($polda != 'polda_all', function ($query) use ($polda) {
                    return $query->where('polda_id', $polda);
                })
                ->where('year', $year)
                ->where('rencana_operasi_id', $rencana_operation_id)
                ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
                ->first();

                return $outputLaporanPrev;
            }
        } else {
            $outputLaporanCurrent = DailyInput::selectRaw('
                sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
                sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
                sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
                sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
                sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
                sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
                sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
                sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
                sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
                sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
                sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
                sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
                sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
                sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
                sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
                sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
                sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
                sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
                sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
                sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
                sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
                sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
                sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
                sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
                sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
                sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
                sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
                sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
                sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
                sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
                sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
                sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
                sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
                sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
                sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
                sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
                sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
                sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
                sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
                sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
                sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
                sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
                sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
                sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
                sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
                sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
                sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
                sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
                sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
                sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
                sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
                sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
                sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
                sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
                sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
                sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
                sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
                sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
                sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
                sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
                sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
                sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
                sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
                sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
                sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
                sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
                sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
                sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
                sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
                sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
                sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
                sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
                sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
                sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
                sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
                sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
                sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
                sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
                sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
                sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
                sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
                sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
                sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
                sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
                sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
                sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
                sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
                sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
                sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
                sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
                sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
                sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
                sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
                sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
                sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
                sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
                sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
                sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
                sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
                sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
                sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
                sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
                sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
                sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
                sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
                sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
                sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
                sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
                sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
                sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
                sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
                sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
                sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
                sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
                sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
                sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
                sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
                sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
                sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
                sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
                sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
                sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
                sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
                sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
                sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
                sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
                sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
                sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
                sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
                sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
                sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
                sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
                sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
                sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
                sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
                sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
                sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
                sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
                sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
                sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
                sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
                sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
                sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
                sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
                sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
                sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
                sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
                sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
                sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
                sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
                sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
                sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
                sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
                sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
                sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
                sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
                sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
                sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
                sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
                sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
                sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
                sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
                sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
                sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
                sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
                sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
                sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
                sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
                sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
                sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
                sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
                sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
                sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
                sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
                sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
                sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
                sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
                sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
                sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
                sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
                sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
                sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
                sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
                sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
                sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
                sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
                sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
                sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
                sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
                sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
                sum(polisi_sahabat_anak) as polisi_sahabat_anak,
                sum(cara_aman_sekolah) as cara_aman_sekolah,
                sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
                sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
                sum(police_goes_to_campus) as police_goes_to_campus,
                sum(safety_riding_driving) as safety_riding_driving,
                sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
                sum(kampanye_keselamatan) as kampanye_keselamatan,
                sum(sekolah_mengemudi) as sekolah_mengemudi,
                sum(taman_lalu_lintas) as taman_lalu_lintas,
                sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
                sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
                sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
                sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
                sum(giat_lantas_patroli) as giat_lantas_patroli,
                sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
                sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
                sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
                sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
                sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
                sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
                sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
                sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
                sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
                sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
                sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
                sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
                sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
                sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
                sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
                sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
                sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
                sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
                sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
                sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
                sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
                sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
                sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
                sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
                sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
                sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
                sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
                sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
                sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
                sum(penyekatan_motor) as penyekatan_motor,
                sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
                sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
                sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
                sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
            ->when($polda != 'polda_all', function ($query) use ($polda) {
                return $query->where('polda_id', $polda);
            })
            ->where('year', $year)
            ->where('rencana_operasi_id', $rencana_operation_id)
            ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
            ->first();
            return $outputLaporanCurrent;
        }
    }
}

if (! function_exists('prevPerPolda')) {
    function prevPerPolda($polda_id, $start_date, $end_date) {
        $outputLaporanPrev = DailyInputPrev::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
            sum(cara_aman_sekolah_p) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus_p) as police_goes_to_campus,
            sum(safety_riding_driving_p) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan_p) as kampanye_keselamatan,
            sum(sekolah_mengemudi_p) as sekolah_mengemudi,
            sum(taman_lalu_lintas_p) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli_p) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
            sum(penyekatan_motor_p) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
        ->where('polda_id', $polda_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanPrev;
    }
}

if (! function_exists('currentPerPolda')) {
    function currentPerPolda($polda_id, $start_date, $end_date) {
        $outputLaporanCurrent = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->where('polda_id', $polda_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanCurrent;
    }
}

if (! function_exists('allPoldaCurrentByDate')) {
    function allPoldaCurrentByDate($start_date, $end_date) {
        $outputLaporanCurrent = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanCurrent;
    }
}

if (! function_exists('allPoldaPrevByDate')) {
    function allPoldaPrevByDate($start_date, $end_date) {
        $outputLaporanPrev = DailyInputPrev::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
            sum(cara_aman_sekolah_p) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus_p) as police_goes_to_campus,
            sum(safety_riding_driving_p) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan_p) as kampanye_keselamatan,
            sum(sekolah_mengemudi_p) as sekolah_mengemudi,
            sum(taman_lalu_lintas_p) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli_p) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
            sum(penyekatan_motor_p) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanPrev;
    }
}

//==============================================================================================================================================

if (! function_exists('excelTemplate')) {
    function excelTemplate($template, $prev, $current, $kesatuan, $hari_tanggal, $nama_atasan, $pangkat, $jabatan, $nama_laporan, $customFileName=null)
    {

        $excelPath = public_path('template/excel');

        $excelTemplate = $excelPath."/format_laporan_operasi_2021.xlsx";

        //load spreadsheet
        $spreadsheet = IOFactory::load($excelTemplate);

        $now = now()->format("Y-m-d");

        if(is_null($customFileName) || empty($customFileName)) {
            $filename = 'report-'.$now;
        } else {
            $filename = 'report-'.$customFileName;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');

        //change it
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('B6', $kesatuan); //NAMA KESATUAN
        $sheet->setCellValue('E423', indonesianDate(date("Y-m-d"))); // TEMPAT, TANGGAL
        $sheet->setCellValue('E430', $nama_atasan); // NAMA ATASAN UNTUK TANDA TANGAN
        $sheet->setCellValue('E431', $pangkat); //PANGKAT & NRP
        $sheet->setCellValue('E425', $jabatan); //JABATAN
        //$sheet->setCellValue('A5', $nama_laporan); // NAMA LAPORAN
        $sheet->setCellValue('B7', 'HARI/TGL : '.$hari_tanggal); // DIISI HARI TGL

        $sheet->setCellValue('C14', applyZero($prev->pelanggaran_lalu_lintas_tilang));
        $sheet->setCellValue('D14', applyZero($current->pelanggaran_lalu_lintas_tilang));

        $sheet->setCellValue('C15', applyZero($prev->pelanggaran_lalu_lintas_teguran));
        $sheet->setCellValue('D15', applyZero($current->pelanggaran_lalu_lintas_teguran));

        $sheet->setCellValue('C19', applyZero($prev->pelanggaran_sepeda_motor_kecepatan));
        $sheet->setCellValue('D19', applyZero($current->pelanggaran_sepeda_motor_kecepatan));

        $sheet->setCellValue('C20', applyZero($prev->pelanggaran_sepeda_motor_helm));
        $sheet->setCellValue('D20', applyZero($current->pelanggaran_sepeda_motor_helm));

        $sheet->setCellValue('C21', applyZero($prev->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));
        $sheet->setCellValue('D21', applyZero($current->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));

        $sheet->setCellValue('C22', applyZero($prev->pelanggaran_sepeda_motor_marka_menerus_menyalip));
        $sheet->setCellValue('D22', applyZero($current->pelanggaran_sepeda_motor_marka_menerus_menyalip));

        $sheet->setCellValue('C23', applyZero($prev->pelanggaran_sepeda_motor_melawan_arus));
        $sheet->setCellValue('D23', applyZero($current->pelanggaran_sepeda_motor_melawan_arus));

        $sheet->setCellValue('C24', applyZero($prev->pelanggaran_sepeda_motor_melanggar_lampu_lalin));
        $sheet->setCellValue('D24', applyZero($current->pelanggaran_sepeda_motor_melanggar_lampu_lalin));

        $sheet->setCellValue('C25', applyZero($prev->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));
        $sheet->setCellValue('D25', applyZero($current->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));

        $sheet->setCellValue('C26', applyZero($prev->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D26', applyZero($current->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C27', applyZero($prev->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));
        $sheet->setCellValue('D27', applyZero($current->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));

        $sheet->setCellValue('C28', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D28', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C29', applyZero($prev->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D29', applyZero($current->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C30', applyZero($prev->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D30', applyZero($current->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C31', applyZero($prev->pelanggaran_sepeda_motor_melanggar_marka_berhenti));
        $sheet->setCellValue('D31', applyZero($current->pelanggaran_sepeda_motor_melanggar_marka_berhenti));

        $sheet->setCellValue('C32', applyZero($prev->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D32', applyZero($current->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C33', applyZero($prev->pelanggaran_sepeda_motor_surat_surat));
        $sheet->setCellValue('D33', applyZero($current->pelanggaran_sepeda_motor_surat_surat));

        $sheet->setCellValue('C34', applyZero($prev->pelanggaran_sepeda_motor_kelengkapan_kendaraan));
        $sheet->setCellValue('D34', applyZero($current->pelanggaran_sepeda_motor_kelengkapan_kendaraan));

        $sheet->setCellValue('C35', applyZero($prev->pelanggaran_sepeda_motor_lain_lain));
        $sheet->setCellValue('D35', applyZero($current->pelanggaran_sepeda_motor_lain_lain));

        $sheet->setCellValue('C38', applyZero($prev->pelanggaran_mobil_kecepatan));
        $sheet->setCellValue('D38', applyZero($current->pelanggaran_mobil_kecepatan));

        $sheet->setCellValue('C39', applyZero($prev->pelanggaran_mobil_safety_belt));
        $sheet->setCellValue('D39', applyZero($current->pelanggaran_mobil_safety_belt));

        $sheet->setCellValue('C40', applyZero($prev->pelanggaran_mobil_muatan_overload));
        $sheet->setCellValue('D40', applyZero($current->pelanggaran_mobil_muatan_overload));

        $sheet->setCellValue('C41', applyZero($prev->pelanggaran_mobil_marka_menerus_menyalip));
        $sheet->setCellValue('D41', applyZero($current->pelanggaran_mobil_marka_menerus_menyalip));

        $sheet->setCellValue('C42', applyZero($prev->pelanggaran_mobil_melawan_arus));
        $sheet->setCellValue('D42', applyZero($current->pelanggaran_mobil_melawan_arus));

        $sheet->setCellValue('C43', applyZero($prev->pelanggaran_mobil_melanggar_lampu_lalin));
        $sheet->setCellValue('D43', applyZero($current->pelanggaran_mobil_melanggar_lampu_lalin));

        $sheet->setCellValue('C44', applyZero($prev->pelanggaran_mobil_mengemudi_tidak_wajar));
        $sheet->setCellValue('D44', applyZero($current->pelanggaran_mobil_mengemudi_tidak_wajar));

        $sheet->setCellValue('C45', applyZero($prev->pelanggaran_mobil_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D45', applyZero($current->pelanggaran_mobil_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C46', applyZero($prev->pelanggaran_mobil_tidak_nyala_lampu_malam));
        $sheet->setCellValue('D46', applyZero($current->pelanggaran_mobil_tidak_nyala_lampu_malam));

        $sheet->setCellValue('C47', applyZero($prev->pelanggaran_mobil_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D47', applyZero($current->pelanggaran_mobil_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C48', applyZero($prev->pelanggaran_mobil_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D48', applyZero($current->pelanggaran_mobil_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C49', applyZero($prev->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D49', applyZero($current->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C50', applyZero($prev->pelanggaran_mobil_melanggar_marka_berhenti));
        $sheet->setCellValue('D50', applyZero($current->pelanggaran_mobil_melanggar_marka_berhenti));

        $sheet->setCellValue('C51', applyZero($prev->pelanggaran_mobil_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D51', applyZero($current->pelanggaran_mobil_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C52', applyZero($prev->pelanggaran_mobil_surat_surat));
        $sheet->setCellValue('D52', applyZero($current->pelanggaran_mobil_surat_surat));

        $sheet->setCellValue('C53', applyZero($prev->pelanggaran_mobil_kelengkapan_kendaraan));
        $sheet->setCellValue('D53', applyZero($current->pelanggaran_mobil_kelengkapan_kendaraan));

        $sheet->setCellValue('C54', applyZero($prev->pelanggaran_mobil_lain_lain));
        $sheet->setCellValue('D54', applyZero($current->pelanggaran_mobil_lain_lain));

        $sheet->setCellValue('C57', applyZero($prev->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));
        $sheet->setCellValue('D57', applyZero($current->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));

        $sheet->setCellValue('C60', applyZero($prev->barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D60', applyZero($current->barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C61', applyZero($prev->barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D61', applyZero($current->barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C62', applyZero($prev->barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D62', applyZero($current->barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C65', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));
        $sheet->setCellValue('D65', applyZero($current->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));

        $sheet->setCellValue('C66', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));
        $sheet->setCellValue('D66', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));

        $sheet->setCellValue('C67', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_bus));
        $sheet->setCellValue('D67', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_bus));

        $sheet->setCellValue('C68', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_barang));
        $sheet->setCellValue('D68', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_barang));

        $sheet->setCellValue('C69', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));
        $sheet->setCellValue('D69', applyZero($current->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));

        $sheet->setCellValue('C72', applyZero($prev->profesi_pelaku_pelanggaran_pns));
        $sheet->setCellValue('D72', applyZero($current->profesi_pelaku_pelanggaran_pns));

        $sheet->setCellValue('C73', applyZero($prev->profesi_pelaku_pelanggaran_karyawan_swasta));
        $sheet->setCellValue('D73', applyZero($current->profesi_pelaku_pelanggaran_karyawan_swasta));

        $sheet->setCellValue('C74', applyZero($prev->profesi_pelaku_pelanggaran_pelajar_mahasiswa));
        $sheet->setCellValue('D74', applyZero($current->profesi_pelaku_pelanggaran_pelajar_mahasiswa));

        $sheet->setCellValue('C75', applyZero($prev->profesi_pelaku_pelanggaran_pengemudi_supir));
        $sheet->setCellValue('D75', applyZero($current->profesi_pelaku_pelanggaran_pengemudi_supir));

        $sheet->setCellValue('C76', applyZero($prev->profesi_pelaku_pelanggaran_tni));
        $sheet->setCellValue('D76', applyZero($current->profesi_pelaku_pelanggaran_tni));

        $sheet->setCellValue('C77', applyZero($prev->profesi_pelaku_pelanggaran_polri));
        $sheet->setCellValue('D77', applyZero($current->profesi_pelaku_pelanggaran_polri));

        $sheet->setCellValue('C78', applyZero($prev->profesi_pelaku_pelanggaran_lain_lain));
        $sheet->setCellValue('D78', applyZero($current->profesi_pelaku_pelanggaran_lain_lain));

        $sheet->setCellValue('C81', applyZero($prev->usia_pelaku_pelanggaran_kurang_dari_15_tahun));
        $sheet->setCellValue('D81', applyZero($current->usia_pelaku_pelanggaran_kurang_dari_15_tahun));

        $sheet->setCellValue('C82', applyZero($prev->usia_pelaku_pelanggaran_16_20_tahun));
        $sheet->setCellValue('D82', applyZero($current->usia_pelaku_pelanggaran_16_20_tahun));

        $sheet->setCellValue('C83', applyZero($prev->usia_pelaku_pelanggaran_21_25_tahun));
        $sheet->setCellValue('D83', applyZero($current->usia_pelaku_pelanggaran_21_25_tahun));

        $sheet->setCellValue('C84', applyZero($prev->usia_pelaku_pelanggaran_26_30_tahun));
        $sheet->setCellValue('D84', applyZero($current->usia_pelaku_pelanggaran_26_30_tahun));

        $sheet->setCellValue('C85', applyZero($prev->usia_pelaku_pelanggaran_31_35_tahun));
        $sheet->setCellValue('D85', applyZero($current->usia_pelaku_pelanggaran_31_35_tahun));

        $sheet->setCellValue('C86', applyZero($prev->usia_pelaku_pelanggaran_36_40_tahun));
        $sheet->setCellValue('D86', applyZero($current->usia_pelaku_pelanggaran_36_40_tahun));

        $sheet->setCellValue('C87', applyZero($prev->uusia_pelaku_pelanggaran_41_45_tahun));
        $sheet->setCellValue('D87', applyZero($current->usia_pelaku_pelanggaran_41_45_tahun));

        $sheet->setCellValue('C88', applyZero($prev->usia_pelaku_pelanggaran_46_50_tahunn));
        $sheet->setCellValue('D88', applyZero($current->usia_pelaku_pelanggaran_46_50_tahun));

        $sheet->setCellValue('C89', applyZero($prev->usia_pelaku_pelanggaran_51_55_tahunn));
        $sheet->setCellValue('D89', applyZero($current->usia_pelaku_pelanggaran_51_55_tahun));

        $sheet->setCellValue('C90', applyZero($prev->usia_pelaku_pelanggaran_56_60_tahun));
        $sheet->setCellValue('D90', applyZero($current->usia_pelaku_pelanggaran_56_60_tahun));

        $sheet->setCellValue('C91', applyZero($prev->usia_pelaku_pelanggaran_diatas_60_tahun));
        $sheet->setCellValue('D91', applyZero($current->usia_pelaku_pelanggaran_diatas_60_tahun));

        $sheet->setCellValue('C94', applyZero($prev->sim_pelaku_pelanggaran_sim_a));
        $sheet->setCellValue('D94', applyZero($current->sim_pelaku_pelanggaran_sim_a));

        $sheet->setCellValue('C95', applyZero($prev->sim_pelaku_pelanggaran_sim_a_umum));
        $sheet->setCellValue('D95', applyZero($current->sim_pelaku_pelanggaran_sim_a_umum));

        $sheet->setCellValue('C96', applyZero($prev->sim_pelaku_pelanggaran_sim_b1));
        $sheet->setCellValue('D96', applyZero($current->sim_pelaku_pelanggaran_sim_b1));

        $sheet->setCellValue('C97', applyZero($prev->sim_pelaku_pelanggaran_sim_b1_umum));
        $sheet->setCellValue('D97', applyZero($current->sim_pelaku_pelanggaran_sim_b1_umum));

        $sheet->setCellValue('C98', applyZero($prev->sim_pelaku_pelanggaran_sim_b2));
        $sheet->setCellValue('D98', applyZero($current->sim_pelaku_pelanggaran_sim_b2));

        $sheet->setCellValue('C99', applyZero($prev->sim_pelaku_pelanggaran_sim_b2_umum));
        $sheet->setCellValue('D99', applyZero($current->sim_pelaku_pelanggaran_sim_b2_umum));

        $sheet->setCellValue('C100', applyZero($prev->sim_pelaku_pelanggaran_sim_c));
        $sheet->setCellValue('D100', applyZero($current->sim_pelaku_pelanggaran_sim_c));

        $sheet->setCellValue('C101', applyZero($prev->sim_pelaku_pelanggaran_sim_d));
        $sheet->setCellValue('D101', applyZero($current->sim_pelaku_pelanggaran_sim_d));

        $sheet->setCellValue('C102', applyZero($prev->sim_pelaku_pelanggaran_sim_internasional));
        $sheet->setCellValue('D102', applyZero($current->sim_pelaku_pelanggaran_sim_internasional));

        $sheet->setCellValue('C103', applyZero($prev->sim_pelaku_pelanggaran_tanpa_sim));
        $sheet->setCellValue('D103', applyZero($current->sim_pelaku_pelanggaran_tanpa_sim));

        $sheet->setCellValue('C107', applyZero($prev->lokasi_pelanggaran_pemukiman));
        $sheet->setCellValue('D107', applyZero($current->lokasi_pelanggaran_pemukiman));

        $sheet->setCellValue('C108', applyZero($prev->lokasi_pelanggaran_perbelanjaan));
        $sheet->setCellValue('D108', applyZero($current->lokasi_pelanggaran_perbelanjaan));

        $sheet->setCellValue('C109', applyZero($prev->lokasi_pelanggaran_perkantoran));
        $sheet->setCellValue('D109', applyZero($current->lokasi_pelanggaran_perkantoran));

        $sheet->setCellValue('C110', applyZero($prev->lokasi_pelanggaran_wisata));
        $sheet->setCellValue('D110', applyZero($current->lokasi_pelanggaran_wisata));

        $sheet->setCellValue('C111', applyZero($prev->lokasi_pelanggaran_industri));
        $sheet->setCellValue('D111', applyZero($current->lokasi_pelanggaran_industri));

        $sheet->setCellValue('C114', applyZero($prev->lokasi_pelanggaran_status_jalan_nasional));
        $sheet->setCellValue('D114', applyZero($current->lokasi_pelanggaran_status_jalan_nasional));

        $sheet->setCellValue('C115', applyZero($prev->lokasi_pelanggaran_status_jalan_propinsi));
        $sheet->setCellValue('D115', applyZero($current->lokasi_pelanggaran_status_jalan_propinsi));

        $sheet->setCellValue('C116', applyZero($prev->lokasi_pelanggaran_status_jalan_kab_kota));
        $sheet->setCellValue('D116', applyZero($current->lokasi_pelanggaran_status_jalan_kab_kota));

        $sheet->setCellValue('C117', applyZero($prev->lokasi_pelanggaran_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D117', applyZero($current->lokasi_pelanggaran_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C120', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_arteri));
        $sheet->setCellValue('D120', applyZero($current->lokasi_pelanggaran_fungsi_jalan_arteri));

        $sheet->setCellValue('C121', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_kolektor));
        $sheet->setCellValue('D121', applyZero($current->lokasi_pelanggaran_fungsi_jalan_kolektor));

        $sheet->setCellValue('C122', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lokal));
        $sheet->setCellValue('D122', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lokal));

        $sheet->setCellValue('C123', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D123', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C127', applyZero($prev->kecelakaan_lalin_jumlah_kejadian));
        $sheet->setCellValue('D127', applyZero($current->kecelakaan_lalin_jumlah_kejadian));

        $sheet->setCellValue('C128', applyZero($prev->kecelakaan_lalin_jumlah_korban_meninggal));
        $sheet->setCellValue('D128', applyZero($current->kecelakaan_lalin_jumlah_korban_meninggal));

        $sheet->setCellValue('C129', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_berat));
        $sheet->setCellValue('D129', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_beratn));

        $sheet->setCellValue('C130', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_ringan));
        $sheet->setCellValue('D130', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_ringan));

        $sheet->setCellValue('C131', applyZero($prev->kecelakaan_lalin_jumlah_kerugian_materiil));
        $sheet->setCellValue('D131', applyZero($current->kecelakaan_lalin_jumlah_kerugian_materiil));

        $sheet->setCellValue('C133', applyZero($prev->kecelakaan_barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D133', applyZero($current->kecelakaan_barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C134', applyZero($prev->kecelakaan_barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D134', applyZero($current->kecelakaan_barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C135', applyZero($prev->kecelakaan_barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D135', applyZero($current->kecelakaan_barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C138', applyZero($prev->profesi_korban_kecelakaan_lalin_pns));
        $sheet->setCellValue('D138', applyZero($current->profesi_korban_kecelakaan_lalin_pns));

        $sheet->setCellValue('C139', applyZero($prev->profesi_korban_kecelakaan_lalin_karwayan_swasta));
        $sheet->setCellValue('D139', applyZero($current->profesi_korban_kecelakaan_lalin_karwayan_swasta));

        $sheet->setCellValue('C140', applyZero($prev->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));
        $sheet->setCellValue('D140', applyZero($current->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));

        $sheet->setCellValue('C141', applyZero($prev->profesi_korban_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D141', applyZero($current->profesi_korban_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C142', applyZero($prev->profesi_korban_kecelakaan_lalin_tni));
        $sheet->setCellValue('D142', applyZero($current->profesi_korban_kecelakaan_lalin_tni));

        $sheet->setCellValue('C143', applyZero($prev->profesi_korban_kecelakaan_lalin_polri));
        $sheet->setCellValue('D143', applyZero($current->profesi_korban_kecelakaan_lalin_polri));

        $sheet->setCellValue('C144', applyZero($prev->profesi_korban_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D144', applyZero($current->profesi_korban_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C147', applyZero($prev->usia_korban_kecelakaan_kurang_15));
        $sheet->setCellValue('D147', applyZero($current->usia_korban_kecelakaan_kurang_15));

        $sheet->setCellValue('C148', applyZero($prev->usia_korban_kecelakaan_16_20));
        $sheet->setCellValue('D148', applyZero($current->usia_korban_kecelakaan_16_20));

        $sheet->setCellValue('C149', applyZero($prev->usia_korban_kecelakaan_21_25));
        $sheet->setCellValue('D149', applyZero($current->usia_korban_kecelakaan_21_25));

        $sheet->setCellValue('C150', applyZero($prev->usia_korban_kecelakaan_26_30));
        $sheet->setCellValue('D150', applyZero($current->usia_korban_kecelakaan_26_30));

        $sheet->setCellValue('C151', applyZero($prev->usia_korban_kecelakaan_31_35));
        $sheet->setCellValue('D151', applyZero($current->usia_korban_kecelakaan_31_35));

        $sheet->setCellValue('C152', applyZero($prev->usia_korban_kecelakaan_36_40));
        $sheet->setCellValue('D152', applyZero($current->usia_korban_kecelakaan_36_40));

        $sheet->setCellValue('C153', applyZero($prev->usia_korban_kecelakaan_41_45));
        $sheet->setCellValue('D153', applyZero($current->usia_korban_kecelakaan_41_45));

        $sheet->setCellValue('C154', applyZero($prev->usia_korban_kecelakaan_45_50));
        $sheet->setCellValue('D154', applyZero($current->usia_korban_kecelakaan_45_50));

        $sheet->setCellValue('C155', applyZero($prev->usia_korban_kecelakaan_51_55));
        $sheet->setCellValue('D155', applyZero($current->usia_korban_kecelakaan_51_55));

        $sheet->setCellValue('C156', applyZero($prev->usia_korban_kecelakaan_56_60));
        $sheet->setCellValue('D156', applyZero($current->usia_korban_kecelakaan_56_60));

        $sheet->setCellValue('C157', applyZero($prev->usia_korban_kecelakaan_diatas_60));
        $sheet->setCellValue('D157', applyZero($current->usia_korban_kecelakaan_diatas_60));

        $sheet->setCellValue('C160', applyZero($prev->sim_korban_kecelakaan_sim_a));
        $sheet->setCellValue('D160', applyZero($current->sim_korban_kecelakaan_sim_a));

        $sheet->setCellValue('C161', applyZero($prev->sim_korban_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D161', applyZero($current->sim_korban_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C162', applyZero($prev->sim_korban_kecelakaan_sim_b1));
        $sheet->setCellValue('D162', applyZero($current->sim_korban_kecelakaan_sim_b1));

        $sheet->setCellValue('C163', applyZero($prev->sim_korban_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D163', applyZero($current->sim_korban_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C164', applyZero($prev->sim_korban_kecelakaan_sim_b2));
        $sheet->setCellValue('D164', applyZero($current->sim_korban_kecelakaan_sim_b2));

        $sheet->setCellValue('C165', applyZero($prev->sim_korban_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D165', applyZero($current->sim_korban_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C166', applyZero($prev->sim_korban_kecelakaan_sim_c));
        $sheet->setCellValue('D166', applyZero($current->sim_korban_kecelakaan_sim_c));

        $sheet->setCellValue('C167', applyZero($prev->sim_korban_kecelakaan_sim_d));
        $sheet->setCellValue('D167', applyZero($current->sim_korban_kecelakaan_sim_d));

        $sheet->setCellValue('C168', applyZero($prev->sim_korban_kecelakaan_sim_internasional));
        $sheet->setCellValue('D168', applyZero($current->sim_korban_kecelakaan_sim_internasional));

        $sheet->setCellValue('C169', applyZero($prev->sim_korban_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D169', applyZero($current->sim_korban_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C172', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));
        $sheet->setCellValue('D172', applyZero($current->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));

        $sheet->setCellValue('C173', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));
        $sheet->setCellValue('D173', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));

        $sheet->setCellValue('C174', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_bus));
        $sheet->setCellValue('D174', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_bus));

        $sheet->setCellValue('C175', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_barang));
        $sheet->setCellValue('D175', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_barang));

        $sheet->setCellValue('C176', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));
        $sheet->setCellValue('D176', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));

        $sheet->setCellValue('C177', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));
        $sheet->setCellValue('D177', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));

        $sheet->setCellValue('C180', applyZero($prev->jenis_kecelakaan_tunggal_ooc));
        $sheet->setCellValue('D180', applyZero($current->jenis_kecelakaan_tunggal_ooc));

        $sheet->setCellValue('C181', applyZero($prev->jenis_kecelakaan_depan_depan));
        $sheet->setCellValue('D181', applyZero($current->jenis_kecelakaan_depan_depan));

        $sheet->setCellValue('C182', applyZero($prev->jenis_kecelakaan_depan_belakang));
        $sheet->setCellValue('D182', applyZero($current->jenis_kecelakaan_depan_belakang));

        $sheet->setCellValue('C183', applyZero($prev->jenis_kecelakaan_depan_samping));
        $sheet->setCellValue('D183', applyZero($current->jenis_kecelakaan_depan_samping));

        $sheet->setCellValue('C184', applyZero($prev->jenis_kecelakaan_beruntun));
        $sheet->setCellValue('D184', applyZero($current->jenis_kecelakaan_beruntun));

        $sheet->setCellValue('C185', applyZero($prev->jenis_kecelakaan_pejalan_kaki));
        $sheet->setCellValue('D185', applyZero($current->jenis_kecelakaan_pejalan_kaki));

        $sheet->setCellValue('C186', applyZero($prev->jenis_kecelakaan_tabrak_lari));
        $sheet->setCellValue('D186', applyZero($current->jenis_kecelakaan_tabrak_lari));

        $sheet->setCellValue('C187', applyZero($prev->jenis_kecelakaan_tabrak_hewan));
        $sheet->setCellValue('D187', applyZero($current->jenis_kecelakaan_tabrak_hewan));

        $sheet->setCellValue('C188', applyZero($prev->jenis_kecelakaan_samping_samping));
        $sheet->setCellValue('D188', applyZero($current->jenis_kecelakaan_samping_samping));

        $sheet->setCellValue('C189', applyZero($prev->jenis_kecelakaan_lainnya));
        $sheet->setCellValue('D189', applyZero($current->jenis_kecelakaan_lainnya));

        $sheet->setCellValue('C192', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pns));
        $sheet->setCellValue('D192', applyZero($current->profesi_pelaku_kecelakaan_lalin_pns));

        $sheet->setCellValue('C193', applyZero($prev->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));
        $sheet->setCellValue('D193', applyZero($current->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));

        $sheet->setCellValue('C194', applyZero($prev->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));
        $sheet->setCellValue('D194', applyZero($current->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));

        $sheet->setCellValue('C195', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D195', applyZero($current->profesi_pelaku_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C196', applyZero($prev->profesi_pelaku_kecelakaan_lalin_tni));
        $sheet->setCellValue('D196', applyZero($current->profesi_pelaku_kecelakaan_lalin_tni));

        $sheet->setCellValue('C197', applyZero($prev->profesi_pelaku_kecelakaan_lalin_polri));
        $sheet->setCellValue('D197', applyZero($current->profesi_pelaku_kecelakaan_lalin_polri));

        $sheet->setCellValue('C198', applyZero($prev->profesi_pelaku_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D198', applyZero($current->profesi_pelaku_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C201', applyZero($prev->usia_pelaku_kecelakaan_kurang_dari_15_tahun));
        $sheet->setCellValue('D201', applyZero($current->usia_pelaku_kecelakaan_kurang_dari_15_tahun));

        $sheet->setCellValue('C202', applyZero($prev->usia_pelaku_kecelakaan_16_20_tahun));
        $sheet->setCellValue('D202', applyZero($current->usia_pelaku_kecelakaan_16_20_tahun));

        $sheet->setCellValue('C203', applyZero($prev->usia_pelaku_kecelakaan_21_25_tahun));
        $sheet->setCellValue('D203', applyZero($current->usia_pelaku_kecelakaan_21_25_tahun));

        $sheet->setCellValue('C204', applyZero($prev->usia_pelaku_kecelakaan_26_30_tahun));
        $sheet->setCellValue('D204', applyZero($current->usia_pelaku_kecelakaan_26_30_tahun));

        $sheet->setCellValue('C205', applyZero($prev->usia_pelaku_kecelakaan_31_35_tahun));
        $sheet->setCellValue('D205', applyZero($current->usia_pelaku_kecelakaan_31_35_tahun));

        $sheet->setCellValue('C206', applyZero($prev->usia_pelaku_kecelakaan_36_40_tahun));
        $sheet->setCellValue('D206', applyZero($current->usia_pelaku_kecelakaan_36_40_tahun));

        $sheet->setCellValue('C207', applyZero($prev->usia_pelaku_kecelakaan_41_45_tahun));
        $sheet->setCellValue('D207', applyZero($current->usia_pelaku_kecelakaan_41_45_tahun));

        $sheet->setCellValue('C208', applyZero($prev->usia_pelaku_kecelakaan_46_50_tahun));
        $sheet->setCellValue('D208', applyZero($current->usia_pelaku_kecelakaan_46_50_tahun));

        $sheet->setCellValue('C209', applyZero($prev->usia_pelaku_kecelakaan_51_55_tahun));
        $sheet->setCellValue('D209', applyZero($current->usia_pelaku_kecelakaan_51_55_tahun));

        $sheet->setCellValue('C210', applyZero($prev->usia_pelaku_kecelakaan_56_60_tahun));
        $sheet->setCellValue('D210', applyZero($current->usia_pelaku_kecelakaan_56_60_tahun));

        $sheet->setCellValue('C211', applyZero($prev->usia_pelaku_kecelakaan_diatas_60_tahun));
        $sheet->setCellValue('D211', applyZero($current->usia_pelaku_kecelakaan_diatas_60_tahun));

        $sheet->setCellValue('C214', applyZero($prev->sim_pelaku_kecelakaan_sim_a));
        $sheet->setCellValue('D214', applyZero($current->sim_pelaku_kecelakaan_sim_a));

        $sheet->setCellValue('C215', applyZero($prev->sim_pelaku_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D215', applyZero($current->sim_pelaku_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C216', applyZero($prev->sim_pelaku_kecelakaan_sim_b1));
        $sheet->setCellValue('D216', applyZero($current->sim_pelaku_kecelakaan_sim_b1));

        $sheet->setCellValue('C217', applyZero($prev->sim_pelaku_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D217', applyZero($current->sim_pelaku_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C218', applyZero($prev->sim_pelaku_kecelakaan_sim_b2));
        $sheet->setCellValue('D218', applyZero($current->sim_pelaku_kecelakaan_sim_b2));

        $sheet->setCellValue('C219', applyZero($prev->sim_pelaku_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D219', applyZero($current->sim_pelaku_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C220', applyZero($prev->sim_pelaku_kecelakaan_sim_c));
        $sheet->setCellValue('D220', applyZero($current->sim_pelaku_kecelakaan_sim_c));

        $sheet->setCellValue('C221', applyZero($prev->sim_pelaku_kecelakaan_sim_dn));
        $sheet->setCellValue('D221', applyZero($current->sim_pelaku_kecelakaan_sim_d));

        $sheet->setCellValue('C222', applyZero($prev->sim_pelaku_kecelakaan_sim_internasional));
        $sheet->setCellValue('D222', applyZero($current->sim_pelaku_kecelakaan_sim_internasional));

        $sheet->setCellValue('C223', applyZero($prev->sim_pelaku_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D223', applyZero($current->sim_pelaku_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C227', applyZero($prev->lokasi_kecelakaan_lalin_pemukiman));
        $sheet->setCellValue('D227', applyZero($current->lokasi_kecelakaan_lalin_pemukiman));

        $sheet->setCellValue('C228', applyZero($prev->lokasi_kecelakaan_lalin_perbelanjaan));
        $sheet->setCellValue('D228', applyZero($current->lokasi_kecelakaan_lalin_perbelanjaan));

        $sheet->setCellValue('C229', applyZero($prev->lokasi_kecelakaan_lalin_perkantoran));
        $sheet->setCellValue('D229', applyZero($current->lokasi_kecelakaan_lalin_perkantoran));

        $sheet->setCellValue('C230', applyZero($prev->lokasi_kecelakaan_lalin_wisata));
        $sheet->setCellValue('D230', applyZero($current->lokasi_kecelakaan_lalin_wisata));

        $sheet->setCellValue('C231', applyZero($prev->lokasi_kecelakaan_lalin_industri));
        $sheet->setCellValue('D231', applyZero($current->lokasi_kecelakaan_lalin_industri));

        $sheet->setCellValue('C232', applyZero($prev->lokasi_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D232', applyZero($current->lokasi_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C235', applyZero($prev->lokasi_kecelakaan_status_jalan_nasional));
        $sheet->setCellValue('D235', applyZero($current->lokasi_kecelakaan_status_jalan_nasional));

        $sheet->setCellValue('C236', applyZero($prev->lokasi_kecelakaan_status_jalan_propinsi));
        $sheet->setCellValue('D236', applyZero($current->lokasi_kecelakaan_status_jalan_propinsi));

        $sheet->setCellValue('C237', applyZero($prev->lokasi_kecelakaan_status_jalan_kab_kota));
        $sheet->setCellValue('D237', applyZero($current->lokasi_kecelakaan_status_jalan_kab_kota));

        $sheet->setCellValue('C238', applyZero($prev->lokasi_kecelakaan_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D238', applyZero($current->lokasi_kecelakaan_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C241', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_arteri));
        $sheet->setCellValue('D241', applyZero($current->lokasi_kecelakaan_fungsi_jalan_arteri));

        $sheet->setCellValue('C242', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_kolektor));
        $sheet->setCellValue('D242', applyZero($current->lokasi_kecelakaan_fungsi_jalan_kolektor));

        $sheet->setCellValue('C243', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lokal));
        $sheet->setCellValue('D243', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lokal));

        $sheet->setCellValue('C244', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D244', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C247', applyZero($prev->faktor_penyebab_kecelakaan_manusia));
        $sheet->setCellValue('D247', applyZero($current->faktor_penyebab_kecelakaan_manusia));

        $sheet->setCellValue('C248', applyZero($prev->faktor_penyebab_kecelakaan_ngantuk_lelah));
        $sheet->setCellValue('D248', applyZero($current->faktor_penyebab_kecelakaan_ngantuk_lelah));

        $sheet->setCellValue('C249', applyZero($prev->faktor_penyebab_kecelakaan_mabuk_obat));
        $sheet->setCellValue('D249', applyZero($current->faktor_penyebab_kecelakaan_mabuk_obat));

        $sheet->setCellValue('C250', applyZero($prev->faktor_penyebab_kecelakaan_sakit));
        $sheet->setCellValue('D250', applyZero($current->faktor_penyebab_kecelakaan_sakit));

        $sheet->setCellValue('C251', applyZero($prev->faktor_penyebab_kecelakaan_handphone_elektronik));
        $sheet->setCellValue('D251', applyZero($current->faktor_penyebab_kecelakaan_handphone_elektronik));

        $sheet->setCellValue('C252', applyZero($prev->faktor_penyebab_kecelakaan_menerobos_lampu_merah));
        $sheet->setCellValue('D252', applyZero($current->faktor_penyebab_kecelakaan_menerobos_lampu_merah));

        $sheet->setCellValue('C253', applyZero($prev->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));
        $sheet->setCellValue('D253', applyZero($current->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));

        $sheet->setCellValue('C254', applyZero($prev->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));
        $sheet->setCellValue('D254', applyZero($current->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));

        $sheet->setCellValue('C255', applyZero($prev->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));
        $sheet->setCellValue('D255', applyZero($current->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));

        $sheet->setCellValue('C256', applyZero($prev->faktor_penyebab_kecelakaan_berpindah_jalur));
        $sheet->setCellValue('D256', applyZero($current->faktor_penyebab_kecelakaan_berpindah_jalur));

        $sheet->setCellValue('C257', applyZero($prev->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));
        $sheet->setCellValue('D257', applyZero($current->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));

        $sheet->setCellValue('C258', applyZero($prev->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));
        $sheet->setCellValue('D258', applyZero($current->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));

        $sheet->setCellValue('C259', applyZero($prev->faktor_penyebab_kecelakaan_lainnya));
        $sheet->setCellValue('D259', applyZero($current->faktor_penyebab_kecelakaan_lainnya));

        $sheet->setCellValue('C260', applyZero($prev->faktor_penyebab_kecelakaan_alam));
        $sheet->setCellValue('D260', applyZero($current->faktor_penyebab_kecelakaan_alam));

        $sheet->setCellValue('C261', applyZero($prev->faktor_penyebab_kecelakaan_kelaikan_kendaraan));
        $sheet->setCellValue('D261', applyZero($current->faktor_penyebab_kecelakaan_kelaikan_kendaraan));

        $sheet->setCellValue('C262', applyZero($prev->faktor_penyebab_kecelakaan_kondisi_jalan));
        $sheet->setCellValue('D262', applyZero($current->faktor_penyebab_kecelakaan_kondisi_jalan));

        $sheet->setCellValue('C263', applyZero($prev->faktor_penyebab_kecelakaan_prasarana_jalan));
        $sheet->setCellValue('D263', applyZero($current->faktor_penyebab_kecelakaan_prasarana_jalan));

        $sheet->setCellValue('C264', applyZero($prev->faktor_penyebab_kecelakaan_rambu));
        $sheet->setCellValue('D264', applyZero($current->faktor_penyebab_kecelakaan_rambu));

        $sheet->setCellValue('C265', applyZero($prev->faktor_penyebab_kecelakaan_marka));
        $sheet->setCellValue('D265', applyZero($current->faktor_penyebab_kecelakaan_marka));

        $sheet->setCellValue('C266', applyZero($prev->faktor_penyebab_kecelakaan_apil));
        $sheet->setCellValue('D266', applyZero($current->faktor_penyebab_kecelakaan_apil));

        $sheet->setCellValue('C267', applyZero($prev->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));
        $sheet->setCellValue('D267', applyZero($current->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));

        $sheet->setCellValue('C270', applyZero($prev->waktu_kejadian_kecelakaan_00_03));
        $sheet->setCellValue('D270', applyZero($current->waktu_kejadian_kecelakaan_00_03));

        $sheet->setCellValue('C271', applyZero($prev->waktu_kejadian_kecelakaan_03_06));
        $sheet->setCellValue('D271', applyZero($current->waktu_kejadian_kecelakaan_03_06));

        $sheet->setCellValue('C272', applyZero($prev->waktu_kejadian_kecelakaan_06_09));
        $sheet->setCellValue('D272', applyZero($current->waktu_kejadian_kecelakaan_06_09));

        $sheet->setCellValue('C273', applyZero($prev->waktu_kejadian_kecelakaan_09_12));
        $sheet->setCellValue('D273', applyZero($current->waktu_kejadian_kecelakaan_09_12));

        $sheet->setCellValue('C274', applyZero($prev->waktu_kejadian_kecelakaan_12_15));
        $sheet->setCellValue('D274', applyZero($current->waktu_kejadian_kecelakaan_12_15));

        $sheet->setCellValue('C275', applyZero($prev->waktu_kejadian_kecelakaan_15_18));
        $sheet->setCellValue('D275', applyZero($current->waktu_kejadian_kecelakaan_15_18));

        $sheet->setCellValue('C276', applyZero($prev->waktu_kejadian_kecelakaan_18_21));
        $sheet->setCellValue('D276', applyZero($current->waktu_kejadian_kecelakaan_18_21));

        $sheet->setCellValue('C277', applyZero($prev->waktu_kejadian_kecelakaan_21_24));
        $sheet->setCellValue('D277', applyZero($current->waktu_kejadian_kecelakaan_21_24));

        $sheet->setCellValue('C280', applyZero($prev->kecelakaan_lalin_menonjol_jumlah_kejadian));
        $sheet->setCellValue('D280', applyZero($current->kecelakaan_lalin_menonjol_jumlah_kejadian));

        $sheet->setCellValue('C281', applyZero($prev->kecelakaan_lalin_menonjol_korban_meninggal));
        $sheet->setCellValue('D281', applyZero($current->kecelakaan_lalin_menonjol_korban_meninggal));

        $sheet->setCellValue('C282', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_berat));
        $sheet->setCellValue('D282', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_berat));

        $sheet->setCellValue('C283', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_ringan));
        $sheet->setCellValue('D283', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_ringan));

        $sheet->setCellValue('C284', applyZero($prev->kecelakaan_lalin_menonjol_materiil));
        $sheet->setCellValue('D284', applyZero($current->kecelakaan_lalin_menonjol_materiil));

        $sheet->setCellValue('C286', applyZero($prev->kecelakaan_lalin_tunggal_jumlah_kejadian));
        $sheet->setCellValue('D286', applyZero($current->kecelakaan_lalin_tunggal_jumlah_kejadian));

        $sheet->setCellValue('C287', applyZero($prev->kecelakaan_lalin_tunggal_korban_meninggal));
        $sheet->setCellValue('D287', applyZero($current->kecelakaan_lalin_tunggal_korban_meninggal));

        $sheet->setCellValue('C288', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_berat));
        $sheet->setCellValue('D288', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_berat));

        $sheet->setCellValue('C289', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_ringan));
        $sheet->setCellValue('D289', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_ringan));

        $sheet->setCellValue('C290', applyZero($prev->kecelakaan_lalin_tunggal_materiil));
        $sheet->setCellValue('D290', applyZero($current->kecelakaan_lalin_tunggal_materiil));

        $sheet->setCellValue('C292', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));
        $sheet->setCellValue('D292', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));

        $sheet->setCellValue('C293', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));
        $sheet->setCellValue('D293', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));

        $sheet->setCellValue('C294', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));
        $sheet->setCellValue('D294', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));

        $sheet->setCellValue('C295', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));
        $sheet->setCellValue('D295', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));

        $sheet->setCellValue('C296', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));
        $sheet->setCellValue('D296', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));

        $sheet->setCellValue('C298', applyZero($prev->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));
        $sheet->setCellValue('D298', applyZero($current->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));

        $sheet->setCellValue('C299', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_meninggal));
        $sheet->setCellValue('D299', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_meninggal));

        $sheet->setCellValue('C300', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_berat));
        $sheet->setCellValue('D300', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_berat));

        $sheet->setCellValue('C301', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));
        $sheet->setCellValue('D301', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));

        $sheet->setCellValue('C302', applyZero($prev->kecelakaan_lalin_tabrak_lari_materiil));
        $sheet->setCellValue('D302', applyZero($current->kecelakaan_lalin_tabrak_lari_materiil));

        $sheet->setCellValue('C304', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));
        $sheet->setCellValue('D304', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));

        $sheet->setCellValue('C305', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));
        $sheet->setCellValue('D305', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));

        $sheet->setCellValue('C306', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));
        $sheet->setCellValue('D306', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));

        $sheet->setCellValue('C307', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));
        $sheet->setCellValue('D307', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringanl));

        $sheet->setCellValue('C308', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_materiil));
        $sheet->setCellValue('D308', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_materiil));

        $sheet->setCellValue('C310', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));
        $sheet->setCellValue('D310', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));

        $sheet->setCellValue('C311', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));
        $sheet->setCellValue('D311', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));

        $sheet->setCellValue('C312', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));
        $sheet->setCellValue('D312', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));

        $sheet->setCellValue('C313', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));
        $sheet->setCellValue('D313', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));

        $sheet->setCellValue('C314', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_materiil));
        $sheet->setCellValue('D314', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_materiil));

        $sheet->setCellValue('C316', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));
        $sheet->setCellValue('D316', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));

        $sheet->setCellValue('C317', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));
        $sheet->setCellValue('D317', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));

        $sheet->setCellValue('C318', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));
        $sheet->setCellValue('D318', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));

        $sheet->setCellValue('C319', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));
        $sheet->setCellValue('D319', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));

        $sheet->setCellValue('C320', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));
        $sheet->setCellValue('D320', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));

        $sheet->setCellValue('C322', applyZero($prev->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));
        $sheet->setCellValue('D322', applyZero($current->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));

        $sheet->setCellValue('C323', applyZero($prev->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));
        $sheet->setCellValue('D323', applyZero($current->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));

        $sheet->setCellValue('C324', applyZero($prev->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));
        $sheet->setCellValue('D324', applyZero($current->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));

        $sheet->setCellValue('C325', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));
        $sheet->setCellValue('D325', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));

        $sheet->setCellValue('C326', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));
        $sheet->setCellValue('D326', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));

        $sheet->setCellValue('C327', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_meninggal));
        $sheet->setCellValue('D327', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_meninggal));

        $sheet->setCellValue('C328', applyZero($prev->kecelakaan_lalin_perlintasan_ka_materiil));
        $sheet->setCellValue('D328', applyZero($current->kecelakaan_lalin_perlintasan_ka_materiil));

        $sheet->setCellValue('C330', applyZero($prev->kecelakaan_transportasi_kereta_api));
        $sheet->setCellValue('D330', applyZero($current->kecelakaan_transportasi_kereta_api));

        $sheet->setCellValue('C331', applyZero($prev->kecelakaan_transportasi_laut_perairan));
        $sheet->setCellValue('D331', applyZero($current->kecelakaan_transportasi_laut_perairan));

        $sheet->setCellValue('C332', applyZero($prev->kecelakaan_transportasi_udara));
        $sheet->setCellValue('D332', applyZero($current->kecelakaan_transportasi_udara));

        $sheet->setCellValue('C337', applyZero($prev->penlu_melalui_media_cetak));
        $sheet->setCellValue('D337', applyZero($current->penlu_melalui_media_cetak));

        $sheet->setCellValue('C338', applyZero($prev->penlu_melalui_media_elektronik));
        $sheet->setCellValue('D338', applyZero($current->penlu_melalui_media_elektronik));

        $sheet->setCellValue('C339', applyZero($prev->penlu_melalui_media_sosial));
        $sheet->setCellValue('D339', applyZero($current->penlu_melalui_media_sosial));

        $sheet->setCellValue('C340', applyZero($prev->penlu_melalui_tempat_keramaian));
        $sheet->setCellValue('D340', applyZero($current->penlu_melalui_tempat_keramaian));

        $sheet->setCellValue('C341', applyZero($prev->penlu_melalui_tempat_istirahat));
        $sheet->setCellValue('D341', applyZero($current->penlu_melalui_tempat_istirahat));

        $sheet->setCellValue('C342', applyZero($prev->penlu_melalui_daerah_rawan_laka_dan_langgar));
        $sheet->setCellValue('D342', applyZero($current->penlu_melalui_daerah_rawan_laka_dan_langgar));

        $sheet->setCellValue('C345', applyZero($prev->penyebaran_pemasangan_spanduk));
        $sheet->setCellValue('D345', applyZero($current->penyebaran_pemasangan_spanduk));

        $sheet->setCellValue('C346', applyZero($prev->penyebaran_pemasangan_leaflet));
        $sheet->setCellValue('D346', applyZero($current->penyebaran_pemasangan_leaflet));

        $sheet->setCellValue('C347', applyZero($prev->penyebaran_pemasangan_sticker));
        $sheet->setCellValue('D347', applyZero($current->penyebaran_pemasangan_sticker));

        $sheet->setCellValue('C348', applyZero($prev->penyebaran_pemasangan_bilboard));
        $sheet->setCellValue('D348', applyZero($current->penyebaran_pemasangan_bilboard));

        $sheet->setCellValue('C351', applyZero($prev->polisi_sahabat_anak));
        $sheet->setCellValue('D351', applyZero($current->polisi_sahabat_anak));

        $sheet->setCellValue('C352', applyZero($prev->cara_aman_sekolah));
        $sheet->setCellValue('D352', applyZero($current->cara_aman_sekolah));

        $sheet->setCellValue('C353', applyZero($prev->patroli_keamanan_sekolah));
        $sheet->setCellValue('D353', applyZero($current->patroli_keamanan_sekolah));

        $sheet->setCellValue('C354', applyZero($prev->pramuka_bhayangkara_krida_lalu_lintas));
        $sheet->setCellValue('D354', applyZero($current->pramuka_bhayangkara_krida_lalu_lintas));

        $sheet->setCellValue('C357', applyZero($prev->police_goes_to_campus));
        $sheet->setCellValue('D357', applyZero($current->police_goes_to_campus));

        $sheet->setCellValue('C358', applyZero($prev->safety_riding_driving));
        $sheet->setCellValue('D358', applyZero($current->safety_riding_driving));

        $sheet->setCellValue('C359', applyZero($prev->forum_lalu_lintas_angkutan_umum));
        $sheet->setCellValue('D359', applyZero($current->forum_lalu_lintas_angkutan_umum));

        $sheet->setCellValue('C360', applyZero($prev->kampanye_keselamatan));
        $sheet->setCellValue('D360', applyZero($current->kampanye_keselamatan));

        $sheet->setCellValue('C361', applyZero($prev->sekolah_mengemudi));
        $sheet->setCellValue('D361', applyZero($current->sekolah_mengemudi));

        $sheet->setCellValue('C362', applyZero($prev->taman_lalu_lintas));
        $sheet->setCellValue('D362', applyZero($current->taman_lalu_lintas));

        $sheet->setCellValue('C363', applyZero($prev->global_road_safety_partnership_action));
        $sheet->setCellValue('D363', applyZero($current->global_road_safety_partnership_action));

        $sheet->setCellValue('C367', applyZero($prev->giat_lantas_pengaturan));
        $sheet->setCellValue('D367', applyZero($current->giat_lantas_pengaturan));

        $sheet->setCellValue('C368', applyZero($prev->giat_lantas_penjagaan));
        $sheet->setCellValue('D368', applyZero($current->giat_lantas_penjagaan));

        $sheet->setCellValue('C369', applyZero($prev->giat_lantas_pengawalan));
        $sheet->setCellValue('D369', applyZero($current->giat_lantas_pengawalan));

        $sheet->setCellValue('C370', applyZero($prev->giat_lantas_patroli));
        $sheet->setCellValue('D370', applyZero($current->giat_lantas_patroli));

        $sheet->setCellValue('C375', applyZero($prev->arus_mudik_jumlah_bus_keberangkatan));
        $sheet->setCellValue('D375', applyZero($current->arus_mudik_jumlah_bus_keberangkatan));

        $sheet->setCellValue('C376', applyZero($prev->arus_mudik_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D376', applyZero($current->arus_mudik_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C377', applyZero($prev->arus_mudik_jumlah_bus_kedatangan));
        $sheet->setCellValue('D377', applyZero($current->arus_mudik_jumlah_bus_kedatangan));

        $sheet->setCellValue('C378', applyZero($prev->arus_mudik_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D378', applyZero($current->arus_mudik_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C379', applyZero($prev->arus_mudik_total_terminal));
        $sheet->setCellValue('D379', applyZero($current->arus_mudik_total_terminal));

        $sheet->setCellValue('C380', applyZero($prev->arus_mudik_total_bus_keberangkatan));
        $sheet->setCellValue('D380', applyZero($current->arus_mudik_total_bus_keberangkatan));

        $sheet->setCellValue('C381', applyZero($prev->arus_mudik_penumpang_keberangkatan));
        $sheet->setCellValue('D381', applyZero($current->arus_mudik_penumpang_keberangkatan));

        $sheet->setCellValue('C382', applyZero($prev->arus_mudik_total_bus_kedatangan));
        $sheet->setCellValue('D382', applyZero($current->arus_mudik_total_bus_kedatangan));

        $sheet->setCellValue('C383', applyZero($prev->arus_mudik_penumpang_kedatangan));
        $sheet->setCellValue('D383', applyZero($current->arus_mudik_penumpang_kedatangan));

        $sheet->setCellValue('C385', applyZero($prev->arus_mudik_kereta_api_total_stasiun));
        $sheet->setCellValue('D385', applyZero($current->arus_mudik_kereta_api_total_stasiun));

        $sheet->setCellValue('C386', applyZero($prev->arus_mudik_kereta_api_total_penumpang_keberangkatan));
        $sheet->setCellValue('D386', applyZero($current->arus_mudik_kereta_api_total_penumpang_keberangkatan));

        $sheet->setCellValue('C387', applyZero($prev->arus_mudik_kereta_api_total_penumpang_kedatangan));
        $sheet->setCellValue('D387', applyZero($current->arus_mudik_kereta_api_total_penumpang_kedatangan));

        $sheet->setCellValue('C389', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));
        $sheet->setCellValue('D389', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));

        $sheet->setCellValue('C390', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));
        $sheet->setCellValue('D390', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));

        $sheet->setCellValue('C391', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));
        $sheet->setCellValue('D391', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));

        $sheet->setCellValue('C392', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D392', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C393', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));
        $sheet->setCellValue('D393', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));

        $sheet->setCellValue('C394', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));
        $sheet->setCellValue('D394', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));

        $sheet->setCellValue('C395', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));
        $sheet->setCellValue('D395', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));

        $sheet->setCellValue('C396', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D396', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C397', applyZero($prev->arus_mudik_total_pelabuhan));
        $sheet->setCellValue('D397', applyZero($current->arus_mudik_total_pelabuhan));

        $sheet->setCellValue('C398', applyZero($prev->arus_mudik_pelabuhan_kendaraan_keberangkatan));
        $sheet->setCellValue('D398', applyZero($current->arus_mudik_pelabuhan_kendaraan_keberangkatan));

        $sheet->setCellValue('C399', applyZero($prev->arus_mudik_pelabuhan_kendaraan_kedatangan));
        $sheet->setCellValue('D399', applyZero($current->arus_mudik_pelabuhan_kendaraan_kedatangan));

        $sheet->setCellValue('C400', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_keberangkatan));
        $sheet->setCellValue('D400', applyZero($current->arus_mudik_pelabuhan_total_penumpang_keberangkatan));

        $sheet->setCellValue('C401', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_kedatangan));
        $sheet->setCellValue('D401', applyZero($current->arus_mudik_pelabuhan_total_penumpang_kedatangan));

        $sheet->setCellValue('C403', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D403', applyZero($current->arus_mudik_bandara_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C404', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D404', applyZero($current->arus_mudik_bandara_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C405', applyZero($prev->arus_mudik_total_bandara));
        $sheet->setCellValue('D405', applyZero($current->arus_mudik_total_bandara));

        $sheet->setCellValue('C406', applyZero($prev->arus_mudik_bandara_total_penumpang_keberangkatan));
        $sheet->setCellValue('D406', applyZero($current->arus_mudik_bandara_total_penumpang_keberangkatan));

        $sheet->setCellValue('C407', applyZero($prev->arus_mudik_bandara_total_penumpang_kedatangan));
        $sheet->setCellValue('D407', applyZero($current->arus_mudik_bandara_total_penumpang_kedatangan));

        $sheet->setCellValue('C410', applyZero($prev->prokes_covid_teguran_gar_prokes));
        $sheet->setCellValue('D410', applyZero($current->prokes_covid_teguran_gar_prokes));

        $sheet->setCellValue('C411', applyZero($prev->prokes_covid_pembagian_masker));
        $sheet->setCellValue('D411', applyZero($current->prokes_covid_pembagian_masker));

        $sheet->setCellValue('C412', applyZero($prev->prokes_covid_sosialisasi_tentang_prokes));
        $sheet->setCellValue('D412', applyZero($current->prokes_covid_sosialisasi_tentang_prokes));

        $sheet->setCellValue('C413', applyZero($prev->prokes_covid_giat_baksos));
        $sheet->setCellValue('D413', applyZero($current->prokes_covid_giat_baksos));

        $sheet->setCellValue('C416', applyZero($prev->penyekatan_motor));
        $sheet->setCellValue('D416', applyZero($current->penyekatan_motor));

        $sheet->setCellValue('C417', applyZero($prev->penyekatan_mobil_penumpang));
        $sheet->setCellValue('D417', applyZero($current->penyekatan_mobil_penumpang));

        $sheet->setCellValue('C418', applyZero($prev->penyekatan_mobil_bus));
        $sheet->setCellValue('D418', applyZero($current->penyekatan_mobil_bus));

        $sheet->setCellValue('C419', applyZero($prev->penyekatan_mobil_barang));
        $sheet->setCellValue('D419', applyZero($current->penyekatan_mobil_barang));

        $sheet->setCellValue('C420', applyZero($prev->penyekatan_kendaraan_khusus));
        $sheet->setCellValue('D420', applyZero($current->penyekatan_kendaraan_khusus));


        //write it again to Filesystem with the same name (=replace)
        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');
    }
}

if (! function_exists('excelTemplateDateCompare')) {
    function excelTemplateDateCompare($prev, $current, $kesatuan, $hari_tanggal, $nama_atasan, $pangkat, $jabatan, $nama_laporan, string $customFileName = null, $start_date, $end_date)
    {

        $excelPath = public_path('template/excel');

        $excelTemplate = $excelPath."/format_laporan_operasi_2021_excel_date_compare.xlsx";

        //load spreadsheet
        $spreadsheet = IOFactory::load($excelTemplate);

        $now = now()->format("Y-m-d");

        if(is_null($customFileName) || empty($customFileName)) {
            $filename = 'report-'.$now;
        } else {
            $filename = 'report-'.$customFileName;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');

        //change it
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('B6', $kesatuan); //NAMA KESATUAN
        $sheet->setCellValue('E417', indonesianDate(date("Y-m-d"))); // TEMPAT, TANGGAL
        $sheet->setCellValue('E424', $nama_atasan); // NAMA ATASAN UNTUK TANDA TANGAN
        $sheet->setCellValue('E425', $pangkat); //PANGKAT & NRP
        $sheet->setCellValue('E419', $jabatan); //JABATAN
        //$sheet->setCellValue('A5', $nama_laporan); // NAMA LAPORAN
        $sheet->setCellValue('B7', 'HARI/TGL : '.$hari_tanggal); // DIISI HARI TGL
        $sheet->setCellValue('C10', $start_date);
        $sheet->setCellValue('D10', $end_date);

        $sheet->setCellValue('C14', applyZero($prev->pelanggaran_lalu_lintas_tilang));
        $sheet->setCellValue('D14', applyZero($current->pelanggaran_lalu_lintas_tilang));

        $sheet->setCellValue('C15', applyZero($prev->pelanggaran_lalu_lintas_teguran));
        $sheet->setCellValue('D15', applyZero($current->pelanggaran_lalu_lintas_teguran));

        $sheet->setCellValue('C19', applyZero($prev->pelanggaran_sepeda_motor_kecepatan));
        $sheet->setCellValue('D19', applyZero($current->pelanggaran_sepeda_motor_kecepatan));

        $sheet->setCellValue('C20', applyZero($prev->pelanggaran_sepeda_motor_helm));
        $sheet->setCellValue('D20', applyZero($current->pelanggaran_sepeda_motor_helm));

        $sheet->setCellValue('C21', applyZero($prev->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));
        $sheet->setCellValue('D21', applyZero($current->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));

        $sheet->setCellValue('C22', applyZero($prev->pelanggaran_sepeda_motor_marka_menerus_menyalip));
        $sheet->setCellValue('D22', applyZero($current->pelanggaran_sepeda_motor_marka_menerus_menyalip));

        $sheet->setCellValue('C23', applyZero($prev->pelanggaran_sepeda_motor_melawan_arus));
        $sheet->setCellValue('D23', applyZero($current->pelanggaran_sepeda_motor_melawan_arus));

        $sheet->setCellValue('C24', applyZero($prev->pelanggaran_sepeda_motor_melanggar_lampu_lalin));
        $sheet->setCellValue('D24', applyZero($current->pelanggaran_sepeda_motor_melanggar_lampu_lalin));

        $sheet->setCellValue('C25', applyZero($prev->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));
        $sheet->setCellValue('D25', applyZero($current->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));

        $sheet->setCellValue('C26', applyZero($prev->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D26', applyZero($current->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C27', applyZero($prev->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));
        $sheet->setCellValue('D27', applyZero($current->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));

        $sheet->setCellValue('C28', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D28', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C29', applyZero($prev->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D29', applyZero($current->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C30', applyZero($prev->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D30', applyZero($current->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C31', applyZero($prev->pelanggaran_sepeda_motor_melanggar_marka_berhenti));
        $sheet->setCellValue('D31', applyZero($current->pelanggaran_sepeda_motor_melanggar_marka_berhenti));

        $sheet->setCellValue('C32', applyZero($prev->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D32', applyZero($current->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C33', applyZero($prev->pelanggaran_sepeda_motor_surat_surat));
        $sheet->setCellValue('D33', applyZero($current->pelanggaran_sepeda_motor_surat_surat));

        $sheet->setCellValue('C34', applyZero($prev->pelanggaran_sepeda_motor_kelengkapan_kendaraan));
        $sheet->setCellValue('D34', applyZero($current->pelanggaran_sepeda_motor_kelengkapan_kendaraan));

        $sheet->setCellValue('C35', applyZero($prev->pelanggaran_sepeda_motor_lain_lain));
        $sheet->setCellValue('D35', applyZero($current->pelanggaran_sepeda_motor_lain_lain));

        $sheet->setCellValue('C38', applyZero($prev->pelanggaran_mobil_kecepatan));
        $sheet->setCellValue('D38', applyZero($current->pelanggaran_mobil_kecepatan));

        $sheet->setCellValue('C39', applyZero($prev->pelanggaran_mobil_safety_belt));
        $sheet->setCellValue('D39', applyZero($current->pelanggaran_mobil_safety_belt));

        $sheet->setCellValue('C40', applyZero($prev->pelanggaran_mobil_muatan_overload));
        $sheet->setCellValue('D40', applyZero($current->pelanggaran_mobil_muatan_overload));

        $sheet->setCellValue('C41', applyZero($prev->pelanggaran_mobil_marka_menerus_menyalip));
        $sheet->setCellValue('D41', applyZero($current->pelanggaran_mobil_marka_menerus_menyalip));

        $sheet->setCellValue('C42', applyZero($prev->pelanggaran_mobil_melawan_arus));
        $sheet->setCellValue('D42', applyZero($current->pelanggaran_mobil_melawan_arus));

        $sheet->setCellValue('C43', applyZero($prev->pelanggaran_mobil_melanggar_lampu_lalin));
        $sheet->setCellValue('D43', applyZero($current->pelanggaran_mobil_melanggar_lampu_lalin));

        $sheet->setCellValue('C44', applyZero($prev->pelanggaran_mobil_mengemudi_tidak_wajar));
        $sheet->setCellValue('D44', applyZero($current->pelanggaran_mobil_mengemudi_tidak_wajar));

        $sheet->setCellValue('C45', applyZero($prev->pelanggaran_mobil_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D45', applyZero($current->pelanggaran_mobil_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C46', applyZero($prev->pelanggaran_mobil_tidak_nyala_lampu_malam));
        $sheet->setCellValue('D46', applyZero($current->pelanggaran_mobil_tidak_nyala_lampu_malam));

        $sheet->setCellValue('C47', applyZero($prev->pelanggaran_mobil_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D47', applyZero($current->pelanggaran_mobil_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C48', applyZero($prev->pelanggaran_mobil_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D48', applyZero($current->pelanggaran_mobil_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C49', applyZero($prev->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D49', applyZero($current->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C50', applyZero($prev->pelanggaran_mobil_melanggar_marka_berhenti));
        $sheet->setCellValue('D50', applyZero($current->pelanggaran_mobil_melanggar_marka_berhenti));

        $sheet->setCellValue('C51', applyZero($prev->pelanggaran_mobil_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D51', applyZero($current->pelanggaran_mobil_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C52', applyZero($prev->pelanggaran_mobil_surat_surat));
        $sheet->setCellValue('D52', applyZero($current->pelanggaran_mobil_surat_surat));

        $sheet->setCellValue('C53', applyZero($prev->pelanggaran_mobil_kelengkapan_kendaraan));
        $sheet->setCellValue('D53', applyZero($current->pelanggaran_mobil_kelengkapan_kendaraan));

        $sheet->setCellValue('C54', applyZero($prev->pelanggaran_mobil_lain_lain));
        $sheet->setCellValue('D54', applyZero($current->pelanggaran_mobil_lain_lain));

        $sheet->setCellValue('C57', applyZero($prev->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));
        $sheet->setCellValue('D57', applyZero($current->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));

        $sheet->setCellValue('C60', applyZero($prev->barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D60', applyZero($current->barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C61', applyZero($prev->barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D61', applyZero($current->barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C62', applyZero($prev->barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D62', applyZero($current->barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C65', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));
        $sheet->setCellValue('D65', applyZero($current->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));

        $sheet->setCellValue('C66', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));
        $sheet->setCellValue('D66', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));

        $sheet->setCellValue('C67', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_bus));
        $sheet->setCellValue('D67', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_bus));

        $sheet->setCellValue('C68', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_barang));
        $sheet->setCellValue('D68', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_barang));

        $sheet->setCellValue('C69', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));
        $sheet->setCellValue('D69', applyZero($current->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));

        $sheet->setCellValue('C72', applyZero($prev->profesi_pelaku_pelanggaran_pns));
        $sheet->setCellValue('D72', applyZero($current->profesi_pelaku_pelanggaran_pns));

        $sheet->setCellValue('C73', applyZero($prev->profesi_pelaku_pelanggaran_karyawan_swasta));
        $sheet->setCellValue('D73', applyZero($current->profesi_pelaku_pelanggaran_karyawan_swasta));

        $sheet->setCellValue('C74', applyZero($prev->profesi_pelaku_pelanggaran_pelajar_mahasiswa));
        $sheet->setCellValue('D74', applyZero($current->profesi_pelaku_pelanggaran_pelajar_mahasiswa));

        $sheet->setCellValue('C75', applyZero($prev->profesi_pelaku_pelanggaran_pengemudi_supir));
        $sheet->setCellValue('D75', applyZero($current->profesi_pelaku_pelanggaran_pengemudi_supir));

        $sheet->setCellValue('C76', applyZero($prev->profesi_pelaku_pelanggaran_tni));
        $sheet->setCellValue('D76', applyZero($current->profesi_pelaku_pelanggaran_tni));

        $sheet->setCellValue('C77', applyZero($prev->profesi_pelaku_pelanggaran_polri));
        $sheet->setCellValue('D77', applyZero($current->profesi_pelaku_pelanggaran_polri));

        $sheet->setCellValue('C78', applyZero($prev->profesi_pelaku_pelanggaran_lain_lain));
        $sheet->setCellValue('D78', applyZero($current->profesi_pelaku_pelanggaran_lain_lain));

        $sheet->setCellValue('C81', applyZero($prev->usia_pelaku_pelanggaran_kurang_dari_15_tahun));
        $sheet->setCellValue('D81', applyZero($current->usia_pelaku_pelanggaran_kurang_dari_15_tahun));

        $sheet->setCellValue('C82', applyZero($prev->usia_pelaku_pelanggaran_16_20_tahun));
        $sheet->setCellValue('D82', applyZero($current->usia_pelaku_pelanggaran_16_20_tahun));

        $sheet->setCellValue('C83', applyZero($prev->usia_pelaku_pelanggaran_21_25_tahun));
        $sheet->setCellValue('D83', applyZero($current->usia_pelaku_pelanggaran_21_25_tahun));

        $sheet->setCellValue('C84', applyZero($prev->usia_pelaku_pelanggaran_26_30_tahun));
        $sheet->setCellValue('D84', applyZero($current->usia_pelaku_pelanggaran_26_30_tahun));

        $sheet->setCellValue('C85', applyZero($prev->usia_pelaku_pelanggaran_31_35_tahun));
        $sheet->setCellValue('D85', applyZero($current->usia_pelaku_pelanggaran_31_35_tahun));

        $sheet->setCellValue('C86', applyZero($prev->usia_pelaku_pelanggaran_36_40_tahun));
        $sheet->setCellValue('D86', applyZero($current->usia_pelaku_pelanggaran_36_40_tahun));

        $sheet->setCellValue('C87', applyZero($prev->uusia_pelaku_pelanggaran_41_45_tahun));
        $sheet->setCellValue('D87', applyZero($current->usia_pelaku_pelanggaran_41_45_tahun));

        $sheet->setCellValue('C88', applyZero($prev->usia_pelaku_pelanggaran_46_50_tahunn));
        $sheet->setCellValue('D88', applyZero($current->usia_pelaku_pelanggaran_46_50_tahun));

        $sheet->setCellValue('C89', applyZero($prev->usia_pelaku_pelanggaran_51_55_tahunn));
        $sheet->setCellValue('D89', applyZero($current->usia_pelaku_pelanggaran_51_55_tahun));

        $sheet->setCellValue('C90', applyZero($prev->usia_pelaku_pelanggaran_56_60_tahun));
        $sheet->setCellValue('D90', applyZero($current->usia_pelaku_pelanggaran_56_60_tahun));

        $sheet->setCellValue('C91', applyZero($prev->usia_pelaku_pelanggaran_diatas_60_tahun));
        $sheet->setCellValue('D91', applyZero($current->usia_pelaku_pelanggaran_diatas_60_tahun));

        $sheet->setCellValue('C94', applyZero($prev->sim_pelaku_pelanggaran_sim_a));
        $sheet->setCellValue('D94', applyZero($current->sim_pelaku_pelanggaran_sim_a));

        $sheet->setCellValue('C95', applyZero($prev->sim_pelaku_pelanggaran_sim_a_umum));
        $sheet->setCellValue('D95', applyZero($current->sim_pelaku_pelanggaran_sim_a_umum));

        $sheet->setCellValue('C96', applyZero($prev->sim_pelaku_pelanggaran_sim_b1));
        $sheet->setCellValue('D96', applyZero($current->sim_pelaku_pelanggaran_sim_b1));

        $sheet->setCellValue('C97', applyZero($prev->sim_pelaku_pelanggaran_sim_b1_umum));
        $sheet->setCellValue('D97', applyZero($current->sim_pelaku_pelanggaran_sim_b1_umum));

        $sheet->setCellValue('C98', applyZero($prev->sim_pelaku_pelanggaran_sim_b2));
        $sheet->setCellValue('D98', applyZero($current->sim_pelaku_pelanggaran_sim_b2));

        $sheet->setCellValue('C99', applyZero($prev->sim_pelaku_pelanggaran_sim_b2_umum));
        $sheet->setCellValue('D99', applyZero($current->sim_pelaku_pelanggaran_sim_b2_umum));

        $sheet->setCellValue('C100', applyZero($prev->sim_pelaku_pelanggaran_sim_c));
        $sheet->setCellValue('D100', applyZero($current->sim_pelaku_pelanggaran_sim_c));

        $sheet->setCellValue('C101', applyZero($prev->sim_pelaku_pelanggaran_sim_d));
        $sheet->setCellValue('D101', applyZero($current->sim_pelaku_pelanggaran_sim_d));

        $sheet->setCellValue('C102', applyZero($prev->sim_pelaku_pelanggaran_sim_internasional));
        $sheet->setCellValue('D102', applyZero($current->sim_pelaku_pelanggaran_sim_internasional));

        $sheet->setCellValue('C103', applyZero($prev->sim_pelaku_pelanggaran_tanpa_sim));
        $sheet->setCellValue('D103', applyZero($current->sim_pelaku_pelanggaran_tanpa_sim));

        $sheet->setCellValue('C107', applyZero($prev->lokasi_pelanggaran_pemukiman));
        $sheet->setCellValue('D107', applyZero($current->lokasi_pelanggaran_pemukiman));

        $sheet->setCellValue('C108', applyZero($prev->lokasi_pelanggaran_perbelanjaan));
        $sheet->setCellValue('D108', applyZero($current->lokasi_pelanggaran_perbelanjaan));

        $sheet->setCellValue('C109', applyZero($prev->lokasi_pelanggaran_perkantoran));
        $sheet->setCellValue('D109', applyZero($current->lokasi_pelanggaran_perkantoran));

        $sheet->setCellValue('C110', applyZero($prev->lokasi_pelanggaran_wisata));
        $sheet->setCellValue('D110', applyZero($current->lokasi_pelanggaran_wisata));

        $sheet->setCellValue('C111', applyZero($prev->lokasi_pelanggaran_industri));
        $sheet->setCellValue('D111', applyZero($current->lokasi_pelanggaran_industri));

        $sheet->setCellValue('C114', applyZero($prev->lokasi_pelanggaran_status_jalan_nasional));
        $sheet->setCellValue('D114', applyZero($current->lokasi_pelanggaran_status_jalan_nasional));

        $sheet->setCellValue('C115', applyZero($prev->lokasi_pelanggaran_status_jalan_propinsi));
        $sheet->setCellValue('D115', applyZero($current->lokasi_pelanggaran_status_jalan_propinsi));

        $sheet->setCellValue('C116', applyZero($prev->lokasi_pelanggaran_status_jalan_kab_kota));
        $sheet->setCellValue('D116', applyZero($current->lokasi_pelanggaran_status_jalan_kab_kota));

        $sheet->setCellValue('C117', applyZero($prev->lokasi_pelanggaran_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D117', applyZero($current->lokasi_pelanggaran_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C120', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_arteri));
        $sheet->setCellValue('D120', applyZero($current->lokasi_pelanggaran_fungsi_jalan_arteri));

        $sheet->setCellValue('C121', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_kolektor));
        $sheet->setCellValue('D121', applyZero($current->lokasi_pelanggaran_fungsi_jalan_kolektor));

        $sheet->setCellValue('C122', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lokal));
        $sheet->setCellValue('D122', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lokal));

        $sheet->setCellValue('C123', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D123', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C127', applyZero($prev->kecelakaan_lalin_jumlah_kejadian));
        $sheet->setCellValue('D127', applyZero($current->kecelakaan_lalin_jumlah_kejadian));

        $sheet->setCellValue('C128', applyZero($prev->kecelakaan_lalin_jumlah_korban_meninggal));
        $sheet->setCellValue('D128', applyZero($current->kecelakaan_lalin_jumlah_korban_meninggal));

        $sheet->setCellValue('C129', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_berat));
        $sheet->setCellValue('D129', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_beratn));

        $sheet->setCellValue('C130', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_ringan));
        $sheet->setCellValue('D130', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_ringan));

        $sheet->setCellValue('C131', applyZero($prev->kecelakaan_lalin_jumlah_kerugian_materiil));
        $sheet->setCellValue('D131', applyZero($current->kecelakaan_lalin_jumlah_kerugian_materiil));

        $sheet->setCellValue('C133', applyZero($prev->kecelakaan_barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D133', applyZero($current->kecelakaan_barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C134', applyZero($prev->kecelakaan_barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D134', applyZero($current->kecelakaan_barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C135', applyZero($prev->kecelakaan_barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D135', applyZero($current->kecelakaan_barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C138', applyZero($prev->profesi_korban_kecelakaan_lalin_pns));
        $sheet->setCellValue('D138', applyZero($current->profesi_korban_kecelakaan_lalin_pns));

        $sheet->setCellValue('C139', applyZero($prev->profesi_korban_kecelakaan_lalin_karwayan_swasta));
        $sheet->setCellValue('D139', applyZero($current->profesi_korban_kecelakaan_lalin_karwayan_swasta));

        $sheet->setCellValue('C140', applyZero($prev->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));
        $sheet->setCellValue('D140', applyZero($current->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));

        $sheet->setCellValue('C141', applyZero($prev->profesi_korban_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D141', applyZero($current->profesi_korban_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C142', applyZero($prev->profesi_korban_kecelakaan_lalin_tni));
        $sheet->setCellValue('D142', applyZero($current->profesi_korban_kecelakaan_lalin_tni));

        $sheet->setCellValue('C143', applyZero($prev->profesi_korban_kecelakaan_lalin_polri));
        $sheet->setCellValue('D143', applyZero($current->profesi_korban_kecelakaan_lalin_polri));

        $sheet->setCellValue('C144', applyZero($prev->profesi_korban_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D144', applyZero($current->profesi_korban_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C147', applyZero($prev->usia_korban_kecelakaan_kurang_15));
        $sheet->setCellValue('D147', applyZero($current->usia_korban_kecelakaan_kurang_15));

        $sheet->setCellValue('C148', applyZero($prev->usia_korban_kecelakaan_16_20));
        $sheet->setCellValue('D148', applyZero($current->usia_korban_kecelakaan_16_20));

        $sheet->setCellValue('C149', applyZero($prev->usia_korban_kecelakaan_21_25));
        $sheet->setCellValue('D149', applyZero($current->usia_korban_kecelakaan_21_25));

        $sheet->setCellValue('C150', applyZero($prev->usia_korban_kecelakaan_26_30));
        $sheet->setCellValue('D150', applyZero($current->usia_korban_kecelakaan_26_30));

        $sheet->setCellValue('C151', applyZero($prev->usia_korban_kecelakaan_31_35));
        $sheet->setCellValue('D151', applyZero($current->usia_korban_kecelakaan_31_35));

        $sheet->setCellValue('C152', applyZero($prev->usia_korban_kecelakaan_36_40));
        $sheet->setCellValue('D152', applyZero($current->usia_korban_kecelakaan_36_40));

        $sheet->setCellValue('C153', applyZero($prev->usia_korban_kecelakaan_41_45));
        $sheet->setCellValue('D153', applyZero($current->usia_korban_kecelakaan_41_45));

        $sheet->setCellValue('C154', applyZero($prev->usia_korban_kecelakaan_45_50));
        $sheet->setCellValue('D154', applyZero($current->usia_korban_kecelakaan_45_50));

        $sheet->setCellValue('C155', applyZero($prev->usia_korban_kecelakaan_51_55));
        $sheet->setCellValue('D155', applyZero($current->usia_korban_kecelakaan_51_55));

        $sheet->setCellValue('C156', applyZero($prev->usia_korban_kecelakaan_56_60));
        $sheet->setCellValue('D156', applyZero($current->usia_korban_kecelakaan_56_60));

        $sheet->setCellValue('C157', applyZero($prev->usia_korban_kecelakaan_diatas_60));
        $sheet->setCellValue('D157', applyZero($current->usia_korban_kecelakaan_diatas_60));

        $sheet->setCellValue('C160', applyZero($prev->sim_korban_kecelakaan_sim_a));
        $sheet->setCellValue('D160', applyZero($current->sim_korban_kecelakaan_sim_a));

        $sheet->setCellValue('C161', applyZero($prev->sim_korban_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D161', applyZero($current->sim_korban_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C162', applyZero($prev->sim_korban_kecelakaan_sim_b1));
        $sheet->setCellValue('D162', applyZero($current->sim_korban_kecelakaan_sim_b1));

        $sheet->setCellValue('C163', applyZero($prev->sim_korban_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D163', applyZero($current->sim_korban_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C164', applyZero($prev->sim_korban_kecelakaan_sim_b2));
        $sheet->setCellValue('D164', applyZero($current->sim_korban_kecelakaan_sim_b2));

        $sheet->setCellValue('C165', applyZero($prev->sim_korban_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D165', applyZero($current->sim_korban_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C166', applyZero($prev->sim_korban_kecelakaan_sim_c));
        $sheet->setCellValue('D166', applyZero($current->sim_korban_kecelakaan_sim_c));

        $sheet->setCellValue('C167', applyZero($prev->sim_korban_kecelakaan_sim_d));
        $sheet->setCellValue('D167', applyZero($current->sim_korban_kecelakaan_sim_d));

        $sheet->setCellValue('C168', applyZero($prev->sim_korban_kecelakaan_sim_internasional));
        $sheet->setCellValue('D168', applyZero($current->sim_korban_kecelakaan_sim_internasional));

        $sheet->setCellValue('C169', applyZero($prev->sim_korban_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D169', applyZero($current->sim_korban_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C172', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));
        $sheet->setCellValue('D172', applyZero($current->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));

        $sheet->setCellValue('C173', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));
        $sheet->setCellValue('D173', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));

        $sheet->setCellValue('C174', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_bus));
        $sheet->setCellValue('D174', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_bus));

        $sheet->setCellValue('C175', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_barang));
        $sheet->setCellValue('D175', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_barang));

        $sheet->setCellValue('C176', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));
        $sheet->setCellValue('D176', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));

        $sheet->setCellValue('C177', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));
        $sheet->setCellValue('D177', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));

        $sheet->setCellValue('C180', applyZero($prev->jenis_kecelakaan_tunggal_ooc));
        $sheet->setCellValue('D180', applyZero($current->jenis_kecelakaan_tunggal_ooc));

        $sheet->setCellValue('C181', applyZero($prev->jenis_kecelakaan_depan_depan));
        $sheet->setCellValue('D181', applyZero($current->jenis_kecelakaan_depan_depan));

        $sheet->setCellValue('C182', applyZero($prev->jenis_kecelakaan_depan_belakang));
        $sheet->setCellValue('D182', applyZero($current->jenis_kecelakaan_depan_belakang));

        $sheet->setCellValue('C183', applyZero($prev->jenis_kecelakaan_depan_samping));
        $sheet->setCellValue('D183', applyZero($current->jenis_kecelakaan_depan_samping));

        $sheet->setCellValue('C184', applyZero($prev->jenis_kecelakaan_beruntun));
        $sheet->setCellValue('D184', applyZero($current->jenis_kecelakaan_beruntun));

        $sheet->setCellValue('C185', applyZero($prev->jenis_kecelakaan_pejalan_kaki));
        $sheet->setCellValue('D185', applyZero($current->jenis_kecelakaan_pejalan_kaki));

        $sheet->setCellValue('C186', applyZero($prev->jenis_kecelakaan_tabrak_lari));
        $sheet->setCellValue('D186', applyZero($current->jenis_kecelakaan_tabrak_lari));

        $sheet->setCellValue('C187', applyZero($prev->jenis_kecelakaan_tabrak_hewan));
        $sheet->setCellValue('D187', applyZero($current->jenis_kecelakaan_tabrak_hewan));

        $sheet->setCellValue('C188', applyZero($prev->jenis_kecelakaan_samping_samping));
        $sheet->setCellValue('D188', applyZero($current->jenis_kecelakaan_samping_samping));

        $sheet->setCellValue('C189', applyZero($prev->jenis_kecelakaan_lainnya));
        $sheet->setCellValue('D189', applyZero($current->jenis_kecelakaan_lainnya));

        $sheet->setCellValue('C192', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pns));
        $sheet->setCellValue('D192', applyZero($current->profesi_pelaku_kecelakaan_lalin_pns));

        $sheet->setCellValue('C193', applyZero($prev->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));
        $sheet->setCellValue('D193', applyZero($current->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));

        $sheet->setCellValue('C194', applyZero($prev->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));
        $sheet->setCellValue('D194', applyZero($current->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));

        $sheet->setCellValue('C195', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D195', applyZero($current->profesi_pelaku_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C196', applyZero($prev->profesi_pelaku_kecelakaan_lalin_tni));
        $sheet->setCellValue('D196', applyZero($current->profesi_pelaku_kecelakaan_lalin_tni));

        $sheet->setCellValue('C197', applyZero($prev->profesi_pelaku_kecelakaan_lalin_polri));
        $sheet->setCellValue('D197', applyZero($current->profesi_pelaku_kecelakaan_lalin_polri));

        $sheet->setCellValue('C198', applyZero($prev->profesi_pelaku_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D198', applyZero($current->profesi_pelaku_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C201', applyZero($prev->usia_pelaku_kecelakaan_kurang_dari_15_tahun));
        $sheet->setCellValue('D201', applyZero($current->usia_pelaku_kecelakaan_kurang_dari_15_tahun));

        $sheet->setCellValue('C202', applyZero($prev->usia_pelaku_kecelakaan_16_20_tahun));
        $sheet->setCellValue('D202', applyZero($current->usia_pelaku_kecelakaan_16_20_tahun));

        $sheet->setCellValue('C203', applyZero($prev->usia_pelaku_kecelakaan_21_25_tahun));
        $sheet->setCellValue('D203', applyZero($current->usia_pelaku_kecelakaan_21_25_tahun));

        $sheet->setCellValue('C204', applyZero($prev->usia_pelaku_kecelakaan_26_30_tahun));
        $sheet->setCellValue('D204', applyZero($current->usia_pelaku_kecelakaan_26_30_tahun));

        $sheet->setCellValue('C205', applyZero($prev->usia_pelaku_kecelakaan_31_35_tahun));
        $sheet->setCellValue('D205', applyZero($current->usia_pelaku_kecelakaan_31_35_tahun));

        $sheet->setCellValue('C206', applyZero($prev->usia_pelaku_kecelakaan_36_40_tahun));
        $sheet->setCellValue('D206', applyZero($current->usia_pelaku_kecelakaan_36_40_tahun));

        $sheet->setCellValue('C207', applyZero($prev->usia_pelaku_kecelakaan_41_45_tahun));
        $sheet->setCellValue('D207', applyZero($current->usia_pelaku_kecelakaan_41_45_tahun));

        $sheet->setCellValue('C208', applyZero($prev->usia_pelaku_kecelakaan_46_50_tahun));
        $sheet->setCellValue('D208', applyZero($current->usia_pelaku_kecelakaan_46_50_tahun));

        $sheet->setCellValue('C209', applyZero($prev->usia_pelaku_kecelakaan_51_55_tahun));
        $sheet->setCellValue('D209', applyZero($current->usia_pelaku_kecelakaan_51_55_tahun));

        $sheet->setCellValue('C210', applyZero($prev->usia_pelaku_kecelakaan_56_60_tahun));
        $sheet->setCellValue('D210', applyZero($current->usia_pelaku_kecelakaan_56_60_tahun));

        $sheet->setCellValue('C211', applyZero($prev->usia_pelaku_kecelakaan_diatas_60_tahun));
        $sheet->setCellValue('D211', applyZero($current->usia_pelaku_kecelakaan_diatas_60_tahun));

        $sheet->setCellValue('C214', applyZero($prev->sim_pelaku_kecelakaan_sim_a));
        $sheet->setCellValue('D214', applyZero($current->sim_pelaku_kecelakaan_sim_a));

        $sheet->setCellValue('C215', applyZero($prev->sim_pelaku_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D215', applyZero($current->sim_pelaku_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C216', applyZero($prev->sim_pelaku_kecelakaan_sim_b1));
        $sheet->setCellValue('D216', applyZero($current->sim_pelaku_kecelakaan_sim_b1));

        $sheet->setCellValue('C217', applyZero($prev->sim_pelaku_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D217', applyZero($current->sim_pelaku_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C218', applyZero($prev->sim_pelaku_kecelakaan_sim_b2));
        $sheet->setCellValue('D218', applyZero($current->sim_pelaku_kecelakaan_sim_b2));

        $sheet->setCellValue('C219', applyZero($prev->sim_pelaku_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D219', applyZero($current->sim_pelaku_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C220', applyZero($prev->sim_pelaku_kecelakaan_sim_c));
        $sheet->setCellValue('D220', applyZero($current->sim_pelaku_kecelakaan_sim_c));

        $sheet->setCellValue('C221', applyZero($prev->sim_pelaku_kecelakaan_sim_dn));
        $sheet->setCellValue('D221', applyZero($current->sim_pelaku_kecelakaan_sim_d));

        $sheet->setCellValue('C222', applyZero($prev->sim_pelaku_kecelakaan_sim_internasional));
        $sheet->setCellValue('D222', applyZero($current->sim_pelaku_kecelakaan_sim_internasional));

        $sheet->setCellValue('C223', applyZero($prev->sim_pelaku_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D223', applyZero($current->sim_pelaku_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C227', applyZero($prev->lokasi_kecelakaan_lalin_pemukiman));
        $sheet->setCellValue('D227', applyZero($current->lokasi_kecelakaan_lalin_pemukiman));

        $sheet->setCellValue('C228', applyZero($prev->lokasi_kecelakaan_lalin_perbelanjaan));
        $sheet->setCellValue('D228', applyZero($current->lokasi_kecelakaan_lalin_perbelanjaan));

        $sheet->setCellValue('C229', applyZero($prev->lokasi_kecelakaan_lalin_perkantoran));
        $sheet->setCellValue('D229', applyZero($current->lokasi_kecelakaan_lalin_perkantoran));

        $sheet->setCellValue('C230', applyZero($prev->lokasi_kecelakaan_lalin_wisata));
        $sheet->setCellValue('D230', applyZero($current->lokasi_kecelakaan_lalin_wisata));

        $sheet->setCellValue('C231', applyZero($prev->lokasi_kecelakaan_lalin_industri));
        $sheet->setCellValue('D231', applyZero($current->lokasi_kecelakaan_lalin_industri));

        $sheet->setCellValue('C232', applyZero($prev->lokasi_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D232', applyZero($current->lokasi_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C235', applyZero($prev->lokasi_kecelakaan_status_jalan_nasional));
        $sheet->setCellValue('D235', applyZero($current->lokasi_kecelakaan_status_jalan_nasional));

        $sheet->setCellValue('C236', applyZero($prev->lokasi_kecelakaan_status_jalan_propinsi));
        $sheet->setCellValue('D236', applyZero($current->lokasi_kecelakaan_status_jalan_propinsi));

        $sheet->setCellValue('C237', applyZero($prev->lokasi_kecelakaan_status_jalan_kab_kota));
        $sheet->setCellValue('D237', applyZero($current->lokasi_kecelakaan_status_jalan_kab_kota));

        $sheet->setCellValue('C238', applyZero($prev->lokasi_kecelakaan_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D238', applyZero($current->lokasi_kecelakaan_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C241', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_arteri));
        $sheet->setCellValue('D241', applyZero($current->lokasi_kecelakaan_fungsi_jalan_arteri));

        $sheet->setCellValue('C242', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_kolektor));
        $sheet->setCellValue('D242', applyZero($current->lokasi_kecelakaan_fungsi_jalan_kolektor));

        $sheet->setCellValue('C243', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lokal));
        $sheet->setCellValue('D243', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lokal));

        $sheet->setCellValue('C244', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D244', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C247', applyZero($prev->faktor_penyebab_kecelakaan_manusia));
        $sheet->setCellValue('D247', applyZero($current->faktor_penyebab_kecelakaan_manusia));

        $sheet->setCellValue('C248', applyZero($prev->faktor_penyebab_kecelakaan_ngantuk_lelah));
        $sheet->setCellValue('D248', applyZero($current->faktor_penyebab_kecelakaan_ngantuk_lelah));

        $sheet->setCellValue('C249', applyZero($prev->faktor_penyebab_kecelakaan_mabuk_obat));
        $sheet->setCellValue('D249', applyZero($current->faktor_penyebab_kecelakaan_mabuk_obat));

        $sheet->setCellValue('C250', applyZero($prev->faktor_penyebab_kecelakaan_sakit));
        $sheet->setCellValue('D250', applyZero($current->faktor_penyebab_kecelakaan_sakit));

        $sheet->setCellValue('C251', applyZero($prev->faktor_penyebab_kecelakaan_handphone_elektronik));
        $sheet->setCellValue('D251', applyZero($current->faktor_penyebab_kecelakaan_handphone_elektronik));

        $sheet->setCellValue('C252', applyZero($prev->faktor_penyebab_kecelakaan_menerobos_lampu_merah));
        $sheet->setCellValue('D252', applyZero($current->faktor_penyebab_kecelakaan_menerobos_lampu_merah));

        $sheet->setCellValue('C253', applyZero($prev->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));
        $sheet->setCellValue('D253', applyZero($current->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));

        $sheet->setCellValue('C254', applyZero($prev->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));
        $sheet->setCellValue('D254', applyZero($current->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));

        $sheet->setCellValue('C255', applyZero($prev->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));
        $sheet->setCellValue('D255', applyZero($current->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));

        $sheet->setCellValue('C256', applyZero($prev->faktor_penyebab_kecelakaan_berpindah_jalur));
        $sheet->setCellValue('D256', applyZero($current->faktor_penyebab_kecelakaan_berpindah_jalur));

        $sheet->setCellValue('C257', applyZero($prev->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));
        $sheet->setCellValue('D257', applyZero($current->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));

        $sheet->setCellValue('C258', applyZero($prev->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));
        $sheet->setCellValue('D258', applyZero($current->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));

        $sheet->setCellValue('C259', applyZero($prev->faktor_penyebab_kecelakaan_lainnya));
        $sheet->setCellValue('D259', applyZero($current->faktor_penyebab_kecelakaan_lainnya));

        $sheet->setCellValue('C260', applyZero($prev->faktor_penyebab_kecelakaan_alam));
        $sheet->setCellValue('D260', applyZero($current->faktor_penyebab_kecelakaan_alam));

        $sheet->setCellValue('C261', applyZero($prev->faktor_penyebab_kecelakaan_kelaikan_kendaraan));
        $sheet->setCellValue('D261', applyZero($current->faktor_penyebab_kecelakaan_kelaikan_kendaraan));

        $sheet->setCellValue('C262', applyZero($prev->faktor_penyebab_kecelakaan_kondisi_jalan));
        $sheet->setCellValue('D262', applyZero($current->faktor_penyebab_kecelakaan_kondisi_jalan));

        $sheet->setCellValue('C263', applyZero($prev->faktor_penyebab_kecelakaan_prasarana_jalan));
        $sheet->setCellValue('D263', applyZero($current->faktor_penyebab_kecelakaan_prasarana_jalan));

        $sheet->setCellValue('C264', applyZero($prev->faktor_penyebab_kecelakaan_rambu));
        $sheet->setCellValue('D264', applyZero($current->faktor_penyebab_kecelakaan_rambu));

        $sheet->setCellValue('C265', applyZero($prev->faktor_penyebab_kecelakaan_marka));
        $sheet->setCellValue('D265', applyZero($current->faktor_penyebab_kecelakaan_marka));

        $sheet->setCellValue('C266', applyZero($prev->faktor_penyebab_kecelakaan_apil));
        $sheet->setCellValue('D266', applyZero($current->faktor_penyebab_kecelakaan_apil));

        $sheet->setCellValue('C267', applyZero($prev->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));
        $sheet->setCellValue('D267', applyZero($current->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));

        $sheet->setCellValue('C270', applyZero($prev->waktu_kejadian_kecelakaan_00_03));
        $sheet->setCellValue('D270', applyZero($current->waktu_kejadian_kecelakaan_00_03));

        $sheet->setCellValue('C271', applyZero($prev->waktu_kejadian_kecelakaan_03_06));
        $sheet->setCellValue('D271', applyZero($current->waktu_kejadian_kecelakaan_03_06));

        $sheet->setCellValue('C272', applyZero($prev->waktu_kejadian_kecelakaan_06_09));
        $sheet->setCellValue('D272', applyZero($current->waktu_kejadian_kecelakaan_06_09));

        $sheet->setCellValue('C273', applyZero($prev->waktu_kejadian_kecelakaan_09_12));
        $sheet->setCellValue('D273', applyZero($current->waktu_kejadian_kecelakaan_09_12));

        $sheet->setCellValue('C274', applyZero($prev->waktu_kejadian_kecelakaan_12_15));
        $sheet->setCellValue('D274', applyZero($current->waktu_kejadian_kecelakaan_12_15));

        $sheet->setCellValue('C275', applyZero($prev->waktu_kejadian_kecelakaan_15_18));
        $sheet->setCellValue('D275', applyZero($current->waktu_kejadian_kecelakaan_15_18));

        $sheet->setCellValue('C276', applyZero($prev->waktu_kejadian_kecelakaan_18_21));
        $sheet->setCellValue('D276', applyZero($current->waktu_kejadian_kecelakaan_18_21));

        $sheet->setCellValue('C277', applyZero($prev->waktu_kejadian_kecelakaan_21_24));
        $sheet->setCellValue('D277', applyZero($current->waktu_kejadian_kecelakaan_21_24));

        $sheet->setCellValue('C280', applyZero($prev->kecelakaan_lalin_menonjol_jumlah_kejadian));
        $sheet->setCellValue('D280', applyZero($current->kecelakaan_lalin_menonjol_jumlah_kejadian));

        $sheet->setCellValue('C281', applyZero($prev->kecelakaan_lalin_menonjol_korban_meninggal));
        $sheet->setCellValue('D281', applyZero($current->kecelakaan_lalin_menonjol_korban_meninggal));

        $sheet->setCellValue('C282', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_berat));
        $sheet->setCellValue('D282', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_berat));

        $sheet->setCellValue('C283', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_ringan));
        $sheet->setCellValue('D283', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_ringan));

        $sheet->setCellValue('C284', applyZero($prev->kecelakaan_lalin_menonjol_materiil));
        $sheet->setCellValue('D284', applyZero($current->kecelakaan_lalin_menonjol_materiil));

        $sheet->setCellValue('C286', applyZero($prev->kecelakaan_lalin_tunggal_jumlah_kejadian));
        $sheet->setCellValue('D286', applyZero($current->kecelakaan_lalin_tunggal_jumlah_kejadian));

        $sheet->setCellValue('C287', applyZero($prev->kecelakaan_lalin_tunggal_korban_meninggal));
        $sheet->setCellValue('D287', applyZero($current->kecelakaan_lalin_tunggal_korban_meninggal));

        $sheet->setCellValue('C288', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_berat));
        $sheet->setCellValue('D288', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_berat));

        $sheet->setCellValue('C289', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_ringan));
        $sheet->setCellValue('D289', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_ringan));

        $sheet->setCellValue('C290', applyZero($prev->kecelakaan_lalin_tunggal_materiil));
        $sheet->setCellValue('D290', applyZero($current->kecelakaan_lalin_tunggal_materiil));

        $sheet->setCellValue('C292', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));
        $sheet->setCellValue('D292', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));

        $sheet->setCellValue('C293', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));
        $sheet->setCellValue('D293', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));

        $sheet->setCellValue('C294', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));
        $sheet->setCellValue('D294', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));

        $sheet->setCellValue('C295', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));
        $sheet->setCellValue('D295', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));

        $sheet->setCellValue('C296', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));
        $sheet->setCellValue('D296', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));

        $sheet->setCellValue('C298', applyZero($prev->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));
        $sheet->setCellValue('D298', applyZero($current->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));

        $sheet->setCellValue('C299', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_meninggal));
        $sheet->setCellValue('D299', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_meninggal));

        $sheet->setCellValue('C300', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_berat));
        $sheet->setCellValue('D300', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_berat));

        $sheet->setCellValue('C301', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));
        $sheet->setCellValue('D301', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));

        $sheet->setCellValue('C302', applyZero($prev->kecelakaan_lalin_tabrak_lari_materiil));
        $sheet->setCellValue('D302', applyZero($current->kecelakaan_lalin_tabrak_lari_materiil));

        $sheet->setCellValue('C304', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));
        $sheet->setCellValue('D304', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));

        $sheet->setCellValue('C305', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));
        $sheet->setCellValue('D305', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));

        $sheet->setCellValue('C306', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));
        $sheet->setCellValue('D306', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));

        $sheet->setCellValue('C307', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));
        $sheet->setCellValue('D307', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringanl));

        $sheet->setCellValue('C308', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_materiil));
        $sheet->setCellValue('D308', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_materiil));

        $sheet->setCellValue('C310', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));
        $sheet->setCellValue('D310', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));

        $sheet->setCellValue('C311', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));
        $sheet->setCellValue('D311', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));

        $sheet->setCellValue('C312', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));
        $sheet->setCellValue('D312', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));

        $sheet->setCellValue('C313', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));
        $sheet->setCellValue('D313', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));

        $sheet->setCellValue('C314', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_materiil));
        $sheet->setCellValue('D314', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_materiil));

        $sheet->setCellValue('C316', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));
        $sheet->setCellValue('D316', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));

        $sheet->setCellValue('C317', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));
        $sheet->setCellValue('D317', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));

        $sheet->setCellValue('C318', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));
        $sheet->setCellValue('D318', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));

        $sheet->setCellValue('C319', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));
        $sheet->setCellValue('D319', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));

        $sheet->setCellValue('C320', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));
        $sheet->setCellValue('D320', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));

        $sheet->setCellValue('C322', applyZero($prev->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));
        $sheet->setCellValue('D322', applyZero($current->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));

        $sheet->setCellValue('C323', applyZero($prev->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));
        $sheet->setCellValue('D323', applyZero($current->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));

        $sheet->setCellValue('C324', applyZero($prev->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));
        $sheet->setCellValue('D324', applyZero($current->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));

        $sheet->setCellValue('C325', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));
        $sheet->setCellValue('D325', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));

        $sheet->setCellValue('C326', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));
        $sheet->setCellValue('D326', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));

        $sheet->setCellValue('C327', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_meninggal));
        $sheet->setCellValue('D327', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_meninggal));

        $sheet->setCellValue('C328', applyZero($prev->kecelakaan_lalin_perlintasan_ka_materiil));
        $sheet->setCellValue('D328', applyZero($current->kecelakaan_lalin_perlintasan_ka_materiil));

        $sheet->setCellValue('C330', applyZero($prev->kecelakaan_transportasi_kereta_api));
        $sheet->setCellValue('D330', applyZero($current->kecelakaan_transportasi_kereta_api));

        $sheet->setCellValue('C331', applyZero($prev->kecelakaan_transportasi_laut_perairan));
        $sheet->setCellValue('D331', applyZero($current->kecelakaan_transportasi_laut_perairan));

        $sheet->setCellValue('C332', applyZero($prev->kecelakaan_transportasi_udara));
        $sheet->setCellValue('D332', applyZero($current->kecelakaan_transportasi_udara));

        $sheet->setCellValue('C337', applyZero($prev->penlu_melalui_media_cetak));
        $sheet->setCellValue('D337', applyZero($current->penlu_melalui_media_cetak));

        $sheet->setCellValue('C338', applyZero($prev->penlu_melalui_media_elektronik));
        $sheet->setCellValue('D338', applyZero($current->penlu_melalui_media_elektronik));

        $sheet->setCellValue('C339', applyZero($prev->penlu_melalui_media_sosial));
        $sheet->setCellValue('D339', applyZero($current->penlu_melalui_media_sosial));

        $sheet->setCellValue('C340', applyZero($prev->penlu_melalui_tempat_keramaian));
        $sheet->setCellValue('D340', applyZero($current->penlu_melalui_tempat_keramaian));

        $sheet->setCellValue('C341', applyZero($prev->penlu_melalui_tempat_istirahat));
        $sheet->setCellValue('D341', applyZero($current->penlu_melalui_tempat_istirahat));

        $sheet->setCellValue('C342', applyZero($prev->penlu_melalui_daerah_rawan_laka_dan_langgar));
        $sheet->setCellValue('D342', applyZero($current->penlu_melalui_daerah_rawan_laka_dan_langgar));

        $sheet->setCellValue('C345', applyZero($prev->penyebaran_pemasangan_spanduk));
        $sheet->setCellValue('D345', applyZero($current->penyebaran_pemasangan_spanduk));

        $sheet->setCellValue('C346', applyZero($prev->penyebaran_pemasangan_leaflet));
        $sheet->setCellValue('D346', applyZero($current->penyebaran_pemasangan_leaflet));

        $sheet->setCellValue('C347', applyZero($prev->penyebaran_pemasangan_sticker));
        $sheet->setCellValue('D347', applyZero($current->penyebaran_pemasangan_sticker));

        $sheet->setCellValue('C348', applyZero($prev->penyebaran_pemasangan_bilboard));
        $sheet->setCellValue('D348', applyZero($current->penyebaran_pemasangan_bilboard));

        $sheet->setCellValue('C351', applyZero($prev->polisi_sahabat_anak));
        $sheet->setCellValue('D351', applyZero($current->polisi_sahabat_anak));

        $sheet->setCellValue('C352', applyZero($prev->cara_aman_sekolah));
        $sheet->setCellValue('D352', applyZero($current->cara_aman_sekolah));

        $sheet->setCellValue('C353', applyZero($prev->patroli_keamanan_sekolah));
        $sheet->setCellValue('D353', applyZero($current->patroli_keamanan_sekolah));

        $sheet->setCellValue('C354', applyZero($prev->pramuka_bhayangkara_krida_lalu_lintas));
        $sheet->setCellValue('D354', applyZero($current->pramuka_bhayangkara_krida_lalu_lintas));

        $sheet->setCellValue('C357', applyZero($prev->police_goes_to_campus));
        $sheet->setCellValue('D357', applyZero($current->police_goes_to_campus));

        $sheet->setCellValue('C358', applyZero($prev->safety_riding_driving));
        $sheet->setCellValue('D358', applyZero($current->safety_riding_driving));

        $sheet->setCellValue('C359', applyZero($prev->forum_lalu_lintas_angkutan_umum));
        $sheet->setCellValue('D359', applyZero($current->forum_lalu_lintas_angkutan_umum));

        $sheet->setCellValue('C360', applyZero($prev->kampanye_keselamatan));
        $sheet->setCellValue('D360', applyZero($current->kampanye_keselamatan));

        $sheet->setCellValue('C361', applyZero($prev->sekolah_mengemudi));
        $sheet->setCellValue('D361', applyZero($current->sekolah_mengemudi));

        $sheet->setCellValue('C362', applyZero($prev->taman_lalu_lintas));
        $sheet->setCellValue('D362', applyZero($current->taman_lalu_lintas));

        $sheet->setCellValue('C363', applyZero($prev->global_road_safety_partnership_action));
        $sheet->setCellValue('D363', applyZero($current->global_road_safety_partnership_action));

        $sheet->setCellValue('C367', applyZero($prev->giat_lantas_pengaturan));
        $sheet->setCellValue('D367', applyZero($current->giat_lantas_pengaturan));

        $sheet->setCellValue('C368', applyZero($prev->giat_lantas_penjagaan));
        $sheet->setCellValue('D368', applyZero($current->giat_lantas_penjagaan));

        $sheet->setCellValue('C369', applyZero($prev->giat_lantas_pengawalan));
        $sheet->setCellValue('D369', applyZero($current->giat_lantas_pengawalan));

        $sheet->setCellValue('C370', applyZero($prev->giat_lantas_patroli));
        $sheet->setCellValue('D370', applyZero($current->giat_lantas_patroli));

        $sheet->setCellValue('C375', applyZero($prev->arus_mudik_jumlah_bus_keberangkatan));
        $sheet->setCellValue('D375', applyZero($current->arus_mudik_jumlah_bus_keberangkatan));

        $sheet->setCellValue('C376', applyZero($prev->arus_mudik_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D376', applyZero($current->arus_mudik_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C377', applyZero($prev->arus_mudik_jumlah_bus_kedatangan));
        $sheet->setCellValue('D377', applyZero($current->arus_mudik_jumlah_bus_kedatangan));

        $sheet->setCellValue('C378', applyZero($prev->arus_mudik_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D378', applyZero($current->arus_mudik_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C379', applyZero($prev->arus_mudik_total_terminal));
        $sheet->setCellValue('D379', applyZero($current->arus_mudik_total_terminal));

        $sheet->setCellValue('C380', applyZero($prev->arus_mudik_total_bus_keberangkatan));
        $sheet->setCellValue('D380', applyZero($current->arus_mudik_total_bus_keberangkatan));

        $sheet->setCellValue('C381', applyZero($prev->arus_mudik_penumpang_keberangkatan));
        $sheet->setCellValue('D381', applyZero($current->arus_mudik_penumpang_keberangkatan));

        $sheet->setCellValue('C382', applyZero($prev->arus_mudik_total_bus_kedatangan));
        $sheet->setCellValue('D382', applyZero($current->arus_mudik_total_bus_kedatangan));

        $sheet->setCellValue('C383', applyZero($prev->arus_mudik_penumpang_kedatangan));
        $sheet->setCellValue('D383', applyZero($current->arus_mudik_penumpang_kedatangan));

        $sheet->setCellValue('C385', applyZero($prev->arus_mudik_kereta_api_total_stasiun));
        $sheet->setCellValue('D385', applyZero($current->arus_mudik_kereta_api_total_stasiun));

        $sheet->setCellValue('C386', applyZero($prev->arus_mudik_kereta_api_total_penumpang_keberangkatan));
        $sheet->setCellValue('D386', applyZero($current->arus_mudik_kereta_api_total_penumpang_keberangkatan));

        $sheet->setCellValue('C387', applyZero($prev->arus_mudik_kereta_api_total_penumpang_kedatangan));
        $sheet->setCellValue('D387', applyZero($current->arus_mudik_kereta_api_total_penumpang_kedatangan));

        $sheet->setCellValue('C389', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));
        $sheet->setCellValue('D389', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));

        $sheet->setCellValue('C390', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));
        $sheet->setCellValue('D390', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));

        $sheet->setCellValue('C391', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));
        $sheet->setCellValue('D391', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));

        $sheet->setCellValue('C392', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D392', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C393', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));
        $sheet->setCellValue('D393', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));

        $sheet->setCellValue('C394', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));
        $sheet->setCellValue('D394', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));

        $sheet->setCellValue('C395', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));
        $sheet->setCellValue('D395', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));

        $sheet->setCellValue('C396', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D396', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C397', applyZero($prev->arus_mudik_total_pelabuhan));
        $sheet->setCellValue('D397', applyZero($current->arus_mudik_total_pelabuhan));

        $sheet->setCellValue('C398', applyZero($prev->arus_mudik_pelabuhan_kendaraan_keberangkatan));
        $sheet->setCellValue('D398', applyZero($current->arus_mudik_pelabuhan_kendaraan_keberangkatan));

        $sheet->setCellValue('C399', applyZero($prev->arus_mudik_pelabuhan_kendaraan_kedatangan));
        $sheet->setCellValue('D399', applyZero($current->arus_mudik_pelabuhan_kendaraan_kedatangan));

        $sheet->setCellValue('C400', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_keberangkatan));
        $sheet->setCellValue('D400', applyZero($current->arus_mudik_pelabuhan_total_penumpang_keberangkatan));

        $sheet->setCellValue('C401', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_kedatangan));
        $sheet->setCellValue('D401', applyZero($current->arus_mudik_pelabuhan_total_penumpang_kedatangan));

        $sheet->setCellValue('C403', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D403', applyZero($current->arus_mudik_bandara_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C404', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D404', applyZero($current->arus_mudik_bandara_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C405', applyZero($prev->arus_mudik_total_bandara));
        $sheet->setCellValue('D405', applyZero($current->arus_mudik_total_bandara));

        $sheet->setCellValue('C406', applyZero($prev->arus_mudik_bandara_total_penumpang_keberangkatan));
        $sheet->setCellValue('D406', applyZero($current->arus_mudik_bandara_total_penumpang_keberangkatan));

        $sheet->setCellValue('C407', applyZero($prev->arus_mudik_bandara_total_penumpang_kedatangan));
        $sheet->setCellValue('D407', applyZero($current->arus_mudik_bandara_total_penumpang_kedatangan));

        $sheet->setCellValue('C410', applyZero($prev->prokes_covid_teguran_gar_prokes));
        $sheet->setCellValue('D410', applyZero($current->prokes_covid_teguran_gar_prokes));

        $sheet->setCellValue('C411', applyZero($prev->prokes_covid_pembagian_masker));
        $sheet->setCellValue('D411', applyZero($current->prokes_covid_pembagian_masker));

        $sheet->setCellValue('C412', applyZero($prev->prokes_covid_sosialisasi_tentang_prokes));
        $sheet->setCellValue('D412', applyZero($current->prokes_covid_sosialisasi_tentang_prokes));

        $sheet->setCellValue('C413', applyZero($prev->prokes_covid_giat_baksos));
        $sheet->setCellValue('D413', applyZero($current->prokes_covid_giat_baksos));

        $sheet->setCellValue('C416', applyZero($prev->penyekatan_motor));
        $sheet->setCellValue('D416', applyZero($current->penyekatan_motor));

        $sheet->setCellValue('C417', applyZero($prev->penyekatan_mobil_penumpang));
        $sheet->setCellValue('D417', applyZero($current->penyekatan_mobil_penumpang));

        $sheet->setCellValue('C418', applyZero($prev->penyekatan_mobil_bus));
        $sheet->setCellValue('D418', applyZero($current->penyekatan_mobil_bus));

        $sheet->setCellValue('C419', applyZero($prev->penyekatan_mobil_barang));
        $sheet->setCellValue('D419', applyZero($current->penyekatan_mobil_barang));

        $sheet->setCellValue('C420', applyZero($prev->penyekatan_kendaraan_khusus));
        $sheet->setCellValue('D420', applyZero($current->penyekatan_kendaraan_khusus));


        //write it again to Filesystem with the same name (=replace)
        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');
    }
}

if (! function_exists('excelTemplateDisplay')) {
    function excelTemplateDisplay($prev, $current, $prevYear, $currentYear)
    {
        $excelPath = public_path('template/excel');

        $excelTemplate = $excelPath."/format_laporan_operasi_2021_preview.xlsx";

        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($excelTemplate);

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('C2', $prevYear);
        $sheet->setCellValue('D2', $currentYear);

        $sheet->setCellValue('C6', applyZero($prev->pelanggaran_lalu_lintas_tilang));
        $sheet->setCellValue('D6', applyZero($current->pelanggaran_lalu_lintas_tilang));

        $sheet->setCellValue('C7', applyZero($prev->pelanggaran_lalu_lintas_teguran));
        $sheet->setCellValue('D7', applyZero($current->pelanggaran_lalu_lintas_teguran));

        $sheet->setCellValue('C11', applyZero($prev->pelanggaran_sepeda_motor_kecepatan));
        $sheet->setCellValue('D11', applyZero($current->pelanggaran_sepeda_motor_kecepatan));

        $sheet->setCellValue('C12', applyZero($prev->pelanggaran_sepeda_motor_helm));
        $sheet->setCellValue('D12', applyZero($current->pelanggaran_sepeda_motor_helm));

        $sheet->setCellValue('C13', applyZero($prev->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));
        $sheet->setCellValue('D13', applyZero($current->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));

        $sheet->setCellValue('C14', applyZero($prev->pelanggaran_sepeda_motor_marka_menerus_menyalip));
        $sheet->setCellValue('D14', applyZero($current->pelanggaran_sepeda_motor_marka_menerus_menyalip));

        $sheet->setCellValue('C15', applyZero($prev->pelanggaran_sepeda_motor_melawan_arus));
        $sheet->setCellValue('D15', applyZero($current->pelanggaran_sepeda_motor_melawan_arus));

        $sheet->setCellValue('C16', applyZero($prev->pelanggaran_sepeda_motor_melanggar_lampu_lalin));
        $sheet->setCellValue('D16', applyZero($current->pelanggaran_sepeda_motor_melanggar_lampu_lalin));

        $sheet->setCellValue('C17', applyZero($prev->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));
        $sheet->setCellValue('D17', applyZero($current->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));

        $sheet->setCellValue('C18', applyZero($prev->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D18', applyZero($current->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C19', applyZero($prev->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));
        $sheet->setCellValue('D19', applyZero($current->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));

        $sheet->setCellValue('C20', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D20', applyZero($current->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C21', applyZero($prev->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D21', applyZero($current->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C22', applyZero($prev->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D22', applyZero($current->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C23', applyZero($prev->pelanggaran_sepeda_motor_melanggar_marka_berhenti));
        $sheet->setCellValue('D23', applyZero($current->pelanggaran_sepeda_motor_melanggar_marka_berhenti));

        $sheet->setCellValue('C24', applyZero($prev->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D24', applyZero($current->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C25', applyZero($prev->pelanggaran_sepeda_motor_surat_surat));
        $sheet->setCellValue('D25', applyZero($current->pelanggaran_sepeda_motor_surat_surat));

        $sheet->setCellValue('C26', applyZero($prev->pelanggaran_sepeda_motor_kelengkapan_kendaraan));
        $sheet->setCellValue('D26', applyZero($current->pelanggaran_sepeda_motor_kelengkapan_kendaraan));

        $sheet->setCellValue('C27', applyZero($prev->pelanggaran_sepeda_motor_lain_lain));
        $sheet->setCellValue('D27', applyZero($current->pelanggaran_sepeda_motor_lain_lain));

        $sheet->setCellValue('C30', applyZero($prev->pelanggaran_mobil_kecepatan));
        $sheet->setCellValue('D30', applyZero($current->pelanggaran_mobil_kecepatan));

        $sheet->setCellValue('C31', applyZero($prev->pelanggaran_mobil_safety_belt));
        $sheet->setCellValue('D31', applyZero($current->pelanggaran_mobil_safety_belt));

        $sheet->setCellValue('C32', applyZero($prev->pelanggaran_mobil_muatan_overload));
        $sheet->setCellValue('D32', applyZero($current->pelanggaran_mobil_muatan_overload));

        $sheet->setCellValue('C33', applyZero($prev->pelanggaran_mobil_marka_menerus_menyalip));
        $sheet->setCellValue('D33', applyZero($current->pelanggaran_mobil_marka_menerus_menyalip));

        $sheet->setCellValue('C34', applyZero($prev->pelanggaran_mobil_melawan_arus));
        $sheet->setCellValue('D34', applyZero($current->pelanggaran_mobil_melawan_arus));

        $sheet->setCellValue('C35', applyZero($prev->pelanggaran_mobil_melanggar_lampu_lalin));
        $sheet->setCellValue('D35', applyZero($current->pelanggaran_mobil_melanggar_lampu_lalin));

        $sheet->setCellValue('C36', applyZero($prev->pelanggaran_mobil_mengemudi_tidak_wajar));
        $sheet->setCellValue('D36', applyZero($current->pelanggaran_mobil_mengemudi_tidak_wajar));

        $sheet->setCellValue('C37', applyZero($prev->pelanggaran_mobil_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D37', applyZero($current->pelanggaran_mobil_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C38', applyZero($prev->pelanggaran_mobil_tidak_nyala_lampu_malam));
        $sheet->setCellValue('D38', applyZero($current->pelanggaran_mobil_tidak_nyala_lampu_malam));

        $sheet->setCellValue('C39', applyZero($prev->pelanggaran_mobil_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D39', applyZero($current->pelanggaran_mobil_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C40', applyZero($prev->pelanggaran_mobil_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D40', applyZero($current->pelanggaran_mobil_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C41', applyZero($prev->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D41', applyZero($current->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C42', applyZero($prev->pelanggaran_mobil_melanggar_marka_berhenti));
        $sheet->setCellValue('D42', applyZero($current->pelanggaran_mobil_melanggar_marka_berhenti));

        $sheet->setCellValue('C43', applyZero($prev->pelanggaran_mobil_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D43', applyZero($current->pelanggaran_mobil_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C44', applyZero($prev->pelanggaran_mobil_surat_surat));
        $sheet->setCellValue('D44', applyZero($current->pelanggaran_mobil_surat_surat));

        $sheet->setCellValue('C45', applyZero($prev->pelanggaran_mobil_kelengkapan_kendaraan));
        $sheet->setCellValue('D45', applyZero($current->pelanggaran_mobil_kelengkapan_kendaraan));

        $sheet->setCellValue('C46', applyZero($prev->pelanggaran_mobil_lain_lain));
        $sheet->setCellValue('D46', applyZero($current->pelanggaran_mobil_lain_lain));

        $sheet->setCellValue('C49', applyZero($prev->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));
        $sheet->setCellValue('D49', applyZero($current->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));

        $sheet->setCellValue('C52', applyZero($prev->barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D52', applyZero($current->barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C53', applyZero($prev->barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D53', applyZero($current->barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C54', applyZero($prev->barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D54', applyZero($current->barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C57', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));
        $sheet->setCellValue('D57', applyZero($current->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));

        $sheet->setCellValue('C58', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));
        $sheet->setCellValue('D58', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));

        $sheet->setCellValue('C59', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_bus));
        $sheet->setCellValue('D59', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_bus));

        $sheet->setCellValue('C60', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_barang));
        $sheet->setCellValue('D60', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_barang));

        $sheet->setCellValue('C61', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));
        $sheet->setCellValue('D61', applyZero($current->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));

        $sheet->setCellValue('C64', applyZero($prev->profesi_pelaku_pelanggaran_pns));
        $sheet->setCellValue('D64', applyZero($current->profesi_pelaku_pelanggaran_pns));

        $sheet->setCellValue('C65', applyZero($prev->profesi_pelaku_pelanggaran_karyawan_swasta));
        $sheet->setCellValue('D65', applyZero($current->profesi_pelaku_pelanggaran_karyawan_swasta));

        $sheet->setCellValue('C66', applyZero($prev->profesi_pelaku_pelanggaran_pelajar_mahasiswa));
        $sheet->setCellValue('D66', applyZero($current->profesi_pelaku_pelanggaran_pelajar_mahasiswa));

        $sheet->setCellValue('C67', applyZero($prev->profesi_pelaku_pelanggaran_pengemudi_supir));
        $sheet->setCellValue('D67', applyZero($current->profesi_pelaku_pelanggaran_pengemudi_supir));

        $sheet->setCellValue('C68', applyZero($prev->profesi_pelaku_pelanggaran_tni));
        $sheet->setCellValue('D68', applyZero($current->profesi_pelaku_pelanggaran_tni));

        $sheet->setCellValue('C69', applyZero($prev->profesi_pelaku_pelanggaran_polri));
        $sheet->setCellValue('D69', applyZero($current->profesi_pelaku_pelanggaran_polri));

        $sheet->setCellValue('C70', applyZero($prev->profesi_pelaku_pelanggaran_lain_lain));
        $sheet->setCellValue('D70', applyZero($current->profesi_pelaku_pelanggaran_lain_lain));

        $sheet->setCellValue('C73', applyZero($prev->usia_pelaku_pelanggaran_kurang_dari_15_tahun));
        $sheet->setCellValue('D73', applyZero($current->usia_pelaku_pelanggaran_kurang_dari_15_tahun));

        $sheet->setCellValue('C74', applyZero($prev->usia_pelaku_pelanggaran_16_20_tahun));
        $sheet->setCellValue('D74', applyZero($current->usia_pelaku_pelanggaran_16_20_tahun));

        $sheet->setCellValue('C75', applyZero($prev->usia_pelaku_pelanggaran_21_25_tahun));
        $sheet->setCellValue('D75', applyZero($current->usia_pelaku_pelanggaran_21_25_tahun));

        $sheet->setCellValue('C76', applyZero($prev->usia_pelaku_pelanggaran_26_30_tahun));
        $sheet->setCellValue('D76', applyZero($current->usia_pelaku_pelanggaran_26_30_tahun));

        $sheet->setCellValue('C77', applyZero($prev->usia_pelaku_pelanggaran_31_35_tahun));
        $sheet->setCellValue('D77', applyZero($current->usia_pelaku_pelanggaran_31_35_tahun));

        $sheet->setCellValue('C78', applyZero($prev->usia_pelaku_pelanggaran_36_40_tahun));
        $sheet->setCellValue('D78', applyZero($current->usia_pelaku_pelanggaran_36_40_tahun));

        $sheet->setCellValue('C79', applyZero($prev->usia_pelaku_pelanggaran_41_45_tahun));
        $sheet->setCellValue('D79', applyZero($current->usia_pelaku_pelanggaran_41_45_tahun));

        $sheet->setCellValue('C80', applyZero($prev->usia_pelaku_pelanggaran_46_50_tahun));
        $sheet->setCellValue('D80', applyZero($current->usia_pelaku_pelanggaran_46_50_tahun));

        $sheet->setCellValue('C81', applyZero($prev->usia_pelaku_pelanggaran_51_55_tahun));
        $sheet->setCellValue('D81', applyZero($current->usia_pelaku_pelanggaran_51_55_tahun));

        $sheet->setCellValue('C82', applyZero($prev->usia_pelaku_pelanggaran_56_60_tahun));
        $sheet->setCellValue('D82', applyZero($current->usia_pelaku_pelanggaran_56_60_tahun));

        $sheet->setCellValue('C83', applyZero($prev->usia_pelaku_pelanggaran_diatas_60_tahun));
        $sheet->setCellValue('D83', applyZero($current->usia_pelaku_pelanggaran_diatas_60_tahun));

        $sheet->setCellValue('C86', applyZero($prev->sim_pelaku_pelanggaran_sim_a));
        $sheet->setCellValue('D86', applyZero($current->sim_pelaku_pelanggaran_sim_a));

        $sheet->setCellValue('C87', applyZero($prev->sim_pelaku_pelanggaran_sim_a_umum));
        $sheet->setCellValue('D87', applyZero($current->sim_pelaku_pelanggaran_sim_a_umum));

        $sheet->setCellValue('C88', applyZero($prev->sim_pelaku_pelanggaran_sim_b1));
        $sheet->setCellValue('D88', applyZero($current->sim_pelaku_pelanggaran_sim_b1));

        $sheet->setCellValue('C89', applyZero($prev->sim_pelaku_pelanggaran_sim_b1_umum));
        $sheet->setCellValue('D89', applyZero($current->sim_pelaku_pelanggaran_sim_b1_umum));

        $sheet->setCellValue('C90', applyZero($prev->sim_pelaku_pelanggaran_sim_b2));
        $sheet->setCellValue('D90', applyZero($current->sim_pelaku_pelanggaran_sim_b2));

        $sheet->setCellValue('C91', applyZero($prev->sim_pelaku_pelanggaran_sim_b2_umum));
        $sheet->setCellValue('D91', applyZero($current->sim_pelaku_pelanggaran_sim_b2_umum));

        $sheet->setCellValue('C92', applyZero($prev->sim_pelaku_pelanggaran_sim_c));
        $sheet->setCellValue('D92', applyZero($current->sim_pelaku_pelanggaran_sim_c));

        $sheet->setCellValue('C93', applyZero($prev->sim_pelaku_pelanggaran_sim_d));
        $sheet->setCellValue('D93', applyZero($current->sim_pelaku_pelanggaran_sim_d));

        $sheet->setCellValue('C94', applyZero($prev->sim_pelaku_pelanggaran_sim_internasional));
        $sheet->setCellValue('D94', applyZero($current->sim_pelaku_pelanggaran_sim_internasional));

        $sheet->setCellValue('C95', applyZero($prev->sim_pelaku_pelanggaran_tanpa_sim));
        $sheet->setCellValue('D95', applyZero($current->sim_pelaku_pelanggaran_tanpa_sim));

        $sheet->setCellValue('C99', applyZero($prev->lokasi_pelanggaran_pemukiman));
        $sheet->setCellValue('D99', applyZero($current->lokasi_pelanggaran_pemukiman));

        $sheet->setCellValue('C100', applyZero($prev->lokasi_pelanggaran_perbelanjaan));
        $sheet->setCellValue('D100', applyZero($current->lokasi_pelanggaran_perbelanjaan));

        $sheet->setCellValue('C101', applyZero($prev->lokasi_pelanggaran_perkantoran));
        $sheet->setCellValue('D101', applyZero($current->lokasi_pelanggaran_perkantoran));

        $sheet->setCellValue('C102', applyZero($prev->lokasi_pelanggaran_wisata));
        $sheet->setCellValue('D102', applyZero($current->lokasi_pelanggaran_wisata));

        $sheet->setCellValue('C103', applyZero($prev->lokasi_pelanggaran_industri));
        $sheet->setCellValue('D103', applyZero($current->lokasi_pelanggaran_industri));

        $sheet->setCellValue('C106', applyZero($prev->lokasi_pelanggaran_status_jalan_nasional));
        $sheet->setCellValue('D106', applyZero($current->lokasi_pelanggaran_status_jalan_nasional));

        $sheet->setCellValue('C107', applyZero($prev->lokasi_pelanggaran_status_jalan_propinsi));
        $sheet->setCellValue('D107', applyZero($current->lokasi_pelanggaran_status_jalan_propinsi));

        $sheet->setCellValue('C108', applyZero($prev->lokasi_pelanggaran_status_jalan_kab_kota));
        $sheet->setCellValue('D108', applyZero($current->lokasi_pelanggaran_status_jalan_kab_kota));

        $sheet->setCellValue('C109', applyZero($prev->lokasi_pelanggaran_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D109', applyZero($current->lokasi_pelanggaran_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C112', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_arteri));
        $sheet->setCellValue('D112', applyZero($current->lokasi_pelanggaran_fungsi_jalan_arteri));

        $sheet->setCellValue('C113', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_kolektor));
        $sheet->setCellValue('D113', applyZero($current->lokasi_pelanggaran_fungsi_jalan_kolektor));

        $sheet->setCellValue('C114', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lokal));
        $sheet->setCellValue('D114', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lokal));

        $sheet->setCellValue('C115', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D115', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C119', applyZero($prev->kecelakaan_lalin_jumlah_kejadian));
        $sheet->setCellValue('D119', applyZero($current->kecelakaan_lalin_jumlah_kejadian));

        $sheet->setCellValue('C120', applyZero($prev->kecelakaan_lalin_jumlah_korban_meninggal));
        $sheet->setCellValue('D120', applyZero($current->kecelakaan_lalin_jumlah_korban_meninggal));

        $sheet->setCellValue('C121', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_berat));
        $sheet->setCellValue('D121', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_berat));

        $sheet->setCellValue('C122', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_ringan));
        $sheet->setCellValue('D122', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_ringan));

        $sheet->setCellValue('C123', applyZero($prev->kecelakaan_lalin_jumlah_kerugian_materiil));
        $sheet->setCellValue('D123', applyZero($current->kecelakaan_lalin_jumlah_kerugian_materiil));

        $sheet->setCellValue('C125', applyZero($prev->kecelakaan_barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D125', applyZero($current->kecelakaan_barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C126', applyZero($prev->kecelakaan_barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D126', applyZero($current->kecelakaan_barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C127', applyZero($prev->kecelakaan_barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D127', applyZero($current->kecelakaan_barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C130', applyZero($prev->profesi_korban_kecelakaan_lalin_pns));
        $sheet->setCellValue('D130', applyZero($current->profesi_korban_kecelakaan_lalin_pns));

        $sheet->setCellValue('C131', applyZero($prev->profesi_korban_kecelakaan_lalin_karwayan_swasta));
        $sheet->setCellValue('D131', applyZero($current->profesi_korban_kecelakaan_lalin_karwayan_swasta));

        $sheet->setCellValue('C132', applyZero($prev->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));
        $sheet->setCellValue('D132', applyZero($current->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));

        $sheet->setCellValue('C133', applyZero($prev->profesi_korban_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D133', applyZero($current->profesi_korban_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C134', applyZero($prev->profesi_korban_kecelakaan_lalin_tni));
        $sheet->setCellValue('D134', applyZero($current->profesi_korban_kecelakaan_lalin_tni));

        $sheet->setCellValue('C135', applyZero($prev->profesi_korban_kecelakaan_lalin_polri));
        $sheet->setCellValue('D135', applyZero($current->profesi_korban_kecelakaan_lalin_polri));

        $sheet->setCellValue('C136', applyZero($prev->profesi_korban_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D136', applyZero($current->profesi_korban_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C139', applyZero($prev->usia_korban_kecelakaan_kurang_15));
        $sheet->setCellValue('D139', applyZero($current->usia_korban_kecelakaan_kurang_15));

        $sheet->setCellValue('C140', applyZero($prev->usia_korban_kecelakaan_16_20));
        $sheet->setCellValue('D140', applyZero($current->usia_korban_kecelakaan_16_20));

        $sheet->setCellValue('C141', applyZero($prev->usia_korban_kecelakaan_21_25));
        $sheet->setCellValue('D141', applyZero($current->usia_korban_kecelakaan_21_25));

        $sheet->setCellValue('C142', applyZero($prev->usia_korban_kecelakaan_26_30));
        $sheet->setCellValue('D142', applyZero($current->usia_korban_kecelakaan_26_30));

        $sheet->setCellValue('C143', applyZero($prev->usia_korban_kecelakaan_31_35));
        $sheet->setCellValue('D143', applyZero($current->usia_korban_kecelakaan_31_35));

        $sheet->setCellValue('C144', applyZero($prev->usia_korban_kecelakaan_36_40));
        $sheet->setCellValue('D144', applyZero($current->usia_korban_kecelakaan_36_40));

        $sheet->setCellValue('C145', applyZero($prev->usia_korban_kecelakaan_41_45));
        $sheet->setCellValue('D145', applyZero($current->usia_korban_kecelakaan_41_45));

        $sheet->setCellValue('C146', applyZero($prev->usia_korban_kecelakaan_45_50));
        $sheet->setCellValue('D146', applyZero($current->usia_korban_kecelakaan_45_50));

        $sheet->setCellValue('C147', applyZero($prev->usia_korban_kecelakaan_51_55));
        $sheet->setCellValue('D147', applyZero($current->usia_korban_kecelakaan_51_55));

        $sheet->setCellValue('C148', applyZero($prev->usia_korban_kecelakaan_56_60));
        $sheet->setCellValue('D148', applyZero($current->usia_korban_kecelakaan_56_60));

        $sheet->setCellValue('C149', applyZero($prev->usia_korban_kecelakaan_diatas_60));
        $sheet->setCellValue('D149', applyZero($current->usia_korban_kecelakaan_diatas_60));

        $sheet->setCellValue('C152', applyZero($prev->sim_korban_kecelakaan_sim_a));
        $sheet->setCellValue('D152', applyZero($current->sim_korban_kecelakaan_sim_a));

        $sheet->setCellValue('C153', applyZero($prev->sim_korban_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D153', applyZero($current->sim_korban_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C154', applyZero($prev->sim_korban_kecelakaan_sim_b1));
        $sheet->setCellValue('D154', applyZero($current->sim_korban_kecelakaan_sim_b1));

        $sheet->setCellValue('C155', applyZero($prev->sim_korban_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D155', applyZero($current->sim_korban_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C156', applyZero($prev->sim_korban_kecelakaan_sim_b2));
        $sheet->setCellValue('D156', applyZero($current->sim_korban_kecelakaan_sim_b2));

        $sheet->setCellValue('C157', applyZero($prev->sim_korban_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D157', applyZero($current->sim_korban_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C158', applyZero($prev->sim_korban_kecelakaan_sim_c));
        $sheet->setCellValue('D158', applyZero($current->sim_korban_kecelakaan_sim_c));

        $sheet->setCellValue('C159', applyZero($prev->sim_korban_kecelakaan_sim_d));
        $sheet->setCellValue('D159', applyZero($current->sim_korban_kecelakaan_sim_d));

        $sheet->setCellValue('C160', applyZero($prev->sim_korban_kecelakaan_sim_internasional));
        $sheet->setCellValue('D160', applyZero($current->sim_korban_kecelakaan_sim_internasional));

        $sheet->setCellValue('C161', applyZero($prev->sim_korban_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D161', applyZero($current->sim_korban_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C164', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));
        $sheet->setCellValue('D164', applyZero($current->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));

        $sheet->setCellValue('C165', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));
        $sheet->setCellValue('D165', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));

        $sheet->setCellValue('C166', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_bus));
        $sheet->setCellValue('D166', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_bus));

        $sheet->setCellValue('C167', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_barang));
        $sheet->setCellValue('D167', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_barang));

        $sheet->setCellValue('C168', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));
        $sheet->setCellValue('D168', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));

        $sheet->setCellValue('C169', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));
        $sheet->setCellValue('D169', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));

        $sheet->setCellValue('C172', applyZero($prev->jenis_kecelakaan_tunggal_ooc));
        $sheet->setCellValue('D172', applyZero($current->jenis_kecelakaan_tunggal_ooc));

        $sheet->setCellValue('C173', applyZero($prev->jenis_kecelakaan_depan_depan));
        $sheet->setCellValue('D173', applyZero($current->jenis_kecelakaan_depan_depan));

        $sheet->setCellValue('C174', applyZero($prev->jenis_kecelakaan_depan_belakang));
        $sheet->setCellValue('D174', applyZero($current->jenis_kecelakaan_depan_belakang));

        $sheet->setCellValue('C175', applyZero($prev->jenis_kecelakaan_depan_samping));
        $sheet->setCellValue('D175', applyZero($current->jenis_kecelakaan_depan_samping));

        $sheet->setCellValue('C176', applyZero($prev->jenis_kecelakaan_beruntun));
        $sheet->setCellValue('D176', applyZero($current->jenis_kecelakaan_beruntun));

        $sheet->setCellValue('C177', applyZero($prev->jenis_kecelakaan_pejalan_kaki));
        $sheet->setCellValue('D177', applyZero($current->jenis_kecelakaan_pejalan_kaki));

        $sheet->setCellValue('C178', applyZero($prev->jenis_kecelakaan_tabrak_lari));
        $sheet->setCellValue('D178', applyZero($current->jenis_kecelakaan_tabrak_lari));

        $sheet->setCellValue('C179', applyZero($prev->jenis_kecelakaan_tabrak_hewan));
        $sheet->setCellValue('D179', applyZero($current->jenis_kecelakaan_tabrak_hewan));

        $sheet->setCellValue('C180', applyZero($prev->jenis_kecelakaan_samping_samping));
        $sheet->setCellValue('D180', applyZero($current->jenis_kecelakaan_samping_samping));

        $sheet->setCellValue('C181', applyZero($prev->jenis_kecelakaan_lainnya));
        $sheet->setCellValue('D181', applyZero($current->jenis_kecelakaan_lainnya));

        $sheet->setCellValue('C184', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pns));
        $sheet->setCellValue('D184', applyZero($current->profesi_pelaku_kecelakaan_lalin_pns));

        $sheet->setCellValue('C185', applyZero($prev->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));
        $sheet->setCellValue('D185', applyZero($current->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));

        $sheet->setCellValue('C186', applyZero($prev->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));
        $sheet->setCellValue('D186', applyZero($current->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));

        $sheet->setCellValue('C187', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D187', applyZero($current->profesi_pelaku_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C188', applyZero($prev->profesi_pelaku_kecelakaan_lalin_tni));
        $sheet->setCellValue('D188', applyZero($current->profesi_pelaku_kecelakaan_lalin_tni));

        $sheet->setCellValue('C189', applyZero($prev->profesi_pelaku_kecelakaan_lalin_polri));
        $sheet->setCellValue('D189', applyZero($current->profesi_pelaku_kecelakaan_lalin_polri));

        $sheet->setCellValue('C190', applyZero($prev->profesi_pelaku_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D190', applyZero($current->profesi_pelaku_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C193', applyZero($prev->usia_pelaku_kecelakaan_kurang_dari_15_tahun));
        $sheet->setCellValue('D193', applyZero($current->usia_pelaku_kecelakaan_kurang_dari_15_tahun));

        $sheet->setCellValue('C194', applyZero($prev->usia_pelaku_kecelakaan_16_20_tahun));
        $sheet->setCellValue('D194', applyZero($current->usia_pelaku_kecelakaan_16_20_tahun));

        $sheet->setCellValue('C195', applyZero($prev->usia_pelaku_kecelakaan_21_25_tahun));
        $sheet->setCellValue('D195', applyZero($current->usia_pelaku_kecelakaan_21_25_tahun));

        $sheet->setCellValue('C196', applyZero($prev->usia_pelaku_kecelakaan_26_30_tahun));
        $sheet->setCellValue('D196', applyZero($current->usia_pelaku_kecelakaan_26_30_tahun));

        $sheet->setCellValue('C197', applyZero($prev->usia_pelaku_kecelakaan_31_35_tahun));
        $sheet->setCellValue('D197', applyZero($current->usia_pelaku_kecelakaan_31_35_tahun));

        $sheet->setCellValue('C198', applyZero($prev->usia_pelaku_kecelakaan_36_40_tahun));
        $sheet->setCellValue('D198', applyZero($current->usia_pelaku_kecelakaan_36_40_tahun));

        $sheet->setCellValue('C199', applyZero($prev->usia_pelaku_kecelakaan_41_45_tahun));
        $sheet->setCellValue('D199', applyZero($current->usia_pelaku_kecelakaan_41_45_tahun));

        $sheet->setCellValue('C200', applyZero($prev->usia_pelaku_kecelakaan_46_50_tahun));
        $sheet->setCellValue('D200', applyZero($current->usia_pelaku_kecelakaan_46_50_tahun));

        $sheet->setCellValue('C201', applyZero($prev->usia_pelaku_kecelakaan_51_55_tahun));
        $sheet->setCellValue('D201', applyZero($current->usia_pelaku_kecelakaan_51_55_tahun));

        $sheet->setCellValue('C202', applyZero($prev->usia_pelaku_kecelakaan_56_60_tahun));
        $sheet->setCellValue('D202', applyZero($current->usia_pelaku_kecelakaan_56_60_tahun));

        $sheet->setCellValue('C203', applyZero($prev->usia_pelaku_kecelakaan_diatas_60_tahun));
        $sheet->setCellValue('D203', applyZero($current->usia_pelaku_kecelakaan_diatas_60_tahun));

        $sheet->setCellValue('C206', applyZero($prev->sim_pelaku_kecelakaan_sim_a));
        $sheet->setCellValue('D206', applyZero($current->sim_pelaku_kecelakaan_sim_a));

        $sheet->setCellValue('C207', applyZero($prev->sim_pelaku_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D207', applyZero($current->sim_pelaku_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C208', applyZero($prev->sim_pelaku_kecelakaan_sim_b1));
        $sheet->setCellValue('D208', applyZero($current->sim_pelaku_kecelakaan_sim_b1));

        $sheet->setCellValue('C209', applyZero($prev->sim_pelaku_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D209', applyZero($current->sim_pelaku_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C210', applyZero($prev->sim_pelaku_kecelakaan_sim_b2));
        $sheet->setCellValue('D210', applyZero($current->sim_pelaku_kecelakaan_sim_b2));

        $sheet->setCellValue('C211', applyZero($prev->sim_pelaku_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D211', applyZero($current->sim_pelaku_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C212', applyZero($prev->sim_pelaku_kecelakaan_sim_c));
        $sheet->setCellValue('D212', applyZero($current->sim_pelaku_kecelakaan_sim_c));

        $sheet->setCellValue('C213', applyZero($prev->sim_pelaku_kecelakaan_sim_d));
        $sheet->setCellValue('D213', applyZero($current->sim_pelaku_kecelakaan_sim_d));

        $sheet->setCellValue('C214', applyZero($prev->sim_pelaku_kecelakaan_sim_internasional));
        $sheet->setCellValue('D214', applyZero($current->sim_pelaku_kecelakaan_sim_internasional));

        $sheet->setCellValue('C215', applyZero($prev->sim_pelaku_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D215', applyZero($current->sim_pelaku_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C219', applyZero($prev->lokasi_kecelakaan_lalin_pemukiman));
        $sheet->setCellValue('D219', applyZero($current->lokasi_kecelakaan_lalin_pemukiman));

        $sheet->setCellValue('C220', applyZero($prev->lokasi_kecelakaan_lalin_perbelanjaan));
        $sheet->setCellValue('D220', applyZero($current->lokasi_kecelakaan_lalin_perbelanjaan));

        $sheet->setCellValue('C221', applyZero($prev->lokasi_kecelakaan_lalin_perkantoran));
        $sheet->setCellValue('D221', applyZero($current->lokasi_kecelakaan_lalin_perkantoran));

        $sheet->setCellValue('C222', applyZero($prev->lokasi_kecelakaan_lalin_wisata));
        $sheet->setCellValue('D222', applyZero($current->lokasi_kecelakaan_lalin_wisata));

        $sheet->setCellValue('C223', applyZero($prev->lokasi_kecelakaan_lalin_industri));
        $sheet->setCellValue('D223', applyZero($current->lokasi_kecelakaan_lalin_industri));

        $sheet->setCellValue('C224', applyZero($prev->lokasi_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D224', applyZero($current->lokasi_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C227', applyZero($prev->lokasi_kecelakaan_status_jalan_nasional));
        $sheet->setCellValue('D227', applyZero($current->lokasi_kecelakaan_status_jalan_nasional));

        $sheet->setCellValue('C228', applyZero($prev->lokasi_kecelakaan_status_jalan_propinsi));
        $sheet->setCellValue('D228', applyZero($current->lokasi_kecelakaan_status_jalan_propinsi));

        $sheet->setCellValue('C229', applyZero($prev->lokasi_kecelakaan_status_jalan_kab_kota));
        $sheet->setCellValue('D229', applyZero($current->lokasi_kecelakaan_status_jalan_kab_kota));

        $sheet->setCellValue('C230', applyZero($prev->lokasi_kecelakaan_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D230', applyZero($current->lokasi_kecelakaan_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C233', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_arteri));
        $sheet->setCellValue('D233', applyZero($current->lokasi_kecelakaan_fungsi_jalan_arteri));

        $sheet->setCellValue('C234', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_kolektor));
        $sheet->setCellValue('D234', applyZero($current->lokasi_kecelakaan_fungsi_jalan_kolektor));

        $sheet->setCellValue('C235', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lokal));
        $sheet->setCellValue('D235', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lokal));

        $sheet->setCellValue('C236', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D236', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C239', applyZero($prev->faktor_penyebab_kecelakaan_manusia));
        $sheet->setCellValue('D239', applyZero($current->faktor_penyebab_kecelakaan_manusia));

        $sheet->setCellValue('C240', applyZero($prev->faktor_penyebab_kecelakaan_ngantuk_lelah));
        $sheet->setCellValue('D240', applyZero($current->faktor_penyebab_kecelakaan_ngantuk_lelah));

        $sheet->setCellValue('C241', applyZero($prev->faktor_penyebab_kecelakaan_mabuk_obat));
        $sheet->setCellValue('D241', applyZero($current->faktor_penyebab_kecelakaan_mabuk_obat));

        $sheet->setCellValue('C242', applyZero($prev->faktor_penyebab_kecelakaan_sakit));
        $sheet->setCellValue('D242', applyZero($current->faktor_penyebab_kecelakaan_sakit));

        $sheet->setCellValue('C243', applyZero($prev->faktor_penyebab_kecelakaan_handphone_elektronik));
        $sheet->setCellValue('D243', applyZero($current->faktor_penyebab_kecelakaan_handphone_elektronik));

        $sheet->setCellValue('C244', applyZero($prev->faktor_penyebab_kecelakaan_menerobos_lampu_merah));
        $sheet->setCellValue('D244', applyZero($current->faktor_penyebab_kecelakaan_menerobos_lampu_merah));

        $sheet->setCellValue('C245', applyZero($prev->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));
        $sheet->setCellValue('D245', applyZero($current->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));

        $sheet->setCellValue('C246', applyZero($prev->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));
        $sheet->setCellValue('D246', applyZero($current->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));

        $sheet->setCellValue('C247', applyZero($prev->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));
        $sheet->setCellValue('D247', applyZero($current->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));

        $sheet->setCellValue('C248', applyZero($prev->faktor_penyebab_kecelakaan_berpindah_jalur));
        $sheet->setCellValue('D248', applyZero($current->faktor_penyebab_kecelakaan_berpindah_jalur));

        $sheet->setCellValue('C249', applyZero($prev->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));
        $sheet->setCellValue('D249', applyZero($current->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));

        $sheet->setCellValue('C250', applyZero($prev->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));
        $sheet->setCellValue('D250', applyZero($current->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));

        $sheet->setCellValue('C251', applyZero($prev->faktor_penyebab_kecelakaan_lainnya));
        $sheet->setCellValue('D251', applyZero($current->faktor_penyebab_kecelakaan_lainnya));

        $sheet->setCellValue('C252', applyZero($prev->faktor_penyebab_kecelakaan_alam));
        $sheet->setCellValue('D252', applyZero($current->faktor_penyebab_kecelakaan_alam));

        $sheet->setCellValue('C253', applyZero($prev->faktor_penyebab_kecelakaan_kelaikan_kendaraan));
        $sheet->setCellValue('D253', applyZero($current->faktor_penyebab_kecelakaan_kelaikan_kendaraan));

        $sheet->setCellValue('C254', applyZero($prev->faktor_penyebab_kecelakaan_kondisi_jalan));
        $sheet->setCellValue('D254', applyZero($current->faktor_penyebab_kecelakaan_kondisi_jalan));

        $sheet->setCellValue('C255', applyZero($prev->faktor_penyebab_kecelakaan_prasarana_jalan));
        $sheet->setCellValue('D255', applyZero($current->faktor_penyebab_kecelakaan_prasarana_jalan));

        $sheet->setCellValue('C256', applyZero($prev->faktor_penyebab_kecelakaan_rambu));
        $sheet->setCellValue('D256', applyZero($current->faktor_penyebab_kecelakaan_rambu));

        $sheet->setCellValue('C257', applyZero($prev->faktor_penyebab_kecelakaan_marka));
        $sheet->setCellValue('D257', applyZero($current->faktor_penyebab_kecelakaan_marka));

        $sheet->setCellValue('C258', applyZero($prev->faktor_penyebab_kecelakaan_apil));
        $sheet->setCellValue('D258', applyZero($current->faktor_penyebab_kecelakaan_apil));

        $sheet->setCellValue('C259', applyZero($prev->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));
        $sheet->setCellValue('D259', applyZero($current->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));

        $sheet->setCellValue('C262', applyZero($prev->waktu_kejadian_kecelakaan_00_03));
        $sheet->setCellValue('D262', applyZero($current->waktu_kejadian_kecelakaan_00_03));

        $sheet->setCellValue('C263', applyZero($prev->waktu_kejadian_kecelakaan_03_06));
        $sheet->setCellValue('D263', applyZero($current->waktu_kejadian_kecelakaan_03_06));

        $sheet->setCellValue('C264', applyZero($prev->waktu_kejadian_kecelakaan_06_09));
        $sheet->setCellValue('D264', applyZero($current->waktu_kejadian_kecelakaan_06_09));

        $sheet->setCellValue('C265', applyZero($prev->waktu_kejadian_kecelakaan_09_12));
        $sheet->setCellValue('D265', applyZero($current->waktu_kejadian_kecelakaan_09_12));

        $sheet->setCellValue('C266', applyZero($prev->waktu_kejadian_kecelakaan_12_15));
        $sheet->setCellValue('D266', applyZero($current->waktu_kejadian_kecelakaan_12_15));

        $sheet->setCellValue('C267', applyZero($prev->waktu_kejadian_kecelakaan_15_18));
        $sheet->setCellValue('D267', applyZero($current->waktu_kejadian_kecelakaan_15_18));

        $sheet->setCellValue('C268', applyZero($prev->waktu_kejadian_kecelakaan_18_21));
        $sheet->setCellValue('D268', applyZero($current->waktu_kejadian_kecelakaan_18_21));

        $sheet->setCellValue('C269', applyZero($prev->waktu_kejadian_kecelakaan_21_24));
        $sheet->setCellValue('D269', applyZero($current->waktu_kejadian_kecelakaan_21_24));

        $sheet->setCellValue('C272', applyZero($prev->kecelakaan_lalin_menonjol_jumlah_kejadian));
        $sheet->setCellValue('D272', applyZero($current->kecelakaan_lalin_menonjol_jumlah_kejadian));

        $sheet->setCellValue('C273', applyZero($prev->kecelakaan_lalin_menonjol_korban_meninggal));
        $sheet->setCellValue('D273', applyZero($current->kecelakaan_lalin_menonjol_korban_meninggal));

        $sheet->setCellValue('C274', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_berat));
        $sheet->setCellValue('D274', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_berat));

        $sheet->setCellValue('C275', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_ringan));
        $sheet->setCellValue('D275', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_ringan));

        $sheet->setCellValue('C276', applyZero($prev->kecelakaan_lalin_menonjol_materiil));
        $sheet->setCellValue('D276', applyZero($current->kecelakaan_lalin_menonjol_materiil));

        $sheet->setCellValue('C278', applyZero($prev->kecelakaan_lalin_tunggal_jumlah_kejadian));
        $sheet->setCellValue('D278', applyZero($current->kecelakaan_lalin_tunggal_jumlah_kejadian));

        $sheet->setCellValue('C279', applyZero($prev->kecelakaan_lalin_tunggal_korban_meninggal));
        $sheet->setCellValue('D279', applyZero($current->kecelakaan_lalin_tunggal_korban_meninggal));

        $sheet->setCellValue('C280', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_berat));
        $sheet->setCellValue('D280', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_berat));

        $sheet->setCellValue('C281', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_ringan));
        $sheet->setCellValue('D281', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_ringan));

        $sheet->setCellValue('C282', applyZero($prev->kecelakaan_lalin_tunggal_materiil));
        $sheet->setCellValue('D282', applyZero($current->kecelakaan_lalin_tunggal_materiil));

        $sheet->setCellValue('C284', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));
        $sheet->setCellValue('D284', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));

        $sheet->setCellValue('C285', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));
        $sheet->setCellValue('D285', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));

        $sheet->setCellValue('C286', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));
        $sheet->setCellValue('D286', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));

        $sheet->setCellValue('C287', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));
        $sheet->setCellValue('D287', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));

        $sheet->setCellValue('C288', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));
        $sheet->setCellValue('D288', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));

        $sheet->setCellValue('C290', applyZero($prev->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));
        $sheet->setCellValue('D290', applyZero($current->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));

        $sheet->setCellValue('C291', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_meninggal));
        $sheet->setCellValue('D291', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_meninggal));

        $sheet->setCellValue('C292', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_berat));
        $sheet->setCellValue('D292', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_berat));

        $sheet->setCellValue('C293', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));
        $sheet->setCellValue('D293', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));

        $sheet->setCellValue('C294', applyZero($prev->kecelakaan_lalin_tabrak_lari_materiil));
        $sheet->setCellValue('D294', applyZero($current->kecelakaan_lalin_tabrak_lari_materiil));

        $sheet->setCellValue('C296', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));
        $sheet->setCellValue('D296', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));

        $sheet->setCellValue('C297', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));
        $sheet->setCellValue('D297', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));

        $sheet->setCellValue('C298', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));
        $sheet->setCellValue('D298', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));

        $sheet->setCellValue('C299', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));
        $sheet->setCellValue('D299', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));

        $sheet->setCellValue('C300', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_materiil));
        $sheet->setCellValue('D300', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_materiil));

        $sheet->setCellValue('C302', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));
        $sheet->setCellValue('D302', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));

        $sheet->setCellValue('C303', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));
        $sheet->setCellValue('D303', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));

        $sheet->setCellValue('C304', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));
        $sheet->setCellValue('D304', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));

        $sheet->setCellValue('C305', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));
        $sheet->setCellValue('D305', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));

        $sheet->setCellValue('C306', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_materiil));
        $sheet->setCellValue('D306', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_materiil));

        $sheet->setCellValue('C308', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));
        $sheet->setCellValue('D308', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));

        $sheet->setCellValue('C309', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));
        $sheet->setCellValue('D309', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));

        $sheet->setCellValue('C310', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));
        $sheet->setCellValue('D310', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));

        $sheet->setCellValue('C311', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));
        $sheet->setCellValue('D311', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));

        $sheet->setCellValue('C312', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));
        $sheet->setCellValue('D312', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));

        $sheet->setCellValue('C314', applyZero($prev->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));
        $sheet->setCellValue('D314', applyZero($current->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));

        $sheet->setCellValue('C315', applyZero($prev->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));
        $sheet->setCellValue('D315', applyZero($current->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));

        $sheet->setCellValue('C316', applyZero($prev->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));
        $sheet->setCellValue('D316', applyZero($current->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));

        $sheet->setCellValue('C317', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));
        $sheet->setCellValue('D317', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));

        $sheet->setCellValue('C318', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));
        $sheet->setCellValue('D318', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));

        $sheet->setCellValue('C319', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_meninggal));
        $sheet->setCellValue('D319', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_meninggal));

        $sheet->setCellValue('C320', applyZero($prev->kecelakaan_lalin_perlintasan_ka_materiil));
        $sheet->setCellValue('D320', applyZero($current->kecelakaan_lalin_perlintasan_ka_materiil));

        $sheet->setCellValue('C322', applyZero($prev->kecelakaan_transportasi_kereta_api));
        $sheet->setCellValue('D322', applyZero($current->kecelakaan_transportasi_kereta_api));

        $sheet->setCellValue('C323', applyZero($prev->kecelakaan_transportasi_laut_perairan));
        $sheet->setCellValue('D323', applyZero($current->kecelakaan_transportasi_laut_perairan));

        $sheet->setCellValue('C324', applyZero($prev->kecelakaan_transportasi_udara));
        $sheet->setCellValue('D324', applyZero($current->kecelakaan_transportasi_udara));

        $sheet->setCellValue('C329', applyZero($prev->penlu_melalui_media_cetak));
        $sheet->setCellValue('D329', applyZero($current->penlu_melalui_media_cetak));

        $sheet->setCellValue('C330', applyZero($prev->penlu_melalui_media_elektronik));
        $sheet->setCellValue('D330', applyZero($current->penlu_melalui_media_elektronik));

        $sheet->setCellValue('C331', applyZero($prev->penlu_melalui_media_sosial));
        $sheet->setCellValue('D331', applyZero($current->penlu_melalui_media_sosial));

        $sheet->setCellValue('C332', applyZero($prev->penlu_melalui_tempat_keramaian));
        $sheet->setCellValue('D332', applyZero($current->penlu_melalui_tempat_keramaian));

        $sheet->setCellValue('C333', applyZero($prev->penlu_melalui_tempat_istirahat));
        $sheet->setCellValue('D333', applyZero($current->penlu_melalui_tempat_istirahat));

        $sheet->setCellValue('C334', applyZero($prev->penlu_melalui_daerah_rawan_laka_dan_langgar));
        $sheet->setCellValue('D334', applyZero($current->penlu_melalui_daerah_rawan_laka_dan_langgar));

        $sheet->setCellValue('C337', applyZero($prev->penyebaran_pemasangan_spanduk));
        $sheet->setCellValue('D337', applyZero($current->penyebaran_pemasangan_spanduk));

        $sheet->setCellValue('C338', applyZero($prev->penyebaran_pemasangan_leaflet));
        $sheet->setCellValue('D338', applyZero($current->penyebaran_pemasangan_leaflet));

        $sheet->setCellValue('C339', applyZero($prev->penyebaran_pemasangan_sticker));
        $sheet->setCellValue('D339', applyZero($current->penyebaran_pemasangan_sticker));

        $sheet->setCellValue('C340', applyZero($prev->penyebaran_pemasangan_bilboard));
        $sheet->setCellValue('D340', applyZero($current->penyebaran_pemasangan_bilboard));

        $sheet->setCellValue('C343', applyZero($prev->polisi_sahabat_anak));
        $sheet->setCellValue('D343', applyZero($current->polisi_sahabat_anak));

        $sheet->setCellValue('C344', applyZero($prev->cara_aman_sekolah));
        $sheet->setCellValue('D344', applyZero($current->cara_aman_sekolah));

        $sheet->setCellValue('C345', applyZero($prev->patroli_keamanan_sekolah));
        $sheet->setCellValue('D345', applyZero($current->patroli_keamanan_sekolah));

        $sheet->setCellValue('C346', applyZero($prev->pramuka_bhayangkara_krida_lalu_lintas));
        $sheet->setCellValue('D346', applyZero($current->pramuka_bhayangkara_krida_lalu_lintas));

        $sheet->setCellValue('C349', applyZero($prev->police_goes_to_campus));
        $sheet->setCellValue('D349', applyZero($current->police_goes_to_campus));

        $sheet->setCellValue('C350', applyZero($prev->safety_riding_driving));
        $sheet->setCellValue('D350', applyZero($current->safety_riding_driving));

        $sheet->setCellValue('C351', applyZero($prev->forum_lalu_lintas_angkutan_umum));
        $sheet->setCellValue('D351', applyZero($current->forum_lalu_lintas_angkutan_umum));

        $sheet->setCellValue('C352', applyZero($prev->kampanye_keselamatan));
        $sheet->setCellValue('D352', applyZero($current->kampanye_keselamatan));

        $sheet->setCellValue('C353', applyZero($prev->sekolah_mengemudi));
        $sheet->setCellValue('D353', applyZero($current->sekolah_mengemudi));

        $sheet->setCellValue('C354', applyZero($prev->taman_lalu_lintas));
        $sheet->setCellValue('D354', applyZero($current->taman_lalu_lintas));

        $sheet->setCellValue('C355', applyZero($prev->global_road_safety_partnership_action));
        $sheet->setCellValue('D355', applyZero($current->global_road_safety_partnership_action));

        $sheet->setCellValue('C359', applyZero($prev->giat_lantas_pengaturan));
        $sheet->setCellValue('D359', applyZero($current->giat_lantas_pengaturan));

        $sheet->setCellValue('C360', applyZero($prev->giat_lantas_penjagaan));
        $sheet->setCellValue('D360', applyZero($current->giat_lantas_penjagaan));

        $sheet->setCellValue('C361', applyZero($prev->giat_lantas_pengawalan));
        $sheet->setCellValue('D361', applyZero($current->giat_lantas_pengawalan));

        $sheet->setCellValue('C362', applyZero($prev->giat_lantas_patroli));
        $sheet->setCellValue('D362', applyZero($current->giat_lantas_patroli));

        $sheet->setCellValue('C367', applyZero($prev->arus_mudik_jumlah_bus_keberangkatan));
        $sheet->setCellValue('D367', applyZero($current->arus_mudik_jumlah_bus_keberangkatan));

        $sheet->setCellValue('C368', applyZero($prev->arus_mudik_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D368', applyZero($current->arus_mudik_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C369', applyZero($prev->arus_mudik_jumlah_bus_kedatangan));
        $sheet->setCellValue('D369', applyZero($current->arus_mudik_jumlah_bus_kedatangan));

        $sheet->setCellValue('C370', applyZero($prev->arus_mudik_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D370', applyZero($current->arus_mudik_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C371', applyZero($prev->arus_mudik_total_terminal));
        $sheet->setCellValue('D371', applyZero($current->arus_mudik_total_terminal));

        $sheet->setCellValue('C372', applyZero($prev->arus_mudik_total_bus_keberangkatan));
        $sheet->setCellValue('D372', applyZero($current->arus_mudik_total_bus_keberangkatan));

        $sheet->setCellValue('C373', applyZero($prev->arus_mudik_penumpang_keberangkatan));
        $sheet->setCellValue('D373', applyZero($current->arus_mudik_penumpang_keberangkatan));

        $sheet->setCellValue('C374', applyZero($prev->arus_mudik_total_bus_kedatangan));
        $sheet->setCellValue('D374', applyZero($current->arus_mudik_total_bus_kedatangan));

        $sheet->setCellValue('C375', applyZero($prev->arus_mudik_penumpang_kedatangan));
        $sheet->setCellValue('D375', applyZero($current->arus_mudik_penumpang_kedatangan));

        $sheet->setCellValue('C377', applyZero($prev->arus_mudik_kereta_api_total_stasiun));
        $sheet->setCellValue('D377', applyZero($current->arus_mudik_kereta_api_total_stasiun));

        $sheet->setCellValue('C378', applyZero($prev->arus_mudik_kereta_api_total_penumpang_keberangkatan));
        $sheet->setCellValue('D378', applyZero($current->arus_mudik_kereta_api_total_penumpang_keberangkatan));

        $sheet->setCellValue('C379', applyZero($prev->arus_mudik_kereta_api_total_penumpang_kedatangan));
        $sheet->setCellValue('D379', applyZero($current->arus_mudik_kereta_api_total_penumpang_kedatangan));

        $sheet->setCellValue('C381', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));
        $sheet->setCellValue('D381', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));

        $sheet->setCellValue('C382', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));
        $sheet->setCellValue('D382', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));

        $sheet->setCellValue('C383', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));
        $sheet->setCellValue('D383', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));

        $sheet->setCellValue('C384', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D384', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C385', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));
        $sheet->setCellValue('D385', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));

        $sheet->setCellValue('C386', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));
        $sheet->setCellValue('D386', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));

        $sheet->setCellValue('C387', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));
        $sheet->setCellValue('D387', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));

        $sheet->setCellValue('C388', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D388', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C389', applyZero($prev->arus_mudik_total_pelabuhan));
        $sheet->setCellValue('D389', applyZero($current->arus_mudik_total_pelabuhan));

        $sheet->setCellValue('C390', applyZero($prev->arus_mudik_pelabuhan_kendaraan_keberangkatan));
        $sheet->setCellValue('D390', applyZero($current->arus_mudik_pelabuhan_kendaraan_keberangkatan));

        $sheet->setCellValue('C391', applyZero($prev->arus_mudik_pelabuhan_kendaraan_kedatangan));
        $sheet->setCellValue('D391', applyZero($current->arus_mudik_pelabuhan_kendaraan_kedatangan));

        $sheet->setCellValue('C392', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_keberangkatan));
        $sheet->setCellValue('D392', applyZero($current->arus_mudik_pelabuhan_total_penumpang_keberangkatan));

        $sheet->setCellValue('C393', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_kedatangan));
        $sheet->setCellValue('D393', applyZero($current->arus_mudik_pelabuhan_total_penumpang_kedatangan));

        $sheet->setCellValue('C395', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D395', applyZero($current->arus_mudik_bandara_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C396', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D396', applyZero($current->arus_mudik_bandara_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C397', applyZero($prev->arus_mudik_total_bandara));
        $sheet->setCellValue('D397', applyZero($current->arus_mudik_total_bandara));

        $sheet->setCellValue('C398', applyZero($prev->arus_mudik_bandara_total_penumpang_keberangkatan));
        $sheet->setCellValue('D398', applyZero($current->arus_mudik_bandara_total_penumpang_keberangkatan));

        $sheet->setCellValue('C399', applyZero($prev->arus_mudik_bandara_total_penumpang_kedatangan));
        $sheet->setCellValue('D399', applyZero($current->arus_mudik_bandara_total_penumpang_kedatangan));

        $sheet->setCellValue('C402', applyZero($prev->prokes_covid_teguran_gar_prokes));
        $sheet->setCellValue('D402', applyZero($current->prokes_covid_teguran_gar_prokes));

        $sheet->setCellValue('C403', applyZero($prev->prokes_covid_pembagian_masker));
        $sheet->setCellValue('D403', applyZero($current->prokes_covid_pembagian_masker));

        $sheet->setCellValue('C404', applyZero($prev->prokes_covid_sosialisasi_tentang_prokes));
        $sheet->setCellValue('D404', applyZero($current->prokes_covid_sosialisasi_tentang_prokes));

        $sheet->setCellValue('C405', applyZero($prev->prokes_covid_giat_baksos));
        $sheet->setCellValue('D405', applyZero($current->prokes_covid_giat_baksos));

        $sheet->setCellValue('C408', applyZero($prev->penyekatan_motor));
        $sheet->setCellValue('D408', applyZero($current->penyekatan_motor));

        $sheet->setCellValue('C409', applyZero($prev->penyekatan_mobil_penumpang));
        $sheet->setCellValue('D409', applyZero($current->penyekatan_mobil_penumpang));

        $sheet->setCellValue('C410', applyZero($prev->penyekatan_mobil_bus));
        $sheet->setCellValue('D410', applyZero($current->penyekatan_mobil_bus));

        $sheet->setCellValue('C411', applyZero($prev->penyekatan_mobil_barang));
        $sheet->setCellValue('D411', applyZero($current->penyekatan_mobil_barang));

        $sheet->setCellValue('C412', applyZero($prev->penyekatan_kendaraan_khusus));
        $sheet->setCellValue('D412', applyZero($current->penyekatan_kendaraan_khusus));

        $writer = IOFactory::createWriter($spreadsheet, 'Html');
        $message = $writer->save('php://output');

        return $message;
    }
}

if (! function_exists('excelTemplateDisplayDateCompare')) {
    function excelTemplateDisplayDateCompare($prev, $current, $prevYear, $currentYear)
    {
        $excelPath = public_path('template/excel');

        $excelTemplate = $excelPath."/format_laporan_operasi_2021_preview_date_compare.xlsx";

        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($excelTemplate);

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('C2', $prevYear);
        $sheet->setCellValue('D2', $currentYear);

        $sheet->setCellValue('C6', applyZero($prev->pelanggaran_lalu_lintas_tilang));
        $sheet->setCellValue('D6', applyZero($current->pelanggaran_lalu_lintas_tilang));

        $sheet->setCellValue('C7', applyZero($prev->pelanggaran_lalu_lintas_teguran));
        $sheet->setCellValue('D7', applyZero($current->pelanggaran_lalu_lintas_teguran));

        $sheet->setCellValue('C11', applyZero($prev->pelanggaran_sepeda_motor_kecepatan));
        $sheet->setCellValue('D11', applyZero($current->pelanggaran_sepeda_motor_kecepatan));

        $sheet->setCellValue('C12', applyZero($prev->pelanggaran_sepeda_motor_helm));
        $sheet->setCellValue('D12', applyZero($current->pelanggaran_sepeda_motor_helm));

        $sheet->setCellValue('C13', applyZero($prev->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));
        $sheet->setCellValue('D13', applyZero($current->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));

        $sheet->setCellValue('C14', applyZero($prev->pelanggaran_sepeda_motor_marka_menerus_menyalip));
        $sheet->setCellValue('D14', applyZero($current->pelanggaran_sepeda_motor_marka_menerus_menyalip));

        $sheet->setCellValue('C15', applyZero($prev->pelanggaran_sepeda_motor_melawan_arus));
        $sheet->setCellValue('D15', applyZero($current->pelanggaran_sepeda_motor_melawan_arus));

        $sheet->setCellValue('C16', applyZero($prev->pelanggaran_sepeda_motor_melanggar_lampu_lalin));
        $sheet->setCellValue('D16', applyZero($current->pelanggaran_sepeda_motor_melanggar_lampu_lalin));

        $sheet->setCellValue('C17', applyZero($prev->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));
        $sheet->setCellValue('D17', applyZero($current->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));

        $sheet->setCellValue('C18', applyZero($prev->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D18', applyZero($current->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C19', applyZero($prev->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));
        $sheet->setCellValue('D19', applyZero($current->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));

        $sheet->setCellValue('C20', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D20', applyZero($current->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C21', applyZero($prev->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D21', applyZero($current->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C22', applyZero($prev->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D22', applyZero($current->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C23', applyZero($prev->pelanggaran_sepeda_motor_melanggar_marka_berhenti));
        $sheet->setCellValue('D23', applyZero($current->pelanggaran_sepeda_motor_melanggar_marka_berhenti));

        $sheet->setCellValue('C24', applyZero($prev->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D24', applyZero($current->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C25', applyZero($prev->pelanggaran_sepeda_motor_surat_surat));
        $sheet->setCellValue('D25', applyZero($current->pelanggaran_sepeda_motor_surat_surat));

        $sheet->setCellValue('C26', applyZero($prev->pelanggaran_sepeda_motor_kelengkapan_kendaraan));
        $sheet->setCellValue('D26', applyZero($current->pelanggaran_sepeda_motor_kelengkapan_kendaraan));

        $sheet->setCellValue('C27', applyZero($prev->pelanggaran_sepeda_motor_lain_lain));
        $sheet->setCellValue('D27', applyZero($current->pelanggaran_sepeda_motor_lain_lain));

        $sheet->setCellValue('C30', applyZero($prev->pelanggaran_mobil_kecepatan));
        $sheet->setCellValue('D30', applyZero($current->pelanggaran_mobil_kecepatan));

        $sheet->setCellValue('C31', applyZero($prev->pelanggaran_mobil_safety_belt));
        $sheet->setCellValue('D31', applyZero($current->pelanggaran_mobil_safety_belt));

        $sheet->setCellValue('C32', applyZero($prev->pelanggaran_mobil_muatan_overload));
        $sheet->setCellValue('D32', applyZero($current->pelanggaran_mobil_muatan_overload));

        $sheet->setCellValue('C33', applyZero($prev->pelanggaran_mobil_marka_menerus_menyalip));
        $sheet->setCellValue('D33', applyZero($current->pelanggaran_mobil_marka_menerus_menyalip));

        $sheet->setCellValue('C34', applyZero($prev->pelanggaran_mobil_melawan_arus));
        $sheet->setCellValue('D34', applyZero($current->pelanggaran_mobil_melawan_arus));

        $sheet->setCellValue('C35', applyZero($prev->pelanggaran_mobil_melanggar_lampu_lalin));
        $sheet->setCellValue('D35', applyZero($current->pelanggaran_mobil_melanggar_lampu_lalin));

        $sheet->setCellValue('C36', applyZero($prev->pelanggaran_mobil_mengemudi_tidak_wajar));
        $sheet->setCellValue('D36', applyZero($current->pelanggaran_mobil_mengemudi_tidak_wajar));

        $sheet->setCellValue('C37', applyZero($prev->pelanggaran_mobil_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D37', applyZero($current->pelanggaran_mobil_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C38', applyZero($prev->pelanggaran_mobil_tidak_nyala_lampu_malam));
        $sheet->setCellValue('D38', applyZero($current->pelanggaran_mobil_tidak_nyala_lampu_malam));

        $sheet->setCellValue('C39', applyZero($prev->pelanggaran_mobil_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D39', applyZero($current->pelanggaran_mobil_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C40', applyZero($prev->pelanggaran_mobil_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D40', applyZero($current->pelanggaran_mobil_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C41', applyZero($prev->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D41', applyZero($current->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C42', applyZero($prev->pelanggaran_mobil_melanggar_marka_berhenti));
        $sheet->setCellValue('D42', applyZero($current->pelanggaran_mobil_melanggar_marka_berhenti));

        $sheet->setCellValue('C43', applyZero($prev->pelanggaran_mobil_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D43', applyZero($current->pelanggaran_mobil_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C44', applyZero($prev->pelanggaran_mobil_surat_surat));
        $sheet->setCellValue('D44', applyZero($current->pelanggaran_mobil_surat_surat));

        $sheet->setCellValue('C45', applyZero($prev->pelanggaran_mobil_kelengkapan_kendaraan));
        $sheet->setCellValue('D45', applyZero($current->pelanggaran_mobil_kelengkapan_kendaraan));

        $sheet->setCellValue('C46', applyZero($prev->pelanggaran_mobil_lain_lain));
        $sheet->setCellValue('D46', applyZero($current->pelanggaran_mobil_lain_lain));

        $sheet->setCellValue('C49', applyZero($prev->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));
        $sheet->setCellValue('D49', applyZero($current->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));

        $sheet->setCellValue('C52', applyZero($prev->barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D52', applyZero($current->barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C53', applyZero($prev->barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D53', applyZero($current->barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C54', applyZero($prev->barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D54', applyZero($current->barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C57', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));
        $sheet->setCellValue('D57', applyZero($current->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));

        $sheet->setCellValue('C58', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));
        $sheet->setCellValue('D58', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));

        $sheet->setCellValue('C59', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_bus));
        $sheet->setCellValue('D59', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_bus));

        $sheet->setCellValue('C60', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_barang));
        $sheet->setCellValue('D60', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_barang));

        $sheet->setCellValue('C61', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));
        $sheet->setCellValue('D61', applyZero($current->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));

        $sheet->setCellValue('C64', applyZero($prev->profesi_pelaku_pelanggaran_pns));
        $sheet->setCellValue('D64', applyZero($current->profesi_pelaku_pelanggaran_pns));

        $sheet->setCellValue('C65', applyZero($prev->profesi_pelaku_pelanggaran_karyawan_swasta));
        $sheet->setCellValue('D65', applyZero($current->profesi_pelaku_pelanggaran_karyawan_swasta));

        $sheet->setCellValue('C66', applyZero($prev->profesi_pelaku_pelanggaran_pelajar_mahasiswa));
        $sheet->setCellValue('D66', applyZero($current->profesi_pelaku_pelanggaran_pelajar_mahasiswa));

        $sheet->setCellValue('C67', applyZero($prev->profesi_pelaku_pelanggaran_pengemudi_supir));
        $sheet->setCellValue('D67', applyZero($current->profesi_pelaku_pelanggaran_pengemudi_supir));

        $sheet->setCellValue('C68', applyZero($prev->profesi_pelaku_pelanggaran_tni));
        $sheet->setCellValue('D68', applyZero($current->profesi_pelaku_pelanggaran_tni));

        $sheet->setCellValue('C69', applyZero($prev->profesi_pelaku_pelanggaran_polri));
        $sheet->setCellValue('D69', applyZero($current->profesi_pelaku_pelanggaran_polri));

        $sheet->setCellValue('C70', applyZero($prev->profesi_pelaku_pelanggaran_lain_lain));
        $sheet->setCellValue('D70', applyZero($current->profesi_pelaku_pelanggaran_lain_lain));

        $sheet->setCellValue('C73', applyZero($prev->usia_pelaku_pelanggaran_kurang_dari_15_tahun));
        $sheet->setCellValue('D73', applyZero($current->usia_pelaku_pelanggaran_kurang_dari_15_tahun));

        $sheet->setCellValue('C74', applyZero($prev->usia_pelaku_pelanggaran_16_20_tahun));
        $sheet->setCellValue('D74', applyZero($current->usia_pelaku_pelanggaran_16_20_tahun));

        $sheet->setCellValue('C75', applyZero($prev->usia_pelaku_pelanggaran_21_25_tahun));
        $sheet->setCellValue('D75', applyZero($current->usia_pelaku_pelanggaran_21_25_tahun));

        $sheet->setCellValue('C76', applyZero($prev->usia_pelaku_pelanggaran_26_30_tahun));
        $sheet->setCellValue('D76', applyZero($current->usia_pelaku_pelanggaran_26_30_tahun));

        $sheet->setCellValue('C77', applyZero($prev->usia_pelaku_pelanggaran_31_35_tahun));
        $sheet->setCellValue('D77', applyZero($current->usia_pelaku_pelanggaran_31_35_tahun));

        $sheet->setCellValue('C78', applyZero($prev->usia_pelaku_pelanggaran_36_40_tahun));
        $sheet->setCellValue('D78', applyZero($current->usia_pelaku_pelanggaran_36_40_tahun));

        $sheet->setCellValue('C79', applyZero($prev->usia_pelaku_pelanggaran_41_45_tahun));
        $sheet->setCellValue('D79', applyZero($current->usia_pelaku_pelanggaran_41_45_tahun));

        $sheet->setCellValue('C80', applyZero($prev->usia_pelaku_pelanggaran_46_50_tahun));
        $sheet->setCellValue('D80', applyZero($current->usia_pelaku_pelanggaran_46_50_tahun));

        $sheet->setCellValue('C81', applyZero($prev->usia_pelaku_pelanggaran_51_55_tahun));
        $sheet->setCellValue('D81', applyZero($current->usia_pelaku_pelanggaran_51_55_tahun));

        $sheet->setCellValue('C82', applyZero($prev->usia_pelaku_pelanggaran_56_60_tahun));
        $sheet->setCellValue('D82', applyZero($current->usia_pelaku_pelanggaran_56_60_tahun));

        $sheet->setCellValue('C83', applyZero($prev->usia_pelaku_pelanggaran_diatas_60_tahun));
        $sheet->setCellValue('D83', applyZero($current->usia_pelaku_pelanggaran_diatas_60_tahun));

        $sheet->setCellValue('C86', applyZero($prev->sim_pelaku_pelanggaran_sim_a));
        $sheet->setCellValue('D86', applyZero($current->sim_pelaku_pelanggaran_sim_a));

        $sheet->setCellValue('C87', applyZero($prev->sim_pelaku_pelanggaran_sim_a_umum));
        $sheet->setCellValue('D87', applyZero($current->sim_pelaku_pelanggaran_sim_a_umum));

        $sheet->setCellValue('C88', applyZero($prev->sim_pelaku_pelanggaran_sim_b1));
        $sheet->setCellValue('D88', applyZero($current->sim_pelaku_pelanggaran_sim_b1));

        $sheet->setCellValue('C89', applyZero($prev->sim_pelaku_pelanggaran_sim_b1_umum));
        $sheet->setCellValue('D89', applyZero($current->sim_pelaku_pelanggaran_sim_b1_umum));

        $sheet->setCellValue('C90', applyZero($prev->sim_pelaku_pelanggaran_sim_b2));
        $sheet->setCellValue('D90', applyZero($current->sim_pelaku_pelanggaran_sim_b2));

        $sheet->setCellValue('C91', applyZero($prev->sim_pelaku_pelanggaran_sim_b2_umum));
        $sheet->setCellValue('D91', applyZero($current->sim_pelaku_pelanggaran_sim_b2_umum));

        $sheet->setCellValue('C92', applyZero($prev->sim_pelaku_pelanggaran_sim_c));
        $sheet->setCellValue('D92', applyZero($current->sim_pelaku_pelanggaran_sim_c));

        $sheet->setCellValue('C93', applyZero($prev->sim_pelaku_pelanggaran_sim_d));
        $sheet->setCellValue('D93', applyZero($current->sim_pelaku_pelanggaran_sim_d));

        $sheet->setCellValue('C94', applyZero($prev->sim_pelaku_pelanggaran_sim_internasional));
        $sheet->setCellValue('D94', applyZero($current->sim_pelaku_pelanggaran_sim_internasional));

        $sheet->setCellValue('C95', applyZero($prev->sim_pelaku_pelanggaran_tanpa_sim));
        $sheet->setCellValue('D95', applyZero($current->sim_pelaku_pelanggaran_tanpa_sim));

        $sheet->setCellValue('C99', applyZero($prev->lokasi_pelanggaran_pemukiman));
        $sheet->setCellValue('D99', applyZero($current->lokasi_pelanggaran_pemukiman));

        $sheet->setCellValue('C100', applyZero($prev->lokasi_pelanggaran_perbelanjaan));
        $sheet->setCellValue('D100', applyZero($current->lokasi_pelanggaran_perbelanjaan));

        $sheet->setCellValue('C101', applyZero($prev->lokasi_pelanggaran_perkantoran));
        $sheet->setCellValue('D101', applyZero($current->lokasi_pelanggaran_perkantoran));

        $sheet->setCellValue('C102', applyZero($prev->lokasi_pelanggaran_wisata));
        $sheet->setCellValue('D102', applyZero($current->lokasi_pelanggaran_wisata));

        $sheet->setCellValue('C103', applyZero($prev->lokasi_pelanggaran_industri));
        $sheet->setCellValue('D103', applyZero($current->lokasi_pelanggaran_industri));

        $sheet->setCellValue('C106', applyZero($prev->lokasi_pelanggaran_status_jalan_nasional));
        $sheet->setCellValue('D106', applyZero($current->lokasi_pelanggaran_status_jalan_nasional));

        $sheet->setCellValue('C107', applyZero($prev->lokasi_pelanggaran_status_jalan_propinsi));
        $sheet->setCellValue('D107', applyZero($current->lokasi_pelanggaran_status_jalan_propinsi));

        $sheet->setCellValue('C108', applyZero($prev->lokasi_pelanggaran_status_jalan_kab_kota));
        $sheet->setCellValue('D108', applyZero($current->lokasi_pelanggaran_status_jalan_kab_kota));

        $sheet->setCellValue('C109', applyZero($prev->lokasi_pelanggaran_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D109', applyZero($current->lokasi_pelanggaran_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C112', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_arteri));
        $sheet->setCellValue('D112', applyZero($current->lokasi_pelanggaran_fungsi_jalan_arteri));

        $sheet->setCellValue('C113', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_kolektor));
        $sheet->setCellValue('D113', applyZero($current->lokasi_pelanggaran_fungsi_jalan_kolektor));

        $sheet->setCellValue('C114', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lokal));
        $sheet->setCellValue('D114', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lokal));

        $sheet->setCellValue('C115', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D115', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C119', applyZero($prev->kecelakaan_lalin_jumlah_kejadian));
        $sheet->setCellValue('D119', applyZero($current->kecelakaan_lalin_jumlah_kejadian));

        $sheet->setCellValue('C120', applyZero($prev->kecelakaan_lalin_jumlah_korban_meninggal));
        $sheet->setCellValue('D120', applyZero($current->kecelakaan_lalin_jumlah_korban_meninggal));

        $sheet->setCellValue('C121', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_berat));
        $sheet->setCellValue('D121', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_berat));

        $sheet->setCellValue('C122', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_ringan));
        $sheet->setCellValue('D122', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_ringan));

        $sheet->setCellValue('C123', applyZero($prev->kecelakaan_lalin_jumlah_kerugian_materiil));
        $sheet->setCellValue('D123', applyZero($current->kecelakaan_lalin_jumlah_kerugian_materiil));

        $sheet->setCellValue('C125', applyZero($prev->kecelakaan_barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D125', applyZero($current->kecelakaan_barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C126', applyZero($prev->kecelakaan_barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D126', applyZero($current->kecelakaan_barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C127', applyZero($prev->kecelakaan_barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D127', applyZero($current->kecelakaan_barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C130', applyZero($prev->profesi_korban_kecelakaan_lalin_pns));
        $sheet->setCellValue('D130', applyZero($current->profesi_korban_kecelakaan_lalin_pns));

        $sheet->setCellValue('C131', applyZero($prev->profesi_korban_kecelakaan_lalin_karwayan_swasta));
        $sheet->setCellValue('D131', applyZero($current->profesi_korban_kecelakaan_lalin_karwayan_swasta));

        $sheet->setCellValue('C132', applyZero($prev->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));
        $sheet->setCellValue('D132', applyZero($current->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));

        $sheet->setCellValue('C133', applyZero($prev->profesi_korban_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D133', applyZero($current->profesi_korban_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C134', applyZero($prev->profesi_korban_kecelakaan_lalin_tni));
        $sheet->setCellValue('D134', applyZero($current->profesi_korban_kecelakaan_lalin_tni));

        $sheet->setCellValue('C135', applyZero($prev->profesi_korban_kecelakaan_lalin_polri));
        $sheet->setCellValue('D135', applyZero($current->profesi_korban_kecelakaan_lalin_polri));

        $sheet->setCellValue('C136', applyZero($prev->profesi_korban_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D136', applyZero($current->profesi_korban_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C139', applyZero($prev->usia_korban_kecelakaan_kurang_15));
        $sheet->setCellValue('D139', applyZero($current->usia_korban_kecelakaan_kurang_15));

        $sheet->setCellValue('C140', applyZero($prev->usia_korban_kecelakaan_16_20));
        $sheet->setCellValue('D140', applyZero($current->usia_korban_kecelakaan_16_20));

        $sheet->setCellValue('C141', applyZero($prev->usia_korban_kecelakaan_21_25));
        $sheet->setCellValue('D141', applyZero($current->usia_korban_kecelakaan_21_25));

        $sheet->setCellValue('C142', applyZero($prev->usia_korban_kecelakaan_26_30));
        $sheet->setCellValue('D142', applyZero($current->usia_korban_kecelakaan_26_30));

        $sheet->setCellValue('C143', applyZero($prev->usia_korban_kecelakaan_31_35));
        $sheet->setCellValue('D143', applyZero($current->usia_korban_kecelakaan_31_35));

        $sheet->setCellValue('C144', applyZero($prev->usia_korban_kecelakaan_36_40));
        $sheet->setCellValue('D144', applyZero($current->usia_korban_kecelakaan_36_40));

        $sheet->setCellValue('C145', applyZero($prev->usia_korban_kecelakaan_41_45));
        $sheet->setCellValue('D145', applyZero($current->usia_korban_kecelakaan_41_45));

        $sheet->setCellValue('C146', applyZero($prev->usia_korban_kecelakaan_45_50));
        $sheet->setCellValue('D146', applyZero($current->usia_korban_kecelakaan_45_50));

        $sheet->setCellValue('C147', applyZero($prev->usia_korban_kecelakaan_51_55));
        $sheet->setCellValue('D147', applyZero($current->usia_korban_kecelakaan_51_55));

        $sheet->setCellValue('C148', applyZero($prev->usia_korban_kecelakaan_56_60));
        $sheet->setCellValue('D148', applyZero($current->usia_korban_kecelakaan_56_60));

        $sheet->setCellValue('C149', applyZero($prev->usia_korban_kecelakaan_diatas_60));
        $sheet->setCellValue('D149', applyZero($current->usia_korban_kecelakaan_diatas_60));

        $sheet->setCellValue('C152', applyZero($prev->sim_korban_kecelakaan_sim_a));
        $sheet->setCellValue('D152', applyZero($current->sim_korban_kecelakaan_sim_a));

        $sheet->setCellValue('C153', applyZero($prev->sim_korban_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D153', applyZero($current->sim_korban_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C154', applyZero($prev->sim_korban_kecelakaan_sim_b1));
        $sheet->setCellValue('D154', applyZero($current->sim_korban_kecelakaan_sim_b1));

        $sheet->setCellValue('C155', applyZero($prev->sim_korban_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D155', applyZero($current->sim_korban_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C156', applyZero($prev->sim_korban_kecelakaan_sim_b2));
        $sheet->setCellValue('D156', applyZero($current->sim_korban_kecelakaan_sim_b2));

        $sheet->setCellValue('C157', applyZero($prev->sim_korban_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D157', applyZero($current->sim_korban_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C158', applyZero($prev->sim_korban_kecelakaan_sim_c));
        $sheet->setCellValue('D158', applyZero($current->sim_korban_kecelakaan_sim_c));

        $sheet->setCellValue('C159', applyZero($prev->sim_korban_kecelakaan_sim_d));
        $sheet->setCellValue('D159', applyZero($current->sim_korban_kecelakaan_sim_d));

        $sheet->setCellValue('C160', applyZero($prev->sim_korban_kecelakaan_sim_internasional));
        $sheet->setCellValue('D160', applyZero($current->sim_korban_kecelakaan_sim_internasional));

        $sheet->setCellValue('C161', applyZero($prev->sim_korban_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D161', applyZero($current->sim_korban_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C164', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));
        $sheet->setCellValue('D164', applyZero($current->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));

        $sheet->setCellValue('C165', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));
        $sheet->setCellValue('D165', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));

        $sheet->setCellValue('C166', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_bus));
        $sheet->setCellValue('D166', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_bus));

        $sheet->setCellValue('C167', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_barang));
        $sheet->setCellValue('D167', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_barang));

        $sheet->setCellValue('C168', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));
        $sheet->setCellValue('D168', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));

        $sheet->setCellValue('C169', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));
        $sheet->setCellValue('D169', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));

        $sheet->setCellValue('C172', applyZero($prev->jenis_kecelakaan_tunggal_ooc));
        $sheet->setCellValue('D172', applyZero($current->jenis_kecelakaan_tunggal_ooc));

        $sheet->setCellValue('C173', applyZero($prev->jenis_kecelakaan_depan_depan));
        $sheet->setCellValue('D173', applyZero($current->jenis_kecelakaan_depan_depan));

        $sheet->setCellValue('C174', applyZero($prev->jenis_kecelakaan_depan_belakang));
        $sheet->setCellValue('D174', applyZero($current->jenis_kecelakaan_depan_belakang));

        $sheet->setCellValue('C175', applyZero($prev->jenis_kecelakaan_depan_samping));
        $sheet->setCellValue('D175', applyZero($current->jenis_kecelakaan_depan_samping));

        $sheet->setCellValue('C176', applyZero($prev->jenis_kecelakaan_beruntun));
        $sheet->setCellValue('D176', applyZero($current->jenis_kecelakaan_beruntun));

        $sheet->setCellValue('C177', applyZero($prev->jenis_kecelakaan_pejalan_kaki));
        $sheet->setCellValue('D177', applyZero($current->jenis_kecelakaan_pejalan_kaki));

        $sheet->setCellValue('C178', applyZero($prev->jenis_kecelakaan_tabrak_lari));
        $sheet->setCellValue('D178', applyZero($current->jenis_kecelakaan_tabrak_lari));

        $sheet->setCellValue('C179', applyZero($prev->jenis_kecelakaan_tabrak_hewan));
        $sheet->setCellValue('D179', applyZero($current->jenis_kecelakaan_tabrak_hewan));

        $sheet->setCellValue('C180', applyZero($prev->jenis_kecelakaan_samping_samping));
        $sheet->setCellValue('D180', applyZero($current->jenis_kecelakaan_samping_samping));

        $sheet->setCellValue('C181', applyZero($prev->jenis_kecelakaan_lainnya));
        $sheet->setCellValue('D181', applyZero($current->jenis_kecelakaan_lainnya));

        $sheet->setCellValue('C184', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pns));
        $sheet->setCellValue('D184', applyZero($current->profesi_pelaku_kecelakaan_lalin_pns));

        $sheet->setCellValue('C185', applyZero($prev->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));
        $sheet->setCellValue('D185', applyZero($current->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));

        $sheet->setCellValue('C186', applyZero($prev->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));
        $sheet->setCellValue('D186', applyZero($current->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));

        $sheet->setCellValue('C187', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D187', applyZero($current->profesi_pelaku_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C188', applyZero($prev->profesi_pelaku_kecelakaan_lalin_tni));
        $sheet->setCellValue('D188', applyZero($current->profesi_pelaku_kecelakaan_lalin_tni));

        $sheet->setCellValue('C189', applyZero($prev->profesi_pelaku_kecelakaan_lalin_polri));
        $sheet->setCellValue('D189', applyZero($current->profesi_pelaku_kecelakaan_lalin_polri));

        $sheet->setCellValue('C190', applyZero($prev->profesi_pelaku_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D190', applyZero($current->profesi_pelaku_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C193', applyZero($prev->usia_pelaku_kecelakaan_kurang_dari_15_tahun));
        $sheet->setCellValue('D193', applyZero($current->usia_pelaku_kecelakaan_kurang_dari_15_tahun));

        $sheet->setCellValue('C194', applyZero($prev->usia_pelaku_kecelakaan_16_20_tahun));
        $sheet->setCellValue('D194', applyZero($current->usia_pelaku_kecelakaan_16_20_tahun));

        $sheet->setCellValue('C195', applyZero($prev->usia_pelaku_kecelakaan_21_25_tahun));
        $sheet->setCellValue('D195', applyZero($current->usia_pelaku_kecelakaan_21_25_tahun));

        $sheet->setCellValue('C196', applyZero($prev->usia_pelaku_kecelakaan_26_30_tahun));
        $sheet->setCellValue('D196', applyZero($current->usia_pelaku_kecelakaan_26_30_tahun));

        $sheet->setCellValue('C197', applyZero($prev->usia_pelaku_kecelakaan_31_35_tahun));
        $sheet->setCellValue('D197', applyZero($current->usia_pelaku_kecelakaan_31_35_tahun));

        $sheet->setCellValue('C198', applyZero($prev->usia_pelaku_kecelakaan_36_40_tahun));
        $sheet->setCellValue('D198', applyZero($current->usia_pelaku_kecelakaan_36_40_tahun));

        $sheet->setCellValue('C199', applyZero($prev->usia_pelaku_kecelakaan_41_45_tahun));
        $sheet->setCellValue('D199', applyZero($current->usia_pelaku_kecelakaan_41_45_tahun));

        $sheet->setCellValue('C200', applyZero($prev->usia_pelaku_kecelakaan_46_50_tahun));
        $sheet->setCellValue('D200', applyZero($current->usia_pelaku_kecelakaan_46_50_tahun));

        $sheet->setCellValue('C201', applyZero($prev->usia_pelaku_kecelakaan_51_55_tahun));
        $sheet->setCellValue('D201', applyZero($current->usia_pelaku_kecelakaan_51_55_tahun));

        $sheet->setCellValue('C202', applyZero($prev->usia_pelaku_kecelakaan_56_60_tahun));
        $sheet->setCellValue('D202', applyZero($current->usia_pelaku_kecelakaan_56_60_tahun));

        $sheet->setCellValue('C203', applyZero($prev->usia_pelaku_kecelakaan_diatas_60_tahun));
        $sheet->setCellValue('D203', applyZero($current->usia_pelaku_kecelakaan_diatas_60_tahun));

        $sheet->setCellValue('C206', applyZero($prev->sim_pelaku_kecelakaan_sim_a));
        $sheet->setCellValue('D206', applyZero($current->sim_pelaku_kecelakaan_sim_a));

        $sheet->setCellValue('C207', applyZero($prev->sim_pelaku_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D207', applyZero($current->sim_pelaku_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C208', applyZero($prev->sim_pelaku_kecelakaan_sim_b1));
        $sheet->setCellValue('D208', applyZero($current->sim_pelaku_kecelakaan_sim_b1));

        $sheet->setCellValue('C209', applyZero($prev->sim_pelaku_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D209', applyZero($current->sim_pelaku_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C210', applyZero($prev->sim_pelaku_kecelakaan_sim_b2));
        $sheet->setCellValue('D210', applyZero($current->sim_pelaku_kecelakaan_sim_b2));

        $sheet->setCellValue('C211', applyZero($prev->sim_pelaku_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D211', applyZero($current->sim_pelaku_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C212', applyZero($prev->sim_pelaku_kecelakaan_sim_c));
        $sheet->setCellValue('D212', applyZero($current->sim_pelaku_kecelakaan_sim_c));

        $sheet->setCellValue('C213', applyZero($prev->sim_pelaku_kecelakaan_sim_d));
        $sheet->setCellValue('D213', applyZero($current->sim_pelaku_kecelakaan_sim_d));

        $sheet->setCellValue('C214', applyZero($prev->sim_pelaku_kecelakaan_sim_internasional));
        $sheet->setCellValue('D214', applyZero($current->sim_pelaku_kecelakaan_sim_internasional));

        $sheet->setCellValue('C215', applyZero($prev->sim_pelaku_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D215', applyZero($current->sim_pelaku_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C219', applyZero($prev->lokasi_kecelakaan_lalin_pemukiman));
        $sheet->setCellValue('D219', applyZero($current->lokasi_kecelakaan_lalin_pemukiman));

        $sheet->setCellValue('C220', applyZero($prev->lokasi_kecelakaan_lalin_perbelanjaan));
        $sheet->setCellValue('D220', applyZero($current->lokasi_kecelakaan_lalin_perbelanjaan));

        $sheet->setCellValue('C221', applyZero($prev->lokasi_kecelakaan_lalin_perkantoran));
        $sheet->setCellValue('D221', applyZero($current->lokasi_kecelakaan_lalin_perkantoran));

        $sheet->setCellValue('C222', applyZero($prev->lokasi_kecelakaan_lalin_wisata));
        $sheet->setCellValue('D222', applyZero($current->lokasi_kecelakaan_lalin_wisata));

        $sheet->setCellValue('C223', applyZero($prev->lokasi_kecelakaan_lalin_industri));
        $sheet->setCellValue('D223', applyZero($current->lokasi_kecelakaan_lalin_industri));

        $sheet->setCellValue('C224', applyZero($prev->lokasi_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D224', applyZero($current->lokasi_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C227', applyZero($prev->lokasi_kecelakaan_status_jalan_nasional));
        $sheet->setCellValue('D227', applyZero($current->lokasi_kecelakaan_status_jalan_nasional));

        $sheet->setCellValue('C228', applyZero($prev->lokasi_kecelakaan_status_jalan_propinsi));
        $sheet->setCellValue('D228', applyZero($current->lokasi_kecelakaan_status_jalan_propinsi));

        $sheet->setCellValue('C229', applyZero($prev->lokasi_kecelakaan_status_jalan_kab_kota));
        $sheet->setCellValue('D229', applyZero($current->lokasi_kecelakaan_status_jalan_kab_kota));

        $sheet->setCellValue('C230', applyZero($prev->lokasi_kecelakaan_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D230', applyZero($current->lokasi_kecelakaan_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C233', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_arteri));
        $sheet->setCellValue('D233', applyZero($current->lokasi_kecelakaan_fungsi_jalan_arteri));

        $sheet->setCellValue('C234', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_kolektor));
        $sheet->setCellValue('D234', applyZero($current->lokasi_kecelakaan_fungsi_jalan_kolektor));

        $sheet->setCellValue('C235', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lokal));
        $sheet->setCellValue('D235', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lokal));

        $sheet->setCellValue('C236', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D236', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C239', applyZero($prev->faktor_penyebab_kecelakaan_manusia));
        $sheet->setCellValue('D239', applyZero($current->faktor_penyebab_kecelakaan_manusia));

        $sheet->setCellValue('C240', applyZero($prev->faktor_penyebab_kecelakaan_ngantuk_lelah));
        $sheet->setCellValue('D240', applyZero($current->faktor_penyebab_kecelakaan_ngantuk_lelah));

        $sheet->setCellValue('C241', applyZero($prev->faktor_penyebab_kecelakaan_mabuk_obat));
        $sheet->setCellValue('D241', applyZero($current->faktor_penyebab_kecelakaan_mabuk_obat));

        $sheet->setCellValue('C242', applyZero($prev->faktor_penyebab_kecelakaan_sakit));
        $sheet->setCellValue('D242', applyZero($current->faktor_penyebab_kecelakaan_sakit));

        $sheet->setCellValue('C243', applyZero($prev->faktor_penyebab_kecelakaan_handphone_elektronik));
        $sheet->setCellValue('D243', applyZero($current->faktor_penyebab_kecelakaan_handphone_elektronik));

        $sheet->setCellValue('C244', applyZero($prev->faktor_penyebab_kecelakaan_menerobos_lampu_merah));
        $sheet->setCellValue('D244', applyZero($current->faktor_penyebab_kecelakaan_menerobos_lampu_merah));

        $sheet->setCellValue('C245', applyZero($prev->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));
        $sheet->setCellValue('D245', applyZero($current->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));

        $sheet->setCellValue('C246', applyZero($prev->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));
        $sheet->setCellValue('D246', applyZero($current->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));

        $sheet->setCellValue('C247', applyZero($prev->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));
        $sheet->setCellValue('D247', applyZero($current->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));

        $sheet->setCellValue('C248', applyZero($prev->faktor_penyebab_kecelakaan_berpindah_jalur));
        $sheet->setCellValue('D248', applyZero($current->faktor_penyebab_kecelakaan_berpindah_jalur));

        $sheet->setCellValue('C249', applyZero($prev->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));
        $sheet->setCellValue('D249', applyZero($current->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));

        $sheet->setCellValue('C250', applyZero($prev->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));
        $sheet->setCellValue('D250', applyZero($current->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));

        $sheet->setCellValue('C251', applyZero($prev->faktor_penyebab_kecelakaan_lainnya));
        $sheet->setCellValue('D251', applyZero($current->faktor_penyebab_kecelakaan_lainnya));

        $sheet->setCellValue('C252', applyZero($prev->faktor_penyebab_kecelakaan_alam));
        $sheet->setCellValue('D252', applyZero($current->faktor_penyebab_kecelakaan_alam));

        $sheet->setCellValue('C253', applyZero($prev->faktor_penyebab_kecelakaan_kelaikan_kendaraan));
        $sheet->setCellValue('D253', applyZero($current->faktor_penyebab_kecelakaan_kelaikan_kendaraan));

        $sheet->setCellValue('C254', applyZero($prev->faktor_penyebab_kecelakaan_kondisi_jalan));
        $sheet->setCellValue('D254', applyZero($current->faktor_penyebab_kecelakaan_kondisi_jalan));

        $sheet->setCellValue('C255', applyZero($prev->faktor_penyebab_kecelakaan_prasarana_jalan));
        $sheet->setCellValue('D255', applyZero($current->faktor_penyebab_kecelakaan_prasarana_jalan));

        $sheet->setCellValue('C256', applyZero($prev->faktor_penyebab_kecelakaan_rambu));
        $sheet->setCellValue('D256', applyZero($current->faktor_penyebab_kecelakaan_rambu));

        $sheet->setCellValue('C257', applyZero($prev->faktor_penyebab_kecelakaan_marka));
        $sheet->setCellValue('D257', applyZero($current->faktor_penyebab_kecelakaan_marka));

        $sheet->setCellValue('C258', applyZero($prev->faktor_penyebab_kecelakaan_apil));
        $sheet->setCellValue('D258', applyZero($current->faktor_penyebab_kecelakaan_apil));

        $sheet->setCellValue('C259', applyZero($prev->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));
        $sheet->setCellValue('D259', applyZero($current->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));

        $sheet->setCellValue('C262', applyZero($prev->waktu_kejadian_kecelakaan_00_03));
        $sheet->setCellValue('D262', applyZero($current->waktu_kejadian_kecelakaan_00_03));

        $sheet->setCellValue('C263', applyZero($prev->waktu_kejadian_kecelakaan_03_06));
        $sheet->setCellValue('D263', applyZero($current->waktu_kejadian_kecelakaan_03_06));

        $sheet->setCellValue('C264', applyZero($prev->waktu_kejadian_kecelakaan_06_09));
        $sheet->setCellValue('D264', applyZero($current->waktu_kejadian_kecelakaan_06_09));

        $sheet->setCellValue('C265', applyZero($prev->waktu_kejadian_kecelakaan_09_12));
        $sheet->setCellValue('D265', applyZero($current->waktu_kejadian_kecelakaan_09_12));

        $sheet->setCellValue('C266', applyZero($prev->waktu_kejadian_kecelakaan_12_15));
        $sheet->setCellValue('D266', applyZero($current->waktu_kejadian_kecelakaan_12_15));

        $sheet->setCellValue('C267', applyZero($prev->waktu_kejadian_kecelakaan_15_18));
        $sheet->setCellValue('D267', applyZero($current->waktu_kejadian_kecelakaan_15_18));

        $sheet->setCellValue('C268', applyZero($prev->waktu_kejadian_kecelakaan_18_21));
        $sheet->setCellValue('D268', applyZero($current->waktu_kejadian_kecelakaan_18_21));

        $sheet->setCellValue('C269', applyZero($prev->waktu_kejadian_kecelakaan_21_24));
        $sheet->setCellValue('D269', applyZero($current->waktu_kejadian_kecelakaan_21_24));

        $sheet->setCellValue('C272', applyZero($prev->kecelakaan_lalin_menonjol_jumlah_kejadian));
        $sheet->setCellValue('D272', applyZero($current->kecelakaan_lalin_menonjol_jumlah_kejadian));

        $sheet->setCellValue('C273', applyZero($prev->kecelakaan_lalin_menonjol_korban_meninggal));
        $sheet->setCellValue('D273', applyZero($current->kecelakaan_lalin_menonjol_korban_meninggal));

        $sheet->setCellValue('C274', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_berat));
        $sheet->setCellValue('D274', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_berat));

        $sheet->setCellValue('C275', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_ringan));
        $sheet->setCellValue('D275', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_ringan));

        $sheet->setCellValue('C276', applyZero($prev->kecelakaan_lalin_menonjol_materiil));
        $sheet->setCellValue('D276', applyZero($current->kecelakaan_lalin_menonjol_materiil));

        $sheet->setCellValue('C278', applyZero($prev->kecelakaan_lalin_tunggal_jumlah_kejadian));
        $sheet->setCellValue('D278', applyZero($current->kecelakaan_lalin_tunggal_jumlah_kejadian));

        $sheet->setCellValue('C279', applyZero($prev->kecelakaan_lalin_tunggal_korban_meninggal));
        $sheet->setCellValue('D279', applyZero($current->kecelakaan_lalin_tunggal_korban_meninggal));

        $sheet->setCellValue('C280', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_berat));
        $sheet->setCellValue('D280', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_berat));

        $sheet->setCellValue('C281', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_ringan));
        $sheet->setCellValue('D281', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_ringan));

        $sheet->setCellValue('C282', applyZero($prev->kecelakaan_lalin_tunggal_materiil));
        $sheet->setCellValue('D282', applyZero($current->kecelakaan_lalin_tunggal_materiil));

        $sheet->setCellValue('C284', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));
        $sheet->setCellValue('D284', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));

        $sheet->setCellValue('C285', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));
        $sheet->setCellValue('D285', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));

        $sheet->setCellValue('C286', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));
        $sheet->setCellValue('D286', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));

        $sheet->setCellValue('C287', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));
        $sheet->setCellValue('D287', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));

        $sheet->setCellValue('C288', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));
        $sheet->setCellValue('D288', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));

        $sheet->setCellValue('C290', applyZero($prev->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));
        $sheet->setCellValue('D290', applyZero($current->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));

        $sheet->setCellValue('C291', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_meninggal));
        $sheet->setCellValue('D291', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_meninggal));

        $sheet->setCellValue('C292', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_berat));
        $sheet->setCellValue('D292', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_berat));

        $sheet->setCellValue('C293', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));
        $sheet->setCellValue('D293', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));

        $sheet->setCellValue('C294', applyZero($prev->kecelakaan_lalin_tabrak_lari_materiil));
        $sheet->setCellValue('D294', applyZero($current->kecelakaan_lalin_tabrak_lari_materiil));

        $sheet->setCellValue('C296', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));
        $sheet->setCellValue('D296', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));

        $sheet->setCellValue('C297', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));
        $sheet->setCellValue('D297', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));

        $sheet->setCellValue('C298', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));
        $sheet->setCellValue('D298', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));

        $sheet->setCellValue('C299', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));
        $sheet->setCellValue('D299', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));

        $sheet->setCellValue('C300', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_materiil));
        $sheet->setCellValue('D300', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_materiil));

        $sheet->setCellValue('C302', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));
        $sheet->setCellValue('D302', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));

        $sheet->setCellValue('C303', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));
        $sheet->setCellValue('D303', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));

        $sheet->setCellValue('C304', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));
        $sheet->setCellValue('D304', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));

        $sheet->setCellValue('C305', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));
        $sheet->setCellValue('D305', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));

        $sheet->setCellValue('C306', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_materiil));
        $sheet->setCellValue('D306', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_materiil));

        $sheet->setCellValue('C308', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));
        $sheet->setCellValue('D308', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));

        $sheet->setCellValue('C309', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));
        $sheet->setCellValue('D309', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));

        $sheet->setCellValue('C310', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));
        $sheet->setCellValue('D310', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));

        $sheet->setCellValue('C311', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));
        $sheet->setCellValue('D311', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));

        $sheet->setCellValue('C312', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));
        $sheet->setCellValue('D312', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));

        $sheet->setCellValue('C314', applyZero($prev->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));
        $sheet->setCellValue('D314', applyZero($current->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));

        $sheet->setCellValue('C315', applyZero($prev->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));
        $sheet->setCellValue('D315', applyZero($current->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));

        $sheet->setCellValue('C316', applyZero($prev->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));
        $sheet->setCellValue('D316', applyZero($current->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));

        $sheet->setCellValue('C317', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));
        $sheet->setCellValue('D317', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));

        $sheet->setCellValue('C318', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));
        $sheet->setCellValue('D318', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));

        $sheet->setCellValue('C319', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_meninggal));
        $sheet->setCellValue('D319', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_meninggal));

        $sheet->setCellValue('C320', applyZero($prev->kecelakaan_lalin_perlintasan_ka_materiil));
        $sheet->setCellValue('D320', applyZero($current->kecelakaan_lalin_perlintasan_ka_materiil));

        $sheet->setCellValue('C322', applyZero($prev->kecelakaan_transportasi_kereta_api));
        $sheet->setCellValue('D322', applyZero($current->kecelakaan_transportasi_kereta_api));

        $sheet->setCellValue('C323', applyZero($prev->kecelakaan_transportasi_laut_perairan));
        $sheet->setCellValue('D323', applyZero($current->kecelakaan_transportasi_laut_perairan));

        $sheet->setCellValue('C324', applyZero($prev->kecelakaan_transportasi_udara));
        $sheet->setCellValue('D324', applyZero($current->kecelakaan_transportasi_udara));

        $sheet->setCellValue('C329', applyZero($prev->penlu_melalui_media_cetak));
        $sheet->setCellValue('D329', applyZero($current->penlu_melalui_media_cetak));

        $sheet->setCellValue('C330', applyZero($prev->penlu_melalui_media_elektronik));
        $sheet->setCellValue('D330', applyZero($current->penlu_melalui_media_elektronik));

        $sheet->setCellValue('C331', applyZero($prev->penlu_melalui_media_sosial));
        $sheet->setCellValue('D331', applyZero($current->penlu_melalui_media_sosial));

        $sheet->setCellValue('C332', applyZero($prev->penlu_melalui_tempat_keramaian));
        $sheet->setCellValue('D332', applyZero($current->penlu_melalui_tempat_keramaian));

        $sheet->setCellValue('C333', applyZero($prev->penlu_melalui_tempat_istirahat));
        $sheet->setCellValue('D333', applyZero($current->penlu_melalui_tempat_istirahat));

        $sheet->setCellValue('C334', applyZero($prev->penlu_melalui_daerah_rawan_laka_dan_langgar));
        $sheet->setCellValue('D334', applyZero($current->penlu_melalui_daerah_rawan_laka_dan_langgar));

        $sheet->setCellValue('C337', applyZero($prev->penyebaran_pemasangan_spanduk));
        $sheet->setCellValue('D337', applyZero($current->penyebaran_pemasangan_spanduk));

        $sheet->setCellValue('C338', applyZero($prev->penyebaran_pemasangan_leaflet));
        $sheet->setCellValue('D338', applyZero($current->penyebaran_pemasangan_leaflet));

        $sheet->setCellValue('C339', applyZero($prev->penyebaran_pemasangan_sticker));
        $sheet->setCellValue('D339', applyZero($current->penyebaran_pemasangan_sticker));

        $sheet->setCellValue('C340', applyZero($prev->penyebaran_pemasangan_bilboard));
        $sheet->setCellValue('D340', applyZero($current->penyebaran_pemasangan_bilboard));

        $sheet->setCellValue('C343', applyZero($prev->polisi_sahabat_anak));
        $sheet->setCellValue('D343', applyZero($current->polisi_sahabat_anak));

        $sheet->setCellValue('C344', applyZero($prev->cara_aman_sekolah));
        $sheet->setCellValue('D344', applyZero($current->cara_aman_sekolah));

        $sheet->setCellValue('C345', applyZero($prev->patroli_keamanan_sekolah));
        $sheet->setCellValue('D345', applyZero($current->patroli_keamanan_sekolah));

        $sheet->setCellValue('C346', applyZero($prev->pramuka_bhayangkara_krida_lalu_lintas));
        $sheet->setCellValue('D346', applyZero($current->pramuka_bhayangkara_krida_lalu_lintas));

        $sheet->setCellValue('C349', applyZero($prev->police_goes_to_campus));
        $sheet->setCellValue('D349', applyZero($current->police_goes_to_campus));

        $sheet->setCellValue('C350', applyZero($prev->safety_riding_driving));
        $sheet->setCellValue('D350', applyZero($current->safety_riding_driving));

        $sheet->setCellValue('C351', applyZero($prev->forum_lalu_lintas_angkutan_umum));
        $sheet->setCellValue('D351', applyZero($current->forum_lalu_lintas_angkutan_umum));

        $sheet->setCellValue('C352', applyZero($prev->kampanye_keselamatan));
        $sheet->setCellValue('D352', applyZero($current->kampanye_keselamatan));

        $sheet->setCellValue('C353', applyZero($prev->sekolah_mengemudi));
        $sheet->setCellValue('D353', applyZero($current->sekolah_mengemudi));

        $sheet->setCellValue('C354', applyZero($prev->taman_lalu_lintas));
        $sheet->setCellValue('D354', applyZero($current->taman_lalu_lintas));

        $sheet->setCellValue('C355', applyZero($prev->global_road_safety_partnership_action));
        $sheet->setCellValue('D355', applyZero($current->global_road_safety_partnership_action));

        $sheet->setCellValue('C359', applyZero($prev->giat_lantas_pengaturan));
        $sheet->setCellValue('D359', applyZero($current->giat_lantas_pengaturan));

        $sheet->setCellValue('C360', applyZero($prev->giat_lantas_penjagaan));
        $sheet->setCellValue('D360', applyZero($current->giat_lantas_penjagaan));

        $sheet->setCellValue('C361', applyZero($prev->giat_lantas_pengawalan));
        $sheet->setCellValue('D361', applyZero($current->giat_lantas_pengawalan));

        $sheet->setCellValue('C362', applyZero($prev->giat_lantas_patroli));
        $sheet->setCellValue('D362', applyZero($current->giat_lantas_patroli));

        $sheet->setCellValue('C367', applyZero($prev->arus_mudik_jumlah_bus_keberangkatan));
        $sheet->setCellValue('D367', applyZero($current->arus_mudik_jumlah_bus_keberangkatan));

        $sheet->setCellValue('C368', applyZero($prev->arus_mudik_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D368', applyZero($current->arus_mudik_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C369', applyZero($prev->arus_mudik_jumlah_bus_kedatangan));
        $sheet->setCellValue('D369', applyZero($current->arus_mudik_jumlah_bus_kedatangan));

        $sheet->setCellValue('C370', applyZero($prev->arus_mudik_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D370', applyZero($current->arus_mudik_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C371', applyZero($prev->arus_mudik_total_terminal));
        $sheet->setCellValue('D371', applyZero($current->arus_mudik_total_terminal));

        $sheet->setCellValue('C372', applyZero($prev->arus_mudik_total_bus_keberangkatan));
        $sheet->setCellValue('D372', applyZero($current->arus_mudik_total_bus_keberangkatan));

        $sheet->setCellValue('C373', applyZero($prev->arus_mudik_penumpang_keberangkatan));
        $sheet->setCellValue('D373', applyZero($current->arus_mudik_penumpang_keberangkatan));

        $sheet->setCellValue('C374', applyZero($prev->arus_mudik_total_bus_kedatangan));
        $sheet->setCellValue('D374', applyZero($current->arus_mudik_total_bus_kedatangan));

        $sheet->setCellValue('C375', applyZero($prev->arus_mudik_penumpang_kedatangan));
        $sheet->setCellValue('D375', applyZero($current->arus_mudik_penumpang_kedatangan));

        $sheet->setCellValue('C377', applyZero($prev->arus_mudik_kereta_api_total_stasiun));
        $sheet->setCellValue('D377', applyZero($current->arus_mudik_kereta_api_total_stasiun));

        $sheet->setCellValue('C378', applyZero($prev->arus_mudik_kereta_api_total_penumpang_keberangkatan));
        $sheet->setCellValue('D378', applyZero($current->arus_mudik_kereta_api_total_penumpang_keberangkatan));

        $sheet->setCellValue('C379', applyZero($prev->arus_mudik_kereta_api_total_penumpang_kedatangan));
        $sheet->setCellValue('D379', applyZero($current->arus_mudik_kereta_api_total_penumpang_kedatangan));

        $sheet->setCellValue('C381', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));
        $sheet->setCellValue('D381', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));

        $sheet->setCellValue('C382', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));
        $sheet->setCellValue('D382', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));

        $sheet->setCellValue('C383', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));
        $sheet->setCellValue('D383', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));

        $sheet->setCellValue('C384', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D384', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C385', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));
        $sheet->setCellValue('D385', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));

        $sheet->setCellValue('C386', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));
        $sheet->setCellValue('D386', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));

        $sheet->setCellValue('C387', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));
        $sheet->setCellValue('D387', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));

        $sheet->setCellValue('C388', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D388', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C389', applyZero($prev->arus_mudik_total_pelabuhan));
        $sheet->setCellValue('D389', applyZero($current->arus_mudik_total_pelabuhan));

        $sheet->setCellValue('C390', applyZero($prev->arus_mudik_pelabuhan_kendaraan_keberangkatan));
        $sheet->setCellValue('D390', applyZero($current->arus_mudik_pelabuhan_kendaraan_keberangkatan));

        $sheet->setCellValue('C391', applyZero($prev->arus_mudik_pelabuhan_kendaraan_kedatangan));
        $sheet->setCellValue('D391', applyZero($current->arus_mudik_pelabuhan_kendaraan_kedatangan));

        $sheet->setCellValue('C392', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_keberangkatan));
        $sheet->setCellValue('D392', applyZero($current->arus_mudik_pelabuhan_total_penumpang_keberangkatan));

        $sheet->setCellValue('C393', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_kedatangan));
        $sheet->setCellValue('D393', applyZero($current->arus_mudik_pelabuhan_total_penumpang_kedatangan));

        $sheet->setCellValue('C395', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D395', applyZero($current->arus_mudik_bandara_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C396', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D396', applyZero($current->arus_mudik_bandara_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C397', applyZero($prev->arus_mudik_total_bandara));
        $sheet->setCellValue('D397', applyZero($current->arus_mudik_total_bandara));

        $sheet->setCellValue('C398', applyZero($prev->arus_mudik_bandara_total_penumpang_keberangkatan));
        $sheet->setCellValue('D398', applyZero($current->arus_mudik_bandara_total_penumpang_keberangkatan));

        $sheet->setCellValue('C399', applyZero($prev->arus_mudik_bandara_total_penumpang_kedatangan));
        $sheet->setCellValue('D399', applyZero($current->arus_mudik_bandara_total_penumpang_kedatangan));

        $sheet->setCellValue('C402', applyZero($prev->prokes_covid_teguran_gar_prokes));
        $sheet->setCellValue('D402', applyZero($current->prokes_covid_teguran_gar_prokes));

        $sheet->setCellValue('C403', applyZero($prev->prokes_covid_pembagian_masker));
        $sheet->setCellValue('D403', applyZero($current->prokes_covid_pembagian_masker));

        $sheet->setCellValue('C404', applyZero($prev->prokes_covid_sosialisasi_tentang_prokes));
        $sheet->setCellValue('D404', applyZero($current->prokes_covid_sosialisasi_tentang_prokes));

        $sheet->setCellValue('C405', applyZero($prev->prokes_covid_giat_baksos));
        $sheet->setCellValue('D405', applyZero($current->prokes_covid_giat_baksos));

        $sheet->setCellValue('C408', applyZero($prev->penyekatan_motor));
        $sheet->setCellValue('D408', applyZero($current->penyekatan_motor));

        $sheet->setCellValue('C409', applyZero($prev->penyekatan_mobil_penumpang));
        $sheet->setCellValue('D409', applyZero($current->penyekatan_mobil_penumpang));

        $sheet->setCellValue('C410', applyZero($prev->penyekatan_mobil_bus));
        $sheet->setCellValue('D410', applyZero($current->penyekatan_mobil_bus));

        $sheet->setCellValue('C411', applyZero($prev->penyekatan_mobil_barang));
        $sheet->setCellValue('D411', applyZero($current->penyekatan_mobil_barang));

        $sheet->setCellValue('C412', applyZero($prev->penyekatan_kendaraan_khusus));
        $sheet->setCellValue('D412', applyZero($current->penyekatan_kendaraan_khusus));

        $writer = IOFactory::createWriter($spreadsheet, 'Html');
        $message = $writer->save('php://output');

        return $message;
    }
}

if (! function_exists('excelViewAbsensi')) {
    function excelViewAbsensi($data, $tanggal)
    {
        $excelPath = public_path('template/excel');

        $excelTemplate = $excelPath."/absensi.xlsx";

        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($excelTemplate);

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', $tanggal);

        $sheet->setCellValue('B3', (is_null($data[0]->dailyInput)) ? 'Belum Mengirimkan' : $data[0]->dailyInput->status);
        $sheet->setCellValue('B4', (is_null($data[1]->dailyInput)) ? 'Belum Mengirimkan' : $data[1]->dailyInput->status);
        $sheet->setCellValue('B5', (is_null($data[2]->dailyInput)) ? 'Belum Mengirimkan' : $data[2]->dailyInput->status);
        $sheet->setCellValue('B6', (is_null($data[3]->dailyInput)) ? 'Belum Mengirimkan' : $data[3]->dailyInput->status);
        $sheet->setCellValue('B7', (is_null($data[4]->dailyInput)) ? 'Belum Mengirimkan' : $data[4]->dailyInput->status);
        $sheet->setCellValue('B8', (is_null($data[5]->dailyInput)) ? 'Belum Mengirimkan' : $data[5]->dailyInput->status);
        $sheet->setCellValue('B9', (is_null($data[6]->dailyInput)) ? 'Belum Mengirimkan' : $data[6]->dailyInput->status);
        $sheet->setCellValue('B10', (is_null($data[7]->dailyInput)) ? 'Belum Mengirimkan' : $data[7]->dailyInput->status);
        $sheet->setCellValue('B11', (is_null($data[8]->dailyInput)) ? 'Belum Mengirimkan' : $data[8]->dailyInput->status);
        $sheet->setCellValue('B12', (is_null($data[9]->dailyInput)) ? 'Belum Mengirimkan' : $data[9]->dailyInput->status);
        $sheet->setCellValue('B13', (is_null($data[10]->dailyInput)) ? 'Belum Mengirimkan' : $data[10]->dailyInput->status);
        $sheet->setCellValue('B14', (is_null($data[11]->dailyInput)) ? 'Belum Mengirimkan' : $data[11]->dailyInput->status);
        $sheet->setCellValue('B15', (is_null($data[12]->dailyInput)) ? 'Belum Mengirimkan' : $data[12]->dailyInput->status);
        $sheet->setCellValue('B16', (is_null($data[13]->dailyInput)) ? 'Belum Mengirimkan' : $data[13]->dailyInput->status);
        $sheet->setCellValue('B17', (is_null($data[14]->dailyInput)) ? 'Belum Mengirimkan' : $data[14]->dailyInput->status);
        $sheet->setCellValue('B18', (is_null($data[15]->dailyInput)) ? 'Belum Mengirimkan' : $data[15]->dailyInput->status);
        $sheet->setCellValue('B19', (is_null($data[16]->dailyInput)) ? 'Belum Mengirimkan' : $data[16]->dailyInput->status);
        $sheet->setCellValue('B20', (is_null($data[17]->dailyInput)) ? 'Belum Mengirimkan' : $data[17]->dailyInput->status);
        $sheet->setCellValue('B21', (is_null($data[18]->dailyInput)) ? 'Belum Mengirimkan' : $data[18]->dailyInput->status);
        $sheet->setCellValue('B22', (is_null($data[19]->dailyInput)) ? 'Belum Mengirimkan' : $data[19]->dailyInput->status);
        $sheet->setCellValue('B23', (is_null($data[20]->dailyInput)) ? 'Belum Mengirimkan' : $data[20]->dailyInput->status);
        $sheet->setCellValue('B24', (is_null($data[21]->dailyInput)) ? 'Belum Mengirimkan' : $data[21]->dailyInput->status);
        $sheet->setCellValue('B25', (is_null($data[22]->dailyInput)) ? 'Belum Mengirimkan' : $data[22]->dailyInput->status);
        $sheet->setCellValue('B26', (is_null($data[23]->dailyInput)) ? 'Belum Mengirimkan' : $data[23]->dailyInput->status);
        $sheet->setCellValue('B27', (is_null($data[24]->dailyInput)) ? 'Belum Mengirimkan' : $data[24]->dailyInput->status);
        $sheet->setCellValue('B28', (is_null($data[25]->dailyInput)) ? 'Belum Mengirimkan' : $data[25]->dailyInput->status);
        $sheet->setCellValue('B29', (is_null($data[26]->dailyInput)) ? 'Belum Mengirimkan' : $data[26]->dailyInput->status);
        $sheet->setCellValue('B30', (is_null($data[27]->dailyInput)) ? 'Belum Mengirimkan' : $data[27]->dailyInput->status);
        $sheet->setCellValue('B31', (is_null($data[28]->dailyInput)) ? 'Belum Mengirimkan' : $data[28]->dailyInput->status);
        $sheet->setCellValue('B32', (is_null($data[29]->dailyInput)) ? 'Belum Mengirimkan' : $data[29]->dailyInput->status);
        $sheet->setCellValue('B33', (is_null($data[30]->dailyInput)) ? 'Belum Mengirimkan' : $data[30]->dailyInput->status);
        $sheet->setCellValue('B34', (is_null($data[31]->dailyInput)) ? 'Belum Mengirimkan' : $data[31]->dailyInput->status);
        $sheet->setCellValue('B35', (is_null($data[32]->dailyInput)) ? 'Belum Mengirimkan' : $data[32]->dailyInput->status);
        $sheet->setCellValue('B36', (is_null($data[33]->dailyInput)) ? 'Belum Mengirimkan' : $data[33]->dailyInput->status);

        $writer = IOFactory::createWriter($spreadsheet, 'Html');
        $message = $writer->save('php://output');

        return $message;
    }
}

//==============================================================================================================================================

if (! function_exists('laporanPrev')) {
    function laporanPrev($operation_id, $year, $start_date, $end_date) {
        $outputLaporanPrev = DailyInputPrev::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan_p) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm_p) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip_p) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat_p) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan_p) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt_p) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload_p) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip_p) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin_p) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar_p) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan_p) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam_p) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat_p) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya_p) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti_p) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas_p) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat_p) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan_p) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial_p) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
            sum(cara_aman_sekolah_p) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus_p) as police_goes_to_campus,
            sum(safety_riding_driving_p) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan_p) as kampanye_keselamatan,
            sum(sekolah_mengemudi_p) as sekolah_mengemudi,
            sum(taman_lalu_lintas_p) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli_p) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan_p) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan_p) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan_p) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan_p) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal_p) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan_p) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan_p) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan_p) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan_p) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun_p) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan_p) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan_p) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan_p) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan_p) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan_p) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan_p) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan_p) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan_p) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan_p) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara_p) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan_p) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan_p) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes_p) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker_p) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes_p) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos_p) as prokes_covid_giat_baksos,
            sum(penyekatan_motor_p) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang_p) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus_p) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang_p) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus_p) as penyekatan_kendaraan_khusus')
        ->where('year', $year)
        ->where('rencana_operasi_id', $operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanPrev;
    }
}

if (! function_exists('laporanCurrent')) {
    function laporanCurrent($operation_id, $year, $start_date, $end_date) {
        $outputLaporanCurrent = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->where('year', $year)
        ->where('rencana_operasi_id', $operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanCurrent;
    }
}

if (! function_exists('laporanAnevDateCompareFirst')) {
    function laporanAnevDateCompareFirst($operation_id, $start_date, $end_date) {
        $outputLaporanPrev = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->where('rencana_operasi_id', $operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanPrev;
    }
}

if (! function_exists('laporanAnevDateCompareSecond')) {
    function laporanAnevDateCompareSecond($operation_id, $start_date, $end_date) {
        $outputLaporanCurrent = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_sepeda_motor_kecepatan) as pelanggaran_sepeda_motor_kecepatan,
            sum(pelanggaran_sepeda_motor_helm) as pelanggaran_sepeda_motor_helm,
            sum(pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) as pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,
            sum(pelanggaran_sepeda_motor_marka_menerus_menyalip) as pelanggaran_sepeda_motor_marka_menerus_menyalip,
            sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
            sum(pelanggaran_sepeda_motor_melanggar_lampu_lalin) as pelanggaran_sepeda_motor_melanggar_lampu_lalin,
            sum(pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) as pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,
            sum(pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) as pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,
            sum(pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) as pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,
            sum(pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) as pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,
            sum(pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) as pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,
            sum(pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_sepeda_motor_melanggar_marka_berhenti) as pelanggaran_sepeda_motor_melanggar_marka_berhenti,
            sum(pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) as pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,
            sum(pelanggaran_sepeda_motor_surat_surat) as pelanggaran_sepeda_motor_surat_surat,
            sum(pelanggaran_sepeda_motor_kelengkapan_kendaraan) as pelanggaran_sepeda_motor_kelengkapan_kendaraan,
            sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
            sum(pelanggaran_mobil_kecepatan) as pelanggaran_mobil_kecepatan,
            sum(pelanggaran_mobil_safety_belt) as pelanggaran_mobil_safety_belt,
            sum(pelanggaran_mobil_muatan_overload) as pelanggaran_mobil_muatan_overload,
            sum(pelanggaran_mobil_marka_menerus_menyalip) as pelanggaran_mobil_marka_menerus_menyalip,
            sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
            sum(pelanggaran_mobil_melanggar_lampu_lalin) as pelanggaran_mobil_melanggar_lampu_lalin,
            sum(pelanggaran_mobil_mengemudi_tidak_wajar) as pelanggaran_mobil_mengemudi_tidak_wajar,
            sum(pelanggaran_mobil_syarat_teknis_layak_jalan) as pelanggaran_mobil_syarat_teknis_layak_jalan,
            sum(pelanggaran_mobil_tidak_nyala_lampu_malam) as pelanggaran_mobil_tidak_nyala_lampu_malam,
            sum(pelanggaran_mobil_berbelok_tanpa_isyarat) as pelanggaran_mobil_berbelok_tanpa_isyarat,
            sum(pelanggaran_mobil_berbalapan_di_jalan_raya) as pelanggaran_mobil_berbalapan_di_jalan_raya,
            sum(pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) as pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,
            sum(pelanggaran_mobil_melanggar_marka_berhenti) as pelanggaran_mobil_melanggar_marka_berhenti,
            sum(pelanggaran_mobil_tidak_patuh_perintah_petugas) as pelanggaran_mobil_tidak_patuh_perintah_petugas,
            sum(pelanggaran_mobil_surat_surat) as pelanggaran_mobil_surat_surat,
            sum(pelanggaran_mobil_kelengkapan_kendaraan) as pelanggaran_mobil_kelengkapan_kendaraan,
            sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
            sum(pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) as pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,
            sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
            sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
            sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
            sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
            sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
            sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
            sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
            sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
            sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
            sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
            sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
            sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
            sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
            sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
            sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
            sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
            sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
            sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
            sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
            sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
            sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
            sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
            sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
            sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
            sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
            sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
            sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
            sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
            sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
            sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
            sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
            sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
            sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
            sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
            sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
            sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
            sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
            sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
            sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
            sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
            sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
            sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
            sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
            sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
            sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
            sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
            sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
            sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
            sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
            sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
            sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
            sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
            sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
            sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
            sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
            sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
            sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
            sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
            sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
            sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
            sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
            sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
            sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
            sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
            sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
            sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
            sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
            sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
            sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
            sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
            sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
            sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
            sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
            sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
            sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
            sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
            sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
            sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
            sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
            sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
            sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
            sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
            sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
            sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
            sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
            sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
            sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
            sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
            sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
            sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
            sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
            sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
            sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
            sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
            sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
            sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
            sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
            sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
            sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
            sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
            sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
            sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
            sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
            sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
            sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
            sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
            sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
            sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
            sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
            sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
            sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
            sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
            sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
            sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
            sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
            sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
            sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
            sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
            sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
            sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
            sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
            sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
            sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
            sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
            sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
            sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
            sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
            sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
            sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
            sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
            sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
            sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
            sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
            sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
            sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
            sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
            sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
            sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
            sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
            sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
            sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
            sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
            sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
            sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
            sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
            sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
            sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
            sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
            sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
            sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
            sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
            sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
            sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
            sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
            sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
            sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
            sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
            sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
            sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
            sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
            sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
            sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
            sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
            sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
            sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
            sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
            sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
            sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
            sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
            sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
            sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
            sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
            sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
            sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
            sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
            sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
            sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
            sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
            sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
            sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
            sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
            sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
            sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
            sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
            sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
            sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
            sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
            sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
            sum(penlu_melalui_media_sosial) as penlu_melalui_media_sosial,
            sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
            sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
            sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
            sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
            sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
            sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
            sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
            sum(polisi_sahabat_anak) as polisi_sahabat_anak,
            sum(cara_aman_sekolah) as cara_aman_sekolah,
            sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
            sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
            sum(police_goes_to_campus) as police_goes_to_campus,
            sum(safety_riding_driving) as safety_riding_driving,
            sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
            sum(kampanye_keselamatan) as kampanye_keselamatan,
            sum(sekolah_mengemudi) as sekolah_mengemudi,
            sum(taman_lalu_lintas) as taman_lalu_lintas,
            sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
            sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
            sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
            sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
            sum(giat_lantas_patroli) as giat_lantas_patroli,
            sum(arus_mudik_jumlah_bus_keberangkatan) as arus_mudik_jumlah_bus_keberangkatan,
            sum(arus_mudik_jumlah_penumpang_keberangkatan) as arus_mudik_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_jumlah_bus_kedatangan) as arus_mudik_jumlah_bus_kedatangan,
            sum(arus_mudik_jumlah_penumpang_kedatangan) as arus_mudik_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_terminal) as arus_mudik_total_terminal,
            sum(arus_mudik_total_bus_keberangkatan) as arus_mudik_total_bus_keberangkatan,
            sum(arus_mudik_penumpang_keberangkatan) as arus_mudik_penumpang_keberangkatan,
            sum(arus_mudik_total_bus_kedatangan) as arus_mudik_total_bus_kedatangan,
            sum(arus_mudik_penumpang_kedatangan) as arus_mudik_penumpang_kedatangan,
            sum(arus_mudik_kereta_api_total_stasiun) as arus_mudik_kereta_api_total_stasiun,
            sum(arus_mudik_kereta_api_total_penumpang_keberangkatan) as arus_mudik_kereta_api_total_penumpang_keberangkatan,
            sum(arus_mudik_kereta_api_total_penumpang_kedatangan) as arus_mudik_kereta_api_total_penumpang_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan) as arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,
            sum(arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2) as arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,
            sum(arus_mudik_pelabuhan_jumlah_penumpang_kedatangan) as arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_pelabuhan) as arus_mudik_total_pelabuhan,
            sum(arus_mudik_pelabuhan_kendaraan_keberangkatan) as arus_mudik_pelabuhan_kendaraan_keberangkatan,
            sum(arus_mudik_pelabuhan_kendaraan_kedatangan) as arus_mudik_pelabuhan_kendaraan_kedatangan,
            sum(arus_mudik_pelabuhan_total_penumpang_keberangkatan) as arus_mudik_pelabuhan_total_penumpang_keberangkatan,
            sum(arus_mudik_pelabuhan_total_penumpang_kedatangan) as arus_mudik_pelabuhan_total_penumpang_kedatangan,
            sum(arus_mudik_bandara_jumlah_penumpang_keberangkatan) as arus_mudik_bandara_jumlah_penumpang_keberangkatan,
            sum(arus_mudik_bandara_jumlah_penumpang_kedatangan) as arus_mudik_bandara_jumlah_penumpang_kedatangan,
            sum(arus_mudik_total_bandara) as arus_mudik_total_bandara,
            sum(arus_mudik_bandara_total_penumpang_keberangkatan) as arus_mudik_bandara_total_penumpang_keberangkatan,
            sum(arus_mudik_bandara_total_penumpang_kedatangan) as arus_mudik_bandara_total_penumpang_kedatangan,
            sum(prokes_covid_teguran_gar_prokes) as prokes_covid_teguran_gar_prokes,
            sum(prokes_covid_pembagian_masker) as prokes_covid_pembagian_masker,
            sum(prokes_covid_sosialisasi_tentang_prokes) as prokes_covid_sosialisasi_tentang_prokes,
            sum(prokes_covid_giat_baksos) as prokes_covid_giat_baksos,
            sum(penyekatan_motor) as penyekatan_motor,
            sum(penyekatan_mobil_penumpang) as penyekatan_mobil_penumpang,
            sum(penyekatan_mobil_bus) as penyekatan_mobil_bus,
            sum(penyekatan_mobil_barang) as penyekatan_mobil_barang,
            sum(penyekatan_kendaraan_khusus) as penyekatan_kendaraan_khusus')
        ->where('rencana_operasi_id', $operation_id)
        ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date])
        ->first();

        return $outputLaporanCurrent;
    }
}


if (! function_exists('dailyReportDetail')) {
    function dailyReportDetail($poldaYangKe)
    {
        $excelPath = public_path('template/excel');
        $excelTemplate = $excelPath."/format_laporan_detail_daily.xlsx";
        $spreadsheet = IOFactory::load($excelTemplate);
        $now = now()->format("Y-m-d");
        $filename = 'Report All Polda '.$now;

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A5', 'LAPORAN HARIAN '.upperCase(operationPlans()->name));
        $sheet->setCellValue('A7', 'HARI/TGL : '.indonesianFullDayAndDate(date("Y-m-d")));

        $sheet->setCellValue('C10', nowYearMinusOne());
        $sheet->setCellValue('D10', nowYear());

        $sheet->setCellValue('C14', (is_null($poldaYangKe[0]->poldaInputPrevToday)) ? 0 : $poldaYangKe[0]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('D14', (is_null($poldaYangKe[0]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[0]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('E14', (is_null($poldaYangKe[1]->poldaInputPrevToday)) ? 0 : $poldaYangKe[1]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('F14', (is_null($poldaYangKe[1]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[1]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('G14', (is_null($poldaYangKe[2]->poldaInputPrevToday)) ? 0 : $poldaYangKe[2]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('H14', (is_null($poldaYangKe[2]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[2]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('I14', (is_null($poldaYangKe[3]->poldaInputPrevToday)) ? 0 : $poldaYangKe[3]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('J14', (is_null($poldaYangKe[3]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[3]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('K14', (is_null($poldaYangKe[4]->poldaInputPrevToday)) ? 0 : $poldaYangKe[4]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('L14', (is_null($poldaYangKe[4]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[4]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('M14', (is_null($poldaYangKe[5]->poldaInputPrevToday)) ? 0 : $poldaYangKe[5]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('N14', (is_null($poldaYangKe[5]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[5]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('O14', (is_null($poldaYangKe[6]->poldaInputPrevToday)) ? 0 : $poldaYangKe[6]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('P14', (is_null($poldaYangKe[6]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[6]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('Q14', (is_null($poldaYangKe[7]->poldaInputPrevToday)) ? 0 : $poldaYangKe[7]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('R14', (is_null($poldaYangKe[7]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[7]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('S14', (is_null($poldaYangKe[8]->poldaInputPrevToday)) ? 0 : $poldaYangKe[8]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('T14', (is_null($poldaYangKe[8]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[8]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('U14', (is_null($poldaYangKe[9]->poldaInputPrevToday)) ? 0 : $poldaYangKe[9]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('V14', (is_null($poldaYangKe[9]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[9]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('W14', (is_null($poldaYangKe[10]->poldaInputPrevToday)) ? 0 : $poldaYangKe[10]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('X14', (is_null($poldaYangKe[10]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[10]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('Y14', (is_null($poldaYangKe[11]->poldaInputPrevToday)) ? 0 : $poldaYangKe[11]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('Z14', (is_null($poldaYangKe[11]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[11]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AA14', (is_null($poldaYangKe[12]->poldaInputPrevToday)) ? 0 : $poldaYangKe[12]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AB14', (is_null($poldaYangKe[12]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[12]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AC14', (is_null($poldaYangKe[13]->poldaInputPrevToday)) ? 0 : $poldaYangKe[13]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AD14', (is_null($poldaYangKe[13]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[13]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AE14', (is_null($poldaYangKe[14]->poldaInputPrevToday)) ? 0 : $poldaYangKe[14]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AF14', (is_null($poldaYangKe[14]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[14]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AG14', (is_null($poldaYangKe[15]->poldaInputPrevToday)) ? 0 : $poldaYangKe[15]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AH14', (is_null($poldaYangKe[15]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[15]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AI14', (is_null($poldaYangKe[16]->poldaInputPrevToday)) ? 0 : $poldaYangKe[16]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AJ14', (is_null($poldaYangKe[16]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[16]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AK14', (is_null($poldaYangKe[17]->poldaInputPrevToday)) ? 0 : $poldaYangKe[17]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AL14', (is_null($poldaYangKe[17]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[17]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AM14', (is_null($poldaYangKe[18]->poldaInputPrevToday)) ? 0 : $poldaYangKe[18]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AN14', (is_null($poldaYangKe[18]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[18]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AO14', (is_null($poldaYangKe[19]->poldaInputPrevToday)) ? 0 : $poldaYangKe[19]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AP14', (is_null($poldaYangKe[19]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[19]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AQ14', (is_null($poldaYangKe[20]->poldaInputPrevToday)) ? 0 : $poldaYangKe[20]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AR14', (is_null($poldaYangKe[20]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[20]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AS14', (is_null($poldaYangKe[21]->poldaInputPrevToday)) ? 0 : $poldaYangKe[21]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AT14', (is_null($poldaYangKe[21]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[21]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AU14', (is_null($poldaYangKe[22]->poldaInputPrevToday)) ? 0 : $poldaYangKe[22]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AV14', (is_null($poldaYangKe[22]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[22]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AW14', (is_null($poldaYangKe[23]->poldaInputPrevToday)) ? 0 : $poldaYangKe[23]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AX14', (is_null($poldaYangKe[23]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[23]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('AY14', (is_null($poldaYangKe[24]->poldaInputPrevToday)) ? 0 : $poldaYangKe[24]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('AZ14', (is_null($poldaYangKe[24]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[24]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BA14', (is_null($poldaYangKe[25]->poldaInputPrevToday)) ? 0 : $poldaYangKe[25]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BB14', (is_null($poldaYangKe[25]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[25]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BC14', (is_null($poldaYangKe[26]->poldaInputPrevToday)) ? 0 : $poldaYangKe[26]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BD14', (is_null($poldaYangKe[26]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[26]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BE14', (is_null($poldaYangKe[27]->poldaInputPrevToday)) ? 0 : $poldaYangKe[27]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BF14', (is_null($poldaYangKe[27]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[27]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BG14', (is_null($poldaYangKe[28]->poldaInputPrevToday)) ? 0 : $poldaYangKe[28]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BH14', (is_null($poldaYangKe[28]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[28]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BI14', (is_null($poldaYangKe[29]->poldaInputPrevToday)) ? 0 : $poldaYangKe[29]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BJ14', (is_null($poldaYangKe[29]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[29]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BK14', (is_null($poldaYangKe[30]->poldaInputPrevToday)) ? 0 : $poldaYangKe[30]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BL14', (is_null($poldaYangKe[30]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[30]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BM14', (is_null($poldaYangKe[31]->poldaInputPrevToday)) ? 0 : $poldaYangKe[31]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BN14', (is_null($poldaYangKe[31]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[31]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BO14', (is_null($poldaYangKe[32]->poldaInputPrevToday)) ? 0 : $poldaYangKe[32]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BP14', (is_null($poldaYangKe[32]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[32]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('BQ14', (is_null($poldaYangKe[33]->poldaInputPrevToday)) ? 0 : $poldaYangKe[33]->poldaInputPrevToday->pelanggaran_lalu_lintas_tilang_p);
        $sheet->setCellValue('BR14', (is_null($poldaYangKe[33]->poldaInputCurrentToday)) ? 0 : $poldaYangKe[33]->poldaInputCurrentToday->pelanggaran_lalu_lintas_tilang);

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}