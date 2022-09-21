@extends('layouts.user-home')
@section('title', 'About Us')
@section('content')
    <article class="max-w-5xl mx-auto mt-4 lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-3 lg:text-center lg:pt-14 mb-10">
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a
                    href="{{ '/about-payment' }}">1. Payment Method</a></p>
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a
                    href="{{ '/about-seller' }}">2. Return Policy</a></p>
            <p class="text-left hover:bg-blue-500 hover:text-white rounded-xl pl-4 py-2"><a href="{{ '/about-shop' }}">3.
                    Shop</a></p>

        </div>
        <div class="col-span-9">
            <div class="space-y-4 lg:text-lg leading-loose">
                <h1 class="font-bold text-3xl lg:text-4xl mb-4 text-black">
                    Return Policy
                </h1>
                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    Our goal is to ensure your complete satisfaction
                </h1>
                <p>
                    If for whatever reason, youa re dissatisfied with your purchase. you can return it to B&H within 30
                    days of purchase date subject to conditions below. Claims for missing items or items damaged in
                    transit must be received within two business days of receipt of merchandise.
                </p>

                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    Refunds and Credits
                </h1>
                <p>
                    Refunds on returned items will be issued in the same payment form as tendered at the time of
                    purchase. Once we receive and inspect the product we will credit your account. Please allow 5-7 days
                    for a credit to appear on your account. If Payment was made by cheque, the refund cheque will not be
                    issued before 10 business days after the date of purchase.
                </p>
                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    Exchanges
                </h1>
                <p>
                    If the item was sent back for an exchange, please allow 3-5 business days for teh replacement to be
                    processed.
                </p>
                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    Conditions
                </h1>
                <p>
                    Please read all conditions below. if conditions are not met, B&H reserves the right to refuse the
                    return or to charge a restocking fee not less than 15%.
                </p>
                <p>
                    All returned or exchanged items must be in new condition, in their original box, and must include
                    all packing material, blank warranty cards, manuals, and all accessories.
                </p>
                <p>
                    B&H is not responsible for personal data or items left in returned merchandise.
                </p>
                <p>
                    B&H is not responsible for any consequential ar incidental damages resulting from the sale or use of
                    any merchandise bought from us. We are responsible for the monetary value of the merchandise only.
                </p>
                <h1 class="font-bold text-2xl lg:text-4xl mb-4 text-blue-500">
                    No Return/Exchange on the following:
                </h1>
                <p>
                    TVs combos and monitors 37" and larger once any of the packaging has been opened.
                </p>
                <p>
                    Computers and Computer Software. once any of teh manufacturer's packaging has been opened.
                </p>
                <p>
                    Electronic Software Downloads are not returnable or refundable.
                </p>
            </div>
        </div>
    </article>
@endsection
