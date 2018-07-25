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
     * @apidefine 01Cart
     * 购物车
     */

    /**
     * @api {post} /api/cart 01.加入购物车
     * @apiName add
     * @apiGroup 01Cart
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
     * @apiGroup 01Cart
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
     * @apiGroup 01Cart
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
}
