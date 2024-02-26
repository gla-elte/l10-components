<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;

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

  public function store()
  {
    return PostResource::make(
      Post::create(
        request()->all()
      )
    );
  }

  public function update(Post $post)
  {
    $post->update(request()->all());

    return response()->json([
      'data' => PostResource::make($post),
      'message' => 'Post updated'
    ], Response::HTTP_OK);
  }

  public function destroy(Post $post)
  {
    $post->delete();

    return response()->json([
      'message' => 'Post deleted'
    ], Response::HTTP_OK);
  }
}
