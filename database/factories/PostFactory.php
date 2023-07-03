<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => fake()->sentence(1),
      'slug' => fake()->slug(2),
      'body' => fake()->paragraph(3),
      'published_at' => fake()->dateTimeThisMonth(), // https://fakerphp.github.io/formatters/date-and-time/
      'category_id' => Category::inRandomOrder()->first()->id,
    ];
  }

  /**
   * Configure the model factory.
   *
   * @return $this
   */
  public function configure()
  {
    return $this->afterMaking(function (Post $post) {
      Rating::factory()->make(['post_id' => $post->id]);
    })->afterCreating(function (Post $post) {
      Rating::factory()->create(['post_id' => $post->id]);
    });
  }
}
