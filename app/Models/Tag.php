<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

  public function posts()
  {
    return $this->belongsToMany(Post::class)->withTimestamps();
  }

  public function numberOfPosts() : int {
    return DB::table('posts')
      ->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
      ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
      ->where('tags.id', $this->id)
      ->count();
  }
}
