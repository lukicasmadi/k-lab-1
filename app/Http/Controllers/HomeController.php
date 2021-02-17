<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function index()
    {
        $polda = Polda::select("id", "uuid", "name", "short_name", "logo")
            ->with(['dailyInput' => function($query) {
                $query->where(DB::raw('DATE(created_at)'), date("Y-m-d"));
            }])
            ->orderBy("name", "asc")
            ->get();

        if(empty(operationPlans())) {
            return view('empty_project');
        }
        return view('main', compact('polda'));
    }

    public function info()
    {
        return view('info');
    }

    public function notifikasi()
    {
        $model = PoldaSubmited::with(['polda' => function($query) {
            $query->select('id', 'name', 'uuid', 'logo');
        }])->where("submited_date", date("Y-m-d"))->get();

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

    public function dashboardChart()
    {
        $projectRunning = operationPlans();

        $period = CarbonPeriod::create($projectRunning->start_date, $projectRunning->end_date);

        $rangeDate = [];
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

        return response()->json([
            'rangeDate' => $rangeDate,
            'totalPerDate' => $totalPerDate,
            'projectName' => $projectRunning->name
        ], 200);
    }
}
