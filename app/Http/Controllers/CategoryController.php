<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('admin/category')->with('message', 'Category added successfully.');
    }

    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('admin/category')->with('message', 'Category updated successfully.');
    }

    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->products()->delete();
        $category->delete();
        return redirect()->back()->with('message', 'Category deleted successfully.');
    }
}
