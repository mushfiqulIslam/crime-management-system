<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor', function (Blueprint $table) {
            $table->bigInteger('police_id')->unsigned();
            $table->unsignedInteger('thana_id');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('supervisor');
    }
}
