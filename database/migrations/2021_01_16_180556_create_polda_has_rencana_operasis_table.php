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

            $table->string('pelanggaran_lalu_lintas_tilang')->default(0);
            $table->string('pelanggaran_lalu_lintas_teguran')->default(0);
            $table->string('pelanggaran_sepeda_motor_gun_helm_sni')->default(0);
            $table->string('pelanggaran_sepeda_motor_melawan_arus')->default(0);
            $table->string('pelanggaran_sepeda_motor_gun_hp_saat_berkendara')->default(0);
            $table->string('pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol')->default(0);
            $table->string('pelanggaran_sepeda_motor_melebihi_batas_kecepatan')->default(0);
            $table->string('pelanggaran_sepeda_motor_berkendara_dibawah_umur')->default(0);
            $table->string('pelanggaran_sepeda_motor_lain_lain')->default(0);
            $table->string('pelanggaran_mobil_melawan_arus')->default(0);
            $table->string('pelanggaran_mobil_gun_hp_saat_berkendara')->default(0);
            $table->string('pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol')->default(0);
            $table->string('pelanggaran_mobil_melebihi_batas_kecepatan')->default(0);
            $table->string('pelanggaran_mobil_berkendara_dibawah_umur')->default(0);
            $table->string('pelanggaran_mobil_gun_safety_belt')->default(0);
            $table->string('pelanggaran_mobil_lain_lain')->default(0);

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
