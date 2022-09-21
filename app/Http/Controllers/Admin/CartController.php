<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartItems()
    {
        $cartItems = Cart::query()
            ->paginate(10);

        return view('admin.cart.index', compact('cartItems'));
    }
}
