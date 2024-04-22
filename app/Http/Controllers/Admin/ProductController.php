<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy("id","desc")->paginate(10);
        return view('admin.pages.product.index', compact('products'));
    }
    public function createForm()
    {
        return view('admin.pages.product.create');
    }
    public function create(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'brand' => 'required',
        'image1' => 'required',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->brand_id = $request->brand;
    $product->save();

    for ($i = 1; $i <= 10; $i++) {
        if ($request->hasFile('image' . $i)) {
            $image = new ProductImage();
            $image->product_id = $product->id;
            $image->image_path = Cloudinary::upload($request->file('image' . $i)->getRealPath())->getSecurePath();
            $image->save();
        }
    }

    return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
}

}
