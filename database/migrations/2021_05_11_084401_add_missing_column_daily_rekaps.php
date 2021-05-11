<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnDailyRekaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_rekaps', function (Blueprint $table) {
            $table->string('kesatuan')->nullable()->after('operation_date_end');
            $table->string('atasan')->nullable()->after('kesatuan');
            $table->string('pangkat_nrp')->nullable()->after('atasan');
            $table->string('jabatan')->nullable()->after('pangkat_nrp');
            $table->string('kota')->nullable()->after('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_rekaps', function (Blueprint $table) {
            $table->dropColumn('kesatuan');
            $table->dropColumn('atasan');
            $table->dropColumn('pangkat_nrp');
            $table->dropColumn('jabatan');
            $table->dropColumn('kota');
        });
    }
}
