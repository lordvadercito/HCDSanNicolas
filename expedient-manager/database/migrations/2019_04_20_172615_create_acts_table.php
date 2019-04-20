<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('act_nro')->unsigned();
            $table->date('act_date');
            $table->string('hcd_president');
            $table->string('hcd_secretary');
            $table->string('session_type');
            $table->date('session_start')->nullable();
            $table->date('session_end')->nullable();
            $table->text('tribute')->nullable();
            $table->text('observation')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('acts');
    }
}
