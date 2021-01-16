<?php

namespace Database\Seeders;

use App\Models\SlideBanner;
use Illuminate\Database\Seeder;

class SlideBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SlideBanner::factory(5)->create();
    }
}
