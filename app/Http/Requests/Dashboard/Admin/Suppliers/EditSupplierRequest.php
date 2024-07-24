<?php

namespace App\Http\Requests\Dashboard\Admin\Suppliers;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class EditSupplierRequest extends AdminRequest
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
            "supplier_name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required"
        ];
    }
}
