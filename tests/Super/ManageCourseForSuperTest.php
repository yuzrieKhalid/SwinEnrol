<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageCourseForSuperTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
        Artisan::call('migrate:rollback');
    }

    /**
     * Page Test
     * A test to add Course (Frontend-button)
     *
     * @return void
     */
    public function addCourses()
    {
        $this->visit('/super/managecourse/create')
            ->press('Add Course')
            ->see('Create New Unit')
            ->onPage('/super/managecourse/create');
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to add Course (Controller)
     * Condition: Course exists
     * @return void
     */
    public function addCoursesSuccess()
    {
        //$course = factory(App\Course::class)->create();
        Input::replace(
        $input =
        [
            'courseName'=>'Bachelor of Computer Science',
            'courseCode'=>'I047',
            'semestersPerYear'=>'2',
            'semesterCount'=>'6',
            'studyLevel'=>'2'
        ]);
        Post::shouldReceive('create')->once();
        $this->call('POST','super/managecourse/create');
        $this->assertRedirectedToRoute('super/managecourse/create');
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to add Course (Controller)
     * Condition: Coordinator exists or Empty
     * @return void
     */
    public function addCoursesFail()
    {
        Input::replace(
        $input =
        [
            'courseName'=>'',
            'courseCode'=>'',
            'semestersPerYear'=>'',
            'semesterCount'=>'',
            'studyLevel'=>''
        ]);
        Post::shouldReceive('create')->once();
        $this->assertRedirectedToRoute('super/managecourse/create');
        $this->assertSessionHasErrors();
    }

    /**
     * Page Test(Frontend)
     * A test to edit Course (button)
     * @return void
     */
    public function editCourses()
    {
        $this->visit('/super/managecourse')
            ->press('Edit')
            ->see('Update Course Information')
            ->onPage('/super/managecourse/$course->courseCode/edit');
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to edit Course (Controller)
     * Condition: Coordinator not exists
     * @return void
     */
    public function editCoursesSuccess()
    {
        $course = factory(App\Course::class)->create();
        Input::replace(
        $input =
        [
            'courseName'=>'Bachelor of Computer Science',
            'courseCode'=> $course->courseCode,
            'semestersPerYear'=>'2',
            'semesterCount'=>'6',
            'studyLevel'=>'2'
        ]);
        Post::shouldReceive('update')->once();
        $this->call('POST','super/managecourse/edit');
        $this->assertRedirectedToRoute('super/managecourse/create');
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to edit Course (Controller)
     * Condition: Coordinator exists or Empty
     * @return void
     */
    public function editCoursesFail()
    {
        Input::replace(
        $input =
        [
            'courseName'=>'',
            'courseCode'=>'',
            'semestersPerYear'=>'',
            'semesterCount'=>'',
            'studyLevel'=>''
        ]);
        Post::shouldReceive('update')->once();
        $this->assertRedirectedToRoute('super/managecourse/create');
        $this->assertSessionHasErrors();
    }

    /*TO DO: Delete button*/

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
