<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchProgressReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_progress_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('research_id');
            $table->foreign('research_id')->references('id')->on('researches');
            $table->string('original_filename', 255)->nullable();
            $table->string('unique_filename', 255)->nullable();
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
        Schema::dropIfExists('research_progress_reports');
    }
}
