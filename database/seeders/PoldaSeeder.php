<?php

namespace Database\Seeders;

use App\Models\Polda;
use Illuminate\Database\Seeder;

class PoldaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Polda::factory(34)->create();
    }
}
