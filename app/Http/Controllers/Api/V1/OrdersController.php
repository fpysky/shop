<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Jobs\CloseOrder;

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
     * @apiParam {Number} address_id     M   地址ID
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
     *          ...
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
        $order =  Order::store($args);
        $this->dispatch(new CloseOrder($order, config('app.order_ttl')));
        return response(['status_code' => 0,'message' => '创建订单成功','order' => $order]);
    }

    /**
     * @api {get} /api/orders 02.订单列表
     * @apiName orders
     * @apiGroup 04Order
     *
     * @apiParam {Number} page                 C   页码
     * @apiParam {Number} pSize                C   页面显示数量(默认15)
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *          "status_code": 0,
     *          "list": [
     *               {
     *                  "id": 2,
     *                  "no": "20180725073807750159",
     *                  "user_id": 2,
     *                  "address": {
     *                      "address": "1111",
     *                      "zip": 1,
     *                      "contact_name": "1",
     *                      "contact_phone": "1"
     *                  },
     *                  "total_amount": "6127.00",
     *                  "remark": "",
     *                  "paid_at": null,
     *                  "payment_method": null,
     *                  "payment_no": null,
     *                  "refund_status": "pending",
     *                  "refund_no": null,
     *                  "closed": false,
     *                  "reviewed": false,
     *                  "ship_status": "pending",
     *                  "ship_data": null,
     *                  "extra": null,
     *                  "items": [
     *                      {
     *                          "id": 2,
     *                          "order_id": 2,
     *                          "product_id": 1,
     *                          "product_sku_id": 1,
     *                          "amount": 1,
     *                          "price": "6127.00",
     *                          "rating": null,
     *                          "review": null,
     *                          "reviewed_at": null,
     *                          "product": {
     *                              "id": 1,
     *                              "title": "aliquid",
     *                              "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                              "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                              "on_sale": true,
     *                              "classify_id": 2,
     *                              "rating": 3,
     *                              "sold_count": 0,
     *                              "review_count": 0,
     *                              "price": "1018.00",
     *                              "created_at": "2018-07-23 09:08:19",
     *                              "updated_at": "2018-07-23 09:08:19"
     *                          },
     *                          "product_sku": {
     *                              "id": 1,
     *                              "title": "vel",
     *                              "description": "Rerum maiores eos eligendi dolorum qui corporis.",
     *                              "price": "6127.00",
     *                              "stock": 13738,
     *                              "product_id": 1,
     *                              "created_at": "2018-07-23 09:08:19",
     *                              "updated_at": "2018-07-25 07:38:07"
     *                          }
     *                      }
     *                  ],
     *                  "created_at": {
     *                      "date": "2018-07-25 07:38:07.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  },
     *                  "updated_at": {
     *                      "date": "2018-07-25 07:38:07.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  }
     *              },
     *              ...
     *          ],
     *          "total": 2,
     *          "totalPage": 1
     *      }
     *
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *           "message": "错误信息",
     *           "status_code": 500
     *       }
     */
    public function orders(Request $request){
        $args = $request->all();
        $args['page'] = isset($args['page'])?intval($args['page']):1;
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):15;
        return Order::orders($args);
    }

    /**
     * @api {get} /api/orders/{id} 03.订单详情
     * @apiName show
     * @apiGroup 04Order
     *
     * @apiParam {Number} id               C   订单id
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *          "status_code": 0,
     *          "list": {
     *                  "id": 2,
     *                  "no": "20180725073807750159",
     *                  "user_id": 2,
     *                  "address": {
     *                      "address": "1111",
     *                      "zip": 1,
     *                      "contact_name": "1",
     *                      "contact_phone": "1"
     *                  },
     *                  "total_amount": "6127.00",
     *                  "remark": "",
     *                  "paid_at": null,
     *                  "payment_method": null,
     *                  "payment_no": null,
     *                  "refund_status": "pending",
     *                  "refund_no": null,
     *                  "closed": false,
     *                  "reviewed": false,
     *                  "ship_status": "pending",
     *                  "ship_data": null,
     *                  "extra": null,
     *                  "items": [
     *                      {
     *                          "id": 2,
     *                          "order_id": 2,
     *                          "product_id": 1,
     *                          "product_sku_id": 1,
     *                          "amount": 1,
     *                          "price": "6127.00",
     *                          "rating": null,
     *                          "review": null,
     *                          "reviewed_at": null,
     *                          "product": {
     *                              "id": 1,
     *                              "title": "aliquid",
     *                              "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                              "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                              "on_sale": true,
     *                              "classify_id": 2,
     *                              "rating": 3,
     *                              "sold_count": 0,
     *                              "review_count": 0,
     *                              "price": "1018.00",
     *                              "created_at": "2018-07-23 09:08:19",
     *                              "updated_at": "2018-07-23 09:08:19"
     *                          },
     *                          "product_sku": {
     *                              "id": 1,
     *                              "title": "vel",
     *                              "description": "Rerum maiores eos eligendi dolorum qui corporis.",
     *                              "price": "6127.00",
     *                              "stock": 13738,
     *                              "product_id": 1,
     *                              "created_at": "2018-07-23 09:08:19",
     *                              "updated_at": "2018-07-25 07:38:07"
     *                          }
     *                      }
     *                  ],
     *                  "created_at": {
     *                      "date": "2018-07-25 07:38:07.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  },
     *                  "updated_at": {
     *                      "date": "2018-07-25 07:38:07.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  }
     *          },
     *      }
     *
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 404
     *     {
     *           "message": "找不到此订单",
     *           "status_code": 404
     *     }
     */
    public function show($id){
        $id = intval($id,0);
        if($id == 0){
            return response(['status_code' => 1,'message' => 'ID不能为空']);
        }
        $order = Order::show($id);
//        $this->authorize('own', $order);
        return ['status_code' => 0,'list' => $order];
    }
}
