<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApprovedIssuesForAdminTest extends TestCase
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
    
    public function seeIssuesStatus()
    {
        $this->visit('/admin/approvedissues/create')
            ->see('Edit Student Info');
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
