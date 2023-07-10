<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

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
      'categories' => Category::orderBy('name')->get(),
      'tags' => Tag::orderBy('name')->get(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $post = Post::create([
      'title' => request('title'),
      'slug' => request('slug'),
      'body' => request('body'),
      'category_id' => request('category_id'),
      'published_at' => request('published_at'),
    ]);

    Rating::create([
      'score' => request('score'),
      'post_id' => $post->id,
    ]);

    $post->tags()->attach(request('tags'));

    return redirect(route('posts.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    //$score = Rating::find($post->rating_id)->score;
    return view('posts.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    $categories = Category::orderBy('name')->get();
    $tags = Tag::orderBy('name')->get();
    return view('posts.edit', compact('post','categories', 'tags'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Post $post)
  {
    $post->update([
      'title' => request('title'),
      'slug' => request('slug'),
      'body' => request('body'),
      'category_id' => request('category_id'),
      'published_at' => request('published_at'),
    ]);

    $post->tags()->sync(request('tags'));

    Rating::where('post_id', $post->id)->update(['score' => request('score')]);

    return redirect(route('posts.index'));
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
