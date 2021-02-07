<?php

namespace App\Exports;

use App\Models\PoldaSubmited;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PoldaSubmitedExport implements FromView
{

    public function view(): View
    {
        return view('exports.daily_by_polda', [
            'data' => PoldaSubmited::all()
        ]);
    }
}
