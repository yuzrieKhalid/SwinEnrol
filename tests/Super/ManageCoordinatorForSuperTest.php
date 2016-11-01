<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageCoordinatorForSuperTest extends TestCase
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
     * A test to add Coordinator (Frontend-button)
     *
     * @return void
     */
    public function addCoordinator()
    {
        $this->visit('/super/managecoordinator')
            ->press('AddCor')
            ->see('Add Coordinator')
            ->onPage('/super/managecoordinator/create');
    }

    /**
     * Page Test
     * A test to edit Coordinator (Frontend-button)
     *
     * @return void
     */
    public function editCoordinator()
    {
        $this->visit('/super/managecoordinator')
            ->press('editCor')
            ->see('Add Coordinator')
            ->onPage('/super/managecoordinator/$user->username/edit');
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to add Coordinator (Controller)
     * Condition: Coordinator exists
     * @return void
     */
    public function addCoordinatorSuccess()
    {
        $user = factory(App\User::class)->create([
            'permissionLevel' => '2',
            'password' => bcrypt('123456'),
        ]);

        Input::replace(
        $input =
        [
            'username'=>'coordinator',
            'password'=>bcrypt('123456')
        ]);

        Session::start();
        $response = $this->call('POST', '/login', [
            'username' => 'coordinator',
            'password' => bcrypt('123456'),
            '_token' => csrf_token()
        ]);

        Post::shouldReceive('store')->once();
        $this->call('POST','super/managecoordinator/create');
        $this->assertRedirectedToRoute('super/managecoordinator');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('login', $response->original->name());
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to add Coordinator (Controller)
     * Condition: Coordinator exists or Coordinator empty
     * @return void
     */
    public function addCoordinatorFail()
    {
        $user = factory(App\User::class)->create([
            'permissionLevel' => '2',
            'password' => bcrypt('123456'),
        ]);

        Input::replace(
        $input =
        [
            'username'=>'coordinator',
            'password'=>bcrypt('123456')
        ]);
        Post::shouldReceive('store')->once();
        $this->assertRedirectedToRoute('super/managecoordinator');
        $this->assertSessionHasErrors();
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to edit Coordinator (Controller)
     * Condition: Coordinator exists
     * @return void
     */
    public function editCoordinatorSuccess()
    {
        $user = factory(App\User::class)->create([
            'permissionLevel' => '3',
            'password' => bcrypt('123456'),
        ]);

        Input::replace(
        $input =
        [
            'username'=>'admin',
            'password'=>bcrypt('123456')
        ]);

        Session::start();
        $response = $this->call('POST', '/login', [
            'username' => 'coordinatpr',
            'password' => bcrypt('123456'),
            '_token' => csrf_token()
        ]);
        Post::shouldReceive('update')->once();
        $this->call('POST','super/managecoordinator/$user->username/edit');
        $this->assertRedirectedToRoute('super/managecoordinator');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('login', $response->original->name());
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to edit Coordinator (Controller)
     * Condition: Coordinator exists or Coordinator empty
     * @return void
     */
    public function editCoordinatorFail()
    {
        $user = factory(App\User::class)->create([
            'permissionLevel' => '2',
            'password' => bcrypt('123456'),
        ]);

        Input::replace(
        $input =
        [
            'username'=>'',
            'password'=>''
        ]);
        Post::shouldReceive('update')->once();
        $this->assertRedirectedToRoute('super/managecoordinator');
        $this->assertSessionHasErrors();
    }

    //To Do: Delete coordinator

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
