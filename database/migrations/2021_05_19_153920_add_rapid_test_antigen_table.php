<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRapidTestAntigenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_inputs', function (Blueprint $table) {
            $table->float('rapid_test_antigen_positif', 8, 0)->default(0)->after('penyekatan_kendaraan_khusus');
            $table->float('rapid_test_antigen_negatif', 8, 0)->default(0)->after('rapid_test_antigen_positif');
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
            $table->dropColumn('rapid_test_antigen_positif');
            $table->dropColumn('rapid_test_antigen_negatif');
        });
    }
}
