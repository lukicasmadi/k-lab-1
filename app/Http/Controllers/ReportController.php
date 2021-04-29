<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\DailyInput;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use App\Models\DailyInputPrev;
use App\Models\KorlantasRekap;
use App\Models\RencanaOperasi;
use Illuminate\Support\Carbon;
use App\Exports\PoldaAllExport;
use App\Exports\DailyInputExport;
use App\Exports\FilterComparison;
use App\Exports\PoldaByUuidExport;
use Illuminate\Support\Facades\DB;
use App\Exports\NewComparisonExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DailyInputPrevExport;
use App\Exports\PoldaDailyComparison;
use App\Http\Requests\ReportAnevDisplay;
use App\Http\Requests\ComparisonExcelRequest;
use App\Http\Requests\ReportAnevDateCompareDisplay;

class ReportController extends Controller
{
    public function anevDateCompare()
    {
        $rencanaOperasi = RencanaOperasi::orderBy('id', 'desc')->pluck("name", "id");

        $currentYear = array_unique(DailyInput::pluck('year')->toArray());
        $prevYear = array_unique(DailyInputPrev::pluck('year')->toArray());

        return view('report.anev_harian', compact('rencanaOperasi', 'currentYear', 'prevYear'));
    }

    public function dailyAllPolda()
    {
        $listPolda = Polda::orderBy('id', 'asc')->pluck("name", "id");

        $rencanaOperasi = RencanaOperasi::orderBy('id', 'desc')->pluck("name", "id");

        $prexYear = DailyInputPrev::select('year')->get();
        $currentYear = DailyInput::select('year')->get();

        $yearCollection = [];

        foreach($prexYear as $key => $val) {
            array_push($yearCollection, $val->year);
        }

        foreach($currentYear as $key => $val) {
            array_push($yearCollection, $val->year);
        }

        $cleanYear = array_unique($yearCollection);

        return view('report.daily_rekap', compact('rencanaOperasi', 'listPolda', 'cleanYear'));
    }

    public function dailyProcess()
    {
        $now = now()->format("Y-m-d");
        $filename = 'daily-report-all-polda-'.$now.'.xlsx';

        return Excel::download(new PoldaAllExport(request('tanggal'), request('operation_id')), $filename);
    }

    public function comparison()
    {
        $rencanaOperasi = RencanaOperasi::orderBy('id', 'desc')->pluck("name", "id");

        $currentYear = array_unique(DailyInput::pluck('year')->toArray());
        $prevYear = array_unique(DailyInputPrev::pluck('year')->toArray());

        return view('report.comparison', compact('rencanaOperasi', 'currentYear', 'prevYear'));
    }

    public function anevDateCompareProcess(ReportAnevDateCompareDisplay $request)
    {
        $rencana_operation_id = $request->operation_id;
        $start_date = dateOnly($request->tanggal_pembanding_1);
        $end_date = dateOnly($request->tanggal_pembanding_2);

        logger($request->all());
    }

    public function comparisonProcess(ReportAnevDisplay $request)
    {
        $yearPrev = $request->tahun_pembanding_pertama;
        $yearCurrent = $request->tahun_pembanding_kedua;
        $rencana_operation_id = $request->operation_id;
        $start_date = dateOnly($request->tanggal_pembanding_pertama);
        $end_date = dateOnly($request->tanggal_pembanding_kedua);

        $prev = reportPrevToDisplay($yearPrev, $rencana_operation_id, $start_date, $end_date);
        $current = reportCurrentToDisplay($yearCurrent, $rencana_operation_id, $start_date, $end_date);

        excelTemplate(
            'per_polda',
            $prev,
            $current,
            'KESATUAN : ',
            "Seluruh Polda, ".$start_date.' S/D '.$end_date,
            'NAMA : ',
            '',
            '',
            '',
            'Anev '.$start_date.'-'.$end_date
        );
    }

