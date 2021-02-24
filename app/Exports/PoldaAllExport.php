<?php

namespace App\Exports;

use App\Models\Polda;
use App\Models\DailyInput;
use App\Models\PoldaSubmited;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PoldaAllExport implements FromView
{

    public function __construct(string $tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function view(): View
    {
        $data = DailyInput::selectRaw('
            sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
            sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran
        ')->whereRaw('DATE(created_at) = ?', [date("Y-m-d")])->first();

        return view('exports.report_daily_all', [
            'data' => $data
        ]);
    }
}
