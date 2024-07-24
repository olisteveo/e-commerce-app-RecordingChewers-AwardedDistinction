<x-app-layout>
    <x-slot name="header" style="margin-bottom: 100px;">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 dark:bg-gray-800 shadow sm:rounded-lg mt-4">
                <div class="p-6 rounded border-gray-300 shadow-sm focus:ring-indigo-500">
                    {!! Form::open(['action'=>'App\Http\Controllers\Dashboard\Admin\SupplierController@store', 'method'=>'POST' ,'enctype' => 'multipart/form-data', 'class' => 'create-supplier-form']) !!}
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-3 w-full">
                            {{Form::label('supplier_name', 'Supplier Name')}}
                            <div class="form-group">
                                {{Form::text('supplier_name', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required','style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('supplier_name'))
                                    <span class="text-danger">{{ $errors->first('supplier_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-3 w-full">
                            {{Form::label('email', 'Email')}}
                            <div class="form-group">
                                {{Form::text('email', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required','style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-3 w-full">
                            {{Form::label('phone', 'Phone')}}
                            <div class="form-group">
                                {{Form::text('phone', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required','style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-3 w-100%">
                            {{Form::label('address', 'Address')}}
                            <div class="form-group">
                                {{Form::textarea('address', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required','style'=>"background-color:#111827; color:#fff"])}}
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br />
                    <div style="display: flex; justify-content: left;">
                        <div class = "block mt-1 w-50%">
                            <div class="form-group">
                                {{Form::submit('Create', ['class'=>'supplier-create-btn', 'style'=>'display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;'])}}
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
                $(".supplier-create-btn").on("click", function(e) {
                    e.preventDefault();
                    form = $(this).closest(".create-supplier-form");
                    form.trigger("submit");
                });
        </script>
    </x-slot>
</x-app-layout>
