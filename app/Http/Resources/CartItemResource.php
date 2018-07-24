<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CartItemResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_sku_id' => $this->product_sku_id,
            'amount' => $this->amount,
        ];
    }
}
