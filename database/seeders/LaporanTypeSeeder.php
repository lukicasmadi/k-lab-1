<?php

namespace Database\Seeders;

use App\Models\LaporanType;
use Illuminate\Database\Seeder;

class LaporanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LaporanType::factory(1)->create([
            'type' => 'PUSAT'
        ]);

        LaporanType::factory(1)->create([
            'type' => 'POLDA'
        ]);
    }
}
