<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageStudentRemoveForAdminTest extends TestCase
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

    public function removeStudentFromStudentList()
    {
        $this->json('POST', 'admin/managestudents', [
            'studentID' => '4315405',
            'surname'=>'Haque',
            'givenName'=>'Sariful',
            'courseCode'=>'I047',
            'dateOfBirth'=>'26/12/1990',
        ])->json('DELETE', 'admin/managestudents')
        ->see('deleted')
        ->onPage('admin/managestudents');

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
