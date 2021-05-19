<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRapidTestAntigenPrevTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_input_prev', function (Blueprint $table) {
            $table->float('rapid_test_antigen_positif_p', 8, 0)->default(0)->after('penyekatan_kendaraan_khusus_p');
            $table->float('rapid_test_antigen_negatif_p', 8, 0)->default(0)->after('rapid_test_antigen_positif_p');
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
            $table->dropColumn('rapid_test_antigen_positif_p');
            $table->dropColumn('rapid_test_antigen_negatif_p');
        });
    }
}
