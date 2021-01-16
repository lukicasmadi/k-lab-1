<?php

namespace Database\Seeders;

use App\Models\BannerHeader;
use Illuminate\Database\Seeder;

class BannerHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BannerHeader::factory(5)->create();
    }
}
