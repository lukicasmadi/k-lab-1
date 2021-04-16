<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DailyInputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polda_submiteds', function (Blueprint $table) {
            $table->string('nama_kesatuan')->after('status')->nullable();
            $table->string('nama_atasan')->after('nama_kesatuan')->nullable();
            $table->string('pangkat_dan_nrp')->after('nama_atasan')->nullable();
            $table->string('jabatan')->after('pangkat_dan_nrp')->nullable();
            $table->string('nama_laporan')->after('jabatan')->nullable();
            $table->string('nama_kota')->after('nama_laporan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polda_submiteds', function (Blueprint $table) {
            $table->dropColumn('nama_kesatuan');
            $table->dropColumn('nama_atasan');
            $table->dropColumn('pangkat_dan_nrp');
            $table->dropColumn('jabatan');
            $table->dropColumn('nama_laporan');
            $table->dropColumn('nama_kota');
        });
    }
}
