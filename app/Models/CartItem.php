<?php

namespace App\Models;

use App\Http\Resources\CartItemResource;
use Auth;

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
        $user = User::find(Auth::user()->id);
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
        $user = User::find(Auth::user()->id);
        $cart = $user->cartItems()->paginate($args['pSize']);
        $total = $cart->total();
        $cart = CartItemResource::collection($cart);
        $totalPage = ceil($total / $args['pSize']);
        return response(['status_code' => 0,'list' => $cart,'totalPage' => $totalPage,'total' => $total]);
    }

    //从购物车种移除商品
    public static function remove($id){
        $user = User::find(Auth::user()->id);
        $user->cartItems()->where('product_sku_id', $id)->delete();
        return response(['status_code' => 0,'message' => '商品移除成功']);
    }
}