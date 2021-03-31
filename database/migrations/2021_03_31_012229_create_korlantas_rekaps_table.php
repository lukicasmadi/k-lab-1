<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorlantasRekapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korlantas_rekaps', function (Blueprint $table) {
            $table->id();
            $table->string("report_name");
            $table->string("polda");
            $table->string("year");
            $table->unsignedBigInteger('rencana_operasi_id');
            $table->foreign('rencana_operasi_id')->references('id')->on('rencana_operasis');
            $table->string("operation_date");
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
        Schema::dropIfExists('korlantas_rekaps');
    }
}
