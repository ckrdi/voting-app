<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        // added with headers for readability
        $response = $this->withHeaders(['accept'=>'application/json'])->post('/register', [
            'name' => 'Test User',
            'username' => 'testusername',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_new_user_cannot_register_with_already_used_username()
    {
        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testusername',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->withHeaders(['accept'=>'application/json'])->post('/register', [
            'name' => 'Test User 2',
            'username' => 'testusername',
            'email' => 'test2@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
    }

    public function test_new_user_cannot_register_with_already_used_email()
    {
        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testusername',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->withHeaders(['accept'=>'application/json'])->post('/register', [
            'name' => 'Test User 2',
            'username' => 'testusername2',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
    }
}
