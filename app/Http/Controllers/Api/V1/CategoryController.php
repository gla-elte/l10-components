<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoryResource;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::query();

    if( request('includePosts') )
    {
      $categories = $categories->with('posts');
    }

    return CategoryResource::collection($categories->paginate());
  }

  public function show(Category $category)
  {
    if( request('includePosts') )
    {
      return CategoryResource::make($category->loadMissing('posts'));
    }
    return CategoryResource::make($category);
  }

  public function store()
  {
    return CategoryResource::make(
      Category::create(
        request()->all()
      )
    );
  }

  public function update(Category $category)
  {
    $category->update([
      'name' => request('name')
    ]);

    return response()->json([
      'data' => CategoryResource::make($category),
      'message' => 'Category updated'
    ], Response::HTTP_OK);
  }

  public function destroy(Category $category)
  {
    $category->delete();

    return response()->json([
      'message' => 'Category deleted'
    ], Response::HTTP_OK);
  }
}