    public function comparisonGetDataDateRange(ReportAnevDateCompareDisplay $request)
    {
        $operation_id = $request->operation_id;
        $start_date = dateOnly($request->start_date);
        $end_date = dateOnly($request->end_date);

        $firstData = laporanAnevDateCompareFirst($operation_id, $start_date, $start_date);
        $secondData = laporanAnevDateCompareSecond($operation_id, $end_date, $end_date);

        excelTemplate(
            'per_polda',
            $firstData,
            $secondData,
            'KESATUAN : ',
            "Seluruh Polda, ".$start_date.' S/D '.$end_date,
            'NAMA : ',
            '',
            '',
            '',
            'Anev Date Compare'.$start_date.'-'.$end_date
        );
    }

    public function downloadReportToday()
    {
        if(empty(operationPlans())) {
            return "Tidak ada operasi yang sedang berlangsung";
        }

        $fileName = 'report_all_polda_'.indonesianStandart(date('Y-m-d')).'.xlsx';

        return Excel::download(new FilterComparison(
            'polda_all',
            date('Y'),
            operationPlans()->id,
            date('Y-m-d'),
        ), $fileName);
    }

    public function downloadExcel($uuid)
    {
        $korlantasRekap = KorlantasRekap::with(['rencaraOperasi'])->whereUuid($uuid)->first();

        if(empty($korlantasRekap)) {
            flash('Laporan tidak ditemukan. Pastikan filter yang anda atur sudah sesuai!')->warning();
            return redirect()->back();
        }

        $id_rencana_operasi = $korlantasRekap->rencaraOperasi->id;
        $tahun = $korlantasRekap->year;
        $polda = $korlantasRekap->polda;
        $tanggal_operasi = $korlantasRekap->operation_date;

        $now = now()->format("Y-m-d");
        $filename = 'report-'.$now.'.xlsx';

        return Excel::download(new FilterComparison(
            $polda,
            $tahun,
            $id_rencana_operasi,
            $tanggal_operasi,
        ), $filename);
    }

    public function comparisonGetData()
    {
        // Fungsi ajax untuk tampilin list data di view
        $operation_id = request('operation_id');
        $start_year = request('start_year');
        $end_year = request('end_year');
        $date_range = request('date_range');

        if(is_null(request('date_range')) || is_null(request('operation_id')) || is_null(request('start_year')) || is_null(request('end_year'))) {
            abort(404);
        }

        if (str_contains($date_range, 'to')) {
            $format = explode(" to ", $date_range);

            $start_date = Carbon::parse(rtrim($format[0], " "))->format('Y-m-d');
            $end_date = Carbon::parse(ltrim($format[1], " "))->format('Y-m-d');

            $prevYear = laporanPrev($operation_id, $start_year, $start_date, $end_date);
            $currentYear = laporanCurrent($operation_id, $end_year, $start_date, $end_date);
        } else {
            $prevYear = laporanPrev($operation_id, $start_year, $date_range, $date_range);
            $currentYear = laporanCurrent($operation_id, $end_year, $date_range, $date_range);
        }

        return [
            'prev' => $prevYear,
            'current' => $currentYear
        ];
    }

    public function poldaByDateRange(Request $request)
    {
        if(empty($request->tanggal_mulai) || empty($request->tanggal_selesai)) {
            flash('Tanggal mulai dan selesai harus diisi!')->error();
            return redirect()->back();
        }

        $tanggal_mulai = dateOnly($request->tanggal_mulai);
        $tanggal_selesai = dateOnly($request->tanggal_selesai);

        $prev = prevPerPolda(poldaId(), $tanggal_mulai, $tanggal_selesai);
        $current = currentPerPolda(poldaId(), $tanggal_mulai, $tanggal_selesai);

        $poldaSubmited = PoldaSubmited::where('polda_id', poldaId())->orderBy('id', 'desc')->first();

        if(empty($poldaSubmited)) {
            flash('Data inputan polda tidak ditemukan. Silakan refresh halaman dan coba lagi')->error();
            return redirect()->back();
        }

        excelTemplate(
            'per_polda',
            $prev,
            $current,
            'KESATUAN : '.$poldaSubmited->nama_kesatuan,
            $poldaSubmited->nama_kota.", ".$request->tanggal_mulai.' S/D '.$request->tanggal_selesai,
            'NAMA : '.$poldaSubmited->nama_atasan,
            $poldaSubmited->pangkat_dan_nrp,
            $poldaSubmited->jabatan,
            $poldaSubmited->nama_laporan,
            'polda-'.poldaName().'-'.$request->tanggal_mulai.'-'.$request->tanggal_selesai
        );
    }

