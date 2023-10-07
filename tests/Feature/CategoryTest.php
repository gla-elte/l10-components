<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
  use RefreshDatabase;

  public function test_category_index_contains_non_empty_table()
  {
    $category = Category::create([
      'name' => 'Category 1',
    ]);
    $response = $this->get(route('categories.index'));
    $response->assertStatus(200);
    $response->assertSee('Category 1');
    $response->assertViewHas('categories', function ($collection) use ($category) {
      return $collection->contains($category);
    });
  }
}
