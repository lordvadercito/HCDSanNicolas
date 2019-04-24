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
            $table->unique('expedientNro');
            $table->string('expedientDENro')->nullable();
            $table->string('projectType');
            $table->string('subject');
            $table->string('secondary_subject')->nullable();
            $table->text('cover');
            $table->string('origin');
            $table->integer('commission_id')->unsigned();
            $table->foreign('commission_id')->references('id')->on('commissions');
            $table->string('state');
            $table->boolean('archived');
            $table->string('incomeRecord');
            $table->string('treatmentRecord')->nullable();
            $table->date('creation_date');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('expedients');
    }
}
