<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
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
                    <div class="p-1 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mb-4 mt-4">
                        <div style="display: flex; justify-content: right;">
                            <div style="flex:auto;">
                                <h3>Order # - {{$order->transaction_id}} - {{$order->product->product_name}} - {{$order->created_at->diffForHumans()}}</h3>
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
