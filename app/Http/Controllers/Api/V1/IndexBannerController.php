<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\IndexBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexBannerController extends Controller
{
    /**
     * @apidefine 08Index
     * 首页通用接口
     */

    /**
     * @api {get} /api/index/banners 01.获取首页Banner
     * @apiName banners
     * @apiGroup 08Index
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *      {
     *           "status_code": 0,
     *           "list": [
     *               {
     *                   "id": 3,
     *                   "image": "http://shop.test/storage/images/meilan6T.png",
     *                   "product_id": 3,
     *                   "created_at": {
     *                       "date": "2018-08-02 08:14:00.000000",
     *                       "timezone_type": 3,
     *                       "timezone": "UTC"
     *                   },
     *                   "updated_at": {
     *                       "date": "2018-08-02 08:14:00.000000",
     *                       "timezone_type": 3,
     *                       "timezone": "UTC"
     *                   }
     *               },
     *              ...
     *           ]
     *       }
     */
    public function banners(){
        return IndexBanner::banners();
    }
}
