<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\ProductDetailRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @apidefine 06Product
     * 商品
     */

    /**
     * @api {get} /api/index/hotProducts 02.首页热品推荐
     * @apiName hotProducts
     * @apiGroup 08Index
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
     * @api {post} /api/products 02.商品详情
     * @apiName products
     * @apiGroup 06Product
     *
     * @apiParam {Number} id             M   商品ID
     * @apiParam {Number} attributes     M   商品Sku属性
     *
     * @apiParamExample {json} 传参示例:
     *     {
     *          "id":23,
     *          "attributes":[
     *              {
     *                  "id":19,
     *                  "value":"土黄色"
     *              },
     *              {
     *                  "id":20,
     *                  "value":"全网通"
     *              },
     *              {
     *                  "id":21,
     *                  "value":"128g"
     *              },
     *              {
     *                  "id":22,
     *                  "value":"官方标配"
     *              }
     *          ]
     *      }
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
     *          "status_code": 0,
     *          "list": {
     *              "id": 23,
     *              "title": "魅族16",
     *              "description": "<p>魅族16</p>",
     *              "image": "/storage/images/201808070935375b6967e9e9dc4.jpeg",
     *              "on_sale": true,
     *              "product_classify_id": 2,
     *              "rating": 5,
     *              "sold_count": 0,
     *              "review_count": 0,
     *              "price": "0.00",
     *              "productSkuAttribute": [
     *                  {
     *                      "id": 19,
     *                      "product_id": 23,
     *                      "name": "颜色",
     *                      "_child": [
     *                          "红色",
     *                          "蓝色",
     *                          "土黄色"
     *                      ]
     *                  },
     *                  {
     *                      "id": 20,
     *                      "product_id": 23,
     *                      "name": "制式",
     *                      "_child": [
     *                          "全网通",
     *                          "联通版"
     *                      ]
     *                  },
     *                  {
     *                      "id": 21,
     *                      "product_id": 23,
     *                      "name": "内存",
     *                      "_child": [
     *                          "32g",
     *                          "64g",
     *                          "128g"
     *                      ]
     *                  },
     *                  {
     *                      "id": 22,
     *                      "product_id": 23,
     *                      "name": "套餐",
     *                      "_child": [
     *                          "官方标配",
     *                          "套餐一"
     *                      ]
     *                  }
     *              ],
     *              "sku": {
     *                  "id": 67,
     *                  "title": "魅族16 128g",
     *                  "description": "魅族16 128g",
     *                  "attributes": "[{\"id\":19,\"value\":\"\\u571f\\u9ec4\\u8272\",\"name\":\"\\u989c\\u8272\"},{\"id\":20,\"value\":\"\\u5168\\u7f51\\u901a\",\"name\":\"\\u5236\\u5f0f\"},{\"id\":21,\"value\":\"128g\",\"name\":\"\\u5185\\u5b58\"},{\"id\":22,\"value\":\"\\u5b98\\u65b9\\u6807\\u914d\",\"name\":\"\\u5957\\u9910\"}]",
     *                  "price": "3000.00",
     *                  "stock": 11222,
     *                  "product_id": 23,
     *                  "created_at": null,
     *                  "updated_at": null
     *              },
     *              "created_at": {
     *                  "date": "2018-08-07 09:35:44.000000",
     *                  "timezone_type": 3,
     *                  "timezone": "UTC"
     *              },
     *              "updated_at": {
     *                  "date": "2018-08-07 09:35:44.000000",
     *                  "timezone_type": 3,
     *                  "timezone": "UTC"
     *              }
     *          }
     *      }
     */
    public function products(ProductDetailRequest $request){
        $args = $request->all();
        return Product::products($args);
    }

    /**
     * @api {post} /api/products/{id}/favorite 03.收藏商品
     * @apiName favorite
     * @apiGroup 06Product
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
     *     HTTP/1.1 404
     *     {
     *      "status_code": 404,
     *      "message": "找不到该商品"
     *     }
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "status_code":0,
     *      "message":'收藏成功'
     *     }
     * */
    public function favor($id)
    {
        $id = intval($id,0);
        if($id == 0){
            return response(['status_code' => 1,'message' => 'ID不能为空'],422);
        }
        return Product::favor($id);
    }

    /**
     * @api {delete} /api/products/{id}/favorite 04.取消收藏商品
     * @apiName disfavor
     * @apiGroup 06Product
     *
     * @apiParam {Number} id             M   商品ID
     *
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *      "status_code": 422,
     *      "message": "ID不能为空"
     *     }
     *     HTTP/1.1 404
     *     {
     *      "status_code": 404,
     *      "message": "找不到该商品"
     *     }
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "status_code":0,
     *      "message":'取消收藏成功'
     *     }
     * */
    public function disfavor($id)
    {
        $id = intval($id,0);
        if($id == 0){
            return response(['status_code' => 1,'message' => 'ID不能为空'],422);
        }
        return Product::disfavor($id);
    }

    /**
     * @api {get} /api/products/favorites 04.收藏列表
     * @apiName favorites
     * @apiGroup 06Product
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
     *               }
     *              ...
     *           ],
     *           "totalPage": 1,
     *           "total": 1
     *       }
     * */
    public function favorites(Request $request)
    {
        $args = $request->all();
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):15;
        $args['page'] = isset($args['page'])?intval($args['page']):1;
        return Product::favorites($args);
    }

    /**
     * @api {get} /api/index/mobilePhones 03.首页手机
     * @apiName mobilePhones
     * @apiGroup 08Index
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *          "status_code": 0,
     *          "list": [
     *              {
     *                  "id": 1,
     *                  "title": "aliquid",
     *                  "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                  "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                  "on_sale": true,
     *                  "classify_id": 2,
     *                  "rating": 3,
     *                  "sold_count": 0,
     *                  "review_count": 0,
     *                  "price": "1018.00",
     *                  "created_at": {
     *                      "date": "2018-07-23 09:08:19.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  },
     *                  "updated_at": {
     *                      "date": "2018-07-23 09:08:19.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  }
     *              },
     *              ...
     *          ],
     *      }
     */
    public function mobilePhones(){
        return Product::mobilePhones();
    }

    /**
     * @api {get} /api/index/digitalAudio 04.首页数码配件
     * @apiName digitalAudio
     * @apiGroup 08Index
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *          "status_code": 0,
     *          "list": [
     *              {
     *                  "id": 1,
     *                  "title": "aliquid",
     *                  "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                  "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                  "on_sale": true,
     *                  "classify_id": 2,
     *                  "rating": 3,
     *                  "sold_count": 0,
     *                  "review_count": 0,
     *                  "price": "1018.00",
     *                  "created_at": {
     *                      "date": "2018-07-23 09:08:19.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  },
     *                  "updated_at": {
     *                      "date": "2018-07-23 09:08:19.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  }
     *              },
     *              ...
     *          ],
     *      }
     */
    public function digitalAudio(){
        return Product::digitalAudio();
    }

    /**
     * @api {get} /api/index/perimeterLife 05.首页数码配件
     * @apiName perimeterLife
     * @apiGroup 08Index
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *          "status_code": 0,
     *          "list": [
     *              {
     *                  "id": 1,
     *                  "title": "aliquid",
     *                  "description": "Iusto quia delectus quisquam est aut ducimus autem.",
     *                  "image": "https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg",
     *                  "on_sale": true,
     *                  "classify_id": 2,
     *                  "rating": 3,
     *                  "sold_count": 0,
     *                  "review_count": 0,
     *                  "price": "1018.00",
     *                  "created_at": {
     *                      "date": "2018-07-23 09:08:19.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  },
     *                  "updated_at": {
     *                      "date": "2018-07-23 09:08:19.000000",
     *                      "timezone_type": 3,
     *                      "timezone": "UTC"
     *                  }
     *              },
     *              ...
     *          ],
     *      }
     */
    public function perimeterLife(){
        return Product::perimeterLife();
    }
}
