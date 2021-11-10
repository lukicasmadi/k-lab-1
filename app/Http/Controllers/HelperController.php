<?php

namespace App\Http\Controllers;

use App\Models\CountDown;
use App\Models\DailyInput;
use App\Models\DailyNotice;
use Illuminate\Http\Request;
use App\Models\DailyInputPrev;
use App\Models\RencanaOperasi;
use App\Models\SumLoopEveryday;
use App\Jobs\ProcessSummaryPrev;
use App\Models\LoopTotalSummary;
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

        $jobsPrev = [];
        $jobsCurrent = [];

        foreach($countDown as $cd) {
            $jobsPrev[] = new ProcessSummaryPrev($cd->rencana_operasi_id, $cd->tanggal);
            $jobsCurrent[] = new ProcessSummaryCurrent($cd->rencana_operasi_id, $cd->tanggal);
        }

        Bus::batch($jobsPrev)->dispatch();
        $batch = Bus::batch($jobsCurrent)->dispatch();

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

    public function runDispatch($operationId)
    {
        $countDown = CountDown::where('rencana_operasi_id', $operationId)->orderBy('tanggal', 'asc')->get();

        DailyNoticeCurrent::where('operation_id', $operationId)->delete();
        DailyNotice::where('operation_id', $operationId)->delete();

        $jobsPrev = [];
        $jobsCurrent = [];

        foreach($countDown as $cd) {
            $jobsPrev[] = new ProcessSummaryPrev($cd->rencana_operasi_id, $cd->tanggal);
            $jobsCurrent[] = new ProcessSummaryCurrent($cd->rencana_operasi_id, $cd->tanggal);
        }

        Bus::batch($jobsPrev)->dispatch();
        $batch = Bus::batch($jobsCurrent)->name('Calculate Summary Data')->dispatch();

        return redirect()->route('batch_progress', $batch->id);
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
        SumLoopEveryday::truncate();

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

        sumGroupOne($dailyNoticeCurrent);

        return view('exports.ready', compact('dailyNoticeCurrent', 'dailyNoticePrev', 'totalLoopDays', 'currentYear', 'prevYear', 'totalPlusJumlah', 'labelNumber', 'operationId'));
    }
}
