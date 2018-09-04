<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProductClassify;
use App\Http\Controllers\Controller;

class ProductClassifyController extends Controller
{
    /**
     * @apidefine 05ProductClassify
     * 商品分类
     */

    /**
     * @api {get} /api/productClassify 01.获取商品分类
     * @apiName productClassify
     * @apiGroup 05ProductClassify
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *          "status_code": 0,
     *          "list": [
     *               {
     *                   "id": 1,
     *                   "name": "手机",
     *                   "pid": 0,
     *                   "created_at": null,
     *                   "updated_at": null,
     *                   "_child": [
     *                       {
     *                           "id": 2,
     *                           "pid": 1,
     *                           "name": "魅族手机",
     *                           "created_at": null,
     *                           "updated_at": null
     *                           "product": [
     *                               {
     *                                   "id": 1,
     *                                   "title": "aliquid",
     *                                   "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                                   "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                                   "on_sale": true,
     *                                   "classify_id": 2,
     *                                   "rating": 3,
     *                                   "sold_count": 0,
     *                                   "review_count": 0,
     *                                   "price": "1018.00",
     *                                   "created_at": "2018-07-23 09:08:19",
     *                                   "updated_at": "2018-07-23 09:08:19"
     *                               },
     *                              ...
     *                            ]
     *                       },
     *                       {
     *                           "id": 3,
     *                           "pid": 1,
     *                           "name": "魅蓝手机",
     *                           "created_at": null,
     *                           "updated_at": null,
     *                           "product": [
     *                               {
     *                                   "id": 1,
     *                                   "title": "aliquid",
     *                                   "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                                   "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                                   "on_sale": true,
     *                                   "classify_id": 2,
     *                                   "rating": 3,
     *                                   "sold_count": 0,
     *                                   "review_count": 0,
     *                                   "price": "1018.00",
     *                                   "created_at": "2018-07-23 09:08:19",
     *                                   "updated_at": "2018-07-23 09:08:19"
     *                               },
     *                              ...
     *                            ]
     *                       }
     *                     ]
     *                  },
     *                  ...
     *              ]
     *
     *   }
     */
    public function productClassify(){
        return ProductClassify::getProductClassify();
    }
}
