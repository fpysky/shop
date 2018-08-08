<?php

namespace App\Http\Requests;

class ProductDetailRequest extends Request
{
    public function rules()
    {
        return [
            'id' => 'required|Integer',
            'attributes' => 'required'
        ];
    }
}
