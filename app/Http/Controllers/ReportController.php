<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Http\Request;
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

        logger($polda);
        
        return view('report.daily_all');
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
