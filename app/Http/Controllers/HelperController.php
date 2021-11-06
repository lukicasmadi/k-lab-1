<?php

namespace App\Http\Controllers;

use App\Models\CountDown;
use App\Models\DailyInput;
use App\Models\DailyNotice;
use Illuminate\Http\Request;
use App\Models\DailyInputPrev;
use App\Models\RencanaOperasi;
use App\Jobs\ProcessSummaryPrev;
use Illuminate\Support\Facades\DB;
use App\Jobs\ProcessSummaryCurrent;

class HelperController extends Controller
{
    public function dailyProcess()
    {
        // $data = currentDaily(3, '2021-10-02');
        // $data = DB::select('CALL summaryDataCurrent(?,?)', [3, '2021-10-02']);

        // return $data;
    }

    public function runDispatch()
    {
        $countDown = CountDown::orderBy('tanggal', 'asc')->get();

        foreach($countDown as $cd) {
            dispatch(new ProcessSummaryPrev($cd->rencana_operasi_id, $cd->tanggal));
            dispatch(new ProcessSummaryCurrent($cd->rencana_operasi_id, $cd->tanggal));
        }

        return "DISPACTH DONE";
    }
}
