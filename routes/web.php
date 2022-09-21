<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ShowController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->group(callback: function () {

//    Admin Routes
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::get('/order-list', [OrderManagementController::class, 'index'])->name('all.orders');
    Route::get('new-orders', [OrderManagementController::class, 'newOrders'])->name('new.orders');
    Route::get('delivered-order-list', [OrderManagementController::class, 'delivereOrders'])->name('deliver.orders');
    Route::get('returned-orders-list', [OrderManagementController::class, 'returnOrders'])->name('return.orders');
    Route::patch('orders/update-status/{id}', [OrderManagementController::class, 'shipOrder'])->name('order.shipped');
    Route::get('shipped-orders-list', [OrderManagementController::class, 'shippedOrders'])->name('shipped.orders');
    Route::get('cart-list', [\App\Http\Controllers\admin\CartController::class, 'cartItems'])->name('carts.list');
    Route::get('contacts', [HomeController::class, 'showMessage'])->name('contacts.index');

    //User Routes
    Route::resource('uproducts', ShowController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('cart', CartController::class);
    Route::get('/edit-profile', [HomeController::class, 'edit'])->name('account');
    Route::post('change-password', [HomeController::class, 'store'])->name('store');
    Route::get('delivered-orders', [OrderManagementController::class, 'delivered'])->name('orders.delivered');
    Route::get('returned-orders', [OrderManagementController::class, 'returned'])->name('orders.returned');
    Route::patch('orders/update/{id}', [OrderManagementController::class, 'returnOrder'])->name('order.returned');
    Route::post('order-placed/carts/{id}', [OrderManagementController::class, 'store'])->name('place.order');
    Route::get('/about-us', function () {
        return view('user.menu.about.about');
    });
    Route::get('/about-seller', function () {
        return view('user.menu.about.seller');
    });
    Route::get('/about-payment', function () {
        return view('user.menu.about.payment');
    });
    Route::get('/about-shop', function () {
        return view('user.menu.about.shop');
    });
});

