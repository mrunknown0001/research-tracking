<?php

use Illuminate\Database\Seeder;

class CollegeClerkAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('college_clerk_assignments')->insert([
        	[
        		'clerk_id' => 6,
        		'college_id' => 1
        	],
            [
                'clerk_id' => 11,
                'college_id' => 4
            ],
            [
                'cler_id' => 12,
                'college_id' => 2
            ]
        ]);
    }
}
