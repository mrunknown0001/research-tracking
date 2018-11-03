<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fr_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fr_id')->unsigned();
            $table->foreign('fr_id')->references('id')->on('users');
            $table->integer('college_id')->unsigned();
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('college_departments');
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
        Schema::dropIfExists('fr_assignments');
    }
}
