<?php

use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->insert([
        	[
        		'name' => 'SF-01',
        		'alias' => 'RESEARCH CAPSULE PROPOSAL',
        		'filename' => 'SF-01.pdf'
        	],
        	[
        		'name' => 'SF-02',
        		'alias' => 'COLLEGE RESEARCH EVALUATION FORM (STEM)',
        		'filename' => 'SF-02.pdf'
        	],
        	[
        		'name' => 'SF-03',
        		'alias' => 'RESEARCHER’S PROFILE FORM',
        		'filename' => 'SF-03.pdf'
        	],
        	[
        		'name' => 'SF-05',
        		'alias' => 'UREC EVALUATION',
        		'filename' => 'SF-05.pdf'
        	],
        	[
        		'name' => 'SF-11',
        		'alias' => 'RESEARCH STATUS MONITORING FORM',
        		'filename' => 'SF-11.pdf'
        	],
        	[
        		'name' => 'SF-26',
        		'alias' => 'COLLEGE RESEARCH EVALUATION FORM (SOCSCI)',
        		'filename' => 'SF-26.pdf'
        	],
        	[
        		'name' => 'SF-29',
        		'alias' => 'NOTICE OF RESEARCH PROPOSAL DISAPPROVAL',
        		'filename' => 'SF-29.pdf'
        	],
        	[
        		'name' => 'SF-30',
        		'alias' => 'NOTICE TO PROCEED',
        		'filename' => 'SF-30.pdf'
        	],
        	[
        		'name' => 'SF-32',
        		'alias' => 'REVISED RESEARCH CAPSULE PROPOSAL',
        		'filename' => 'SF-32.pdf'
        	],
        	[
        		'name' => 'SF-33',
        		'alias' => 'CHECKLIST OF DOCUMENTS SUBMITTED BY THE FACULTY RESEARCHERS TO THE UNIVERSITY RESEARCH OFFICE THROUGH THE DEPARTMENT RESEARCH CHAIRPERSON',
        		'filename' => 'SF-33.pdf'
        	],
        	[
        		'name' => 'SF-34',
        		'alias' => 'CHECKLIST OF DOCUMENTS SUBMITTED BY THE DEPARTMENT RESEARCH CHAIRPERSON TO THE UNIVERSITY RESEARCH OFFICE',
        		'filename' => 'SF-34.pdf'
        	],
        	[
        		'name' => 'SF-36',
        		'alias' => 'SUMMARY OF EVALUATORS SUGGESTIONS AND RATINGS',
        		'filename' => 'SF-36.pdf'
        	],
        	[
        		'name' => 'SF-45',
        		'alias' => 'TURNITIN RUN REQUEST FORM',
        		'filename' => 'SF-45.pdf'
        	]
        ]);
    }
}
