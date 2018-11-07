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
            $table->string('research_filename', 30);
            $table->integer('college_id')->unsigned();
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('college_departments');
            $table->tinyInteger('step_number')->default(2);
            $table->timestamp('time_posted')->nullable();

            $table->boolean('step_2_received')->default(0);
            $table->timestamp('step_2_date_received')->nullable();
            $table->string('step_2_comment', 100)->nullable();
            $table->boolean('step_2_proceeded')->default(0);
            $table->timestamp('step_2_date_proceeded')->nullable();

            $table->boolean('step_3_received')->default(0);
            $table->timestamp('step_3_date_received')->nullable();
            $table->boolean('step_3_proceeded')->default(0);
            $table->timestamp('step_3_date_proceeded')->nullable();

            $table->boolean('step_4_received')->default(0);
            $table->timestamp('step_4_date_received')->nullable();
            $table->string('step_4_comment', 100)->nullable();
            $table->boolean('step_4_proceeded')->defaul(0);
            $table->timestamp('step_4_date_proceeded')->nullable();

            $table->boolean('step_5_received')->default(0);
            $table->timestamp('step_5_date_received')->nullable();
            $table->string('step_5_comment', 100)->nullable();
            $table->tinyInteger('colloquium_grade')->nullable();
            $table->boolean('step_5_proceeded')->default(0);
            $table->timestamp('step_5_date_proceeded')->nullable();

            $table->boolean('step_6_received')->default(0);
            $table->timestamp('step_6_date_received')->nullable();
            $table->boolean('step_6_proceeded')->default(0);
            $table->timestamp('step_6_date_proceeded')->nullable();

            $table->boolean('step_7_received')->default(0);
            $table->timestamp('step_7_date_received')->nullable();
            $table->string('step_7_comment', 100)->nullable();
            $table->boolean('step_7_proceeded')->default(0);
            $table->timestamp('step_7_date_proceeded')->nullable();

            $table->boolean('step_8_received')->default(0);
            $table->timestamp('step_8_date_received')->nullable();
            $table->string('step_8_comment', 100)->nullable();
            $table->tinyInteger('urec_grade')->nullable();
            $table->integer('agenda_id')->unsigned()->nullable();
            $table->foreign('agenda_id')->references('id')->on('agendas');
            $table->boolean('step_8_proceeded')->default(0);
            $table->timestamp('step_8_date_proceeded')->nullable();

            $table->boolean('active')->default(1);
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
