<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Polda;
use Illuminate\Support\Str;
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
        Polda::withoutEvents(function () {
            return Polda::factory(34)->create();
            // Polda::create([
            //     'uuid' => genUuid(),
            //     'name' => 'Kepolisian Daerah Aceh',
            //     'jurisdiction' => 'Aceh',
            //     'headquarters' => 'Banda Aceh',
            //     'type' => 'A',
            //     'official_site' => 'https://aceh.polri.go.id/',
            //     'created_by' => User::first()->id,
            // ]);

            // Polda::create([
            //     'uuid' => genUuid(),
            //     'name' => 'Kepolisian Daerah Jambi',
            //     'jurisdiction' => 'Jambi',
            //     'headquarters' => 'Jambi',
            //     'type' => 'A',
            //     'official_site' => 'http://jambi.polri.go.id/',
            //     'created_by' => User::first()->id,
            // ]);

            // Polda::create([
            //     'uuid' => genUuid(),
            //     'name' => 'Kepolisian Daerah Istimewa Yogyakarta',
            //     'jurisdiction' => 'DI Yogyakarta',
            //     'headquarters' => 'Sleman',
            //     'type' => 'A',
            //     'official_site' => 'https://jogja.polri.go.id/',
            //     'created_by' => User::first()->id,
            // ]);

            // Polda::create([
            //     'uuid' => genUuid(),
            //     'name' => 'Kepolisian Daerah Jawa Barat',
            //     'jurisdiction' => 'Jawa Barat (tanpa Depok, dan Bekasi)',
            //     'headquarters' => 'Bandung',
            //     'type' => 'A',
            //     'official_site' => 'http://jabar.polri.go.id/',
            //     'created_by' => User::first()->id,
            // ]);

            // Polda::create([
            //     'uuid' => genUuid(),
            //     'name' => 'Kepolisian Daerah Metropolitan Jakarta Raya',
            //     'jurisdiction' => 'DKI Jakarta',
            //     'headquarters' => 'Jakarta Selatan',
            //     'type' => 'A-K (A+)',
            //     'official_site' => 'http://tribratametro.com/',
            //     'created_by' => User::first()->id,
            // ]);
        });
    }
}
