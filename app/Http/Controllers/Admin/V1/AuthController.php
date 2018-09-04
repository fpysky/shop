<?php

namespace App\Http\Controllers\Admin\V1;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function user(Request $request){
        $user = $request->user('admin');
        $roles = Role::getAdminerRoles($user->id);
        return response(['status_code' => 0,'user' => $user,'roles' => $roles]);
    }

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
}
