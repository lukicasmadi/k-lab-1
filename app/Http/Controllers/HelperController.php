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

    public function runDispatch($operationId)
    {
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
}
