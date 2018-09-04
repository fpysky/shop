<?php

namespace App\Http\Controllers\Admin\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\RoleFormRequest;

class RoleController extends Controller
{
    /**
     * 获取角色列表
     * @param Request $request
     * @return array
     */
    public function roles(Request $request){
        $args = $request->post();
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):50;
        $args['name'] = $args['name'] ?? '';
        return Role::roles($args);
    }

    /**
     * 角色提交
     * @param RoleFormRequest $request
     * @return array
     */
    public function store(RoleFormRequest $request){
        $args = $request->all();
        $args['id'] = intval($args['id'],0);
        if($args['id'] == 1){
            return response(['status_code' => 1,'message' => '此角色涉及到系统关键功能无法修改']);
        }
        return Role::store($args);
    }

    /**
     * 删除角色
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function destroy(Request $request){
        $ids = $request->all();
        if(empty($ids)){
            return response(['status_code' => 422,'message' => 'ids不能空'],422);
        }
        foreach($ids as $v){
            if($v == 1){
                return response(['status_code' => 1,'message' => '此角色不能删除']);
            }
        }
        return Role::destroy($ids);
    }
}
