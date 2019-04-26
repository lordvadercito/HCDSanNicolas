<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnexExpedientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annex_expedient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expedient_id')->unsigned();
            $table->integer('annex_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('expedient_id')->references('id')->on('expedients');
            $table->foreign('annex_id')->references('id')->on('expedients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annex_expedient');
    }
}
