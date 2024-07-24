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
            <div class="p-6" style="display: flex; justify-content: right;">
                <div style="flex:auto;">
                {{ __("There are ") }}{{ $suppliers->total() }}{{ __(" suppliers. ")}}
            </div>
            <div class="ml-4">
                <a href="{{ route('dashboard.admin.suppliers.create') }}" class="supplier-create-btn" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(16, 230, 98); text-decoration: none; cursor: pointer;">Add Supplier</a>
            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if($suppliers->hasMorePages())
                <div class="max-w-7xl mt-4 p-4 mx-auto sm:px-6 lg:px-8">
                    {{ $suppliers->links() }}
                </div>
                @endif
                @foreach ($suppliers as $supplier)
                <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mb-4 mt-4">
                    <div style="display: flex; justify-content: right;">
                        <div style="flex:auto;">
                            <h3>{{ $supplier->supplier_name }}</h3>
                            <h3>{{ $supplier->email }}</h3>
                        </div>
                        <div class="ml-4">
                            <a href="{{route("dashboard.admin.suppliers.view", $supplier->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">View</a></p>
                        </div>
                        <div class="ml-4">
                            <a href="{{route("dashboard.admin.suppliers.edit", $supplier->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">Edit</a>
                        </div>
                        <div class="ml-4">
                            {!!Form::open(['action' => ['\App\Http\Controllers\Dashboard\Admin\SupplierController@destroy', $supplier->id], 'method'=>'POST', 'class' => 'delete-form' ]) !!}
                                {!!Form::hidden('_method', 'DELETE' )!!}
                                <a href="#" data-suppliers_id ="{{$supplier->id}}" class="supplier-delete-btn" style="display: inline-block; padding: 6px 18px; background-color: rgb(247, 174, 174); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(247, 33, 33); text-decoration: none; cursor: pointer;">Delete</a>
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
    function ConfirmDeleteDialog(title, message, form) {
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
        $(".supplier-delete-btn").on("click", function(e) {
            form = $(this).closest(".delete-form");
            ConfirmDeleteDialog('Confirm Delete', 'Are you sure you wish to delete this supplier', form);
        });
    });
</script>
