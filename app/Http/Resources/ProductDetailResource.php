<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductDetailResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $args = $request->all();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'images' => json_decode($this->images,true),
            'on_sale' => $this->on_sale,
            'product_classify_id' => $this->product_classify_id,
            'rating' => $this->rating,
            'sold_count' => $this->sold_count,
            'review_count' => $this->review_count,
            'price' => $this->price,
            'productSkuAttribute' => $this->getProductSkuAttribute($this->productSkuAttribute,$this->skus),
            'sku' => $this->getSku($args,$this->skus),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    protected function getSku($args,$skus){
        $sku = collect();
        $skus->each(function ($item,$key) use ($args,&$sku){
            $bool = true;
            $attributes = json_decode($item->attributes,true);
            foreach($attributes as $k => $v){
                foreach($args['attributes'] as $ks => $vs){
                    if($v['id'] == $vs['id']){
                        if(!($v['value'] == $vs['value'])){
                            $bool = false;
                        }
                    }
                }
            }
            if($args['color'] != $item->color){
                $bool = false;
            }
            if($bool){
                $sku = $item;
            }
        });
        return $sku;
    }

    protected function getProductSkuAttribute($productSkuAttribute,$skus){
        $attributes = [];
        $skus->each(function ($item,$key) use (&$attributes){
            $attributes[] = json_decode($item->attributes,true);
        });
        $productSkuAttribute->each(function ($item, $key) use ($attributes){
            $_child = [];
            foreach($attributes as $k => $v){
                foreach($v as $ks => $vs){
                    if($item->id == $vs['id']){
                        $_child[] = $vs['value'];
                    }
                }
            }
            $item->_child = array_unique($_child);
        });
        return $productSkuAttribute;
    }
}
