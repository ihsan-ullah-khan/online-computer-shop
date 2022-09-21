@extends('layouts.user-home')
@section('title', 'My Orders')
@section('content')
    <article class="max-w-6xl lg:max-w-8xl mx-auto mt-8 lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-2 lg:text-center lg:pt-14 mb-10">
            <a class="text-lg font-semibold hover:text-white hover:bg-blue-500 px-4 py-1 rounded-lg mt-3" href="{{ route('orders.index') }}">My Orders</a>
            <a class="text-lg font-semibold hover:text-white hover:bg-blue-500 px-4 py-1 rounded-lg mt-3" href="{{ route('orders.delivered') }}">Delivered</a>
            <a class="text-lg font-semibold hover:text-white hover:bg-blue-500 px-4 py-1 rounded-lg mt-3" href="{{ route('orders.returned') }}">Returned</a>
        </div>
        <div class="col-span-10 w-full">
            <div class="w-full overflow-x-auto">
                @if(session()->has('flash'))
                    <x-alert>{{ session('flash')['message'] }}</x-alert>
                @endif
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Address</th>
                        <th class="px-4 py-3">Payment Method</th>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Quanitty</th>
                        <th class="px-4 py-3"> Price</th>
                        <th class="px-4 py-3"> Status</th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @forelse($orders as $order)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <img
                                            class="w-12 h-12"
                                            src="{{ asset('storage/images/'. $order->product->images[0]->image) }}"
                                            alt="">
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $order->user->name }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->user->address }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->payment_method }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->product_title }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $order->quantity }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">${{ $order->product_price }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">Delivered</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-gray-700 dark:text-gray-400 bg-orange-100">
                            <td colspan="8" class="px-4 py-3">
                                <div class="flex justify-center text-sm">
                                    <p class="font-semibold">No Delivered Available.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="flex items-center justify-end">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </article>
@endsection
