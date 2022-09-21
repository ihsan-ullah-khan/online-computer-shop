@extends('layouts.user-home')
@section('title', 'Product view')
@section('content')
    <article class="max-w-5xl mx-auto mt-8 lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-5 lg:text-center lg:pt-14 mb-10">
            <div class="carousel relative container mx-auto" style="max-width:1600px;">
                <div class="carousel-inner relative overflow-hidden w-full">
                    <!--Slide 1-->
                    <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                           checked="checked">
                    <div class="carousel-item absolute opacity-0" style="height:50vh;">

                        <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                             style="background-image: url('{{ asset('storage/images/'. $product->images[0]->image) }}');">

                            <div class="container mx-auto">
                                <div
                                    class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                    <p>{{ $product->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="carousel-3"
                           class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                    <label for="carousel-2"
                           class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                    <!--Slide 2-->
                    <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                        <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right object-fit"
                             style="background-image: url('{{ asset('storage/images/'. $product->images[1]->image) }}');">

                            <div class="container mx-auto">
                                <div
                                    class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                    <p>{{ $product->title }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <label for="carousel-1"
                           class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                    <label for="carousel-3"
                           class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                    <!--Slide 3-->
                    <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item absolute opacity-0" style="height:50vh;">
                        <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom"
                             style="background-image: url('{{ asset('storage/images/'. $product->images[1]->image) }}');">

                            <div class="container mx-auto">
                                <div
                                    class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                    <p>{{ $product->title }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <label for="carousel-2"
                           class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                    <label for="carousel-1"
                           class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                    <!-- Add additional indicators for each slide-->
                    <ol class="carousel-indicators">
                        <li class="inline-block mr-3">
                            <label for="carousel-1"
                                   class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                        </li>
                        <li class="inline-block mr-3">
                            <label for="carousel-2"
                                   class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                        </li>
                        <li class="inline-block mr-3">
                            <label for="carousel-3"
                                   class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                        </li>
                        <li class="inline-block mr-3">
                            <label for="carousel-4"
                                   class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                        </li>
                    </ol>

                </div>
            </div>
        </div>

        <div class="col-span-7">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="/"
                   class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>

                    Back to Home
                </a>
                <div class="space-x-2">
                    <a href="/?brand={{$product->brand->id}}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $product->brand->brand_name }}</a>
                    <a href="/?category={{ $product->category->id }}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $product->category->category_name }}</a>
                </div>
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                {{ $product->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                <p>{{ $product->product_description }}</p>

                <p>{{ $product->product_classification }}</p>
                <hr class="mt-8">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="pt-1">${{ $product->price }}</p>
                    </div>
                    <div>
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

            </div>
        </div>
    </article>
@endsection
