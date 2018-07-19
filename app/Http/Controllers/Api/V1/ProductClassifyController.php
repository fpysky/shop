<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProductClassify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductClassifyController extends Controller
{
    /**
     * @apidefine 01ProductClassify
     * 商品分类
     */

    /**
     * @api {get} /api/productClassify 01.获取商品分类
     * @apiName productClassify
     * @apiGroup 01ProductClassify
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *          "code": 0,
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
     *                       },
     *                       {
     *                           "id": 3,
     *                           "pid": 1,
     *                           "name": "魅蓝手机",
     *                           "created_at": null,
     *                           "updated_at": null
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
