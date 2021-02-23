<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\DailyInput;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('can-create-plan')->only('dailyAllPolda', 'poldaUuid', 'comparison');
    }

    public function dailyAllPolda()
    {
        $polda = Polda::select("id", "uuid", "name", "short_name", "logo")
            ->with(['dailyInput' => function($query) {
                $query->where(DB::raw('DATE(created_at)'), date("Y-m-d"));
            }])
            ->orderBy("name", "asc")
            ->get();

        $rencanaOperasi = RencanaOperasi::orderBy('id', 'desc')->pluck("name", "id");

        return view('report.daily_all', compact('rencanaOperasi'));
    }

    public function dailyProcess()
    {
        $dailyInput = DailyInput::select("*")->where(DB::raw('DATE(created_at)'), request('year'))->get();

        logger($dailyInput);

        return redirect()->back();
    }

    public function poldaUuid($uuid)
    {
        //
    }

    public function comparison()
    {
        //
    }
}
