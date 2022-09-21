@extends('layouts.user-home')
@section('title', 'Contact Us')
@section('content')
    <article class="max-w-5xl mx-auto mt-8 lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-3 lg:text-center lg:pt-14 mb-10">
            <button class="py-3 px-6 bg-gray-100 text-black rounded-xl"><a class="text-lg font-semibold hover:text-blue-500" href="{{ route('contact.create') }}">Contact us</a></button>
        </div>
        <div class="col-span-9 bg-gray-100 rounded-xl px-4 py-4">
            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                Contact Us
            </h1>
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                <div class="flex items-center m-2 justify-between">
                    <div>
                        <label for="name" class="bg-gray-100 mt-2 py-2 px-2 rounded-xl w-full">Name</label>
                        <input
                            name="name"
                            type="text"
                            placeholder="Enter your Name"
                            autofocus
                            class="w-full border border-gray-300 mt-2 focus:bg-gray-200 bg-gray-100 rounded-xl px-2 py-2 @error('name') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                        >
                        @error('name')
                        <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="bg-gray-100 mt-2 py-2 px-2 rounded-xl w-full">Phone</label>
                        <input
                            name="phone"
                            type="text"
                            placeholder="+92441234567"
                            autofocus
                            class="w-full border border-gray-300 mt-2 focus:bg-gray-200 bg-gray-100 rounded-xl px-2 py-2 @error('phone') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                        >
                        @error('phone')
                        <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center m-2 justify-between">
                    <div>
                        <label for="email" class="bg-gray-100 py-2 px-2 rounded-xl w-full">Email</label>
                        <input
                            name="email"
                            type="text"
                            placeholder="Enter your Email"
                            autofocus
                            class="w-full border border-gray-300  focus:bg-gray-200 bg-gray-100 rounded-xl px-2 py-2 @error('email') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                        >
                        @error('email')
                        <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="subject" class="bg-gray-100 py-2 px-2 rounded-xl w-full">Subject</label>
                        <input
                            name="subject"
                            type="text"
                            placeholder="Enter your Subject"
                            autofocus
                            class="w-full border border-gray-300  focus:bg-gray-200 bg-gray-100 rounded-xl px-2 py-2 @error('subject') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                        >
                        @error('subject')
                        <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="px-2 py-2">
                    <label for="message" class="bg-gray-100 mt-2 py-2 px-2 rounded-xl w-full">
                        <span class="text-black">Message</span>
                    <textarea
                        id="message"
                        name="message"
                        type="text"
                        placeholder="Enter your Phone Message"
                        autofocus
                        class="w-full border border-gray-300 h-40 mt-2 focus:bg-gray-200 bg-gray-100 rounded-xl px-2 py-2 @error('message') focus:border-red-400 focus:shadow-outline-red focus:ring-red-200 @else focus:border-purple-400 focus:shadow-outline-purple focus:border-indigo-300 focus:ring-indigo-200 @enderror"
                    ></textarea>
                    </label>
                    @error('message')
                        <span class="inline-block mt-1 w-full text-sm text-red-600">{{ $message }}</span>
                        @enderror
                </div>
                <div class="flex items-center justify-end px-2 py-2">
                <x-button class="mb-4">
                    Send Message
                </x-button>
                </div>
            </form>
        </div>
    </article>
@endsection
