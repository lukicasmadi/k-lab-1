<?php

namespace App\Http\Controllers;

use Throwable;
use App\Jobs\QueuePrev;
use App\Models\CountDown;
use Illuminate\Bus\Batch;
use App\Jobs\QueueCurrent;
use App\Models\DailyInput;
use App\Models\DailyNotice;
use Illuminate\Http\Request;
use App\Models\DailyInputPrev;
use App\Models\RencanaOperasi;
use App\Models\SumLoopEveryday;
use App\Jobs\ProcessSummaryPrev;
use App\Models\LoopTotalSummary;
use App\Jobs\QueueSumLoopEveryday;
use App\Models\DailyNoticeCurrent;
use Illuminate\Support\Facades\DB;
use App\Jobs\ProcessSummaryCurrent;
use Illuminate\Support\Facades\Bus;

class HelperController extends Controller
{

    public function queueCheck($bacthId)
    {
        $id = $bacthId;
        $batch = Bus::findBatch($id);

        return $batch;
    }

    public function reportAllPolda($uuid)
    {
        $rencanaOperasi = RencanaOperasi::where('uuid', $uuid)->firstOrFail();
        $operationId = $rencanaOperasi->id;

        session()->forget(['progres_report_id']);

        $countDown = CountDown::where('rencana_operasi_id', $operationId)->orderBy('tanggal', 'asc')->get();

        DailyNoticeCurrent::where('operation_id', $operationId)->delete();
        DailyNotice::where('operation_id', $operationId)->delete();

        $batch = Bus::batch([
            new QueuePrev($countDown),
            new QueueCurrent($countDown),
            new QueueSumLoopEveryday($rencanaOperasi),
        ])->then(function (Batch $batch) {
            // All jobs completed successfully...
        })->catch(function (Batch $batch, Throwable $e) {
            // First batch job failure detected...
        })->finally(function (Batch $batch) {
            // The batch has finished executing...
        })->name('Reporting '.ucwords(strtolower($rencanaOperasi->name)))->dispatch();

        session(['progres_report_id' => $rencanaOperasi->uuid]);

        return redirect()->route('batch_progress', $batch->id);
    }

    public function dailyProcess($operationId)
    {
        $data = currentDaily(3, '2021-10-02');
        $data = DB::select('CALL summaryDataCurrent(?,?)', [3, '2021-10-02']);

        return $data;

        $countDown = CountDown::where('rencana_operasi_id', $operationId)->orderBy('tanggal', 'asc')->get();

        return $countDown;
    }

    public function loopData($operationId)
    {
        $prev = DailyNotice::orderBy('submited_date', 'asc')->get();
        $current = DailyNoticeCurrent::orderBy('submited_date', 'asc')->get();
    }

    public function batchProgress($batchId)
    {
        $batch = Bus::findBatch($batchId);

        return view('report.progress', compact('batch'));
    }

    public function openReadyReport($operationUuid)
    {
        $limit = null;

        $rencanaOperasi = RencanaOperasi::where('uuid', $operationUuid)->firstOrFail();
        $countDown = CountDown::where('rencana_operasi_id', $rencanaOperasi->id)->get();

        LoopTotalSummary::truncate();

        $dailyNoticePrev = DailyNotice::where('operation_id', $rencanaOperasi->id)
            ->when(!is_null($limit), function ($q) use ($limit) {
                return $q->take($limit);
            })
            ->orderBy('submited_date', 'asc')
            ->get();

        $dailyNoticeCurrent = DailyNoticeCurrent::where('operation_id', $rencanaOperasi->id)
            ->when(!is_null($limit), function ($q) use ($limit) {
                return $q->take($limit);
            })
            ->orderBy('submited_date', 'asc')
            ->get();

        $totalLoopDays  = count($dailyNoticePrev);
        $currentYear    = date("Y", strtotime($rencanaOperasi->start_date));
        $prevYear       = $currentYear - 1;

        $totalPlusJumlah = ($totalLoopDays + 1) * 2;
        $labelNumber = $totalPlusJumlah + 2;

        $operationId = $rencanaOperasi->id;

        return view('exports.ready_new', compact('dailyNoticeCurrent', 'dailyNoticePrev', 'totalLoopDays', 'currentYear', 'prevYear', 'totalPlusJumlah', 'labelNumber', 'operationId'));
    }

