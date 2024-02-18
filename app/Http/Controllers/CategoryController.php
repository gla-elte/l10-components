<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateCategoryRequest;

class CategoryController extends Controller
{
  public function index()
  {
    return view('categories.index', [
      'categories' => Category::orderBy('name')->get()
    ]);
  }

  public function show(Category $category)
  {
    return view('categories.show', compact('category'));
  }

  public function create()
  {
    return view('categories.create');
  }

  public function store(StoreUpdateCategoryRequest $request)
  {
    Category::create($request->safe()->only(['name']));
    return redirect(route('categories.index'));
  }

  public function edit(Category $category)
  {
    return view('categories.edit', compact('category'));
  }

  public function update(StoreUpdateCategoryRequest $request, Category $category)
  {
    $category->update($request->safe()->only(['name']));
    return redirect(route('categories.index'));
  }

  public function destroy(Category $category)
  {
    $category->delete();
    return redirect(route('categories.index'));
  }
}
