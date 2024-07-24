<link rel="stylesheet" href="form.scss">

<x-app-layout>
    <x-slot name="header">
        <h2 class = "font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-3">
            {{ $page->title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-2">
                        <header>
                            <h2 class="text-lg text-center font-medium text-gray-100">
                                {{ __('Create an Artist Profile & Upload a Sample of Your Music') }}
                            </h2>
                        </header>
                    </div>
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-2">
                        {!! Form::open([
                            "class" => 'mt-3 space-y-6',
                            'action'=>'App\Http\Controllers\Dashboard\ArtistController@store',
                            'method'=>'POST',
                            'enctype' => 'multipart/form-data'
                        ]) !!}
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('name', 'Artist Name')}}
                            <div class="form-group">
                                {{Form::text('name', '', ['class'=>'form-control','placeholder'=>'', 'style'=>"background-color:#111827; color:#fff"])}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('description', 'Description')}}
                            <div class="form-group">
                                {{Form::text('description', '', ['class'=>'form-control','placeholder'=>'', 'style'=>"background-color:#111827; color:#fff"])}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('song_sample_name', 'Sample Name')}}
                            <div class="form-group">
                                {{Form::text('song_sample_name', '', ['class'=>'form-control','placeholder'=>'', 'style'=>"background-color:#111827; color:#fff"])}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('sample_comments', 'Sample Comments')}}
                            <div class="form-group">
                                {{Form::textarea('sample_comments', '', ['class'=>'form-control','placeholder'=>'', 'style'=>"background-color:#111827; color:#fff"])}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-100%">
                            {{Form::label('profile_pic', 'Profile Picture')}}
                            <div class="form-group">
                                {{Form::file('profile_pic')}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-100%">
                            {{Form::label('song_sample', 'Upload File')}}
                            <div class="form-group">
                                {{Form::file('song_sample')}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-100%">
                            {{Form::label('song_art', 'Sample Art')}}
                            <div class="form-group">
                                {{Form::file('song_art')}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class="flex items-center gap-4">
                          <x-primary-button style="padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">
                            {{ __('Create Artist Account') }}
                          </x-primary-button>
                        </div>
                      </div>
                    {!! Form::close()!!}
                </div>
            </div>
    </x-slot>
</x-app-layout>
