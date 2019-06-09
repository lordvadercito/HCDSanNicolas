<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpedientFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expedients', function (Blueprint $table) {
            $table->string('ordinanceNro')->nullable();
            $table->string('resolutionNro')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('recommendation')->nullable();
            $table->string('file_annex_name')->nullable();
            $table->string('file_annex_path')->nullable();
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
