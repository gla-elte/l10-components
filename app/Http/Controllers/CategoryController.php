<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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

  public function store()
  {
    Category::create($this->validateCategory());
    return redirect(route('categories.index'));
  }

  public function edit(Category $category)
  {
    return view('categories.edit', compact('category'));
  }

  public function update(Category $category)
  {
    $category->update($this->validateCategory());
    return redirect(route('categories.index'));
  }

  public function destroy(Category $category)
  {
    $category->delete();
    return redirect(route('categories.index'));
  }

  function validateCategory() : array {
    return request()->validate([
      'name' => 'required|max:255|unique:categories',
    ], [
      'required' => 'The Category\'s name is required.',
      'max' => 'The Category\'s name could be maximum :max characters.',
      'unique' => 'The Category\'s name must be unique in categories table.',
    ]);
  }
}
