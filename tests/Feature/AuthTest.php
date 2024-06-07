<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
  use RefreshDatabase;
  public function test_login_redirects_to_home_page(): void
  {
    $user = User::factory([
      'name' => 'Attila',
      'email' => 'attila@example.com'
    ])->create();

    $response = $this->post('/login', [
      'email' => $user->email,
      'password' => 'password'
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/');
  }
}
