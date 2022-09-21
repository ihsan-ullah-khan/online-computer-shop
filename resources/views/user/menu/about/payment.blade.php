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
            <div class="space-y-4 lg:text-lg leading-loose">
                <h1 class="font-bold text-3xl lg:text-4xl mb-4 text-blue-500">
                    Payment Method
                </h1>
                <p class="text-lg mb-10">We support the following payment options:</p>
                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    1. Cash on Delivery
                </h1>
                <p>
                    Using this service, you can pay cash to the delivery agent upon receiving your order. this service
                    will
                    enable you to shop at compouter Shop conveniently and hassle free.When you make a purchase using the
                    pay
                    to doorstep option. Your product will be booked. Our Customer Care Expert will call to confirm your
                    Order before it gets dispatched. You can pay in cash to the delivery agen upon receiving your order.
                </p>

                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    2. Advanced Payment
                </h1>
                <p>
                    We offer the ability to make an advance payment for sellers that demand a certain amount of advance
                    before dispatch of goods. In this case you can make a bank payment into the account of the seller.
                    The
                    seller, upon receiving the advance dispatches the item and the rest of teh payment can be made to
                    the
                    delivery agent.
                </p>
                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    3. Computer shop
                </h1>
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
