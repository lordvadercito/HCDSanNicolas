<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnexesExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annexes_expedients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expedient_id')->unsigned();
            $table->integer('annex_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('expedient_id')->references('id')->on('expedients');
            $table->foreign('annex_id')->references('id')->on('annexes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annexes_expedients');
    }
}
