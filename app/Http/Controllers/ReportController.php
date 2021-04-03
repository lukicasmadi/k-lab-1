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
use App\Exports\PoldaByUuidExport;
use Illuminate\Support\Facades\DB;
use App\Exports\NewComparisonExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DailyInputPrevExport;
use App\Http\Requests\ComparisonExcelRequest;

class ReportController extends Controller
{

    public function __construct()
    {
        // $this->middleware('can-create-plan')->only('dailyAllPolda', 'poldaUuid', 'comparison');
    }

    public function byId($uuid)
    {
        $now = now()->format("Y-m-d");
        $filename = 'daily-report.xlsx';

        $submitedData = PoldaSubmited::with(['rencanaOperasi', 'polda'])->whereUuid($uuid)->first();

        return Excel::download(new PoldaByUuidExport($submitedData), $filename);
    }

    public function dailyAllPolda()
    {
        // $polda = Polda::select("id", "uuid", "name", "short_name", "logo")
        //     ->with(['dailyInput' => function($query) {
        //         $query->where(DB::raw('DATE(created_at)'), date("Y-m-d"));
        //     }])
        //     ->orderBy("name", "asc")
        //     ->get();

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

    public function comparisonProcess(ComparisonExcelRequest $request)
    {
        $operation_id = $request->operation_id;
        $start_year = $request->tahun_pembanding_pertama;
        $end_year = $request->tahun_pembanding_kedua;
        $date_range = $request->tanggal;

        if (str_contains($date_range, 'to')) {
            $format = explode(" to ", $date_range);

            $start_date = Carbon::parse(rtrim($format[0], " "))->format('Y-m-d');
            $end_date = Carbon::parse(ltrim($format[1], " "))->format('Y-m-d');
        } else {
            $start_date = $date_range;
            $end_date = $date_range;
        }

        $now = now()->format("Y-m-d");
        $filename = 'comparison-report-'.$now.'.xlsx';

        return Excel::download(new NewComparisonExport($operation_id, $start_year, $end_year, $start_date, $end_date), $filename);

        return redirect()->back();
    }

    public function downloadExcel($uuid)
    {
        $korlantasRekap = KorlantasRekap::with(['rencaraOperasi', 'poldaData'])->whereUuid($uuid)->first();

        if(!empty($korlantasRekap)) {

            $now = now()->format("Y-m-d");
            $rename = (empty($korlantasRekap->report_name)) ? "report" : $korlantasRekap->report_name;
            $filename = slugTitle($rename).'-'.$now.'.xlsx';

            $findOperation = RencanaOperasi::where("id", $korlantasRekap->rencana_operasi_id)->first();

            $prevYear = DailyInputPrev::where('year', $korlantasRekap->year)
                ->where('rencana_operasi_id', $korlantasRekap->rencana_operasi_id)
                ->first();

            if(!empty($prevYear)) {

                return Excel::download(new DailyInputPrevExport(
                    $korlantasRekap->year,
                    $korlantasRekap->rencana_operasi_id,
                    $korlantasRekap->polda,
                    $korlantasRekap->operation_date,
                    $korlantasRekap->rencaraOperasi->name,
                    $korlantasRekap->poldaData,
                    $findOperation
                ), $filename);

            } else {

                $currentYear = DailyInput::where('year', $korlantasRekap->year)
                    ->where('rencana_operasi_id', $korlantasRekap->rencana_operasi_id)
                    ->first();

                if(!empty($currentYear)) {

                    return Excel::download(new DailyInputExport(
                        $korlantasRekap->year,
                        $korlantasRekap->rencana_operasi_id,
                        $korlantasRekap->polda,
                        $korlantasRekap->operation_date,
                        $korlantasRekap->rencaraOperasi->name,
                        $korlantasRekap->poldaData,
                        $findOperation
                    ), $filename);

                } else {
                    flash('Laporan tidak ditemukan. Pastikan data yang diinput sudah benar!')->warning();
                    return redirect()->back();
                }
            }

        } else {
            flash('Data rekap laporan tidak ditemukan!')->warning();
            return redirect()->back();
        }
    }

    public function comparisonGetData()
    {
        $operation_id = request('operation_id');
        $start_year = request('start_year');
        $end_year = request('end_year');
        $date_range = request('date_range');

        if(is_null(request('date_range')) || is_null(request('operation_id')) || is_null(request('start_year')) || is_null(request('end_year'))) {
            abort(401);
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
}
