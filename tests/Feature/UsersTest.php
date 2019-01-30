<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Validation\ValidationException;

class UsersTest extends TestCase
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
    public function a_member_of_staff_can_register() {

    	$this->withExceptionHandling(); 

    	$role = create('App\Role');
    	$data = [
    		'firstname' => 'Olushola',
    		'lastname' => 'Karokatose',
    		'email' => 'shola@test.com',
    		'role_id' => $role->id,
    		'password' => 'qwerty',
    	];

    	$this->post('/register', $data)->assertStatus(302); 
    }
}
