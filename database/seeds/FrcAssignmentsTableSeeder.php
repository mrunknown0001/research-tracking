<?php

use Illuminate\Database\Seeder;

class FrcAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fr_assignments')->insert([
        	[
        		'fr_id' => 8,
        		'college_id' => 1,
        		'department_id' => 1
        	],
            [
                'fr_id' => 9,
                'college_id' => 1,
                'department_id' => 1
            ],
            [
                'fr_id' => 10,
                'college_id' => 1,
                'department_id' => 1
            ]
        ]);
    }
}
