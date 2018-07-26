<?php

namespace App\Models;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSkuResource;
use Auth;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price'
    ];
    protected $casts = [
        'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
    ];
    // 与商品SKU关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }
        return \Storage::disk('public')->url($this->attributes['image']);
    }

    //热品推荐
    public static function hotProducts(){
        $list = Product::where('on_sale','=',1)->take(10)->get();
        $list = ProductResource::collection($list);
        return response(['status_code' => 0,'list' => $list]);
    }

    //商品详情
    public static function products($id){
        $product = Product::where('id','=',$id)->firstOrFail();
        $product = new ProductResource($product);
        $productSkus = ProductSkuResource::collection($product->skus);
        $list['product'] = $product;
        $list['productSkus'] = $productSkus;
        return response(['status_code' => 0,'list' => $list]);
    }

    //收藏商品
    public static function favor($id){
        $user = User::find(Auth::user()->id);
        if ($user->favoriteProducts()->find($id)) {
            return response(['status_code' => 0,'message' => '收藏成功']);
        }
        $product = Product::where('id','=',$id)->first();
        if(empty($product)){
            return response(['status_code' => 1,'message' => '找不到该商品'],404);
        }
        $user->favoriteProducts()->attach($product);
        return response(['status_code' => 0,'message' => '收藏成功']);
    }
    //取消收藏
    public static function disfavor($id){
        $user = User::find(Auth::user()->id);
        $product = Product::where('id','=',$id)->first();
        if(empty($product)){
            return response(['status_code' => 1,'message' => '找不到该商品'],404);
        }
        $user->favoriteProducts()->detach($product);
        return response(['status_code' => 0,'message' => '取消收藏成功']);
    }

    //收藏列表
    public static function favorites($args){
        $user = User::find(Auth::user()->id);
        $products = $user->favoriteProducts()->paginate($args['pSize']);
        $total = $products->total();
        $products = ProductResource::collection($products);
        $totalPage = ceil($total / $args['pSize']);
        return response(['status_code' => 0,'list' => $products,'totalPage' => $totalPage,'total' => $total]);
    }
}
