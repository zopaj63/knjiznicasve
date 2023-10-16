<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        // Database insert
        $user = User::factory()->create([
            'email' => 'testich@example.com',
            'password' => bcrypt('pass'),
        ]);

        // Login check
        $response = $this->post('/login', [
            'email' => 'testich@example.com',
            'password' => 'pass',
        ]);

        // After login check page
        $response->assertRedirect($uri = '/dashboard');
        // Check if user is still authenticated
        $this->assertAuthenticatedAs($user);
    }
}
