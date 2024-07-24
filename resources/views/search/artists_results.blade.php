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
                {{ __("Artist Search") }}
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Search for Recording Chewers artists using artist name and description.') }}
                </p>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-full">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                            {!! Form::open([
                                "class" => 'mt-6 space-y-6',
                                'action'=>'App\Http\Controllers\SearchController@artists',
                                'method'=>'GET'
                            ]) !!}
                            <div class="form-group">
                                {{Form::label('term', ' ')}}
                                {{Form::text('term', '', ['class'=>'form-control','placeholder'=>'','style'=>"background-color:#111827; color:white;"])}}
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
                <h1 class="text-4xl">{{ $result->name }}</h1>
                <div class="card flex flex-space-between mb-4">
                    <img class="artist-result-pic mr-4" src="{{ asset("/storage/profile_pics/" . $result->profile_pic) }}" alt="{{ $result->description }}"/>
                    <p>{{ nl2br($result->description) }}</p>
                </div>
                @auth
                <h4>Sample: {{ $result->song_sample_name }}</h4>
                <div class="card flex flex-space-between">
                    <img class="song-art mr-4" src="{{ asset("/storage/song_art/" . $result->song_art) }}" alt="{{ $result->song_sample_name }}"/>
                    <p>{{ nl2br($result->song_sample_comments) }}</p>
                </div>
                @endauth
            </div>
        </div>
        @endforeach
    </x-slot>
</x-guest-layout>
