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
        $this->call(LoginTableSeeder::class);
        $this->call(EnrolmentDatesTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(UnitListingTableSeeder::class);
        $this->call(EnrolmentUnitsTableSeeder::class);
        $this->call(StudyPlannerTableSeeder::class);
        $this->call(InternalCourseTransferTableSeeder::class);
        $this->call(EnrolmentIssuesTableSeeder::class);
    }
}
