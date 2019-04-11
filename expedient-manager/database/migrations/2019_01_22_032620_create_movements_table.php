<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expedient_id')->unsigned();
            $table->foreign('expedient_id')->references('id')->on('expedients');
            $table->string('origin');
            $table->string('destination');
            $table->integer('movement_nro');
            $table->integer('foja');
            $table->integer('origin_user')->unsigned();
            $table->foreign('origin_user')->references('id')->on('users');
             $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
