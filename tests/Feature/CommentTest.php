<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   */
  public function test_visitors_cannot_access_comments(): void
  {
    $response = $this->get('/comments');
    $response->assertStatus(403);
  }

  public function test_admin_user_can_access_comments()
  {
    $admin = User::factory()->create(['isAdmin' => 1]);

    $response = $this->actingAs($admin)->get('comments');
    $response->assertStatus(200);
  }
}
