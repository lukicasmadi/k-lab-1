<?php

namespace Database\Seeders;

use App\Models\Kesatuan;
use Illuminate\Database\Seeder;

class KesatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kesatuan::factory(20)->create();
    }
}
