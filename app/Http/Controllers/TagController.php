<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        'posts' => Post::getPostsForSelectOptions(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $this->validateTag();

    Tag::create([
      'name' => request('name')
    ])->posts()->attach(request('posts'));

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
    $posts = Post::getPostsForSelectOptions();
    return view('tags.edit', compact('tag', 'posts'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Tag $tag)
  {
    $this->validateTag();

    DB::transaction(function () use ($tag) {
      $tag->update(request(['name']));

      $tag->posts()->sync(request('posts'));
    });

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

  function validateTag() : array {
    return request()->validate([
      'name' => 'required|max:255|unique:tags',
      'posts' => 'required|exists:posts,id',
    ]);
  }
}
