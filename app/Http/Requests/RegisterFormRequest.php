<?php

namespace App\Http\Requests;

class RegisterFormRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:10',
            'geetest_challenge' => 'required',
            'geetest_validate' => 'required',
            'geetest_seccode' => 'required',
            'geetest_status' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => '用户名不能为空',
            'name.string' => '用户名必须是字符串',
            'name.unique' => '用户名已存在',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'email.unique' => '邮箱已存在',
            'password.required' => '密码不能为空',
            'password.string' => '密码必须是字符串',
            'password.min' => '密码至少6为数',
            'password.max' => '密码最多10位数',
            'geetest_challenge.required' => '请点击以滑动校验验证码',
            'geetest_validate.required' => '请点击以滑动校验验证码',
            'geetest_seccode.required' => '请点击以滑动校验验证码',
            'geetest_status.required' => '请点击以滑动校验验证码'
        ];
    }
}
