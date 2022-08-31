@extends('layouts.admin-home')
@section('title', 'Add Category')
@section('content')
    <main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="flex items-center justify-between">
            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Add Categories
            </h2>
            <x-link href="{{ route('categories.index') }}">
                Go Back
            </x-link>
        </div>
        <div class="flex overflow-hidden rounded-lg">
            <div class="w-full p-4">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-label class="inline-block text-sm my-6 text-gray-700 dark:text-gray-400" for="category_name"
                                 :value="('Category_Name')"/>

                        <x-input id="category_name"
                                 class="inline-block mx-6 w-full text-black text-sm dark:border-gray-600 dark:bg-gray-700 focus:outline-none  focus:ring  focus:ring-opacity-50 @error('name') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                 type="text"
                                 placeholder="Enter Category's Name"
                                 name="category_name"
                                 :value="old('category_name')"
                                 required autofocus/>
                        @error('name')
                        <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="items-center justify-between m-4">
                        <x-button>
                            Add Category
                        </x-button>
                    </div>
                </form>
            </div>
            <div class="w-1/2"></div>
        </div>
    </div>
    </main>
@endsection
