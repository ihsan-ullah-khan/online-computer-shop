<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function index()
    {
        $products =Product::with('images')->orderByDesc('id')->get();
        return view('user.product.index', compact('products'));
    }

    public function create()
    {
        return view('user.menu.about');
    }
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

        $product = Product::find($id);
        $images = Images::where('product_id', $product->id)->get();

        return view('user.product.show', compact('product', 'images'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $carts = Cart::all();
        foreach ($carts as $cart){
        if($product->id == $cart->product_id){
            return redirect('/');
        }else{
            dd($request->all());
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'product_title' => $product->title,
                'product_price' => $product->price,
            ]);
            return redirect('/');
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
