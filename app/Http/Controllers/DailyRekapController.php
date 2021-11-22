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
        $rencana_operation_id = $dailyRekap->rencana_operasi_id;
        $config_date = $dailyRekap->config_date;
        $start_date = $dailyRekap->operation_date_start;
        $end_date = $dailyRekap->operation_date_end;
        $prevYear = $year - 1;
        $file_name = $dailyRekap->report_name;
        $operationName = $dailyRekap->rencanaOperasi->name;

        $prev = reportDailyPrev($polda, $prevYear, $rencana_operation_id, $config_date, $start_date, $end_date);
        $current = reportDailyCurrent($polda, $year, $rencana_operation_id, $config_date, $start_date, $end_date);

        if($start_date == $end_date) {
            $formatHari = 'TANGGAL '.gedein(indonesiaDate($start_date));
        } else {
            $formatHari = 'TANGGAL '.gedein(indonesiaDate($start_date)).' s.d. '.gedein(indonesiaDate($end_date));
        }

        if($polda != "polda_all") {
            $poldaSubmited = PoldaSubmited::where('polda_id', $polda)->where('rencana_operasi_id', $rencana_operation_id)->first();
            excelTemplate(
                'per_polda',
                $prev,
                $current,
                $poldaSubmited->nama_kesatuan,
                $formatHari,
                $poldaSubmited->nama_atasan,
                $poldaSubmited->pangkat_dan_nrp,
                $poldaSubmited->jabatan,
                $poldaSubmited->nama_laporan,
                $file_name, //Custom File name
                $operationName, //Operation Name
                null, //Custom Combine Name
                $poldaSubmited->nama_kota, //City Name
                $prevYear, //Prev Year Header
                $year //Current Year Header
            );
        } else {
            excelTemplate(
                'polda_all',
                $prev,
                $current,
                $dailyRekap->kesatuan,
                $formatHari,
                $dailyRekap->atasan,
                $dailyRekap->pangkat_nrp,
                $dailyRekap->jabatan,
                $dailyRekap->report_name,
                $file_name, //Custom File name
                $operationName, //Operation Name
                null, //Custom Combine Name
                $dailyRekap->kota, //City Name
                $prevYear, //Prev Year Header
                $year //Current Year Header
            );
        }
    }

    public function dailyRekapPopUp($uuid)
    {
        $dailyRekap = DailyRekap::with(['rencanaOperasi', 'poldaData'])->where('uuid', $uuid)->first();

        $polda = $dailyRekap->polda;

        $currentYear = $dailyRekap->year;
        $prevYear = $currentYear - 1;

        $rencana_operation_id = $dailyRekap->rencana_operasi_id;
        $operationName = $dailyRekap->rencanaOperasi->name;

        $config_date = $dailyRekap->config_date;

        $start_date = $dailyRekap->operation_date_start;
        $end_date = $dailyRekap->operation_date_end;

        if($start_date == $end_date) {
            $formatHari = 'TANGGAL '.gedein(indonesiaDate($start_date));
        } else {
            $formatHari = 'TANGGAL '.gedein(indonesiaDate($start_date)).' s.d. '.gedein(indonesiaDate($end_date));
        }

        $hari = indonesiaDate(date("Y-m-d"));

        $prev = reportPrevToDisplayByPoldaId($prevYear, $rencana_operation_id, $start_date, $end_date, $polda);
        $current = reportCurrentToDisplayByPoldaId($currentYear, $rencana_operation_id, $start_date, $end_date, $polda);

        $dr = DailyRekap::where('operation_date_start', $dailyRekap->operation_date_start)
            ->where('operation_date_end', $dailyRekap->operation_date_end)
            ->where('polda', 'polda_all')->first();

        previewExcelToHTML(
            'polda_all',
            $prev,
            $current,
            $dailyRekap->kesatuan,
            $formatHari,
            null, //NAMA ATASAN
            null, //PANGKAT
            null, //JABATAN
            $dailyRekap->report_name, //NAMA LAPORAN
            $operationName, //CUSTOM FILE NAME
            $operationName, //OPERATION NAME
            null, //CUSTOM COMBINE NAME
            null, //CITY NAME
            $prevYear, //PREV YEAR
            $currentYear, //CURRENT YEAR
            $dr, //DAILY REKAP
        );
    }

    public function dailyRekapPopUpByOperation($uuid)
    {
        $rencanaOperasi = RencanaOperasi::where('uuid', $uuid)->firstOrFail();
        $rencana_operation_id = $rencanaOperasi->id;
        $rencana_operation_year_created = Carbon::createFromFormat('Y-m-d H:i:s', $rencanaOperasi->created_at)->year;

        $currentYear = $rencana_operation_year_created;
        $prevYear = $rencana_operation_year_created - 1;

        $hari = indonesiaDayAndDate(date("Y-m-d"));

        $prev = reportPrevToDisplay($prevYear, $rencana_operation_id, $rencanaOperasi->start_date, $rencanaOperasi->end_date);
        $current = reportCurrentToDisplay($currentYear, $rencana_operation_id, $rencanaOperasi->start_date, $rencanaOperasi->end_date);

        previewExcelToHTML(
            'polda_all',
            $prev,
            $current,
            'KESATUAN : Korlantas',
            $hari,
            null, //NAMA ATASAN
            null, //PANGKAT
            null, //JABATAN
            $rencanaOperasi->name, //NAMA LAPORAN
            $rencanaOperasi->name, //CUSTOM FILE NAME
            null, //OPERATION NAME
            null, //CUSTOM COMBINE NAME
            null, //CITY NAME
        );
    }

    public function all_rekap_by_rencana_operasi($uuid)
    {

        $rencanaOperasi = RencanaOperasi::where('uuid', $uuid)->firstOrFail();
        $rencana_operation_id = $rencanaOperasi->id;
        $rencana_operation_year_created = Carbon::createFromFormat('Y-m-d H:i:s', $rencanaOperasi->created_at)->year;

        $currentYear = $rencana_operation_year_created;
        $prevYear = $rencana_operation_year_created - 1;

        $prev = reportPrevToDisplayByRencanaOperasi($prevYear, $rencana_operation_id);
        $current = reportCurrentToDisplayByRencanaOperasi($currentYear, $rencana_operation_id);

        previewExcelToHTML(
            'polda_all',
            $prev,
            $current,
            'KESATUAN : Korlantas',
            $rencanaOperasi->start_date." s/d ".$rencanaOperasi->end_date,
            null,
            null,
            null,
            null,
            $rencanaOperasi->name,
            null
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
        $rencanaOperasi = RencanaOperasi::findOrfail($request->rencana_operasi_id);

        if($request->config_date == "all") {
            $op_start_date = $rencanaOperasi->start_date;
            $op_end_date = $rencanaOperasi->end_date;
        } else {
            $op_start_date = dateOnly($request->tanggal_mulai);
            $op_end_date = dateOnly($request->tanggal_selesai);
        }

        $find = DailyRekap::where('polda', 'polda_all')
            ->where('year', $request->year)
            ->where('rencana_operasi_id', $request->rencana_operasi_id)
            ->where('operation_date_start', $op_start_date)
            ->where('operation_date_end', $op_end_date)
            ->first();

        if(!empty($find)) {
            flash('Data yang akan Anda tambahkan sudah pernah dibuat! Silakan diperiksa kembali')->error();
            return redirect()->back();
        }

        $model = DailyRekap::create([
            'uuid' => genUuid(),
            'report_name' => $request->report_name,
            'polda' => $request->polda,
            'year' => $request->year,
            'rencana_operasi_id' => $request->rencana_operasi_id,
            'config_date' => $request->config_date,
            'operation_date_start' => $op_start_date,
            'operation_date_end' => $op_end_date,
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

            $find = DailyRekap::where('polda', 'polda_all')
                ->where('year', $request->year_edit)
                ->where('rencana_operasi_id', $request->rencana_operasi_id_edit)
                ->where('operation_date_start', dateOnly($ro->tanggal_mulai_edit))
                ->where('operation_date_end', dateOnly($ro->tanggal_selesai_edit))
                ->first();

            if(!empty($find)) {
                flash('Data yang akan Anda ubah sudah pernah dibuat! Silakan diperiksa kembali')->error();
                return redirect()->back();
            }

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

            $find = DailyRekap::where('polda', 'polda_all')
                ->where('year', $request->year_edit)
                ->where('rencana_operasi_id', $request->rencana_operasi_id_edit)
                ->where('operation_date_start', dateOnly($request->tanggal_mulai_edit))
                ->where('operation_date_end', dateOnly($request->tanggal_selesai_edit))
                ->first();

            if(!empty($find)) {
                flash('Data yang akan Anda ubah sudah pernah dibuat! Silakan diperiksa kembali')->error();
                return redirect()->back();
            }

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
