<?php

namespace App\Http\Requests\Dashboard\Admin\Products;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class EditProductRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "id" => "required|numeric|min:1",
            "product_name" => "required",
            "artist_name" => "required",
            "genre" => "required",
            "medium" => "required",
            "publication_date" => "required",
            "hot_product" => "",
            "stock" => "required|numeric",
            "retail_price" => "required|regex:/^\d+(\.\d{1,2})?$/",
            "trade_price" => "required|regex:/^\d+(\.\d{1,2})?$/",
            "supplier_id" => "required|numeric|min:1"
        ];
    }
}
