<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResolveEnrollmentIssuesForAdminTest extends TestCase
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

    public function showIssues()
    {
        $this->visit('/admin/resolveissue/create')
            ->press('Show')
            ->see('Issues Information')
            ->onPage('/admin/resolveissue/create');
    }

    // public function testApproved()
    // {
    //     $this->visit('/admin/resolveissue/create')
    //         ->press('Approved')
    //         ->onPage('/admin/resolveissue/create');
    // }
    //
    // public function testDisapproved()
    // {
    //     $this->visit('/admin/resolveissue/create')
    //         ->press('Disapproved')
    //         ->onPage('/admin/resolveissue/create');
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
