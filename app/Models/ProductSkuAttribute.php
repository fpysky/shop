<?php

namespace App\Models;

class ProductSkuAttribute extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function store($attributes){
        $res = ProductSkuAttribute::where([['name','=',$attributes['name']],['product_id','=',$attributes['product_id']]])->first();
        if(!empty($res)){
            return response(['status_code' => 1,'message' => '已保存或名字重复!'],422);
        }
        if($attributes['id'] == 0){
            $productSkuAttribute = new ProductSkuAttribute();
            $productSkuAttribute->id = $attributes['id'];
            $productSkuAttribute->product_id = $attributes['product_id'];
            $productSkuAttribute->name = $attributes['name'];
            $productSkuAttribute->save();
            return response(['status_code' => 0,'message' => '保存成功','list' => $productSkuAttribute]);
        }else{
            $productSkuAttribute = ProductSkuAttribute::find($attributes['id']);
            $productSkuAttribute->product_id = $attributes['product_id'];
            $productSkuAttribute->name = $attributes['name'];
            $productSkuAttribute->save();
            return response(['status_code' => 0,'message' => '修改成功','list' => $productSkuAttribute]);
        }
    }

    public static function getData($productId){
        $productSkuAttribute = ProductSkuAttribute::where('product_id','=',$productId)->get();
        return response(['status_code' => 0,'list' => $productSkuAttribute]);
    }

    public static function destroy($id){
        ProductSkuAttribute::where('id','=',$id)->delete();
        return response(['status_code' => 0,'message' => '删除成功']);
    }
}
