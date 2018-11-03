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
        		'fr_id' => 5,
        		'college_id' => 1,
        		'department_id' => 1
        	]
        ]);
    }
}
