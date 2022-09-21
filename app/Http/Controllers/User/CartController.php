<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::query()
            ->where('user_id', Auth::User()->id)
            ->with('product')
            ->orderByDesc('id')
            ->paginate(5);
        return view('user.menu.cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'product_title' => 'required',
            'product_price' => 'required'
        ]);
        if (Cart::query()
            ->where('user_id', Auth::id())
            ->where('product_id',  $request->product_id)->exists()) {
            return redirect()
                ->route('cart.index')
                ->with('flash', ['type', 'success', 'message' => 'Item already exists in Cart, Update the quantity']);
        } else {
            Cart::create($attributes);
            return redirect()
                ->route('cart.index')
                ->with('flash', ['type', 'success', 'message' => 'Item Added to Cart']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($cartItem = Cart::find($id)) {
            $attributes = request()->validate([
                'quantity' => 'required',
            ]);
        }
        $cartItem->update($attributes);

        return redirect()
            ->route('cart.index')
            ->with('flash', ['type', 'success', 'message' => 'Quantity Updated Successfully']);
    }

    public function destroy($id)
    {
        $cartItem = Cart::find($id);
        $cartItem->delete();

        if (Auth::user()->is_Admin()){
            return redirect()
                ->route('carts.list')
                ->with('flash', ['type', 'success', 'message' => 'Item removed Successfully']);
        }else {
            return redirect()
                ->route('cart.index')
                ->with('flash', ['type', 'success', 'message' => 'Item removed Successfully']);
        }
    }
}
