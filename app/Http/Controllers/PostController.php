<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Rating;
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
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rating_id = Rating::create(['score' => request('score')])->id;

    Post::create([
      'title' => request('title'),
      'slug' => request('slug'),
      'body' => request('body'),
      'category_id' => request('category_id'),
      'published_at' => request('published_at'),
      'rating_id' => $rating_id,
    ]);

    return redirect('/posts');
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    $score = Rating::find($post->rating_id)->score;
    return view('posts.show', compact('post','score'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
