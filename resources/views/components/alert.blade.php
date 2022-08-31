<div
    {!! $attributes->merge(['class' => 'block w-full p-2 my-2 rounded-md shadow-sm border-gray-300  ']) !!} x-data="{ show:true}"
    x-show="show" x-init="setTimeout(() => { show=false}, 5000)">
    <div class="flex relative items-center justify-between">
        <div class="m-auto w-full">
            <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg dark:bg-gray-800">
                <div class="flex flex-row">
                    <div class="px-2">
                        <svg width="24" height="24" viewBox="0 0 1792 1792" fill="#44C997"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/>
                        </svg>
                    </div>
                    <div class="ml-2 mr-6">
                        <span class="font-semibold text-gray-800 dark:text-gray-100">{{$slot}}</span>
                    </div>
                </div>
            </div>
        </div>
            <button class="absolute right-0 items-center justify-around px-2" @click.prevent="show= false">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="#44C997"
                     stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
    </div>
</div>
</div>
