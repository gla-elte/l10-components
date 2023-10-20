<?php

namespace Tests\Browser;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagTest extends DuskTestCase
{
  use DatabaseMigrations;

  public function test_a_visitor_can_update_a_tag()
  {
    Category::factory()->create();
    Post::factory(8)->create();

    $tag = Tag::factory()->create();
    $tag->posts()->sync([1,3,5]);

    $this->browse(function (Browser $browser) {
      $browser->visit('/tags/1/edit')
        ->type('name', 'new tag name')
        ->select('posts[]', [4, 6])
        ->click('input[type="submit"]')
        ->assertSee('new tag name')
        ->assertSee('2');
    });
  }
}
