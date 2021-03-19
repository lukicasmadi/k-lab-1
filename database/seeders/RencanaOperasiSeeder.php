<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
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
            $now = Carbon::now();

            $pl = "Operasi Patuh Lalu Lintas";
            RencanaOperasi::create([
                'uuid' => genUuid(),
                'name' => $pl,
                'slug_name' => Str::slug($pl, '-'),
                'desc' => "Operasi untuk menindak pengguna roda 2 di jalan raya yang tidak membawa kelengkapan SIM dan STNK",
                'start_date' => now(),
                'end_date' => $now->addDays(13),
                'created_by' => User::whereName('korlantas')->first()->id,
                'updated_by' => User::whereName('korlantas')->first()->id,
            ]);

            $ketupat = "Operasi Ketupat";
            RencanaOperasi::create([
                'uuid' => genUuid(),
                'name' => $ketupat,
                'slug_name' => Str::slug($ketupat, '-'),
                'desc' => "Operasi untuk mengatur arus lalu lintas selama bulan puasa",
                'start_date' => "2021-04-01",
                'end_date' => "2021-04-30",
                'created_by' => User::whereName('korlantas')->first()->id,
                'updated_by' => User::whereName('korlantas')->first()->id,
            ]);
        });
    }
}
