<?php

namespace App\Http\Requests;

class LoginFormRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'geetest_challenge' => 'required',
            'geetest_validate' => 'required',
            'geetest_seccode' => 'required',
            'geetest_status' => 'required',
        ];
    }

    public function messages(){
        return [
            'email.required' => '邮箱不能为空',
            'password.required' => '密码不能为空',
            'geetest_challenge.required' => '请点击以滑动校验验证码',
            'geetest_validate.required' => '请点击以滑动校验验证码',
            'geetest_seccode.required' => '请点击以滑动校验验证码',
            'geetest_status.required' => '请点击以滑动校验验证码'
        ];
    }
}
