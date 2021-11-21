<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (! function_exists('previewExcelToHTML')) {
    function previewExcelToHTML(
        $template,
        $prev,
        $current,
        $kesatuan=null,
        $hari_tanggal=null,
        $nama_atasan=null,
        $pangkat=null,
        $jabatan=null,
        $nama_laporan=null,
        $customFileName=null,
        $operationName,
        $customCombineName=null,
        $cityName=null,
        $prevYear,
        $currentYear,
        $dr=null
        )
    {

        $excelPath = public_path('template/excel');

        // format_laporan_operasi_2021_preview_new.xlsx"; //FILE LAMA
        $excelTemplate = $excelPath."/format_laporan_anev_html.xlsx";

        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($excelTemplate);

        $sheet = $spreadsheet->getActiveSheet();

        $combineName = $nama_laporan." Giat Operasi ".$operationName;

        $sheet->setCellValue('A6', 'LAPORAN HARIAN '.$operationName.' '.$currentYear);
        $sheet->setCellValue('A7', "TANGGAL ".gedein($hari_tanggal));

        $sheet->setCellValue('C11', $prevYear);
        $sheet->setCellValue('D11', $currentYear);

        if(is_null($cityName)) {
            $sheet->setCellValue('D428', indonesiaDate(date("Y-m-d")));
        } else {
            $sheet->setCellValue('D428', ucfirst(strtolower($cityName)).", ".indonesiaDate(date("Y-m-d")));
        }

        $sheet->setCellValue('D429', $jabatan." ".$operationName." - ".$currentYear);

        if(!empty($dr)) {
            $sheet->setCellValue('D433', $nama_atasan);
            $sheet->setCellValue('D434', $pangkat);
        }

        $sheet->setCellValue('C15', applyZero($prev->pelanggaran_lalu_lintas_tilang));
        $sheet->setCellValue('D15', applyZero($current->pelanggaran_lalu_lintas_tilang));

        $sheet->setCellValue('C16', applyZero($prev->pelanggaran_lalu_lintas_teguran));
        $sheet->setCellValue('D16', applyZero($current->pelanggaran_lalu_lintas_teguran));

        $sheet->setCellValue('C20', applyZero($prev->pelanggaran_sepeda_motor_kecepatan));
        $sheet->setCellValue('D20', applyZero($current->pelanggaran_sepeda_motor_kecepatan));

        $sheet->setCellValue('C21', applyZero($prev->pelanggaran_sepeda_motor_helm));
        $sheet->setCellValue('D21', applyZero($current->pelanggaran_sepeda_motor_helm));

        $sheet->setCellValue('C22', applyZero($prev->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));
        $sheet->setCellValue('D22', applyZero($current->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));

        $sheet->setCellValue('C23', applyZero($prev->pelanggaran_sepeda_motor_marka_menerus_menyalip));
        $sheet->setCellValue('D23', applyZero($current->pelanggaran_sepeda_motor_marka_menerus_menyalip));

        $sheet->setCellValue('C24', applyZero($prev->pelanggaran_sepeda_motor_melawan_arus));
        $sheet->setCellValue('D24', applyZero($current->pelanggaran_sepeda_motor_melawan_arus));

        $sheet->setCellValue('C25', applyZero($prev->pelanggaran_sepeda_motor_melanggar_lampu_lalin));
        $sheet->setCellValue('D25', applyZero($current->pelanggaran_sepeda_motor_melanggar_lampu_lalin));

        $sheet->setCellValue('C26', applyZero($prev->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));
        $sheet->setCellValue('D26', applyZero($current->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));

        $sheet->setCellValue('C27', applyZero($prev->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D27', applyZero($current->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C28', applyZero($prev->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));
        $sheet->setCellValue('D28', applyZero($current->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));

        $sheet->setCellValue('C29', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D29', applyZero($current->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C30', applyZero($prev->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D30', applyZero($current->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C31', applyZero($prev->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D31', applyZero($current->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C32', applyZero($prev->pelanggaran_sepeda_motor_melanggar_marka_berhenti));
        $sheet->setCellValue('D32', applyZero($current->pelanggaran_sepeda_motor_melanggar_marka_berhenti));

        $sheet->setCellValue('C33', applyZero($prev->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D33', applyZero($current->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C34', applyZero($prev->pelanggaran_sepeda_motor_surat_surat));
        $sheet->setCellValue('D34', applyZero($current->pelanggaran_sepeda_motor_surat_surat));

        $sheet->setCellValue('C35', applyZero($prev->pelanggaran_sepeda_motor_kelengkapan_kendaraan));
        $sheet->setCellValue('D35', applyZero($current->pelanggaran_sepeda_motor_kelengkapan_kendaraan));

        $sheet->setCellValue('C36', applyZero($prev->pelanggaran_sepeda_motor_lain_lain));
        $sheet->setCellValue('D36', applyZero($current->pelanggaran_sepeda_motor_lain_lain));

        $sheet->setCellValue('C39', applyZero($prev->pelanggaran_mobil_kecepatan));
        $sheet->setCellValue('D39', applyZero($current->pelanggaran_mobil_kecepatan));

        $sheet->setCellValue('C40', applyZero($prev->pelanggaran_mobil_safety_belt));
        $sheet->setCellValue('D40', applyZero($current->pelanggaran_mobil_safety_belt));

        $sheet->setCellValue('C41', applyZero($prev->pelanggaran_mobil_muatan_overload));
        $sheet->setCellValue('D41', applyZero($current->pelanggaran_mobil_muatan_overload));

        $sheet->setCellValue('C42', applyZero($prev->pelanggaran_mobil_marka_menerus_menyalip));
        $sheet->setCellValue('D42', applyZero($current->pelanggaran_mobil_marka_menerus_menyalip));

        $sheet->setCellValue('C43', applyZero($prev->pelanggaran_mobil_melawan_arus));
        $sheet->setCellValue('D43', applyZero($current->pelanggaran_mobil_melawan_arus));

        $sheet->setCellValue('C44', applyZero($prev->pelanggaran_mobil_melanggar_lampu_lalin));
        $sheet->setCellValue('D44', applyZero($current->pelanggaran_mobil_melanggar_lampu_lalin));

        $sheet->setCellValue('C45', applyZero($prev->pelanggaran_mobil_mengemudi_tidak_wajar));
        $sheet->setCellValue('D45', applyZero($current->pelanggaran_mobil_mengemudi_tidak_wajar));

        $sheet->setCellValue('C46', applyZero($prev->pelanggaran_mobil_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D46', applyZero($current->pelanggaran_mobil_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C47', applyZero($prev->pelanggaran_mobil_tidak_nyala_lampu_malam));
        $sheet->setCellValue('D47', applyZero($current->pelanggaran_mobil_tidak_nyala_lampu_malam));

        $sheet->setCellValue('C48', applyZero($prev->pelanggaran_mobil_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D48', applyZero($current->pelanggaran_mobil_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C49', applyZero($prev->pelanggaran_mobil_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D49', applyZero($current->pelanggaran_mobil_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C50', applyZero($prev->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D50', applyZero($current->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C51', applyZero($prev->pelanggaran_mobil_melanggar_marka_berhenti));
        $sheet->setCellValue('D51', applyZero($current->pelanggaran_mobil_melanggar_marka_berhenti));

        $sheet->setCellValue('C52', applyZero($prev->pelanggaran_mobil_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D52', applyZero($current->pelanggaran_mobil_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C53', applyZero($prev->pelanggaran_mobil_surat_surat));
        $sheet->setCellValue('D53', applyZero($current->pelanggaran_mobil_surat_surat));

        $sheet->setCellValue('C54', applyZero($prev->pelanggaran_mobil_kelengkapan_kendaraan));
        $sheet->setCellValue('D54', applyZero($current->pelanggaran_mobil_kelengkapan_kendaraan));

        $sheet->setCellValue('C55', applyZero($prev->pelanggaran_mobil_lain_lain));
        $sheet->setCellValue('D55', applyZero($current->pelanggaran_mobil_lain_lain));

        $sheet->setCellValue('C58', applyZero($prev->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));
        $sheet->setCellValue('D58', applyZero($current->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));

        $sheet->setCellValue('C61', applyZero($prev->barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D61', applyZero($current->barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C62', applyZero($prev->barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D62', applyZero($current->barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C63', applyZero($prev->barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D63', applyZero($current->barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C66', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));
        $sheet->setCellValue('D66', applyZero($current->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));

        $sheet->setCellValue('C67', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));
        $sheet->setCellValue('D67', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));

        $sheet->setCellValue('C68', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_bus));
        $sheet->setCellValue('D68', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_bus));

        $sheet->setCellValue('C69', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_barang));
        $sheet->setCellValue('D69', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_barang));

        $sheet->setCellValue('C70', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));
        $sheet->setCellValue('D70', applyZero($current->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));

        $sheet->setCellValue('C73', applyZero($prev->profesi_pelaku_pelanggaran_pns));
        $sheet->setCellValue('D73', applyZero($current->profesi_pelaku_pelanggaran_pns));

        $sheet->setCellValue('C74', applyZero($prev->profesi_pelaku_pelanggaran_karyawan_swasta));
        $sheet->setCellValue('D74', applyZero($current->profesi_pelaku_pelanggaran_karyawan_swasta));

        $sheet->setCellValue('C75', applyZero($prev->profesi_pelaku_pelanggaran_pelajar_mahasiswa));
        $sheet->setCellValue('D75', applyZero($current->profesi_pelaku_pelanggaran_pelajar_mahasiswa));

        $sheet->setCellValue('C76', applyZero($prev->profesi_pelaku_pelanggaran_pengemudi_supir));
        $sheet->setCellValue('D76', applyZero($current->profesi_pelaku_pelanggaran_pengemudi_supir));

        $sheet->setCellValue('C77', applyZero($prev->profesi_pelaku_pelanggaran_tni));
        $sheet->setCellValue('D77', applyZero($current->profesi_pelaku_pelanggaran_tni));

        $sheet->setCellValue('C78', applyZero($prev->profesi_pelaku_pelanggaran_polri));
        $sheet->setCellValue('D78', applyZero($current->profesi_pelaku_pelanggaran_polri));

        $sheet->setCellValue('C79', applyZero($prev->profesi_pelaku_pelanggaran_lain_lain));
        $sheet->setCellValue('D79', applyZero($current->profesi_pelaku_pelanggaran_lain_lain));

        $sheet->setCellValue('C82', applyZero($prev->usia_pelaku_pelanggaran_kurang_dari_15_tahun));
        $sheet->setCellValue('D82', applyZero($current->usia_pelaku_pelanggaran_kurang_dari_15_tahun));

        $sheet->setCellValue('C83', applyZero($prev->usia_pelaku_pelanggaran_16_20_tahun));
        $sheet->setCellValue('D83', applyZero($current->usia_pelaku_pelanggaran_16_20_tahun));

        $sheet->setCellValue('C84', applyZero($prev->usia_pelaku_pelanggaran_21_25_tahun));
        $sheet->setCellValue('D84', applyZero($current->usia_pelaku_pelanggaran_21_25_tahun));

        $sheet->setCellValue('C85', applyZero($prev->usia_pelaku_pelanggaran_26_30_tahun));
        $sheet->setCellValue('D85', applyZero($current->usia_pelaku_pelanggaran_26_30_tahun));

        $sheet->setCellValue('C86', applyZero($prev->usia_pelaku_pelanggaran_31_35_tahun));
        $sheet->setCellValue('D86', applyZero($current->usia_pelaku_pelanggaran_31_35_tahun));

        $sheet->setCellValue('C87', applyZero($prev->usia_pelaku_pelanggaran_36_40_tahun));
        $sheet->setCellValue('D87', applyZero($current->usia_pelaku_pelanggaran_36_40_tahun));

        $sheet->setCellValue('C88', applyZero($prev->usia_pelaku_pelanggaran_41_45_tahun));
        $sheet->setCellValue('D88', applyZero($current->usia_pelaku_pelanggaran_41_45_tahun));

        $sheet->setCellValue('C89', applyZero($prev->usia_pelaku_pelanggaran_46_50_tahun));
        $sheet->setCellValue('D89', applyZero($current->usia_pelaku_pelanggaran_46_50_tahun));

        $sheet->setCellValue('C90', applyZero($prev->usia_pelaku_pelanggaran_51_55_tahun));
        $sheet->setCellValue('D90', applyZero($current->usia_pelaku_pelanggaran_51_55_tahun));

        $sheet->setCellValue('C91', applyZero($prev->usia_pelaku_pelanggaran_56_60_tahun));
        $sheet->setCellValue('D91', applyZero($current->usia_pelaku_pelanggaran_56_60_tahun));

        $sheet->setCellValue('C92', applyZero($prev->usia_pelaku_pelanggaran_diatas_60_tahun));
        $sheet->setCellValue('D92', applyZero($current->usia_pelaku_pelanggaran_diatas_60_tahun));

        $sheet->setCellValue('C95', applyZero($prev->sim_pelaku_pelanggaran_sim_a));
        $sheet->setCellValue('D95', applyZero($current->sim_pelaku_pelanggaran_sim_a));

        $sheet->setCellValue('C96', applyZero($prev->sim_pelaku_pelanggaran_sim_a_umum));
        $sheet->setCellValue('D96', applyZero($current->sim_pelaku_pelanggaran_sim_a_umum));

        $sheet->setCellValue('C97', applyZero($prev->sim_pelaku_pelanggaran_sim_b1));
        $sheet->setCellValue('D97', applyZero($current->sim_pelaku_pelanggaran_sim_b1));

        $sheet->setCellValue('C98', applyZero($prev->sim_pelaku_pelanggaran_sim_b1_umum));
        $sheet->setCellValue('D98', applyZero($current->sim_pelaku_pelanggaran_sim_b1_umum));

        $sheet->setCellValue('C99', applyZero($prev->sim_pelaku_pelanggaran_sim_b2));
        $sheet->setCellValue('D99', applyZero($current->sim_pelaku_pelanggaran_sim_b2));

        $sheet->setCellValue('C100', applyZero($prev->sim_pelaku_pelanggaran_sim_b2_umum));
        $sheet->setCellValue('D100', applyZero($current->sim_pelaku_pelanggaran_sim_b2_umum));

        $sheet->setCellValue('C101', applyZero($prev->sim_pelaku_pelanggaran_sim_c));
        $sheet->setCellValue('D101', applyZero($current->sim_pelaku_pelanggaran_sim_c));

        $sheet->setCellValue('C102', applyZero($prev->sim_pelaku_pelanggaran_sim_d));
        $sheet->setCellValue('D102', applyZero($current->sim_pelaku_pelanggaran_sim_d));

        $sheet->setCellValue('C103', applyZero($prev->sim_pelaku_pelanggaran_sim_internasional));
        $sheet->setCellValue('D103', applyZero($current->sim_pelaku_pelanggaran_sim_internasional));

        $sheet->setCellValue('C104', applyZero($prev->sim_pelaku_pelanggaran_tanpa_sim));
        $sheet->setCellValue('D104', applyZero($current->sim_pelaku_pelanggaran_tanpa_sim));

        $sheet->setCellValue('C108', applyZero($prev->lokasi_pelanggaran_pemukiman));
        $sheet->setCellValue('D108', applyZero($current->lokasi_pelanggaran_pemukiman));

        $sheet->setCellValue('C109', applyZero($prev->lokasi_pelanggaran_perbelanjaan));
        $sheet->setCellValue('D109', applyZero($current->lokasi_pelanggaran_perbelanjaan));

        $sheet->setCellValue('C110', applyZero($prev->lokasi_pelanggaran_perkantoran));
        $sheet->setCellValue('D110', applyZero($current->lokasi_pelanggaran_perkantoran));

        $sheet->setCellValue('C111', applyZero($prev->lokasi_pelanggaran_wisata));
        $sheet->setCellValue('D111', applyZero($current->lokasi_pelanggaran_wisata));

        $sheet->setCellValue('C112', applyZero($prev->lokasi_pelanggaran_industri));
        $sheet->setCellValue('D112', applyZero($current->lokasi_pelanggaran_industri));

        $sheet->setCellValue('C115', applyZero($prev->lokasi_pelanggaran_status_jalan_nasional));
        $sheet->setCellValue('D115', applyZero($current->lokasi_pelanggaran_status_jalan_nasional));

        $sheet->setCellValue('C116', applyZero($prev->lokasi_pelanggaran_status_jalan_propinsi));
        $sheet->setCellValue('D116', applyZero($current->lokasi_pelanggaran_status_jalan_propinsi));

        $sheet->setCellValue('C117', applyZero($prev->lokasi_pelanggaran_status_jalan_kab_kota));
        $sheet->setCellValue('D117', applyZero($current->lokasi_pelanggaran_status_jalan_kab_kota));

        $sheet->setCellValue('C118', applyZero($prev->lokasi_pelanggaran_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D118', applyZero($current->lokasi_pelanggaran_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C121', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_arteri));
        $sheet->setCellValue('D121', applyZero($current->lokasi_pelanggaran_fungsi_jalan_arteri));

        $sheet->setCellValue('C122', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_kolektor));
        $sheet->setCellValue('D122', applyZero($current->lokasi_pelanggaran_fungsi_jalan_kolektor));

        $sheet->setCellValue('C123', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lokal));
        $sheet->setCellValue('D123', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lokal));

        $sheet->setCellValue('C124', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D124', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C128', applyZero($prev->kecelakaan_lalin_jumlah_kejadian));
        $sheet->setCellValue('D128', applyZero($current->kecelakaan_lalin_jumlah_kejadian));

        $sheet->setCellValue('C129', applyZero($prev->kecelakaan_lalin_jumlah_korban_meninggal));
        $sheet->setCellValue('D129', applyZero($current->kecelakaan_lalin_jumlah_korban_meninggal));

        $sheet->setCellValue('C130', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_berat));
        $sheet->setCellValue('D130', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_berat));

        $sheet->setCellValue('C131', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_ringan));
        $sheet->setCellValue('D131', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_ringan));

        $sheet->setCellValue('C132', applyZero($prev->kecelakaan_lalin_jumlah_kerugian_materiil));
        $sheet->setCellValue('D132', applyZero($current->kecelakaan_lalin_jumlah_kerugian_materiil));

        $sheet->setCellValue('C134', applyZero($prev->kecelakaan_barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D134', applyZero($current->kecelakaan_barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C135', applyZero($prev->kecelakaan_barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D135', applyZero($current->kecelakaan_barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C136', applyZero($prev->kecelakaan_barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D136', applyZero($current->kecelakaan_barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C139', applyZero($prev->profesi_korban_kecelakaan_lalin_pns));
        $sheet->setCellValue('D139', applyZero($current->profesi_korban_kecelakaan_lalin_pns));

        $sheet->setCellValue('C140', applyZero($prev->profesi_korban_kecelakaan_lalin_karwayan_swasta));
        $sheet->setCellValue('D140', applyZero($current->profesi_korban_kecelakaan_lalin_karwayan_swasta));

        $sheet->setCellValue('C141', applyZero($prev->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));
        $sheet->setCellValue('D141', applyZero($current->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));

        $sheet->setCellValue('C142', applyZero($prev->profesi_korban_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D142', applyZero($current->profesi_korban_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C143', applyZero($prev->profesi_korban_kecelakaan_lalin_tni));
        $sheet->setCellValue('D143', applyZero($current->profesi_korban_kecelakaan_lalin_tni));

        $sheet->setCellValue('C144', applyZero($prev->profesi_korban_kecelakaan_lalin_polri));
        $sheet->setCellValue('D144', applyZero($current->profesi_korban_kecelakaan_lalin_polri));

        $sheet->setCellValue('C145', applyZero($prev->profesi_korban_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D145', applyZero($current->profesi_korban_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C148', applyZero($prev->usia_korban_kecelakaan_kurang_15));
        $sheet->setCellValue('D148', applyZero($current->usia_korban_kecelakaan_kurang_15));

        $sheet->setCellValue('C149', applyZero($prev->usia_korban_kecelakaan_16_20));
        $sheet->setCellValue('D149', applyZero($current->usia_korban_kecelakaan_16_20));

        $sheet->setCellValue('C150', applyZero($prev->usia_korban_kecelakaan_21_25));
        $sheet->setCellValue('D150', applyZero($current->usia_korban_kecelakaan_21_25));

        $sheet->setCellValue('C151', applyZero($prev->usia_korban_kecelakaan_26_30));
        $sheet->setCellValue('D151', applyZero($current->usia_korban_kecelakaan_26_30));

        $sheet->setCellValue('C152', applyZero($prev->usia_korban_kecelakaan_31_35));
        $sheet->setCellValue('D152', applyZero($current->usia_korban_kecelakaan_31_35));

        $sheet->setCellValue('C153', applyZero($prev->usia_korban_kecelakaan_36_40));
        $sheet->setCellValue('D153', applyZero($current->usia_korban_kecelakaan_36_40));

        $sheet->setCellValue('C154', applyZero($prev->usia_korban_kecelakaan_41_45));
        $sheet->setCellValue('D154', applyZero($current->usia_korban_kecelakaan_41_45));

        $sheet->setCellValue('C155', applyZero($prev->usia_korban_kecelakaan_45_50));
        $sheet->setCellValue('D155', applyZero($current->usia_korban_kecelakaan_45_50));

        $sheet->setCellValue('C156', applyZero($prev->usia_korban_kecelakaan_51_55));
        $sheet->setCellValue('D156', applyZero($current->usia_korban_kecelakaan_51_55));

        $sheet->setCellValue('C157', applyZero($prev->usia_korban_kecelakaan_56_60));
        $sheet->setCellValue('D157', applyZero($current->usia_korban_kecelakaan_56_60));

        $sheet->setCellValue('C158', applyZero($prev->usia_korban_kecelakaan_diatas_60));
        $sheet->setCellValue('D158', applyZero($current->usia_korban_kecelakaan_diatas_60));

        $sheet->setCellValue('C161', applyZero($prev->sim_korban_kecelakaan_sim_a));
        $sheet->setCellValue('D161', applyZero($current->sim_korban_kecelakaan_sim_a));

        $sheet->setCellValue('C162', applyZero($prev->sim_korban_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D162', applyZero($current->sim_korban_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C163', applyZero($prev->sim_korban_kecelakaan_sim_b1));
        $sheet->setCellValue('D163', applyZero($current->sim_korban_kecelakaan_sim_b1));

        $sheet->setCellValue('C164', applyZero($prev->sim_korban_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D164', applyZero($current->sim_korban_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C165', applyZero($prev->sim_korban_kecelakaan_sim_b2));
        $sheet->setCellValue('D165', applyZero($current->sim_korban_kecelakaan_sim_b2));

        $sheet->setCellValue('C166', applyZero($prev->sim_korban_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D166', applyZero($current->sim_korban_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C167', applyZero($prev->sim_korban_kecelakaan_sim_c));
        $sheet->setCellValue('D167', applyZero($current->sim_korban_kecelakaan_sim_c));

        $sheet->setCellValue('C168', applyZero($prev->sim_korban_kecelakaan_sim_d));
        $sheet->setCellValue('D168', applyZero($current->sim_korban_kecelakaan_sim_d));

        $sheet->setCellValue('C169', applyZero($prev->sim_korban_kecelakaan_sim_internasional));
        $sheet->setCellValue('D169', applyZero($current->sim_korban_kecelakaan_sim_internasional));

        $sheet->setCellValue('C170', applyZero($prev->sim_korban_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D170', applyZero($current->sim_korban_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C173', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));
        $sheet->setCellValue('D173', applyZero($current->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));

        $sheet->setCellValue('C174', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));
        $sheet->setCellValue('D174', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));

        $sheet->setCellValue('C175', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_bus));
        $sheet->setCellValue('D175', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_bus));

        $sheet->setCellValue('C176', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_barang));
        $sheet->setCellValue('D176', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_barang));

        $sheet->setCellValue('C177', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));
        $sheet->setCellValue('D177', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));

        $sheet->setCellValue('C178', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));
        $sheet->setCellValue('D178', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));

        $sheet->setCellValue('C181', applyZero($prev->jenis_kecelakaan_tunggal_ooc));
        $sheet->setCellValue('D181', applyZero($current->jenis_kecelakaan_tunggal_ooc));

        $sheet->setCellValue('C182', applyZero($prev->jenis_kecelakaan_depan_depan));
        $sheet->setCellValue('D182', applyZero($current->jenis_kecelakaan_depan_depan));

        $sheet->setCellValue('C183', applyZero($prev->jenis_kecelakaan_depan_belakang));
        $sheet->setCellValue('D183', applyZero($current->jenis_kecelakaan_depan_belakang));

        $sheet->setCellValue('C184', applyZero($prev->jenis_kecelakaan_depan_samping));
        $sheet->setCellValue('D184', applyZero($current->jenis_kecelakaan_depan_samping));

        $sheet->setCellValue('C185', applyZero($prev->jenis_kecelakaan_beruntun));
        $sheet->setCellValue('D185', applyZero($current->jenis_kecelakaan_beruntun));

        $sheet->setCellValue('C186', applyZero($prev->jenis_kecelakaan_pejalan_kaki));
        $sheet->setCellValue('D186', applyZero($current->jenis_kecelakaan_pejalan_kaki));

        $sheet->setCellValue('C187', applyZero($prev->jenis_kecelakaan_tabrak_lari));
        $sheet->setCellValue('D187', applyZero($current->jenis_kecelakaan_tabrak_lari));

        $sheet->setCellValue('C188', applyZero($prev->jenis_kecelakaan_tabrak_hewan));
        $sheet->setCellValue('D188', applyZero($current->jenis_kecelakaan_tabrak_hewan));

        $sheet->setCellValue('C189', applyZero($prev->jenis_kecelakaan_samping_samping));
        $sheet->setCellValue('D189', applyZero($current->jenis_kecelakaan_samping_samping));

        $sheet->setCellValue('C190', applyZero($prev->jenis_kecelakaan_lainnya));
        $sheet->setCellValue('D190', applyZero($current->jenis_kecelakaan_lainnya));

        $sheet->setCellValue('C193', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pns));
        $sheet->setCellValue('D193', applyZero($current->profesi_pelaku_kecelakaan_lalin_pns));

        $sheet->setCellValue('C194', applyZero($prev->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));
        $sheet->setCellValue('D194', applyZero($current->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));

        $sheet->setCellValue('C195', applyZero($prev->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));
        $sheet->setCellValue('D195', applyZero($current->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));

        $sheet->setCellValue('C196', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D196', applyZero($current->profesi_pelaku_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C197', applyZero($prev->profesi_pelaku_kecelakaan_lalin_tni));
        $sheet->setCellValue('D197', applyZero($current->profesi_pelaku_kecelakaan_lalin_tni));

        $sheet->setCellValue('C198', applyZero($prev->profesi_pelaku_kecelakaan_lalin_polri));
        $sheet->setCellValue('D198', applyZero($current->profesi_pelaku_kecelakaan_lalin_polri));

        $sheet->setCellValue('C199', applyZero($prev->profesi_pelaku_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D199', applyZero($current->profesi_pelaku_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C202', applyZero($prev->usia_pelaku_kecelakaan_kurang_dari_15_tahun));
        $sheet->setCellValue('D202', applyZero($current->usia_pelaku_kecelakaan_kurang_dari_15_tahun));

        $sheet->setCellValue('C203', applyZero($prev->usia_pelaku_kecelakaan_16_20_tahun));
        $sheet->setCellValue('D203', applyZero($current->usia_pelaku_kecelakaan_16_20_tahun));

        $sheet->setCellValue('C204', applyZero($prev->usia_pelaku_kecelakaan_21_25_tahun));
        $sheet->setCellValue('D204', applyZero($current->usia_pelaku_kecelakaan_21_25_tahun));

        $sheet->setCellValue('C205', applyZero($prev->usia_pelaku_kecelakaan_26_30_tahun));
        $sheet->setCellValue('D205', applyZero($current->usia_pelaku_kecelakaan_26_30_tahun));

        $sheet->setCellValue('C206', applyZero($prev->usia_pelaku_kecelakaan_31_35_tahun));
        $sheet->setCellValue('D206', applyZero($current->usia_pelaku_kecelakaan_31_35_tahun));

        $sheet->setCellValue('C207', applyZero($prev->usia_pelaku_kecelakaan_36_40_tahun));
        $sheet->setCellValue('D207', applyZero($current->usia_pelaku_kecelakaan_36_40_tahun));

        $sheet->setCellValue('C208', applyZero($prev->usia_pelaku_kecelakaan_41_45_tahun));
        $sheet->setCellValue('D208', applyZero($current->usia_pelaku_kecelakaan_41_45_tahun));

        $sheet->setCellValue('C209', applyZero($prev->usia_pelaku_kecelakaan_46_50_tahun));
        $sheet->setCellValue('D209', applyZero($current->usia_pelaku_kecelakaan_46_50_tahun));

        $sheet->setCellValue('C210', applyZero($prev->usia_pelaku_kecelakaan_51_55_tahun));
        $sheet->setCellValue('D210', applyZero($current->usia_pelaku_kecelakaan_51_55_tahun));

        $sheet->setCellValue('C211', applyZero($prev->usia_pelaku_kecelakaan_56_60_tahun));
        $sheet->setCellValue('D211', applyZero($current->usia_pelaku_kecelakaan_56_60_tahun));

        $sheet->setCellValue('C212', applyZero($prev->usia_pelaku_kecelakaan_diatas_60_tahun));
        $sheet->setCellValue('D212', applyZero($current->usia_pelaku_kecelakaan_diatas_60_tahun));

        $sheet->setCellValue('C215', applyZero($prev->sim_pelaku_kecelakaan_sim_a));
        $sheet->setCellValue('D215', applyZero($current->sim_pelaku_kecelakaan_sim_a));

        $sheet->setCellValue('C216', applyZero($prev->sim_pelaku_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D216', applyZero($current->sim_pelaku_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C217', applyZero($prev->sim_pelaku_kecelakaan_sim_b1));
        $sheet->setCellValue('D217', applyZero($current->sim_pelaku_kecelakaan_sim_b1));

        $sheet->setCellValue('C218', applyZero($prev->sim_pelaku_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D218', applyZero($current->sim_pelaku_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C219', applyZero($prev->sim_pelaku_kecelakaan_sim_b2));
        $sheet->setCellValue('D219', applyZero($current->sim_pelaku_kecelakaan_sim_b2));

        $sheet->setCellValue('C220', applyZero($prev->sim_pelaku_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D220', applyZero($current->sim_pelaku_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C221', applyZero($prev->sim_pelaku_kecelakaan_sim_c));
        $sheet->setCellValue('D221', applyZero($current->sim_pelaku_kecelakaan_sim_c));

        $sheet->setCellValue('C222', applyZero($prev->sim_pelaku_kecelakaan_sim_d));
        $sheet->setCellValue('D222', applyZero($current->sim_pelaku_kecelakaan_sim_d));

        $sheet->setCellValue('C223', applyZero($prev->sim_pelaku_kecelakaan_sim_internasional));
        $sheet->setCellValue('D223', applyZero($current->sim_pelaku_kecelakaan_sim_internasional));

        $sheet->setCellValue('C224', applyZero($prev->sim_pelaku_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D224', applyZero($current->sim_pelaku_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C228', applyZero($prev->lokasi_kecelakaan_lalin_pemukiman));
        $sheet->setCellValue('D228', applyZero($current->lokasi_kecelakaan_lalin_pemukiman));

        $sheet->setCellValue('C229', applyZero($prev->lokasi_kecelakaan_lalin_perbelanjaan));
        $sheet->setCellValue('D229', applyZero($current->lokasi_kecelakaan_lalin_perbelanjaan));

        $sheet->setCellValue('C230', applyZero($prev->lokasi_kecelakaan_lalin_perkantoran));
        $sheet->setCellValue('D230', applyZero($current->lokasi_kecelakaan_lalin_perkantoran));

        $sheet->setCellValue('C231', applyZero($prev->lokasi_kecelakaan_lalin_wisata));
        $sheet->setCellValue('D231', applyZero($current->lokasi_kecelakaan_lalin_wisata));

        $sheet->setCellValue('C232', applyZero($prev->lokasi_kecelakaan_lalin_industri));
        $sheet->setCellValue('D232', applyZero($current->lokasi_kecelakaan_lalin_industri));

        $sheet->setCellValue('C233', applyZero($prev->lokasi_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D233', applyZero($current->lokasi_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C236', applyZero($prev->lokasi_kecelakaan_status_jalan_nasional));
        $sheet->setCellValue('D236', applyZero($current->lokasi_kecelakaan_status_jalan_nasional));

        $sheet->setCellValue('C237', applyZero($prev->lokasi_kecelakaan_status_jalan_propinsi));
        $sheet->setCellValue('D237', applyZero($current->lokasi_kecelakaan_status_jalan_propinsi));

        $sheet->setCellValue('C238', applyZero($prev->lokasi_kecelakaan_status_jalan_kab_kota));
        $sheet->setCellValue('D238', applyZero($current->lokasi_kecelakaan_status_jalan_kab_kota));

        $sheet->setCellValue('C239', applyZero($prev->lokasi_kecelakaan_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D239', applyZero($current->lokasi_kecelakaan_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C242', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_arteri));
        $sheet->setCellValue('D242', applyZero($current->lokasi_kecelakaan_fungsi_jalan_arteri));

        $sheet->setCellValue('C243', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_kolektor));
        $sheet->setCellValue('D243', applyZero($current->lokasi_kecelakaan_fungsi_jalan_kolektor));

        $sheet->setCellValue('C244', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lokal));
        $sheet->setCellValue('D244', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lokal));

        $sheet->setCellValue('C245', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D245', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C248', applyZero($prev->faktor_penyebab_kecelakaan_manusia));
        $sheet->setCellValue('D248', applyZero($current->faktor_penyebab_kecelakaan_manusia));

        $sheet->setCellValue('C249', applyZero($prev->faktor_penyebab_kecelakaan_ngantuk_lelah));
        $sheet->setCellValue('D249', applyZero($current->faktor_penyebab_kecelakaan_ngantuk_lelah));

        $sheet->setCellValue('C250', applyZero($prev->faktor_penyebab_kecelakaan_mabuk_obat));
        $sheet->setCellValue('D250', applyZero($current->faktor_penyebab_kecelakaan_mabuk_obat));

        $sheet->setCellValue('C251', applyZero($prev->faktor_penyebab_kecelakaan_sakit));
        $sheet->setCellValue('D251', applyZero($current->faktor_penyebab_kecelakaan_sakit));

        $sheet->setCellValue('C252', applyZero($prev->faktor_penyebab_kecelakaan_handphone_elektronik));
        $sheet->setCellValue('D252', applyZero($current->faktor_penyebab_kecelakaan_handphone_elektronik));

        $sheet->setCellValue('C253', applyZero($prev->faktor_penyebab_kecelakaan_menerobos_lampu_merah));
        $sheet->setCellValue('D253', applyZero($current->faktor_penyebab_kecelakaan_menerobos_lampu_merah));

        $sheet->setCellValue('C254', applyZero($prev->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));
        $sheet->setCellValue('D254', applyZero($current->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));

        $sheet->setCellValue('C255', applyZero($prev->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));
        $sheet->setCellValue('D255', applyZero($current->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));

        $sheet->setCellValue('C256', applyZero($prev->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));
        $sheet->setCellValue('D256', applyZero($current->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));

        $sheet->setCellValue('C257', applyZero($prev->faktor_penyebab_kecelakaan_berpindah_jalur));
        $sheet->setCellValue('D257', applyZero($current->faktor_penyebab_kecelakaan_berpindah_jalur));

        $sheet->setCellValue('C258', applyZero($prev->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));
        $sheet->setCellValue('D258', applyZero($current->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));

        $sheet->setCellValue('C259', applyZero($prev->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));
        $sheet->setCellValue('D259', applyZero($current->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));

        $sheet->setCellValue('C260', applyZero($prev->faktor_penyebab_kecelakaan_lainnya));
        $sheet->setCellValue('D260', applyZero($current->faktor_penyebab_kecelakaan_lainnya));

        $sheet->setCellValue('C261', applyZero($prev->faktor_penyebab_kecelakaan_alam));
        $sheet->setCellValue('D261', applyZero($current->faktor_penyebab_kecelakaan_alam));

        $sheet->setCellValue('C262', applyZero($prev->faktor_penyebab_kecelakaan_kelaikan_kendaraan));
        $sheet->setCellValue('D262', applyZero($current->faktor_penyebab_kecelakaan_kelaikan_kendaraan));

        $sheet->setCellValue('C263', applyZero($prev->faktor_penyebab_kecelakaan_kondisi_jalan));
        $sheet->setCellValue('D263', applyZero($current->faktor_penyebab_kecelakaan_kondisi_jalan));

        $sheet->setCellValue('C264', applyZero($prev->faktor_penyebab_kecelakaan_prasarana_jalan));
        $sheet->setCellValue('D264', applyZero($current->faktor_penyebab_kecelakaan_prasarana_jalan));

        $sheet->setCellValue('C265', applyZero($prev->faktor_penyebab_kecelakaan_rambu));
        $sheet->setCellValue('D265', applyZero($current->faktor_penyebab_kecelakaan_rambu));

        $sheet->setCellValue('C266', applyZero($prev->faktor_penyebab_kecelakaan_marka));
        $sheet->setCellValue('D266', applyZero($current->faktor_penyebab_kecelakaan_marka));

        $sheet->setCellValue('C267', applyZero($prev->faktor_penyebab_kecelakaan_apil));
        $sheet->setCellValue('D267', applyZero($current->faktor_penyebab_kecelakaan_apil));

        $sheet->setCellValue('C268', applyZero($prev->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));
        $sheet->setCellValue('D268', applyZero($current->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));

        $sheet->setCellValue('C271', applyZero($prev->waktu_kejadian_kecelakaan_00_03));
        $sheet->setCellValue('D271', applyZero($current->waktu_kejadian_kecelakaan_00_03));

        $sheet->setCellValue('C272', applyZero($prev->waktu_kejadian_kecelakaan_03_06));
        $sheet->setCellValue('D272', applyZero($current->waktu_kejadian_kecelakaan_03_06));

        $sheet->setCellValue('C273', applyZero($prev->waktu_kejadian_kecelakaan_06_09));
        $sheet->setCellValue('D273', applyZero($current->waktu_kejadian_kecelakaan_06_09));

        $sheet->setCellValue('C274', applyZero($prev->waktu_kejadian_kecelakaan_09_12));
        $sheet->setCellValue('D274', applyZero($current->waktu_kejadian_kecelakaan_09_12));

        $sheet->setCellValue('C275', applyZero($prev->waktu_kejadian_kecelakaan_12_15));
        $sheet->setCellValue('D275', applyZero($current->waktu_kejadian_kecelakaan_12_15));

        $sheet->setCellValue('C276', applyZero($prev->waktu_kejadian_kecelakaan_15_18));
        $sheet->setCellValue('D276', applyZero($current->waktu_kejadian_kecelakaan_15_18));

        $sheet->setCellValue('C277', applyZero($prev->waktu_kejadian_kecelakaan_18_21));
        $sheet->setCellValue('D277', applyZero($current->waktu_kejadian_kecelakaan_18_21));

        $sheet->setCellValue('C278', applyZero($prev->waktu_kejadian_kecelakaan_21_24));
        $sheet->setCellValue('D278', applyZero($current->waktu_kejadian_kecelakaan_21_24));

        $sheet->setCellValue('C281', applyZero($prev->kecelakaan_lalin_menonjol_jumlah_kejadian));
        $sheet->setCellValue('D281', applyZero($current->kecelakaan_lalin_menonjol_jumlah_kejadian));

        $sheet->setCellValue('C282', applyZero($prev->kecelakaan_lalin_menonjol_korban_meninggal));
        $sheet->setCellValue('D282', applyZero($current->kecelakaan_lalin_menonjol_korban_meninggal));

        $sheet->setCellValue('C283', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_berat));
        $sheet->setCellValue('D283', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_berat));

        $sheet->setCellValue('C284', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_ringan));
        $sheet->setCellValue('D284', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_ringan));

        $sheet->setCellValue('C285', applyZero($prev->kecelakaan_lalin_menonjol_materiil));
        $sheet->setCellValue('D285', applyZero($current->kecelakaan_lalin_menonjol_materiil));

        $sheet->setCellValue('C287', applyZero($prev->kecelakaan_lalin_tunggal_jumlah_kejadian));
        $sheet->setCellValue('D287', applyZero($current->kecelakaan_lalin_tunggal_jumlah_kejadian));

        $sheet->setCellValue('C288', applyZero($prev->kecelakaan_lalin_tunggal_korban_meninggal));
        $sheet->setCellValue('D288', applyZero($current->kecelakaan_lalin_tunggal_korban_meninggal));

        $sheet->setCellValue('C289', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_berat));
        $sheet->setCellValue('D289', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_berat));

        $sheet->setCellValue('C290', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_ringan));
        $sheet->setCellValue('D290', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_ringan));

        $sheet->setCellValue('C291', applyZero($prev->kecelakaan_lalin_tunggal_materiil));
        $sheet->setCellValue('D291', applyZero($current->kecelakaan_lalin_tunggal_materiil));

        $sheet->setCellValue('C293', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));
        $sheet->setCellValue('D293', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));

        $sheet->setCellValue('C294', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));
        $sheet->setCellValue('D294', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));

        $sheet->setCellValue('C295', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));
        $sheet->setCellValue('D295', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));

        $sheet->setCellValue('C296', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));
        $sheet->setCellValue('D296', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));

        $sheet->setCellValue('C297', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));
        $sheet->setCellValue('D297', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));

        $sheet->setCellValue('C299', applyZero($prev->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));
        $sheet->setCellValue('D299', applyZero($current->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));

        $sheet->setCellValue('C300', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_meninggal));
        $sheet->setCellValue('D300', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_meninggal));

        $sheet->setCellValue('C301', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_berat));
        $sheet->setCellValue('D301', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_berat));

        $sheet->setCellValue('C302', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));
        $sheet->setCellValue('D302', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));

        $sheet->setCellValue('C303', applyZero($prev->kecelakaan_lalin_tabrak_lari_materiil));
        $sheet->setCellValue('D303', applyZero($current->kecelakaan_lalin_tabrak_lari_materiil));

        $sheet->setCellValue('C305', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));
        $sheet->setCellValue('D305', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));

        $sheet->setCellValue('C306', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));
        $sheet->setCellValue('D306', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));

        $sheet->setCellValue('C307', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));
        $sheet->setCellValue('D307', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));

        $sheet->setCellValue('C308', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));
        $sheet->setCellValue('D308', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));

        $sheet->setCellValue('C309', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_materiil));
        $sheet->setCellValue('D309', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_materiil));

        $sheet->setCellValue('C311', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));
        $sheet->setCellValue('D311', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));

        $sheet->setCellValue('C312', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));
        $sheet->setCellValue('D312', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));

        $sheet->setCellValue('C313', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));
        $sheet->setCellValue('D313', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));

        $sheet->setCellValue('C314', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));
        $sheet->setCellValue('D314', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));

        $sheet->setCellValue('C315', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_materiil));
        $sheet->setCellValue('D315', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_materiil));

        $sheet->setCellValue('C317', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));
        $sheet->setCellValue('D317', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));

        $sheet->setCellValue('C318', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));
        $sheet->setCellValue('D318', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));

        $sheet->setCellValue('C319', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));
        $sheet->setCellValue('D319', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));

        $sheet->setCellValue('C320', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));
        $sheet->setCellValue('D320', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));

        $sheet->setCellValue('C321', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));
        $sheet->setCellValue('D321', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));

        $sheet->setCellValue('C323', applyZero($prev->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));
        $sheet->setCellValue('D323', applyZero($current->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));

        $sheet->setCellValue('C324', applyZero($prev->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));
        $sheet->setCellValue('D324', applyZero($current->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));

        $sheet->setCellValue('C325', applyZero($prev->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));
        $sheet->setCellValue('D325', applyZero($current->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));

        $sheet->setCellValue('C326', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));
        $sheet->setCellValue('D326', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));

        $sheet->setCellValue('C327', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));
        $sheet->setCellValue('D327', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));

        $sheet->setCellValue('C328', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_meninggal));
        $sheet->setCellValue('D328', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_meninggal));

        $sheet->setCellValue('C329', applyZero($prev->kecelakaan_lalin_perlintasan_ka_materiil));
        $sheet->setCellValue('D329', applyZero($current->kecelakaan_lalin_perlintasan_ka_materiil));

        $sheet->setCellValue('C331', applyZero($prev->kecelakaan_transportasi_kereta_api));
        $sheet->setCellValue('D331', applyZero($current->kecelakaan_transportasi_kereta_api));

        $sheet->setCellValue('C332', applyZero($prev->kecelakaan_transportasi_laut_perairan));
        $sheet->setCellValue('D332', applyZero($current->kecelakaan_transportasi_laut_perairan));

        $sheet->setCellValue('C333', applyZero($prev->kecelakaan_transportasi_udara));
        $sheet->setCellValue('D333', applyZero($current->kecelakaan_transportasi_udara));

        $sheet->setCellValue('C338', applyZero($prev->penlu_melalui_media_cetak));
        $sheet->setCellValue('D338', applyZero($current->penlu_melalui_media_cetak));

        $sheet->setCellValue('C339', applyZero($prev->penlu_melalui_media_elektronik));
        $sheet->setCellValue('D339', applyZero($current->penlu_melalui_media_elektronik));

        $sheet->setCellValue('C340', applyZero($prev->penlu_melalui_media_sosial));
        $sheet->setCellValue('D340', applyZero($current->penlu_melalui_media_sosial));

        $sheet->setCellValue('C341', applyZero($prev->penlu_melalui_tempat_keramaian));
        $sheet->setCellValue('D341', applyZero($current->penlu_melalui_tempat_keramaian));

        $sheet->setCellValue('C342', applyZero($prev->penlu_melalui_tempat_istirahat));
        $sheet->setCellValue('D342', applyZero($current->penlu_melalui_tempat_istirahat));

        $sheet->setCellValue('C343', applyZero($prev->penlu_melalui_daerah_rawan_laka_dan_langgar));
        $sheet->setCellValue('D343', applyZero($current->penlu_melalui_daerah_rawan_laka_dan_langgar));

        $sheet->setCellValue('C346', applyZero($prev->penyebaran_pemasangan_spanduk));
        $sheet->setCellValue('D346', applyZero($current->penyebaran_pemasangan_spanduk));

        $sheet->setCellValue('C347', applyZero($prev->penyebaran_pemasangan_leaflet));
        $sheet->setCellValue('D347', applyZero($current->penyebaran_pemasangan_leaflet));

        $sheet->setCellValue('C348', applyZero($prev->penyebaran_pemasangan_sticker));
        $sheet->setCellValue('D348', applyZero($current->penyebaran_pemasangan_sticker));

        $sheet->setCellValue('C349', applyZero($prev->penyebaran_pemasangan_bilboard));
        $sheet->setCellValue('D349', applyZero($current->penyebaran_pemasangan_bilboard));

        $sheet->setCellValue('C352', applyZero($prev->polisi_sahabat_anak));
        $sheet->setCellValue('D352', applyZero($current->polisi_sahabat_anak));

        $sheet->setCellValue('C353', applyZero($prev->cara_aman_sekolah));
        $sheet->setCellValue('D353', applyZero($current->cara_aman_sekolah));

        $sheet->setCellValue('C354', applyZero($prev->patroli_keamanan_sekolah));
        $sheet->setCellValue('D354', applyZero($current->patroli_keamanan_sekolah));

        $sheet->setCellValue('C355', applyZero($prev->pramuka_bhayangkara_krida_lalu_lintas));
        $sheet->setCellValue('D355', applyZero($current->pramuka_bhayangkara_krida_lalu_lintas));

        $sheet->setCellValue('C358', applyZero($prev->police_goes_to_campus));
        $sheet->setCellValue('D358', applyZero($current->police_goes_to_campus));

        $sheet->setCellValue('C359', applyZero($prev->safety_riding_driving));
        $sheet->setCellValue('D359', applyZero($current->safety_riding_driving));

        $sheet->setCellValue('C360', applyZero($prev->forum_lalu_lintas_angkutan_umum));
        $sheet->setCellValue('D360', applyZero($current->forum_lalu_lintas_angkutan_umum));

        $sheet->setCellValue('C361', applyZero($prev->kampanye_keselamatan));
        $sheet->setCellValue('D361', applyZero($current->kampanye_keselamatan));

        $sheet->setCellValue('C362', applyZero($prev->sekolah_mengemudi));
        $sheet->setCellValue('D362', applyZero($current->sekolah_mengemudi));

        $sheet->setCellValue('C363', applyZero($prev->taman_lalu_lintas));
        $sheet->setCellValue('D363', applyZero($current->taman_lalu_lintas));

        $sheet->setCellValue('C364', applyZero($prev->global_road_safety_partnership_action));
        $sheet->setCellValue('D364', applyZero($current->global_road_safety_partnership_action));

        $sheet->setCellValue('C368', applyZero($prev->giat_lantas_pengaturan));
        $sheet->setCellValue('D368', applyZero($current->giat_lantas_pengaturan));

        $sheet->setCellValue('C369', applyZero($prev->giat_lantas_penjagaan));
        $sheet->setCellValue('D369', applyZero($current->giat_lantas_penjagaan));

        $sheet->setCellValue('C370', applyZero($prev->giat_lantas_pengawalan));
        $sheet->setCellValue('D370', applyZero($current->giat_lantas_pengawalan));

        $sheet->setCellValue('C371', applyZero($prev->giat_lantas_patroli));
        $sheet->setCellValue('D371', applyZero($current->giat_lantas_patroli));

        $sheet->setCellValue('C376', applyZero($prev->arus_mudik_jumlah_bus_keberangkatan));
        $sheet->setCellValue('D376', applyZero($current->arus_mudik_jumlah_bus_keberangkatan));

        $sheet->setCellValue('C377', applyZero($prev->arus_mudik_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D377', applyZero($current->arus_mudik_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C378', applyZero($prev->arus_mudik_jumlah_bus_kedatangan));
        $sheet->setCellValue('D378', applyZero($current->arus_mudik_jumlah_bus_kedatangan));

        $sheet->setCellValue('C379', applyZero($prev->arus_mudik_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D379', applyZero($current->arus_mudik_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C380', applyZero($prev->arus_mudik_total_terminal));
        $sheet->setCellValue('D380', applyZero($current->arus_mudik_total_terminal));

        $sheet->setCellValue('C381', applyZero($prev->arus_mudik_total_bus_keberangkatan));
        $sheet->setCellValue('D381', applyZero($current->arus_mudik_total_bus_keberangkatan));

        $sheet->setCellValue('C382', applyZero($prev->arus_mudik_penumpang_keberangkatan));
        $sheet->setCellValue('D382', applyZero($current->arus_mudik_penumpang_keberangkatan));

        $sheet->setCellValue('C383', applyZero($prev->arus_mudik_total_bus_kedatangan));
        $sheet->setCellValue('D383', applyZero($current->arus_mudik_total_bus_kedatangan));

        $sheet->setCellValue('C384', applyZero($prev->arus_mudik_penumpang_kedatangan));
        $sheet->setCellValue('D384', applyZero($current->arus_mudik_penumpang_kedatangan));

        $sheet->setCellValue('C386', applyZero($prev->arus_mudik_kereta_api_total_stasiun));
        $sheet->setCellValue('D386', applyZero($current->arus_mudik_kereta_api_total_stasiun));

        $sheet->setCellValue('C387', applyZero($prev->arus_mudik_kereta_api_total_penumpang_keberangkatan));
        $sheet->setCellValue('D387', applyZero($current->arus_mudik_kereta_api_total_penumpang_keberangkatan));

        $sheet->setCellValue('C388', applyZero($prev->arus_mudik_kereta_api_total_penumpang_kedatangan));
        $sheet->setCellValue('D388', applyZero($current->arus_mudik_kereta_api_total_penumpang_kedatangan));

        $sheet->setCellValue('C390', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));
        $sheet->setCellValue('D390', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));

        $sheet->setCellValue('C391', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));
        $sheet->setCellValue('D391', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));

        $sheet->setCellValue('C392', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));
        $sheet->setCellValue('D392', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));

        $sheet->setCellValue('C393', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D393', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C394', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));
        $sheet->setCellValue('D394', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));

        $sheet->setCellValue('C395', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));
        $sheet->setCellValue('D395', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));

        $sheet->setCellValue('C396', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));
        $sheet->setCellValue('D396', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));

        $sheet->setCellValue('C397', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D397', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C398', applyZero($prev->arus_mudik_total_pelabuhan));
        $sheet->setCellValue('D398', applyZero($current->arus_mudik_total_pelabuhan));

        $sheet->setCellValue('C399', applyZero($prev->arus_mudik_pelabuhan_kendaraan_keberangkatan));
        $sheet->setCellValue('D399', applyZero($current->arus_mudik_pelabuhan_kendaraan_keberangkatan));

        $sheet->setCellValue('C400', applyZero($prev->arus_mudik_pelabuhan_kendaraan_kedatangan));
        $sheet->setCellValue('D400', applyZero($current->arus_mudik_pelabuhan_kendaraan_kedatangan));

        $sheet->setCellValue('C401', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_keberangkatan));
        $sheet->setCellValue('D401', applyZero($current->arus_mudik_pelabuhan_total_penumpang_keberangkatan));

        $sheet->setCellValue('C402', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_kedatangan));
        $sheet->setCellValue('D402', applyZero($current->arus_mudik_pelabuhan_total_penumpang_kedatangan));

        $sheet->setCellValue('C404', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D404', applyZero($current->arus_mudik_bandara_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C405', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D405', applyZero($current->arus_mudik_bandara_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C406', applyZero($prev->arus_mudik_total_bandara));
        $sheet->setCellValue('D406', applyZero($current->arus_mudik_total_bandara));

        $sheet->setCellValue('C407', applyZero($prev->arus_mudik_bandara_total_penumpang_keberangkatan));
        $sheet->setCellValue('D407', applyZero($current->arus_mudik_bandara_total_penumpang_keberangkatan));

        $sheet->setCellValue('C408', applyZero($prev->arus_mudik_bandara_total_penumpang_kedatangan));
        $sheet->setCellValue('D408', applyZero($current->arus_mudik_bandara_total_penumpang_kedatangan));

        $sheet->setCellValue('C411', applyZero($prev->prokes_covid_teguran_gar_prokes));
        $sheet->setCellValue('D411', applyZero($current->prokes_covid_teguran_gar_prokes));

        $sheet->setCellValue('C412', applyZero($prev->prokes_covid_pembagian_masker));
        $sheet->setCellValue('D412', applyZero($current->prokes_covid_pembagian_masker));

        $sheet->setCellValue('C413', applyZero($prev->prokes_covid_sosialisasi_tentang_prokes));
        $sheet->setCellValue('D413', applyZero($current->prokes_covid_sosialisasi_tentang_prokes));

        $sheet->setCellValue('C414', applyZero($prev->prokes_covid_giat_baksos));
        $sheet->setCellValue('D414', applyZero($current->prokes_covid_giat_baksos));

        $sheet->setCellValue('C417', applyZero($prev->penyekatan_motor));
        $sheet->setCellValue('D417', applyZero($current->penyekatan_motor));

        $sheet->setCellValue('C418', applyZero($prev->penyekatan_mobil_penumpang));
        $sheet->setCellValue('D418', applyZero($current->penyekatan_mobil_penumpang));

        $sheet->setCellValue('C419', applyZero($prev->penyekatan_mobil_bus));
        $sheet->setCellValue('D419', applyZero($current->penyekatan_mobil_bus));

        $sheet->setCellValue('C420', applyZero($prev->penyekatan_mobil_barang));
        $sheet->setCellValue('D420', applyZero($current->penyekatan_mobil_barang));

        $sheet->setCellValue('C421', applyZero($prev->penyekatan_kendaraan_khusus));
        $sheet->setCellValue('D421', applyZero($current->penyekatan_kendaraan_khusus));

        $sheet->setCellValue('C424', applyZero($prev->rapid_test_antigen_positif));
        $sheet->setCellValue('D424', applyZero($current->rapid_test_antigen_positif));

        $sheet->setCellValue('C425', applyZero($prev->rapid_test_antigen_positif));
        $sheet->setCellValue('D425', applyZero($current->rapid_test_antigen_positif));

        $writer = IOFactory::createWriter($spreadsheet, 'Html');
        $message = $writer->save('php://output');

        return $message;
    }
}

