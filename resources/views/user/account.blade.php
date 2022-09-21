@extends('layouts.user-home')
@section('title', 'Edit Profile')
@section('content')
    <main class="bg-white rounded-md dark:bg-gray-700">
        @if(session()->has('flash'))
            <x-alert>{{ session('flash')['message'] }}</x-alert>
        @endif
        <div class="flex flex-col bg-gray-100 md:flex-row rounded-xl m-3 mb-8 mt-6 border border-gray-200 bg-white dark:bg-gray-700">
            <div
                class=" justify-center items-center md:items-baseline w-64 mr-4 mx-8 mt-4  pb-3 flex-col justify-between mt-4 ">
                <h1 class=" font-bold text-2xl text-gray-700 text-center dark:text-gray-100">
                    Account settings
                </h1>
            </div>
            <div class=" md:w-full lg:w-1/2 flex flex-col justify-center items-center md:items-baseline ml-8 mt-4">

                <form method="POST" action="{{route('store')}}" class="w-full mx-auto items-center justify-around">
                    @csrf

                    <div>
                        <x-label class="inline-block text-sm text-gray-700 dark:text-gray-100" for="current_password"
                                 :value="('Current Password')"/>

                        <input id="current_password"
                                 class="w-full border border-gray-300 mt-2 focus:bg-white bg-white rounded-lg px-2 py-2 @error('name') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                                 type="password"
                                 name="current_password"
                        />
                        @error('current_password')
                        <span class="block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-label class="inline-block text-sm	text-gray-700 dark:text-gray-100" for="new_password"
                                 :value="('New Password')"/>

                        <input id="new_password"
                                 class="w-full border border-gray-300 mt-2 focus:bg-white bg-white rounded-lg px-2 py-2 @error('name') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                                 type="password"
                                 name="new_password"
                                 required autocomplete="new_password"/>
                        @error('new_password')
                        <span class="block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label class="inline-block text-sm	text-gray-700 dark:text-gray-100" for="confirm_password"
                                 :value="('Confirm Password')"/>

                        <input id="confirm_password"
                                 class="w-full border border-gray-300 mt-2 focus:bg-white bg-white rounded-lg px-2 py-2 @error('name') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                                 type="password"
                                 name="confirm_password" required/>
                        @error('confirm_password')
                        <span class="block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="inline-block justify-arround mt-4 mb-8">
                        <x-button>
                            Update Password
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection
