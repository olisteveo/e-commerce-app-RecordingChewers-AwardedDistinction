<?php

namespace App\Http\Requests\Dashboard\Admin\Suppliers;

use App\Http\Requests\Dashboard\Admin\AdminRequest;

class CreateSupplierRequest extends AdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "supplier_name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required"
        ];
    }
}
