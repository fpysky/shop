<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductSkuResource extends Resource
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
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'color' => $this->color,
            'attributes' => json_decode($this->attributes,true),
            'images' => json_decode($this->images,true),
            'stock' => $this->stock,
            'product_id' => $this->product_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
