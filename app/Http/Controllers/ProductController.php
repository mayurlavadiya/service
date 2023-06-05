<?php


namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\File;

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
        $selectedCategories = $request->input('categories', []);

        $product = new Product;
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));
        $product->price = $request->input('price');
        $product->save();
        $product->categories()->attach($selectedCategories);

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

        return redirect('admin/products')->with('message', 'Product added successfully.');
    }

    public function edit($product_id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product_id);
        $images = $product->images ?? [];

        return view('admin.products.edit', compact('categories', 'product', 'images'));
    }

    public function update(Request $request, $product_id)
{
    $product = Product::findOrFail($product_id);
    $selectedCategories = $request->input('categories', []);
    $product->name = $request->input('name');
    $product->slug = Str::slug($request->input('name'));
    $product->price = $request->input('price');
    $product->save();
    $product->categories()->sync($selectedCategories);

    if ($request->has('delete_images')) {
        $deleteImages = $request->input('delete_images');
        foreach ($deleteImages as $imageId) {
            $image = Image::findOrFail($imageId);
            $imagePath = public_path('images/products/' . $image->image);
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete();
        }
    }

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
        $product = Product::findOrFail($product_id);
        $product->images()->delete();

        if ($product->images) {
            foreach ($product->images as $image) {
                $imagePath = public_path('images/products/' . $image->image);
                if (file_exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }

        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully.');
    }

    public function deleteimage($id)
    {
        $image = Image::findOrFail($id);
        if (File::exists(public_path('images/products/' . $image->image))) {
            File::delete(public_path('images/products/' . $image->image));
        }
        $image->delete();

        return back();
    }
}
