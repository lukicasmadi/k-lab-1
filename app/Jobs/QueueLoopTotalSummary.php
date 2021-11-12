<?php

namespace App\Jobs;

use App\Models\CountDown;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Models\LoopTotalSummary;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class QueueLoopTotalSummary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    protected $rencanaOperasi;

    public function __construct($rencanaOperasi)
    {
        $this->rencanaOperasi = $rencanaOperasi;
    }

    public function handle()
    {
        $countDown = CountDown::where('rencana_operasi_id', $this->rencanaOperasi->id)->orderBy('tanggal', 'asc')->get();

        $bulkData = [];
        $bulkDataPrev = [];

        LoopTotalSummary::truncate();

        foreach($countDown as $cd) {
            $data = DB::select('CALL summaryDataCurrent(?,?)', [$cd->rencana_operasi_id, $cd->tanggal]);
            $inserted = $data[0];

            array_push($bulkData,
                [
                    'type' => 'pelanggaran_lalu_lintas_tilang',
                    'val' => zeroIfNull($inserted->current_pelanggaran_lalu_lintas_tilang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_lalu_lintas_teguran',
                    'val' => zeroIfNull($inserted->current_pelanggaran_lalu_lintas_teguran_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_kecepatan',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_helm',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_marka_menerus_menyalip',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_marka_menerus_menyalip_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melawan_arus',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_melawan_arus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_lampu_lalin',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_melanggar_lampu_lalin_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_marka_berhenti',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_melanggar_marka_berhenti_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_surat_surat',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_surat_surat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_kelengkapan_kendaraan',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_kelengkapan_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_lain_lain',
                    'val' => zeroIfNull($inserted->current_pelanggaran_sepeda_motor_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_kecepatan',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_safety_belt',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_safety_belt_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_muatan_overload',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_muatan_overload_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_marka_menerus_menyalip',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_marka_menerus_menyalip_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melawan_arus',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_melawan_arus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_lampu_lalin',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_melanggar_lampu_lalin_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_mengemudi_tidak_wajar',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_mengemudi_tidak_wajar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_syarat_teknis_layak_jalan',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_syarat_teknis_layak_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_tidak_nyala_lampu_malam',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_tidak_nyala_lampu_malam_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_berbelok_tanpa_isyarat',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_berbelok_tanpa_isyarat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_berbalapan_di_jalan_raya',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_berbalapan_di_jalan_raya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_marka_berhenti',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_melanggar_marka_berhenti_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_tidak_patuh_perintah_petugas',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_tidak_patuh_perintah_petugas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_surat_surat',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_surat_surat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_kelengkapan_kendaraan',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_kelengkapan_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_lain_lain',
                    'val' => zeroIfNull($inserted->current_pelanggaran_mobil_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat',
                    'val' => zeroIfNull($inserted->current_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_sim',
                    'val' => zeroIfNull($inserted->current_barang_bukti_yg_disita_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_stnk',
                    'val' => zeroIfNull($inserted->current_barang_bukti_yg_disita_stnk_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_kendaraan',
                    'val' => zeroIfNull($inserted->current_barang_bukti_yg_disita_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor',
                    'val' => zeroIfNull($inserted->current_kendaraan_yang_terlibat_pelanggaran_sepeda_motor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang',
                    'val' => zeroIfNull($inserted->current_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_bus',
                    'val' => zeroIfNull($inserted->current_kendaraan_yang_terlibat_pelanggaran_mobil_bus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_barang',
                    'val' => zeroIfNull($inserted->current_kendaraan_yang_terlibat_pelanggaran_mobil_barang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus',
                    'val' => zeroIfNull($inserted->current_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pns',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_pelanggaran_pns_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_karyawan_swasta',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_pelanggaran_karyawan_swasta_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pelajar_mahasiswa',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_pelanggaran_pelajar_mahasiswa_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pengemudi_supir',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_pelanggaran_pengemudi_supir_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_tni',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_pelanggaran_tni_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_polri',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_pelanggaran_polri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_lain_lain',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_pelanggaran_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_kurang_dari_15_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_kurang_dari_15_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_16_20_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_16_20_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_21_25_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_21_25_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_26_30_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_26_30_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_31_35_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_31_35_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_36_40_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_36_40_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_41_45_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_41_45_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_46_50_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_46_50_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_51_55_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_51_55_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_56_60_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_56_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_diatas_60_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_pelanggaran_diatas_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_a',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_a_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_a_umum',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_a_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b1',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_b1_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b1_umum',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_b1_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b2',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_b2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b2_umum',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_b2_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_c',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_c_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_d',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_d_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_internasional',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_sim_internasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_tanpa_sim',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_pelanggaran_tanpa_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_pemukiman',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_pemukiman_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_perbelanjaan',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_perbelanjaan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_perkantoran',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_perkantoran_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_wisata',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_wisata_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_industri',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_industri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_nasional',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_status_jalan_nasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_propinsi',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_status_jalan_propinsi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_kab_kota',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_status_jalan_kab_kota_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_desa_lingkungan',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_status_jalan_desa_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_arteri',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_fungsi_jalan_arteri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_kolektor',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_fungsi_jalan_kolektor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_lokal',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_fungsi_jalan_lokal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_lingkungan',
                    'val' => zeroIfNull($inserted->current_lokasi_pelanggaran_fungsi_jalan_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_jumlah_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_jumlah_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_jumlah_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_kerugian_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_jumlah_kerugian_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_sim',
                    'val' => zeroIfNull($inserted->current_kecelakaan_barang_bukti_yg_disita_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_stnk',
                    'val' => zeroIfNull($inserted->current_kecelakaan_barang_bukti_yg_disita_stnk_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_kendaraan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_barang_bukti_yg_disita_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pns',
                    'val' => zeroIfNull($inserted->current_profesi_korban_kecelakaan_lalin_pns_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_karwayan_swasta',
                    'val' => zeroIfNull($inserted->current_profesi_korban_kecelakaan_lalin_karwayan_swasta_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa',
                    'val' => zeroIfNull($inserted->current_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pengemudi',
                    'val' => zeroIfNull($inserted->current_profesi_korban_kecelakaan_lalin_pengemudi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_tni',
                    'val' => zeroIfNull($inserted->current_profesi_korban_kecelakaan_lalin_tni_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_polri',
                    'val' => zeroIfNull($inserted->current_profesi_korban_kecelakaan_lalin_polri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_lain_lain',
                    'val' => zeroIfNull($inserted->current_profesi_korban_kecelakaan_lalin_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_kurang_15',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_kurang_15_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_16_20',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_16_20_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_21_25',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_21_25_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_26_30',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_26_30_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_31_35',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_31_35_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_36_40',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_36_40_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_41_45',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_41_45_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_45_50',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_45_50_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_51_55',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_51_55_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_56_60',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_56_60_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_diatas_60',
                    'val' => zeroIfNull($inserted->current_usia_korban_kecelakaan_diatas_60_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_a',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_a_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_a_umum',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_a_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b1',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_b1_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b1_umum',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_b1_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b2',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_b2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b2_umum',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_b2_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_c',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_c_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_d',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_d_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_internasional',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_sim_internasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_tanpa_sim',
                    'val' => zeroIfNull($inserted->current_sim_korban_kecelakaan_tanpa_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_sepeda_motor',
                    'val' => zeroIfNull($inserted->current_kendaraan_yg_terlibat_kecelakaan_sepeda_motor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang',
                    'val' => zeroIfNull($inserted->current_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_bus',
                    'val' => zeroIfNull($inserted->current_kendaraan_yg_terlibat_kecelakaan_mobil_bus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_barang',
                    'val' => zeroIfNull($inserted->current_kendaraan_yg_terlibat_kecelakaan_mobil_barang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus',
                    'val' => zeroIfNull($inserted->current_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor',
                    'val' => zeroIfNull($inserted->current_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tunggal_ooc',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_tunggal_ooc_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_depan',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_depan_depan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_belakang',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_depan_belakang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_samping',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_depan_samping_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_beruntun',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_beruntun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_pejalan_kaki',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_pejalan_kaki_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tabrak_lari',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_tabrak_lari_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tabrak_hewan',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_tabrak_hewan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_samping_samping',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_samping_samping_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_lainnya',
                    'val' => zeroIfNull($inserted->current_jenis_kecelakaan_lainnya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_pns',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_kecelakaan_lalin_pns_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_karyawan_swasta',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_kecelakaan_lalin_karyawan_swasta_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_pengemudi',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_kecelakaan_lalin_pengemudi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_tni',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_kecelakaan_lalin_tni_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_polri',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_kecelakaan_lalin_polri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_lain_lain',
                    'val' => zeroIfNull($inserted->current_profesi_pelaku_kecelakaan_lalin_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_kurang_dari_15_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_kurang_dari_15_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_16_20_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_16_20_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_21_25_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_21_25_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_26_30_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_26_30_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_31_35_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_31_35_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_36_40_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_36_40_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_41_45_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_41_45_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_46_50_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_46_50_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_51_55_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_51_55_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_56_60_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_56_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_diatas_60_tahun',
                    'val' => zeroIfNull($inserted->current_usia_pelaku_kecelakaan_diatas_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_a',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_a_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_a_umum',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_a_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b1',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_b1_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b1_umum',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_b1_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b2',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_b2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b2_umum',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_b2_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_c',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_c_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_d',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_d_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_internasional',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_sim_internasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_tanpa_sim',
                    'val' => zeroIfNull($inserted->current_sim_pelaku_kecelakaan_tanpa_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_pemukiman',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_lalin_pemukiman_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_perbelanjaan',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_lalin_perbelanjaan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_perkantoran',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_lalin_perkantoran_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_wisata',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_lalin_wisata_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_industri',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_lalin_industri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_lain_lain',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_lalin_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_nasional',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_status_jalan_nasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_propinsi',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_status_jalan_propinsi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_kab_kota',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_status_jalan_kab_kota_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_desa_lingkungan',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_status_jalan_desa_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_arteri',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_fungsi_jalan_arteri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_kolektor',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_fungsi_jalan_kolektor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_lokal',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_fungsi_jalan_lokal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_lingkungan',
                    'val' => zeroIfNull($inserted->current_lokasi_kecelakaan_fungsi_jalan_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_manusia',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_manusia_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_ngantuk_lelah',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_ngantuk_lelah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_mabuk_obat',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_mabuk_obat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_sakit',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_sakit_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_handphone_elektronik',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_handphone_elektronik_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_menerobos_lampu_merah',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_menerobos_lampu_merah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_melanggar_batas_kecepatan',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_menjaga_jarak',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_tidak_menjaga_jarak_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_berpindah_jalur',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_berpindah_jalur_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_lainnya',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_lainnya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_alam',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_alam_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_kelaikan_kendaraan',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_kelaikan_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_kondisi_jalan',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_kondisi_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_prasarana_jalan',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_prasarana_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_rambu',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_rambu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_marka',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_marka_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_apil',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_apil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu',
                    'val' => zeroIfNull($inserted->current_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_00_03',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_00_03_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_03_06',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_03_06_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_06_09',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_06_09_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_09_12',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_09_12_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_12_15',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_12_15_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_15_18',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_15_18_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_18_21',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_18_21_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_21_24',
                    'val' => zeroIfNull($inserted->current_waktu_kejadian_kecelakaan_21_24_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_menonjol_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_menonjol_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_menonjol_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_menonjol_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_menonjol_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tunggal_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tunggal_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tunggal_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tunggal_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tunggal_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_pejalan_kaki_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_lari_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_lari_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_lari_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_lari_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_lari_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_sepeda_motor_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_roda_empat_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_tabrak_tidak_bermotor_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_jumlah_kejadian',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_berpalang_pintu',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_perlintasan_ka_berpalang_pintu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_luka_ringan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_luka_berat',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_perlintasan_ka_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_meninggal',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_perlintasan_ka_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_materiil',
                    'val' => zeroIfNull($inserted->current_kecelakaan_lalin_perlintasan_ka_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_kereta_api',
                    'val' => zeroIfNull($inserted->current_kecelakaan_transportasi_kereta_api_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_laut_perairan',
                    'val' => zeroIfNull($inserted->current_kecelakaan_transportasi_laut_perairan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_udara',
                    'val' => zeroIfNull($inserted->current_kecelakaan_transportasi_udara_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_cetak',
                    'val' => zeroIfNull($inserted->current_penlu_melalui_media_cetak_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_elektronik',
                    'val' => zeroIfNull($inserted->current_penlu_melalui_media_elektronik_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_sosial',
                    'val' => zeroIfNull($inserted->current_penlu_melalui_media_sosial_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_tempat_keramaian',
                    'val' => zeroIfNull($inserted->current_penlu_melalui_tempat_keramaian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_tempat_istirahat',
                    'val' => zeroIfNull($inserted->current_penlu_melalui_tempat_istirahat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_daerah_rawan_laka_dan_langgar',
                    'val' => zeroIfNull($inserted->current_penlu_melalui_daerah_rawan_laka_dan_langgar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_spanduk',
                    'val' => zeroIfNull($inserted->current_penyebaran_pemasangan_spanduk_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_leaflet',
                    'val' => zeroIfNull($inserted->current_penyebaran_pemasangan_leaflet_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_sticker',
                    'val' => zeroIfNull($inserted->current_penyebaran_pemasangan_sticker_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_bilboard',
                    'val' => zeroIfNull($inserted->current_penyebaran_pemasangan_bilboard_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'polisi_sahabat_anak',
                    'val' => zeroIfNull($inserted->current_polisi_sahabat_anak_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'cara_aman_sekolah',
                    'val' => zeroIfNull($inserted->current_cara_aman_sekolah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'patroli_keamanan_sekolah',
                    'val' => zeroIfNull($inserted->current_patroli_keamanan_sekolah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pramuka_bhayangkara_krida_lalu_lintas',
                    'val' => zeroIfNull($inserted->current_pramuka_bhayangkara_krida_lalu_lintas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'police_goes_to_campus',
                    'val' => zeroIfNull($inserted->current_police_goes_to_campus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'safety_riding_driving',
                    'val' => zeroIfNull($inserted->current_safety_riding_driving_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'forum_lalu_lintas_angkutan_umum',
                    'val' => zeroIfNull($inserted->current_forum_lalu_lintas_angkutan_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kampanye_keselamatan',
                    'val' => zeroIfNull($inserted->current_kampanye_keselamatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sekolah_mengemudi',
                    'val' => zeroIfNull($inserted->current_sekolah_mengemudi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'taman_lalu_lintas',
                    'val' => zeroIfNull($inserted->current_taman_lalu_lintas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'global_road_safety_partnership_action',
                    'val' => zeroIfNull($inserted->current_global_road_safety_partnership_action_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_pengaturan',
                    'val' => zeroIfNull($inserted->current_giat_lantas_pengaturan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_penjagaan',
                    'val' => zeroIfNull($inserted->current_giat_lantas_penjagaan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_pengawalan',
                    'val' => zeroIfNull($inserted->current_giat_lantas_pengawalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_patroli',
                    'val' => zeroIfNull($inserted->current_giat_lantas_patroli_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_bus_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_jumlah_bus_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_penumpang_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_jumlah_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_bus_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_jumlah_bus_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_penumpang_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_jumlah_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_terminal',
                    'val' => zeroIfNull($inserted->current_arus_mudik_total_terminal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bus_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_total_bus_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_penumpang_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bus_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_total_bus_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_penumpang_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_stasiun',
                    'val' => zeroIfNull($inserted->current_arus_mudik_kereta_api_total_stasiun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_penumpang_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_kereta_api_total_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_penumpang_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_kereta_api_total_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_penumpang_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_pelabuhan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_total_pelabuhan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_kendaraan_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_kendaraan_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_kendaraan_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_kendaraan_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_total_penumpang_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_total_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_total_penumpang_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_pelabuhan_total_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_jumlah_penumpang_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_bandara_jumlah_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_jumlah_penumpang_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_bandara_jumlah_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bandara',
                    'val' => zeroIfNull($inserted->current_arus_mudik_total_bandara_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_total_penumpang_keberangkatan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_bandara_total_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_total_penumpang_kedatangan',
                    'val' => zeroIfNull($inserted->current_arus_mudik_bandara_total_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_teguran_gar_prokes',
                    'val' => zeroIfNull($inserted->current_prokes_covid_teguran_gar_prokes_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_pembagian_masker',
                    'val' => zeroIfNull($inserted->current_prokes_covid_pembagian_masker_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_sosialisasi_tentang_prokes',
                    'val' => zeroIfNull($inserted->current_prokes_covid_sosialisasi_tentang_prokes_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_giat_baksos',
                    'val' => zeroIfNull($inserted->current_prokes_covid_giat_baksos_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_motor',
                    'val' => zeroIfNull($inserted->current_penyekatan_motor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_penumpang',
                    'val' => zeroIfNull($inserted->current_penyekatan_mobil_penumpang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_bus',
                    'val' => zeroIfNull($inserted->current_penyekatan_mobil_bus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_barang',
                    'val' => zeroIfNull($inserted->current_penyekatan_mobil_barang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_kendaraan_khusus',
                    'val' => zeroIfNull($inserted->current_penyekatan_kendaraan_khusus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'rapid_test_antigen_positif',
                    'val' => zeroIfNull($inserted->current_rapid_test_antigen_positif_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'rapid_test_antigen_positif',
                    'val' => zeroIfNull($inserted->current_rapid_test_antigen_positif_sum),
                    'date_loop' => $cd->tanggal,
                ],
            );
        }

        LoopTotalSummary::insert($bulkData);

        foreach($countDown as $cd) {
            $data = DB::select('CALL summaryDataPrev(?,?)', [$cd->rencana_operasi_id, $cd->tanggal]);
            $insertedPrev = $data[0];

            array_push($bulkDataPrev,
                [
                    'type' => 'pelanggaran_lalu_lintas_tilang_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_lalu_lintas_tilang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_lalu_lintas_teguran_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_lalu_lintas_teguran_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_kecepatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_kecepatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_helm_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_kecepatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_marka_menerus_menyalip_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_marka_menerus_menyalip_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melawan_arus_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_melawan_arus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_lampu_lalin_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_melanggar_lampu_lalin_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_marka_berhenti_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_melanggar_marka_berhenti_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_surat_surat_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_surat_surat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_kelengkapan_kendaraan_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_kelengkapan_kendaraan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_lain_lain_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_sepeda_motor_lain_lain_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_kecepatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_kecepatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_safety_belt_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_safety_belt_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_muatan_overload_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_muatan_overload_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_marka_menerus_menyalip_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_marka_menerus_menyalip_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melawan_arus_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_melawan_arus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_lampu_lalin_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_melanggar_lampu_lalin_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_mengemudi_tidak_wajar_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_mengemudi_tidak_wajar_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_syarat_teknis_layak_jalan_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_syarat_teknis_layak_jalan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_tidak_nyala_lampu_malam_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_tidak_nyala_lampu_malam_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_berbelok_tanpa_isyarat_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_berbelok_tanpa_isyarat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_berbalapan_di_jalan_raya_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_berbalapan_di_jalan_raya_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_marka_berhenti_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_melanggar_marka_berhenti_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_tidak_patuh_perintah_petugas_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_tidak_patuh_perintah_petugas_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_surat_surat_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_surat_surat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_kelengkapan_kendaraan_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_kelengkapan_kendaraan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_lain_lain_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_mobil_lain_lain_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p',
                    'val' => zeroIfNull($insertedPrev->prev_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_sim_p',
                    'val' => zeroIfNull($insertedPrev->prev_barang_bukti_yg_disita_sim_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_stnk_p',
                    'val' => zeroIfNull($insertedPrev->prev_barang_bukti_yg_disita_stnk_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_kendaraan_p',
                    'val' => zeroIfNull($insertedPrev->prev_barang_bukti_yg_disita_kendaraan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_bus_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yang_terlibat_pelanggaran_mobil_bus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_barang_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yang_terlibat_pelanggaran_mobil_barang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pns_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_pelanggaran_pns_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_karyawan_swasta_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_pelanggaran_karyawan_swasta_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pelajar_mahasiswa_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_pelanggaran_pelajar_mahasiswa_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pengemudi_supir_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_pelanggaran_pengemudi_supir_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_tni_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_pelanggaran_tni_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_polri_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_pelanggaran_polri_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_lain_lain_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_pelanggaran_lain_lain_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_kurang_dari_15_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_kurang_dari_15_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_16_20_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_16_20_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_21_25_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_21_25_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_26_30_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_26_30_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_31_35_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_31_35_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_36_40_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_36_40_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_41_45_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_41_45_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_46_50_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_46_50_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_51_55_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_51_55_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_56_60_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_56_60_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_diatas_60_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_pelanggaran_diatas_60_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_a_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_a_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_a_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_a_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b1_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_b1_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b1_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_b1_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b2_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_b2_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b2_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_b2_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_c_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_c_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_d_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_d_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_internasional_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_sim_internasional_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_tanpa_sim_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_pelanggaran_tanpa_sim_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_pemukiman_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_pemukiman_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_perbelanjaan_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_perbelanjaan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_perkantoran_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_perkantoran_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_wisata_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_wisata_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_industri_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_industri_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_nasional_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_status_jalan_nasional_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_propinsi_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_status_jalan_propinsi_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_kab_kota_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_status_jalan_kab_kota_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_desa_lingkungan_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_status_jalan_desa_lingkungan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_arteri_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_fungsi_jalan_arteri_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_kolektor_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_fungsi_jalan_kolektor_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_lokal_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_fungsi_jalan_lokal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_lingkungan_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_pelanggaran_fungsi_jalan_lingkungan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_jumlah_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_jumlah_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_jumlah_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_kerugian_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_jumlah_kerugian_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_sim_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_barang_bukti_yg_disita_sim_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_stnk_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_barang_bukti_yg_disita_stnk_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_kendaraan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_barang_bukti_yg_disita_kendaraan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pns_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_korban_kecelakaan_lalin_pns_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_karwayan_swasta_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_korban_kecelakaan_lalin_karwayan_swasta_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pengemudi_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_korban_kecelakaan_lalin_pengemudi_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_tni_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_korban_kecelakaan_lalin_tni_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_polri_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_korban_kecelakaan_lalin_polri_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_lain_lain_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_korban_kecelakaan_lalin_lain_lain_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_kurang_15_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_kurang_15_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_16_20_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_16_20_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_21_25_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_21_25_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_26_30_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_26_30_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_31_35_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_31_35_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_36_40_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_36_40_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_41_45_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_41_45_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_45_50_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_45_50_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_51_55_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_51_55_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_56_60_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_56_60_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_diatas_60_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_korban_kecelakaan_diatas_60_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_a_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_a_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_a_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_a_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b1_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_b1_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b1_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_b1_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b2_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_b2_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b2_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_b2_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_c_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_c_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_d_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_d_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_internasional_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_sim_internasional_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_tanpa_sim_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_korban_kecelakaan_tanpa_sim_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_bus_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yg_terlibat_kecelakaan_mobil_bus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_barang_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yg_terlibat_kecelakaan_mobil_barang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p',
                    'val' => zeroIfNull($insertedPrev->prev_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tunggal_ooc_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_tunggal_ooc_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_depan_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_depan_depan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_belakang_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_depan_belakang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_samping_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_depan_samping_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_beruntun_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_beruntun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_pejalan_kaki_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_pejalan_kaki_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tabrak_lari_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_tabrak_lari_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tabrak_hewan_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_tabrak_hewan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_samping_samping_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_samping_samping_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_lainnya_p',
                    'val' => zeroIfNull($insertedPrev->prev_jenis_kecelakaan_lainnya_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_pns_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_kecelakaan_lalin_pns_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_pengemudi_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_kecelakaan_lalin_pengemudi_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_tni_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_kecelakaan_lalin_tni_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_polri_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_kecelakaan_lalin_polri_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_lain_lain_p',
                    'val' => zeroIfNull($insertedPrev->prev_profesi_pelaku_kecelakaan_lalin_lain_lain_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_kurang_dari_15_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_kurang_dari_15_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_16_20_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_16_20_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_21_25_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_21_25_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_26_30_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_26_30_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_31_35_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_31_35_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_36_40_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_36_40_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_41_45_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_41_45_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_46_50_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_46_50_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_51_55_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_51_55_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_56_60_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_56_60_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_diatas_60_tahun_p',
                    'val' => zeroIfNull($insertedPrev->prev_usia_pelaku_kecelakaan_diatas_60_tahun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_a_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_a_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_a_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_a_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b1_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_b1_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b1_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_b1_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b2_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_b2_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b2_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_b2_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_c_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_c_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_d_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_d_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_internasional_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_sim_internasional_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_tanpa_sim_p',
                    'val' => zeroIfNull($insertedPrev->prev_sim_pelaku_kecelakaan_tanpa_sim_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_pemukiman_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_lalin_pemukiman_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_perbelanjaan_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_lalin_perbelanjaan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_perkantoran_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_lalin_perkantoran_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_wisata_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_lalin_wisata_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_industri_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_lalin_industri_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_lain_lain_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_lalin_lain_lain_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_nasional_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_status_jalan_nasional_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_propinsi_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_status_jalan_propinsi_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_kab_kota_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_status_jalan_kab_kota_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_desa_lingkungan_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_status_jalan_desa_lingkungan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_arteri_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_fungsi_jalan_arteri_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_kolektor_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_fungsi_jalan_kolektor_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_lokal_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_fungsi_jalan_lokal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_lingkungan_p',
                    'val' => zeroIfNull($insertedPrev->prev_lokasi_kecelakaan_fungsi_jalan_lingkungan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_manusia_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_manusia_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_ngantuk_lelah_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_ngantuk_lelah_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_mabuk_obat_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_mabuk_obat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_sakit_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_sakit_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_handphone_elektronik_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_handphone_elektronik_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_menerobos_lampu_merah_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_menerobos_lampu_merah_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_berpindah_jalur_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_berpindah_jalur_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_lainnya_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_lainnya_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_alam_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_alam_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_kelaikan_kendaraan_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_kelaikan_kendaraan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_kondisi_jalan_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_kondisi_jalan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_prasarana_jalan_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_prasarana_jalan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_rambu_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_rambu_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_marka_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_marka_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_apil_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_apil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p',
                    'val' => zeroIfNull($insertedPrev->prev_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_00_03_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_00_03_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_03_06_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_03_06_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_06_09_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_06_09_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_09_12_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_09_12_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_12_15_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_12_15_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_15_18_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_15_18_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_18_21_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_18_21_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_21_24_p',
                    'val' => zeroIfNull($insertedPrev->prev_waktu_kejadian_kecelakaan_21_24_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_menonjol_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_menonjol_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_menonjol_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_menonjol_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_menonjol_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tunggal_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tunggal_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tunggal_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tunggal_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tunggal_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_lari_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_lari_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_lari_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_sepeda_motor_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_roda_empat_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_meninggal_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_perlintasan_ka_korban_meninggal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_materiil_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_lalin_perlintasan_ka_materiil_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_kereta_api_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_transportasi_kereta_api_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_laut_perairan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_transportasi_laut_perairan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_udara_p',
                    'val' => zeroIfNull($insertedPrev->prev_kecelakaan_transportasi_udara_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_cetak_p',
                    'val' => zeroIfNull($insertedPrev->prev_penlu_melalui_media_cetak_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_elektronik_p',
                    'val' => zeroIfNull($insertedPrev->prev_penlu_melalui_media_elektronik_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_sosial_p',
                    'val' => zeroIfNull($insertedPrev->prev_penlu_melalui_media_sosial_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_tempat_keramaian_p',
                    'val' => zeroIfNull($insertedPrev->prev_penlu_melalui_tempat_keramaian_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_tempat_istirahat_p',
                    'val' => zeroIfNull($insertedPrev->prev_penlu_melalui_tempat_istirahat_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_daerah_rawan_laka_dan_langgar_p',
                    'val' => zeroIfNull($insertedPrev->prev_penlu_melalui_daerah_rawan_laka_dan_langgar_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_spanduk_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyebaran_pemasangan_spanduk_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_leaflet_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyebaran_pemasangan_leaflet_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_sticker_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyebaran_pemasangan_sticker_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_bilboard_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyebaran_pemasangan_bilboard_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'polisi_sahabat_anak_p',
                    'val' => zeroIfNull($insertedPrev->prev_polisi_sahabat_anak_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'cara_aman_sekolah_p',
                    'val' => zeroIfNull($insertedPrev->prev_cara_aman_sekolah_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'patroli_keamanan_sekolah_p',
                    'val' => zeroIfNull($insertedPrev->prev_patroli_keamanan_sekolah_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pramuka_bhayangkara_krida_lalu_lintas_p',
                    'val' => zeroIfNull($insertedPrev->prev_pramuka_bhayangkara_krida_lalu_lintas_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'police_goes_to_campus_p',
                    'val' => zeroIfNull($insertedPrev->prev_police_goes_to_campus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'safety_riding_driving_p',
                    'val' => zeroIfNull($insertedPrev->prev_safety_riding_driving_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'forum_lalu_lintas_angkutan_umum_p',
                    'val' => zeroIfNull($insertedPrev->prev_forum_lalu_lintas_angkutan_umum_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kampanye_keselamatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_kampanye_keselamatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sekolah_mengemudi_p',
                    'val' => zeroIfNull($insertedPrev->prev_sekolah_mengemudi_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'taman_lalu_lintas_p',
                    'val' => zeroIfNull($insertedPrev->prev_taman_lalu_lintas_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'global_road_safety_partnership_action_p',
                    'val' => zeroIfNull($insertedPrev->prev_global_road_safety_partnership_action_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_pengaturan_p',
                    'val' => zeroIfNull($insertedPrev->prev_giat_lantas_pengaturan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_penjagaan_p',
                    'val' => zeroIfNull($insertedPrev->prev_giat_lantas_penjagaan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_pengawalan_p',
                    'val' => zeroIfNull($insertedPrev->prev_giat_lantas_pengawalan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_patroli_p',
                    'val' => zeroIfNull($insertedPrev->prev_giat_lantas_patroli_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_bus_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_jumlah_bus_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_penumpang_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_jumlah_penumpang_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_bus_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_jumlah_bus_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_penumpang_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_jumlah_penumpang_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_terminal_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_total_terminal_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bus_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_total_bus_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_penumpang_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_penumpang_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bus_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_total_bus_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_penumpang_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_penumpang_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_stasiun_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_kereta_api_total_stasiun_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_penumpang_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_kereta_api_total_penumpang_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_penumpang_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_kereta_api_total_penumpang_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_pelabuhan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_total_pelabuhan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_kendaraan_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_kendaraan_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_kendaraan_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_kendaraan_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_total_penumpang_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_total_penumpang_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_total_penumpang_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_pelabuhan_total_penumpang_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_jumlah_penumpang_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_bandara_jumlah_penumpang_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_jumlah_penumpang_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_bandara_jumlah_penumpang_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bandara_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_total_bandara_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_total_penumpang_keberangkatan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_bandara_total_penumpang_keberangkatan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_total_penumpang_kedatangan_p',
                    'val' => zeroIfNull($insertedPrev->prev_arus_mudik_bandara_total_penumpang_kedatangan_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_teguran_gar_prokes_p',
                    'val' => zeroIfNull($insertedPrev->prev_prokes_covid_teguran_gar_prokes_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_pembagian_masker_p',
                    'val' => zeroIfNull($insertedPrev->prev_prokes_covid_pembagian_masker_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_sosialisasi_tentang_prokes_p',
                    'val' => zeroIfNull($insertedPrev->prev_prokes_covid_sosialisasi_tentang_prokes_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_giat_baksos_p',
                    'val' => zeroIfNull($insertedPrev->prev_prokes_covid_giat_baksos_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_motor_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyekatan_motor_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_penumpang_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyekatan_mobil_penumpang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_bus_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyekatan_mobil_bus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_barang_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyekatan_mobil_barang_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_kendaraan_khusus_p',
                    'val' => zeroIfNull($insertedPrev->prev_penyekatan_kendaraan_khusus_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'rapid_test_antigen_positif_p',
                    'val' => zeroIfNull($insertedPrev->prev_rapid_test_antigen_positif_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'rapid_test_antigen_positif_p',
                    'val' => zeroIfNull($insertedPrev->prev_rapid_test_antigen_positif_p_sum),
                    'date_loop' => $cd->tanggal,
                ],
            );
        }

        LoopTotalSummary::insert($bulkDataPrev);
    }
}
