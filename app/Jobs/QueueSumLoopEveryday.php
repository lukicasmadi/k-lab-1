<?php

namespace App\Jobs;

use App\Models\DailyNotice;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use App\Models\SumLoopEveryday;
use App\Models\DailyNoticeCurrent;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class QueueSumLoopEveryday implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    protected $rencanaOperasi;

    public function __construct($rencanaOperasi)
    {
        $this->rencanaOperasi = $rencanaOperasi;
    }

    public function handle()
    {
        SumLoopEveryday::truncate();

        $limit = null;

        $dailyNoticePrev = DailyNotice::where('operation_id', $this->rencanaOperasi->id)
            ->when(!is_null($limit), function ($q) use ($limit) {
                return $q->take($limit);
            })
            ->orderBy('submited_date', 'asc')
            ->get();

        $dailyNoticeCurrent = DailyNoticeCurrent::where('operation_id', $this->rencanaOperasi->id)
            ->when(!is_null($limit), function ($q) use ($limit) {
                return $q->take($limit);
            })
            ->orderBy('submited_date', 'asc')
            ->get();

        sumGroupPrev($dailyNoticePrev);
        sumGroupCurrent($dailyNoticeCurrent);
    }
}
