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
        // swinenrol
        $this->call(UsersTableSeeder::class);
        $this->call(EnrolmentDatesTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(UnitTypeTableSeeder::class);
        $this->call(EnrolmentIssuesTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(RequisiteTableSeeder::class);
        $this->call(StudentEnrolmentIssuesTableSeeder::class);
        $this->call(EnrolmentUnitsTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        $this->call(UnitListingTableSeeder::class);
        $this->call(StudyPlannerTableSeeder::class);
        $this->call(GraduationRequirementsTableSeeder::class);
        $this->call(CourseCoordinatorTableSeeder::class);

        // eduversal
        $this->call(StudentRecordsSeeder::class);
        $this->call(ExamUnitsSeeder::class);
    }
}
