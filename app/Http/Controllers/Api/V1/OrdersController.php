<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\OrderRequest;
use App\Models\ProductSku;
use App\Models\UserAddress;
use App\Models\Order;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * @apidefine 01Order
     * 订单
     */

    /**
     * @api {post} /api/orders 01.创建订单
     * @apiName store
     * @apiGroup 01Order
     *
     * @apiParam {Number} address_id             M   商品skuID
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
    public function store(OrderRequest $request)
    {
        $args = $request->all();
        return Order::store($args);
    }
}
