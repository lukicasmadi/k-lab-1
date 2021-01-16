<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PoldaHasRencanaOperasi;

class PoldaHasRencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PoldaHasRencanaOperasi::factory(35)->create();
    }
}
