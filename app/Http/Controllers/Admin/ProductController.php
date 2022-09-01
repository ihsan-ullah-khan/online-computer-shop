<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('images')->orderByDesc('id')->get();
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {

        request()->validate([
            'title' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_description' => 'required',
            'product_classification' => 'required',
            'price' => 'required',
        ]);

        $product = Product::create($request->only(['title', 'category_id', 'brand_id', 'product_description', 'product_classification', 'price']));

        $images = $request->file('images');

        foreach ($images as $image ){
            if ($image) {
                Images::create([
                    'product_id' => $product->id,
                    'image' => $image->store('public/images'),
                ]);
            }
        }
        return redirect()
            ->route('products.index')
            ->with('flash', ['type', 'success', 'message' => 'Product Added Successfully']);
    }


    public function show($id)
    {
        $product = Product::find($id);
        $images = Images::where('product_id', $product->id)->get();

        return view('admin.products.show');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $images = Images::where('product_id', $product->id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'images', 'categories', 'brands'));
    }


    public function update(Request $request, $id)
    {
        if ( $product = Product::find($id)){
            $attributes = request()->validate([
                'title' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'product_description' => 'required',
                'product_classification' => 'required',
                'price' => 'required',
            ]);
            $product->update($attributes);
            if ($image = Images::where('product_id', $product->id)){
                $image->delete();
            }
            $images = $request->file('images');

            foreach ($images as $image ){
                if ($image) {
                    Images::create([
                        'product_id' => $product->id,
                        'image' => $image->store('public/images'),
                    ]);
                }
            }
            return redirect()
                ->route('products.index')
                ->with('flash', ['type', 'success', 'message' => 'Product Updated Successfully']);
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('flash', ['type', 'success', 'message' => 'Product Deleted Successfully']);
    }
}
