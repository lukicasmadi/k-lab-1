<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyRekapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_rekaps', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->string("report_name");
            $table->string("polda");
            $table->string("year");
            $table->unsignedBigInteger('rencana_operasi_id');
            $table->foreign('rencana_operasi_id')->references('id')->on('rencana_operasis');
            $table->enum("config_date", ['all', 'custom']);
            $table->date("operation_date_start");
            $table->date("operation_date_end");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_rekaps');
    }
}
