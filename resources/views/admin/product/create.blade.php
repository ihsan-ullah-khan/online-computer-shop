@extends('layouts.admin-home')
@section('title', 'Add Product')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex items-center justify-between">
                <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                    Add Product
                </h2>
                <x-link href="{{ route('products.index') }}">
                    Go Back
                </x-link>
            </div>
            <div class="flex w-full overflow-hidden rounded-lg">
                <div class="w-full p-4">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Brand Name -->
                        <div class="mt-2">
                            <label for="title" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Product Title</span>
                                <input id="title"
                                       autofocus
                                       type="text"
                                       placeholder="Enter Product Title"
                                       name="title"
                                       class="block w-full mt-2 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('title') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                       placeholder="Jane Doe"
                                />
                            </label>
                            @error('title')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex md:flex-col">
                        <div class="mt-2 mr-2 w-full">
                            <label for="category_id" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Category</span>
                                <select name="category_id"
                                        class="block w-full mt-2 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('category_id') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        id="category_id">
                                    <option value="">Select Product Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('brand_name')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2 ml-2 w-full">
                            <label for="brand_id" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Brand</span>
                                <select name="brand_id"
                                        class="block w-full mt-2 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('category_id') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        id="brand_id">
                                    <option value="">Select Product Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            @error('brand_name')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="mt-2">
                            <label for="product_description" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Product Description</span>
                                <textarea id="product_description"
                                       autofocus
                                       type="text"
                                       placeholder="Enter Product Description"
                                       name="product_description"
                                       class="block w-full mt-2 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('product_description') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                       placeholder="Jane Doe"
                                ></textarea>
                            </label>
                            @error('product_description')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="product_classification" class="block text-sm m-4">
                                <span class="text-gray-700 dark:text-gray-400">Product Classification</span>
                                <textarea id="product_classification"
                                       autofocus
                                       type="text"
                                       placeholder="Enter Product Classification"
                                       name="product_classification"
                                       class="block w-full mt-2 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('product_classification') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                       placeholder="Jane Doe"
                                ></textarea>
                            </label>
                            @error('product_classification')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="price" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Product Price</span>
                                <input id="price"
                                       autofocus
                                       type="number"
                                       placeholder="Enter Product Price"
                                       name="price"
                                       class="block w-full mt-2 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('title') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                />
                            </label>
                            @error('title')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        @for( $i = 0; $i < 5; $i++)
                        <div class="mt-2">
                            <label for="image" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Image {{ $i+1 }}</span>
                                <input id="image"
                                       type="file"
                                       name="images[]"
                                       class="block w-full mt-2 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('image') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                />
                            </label>
                            @error('image')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        @endfor
                        <div class="items-center justify-between m-4">
                            <x-button>
                                Add Product
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
