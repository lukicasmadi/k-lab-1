<?php

namespace App\Http\Controllers;

use App\Exports\NewExport;
use App\Models\DailyRekap;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Requests\DailyRekapRequest;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Requests\DailyRekapEditRequest;

class DailyRekapController extends Controller
{

    public function dailyRekapExcel($uuid)
    {
        $model = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        if(empty($model)) {
            flash('Laporan tidak ditemukan. Pastikan filter yang anda atur sudah sesuai!')->warning();
            return redirect()->back();
        }

        $polda = $model->polda;
        $year = $model->year;
        $rencana_operartion_id = $model->rencana_operasi_id;
        $config_date = $model->config_date;
        $start_date = $model->operation_date_start;
        $end_date = $model->operation_date_end;
        $prevYear = $year - 1;

        $prev = reportDailyPrev($polda, $prevYear, $rencana_operartion_id, $config_date, $start_date, $end_date);
        $current = reportDailyCurrent($polda, $year, $rencana_operartion_id, $config_date, $start_date, $end_date);

        $excelPath = public_path('template/excel');
        $excelTemplate = $excelPath."/format_laporan_operasi_2021.xlsx";

        //load spreadsheet
        $spreadsheet = IOFactory::load($excelTemplate);

        $now = now()->format("Y-m-d");
        $filename = 'report-'.$now;

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');

        //change it
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A6', 'KESATUAN :  '); //NAMA KESATUAN
        $sheet->setCellValue('E417', 'Jakarta, 13 April 2021'); // TEMPAT, TANGGAL
        $sheet->setCellValue('E424', 'NAMA XXXX'); // NAMA
        $sheet->setCellValue('E425', 'AKP NRP 83099999'); //PANGKAT & NRP
        $sheet->setCellValue('E419', 'KAPOSKO'); //JABATAN
        $sheet->setCellValue('A5', 'LAPORAN HARIAN OPS KESELAMATAN TAHUN 2020'); // NAMA LAPORAN
        $sheet->setCellValue('A7', 'HARI/TGL : '); // DIISI HARI TGL

        $sheet->setCellValue('C14', $prev->pelanggaran_lalu_lintas_tilang);
        $sheet->setCellValue('D14', $current->pelanggaran_lalu_lintas_tilang);

        $sheet->setCellValue('C15', $prev->pelanggaran_lalu_lintas_teguran);
        $sheet->setCellValue('D15', $current->pelanggaran_lalu_lintas_teguran);

        $sheet->setCellValue('C20', $prev->pelanggaran_sepeda_motor_gun_helm_sni);
        $sheet->setCellValue('D20', $current->pelanggaran_sepeda_motor_gun_helm_sni);

        $sheet->setCellValue('C23', $prev->pelanggaran_sepeda_motor_melawan_arus);
        $sheet->setCellValue('D23', $current->pelanggaran_sepeda_motor_melawan_arus);

        $sheet->setCellValue('C35', $prev->pelanggaran_sepeda_motor_lain_lain);
        $sheet->setCellValue('D35', $current->pelanggaran_sepeda_motor_lain_lain);

        $sheet->setCellValue('C60', $prev->barang_bukti_yg_disita_sim);
        $sheet->setCellValue('D60', $current->barang_bukti_yg_disita_sim);

        $sheet->setCellValue('C61', $prev->barang_bukti_yg_disita_stnk);
        $sheet->setCellValue('D61', $current->barang_bukti_yg_disita_stnk);

        $sheet->setCellValue('C62', $prev->barang_bukti_yg_disita_kendaraan);
        $sheet->setCellValue('D62', $current->barang_bukti_yg_disita_kendaraan);

        $sheet->setCellValue('C65', $prev->kendaraan_yang_terlibat_pelanggaran_sepeda_motor);
        $sheet->setCellValue('D65', $current->kendaraan_yang_terlibat_pelanggaran_sepeda_motor);

        $sheet->setCellValue('C66', $prev->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang);
        $sheet->setCellValue('D66', $current->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang);

        $sheet->setCellValue('C67', $prev->kendaraan_yang_terlibat_pelanggaran_mobil_bus);
        $sheet->setCellValue('D67', $current->kendaraan_yang_terlibat_pelanggaran_mobil_bus);

        $sheet->setCellValue('C68', $prev->kendaraan_yang_terlibat_pelanggaran_mobil_barang);
        $sheet->setCellValue('D68', $current->kendaraan_yang_terlibat_pelanggaran_mobil_barang);

        $sheet->setCellValue('C69', $prev->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus);
        $sheet->setCellValue('D69', $current->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus);

        $sheet->setCellValue('C72', $prev->profesi_pelaku_pelanggaran_pns);
        $sheet->setCellValue('D72', $current->profesi_pelaku_pelanggaran_pns);

        $sheet->setCellValue('C73', $prev->profesi_pelaku_pelanggaran_karyawan_swasta);
        $sheet->setCellValue('D73', $current->profesi_pelaku_pelanggaran_karyawan_swasta);

        $sheet->setCellValue('C74', $prev->profesi_pelaku_pelanggaran_pelajar_mahasiswa);
        $sheet->setCellValue('D74', $current->profesi_pelaku_pelanggaran_pelajar_mahasiswa);

        $sheet->setCellValue('C75', $prev->profesi_pelaku_pelanggaran_pengemudi_supir);
        $sheet->setCellValue('D75', $current->profesi_pelaku_pelanggaran_pengemudi_supir);

        $sheet->setCellValue('C76', $prev->profesi_pelaku_pelanggaran_tni);
        $sheet->setCellValue('D76', $current->profesi_pelaku_pelanggaran_tni);

        $sheet->setCellValue('C77', $prev->profesi_pelaku_pelanggaran_polri);
        $sheet->setCellValue('D77', $current->profesi_pelaku_pelanggaran_polri);

        $sheet->setCellValue('C78', $prev->profesi_pelaku_pelanggaran_lain_lain);
        $sheet->setCellValue('D78', $current->profesi_pelaku_pelanggaran_lain_lain);

        $sheet->setCellValue('C81', $prev->usia_pelaku_pelanggaran_kurang_dari_15_tahun);
        $sheet->setCellValue('D81', $current->usia_pelaku_pelanggaran_kurang_dari_15_tahun);

        $sheet->setCellValue('C82', $prev->usia_pelaku_pelanggaran_16_20_tahun);
        $sheet->setCellValue('D82', $current->usia_pelaku_pelanggaran_16_20_tahun);

        $sheet->setCellValue('C83', $prev->usia_pelaku_pelanggaran_21_25_tahun);
        $sheet->setCellValue('D83', $current->usia_pelaku_pelanggaran_21_25_tahun);

        $sheet->setCellValue('C84', $prev->usia_pelaku_pelanggaran_26_30_tahun);
        $sheet->setCellValue('D84', $current->usia_pelaku_pelanggaran_26_30_tahun);

        $sheet->setCellValue('C85', $prev->usia_pelaku_pelanggaran_31_35_tahun);
        $sheet->setCellValue('D85', $current->usia_pelaku_pelanggaran_31_35_tahun);

        $sheet->setCellValue('C86', $prev->usia_pelaku_pelanggaran_36_40_tahun);
        $sheet->setCellValue('D86', $current->usia_pelaku_pelanggaran_36_40_tahun);

        $sheet->setCellValue('C87', $prev->uusia_pelaku_pelanggaran_41_45_tahun);
        $sheet->setCellValue('D87', $current->usia_pelaku_pelanggaran_41_45_tahun);

        $sheet->setCellValue('C88', $prev->usia_pelaku_pelanggaran_46_50_tahunn);
        $sheet->setCellValue('D88', $current->usia_pelaku_pelanggaran_46_50_tahun);

        $sheet->setCellValue('C89', $prev->usia_pelaku_pelanggaran_51_55_tahunn);
        $sheet->setCellValue('D89', $current->usia_pelaku_pelanggaran_51_55_tahun);

        $sheet->setCellValue('C90', $prev->usia_pelaku_pelanggaran_56_60_tahun);
        $sheet->setCellValue('D90', $current->usia_pelaku_pelanggaran_56_60_tahun);

        $sheet->setCellValue('C91', $prev->usia_pelaku_pelanggaran_diatas_60_tahun);
        $sheet->setCellValue('D91', $current->usia_pelaku_pelanggaran_diatas_60_tahun);

        $sheet->setCellValue('C94', $prev->sim_pelaku_pelanggaran_sim_a);
        $sheet->setCellValue('D94', $current->sim_pelaku_pelanggaran_sim_a);

        $sheet->setCellValue('C95', $prev->sim_pelaku_pelanggaran_sim_a_umum);
        $sheet->setCellValue('D95', $current->sim_pelaku_pelanggaran_sim_a_umum);

        $sheet->setCellValue('C96', $prev->sim_pelaku_pelanggaran_sim_b1);
        $sheet->setCellValue('D96', $current->sim_pelaku_pelanggaran_sim_b1);

        $sheet->setCellValue('C97', $prev->sim_pelaku_pelanggaran_sim_b1_umum);
        $sheet->setCellValue('D97', $current->sim_pelaku_pelanggaran_sim_b1_umum);

        $sheet->setCellValue('C98', $prev->sim_pelaku_pelanggaran_sim_b2);
        $sheet->setCellValue('D98', $current->sim_pelaku_pelanggaran_sim_b2);

        $sheet->setCellValue('C99', $prev->sim_pelaku_pelanggaran_sim_b2_umum);
        $sheet->setCellValue('D99', $current->sim_pelaku_pelanggaran_sim_b2_umum);

        $sheet->setCellValue('C100', $prev->sim_pelaku_pelanggaran_sim_c);
        $sheet->setCellValue('D100', $current->sim_pelaku_pelanggaran_sim_c);

        $sheet->setCellValue('C101', $prev->sim_pelaku_pelanggaran_sim_d);
        $sheet->setCellValue('D101', $current->sim_pelaku_pelanggaran_sim_d);

        $sheet->setCellValue('C102', $prev->sim_pelaku_pelanggaran_sim_internasional);
        $sheet->setCellValue('D102', $current->sim_pelaku_pelanggaran_sim_internasional);

        $sheet->setCellValue('C103', $prev->sim_pelaku_pelanggaran_tanpa_sim);
        $sheet->setCellValue('D103', $current->sim_pelaku_pelanggaran_tanpa_sim);

        $sheet->setCellValue('C107', $prev->lokasi_pelanggaran_pemukiman);
        $sheet->setCellValue('D107', $current->lokasi_pelanggaran_pemukiman);

        $sheet->setCellValue('C108', $prev->lokasi_pelanggaran_perbelanjaan);
        $sheet->setCellValue('D108', $current->lokasi_pelanggaran_perbelanjaan);

        $sheet->setCellValue('C109', $prev->lokasi_pelanggaran_perkantoran);
        $sheet->setCellValue('D109', $current->lokasi_pelanggaran_perkantoran);

        $sheet->setCellValue('C110', $prev->lokasi_pelanggaran_wisata);
        $sheet->setCellValue('D110', $current->lokasi_pelanggaran_wisata);

        $sheet->setCellValue('C111', $prev->lokasi_pelanggaran_industri);
        $sheet->setCellValue('D111', $current->lokasi_pelanggaran_industri);

        $sheet->setCellValue('C114', $prev->lokasi_pelanggaran_status_jalan_nasional);
        $sheet->setCellValue('D114', $current->lokasi_pelanggaran_status_jalan_nasional);

        $sheet->setCellValue('C115', $prev->lokasi_pelanggaran_status_jalan_propinsi);
        $sheet->setCellValue('D115', $current->lokasi_pelanggaran_status_jalan_propinsi);

        $sheet->setCellValue('C116', $prev->lokasi_pelanggaran_status_jalan_kab_kota);
        $sheet->setCellValue('D116', $current->lokasi_pelanggaran_status_jalan_kab_kota);

        $sheet->setCellValue('C117', $prev->lokasi_pelanggaran_status_jalan_desa_lingkungan);
        $sheet->setCellValue('D117', $current->lokasi_pelanggaran_status_jalan_desa_lingkungan);

        $sheet->setCellValue('C120', $prev->lokasi_pelanggaran_fungsi_jalan_arteri);
        $sheet->setCellValue('D120', $current->lokasi_pelanggaran_fungsi_jalan_arteri);

        $sheet->setCellValue('C121', $prev->lokasi_pelanggaran_fungsi_jalan_kolektor);
        $sheet->setCellValue('D121', $current->lokasi_pelanggaran_fungsi_jalan_kolektor);

        $sheet->setCellValue('C122', $prev->lokasi_pelanggaran_fungsi_jalan_lokal);
        $sheet->setCellValue('D122', $current->lokasi_pelanggaran_fungsi_jalan_lokal);

        $sheet->setCellValue('C123', $prev->lokasi_pelanggaran_fungsi_jalan_lingkungan);
        $sheet->setCellValue('D123', $current->lokasi_pelanggaran_fungsi_jalan_lingkungan);

        $sheet->setCellValue('C127', $prev->kecelakaan_lalin_jumlah_kejadian);
        $sheet->setCellValue('D127', $current->kecelakaan_lalin_jumlah_kejadian);

        $sheet->setCellValue('C128', $prev->kecelakaan_lalin_jumlah_korban_meninggal);
        $sheet->setCellValue('D128', $current->kecelakaan_lalin_jumlah_korban_meninggal);

        $sheet->setCellValue('C129', $prev->kecelakaan_lalin_jumlah_korban_luka_berat);
        $sheet->setCellValue('D129', $current->kecelakaan_lalin_jumlah_korban_luka_beratn);

        $sheet->setCellValue('C130', $prev->kecelakaan_lalin_jumlah_korban_luka_ringan);
        $sheet->setCellValue('D130', $current->kecelakaan_lalin_jumlah_korban_luka_ringan);

        $sheet->setCellValue('C131', $prev->kecelakaan_lalin_jumlah_kerugian_materiil);
        $sheet->setCellValue('D131', $current->kecelakaan_lalin_jumlah_kerugian_materiil);

        $sheet->setCellValue('C133', $prev->kecelakaan_barang_bukti_yg_disita_sim);
        $sheet->setCellValue('D133', $current->kecelakaan_barang_bukti_yg_disita_sim);

        $sheet->setCellValue('C134', $prev->kecelakaan_barang_bukti_yg_disita_stnk);
        $sheet->setCellValue('D134', $current->kecelakaan_barang_bukti_yg_disita_stnk);

        $sheet->setCellValue('C135', $prev->kecelakaan_barang_bukti_yg_disita_kendaraan);
        $sheet->setCellValue('D135', $current->kecelakaan_barang_bukti_yg_disita_kendaraan);

        $sheet->setCellValue('C138', $prev->profesi_korban_kecelakaan_lalin_pns);
        $sheet->setCellValue('D138', $current->profesi_korban_kecelakaan_lalin_pns);

        $sheet->setCellValue('C139', $prev->profesi_korban_kecelakaan_lalin_karwayan_swasta);
        $sheet->setCellValue('D139', $current->profesi_korban_kecelakaan_lalin_karwayan_swasta);

        $sheet->setCellValue('C140', $prev->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa);
        $sheet->setCellValue('D140', $current->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa);

        $sheet->setCellValue('C141', $prev->profesi_korban_kecelakaan_lalin_pengemudi);
        $sheet->setCellValue('D141', $current->profesi_korban_kecelakaan_lalin_pengemudi);

        $sheet->setCellValue('C142', $prev->profesi_korban_kecelakaan_lalin_tni);
        $sheet->setCellValue('D142', $current->profesi_korban_kecelakaan_lalin_tni);

        $sheet->setCellValue('C143', $prev->profesi_korban_kecelakaan_lalin_polri);
        $sheet->setCellValue('D143', $current->profesi_korban_kecelakaan_lalin_polri);

        $sheet->setCellValue('C144', $prev->profesi_korban_kecelakaan_lalin_lain_lain);
        $sheet->setCellValue('D144', $current->profesi_korban_kecelakaan_lalin_lain_lain);

        $sheet->setCellValue('C147', $prev->usia_korban_kecelakaan_kurang_15);
        $sheet->setCellValue('D147', $current->usia_korban_kecelakaan_kurang_15);

        $sheet->setCellValue('C148', $prev->usia_korban_kecelakaan_16_20);
        $sheet->setCellValue('D148', $current->usia_korban_kecelakaan_16_20);

        $sheet->setCellValue('C149', $prev->usia_korban_kecelakaan_21_25);
        $sheet->setCellValue('D149', $current->usia_korban_kecelakaan_21_25);

        $sheet->setCellValue('C150', $prev->usia_korban_kecelakaan_26_30);
        $sheet->setCellValue('D150', $current->usia_korban_kecelakaan_26_30);

        $sheet->setCellValue('C151', $prev->usia_korban_kecelakaan_31_35);
        $sheet->setCellValue('D151', $current->usia_korban_kecelakaan_31_35);

        $sheet->setCellValue('C152', $prev->usia_korban_kecelakaan_36_40);
        $sheet->setCellValue('D152', $current->usia_korban_kecelakaan_36_40);

        $sheet->setCellValue('C153', $prev->usia_korban_kecelakaan_41_45);
        $sheet->setCellValue('D153', $current->usia_korban_kecelakaan_41_45);

        $sheet->setCellValue('C154', $prev->usia_korban_kecelakaan_45_50);
        $sheet->setCellValue('D154', $current->usia_korban_kecelakaan_45_50);

        $sheet->setCellValue('C155', $prev->usia_korban_kecelakaan_51_55);
        $sheet->setCellValue('D155', $current->usia_korban_kecelakaan_51_55);

        $sheet->setCellValue('C156', $prev->usia_korban_kecelakaan_56_60);
        $sheet->setCellValue('D156', $current->usia_korban_kecelakaan_56_60);

        $sheet->setCellValue('C157', $prev->usia_korban_kecelakaan_diatas_60);
        $sheet->setCellValue('D157', $current->usia_korban_kecelakaan_diatas_60);

        $sheet->setCellValue('C160', $prev->sim_korban_kecelakaan_sim_a);
        $sheet->setCellValue('D160', $current->sim_korban_kecelakaan_sim_a);

        $sheet->setCellValue('C161', $prev->sim_korban_kecelakaan_sim_a_umum);
        $sheet->setCellValue('D161', $current->sim_korban_kecelakaan_sim_a_umum);

        $sheet->setCellValue('C162', $prev->sim_korban_kecelakaan_sim_b1);
        $sheet->setCellValue('D162', $current->sim_korban_kecelakaan_sim_b1);

        $sheet->setCellValue('C163', $prev->sim_korban_kecelakaan_sim_b1_umum);
        $sheet->setCellValue('D163', $current->sim_korban_kecelakaan_sim_b1_umum);

        $sheet->setCellValue('C164', $prev->sim_korban_kecelakaan_sim_b2);
        $sheet->setCellValue('D164', $current->sim_korban_kecelakaan_sim_b2);

        $sheet->setCellValue('C165', $prev->sim_korban_kecelakaan_sim_b2_umum);
        $sheet->setCellValue('D165', $current->sim_korban_kecelakaan_sim_b2_umum);

        $sheet->setCellValue('C166', $prev->sim_korban_kecelakaan_sim_c);
        $sheet->setCellValue('D166', $current->sim_korban_kecelakaan_sim_c);

        $sheet->setCellValue('C167', $prev->sim_korban_kecelakaan_sim_d);
        $sheet->setCellValue('D167', $current->sim_korban_kecelakaan_sim_d);

        $sheet->setCellValue('C168', $prev->sim_korban_kecelakaan_sim_internasional);
        $sheet->setCellValue('D168', $current->sim_korban_kecelakaan_sim_internasional);

        $sheet->setCellValue('C169', $prev->sim_korban_kecelakaan_tanpa_sim);
        $sheet->setCellValue('D169', $current->sim_korban_kecelakaan_tanpa_sim);

        $sheet->setCellValue('C172', $prev->kendaraan_yg_terlibat_kecelakaan_sepeda_motor);
        $sheet->setCellValue('D172', $current->kendaraan_yg_terlibat_kecelakaan_sepeda_motor);

        $sheet->setCellValue('C173', $prev->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang);
        $sheet->setCellValue('D173', $current->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang);

        $sheet->setCellValue('C174', $prev->kendaraan_yg_terlibat_kecelakaan_mobil_bus);
        $sheet->setCellValue('D174', $current->kendaraan_yg_terlibat_kecelakaan_mobil_bus);

        $sheet->setCellValue('C175', $prev->kendaraan_yg_terlibat_kecelakaan_mobil_barang);
        $sheet->setCellValue('D175', $current->kendaraan_yg_terlibat_kecelakaan_mobil_barang);

        $sheet->setCellValue('C176', $prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus);
        $sheet->setCellValue('D176', $current->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus);

        $sheet->setCellValue('C177', $prev->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor);
        $sheet->setCellValue('D177', $current->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor);

        $sheet->setCellValue('C180', $prev->jenis_kecelakaan_tunggal_ooc);
        $sheet->setCellValue('D180', $current->jenis_kecelakaan_tunggal_ooc);

        $sheet->setCellValue('C181', $prev->jenis_kecelakaan_depan_depan);
        $sheet->setCellValue('D181', $current->jenis_kecelakaan_depan_depan);

        $sheet->setCellValue('C182', $prev->jenis_kecelakaan_depan_belakang);
        $sheet->setCellValue('D182', $current->jenis_kecelakaan_depan_belakang);

        $sheet->setCellValue('C183', $prev->jenis_kecelakaan_depan_samping);
        $sheet->setCellValue('D183', $current->jenis_kecelakaan_depan_samping);

        $sheet->setCellValue('C184', $prev->jenis_kecelakaan_beruntun);
        $sheet->setCellValue('D184', $current->jenis_kecelakaan_beruntun);

        $sheet->setCellValue('C185', $prev->jenis_kecelakaan_pejalan_kaki);
        $sheet->setCellValue('D185', $current->jenis_kecelakaan_pejalan_kaki);

        $sheet->setCellValue('C186', $prev->jenis_kecelakaan_tabrak_lari);
        $sheet->setCellValue('D186', $current->jenis_kecelakaan_tabrak_lari);

        $sheet->setCellValue('C187', $prev->jenis_kecelakaan_tabrak_hewan);
        $sheet->setCellValue('D187', $current->jenis_kecelakaan_tabrak_hewan);

        $sheet->setCellValue('C188', $prev->jenis_kecelakaan_samping_samping);
        $sheet->setCellValue('D188', $current->jenis_kecelakaan_samping_samping);

        $sheet->setCellValue('C189', $prev->jenis_kecelakaan_lainnya);
        $sheet->setCellValue('D189', $current->jenis_kecelakaan_lainnya);

        $sheet->setCellValue('C192', $prev->profesi_pelaku_kecelakaan_lalin_pns);
        $sheet->setCellValue('D192', $current->profesi_pelaku_kecelakaan_lalin_pns);

        $sheet->setCellValue('C193', $prev->profesi_pelaku_kecelakaan_lalin_karyawan_swasta);
        $sheet->setCellValue('D193', $current->profesi_pelaku_kecelakaan_lalin_karyawan_swasta);

        $sheet->setCellValue('C194', $prev->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar);
        $sheet->setCellValue('D194', $current->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar);

        $sheet->setCellValue('C195', $prev->profesi_pelaku_kecelakaan_lalin_pengemudi);
        $sheet->setCellValue('D195', $current->profesi_pelaku_kecelakaan_lalin_pengemudi);

        $sheet->setCellValue('C196', $prev->profesi_pelaku_kecelakaan_lalin_tni);
        $sheet->setCellValue('D196', $current->profesi_pelaku_kecelakaan_lalin_tni);

        $sheet->setCellValue('C197', $prev->profesi_pelaku_kecelakaan_lalin_polri);
        $sheet->setCellValue('D197', $current->profesi_pelaku_kecelakaan_lalin_polri);

        $sheet->setCellValue('C198', $prev->profesi_pelaku_kecelakaan_lalin_lain_lain);
        $sheet->setCellValue('D198', $current->profesi_pelaku_kecelakaan_lalin_lain_lain);

        $sheet->setCellValue('C201', $prev->usia_pelaku_kecelakaan_kurang_dari_15_tahun);
        $sheet->setCellValue('D201', $current->usia_pelaku_kecelakaan_kurang_dari_15_tahun);

        $sheet->setCellValue('C202', $prev->usia_pelaku_kecelakaan_16_20_tahun);
        $sheet->setCellValue('D202', $current->usia_pelaku_kecelakaan_16_20_tahun);

        $sheet->setCellValue('C203', $prev->usia_pelaku_kecelakaan_21_25_tahun);
        $sheet->setCellValue('D203', $current->usia_pelaku_kecelakaan_21_25_tahun);

        $sheet->setCellValue('C204', $prev->usia_pelaku_kecelakaan_26_30_tahun);
        $sheet->setCellValue('D204', $current->usia_pelaku_kecelakaan_26_30_tahun);

        $sheet->setCellValue('C205', $prev->usia_pelaku_kecelakaan_31_35_tahun);
        $sheet->setCellValue('D205', $current->usia_pelaku_kecelakaan_31_35_tahun);

        $sheet->setCellValue('C206', $prev->usia_pelaku_kecelakaan_36_40_tahun);
        $sheet->setCellValue('D206', $current->usia_pelaku_kecelakaan_36_40_tahun);

        $sheet->setCellValue('C207', $prev->usia_pelaku_kecelakaan_41_45_tahun);
        $sheet->setCellValue('D207', $current->usia_pelaku_kecelakaan_41_45_tahun);

        $sheet->setCellValue('C208', $prev->usia_pelaku_kecelakaan_46_50_tahun);
        $sheet->setCellValue('D208', $current->usia_pelaku_kecelakaan_46_50_tahun);

        $sheet->setCellValue('C209', $prev->usia_pelaku_kecelakaan_51_55_tahun);
        $sheet->setCellValue('D209', $current->usia_pelaku_kecelakaan_51_55_tahun);

        $sheet->setCellValue('C210', $prev->usia_pelaku_kecelakaan_56_60_tahun);
        $sheet->setCellValue('D210', $current->usia_pelaku_kecelakaan_56_60_tahun);

        $sheet->setCellValue('C211', $prev->usia_pelaku_kecelakaan_diatas_60_tahun);
        $sheet->setCellValue('D211', $current->usia_pelaku_kecelakaan_diatas_60_tahun);

        $sheet->setCellValue('C214', $prev->sim_pelaku_kecelakaan_sim_a);
        $sheet->setCellValue('D214', $current->sim_pelaku_kecelakaan_sim_a);

        $sheet->setCellValue('C215', $prev->sim_pelaku_kecelakaan_sim_a_umum);
        $sheet->setCellValue('D215', $current->sim_pelaku_kecelakaan_sim_a_umum);

        $sheet->setCellValue('C216', $prev->sim_pelaku_kecelakaan_sim_b1);
        $sheet->setCellValue('D216', $current->sim_pelaku_kecelakaan_sim_b1);

        $sheet->setCellValue('C217', $prev->sim_pelaku_kecelakaan_sim_b1_umum);
        $sheet->setCellValue('D217', $current->sim_pelaku_kecelakaan_sim_b1_umum);

        $sheet->setCellValue('C218', $prev->sim_pelaku_kecelakaan_sim_b2);
        $sheet->setCellValue('D218', $current->sim_pelaku_kecelakaan_sim_b2);

        $sheet->setCellValue('C219', $prev->sim_pelaku_kecelakaan_sim_b2_umum);
        $sheet->setCellValue('D219', $current->sim_pelaku_kecelakaan_sim_b2_umum);

        $sheet->setCellValue('C220', $prev->sim_pelaku_kecelakaan_sim_c);
        $sheet->setCellValue('D220', $current->sim_pelaku_kecelakaan_sim_c);

        $sheet->setCellValue('C221', $prev->sim_pelaku_kecelakaan_sim_dn);
        $sheet->setCellValue('D221', $current->sim_pelaku_kecelakaan_sim_d);

        $sheet->setCellValue('C222', $prev->sim_pelaku_kecelakaan_sim_internasional);
        $sheet->setCellValue('D222', $current->sim_pelaku_kecelakaan_sim_internasional);

        $sheet->setCellValue('C223', $prev->sim_pelaku_kecelakaan_tanpa_sim);
        $sheet->setCellValue('D223', $current->sim_pelaku_kecelakaan_tanpa_sim);

        $sheet->setCellValue('C227', $prev->lokasi_kecelakaan_lalin_pemukiman);
        $sheet->setCellValue('D227', $current->lokasi_kecelakaan_lalin_pemukiman);

        $sheet->setCellValue('C228', $prev->lokasi_kecelakaan_lalin_perbelanjaan);
        $sheet->setCellValue('D228', $current->lokasi_kecelakaan_lalin_perbelanjaan);

        $sheet->setCellValue('C229', $prev->lokasi_kecelakaan_lalin_perkantoran);
        $sheet->setCellValue('D229', $current->lokasi_kecelakaan_lalin_perkantoran);

        $sheet->setCellValue('C230', $prev->lokasi_kecelakaan_lalin_wisata);
        $sheet->setCellValue('D230', $current->lokasi_kecelakaan_lalin_wisata);

        $sheet->setCellValue('C231', $prev->lokasi_kecelakaan_lalin_industri);
        $sheet->setCellValue('D231', $current->lokasi_kecelakaan_lalin_industri);

        $sheet->setCellValue('C232', $prev->lokasi_kecelakaan_lalin_lain_lain);
        $sheet->setCellValue('D232', $current->lokasi_kecelakaan_lalin_lain_lain);

        $sheet->setCellValue('C235', $prev->lokasi_kecelakaan_status_jalan_nasional);
        $sheet->setCellValue('D235', $current->lokasi_kecelakaan_status_jalan_nasional);

        $sheet->setCellValue('C236', $prev->lokasi_kecelakaan_status_jalan_propinsi);
        $sheet->setCellValue('D236', $current->lokasi_kecelakaan_status_jalan_propinsi);

        $sheet->setCellValue('C237', $prev->lokasi_kecelakaan_status_jalan_kab_kota);
        $sheet->setCellValue('D237', $current->lokasi_kecelakaan_status_jalan_kab_kota);

        $sheet->setCellValue('C238', $prev->lokasi_kecelakaan_status_jalan_desa_lingkungan);
        $sheet->setCellValue('D238', $current->lokasi_kecelakaan_status_jalan_desa_lingkungan);

        $sheet->setCellValue('C241', $prev->lokasi_kecelakaan_fungsi_jalan_arteri);
        $sheet->setCellValue('D241', $current->lokasi_kecelakaan_fungsi_jalan_arteri);

        $sheet->setCellValue('C242', $prev->lokasi_kecelakaan_fungsi_jalan_kolektor);
        $sheet->setCellValue('D242', $current->lokasi_kecelakaan_fungsi_jalan_kolektor);

        $sheet->setCellValue('C243', $prev->lokasi_kecelakaan_fungsi_jalan_lokal);
        $sheet->setCellValue('D243', $current->lokasi_kecelakaan_fungsi_jalan_lokal);

        $sheet->setCellValue('C244', $prev->lokasi_kecelakaan_fungsi_jalan_lingkungan);
        $sheet->setCellValue('D244', $current->lokasi_kecelakaan_fungsi_jalan_lingkungan);

        $sheet->setCellValue('C247', $prev->faktor_penyebab_kecelakaan_manusia);
        $sheet->setCellValue('D247', $current->faktor_penyebab_kecelakaan_manusia);

        $sheet->setCellValue('C248', $prev->faktor_penyebab_kecelakaan_ngantuk_lelah);
        $sheet->setCellValue('D248', $current->faktor_penyebab_kecelakaan_ngantuk_lelah);

        $sheet->setCellValue('C249', $prev->faktor_penyebab_kecelakaan_mabuk_obat);
        $sheet->setCellValue('D249', $current->faktor_penyebab_kecelakaan_mabuk_obat);

        $sheet->setCellValue('C250', $prev->faktor_penyebab_kecelakaan_sakit);
        $sheet->setCellValue('D250', $current->faktor_penyebab_kecelakaan_sakit);

        $sheet->setCellValue('C251', $prev->faktor_penyebab_kecelakaan_handphone_elektronik);
        $sheet->setCellValue('D251', $current->faktor_penyebab_kecelakaan_handphone_elektronik);

        $sheet->setCellValue('C252', $prev->faktor_penyebab_kecelakaan_menerobos_lampu_merah);
        $sheet->setCellValue('D252', $current->faktor_penyebab_kecelakaan_menerobos_lampu_merah);

        $sheet->setCellValue('C253', $prev->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan);
        $sheet->setCellValue('D253', $current->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan);

        $sheet->setCellValue('C254', $prev->faktor_penyebab_kecelakaan_tidak_menjaga_jarak);
        $sheet->setCellValue('D254', $current->faktor_penyebab_kecelakaan_tidak_menjaga_jarak);

        $sheet->setCellValue('C255', $prev->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur);
        $sheet->setCellValue('D255', $current->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur);

        $sheet->setCellValue('C256', $prev->faktor_penyebab_kecelakaan_berpindah_jalur);
        $sheet->setCellValue('D256', $current->faktor_penyebab_kecelakaan_berpindah_jalur);

        $sheet->setCellValue('C257', $prev->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat);
        $sheet->setCellValue('D257', $current->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat);

        $sheet->setCellValue('C258', $prev->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki);
        $sheet->setCellValue('D258', $current->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki);

        $sheet->setCellValue('C259', $prev->faktor_penyebab_kecelakaan_lainnya);
        $sheet->setCellValue('D259', $current->faktor_penyebab_kecelakaan_lainnya);

        $sheet->setCellValue('C260', $prev->faktor_penyebab_kecelakaan_alam);
        $sheet->setCellValue('D260', $current->faktor_penyebab_kecelakaan_alam);

        $sheet->setCellValue('C261', $prev->faktor_penyebab_kecelakaan_kelaikan_kendaraan);
        $sheet->setCellValue('D261', $current->faktor_penyebab_kecelakaan_kelaikan_kendaraan);

        $sheet->setCellValue('C262', $prev->faktor_penyebab_kecelakaan_kondisi_jalan);
        $sheet->setCellValue('D262', $current->faktor_penyebab_kecelakaan_kondisi_jalan);

        $sheet->setCellValue('C263', $prev->faktor_penyebab_kecelakaan_prasarana_jalan);
        $sheet->setCellValue('D263', $current->faktor_penyebab_kecelakaan_prasarana_jalan);

        $sheet->setCellValue('C264', $prev->faktor_penyebab_kecelakaan_rambu);
        $sheet->setCellValue('D264', $current->faktor_penyebab_kecelakaan_rambu);

        $sheet->setCellValue('C265', $prev->faktor_penyebab_kecelakaan_marka);
        $sheet->setCellValue('D265', $current->faktor_penyebab_kecelakaan_marka);

        $sheet->setCellValue('C266', $prev->faktor_penyebab_kecelakaan_apil);
        $sheet->setCellValue('D266', $current->faktor_penyebab_kecelakaan_apil);

        $sheet->setCellValue('C267', $prev->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu);
        $sheet->setCellValue('D267', $current->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu);

        $sheet->setCellValue('C270', $prev->waktu_kejadian_kecelakaan_00_03);
        $sheet->setCellValue('D270', $current->waktu_kejadian_kecelakaan_00_03);

        $sheet->setCellValue('C271', $prev->waktu_kejadian_kecelakaan_03_06);
        $sheet->setCellValue('D271', $current->waktu_kejadian_kecelakaan_03_06);

        $sheet->setCellValue('C272', $prev->waktu_kejadian_kecelakaan_06_09);
        $sheet->setCellValue('D272', $current->waktu_kejadian_kecelakaan_06_09);

        $sheet->setCellValue('C273', $prev->waktu_kejadian_kecelakaan_09_12);
        $sheet->setCellValue('D273', $current->waktu_kejadian_kecelakaan_09_12);

        $sheet->setCellValue('C274', $prev->waktu_kejadian_kecelakaan_12_15);
        $sheet->setCellValue('D274', $current->waktu_kejadian_kecelakaan_12_15);

        $sheet->setCellValue('C275', $prev->waktu_kejadian_kecelakaan_15_18);
        $sheet->setCellValue('D275', $current->waktu_kejadian_kecelakaan_15_18);

        $sheet->setCellValue('C276', $prev->waktu_kejadian_kecelakaan_18_21);
        $sheet->setCellValue('D276', $current->waktu_kejadian_kecelakaan_18_21);

        $sheet->setCellValue('C277', $prev->waktu_kejadian_kecelakaan_21_24);
        $sheet->setCellValue('D277', $current->waktu_kejadian_kecelakaan_21_24);

        $sheet->setCellValue('C280', $prev->kecelakaan_lalin_menonjol_jumlah_kejadian);
        $sheet->setCellValue('D280', $current->kecelakaan_lalin_menonjol_jumlah_kejadian);

        $sheet->setCellValue('C281', $prev->kecelakaan_lalin_menonjol_korban_meninggal);
        $sheet->setCellValue('D281', $current->kecelakaan_lalin_menonjol_korban_meninggal);

        $sheet->setCellValue('C282', $prev->kecelakaan_lalin_menonjol_korban_luka_berat);
        $sheet->setCellValue('D282', $current->kecelakaan_lalin_menonjol_korban_luka_berat);

        $sheet->setCellValue('C283', $prev->kecelakaan_lalin_menonjol_korban_luka_ringan);
        $sheet->setCellValue('D283', $current->kecelakaan_lalin_menonjol_korban_luka_ringan);

        $sheet->setCellValue('C284', $prev->kecelakaan_lalin_menonjol_materiil);
        $sheet->setCellValue('D284', $current->kecelakaan_lalin_menonjol_materiil);

        $sheet->setCellValue('C286', $prev->kecelakaan_lalin_tunggal_jumlah_kejadian);
        $sheet->setCellValue('D286', $current->kecelakaan_lalin_tunggal_jumlah_kejadian);

        $sheet->setCellValue('C287', $prev->kecelakaan_lalin_tunggal_korban_meninggal);
        $sheet->setCellValue('D287', $current->kecelakaan_lalin_tunggal_korban_meninggal);

        $sheet->setCellValue('C288', $prev->kecelakaan_lalin_tunggal_korban_luka_berat);
        $sheet->setCellValue('D288', $current->kecelakaan_lalin_tunggal_korban_luka_berat);

        $sheet->setCellValue('C289', $prev->kecelakaan_lalin_tunggal_korban_luka_ringan);
        $sheet->setCellValue('D289', $current->kecelakaan_lalin_tunggal_korban_luka_ringan);

        $sheet->setCellValue('C290', $prev->kecelakaan_lalin_tunggal_materiil);
        $sheet->setCellValue('D290', $current->kecelakaan_lalin_tunggal_materiil);

        $sheet->setCellValue('C292', $prev->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian);
        $sheet->setCellValue('D292', $current->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian);

        $sheet->setCellValue('C293', $prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal);
        $sheet->setCellValue('D293', $current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal);

        $sheet->setCellValue('C294', $prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat);
        $sheet->setCellValue('D294', $current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat);

        $sheet->setCellValue('C295', $prev->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan);
        $sheet->setCellValue('D295', $current->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan);

        $sheet->setCellValue('C296', $prev->kecelakaan_lalin_tabrak_pejalan_kaki_materiil);
        $sheet->setCellValue('D296', $current->kecelakaan_lalin_tabrak_pejalan_kaki_materiil);

        $sheet->setCellValue('C298', $prev->kecelakaan_lalin_tabrak_lari_jumlah_kejadian);
        $sheet->setCellValue('D298', $current->kecelakaan_lalin_tabrak_lari_jumlah_kejadian);

        $sheet->setCellValue('C299', $prev->kecelakaan_lalin_tabrak_lari_korban_meninggal);
        $sheet->setCellValue('D299', $current->kecelakaan_lalin_tabrak_lari_korban_meninggal);

        $sheet->setCellValue('C300', $prev->kecelakaan_lalin_tabrak_lari_korban_luka_berat);
        $sheet->setCellValue('D300', $current->kecelakaan_lalin_tabrak_lari_korban_luka_berat);

        $sheet->setCellValue('C301', $prev->kecelakaan_lalin_tabrak_lari_korban_luka_ringan);
        $sheet->setCellValue('D301', $current->kecelakaan_lalin_tabrak_lari_korban_luka_ringan);

        $sheet->setCellValue('C302', $prev->kecelakaan_lalin_tabrak_lari_materiil);
        $sheet->setCellValue('D302', $current->kecelakaan_lalin_tabrak_lari_materiil);

        $sheet->setCellValue('C304', $prev->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian);
        $sheet->setCellValue('D304', $current->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian);

        $sheet->setCellValue('C305', $prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal);
        $sheet->setCellValue('D305', $current->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal);

        $sheet->setCellValue('C306', $prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat);
        $sheet->setCellValue('D306', $current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat);

        $sheet->setCellValue('C307', $prev->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan);
        $sheet->setCellValue('D307', $current->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringanl);

        $sheet->setCellValue('C308', $prev->kecelakaan_lalin_tabrak_sepeda_motor_materiil);
        $sheet->setCellValue('D308', $current->kecelakaan_lalin_tabrak_sepeda_motor_materiil);

        $sheet->setCellValue('C310', $prev->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian);
        $sheet->setCellValue('D310', $current->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian);

        $sheet->setCellValue('C311', $prev->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal);
        $sheet->setCellValue('D311', $current->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal);

        $sheet->setCellValue('C312', $prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat);
        $sheet->setCellValue('D312', $current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat);

        $sheet->setCellValue('C313', $prev->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan);
        $sheet->setCellValue('D313', $current->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan);

        $sheet->setCellValue('C314', $prev->kecelakaan_lalin_tabrak_roda_empat_materiil);
        $sheet->setCellValue('D314', $current->kecelakaan_lalin_tabrak_roda_empat_materiil);

        $sheet->setCellValue('C316', $prev->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian);
        $sheet->setCellValue('D316', $current->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian);

        $sheet->setCellValue('C317', $prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal);
        $sheet->setCellValue('D317', $current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal);

        $sheet->setCellValue('C318', $prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat);
        $sheet->setCellValue('D318', $current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat);

        $sheet->setCellValue('C319', $prev->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan);
        $sheet->setCellValue('D319', $current->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan);

        $sheet->setCellValue('C320', $prev->kecelakaan_lalin_tabrak_tidak_bermotor_materiil);
        $sheet->setCellValue('D320', $current->kecelakaan_lalin_tabrak_tidak_bermotor_materiil);

        $sheet->setCellValue('C322', $prev->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian);
        $sheet->setCellValue('D322', $current->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian);

        $sheet->setCellValue('C323', $prev->kecelakaan_lalin_perlintasan_ka_berpalang_pintu);
        $sheet->setCellValue('D323', $current->kecelakaan_lalin_perlintasan_ka_berpalang_pintu);

        $sheet->setCellValue('C324', $prev->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu);
        $sheet->setCellValue('D324', $current->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu);

        $sheet->setCellValue('C325', $prev->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan);
        $sheet->setCellValue('D325', $current->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan);

        $sheet->setCellValue('C326', $prev->kecelakaan_lalin_perlintasan_ka_korban_luka_berat);
        $sheet->setCellValue('D326', $current->kecelakaan_lalin_perlintasan_ka_korban_luka_berat);

        $sheet->setCellValue('C327', $prev->kecelakaan_lalin_perlintasan_ka_korban_meninggal);
        $sheet->setCellValue('D327', $current->kecelakaan_lalin_perlintasan_ka_korban_meninggal);

        $sheet->setCellValue('C328', $prev->kecelakaan_lalin_perlintasan_ka_materiil);
        $sheet->setCellValue('D328', $current->kecelakaan_lalin_perlintasan_ka_materiil);

        $sheet->setCellValue('C330', $prev->kecelakaan_transportasi_kereta_api);
        $sheet->setCellValue('D330', $current->kecelakaan_transportasi_kereta_api);

        $sheet->setCellValue('C331', $prev->kecelakaan_transportasi_laut_perairan);
        $sheet->setCellValue('D331', $current->kecelakaan_transportasi_laut_perairan);

        $sheet->setCellValue('C332', $prev->kecelakaan_transportasi_udara);
        $sheet->setCellValue('D332', $current->kecelakaan_transportasi_udara);

        $sheet->setCellValue('C337', $prev->penlu_melalui_media_cetak);
        $sheet->setCellValue('D337', $current->penlu_melalui_media_cetak);

        $sheet->setCellValue('C338', $prev->penlu_melalui_media_elektronik);
        $sheet->setCellValue('D338', $current->penlu_melalui_media_elektronik);

        $sheet->setCellValue('C340', $prev->penlu_melalui_tempat_keramaian);
        $sheet->setCellValue('D340', $current->penlu_melalui_tempat_keramaian);

        $sheet->setCellValue('C341', $prev->penlu_melalui_tempat_istirahat);
        $sheet->setCellValue('D341', $current->penlu_melalui_tempat_istirahat);

        $sheet->setCellValue('C342', $prev->penlu_melalui_daerah_rawan_laka_dan_langgar);
        $sheet->setCellValue('D342', $current->penlu_melalui_daerah_rawan_laka_dan_langgar);

        $sheet->setCellValue('C345', $prev->penyebaran_pemasangan_spanduk);
        $sheet->setCellValue('D345', $current->penyebaran_pemasangan_spanduk);

        $sheet->setCellValue('C346', $prev->penyebaran_pemasangan_leaflet);
        $sheet->setCellValue('D346', $current->penyebaran_pemasangan_leaflet);

        $sheet->setCellValue('C347', $prev->penyebaran_pemasangan_sticker);
        $sheet->setCellValue('D347', $current->penyebaran_pemasangan_sticker);

        $sheet->setCellValue('C348', $prev->penyebaran_pemasangan_bilboard);
        $sheet->setCellValue('D348', $current->penyebaran_pemasangan_bilboard);

        $sheet->setCellValue('C351', $prev->polisi_sahabat_anak);
        $sheet->setCellValue('D351', $current->polisi_sahabat_anak);

        $sheet->setCellValue('C352', $prev->cara_aman_sekolah);
        $sheet->setCellValue('D352', $current->cara_aman_sekolah);

        $sheet->setCellValue('C353', $prev->patroli_keamanan_sekolah);
        $sheet->setCellValue('D353', $current->patroli_keamanan_sekolah);

        $sheet->setCellValue('C354', $prev->pramuka_bhayangkara_krida_lalu_lintas);
        $sheet->setCellValue('D354', $current->pramuka_bhayangkara_krida_lalu_lintas);

        $sheet->setCellValue('C357', $prev->police_goes_to_campus);
        $sheet->setCellValue('D357', $current->police_goes_to_campus);

        $sheet->setCellValue('C358', $prev->safety_riding_driving);
        $sheet->setCellValue('D358', $current->safety_riding_driving);

        $sheet->setCellValue('C359', $prev->forum_lalu_lintas_angkutan_umum);
        $sheet->setCellValue('D359', $current->forum_lalu_lintas_angkutan_umum);

        $sheet->setCellValue('C360', $prev->kampanye_keselamatan);
        $sheet->setCellValue('D360', $current->kampanye_keselamatan);

        $sheet->setCellValue('C361', $prev->sekolah_mengemudi);
        $sheet->setCellValue('D361', $current->sekolah_mengemudi);

        $sheet->setCellValue('C362', $prev->taman_lalu_lintas);
        $sheet->setCellValue('D362', $current->taman_lalu_lintas);

        $sheet->setCellValue('C363', $prev->global_road_safety_partnership_action);
        $sheet->setCellValue('D363', $current->global_road_safety_partnership_action);

        $sheet->setCellValue('C367', $prev->giat_lantas_pengaturan);
        $sheet->setCellValue('D367', $current->giat_lantas_pengaturan);

        $sheet->setCellValue('C368', $prev->giat_lantas_penjagaan);
        $sheet->setCellValue('D368', $current->giat_lantas_penjagaan);

        $sheet->setCellValue('C369', $prev->giat_lantas_pengawalan);
        $sheet->setCellValue('D369', $current->giat_lantas_pengawalan);

        $sheet->setCellValue('C370', $prev->giat_lantas_patroli);
        $sheet->setCellValue('D370', $current->giat_lantas_patroli);

        //write it again to Filesystem with the same name (=replace)
        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');
    }

