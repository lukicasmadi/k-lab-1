<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPelanggaran;

class JenisPelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPelanggaran::withoutEvents(function () {
            return JenisPelanggaran::factory(25)->create();
        });
    }
}
