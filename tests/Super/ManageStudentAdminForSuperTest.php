<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManageStudentAdminForSuperTest extends TestCase
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
     * A test to add Studen Admin (button)
     *
     * @return void
     */
    public function addStudentAdmin()
    {
        $this->visit('/super/managestudentadmin')
            ->press('AddAdmin')
            ->see('Add Student Admin')
            ->onPage('/super/managestudentadmin/create');
    }

    /**
     * Page Test(Frontend)
     * A test to edit Studen Admin (button)
     *
     * @return void
     */
    public function editStudentAdmin()
    {
        $this->visit('/super/managestudentadmin')
            ->press('editAdmin')
            ->see('Add Student Admin')
            ->onPage('/super/managestudentadmin/$user->username/edit');
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to add Studen Admin (Controller)
     * Condition: Student exists
     * @return void
     */
    public function addStudentAdminSuccess()
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
            'username' => 'admin',
            'password' => bcrypt('123456'),
            '_token' => csrf_token()
        ]);

        Post::shouldReceive('store')->once();
        $this->call('POST','super/managestudentadmin/create');
        $this->assertRedirectedToRoute('super/managestudentadmin');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('login', $response->original->name());
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to add Student Admin (Controller)
     * Condition: Student Admin exists or Student Admin not empty
     * @return void
     */
    public function addStudentAdminFail()
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
        Post::shouldReceive('store')->once();
        $this->assertRedirectedToRoute('super/managestudentadmin');
        $this->assertSessionHasErrors();
    }

    /**
     * Page Test
     * SUCCESS TEST
     * A test to edit Student Admin (Controller)
     * Condition: Student Admin not exists or empty
     * @return void
     */
    public function editStudentAdminSuccess()
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
            'username' => 'admin',
            'password' => bcrypt('123456'),
            '_token' => csrf_token()
        ]);

        Post::shouldReceive('update')->once();
        $this->call('POST','super/managestudentadmin/$user->username/edit');
        $this->assertRedirectedToRoute('super/managestudentadmin');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('login', $response->original->name());
    }

    /**
     * Page Test
     * FAIL TEST
     * A test to edit Student Admin (Controller)
     * Condition: Student Admin exists or empty
     * @return void
     */
    public function editStudentAdminFail()
    {
        $user = factory(App\User::class)->create([
            'permissionLevel' => '3',
            'password' => bcrypt('123456'),
        ]);

        Input::replace(
        $input =
        [
            'username'=>'',
            'password'=>''
        ]);
        Post::shouldReceive('update')->once();
        $this->assertRedirectedToRoute('super/managestudentadmin');
        $this->assertSessionHasErrors();
    }

    //To Do: Delete Student Admin

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
