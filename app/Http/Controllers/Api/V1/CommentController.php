<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CommentResource;

class CommentController extends Controller
{
  public function index()
  {
    return CommentResource::collection(Comment::all());
  }

  public function show(Comment $comment)
  {
    return CommentResource::make($comment);
  }

  public function store()
  {
    return CommentResource::make(
      Comment::create(
        request()->all()
      )
    );
  }

  public function update(Comment $comment)
  {
    $comment->update(request()->all());

    return response()->json([
      'data' => CommentResource::make($comment),
      'message' => 'Comment updated'
    ], Response::HTTP_OK);
  }

  public function destroy(Comment $comment)
  {
    $comment->delete();

    return response()->json([
      'message' => 'Comment deleted'
    ], Response::HTTP_OK);
  }
}
