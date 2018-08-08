<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CommonController extends Controller
{
    public function uploadImage(Request $request){
        //判断文件在请求中是否存在
        if (!$request->hasFile('file')) {
            return response(['status_code' => 1,'message' => '上传文件不存在']);
        }
        $file = $request->file('file');
        //验证文件是否上传成功
        if (!$request->file('file')->isValid()){
            return response(['status_code' => 1,'message' => '上传文件失败']);
        }
        $extension = $request->file->extension();
        $filename = date('YmdHis').uniqid().'.'.$extension;
        $path = $request->file->storeAs('images', $filename, 'public');
        return response(['status_code' => 0,'message' => '上传成功','path' => '/storage/'.$path]);
    }
}
