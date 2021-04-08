<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Polda;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function polda()
    {
        $user = User::whereNotIn('name', ['Bertho', 'Cas', 'bagops', 'korlantas'])->orderBy('id', 'asc')->get();

        foreach($user as $u) {

            $polda = Polda::where('polda_assign', $u->name)->first();

            if(!empty($polda)) {

                UserHasPolda::create([
                    'user_id' => $u->id,
                    'polda_id' => $polda->id,
                ]);

            } else {
                logger($u->name);
            }

        }

    }
}
