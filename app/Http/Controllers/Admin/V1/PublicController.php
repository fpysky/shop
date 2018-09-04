<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adminer;
use Captcha,Validator,Session;
use Auth;

class PublicController extends Controller
{
    public function login(Request $request){
        $args = $request->all();
        $rules = [
            'account' => 'required',
            'password' => 'required'
        ];
        $rulesMsg = [
            'account.required' => '用户名不能为空！',
            'password.required' => '密码不能为空！'
        ];

        //验证码开关
        $captchaSwitch = config('app.captchaSwitch');
        if($captchaSwitch == 'on'){
            $rules['captcha'] = 'required';
            $rulesMsg['captcha.required'] = '验证码不能为空！';
        }

        $validator = Validator::make($args, $rules, $rulesMsg);

        if($captchaSwitch == 'on'){
            if (!Captcha::check($args['captcha'])) {
                return response(['status_code' => 422, 'message' => '验证码错误！'],422);
            }
        }

        if ($validator->fails()) {
            return response(['status_code' => 422, 'message' => $validator->errors()->first()],422);
        }

        return Adminer::login($args);

//        $captchaSwitch = config('app.captchaSwitch');
//        return view('admin.public.login',['captchaSwitch' => $captchaSwitch]);
    }

    public function user(){
        return Adminer::user();
    }

    public function refresh(){
        $token = Auth::guard('admin')->refresh();
        $response = response(['status_code' => 0,'message' => '刷新token成功']);
        $response->headers->set('Authorization', 'Bearer '.$token);
        $response->headers->set("Access-Control-Expose-Headers","Authorization");
        return $response;
    }

    /**
     * 获取验证码
     * @return array
     */
    public function getCaptcha(){
        return ['verifySrc' => Captcha::src()];
    }

    /**
     * 登陆验证
     * @param Request $request
     * @return array
     */
    public function loginPost(Request $request)
    {
        $args = $request->all();
        $rules = [
            'account' => 'required',
            'password' => 'required'
        ];
        $rulesMsg = [
            'account.required' => '用户名不能为空！',
            'password.required' => '密码不能为空！'
        ];

        //验证码开关
        $captchaSwitch = config('app.captchaSwitch');
        if($captchaSwitch == 'on'){
            $rules['captcha'] = 'required';
            $rulesMsg['captcha.required'] = '验证码不能为空！';
        }

        $validator = Validator::make($args, $rules, $rulesMsg);

        if($captchaSwitch == 'on'){
            if (!Captcha::check($args['captcha'])) {
                return ['code' => 1, 'message' => '验证码错误！'];
            }
        }

        if ($validator->fails()) {
            return ['code' => 1, 'message' => $validator->errors()->first()];
        }

        $adminer = Adminer::where('account', $args['account'])->first();

        if (empty($adminer)) {
            return ['code' => 1, 'message' => '账号不存在'];
        }

        if (decrypt($adminer->password) != $args['password']) {
            return ['code' => 1, 'message' => '密码错误'];
        }

        session(['identity' => ['adminer_id' => $adminer->id]]);
        cookie('account', trim($args['account']), 43200);
        return ['code' => 0,'msg' => ''];
    }

    /**
     * 退出登录
     */
    public function logout(){
        Session::forget('identity');
    }
}
