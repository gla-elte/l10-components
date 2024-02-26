<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
// importálás az osztály előtt:
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  // tényleges használat az osztályon belül:
  use HasFactory, SoftDeletes;

  protected $fillable = ['title', 'slug', 'body', 'published_at', 'category_id'];
  // protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

  protected $with = ['tags', 'comments'];

    public function rating()
    {
      return $this->hasOne(Rating::class);
    }


  protected function publishedAt(): Attribute
  {
    return Attribute::make(
        get: fn (string $value) => \Carbon\Carbon::parse($value)->format('Y-m-d H:i'),
    );
  }

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class)->withTimestamps();
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public static function getFilteredPosts($category, $from, $to = null)
  {
    if($to == null) $to = Carbon::tomorrow();

    return DB::table('posts')
      ->select('title', 'slug', 'body', 'published_at', 'name')
      ->join('categories', 'posts.category_id', 'categories.id')
      ->where('name', $category)
      ->whereBetween('published_at', [$from, $to])
      ->get();
  }

  public static function getPostsForSelectOptions()
  {
    return Post::orderBy('title')->get(['id', 'title'])->pluck('title', 'id');
  }
}
