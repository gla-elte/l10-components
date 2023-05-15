<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $tags = Tag::factory(20)->create();

    Post::factory(10)->create()
      ->each(function ($post) use ($tags) {
        $post->tags()->sync($tags->random(2));
      });
  }
}
