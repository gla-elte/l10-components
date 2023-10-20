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
    $response = $this->get('/categories');
    $response->assertStatus(200);
    $response->assertSee('Category 1');
    $response->assertViewHas('categories', function ($collection) use ($category) {
      return $collection->contains($category);
    });
  }

  public function test_show_category_successful()
  {
    // Arrange
    $category = Category::create([
      'name' => 'Category 1',
    ]);

    // Act
    $response = $this->get('/categories/' . $category->id);

    // Assert
    $response->assertStatus(200);
    $response->assertSee('Category 1');
    $response->assertViewHas('category', function ($cat) {
      return $cat->name === 'Category 1';
    });
  }

  public function test_visitor_can_access_category_create_page()
  {
    $response = $this->get('/categories/create');
    $response->assertStatus(200);
  }

  public function test_create_category_successful(): void
  {
    $category = [
      'name' => 'Category 123',
    ];

    $response = $this->post('/categories', $category);

    $response->assertStatus(302);
    $response->assertRedirect('categories');

    $this->assertDatabaseHas('categories', $category);

    $lastCategory = Category::latest()->first();
    $this->assertEquals($category['name'], $lastCategory->name);
  }

  public function test_category_edit_with_correct_value(): void
  {
    $category = Category::factory()->create();

    $response = $this->get('/categories/' . $category->id . '/edit');

    $response->assertStatus(200);
    $response->assertSee('value="' . $category->name . '"', false);

    $response->assertViewHas('category', $category);
  }

  public function test_update_category_successful()
  {
    $category = Category::factory()->create();

    $category->name = 'Updated Name';

    $response = $this->put('categories/' . $category->id, $category->toArray());
    $this->assertDatabaseHas('categories', [
      'id' => $category->id,
      'name' => 'Updated Name'
    ]);
  }

  public function test_category_delete_successful()
  {
    $category = Category::factory()->create();

    $response = $this->delete('categories/' . $category->id);

    $response->assertStatus(302);
    $response->assertRedirect('categories');

    $this->assertDatabaseMissing('categories', $category->toArray());
    $this->assertDatabaseCount('categories', 0);
  }

  function test_category_update_validation_error_redirects_back_to_form()
  {
    $category = Category::factory()->create();

    $category->name = '';

    $response = $this->put('categories/' . $category->id, $category->toArray());

    $response->assertStatus(302); // redirect back to the form
    $response->assertSessionHasErrors(['name']);
  }

  function test_categories_page()
  {
    $response = $this->get('/categories');

    $response->assertSee('Categories');
    $response->assertDontSee('CATEGORIES');
  }
}
