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

    /**
     * Page Test
     * SUCCESS TEST
     * A test to show student Issues(Leave of Absence)
     * Condition: UnitType exists or empty
     * @return void
     */
    public function showIssues()
    {
        $this->visit('/admin/resolveissue/create')
            ->press('Show')
            ->see('Issues Information')
            ->onPage('/admin/resolveissue/create');
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
