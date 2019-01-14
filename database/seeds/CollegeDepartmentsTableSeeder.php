<?php

use Illuminate\Database\Seeder;

class CollegeDepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('college_departments')->insert([
        	[
        		'college_id' => 1,
        		'name' => 'Information Technology'
        	],
        	[
        		'college_id' => 1,
        		'name' => 'Information Systems'
        	],
        	[
        		'college_id' => 1,
        		'name' => 'Computer Science'
        	],
            [
                'college_id' => 4,
                'name' => 'Mechanical Engineering',
            ],
            [
                'college_id' => 4,
                'name' => 'Civil Engineering'
            ],
            [
                'college_id' => 2,
                'name' => 'AB English'
            ],
            [
                'college_id' => 2,
                'name' => 'Mass Comm'
            ]
        ]);
    }
}
