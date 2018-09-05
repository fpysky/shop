<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\LoginFormRequest;
use JWTAuth,Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @apidefine 02Auth
     * 用户接口
     */

    /**
     * @api {post} /api/auth/register 01.注册
     * @apiName register
     * @apiGroup 02Auth
     *
     * @apiParam {String} name              M   用户名
     * @apiParam {String} email             M   电子邮箱
     * @apiParam {String} password          M   密码
     * @apiParam {String} geetest_challenge M   极验参数
     * @apiParam {String} geetest_validate  M   极验参数
     * @apiParam {String} geetest_seccode   M   极验参数
     * @apiParam {String} geetest_status    M   极验参数
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "message": "",
     *       "status_code":0,
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *          "message": "验证不通过",
     *          "errors": {
     *              "name": ["用户名不能为空"],
     *              "email": ["邮箱不能为空"],
     *              "password": ["密码不能为空"],
     *              "geetest_challenge": ["请点击以滑动校验验证码"],
     *              "geetest_validate": ["请点击以滑动校验验证码"],
     *              "geetest_seccode": ["请点击以滑动校验验证码"],
     *              "geetest_status": ["请点击以滑动校验验证码"]
     *          },
     *          "status_code": 422
     *      }
     */
    public function register(RegisterFormRequest $request)
    {
        $args = $request->all();
        return User::register($args);
    }

    /**
     * @api {post} /api/auth/login 02.登陆
     * @apiName login
     * @apiGroup 02Auth
     *
     * @apiParam {String} email             M   电子邮箱
     * @apiParam {String} password          M   密码
     * @apiParam {String} geetest_challenge M   极验参数
     * @apiParam {String} geetest_validate  M   极验参数
     * @apiParam {String} geetest_seccode   M   极验参数
     * @apiParam {String} geetest_status    M   极验参数
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "message": "",
     *       "status_code":0
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 422
     *     {
     *          "message": "验证不通过",
     *          "errors": {
     *              "name": ["用户名不能为空"],
     *              "email": ["邮箱不能为空"],
     *              "password": ["密码不能为空"],
     *              "geetest_challenge": ["请点击以滑动校验验证码"],
     *              "geetest_validate": ["请点击以滑动校验验证码"],
     *              "geetest_seccode": ["请点击以滑动校验验证码"],
     *              "geetest_status": ["请点击以滑动校验验证码"]
     *          },
     *          "status_code": 422
     *      }
     *      HTTP/1.1 422（极验验证不通过）
     *     {
     *          "message": "验证不通过",
     *          "errors": {
     *              "error": ["验证失败请重试"],
     *          },
     *          "status_code": 422
     *      }
     *     HTTP/1.1 400
     *     {
     *          "message": "验证不通过",
     *          "errors": {
     *              "error": ["邮箱或密码不正确"],
     *          },
     *          "status_code": 400
     *      }
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');
        return User::login($credentials);
//        $res = $this->valiGeet($request->only('geetest_challenge', 'geetest_validate','geetest_seccode','geetest_status'));
//        if($res['status_code'] == 0){
//            $credentials = $request->only('email', 'password');
//            return User::login($credentials);
//        }else{
//            return response($res,422);
//        }

    }

    /**
     * @api {post} /api/geetest_api_v1 05.极验配置信息返回
     * @apiName geetest_api_v1
     * @apiGroup 02Auth
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *          "success": 1,
     *          "gt": "9af3aa9e204402036ff03ca65b64621a",
     *          "challenge": "30d33f3d3cd369458f7831928945f843",
     *          "new_captcha": 1,
     *          "status": 1
     *      }
     */
    public function geetest_api_v1()
    {
        $id = config('geetest.id');
        $key = config('geetest.key');
        $geek = new \GeetestLib($id, $key);

        $data = array(
            //"user_id" => $userid,//网站用户id
            "client_type" => "native",//#web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1"//$this->request->getClientIp()
        );
        $status = $geek->pre_process($data, 1);
        $result = json_decode($geek->get_response_str(), true);
        $result['status'] = $status;

        return response($result);
    }

    public function valiGeet(Request $request){
        $args = $request->only(['geetest_challenge','geetest_validate','geetest_seccode','geetest_status']);
        $id = config('geetest.id');
        $key = config('geetest.key');
        $geek = new \GeetestLib($id, $key);

        $geetest_challenge = $args['geetest_challenge'];
        $geetest_validate = $args['geetest_validate'];
        $geetest_seccode = $args['geetest_seccode'];
        $geetest_status = $args['geetest_status'];

        $data = array(
            //"user_id" => $userid, # 网站用户id
            "client_type" => "native", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1"//$this->request->getClientIp() # 请在此处传输用户请求验证时所携带的IP
        );
        if ($geetest_status == 1) {   //服务器正常
            $result = $geek->success_validate($geetest_challenge, $geetest_validate, $geetest_seccode, $data);
            if ($result) {
                return response(['status_code' => 0,'message' => '验证成功']);
            } else {
                return response(['status_code' => 422,'message' => '验证不通过','errors' => ['error' => '验证失败请重试']],422);
            }
        } else {  //服务器宕机,走failback模式
            if ($geek->fail_validate($geetest_challenge, $geetest_validate, $geetest_seccode)) {
                return response(['status_code' => 0,'message' => '验证成功']);
            } else {
                return response(['status_code' => 422,'message' => '验证不通过','errors' => ['error' => '验证失败请重试']],422);
            }
        }
    }

    /**
     * @api {get} /api/auth/user 03.获取用户信息
     * @apiName user
     * @apiGroup 02Auth
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "data":{
     *          "id":1,
     *          "name":"a",
     *          "email":"a@a.com",
     *          "created_at":"2018-07-10 02:27:51",
     *          "updated_at":"2018-07-10 02:27:51"
     *       },
     *       "status_code":0
     *     }
     */
    public function user(Request $request){
        $user = $request->user('api');
        if(empty($user)){
            return response(['status_code' => 401,'message' => 'Unauthenticated.'],401);
        }
        return response(['status_code' => 0,'user' => $user]);
    }

    /**
     * @api {post} /api/auth/logout 04.退出登陆
     * @apiName logout
     * @apiGroup 02Auth
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "message":"退出成功",
     *       "status_code":0
     *     }
     */
    public function logout()
    {
        if (Auth::guard('api')->check()) {
            Auth::guard('api')->user()->token()->delete();
        }
        return response(['message' => '登出成功', 'status_code' => 0]);
    }
}
