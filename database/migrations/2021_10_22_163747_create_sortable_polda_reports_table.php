<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortablePoldaReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortable_polda_reports', function (Blueprint $table) {
            $table->id();
            $table->string('polda_name');
            $table->unsignedBigInteger('polda_id')->nullable();
            $table->foreign('polda_id')->references('id')->on('poldas');
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
        Schema::dropIfExists('sortable_polda_reports');
    }
}
