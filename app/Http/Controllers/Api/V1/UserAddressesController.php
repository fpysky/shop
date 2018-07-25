<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddressRequest;
use Auth;
use Dingo\Api\Exception\DeleteResourceFailedException;

class UserAddressesController extends Controller
{
    /**
     * @apidefine 07UserAddresses
     * 用户地址接口
     */

    /**
     * @api {get} /api/addresses 01.获取用户地址列表
     * @apiName addresses
     * @apiGroup 07UserAddresses
     *
     * @apiParam {Number} pSize        M   单页显示记录条数（默认10）
     * @apiParam {Number} page         M   页码
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *      "status_code": 0,
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
     *     }
     */
    public function addresses(Request $request){
        $args = $request->all();
        $args['pSize'] = isset($args['pSize']) ? intval($args['pSize']) : 10;
        return UserAddress::addresses($args);
    }

    /**
     * @api {post} /api/addresses 02.用户地址添加
     * @apiName store
     * @apiGroup 07UserAddresses
     *
     * @apiParam {Number} province       M   省份
     * @apiParam {Number} city           M   城市
     * @apiParam {Number} district       M   区域
     * @apiParam {String} address        M   详细地址
     * @apiParam {Number} zip            M   邮编
     * @apiParam {String} contact_name   M   收货人姓名
     * @apiParam {String} contact_phone  M   收货人手机号
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *      "status_code": 0,
     *      "message": ""
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *          "message": "验证不通过",
     *          "errors": {
     *              "province": ["省份不能为空"],
     *              "city": ["城市不能为空"],
     *          },
     *          "status_code": 422
     *      }
     *     HTTP/1.1 500
     *     {
     *      "status_code": 1,
     *      "message": "错误信息"
     *     }
     */
    public function store(UserAddressRequest $request){
        $args = $request->all();
        $args['id'] = 0;//isset($args['id'])?$args['id']:0;
        $args['user_id'] = Auth::user()->id;
        return UserAddress::store($args);
    }

    /**
     * @api {put} /api/addresses/{id} 03.用户地址修改
     * @apiName update
     * @apiGroup 07UserAddresses
     *
     * @apiParam {Number} province       M   省份
     * @apiParam {Number} city           M   城市
     * @apiParam {Number} district       M   区域
     * @apiParam {String} address        M   详细地址
     * @apiParam {Number} zip            M   邮编
     * @apiParam {String} contact_name   M   收货人姓名
     * @apiParam {String} contact_phone  M   收货人手机号
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *      "status_code": 0,
     *      "message": ""
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *          "message": "验证不通过",
     *          "errors": {
     *              "province": ["省份不能为空"],
     *              "city": ["城市不能为空"],
     *          },
     *          "status_code": 422
     *      }
     *     HTTP/1.1 500
     *     {
     *      "status_code": 1,
     *      "message": "错误信息"
     *     }
     */
    public function update($id,UserAddressRequest $request){
        $args = $request->all();
        $args['id'] = intval($id);
        $args['user_id'] = Auth::user()->id;
        return UserAddress::store($args);
    }

    /**
     * @api {delete} /api/addresses/{id} 04.删除用户地址
     * @apiName destroy
     * @apiGroup 07UserAddresses
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *      "status_code": 0,
     *      "message": "操作成功"
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 200
     *     {
     *      "status_code": 500,
     *      "message": "错误信息"
     *     }
     */
    public function destroy($id){
        $id = intval($id,0);
        if($id == 0){
            return response(['status_code' => 1,'message' => '地址ID不能为空(address)']);
        }
        return UserAddress::destroy($id);
    }
}
