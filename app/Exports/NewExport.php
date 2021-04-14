<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NewExport implements FromView
{

    public function __construct($prevData, $currentData)
    {
        $this->prevData = $prevData;
        $this->currentData = $currentData;
    }

    public function view(): View
    {

    }

}