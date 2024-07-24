<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
        <br />
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="p-6">
                {{ $orders->total() }}{{ __(" Pending Recording Chewers Orders ")}}
            </div>
        </div>
        <div style="display: flex; justify-content: center;">
            <div class = "block mt-1 w-full">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                    {!! Form::open([
                        "class" => 'mt-6 space-y-6',
                        'action'=>'App\Http\Controllers\Dashboard\Admin\SearchOrdersController@orders',
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
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if($orders->hasMorePages())
                <div class="max-w-7xl mt-4 p-4 mx-auto sm:px-6 lg:px-8">
                    {{ $orders->links() }}
                </div>
                @endif
                @foreach ($orders as $order)
                    <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mb-4 mt-4">
                        <div class="p-6" style="display: flex; justify-content: right;">
                            <div style="flex:auto;">
                                <h3>Order ID - {{$order->transaction_id}} - {{$order->product->product_name}} - {{$order->created_at->diffForHumans()}}</h3>
                            </div>
                            <div class="ml-4">
                                <a href="{{route("orders.view", $order->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
