<?php

namespace App\Models;

use App\Http\Resources\CartItemResource;
use Auth;
use Illuminate\Support\Facades\Redis;

class CartItem extends Model
{
    protected $fillable = ['amount'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }

    //加入购物车
    public static function add($args){
        $user = User::find(Auth::guard('api')->user()->id);
        // 从数据库中查询该商品是否已经在购物车中
        if ($cart = $user->cartItems()->where('product_sku_id', $args['sku_id'])->first()) {
            // 如果存在则直接叠加商品数量
            $cart->update([
                'amount' => $cart->amount + $args['amount'],
            ]);
        } else {
            // 否则创建一个新的购物车记录
            $cart = new CartItem(['amount' => $args['amount']]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($args['sku_id']);
            $cart->save();
        }
        return response(['status_code' => 0,'message' => '加入购物车成功']);
    }

    //购物车列表
    public static function cart($args){
        $user = User::find(Auth::guard('api')->user()->id);
        $cart = $user->cartItems()->with(['productSku.product'])->paginate($args['pSize']);
        $total = $cart->total();
        $cart = CartItemResource::collection($cart);
        $totalPage = ceil($total / $args['pSize']);
        return response(['status_code' => 0,'list' => $cart,'totalPage' => $totalPage,'total' => $total]);
    }

    //购物车移除商品
    public static function remove($id){
        $user = User::find(Auth::guard('api')->user()->id);
        $user->cartItems()->where('product_sku_id', $id)->delete();
        return response(['status_code' => 0,'message' => '商品移除成功']);
    }

    //更新购物车商品数量
    public static function updateAmount($args){
        $item = CartItem::where('id','=',$args['id'])->first();
        if(empty($item)){
            return response(['status_code' => 1,'message' => '找不到该购物车商品'],404);
        }
        $productSku = ProductSku::where('id','=',$item->product_sku_id)->firstOrFail();
        if($productSku->stock < $args['amount']){
            return response(['status_code' => 1,'message' => '库存不足'],409);
        }
        $item->amount = $args['amount'];
        $item->save();
        return response(['status_code' => 0,'message' => '购物车商品更新成功']);
    }

    public static function settle($cartIdCollection){
        $user = User::find(Auth::guard('api')->user()->id);
        $cart = $user->cartItems()->whereIn('id',$cartIdCollection)->with(['productSku.product'])->get();
        $cart = CartItemResource::collection($cart);
        return response(['status_code' => 0,'list' => $cart]);
    }
}