<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Polda;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;

class TestController extends Controller
{
    public function custom()
    {
        $model = RencanaOperasi::with(['poldaAlias' => function($query) {
            $query->where('polda_id', 2);
        }])->get();

        logger($model);

        return "OK";
    }
}
