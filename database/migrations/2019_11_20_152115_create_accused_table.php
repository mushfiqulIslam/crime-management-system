<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccusedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accused', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('fir_id')->unsigned();;
            $table->string('address');
            $table->string('status');
            $table->unsignedInteger('l_id');
            $table->foreign('fir_id')->references('id')->on('FIR');
            $table->foreign('l_id')->references('id')->on('lawer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accused');
    }
}
