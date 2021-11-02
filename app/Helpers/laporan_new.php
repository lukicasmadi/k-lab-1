<?php

use Carbon\Carbon;
use App\Models\DailyInput;
use App\Models\DailyInputPrev;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;

if (! function_exists('excelTemplateNew')) {
    function excelTemplateNew(
        $template,
        $prev,
        $current,
        $kesatuan=null,
        $hari_tanggal,
        $nama_atasan=null,
        $pangkat=null,
        $jabatan=null,
        $nama_laporan=null,
        $customFileName=null,
        $operationName=null,
        $customCombineName=null,
        $cityName=null
        )
    {

        $excelPath = public_path('template/excel');

        $excelTemplate = $excelPath."/format_laporan_operasi_2021_preview_new.xlsx";

        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($excelTemplate);

        $sheet = $spreadsheet->getActiveSheet();

        $combineName = $nama_laporan." Giat Operasi ".$operationName;

        $sheet->setCellValue('B6', $combineName);
        $sheet->setCellValue('B7', $kesatuan);
        $sheet->setCellValue('B8', 'HARI/TGL : '.$hari_tanggal);

        if(is_null($cityName)) {
            $sheet->setCellValue('E428', indonesiaDate(date("Y-m-d"))); // TEMPAT, TANGGAL
        } else {
            $sheet->setCellValue('E428', $cityName.", ".indonesiaDate(date("Y-m-d"))); // TEMPAT, TANGGAL
        }
        $sheet->setCellValue('E434', $nama_atasan); // NAMA ATASAN UNTUK TANDA TANGAN
        $sheet->setCellValue('E435', $pangkat); //PANGKAT & NRP
        $sheet->setCellValue('E429', $jabatan); //JABATAN

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

        // $spreadsheet->getActiveSheet()->getStyle('A11:G11')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_NONE);
        // $spreadsheet->getActiveSheet()->getStyle('A11:G11')->getFont()->getColor()->setARGB(Color::COLOR_RED);

        $writer = IOFactory::createWriter($spreadsheet, 'Html');
        $message = $writer->save('php://output');

        return $message;
    }
}

if (! function_exists('newDailyReportDetail')) {
    function newDailyReportDetail($poldaYangKe)
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
        $sheet->setCellValue('A6', 'KESATUAN : KORLANTAS');
        $sheet->setCellValue('A7', 'HARI/TGL : '.indonesianFullDayAndDate(date("Y-m-d H:i:s")));

        $sheet->setCellValue('C10', nowYearMinusOne());
        $sheet->setCellValue('D10', nowYear());

        $skip = [
            '16',
            '17',
            '18',
            '36',
            '37',
            '55',
            '56',
            '58',
            '59',
            '63',
            '64',
            '70',
            '71',
            '79',
            '80',
            '92',
            '93',
            '104',
            '105',
            '106',
            '112',
            '113',
            '118',
            '119',
            '124',
            '125',
            '126',
            '132',
            '136',
            '137',
            '145',
            '146',
            '158',
            '159',
            '170',
            '171',
            '178',
            '179',
            '190',
            '191',
            '199',
            '200',
            '212',
            '213',
            '224',
            '225',
            '226',
            '233',
            '234',
            '239',
            '240',
            '245',
            '246',
            '247',
            '268',
            '269',
            '278',
            '279',
            '285',
            '291',
            '297',
            '303',
            '309',
            '315',
            '321',
            '329',
            '333',
            '334',
            '335',
            '336',
            '343',
            '344',
            '349',
            '350',
            '355',
            '356',
            '364',
            '365',
            '366',
            '371',
            '372',
            '373',
            '374',
            '384',
            '388',
            '408',
            '409',
            '414',
        ];


        foreach($poldaYangKe as $polda) {

            if(!is_null($polda->poldaInputCurrentToday)) {

                $temp = [];

                foreach($polda->poldaInputCurrentToday->toArray() as $key=>$value) {
                    array_push($temp, $value);
                }

                $start = 5;

                for($i=14; $i<=413; $i++) {
                    if (in_array($i, $skip)) {
                        continue;
                    } else {
                        $flagName = poldaFlag($polda->name);

                        $sheet->setCellValue($flagName[0].$i, $temp[$start++]);
                    }
                }
            }

            if(!is_null($polda->poldaInputPrevToday)) {

                $temp = [];

                foreach($polda->poldaInputPrevToday->toArray() as $key=>$value) {
                    array_push($temp, $value);
                }

                $start = 5;

                for($i=14; $i<=413; $i++) {
                    if (in_array($i, $skip)) {
                        continue;
                    } else {
                        $flagName = poldaFlag($polda->name);

                        $sheet->setCellValue($flagName[1].$i, $temp[$start++]);
                    }
                }
            }
        }


        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}