    public function dailyRekapShowWithInput($uuid)
    {
        $model = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        $polda = $model->polda;
        $year = $model->year;
        $rencana_operartion_id = $model->rencana_operasi_id;
        $config_date = $model->config_date;
        $start_date = $model->operation_date_start;
        $end_date = $model->operation_date_end;
        $prevYear = $year - 1;

        $outputPrev = reportDailyPrev($polda, $prevYear, $rencana_operartion_id, $config_date, $start_date, $end_date);
        $outputCurrent = reportDailyCurrent($polda, $year, $rencana_operartion_id, $config_date, $start_date, $end_date);

        return [
            'dailyInput' => $outputCurrent,
            'dailyInputPrev' => $outputPrev,
            'yearNow' => date("Y"),
            'yearPrev' => date("Y") - 1,
        ];
    }

    public function dailyRekapShow($uuid)
    {
        $model = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        return $model;
    }

    public function data()
    {
        $model = DailyRekap::with(['rencanaOperasi', 'poldaData']);

        return datatables()->eloquent($model)
        ->addColumn('polda_relation', function (DailyRekap $kr) {
            if(empty($kr->poldaData)) {
                return "Semua";
            } else {
                return $kr->poldaData->name;
            }
        })
        ->addColumn('rencana_operasi_relation', function (DailyRekap $kr) {
            return $kr->rencanaOperasi->name;
        })
        ->toJson();

        return datatables()->eloquent($model)->toJson();
    }

