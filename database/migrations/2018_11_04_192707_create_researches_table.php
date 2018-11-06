<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('title', 50);
            $table->string('tracking_number', 12)->unique();
            $table->integer('college_id')->unsigned();
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('college_departments');
            $table->tinyInteger('step_number')->default(2);
            $table->timestamp('time_posted')->nullable();
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('researches');
    }
}
