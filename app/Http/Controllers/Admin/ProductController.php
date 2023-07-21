<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()

    {   $products = Product::all();
        return view('admin.product.index', [
            'products' => $products 
        ]);
    }

    public function create()
    {   
        return view('admin.product.create', [
            'tags' => $this->tags(),
            'catagories' => $this->catagories(),
            'paymentMethods' => $this->paymentMethods(),
        ]);
    }

    public function store(ProductRequest $request)
    {   
       $productDetails = $request->validated();

        $image = $productDetails['image'];
        $image->store('public/admin/products/images');

       $productDetails['image'] = $image->hashName();
       Product::create($productDetails);
       return to_route('admin.product.index')->with('success', 'Product add successfully');
    }

    public function edit(Product $product)
    {   
        return view('admin.product.edit',[
            'product' => $product,
            'tags' => $this->tags(),
            'catagories' => $this->catagories(),
            'paymentMethods' => $this->paymentMethods(), 
        ]);
    }

    public function update(Product $product, ProductRequest $request)
    {   
       $productDetails = $request->validated();
       $productDetails['image'] = $request->old_image;

       if ($request->file('image')) {
            $image = $request->file('image');
            $image->store('public/admin/products/images');
            $productDetails['image'] = $image->hashName();

            Storage::delete('public/admin/products/images/'. $request->old_image);
       }


       $product->update($productDetails);
       return to_route('admin.product.index')->with('success', 'Product updated successfully'); 
    }

    public function tags() {
        return Tag::all(['id', 'name']);
    }

    public function catagories() {
        return Category::all(['id', 'name']);
    }

    public function paymentMethods() {
       return ['STRIPE', 'COD', 'ONLINE'];
    }

    public function imageUpdate($request) {
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->store('public/admin/products/images');
            $productDetails['image'] = $image->hashName();

            Storage::delete('public/admin/products/images/'. $request->old_image);
       }
    }
}


