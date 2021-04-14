<?php

namespace App\Http\Controllers;

use App\Models\DailyRekap;
use Illuminate\Http\Request;
use App\Http\Requests\DailyRekapRequest;

class DailyRekapController extends Controller
{
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
}
