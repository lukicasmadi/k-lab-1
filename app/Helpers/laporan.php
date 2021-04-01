<?php

use Carbon\Carbon;
use App\Models\DailyInputPrev;

if (! function_exists('repositoryDailyPolda')) {
    function repositoryDailyPolda($data) {

        $semuahari = ($data->year == "semua_hari") ? true : false;

        $prevYear = DailyInputPrev::where('year', $data->year)
            ->when($semuahari, function ($q) use ($data, $semuahari) {
                return $q->where('rencana_operasi_id', $data->rencana_operasi_id);
            })->get();

        return $prevYear;
    }
}