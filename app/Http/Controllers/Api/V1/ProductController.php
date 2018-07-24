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
     * @api {get} /api/hotProducts 01.热品推荐
     * @apiName hotProducts
     * @apiGroup 01Product
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *{
     *       "status_code": 0,
     *       "list": [
     *           {
     *               "id": 4,
     *               "title": "nulla",
     *               "description": "Alias sapiente reiciendis est quis.",
     *               "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/pa7DrV43Mw.jpg",
     *               "on_sale": true,
     *               "classify_id": 2,
     *               "rating": 1,
     *               "sold_count": 0,
     *               "review_count": 0,
     *               "price": "324.00",
     *               "created_at": {
     *                   "date": "2018-07-23 01:36:48.000000",
     *                   "timezone_type": 3,
     *                   "timezone": "UTC"
     *               },
     *               "updated_at": {
     *                   "date": "2018-07-23 01:36:48.000000",
     *                   "timezone_type": 3,
     *                   "timezone": "UTC"
     *               }
     *           },
     *      ...
     *      ],
     * }
     */
    public function hotProducts(){
        return Product::hotProducts();
    }

    /**
     * @api {get} /api/product/{id} 02.商品详情
     * @apiName product
     * @apiGroup 01Product
     *
     * @apiParam {Number} id             M   商品ID
     *
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *      "status_code": 422,
     *      "message": "ID不能为空"
     *     }
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *           "status_code": 0,
     *           "list": {
     *               "product": {
     *                   "id": 1,
     *                   "title": "aliquid",
     *                   "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                   "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                   "on_sale": true,
     *                   "classify_id": 2,
     *                   "rating": 3,
     *                   "sold_count": 0,
     *                   "review_count": 0,
     *                   "price": "1018.00",
     *                   "created_at": {
     *                       "date": "2018-07-23 09:08:19.000000",
     *                       "timezone_type": 3,
     *                       "timezone": "UTC"
     *                   },
     *                   "updated_at": {
     *                       "date": "2018-07-23 09:08:19.000000",
     *                       "timezone_type": 3,
     *                       "timezone": "UTC"
     *                   }
     *               },
     *               "productSkus": [
     *                   {
     *                       "id": 1,
     *                       "title": "vel",
     *                       "description": "Rerum maiores eos eligendi dolorum qui corporis.",
     *                       "price": "6127.00",
     *                       "stock": 13740,
     *                       "product_id": 1,
     *                       "created_at": {
     *                           "date": "2018-07-23 09:08:19.000000",
     *                           "timezone_type": 3,
     *                           "timezone": "UTC"
     *                       },
     *                       "updated_at": {
     *                           "date": "2018-07-23 09:08:19.000000",
     *                           "timezone_type": 3,
     *                           "timezone": "UTC"
     *                       }
     *                   },
     *               ...
     *               ]
     *           }
     *       }
     */
    public function product($id){
        $id = intval($id,0);
        if($id == 0){
            return response(['status_code' => 1,'message' => 'ID不能为空'],422);
        }
        return Product::product($id);
    }
}
