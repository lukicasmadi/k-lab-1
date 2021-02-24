<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use App\Exports\PoldaAllExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        $now = now()->format("Y-m-d");
        $filename = 'daily-report-all-polda-'.$now.'.xlsx';

        return Excel::download(new PoldaAllExport(request('tanggal'), request('operation_id')), $filename);
    }
}
