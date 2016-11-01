<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageStudentForAdminTest extends TestCase
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

    public function addStudent()
    {
        $this->visit('/admin')
            ->press('Add Student')
            ->see('Add a Student')
            ->onPage('admin');
    }

    public function addStudentSuccess()
    {
        Input::replace(
        $input =
        [
            'studentID'=>'4315405',
            'surname'=>'Haque',
            'givenName'=>'Sariful',
            'courseCode'=>'I047',
            'dateOfBirth'=>'26/12/1990',
            'semester'=>'Semester 1'
        ]);
        Post::shouldReceive('create')->once();
        $this->call('POST','admin/managestudents');
        $this->assertRedirectedToRoute('admin/managestudents');
    }

    public function addStudentFails()
    {
        Input::replace($input = ['studentID'=>'',
        'surname'=>'',
        'givenName'=>'',
        'courseCode'=>'',
        'dateOfBirth'=>'',
        'semester'=>'']);
        Post::shouldReceive('create')->once();
        $this->assertRedirectedToRoute('admin/managestudents');
        $this->assertSessionHasErrors();
    }

    public function updateStudentFails()
    {
        Input::replace($input = ['studentID'=>'',
        'surname'=>'',
        'givenName'=>'',
        'courseCode'=>'',
        'dateOfBirth'=>'',
        'semester'=>'']);
        Post::shouldReceive('update')->once();
        $this->assertRedirectedToRoute('admin/managestudents');
        $this->assertSessionHasErrors();
    }

    public function updateStudentSuccess()
    {
        Input::replace(
        $input =
        [
            'studentID'=>'4315405',
            'surname'=>'Haque',
            'givenName'=>'Sariful',
            'courseCode'=>'I047',
            'dateOfBirth'=>'26/12/1990',
            'semester'=>'Semester 1'
        ]);
        Post::shouldReceive('update')->once();
        $this->call('POST','admin/managestudents/update');
        $this->assertRedirectedToRoute('admin/managestudents');
    }


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
