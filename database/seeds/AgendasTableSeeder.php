<?php

use Illuminate\Database\Seeder;

class AgendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendas')->insert([
        	[
        		'title' => 'Environment and Climate Change Mitigation'
        	],
        	[
        		'title' => 'Foods, Natural Products and Health Research'
        	],
        	[
        		'title' => 'Industry, Energy, and Emerging Technologies'
        	],
        	[
        		'title' => 'Sustainability Technology'
        	],
        	[
        		'title' => 'Public Policy and Social Praxis'
        	],
        	[
        		'title' => 'Design and Validation of Software'
        	],
        	[
        		'title' => 'Gender and Development Studies'
        	]
        ]);
    }
}
