<?php
namespace App\Http\Controllers\Api;

class ReturnCodeController{
    /**
     * @apidefine 01Return
     * 全局返回码
     */
    /**
     * @api {post}   Header返回值
     * @apiDescription Header返回值
     * @apiGroup 01Return
     * @apiPermission none
     * @apiParam {String} Authorization Bearer {token} 登录后返回的token 当token过期后也会返回新的token 需要替换本地token
     * @apiVersion 0.1.0
     *
     */
    /**
     * @api {post} /api/global 1.全局返回码
     * @apiDescription 全局返回码
     * @apiGroup 01Return
     * @apiPermission none
     * @apiParam {String} -1    系统错误
     * @apiParam {String} 0     请求成功
     * @apiParam {String} 500   请求错误
     * @apiParam {String} 422   请求参数错误
     * @apiParam {String} 400   登陆错误
     * @apiVersion 0.1.0
     *
     * @apiErrorExample {json} 错误返回
     * HTTP/1.1 500
     *   {
     *   "status_code": 500,
     *   "message": "错误信息"
     *   }
     *
     */
}