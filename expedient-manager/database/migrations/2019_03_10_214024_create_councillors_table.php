<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouncillorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('councillors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->integer('blocks_id')->unsigned();
            $table->integer('commissions_id')->unsigned()->nullable();
            $table->date('start_of_mandate');
            $table->date('end_of_mandate');
            $table->boolean('active');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('blocks_id')->references('id')->on('blocks');
            $table->foreign('commissions_id')->references('id')->on('commissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('councillors');
    }
}
