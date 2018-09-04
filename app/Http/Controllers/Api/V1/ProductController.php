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
     * @apiParam {Array} attributes      M   商品Sku属性
     * @apiParam {String} color          M   商品颜色
     *
     * @apiParamExample {json} 传参示例:
     *     {
     *          "id":22,
     *          "attributes":[
     *              {
     *                  "id":3,
     *                  "value":"全网公开版"
     *              },
     *              {
     *                  "id":4,
     *                  "value":"6+64GB"
     *              }
     *          ],
     *          "color":"静夜黑"
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
     *     {
     *          "status_code": 0,
     *          "list": {
     *              "id": 22,
     *              "title": "魅族16th",
     *              "description": "<p><img src=\"/ueditor/php/upload/image/20180814/1534234382823326.jpg\" title=\"1534234382823326.jpg\" alt=\"xiangqing1.jpg\"/></p>",
     *              "image": "/storage/images/201808140812535b728f054ed21.jpeg",
     *              "images": [
     *                  {
     *                      "value": "远山白",
     *                      "images": [
     *                          {
     *                              "url": "/storage/images/201808140822045b72912cbe18c.jpeg",
     *                              "uid": 1534234923201,
     *                              "status": "success"
     *                          },
     *                          {
     *                              "url": "/storage/images/201808140822075b72912f13455.jpeg",
     *                              "uid": 1534234925496,
     *                              "status": "success"
     *                          },
     *                          {
     *                              "url": "/storage/images/201808140822085b729130d15bc.jpeg",
     *                              "uid": 1534234927276,
     *                              "status": "success"
     *                          },
     *                          {
     *                              "url": "/storage/images/201808140822105b729132566a8.jpeg",
     *                              "uid": 1534234928779,
     *                              "status": "success"
     *                          }
     *                      ]
     *                  },
     *                  {
     *                      "value": "静夜黑",
     *                      "images": [
     *                          {
     *                              "url": "/storage/images/201808140822235b72913f5222f.jpeg",
     *                              "uid": 1534234941787,
     *                              "status": "success"
     *                          },
     *                          {
     *                              "url": "/storage/images/201808140822255b72914104417.jpeg",
     *                              "uid": 1534234943431,
     *                              "status": "success"
     *                          },
     *                          {
     *                              "url": "/storage/images/201808140822265b729142f24af.jpeg",
     *                              "uid": 1534234945411,
     *                              "status": "success"
     *                          },
     *                          {
     *                              "url": "/storage/images/201808140822285b729144e87c5.jpeg",
     *                              "uid": 1534234947372,
     *                              "status": "success"
     *                          }
     *                      ]
     *                  }
     *              ],
     *              "on_sale": true,
     *              "product_classify_id": 2,
     *              "rating": 5,
     *              "sold_count": 0,
     *              "review_count": 0,
     *              "price": "2698.00",
     *              "productSkuAttribute": [
     *                  {
     *                      "id": 3,
     *                      "product_id": 22,
     *                      "name": "网络制式",
     *                      "_child": [
     *                          "全网公开版"
     *                      ]
     *                  },
     *                  {
     *                      "id": 4,
     *                      "product_id": 22,
     *                      "name": "内存容量",
     *                      "_child": [
     *                          "6+64GB",
     *                          "6+128GB",
     *                          "8+128GB"
     *                      ]
     *                  }
     *              ],
     *              "sku": {
     *                  "id": 64,
     *                  "title": "魅族16th 静夜黑",
     *                  "description": "魅族16th 静夜黑",
     *                  "attributes": "[{\"id\":3,\"value\":\"\\u5168\\u7f51\\u516c\\u5f00\\u7248\",\"name\":\"\\u7f51\\u7edc\\u5236\\u5f0f\"},{\"id\":4,\"value\":\"6+64GB\",\"name\":\"\\u5185\\u5b58\\u5bb9\\u91cf\"}]",
     *                  "color": "静夜黑",
     *                  "images": "[]",
     *                  "price": "2698.00",
     *                  "stock": 10000,
     *                  "product_id": 22,
     *                  "created_at": null,
     *                  "updated_at": null
     *              },
     *              "created_at": {
     *                  "date": "2018-08-14 08:13:06.000000",
     *                  "timezone_type": 3,
     *                  "timezone": "UTC"
     *              },
     *              "updated_at": {
     *                  "date": "2018-08-14 08:33:58.000000",
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
     * @api {get} /api/index/perimeterLife 05.首页生活周边
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
