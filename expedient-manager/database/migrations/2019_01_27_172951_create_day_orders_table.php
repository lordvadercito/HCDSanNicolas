<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('act_id')->unsigned();
            $table->DateTime('dateOrder');
            $table->integer('sessionNro');
            $table->boolean('lock');
            $table->foreign('act_id')->references('id')->on('acts');
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
        Schema::dropIfExists('day_orders');
    }
}
