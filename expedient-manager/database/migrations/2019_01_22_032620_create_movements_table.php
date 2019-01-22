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
            $table->integer('expedients_id')->unsigned();
            $table->foreign('expedients_id')->references('id')->on('expedients');
            $table->integer('origins_id')->unsigned();
            $table->foreign('origins_id')->references('id')->on('departments');
            $table->integer('destinations_id')->unsigned();
            $table->foreign('destinations_id')->references('id')->on('departments');
            $table->string('movementType');
            $table->integer('origin_users')->unsigned();
            $table->foreign('origin_users')->references('id')->on('users');
            $table->integer('destination_users')->unsigned();
            $table->foreign('destination_users')->references('id')->on('users');
            $table->boolean('received');
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
        Schema::dropIfExists('movements');
    }
}
