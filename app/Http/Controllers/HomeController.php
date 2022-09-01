<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin())
        {
            return view('admin.home');
        }else
        {
            $products = Product::with('images')->orderByDesc('id')->get();
            return view('user.home', compact('products'));
        }
    }
}
