<?php

namespace Tests\Browser;

use App\Models\Tag;
use Tests\DuskTestCase;
use App\Models\Category;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends DuskTestCase
{
  use DatabaseMigrations;

  public function test_a_visitor_can_create_posts()
  {
    Category::factory()->create();
    Tag::factory()->create();

    $this->browse(function (Browser $browser) {
      $browser->visit('/posts/create')
        ->type('title', 'My new title')
        ->type('slug', 'my-title')
        ->type('body', 'Content of my new post.')
        ->select('category_id', 1)
        ->type('score', 9.9)
        ->keys('#published_at', '2023', '{tab}', '10', '20', '16', '30')
        ->select('tags[]', 1)
        ->scrollIntoView('#tags')
        ->click('@save-button')
        ->assertSee('My new title')
        ->assertSee('1')
        ->assertSee('0');
    });
  }
}
