<?php

namespace App\Exports;

use App\Models\Polda;
use App\Models\PoldaSubmited;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PoldaSubmitedExport implements FromView
{

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function view(): View
    {
        $polda = Polda::whereUuid($this->uuid)->firstOrFail();
        $data = PoldaSubmited::with('dailyInput')->where("polda_id", $polda->id)->where("submited_date", date("Y-m-d"))->firstOrFail();

        return view('exports.report_daily', [
            'data' => $data
        ]);
    }
}
