<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {!! session("message") !!}
            </div>
        </div>
        @endif
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="p-6">
                {{ __("There are ") }}{{ $hot_products->count() }}{{ __(" Hot Products. ")}}

            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($hot_products as $product)
                <div class="p-1 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mb-4 mt-4">
                    <div style="display: flex; justify-content: right;">
                        <div style="flex:auto;">
                            <h3>{{ $product->product_name }} By {{ $product->artist_name }}</h3>
                            <h3>Retail Price: &pound;{{ $product->retail_price }}</h3>
                            <h3>Stock Level: {{ $product->stock }}</h3>
                        </div>
                        <div class="ml-4">
                            {!!Form::open(['action' => ['\App\Http\Controllers\Dashboard\Admin\HotProductController@toggle_off', $product->id], 'method'=>'POST', 'class' => 'toggle-hot-form' ]) !!}
                                <a href="#" data-products_id ="{{$product->id}}" class="toggle-off-btn" style="display: inline-block; padding: 6px 18px; background-color: rgb(247, 174, 174); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(247, 33, 33); text-decoration: none; cursor: pointer;">Toggle Hot Off</a>
                            {!!Form::close() !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if($products->hasMorePages())
            <div class="max-w-7xl mt-4 p-4 mx-auto sm:px-6 lg:px-8">
                {{ $products->links() }}
            </div>
            @endif
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($products as $product)
                <div class="p-1 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mb-4 mt-4">
                    <div style="display: flex; justify-content: right;">
                        <div style="flex:auto;">
                            <h3>{{ $product->product_name }} By {{ $product->artist_name }}</h3>
                            <h3>Retail Price: £{{ $product->retail_price }}</h3>
                            <h3>Stock Level: {{ $product->stock }}</h3>
                        </div>
                        <div class="ml-4">
                            {!!Form::open(['action' => ['\App\Http\Controllers\Dashboard\Admin\HotProductController@toggle_on', $product->id], 'method'=>'POST', 'class' => 'toggle-hot-form' ]) !!}
                                <a href="#" data-products_id ="{{$product->id}}" class="toggle-on-btn" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(16, 230, 98); text-decoration: none; cursor: pointer;">Toggle Hot On</a>
                            {!!Form::close() !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    function ConfirmToggleDialog(title, message, form) {
    $('<div></div>').appendTo('body')
        .html('<div><h6>' + message + '?</h6></div>')
        .dialog({
        modal: true,
        title: title,
        zIndex: 10000,
        autoOpen: true,
        width: 'auto',
        resizable: false,
        buttons: {
            Yes: function() {
            form.trigger("submit");

            $(this).dialog("close");
            },
            No: function() {

            $(this).dialog("close");
            }
        },
        close: function(event, ui) {
            $(this).remove();
        }
        });
    };
    $(document).ready(function() {
        $(".toggle-on-btn").on("click", function(e) {
            form = $(this).closest(".toggle-hot-form");
            ConfirmToggleDialog('Confirm Toggle Hot On', 'Are you sure you wish to make this products hot', form);
        });
        $(".toggle-off-btn").on("click", function(e) {
            form = $(this).closest(".toggle-hot-form");
            ConfirmToggleDialog('Confirm Toggle Hot Off', 'Are you sure you wish to remove this products hot status', form);
        });
    });
</script>
