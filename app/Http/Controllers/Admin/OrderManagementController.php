<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagementController extends Controller
{
// User Order Management

    // Delivered Orders
    public function delivered()
    {
        $orders = Order::query()
            ->where('status', 'D')
            ->where('user_id', Auth::id())
            ->paginate(5);
        return view('user.menu.order.delivered', compact('orders'));
    }
    // Returned Orders
    public function returned()
    {
        return view('user.menu.order.returned', [
            'orders' => Order::query()
            ->where('status', 'R')
            ->where('user_id', Auth::id())
            ->paginate(5),
        ]);
    }

    // Returned Order Update Function
    public function returnOrder(Request $request, $id)
    {
        if ($order = Order::find($id)){
            $attributes = $request->validate([
                'status' => 'required'
            ]);
        }
        $order->update($attributes);
        return redirect()
            ->route('orders.index')
            ->with('flash', ['type', 'success', 'message' => 'Order Returned']);

    }

    public function store(Request $request, $id)
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

        $cart = Cart::find($id);
        $cart->delete();
        Order::create($attributes);

        return redirect()
            ->route('orders.index')
            ->with('flash', ['type', 'success', 'message' => 'Order Placed Successfully']);
    }

//Admin Section Functions

    // Function for all orders
    public function index()
    {
        $orders = Order::query()
            ->orderByDesc('id')
            ->paginate(10);
        return view('admin.order.index', compact('orders'));
    }
    //Update Order to shipped
    public function shipOrder(Request $request, $id)
    {
        if ($order = Order::find($id)){
            $attributes = $request->validate([
                'status' => 'required'
            ]);
        }
        $order->update($attributes);
        return redirect()
            ->route('shipped.orders')
            ->with('flash', ['type', 'success', 'message' => 'Order Shipped Successfully']);

    }

    // For New Orders
    public function newOrders()
    {
        $orders = Order::query()
            ->where('status', 'N')
            ->paginate(10);
        return view('admin.order.new', compact('orders'));
    }
    // For Delivered Orders
    public function delivereOrders()
    {
        $orders = Order::query()
            ->where('status', 'D')
            ->paginate(10);

        return view('admin.order.delivered', compact('orders'));
    }

    //For returned Orders
    public function returnOrders()
    {
        $orders = Order::query()
            ->where('status', 'R')
            ->paginate(10);

        return view('admin.order.returned', compact('orders'));
    }
    //For returned Orders
    public function shippedOrders()
    {
        $orders = Order::query()
            ->where('status', 'S')
            ->paginate(10);

        return view('admin.order.shipped', compact('orders'));
    }

}
