<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchIncentivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_incentives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_id')->unsigned();
            $table->foreign('research_id')->references('id')->on('researches');
            $table->integer('publication_incentive')->nullable()->default(0);
            $table->integer('presentation_incentive')->nullable()->default(0);
            $table->integer('citation_incentive')->nullable()->default(0);
            $table->integer('competition_incentive')->nullable()->default(0);
            $table->integer('completed_research_incentive')->nullable()->default(0);
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
        Schema::dropIfExists('research_incentives');
    }
}
