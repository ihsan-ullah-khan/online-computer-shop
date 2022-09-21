@extends('layouts.user-home')
@section('title', 'Feedback')
@section('content')
    <article class="max-w-5xl mx-auto mt-8 lg:grid space-y-6 lg:mt-20 lg:grid-cols-12 gap-x-10">
        <div class="col-span-3 lg:text-center lg:pt-14 mb-10">
            <a class="text-lg font-semibold hover:text-blue-500" href="{{ route('contact.index') }}">Feedback</a>
        </div>

        <div class="col-span-9">
            <div class="w-full overflow-x-auto">
                @if(session()->has('flash'))
                    <x-alert>{{ session('flash')['message'] }}</x-alert>
                @endif
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Subject</th>
                        <th class="px-4 py-3">Message</th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @forelse($messages as $message)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $message->subject }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $message->message }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-gray-700 dark:text-gray-400 bg-orange-100">
                            <td colspan="4" class="px-4 py-3">
                                <div class="flex justify-center text-sm">
                                    <p class="font-semibold">NO Messages Available</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="flex items-center justify-end">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </article>
@endsection