    public function byId($uuid)
    {
        $poldaSubmited = PoldaSubmited::whereUuid($uuid)->first();

        if(empty($poldaSubmited)) {
            flash('Inputan polda tidak ditemukan. Silakan refresh halaman dan coba lagi')->error();
            return redirect()->back();
        }

        $polda_id = $poldaSubmited->polda_id;
        $rencana_operasi_id = $poldaSubmited->rencana_operasi_id;
        $submited_date = dateOnly($poldaSubmited->submited_date);
        $submited_year = yearOnly($poldaSubmited->submited_date);
        $submited_year_prev = yearOnly($poldaSubmited->submited_date) - 1;

        if(isPolda()) {
            $prev = reportDailyPrev($polda_id, $submited_year_prev, $rencana_operasi_id, null, $submited_date, $submited_date);
            $current = reportDailyCurrent($polda_id, $submited_year, $rencana_operasi_id, null, $submited_date, $submited_date);

            excelTemplate(
                'per_polda',
                $prev,
                $current,
                'KESATUAN : '.$poldaSubmited->nama_kesatuan,
                $poldaSubmited->nama_kota.", ".indonesianDate($submited_date),
                'NAMA : '.$poldaSubmited->nama_atasan,
                $poldaSubmited->pangkat_dan_nrp,
                $poldaSubmited->jabatan,
                $poldaSubmited->nama_laporan,
                'polda-'.poldaName().'-'.indonesianStandart($submited_date)
            );

        } else {
            $prev = reportDailyPrev(session('polda_id'), $submited_year_prev, $rencana_operasi_id, null, $submited_date, $submited_date);
            $current = reportDailyCurrent(session('polda_id'), $submited_year, $rencana_operasi_id, null, $submited_date, $submited_date);

            excelTemplate(
                'per_polda',
                $prev,
                $current,
                'KESATUAN : '.$poldaSubmited->nama_kesatuan,
                $poldaSubmited->nama_kota.", ".indonesianDate($submited_date),
                'NAMA : '.$poldaSubmited->nama_atasan,
                $poldaSubmited->pangkat_dan_nrp,
                $poldaSubmited->jabatan,
                $poldaSubmited->nama_laporan,
                'polda-'.session('polda_short_name').'-'.indonesianStandart($submited_date)
            );
        }
    }

    public function showExcelToView(ReportAnevDisplay $request)
    {
        $yearPrev = $request->tahun_pembanding_pertama;
        $yearCurrent = $request->tahun_pembanding_kedua;
        $rencana_operation_id = $request->operation_id;
        $start_date = dateOnly($request->tanggal_pembanding_pertama);
        $end_date = dateOnly($request->tanggal_pembanding_kedua);

        $prev = reportPrevToDisplay($yearPrev, $rencana_operation_id, $start_date, $end_date);
        $current = reportCurrentToDisplay($yearCurrent, $rencana_operation_id, $start_date, $end_date);

        return excelTemplateDisplay(
            $prev,
            $current,
            $yearPrev,
            $yearCurrent
        );
    }

    public function showExcelToViewAnevDateCompare(ReportAnevDateCompareDisplay $request)
    {
        $rencana_operation_id = $request->operation_id;
        $start_date = dateOnly($request->tanggal_pembanding_1);
        $end_date = dateOnly($request->tanggal_pembanding_2);

        $prev = reportPrevToDisplayAnevDateCompare($rencana_operation_id, $start_date, $start_date);
        $current = reportCurrentToDisplayAnevDateCompare($rencana_operation_id, $end_date, $end_date);

        return excelTemplateDisplay(
            $prev,
            $current,
            $start_date,
            $end_date
        );
    }
}
