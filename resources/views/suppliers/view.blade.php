<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {{ session("message") }}
            </div>
        </div>
        @endif
        <p><a href="{{route("dashboard.admin.suppliers")}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">Back</a></p>
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div style="display: flex; justify-content: center;">
                <div class = "block mt-1 w-100%">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="p-6 ">
                                <h3>{{ nl2br($supplier->supplier_name) }}</h3>
                                <br />
                                <h3> {{ nl2br($supplier->email) }}</h3>
                                <br />
                                <h3> {{ nl2br($supplier->phone) }}</h3>
                                <br />
                                <h3> {{ nl2br($supplier->address) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
