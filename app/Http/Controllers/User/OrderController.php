<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('user_id', Auth::user()->id)
            ->where('status', 'N')
            ->orWhere('status', 'S')
            ->orderByDesc('id')
            ->paginate(5);
        return view('user.menu.order.index', compact('orders'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
           'user_id' => 'required',
           'product_id' => 'required',
           'product_price' => 'required',
           'quantity' => 'required',
           'product_title' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Order::create($attributes);
        return redirect()
            ->route('orders.index')
            ->with('flash', ['type', 'success', 'message' => 'Order Placed Successfully']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        if ($order = Order::find($id)){
            $attributes = $request->validate([
                'status' => 'required'
            ]);
        }
        $order->update($attributes);
        if (Auth::user()->is_admin()){
            return redirect()
                ->route('deliver.orders')
                ->with('flash', ['type', 'success', 'message' => 'Order Delivered Successfully']);

        }else{
            return redirect()
                ->route('orders.index')
                ->with('flash', ['type', 'success', 'message' => 'Recieft Confirmed']);
        }
    }
    public function destroy($id)
    {
        //
    }
}
