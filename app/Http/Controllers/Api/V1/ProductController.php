<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @apidefine 01Product
     * 商品
     */

    /**
     * @api {get} /api/hotProducts 01.获取商品分类
     * @apiName hotProducts
     * @apiGroup 01Product
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
    public function hotProducts(){
        return Product::hotProducts();
    }
}
