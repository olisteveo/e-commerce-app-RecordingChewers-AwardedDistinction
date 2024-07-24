<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Transaction Completed &#9989;
        </h2>
    @if(session("message"))
    <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
        <div class="p-6">
            {!! session("message") !!}
        </div>
    </div>
    @endif
    </x-slot>
    <x-slot name="slot">
        <div style="display: flex; justify-content: center;">
            <div class = "block mt-1 w-100%">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="p-6 ">
                            <table class = "mt-1 text-m text-gray-600 dark:text-gray-400">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-xl"><strong>Order #</strong>{{$order->transaction_id}}</td>
                                    <tr>
                                        <td>{{$product->product_name}} By {{$product->artist_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('product.view', $product->id) }}" style="cursor: pointer; title="view"><img src="{{ asset("/storage/artwork/" . $order->product->artwork) }}" alt="{{ $order->product->artwork }} Image" style="width: 200px; height: auto;" /></a></td>
                                    </tr>
                                    <tr>
                                        <td><i>{{$product->medium}}</i></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ordered</strong> {{$order->created_at->format("D jS F Y H:i")}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Price</strong></td>
                                    </tr>
                                    <tr>
                                        <td>&pound;{{$order->subtotal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-guest-layout>