if (! function_exists('avenExcel')) {
    function avenExcel(
        $template,
        $prev,
        $current,
        $kesatuan=null,
        $hari_tanggal=null,
        $nama_atasan=null,
        $pangkat=null,
        $jabatan=null,
        $nama_laporan=null,
        $customFileName=null,
        $operationName=null,
        $customCombineName=null,
        $cityName=null,
        $prevYear=null,
        $currentYear=null,
        $dr=null
        )
    {

        $excelPath = public_path('template/excel');

        $excelTemplate = $excelPath."/format_laporan_anev_html.xlsx";

        $spreadsheet = IOFactory::load($excelTemplate);

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A6', 'LAPORAN HARIAN '.$operationName.' '.$currentYear);
        $sheet->setCellValue('A7', 'TANGGAL '.$hari_tanggal);

        $sheet->setCellValue('C11', $prevYear);
        $sheet->setCellValue('D11', $currentYear);

        if(is_null($cityName)) {
            $sheet->setCellValue('D428', indonesiaDate(date("Y-m-d")));
        } else {
            $sheet->setCellValue('D428', ucfirst(strtolower($cityName)).", ".indonesiaDate(date("Y-m-d")));
        }

        $sheet->setCellValue('D429', $jabatan." ".$operationName." - ".$currentYear);

        if(!empty($dr)) {
            $sheet->setCellValue('D433', $nama_atasan);
            $sheet->setCellValue('D434', $pangkat);
        }

        $sheet->setCellValue('C15', applyZero($prev->pelanggaran_lalu_lintas_tilang));
        $sheet->setCellValue('D15', applyZero($current->pelanggaran_lalu_lintas_tilang));

        $sheet->setCellValue('C16', applyZero($prev->pelanggaran_lalu_lintas_teguran));
        $sheet->setCellValue('D16', applyZero($current->pelanggaran_lalu_lintas_teguran));

        $sheet->setCellValue('C20', applyZero($prev->pelanggaran_sepeda_motor_kecepatan));
        $sheet->setCellValue('D20', applyZero($current->pelanggaran_sepeda_motor_kecepatan));

        $sheet->setCellValue('C21', applyZero($prev->pelanggaran_sepeda_motor_helm));
        $sheet->setCellValue('D21', applyZero($current->pelanggaran_sepeda_motor_helm));

        $sheet->setCellValue('C22', applyZero($prev->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));
        $sheet->setCellValue('D22', applyZero($current->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu));

        $sheet->setCellValue('C23', applyZero($prev->pelanggaran_sepeda_motor_marka_menerus_menyalip));
        $sheet->setCellValue('D23', applyZero($current->pelanggaran_sepeda_motor_marka_menerus_menyalip));

        $sheet->setCellValue('C24', applyZero($prev->pelanggaran_sepeda_motor_melawan_arus));
        $sheet->setCellValue('D24', applyZero($current->pelanggaran_sepeda_motor_melawan_arus));

        $sheet->setCellValue('C25', applyZero($prev->pelanggaran_sepeda_motor_melanggar_lampu_lalin));
        $sheet->setCellValue('D25', applyZero($current->pelanggaran_sepeda_motor_melanggar_lampu_lalin));

        $sheet->setCellValue('C26', applyZero($prev->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));
        $sheet->setCellValue('D26', applyZero($current->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar));

        $sheet->setCellValue('C27', applyZero($prev->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D27', applyZero($current->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C28', applyZero($prev->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));
        $sheet->setCellValue('D28', applyZero($current->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam));

        $sheet->setCellValue('C29', applyZero($prev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D29', applyZero($current->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C30', applyZero($prev->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D30', applyZero($current->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C31', applyZero($prev->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D31', applyZero($current->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C32', applyZero($prev->pelanggaran_sepeda_motor_melanggar_marka_berhenti));
        $sheet->setCellValue('D32', applyZero($current->pelanggaran_sepeda_motor_melanggar_marka_berhenti));

        $sheet->setCellValue('C33', applyZero($prev->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D33', applyZero($current->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C34', applyZero($prev->pelanggaran_sepeda_motor_surat_surat));
        $sheet->setCellValue('D34', applyZero($current->pelanggaran_sepeda_motor_surat_surat));

        $sheet->setCellValue('C35', applyZero($prev->pelanggaran_sepeda_motor_kelengkapan_kendaraan));
        $sheet->setCellValue('D35', applyZero($current->pelanggaran_sepeda_motor_kelengkapan_kendaraan));

        $sheet->setCellValue('C36', applyZero($prev->pelanggaran_sepeda_motor_lain_lain));
        $sheet->setCellValue('D36', applyZero($current->pelanggaran_sepeda_motor_lain_lain));

        $sheet->setCellValue('C39', applyZero($prev->pelanggaran_mobil_kecepatan));
        $sheet->setCellValue('D39', applyZero($current->pelanggaran_mobil_kecepatan));

        $sheet->setCellValue('C40', applyZero($prev->pelanggaran_mobil_safety_belt));
        $sheet->setCellValue('D40', applyZero($current->pelanggaran_mobil_safety_belt));

        $sheet->setCellValue('C41', applyZero($prev->pelanggaran_mobil_muatan_overload));
        $sheet->setCellValue('D41', applyZero($current->pelanggaran_mobil_muatan_overload));

        $sheet->setCellValue('C42', applyZero($prev->pelanggaran_mobil_marka_menerus_menyalip));
        $sheet->setCellValue('D42', applyZero($current->pelanggaran_mobil_marka_menerus_menyalip));

        $sheet->setCellValue('C43', applyZero($prev->pelanggaran_mobil_melawan_arus));
        $sheet->setCellValue('D43', applyZero($current->pelanggaran_mobil_melawan_arus));

        $sheet->setCellValue('C44', applyZero($prev->pelanggaran_mobil_melanggar_lampu_lalin));
        $sheet->setCellValue('D44', applyZero($current->pelanggaran_mobil_melanggar_lampu_lalin));

        $sheet->setCellValue('C45', applyZero($prev->pelanggaran_mobil_mengemudi_tidak_wajar));
        $sheet->setCellValue('D45', applyZero($current->pelanggaran_mobil_mengemudi_tidak_wajar));

        $sheet->setCellValue('C46', applyZero($prev->pelanggaran_mobil_syarat_teknis_layak_jalan));
        $sheet->setCellValue('D46', applyZero($current->pelanggaran_mobil_syarat_teknis_layak_jalan));

        $sheet->setCellValue('C47', applyZero($prev->pelanggaran_mobil_tidak_nyala_lampu_malam));
        $sheet->setCellValue('D47', applyZero($current->pelanggaran_mobil_tidak_nyala_lampu_malam));

        $sheet->setCellValue('C48', applyZero($prev->pelanggaran_mobil_berbelok_tanpa_isyarat));
        $sheet->setCellValue('D48', applyZero($current->pelanggaran_mobil_berbelok_tanpa_isyarat));

        $sheet->setCellValue('C49', applyZero($prev->pelanggaran_mobil_berbalapan_di_jalan_raya));
        $sheet->setCellValue('D49', applyZero($current->pelanggaran_mobil_berbalapan_di_jalan_raya));

        $sheet->setCellValue('C50', applyZero($prev->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));
        $sheet->setCellValue('D50', applyZero($current->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir));

        $sheet->setCellValue('C51', applyZero($prev->pelanggaran_mobil_melanggar_marka_berhenti));
        $sheet->setCellValue('D51', applyZero($current->pelanggaran_mobil_melanggar_marka_berhenti));

        $sheet->setCellValue('C52', applyZero($prev->pelanggaran_mobil_tidak_patuh_perintah_petugas));
        $sheet->setCellValue('D52', applyZero($current->pelanggaran_mobil_tidak_patuh_perintah_petugas));

        $sheet->setCellValue('C53', applyZero($prev->pelanggaran_mobil_surat_surat));
        $sheet->setCellValue('D53', applyZero($current->pelanggaran_mobil_surat_surat));

        $sheet->setCellValue('C54', applyZero($prev->pelanggaran_mobil_kelengkapan_kendaraan));
        $sheet->setCellValue('D54', applyZero($current->pelanggaran_mobil_kelengkapan_kendaraan));

        $sheet->setCellValue('C55', applyZero($prev->pelanggaran_mobil_lain_lain));
        $sheet->setCellValue('D55', applyZero($current->pelanggaran_mobil_lain_lain));

        $sheet->setCellValue('C58', applyZero($prev->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));
        $sheet->setCellValue('D58', applyZero($current->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat));

        $sheet->setCellValue('C61', applyZero($prev->barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D61', applyZero($current->barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C62', applyZero($prev->barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D62', applyZero($current->barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C63', applyZero($prev->barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D63', applyZero($current->barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C66', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));
        $sheet->setCellValue('D66', applyZero($current->kendaraan_yang_terlibat_pelanggaran_sepeda_motor));

        $sheet->setCellValue('C67', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));
        $sheet->setCellValue('D67', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang));

        $sheet->setCellValue('C68', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_bus));
        $sheet->setCellValue('D68', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_bus));

        $sheet->setCellValue('C69', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_mobil_barang));
        $sheet->setCellValue('D69', applyZero($current->kendaraan_yang_terlibat_pelanggaran_mobil_barang));

        $sheet->setCellValue('C70', applyZero($prev->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));
        $sheet->setCellValue('D70', applyZero($current->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus));

        $sheet->setCellValue('C73', applyZero($prev->profesi_pelaku_pelanggaran_pns));
        $sheet->setCellValue('D73', applyZero($current->profesi_pelaku_pelanggaran_pns));

        $sheet->setCellValue('C74', applyZero($prev->profesi_pelaku_pelanggaran_karyawan_swasta));
        $sheet->setCellValue('D74', applyZero($current->profesi_pelaku_pelanggaran_karyawan_swasta));

        $sheet->setCellValue('C75', applyZero($prev->profesi_pelaku_pelanggaran_pelajar_mahasiswa));
        $sheet->setCellValue('D75', applyZero($current->profesi_pelaku_pelanggaran_pelajar_mahasiswa));

        $sheet->setCellValue('C76', applyZero($prev->profesi_pelaku_pelanggaran_pengemudi_supir));
        $sheet->setCellValue('D76', applyZero($current->profesi_pelaku_pelanggaran_pengemudi_supir));

        $sheet->setCellValue('C77', applyZero($prev->profesi_pelaku_pelanggaran_tni));
        $sheet->setCellValue('D77', applyZero($current->profesi_pelaku_pelanggaran_tni));

        $sheet->setCellValue('C78', applyZero($prev->profesi_pelaku_pelanggaran_polri));
        $sheet->setCellValue('D78', applyZero($current->profesi_pelaku_pelanggaran_polri));

        $sheet->setCellValue('C79', applyZero($prev->profesi_pelaku_pelanggaran_lain_lain));
        $sheet->setCellValue('D79', applyZero($current->profesi_pelaku_pelanggaran_lain_lain));

        $sheet->setCellValue('C82', applyZero($prev->usia_pelaku_pelanggaran_kurang_dari_15_tahun));
        $sheet->setCellValue('D82', applyZero($current->usia_pelaku_pelanggaran_kurang_dari_15_tahun));

        $sheet->setCellValue('C83', applyZero($prev->usia_pelaku_pelanggaran_16_20_tahun));
        $sheet->setCellValue('D83', applyZero($current->usia_pelaku_pelanggaran_16_20_tahun));

        $sheet->setCellValue('C84', applyZero($prev->usia_pelaku_pelanggaran_21_25_tahun));
        $sheet->setCellValue('D84', applyZero($current->usia_pelaku_pelanggaran_21_25_tahun));

        $sheet->setCellValue('C85', applyZero($prev->usia_pelaku_pelanggaran_26_30_tahun));
        $sheet->setCellValue('D85', applyZero($current->usia_pelaku_pelanggaran_26_30_tahun));

        $sheet->setCellValue('C86', applyZero($prev->usia_pelaku_pelanggaran_31_35_tahun));
        $sheet->setCellValue('D86', applyZero($current->usia_pelaku_pelanggaran_31_35_tahun));

        $sheet->setCellValue('C87', applyZero($prev->usia_pelaku_pelanggaran_36_40_tahun));
        $sheet->setCellValue('D87', applyZero($current->usia_pelaku_pelanggaran_36_40_tahun));

        $sheet->setCellValue('C88', applyZero($prev->usia_pelaku_pelanggaran_41_45_tahun));
        $sheet->setCellValue('D88', applyZero($current->usia_pelaku_pelanggaran_41_45_tahun));

        $sheet->setCellValue('C89', applyZero($prev->usia_pelaku_pelanggaran_46_50_tahun));
        $sheet->setCellValue('D89', applyZero($current->usia_pelaku_pelanggaran_46_50_tahun));

        $sheet->setCellValue('C90', applyZero($prev->usia_pelaku_pelanggaran_51_55_tahun));
        $sheet->setCellValue('D90', applyZero($current->usia_pelaku_pelanggaran_51_55_tahun));

        $sheet->setCellValue('C91', applyZero($prev->usia_pelaku_pelanggaran_56_60_tahun));
        $sheet->setCellValue('D91', applyZero($current->usia_pelaku_pelanggaran_56_60_tahun));

        $sheet->setCellValue('C92', applyZero($prev->usia_pelaku_pelanggaran_diatas_60_tahun));
        $sheet->setCellValue('D92', applyZero($current->usia_pelaku_pelanggaran_diatas_60_tahun));

        $sheet->setCellValue('C95', applyZero($prev->sim_pelaku_pelanggaran_sim_a));
        $sheet->setCellValue('D95', applyZero($current->sim_pelaku_pelanggaran_sim_a));

        $sheet->setCellValue('C96', applyZero($prev->sim_pelaku_pelanggaran_sim_a_umum));
        $sheet->setCellValue('D96', applyZero($current->sim_pelaku_pelanggaran_sim_a_umum));

        $sheet->setCellValue('C97', applyZero($prev->sim_pelaku_pelanggaran_sim_b1));
        $sheet->setCellValue('D97', applyZero($current->sim_pelaku_pelanggaran_sim_b1));

        $sheet->setCellValue('C98', applyZero($prev->sim_pelaku_pelanggaran_sim_b1_umum));
        $sheet->setCellValue('D98', applyZero($current->sim_pelaku_pelanggaran_sim_b1_umum));

        $sheet->setCellValue('C99', applyZero($prev->sim_pelaku_pelanggaran_sim_b2));
        $sheet->setCellValue('D99', applyZero($current->sim_pelaku_pelanggaran_sim_b2));

        $sheet->setCellValue('C100', applyZero($prev->sim_pelaku_pelanggaran_sim_b2_umum));
        $sheet->setCellValue('D100', applyZero($current->sim_pelaku_pelanggaran_sim_b2_umum));

        $sheet->setCellValue('C101', applyZero($prev->sim_pelaku_pelanggaran_sim_c));
        $sheet->setCellValue('D101', applyZero($current->sim_pelaku_pelanggaran_sim_c));

        $sheet->setCellValue('C102', applyZero($prev->sim_pelaku_pelanggaran_sim_d));
        $sheet->setCellValue('D102', applyZero($current->sim_pelaku_pelanggaran_sim_d));

        $sheet->setCellValue('C103', applyZero($prev->sim_pelaku_pelanggaran_sim_internasional));
        $sheet->setCellValue('D103', applyZero($current->sim_pelaku_pelanggaran_sim_internasional));

        $sheet->setCellValue('C104', applyZero($prev->sim_pelaku_pelanggaran_tanpa_sim));
        $sheet->setCellValue('D104', applyZero($current->sim_pelaku_pelanggaran_tanpa_sim));

        $sheet->setCellValue('C108', applyZero($prev->lokasi_pelanggaran_pemukiman));
        $sheet->setCellValue('D108', applyZero($current->lokasi_pelanggaran_pemukiman));

        $sheet->setCellValue('C109', applyZero($prev->lokasi_pelanggaran_perbelanjaan));
        $sheet->setCellValue('D109', applyZero($current->lokasi_pelanggaran_perbelanjaan));

        $sheet->setCellValue('C110', applyZero($prev->lokasi_pelanggaran_perkantoran));
        $sheet->setCellValue('D110', applyZero($current->lokasi_pelanggaran_perkantoran));

        $sheet->setCellValue('C111', applyZero($prev->lokasi_pelanggaran_wisata));
        $sheet->setCellValue('D111', applyZero($current->lokasi_pelanggaran_wisata));

        $sheet->setCellValue('C112', applyZero($prev->lokasi_pelanggaran_industri));
        $sheet->setCellValue('D112', applyZero($current->lokasi_pelanggaran_industri));

        $sheet->setCellValue('C115', applyZero($prev->lokasi_pelanggaran_status_jalan_nasional));
        $sheet->setCellValue('D115', applyZero($current->lokasi_pelanggaran_status_jalan_nasional));

        $sheet->setCellValue('C116', applyZero($prev->lokasi_pelanggaran_status_jalan_propinsi));
        $sheet->setCellValue('D116', applyZero($current->lokasi_pelanggaran_status_jalan_propinsi));

        $sheet->setCellValue('C117', applyZero($prev->lokasi_pelanggaran_status_jalan_kab_kota));
        $sheet->setCellValue('D117', applyZero($current->lokasi_pelanggaran_status_jalan_kab_kota));

        $sheet->setCellValue('C118', applyZero($prev->lokasi_pelanggaran_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D118', applyZero($current->lokasi_pelanggaran_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C121', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_arteri));
        $sheet->setCellValue('D121', applyZero($current->lokasi_pelanggaran_fungsi_jalan_arteri));

        $sheet->setCellValue('C122', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_kolektor));
        $sheet->setCellValue('D122', applyZero($current->lokasi_pelanggaran_fungsi_jalan_kolektor));

        $sheet->setCellValue('C123', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lokal));
        $sheet->setCellValue('D123', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lokal));

        $sheet->setCellValue('C124', applyZero($prev->lokasi_pelanggaran_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D124', applyZero($current->lokasi_pelanggaran_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C128', applyZero($prev->kecelakaan_lalin_jumlah_kejadian));
        $sheet->setCellValue('D128', applyZero($current->kecelakaan_lalin_jumlah_kejadian));

        $sheet->setCellValue('C129', applyZero($prev->kecelakaan_lalin_jumlah_korban_meninggal));
        $sheet->setCellValue('D129', applyZero($current->kecelakaan_lalin_jumlah_korban_meninggal));

        $sheet->setCellValue('C130', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_berat));
        $sheet->setCellValue('D130', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_berat));

        $sheet->setCellValue('C131', applyZero($prev->kecelakaan_lalin_jumlah_korban_luka_ringan));
        $sheet->setCellValue('D131', applyZero($current->kecelakaan_lalin_jumlah_korban_luka_ringan));

        $sheet->setCellValue('C132', applyZero($prev->kecelakaan_lalin_jumlah_kerugian_materiil));
        $sheet->setCellValue('D132', applyZero($current->kecelakaan_lalin_jumlah_kerugian_materiil));

        $sheet->setCellValue('C134', applyZero($prev->kecelakaan_barang_bukti_yg_disita_sim));
        $sheet->setCellValue('D134', applyZero($current->kecelakaan_barang_bukti_yg_disita_sim));

        $sheet->setCellValue('C135', applyZero($prev->kecelakaan_barang_bukti_yg_disita_stnk));
        $sheet->setCellValue('D135', applyZero($current->kecelakaan_barang_bukti_yg_disita_stnk));

        $sheet->setCellValue('C136', applyZero($prev->kecelakaan_barang_bukti_yg_disita_kendaraan));
        $sheet->setCellValue('D136', applyZero($current->kecelakaan_barang_bukti_yg_disita_kendaraan));

        $sheet->setCellValue('C139', applyZero($prev->profesi_korban_kecelakaan_lalin_pns));
        $sheet->setCellValue('D139', applyZero($current->profesi_korban_kecelakaan_lalin_pns));

        $sheet->setCellValue('C140', applyZero($prev->profesi_korban_kecelakaan_lalin_karwayan_swasta));
        $sheet->setCellValue('D140', applyZero($current->profesi_korban_kecelakaan_lalin_karwayan_swasta));

        $sheet->setCellValue('C141', applyZero($prev->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));
        $sheet->setCellValue('D141', applyZero($current->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa));

        $sheet->setCellValue('C142', applyZero($prev->profesi_korban_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D142', applyZero($current->profesi_korban_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C143', applyZero($prev->profesi_korban_kecelakaan_lalin_tni));
        $sheet->setCellValue('D143', applyZero($current->profesi_korban_kecelakaan_lalin_tni));

        $sheet->setCellValue('C144', applyZero($prev->profesi_korban_kecelakaan_lalin_polri));
        $sheet->setCellValue('D144', applyZero($current->profesi_korban_kecelakaan_lalin_polri));

        $sheet->setCellValue('C145', applyZero($prev->profesi_korban_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D145', applyZero($current->profesi_korban_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C148', applyZero($prev->usia_korban_kecelakaan_kurang_15));
        $sheet->setCellValue('D148', applyZero($current->usia_korban_kecelakaan_kurang_15));

        $sheet->setCellValue('C149', applyZero($prev->usia_korban_kecelakaan_16_20));
        $sheet->setCellValue('D149', applyZero($current->usia_korban_kecelakaan_16_20));

        $sheet->setCellValue('C150', applyZero($prev->usia_korban_kecelakaan_21_25));
        $sheet->setCellValue('D150', applyZero($current->usia_korban_kecelakaan_21_25));

        $sheet->setCellValue('C151', applyZero($prev->usia_korban_kecelakaan_26_30));
        $sheet->setCellValue('D151', applyZero($current->usia_korban_kecelakaan_26_30));

        $sheet->setCellValue('C152', applyZero($prev->usia_korban_kecelakaan_31_35));
        $sheet->setCellValue('D152', applyZero($current->usia_korban_kecelakaan_31_35));

        $sheet->setCellValue('C153', applyZero($prev->usia_korban_kecelakaan_36_40));
        $sheet->setCellValue('D153', applyZero($current->usia_korban_kecelakaan_36_40));

        $sheet->setCellValue('C154', applyZero($prev->usia_korban_kecelakaan_41_45));
        $sheet->setCellValue('D154', applyZero($current->usia_korban_kecelakaan_41_45));

        $sheet->setCellValue('C155', applyZero($prev->usia_korban_kecelakaan_45_50));
        $sheet->setCellValue('D155', applyZero($current->usia_korban_kecelakaan_45_50));

        $sheet->setCellValue('C156', applyZero($prev->usia_korban_kecelakaan_51_55));
        $sheet->setCellValue('D156', applyZero($current->usia_korban_kecelakaan_51_55));

        $sheet->setCellValue('C157', applyZero($prev->usia_korban_kecelakaan_56_60));
        $sheet->setCellValue('D157', applyZero($current->usia_korban_kecelakaan_56_60));

        $sheet->setCellValue('C158', applyZero($prev->usia_korban_kecelakaan_diatas_60));
        $sheet->setCellValue('D158', applyZero($current->usia_korban_kecelakaan_diatas_60));

        $sheet->setCellValue('C161', applyZero($prev->sim_korban_kecelakaan_sim_a));
        $sheet->setCellValue('D161', applyZero($current->sim_korban_kecelakaan_sim_a));

        $sheet->setCellValue('C162', applyZero($prev->sim_korban_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D162', applyZero($current->sim_korban_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C163', applyZero($prev->sim_korban_kecelakaan_sim_b1));
        $sheet->setCellValue('D163', applyZero($current->sim_korban_kecelakaan_sim_b1));

        $sheet->setCellValue('C164', applyZero($prev->sim_korban_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D164', applyZero($current->sim_korban_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C165', applyZero($prev->sim_korban_kecelakaan_sim_b2));
        $sheet->setCellValue('D165', applyZero($current->sim_korban_kecelakaan_sim_b2));

        $sheet->setCellValue('C166', applyZero($prev->sim_korban_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D166', applyZero($current->sim_korban_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C167', applyZero($prev->sim_korban_kecelakaan_sim_c));
        $sheet->setCellValue('D167', applyZero($current->sim_korban_kecelakaan_sim_c));

        $sheet->setCellValue('C168', applyZero($prev->sim_korban_kecelakaan_sim_d));
        $sheet->setCellValue('D168', applyZero($current->sim_korban_kecelakaan_sim_d));

        $sheet->setCellValue('C169', applyZero($prev->sim_korban_kecelakaan_sim_internasional));
        $sheet->setCellValue('D169', applyZero($current->sim_korban_kecelakaan_sim_internasional));

        $sheet->setCellValue('C170', applyZero($prev->sim_korban_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D170', applyZero($current->sim_korban_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C173', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));
        $sheet->setCellValue('D173', applyZero($current->kendaraan_yg_terlibat_kecelakaan_sepeda_motor));

        $sheet->setCellValue('C174', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));
        $sheet->setCellValue('D174', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang));

        $sheet->setCellValue('C175', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_bus));
        $sheet->setCellValue('D175', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_bus));

        $sheet->setCellValue('C176', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_mobil_barang));
        $sheet->setCellValue('D176', applyZero($current->kendaraan_yg_terlibat_kecelakaan_mobil_barang));

        $sheet->setCellValue('C177', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));
        $sheet->setCellValue('D177', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus));

        $sheet->setCellValue('C178', applyZero($prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));
        $sheet->setCellValue('D178', applyZero($current->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor));

        $sheet->setCellValue('C181', applyZero($prev->jenis_kecelakaan_tunggal_ooc));
        $sheet->setCellValue('D181', applyZero($current->jenis_kecelakaan_tunggal_ooc));

        $sheet->setCellValue('C182', applyZero($prev->jenis_kecelakaan_depan_depan));
        $sheet->setCellValue('D182', applyZero($current->jenis_kecelakaan_depan_depan));

        $sheet->setCellValue('C183', applyZero($prev->jenis_kecelakaan_depan_belakang));
        $sheet->setCellValue('D183', applyZero($current->jenis_kecelakaan_depan_belakang));

        $sheet->setCellValue('C184', applyZero($prev->jenis_kecelakaan_depan_samping));
        $sheet->setCellValue('D184', applyZero($current->jenis_kecelakaan_depan_samping));

        $sheet->setCellValue('C185', applyZero($prev->jenis_kecelakaan_beruntun));
        $sheet->setCellValue('D185', applyZero($current->jenis_kecelakaan_beruntun));

        $sheet->setCellValue('C186', applyZero($prev->jenis_kecelakaan_pejalan_kaki));
        $sheet->setCellValue('D186', applyZero($current->jenis_kecelakaan_pejalan_kaki));

        $sheet->setCellValue('C187', applyZero($prev->jenis_kecelakaan_tabrak_lari));
        $sheet->setCellValue('D187', applyZero($current->jenis_kecelakaan_tabrak_lari));

        $sheet->setCellValue('C188', applyZero($prev->jenis_kecelakaan_tabrak_hewan));
        $sheet->setCellValue('D188', applyZero($current->jenis_kecelakaan_tabrak_hewan));

        $sheet->setCellValue('C189', applyZero($prev->jenis_kecelakaan_samping_samping));
        $sheet->setCellValue('D189', applyZero($current->jenis_kecelakaan_samping_samping));

        $sheet->setCellValue('C190', applyZero($prev->jenis_kecelakaan_lainnya));
        $sheet->setCellValue('D190', applyZero($current->jenis_kecelakaan_lainnya));

        $sheet->setCellValue('C193', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pns));
        $sheet->setCellValue('D193', applyZero($current->profesi_pelaku_kecelakaan_lalin_pns));

        $sheet->setCellValue('C194', applyZero($prev->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));
        $sheet->setCellValue('D194', applyZero($current->profesi_pelaku_kecelakaan_lalin_karyawan_swasta));

        $sheet->setCellValue('C195', applyZero($prev->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));
        $sheet->setCellValue('D195', applyZero($current->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar));

        $sheet->setCellValue('C196', applyZero($prev->profesi_pelaku_kecelakaan_lalin_pengemudi));
        $sheet->setCellValue('D196', applyZero($current->profesi_pelaku_kecelakaan_lalin_pengemudi));

        $sheet->setCellValue('C197', applyZero($prev->profesi_pelaku_kecelakaan_lalin_tni));
        $sheet->setCellValue('D197', applyZero($current->profesi_pelaku_kecelakaan_lalin_tni));

        $sheet->setCellValue('C198', applyZero($prev->profesi_pelaku_kecelakaan_lalin_polri));
        $sheet->setCellValue('D198', applyZero($current->profesi_pelaku_kecelakaan_lalin_polri));

        $sheet->setCellValue('C199', applyZero($prev->profesi_pelaku_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D199', applyZero($current->profesi_pelaku_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C202', applyZero($prev->usia_pelaku_kecelakaan_kurang_dari_15_tahun));
        $sheet->setCellValue('D202', applyZero($current->usia_pelaku_kecelakaan_kurang_dari_15_tahun));

        $sheet->setCellValue('C203', applyZero($prev->usia_pelaku_kecelakaan_16_20_tahun));
        $sheet->setCellValue('D203', applyZero($current->usia_pelaku_kecelakaan_16_20_tahun));

        $sheet->setCellValue('C204', applyZero($prev->usia_pelaku_kecelakaan_21_25_tahun));
        $sheet->setCellValue('D204', applyZero($current->usia_pelaku_kecelakaan_21_25_tahun));

        $sheet->setCellValue('C205', applyZero($prev->usia_pelaku_kecelakaan_26_30_tahun));
        $sheet->setCellValue('D205', applyZero($current->usia_pelaku_kecelakaan_26_30_tahun));

        $sheet->setCellValue('C206', applyZero($prev->usia_pelaku_kecelakaan_31_35_tahun));
        $sheet->setCellValue('D206', applyZero($current->usia_pelaku_kecelakaan_31_35_tahun));

        $sheet->setCellValue('C207', applyZero($prev->usia_pelaku_kecelakaan_36_40_tahun));
        $sheet->setCellValue('D207', applyZero($current->usia_pelaku_kecelakaan_36_40_tahun));

        $sheet->setCellValue('C208', applyZero($prev->usia_pelaku_kecelakaan_41_45_tahun));
        $sheet->setCellValue('D208', applyZero($current->usia_pelaku_kecelakaan_41_45_tahun));

        $sheet->setCellValue('C209', applyZero($prev->usia_pelaku_kecelakaan_46_50_tahun));
        $sheet->setCellValue('D209', applyZero($current->usia_pelaku_kecelakaan_46_50_tahun));

        $sheet->setCellValue('C210', applyZero($prev->usia_pelaku_kecelakaan_51_55_tahun));
        $sheet->setCellValue('D210', applyZero($current->usia_pelaku_kecelakaan_51_55_tahun));

        $sheet->setCellValue('C211', applyZero($prev->usia_pelaku_kecelakaan_56_60_tahun));
        $sheet->setCellValue('D211', applyZero($current->usia_pelaku_kecelakaan_56_60_tahun));

        $sheet->setCellValue('C212', applyZero($prev->usia_pelaku_kecelakaan_diatas_60_tahun));
        $sheet->setCellValue('D212', applyZero($current->usia_pelaku_kecelakaan_diatas_60_tahun));

        $sheet->setCellValue('C215', applyZero($prev->sim_pelaku_kecelakaan_sim_a));
        $sheet->setCellValue('D215', applyZero($current->sim_pelaku_kecelakaan_sim_a));

        $sheet->setCellValue('C216', applyZero($prev->sim_pelaku_kecelakaan_sim_a_umum));
        $sheet->setCellValue('D216', applyZero($current->sim_pelaku_kecelakaan_sim_a_umum));

        $sheet->setCellValue('C217', applyZero($prev->sim_pelaku_kecelakaan_sim_b1));
        $sheet->setCellValue('D217', applyZero($current->sim_pelaku_kecelakaan_sim_b1));

        $sheet->setCellValue('C218', applyZero($prev->sim_pelaku_kecelakaan_sim_b1_umum));
        $sheet->setCellValue('D218', applyZero($current->sim_pelaku_kecelakaan_sim_b1_umum));

        $sheet->setCellValue('C219', applyZero($prev->sim_pelaku_kecelakaan_sim_b2));
        $sheet->setCellValue('D219', applyZero($current->sim_pelaku_kecelakaan_sim_b2));

        $sheet->setCellValue('C220', applyZero($prev->sim_pelaku_kecelakaan_sim_b2_umum));
        $sheet->setCellValue('D220', applyZero($current->sim_pelaku_kecelakaan_sim_b2_umum));

        $sheet->setCellValue('C221', applyZero($prev->sim_pelaku_kecelakaan_sim_c));
        $sheet->setCellValue('D221', applyZero($current->sim_pelaku_kecelakaan_sim_c));

        $sheet->setCellValue('C222', applyZero($prev->sim_pelaku_kecelakaan_sim_d));
        $sheet->setCellValue('D222', applyZero($current->sim_pelaku_kecelakaan_sim_d));

        $sheet->setCellValue('C223', applyZero($prev->sim_pelaku_kecelakaan_sim_internasional));
        $sheet->setCellValue('D223', applyZero($current->sim_pelaku_kecelakaan_sim_internasional));

        $sheet->setCellValue('C224', applyZero($prev->sim_pelaku_kecelakaan_tanpa_sim));
        $sheet->setCellValue('D224', applyZero($current->sim_pelaku_kecelakaan_tanpa_sim));

        $sheet->setCellValue('C228', applyZero($prev->lokasi_kecelakaan_lalin_pemukiman));
        $sheet->setCellValue('D228', applyZero($current->lokasi_kecelakaan_lalin_pemukiman));

        $sheet->setCellValue('C229', applyZero($prev->lokasi_kecelakaan_lalin_perbelanjaan));
        $sheet->setCellValue('D229', applyZero($current->lokasi_kecelakaan_lalin_perbelanjaan));

        $sheet->setCellValue('C230', applyZero($prev->lokasi_kecelakaan_lalin_perkantoran));
        $sheet->setCellValue('D230', applyZero($current->lokasi_kecelakaan_lalin_perkantoran));

        $sheet->setCellValue('C231', applyZero($prev->lokasi_kecelakaan_lalin_wisata));
        $sheet->setCellValue('D231', applyZero($current->lokasi_kecelakaan_lalin_wisata));

        $sheet->setCellValue('C232', applyZero($prev->lokasi_kecelakaan_lalin_industri));
        $sheet->setCellValue('D232', applyZero($current->lokasi_kecelakaan_lalin_industri));

        $sheet->setCellValue('C233', applyZero($prev->lokasi_kecelakaan_lalin_lain_lain));
        $sheet->setCellValue('D233', applyZero($current->lokasi_kecelakaan_lalin_lain_lain));

        $sheet->setCellValue('C236', applyZero($prev->lokasi_kecelakaan_status_jalan_nasional));
        $sheet->setCellValue('D236', applyZero($current->lokasi_kecelakaan_status_jalan_nasional));

        $sheet->setCellValue('C237', applyZero($prev->lokasi_kecelakaan_status_jalan_propinsi));
        $sheet->setCellValue('D237', applyZero($current->lokasi_kecelakaan_status_jalan_propinsi));

        $sheet->setCellValue('C238', applyZero($prev->lokasi_kecelakaan_status_jalan_kab_kota));
        $sheet->setCellValue('D238', applyZero($current->lokasi_kecelakaan_status_jalan_kab_kota));

        $sheet->setCellValue('C239', applyZero($prev->lokasi_kecelakaan_status_jalan_desa_lingkungan));
        $sheet->setCellValue('D239', applyZero($current->lokasi_kecelakaan_status_jalan_desa_lingkungan));

        $sheet->setCellValue('C242', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_arteri));
        $sheet->setCellValue('D242', applyZero($current->lokasi_kecelakaan_fungsi_jalan_arteri));

        $sheet->setCellValue('C243', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_kolektor));
        $sheet->setCellValue('D243', applyZero($current->lokasi_kecelakaan_fungsi_jalan_kolektor));

        $sheet->setCellValue('C244', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lokal));
        $sheet->setCellValue('D244', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lokal));

        $sheet->setCellValue('C245', applyZero($prev->lokasi_kecelakaan_fungsi_jalan_lingkungan));
        $sheet->setCellValue('D245', applyZero($current->lokasi_kecelakaan_fungsi_jalan_lingkungan));

        $sheet->setCellValue('C248', applyZero($prev->faktor_penyebab_kecelakaan_manusia));
        $sheet->setCellValue('D248', applyZero($current->faktor_penyebab_kecelakaan_manusia));

        $sheet->setCellValue('C249', applyZero($prev->faktor_penyebab_kecelakaan_ngantuk_lelah));
        $sheet->setCellValue('D249', applyZero($current->faktor_penyebab_kecelakaan_ngantuk_lelah));

        $sheet->setCellValue('C250', applyZero($prev->faktor_penyebab_kecelakaan_mabuk_obat));
        $sheet->setCellValue('D250', applyZero($current->faktor_penyebab_kecelakaan_mabuk_obat));

        $sheet->setCellValue('C251', applyZero($prev->faktor_penyebab_kecelakaan_sakit));
        $sheet->setCellValue('D251', applyZero($current->faktor_penyebab_kecelakaan_sakit));

        $sheet->setCellValue('C252', applyZero($prev->faktor_penyebab_kecelakaan_handphone_elektronik));
        $sheet->setCellValue('D252', applyZero($current->faktor_penyebab_kecelakaan_handphone_elektronik));

        $sheet->setCellValue('C253', applyZero($prev->faktor_penyebab_kecelakaan_menerobos_lampu_merah));
        $sheet->setCellValue('D253', applyZero($current->faktor_penyebab_kecelakaan_menerobos_lampu_merah));

        $sheet->setCellValue('C254', applyZero($prev->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));
        $sheet->setCellValue('D254', applyZero($current->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan));

        $sheet->setCellValue('C255', applyZero($prev->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));
        $sheet->setCellValue('D255', applyZero($current->faktor_penyebab_kecelakaan_tidak_menjaga_jarak));

        $sheet->setCellValue('C256', applyZero($prev->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));
        $sheet->setCellValue('D256', applyZero($current->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur));

        $sheet->setCellValue('C257', applyZero($prev->faktor_penyebab_kecelakaan_berpindah_jalur));
        $sheet->setCellValue('D257', applyZero($current->faktor_penyebab_kecelakaan_berpindah_jalur));

        $sheet->setCellValue('C258', applyZero($prev->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));
        $sheet->setCellValue('D258', applyZero($current->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat));

        $sheet->setCellValue('C259', applyZero($prev->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));
        $sheet->setCellValue('D259', applyZero($current->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki));

        $sheet->setCellValue('C260', applyZero($prev->faktor_penyebab_kecelakaan_lainnya));
        $sheet->setCellValue('D260', applyZero($current->faktor_penyebab_kecelakaan_lainnya));

        $sheet->setCellValue('C261', applyZero($prev->faktor_penyebab_kecelakaan_alam));
        $sheet->setCellValue('D261', applyZero($current->faktor_penyebab_kecelakaan_alam));

        $sheet->setCellValue('C262', applyZero($prev->faktor_penyebab_kecelakaan_kelaikan_kendaraan));
        $sheet->setCellValue('D262', applyZero($current->faktor_penyebab_kecelakaan_kelaikan_kendaraan));

        $sheet->setCellValue('C263', applyZero($prev->faktor_penyebab_kecelakaan_kondisi_jalan));
        $sheet->setCellValue('D263', applyZero($current->faktor_penyebab_kecelakaan_kondisi_jalan));

        $sheet->setCellValue('C264', applyZero($prev->faktor_penyebab_kecelakaan_prasarana_jalan));
        $sheet->setCellValue('D264', applyZero($current->faktor_penyebab_kecelakaan_prasarana_jalan));

        $sheet->setCellValue('C265', applyZero($prev->faktor_penyebab_kecelakaan_rambu));
        $sheet->setCellValue('D265', applyZero($current->faktor_penyebab_kecelakaan_rambu));

        $sheet->setCellValue('C266', applyZero($prev->faktor_penyebab_kecelakaan_marka));
        $sheet->setCellValue('D266', applyZero($current->faktor_penyebab_kecelakaan_marka));

        $sheet->setCellValue('C267', applyZero($prev->faktor_penyebab_kecelakaan_apil));
        $sheet->setCellValue('D267', applyZero($current->faktor_penyebab_kecelakaan_apil));

        $sheet->setCellValue('C268', applyZero($prev->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));
        $sheet->setCellValue('D268', applyZero($current->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu));

        $sheet->setCellValue('C271', applyZero($prev->waktu_kejadian_kecelakaan_00_03));
        $sheet->setCellValue('D271', applyZero($current->waktu_kejadian_kecelakaan_00_03));

        $sheet->setCellValue('C272', applyZero($prev->waktu_kejadian_kecelakaan_03_06));
        $sheet->setCellValue('D272', applyZero($current->waktu_kejadian_kecelakaan_03_06));

        $sheet->setCellValue('C273', applyZero($prev->waktu_kejadian_kecelakaan_06_09));
        $sheet->setCellValue('D273', applyZero($current->waktu_kejadian_kecelakaan_06_09));

        $sheet->setCellValue('C274', applyZero($prev->waktu_kejadian_kecelakaan_09_12));
        $sheet->setCellValue('D274', applyZero($current->waktu_kejadian_kecelakaan_09_12));

        $sheet->setCellValue('C275', applyZero($prev->waktu_kejadian_kecelakaan_12_15));
        $sheet->setCellValue('D275', applyZero($current->waktu_kejadian_kecelakaan_12_15));

        $sheet->setCellValue('C276', applyZero($prev->waktu_kejadian_kecelakaan_15_18));
        $sheet->setCellValue('D276', applyZero($current->waktu_kejadian_kecelakaan_15_18));

        $sheet->setCellValue('C277', applyZero($prev->waktu_kejadian_kecelakaan_18_21));
        $sheet->setCellValue('D277', applyZero($current->waktu_kejadian_kecelakaan_18_21));

        $sheet->setCellValue('C278', applyZero($prev->waktu_kejadian_kecelakaan_21_24));
        $sheet->setCellValue('D278', applyZero($current->waktu_kejadian_kecelakaan_21_24));

        $sheet->setCellValue('C281', applyZero($prev->kecelakaan_lalin_menonjol_jumlah_kejadian));
        $sheet->setCellValue('D281', applyZero($current->kecelakaan_lalin_menonjol_jumlah_kejadian));

        $sheet->setCellValue('C282', applyZero($prev->kecelakaan_lalin_menonjol_korban_meninggal));
        $sheet->setCellValue('D282', applyZero($current->kecelakaan_lalin_menonjol_korban_meninggal));

        $sheet->setCellValue('C283', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_berat));
        $sheet->setCellValue('D283', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_berat));

        $sheet->setCellValue('C284', applyZero($prev->kecelakaan_lalin_menonjol_korban_luka_ringan));
        $sheet->setCellValue('D284', applyZero($current->kecelakaan_lalin_menonjol_korban_luka_ringan));

        $sheet->setCellValue('C285', applyZero($prev->kecelakaan_lalin_menonjol_materiil));
        $sheet->setCellValue('D285', applyZero($current->kecelakaan_lalin_menonjol_materiil));

        $sheet->setCellValue('C287', applyZero($prev->kecelakaan_lalin_tunggal_jumlah_kejadian));
        $sheet->setCellValue('D287', applyZero($current->kecelakaan_lalin_tunggal_jumlah_kejadian));

        $sheet->setCellValue('C288', applyZero($prev->kecelakaan_lalin_tunggal_korban_meninggal));
        $sheet->setCellValue('D288', applyZero($current->kecelakaan_lalin_tunggal_korban_meninggal));

        $sheet->setCellValue('C289', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_berat));
        $sheet->setCellValue('D289', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_berat));

        $sheet->setCellValue('C290', applyZero($prev->kecelakaan_lalin_tunggal_korban_luka_ringan));
        $sheet->setCellValue('D290', applyZero($current->kecelakaan_lalin_tunggal_korban_luka_ringan));

        $sheet->setCellValue('C291', applyZero($prev->kecelakaan_lalin_tunggal_materiil));
        $sheet->setCellValue('D291', applyZero($current->kecelakaan_lalin_tunggal_materiil));

        $sheet->setCellValue('C293', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));
        $sheet->setCellValue('D293', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian));

        $sheet->setCellValue('C294', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));
        $sheet->setCellValue('D294', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal));

        $sheet->setCellValue('C295', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));
        $sheet->setCellValue('D295', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat));

        $sheet->setCellValue('C296', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));
        $sheet->setCellValue('D296', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan));

        $sheet->setCellValue('C297', applyZero($prev->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));
        $sheet->setCellValue('D297', applyZero($current->kecelakaan_lalin_tabrak_pejalan_kaki_materiil));

        $sheet->setCellValue('C299', applyZero($prev->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));
        $sheet->setCellValue('D299', applyZero($current->kecelakaan_lalin_tabrak_lari_jumlah_kejadian));

        $sheet->setCellValue('C300', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_meninggal));
        $sheet->setCellValue('D300', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_meninggal));

        $sheet->setCellValue('C301', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_berat));
        $sheet->setCellValue('D301', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_berat));

        $sheet->setCellValue('C302', applyZero($prev->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));
        $sheet->setCellValue('D302', applyZero($current->kecelakaan_lalin_tabrak_lari_korban_luka_ringan));

        $sheet->setCellValue('C303', applyZero($prev->kecelakaan_lalin_tabrak_lari_materiil));
        $sheet->setCellValue('D303', applyZero($current->kecelakaan_lalin_tabrak_lari_materiil));

        $sheet->setCellValue('C305', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));
        $sheet->setCellValue('D305', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian));

        $sheet->setCellValue('C306', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));
        $sheet->setCellValue('D306', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal));

        $sheet->setCellValue('C307', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));
        $sheet->setCellValue('D307', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat));

        $sheet->setCellValue('C308', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));
        $sheet->setCellValue('D308', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan));

        $sheet->setCellValue('C309', applyZero($prev->kecelakaan_lalin_tabrak_sepeda_motor_materiil));
        $sheet->setCellValue('D309', applyZero($current->kecelakaan_lalin_tabrak_sepeda_motor_materiil));

        $sheet->setCellValue('C311', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));
        $sheet->setCellValue('D311', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian));

        $sheet->setCellValue('C312', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));
        $sheet->setCellValue('D312', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal));

        $sheet->setCellValue('C313', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));
        $sheet->setCellValue('D313', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat));

        $sheet->setCellValue('C314', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));
        $sheet->setCellValue('D314', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan));

        $sheet->setCellValue('C315', applyZero($prev->kecelakaan_lalin_tabrak_roda_empat_materiil));
        $sheet->setCellValue('D315', applyZero($current->kecelakaan_lalin_tabrak_roda_empat_materiil));

        $sheet->setCellValue('C317', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));
        $sheet->setCellValue('D317', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian));

        $sheet->setCellValue('C318', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));
        $sheet->setCellValue('D318', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal));

        $sheet->setCellValue('C319', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));
        $sheet->setCellValue('D319', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat));

        $sheet->setCellValue('C320', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));
        $sheet->setCellValue('D320', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan));

        $sheet->setCellValue('C321', applyZero($prev->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));
        $sheet->setCellValue('D321', applyZero($current->kecelakaan_lalin_tabrak_tidak_bermotor_materiil));

        $sheet->setCellValue('C323', applyZero($prev->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));
        $sheet->setCellValue('D323', applyZero($current->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian));

        $sheet->setCellValue('C324', applyZero($prev->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));
        $sheet->setCellValue('D324', applyZero($current->kecelakaan_lalin_perlintasan_ka_berpalang_pintu));

        $sheet->setCellValue('C325', applyZero($prev->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));
        $sheet->setCellValue('D325', applyZero($current->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu));

        $sheet->setCellValue('C326', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));
        $sheet->setCellValue('D326', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan));

        $sheet->setCellValue('C327', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));
        $sheet->setCellValue('D327', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_luka_berat));

        $sheet->setCellValue('C328', applyZero($prev->kecelakaan_lalin_perlintasan_ka_korban_meninggal));
        $sheet->setCellValue('D328', applyZero($current->kecelakaan_lalin_perlintasan_ka_korban_meninggal));

        $sheet->setCellValue('C329', applyZero($prev->kecelakaan_lalin_perlintasan_ka_materiil));
        $sheet->setCellValue('D329', applyZero($current->kecelakaan_lalin_perlintasan_ka_materiil));

        $sheet->setCellValue('C331', applyZero($prev->kecelakaan_transportasi_kereta_api));
        $sheet->setCellValue('D331', applyZero($current->kecelakaan_transportasi_kereta_api));

        $sheet->setCellValue('C332', applyZero($prev->kecelakaan_transportasi_laut_perairan));
        $sheet->setCellValue('D332', applyZero($current->kecelakaan_transportasi_laut_perairan));

        $sheet->setCellValue('C333', applyZero($prev->kecelakaan_transportasi_udara));
        $sheet->setCellValue('D333', applyZero($current->kecelakaan_transportasi_udara));

        $sheet->setCellValue('C338', applyZero($prev->penlu_melalui_media_cetak));
        $sheet->setCellValue('D338', applyZero($current->penlu_melalui_media_cetak));

        $sheet->setCellValue('C339', applyZero($prev->penlu_melalui_media_elektronik));
        $sheet->setCellValue('D339', applyZero($current->penlu_melalui_media_elektronik));

        $sheet->setCellValue('C340', applyZero($prev->penlu_melalui_media_sosial));
        $sheet->setCellValue('D340', applyZero($current->penlu_melalui_media_sosial));

        $sheet->setCellValue('C341', applyZero($prev->penlu_melalui_tempat_keramaian));
        $sheet->setCellValue('D341', applyZero($current->penlu_melalui_tempat_keramaian));

        $sheet->setCellValue('C342', applyZero($prev->penlu_melalui_tempat_istirahat));
        $sheet->setCellValue('D342', applyZero($current->penlu_melalui_tempat_istirahat));

        $sheet->setCellValue('C343', applyZero($prev->penlu_melalui_daerah_rawan_laka_dan_langgar));
        $sheet->setCellValue('D343', applyZero($current->penlu_melalui_daerah_rawan_laka_dan_langgar));

        $sheet->setCellValue('C346', applyZero($prev->penyebaran_pemasangan_spanduk));
        $sheet->setCellValue('D346', applyZero($current->penyebaran_pemasangan_spanduk));

        $sheet->setCellValue('C347', applyZero($prev->penyebaran_pemasangan_leaflet));
        $sheet->setCellValue('D347', applyZero($current->penyebaran_pemasangan_leaflet));

        $sheet->setCellValue('C348', applyZero($prev->penyebaran_pemasangan_sticker));
        $sheet->setCellValue('D348', applyZero($current->penyebaran_pemasangan_sticker));

        $sheet->setCellValue('C349', applyZero($prev->penyebaran_pemasangan_bilboard));
        $sheet->setCellValue('D349', applyZero($current->penyebaran_pemasangan_bilboard));

        $sheet->setCellValue('C352', applyZero($prev->polisi_sahabat_anak));
        $sheet->setCellValue('D352', applyZero($current->polisi_sahabat_anak));

        $sheet->setCellValue('C353', applyZero($prev->cara_aman_sekolah));
        $sheet->setCellValue('D353', applyZero($current->cara_aman_sekolah));

        $sheet->setCellValue('C354', applyZero($prev->patroli_keamanan_sekolah));
        $sheet->setCellValue('D354', applyZero($current->patroli_keamanan_sekolah));

        $sheet->setCellValue('C355', applyZero($prev->pramuka_bhayangkara_krida_lalu_lintas));
        $sheet->setCellValue('D355', applyZero($current->pramuka_bhayangkara_krida_lalu_lintas));

        $sheet->setCellValue('C358', applyZero($prev->police_goes_to_campus));
        $sheet->setCellValue('D358', applyZero($current->police_goes_to_campus));

        $sheet->setCellValue('C359', applyZero($prev->safety_riding_driving));
        $sheet->setCellValue('D359', applyZero($current->safety_riding_driving));

        $sheet->setCellValue('C360', applyZero($prev->forum_lalu_lintas_angkutan_umum));
        $sheet->setCellValue('D360', applyZero($current->forum_lalu_lintas_angkutan_umum));

        $sheet->setCellValue('C361', applyZero($prev->kampanye_keselamatan));
        $sheet->setCellValue('D361', applyZero($current->kampanye_keselamatan));

        $sheet->setCellValue('C362', applyZero($prev->sekolah_mengemudi));
        $sheet->setCellValue('D362', applyZero($current->sekolah_mengemudi));

        $sheet->setCellValue('C363', applyZero($prev->taman_lalu_lintas));
        $sheet->setCellValue('D363', applyZero($current->taman_lalu_lintas));

        $sheet->setCellValue('C364', applyZero($prev->global_road_safety_partnership_action));
        $sheet->setCellValue('D364', applyZero($current->global_road_safety_partnership_action));

        $sheet->setCellValue('C368', applyZero($prev->giat_lantas_pengaturan));
        $sheet->setCellValue('D368', applyZero($current->giat_lantas_pengaturan));

        $sheet->setCellValue('C369', applyZero($prev->giat_lantas_penjagaan));
        $sheet->setCellValue('D369', applyZero($current->giat_lantas_penjagaan));

        $sheet->setCellValue('C370', applyZero($prev->giat_lantas_pengawalan));
        $sheet->setCellValue('D370', applyZero($current->giat_lantas_pengawalan));

        $sheet->setCellValue('C371', applyZero($prev->giat_lantas_patroli));
        $sheet->setCellValue('D371', applyZero($current->giat_lantas_patroli));

        $sheet->setCellValue('C376', applyZero($prev->arus_mudik_jumlah_bus_keberangkatan));
        $sheet->setCellValue('D376', applyZero($current->arus_mudik_jumlah_bus_keberangkatan));

        $sheet->setCellValue('C377', applyZero($prev->arus_mudik_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D377', applyZero($current->arus_mudik_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C378', applyZero($prev->arus_mudik_jumlah_bus_kedatangan));
        $sheet->setCellValue('D378', applyZero($current->arus_mudik_jumlah_bus_kedatangan));

        $sheet->setCellValue('C379', applyZero($prev->arus_mudik_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D379', applyZero($current->arus_mudik_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C380', applyZero($prev->arus_mudik_total_terminal));
        $sheet->setCellValue('D380', applyZero($current->arus_mudik_total_terminal));

        $sheet->setCellValue('C381', applyZero($prev->arus_mudik_total_bus_keberangkatan));
        $sheet->setCellValue('D381', applyZero($current->arus_mudik_total_bus_keberangkatan));

        $sheet->setCellValue('C382', applyZero($prev->arus_mudik_penumpang_keberangkatan));
        $sheet->setCellValue('D382', applyZero($current->arus_mudik_penumpang_keberangkatan));

        $sheet->setCellValue('C383', applyZero($prev->arus_mudik_total_bus_kedatangan));
        $sheet->setCellValue('D383', applyZero($current->arus_mudik_total_bus_kedatangan));

        $sheet->setCellValue('C384', applyZero($prev->arus_mudik_penumpang_kedatangan));
        $sheet->setCellValue('D384', applyZero($current->arus_mudik_penumpang_kedatangan));

        $sheet->setCellValue('C386', applyZero($prev->arus_mudik_kereta_api_total_stasiun));
        $sheet->setCellValue('D386', applyZero($current->arus_mudik_kereta_api_total_stasiun));

        $sheet->setCellValue('C387', applyZero($prev->arus_mudik_kereta_api_total_penumpang_keberangkatan));
        $sheet->setCellValue('D387', applyZero($current->arus_mudik_kereta_api_total_penumpang_keberangkatan));

        $sheet->setCellValue('C388', applyZero($prev->arus_mudik_kereta_api_total_penumpang_kedatangan));
        $sheet->setCellValue('D388', applyZero($current->arus_mudik_kereta_api_total_penumpang_kedatangan));

        $sheet->setCellValue('C390', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));
        $sheet->setCellValue('D390', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan));

        $sheet->setCellValue('C391', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));
        $sheet->setCellValue('D391', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4));

        $sheet->setCellValue('C392', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));
        $sheet->setCellValue('D392', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2));

        $sheet->setCellValue('C393', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D393', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C394', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));
        $sheet->setCellValue('D394', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan));

        $sheet->setCellValue('C395', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));
        $sheet->setCellValue('D395', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4));

        $sheet->setCellValue('C396', applyZero($prev->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));
        $sheet->setCellValue('D396', applyZero($current->arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2));

        $sheet->setCellValue('C397', applyZero($prev->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D397', applyZero($current->arus_mudik_pelabuhan_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C398', applyZero($prev->arus_mudik_total_pelabuhan));
        $sheet->setCellValue('D398', applyZero($current->arus_mudik_total_pelabuhan));

        $sheet->setCellValue('C399', applyZero($prev->arus_mudik_pelabuhan_kendaraan_keberangkatan));
        $sheet->setCellValue('D399', applyZero($current->arus_mudik_pelabuhan_kendaraan_keberangkatan));

        $sheet->setCellValue('C400', applyZero($prev->arus_mudik_pelabuhan_kendaraan_kedatangan));
        $sheet->setCellValue('D400', applyZero($current->arus_mudik_pelabuhan_kendaraan_kedatangan));

        $sheet->setCellValue('C401', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_keberangkatan));
        $sheet->setCellValue('D401', applyZero($current->arus_mudik_pelabuhan_total_penumpang_keberangkatan));

        $sheet->setCellValue('C402', applyZero($prev->arus_mudik_pelabuhan_total_penumpang_kedatangan));
        $sheet->setCellValue('D402', applyZero($current->arus_mudik_pelabuhan_total_penumpang_kedatangan));

        $sheet->setCellValue('C404', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_keberangkatan));
        $sheet->setCellValue('D404', applyZero($current->arus_mudik_bandara_jumlah_penumpang_keberangkatan));

        $sheet->setCellValue('C405', applyZero($prev->arus_mudik_bandara_jumlah_penumpang_kedatangan));
        $sheet->setCellValue('D405', applyZero($current->arus_mudik_bandara_jumlah_penumpang_kedatangan));

        $sheet->setCellValue('C406', applyZero($prev->arus_mudik_total_bandara));
        $sheet->setCellValue('D406', applyZero($current->arus_mudik_total_bandara));

        $sheet->setCellValue('C407', applyZero($prev->arus_mudik_bandara_total_penumpang_keberangkatan));
        $sheet->setCellValue('D407', applyZero($current->arus_mudik_bandara_total_penumpang_keberangkatan));

        $sheet->setCellValue('C408', applyZero($prev->arus_mudik_bandara_total_penumpang_kedatangan));
        $sheet->setCellValue('D408', applyZero($current->arus_mudik_bandara_total_penumpang_kedatangan));

        $sheet->setCellValue('C411', applyZero($prev->prokes_covid_teguran_gar_prokes));
        $sheet->setCellValue('D411', applyZero($current->prokes_covid_teguran_gar_prokes));

        $sheet->setCellValue('C412', applyZero($prev->prokes_covid_pembagian_masker));
        $sheet->setCellValue('D412', applyZero($current->prokes_covid_pembagian_masker));

        $sheet->setCellValue('C413', applyZero($prev->prokes_covid_sosialisasi_tentang_prokes));
        $sheet->setCellValue('D413', applyZero($current->prokes_covid_sosialisasi_tentang_prokes));

        $sheet->setCellValue('C414', applyZero($prev->prokes_covid_giat_baksos));
        $sheet->setCellValue('D414', applyZero($current->prokes_covid_giat_baksos));

        $sheet->setCellValue('C417', applyZero($prev->penyekatan_motor));
        $sheet->setCellValue('D417', applyZero($current->penyekatan_motor));

        $sheet->setCellValue('C418', applyZero($prev->penyekatan_mobil_penumpang));
        $sheet->setCellValue('D418', applyZero($current->penyekatan_mobil_penumpang));

        $sheet->setCellValue('C419', applyZero($prev->penyekatan_mobil_bus));
        $sheet->setCellValue('D419', applyZero($current->penyekatan_mobil_bus));

        $sheet->setCellValue('C420', applyZero($prev->penyekatan_mobil_barang));
        $sheet->setCellValue('D420', applyZero($current->penyekatan_mobil_barang));

        $sheet->setCellValue('C421', applyZero($prev->penyekatan_kendaraan_khusus));
        $sheet->setCellValue('D421', applyZero($current->penyekatan_kendaraan_khusus));

        $sheet->setCellValue('C424', applyZero($prev->rapid_test_antigen_positif));
        $sheet->setCellValue('D424', applyZero($current->rapid_test_antigen_positif));

        $sheet->setCellValue('C425', applyZero($prev->rapid_test_antigen_positif));
        $sheet->setCellValue('D425', applyZero($current->rapid_test_antigen_positif));

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$customFileName.'.xlsx"');

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');
    }
}