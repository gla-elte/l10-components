<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
  {
    //   $categories = Category::get(); // Adatbázis lekérdezés: SELECT * FROM categories;
    //   $categories = Category::take(10)->get(); // SELECT * FROM categories LIMIT 10;
    //   $categories = Category::where('created_at', '>=', now()->subMonth()->startOfMonth())->get(); // SELECT * FROM categories WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH);
    //   $categories = Category::paginate(5); // lapozhatóság: 5 kategória egy lapon
    //   $categories = Category::latest('created_at')->get(); // SELECT * FROM categories ORDER BY created_at DESC;
    //   return $categories;

    return view('categories.index', [
      'categories' => Category::orderBy('name')->get()
    ]);
  }

  public function show($id)
  {
    $category = Category::findOrFail($id);
    return view('categories.show', compact('category'));
  }

  public function create()
  {
    return view('categories.create');
  }

  public function store()
  {
    // dd(request()->all());
    Category::create([
      'name' => request('name')
    ]);

    return redirect('categories');
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return view('categories.edit', compact('category'));
  }

  public function update($id)
  {
    $category = Category::findOrFail($id);
    $category->update([
      'name' => request('name')
    ]);

    return redirect('categories');
  }

  public function destroy($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect('categories');
  }
}
