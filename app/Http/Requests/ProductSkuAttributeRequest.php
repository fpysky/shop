<?php

namespace App\Http\Requests;

class ProductSkuAttributeRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required',
            'product_id' => 'required',
        ];
    }
}
