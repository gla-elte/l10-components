<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Comment;
use Illuminate\Http\Request;
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
}
