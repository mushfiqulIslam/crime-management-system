<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFIRTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FIR', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('police_id')->unsigned();;
            $table->unsignedInteger('thana_id');
            $table->string('status');
            $table->string('type');
            $table->timestamps();
            $table->string('postmortem_report');
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
        Schema::dropIfExists('FIR');
    }
}
