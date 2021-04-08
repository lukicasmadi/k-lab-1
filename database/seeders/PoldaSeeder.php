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
                'polda_assign' => 'poldaaceh',
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
                'polda_assign' => 'poldasumut',
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
                'polda_assign' => 'poldasumbar',
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
                'polda_assign' => 'poldariau',
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
                'polda_assign' => 'poldakepri',
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
                'polda_assign' => 'poldajambi',
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
                'polda_assign' => 'poldabengkulu',
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
                'polda_assign' => 'poldasumsel',
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
                'polda_assign' => 'poldababel',
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
                'polda_assign' => 'poldalampung',
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
                'polda_assign' => 'poldametrojaya',
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
                'polda_assign' => 'poldabanten',
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
                'polda_assign' => 'poldajabar',
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
                'polda_assign' => 'poldajateng',
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
                'polda_assign' => 'poldadiy',
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
                'polda_assign' => 'poldajatim',
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
                'polda_assign' => 'poldakalbar',
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
                'polda_assign' => 'poldakalteng',
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
                'polda_assign' => 'poldakalsel',
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
                'polda_assign' => 'poldakaltim',
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
                'polda_assign' => 'poldakaltara',
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
                'polda_assign' => 'poldasulut',
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
                'polda_assign' => 'poldagorontalo',
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
                'polda_assign' => 'poldasulteng',
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
                'polda_assign' => 'poldasulbar',
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
                'polda_assign' => 'poldasulsel',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

            Polda::create([
                'uuid' => genUuid(),
                'name' => 'Sulawesi Tenggara',
                'short_name' => 'sultra',
                'logo' => 'sultra.png',
                'polda_assign' => 'poldasulteng',
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
                'polda_assign' => 'poldabali',
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
                'polda_assign' => 'poldantb',
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
                'polda_assign' => 'poldantt',
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
                'polda_assign' => 'poldamalut',
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
                'polda_assign' => 'poldamaluku',
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
                'polda_assign' => 'poldapabar',
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
                'polda_assign' => 'poldapapua',
                'jurisdiction' => null,
                'headquarters' => null,
                'type' => null,
                'official_site' => null,
                'created_by' => $firstID,
            ]);

        });
    }
}
