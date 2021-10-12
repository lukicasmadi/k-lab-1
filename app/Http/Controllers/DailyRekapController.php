<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\NewExport;
use App\Models\DailyRekap;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use App\Models\RencanaOperasi;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Requests\DailyRekapRequest;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Requests\DailyRekapEditRequest;

class DailyRekapController extends Controller
{

    public function dailyRekapExcel($uuid)
    {
        $dailyRekap = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        if(empty($dailyRekap)) {
            flash('Laporan tidak ditemukan. Pastikan filter yang anda atur sudah sesuai!')->warning();
            return redirect()->back();
        }

        if(empty($dailyRekap->kesatuan) || empty($dailyRekap->atasan) || empty($dailyRekap->pangkat_nrp) || empty($dailyRekap->jabatan) || empty($dailyRekap->kota)) {
            flash('Data laphar belum lengkap. Silahkan gunakan menu ubah untuk memperbaharui data')->warning();
            return redirect()->back();
        }

        $polda = $dailyRekap->polda;
        $year = $dailyRekap->year;
        $rencana_operartion_id = $dailyRekap->rencana_operasi_id;
        $config_date = $dailyRekap->config_date;
        $start_date = $dailyRekap->operation_date_start;
        $end_date = $dailyRekap->operation_date_end;
        $prevYear = $year - 1;
        $file_name = $dailyRekap->report_name;

        $prev = reportDailyPrev($polda, $prevYear, $rencana_operartion_id, $config_date, $start_date, $end_date);
        $current = reportDailyCurrent($polda, $year, $rencana_operartion_id, $config_date, $start_date, $end_date);

        if($polda != "polda_all") {
            $poldaSubmited = PoldaSubmited::where('polda_id', $polda)->where('rencana_operasi_id', $rencana_operartion_id)->first();
            excelTemplate(
                'per_polda',
                $prev,
                $current,
                'KESATUAN : '.$poldaSubmited->nama_kesatuan,
                $poldaSubmited->nama_kota.", ".indonesiaDayAndDate(date("Y-m-d")),
                'NAMA : '.$poldaSubmited->nama_atasan,
                $poldaSubmited->pangkat_dan_nrp,
                $poldaSubmited->jabatan,
                $poldaSubmited->nama_laporan,
                $file_name
            );
        } else {
            excelTemplate(
                'polda_all',
                $prev,
                $current,
                'KESATUAN : '.$dailyRekap->kesatuan,
                indonesiaDayAndDate(date("Y-m-d")),
                'NAMA : '.$dailyRekap->atasan,
                $dailyRekap->pangkat_nrp,
                $dailyRekap->jabatan,
                $dailyRekap->report_name,
                $file_name
            );
        }
    }

    public function dailyRekapShowWithInput($uuid)
    {
        $dailyRekap = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        $polda = $dailyRekap->polda;

        $currentYear = $dailyRekap->year;
        $prevYear = $currentYear - 1;

        $rencana_operartion_id = $dailyRekap->rencana_operasi_id;

        $config_date = $dailyRekap->config_date;

        $start_date = $dailyRekap->operation_date_start;
        $end_date = $dailyRekap->operation_date_end;

        $prev = reportPrevToDisplayByPoldaId($prevYear, $rencana_operartion_id, $start_date, $end_date, $polda);
        $current = reportCurrentToDisplayByPoldaId($currentYear, $rencana_operartion_id, $start_date, $end_date, $polda);

        return excelTemplateDisplay(
            $prev,
            $current,
            $prevYear,
            $currentYear
        );
    }

    public function all_rekap_by_rencana_operasi($uuid)
    {

        $rencanaOperasi = RencanaOperasi::where('uuid', $uuid)->firstOrFail();
        $rencana_operartion_id = $rencanaOperasi->id;
        $rencana_operartion_year_created = Carbon::createFromFormat('Y-m-d H:i:s', $rencanaOperasi->created_at)->year;

        $currentYear = $rencana_operartion_year_created;
        $prevYear = $rencana_operartion_year_created - 1;

        $prev = reportPrevToDisplayByRencanaOperasi($prevYear, $rencana_operartion_id);
        $current = reportCurrentToDisplayByRencanaOperasi($currentYear, $rencana_operartion_id);

        return excelTemplateDisplay(
            $prev,
            $current,
            $prevYear,
            $currentYear
        );
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
            'kesatuan' => $request->kesatuan,
            'atasan' => $request->atasan,
            'pangkat_nrp' => $request->pangkat_nrp,
            'jabatan' => $request->jabatan,
            'kota' => $request->kota,
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
                    'kesatuan' => $request->kesatuan_edit,
                    'atasan' => $request->atasan_edit,
                    'pangkat_nrp' => $request->pangkat_nrp_edit,
                    'jabatan' => $request->jabatan_edit,
                    'kota' => $request->kota_edit,
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
                    'kesatuan' => $request->kesatuan_edit,
                    'atasan' => $request->atasan_edit,
                    'pangkat_nrp' => $request->pangkat_nrp_edit,
                    'jabatan' => $request->jabatan_edit,
                    'kota' => $request->kota_edit,
                ]
            );
        }

        flash('Rekap harian berhasil diubah')->success();
        return redirect()->back();
    }
}
