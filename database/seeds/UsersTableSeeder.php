<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'firstname' => 'Admin',
        		'lastname' => 'Admin',
        		'id_number' => '18-11111',
        		'user_type' => 1,
        		'password' => bcrypt('password')
        	]
        ]);
    }
}
