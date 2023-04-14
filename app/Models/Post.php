<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// importálás az osztály előtt:
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // tényleges használat az osztályon belül:
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'body', 'published_at'];
    // protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
}
