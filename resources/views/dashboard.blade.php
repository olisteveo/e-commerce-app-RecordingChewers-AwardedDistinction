<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    &#9989; {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        @if(auth()->user()->roles_id != \App\Models\Role::ARTIST_ROLE)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="guitar-start p-6 text-gray-900 dark:text-gray-100">
                        <span class="guitar-start" style="font-size:2em;">&#127928;</span>&nbsp;{!! \App\Models\Page::contentFromName("become-artist")->content !!}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
