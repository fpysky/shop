<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddressRequest;
use Auth;

class UserAddressesController extends Controller
{
    /**
     * @apidefine 01UserAddresses
     * 用户地址接口
     */

    /**
     * @api {post} /api/addresses 01.获取用户地址列表
     * @apiName UserAddresses
     * @apiGroup 01UserAddresses
     *
     * @apiParam {String} pSize        M   单页显示记录条数（默认10）
     * @apiParam {String} page         M   页码
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *      "code": 0,
     *      "message": "",
     *      "list": [
     *          {
     *              "id": 1,
     *              "user_id": 1,
     *              "province": 11,
     *              "city": 11,
     *              "district": 11,
     *              "address": "11",
     *              "zip": 11,
     *              "contact_name": "1",
     *              "contact_phone": "1",
     *              "created_at": "2018-07-16 09-18",
     *              "updated_at": "2018-07-16 09-18"
     *          },
     *          {
     *              "id": 4,
     *              "user_id": 1,
     *              "province": 2,
     *              "city": 2,
     *              "district": 2,
     *              "address": "2",
     *              "zip": 2,
     *              "contact_name": "2",
     *              "contact_phone": "2",
     *              "created_at": "2018-07-16 09-18",
     *              "updated_at": "2018-07-16 09-18"
     *          }
     *      ],
     *      "total": 2,
     *      "totalPage": 1
     *      }
     */
    public function addresses(Request $request){
        $args = $request->all();
        $args['pSize'] = isset($args['pSize']) ? intval($args['pSize']) : 10;
        return UserAddress::addresses($args);
    }

    public function create(UserAddressRequest $request){
        $args = $request->all();
        $args['id'] = isset($args['id'])?$args['id']:0;
        $args['user_id'] = Auth::user()->id;
        return UserAddress::create($args);
    }
}
