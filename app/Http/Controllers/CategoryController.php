<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect('admin/category')->with('message','Category Added Successfully...');
    }

    public function edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id){
        $category = Category::find($category_id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('admin/category')->with('message','Category Updated Successfully...');
    }

    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        $category->products()->delete();
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successfully...');
    }
}
