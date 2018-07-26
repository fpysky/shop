<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests\AddCartRequest;
use App\Models\CartItem;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\ProductSku;

class CartController extends Controller
{
    /**
     * @apidefine 03Cart
     * 购物车
     */

    /**
     * @api {post} /api/cart 01.加入购物车
     * @apiName add
     * @apiGroup 03Cart
     *
     * @apiParam {Number} sku_id             M   商品skuID
     * @apiParam {Number} amount             M   商品数量
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *           "status_code": 0,
     *           "message": "加入购物车成功"
     *      }
     *
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *           "message": "验证不通过",
     *           "errors": {
     *               "sku_id": ["请选择商品"],
     *               "amount": ["请输入商品数量"]
     *           },
     *           "status_code": 422
     *      }
     */
    public function add(AddCartRequest $request)
    {
        $args = $request->all();
        $args['sku_id'] = intval($args['sku_id']);
        $args['amount'] = intval($args['amount']);
        return CartItem::add($args);
    }

    /**
     * @api {get} /api/cart 02.购物车列表
     * @apiName cart
     * @apiGroup 03Cart
     *
     * @apiParam {Number} page                 C   页码
     * @apiParam {Number} pSize                C   页面显示数量(默认15)
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *           "status_code": 0,
     *           "list": [
     *               {
     *                   "id": 1,
     *                   "user_id": 2,
     *                   "product_sku_id": 1,
     *                   "amount": 1,
     *                   "productSku": {
     *                       "id": 1,
     *                       "title": "vel",
     *                       "description": "Rerum maiores eos eligendi dolorum qui corporis.",
     *                       "price": "6127.00",
     *                       "stock": 13740,
     *                       "product_id": 1,
     *                       "created_at": "2018-07-23 09:08:19",
     *                       "updated_at": "2018-07-23 09:08:19",
     *                       "product": {
     *                           "id": 1,
     *                           "title": "aliquid",
     *                           "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                           "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                           "on_sale": true,
     *                           "classify_id": 2,
     *                           "rating": 3,
     *                           "sold_count": 0,
     *                           "review_count": 0,
     *                           "price": "1018.00",
     *                           "created_at": "2018-07-23 09:08:19",
     *                           "updated_at": "2018-07-23 09:08:19"
     *                       }
     *                   }
     *               }
     *           ],
     *           "totalPage": 1,
     *           "total": 1
     *       }
     * */
    public function cart(Request $request){
        $args = $request->all();
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):15;
        $args['page'] = isset($args['page'])?intval($args['page']):1;
        return CartItem::cart($args);
    }

    /**
     * @api {delete} /api/cart/{id} 02.购物车移除商品
     * @apiName remove
     * @apiGroup 03Cart
     *
     * @apiParam {Number} id             M   商品skuID
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *          "status_code": 0,
     *          "message": "商品移除成功"
     *     }
     * */
    public function remove($id)
    {
        return CartItem::remove($id);
    }

    /**
     * @api {put} /api/cart/{id} 02.购物车更新商品
     * @apiName update
     * @apiGroup 03Cart
     *
     * @apiParam {Number} id             M   购物车商品ID
     * @apiParam {Number} amount         M   购物车商品数量
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *          "status_code": 0,
     *          "message": "购物车商品更新成功",
     *          "amount": 10
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 409
     *     {
     *          "status_code": 1,
     *          "message": "库存不足"
     *     }
     *      HTTP/1.1 422
     *     {
     *          "status_code": 1,
     *          "message": "找不到该购物车商品"
     *     }
     * */
    public function update($id,Request $request){
        $args['id'] = intval($id,0);
        $args['amount'] = $request->input('amount',0);
        $args['amount'] = intval($args['amount'],0);
        if($args['id'] == 0){
            return response(['status_code' => 1,'message' => '购物车商品ID不能为空'],422);
        }
        if($args['amount'] == 0){
            return response(['status_code' => 1,'message' => '购物车商品数量不能为空或小于1'],422);
        }
        return CartItem::updateAmount($args);
    }

    /**
     * @api {post} /api/cart/settle 03.结算
     * @apiName settle
     * @apiGroup 03Cart
     *
     * @apiParam {Number} id             M   购物车商品ID
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *          "status_code": 0,
     *          "message": "商品移除成功"
     *     }
     * */
    public function settle(Request $request){
        $id = $request->input('id',0);
        $id = intval('');
    }
}
