<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TagResource;

class TagController extends Controller
{
  public function index()
  {
    return TagResource::collection(Tag::all());
  }

  public function show(Tag $tag)
  {
    return TagResource::make($tag);
  }

  public function store()
  {
    return TagResource::make(
      Tag::create(
        request()->all()
      )
    );
  }

  public function update(Tag $tag)
  {
    $tag->update(request()->all());

    return response()->json([
      'data' => TagResource::make($tag),
      'message' => 'Tag updated'
    ], Response::HTTP_OK);
  }

  public function destroy(Tag $tag)
  {
    $tag->delete();

    return response()->json([
      'message' => 'Tag deleted'
    ], Response::HTTP_OK);
  }
}
