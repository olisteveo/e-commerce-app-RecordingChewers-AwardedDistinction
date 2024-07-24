<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Showing ({{ $results->count() }}) results for &quot;{{ $term }}&quot;
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                {{ __($page->content) }}
            </div>
        </div>
        <div class="max-w-7xl mt-4 mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                {{ __("Product Search Form") }}
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Search for Recording Chewers products.') }}
                </p>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-full">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                            {!! Form::open([
                                "class" => 'mt-6 space-y-6',
                                'action'=>'App\Http\Controllers\SearchController@products',
                                'method'=>'GET'
                            ]) !!}
                            <div class="form-group">
                                {{ Form::label('term', ' ') }}
                                {{ Form::text('term', '', ['class' => 'form-control', 'placeholder' => '', 'style' => 'background-color:#111827; color:white;']) }}
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">{{ __('Search') }}</x-primary-button>
                            </div>
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($results->hasMorePages())
        <div class="max-w-7xl mt-4 p-4 mx-auto sm:px-6 lg:px-8">
            {{ $results->links() }}
        </div>
        @endif
        @foreach ($results as $result)
        <div class="max-w-7xl mt-4 mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                <h1 class="text-4xl">{{ $result->artist_name }} - {{ $result->product_name }}</h1>
                <div class="card flex flex-space-between mb-4">
                    <img class="artist-result-pic mr-4" src="{{ asset("/storage/artwork/" . $result->artwork) }}" alt="{{ $result->product_name }}"/>
                    <div>
                        <h4 class="text-4sm">Genre: <small class="text-3sm">{{ $result->genre }}</small></h4>
                        <h4 class="text-4sm">Medium: <small class="text-3sm">{{ $result->medium }}</small></h4>
                        <br />
                        <a href="{{route("product.view", $result->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">View Product</a></p>
                        @auth
                        <div class="card flex flex-space-between">
                            <span class="mt-3">&pound;{{ $result->retail_price }}</span>
                            {{-- add to cart auth button --}}
                        </div>
                        <div class="card flex flex-space-between">
                        <span class="mt-4"><small>{{ $result->stock }} left in stock</small></span>
                        </div>
                        {{-- {{ dump($result) }} --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </x-slot>
</x-guest-layout>
