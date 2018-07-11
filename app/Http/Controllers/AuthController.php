<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use JWTAuth,Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $args = $request->all();
        return User::register($args);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return User::login($credentials);
    }

    public function user()
    {
        return User::user();
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function geetest_api_v1()
    {
        $id = config('geetest.id');
        $key = config('geetest.key');
        $geek = new \GeetestLib($id, $key);
//        $args = $this->request->all();
//        $userid = $args['geetest_imei'];
//        $validator = \Validator::make($args, [
//            "geetest_imei" => 'required',
//        ], [
//            'geetest_imei.required' => trans("users.mobile_required"),
//        ]);
//        if ($validator->fails()) {
//            return $this->errorBadValidator($validator);
//        }

        $data = array(
//            "user_id" => $userid,//网站用户id
            "client_type" => "native",//#web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1"//$this->request->getClientIp()
        );
        $status = $geek->pre_process($data, 1);

//        $redis = app('redis.connection');
        //$redis->connect("127.0.0.1");
        //dd($redis);
//        $redis->set('gtserver_' . $userid, $status);
        //Session::put('gtserver',$status);
        //$list               =   json_decode($geek->get_response_str());
        //return $this->successRequest(['list'=>$list,'message' => "获取成功", "code" => 0]);
//        return $geek->get_response_str();
        $result = json_decode($geek->get_response_str(), true);
        $result['status'] = $status;

        return response($result);

//        return ['status' => $status,'geek' => $geek->get_response_str()];
    }
}
