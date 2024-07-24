<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="p-6">
                &#9734; Recording Chewers Hottest Products &#9734;
            </div>
        </div>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {{ session("message") }}
            </div>
        </div>
        @endif
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div style="display: flex; justify-content: center;">
                <div class = "block mt-1 w-100%">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @foreach ($products as $product)
                            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mt-4 mb-4">
                                <div class="p-6 ">
                                    <h3 class="mb-4" style="display: flex; justify-content: right; align-items:center;">
                                        <span style="flex: auto;">&#9734; {{ $product->artist_name }} - {{ $product->product_name }}</span>
                                        <span>
                                            <a href="{{route("product.view", $product->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">View Product</a>
                                        </span>
                                    </h3>
                                    <div class="card mb-4">
                                        <img class="product_result_pic" src="{{ asset("/storage/artwork/" . $product->artwork) }}" alt="{{ $product->artwork }} Image" style="width: 600px; height: auto;" />
                                    </div>
                                    <p><strong>Genre</strong> - <i>{{ $product->genre }}</i></p>
                                    <p><strong>Medium</strong> - <i>{{ $product->medium }}</i></p>
                                    <p><strong>Released</strong> <i>{{ $product->publication_date->format("M Y") }}</i></p>
                                    @auth
                                    <p><strong>Only</strong> &pound;<i>{{ $product->retail_price }}</i></p>
                                    <p><strong>{{ $product->stock }}</strong> <i>left in stock</i></p>
                                    @endauth
                                    @guest
                                    <a href={{route("login")}} title="Login to view">Login to view price &amp; availability </a>
                                    @endguest
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
