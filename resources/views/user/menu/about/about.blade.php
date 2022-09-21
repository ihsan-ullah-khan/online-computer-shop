@extends('layouts.user-home')
@section('title', 'About Us')
@section('content')
    <article class="max-w-5xl mx-auto lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-3 lg:text-center lg:pt-14 mb-10">
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a
                    href="{{ '/about-payment' }}">1. Payment Method</a></p>
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a
                    href="{{ '/about-seller' }}">2. Return Policy</a></p>
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a href="{{ '/about-shop' }}">3.
                    Shop</a></p>

        </div>

        <div class="col-span-9">


            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                Why Computer Shop?
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    Shoping that helps you make the right choice
                </h1>
                <p>Computer shop offers you a shopping experience tha is unparalleled in Pakistan. We provide the most
                    stylish trendy and reliable shopping platform that is light on you pockets with an unmatched
                    convenience level. At computer shop we understand your needs, hence we strive to offer you the most
                    stylish, personalized and secure online shopping experience. We showcase products from a wide scope
                    of brans: established foreign names to Pakistan's local retail entities.</p>
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    Our Services to your Doorsteps
                </h1>
                <p>Want to buy a product you like? It is just a few clicks away and we will deliver at right at your
                    doorstep. Payment is simply cash on delivery by our rider; a winder range of options are also
                    available during checkout. Delivery is door-to-door and handled by our trusted logistics
                    partners.</p>
                <p>Don't like what you bought? We offer a FREE 7-days return policy</p>

            </div>
        </div>
    </article>
@endsection
