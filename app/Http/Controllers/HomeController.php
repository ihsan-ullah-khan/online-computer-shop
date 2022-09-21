<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin()) {
            return view('admin.home', [
                'userCount' => count(User::all()),
                'cartCount' => count(Cart::all()),
                'productCount' => count(Product::all()),
                'orderCount' => count(Order::all()),
            ]);
        } else {
            return view('user.home', [
                'products' => Product::latest()->filter(request(['search', 'category', 'brand']))->paginate(20),
                'categories' => Category::all(),
                'brands' => Brand::all(),
                'currentCategory' => Category::where('id', request('category'))->first(),

            ]);
        }
    }

    public function edit()
    {
        return view('user.account');

    }

    public function store(Request $request)
    {
        request()->validate([
           'current_password' => ['required', function($attribute, $value, $fail){
            if (!Hash::check($value, Auth::user()->password)){
                $fail('Old Password didn\'t match');
            }
           },],
           'new_password' => ['required'],
           'confirm_password' => ['same:new_password']
        ]);
        User::find(\auth()->user()->id)->update(['password' => Hash::make(request()->new_password)]);
        return redirect()
            ->route('account')
            ->with('flash', ['type', 'success', 'message' => 'Password Changed Successfully.']);
    }
    public function showMessage()
    {
        return view('admin.contact.index', [
            'messages' => Contact::all(),
        ]);
    }
}
