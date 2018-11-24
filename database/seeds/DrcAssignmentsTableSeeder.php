<?php

use Illuminate\Database\Seeder;

class DrcAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drc_assignments')->insert([
        	[
        		'drc_id' => 7,
        		'college_id' => 1,
        		'department_id' => 1
        	]
        ]);
    }
}
