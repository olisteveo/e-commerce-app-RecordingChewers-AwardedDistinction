<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {!! session("message") !!}
            </div>
        </div>
        @endif
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div style="display: flex; justify-content: center;">
                <div class = "block mt-1 w-100%">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="p-6 ">
                                <h3 class="mb-4">
                                    <span style="flex: auto;">{{ $product->artist_name }} - {{ $product->product_name }}</span>
                                </h3>
                                @auth
                                <div class="mb-4" style="display: flex; justify-content: right; align-items:center;">
                                    <div style="flex: auto;">
                                        <strong>Only</strong> &pound;<i>{{ $product->retail_price }}</i>
                                    </div>
                                    @if($product->stock)
                                        <div class="ml-4">
                                            {!!Form::open(['action' => ['\App\Http\Controllers\CheckoutController@stripeCheckout', $product->id], 'method'=>'POST' ]) !!}
                                            <button type="submit" id="checkout-button" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">Buy Now</button>
                                            {!!Form::close() !!}
                                        </div>
                                    @endif
                                </div>
                                @endauth
                                <div class="card mb-4">
                                    <img class="product_result_pic" src="{{ asset("/storage/artwork/" . $product->artwork) }}" alt="{{ $product->artwork }} Image" style="width: 600px; height: auto;" />
                                </div>
                                <p><strong>Genre</strong> - <i>{{ $product->genre }}</i></p>
                                <p><strong>Medium</strong> - <i>{{ $product->medium }}</i></p>
                                <p><strong>Released</strong> <i>{{ $product->publication_date->format("M Y") }}</i></p>
                                @auth
                                @if($product->stock)
                                    <p><strong>{{ $product->stock }}</strong> <i>left in stock</i></p>
                                @else
                                    <p><strong>Out of Stock</strong></p>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
