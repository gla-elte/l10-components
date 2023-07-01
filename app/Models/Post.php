<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// importálás az osztály előtt:
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
  // tényleges használat az osztályon belül:
  use HasFactory, SoftDeletes;

  protected $fillable = ['title', 'slug', 'body', 'published_at', 'rating_id', 'category_id'];
  // protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

  //   public function rating()
  //   {
  //     return $this->hasOne(Rating::class);
  //   }


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
}
