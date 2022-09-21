@extends('layouts.user-home')
@section('title', 'About Us')
@section('content')
    <article class="max-w-5xl mx-auto mt-4 lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-3 lg:text-center lg:pt-14 mb-10">
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a
                    href="{{ '/about-payment' }}">1. Payment Method</a></p>
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a
                    href="{{ '/about-seller' }}">2. Return Policy</a></p>
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a href="{{ '/about-shop' }}">3. Shop</a></p>

        </div>

        <div class="col-span-9">


            <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                Computer shop
            </h1>
            <div class="space-y-4 lg:text-lg leading-loose">
                <p>
                    Using this service you can deposit money directly into teh computer shop band account. Once the item
                    has been received at your end we release the payment to the seller, ensuring safe transactions and
                    trustworthy service for buyers. the Computer shop Safe Payment serves to provide comfort and trust
                    for both buyer and seller.
                </p>

            </div>
        </div>
    </article>
@endsection
