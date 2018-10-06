<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * @apidefine 08Search
     * 搜索
     */

    /**
     * @api {get} /api/search/ 01.搜索接口
     * @apiName destroy
     * @apiGroup 08Search
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *      "status_code": 0,
     *      "list": []
     *     }
     */
    public function search(Request $request){
        $searchKeyword = $request->input('searchKeyword');
        $product = Product::search($searchKeyword)->get();
        return response(['status_code' => 0,'list' => $product]);
    }
}
