<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageUntTypeForSuperTest extends TestCase
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
     * Page Test(Frontend)
     * A test to add Unit Type (button)
     *
     * @return void
     */
    public function addUnitType()
    {
        $this->visit('/super/manageunittype')
            ->press('AddType')
            ->see('Manage Unit Types')
            ->onPage('/super/manageunittype/create');
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to add Unit Type (Controller)
     * Condition: Unit Type not exists or Empty
     * @return void
     */
    public function addUnitTypeSuccess()
    {
        //$course = factory(App\Course::class)->create();
        Input::replace(
        $input =['types'=>'Major']);
        Post::shouldReceive('create')->once();
        $this->call('POST','super/manageunittype/create');
        $this->assertRedirectedToRoute('super/managecourse');
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to add UnitType  (Controller)
     * Condition: UnitType not exists or empty
     * @return void
     */
    public function addUnitTypeFail()
    {
        //$course = factory(App\Course::class)->create();
        Input::replace(
        $input =['types'=>'']);
        Post::shouldReceive('create')->once();
        $this->assertRedirectedToRoute('super/managecourse');
        $this->assertSessionHasErrors();
    }

    /**
     * Page Test(Frontend)
     * A test to edit Studen (button)
     *
     * @return void
     */
    public function editUnitType()
    {
        $this->visit('/super/manageunittype')
            ->press('Edit')
            ->see('Manage Unit Types')
            ->onPage('/super/manageunittype/$type->unitType/edit');
    }

    public function editUnitTypeSuccess()
    {
        $type = factory(App\UnitType::class)->create();
        Input::replace(
        $input =['types'=> $type->unitType]);
        Post::shouldReceive('update')->once();
        $this->call('POST','super/manageunittype/edit');
        $this->assertRedirectedToRoute('super/manageunittype');
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to edit UnitType (Controller)
     * Condition: UnitType exists or empty
     * @return void
     */
    public function editUnitTypeFail()
    {
        $type = factory(App\UnitType::class)->create();
        Input::replace(
        $input =['types'=> '']);
        Post::shouldReceive('update')->once();
        $this->call('POST','super/manageunittype/edit');
        $this->assertRedirectedToRoute('super/manageunittype');
    }
    // Todo Delete UnitType

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
