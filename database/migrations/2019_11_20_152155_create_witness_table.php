<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWitnessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('witness', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('statement');
            $table->bigInteger('fir_id')->unsigned();;
            $table->foreign('fir_id')->references('id')->on('FIR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('witness');
    }
}
