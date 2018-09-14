<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'description' => $this->description,
            'image' => $this->image,
            'images' => empty($this->images)? [] : json_decode($this->images,true),
            'on_sale' => $this->on_sale,
            'product_classify_id' => $this->product_classify_id,
            'rating' => $this->rating,
            'sold_count' => $this->sold_count,
            'review_count' => $this->review_count,
            'price' => $this->price,
            'colorAttribute' => $this->getColorAttribute($this->productSkuAttribute,$this->skus),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    protected function getColorAttribute($productSkuAttribute,$skus){
        $attributes = [];
        $skus->each(function ($item,$key) use (&$attributes){
            $attributes[] = json_decode($item->attributes,true);
        });
        $productSkuAttribute->each(function ($item, $key) use ($attributes,&$res){
            if($item->name == '颜色分类'){
                $_child = [];
                foreach($attributes as $k => $v){
                    foreach($v as $ks => $vs){
                        if($item->id == $vs['id']){
                            $_child[] = $vs['value'];
                        }
                    }
                }
                $item->_child = array_unique($_child);
            }
        });
        return $productSkuAttribute->toArray();
    }
}
