<?php

namespace App\Http\Requests;

class UserAddressRequest extends Request
{
    public function rules()
    {
        return [
            'province' => 'required|Integer',
            'city' => 'required|Integer',
            'district' => 'required|Integer',
            'address' => 'required|string',
            'zip' => 'required|Integer',
            'contact_name' => 'required',
            'contact_phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        ];
    }

    public function messages(){
        return [
            'province.required' => '省份不能为空',
            'province.Integer' => '省份必须是整型',
            'city.required' => '城市不能为空',
            'city.Integer' => '城市必须是整形',
            'district.required' => '区域不能为空',
            'district.Integer' => '区域必须是整型',
            'address.required' => '详细地址不能为空',
            'address.string' => '详细地址必须是字符型',
            'zip.required' => '邮编不能为空',
            'zip.Integer' => '邮编必须是整型',
            'contact_name.required' => '收件人不能为空',
            'contact_phone.required' => '收件人手机号不能为空',
            'contact_phone.regex' => '收件人手机号格式不正确',
        ];
    }
}
