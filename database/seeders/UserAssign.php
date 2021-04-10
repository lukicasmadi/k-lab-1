<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Polda;
use App\Models\UserHasPolda;
use Illuminate\Database\Seeder;

class UserAssign extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
                // logger($u->name);
            }
        }
    }
}
