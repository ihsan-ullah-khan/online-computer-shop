@extends('layouts.admin-home')
@section('title', 'Add User')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex items-center justify-between">
                <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                    Add User
                </h2>
                <x-link href="{{ route('users.index') }}">
                    Go Back
                </x-link>
            </div>
            <div class="flex w-full overflow-hidden rounded-lg">
                <div class="w-full p-4">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <!-- User's Name -->
                        <div>
                            <label for="name" class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 mt-3">Name</span>
                                <input id="name"
                                       autofocus
                                       type="text"
                                       placeholder="Enter User's Name"
                                       name="name"
                                       class="block w-full mt-1 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('name') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                />
                            </label>
                            @error('name')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- User's Email -->
                        <div>
                            <label for="email" class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 mt-3">Email</span>
                                <input id="email"
                                       autofocus
                                       type="text"
                                       placeholder="Enter User's Email"
                                       name="email"
                                       class="block w-full mt-1 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('email') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                />
                            </label>
                            @error('email')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- User's Phone -->
                        <div>
                            <label for="phone" class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 mt-3">Phone</span>
                                <input id="phone"
                                       autofocus
                                       type="text"
                                       placeholder="Enter User's Name"
                                       name="phone"
                                       class="block w-full mt-1 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('phone') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                />
                            </label>
                            @error('phone')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- User's Address -->
                        <div>
                            <label for="address" class="block text-sm mt-3">
                                <span class="text-gray-700 dark:text-gray-400 mt-3">Address</span>
                                <input id="address"
                                       autofocus
                                       type="text"
                                       placeholder="Enter User's Name"
                                       name="address"
                                       class="block w-full mt-1 m-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none @error('address') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                />
                            </label>
                            @error('address')
                            <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="items-center justify-between m-4">
                            <x-button>
                                Add User
                            </x-button>
                        </div>
                    </form>
                </div>
                <div class="w-1/2"></div>
            </div>
        </div>
    </main>
@endsection
