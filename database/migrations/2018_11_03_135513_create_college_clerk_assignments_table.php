<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeClerkAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_clerk_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clerk_id')->unsigned();
            $table->foreign('clerk_id')->references('id')->on('users');
            $table->integer('college_id')->unsigned();
            $table->foreign('college_id')->references('id')->on('colleges');
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
        Schema::dropIfExists('college_clerk_assignments');
    }
}
