<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KorlantasRekap;
use App\Http\Requests\KorlantasRekapRequest;

class KorlantasRekapController extends Controller
{
    public function data()
    {
        $model = KorlantasRekap::with(['rencaraOperasi', 'poldaData']);

        return datatables()->eloquent($model)
        ->addColumn('polda_relation', function (KorlantasRekap $kr) {
            if(empty($kr->poldaData)) {
                return "Semua Polda";
            } else {
                return $kr->poldaData->name;
            }
        })
        ->addColumn('rencana_operasi_relation', function (KorlantasRekap $kr) {
            return $kr->rencaraOperasi->name;
        })
        ->toJson();

        return datatables()->eloquent($model)->toJson();
    }

    public function store(KorlantasRekapRequest $request)
    {
        $model = KorlantasRekap::create([
            'uuid' => genUuid(),
            'report_name' => $request->report_name,
            'polda' => $request->polda,
            'year' => $request->year,
            'rencana_operasi_id' => $request->rencana_operasi_id,
            'operation_date' => ($request->operation_date == "semua_hari") ? "semua_hari" : $request->hari,
        ]);

        flash('Rekap harian berhasil dibuat')->success();

        return redirect()->back();
    }

    public function byuuid($uuid)
    {
        $model = KorlantasRekap::with(['rencaraOperasi', 'poldaData'])->whereUuid($uuid)->firstOrFail();
        return $model;
    }
}
