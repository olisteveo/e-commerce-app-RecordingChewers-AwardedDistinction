<?php

namespace App\Http\Requests\Dashboard\Admin\Products;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class CreateProductRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "product_name" => "required",
            "artist_name" => "required",
            "artwork" => "required",
            "genre" => "required",
            "medium" => "required",
            "publication_date" => "required",
            "stock" => "required",
            "hot_product" => "",
            // regex lifted from https://stackoverflow.com/questions/33624710/how-to-validate-money-in-laravel5-request-class
            "retail_price" => "required|regex:/^\d+(\.\d{1,2})?$/",
            "trade_price" => "required|regex:/^\d+(\.\d{1,2})?$/",
            "supplier_id" => "required|numeric|min:1"
        ];
    }
}
