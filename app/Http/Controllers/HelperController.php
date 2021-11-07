<?php

namespace App\Http\Controllers;

use App\Models\CountDown;
use App\Models\DailyInput;
use App\Models\DailyNotice;
use Illuminate\Http\Request;
use App\Models\DailyInputPrev;
use App\Models\RencanaOperasi;
use App\Jobs\ProcessSummaryPrev;
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
        $batch = Bus::batch($jobsCurrent)->dispatch();

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
}
