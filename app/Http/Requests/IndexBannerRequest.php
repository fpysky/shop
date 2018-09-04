<?php

namespace App\Http\Requests;

class IndexBannerRequest extends Request
{
    public function rules()
    {
        return [
            'product_id' => 'required',
            'image' => 'required',
        ];
    }
}
