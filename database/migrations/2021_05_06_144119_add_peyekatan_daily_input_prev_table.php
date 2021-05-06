<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeyekatanDailyInputPrevTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_input_prev', function (Blueprint $table) {
            $table->float('penyekatan_motor_p', 8, 0)->default(0)->after('prokes_covid_giat_baksos_p');
            $table->float('penyekatan_mobil_penumpang_p', 8, 0)->default(0)->after('penyekatan_motor_p');
            $table->float('penyekatan_mobil_bus_p', 8, 0)->default(0)->after('penyekatan_mobil_penumpang_p');
            $table->float('penyekatan_mobil_barang_p', 8, 0)->default(0)->after('penyekatan_mobil_bus_p');
            $table->float('penyekatan_kendaraan_khusus_p', 8, 0)->default(0)->after('penyekatan_mobil_barang_p');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_input_prev', function (Blueprint $table) {
            $table->dropColumn('penyekatan_motor_p');
            $table->dropColumn('penyekatan_mobil_penumpang_p');
            $table->dropColumn('penyekatan_mobil_bus_p');
            $table->dropColumn('penyekatan_mobil_barang_p');
            $table->dropColumn('penyekatan_kendaraan_khusus_p');
        });
    }
}
