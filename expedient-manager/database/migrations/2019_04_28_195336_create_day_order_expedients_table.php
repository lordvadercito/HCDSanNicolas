<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayOrderExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_order_expedients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day_order_id')->unsigned();
            $table->integer('expedient_id')->unsigned();
            $table->foreign('day_order_id')->references('id')->on('day_orders');
            $table->foreign('expedient_id')->references('id')->on('expedients');
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
        Schema::dropIfExists('day_order__expedients');
    }
}
