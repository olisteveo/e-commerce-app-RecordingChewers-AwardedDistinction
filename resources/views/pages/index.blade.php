<x-guest-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: center;">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $page->title }}
            </h1>
        </div>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mt-3 mb-3 mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                {!! $page->content !!}
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 justify-content: centre;">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                <p><a href="{{route("products")}}" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">View All Hot Products</a></p>
                    <br />
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 mb-1">
                        View Recording Chewers Hot Products - Our Most Rated Products This Month
                    </p>
                    <br />
                <div class="flex lg:flex-row sm:flex-col -mx-6">
                    @foreach ($hot_products->sortBy($hot_prod_sort)->values()->all() as $product)
                    <div class="w-full px-6 mb-8">
                        <a href="{{ route('product.view', $product->id) }}" style="cursor: pointer;">
                            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                                <div class="relative pb-2/3">
                                    <img src="{{ asset('/storage/artwork/' . $product->artwork) }}" alt="{{ $product->product_name }} Image" class="absolute object-cover w-full h-full">
                                </div>
                                <div class="px-4 py-2">
                                    <h3 class="text-gray-800 dark:text-white font-bold text-xl mb-2">
                                        {{ $product->product_name }}
                                    </h3>
                                    <br />
                                    <!-- 4:45 fix -->
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <p class="text-gray-700 dark:text-gray-400 text-base mb-3">
                                        {{ $product->genre }} - {{ $product->medium }}
                                    </p>
                                    @auth
                                    @if ($product->stock)
                                    <small><i>{{ $product->stock }}</i> remaining in stock.</small>
                                    @else
                                    <small><strong>Sold Out</strong></small>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="bodyslot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h2 class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                {{ __($page->content) }}
            </h2>
        </div>
    </x-slot>
</x-guest-layout>