    public function store(DailyRekapRequest $request)
    {
        $model = DailyRekap::create([
            'uuid' => genUuid(),
            'report_name' => $request->report_name,
            'polda' => $request->polda,
            'year' => $request->year,
            'rencana_operasi_id' => $request->rencana_operasi_id,
            'config_date' => $request->config_date,
            'operation_date_start' => dateOnly($request->tanggal_mulai),
            'operation_date_end' => dateOnly($request->tanggal_selesai),
        ]);

        flash('Rekap harian berhasil dibuat')->success();

        return redirect()->back();
    }

    public function update(DailyRekapEditRequest $request)
    {
        if($request->config_date_edit == "all") {
            $ro = RencanaOperasi::where('id', $request->rencana_operasi_id_edit)->first();

            $model = DailyRekap::updateOrCreate(
                ['uuid' => request('uuid_edit')],
                [
                    'report_name' => $request->report_name_edit,
                    'polda' => $request->polda_edit,
                    'year' => $request->year_edit,
                    'rencana_operasi_id' => $request->rencana_operasi_id_edit,
                    'config_date' => $request->config_date_edit,
                    'operation_date_start' => dateOnly($ro->start_date),
                    'operation_date_end' => dateOnly($ro->end_date),
                ]
            );
        } else {
            $model = DailyRekap::updateOrCreate(
                ['uuid' => request('uuid_edit')],
                [
                    'report_name' => $request->report_name_edit,
                    'polda' => $request->polda_edit,
                    'year' => $request->year_edit,
                    'rencana_operasi_id' => $request->rencana_operasi_id_edit,
                    'config_date' => $request->config_date_edit,
                    'operation_date_start' => dateOnly($request->tanggal_mulai_edit),
                'operation_date_end' => dateOnly($request->tanggal_selesai_edit),
                ]
            );
        }

        flash('Rekap harian berhasil diubah')->success();
        return redirect()->back();
    }
}
