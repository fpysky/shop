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
     *          "id":21,
     *          "attributes":[
     *              {
     *                  "id":1,
     *                  "value":"白色"
     *              },
     *              {
     *                  "id":2,
     *                  "value":"128g+4g"
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
     *     {
     *          "status_code": 0,
     *          "list": {
     *          "id": 21,
     *          "title": "魅族15",
     *          "description": "<p>魅族15</p>",
     *          "image": "/storage/images/201808090313065b6bb14299e41.jpeg",
     *          "on_sale": true,
     *          "product_classify_id": 2,
     *          "rating": 5,
     *          "sold_count": 0,
     *          "review_count": 0,
     *          "price": "0.00",
     *          "productSkuAttribute": [
     *              {
     *                  "id": 1,
     *                  "product_id": 21,
     *                  "name": "颜色分类",
     *                  "_child": [
     *                      "白色",
     *                      "灰色"
     *                  ]
     *              },
     *              {
     *                  "id": 2,
     *                  "product_id": 21,
     *                  "name": "内存组合",
     *                  "_child": [
     *                      "128g+4g",
     *                      "256g+8g"
     *                  ]
     *              }
     *          ],
     *          "sku": {
     *              "id": 61,
     *              "title": "魅族15 64g 白色",
     *              "description": "魅族15 64g 白色",
     *              "attributes": "[{\"id\":1,\"value\":\"\\u767d\\u8272\",\"name\":\"\\u989c\\u8272\\u5206\\u7c7b\"},{\"id\":2,\"value\":\"128g+4g\",\"name\":\"\\u5185\\u5b58\\u7ec4\\u5408\"}]",
     *              "images": "[{\"url\":\"\\/storage\\/images\\/201808090620115b6bdd1b4f5c8.png\"},{\"url\":\"\\/storage\\/images\\/201808090620135b6bdd1da1f60.jpeg\"},{\"url\":\"\\/storage\\/images\\/201808090620155b6bdd1fe8097.jpeg\"},{\"url\":\"\\/storage\\/images\\/201808090620185b6bdd2278e81.png\"}]",
     *              "price": "2399.00",
     *              "stock": 1223,
     *              "product_id": 21,
     *              "created_at": null,
     *              "updated_at": null
     *          },
     *          "created_at": {
     *              "date": "2018-08-09 03:13:13.000000",
     *              "timezone_type": 3,
     *              "timezone": "UTC"
     *          },
     *          "updated_at": {
     *              "date": "2018-08-09 03:13:13.000000",
     *              "timezone_type": 3,
     *              "timezone": "UTC"
     *          }
     *      }
     *  }
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
