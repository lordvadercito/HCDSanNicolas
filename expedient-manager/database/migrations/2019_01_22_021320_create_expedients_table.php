<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expedientNro');
            $table->string('projectType');
            $table->string('subject');
            $table->string('cover');
            $table->integer('states_id')->unsigned();
            $table->foreign('states_id')->references('id')->on('states');
            $table->boolean('archived');
            $table->string('incomeRecord');
            $table->string('treatmentRecord');
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
        Schema::dropIfExists('expedients');
    }
}