    public function runDispatch($operationId)
    {
        $countDown = CountDown::where('rencana_operasi_id', $operationId)->orderBy('tanggal', 'asc')->get();

        $bulkData = [];

        LoopTotalSummary::truncate();

        foreach($countDown as $cd) {
            $data = DB::select('CALL summaryDataCurrent(?,?)', [$cd->rencana_operasi_id, $cd->tanggal]);

            array_push($bulkData,
                [
                    'type' => 'pelanggaran_lalu_lintas_tilang',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_lalu_lintas_tilang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_lalu_lintas_teguran',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_lalu_lintas_teguran_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_kecepatan',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_helm',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_marka_menerus_menyalip',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_marka_menerus_menyalip_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melawan_arus',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_melawan_arus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_lampu_lalin',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_melanggar_lampu_lalin_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_melanggar_marka_berhenti',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_melanggar_marka_berhenti_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_surat_surat',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_surat_surat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_kelengkapan_kendaraan',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_kelengkapan_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_sepeda_motor_lain_lain',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_sepeda_motor_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_kecepatan',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_safety_belt',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_safety_belt_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_muatan_overload',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_muatan_overload_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_marka_menerus_menyalip',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_marka_menerus_menyalip_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melawan_arus',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_melawan_arus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_lampu_lalin',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_melanggar_lampu_lalin_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_mengemudi_tidak_wajar',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_mengemudi_tidak_wajar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_syarat_teknis_layak_jalan',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_syarat_teknis_layak_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_tidak_nyala_lampu_malam',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_tidak_nyala_lampu_malam_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_berbelok_tanpa_isyarat',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_berbelok_tanpa_isyarat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_berbalapan_di_jalan_raya',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_berbalapan_di_jalan_raya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_melanggar_marka_berhenti',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_melanggar_marka_berhenti_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_tidak_patuh_perintah_petugas',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_tidak_patuh_perintah_petugas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_surat_surat',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_surat_surat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_kelengkapan_kendaraan',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_kelengkapan_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_mobil_lain_lain',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_mobil_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat',
                    'val' => zeroIfNull($data[0]->current_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_sim',
                    'val' => zeroIfNull($data[0]->current_barang_bukti_yg_disita_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_stnk',
                    'val' => zeroIfNull($data[0]->current_barang_bukti_yg_disita_stnk_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'barang_bukti_yg_disita_kendaraan',
                    'val' => zeroIfNull($data[0]->current_barang_bukti_yg_disita_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yang_terlibat_pelanggaran_sepeda_motor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_bus',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yang_terlibat_pelanggaran_mobil_bus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_mobil_barang',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yang_terlibat_pelanggaran_mobil_barang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pns',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_pelanggaran_pns_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_karyawan_swasta',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_pelanggaran_karyawan_swasta_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pelajar_mahasiswa',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_pelanggaran_pelajar_mahasiswa_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_pengemudi_supir',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_pelanggaran_pengemudi_supir_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_tni',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_pelanggaran_tni_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_polri',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_pelanggaran_polri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_pelanggaran_lain_lain',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_pelanggaran_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_kurang_dari_15_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_kurang_dari_15_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_16_20_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_16_20_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_21_25_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_21_25_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_26_30_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_26_30_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_31_35_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_31_35_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_36_40_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_36_40_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_41_45_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_41_45_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_46_50_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_46_50_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_51_55_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_51_55_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_56_60_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_56_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_pelanggaran_diatas_60_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_pelanggaran_diatas_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_a',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_a_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_a_umum',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_a_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b1',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_b1_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b1_umum',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_b1_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b2',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_b2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_b2_umum',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_b2_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_c',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_c_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_d',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_d_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_sim_internasional',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_sim_internasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_pelanggaran_tanpa_sim',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_pelanggaran_tanpa_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_pemukiman',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_pemukiman_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_perbelanjaan',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_perbelanjaan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_perkantoran',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_perkantoran_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_wisata',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_wisata_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_industri',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_industri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_nasional',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_status_jalan_nasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_propinsi',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_status_jalan_propinsi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_kab_kota',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_status_jalan_kab_kota_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_status_jalan_desa_lingkungan',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_status_jalan_desa_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_arteri',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_fungsi_jalan_arteri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_kolektor',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_fungsi_jalan_kolektor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_lokal',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_fungsi_jalan_lokal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_pelanggaran_fungsi_jalan_lingkungan',
                    'val' => zeroIfNull($data[0]->current_lokasi_pelanggaran_fungsi_jalan_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_jumlah_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_jumlah_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_jumlah_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_jumlah_kerugian_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_jumlah_kerugian_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_sim',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_barang_bukti_yg_disita_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_stnk',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_barang_bukti_yg_disita_stnk_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_barang_bukti_yg_disita_kendaraan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_barang_bukti_yg_disita_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pns',
                    'val' => zeroIfNull($data[0]->current_profesi_korban_kecelakaan_lalin_pns_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_karwayan_swasta',
                    'val' => zeroIfNull($data[0]->current_profesi_korban_kecelakaan_lalin_karwayan_swasta_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa',
                    'val' => zeroIfNull($data[0]->current_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_pengemudi',
                    'val' => zeroIfNull($data[0]->current_profesi_korban_kecelakaan_lalin_pengemudi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_tni',
                    'val' => zeroIfNull($data[0]->current_profesi_korban_kecelakaan_lalin_tni_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_polri',
                    'val' => zeroIfNull($data[0]->current_profesi_korban_kecelakaan_lalin_polri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_korban_kecelakaan_lalin_lain_lain',
                    'val' => zeroIfNull($data[0]->current_profesi_korban_kecelakaan_lalin_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_kurang_15',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_kurang_15_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_16_20',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_16_20_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_21_25',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_21_25_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_26_30',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_26_30_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_31_35',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_31_35_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_36_40',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_36_40_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_41_45',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_41_45_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_45_50',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_45_50_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_51_55',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_51_55_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_56_60',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_56_60_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_korban_kecelakaan_diatas_60',
                    'val' => zeroIfNull($data[0]->current_usia_korban_kecelakaan_diatas_60_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_a',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_a_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_a_umum',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_a_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b1',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_b1_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b1_umum',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_b1_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b2',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_b2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_b2_umum',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_b2_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_c',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_c_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_d',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_d_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_sim_internasional',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_sim_internasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_korban_kecelakaan_tanpa_sim',
                    'val' => zeroIfNull($data[0]->current_sim_korban_kecelakaan_tanpa_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_sepeda_motor',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yg_terlibat_kecelakaan_sepeda_motor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_bus',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yg_terlibat_kecelakaan_mobil_bus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_mobil_barang',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yg_terlibat_kecelakaan_mobil_barang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor',
                    'val' => zeroIfNull($data[0]->current_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tunggal_ooc',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_tunggal_ooc_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_depan',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_depan_depan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_belakang',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_depan_belakang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_depan_samping',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_depan_samping_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_beruntun',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_beruntun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_pejalan_kaki',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_pejalan_kaki_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tabrak_lari',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_tabrak_lari_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_tabrak_hewan',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_tabrak_hewan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_samping_samping',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_samping_samping_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'jenis_kecelakaan_lainnya',
                    'val' => zeroIfNull($data[0]->current_jenis_kecelakaan_lainnya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_pns',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_kecelakaan_lalin_pns_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_karyawan_swasta',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_kecelakaan_lalin_karyawan_swasta_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_pengemudi',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_kecelakaan_lalin_pengemudi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_tni',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_kecelakaan_lalin_tni_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_polri',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_kecelakaan_lalin_polri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'profesi_pelaku_kecelakaan_lalin_lain_lain',
                    'val' => zeroIfNull($data[0]->current_profesi_pelaku_kecelakaan_lalin_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_kurang_dari_15_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_kurang_dari_15_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_16_20_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_16_20_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_21_25_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_21_25_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_26_30_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_26_30_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_31_35_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_31_35_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_36_40_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_36_40_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_41_45_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_41_45_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_46_50_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_46_50_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_51_55_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_51_55_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_56_60_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_56_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'usia_pelaku_kecelakaan_diatas_60_tahun',
                    'val' => zeroIfNull($data[0]->current_usia_pelaku_kecelakaan_diatas_60_tahun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_a',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_a_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_a_umum',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_a_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b1',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_b1_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b1_umum',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_b1_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b2',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_b2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_b2_umum',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_b2_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_c',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_c_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_d',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_d_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_sim_internasional',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_sim_internasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sim_pelaku_kecelakaan_tanpa_sim',
                    'val' => zeroIfNull($data[0]->current_sim_pelaku_kecelakaan_tanpa_sim_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_pemukiman',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_lalin_pemukiman_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_perbelanjaan',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_lalin_perbelanjaan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_perkantoran',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_lalin_perkantoran_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_wisata',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_lalin_wisata_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_industri',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_lalin_industri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_lalin_lain_lain',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_lalin_lain_lain_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_nasional',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_status_jalan_nasional_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_propinsi',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_status_jalan_propinsi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_kab_kota',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_status_jalan_kab_kota_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_status_jalan_desa_lingkungan',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_status_jalan_desa_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_arteri',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_fungsi_jalan_arteri_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_kolektor',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_fungsi_jalan_kolektor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_lokal',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_fungsi_jalan_lokal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'lokasi_kecelakaan_fungsi_jalan_lingkungan',
                    'val' => zeroIfNull($data[0]->current_lokasi_kecelakaan_fungsi_jalan_lingkungan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_manusia',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_manusia_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_ngantuk_lelah',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_ngantuk_lelah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_mabuk_obat',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_mabuk_obat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_sakit',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_sakit_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_handphone_elektronik',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_handphone_elektronik_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_menerobos_lampu_merah',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_menerobos_lampu_merah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_melanggar_batas_kecepatan',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_menjaga_jarak',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_tidak_menjaga_jarak_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_berpindah_jalur',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_berpindah_jalur_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_lainnya',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_lainnya_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_alam',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_alam_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_kelaikan_kendaraan',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_kelaikan_kendaraan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_kondisi_jalan',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_kondisi_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_prasarana_jalan',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_prasarana_jalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_rambu',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_rambu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_marka',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_marka_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_apil',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_apil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu',
                    'val' => zeroIfNull($data[0]->current_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_00_03',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_00_03_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_03_06',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_03_06_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_06_09',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_06_09_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_09_12',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_09_12_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_12_15',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_12_15_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_15_18',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_15_18_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_18_21',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_18_21_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'waktu_kejadian_kecelakaan_21_24',
                    'val' => zeroIfNull($data[0]->current_waktu_kejadian_kecelakaan_21_24_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_menonjol_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_menonjol_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_menonjol_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_menonjol_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_menonjol_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_menonjol_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tunggal_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tunggal_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tunggal_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tunggal_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tunggal_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tunggal_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_pejalan_kaki_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_pejalan_kaki_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_lari_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_lari_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_lari_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_lari_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_lari_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_lari_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_sepeda_motor_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_sepeda_motor_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_roda_empat_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_roda_empat_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_tabrak_tidak_bermotor_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_tabrak_tidak_bermotor_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_jumlah_kejadian',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_berpalang_pintu',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_perlintasan_ka_berpalang_pintu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_luka_ringan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_luka_berat',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_perlintasan_ka_korban_luka_berat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_korban_meninggal',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_perlintasan_ka_korban_meninggal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_lalin_perlintasan_ka_materiil',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_lalin_perlintasan_ka_materiil_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_kereta_api',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_transportasi_kereta_api_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_laut_perairan',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_transportasi_laut_perairan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kecelakaan_transportasi_udara',
                    'val' => zeroIfNull($data[0]->current_kecelakaan_transportasi_udara_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_cetak',
                    'val' => zeroIfNull($data[0]->current_penlu_melalui_media_cetak_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_elektronik',
                    'val' => zeroIfNull($data[0]->current_penlu_melalui_media_elektronik_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_media_sosial',
                    'val' => zeroIfNull($data[0]->current_penlu_melalui_media_sosial_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_tempat_keramaian',
                    'val' => zeroIfNull($data[0]->current_penlu_melalui_tempat_keramaian_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_tempat_istirahat',
                    'val' => zeroIfNull($data[0]->current_penlu_melalui_tempat_istirahat_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penlu_melalui_daerah_rawan_laka_dan_langgar',
                    'val' => zeroIfNull($data[0]->current_penlu_melalui_daerah_rawan_laka_dan_langgar_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_spanduk',
                    'val' => zeroIfNull($data[0]->current_penyebaran_pemasangan_spanduk_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_leaflet',
                    'val' => zeroIfNull($data[0]->current_penyebaran_pemasangan_leaflet_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_sticker',
                    'val' => zeroIfNull($data[0]->current_penyebaran_pemasangan_sticker_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyebaran_pemasangan_bilboard',
                    'val' => zeroIfNull($data[0]->current_penyebaran_pemasangan_bilboard_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'polisi_sahabat_anak',
                    'val' => zeroIfNull($data[0]->current_polisi_sahabat_anak_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'cara_aman_sekolah',
                    'val' => zeroIfNull($data[0]->current_cara_aman_sekolah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'patroli_keamanan_sekolah',
                    'val' => zeroIfNull($data[0]->current_patroli_keamanan_sekolah_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'pramuka_bhayangkara_krida_lalu_lintas',
                    'val' => zeroIfNull($data[0]->current_pramuka_bhayangkara_krida_lalu_lintas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'police_goes_to_campus',
                    'val' => zeroIfNull($data[0]->current_police_goes_to_campus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'safety_riding_driving',
                    'val' => zeroIfNull($data[0]->current_safety_riding_driving_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'forum_lalu_lintas_angkutan_umum',
                    'val' => zeroIfNull($data[0]->current_forum_lalu_lintas_angkutan_umum_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'kampanye_keselamatan',
                    'val' => zeroIfNull($data[0]->current_kampanye_keselamatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'sekolah_mengemudi',
                    'val' => zeroIfNull($data[0]->current_sekolah_mengemudi_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'taman_lalu_lintas',
                    'val' => zeroIfNull($data[0]->current_taman_lalu_lintas_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'global_road_safety_partnership_action',
                    'val' => zeroIfNull($data[0]->current_global_road_safety_partnership_action_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_pengaturan',
                    'val' => zeroIfNull($data[0]->current_giat_lantas_pengaturan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_penjagaan',
                    'val' => zeroIfNull($data[0]->current_giat_lantas_penjagaan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_pengawalan',
                    'val' => zeroIfNull($data[0]->current_giat_lantas_pengawalan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'giat_lantas_patroli',
                    'val' => zeroIfNull($data[0]->current_giat_lantas_patroli_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_bus_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_jumlah_bus_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_penumpang_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_jumlah_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_bus_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_jumlah_bus_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_jumlah_penumpang_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_jumlah_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_terminal',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_total_terminal_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bus_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_total_bus_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_penumpang_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bus_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_total_bus_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_penumpang_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_stasiun',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_kereta_api_total_stasiun_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_penumpang_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_kereta_api_total_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_kereta_api_total_penumpang_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_kereta_api_total_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_jumlah_penumpang_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_pelabuhan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_total_pelabuhan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_kendaraan_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_kendaraan_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_kendaraan_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_kendaraan_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_total_penumpang_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_total_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_pelabuhan_total_penumpang_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_pelabuhan_total_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_jumlah_penumpang_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_bandara_jumlah_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_jumlah_penumpang_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_bandara_jumlah_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_total_bandara',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_total_bandara_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_total_penumpang_keberangkatan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_bandara_total_penumpang_keberangkatan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'arus_mudik_bandara_total_penumpang_kedatangan',
                    'val' => zeroIfNull($data[0]->current_arus_mudik_bandara_total_penumpang_kedatangan_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_teguran_gar_prokes',
                    'val' => zeroIfNull($data[0]->current_prokes_covid_teguran_gar_prokes_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_pembagian_masker',
                    'val' => zeroIfNull($data[0]->current_prokes_covid_pembagian_masker_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_sosialisasi_tentang_prokes',
                    'val' => zeroIfNull($data[0]->current_prokes_covid_sosialisasi_tentang_prokes_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'prokes_covid_giat_baksos',
                    'val' => zeroIfNull($data[0]->current_prokes_covid_giat_baksos_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_motor',
                    'val' => zeroIfNull($data[0]->current_penyekatan_motor_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_penumpang',
                    'val' => zeroIfNull($data[0]->current_penyekatan_mobil_penumpang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_bus',
                    'val' => zeroIfNull($data[0]->current_penyekatan_mobil_bus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_mobil_barang',
                    'val' => zeroIfNull($data[0]->current_penyekatan_mobil_barang_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'penyekatan_kendaraan_khusus',
                    'val' => zeroIfNull($data[0]->current_penyekatan_kendaraan_khusus_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'rapid_test_antigen_positif',
                    'val' => zeroIfNull($data[0]->current_rapid_test_antigen_positif_sum),
                    'date_loop' => $cd->tanggal,
                ],
                [
                    'type' => 'rapid_test_antigen_positif',
                    'val' => zeroIfNull($data[0]->current_rapid_test_antigen_positif_sum),
                    'date_loop' => $cd->tanggal,
                ],
            );
        }

        LoopTotalSummary::insert($bulkData);

        return "DONE";

        // LoopTotalSummary::create([
        //     'type' => 'pelanggaran_lalu_lintas_tilang',
        //     'val' => summary([
        //         $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_tilang,
        //         $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_teguran
        //     ]),
        // ]);

        // LoopTotalSummary::create([
        //     'type' => 'pelanggaran_lalu_lintas_tilang_p',
        //     'val' => summary([
        //         $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_tilang_p,
        //         $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_teguran_p
        //     ]),
        // ]);
    }
}
