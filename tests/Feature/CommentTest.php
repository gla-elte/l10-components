<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_visitors_cannot_access_comments(): void
    {
      $response = $this->get('/comments');
      $response->assertStatus(302);
      $response->assertRedirect('login');
    }
}
