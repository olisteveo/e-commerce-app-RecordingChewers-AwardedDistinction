<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Orders
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div style="display: flex; justify-content: center;">
                <div class = "block mt-1 w-100%">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="p-6 ">
                                <table class = "mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Order #</strong> {{$order->transaction_id}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Item</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->product->product_name}} By {{$order->product->artist_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{ route('product.view', $order->product->id) }}" style="cursor: pointer; title="view"><img src="{{ asset("/storage/artwork/" . $order->product->artwork) }}" alt="{{ $order->product->artwork }} Image" style="width: 300px; height: auto;" /></a></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Medium</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->product->medium}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Date</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->created_at->format("D jS F Y H:i")}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Price</strong></td>
                                        </tr>
                                        <tr>
                                            <td>&pound;{{$order->subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Customer</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Customer Email</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{$order->user->email}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
