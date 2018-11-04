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
                'middlename' => 'Ad',
        		'lastname' => 'Admin',
        		'id_number' => '18-11111',
                'email' => 'admin@admin.com',
                'contact_number' => '09191111111',
        		'user_type' => 1,
        		'password' => bcrypt('password')
        	],
            [
                'firstname' => 'oc',
                'middlename' => 'oc',
                'lastname' => 'oc',
                'id_number' => '18-22222',
                'email' => 'oc@admin.com',
                'contact_number' => '09191111112',
                'user_type' => 2,
                'password' => bcrypt('password')
            ],
            [
                'firstname' => 'cc',
                'middlename' => 'cc',
                'lastname' => 'cc',
                'id_number' => '18-66666',
                'email' => 'cc@gmail.com',
                'contact_number' => '09191111116',
                'user_type' => 6,
                'password' => bcrypt('password')
            ],
            [
                'firstname' => 'drc',
                'middlename' => 'dr',
                'lastname' => 'drc',
                'id_number' => '18-77777',
                'email' => 'drc@drc.com',
                'contact_number' => '09191111117',
                'user_type' => 7,
                'password' => bcrypt('password')
            ],
            [
                'firstname' => 'Fr',
                'middlename' => 'ff',
                'lastname' => 'Fr',
                'id_number' => '18-88888',
                'email' => 'fr@fr.com',
                'contact_number' => '09191111118',
                'user_type' => 8,
                'password' => bcrypt('password')
            ]
        ]);
    }
}
