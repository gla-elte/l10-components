<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Category;
use App\Rules\PostPublishedAt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
  public function store(Request $request)
  {
    $this->validatePost();

    DB::transaction(function () {
      $post = Post::create(request(['title', 'slug', 'body', 'category_id', 'published_at']));

      Rating::create([
        'score' => request('score'),
        'post_id' => $post->id,
      ]);

      $post->tags()->attach(request('tags'));
    });

    return redirect(route('posts.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    return view('posts.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    $categories = Category::orderBy('name')->get(['id', 'name'])->pluck('name', 'id');
    $tags = Tag::orderBy('name')->get(['id', 'name'])->pluck('name', 'id');
    return view('posts.edit', compact('post','categories', 'tags'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Post $post)
  {
    $this->validatePost();

    DB::transaction(function () use ($post) {
      $post->update(request(['title', 'slug', 'body', 'category_id', 'published_at']));

      $post->tags()->sync(request('tags'));

      Rating::where('post_id', $post->id)->update(['score' => request('score')]);
    });

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

  function validatePost() : array {
    return request()->validate([
      'title' => 'required|min:5|max:100',
      'slug' => 'required|max:255|regex:/^[a-z]+[-]{1}[a-z]+$/',
      'body' => 'required',
      'published_at' => ['required', new PostPublishedAt], // before_or_equal:today vagy before:tomorrow
      'score' => 'required|numeric|between:1.0,10.0',
      'category_id' => 'required|exists:categories,id',
      'tags' => 'required|exists:tags,id',
    ]);
  }
}
