<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('researcher_id')->unsigned()->nullable();
            $table->foreign('researcher_id')->references('id')->on('users');
            $table->integer('drc_id')->unsigned()->nullable();
            $table->foreign('drc_id')->references('id')->on('users');
            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('forms');
            $table->string('comment', 120)->nullable();
            $table->string('original_filename', 150)->nullable();
            $table->string('unique_filename', 30)->nullable();
            $table->boolean('approved')->default(0);
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
        Schema::dropIfExists('form_requests');
    }
}
