<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Polda;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use App\Models\DailyNoticeCurrent;

class TestController extends Controller
{
    public function test()
    {
        return DailyNoticeCurrent::where('operation_id', 4)->sum('profesi_pelaku_pelanggaran_lain_lain_p');
    }
}
