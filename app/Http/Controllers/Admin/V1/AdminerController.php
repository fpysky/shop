<?php

namespace App\Http\Controllers\Admin\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adminer;
use App\Http\Requests\AdminerRequest;

class AdminerController extends Controller
{
    /**
     * 获取管理员列表
     * @param Request $request
     * @return array
     */
    public function adminers(Request $request){
        $args = $request->post();
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):50;
        $args['name'] = $args['name'] ?? '';
        return Adminer::getAdminList($args);
    }

    /**
     * 管理员提交
     * @param AdminerRequest $request
     * @return array
     */
    public function store(AdminerRequest $request){
        $args = $request->post();
        $args['id'] = intval($args['id'],0);
        if($args['id'] == 0 && empty($args['password'])){
            return response(['status_code' => 1,'message' => '密码不能为空'],422);
        }
        return Adminer::store($args);
    }

    /**
     * 管理员修改
     * @param AdminerRequest $request
     * @return array
     */
//    public function update(AdminerRequest $request){
//        $args = $request->post();
//        $args['id'] = intval($args['id'],0);
//        if($args['id'] == 0){
//            return response(['status_code' => 422,'message' => 'ID不能为空']);
//        }
//        return Adminer::store($args);
//    }

    /**
     * 删除管理员
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request){
        $ids = $request->all();
        if(empty($ids)){
            return response(['status_code' => 422,'message' => 'ids不能空'],422);
        }
        foreach($ids as $v){
            if($v == 1){
                return response(['status_code' => 422,'message' => '超级管理员不能删除'],422);
            }
        }
        return Adminer::destroy($ids);
    }
}
