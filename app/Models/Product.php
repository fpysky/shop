<?php

namespace App\Models;

use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSkuResource;
use Auth;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price', 'product_classify_id'
    ];

    protected $casts = [
        'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
    ];

    public static function destroy($ids){
        Product::whereIn('id',$ids)->delete();
        return response(['status_code' => 0,'message' => '操作成功']);
    }

    public static function getList($args){
        $where = [];
        if(!empty($args['title'])){
            $where = [['title','=',$args['title']]];
        }
        $list = Product::where($where)->paginate($args['pSize']);
        $total = $list->total();
        $list = ProductResource::collection($list);
        $totalPage = ceil($total / $args['pSize']);
        return response(['status_code' => 0,'list' => $list,'total' => $total,'totalPage' => $totalPage]);
    }

    // 与商品SKU关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public static function getProduct($id){
        $product = Product::with(['productSkuAttribute','skus'])->where('id','=',$id)->firstOrFail();
        $list['product'] = new ProductResource($product);
        $list['productSkus'] = ProductSkuResource::collection($product->skus);
        return response(['static_code' => 0,'list' => $list]);
    }

    public static function store($args){
        if(intval($args['id']) == 0){
            $product = new Product();
            $product->title = $args['title'];
            $product->description = $args['description'];
            $product->desc = $args['desc'];
            $product->image = strstr($args['image'],'/storage');
            $product->on_sale = $args['on_sale'];
            $product->product_classify_id = intval($args['product_classify_id']);
            $product->save();
            return response(['status_code' => 0,'message' => '创建商品成功']);
        }else{
            $product = Product::find(intval($args['id']));
            $product->title = $args['title'];
            $product->desc = $args['desc'];
            $product->description = $args['description'];
            $product->image = strstr($args['image'],'/storage');
            foreach($args['images'] as  $ks=>$vs){
                foreach($args['images'][$ks]['images'] as $k=>$v){
                    $args['images'][$ks]['images'][$k]['url'] = strstr($args['images'][$ks]['images'][$k]['url'],'/storage');
                }
            }
            $product->images = json_encode($args['images']);
            $product->on_sale = $args['on_sale'];
            $product->product_classify_id = intval($args['product_classify_id']);

            //sku
            if(!empty($args['sku'])){
                $insert = [];
                $product->price = $args['sku'][0]['price'];
                foreach($args['sku'] as $k => $v){
                    if($v['price'] < $product->price){
                        $product->price = $v['price'];
                    }
                    $arr['title'] = $v['title'];
                    $arr['description'] = $v['description'];
                    $arr['price'] = $v['price'];
                    $arr['color'] = $v['color'];
                    $arr['stock'] = $v['stock'];
                    foreach($args['images'] as $kt => $vt){
                        if($vt['value'] == $v['color']){
                            $arr['image'] = $vt['images'][0]['url'];
                        }
                    }
                    $arr['product_id'] = $v['product_id'];
                    $arrs = [];
                    foreach($v['attributes'] as $ks => $vs){
                        $r['id'] = $vs['id'];
                        $r['value'] = $vs['value'];
                        $r['name'] = $vs['name'];
                        $arrs[] = $r;
                        unset($r);
                    }
                    $arr['attributes'] = json_encode($arrs);
                    if($v['id'] == 0){
                        $insert[] = $arr;
                        unset($arrs);
                        unset($arr);
                    }else{
                        $arr['id'] = $v['id'];
                        ProductSku::where('id','=',$arr['id'])->update($arr);
                        unset($arrs);
                        unset($arr);
                    }
                }
                if(!empty($insert)){
                    ProductSku::insert($insert);
                }
            }
            $product->save();
            return response(['status_code' => 0,'message' => '修改商品成功']);
        }
    }

    public static function updateColor($args){
        $product = Product::find(intval($args['id']));
        $product->images = json_encode($args['images']);
        $product->save();
        return response(['status_code' => 0,'message' => '添加颜色分类成功']);
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

    public function productSkuAttribute(){
        return $this->hasMany(ProductSkuAttribute::class);
    }

    //商品详情
    public static function products($args){
        $product = Product::with(['productSkuAttribute','skus'])->where('id','=',$args['id'])->firstOrFail();
        $product = new ProductDetailResource($product);
        return response(['status_code' => 0,'list' => $product]);
    }

    //收藏商品
    public static function favor($id){
        $user = User::find(Auth::guard('api')->user()->id);
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
        $user = User::find(Auth::guard('api')->user()->id);
        $product = Product::where('id','=',$id)->first();
        if(empty($product)){
            return response(['status_code' => 1,'message' => '找不到该商品'],404);
        }
        $user->favoriteProducts()->detach($product);
        return response(['status_code' => 0,'message' => '取消收藏成功']);
    }

    //收藏列表
    public static function favorites($args){
        $user = User::find(Auth::guard('api')->user()->id);
        $products = $user->favoriteProducts()->paginate($args['pSize']);
        $total = $products->total();
        $products = ProductResource::collection($products);
        $totalPage = ceil($total / $args['pSize']);
        return response(['status_code' => 0,'list' => $products,'totalPage' => $totalPage,'total' => $total]);
    }

    //获取所有在销售的商品列表
    public static function getAllSellProduct(){
        return Product::where('on_sale','=',1)->get()->toArray();
    }

    //获取手机产品列表
    public static function mobilePhones(){
        $list = Product::where('on_sale','=',1)->whereIn('product_classify_id',function($query){
            $query->select(['id'])->from('product_classifies')->where('pid','=',1);
        })->take(8)->orderBy('created_at','desc')->get();
        $list = ProductResource::collection($list);
        return response(['status_code' => 0,'list' => $list]);
    }

    //获取数码配件列表
    public static function digitalAudio(){
        $list = Product::where('on_sale','=',1)->whereIn('classify_id',function($query){
            $query->select(['id'])->from('product_classifies')->where('pid','=',15);
        })->take(10)->get();
        $list = ProductResource::collection($list);
        return response(['status_code' => 0,'list' => $list]);
    }

    //获取生活周边列表
    public static function perimeterLife(){
        $list = Product::where('on_sale','=',1)->whereIn('classify_id',function($query){
            $query->select(['id'])->from('product_classifies')->where('pid','=',26);
        })->take(10)->get();
        $list = ProductResource::collection($list);
        return response(['status_code' => 0,'list' => $list]);
    }

    public static function getSellProducts(){
        $list = Product::where('on_sale','=',1)->get()->toArray();
        return response(['status_code' => 0,'list' => $list]);
    }
}
