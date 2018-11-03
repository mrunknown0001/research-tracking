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
        	],
            [
                'firstname' => 'oc',
                'lastname' => 'oc',
                'id_number' => '18-22222',
                'user_type' => 2,
                'password' => bcrypt('password')
            ],
            [
                'firstname' => 'drc',
                'lastname' => 'drc',
                'id_number' => '18-77777',
                'user_type' => 7,
                'password' => bcrypt('password')
            ],
            [
                'firstname' => 'Fr',
                'lastname' => 'Fr',
                'id_number' => '18-88888',
                'user_type' => 8,
                'password' => bcrypt('password')
            ]
        ]);
    }
}
