<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('tags.index', [
      'tags' => Tag::orderBy('name')->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('tags.create', [
        'posts' => Post::orderBy('title')->get(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Tag::create([
      'name' => request('name')
    ])->posts()->attach('posts');

    return redirect(route('tags.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Tag $tag)
  {
    return view('tags.show', compact('tag'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Tag $tag)
  {
    $posts = Post::orderBy('title')->get();
    return view('tags.edit', compact('tag', 'posts'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Tag $tag)
  {
    $tag->update([
      'name' => request('name')
    ]);

    return redirect(route('tags.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tag $tag)
  {
    $tag->delete();

    return redirect(route('tags.index'));
  }
}
