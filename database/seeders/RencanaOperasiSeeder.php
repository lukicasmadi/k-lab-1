<?php

namespace Database\Seeders;

use App\Models\RencanaOperasi;
use Illuminate\Database\Seeder;

class RencanaOperasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RencanaOperasi::withoutEvents(function () {
            return RencanaOperasi::factory(3)->create();
        });
    }
}
