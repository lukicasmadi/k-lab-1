<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\Article;
use Carbon\CarbonPeriod;
use App\Models\CountDown;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use App\Models\RencanaOperasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function chart_anev_all()
    {
        return [
            'tilang' => chartAnevCurrent(true)->tilang,
            'teguran' => chartAnevCurrent(true)->teguran,

            'tilang_prev' => chartAnevPrev(true)->tilang,
            'teguran_prev' => chartAnevPrev(true)->teguran,

            'jumlah_kejadian' => chartCurrent(true)->jumlah_kejadian,
            'jumlah_korban_meninggal' => chartCurrent(true)->jumlah_korban_meninggal,
            'jumlah_korban_luka_berat' => chartCurrent(true)->jumlah_korban_luka_berat,
            'jumlah_korban_luka_ringan' => chartCurrent(true)->jumlah_korban_luka_ringan,

            'jumlah_kejadian_prev' => chartAnevPrev(true)->jumlah_kejadian,
            'jumlah_korban_meninggal_prev' => chartAnevPrev(true)->jumlah_korban_meninggal,
            'jumlah_korban_luka_berat_prev' => chartAnevPrev(true)->jumlah_korban_luka_berat,
            'jumlah_korban_luka_ringan_prev' => chartAnevPrev(true)->jumlah_korban_luka_ringan,

            'year' => (int)date("Y"),
            'prev_year' => date("Y") - 1
        ];
    }

    public function chart_anev()
    {
        return [
            'tilang' => chartAnevCurrent(false)->tilang,
            'teguran' => chartAnevCurrent(false)->teguran,

            'tilang_prev' => chartAnevPrev(false)->tilang,
            'teguran_prev' => chartAnevPrev(false)->teguran,

            'jumlah_kejadian' => chartCurrent(false)->jumlah_kejadian,
            'jumlah_korban_meninggal' => chartCurrent(false)->jumlah_korban_meninggal,
            'jumlah_korban_luka_berat' => chartCurrent(false)->jumlah_korban_luka_berat,
            'jumlah_korban_luka_ringan' => chartCurrent(false)->jumlah_korban_luka_ringan,

            'jumlah_kejadian_prev' => chartAnevPrev(false)->jumlah_kejadian,
            'jumlah_korban_meninggal_prev' => chartAnevPrev(false)->jumlah_korban_meninggal,
            'jumlah_korban_luka_berat_prev' => chartAnevPrev(false)->jumlah_korban_luka_berat,
            'jumlah_korban_luka_ringan_prev' => chartAnevPrev(false)->jumlah_korban_luka_ringan,

            'year' => (int)date("Y"),
            'prev_year' => date("Y") - 1
        ];
    }

    public function chart_laphar_all_project()
    {
        return [
            'tilang' => chartLapharFullProject()->tilang,
            'teguran' => chartLapharFullProject()->teguran,
            'jumlah_kejadian' => chartLapharFullProject()->jumlah_kejadian,
            'jumlah_korban_meninggal' => chartLapharFullProject()->jumlah_korban_meninggal,
            'jumlah_korban_luka_berat' => chartLapharFullProject()->jumlah_korban_luka_berat,
            'jumlah_korban_luka_ringan' => chartLapharFullProject()->jumlah_korban_luka_ringan,
            'year' => date("Y")
        ];
    }

    public function chart_laphar()
    {
        return [
            'tilang' => chartCurrent()->tilang,
            'teguran' => chartCurrent()->teguran,
            'jumlah_kejadian' => chartCurrent()->jumlah_kejadian,
            'jumlah_korban_meninggal' => chartCurrent()->jumlah_korban_meninggal,
            'jumlah_korban_luka_berat' => chartCurrent()->jumlah_korban_luka_berat,
            'jumlah_korban_luka_ringan' => chartCurrent()->jumlah_korban_luka_ringan,
            'year' => date("Y")
        ];
    }

    public function newsDetail($slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        $listArticle = Article::where('id', '!=', $article->id)->orderBy("id", "desc")->where('status', 'active')->get();

        return view('article.detail', compact('article', 'listArticle'));
    }

    public function welcomePage()
    {
        if (!empty(auth()->user())) {
            return redirect('/dashboard');
        } else {
            $articleList = Article::limit(3)->orderBy('id', 'desc')->where('status', 'active')->get();
            return view('index', compact('articleList'));
        }
    }

    public function weeklyPolda()
    {
        $count = CountDown::where("tanggal", nowToday())->first();
        $days = CountDown::select('id', 'tanggal', 'week', 'rencana_operasi_id')->where("week", $count->week)->where("rencana_operasi_id", operationPlans()->id)->orderBy('id', 'asc')->get()->toArray();
        $allDaysAWeek = count($days);
        $firstDate = Arr::first($days)['tanggal'];
        $lastDate = Arr::last($days)['tanggal'];

        $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$firstDate, $lastDate])->where("polda_id", poldaId())->count();

        if(empty($count_polda_input_daily) || $count_polda_input_daily <= 0) {
            $data = [
                "filled" => 0,
                "nofilled" => 100
            ];
        } else {
            $percentage = round((100 * $count_polda_input_daily) / $allDaysAWeek, 1);
            $data = [
                "filled" => (int)$percentage,
                "nofilled" => 100 - (int)$percentage
            ];
        }

        return $data;
    }

    public function fullPolda()
    {
        $project_start = dateOnly(operationPlans()->start_date);
        $project_end = dateOnly(operationPlans()->end_date);

        $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$project_start, $project_end])->where("polda_id", poldaId())->count();

        $countDaysAll = countDays($project_start, $project_end);

        if(empty($count_polda_input_daily) || $count_polda_input_daily <= 0) {
            $data = [
                "filled" => 0,
                "nofilled" => 100
            ];
        } else {
            $percentage = round((100 * $count_polda_input_daily) / $countDaysAll, 1);
            $data = [
                "filled" => (int)$percentage,
                "nofilled" => 100 - (int)$percentage
            ];
        }

        return $data;
    }

    public function weeklyPoldaById($id)
    {
        $count = CountDown::where("tanggal", nowToday())->first();
        $days = CountDown::select('id', 'tanggal', 'week')->where("week", $count->week)->where("rencana_operasi_id", operationPlans()->id)->orderBy('id', 'asc')->get()->toArray();
        $allDaysAWeek = count($days);
        $firstDate = Arr::first($days)['tanggal'];
        $lastDate = Arr::last($days)['tanggal'];

        $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$firstDate, $lastDate])->where("polda_id", $id)->count();

        if(empty($count_polda_input_daily) || $count_polda_input_daily <= 0) {
            $data = [
                "filled" => 0,
                "nofilled" => 100
            ];
        } else {
            $percentage = round((100 * $count_polda_input_daily) / $allDaysAWeek, 1);
            $data = [
                "filled" => (int)$percentage,
                "nofilled" => 100 - (int)$percentage
            ];
        }

        return $data;
    }

    public function fullPoldaById($id)
    {
        $project_start = dateOnly(operationPlans()->start_date);
        $project_end = dateOnly(operationPlans()->end_date);

        $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$project_start, $project_end])->where("polda_id", $id)->count();

        $countDaysAll = countDays($project_start, $project_end);

        if(empty($count_polda_input_daily) || $count_polda_input_daily <= 0) {
            $data = [
                "filled" => 0,
                "nofilled" => 100
            ];
        } else {
            $percentage = round((100 * $count_polda_input_daily) / $countDaysAll, 1);
            $data = [
                "filled" => (int)$percentage,
                "nofilled" => 100 - (int)$percentage
            ];
        }

        return $data;
    }

    public function data()
    {
        $model = PoldaSubmited::perpolda()->with(['polda', 'rencanaOperasi']);

        return datatables()->eloquent($model)
        ->addColumn('operation_name', function (PoldaSubmited $ps) {
            return $ps->rencanaOperasi->name;
        })
        ->addColumn('time_created', function (PoldaSubmited $ps) {
            return timeOnly($ps->created_at);
        })
        ->addColumn('polda_name', function (PoldaSubmited $ps) {
            return $ps->polda->name;
        })
        ->toJson();
    }

    public function index()
    {
        return view('info');
    }

    public function lihatPanduan()
    {
        return view('panduan');
    }

    public function notAssign()
    {
        return view('not_assign');
    }

    public function todayCheck()
    {
        $polda = Polda::select("id", "uuid", "name", "short_name", "logo")
            ->with(['dailyInput' => function($query) {
                $query->where(DB::raw('DATE(created_at)'), nowToday());
            }])
            ->orderBy("name", "asc")
            ->get();

        return $polda;
    }

    public function downloadFilePanduan()
    {
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        $fileName = "panduan_web.pdf";
        return response()->download(public_path('pdf/'.$fileName), $fileName, $headers);
    }

    public function dashboardFiltered($projectSlug)
    {
        if(isPolda()) {
            if(checkUserHasAssign() == "belum") {
                return redirect()->route('notAssign');
            }
        }

        if(empty(operationPlans())) {
            return view('home_empty.index');
        }

        operationShowStartEnd();

        $checkOperasi = RencanaOperasi::where("slug_name", $projectSlug)->first();

        if(empty($checkOperasi)) {
            return redirect()->route('dashboard');
        }

        $allOperations = RencanaOperasi::where('slug_name', '!=', operationPlans()->slug_name)->orderBy('id', 'desc')->get();

        session()->forget(['filter_operation']);
        session(['filter_operation' => $projectSlug]);
        $filter_operation = $projectSlug;

        if(isPolda()) {
            return view('polda');
        } else {
            $poldaAtas = Polda::select("id", "uuid", "name", "short_name", "logo")
                ->orderBy("name", "asc")
                ->skip(0)->take(17)
                ->get();

            $poldaBawah = Polda::select("id", "uuid", "name", "short_name", "logo")
                ->orderBy("name", "asc")
                ->skip(17)->take(17)
                ->get();

            $dailyInput = Polda::with(['dailyInput' => function($query) {
                $query->where(DB::raw('DATE(created_at)'), nowToday());
            }])->orderBy("name", "asc")->get();

            return view('main_with_filter', compact('poldaAtas', 'poldaBawah', 'dailyInput', 'allOperations', 'filter_operation'));
        }
    }

    public function dashboard()
    {
        if(isPolda()) {
            if(checkUserHasAssign() == "belum") {
                return redirect()->route('notAssign');
            }
        }

        if(empty(operationPlans())) {

            if(!empty(session('filter_operation'))) {
                $operations = RencanaOperasi::orderBy('id', 'desc')->get();
                $allOperations = moveItemToFirst($operations, 'name', session('filter_operation'));
            } else {
                $allOperations = RencanaOperasi::orderBy('id', 'desc')->get();
            }

            $filter_operation = "current";

            return view('home_empty.index', compact('allOperations', 'filter_operation'));
        } else {
            operationShowStartEnd();

            session()->forget(['filter_operation']);
            session(['filter_operation' => '']);
            $filter_operation = "current";

            $allOperations = RencanaOperasi::where('slug_name', '!=', operationPlans()->slug_name)->orderBy('id', 'desc')->get();

            if(isPolda()) {
                return view('polda');
            } else {
                $poldaAtas = Polda::select("id", "uuid", "name", "short_name", "logo")
                    ->orderBy("name", "asc")
                    ->skip(0)->take(17)
                    ->get();

                $poldaBawah = Polda::select("id", "uuid", "name", "short_name", "logo")
                    ->orderBy("name", "asc")
                    ->skip(17)->take(17)
                    ->get();

                $dailyInput = Polda::with(['dailyInput' => function($query) {
                    $query->where(DB::raw('DATE(created_at)'), nowToday());
                }])->orderBy("name", "asc")->get();

                return view('main', compact('poldaAtas', 'poldaBawah', 'dailyInput', 'allOperations', 'filter_operation'));
            }
        }
    }

    public function notifikasi()
    {
        $model = PoldaSubmited::with(['polda' => function($query) {
            $query->select('id', 'name', 'uuid', 'logo');
        }])->where("submited_date", date("Y-m-d"))->orderBy('id', 'desc')->get();

        return $model;
    }

    public function donut()
    {
        $model = PoldaSubmited::where("submited_date", date("Y-m-d"))->count();

        if(empty($model)) {
            $data = [
                "filled" => 0,
                "nofilled" => 100
            ];
        } else {
            $percentage = round((100 * $model) / 34);
            $data = [
                "filled" => $percentage,
                "nofilled" => 100 - $percentage
            ];
        }

        return $data;
    }

    public function dailycheck()
    {
        $model = Polda::with(['dailyInput' => function($query) {
            $query->where(DB::raw('DATE(created_at)'), date("Y-m-d"));
        }])->orderBy("name", "asc");

        return datatables()->eloquent($model)
        ->addColumn('has_submited', function (Polda $polda) {
            if(empty($polda->dailyInput)) {
                return "BELUM MENGIRIMKAN LAPORAN";
            } else {
                if($polda->dailyInput->submited_date->format('Y-m-d') != date("Y-m-d")) {
                    return "BELUM MENGIRIMKAN LAPORAN";
                } else {
                    return "SUDAH MENGIRIMKAN LAPORAN";
                }
            }
        })->toJson();
    }

    public function viewInputFromChart($indexData)
    {
        if(empty(operationPlans())) {

            if(empty(session('filter_operation'))) {
                $operation = RencanaOperasi::latest()->first();
            } else {
                $operation = RencanaOperasi::where('name', session('filter_operation'))->first();
            }

            $period = CarbonPeriod::create($operation->start_date, $operation->end_date);

            $rangeDate = [];

            foreach ($period as $date) {
                array_push($rangeDate, $date->format('Y-m-d'));
            }

            $whereDate = $rangeDate[$indexData];

            $polda = Polda::with(['dailyInput' => function($q) use($whereDate) {
                $q->select('id', 'polda_id', 'status', 'submited_date', 'rencana_operasi_id')->where('submited_date', '=', $whereDate);
            }])->select('id', 'name')->get();

            excelViewAbsensi($polda, indonesiaDate($whereDate), $whereDate);

        } else {

            $period = CarbonPeriod::create(operationPlans()->start_date, operationPlans()->end_date);

            $rangeDate = [];

            foreach ($period as $date) {
                array_push($rangeDate, $date->format('Y-m-d'));
            }

            $countData = count($rangeDate) - 1;

            if($indexData > $countData) {
                abort(404);
            }

            $whereDate = $rangeDate[$indexData]; // HITUNG INDEX BERDASARKAN DATA YG DIKLIK USER

            $cd = CountDown::with('rencanaOperasi')->where('tanggal', $whereDate)->first();

            $polda = Polda::with(['dailyInput' => function($q) use($whereDate) {
                $q->select('id', 'polda_id', 'status', 'submited_date', 'rencana_operasi_id')->where('submited_date', '=', $whereDate);
            }])->select('id', 'name')->get();

            excelViewAbsensi($polda, strtoupper(indonesiaDate($whereDate)), $whereDate, $cd->rencanaOperasi->name);
        }
    }

    public function dashboardChartWithoutOperation()
    {
        if(empty(session('filter_operation'))) {
            $checkOperasi = RencanaOperasi::latest()->first();
            $projectRunning = $checkOperasi;
        } else {
            $checkOperasi = RencanaOperasi::where("name", session('filter_operation'))->first();
            $projectRunning = $checkOperasi;
        }

        $period = CarbonPeriod::create($projectRunning->start_date, $projectRunning->end_date);

        $rangeDate = [];
        $rangeDateReformat = [];
        $totalPerDate = [];

        foreach ($period as $date) {
            array_push($rangeDate, $date->format('Y-m-d'));
        }

        foreach($rangeDate as $d) {
            $total =  DB::table('polda_submiteds')->where('submited_date', $d)->count();

            if($total == 0) {
                array_push($totalPerDate, 0);
            } else {
                array_push($totalPerDate, $total);
            }
        }

        foreach($rangeDate as $rd) {
            array_push($rangeDateReformat, indonesianStandart($rd));
        }

        return response()->json([
            'rangeDate' => $rangeDateReformat,
            'totalPerDate' => $totalPerDate,
            'projectName' => $projectRunning->name,
            'totalSum' => 0
        ], 200);
    }

    public function dashboardChart()
    {
        if(empty(session('filter_operation'))) {
            $projectRunning = operationPlans();
        } else {
            $checkOperasi = RencanaOperasi::where("slug_name", session('filter_operation'))->first();
            $projectRunning = $checkOperasi;
        }

        $dateCountDown = CountDown::where('rencana_operasi_id', operationPlans()->id)->where('tanggal', nowToday())->first();

        $period = CarbonPeriod::create($projectRunning->start_date, $projectRunning->end_date);

        $rangeDate = [];
        $rangeDateReformat = [];
        $totalPerDate = [];

        foreach ($period as $date) {
            array_push($rangeDate, $date->format('Y-m-d'));
        }

        foreach($rangeDate as $d) {
            $total =  DB::table('polda_submiteds')->where('submited_date', $d)->count();

            if($total == 0) {
                array_push($totalPerDate, 0);
            } else {
                array_push($totalPerDate, $total);
            }
        }

        foreach($rangeDate as $rd) {
            array_push($rangeDateReformat, indonesianStandart($rd));
        }

        $todaySubmited =  DB::table('polda_submiteds')->where('submited_date', nowToday())->count();

        return response()->json([
            'rangeDate' => $rangeDateReformat,
            'totalPerDate' => $totalPerDate,
            'projectName' => $dateCountDown->deskripsi,
            'totalSum' => $todaySubmited
        ], 200);
    }

    public function openPoldaData($short_name)
    {
        $polda = Polda::where('short_name', $short_name)->firstOrFail();

        session()->forget(['polda_id', 'polda_short_name']);

        session(['polda_id' => $polda->id]);
        session(['polda_short_name' => $polda->short_name]);

        return view('korlantas_open_polda', compact('polda'));
    }

    public function dataSpesificPolda($polda_id)
    {
        $model = PoldaSubmited::perpoldabyid($polda_id)->with(['polda', 'rencanaOperasi']);

        return datatables()->eloquent($model)
        ->addColumn('operation_name', function (PoldaSubmited $ps) {
            return $ps->rencanaOperasi->name;
        })
        ->addColumn('time_created', function (PoldaSubmited $ps) {
            return timeOnly($ps->created_at);
        })
        ->addColumn('polda_name', function (PoldaSubmited $ps) {
            return $ps->polda->name;
        })
        ->toJson();
    }

    public function openPoldaDataDownloadAttachment($uuid)
    {
        $poldaSubmited = PoldaSubmited::with('polda')->whereUuid($uuid)->first();

        if(empty($poldaSubmited)) {
            flash('Data inputan polda tidak ditemukan. Silakan refresh halaman dan coba lagi')->error();
            return redirect()->back();
        }

        if(empty($poldaSubmited->document_upload) || is_null($poldaSubmited->document_upload)) {
            flash('Polda '.$poldaSubmited->polda->name.' tidak mengupload file dokumen pada inputan yg dipilih')->error();
            return redirect()->back();
        }

        return response()->download(public_path('document-upload/polda/'.$poldaSubmited->document_upload));
    }

    public function changeOperation($operation)
    {
        session()->forget(['filter_operation']);
        session(['filter_operation' => $operation]);

        return [
            'msg' => 'Operation Changed'
        ];
    }
}
