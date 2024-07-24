<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $page->title }}
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mb-3">
                {!! $page->content !!}
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-3">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                <h2>Contact Information</h2>
                <p></p>
                <table class = "mt-1 text-sm text-gray-600 dark:text-gray-400">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                        <td><strong>Email</strong></td>
                        <td> - vinylchomp@example.com</td>
                        </tr>
                        <tr>
                        <td><strong>Phone</strong></td>
                        <td> - 01862 929292</td>
                        </tr>
                    </tbody>
                </table>
          </div>
        </div>
        @auth
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-3">
                <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mb-3">
                    <form action="{{ route('enquiries.store') }}" method="POST">
                        @csrf
                        <h2>Enquiry</h2>
                        <table class = "mt-1 text-sm text-gray-600 dark:text-gray-400">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                <td>If Your Enquiry is Related to a Recording Chewers Order Please Include Your Order #</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group text-white-100 border-gray-300 dark:text-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                <div>
                                    <br />
                                    <div>
                                        <textarea name="enquiry" id="enquiry" class="form-control text-white-500" rows="5" cols="80" style="background-color:#111827; color:#fff">{{ old('enquiry') }}</textarea>
                                        @error('enquiry')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <br />
                        <button type="submit" class="btn-btn-primary" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">Submit</button>
                    </form>
                </div>
            </div>
        @endauth
    </x-slot>
</x-guest-layout>