if (! function_exists('compareAllPoldaInput')) {
    function compareAllPoldaInput($data_prev, $data_current, $start_date, $end_date, $prev_year, $current_year, $operationName) {

        $excelPath = public_path('template/excel');
        $excelTemplate = $excelPath."/format_laporan_detail_daily.xlsx";
        $spreadsheet = IOFactory::load($excelTemplate);
        $now = now()->format("Y-m-d");
        $filename = 'Laporan Perbandingan Harian Tanggal '.$start_date.' sampai '.$end_date;

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A5', 'LAPORAN HARIAN '.upperCase($operationName));
        $sheet->setCellValue('A6', 'KESATUAN : Korlantas');
        $sheet->setCellValue('A7', 'HARI/TGL : '.indonesianFullDayAndDate(date("Y-m-d H:i:s")));

        $skip = [
            '16',
            '17',
            '18',
            '36',
            '37',
            '55',
            '56',
            '58',
            '59',
            '63',
            '64',
            '70',
            '71',
            '79',
            '80',
            '92',
            '93',
            '104',
            '105',
            '106',
            '112',
            '113',
            '118',
            '119',
            '124',
            '125',
            '126',
            '132',
            '136',
            '137',
            '145',
            '146',
            '158',
            '159',
            '170',
            '171',
            '178',
            '179',
            '190',
            '191',
            '199',
            '200',
            '212',
            '213',
            '224',
            '225',
            '226',
            '233',
            '234',
            '239',
            '240',
            '245',
            '246',
            '247',
            '268',
            '269',
            '278',
            '279',
            '285',
            '291',
            '297',
            '303',
            '309',
            '315',
            '321',
            '329',
            '333',
            '334',
            '335',
            '336',
            '343',
            '344',
            '349',
            '350',
            '355',
            '356',
            '364',
            '365',
            '366',
            '371',
            '372',
            '373',
            '374',
            '384',
            '388',
            '408',
            '409',
            '414',
        ];

        $flagRowTahun = 10;

        foreach($data_prev as $prev) {
            $flag = poldaFlag($prev->polda_name);
            $sheet->setCellValue($flag[0].$flagRowTahun, $prev_year);

            $sheet->setCellValue($flag[0].'14', applyZero($prev->prev_pelanggaran_lalu_lintas_tilang_p_sum));
            $sheet->setCellValue($flag[0].'15', applyZero($prev->prev_pelanggaran_lalu_lintas_teguran_p_sum));

            $sheet->setCellValue($flag[0].'19', applyZero($prev->prev_pelanggaran_sepeda_motor_kecepatan_p_sum));
            $sheet->setCellValue($flag[0].'20', applyZero($prev->prev_pelanggaran_sepeda_motor_helm_p_sum));
            $sheet->setCellValue($flag[0].'21', applyZero($prev->prev_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p_sum));
            $sheet->setCellValue($flag[0].'22', applyZero($prev->prev_pelanggaran_sepeda_motor_marka_menerus_menyalip_p_sum));
            $sheet->setCellValue($flag[0].'23', applyZero($prev->prev_pelanggaran_sepeda_motor_melawan_arus_p_sum));
            $sheet->setCellValue($flag[0].'24', applyZero($prev->prev_pelanggaran_sepeda_motor_melanggar_lampu_lalin_p_sum));
            $sheet->setCellValue($flag[0].'25', applyZero($prev->prev_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p_sum));
            $sheet->setCellValue($flag[0].'26', applyZero($prev->prev_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p_sum));
            $sheet->setCellValue($flag[0].'27', applyZero($prev->prev_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p_sum));
            $sheet->setCellValue($flag[0].'28', applyZero($prev->prev_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p_sum));
            $sheet->setCellValue($flag[0].'29', applyZero($prev->prev_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p_sum));
            $sheet->setCellValue($flag[0].'30', applyZero($prev->prev_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p_sum));
            $sheet->setCellValue($flag[0].'31', applyZero($prev->prev_pelanggaran_sepeda_motor_melanggar_marka_berhenti_p_sum));
            $sheet->setCellValue($flag[0].'32', applyZero($prev->prev_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p_sum));
            $sheet->setCellValue($flag[0].'33', applyZero($prev->prev_pelanggaran_sepeda_motor_surat_surat_p_sum));
            $sheet->setCellValue($flag[0].'34', applyZero($prev->prev_pelanggaran_sepeda_motor_kelengkapan_kendaraan_p_sum));
            $sheet->setCellValue($flag[0].'35', applyZero($prev->prev_pelanggaran_sepeda_motor_lain_lain_p_sum));

            $sheet->setCellValue($flag[0].'38', applyZero($prev->prev_pelanggaran_mobil_kecepatan_p_sum));
            $sheet->setCellValue($flag[0].'39', applyZero($prev->prev_pelanggaran_mobil_safety_belt_p_sum));
            $sheet->setCellValue($flag[0].'40', applyZero($prev->prev_pelanggaran_mobil_muatan_overload_p_sum));
            $sheet->setCellValue($flag[0].'41', applyZero($prev->prev_pelanggaran_mobil_marka_menerus_menyalip_p_sum));
            $sheet->setCellValue($flag[0].'42', applyZero($prev->prev_pelanggaran_mobil_melawan_arus_p_sum));
            $sheet->setCellValue($flag[0].'43', applyZero($prev->prev_pelanggaran_mobil_melanggar_lampu_lalin_p_sum));
            $sheet->setCellValue($flag[0].'44', applyZero($prev->prev_pelanggaran_mobil_mengemudi_tidak_wajar_p_sum));
            $sheet->setCellValue($flag[0].'45', applyZero($prev->prev_pelanggaran_mobil_syarat_teknis_layak_jalan_p_sum));
            $sheet->setCellValue($flag[0].'46', applyZero($prev->prev_pelanggaran_mobil_tidak_nyala_lampu_malam_p_sum));
            $sheet->setCellValue($flag[0].'47', applyZero($prev->prev_pelanggaran_mobil_berbelok_tanpa_isyarat_p_sum));
            $sheet->setCellValue($flag[0].'48', applyZero($prev->prev_pelanggaran_mobil_berbalapan_di_jalan_raya_p_sum));
            $sheet->setCellValue($flag[0].'49', applyZero($prev->prev_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p_sum));
            $sheet->setCellValue($flag[0].'50', applyZero($prev->prev_pelanggaran_mobil_melanggar_marka_berhenti_p_sum));
            $sheet->setCellValue($flag[0].'51', applyZero($prev->prev_pelanggaran_mobil_tidak_patuh_perintah_petugas_p_sum));
            $sheet->setCellValue($flag[0].'52', applyZero($prev->prev_pelanggaran_mobil_surat_surat_p_sum));
            $sheet->setCellValue($flag[0].'53', applyZero($prev->prev_pelanggaran_mobil_kelengkapan_kendaraan_p_sum));
            $sheet->setCellValue($flag[0].'54', applyZero($prev->prev_pelanggaran_mobil_lain_lain_p_sum));

            $sheet->setCellValue($flag[0].'57', applyZero($prev->prev_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p_sum));

            $sheet->setCellValue($flag[0].'60', applyZero($prev->prev_barang_bukti_yg_disita_sim_p_sum));
            $sheet->setCellValue($flag[0].'61', applyZero($prev->prev_barang_bukti_yg_disita_stnk_p_sum));
            $sheet->setCellValue($flag[0].'62', applyZero($prev->prev_barang_bukti_yg_disita_kendaraan_p_sum));

            $sheet->setCellValue($flag[0].'65', applyZero($prev->prev_kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p_sum));
            $sheet->setCellValue($flag[0].'66', applyZero($prev->prev_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p_sum));
            $sheet->setCellValue($flag[0].'67', applyZero($prev->prev_kendaraan_yang_terlibat_pelanggaran_mobil_bus_p_sum));
            $sheet->setCellValue($flag[0].'68', applyZero($prev->prev_kendaraan_yang_terlibat_pelanggaran_mobil_barang_p_sum));
            $sheet->setCellValue($flag[0].'69', applyZero($prev->prev_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p_sum));

            $sheet->setCellValue($flag[0].'72', applyZero($prev->prev_profesi_pelaku_pelanggaran_pns_p_sum));
            $sheet->setCellValue($flag[0].'73', applyZero($prev->prev_profesi_pelaku_pelanggaran_karyawan_swasta_p_sum));
            $sheet->setCellValue($flag[0].'74', applyZero($prev->prev_profesi_pelaku_pelanggaran_pelajar_mahasiswa_p_sum));
            $sheet->setCellValue($flag[0].'75', applyZero($prev->prev_profesi_pelaku_pelanggaran_pengemudi_supir_p_sum));
            $sheet->setCellValue($flag[0].'76', applyZero($prev->prev_profesi_pelaku_pelanggaran_tni_p_sum));
            $sheet->setCellValue($flag[0].'77', applyZero($prev->prev_profesi_pelaku_pelanggaran_polri_p_sum));
            $sheet->setCellValue($flag[0].'78', applyZero($prev->prev_profesi_pelaku_pelanggaran_lain_lain_p_sum));

            $sheet->setCellValue($flag[0].'81', applyZero($prev->prev_usia_pelaku_pelanggaran_kurang_dari_15_tahun_p_sum));
            $sheet->setCellValue($flag[0].'82', applyZero($prev->prev_usia_pelaku_pelanggaran_16_20_tahun_p_sum));
            $sheet->setCellValue($flag[0].'83', applyZero($prev->prev_usia_pelaku_pelanggaran_21_25_tahun_p_sum));
            $sheet->setCellValue($flag[0].'84', applyZero($prev->prev_usia_pelaku_pelanggaran_26_30_tahun_p_sum));
            $sheet->setCellValue($flag[0].'85', applyZero($prev->prev_usia_pelaku_pelanggaran_31_35_tahun_p_sum));
            $sheet->setCellValue($flag[0].'86', applyZero($prev->prev_usia_pelaku_pelanggaran_36_40_tahun_p_sum));
            $sheet->setCellValue($flag[0].'87', applyZero($prev->prev_usia_pelaku_pelanggaran_41_45_tahun_p_sum));
            $sheet->setCellValue($flag[0].'88', applyZero($prev->prev_usia_pelaku_pelanggaran_46_50_tahun_p_sum));
            $sheet->setCellValue($flag[0].'89', applyZero($prev->prev_usia_pelaku_pelanggaran_51_55_tahun_p_sum));
            $sheet->setCellValue($flag[0].'90', applyZero($prev->prev_usia_pelaku_pelanggaran_56_60_tahun_p_sum));
            $sheet->setCellValue($flag[0].'91', applyZero($prev->prev_usia_pelaku_pelanggaran_diatas_60_tahun_p_sum));

            $sheet->setCellValue($flag[0].'94', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_a_p_sum));
            $sheet->setCellValue($flag[0].'95', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_a_umum_p_sum));
            $sheet->setCellValue($flag[0].'96', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_b1_p_sum));
            $sheet->setCellValue($flag[0].'97', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_b1_umum_p_sum));
            $sheet->setCellValue($flag[0].'98', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_b2_p_sum));
            $sheet->setCellValue($flag[0].'99', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_b2_umum_p_sum));
            $sheet->setCellValue($flag[0].'100', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_c_p_sum));
            $sheet->setCellValue($flag[0].'101', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_d_p_sum));
            $sheet->setCellValue($flag[0].'102', applyZero($prev->prev_sim_pelaku_pelanggaran_sim_internasional_p_sum));
            $sheet->setCellValue($flag[0].'103', applyZero($prev->prev_sim_pelaku_pelanggaran_tanpa_sim_p_sum));


            $sheet->setCellValue($flag[0].'107', applyZero($prev->prev_lokasi_pelanggaran_pemukiman_p_sum));
            $sheet->setCellValue($flag[0].'108', applyZero($prev->prev_lokasi_pelanggaran_perbelanjaan_p_sum));
            $sheet->setCellValue($flag[0].'109', applyZero($prev->prev_lokasi_pelanggaran_perkantoran_p_sum));
            $sheet->setCellValue($flag[0].'110', applyZero($prev->prev_lokasi_pelanggaran_wisata_p_sum));
            $sheet->setCellValue($flag[0].'111', applyZero($prev->prev_lokasi_pelanggaran_industri_p_sum));

            $sheet->setCellValue($flag[0].'114', applyZero($prev->prev_lokasi_pelanggaran_status_jalan_nasional_p_sum));
            $sheet->setCellValue($flag[0].'115', applyZero($prev->prev_lokasi_pelanggaran_status_jalan_propinsi_p_sum));
            $sheet->setCellValue($flag[0].'116', applyZero($prev->prev_lokasi_pelanggaran_status_jalan_kab_kota_p_sum));
            $sheet->setCellValue($flag[0].'117', applyZero($prev->prev_lokasi_pelanggaran_status_jalan_desa_lingkungan_p_sum));

            $sheet->setCellValue($flag[0].'120', applyZero($prev->prev_lokasi_pelanggaran_fungsi_jalan_arteri_p_sum));
            $sheet->setCellValue($flag[0].'121', applyZero($prev->prev_lokasi_pelanggaran_fungsi_jalan_kolektor_p_sum));
            $sheet->setCellValue($flag[0].'122', applyZero($prev->prev_lokasi_pelanggaran_fungsi_jalan_lokal_p_sum));
            $sheet->setCellValue($flag[0].'123', applyZero($prev->prev_lokasi_pelanggaran_fungsi_jalan_lingkungan_p_sum));

            $sheet->setCellValue($flag[0].'127', applyZero($prev->prev_kecelakaan_lalin_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'128', applyZero($prev->prev_kecelakaan_lalin_jumlah_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'129', applyZero($prev->prev_kecelakaan_lalin_jumlah_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'130', applyZero($prev->prev_kecelakaan_lalin_jumlah_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'131', applyZero($prev->prev_kecelakaan_lalin_jumlah_kerugian_materiil_p_sum));

            $sheet->setCellValue($flag[0].'133', applyZero($prev->prev_kecelakaan_barang_bukti_yg_disita_sim_p_sum));
            $sheet->setCellValue($flag[0].'134', applyZero($prev->prev_kecelakaan_barang_bukti_yg_disita_stnk_p_sum));
            $sheet->setCellValue($flag[0].'135', applyZero($prev->prev_kecelakaan_barang_bukti_yg_disita_kendaraan_p_sum));

            $sheet->setCellValue($flag[0].'138', applyZero($prev->prev_profesi_korban_kecelakaan_lalin_pns_p_sum));
            $sheet->setCellValue($flag[0].'139', applyZero($prev->prev_profesi_korban_kecelakaan_lalin_karwayan_swasta_p_sum));
            $sheet->setCellValue($flag[0].'140', applyZero($prev->prev_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p_sum));
            $sheet->setCellValue($flag[0].'141', applyZero($prev->prev_profesi_korban_kecelakaan_lalin_pengemudi_p_sum));
            $sheet->setCellValue($flag[0].'142', applyZero($prev->prev_profesi_korban_kecelakaan_lalin_tni_p_sum));
            $sheet->setCellValue($flag[0].'143', applyZero($prev->prev_profesi_korban_kecelakaan_lalin_polri_p_sum));
            $sheet->setCellValue($flag[0].'144', applyZero($prev->prev_profesi_korban_kecelakaan_lalin_lain_lain_p_sum));

            $sheet->setCellValue($flag[0].'147', applyZero($prev->prev_usia_korban_kecelakaan_kurang_15_p_sum));
            $sheet->setCellValue($flag[0].'148', applyZero($prev->prev_usia_korban_kecelakaan_16_20_p_sum));
            $sheet->setCellValue($flag[0].'149', applyZero($prev->prev_usia_korban_kecelakaan_21_25_p_sum));
            $sheet->setCellValue($flag[0].'150', applyZero($prev->prev_usia_korban_kecelakaan_26_30_p_sum));
            $sheet->setCellValue($flag[0].'151', applyZero($prev->prev_usia_korban_kecelakaan_31_35_p_sum));
            $sheet->setCellValue($flag[0].'152', applyZero($prev->prev_usia_korban_kecelakaan_36_40_p_sum));
            $sheet->setCellValue($flag[0].'153', applyZero($prev->prev_usia_korban_kecelakaan_41_45_p_sum));
            $sheet->setCellValue($flag[0].'154', applyZero($prev->prev_usia_korban_kecelakaan_45_50_p_sum));
            $sheet->setCellValue($flag[0].'155', applyZero($prev->prev_usia_korban_kecelakaan_51_55_p_sum));
            $sheet->setCellValue($flag[0].'156', applyZero($prev->prev_usia_korban_kecelakaan_56_60_p_sum));
            $sheet->setCellValue($flag[0].'157', applyZero($prev->prev_usia_korban_kecelakaan_diatas_60_p_sum));

            $sheet->setCellValue($flag[0].'160', applyZero($prev->prev_sim_korban_kecelakaan_sim_a_p_sum));
            $sheet->setCellValue($flag[0].'161', applyZero($prev->prev_sim_korban_kecelakaan_sim_a_umum_p_sum));
            $sheet->setCellValue($flag[0].'162', applyZero($prev->prev_sim_korban_kecelakaan_sim_b1_p_sum));
            $sheet->setCellValue($flag[0].'163', applyZero($prev->prev_sim_korban_kecelakaan_sim_b1_umum_p_sum));
            $sheet->setCellValue($flag[0].'164', applyZero($prev->prev_sim_korban_kecelakaan_sim_b2_p_sum));
            $sheet->setCellValue($flag[0].'165', applyZero($prev->prev_sim_korban_kecelakaan_sim_b2_umum_p_sum));
            $sheet->setCellValue($flag[0].'166', applyZero($prev->prev_sim_korban_kecelakaan_sim_c_p_sum));
            $sheet->setCellValue($flag[0].'167', applyZero($prev->prev_sim_korban_kecelakaan_sim_d_p_sum));
            $sheet->setCellValue($flag[0].'168', applyZero($prev->prev_sim_korban_kecelakaan_sim_internasional_p_sum));
            $sheet->setCellValue($flag[0].'169', applyZero($prev->prev_sim_korban_kecelakaan_tanpa_sim_p_sum));

            $sheet->setCellValue($flag[0].'172', applyZero($prev->prev_kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p_sum));
            $sheet->setCellValue($flag[0].'173', applyZero($prev->prev_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p_sum));
            $sheet->setCellValue($flag[0].'174', applyZero($prev->prev_kendaraan_yg_terlibat_kecelakaan_mobil_bus_p_sum));
            $sheet->setCellValue($flag[0].'175', applyZero($prev->prev_kendaraan_yg_terlibat_kecelakaan_mobil_barang_p_sum));
            $sheet->setCellValue($flag[0].'176', applyZero($prev->prev_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p_sum));
            $sheet->setCellValue($flag[0].'177', applyZero($prev->prev_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p_sum));

            $sheet->setCellValue($flag[0].'180', applyZero($prev->prev_jenis_kecelakaan_tunggal_ooc_p_sum));
            $sheet->setCellValue($flag[0].'181', applyZero($prev->prev_jenis_kecelakaan_depan_depan_p_sum));
            $sheet->setCellValue($flag[0].'182', applyZero($prev->prev_jenis_kecelakaan_depan_belakang_p_sum));
            $sheet->setCellValue($flag[0].'183', applyZero($prev->prev_jenis_kecelakaan_depan_samping_p_sum));
            $sheet->setCellValue($flag[0].'184', applyZero($prev->prev_jenis_kecelakaan_beruntun_p_sum));
            $sheet->setCellValue($flag[0].'185', applyZero($prev->prev_jenis_kecelakaan_pejalan_kaki_p_sum));
            $sheet->setCellValue($flag[0].'186', applyZero($prev->prev_jenis_kecelakaan_tabrak_lari_p_sum));
            $sheet->setCellValue($flag[0].'187', applyZero($prev->prev_jenis_kecelakaan_tabrak_hewan_p_sum));
            $sheet->setCellValue($flag[0].'188', applyZero($prev->prev_jenis_kecelakaan_samping_samping_p_sum));
            $sheet->setCellValue($flag[0].'189', applyZero($prev->prev_jenis_kecelakaan_lainnya_p_sum));

            $sheet->setCellValue($flag[0].'192', applyZero($prev->prev_profesi_pelaku_kecelakaan_lalin_pns_p_sum));
            $sheet->setCellValue($flag[0].'193', applyZero($prev->prev_profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p_sum));
            $sheet->setCellValue($flag[0].'194', applyZero($prev->prev_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p_sum));
            $sheet->setCellValue($flag[0].'195', applyZero($prev->prev_profesi_pelaku_kecelakaan_lalin_pengemudi_p_sum));
            $sheet->setCellValue($flag[0].'196', applyZero($prev->prev_profesi_pelaku_kecelakaan_lalin_tni_p_sum));
            $sheet->setCellValue($flag[0].'197', applyZero($prev->prev_profesi_pelaku_kecelakaan_lalin_polri_p_sum));
            $sheet->setCellValue($flag[0].'198', applyZero($prev->prev_profesi_pelaku_kecelakaan_lalin_lain_lain_p_sum));

            $sheet->setCellValue($flag[0].'201', applyZero($prev->prev_usia_pelaku_kecelakaan_kurang_dari_15_tahun_p_sum));
            $sheet->setCellValue($flag[0].'202', applyZero($prev->prev_usia_pelaku_kecelakaan_16_20_tahun_p_sum));
            $sheet->setCellValue($flag[0].'203', applyZero($prev->prev_usia_pelaku_kecelakaan_21_25_tahun_p_sum));
            $sheet->setCellValue($flag[0].'204', applyZero($prev->prev_usia_pelaku_kecelakaan_26_30_tahun_p_sum));
            $sheet->setCellValue($flag[0].'205', applyZero($prev->prev_usia_pelaku_kecelakaan_31_35_tahun_p_sum));
            $sheet->setCellValue($flag[0].'206', applyZero($prev->prev_usia_pelaku_kecelakaan_36_40_tahun_p_sum));
            $sheet->setCellValue($flag[0].'207', applyZero($prev->prev_usia_pelaku_kecelakaan_41_45_tahun_p_sum));
            $sheet->setCellValue($flag[0].'208', applyZero($prev->prev_usia_pelaku_kecelakaan_46_50_tahun_p_sum));
            $sheet->setCellValue($flag[0].'209', applyZero($prev->prev_usia_pelaku_kecelakaan_51_55_tahun_p_sum));
            $sheet->setCellValue($flag[0].'210', applyZero($prev->prev_usia_pelaku_kecelakaan_56_60_tahun_p_sum));
            $sheet->setCellValue($flag[0].'211', applyZero($prev->prev_usia_pelaku_kecelakaan_diatas_60_tahun_p_sum));

            $sheet->setCellValue($flag[0].'214', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_a_p_sum));
            $sheet->setCellValue($flag[0].'215', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_a_umum_p_sum));
            $sheet->setCellValue($flag[0].'216', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_b1_p_sum));
            $sheet->setCellValue($flag[0].'217', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_b1_umum_p_sum));
            $sheet->setCellValue($flag[0].'218', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_b2_p_sum));
            $sheet->setCellValue($flag[0].'219', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_b2_umum_p_sum));
            $sheet->setCellValue($flag[0].'220', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_c_p_sum));
            $sheet->setCellValue($flag[0].'221', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_d_p_sum));
            $sheet->setCellValue($flag[0].'222', applyZero($prev->prev_sim_pelaku_kecelakaan_sim_internasional_p_sum));
            $sheet->setCellValue($flag[0].'223', applyZero($prev->prev_sim_pelaku_kecelakaan_tanpa_sim_p_sum));

            $sheet->setCellValue($flag[0].'227', applyZero($prev->prev_lokasi_kecelakaan_lalin_pemukiman_p_sum));
            $sheet->setCellValue($flag[0].'228', applyZero($prev->prev_lokasi_kecelakaan_lalin_perbelanjaan_p_sum));
            $sheet->setCellValue($flag[0].'229', applyZero($prev->prev_lokasi_kecelakaan_lalin_perkantoran_p_sum));
            $sheet->setCellValue($flag[0].'230', applyZero($prev->prev_lokasi_kecelakaan_lalin_wisata_p_sum));
            $sheet->setCellValue($flag[0].'231', applyZero($prev->prev_lokasi_kecelakaan_lalin_industri_p_sum));
            $sheet->setCellValue($flag[0].'232', applyZero($prev->prev_lokasi_kecelakaan_lalin_lain_lain_p_sum));

            $sheet->setCellValue($flag[0].'235', applyZero($prev->prev_lokasi_kecelakaan_status_jalan_nasional_p_sum));
            $sheet->setCellValue($flag[0].'236', applyZero($prev->prev_lokasi_kecelakaan_status_jalan_propinsi_p_sum));
            $sheet->setCellValue($flag[0].'237', applyZero($prev->prev_lokasi_kecelakaan_status_jalan_kab_kota_p_sum));
            $sheet->setCellValue($flag[0].'238', applyZero($prev->prev_lokasi_kecelakaan_status_jalan_desa_lingkungan_p_sum));

            $sheet->setCellValue($flag[0].'241', applyZero($prev->prev_lokasi_kecelakaan_fungsi_jalan_arteri_p_sum));
            $sheet->setCellValue($flag[0].'242', applyZero($prev->prev_lokasi_kecelakaan_fungsi_jalan_kolektor_p_sum));
            $sheet->setCellValue($flag[0].'243', applyZero($prev->prev_lokasi_kecelakaan_fungsi_jalan_lokal_p_sum));
            $sheet->setCellValue($flag[0].'244', applyZero($prev->prev_lokasi_kecelakaan_fungsi_jalan_lingkungan_p_sum));

            $sheet->setCellValue($flag[0].'247', applyZero($prev->prev_faktor_penyebab_kecelakaan_manusia_p_sum));
            $sheet->setCellValue($flag[0].'248', applyZero($prev->prev_faktor_penyebab_kecelakaan_ngantuk_lelah_p_sum));
            $sheet->setCellValue($flag[0].'249', applyZero($prev->prev_faktor_penyebab_kecelakaan_mabuk_obat_p_sum));
            $sheet->setCellValue($flag[0].'250', applyZero($prev->prev_faktor_penyebab_kecelakaan_sakit_p_sum));
            $sheet->setCellValue($flag[0].'251', applyZero($prev->prev_faktor_penyebab_kecelakaan_handphone_elektronik_p_sum));
            $sheet->setCellValue($flag[0].'252', applyZero($prev->prev_faktor_penyebab_kecelakaan_menerobos_lampu_merah_p_sum));
            $sheet->setCellValue($flag[0].'253', applyZero($prev->prev_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p_sum));
            $sheet->setCellValue($flag[0].'254', applyZero($prev->prev_faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p_sum));
            $sheet->setCellValue($flag[0].'255', applyZero($prev->prev_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p_sum));
            $sheet->setCellValue($flag[0].'256', applyZero($prev->prev_faktor_penyebab_kecelakaan_berpindah_jalur_p_sum));
            $sheet->setCellValue($flag[0].'257', applyZero($prev->prev_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p_sum));
            $sheet->setCellValue($flag[0].'258', applyZero($prev->prev_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p_sum));
            $sheet->setCellValue($flag[0].'259', applyZero($prev->prev_faktor_penyebab_kecelakaan_lainnya_p_sum));
            $sheet->setCellValue($flag[0].'260', applyZero($prev->prev_faktor_penyebab_kecelakaan_alam_p_sum));
            $sheet->setCellValue($flag[0].'261', applyZero($prev->prev_faktor_penyebab_kecelakaan_kelaikan_kendaraan_p_sum));
            $sheet->setCellValue($flag[0].'262', applyZero($prev->prev_faktor_penyebab_kecelakaan_kondisi_jalan_p_sum));
            $sheet->setCellValue($flag[0].'263', applyZero($prev->prev_faktor_penyebab_kecelakaan_prasarana_jalan_p_sum));
            $sheet->setCellValue($flag[0].'264', applyZero($prev->prev_faktor_penyebab_kecelakaan_rambu_p_sum));
            $sheet->setCellValue($flag[0].'265', applyZero($prev->prev_faktor_penyebab_kecelakaan_marka_p_sum));
            $sheet->setCellValue($flag[0].'266', applyZero($prev->prev_faktor_penyebab_kecelakaan_apil_p_sum));
            $sheet->setCellValue($flag[0].'267', applyZero($prev->prev_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p_sum));

            $sheet->setCellValue($flag[0].'270', applyZero($prev->prev_waktu_kejadian_kecelakaan_00_03_p_sum));
            $sheet->setCellValue($flag[0].'271', applyZero($prev->prev_waktu_kejadian_kecelakaan_03_06_p_sum));
            $sheet->setCellValue($flag[0].'272', applyZero($prev->prev_waktu_kejadian_kecelakaan_06_09_p_sum));
            $sheet->setCellValue($flag[0].'273', applyZero($prev->prev_waktu_kejadian_kecelakaan_09_12_p_sum));
            $sheet->setCellValue($flag[0].'274', applyZero($prev->prev_waktu_kejadian_kecelakaan_12_15_p_sum));
            $sheet->setCellValue($flag[0].'275', applyZero($prev->prev_waktu_kejadian_kecelakaan_15_18_p_sum));
            $sheet->setCellValue($flag[0].'276', applyZero($prev->prev_waktu_kejadian_kecelakaan_18_21_p_sum));
            $sheet->setCellValue($flag[0].'277', applyZero($prev->prev_waktu_kejadian_kecelakaan_21_24_p_sum));

            $sheet->setCellValue($flag[0].'280', applyZero($prev->prev_kecelakaan_lalin_menonjol_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'281', applyZero($prev->prev_kecelakaan_lalin_menonjol_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'282', applyZero($prev->prev_kecelakaan_lalin_menonjol_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'283', applyZero($prev->prev_kecelakaan_lalin_menonjol_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'284', applyZero($prev->prev_kecelakaan_lalin_menonjol_materiil_p_sum));

            $sheet->setCellValue($flag[0].'286', applyZero($prev->prev_kecelakaan_lalin_tunggal_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'287', applyZero($prev->prev_kecelakaan_lalin_tunggal_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'288', applyZero($prev->prev_kecelakaan_lalin_tunggal_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'289', applyZero($prev->prev_kecelakaan_lalin_tunggal_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'290', applyZero($prev->prev_kecelakaan_lalin_tunggal_materiil_p_sum));

            $sheet->setCellValue($flag[0].'292', applyZero($prev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'293', applyZero($prev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'294', applyZero($prev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'295', applyZero($prev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'296', applyZero($prev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p_sum));

            $sheet->setCellValue($flag[0].'298', applyZero($prev->prev_kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'299', applyZero($prev->prev_kecelakaan_lalin_tabrak_lari_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'300', applyZero($prev->prev_kecelakaan_lalin_tabrak_lari_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'301', applyZero($prev->prev_kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'302', applyZero($prev->prev_kecelakaan_lalin_tabrak_lari_materiil_p_sum));

            $sheet->setCellValue($flag[0].'304', applyZero($prev->prev_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'305', applyZero($prev->prev_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'306', applyZero($prev->prev_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'307', applyZero($prev->prev_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'308', applyZero($prev->prev_kecelakaan_lalin_tabrak_sepeda_motor_materiil_p_sum));

            $sheet->setCellValue($flag[0].'310', applyZero($prev->prev_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'311', applyZero($prev->prev_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'312', applyZero($prev->prev_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'313', applyZero($prev->prev_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'314', applyZero($prev->prev_kecelakaan_lalin_tabrak_roda_empat_materiil_p_sum));

            $sheet->setCellValue($flag[0].'316', applyZero($prev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'317', applyZero($prev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'318', applyZero($prev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'319', applyZero($prev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'320', applyZero($prev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p_sum));

            $sheet->setCellValue($flag[0].'322', applyZero($prev->prev_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p_sum));
            $sheet->setCellValue($flag[0].'323', applyZero($prev->prev_kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p_sum));
            $sheet->setCellValue($flag[0].'324', applyZero($prev->prev_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p_sum));
            $sheet->setCellValue($flag[0].'325', applyZero($prev->prev_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p_sum));
            $sheet->setCellValue($flag[0].'326', applyZero($prev->prev_kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p_sum));
            $sheet->setCellValue($flag[0].'327', applyZero($prev->prev_kecelakaan_lalin_perlintasan_ka_korban_meninggal_p_sum));
            $sheet->setCellValue($flag[0].'328', applyZero($prev->prev_kecelakaan_lalin_perlintasan_ka_materiil_p_sum));

            $sheet->setCellValue($flag[0].'330', applyZero($prev->prev_kecelakaan_transportasi_kereta_api_p_sum));
            $sheet->setCellValue($flag[0].'331', applyZero($prev->prev_kecelakaan_transportasi_laut_perairan_p_sum));
            $sheet->setCellValue($flag[0].'332', applyZero($prev->prev_kecelakaan_transportasi_udara_p_sum));

            $sheet->setCellValue($flag[0].'337', applyZero($prev->prev_penlu_melalui_media_cetak_p_sum));
            $sheet->setCellValue($flag[0].'338', applyZero($prev->prev_penlu_melalui_media_elektronik_p_sum));
            $sheet->setCellValue($flag[0].'339', applyZero($prev->prev_penlu_melalui_media_sosial_p_sum));
            $sheet->setCellValue($flag[0].'340', applyZero($prev->prev_penlu_melalui_tempat_keramaian_p_sum));
            $sheet->setCellValue($flag[0].'341', applyZero($prev->prev_penlu_melalui_tempat_istirahat_p_sum));
            $sheet->setCellValue($flag[0].'342', applyZero($prev->prev_penlu_melalui_daerah_rawan_laka_dan_langgar_p_sum));

            $sheet->setCellValue($flag[0].'345', applyZero($prev->prev_penyebaran_pemasangan_spanduk_p_sum));
            $sheet->setCellValue($flag[0].'346', applyZero($prev->prev_penyebaran_pemasangan_leaflet_p_sum));
            $sheet->setCellValue($flag[0].'347', applyZero($prev->prev_penyebaran_pemasangan_sticker_p_sum));
            $sheet->setCellValue($flag[0].'348', applyZero($prev->prev_penyebaran_pemasangan_bilboard_p_sum));

            $sheet->setCellValue($flag[0].'351', applyZero($prev->prev_polisi_sahabat_anak_p_sum));
            $sheet->setCellValue($flag[0].'352', applyZero($prev->prev_cara_aman_sekolah_p_sum));
            $sheet->setCellValue($flag[0].'353', applyZero($prev->prev_patroli_keamanan_sekolah_p_sum));
            $sheet->setCellValue($flag[0].'354', applyZero($prev->prev_pramuka_bhayangkara_krida_lalu_lintas_p_sum));

            $sheet->setCellValue($flag[0].'357', applyZero($prev->prev_police_goes_to_campus_p_sum));
            $sheet->setCellValue($flag[0].'358', applyZero($prev->prev_safety_riding_driving_p_sum));
            $sheet->setCellValue($flag[0].'359', applyZero($prev->prev_forum_lalu_lintas_angkutan_umum_p_sum));
            $sheet->setCellValue($flag[0].'360', applyZero($prev->prev_kampanye_keselamatan_p_sum));
            $sheet->setCellValue($flag[0].'361', applyZero($prev->prev_sekolah_mengemudi_p_sum));
            $sheet->setCellValue($flag[0].'362', applyZero($prev->prev_taman_lalu_lintas_p_sum));
            $sheet->setCellValue($flag[0].'363', applyZero($prev->prev_global_road_safety_partnership_action_p_sum));

            $sheet->setCellValue($flag[0].'367', applyZero($prev->prev_giat_lantas_pengaturan_p_sum));
            $sheet->setCellValue($flag[0].'368', applyZero($prev->prev_giat_lantas_penjagaan_p_sum));
            $sheet->setCellValue($flag[0].'369', applyZero($prev->prev_giat_lantas_pengawalan_p_sum));
            $sheet->setCellValue($flag[0].'370', applyZero($prev->prev_giat_lantas_patroli_p_sum));

            $sheet->setCellValue($flag[0].'375', applyZero($prev->prev_arus_mudik_jumlah_bus_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'376', applyZero($prev->prev_arus_mudik_jumlah_penumpang_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'377', applyZero($prev->prev_arus_mudik_jumlah_bus_kedatangan_p_sum));
            $sheet->setCellValue($flag[0].'378', applyZero($prev->prev_arus_mudik_jumlah_penumpang_kedatangan_p_sum));

            $sheet->setCellValue($flag[0].'379', applyZero($prev->prev_arus_mudik_total_terminal_p_sum));
            $sheet->setCellValue($flag[0].'380', applyZero($prev->prev_arus_mudik_total_bus_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'381', applyZero($prev->prev_arus_mudik_penumpang_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'382', applyZero($prev->prev_arus_mudik_total_bus_kedatangan_p_sum));
            $sheet->setCellValue($flag[0].'383', applyZero($prev->prev_arus_mudik_penumpang_kedatangan_p_sum));

            $sheet->setCellValue($flag[0].'385', applyZero($prev->prev_arus_mudik_kereta_api_total_stasiun_p_sum));
            $sheet->setCellValue($flag[0].'386', applyZero($prev->prev_arus_mudik_kereta_api_total_penumpang_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'387', applyZero($prev->prev_arus_mudik_kereta_api_total_penumpang_kedatangan_p_sum));

            $sheet->setCellValue($flag[0].'389', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'390', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p_sum));
            $sheet->setCellValue($flag[0].'391', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p_sum));
            $sheet->setCellValue($flag[0].'392', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'393', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p_sum));
            $sheet->setCellValue($flag[0].'394', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p_sum));
            $sheet->setCellValue($flag[0].'395', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p_sum));
            $sheet->setCellValue($flag[0].'396', applyZero($prev->prev_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p_sum));

            $sheet->setCellValue($flag[0].'397', applyZero($prev->prev_arus_mudik_total_pelabuhan_p_sum));
            $sheet->setCellValue($flag[0].'398', applyZero($prev->prev_arus_mudik_pelabuhan_kendaraan_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'399', applyZero($prev->prev_arus_mudik_pelabuhan_kendaraan_kedatangan_p_sum));
            $sheet->setCellValue($flag[0].'400', applyZero($prev->prev_arus_mudik_pelabuhan_total_penumpang_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'401', applyZero($prev->prev_arus_mudik_pelabuhan_total_penumpang_kedatangan_p_sum));

            $sheet->setCellValue($flag[0].'403', applyZero($prev->prev_arus_mudik_bandara_jumlah_penumpang_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'404', applyZero($prev->prev_arus_mudik_bandara_jumlah_penumpang_kedatangan_p_sum));

            $sheet->setCellValue($flag[0].'405', applyZero($prev->prev_arus_mudik_total_bandara_p_sum));
            $sheet->setCellValue($flag[0].'406', applyZero($prev->prev_arus_mudik_bandara_total_penumpang_keberangkatan_p_sum));
            $sheet->setCellValue($flag[0].'407', applyZero($prev->prev_arus_mudik_bandara_total_penumpang_kedatangan_p_sum));

            $sheet->setCellValue($flag[0].'410', applyZero($prev->prev_prokes_covid_teguran_gar_prokes_p_sum));
            $sheet->setCellValue($flag[0].'411', applyZero($prev->prev_prokes_covid_pembagian_masker_p_sum));
            $sheet->setCellValue($flag[0].'412', applyZero($prev->prev_prokes_covid_sosialisasi_tentang_prokes_p_sum));
            $sheet->setCellValue($flag[0].'413', applyZero($prev->prev_prokes_covid_giat_baksos_p_sum));

            // ======================================= TIDAK ADA =======================================
            // $sheet->setCellValue($flag[0].'417', applyZero($prev->prev_penyekatan_motor_p_sum));
            // $sheet->setCellValue($flag[0].'418', applyZero($prev->prev_penyekatan_mobil_penumpang_p_sum));
            // $sheet->setCellValue($flag[0].'419', applyZero($prev->prev_penyekatan_mobil_bus_p_sum));
            // $sheet->setCellValue($flag[0].'420', applyZero($prev->prev_penyekatan_mobil_barang_p_sum));
            // $sheet->setCellValue($flag[0].'421', applyZero($prev->prev_penyekatan_kendaraan_khusus_p_sum));
            // $sheet->setCellValue($flag[0].'424', applyZero($prev->prev_rapid_test_antigen_positif_p_sum));
            // $sheet->setCellValue($flag[0].'425', applyZero($prev->prev_rapid_test_antigen_positif_p_sum));
        }

        foreach($data_current as $current) {
            $flagCurrent = poldaFlag($current->polda_name);
            $sheet->setCellValue($flagCurrent[1].$flagRowTahun, $current_year);

            $sheet->setCellValue($flagCurrent[1].'14', applyZero($current->current_pelanggaran_lalu_lintas_tilang_sum));
            $sheet->setCellValue($flagCurrent[1].'15', applyZero($current->current_pelanggaran_lalu_lintas_teguran_sum));

            $sheet->setCellValue($flagCurrent[1].'19', applyZero($current->current_pelanggaran_sepeda_motor_kecepatan_sum));
            $sheet->setCellValue($flagCurrent[1].'20', applyZero($current->current_pelanggaran_sepeda_motor_helm_sum));
            $sheet->setCellValue($flagCurrent[1].'21', applyZero($current->current_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_sum));
            $sheet->setCellValue($flagCurrent[1].'22', applyZero($current->current_pelanggaran_sepeda_motor_marka_menerus_menyalip_sum));
            $sheet->setCellValue($flagCurrent[1].'23', applyZero($current->current_pelanggaran_sepeda_motor_melawan_arus_sum));
            $sheet->setCellValue($flagCurrent[1].'24', applyZero($current->current_pelanggaran_sepeda_motor_melanggar_lampu_lalin_sum));
            $sheet->setCellValue($flagCurrent[1].'25', applyZero($current->current_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_sum));
            $sheet->setCellValue($flagCurrent[1].'26', applyZero($current->current_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_sum));
            $sheet->setCellValue($flagCurrent[1].'27', applyZero($current->current_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_sum));
            $sheet->setCellValue($flagCurrent[1].'28', applyZero($current->current_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_sum));
            $sheet->setCellValue($flagCurrent[1].'29', applyZero($current->current_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_sum));
            $sheet->setCellValue($flagCurrent[1].'30', applyZero($current->current_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_sum));
            $sheet->setCellValue($flagCurrent[1].'31', applyZero($current->current_pelanggaran_sepeda_motor_melanggar_marka_berhenti_sum));
            $sheet->setCellValue($flagCurrent[1].'32', applyZero($current->current_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_sum));
            $sheet->setCellValue($flagCurrent[1].'33', applyZero($current->current_pelanggaran_sepeda_motor_surat_surat_sum));
            $sheet->setCellValue($flagCurrent[1].'34', applyZero($current->current_pelanggaran_sepeda_motor_kelengkapan_kendaraan_sum));
            $sheet->setCellValue($flagCurrent[1].'35', applyZero($current->current_pelanggaran_sepeda_motor_lain_lain_sum));

            $sheet->setCellValue($flagCurrent[1].'38', applyZero($current->current_pelanggaran_mobil_kecepatan_sum));
            $sheet->setCellValue($flagCurrent[1].'39', applyZero($current->current_pelanggaran_mobil_safety_belt_sum));
            $sheet->setCellValue($flagCurrent[1].'40', applyZero($current->current_pelanggaran_mobil_muatan_overload_sum));
            $sheet->setCellValue($flagCurrent[1].'41', applyZero($current->current_pelanggaran_mobil_marka_menerus_menyalip_sum));
            $sheet->setCellValue($flagCurrent[1].'42', applyZero($current->current_pelanggaran_mobil_melawan_arus_sum));
            $sheet->setCellValue($flagCurrent[1].'43', applyZero($current->current_pelanggaran_mobil_melanggar_lampu_lalin_sum));
            $sheet->setCellValue($flagCurrent[1].'44', applyZero($current->current_pelanggaran_mobil_mengemudi_tidak_wajar_sum));
            $sheet->setCellValue($flagCurrent[1].'45', applyZero($current->current_pelanggaran_mobil_syarat_teknis_layak_jalan_sum));
            $sheet->setCellValue($flagCurrent[1].'46', applyZero($current->current_pelanggaran_mobil_tidak_nyala_lampu_malam_sum));
            $sheet->setCellValue($flagCurrent[1].'47', applyZero($current->current_pelanggaran_mobil_berbelok_tanpa_isyarat_sum));
            $sheet->setCellValue($flagCurrent[1].'48', applyZero($current->current_pelanggaran_mobil_berbalapan_di_jalan_raya_sum));
            $sheet->setCellValue($flagCurrent[1].'49', applyZero($current->current_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_sum));
            $sheet->setCellValue($flagCurrent[1].'50', applyZero($current->current_pelanggaran_mobil_melanggar_marka_berhenti_sum));
            $sheet->setCellValue($flagCurrent[1].'51', applyZero($current->current_pelanggaran_mobil_tidak_patuh_perintah_petugas_sum));
            $sheet->setCellValue($flagCurrent[1].'52', applyZero($current->current_pelanggaran_mobil_surat_surat_sum));
            $sheet->setCellValue($flagCurrent[1].'53', applyZero($current->current_pelanggaran_mobil_kelengkapan_kendaraan_sum));
            $sheet->setCellValue($flagCurrent[1].'54', applyZero($current->current_pelanggaran_mobil_lain_lain_sum));

            $sheet->setCellValue($flagCurrent[1].'57', applyZero($current->current_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_sum));

            $sheet->setCellValue($flagCurrent[1].'60', applyZero($current->current_barang_bukti_yg_disita_sim_sum));
            $sheet->setCellValue($flagCurrent[1].'61', applyZero($current->current_barang_bukti_yg_disita_stnk_sum));
            $sheet->setCellValue($flagCurrent[1].'62', applyZero($current->current_barang_bukti_yg_disita_kendaraan_sum));

            $sheet->setCellValue($flagCurrent[1].'65', applyZero($current->current_kendaraan_yang_terlibat_pelanggaran_sepeda_motor_sum));
            $sheet->setCellValue($flagCurrent[1].'66', applyZero($current->current_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_sum));
            $sheet->setCellValue($flagCurrent[1].'67', applyZero($current->current_kendaraan_yang_terlibat_pelanggaran_mobil_bus_sum));
            $sheet->setCellValue($flagCurrent[1].'68', applyZero($current->current_kendaraan_yang_terlibat_pelanggaran_mobil_barang_sum));
            $sheet->setCellValue($flagCurrent[1].'69', applyZero($current->current_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_sum));

            $sheet->setCellValue($flagCurrent[1].'72', applyZero($current->current_profesi_pelaku_pelanggaran_pns_sum));
            $sheet->setCellValue($flagCurrent[1].'73', applyZero($current->current_profesi_pelaku_pelanggaran_karyawan_swasta_sum));
            $sheet->setCellValue($flagCurrent[1].'74', applyZero($current->current_profesi_pelaku_pelanggaran_pelajar_mahasiswa_sum));
            $sheet->setCellValue($flagCurrent[1].'75', applyZero($current->current_profesi_pelaku_pelanggaran_pengemudi_supir_sum));
            $sheet->setCellValue($flagCurrent[1].'76', applyZero($current->current_profesi_pelaku_pelanggaran_tni_sum));
            $sheet->setCellValue($flagCurrent[1].'77', applyZero($current->current_profesi_pelaku_pelanggaran_polri_sum));
            $sheet->setCellValue($flagCurrent[1].'78', applyZero($current->current_profesi_pelaku_pelanggaran_lain_lain_sum));

            $sheet->setCellValue($flagCurrent[1].'81', applyZero($current->current_usia_pelaku_pelanggaran_kurang_dari_15_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'82', applyZero($current->current_usia_pelaku_pelanggaran_16_20_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'83', applyZero($current->current_usia_pelaku_pelanggaran_21_25_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'84', applyZero($current->current_usia_pelaku_pelanggaran_26_30_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'85', applyZero($current->current_usia_pelaku_pelanggaran_31_35_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'86', applyZero($current->current_usia_pelaku_pelanggaran_36_40_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'87', applyZero($current->current_usia_pelaku_pelanggaran_41_45_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'88', applyZero($current->current_usia_pelaku_pelanggaran_46_50_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'89', applyZero($current->current_usia_pelaku_pelanggaran_51_55_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'90', applyZero($current->current_usia_pelaku_pelanggaran_56_60_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'91', applyZero($current->current_usia_pelaku_pelanggaran_diatas_60_tahun_sum));

            $sheet->setCellValue($flagCurrent[1].'94', applyZero($current->current_sim_pelaku_pelanggaran_sim_a_sum));
            $sheet->setCellValue($flagCurrent[1].'95', applyZero($current->current_sim_pelaku_pelanggaran_sim_a_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'96', applyZero($current->current_sim_pelaku_pelanggaran_sim_b1_sum));
            $sheet->setCellValue($flagCurrent[1].'97', applyZero($current->current_sim_pelaku_pelanggaran_sim_b1_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'98', applyZero($current->current_sim_pelaku_pelanggaran_sim_b2_sum));
            $sheet->setCellValue($flagCurrent[1].'99', applyZero($current->current_sim_pelaku_pelanggaran_sim_b2_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'100', applyZero($current->current_sim_pelaku_pelanggaran_sim_c_sum));
            $sheet->setCellValue($flagCurrent[1].'101', applyZero($current->current_sim_pelaku_pelanggaran_sim_d_sum));
            $sheet->setCellValue($flagCurrent[1].'102', applyZero($current->current_sim_pelaku_pelanggaran_sim_internasional_sum));
            $sheet->setCellValue($flagCurrent[1].'103', applyZero($current->current_sim_pelaku_pelanggaran_tanpa_sim_sum));


            $sheet->setCellValue($flagCurrent[1].'107', applyZero($current->current_lokasi_pelanggaran_pemukiman_sum));
            $sheet->setCellValue($flagCurrent[1].'108', applyZero($current->current_lokasi_pelanggaran_perbelanjaan_sum));
            $sheet->setCellValue($flagCurrent[1].'109', applyZero($current->current_lokasi_pelanggaran_perkantoran_sum));
            $sheet->setCellValue($flagCurrent[1].'110', applyZero($current->current_lokasi_pelanggaran_wisata_sum));
            $sheet->setCellValue($flagCurrent[1].'111', applyZero($current->current_lokasi_pelanggaran_industri_sum));

            $sheet->setCellValue($flagCurrent[1].'114', applyZero($current->current_lokasi_pelanggaran_status_jalan_nasional_sum));
            $sheet->setCellValue($flagCurrent[1].'115', applyZero($current->current_lokasi_pelanggaran_status_jalan_propinsi_sum));
            $sheet->setCellValue($flagCurrent[1].'116', applyZero($current->current_lokasi_pelanggaran_status_jalan_kab_kota_sum));
            $sheet->setCellValue($flagCurrent[1].'117', applyZero($current->current_lokasi_pelanggaran_status_jalan_desa_lingkungan_sum));

            $sheet->setCellValue($flagCurrent[1].'120', applyZero($current->current_lokasi_pelanggaran_fungsi_jalan_arteri_sum));
            $sheet->setCellValue($flagCurrent[1].'121', applyZero($current->current_lokasi_pelanggaran_fungsi_jalan_kolektor_sum));
            $sheet->setCellValue($flagCurrent[1].'122', applyZero($current->current_lokasi_pelanggaran_fungsi_jalan_lokal_sum));
            $sheet->setCellValue($flagCurrent[1].'123', applyZero($current->current_lokasi_pelanggaran_fungsi_jalan_lingkungan_sum));

            $sheet->setCellValue($flagCurrent[1].'127', applyZero($current->current_kecelakaan_lalin_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'128', applyZero($current->current_kecelakaan_lalin_jumlah_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'129', applyZero($current->current_kecelakaan_lalin_jumlah_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'130', applyZero($current->current_kecelakaan_lalin_jumlah_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'131', applyZero($current->current_kecelakaan_lalin_jumlah_kerugian_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'133', applyZero($current->current_kecelakaan_barang_bukti_yg_disita_sim_sum));
            $sheet->setCellValue($flagCurrent[1].'134', applyZero($current->current_kecelakaan_barang_bukti_yg_disita_stnk_sum));
            $sheet->setCellValue($flagCurrent[1].'135', applyZero($current->current_kecelakaan_barang_bukti_yg_disita_kendaraan_sum));

            $sheet->setCellValue($flagCurrent[1].'138', applyZero($current->current_profesi_korban_kecelakaan_lalin_pns_sum));
            $sheet->setCellValue($flagCurrent[1].'139', applyZero($current->current_profesi_korban_kecelakaan_lalin_karwayan_swasta_sum));
            $sheet->setCellValue($flagCurrent[1].'140', applyZero($current->current_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_sum));
            $sheet->setCellValue($flagCurrent[1].'141', applyZero($current->current_profesi_korban_kecelakaan_lalin_pengemudi_sum));
            $sheet->setCellValue($flagCurrent[1].'142', applyZero($current->current_profesi_korban_kecelakaan_lalin_tni_sum));
            $sheet->setCellValue($flagCurrent[1].'143', applyZero($current->current_profesi_korban_kecelakaan_lalin_polri_sum));
            $sheet->setCellValue($flagCurrent[1].'144', applyZero($current->current_profesi_korban_kecelakaan_lalin_lain_lain_sum));

            $sheet->setCellValue($flagCurrent[1].'147', applyZero($current->current_usia_korban_kecelakaan_kurang_15_sum));
            $sheet->setCellValue($flagCurrent[1].'148', applyZero($current->current_usia_korban_kecelakaan_16_20_sum));
            $sheet->setCellValue($flagCurrent[1].'149', applyZero($current->current_usia_korban_kecelakaan_21_25_sum));
            $sheet->setCellValue($flagCurrent[1].'150', applyZero($current->current_usia_korban_kecelakaan_26_30_sum));
            $sheet->setCellValue($flagCurrent[1].'151', applyZero($current->current_usia_korban_kecelakaan_31_35_sum));
            $sheet->setCellValue($flagCurrent[1].'152', applyZero($current->current_usia_korban_kecelakaan_36_40_sum));
            $sheet->setCellValue($flagCurrent[1].'153', applyZero($current->current_usia_korban_kecelakaan_41_45_sum));
            $sheet->setCellValue($flagCurrent[1].'154', applyZero($current->current_usia_korban_kecelakaan_45_50_sum));
            $sheet->setCellValue($flagCurrent[1].'155', applyZero($current->current_usia_korban_kecelakaan_51_55_sum));
            $sheet->setCellValue($flagCurrent[1].'156', applyZero($current->current_usia_korban_kecelakaan_56_60_sum));
            $sheet->setCellValue($flagCurrent[1].'157', applyZero($current->current_usia_korban_kecelakaan_diatas_60_sum));

            $sheet->setCellValue($flagCurrent[1].'160', applyZero($current->current_sim_korban_kecelakaan_sim_a_sum));
            $sheet->setCellValue($flagCurrent[1].'161', applyZero($current->current_sim_korban_kecelakaan_sim_a_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'162', applyZero($current->current_sim_korban_kecelakaan_sim_b1_sum));
            $sheet->setCellValue($flagCurrent[1].'163', applyZero($current->current_sim_korban_kecelakaan_sim_b1_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'164', applyZero($current->current_sim_korban_kecelakaan_sim_b2_sum));
            $sheet->setCellValue($flagCurrent[1].'165', applyZero($current->current_sim_korban_kecelakaan_sim_b2_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'166', applyZero($current->current_sim_korban_kecelakaan_sim_c_sum));
            $sheet->setCellValue($flagCurrent[1].'167', applyZero($current->current_sim_korban_kecelakaan_sim_d_sum));
            $sheet->setCellValue($flagCurrent[1].'168', applyZero($current->current_sim_korban_kecelakaan_sim_internasional_sum));
            $sheet->setCellValue($flagCurrent[1].'169', applyZero($current->current_sim_korban_kecelakaan_tanpa_sim_sum));

            $sheet->setCellValue($flagCurrent[1].'172', applyZero($current->current_kendaraan_yg_terlibat_kecelakaan_sepeda_motor_sum));
            $sheet->setCellValue($flagCurrent[1].'173', applyZero($current->current_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_sum));
            $sheet->setCellValue($flagCurrent[1].'174', applyZero($current->current_kendaraan_yg_terlibat_kecelakaan_mobil_bus_sum));
            $sheet->setCellValue($flagCurrent[1].'175', applyZero($current->current_kendaraan_yg_terlibat_kecelakaan_mobil_barang_sum));
            $sheet->setCellValue($flagCurrent[1].'176', applyZero($current->current_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_sum));
            $sheet->setCellValue($flagCurrent[1].'177', applyZero($current->current_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_sum));

            $sheet->setCellValue($flagCurrent[1].'180', applyZero($current->current_jenis_kecelakaan_tunggal_ooc_sum));
            $sheet->setCellValue($flagCurrent[1].'181', applyZero($current->current_jenis_kecelakaan_depan_depan_sum));
            $sheet->setCellValue($flagCurrent[1].'182', applyZero($current->current_jenis_kecelakaan_depan_belakang_sum));
            $sheet->setCellValue($flagCurrent[1].'183', applyZero($current->current_jenis_kecelakaan_depan_samping_sum));
            $sheet->setCellValue($flagCurrent[1].'184', applyZero($current->current_jenis_kecelakaan_beruntun_sum));
            $sheet->setCellValue($flagCurrent[1].'185', applyZero($current->current_jenis_kecelakaan_pejalan_kaki_sum));
            $sheet->setCellValue($flagCurrent[1].'186', applyZero($current->current_jenis_kecelakaan_tabrak_lari_sum));
            $sheet->setCellValue($flagCurrent[1].'187', applyZero($current->current_jenis_kecelakaan_tabrak_hewan_sum));
            $sheet->setCellValue($flagCurrent[1].'188', applyZero($current->current_jenis_kecelakaan_samping_samping_sum));
            $sheet->setCellValue($flagCurrent[1].'189', applyZero($current->current_jenis_kecelakaan_lainnya_sum));

            $sheet->setCellValue($flagCurrent[1].'192', applyZero($current->current_profesi_pelaku_kecelakaan_lalin_pns_sum));
            $sheet->setCellValue($flagCurrent[1].'193', applyZero($current->current_profesi_pelaku_kecelakaan_lalin_karyawan_swasta_sum));
            $sheet->setCellValue($flagCurrent[1].'194', applyZero($current->current_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_sum));
            $sheet->setCellValue($flagCurrent[1].'195', applyZero($current->current_profesi_pelaku_kecelakaan_lalin_pengemudi_sum));
            $sheet->setCellValue($flagCurrent[1].'196', applyZero($current->current_profesi_pelaku_kecelakaan_lalin_tni_sum));
            $sheet->setCellValue($flagCurrent[1].'197', applyZero($current->current_profesi_pelaku_kecelakaan_lalin_polri_sum));
            $sheet->setCellValue($flagCurrent[1].'198', applyZero($current->current_profesi_pelaku_kecelakaan_lalin_lain_lain_sum));

            $sheet->setCellValue($flagCurrent[1].'201', applyZero($current->current_usia_pelaku_kecelakaan_kurang_dari_15_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'202', applyZero($current->current_usia_pelaku_kecelakaan_16_20_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'203', applyZero($current->current_usia_pelaku_kecelakaan_21_25_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'204', applyZero($current->current_usia_pelaku_kecelakaan_26_30_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'205', applyZero($current->current_usia_pelaku_kecelakaan_31_35_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'206', applyZero($current->current_usia_pelaku_kecelakaan_36_40_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'207', applyZero($current->current_usia_pelaku_kecelakaan_41_45_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'208', applyZero($current->current_usia_pelaku_kecelakaan_46_50_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'209', applyZero($current->current_usia_pelaku_kecelakaan_51_55_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'210', applyZero($current->current_usia_pelaku_kecelakaan_56_60_tahun_sum));
            $sheet->setCellValue($flagCurrent[1].'211', applyZero($current->current_usia_pelaku_kecelakaan_diatas_60_tahun_sum));

            $sheet->setCellValue($flagCurrent[1].'214', applyZero($current->current_sim_pelaku_kecelakaan_sim_a_sum));
            $sheet->setCellValue($flagCurrent[1].'215', applyZero($current->current_sim_pelaku_kecelakaan_sim_a_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'216', applyZero($current->current_sim_pelaku_kecelakaan_sim_b1_sum));
            $sheet->setCellValue($flagCurrent[1].'217', applyZero($current->current_sim_pelaku_kecelakaan_sim_b1_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'218', applyZero($current->current_sim_pelaku_kecelakaan_sim_b2_sum));
            $sheet->setCellValue($flagCurrent[1].'219', applyZero($current->current_sim_pelaku_kecelakaan_sim_b2_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'220', applyZero($current->current_sim_pelaku_kecelakaan_sim_c_sum));
            $sheet->setCellValue($flagCurrent[1].'221', applyZero($current->current_sim_pelaku_kecelakaan_sim_d_sum));
            $sheet->setCellValue($flagCurrent[1].'222', applyZero($current->current_sim_pelaku_kecelakaan_sim_internasional_sum));
            $sheet->setCellValue($flagCurrent[1].'223', applyZero($current->current_sim_pelaku_kecelakaan_tanpa_sim_sum));

            $sheet->setCellValue($flagCurrent[1].'227', applyZero($current->current_lokasi_kecelakaan_lalin_pemukiman_sum));
            $sheet->setCellValue($flagCurrent[1].'228', applyZero($current->current_lokasi_kecelakaan_lalin_perbelanjaan_sum));
            $sheet->setCellValue($flagCurrent[1].'229', applyZero($current->current_lokasi_kecelakaan_lalin_perkantoran_sum));
            $sheet->setCellValue($flagCurrent[1].'230', applyZero($current->current_lokasi_kecelakaan_lalin_wisata_sum));
            $sheet->setCellValue($flagCurrent[1].'231', applyZero($current->current_lokasi_kecelakaan_lalin_industri_sum));
            $sheet->setCellValue($flagCurrent[1].'232', applyZero($current->current_lokasi_kecelakaan_lalin_lain_lain_sum));

            $sheet->setCellValue($flagCurrent[1].'235', applyZero($current->current_lokasi_kecelakaan_status_jalan_nasional_sum));
            $sheet->setCellValue($flagCurrent[1].'236', applyZero($current->current_lokasi_kecelakaan_status_jalan_propinsi_sum));
            $sheet->setCellValue($flagCurrent[1].'237', applyZero($current->current_lokasi_kecelakaan_status_jalan_kab_kota_sum));
            $sheet->setCellValue($flagCurrent[1].'238', applyZero($current->current_lokasi_kecelakaan_status_jalan_desa_lingkungan_sum));

            $sheet->setCellValue($flagCurrent[1].'241', applyZero($current->current_lokasi_kecelakaan_fungsi_jalan_arteri_sum));
            $sheet->setCellValue($flagCurrent[1].'242', applyZero($current->current_lokasi_kecelakaan_fungsi_jalan_kolektor_sum));
            $sheet->setCellValue($flagCurrent[1].'243', applyZero($current->current_lokasi_kecelakaan_fungsi_jalan_lokal_sum));
            $sheet->setCellValue($flagCurrent[1].'244', applyZero($current->current_lokasi_kecelakaan_fungsi_jalan_lingkungan_sum));

            $sheet->setCellValue($flagCurrent[1].'247', applyZero($current->current_faktor_penyebab_kecelakaan_manusia_sum));
            $sheet->setCellValue($flagCurrent[1].'248', applyZero($current->current_faktor_penyebab_kecelakaan_ngantuk_lelah_sum));
            $sheet->setCellValue($flagCurrent[1].'249', applyZero($current->current_faktor_penyebab_kecelakaan_mabuk_obat_sum));
            $sheet->setCellValue($flagCurrent[1].'250', applyZero($current->current_faktor_penyebab_kecelakaan_sakit_sum));
            $sheet->setCellValue($flagCurrent[1].'251', applyZero($current->current_faktor_penyebab_kecelakaan_handphone_elektronik_sum));
            $sheet->setCellValue($flagCurrent[1].'252', applyZero($current->current_faktor_penyebab_kecelakaan_menerobos_lampu_merah_sum));
            $sheet->setCellValue($flagCurrent[1].'253', applyZero($current->current_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_sum));
            $sheet->setCellValue($flagCurrent[1].'254', applyZero($current->current_faktor_penyebab_kecelakaan_tidak_menjaga_jarak_sum));
            $sheet->setCellValue($flagCurrent[1].'255', applyZero($current->current_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_sum));
            $sheet->setCellValue($flagCurrent[1].'256', applyZero($current->current_faktor_penyebab_kecelakaan_berpindah_jalur_sum));
            $sheet->setCellValue($flagCurrent[1].'257', applyZero($current->current_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_sum));
            $sheet->setCellValue($flagCurrent[1].'258', applyZero($current->current_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_sum));
            $sheet->setCellValue($flagCurrent[1].'259', applyZero($current->current_faktor_penyebab_kecelakaan_lainnya_sum));
            $sheet->setCellValue($flagCurrent[1].'260', applyZero($current->current_faktor_penyebab_kecelakaan_alam_sum));
            $sheet->setCellValue($flagCurrent[1].'261', applyZero($current->current_faktor_penyebab_kecelakaan_kelaikan_kendaraan_sum));
            $sheet->setCellValue($flagCurrent[1].'262', applyZero($current->current_faktor_penyebab_kecelakaan_kondisi_jalan_sum));
            $sheet->setCellValue($flagCurrent[1].'263', applyZero($current->current_faktor_penyebab_kecelakaan_prasarana_jalan_sum));
            $sheet->setCellValue($flagCurrent[1].'264', applyZero($current->current_faktor_penyebab_kecelakaan_rambu_sum));
            $sheet->setCellValue($flagCurrent[1].'265', applyZero($current->current_faktor_penyebab_kecelakaan_marka_sum));
            $sheet->setCellValue($flagCurrent[1].'266', applyZero($current->current_faktor_penyebab_kecelakaan_apil_sum));
            $sheet->setCellValue($flagCurrent[1].'267', applyZero($current->current_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_sum));

            $sheet->setCellValue($flagCurrent[1].'270', applyZero($current->current_waktu_kejadian_kecelakaan_00_03_sum));
            $sheet->setCellValue($flagCurrent[1].'271', applyZero($current->current_waktu_kejadian_kecelakaan_03_06_sum));
            $sheet->setCellValue($flagCurrent[1].'272', applyZero($current->current_waktu_kejadian_kecelakaan_06_09_sum));
            $sheet->setCellValue($flagCurrent[1].'273', applyZero($current->current_waktu_kejadian_kecelakaan_09_12_sum));
            $sheet->setCellValue($flagCurrent[1].'274', applyZero($current->current_waktu_kejadian_kecelakaan_12_15_sum));
            $sheet->setCellValue($flagCurrent[1].'275', applyZero($current->current_waktu_kejadian_kecelakaan_15_18_sum));
            $sheet->setCellValue($flagCurrent[1].'276', applyZero($current->current_waktu_kejadian_kecelakaan_18_21_sum));
            $sheet->setCellValue($flagCurrent[1].'277', applyZero($current->current_waktu_kejadian_kecelakaan_21_24_sum));

            $sheet->setCellValue($flagCurrent[1].'280', applyZero($current->current_kecelakaan_lalin_menonjol_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'281', applyZero($current->current_kecelakaan_lalin_menonjol_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'282', applyZero($current->current_kecelakaan_lalin_menonjol_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'283', applyZero($current->current_kecelakaan_lalin_menonjol_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'284', applyZero($current->current_kecelakaan_lalin_menonjol_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'286', applyZero($current->current_kecelakaan_lalin_tunggal_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'287', applyZero($current->current_kecelakaan_lalin_tunggal_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'288', applyZero($current->current_kecelakaan_lalin_tunggal_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'289', applyZero($current->current_kecelakaan_lalin_tunggal_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'290', applyZero($current->current_kecelakaan_lalin_tunggal_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'292', applyZero($current->current_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'293', applyZero($current->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'294', applyZero($current->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'295', applyZero($current->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'296', applyZero($current->current_kecelakaan_lalin_tabrak_pejalan_kaki_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'298', applyZero($current->current_kecelakaan_lalin_tabrak_lari_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'299', applyZero($current->current_kecelakaan_lalin_tabrak_lari_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'300', applyZero($current->current_kecelakaan_lalin_tabrak_lari_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'301', applyZero($current->current_kecelakaan_lalin_tabrak_lari_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'302', applyZero($current->current_kecelakaan_lalin_tabrak_lari_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'304', applyZero($current->current_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'305', applyZero($current->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'306', applyZero($current->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'307', applyZero($current->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'308', applyZero($current->current_kecelakaan_lalin_tabrak_sepeda_motor_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'310', applyZero($current->current_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'311', applyZero($current->current_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'312', applyZero($current->current_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'313', applyZero($current->current_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'314', applyZero($current->current_kecelakaan_lalin_tabrak_roda_empat_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'316', applyZero($current->current_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'317', applyZero($current->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'318', applyZero($current->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'319', applyZero($current->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'320', applyZero($current->current_kecelakaan_lalin_tabrak_tidak_bermotor_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'322', applyZero($current->current_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_sum));
            $sheet->setCellValue($flagCurrent[1].'323', applyZero($current->current_kecelakaan_lalin_perlintasan_ka_berpalang_pintu_sum));
            $sheet->setCellValue($flagCurrent[1].'324', applyZero($current->current_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_sum));
            $sheet->setCellValue($flagCurrent[1].'325', applyZero($current->current_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_sum));
            $sheet->setCellValue($flagCurrent[1].'326', applyZero($current->current_kecelakaan_lalin_perlintasan_ka_korban_luka_berat_sum));
            $sheet->setCellValue($flagCurrent[1].'327', applyZero($current->current_kecelakaan_lalin_perlintasan_ka_korban_meninggal_sum));
            $sheet->setCellValue($flagCurrent[1].'328', applyZero($current->current_kecelakaan_lalin_perlintasan_ka_materiil_sum));

            $sheet->setCellValue($flagCurrent[1].'330', applyZero($current->current_kecelakaan_transportasi_kereta_api_sum));
            $sheet->setCellValue($flagCurrent[1].'331', applyZero($current->current_kecelakaan_transportasi_laut_perairan_sum));
            $sheet->setCellValue($flagCurrent[1].'332', applyZero($current->current_kecelakaan_transportasi_udara_sum));

            $sheet->setCellValue($flagCurrent[1].'337', applyZero($current->current_penlu_melalui_media_cetak_sum));
            $sheet->setCellValue($flagCurrent[1].'338', applyZero($current->current_penlu_melalui_media_elektronik_sum));
            $sheet->setCellValue($flagCurrent[1].'339', applyZero($current->current_penlu_melalui_media_sosial_sum));
            $sheet->setCellValue($flagCurrent[1].'340', applyZero($current->current_penlu_melalui_tempat_keramaian_sum));
            $sheet->setCellValue($flagCurrent[1].'341', applyZero($current->current_penlu_melalui_tempat_istirahat_sum));
            $sheet->setCellValue($flagCurrent[1].'342', applyZero($current->current_penlu_melalui_daerah_rawan_laka_dan_langgar_sum));

            $sheet->setCellValue($flagCurrent[1].'345', applyZero($current->current_penyebaran_pemasangan_spanduk_sum));
            $sheet->setCellValue($flagCurrent[1].'346', applyZero($current->current_penyebaran_pemasangan_leaflet_sum));
            $sheet->setCellValue($flagCurrent[1].'347', applyZero($current->current_penyebaran_pemasangan_sticker_sum));
            $sheet->setCellValue($flagCurrent[1].'348', applyZero($current->current_penyebaran_pemasangan_bilboard_sum));

            $sheet->setCellValue($flagCurrent[1].'351', applyZero($current->current_polisi_sahabat_anak_sum));
            $sheet->setCellValue($flagCurrent[1].'352', applyZero($current->current_cara_aman_sekolah_sum));
            $sheet->setCellValue($flagCurrent[1].'353', applyZero($current->current_patroli_keamanan_sekolah_sum));
            $sheet->setCellValue($flagCurrent[1].'354', applyZero($current->current_pramuka_bhayangkara_krida_lalu_lintas_sum));

            $sheet->setCellValue($flagCurrent[1].'357', applyZero($current->current_police_goes_to_campus_sum));
            $sheet->setCellValue($flagCurrent[1].'358', applyZero($current->current_safety_riding_driving_sum));
            $sheet->setCellValue($flagCurrent[1].'359', applyZero($current->current_forum_lalu_lintas_angkutan_umum_sum));
            $sheet->setCellValue($flagCurrent[1].'360', applyZero($current->current_kampanye_keselamatan_sum));
            $sheet->setCellValue($flagCurrent[1].'361', applyZero($current->current_sekolah_mengemudi_sum));
            $sheet->setCellValue($flagCurrent[1].'362', applyZero($current->current_taman_lalu_lintas_sum));
            $sheet->setCellValue($flagCurrent[1].'363', applyZero($current->current_global_road_safety_partnership_action_sum));

            $sheet->setCellValue($flagCurrent[1].'367', applyZero($current->current_giat_lantas_pengaturan_sum));
            $sheet->setCellValue($flagCurrent[1].'368', applyZero($current->current_giat_lantas_penjagaan_sum));
            $sheet->setCellValue($flagCurrent[1].'369', applyZero($current->current_giat_lantas_pengawalan_sum));
            $sheet->setCellValue($flagCurrent[1].'370', applyZero($current->current_giat_lantas_patroli_sum));

            $sheet->setCellValue($flagCurrent[1].'375', applyZero($current->current_arus_mudik_jumlah_bus_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'376', applyZero($current->current_arus_mudik_jumlah_penumpang_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'377', applyZero($current->current_arus_mudik_jumlah_bus_kedatangan_sum));
            $sheet->setCellValue($flagCurrent[1].'378', applyZero($current->current_arus_mudik_jumlah_penumpang_kedatangan_sum));

            $sheet->setCellValue($flagCurrent[1].'379', applyZero($current->current_arus_mudik_total_terminal_sum));
            $sheet->setCellValue($flagCurrent[1].'380', applyZero($current->current_arus_mudik_total_bus_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'381', applyZero($current->current_arus_mudik_penumpang_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'382', applyZero($current->current_arus_mudik_total_bus_kedatangan_sum));
            $sheet->setCellValue($flagCurrent[1].'383', applyZero($current->current_arus_mudik_penumpang_kedatangan_sum));

            $sheet->setCellValue($flagCurrent[1].'385', applyZero($current->current_arus_mudik_kereta_api_total_stasiun_sum));
            $sheet->setCellValue($flagCurrent[1].'386', applyZero($current->current_arus_mudik_kereta_api_total_penumpang_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'387', applyZero($current->current_arus_mudik_kereta_api_total_penumpang_kedatangan_sum));

            $sheet->setCellValue($flagCurrent[1].'389', applyZero($current->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'390', applyZero($current->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_sum));
            $sheet->setCellValue($flagCurrent[1].'391', applyZero($current->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_sum));
            $sheet->setCellValue($flagCurrent[1].'392', applyZero($current->current_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'393', applyZero($current->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_sum));
            $sheet->setCellValue($flagCurrent[1].'394', applyZero($current->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_sum));
            $sheet->setCellValue($flagCurrent[1].'395', applyZero($current->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_sum));
            $sheet->setCellValue($flagCurrent[1].'396', applyZero($current->current_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_sum));

            $sheet->setCellValue($flagCurrent[1].'397', applyZero($current->current_arus_mudik_total_pelabuhan_sum));
            $sheet->setCellValue($flagCurrent[1].'398', applyZero($current->current_arus_mudik_pelabuhan_kendaraan_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'399', applyZero($current->current_arus_mudik_pelabuhan_kendaraan_kedatangan_sum));
            $sheet->setCellValue($flagCurrent[1].'400', applyZero($current->current_arus_mudik_pelabuhan_total_penumpang_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'401', applyZero($current->current_arus_mudik_pelabuhan_total_penumpang_kedatangan_sum));

            $sheet->setCellValue($flagCurrent[1].'403', applyZero($current->current_arus_mudik_bandara_jumlah_penumpang_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'404', applyZero($current->current_arus_mudik_bandara_jumlah_penumpang_kedatangan_sum));

            $sheet->setCellValue($flagCurrent[1].'405', applyZero($current->current_arus_mudik_total_bandara_sum));
            $sheet->setCellValue($flagCurrent[1].'406', applyZero($current->current_arus_mudik_bandara_total_penumpang_keberangkatan_sum));
            $sheet->setCellValue($flagCurrent[1].'407', applyZero($current->current_arus_mudik_bandara_total_penumpang_kedatangan_sum));

            $sheet->setCellValue($flagCurrent[1].'410', applyZero($current->current_prokes_covid_teguran_gar_prokes_sum));
            $sheet->setCellValue($flagCurrent[1].'411', applyZero($current->current_prokes_covid_pembagian_masker_sum));
            $sheet->setCellValue($flagCurrent[1].'412', applyZero($current->current_prokes_covid_sosialisasi_tentang_prokes_sum));
            $sheet->setCellValue($flagCurrent[1].'413', applyZero($current->current_prokes_covid_giat_baksos_sum));
        }

        $sheet->setCellValue("BS".$flagRowTahun, $prev_year);
        $sheet->setCellValue("BT".$flagRowTahun, $current_year);

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}

if (! function_exists('calculateExcelCol')) {
    function calculateExcelCol($payload) {
        //
    }
}