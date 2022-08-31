<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }


    public function store(Request $request)
    {
        $attributes = request()->validate([
           'brand_name' => 'required'
        ]);
        Brand::create($attributes);

        return redirect()
            ->route('brands.index')
            ->with('flash', ['type', 'success', 'message'=>'Brand Added Successfully.']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }


    public function update(Request $request, $id)
    {
        if ($brand = Brand::find($id))
        {
            $attributes = request()->validate([
                'brand_name' => 'required'
            ]);

            $brand->update($attributes);

            return redirect()
                ->route('brands.index')
                ->with('flash', ['type', 'success', 'message' => 'Brand Updated successfully.']);
        }
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('flash', ['type', 'success', 'message' => 'Brand Deleted Successfully']);
    }
}
