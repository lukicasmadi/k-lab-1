<?php

namespace App\Http\Controllers;

use App\Models\DailyInput;
use Illuminate\Http\Request;
use App\Models\DailyInputPrev;
use App\Models\KorlantasRekap;
use App\Models\RencanaOperasi;
use Illuminate\Support\Facades\DB;
use App\Models\PoldaCustomOperationName;
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

    public function korlantas_rekap($uuid)
    {
        $model = KorlantasRekap::whereUuid($uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        return $model;
    }

    public function byuuid($uuid)
    {
        $model = KorlantasRekap::with(['rencaraOperasi', 'poldaData'])->whereUuid($uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        $year = $model->year;
        $yearMinSatu = $model->year - 1;
        $polda = $model->polda;
        $operation_date = $model->operation_date;
        $rencana_operasi_id = $model->rencana_operasi_id;

        $cekCurrent = DailyInput::where('rencana_operasi_id', $rencana_operasi_id)
        ->where('year', $year)
        ->when($polda != 'polda_all', function ($q) use ($polda) {
            return $q->where('polda_id', $polda);
        })
        ->when($operation_date != 'semua_hari', function ($q) use ($operation_date) {
            return $q->where(DB::raw('DATE(created_at)'), $operation_date);
        })
        ->first();

        if(empty($cekCurrent)) {
            // DATA TIDAK DITEMUKAN DI TABEL CURRENT, CARI KE TABEL PREV
            $cekCurrentDua = DailyInputPrev::where('rencana_operasi_id', $rencana_operasi_id)
            ->where('year', $year)
            ->when($polda != 'polda_all', function ($q) use ($polda) {
                return $q->where('polda_id', $polda);
            })
            ->when($operation_date != 'semua_hari', function ($q) use ($operation_date) {
                return $q->where(DB::raw('DATE(created_at)'), $operation_date);
            })
            ->first();

            if(empty($cekCurrentDua)) {
                 // DATA TIDAK DITEMUKAN DI TABEL PREV, ARTINYA DATA MEMANG KOSONG
                 abort(404);
            } else {
                // DATA ADA DITEMUKAN DI TABEL PREV
                $dailyInputPrev = dailyInputPrevButCustomYear(
                    $rencana_operasi_id,
                    $year,
                    $polda,
                    ($operation_date != 'semua_hari') ? $operation_date : "semua_hari",
                );
                $dailyPrev = $year;
                $daily = $year + 1;
            }
        } else {
            // DATA DITEMUKAN DI TABEL CURRENT
            $dailyInput = dailyInput(
                $rencana_operasi_id,
                $year,
                $polda,
                ($operation_date != 'semua_hari') ? $operation_date : "semua_hari",
            );

            $dailyInputPrev = dailyInputPrev(
                $rencana_operasi_id,
                $year,
                $polda,
                ($operation_date != 'semua_hari') ? $operation_date : "semua_hari",
            );

            $dailyPrev = $year - 1;
            $daily = $year;
        }

        return [
            'dailyInput' => (empty($dailyInput) || is_null($dailyInput)) ? null : $dailyInput,
            'dailyInputPrev' => (empty($dailyInputPrev) || is_null($dailyInputPrev)) ? null : $dailyInputPrev,
            'daily' => (empty($daily)) ? "" : $daily,
            'dailyPrev' => (empty($dailyPrev)) ? "" : $dailyPrev,
        ];
    }

    public function polda_custom_name()
    {
        return view('operation.polda_custom');
    }

    public function getCustomName($uuid)
    {
        $rencana_operasi = RencanaOperasi::whereUuid($uuid)->first();

        if(!empty($rencana_operasi)) {
            $rencanaOpId = $rencana_operasi->id;
            $pCustomName = PoldaCustomOperationName::where('rencana_operasi_id', $rencanaOpId)->where('polda_id', poldaId())->first();

            if(empty($pCustomName)) {
                return [
                    'rencana_op_id' => $rencanaOpId,
                    'output' => null
                ];
            } else {
                return [
                    'rencana_op_id' => $rencanaOpId,
                    'output' => $pCustomName->alias
                ];
            }
        } else {
            abort(404);
        }
    }

    public function storeCustomName()
    {
        $pcon = PoldaCustomOperationName::updateOrCreate(
            ['rencana_operasi_id' => request('operation_id'), 'polda_id' => poldaId()],
            ['alias' => strtoupper(request('alias'))]
        );

        return $pcon;
    }

    public function update()
    {
        $model = KorlantasRekap::updateOrCreate(
            ['uuid' => request('uuid_edit')],
            [
                'report_name' => request('report_name_edit'),
                'polda' => request('polda_edit'),
                'year' => request('year_edit'),
                'rencana_operasi_id' => request('rencana_operasi_id_edit'),
                'operation_date' => (request('operation_date_edit') == "pilih_hari") ? request('hari_edit') : 'semua_hari',
            ]
        );

        flash('Rekap harian berhasil diubah')->success();
        return redirect()->back();
    }
}
