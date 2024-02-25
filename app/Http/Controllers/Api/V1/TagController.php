<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TagResource;
use App\Models\Tag;

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
}
