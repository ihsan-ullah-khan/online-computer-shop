@extends('layouts.admin-home')
@section('title', 'New Orders Orders')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex items-center justify-between">
                <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                    New Orders
                </h2>
            </div>


            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
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
                            <th></th>
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
                                            @if(count($order->product->images) == 0)
                                                <img class="w-12 h-12 rounded-md object-fit"
                                                     src="{{ asset('assets/img/img.JPEG')}}" alt="">
                                            @else
                                            <img
                                                class="w-12 h-12"
                                                src="{{ asset('storage/images/'. $order->product->images[0]->image) }}"
                                                alt="">
                                            @endif
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
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">Placed</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold"></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 w-12">
                                    <form method="POST" action="{{ route('order.shipped', $order->id) }}">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="status" value="S">
                                        <x-button>Ship Order</x-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-gray-700 dark:text-gray-400 bg-orange-100">
                                <td colspan="9" class="px-4 py-3">
                                    <div class="flex justify-center text-sm">
                                        <p class="font-semibold">No New Orders Available</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
