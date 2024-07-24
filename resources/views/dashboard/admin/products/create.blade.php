<x-app-layout>
    <x-slot name="header" style="margin-bottom: 100px;">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-100 dark:bg-gray-800 shadow sm:rounded-lg mt-4">
                <div class="p-6 rounded border-gray-300 shadow-sm focus:ring-indigo-500">
                    {!! Form::open(['action'=>'App\Http\Controllers\Dashboard\Admin\ProductController@store', 'method'=>'POST' ,'enctype' => 'multipart/form-data', 'class' => 'create-product-form']) !!}
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('product_name', 'Product Name')}}
                            <div class="form-group">
                                {{Form::text('product_name', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('artist_name', 'Artist Name')}}
                            <div class="form-group">
                                {{Form::text('artist_name', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('artist_name'))
                                    <span class="text-danger">{{ $errors->first('artist_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-100%">
                            <h3>Product Artwork</h3>
                            <div class="form-group">
                                {{Form::file('artwork')}}
                                @if ($errors->has('artwork'))
                                    <span class="text-danger">{{ $errors->first('artwork') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('genre', 'Genre')}}
                            <div class="form-group">
                                {{Form::text('genre', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('genre'))
                                    <span class="text-danger">{{ $errors->first('genre') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('medium', 'Medium')}}
                            <div class="form-group">
                                {{Form::text('medium', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('medium'))
                                    <span class="text-danger">{{ $errors->first('medium') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('publication_date', 'Publication Date')}}
                            <div class="form-group">
                                {{Form::text('publication_date', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('publication_date'))
                                    <span class="text-danger">{{ $errors->first('publication_date') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('stock', 'Stock Level')}}
                            <div class="form-group">
                                {{Form::text('stock', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('stock'))
                                    <span class="text-danger">{{ $errors->first('stock') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('retail_price', 'Retail price')}}
                            <div class="form-group">
                                {{Form::text('retail_price', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('retail_price'))
                                    <span class="text-danger">{{ $errors->first('retail_price') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-full">
                            {{Form::label('trade_price', 'Trade price')}}
                            <div class="form-group">
                                {{Form::text('trade_price', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required', 'style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('trade_price'))
                                    <span class="text-danger">{{ $errors->first('trade_price') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class="block mt-3 w-100%">
                            {{ Form::label('hot_product', 'Hot Product') }}
                            <div class="form-group">
                                <div class="form-check">
                                    {{ Form::checkbox('hot_product', '1', true, ['class' => 'form-check-input']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-100%">
                            {{Form::label('supplier_id', 'Supplier')}}
                            <div class="form-group">
                                {{Form::select('supplier_id', $suppliers->pluck("supplier_name", "id"), ['class'=>'form-control,  color:#000'])}}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <div class = "block mt-1 w-50%">
                            <div class="form-group">
                                {{Form::submit('Create', ['class'=>'product-create-btn', 'style'=>'display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;'])}}
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
                $(".product-create-btn").on("click", function(e) {
                    e.preventDefault();
                    form = $(this).closest(".create-product-form");
                    form.trigger("submit");
                });
        </script>
    </x-slot>
</x-app-layout>
