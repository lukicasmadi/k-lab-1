<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function data()
    {
        $model = Polda::with(['poldaInputCurrentToday', 'poldaInputPrevToday'])->get();
    }

    public function index()
    {
        return view('statistic.index');
    }
}
