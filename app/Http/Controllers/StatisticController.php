<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function data()
    {
        $model = Polda::with(['poldaInput' => function($query) {
            $query->whereRaw("DATE(created_at) = ?", [date('Y-m-d')]);
        }])->get();

        logger($model);
    }

    public function index()
    {
        return view('statistic.index');
    }
}
