<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        $product = new Product;
        $product->id = $request->id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->price = $request->price;


        if($request->hasFile("images"))
        {
            $files = $request->file("images");
            foreach($files as $file){
                $imagename = time() . '_' . $file->getClientOriginalName();
                $request['product_id']=$product->id;
                $request['image']=$imagename;
                $file->move(public_path('images/products'), $imagename);
                Image::create($request->all());
            }
        }

        $product->category()->associate($category);
        $product->save();

        return redirect('admin/products')->with('message', 'Product added successfully.');
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function edit($product_id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $category = Category::findOrFail($request->category_id);

        $product->name = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->price = $request->price;

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $fileName);

            // Delete old image if it exists
            if ($product->image) {
                $oldImagePath = public_path('images/products/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $product->image = $fileName;
        }

        $product->category()->associate($category);
        $product->save();

        return redirect('admin/products')->with('message', 'Product updated successfully.');
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id);

        // Delete product image if it exists
        if ($product->image) {
            $imagePath = public_path('images/products/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully.');
    }
}
