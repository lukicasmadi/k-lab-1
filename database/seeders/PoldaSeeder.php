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
                'name' => 'Aceh',
                'short_name' => 'aceh',
                'logo' => 'aceh.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sumatera Utara',
                'short_name' => 'sumut',
                'logo' => 'sumut.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sumatera Barat',
                'short_name' => 'sumbar',
                'logo' => 'sumbar.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Riau',
                'short_name' => 'riau',
                'logo' => 'riau.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Kepulauan Riau',
                'short_name' => 'kepri',
                'logo' => 'kepri.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Jambi',
                'short_name' => 'jambi',
                'logo' => 'jambi.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Bengkulu',
                'short_name' => 'bengkulu',
                'logo' => 'bengkulu.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sumatera Selatan',
                'short_name' => 'sumsel',
                'logo' => 'sumsel.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Kepulauan Bangka Belitung',
                'short_name' => 'babel',
                'logo' => 'babel.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Lampung',
                'short_name' => 'lampung',
                'logo' => 'lampung.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Metropolitan Jakarta Raya',
                'short_name' => 'metro jaya',
                'logo' => 'metro_jaya.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Banten',
                'short_name' => 'banten',
                'logo' => 'banten.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Jawa Barat',
                'short_name' => 'jabar',
                'logo' => 'jabar.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Jawa Tengah',
                'short_name' => 'jateng',
                'logo' => 'jateng.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Daerah Istimewa Yogyakarta',
                'short_name' => 'diy',
                'logo' => 'diy.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Jawa Timur',
                'short_name' => 'jatim',
                'logo' => 'jatim.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Kalimantan Barat',
                'short_name' => 'kalbar',
                'logo' => 'kalbar.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Kalimantan Tengah',
                'short_name' => 'kalteng',
                'logo' => 'kalteng.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Kalimantan Selatan',
                'short_name' => 'kalsel',
                'logo' => 'kalsel.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Kalimantan Timur',
                'short_name' => 'kaltim',
                'logo' => 'kaltim.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Kalimantan Utara',
                'short_name' => 'kaltara',
                'logo' => 'kaltara.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sulawesi Utara',
                'short_name' => 'sulut',
                'logo' => 'sulut.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Gorontalo',
                'short_name' => 'gorontalo',
                'logo' => 'gorontalo.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sulawesi Tengah',
                'short_name' => 'sulteng',
                'logo' => 'sulteng.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sulawesi Barat',
                'short_name' => 'sulbar',
                'logo' => 'sulbar.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sulawesi Selatan',
                'short_name' => 'sulsel',
                'logo' => 'sulsel.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sulawesi Tenggara',
                'short_name' => 'sulteng',
                'logo' => 'sulteng.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Bali',
                'short_name' => 'bali',
                'logo' => 'bali.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Nusa Tenggara Barat',
                'short_name' => 'ntb',
                'logo' => 'ntb.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Nusa Tenggara Timur',
                'short_name' => 'ntt',
                'logo' => 'ntt.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Maluku Utara',
                'short_name' => 'malut',
                'logo' => 'malut.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Maluku',
                'short_name' => 'maluku',
                'logo' => 'maluku.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Papua Barat',
                'short_name' => 'pabar',
                'logo' => 'pabar.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Papua',
                'short_name' => 'papua',
                'logo' => 'papua.png',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

        });
    }
}
