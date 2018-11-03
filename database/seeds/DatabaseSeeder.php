<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AgendasTableSeeder::class);
        $this->call(CollegesTableSeeder::class);
        $this->call(CollegeDepartmentsTableSeeder::class);
        $this->call(CollegeClerkAssignmentsTableSeeder::class);
        $this->call(DrcAssignmentsTableSeeder::class);
        $this->call(FrcAssignmentsTableSeeder::class);
    }
}
