<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoldaSubmitedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polda_submiteds', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->unsignedBigInteger('polda_id');
            $table->foreign('polda_id')->references('id')->on('poldas');
            $table->unsignedBigInteger('rencana_operasi_id');
            $table->foreign('rencana_operasi_id')->references('id')->on('rencana_operasis');
            $table->string("status");
            $table->string("nama_kesatuan"); /* mulai dari sini */
            $table->string("nama_atasan");
            $table->string("pangkat_dan_nrp");
            $table->string("jabatan");
            $table->string("nama_laporan");
            $table->string("nama_kota"); /* sampai sini */
            $table->string("document_upload")->nullable();
            $table->date("submited_date");
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
        Schema::dropIfExists('polda_submiteds');
    }
}
