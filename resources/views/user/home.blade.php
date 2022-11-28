@extends('layouts.user-home')
@section('title', 'Home')
@section('slider')
    <header class="max-w-6xl mx-auto mt-20 text-center"1->
        <h1 class="text-4xl">
            Welcome to <span class="text-blue-500"><a href="/">Computer Shop</a></span>
        </h1>
        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <!--  Brand -->
            <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
                <div x-data="{ show: false}" @click.away="show = false">
                    <button
                        @click="show = true"
                        class="py-2 pl-3 pr-9 text-sm font-semibold w-full text-black lg:w-32 text-left inline-flex"
                    >
                        Brands

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </button>
                    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl mb-2 w-full z-50"
                         style="display: none;">
                        @foreach($brands as $brand)
                            <a href="/?brand={{ $brand->id }}"
                               class="block text-left px-3 text-sm leading-6 text-black hover:bg-blue-500 focus:bg-blue-500 hover:text-white">{{ $brand->brand_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Category -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                <div x-data="{ show: false}" @click.away="show = false">
                    <button
                        @click="show = true"
                        class="py-2 pl-3 pr-9 text-sm font-semibold w-full text-black lg:w-32 text-left inline-flex"
                    >
                        Categories

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </button>
                    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl mb-2 w-full z-50"
                         style="display: none;">
                        @foreach($categories as $category)
                            <a href="/?category={{ $category->id }}"
                               class="block text-left px-3 text-sm leading-6 text-black hover:bg-blue-500 focus:bg-blue-500 hover:text-white"
                               active="{{ request()->is("$category->category_name") }}"
                            >{{ $category->category_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Search -->
            <div class="relative w-72 flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="#">
                    @if( request('category', 'brand'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="brand" value="{{ request('brand') }}">
                    @endif
                    <input type="text"
                           name="search"
                           placeholder="Find something"
                           class="bg-transparent placeholder-black font-semibold text-sm w-full px-2"
                           value="{{ request('search') }}"
                    >
                </form>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <section class="bg-white mt-2 py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            @forelse($products as $product)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <div>
                        <a href="{{ route('uproducts.show', $product) }}">
                            <div class="">
                                @if(count($product->images) == 0)
                                    <img class="hover:grow hover:shadow-lg p-2 h-64 object-fit"
                                         src="{{ asset('assets/img/img.JPEG')}}" alt="">
                                @else
                                <img class="hover:grow hover:shadow-lg p-2 h-64 object-fit"
                                     src="{{ asset('storage/images/'. $product->images[0]->image) }}">
                                @endif
                            </div>
                            <div class="pt-3 flex items-center justify-start">
                                <p class="font-semibold text-sm"><a
                                        href="{{ route('uproducts.show', $product) }}">{{ $product->title }}</a></p>
                            </div>
                        </a>
                    </div>
                    <hr>
                    <div class="flex items-center mt-2 justify-between">
                        <p class="pt-1 text-gray-900">${{ $product->price }}</p>
                        <form method="POST" action="{{ route('cart.store') }}">
                            @csrf
                            <input type="hidden" name="user_id"
                                   value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_title" value="{{ $product->title }}">
                            <input type="hidden" name="product_price" value="{{ $product->price }}">
                            <button
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="max-w-6xl mx-auto mt-20 text-center">
                    <p class="text-lg font-semibold text-red-300">No Products Available. Check back later!</p>
                </div>
            @endforelse
        </div>
        <div class="flex items-center justify-around">
            {{ $products->links() }}
        </div>
    </section>
@endsection
