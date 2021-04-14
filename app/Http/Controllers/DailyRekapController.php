<?php

namespace App\Http\Controllers;

use App\Models\DailyRekap;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use App\Http\Requests\DailyRekapRequest;
use App\Http\Requests\DailyRekapEditRequest;

class DailyRekapController extends Controller
{
    public function dailyRekapShowWithInput($uuid)
    {
        $model = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        $polda = $model->polda;
        $year = $model->year;
        $rencana_operartion_id = $model->rencana_operasi_id;
        $config_date = $model->config_date;
        $start_date = $model->operation_date_start;
        $end_date = $model->operation_date_end;
        $prevYear = $year - 1;

        $outputPrev = reportDailyPrev($polda, $prevYear, $rencana_operartion_id, $config_date, $start_date, $end_date);
        $outputCurrent = reportDailyCurrent($polda, $year, $rencana_operartion_id, $config_date, $start_date, $end_date);

        return [
            'dailyInput' => $outputCurrent,
            'dailyInputPrev' => $outputPrev,
            'yearNow' => date("Y"),
            'yearPrev' => date("Y") - 1,
        ];
    }

    public function dailyRekapShow($uuid)
    {
        $model = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        return $model;
    }

    public function data()
    {
        $model = DailyRekap::with(['rencanaOperasi', 'poldaData']);

        return datatables()->eloquent($model)
        ->addColumn('polda_relation', function (DailyRekap $kr) {
            if(empty($kr->poldaData)) {
                return "Semua";
            } else {
                return $kr->poldaData->name;
            }
        })
        ->addColumn('rencana_operasi_relation', function (DailyRekap $kr) {
            return $kr->rencanaOperasi->name;
        })
        ->toJson();

        return datatables()->eloquent($model)->toJson();
    }

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

    public function update(DailyRekapEditRequest $request)
    {
        if($request->config_date_edit == "all") {
            $ro = RencanaOperasi::where('id', $request->rencana_operasi_id_edit)->first();

            $model = DailyRekap::updateOrCreate(
                ['uuid' => request('uuid_edit')],
                [
                    'report_name' => $request->report_name_edit,
                    'polda' => $request->polda_edit,
                    'year' => $request->year_edit,
                    'rencana_operasi_id' => $request->rencana_operasi_id_edit,
                    'config_date' => $request->config_date_edit,
                    'operation_date_start' => dateOnly($ro->start_date),
                    'operation_date_end' => dateOnly($ro->end_date),
                ]
            );
        } else {
            $model = DailyRekap::updateOrCreate(
                ['uuid' => request('uuid_edit')],
                [
                    'report_name' => $request->report_name_edit,
                    'polda' => $request->polda_edit,
                    'year' => $request->year_edit,
                    'rencana_operasi_id' => $request->rencana_operasi_id_edit,
                    'config_date' => $request->config_date_edit,
                    'operation_date_start' => dateOnly($request->tanggal_mulai_edit),
                'operation_date_end' => dateOnly($request->tanggal_selesai_edit),
                ]
            );
        }

        flash('Rekap harian berhasil diubah')->success();
        return redirect()->back();
    }
}
