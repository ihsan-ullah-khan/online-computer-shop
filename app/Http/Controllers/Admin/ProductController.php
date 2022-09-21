<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;

class ProductController extends Controller
{
    protected  $image_path = 'public/images/';

    public function index()
    {
        return view('admin.product.index', [
           'products' => Product::with('images')->orderByDesc('id')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
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
        if ($images = $request->file('images'))
        {
            foreach ($images as $image){
            $filename = $product->id . '-' . $image->getClientOriginalName();

            Storage::disk('local')->put($this->image_path .$filename, $image->getContent());

            Images::create([
                'product_id' => $product->id,
                'image' => $filename,
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

        return view('admin.product.show', compact('product', 'images'));
    }

    public function edit($id)
    {
        return view('admin.product.edit',[
            'product' => Product::find($id),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        if ( $product = Product::find($id)){
            request()->validate([
                'title' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'product_description' => 'required',
                'product_classification' => 'required',
                'price' => 'required',
            ]);
            $product->update($request->only(['title', 'category_id', 'brand_id', 'product_description', 'product_classification', 'price']));
            if ($images = $request->file('images'))
            {
                foreach ($images as $image){
                    $filename = $product->id . '-' . $image->getClientOriginalName();

                    Storage::disk('local')->put($this->image_path .$filename, $image->getContent());

                    Images::create([
                        'product_id' => $product->id,
                        'image' => $filename,
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
