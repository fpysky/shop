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
     * @apidefine 04Order
     * 订单
     */

    /**
     * @api {post} /api/orders 01.创建订单
     * @apiName store
     * @apiGroup 04Order
     *
     * @apiParam {Number} address_id     M   商品skuID
     * @apiParam {Array} items           M   商品数量
     *
     * @apiParamExample {json} 传参示例:
     * {
     *       "address_id":2,
     *       "items":[
     *           {
     *               "sku_id":1,
     *               "amount":1
     *           }
     *       ]
     *   }
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *           "status_code": 0,
     *           "message": "创建订单成功",
     *           "order": {
     *               "address": {
     *                   "address": "1111",
     *                   "zip": 1,
     *                   "contact_name": "1",
     *                   "contact_phone": "1"
     *               },
     *               "remark": "",
     *               "total_amount": 6127,
     *               "user_id": 2,
     *               "no": "20180725073807750159",
     *               "updated_at": "2018-07-25 07:38:07",
     *               "created_at": "2018-07-25 07:38:07",
     *               "id": 2,
     *               "user": {
     *                   "id": 2,
     *                   "name": "aa",
     *                   "email": "aa@aa.com",
     *                   "created_at": "2018-07-24 07:02:50",
     *                   "updated_at": "2018-07-24 07:02:50"
     *               }
     *           }
     *       }
     *
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *           "message": "验证不通过",
     *           "errors": {
     *               "address_id": ["用户地址ID不能为空"],
     *               "items": ["items 不能为空。"]
     *           },
     *           "status_code": 422
     *       }
     */
    public function store(OrderRequest $request)
    {
        $args = $request->all();
        return Order::store($args);
    }
}
