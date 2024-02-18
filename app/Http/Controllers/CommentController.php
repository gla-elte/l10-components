<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUpdateCommentRequest;

class CommentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('comments.index', [
      'comments' => Comment::get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('comments.create', [
      'posts' => Post::getPostsForSelectOptions(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUpdateCommentRequest $request)
  {
    // Comment::create($this->validateComment());
    Comment::create($request->safe()->only(['username', 'content', 'post_id']));

    return redirect(route('comments.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Comment $comment)
  {
    return view('comments.show', compact('comment'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Comment $comment)
  {
    $posts = Post::getPostsForSelectOptions();
    return view('comments.edit', compact('comment', 'posts'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Comment $comment, StoreUpdateCommentRequest $request)
  {
    //   $validator = Validator::make(
    //     request()->all(),
    //     [
    //       'username' => 'required|max:255',
    //       'content' => 'required',
    //       'post_id' => 'required|exists:posts,id',
    //     ],
    //     [
    //       'post_id.exists' => 'Missing :attribute in posts table'
    //     ],
    //     [
    //       'post_id' => 'post identification'
    //     ]
    //   );

    //   if ($validator->fails()) {
    //     return redirect(route('comments.index'))
    //       ->withErrors($validator);
    //   }

    //   $comment->update(request()->all());
    $comment->update($request->safe()->only(['username', 'content', 'post_id']));
    return redirect(route('comments.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Comment $comment)
  {
    $comment->delete();

    return redirect(route('comments.index'));
  }

  function validateComment(): array
  {
    return request()->validate([
      'username' => 'required|max:255',
      'content' => 'required',
      'post_id' => 'required|exists:posts,id',
    ]);
  }
}
