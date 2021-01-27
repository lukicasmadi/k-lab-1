<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bertho',
            'email' => 'berthojoris@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Yc2mL4kXARZrXkGB2ISfk.3gUB.E/oO7mq3iCnkT5REeELwrRBp6K',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Cas',
            'email' => 'lukicasmadi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('10dunia'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ArticleSeeder::class,
            PoldaSeeder::class,
            BannerHeaderSeeder::class,
            SlideBannerSeeder::class,
            RencanaOperasiSeeder::class,
            PoldaHasRencanaSeeder::class,
            JenisPelanggaranSeeder::class,
            LaporanTypeSeeder::class,
            KesatuanSeeder::class,
        ]);
    }
}
