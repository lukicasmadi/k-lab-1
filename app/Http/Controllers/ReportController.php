<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\CountDown;
use App\Models\DailyInput;
use App\Models\DailyRekap;
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
use App\Models\SortablePoldaReport;
use App\Exports\NewComparisonExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DailyInputPrevExport;
use App\Exports\PoldaDailyComparison;
use App\Http\Requests\ReportAnevDisplay;
use App\Http\Requests\ComparisonExcelRequest;
use App\Http\Requests\ReportAnevDateCompareDisplay;

class ReportController extends Controller
{

    public function getDateRangeRencanaOperasi($id)
    {
        $rencanaOperasi = RencanaOperasi::where('id', $id)->firstOrFail();

        return $rencanaOperasi;
    }

    public function anevDateCompare()
    {
        $rencanaOperasi = RencanaOperasi::orderBy('id', 'desc')->pluck("name", "id");

        $currentYear = array_unique(DailyInput::pluck('year')->toArray());
        $prevYear = array_unique(DailyInputPrev::pluck('year')->toArray());

        return view('report.anev_harian', compact('rencanaOperasi', 'currentYear', 'prevYear'));
    }

    public function anevDateCompareProcess(ReportAnevDateCompareDisplay $request)
    {
        $rencana_operation_id = $request->operation_id;
        $start_date = dateOnly($request->tanggal_pembanding_1);
        $end_date = dateOnly($request->tanggal_pembanding_2);

        $prev = reportPrevToDisplayAnevDateCompare($rencana_operation_id, $start_date, $start_date);
        $current = reportCurrentToDisplayAnevDateCompare($rencana_operation_id, $end_date, $end_date);

        $rencanaOperasi = RencanaOperasi::find($rencana_operation_id);

        $dr = DailyRekap::whereRaw("DATE(operation_date_start) >= ? and DATE(operation_date_end) <= ?", [$start_date, $end_date])->where('polda', 'polda_all')->first();

        $yearCurrent = yearOnly($rencanaOperasi->start_date);
        $yearPrev = $yearCurrent - 1;

        $pem1 = CountDown::where('rencana_operasi_id', $rencana_operation_id)->whereTanggal($start_date)->first();
        $pem2 = CountDown::where('rencana_operasi_id', $rencana_operation_id)->whereTanggal($end_date)->first();

        if(empty($pem1)) {
            flash('Pembanding hari pertama tidak ditemukan dengan nama operasi yang dipilih')->error();
            return redirect()->back();
        }

        if(empty($pem2)) {
            flash('Pembanding hari kedua tidak ditemukan dengan nama operasi yang dipilih')->error();
            return redirect()->back();
        }

        avenDailyExcel(
            'polda_all',
            $prev,
            $current,
            null, //KESATUAN
            strtoupper(indonesiaDate($start_date)).' DAN '.strtoupper(indonesiaDate($end_date)),  //HARI TANGGAL
            (!empty($dr)) ? $dr->atasan : '', //NAMA ATASAN
            (!empty($dr)) ? $dr->pangkat_nrp : '', //PANGKAT
            (!empty($dr)) ? strtoupper($dr->jabatan) : '', //JABATAN
            null,
            strtoupper($rencanaOperasi->name)." ".$start_date."-".$end_date, //CUSTOM FILE NAME
            strtoupper($rencanaOperasi->name), //NAMA OPERASI
            null,
            (!empty($dr)) ? $dr->kota : '', //CITY NAME
            "H".substr($pem1->deskripsi, -1),
            "H".substr($pem2->deskripsi, -1),
            $dr
        );
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

    public function comparisonProcess(ReportAnevDisplay $request)
    {
        $yearPrev = $request->tahun_pembanding_pertama;
        $yearCurrent = $request->tahun_pembanding_kedua;
        $rencana_operation_id = $request->operation_id;
        $start_date = dateOnly($request->tanggal_pembanding_pertama);
        $end_date = dateOnly($request->tanggal_pembanding_kedua);

        $prev = reportPrevToDisplay($yearPrev, $rencana_operation_id, $start_date, $end_date);
        $current = reportCurrentToDisplay($yearCurrent, $rencana_operation_id, $start_date, $end_date);

        $rencanaOperasi = RencanaOperasi::find($rencana_operation_id);

        $dr = DailyRekap::whereRaw("DATE(operation_date_start) >= ? and DATE(operation_date_end) <= ?", [$start_date, $end_date])->where('polda', 'polda_all')->first();

        avenExcel(
            'polda_all',
            $prev,
            $current,
            null, //KESATUAN
            strtoupper(indonesiaDate($start_date)).' s.d. '.strtoupper(indonesiaDate($end_date)),  //HARI TANGGAL
            (!empty($dr)) ? $dr->atasan : '', //NAMA ATASAN
            (!empty($dr)) ? $dr->pangkat_nrp : '', //PANGKAT
            (!empty($dr)) ? strtoupper($dr->jabatan) : '', //JABATAN
            null,
            strtoupper($rencanaOperasi->name)." ".$start_date."-".$end_date, //CUSTOM FILE NAME
            strtoupper($rencanaOperasi->name), //NAMA OPERASI
            null,
            (!empty($dr)) ? $dr->kota : '', //CITY NAME
            $yearPrev,
            $yearCurrent,
            $dr
        );
    }

    public function comparisonGetDataDateRange(ReportAnevDateCompareDisplay $request)
    {
        $operation_id = $request->operation_id;
        $start_date = dateOnly($request->start_date);
        $end_date = dateOnly($request->end_date);

        $firstData = laporanAnevDateCompareFirst($operation_id, $start_date, $start_date);
        $secondData = laporanAnevDateCompareSecond($operation_id, $end_date, $end_date);

        $rencanaOperasi = RencanaOperasi::find($operation_id);

        excelTemplate(
            'per_polda',
            $firstData,
            $secondData,
            'KESATUAN : Korlantas',
            "Seluruh Polda, ".$start_date.' s/d '.$end_date,
            'NAMA : ',
            '',
            '',
            '',
            "PERBANDINGAN TANGGAL ".indonesianStandart($start_date).' s/d '.indonesianStandart($end_date),
            $rencanaOperasi->name
        );
    }

    public function downloadReportToday()
    {
        if(empty(operationPlans())) {
            return "Tidak ada operasi yang sedang berlangsung";
        }

        $tanggal_mulai = nowToday();
        $tanggal_selesai = nowToday();

        $prev = allPoldaPrevByDate($tanggal_mulai, $tanggal_selesai);
        $current = allPoldaCurrentByDate($tanggal_mulai, $tanggal_selesai);

        excelTemplate(
            'per_polda',
            $prev,
            $current,
            'KESATUAN : Korlantas',
            "SEMUA POLDA, ".indonesianFullDayAndDate(date('Y-m-d')),
            'NAMA : ',
            '',
            '',
            '',
            'REPORT ALL POLDA',
            operationPlans()->name
        );
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

        $poldaSubmited = PoldaSubmited::with('rencanaOperasi')->where('polda_id', poldaId())->orderBy('id', 'desc')->first();

        $operationName = $poldaSubmited->rencanaOperasi->name;

        if(empty($poldaSubmited)) {
            flash('Data inputan polda tidak ditemukan. Silakan refresh halaman dan coba lagi')->error();
            return redirect()->back();
        }

        excelTemplate(
            'per_polda',
            $prev,
            $current,
            'KESATUAN : '.$poldaSubmited->nama_kesatuan,
            $poldaSubmited->nama_kota.", ".$request->tanggal_mulai.' s/d '.$request->tanggal_selesai,
            $poldaSubmited->nama_atasan,
            $poldaSubmited->pangkat_dan_nrp,
            $poldaSubmited->jabatan,
            $poldaSubmited->nama_laporan,
            'polda-'.poldaName().'-'.$request->tanggal_mulai.'-'.$request->tanggal_selesai,
            $operationName
        );
    }

    public function byId($uuid)
    {
        $poldaSubmited = PoldaSubmited::with('rencanaOperasi')->whereUuid($uuid)->first();

        if(empty($poldaSubmited)) {
            flash('Inputan polda tidak ditemukan. Silakan refresh halaman dan coba lagi')->error();
            return redirect()->back();
        }

        $polda_id = $poldaSubmited->polda_id;
        $rencana_operasi_id = $poldaSubmited->rencana_operasi_id;
        $submited_date = dateOnly($poldaSubmited->submited_date);
        $submited_year = yearOnly($poldaSubmited->submited_date);
        $submited_year_prev = yearOnly($poldaSubmited->submited_date) - 1;

        $operationName = $poldaSubmited->rencanaOperasi->name;

        if(isPolda()) {
            $prev = reportDailyPrev($polda_id, $submited_year_prev, $rencana_operasi_id, null, $submited_date, $submited_date);
            $current = reportDailyCurrent($polda_id, $submited_year, $rencana_operasi_id, null, $submited_date, $submited_date);

            excelTemplate(
                'per_polda',
                $prev,
                $current,
                'KESATUAN : '.$poldaSubmited->nama_kesatuan,
                $poldaSubmited->nama_kota.", ".indonesianDate($submited_date),
                $poldaSubmited->nama_atasan,
                $poldaSubmited->pangkat_dan_nrp,
                $poldaSubmited->jabatan,
                $poldaSubmited->nama_laporan,
                'POLDA-'.poldaName().'-'.indonesianStandart($submited_date),
                $operationName
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
                $poldaSubmited->nama_atasan,
                $poldaSubmited->pangkat_dan_nrp,
                $poldaSubmited->jabatan,
                $poldaSubmited->nama_laporan,
                'POLDA-'.session('polda_short_name').'-'.indonesianStandart($submited_date),
                $operationName
            );
        }
    }

    public function reportByOperation($uuid)
    {
        $find = RencanaOperasi::whereUuid($uuid)->firstOrFail();

        $prev = allPoldaPrevByDate($find->start_date, $find->end_date);
        $current = allPoldaCurrentByDate($find->start_date, $find->end_date);

        excelTemplate(
            'polda_all',
            $prev,
            $current,
            'KESATUAN : Korlantas',
            $find->start_date." s/d ".$find->end_date,
            null,
            null,
            null,
            $find->name,
            'Laporan '.$find->name,
            'Laporan '.$find->name,
            'Laporan Giat Operasi '.$find->name
        );
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

        $rencanaOperasi = RencanaOperasi::find($rencana_operation_id);

        $dr = DailyRekap::whereRaw("DATE(operation_date_start) >= ? and DATE(operation_date_end) <= ?", [$start_date, $end_date])->where('polda', 'polda_all')->first();

        previewExcelToHTML(
            'polda_all',
            $prev,
            $current,
            'KESATUAN', //KESATUAN
            strtoupper(indonesiaDate($start_date)).' s.d. '.strtoupper(indonesiaDate($end_date)), //HARI TANGGAL
            (!empty($dr)) ? $dr->atasan : '', //NAMA ATASAN
            (!empty($dr)) ? $dr->pangkat_nrp : '', //PANGKAT
            (!empty($dr)) ? strtoupper($dr->jabatan) : '', //JABATAN
            null, //NAMA LAPORAN
            $rencanaOperasi->name, //CUSTOM FILE NAME
            strtoupper($rencanaOperasi->name), //NAMA OPERASI
            null, //CUSTOM COMBINE
            (!empty($dr)) ? $dr->kota : '', //CITY NAME
            $yearPrev,
            $yearCurrent,
            $dr
        );
    }

    public function showExcelToViewAnevDateCompare(ReportAnevDateCompareDisplay $request)
    {
        $rencana_operation_id = $request->operation_id;
        $start_date = dateOnly($request->tanggal_pembanding_1);
        $end_date = dateOnly($request->tanggal_pembanding_2);

        $prev = reportPrevToDisplayAnevDateCompare($rencana_operation_id, $start_date, $start_date);
        $current = reportCurrentToDisplayAnevDateCompare($rencana_operation_id, $end_date, $end_date);

        $rencanaOperasi = RencanaOperasi::find($rencana_operation_id);

        $poldaSubmited = PoldaSubmited::where('rencana_operasi_id', $rencana_operation_id)->first();

        excelTemplate(
            'polda_all',
            $prev,
            $current,
            'KESATUAN : '.$poldaSubmited->nama_kesatuan,
            $poldaSubmited->nama_kota.", ".indonesiaDayAndDate(date("Y-m-d")),
            $poldaSubmited->nama_atasan,
            $poldaSubmited->pangkat_dan_nrp,
            $poldaSubmited->jabatan,
            $poldaSubmited->nama_laporan,
            $rencanaOperasi->name,
            null
        );
    }

    public function reportPoldaPerdaySummary(Request $request, $uuid, $tglStart, $tglEnd)
    {
        $todayDate = date('Y-m-d');
        $rencanaOperasi = RencanaOperasi::where('uuid', $uuid)->firstOrFail();

        $startDate = dateOnly($tglStart);
        $endDate = dateOnly($tglEnd);

        // $data = sumByPoldaId($rencanaOperasi->id, date('Y'), $startDate, $endDate, 1);

        // dispatch(new App\Jobs\QueuePerpoldaPerday($rencanaOperasi->id, $startDate, $endDate));

        logger(currentDailyInputWithSum($rencanaOperasi->id, date('Y'), $startDate, $endDate));

        return "OK";
    }

    public function reportPoldaPerday(Request $request, $uuid, $tglStart, $tglEnd)
    {
        $todayDate = date('Y-m-d');
        $rencanaOperasi = RencanaOperasi::where('uuid', $uuid)->firstOrFail();

        $polda = SortablePoldaReport::with('today')->get();  //AMBIL YG HARI INI SAJA

        $dailyRekap = DailyRekap::whereRaw("DATE(operation_date_start) >= ? and DATE(operation_date_end) <= ?", [$todayDate, $todayDate])->first();

        $startDate = dateOnly($tglStart);
        $endDate = dateOnly($tglEnd);

        $data = currentDailyInputWithSum($rencanaOperasi->id, date('Y'), $startDate, $endDate);

        lapoanPerpoldaPerhari($data, $rencanaOperasi, $startDate, $endDate, $dailyRekap);
    }

    public function reportAllPoldaDetail()
    {
        $rencanaOperasi = RencanaOperasi::orderBy('id', 'desc')->pluck("name", "id");

        $currentYear = array_unique(DailyInput::pluck('year')->toArray());
        $prevYear = array_unique(DailyInputPrev::pluck('year')->toArray());

        return view('report.comparison_all', compact('rencanaOperasi', 'currentYear', 'prevYear'));
    }

    public function reportAllPoldaDetailProcess(ReportAnevDisplay $request)
    {
        $operation_id = $request->operation_id;
        $prev_year = $request->tahun_pembanding_pertama;
        $current_year = $request->tahun_pembanding_kedua;
        $start_date = date('Y-m-d', strtotime($request->tanggal_pembanding_pertama));
        $end_date = date('Y-m-d', strtotime($request->tanggal_pembanding_kedua));

        $prev = prevDailyInputWithSum($operation_id, $prev_year, $start_date, $end_date);
        $current = currentDailyInputWithSum($operation_id, $current_year, $start_date, $end_date);

        $rencanaOperasi = RencanaOperasi::find($request->operation_id);

        $dr = DailyRekap::whereRaw("DATE(operation_date_start) >= ? and DATE(operation_date_end) <= ?", [$start_date, $end_date])
        ->where('rencana_operasi_id', $request->operation_id)
        ->where('polda', 'polda_all')
        ->first();

        compareAllPoldaInput($prev, $current, $start_date, $end_date, $prev_year, $current_year, $rencanaOperasi, $dr);
    }

    public function reportAllPoldaByOperation($uuid)
    {
        $sortDirection = 'asc';

        $ro = RencanaOperasi::with(['dailyInputCurrent' => function ($query) use ($sortDirection) {
            $query->orderBy('id', $sortDirection);
        }, 'dailyInputPrev' => function ($query) use ($sortDirection) {
            $query->orderBy('id', $sortDirection);
        }])->where('uuid', $uuid)->firstOrFail();

        if(empty($ro->dailyInputCurrent)) {
            return "Tidak ada data yang diinput di operasi ini";
        }

        $currentYear    = $ro->dailyInputCurrent[0]->year;
        $prevYear       = $currentYear - 1;

        $total          = count($ro->dailyInputCurrent);

        $totalPlusJumlah = ($total + 1) * 2;
        $labelNumber = $totalPlusJumlah + 2;
        $beforeLast = $labelNumber - 1;

        $operationId = $ro->id;
        $year = Carbon::parse($ro->start_date)->year;

        session()->forget(['report_daily_loop']);
        session(['report_daily_loop' => $ro]);

        return view('exports.report_rekap_by_operation', compact('ro', 'currentYear', 'prevYear', 'total', 'totalPlusJumlah', 'labelNumber', 'beforeLast'));
    }
}
