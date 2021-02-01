<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function totalinputan()
    {
        $model = Polda::withCount('rencanaOperation')->orderBy("name", "asc")->get();

        $dataPolda = $model->map(function ($polda) {
            return $polda->name;
        });

        $totalInputPolda = $model->map(function ($total) {
            return (int)$total->rencana_operation_count;
        });

        return response()->json([
            'polda' => $dataPolda,
            'total' => $totalInputPolda
        ], 200);
    }

    public function index()
    {
        return view('main');
    }
}
