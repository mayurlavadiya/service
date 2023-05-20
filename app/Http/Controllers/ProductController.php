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
        return view('admin.products.index')->with('products', $products);
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
        $product->name = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->price = $request->price;
        $product->category()->associate($category);
        $product->save();

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/products'), $imageName);
                Image::create([
                    'product_id' => $product->id,
                    'image' => $imageName
                ]);
            }
        }

        return redirect('admin/products')->with('message', 'Product added successfully.');
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
        $product->category()->associate($category);
        $product->save();

        // Delete old images if necessary
        if ($request->has('delete_images')) {
            $deleteImages = $request->input('delete_images');
            foreach ($deleteImages as $imageId) {
                $image = Image::findOrFail($imageId);
                $imagePath = public_path('images/products/' . $image->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
        }

        // Update existing images and add new images
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                Image::create([
                    'product_id' => $product->id,
                    'image' => $imageName
                ]);
            }
        }

        return redirect('admin/products')->with('message', 'Product updated successfully.');
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id);

        // Delete associated images if they exist
        $product->images()->delete();

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

