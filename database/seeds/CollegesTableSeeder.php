<?php

use Illuminate\Database\Seeder;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert([
        	[
        		'name' => 'College of Computer Studies',
        		'code' => 'CCS'
        	],
        	[
        		'name' => 'College of Arts and Social Sciences',
        		'code' => 'CASS'
        	],
        	[
        		'name' => 'College of Business and Accountancy',
        		'code' => 'CBA'
        	],
        	[
        		'name' => 'College of Engineering and Technology',
        		'code' => 'CET'
        	],
        	[
        		'name' => 'College of Criminal Justice Education',
        		'code' => 'CCJE'
        	],
        	[
        		'name' => 'College of Public Administration and Governance',
        		'code' => 'CPAG'
        	],
        	[
        		'name' => 'College of Education',
        		'code' => 'CoE'
        	],
        	[
        		'name' => 'College of Science',
        		'code' => 'CoS'
        	],
        	[
        		'name' => 'College of Architecture and Fine Arts',
        		'code' => 'CAFA'
        	]
        ]);
    }
}
