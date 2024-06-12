<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Category;
use App\Rules\PostPublishedAt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('posts.index', [
      'posts' => Post::orderBy('published_at', 'desc')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('posts.create', [
      'categories' => Category::orderBy('name')->get(['id', 'name'])->pluck('name', 'id'),
      'tags' => Tag::orderBy('name')->get(['id', 'name'])->pluck('name', 'id'),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePostRequest $request)
  {
    DB::transaction(function () use ($request) {
      $post = Post::create($request->safe()->only(['title', 'slug', 'body', 'category_id', 'published_at']));

      Rating::create([
        'score' => $request->score,
        'post_id' => $post->id,
      ]);

      $post->tags()->attach($request->tags);
    });

    return redirect(route('posts.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    //abort_if($post->owner_id !== auth()->id(), 403);
    //abort_if(!auth()->user()->owns($post), 403);
    abort_unless(auth()->user()->owns($post), 403);

    return view('posts.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    $categories = Category::orderBy('name')->get(['id', 'name'])->pluck('name', 'id');
    $tags = Tag::orderBy('name')->get(['id', 'name'])->pluck('name', 'id');
    return view('posts.edit', compact('post', 'categories', 'tags'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePostRequest $request, Post $post)
  {
    $response = Gate::inspect('update-post', $post);

    if ($response->allowed()) {
      DB::transaction(function () use ($post, $request) {
        $post->update($request->safe()->only(['title', 'slug', 'body', 'category_id', 'published_at']));

        $post->tags()->sync($request->tags);

        Rating::where('post_id', $post->id)->update(['score' => $request->score]);
      });

      return redirect(route('posts.index'));
    }
    else {
      echo $response->message();
    }
    // abort(403);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    $post->delete(); // $post->forceDelete(); // ==> ennek használata esetén a kapcsolatok is törlődnek

    $post->tags()->sync([]); // $post->tags()->detach($post->tags);

    return redirect(route('posts.index'));
  }

  public function getCategorysPostsFromTo($category, $from, $to = null)
  {
    return Post::getFilteredPosts($category, $from, $to);
  }
}
