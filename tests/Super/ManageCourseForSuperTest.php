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

    public function addCourses()
    {
        $this->visit('/super/managecourse/create')
            ->press('Add Course')
            ->see('Create New Unit')
            ->onPage('/super/managecourse/create');
    }

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

    public function editCourses()
    {
        $this->visit('/super/managecourse')
            ->press('Edit')
            ->see('Update Course Information')
            ->onPage('/super/managecourse/$course->courseCode/edit');
    }

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

    // public function removeCourseFromCourseList()
    // {
    //     $student = factory(App\Student::class)->create();
    //
    //     //$this->actingAs($user);
    //     $this->json('POST', 'admin/managestudents', [
    //         'studentID' => '4315405',
    //         'surname'=>'Haque',
    //         'givenName'=>'Sariful',
    //         'courseCode'=>'I047',
    //         'dateOfBirth'=>'26/12/1990',
    //     ])->json('DELETE', 'admin/managestudents')
    //     ->see('deleted');
    // }


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
