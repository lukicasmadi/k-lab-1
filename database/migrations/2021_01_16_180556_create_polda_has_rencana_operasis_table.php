<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoldaHasRencanaOperasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polda_has_rencana_operasis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');

            $table->unsignedBigInteger('rencana_operasi_id');
            $table->foreign('rencana_operasi_id')->references('id')->on('rencana_operasis');
            $table->unsignedBigInteger('polda_id');
            $table->foreign('polda_id')->references('id')->on('poldas');

            $table->string('type_name');
            $table->string('type_value');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

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
        Schema::dropIfExists('polda_has_rencana_operasis');
    }
}
