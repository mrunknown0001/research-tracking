<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 30);
            $table->string('middlename', 30)->nullable();
            $table->string('lastname', 30);
            $table->string('id_number', 9)->unique();
            $table->string('contact_number', 11)->nullable();
            $table->string('email', 30)->nullable();
            $table->tinyInteger('user_type');
            $table->string('password', 80);
            $table->tinyInteger('agreed')->default(0);
            $table->tinyInteger('password_changed')->default(0);
            $table->boolean('active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
