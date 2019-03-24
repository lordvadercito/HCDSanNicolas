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
            $table->string('projectType');
            $table->string('subject');
            $table->text('cover');
            $table->string('state');
            $table->boolean('archived');
            $table->string('incomeRecord');
            $table->string('treatmentRecord');
            $table->date('creation_date');
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
