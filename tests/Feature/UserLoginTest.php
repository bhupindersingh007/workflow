<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can login with correct credentials.
     *
     * @return void
     */
    public function testUserCanLoginWithCorrectCredentials()
    {
        // Create a user with dummy email and password
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);


        // Make a POST request to the login endpoint with user's credentials
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Assert that the response is a redirect (successful login)
        $response->assertRedirectToRoute('dashboard');


        // Assert that the user is authenticated
        $this->assertAuthenticatedAs($user);
        
    }

    /**
     * Test user cannot login with incorrect credentials.
     *
     * @return void
     */
    public function testUserCannotLoginWithIncorrectCredentials()
    {
        // Create a user
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Make a POST request to the login endpoint with incorrect credentials
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        
        // Assert that the response is a redirect
        $response->assertStatus(302)->assertRedirectToRoute('home');


        // Assert that the user is not authenticated
        $this->assertGuest();
    }
}
