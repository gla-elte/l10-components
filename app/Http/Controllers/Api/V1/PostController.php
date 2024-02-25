<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    return PostResource::collection(Post::all());
  }

  public function show(Post $post)
  {
    return PostResource::make($post);
  }
}
