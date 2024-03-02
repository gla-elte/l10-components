<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostResource;
use App\Http\Requests\V1\StorePostRequest;
use App\Http\Requests\V1\UpdatePostRequest;

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

    public function store(StorePostRequest $request)
    {
    $post = DB::transaction(function () use ($request) {
        $post = Post::create($request->safe()->only(['title', 'slug', 'body', 'category_id', 'published_at']));

        Rating::create([
        'score' => $request->score,
        'post_id' => $post->id,
        ]);

        $post->tags()->attach($request->tags);

        return $post;
    });

    return PostResource::make($post);
    }

  public function update(Post $post, UpdatePostRequest $request)
  {
    $post = DB::transaction(function () use ($post, $request) {
      $post->update($request->safe()->only(['title', 'slug', 'body', 'category_id', 'published_at']));

      if(isset($request->tags))
      {
        $post->tags()->sync($request->tags);
      }
      if(isset($request->score))
      {
        Rating::where('post_id', $post->id)->update(['score' => $request->score]);
      }
      return $post;
    });

    return PostResource::make($post);
  }

  public function destroy(Post $post)
  {
    $post->delete();

    return response()->json([
      'message' => 'Post deleted'
    ], Response::HTTP_OK);
  }
}
