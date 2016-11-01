<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditStudentForAdminTest extends TestCase
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

    public function editStudent()
    {
        $this->visit('/admin/managestudents')
            ->press('Edit')
            ->see('Edit Student Info')
            ->onPage('admin/managestudents/$student->studentID/edit');
    }

    public function studentInformation()
    {
        $this->visit('/admin/managestudents')
            ->press('Edit')
            ->see('Edit Student Info')
            ->onPage('admin/managestudents/$student->studentID/edit');
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
