<?php

namespace Tests\Feature;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends TestCase
{
	use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function an_authenticated_user_can_create_roles() {
    	//Simulate an authenticated user
    	$this->signIn();

    	//if they try to create a role
    	$this->post('/roles/store', ['title' => 'some-random-role']);

    	//it should work.
    	$this->assertEquals(5, Role::count());
    }
}
