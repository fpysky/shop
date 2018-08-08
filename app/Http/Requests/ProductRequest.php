<?php

namespace App\Http\Requests;

class ProductRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
            'on_sale' => 'required',
            'product_classify_id' => 'required|Integer',
        ];
    }
}
