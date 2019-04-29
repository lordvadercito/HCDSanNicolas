<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayOrderNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_order__notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day_order_id')->unsigned();
            $table->integer('note_id')->unsigned();
            $table->foreign('day_order_id')->references('id')->on('day_orders');
            $table->foreign('note_id')->references('id')->on('notes');
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
        Schema::dropIfExists('day_order__notes');
    }
}
