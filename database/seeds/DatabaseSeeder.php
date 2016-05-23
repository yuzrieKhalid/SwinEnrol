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
        $this->call(EnrolmentDatesTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(UnitTypeTableSeeder::class);
        $this->call(EnrolmentIssuesTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(UnitTermTableSeeder::class);
        $this->call(InternalCourseTransferTableSeeder::class);
        $this->call(StudentEnrolmentIssuesTableSeeder::class);
        $this->call(EnrolmentUnitsTableSeeder::class);
    }
}
