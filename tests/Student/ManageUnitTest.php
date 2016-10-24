<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageUnitTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A test to add unit during the enrolment
     * Condition: EnrolmentUnits has less than 4 records
     *
     * @return void
     */
    public function testAddUnitFromEmpty()
    {
        // Sample user - student
        // Sample data
        $this->visit('/student/manageunits/create');

        // dd($this);
    }

    // /**
    //  * A test to add unit during the enrolment
    //  * Condition: EnrolmentUnits has 4 records
    //  *
    //  * @return void
    //  */
    // public function testAddUnitWhenMaxCount()
    // {
    //     // Sample user - student
    //     $user = factory(App\User::class)->create();
    //     $student = factory(App\Student::class)->create();
    //
    //     // Sample data
    //
    //     $this->assertTrue(true);
    // }
}
