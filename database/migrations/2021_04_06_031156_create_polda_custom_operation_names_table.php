<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoldaCustomOperationNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polda_custom_operation_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_operasi_id');
            $table->foreign('rencana_operasi_id')->references('id')->on('rencana_operasis');
            $table->unsignedBigInteger('polda_id');
            $table->foreign('polda_id')->references('id')->on('poldas');
            $table->string("alias");
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
        Schema::dropIfExists('polda_custom_operation_names');
    }
}
