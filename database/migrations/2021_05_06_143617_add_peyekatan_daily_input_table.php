<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeyekatanDailyInputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_inputs', function (Blueprint $table) {
            $table->float('penyekatan_motor', 8, 0)->default(0)->after('prokes_covid_giat_baksos');
            $table->float('penyekatan_mobil_penumpang', 8, 0)->default(0)->after('penyekatan_motor');
            $table->float('penyekatan_mobil_bus', 8, 0)->default(0)->after('penyekatan_mobil_penumpang');
            $table->float('penyekatan_mobil_barang', 8, 0)->default(0)->after('penyekatan_mobil_bus');
            $table->float('penyekatan_kendaraan_khusus', 8, 0)->default(0)->after('penyekatan_mobil_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_inputs', function (Blueprint $table) {
            $table->dropColumn('penyekatan_motor');
            $table->dropColumn('penyekatan_mobil_penumpang');
            $table->dropColumn('penyekatan_mobil_bus');
            $table->dropColumn('penyekatan_mobil_barang');
            $table->dropColumn('penyekatan_kendaraan_khusus');
        });
    }
}
