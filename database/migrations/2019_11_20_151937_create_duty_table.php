<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duty', function (Blueprint $table) {
            $table->Increments('id');
            $table->bigInteger('police_id')->unsigned();;
            $table->unsignedInteger('thana_id');
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->foreign('thana_id')->references('id')->on('thana');
            $table->foreign('police_id')->references('id')->on('police');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duty');
    }
}
