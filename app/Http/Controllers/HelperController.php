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

class HelperController extends Controller
{
    public function dailyProcess($operationId)
    {
        // $data = currentDaily(3, '2021-10-02');
        // $data = DB::select('CALL summaryDataCurrent(?,?)', [3, '2021-10-02']);

        // return $data;

        // $countDown = CountDown::where('rencana_operasi_id', $operationId)->orderBy('tanggal', 'asc')->get();

        // return $countDown;
    }

    public function runDispatch($operationId)
    {
        $countDown = CountDown::where('rencana_operasi_id', $operationId)->orderBy('tanggal', 'asc')->get();

        DailyNoticeCurrent::where('operation_id', $operationId)->delete();
        DailyNotice::where('operation_id', $operationId)->delete();

        foreach($countDown as $cd) {
            dispatch(new ProcessSummaryPrev($cd->rencana_operasi_id, $cd->tanggal));
            dispatch(new ProcessSummaryCurrent($cd->rencana_operasi_id, $cd->tanggal));
        }

        return "DISPACTH DONE";
    }
}
