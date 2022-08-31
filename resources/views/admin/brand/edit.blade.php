@extends('layouts.admin-home')
@section('title', 'Add Category')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex items-center justify-between">
                <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                    Edit Brand
                </h2>
                <x-link href="{{ route('brands.index') }}">
                    Go Back
                </x-link>
            </div>
            <div class="flex overflow-hidden rounded-lg">
                <div class="w-full p-4">
                    <form method="POST" action="{{ route('brands.update', $brand) }}">
                        @method('patch')
                        @csrf
                        <!-- Brand Name -->
                        <div>
                            <x-label for="brand_name" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Brand Name</span>
                                <x-input id="brand_name"
                                       autofocus
                                       type="text"
                                       placeholder="Enter Brand Name"
                                       name="brand_name"
                                       class="block w-full mt-1 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('brand_name') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                       placeholder="Jane Doe"
                                       :value="old('brand_name')?? $brand->brand_name"
                                />
                            </x-label>
                            @error('brand_name')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="items-center justify-between m-4">
                            <x-button>
                                Update Brand
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
