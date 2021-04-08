<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ArticleSeeder::class,
            PoldaSeeder::class,
            BannerHeaderSeeder::class,
            SlideBannerSeeder::class,
            JenisPelanggaranSeeder::class,
            LaporanTypeSeeder::class,
            KesatuanSeeder::class,
            RencanaOperasiSeeder::class,
            UserAssign::class,
        ]);
    }
}
