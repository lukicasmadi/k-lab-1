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

            $firstID = User::first()->id;

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Aceh',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sumatera Utara',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sumatera Barat',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Riau',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Kepulauan Riau',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Jambi',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Bengkulu',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sumatera Selatan',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Kepulauan Bangka Belitung',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Lampung',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Metropolitan Jakarta Raya',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Banten',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Jawa Barat',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Jawa Tengah',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Daerah Istimewa Yogyakarta',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Jawa Timur',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Kalimantan Barat',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Kalimantan Tengah',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Kalimantan Selatan',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Kalimantan Timur',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Kalimantan Utara',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sulawesi Utara',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Gorontalo',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sulawesi Tengah',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sulawesi Barat',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sulawesi Selatan',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Sulawesi Tenggara',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Bali',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Nusa Tenggara Barat',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Nusa Tenggara Timur',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Maluku Utara',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Maluku',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Papua Barat',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Polda Papua',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

        });
    }
}
