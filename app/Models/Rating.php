<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  use HasFactory;

  protected $fillable = ['score', 'post_id'];

//   public function post()
//   {
//     return $this->hasOne(Post::class);
//   }
}
