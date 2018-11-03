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
        DB::table('colleges')->insert(
        	[
        		'name' => 'College of Computer Studies'
        	],
        	[
        		'name' => 'College of Arts and Social Sciences'
        	],
        	[
        		'name' => 'College of Business and Accountancy'
        	],
        	[
        		'name' => 'College of Engineering and Technology'
        	],
        	[
        		'name' => 'College of Criminal Justice Education'
        	],
        	[
        		'name' => 'College of Public Administration and Governance'
        	],
        	[
        		'name' => 'College of Education'
        	],
        	[
        		'name' => 'College of Science'
        	],
        	[
        		'name' => 'College of Architecture and Fine Arts'
        	]
        );
    }
}
