<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index',[
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'category_name' => 'required'
        ]);
        Category::create($attributes);

        return redirect()
            ->route('categories.index')
            ->with('flash', ['type', 'success', 'message' => 'Category added Successfully.']);
    }

    public function edit($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id),
        ]);
    }


    public function update(Request $request, $id)
    {
        if ($category = Category::find($id))
        {
            $attributes = request()->validate([
                'category_name' => 'required'
            ]);
        }
        $category->update($attributes);

        return redirect()
            ->route('categories.index')
            ->with('flash', ['type', 'success', 'message' => 'Category Update Successfully.']);
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()
            ->route('categories.index')
            ->with('flash', ['type', 'success', 'message' => 'Category Deleted Successfully.']);
    }
}
