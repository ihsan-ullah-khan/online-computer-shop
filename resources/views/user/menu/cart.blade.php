@extends('layouts.user-home')
@section('title', 'Cart')
@section('content')
    <article class="max-w-6xl lg:max-w-8xl mx-auto mt-8 lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-2 lg:text-center lg:pt-14 mb-10">
            <a class="text-lg font-semibold hover:text-blue-500" href="{{ route('cart.index') }}">Shopping Cart</a>
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
                        <th class="px-4 py-3">Images</th>
                        <th class="px-4 py-3">Product_title</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="w-60"></th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @forelse($cartItems as $cartItem)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <img
                                            class="w-20 h-20"
                                            src="{{ asset('storage/images/'. $cartItem->product->images[0]->image) }}" alt="">
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $cartItem->product->title }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="flex item-center justify-between">
                                        <form method="POST" action="{{ route('cart.update', $cartItem) }}">
                                            @method('patch')
                                            @csrf
                                        <input
                                            class="w-20 border border-gray-300 mt-2 focus:bg-gray-200 bg-gray-100 rounded-xl px-2 py-2 @error('phone') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                                            type="number"
                                            name="quantity"
                                            value="{{ $cartItem->quantity }}">
                                            <x-button>
                                                Update
                                            </x-button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">${{ $cartItem->product->price * $cartItem->quantity }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 w-44">
                                <div class="flex items-center justify-between space-x-4 text-sm">
                                    <div>
                                    <a href="javascript:void(0);"
                                       onclick="if(window.confirm('Are you sure you want to delete this question?')){ document.getElementById('delete-{{ $cartItem->id }}').submit();  }"
                                       class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                       aria-label="Delete"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </a>
                                    <form method="post" id="delete-{{ $cartItem->id }}"
                                          action="{{ route('cart.destroy', $cartItem) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    </div>
                                    <div>
                                        <form method="POST" action="{{ route('place.order', $cartItem->id) }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $cartItem->user_id }}">
                                            <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                            <input type="hidden" name="product_price" value="{{ $cartItem->product_price * $cartItem->quantity }}">
                                            <input type="hidden" name="quantity" value="{{ $cartItem->quantity }}">
                                            <input type="hidden" name="phone" value="{{ \Illuminate\Support\Facades\Auth::user()->phone }}">
                                            <input type="hidden" name="product_title" value="{{ $cartItem->product_title }}">
                                            <input type="hidden" name="address" value="{{ \Illuminate\Support\Facades\Auth::user()->address }}">
                                            <x-button>Order Now</x-button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-gray-700 dark:text-gray-400 bg-orange-100">
                            <td colspan="4" class="px-4 py-3">
                                <div class="flex justify-center text-sm">
                                    <p class="font-semibold">Nothing in Cart.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                    <div class="flex items-center justify-end">
                        {{ $cartItems->links() }}
                    </div>
            </div>
        </div>
    </article>
@endsection
