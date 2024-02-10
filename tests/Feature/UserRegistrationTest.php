<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can register with valid data.
     *
     * @return void
     */
    public function testUserCanRegisterWithValidData()
    {
        $userData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Make a POST request to the registration endpoint with user's data
        $response = $this->post('/register', $userData);

        // Assert that the response is a redirect (successful registration)
        $response->assertStatus(302);

        
        // Assert that the user is created in the database
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    /**
     * Test user cannot register with invalid data.
     *
     * @return void
     */
    public function testUserCannotRegisterWithInvalidData()
    {
        $userData = [
            // Missing first name
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Make a POST request to the registration endpoint with invalid user's data
        $response = $this->post('/register', $userData);

        // Assert that the response status is 302 (redirect, due to validation failure)
        $response->assertStatus(302);

        // Assert that the validation errors are present in the session
        $response->assertSessionHasErrors(['first_name']);

        // Assert that the user is not created in the database
        $this->assertDatabaseMissing('users', [
            'email' => 'john@example.com',
        ]);
    }
}
