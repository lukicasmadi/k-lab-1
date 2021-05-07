<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\Article;
use Carbon\CarbonPeriod;
use App\Models\CountDown;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

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
        $project_start = dateOnly(operationPlans()->start_date);
        $project_end = dateOnly(operationPlans()->end_date);
        $half_week = dateOnly(incrementDays($project_start, 5));
        $half_week_plus_one = dateOnly(incrementDays($project_start, 6));

        $full = countDays($project_start, $project_end);
        $finalHalf = round($full / 2);

        if(datePassed($half_week) == "belum_lewat") {
            $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$project_start, $half_week])->where("polda_id", poldaId())->count();
        } else {
            $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$half_week_plus_one, $project_end])->where("polda_id", poldaId())->count();
        }

        if(empty($count_polda_input_daily) || $count_polda_input_daily <= 0) {
            $data = [
                "filled" => 0,
                "nofilled" => 100
            ];
        } else {
            $percentage = round((100 * $count_polda_input_daily) / $finalHalf, 1);
            $data = [
                "filled" => $percentage,
                "nofilled" => 100 - $percentage
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
                "filled" => $percentage,
                "nofilled" => 100 - $percentage
            ];
        }

        return $data;
    }

    public function weeklyPoldaById($id)
    {
        $project_start = dateOnly(operationPlans()->start_date);
        $project_end = dateOnly(operationPlans()->end_date);
        $half_week = dateOnly(incrementDays($project_start, 5));
        $half_week_plus_one = dateOnly(incrementDays($project_start, 6));

        $full = countDays($project_start, $project_end);
        $finalHalf = round($full / 2);

        if(datePassed($half_week) == "belum_lewat") {
            $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$project_start, $half_week])->where("polda_id", $id)->count();
        } else {
            $count_polda_input_daily = PoldaSubmited::whereBetween('submited_date', [$half_week_plus_one, $project_end])->where("polda_id", $id)->count();
        }

        if(empty($count_polda_input_daily) || $count_polda_input_daily <= 0) {
            $data = [
                "filled" => 0,
                "nofilled" => 100
            ];
        } else {
            $percentage = round((100 * $count_polda_input_daily) / $finalHalf, 1);
            $data = [
                "filled" => $percentage,
                "nofilled" => 100 - $percentage
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
                "filled" => $percentage,
                "nofilled" => 100 - $percentage
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

    public function dashboard()
    {
        if(isPolda()) {
            if(checkUserHasAssign() == "belum") {
                return redirect()->route('notAssign');
            }
        }

        if(empty(operationPlans())) {
            return view('empty_project');
        }

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

            return view('main', compact('poldaAtas', 'poldaBawah', 'dailyInput'));
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
        if (str_contains($indexData, '-')) {
            abort(404);
        }

        $projectRunning = operationPlans();

        if(empty($projectRunning)) {
            return [];
        }

        $period = CarbonPeriod::create($projectRunning->start_date, $projectRunning->end_date);

        $rangeDate = [];

        foreach ($period as $date) {
            array_push($rangeDate, $date->format('Y-m-d'));
        }

        $countData = count($rangeDate) - 1;

        if($indexData > $countData) {
            abort(404);
        }

        $whereDate = $rangeDate[$indexData];

        $polda = Polda::with(['dailyInput' => function($q) use($whereDate) {
            $q->select('id', 'polda_id', 'status', 'submited_date', 'rencana_operasi_id')->where('submited_date', '=', $whereDate);
        }])->select('id', 'name')->get();

        excelViewAbsensi($polda, IdFullDateOnly($whereDate));
    }

    public function dashboardChart()
    {
        $projectRunning = operationPlans();

        if(!empty($projectRunning)) {
            $dateCountDown = CountDown::where('rencana_operasi_id', $projectRunning->id)->where('tanggal', nowToday())->first();

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
                'projectName' => $dateCountDown->deskripsi
            ], 200);
        }
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
}
