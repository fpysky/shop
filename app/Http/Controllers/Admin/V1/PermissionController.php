<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Requests\PermissionFormRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adminer;
use App\Models\Permission;
use App\Models\Role;


class PermissionController extends Controller
{
    public function adminList(){
        return view('admin.permission.adminlist');
    }

    public function roleList(){
        return view('admin.permission.rolelist');
    }

    public function permissionList(){
        return view('admin.permission.permissionlist');
    }

    /**
     * 获取管理员权限
     * @return array
     */
    public function getAdminPermission(){
        $identity = session('identity');
        return Adminer::getAdminPermission($identity);
    }

    /**
     * 获取所有角色
     * @param Request $request
     * @return array
     */
    public function getAllRole(Request $request){
        return Role::getAll();
    }

    /**
     * 获取管理员角色
     */
    public function getAdminRoles(Request $request){
        $id = intval($request->input('id'),0);
        if(!$id){
            return ['code' =>0,'message' => 'id不能为空'];
        }
        return Adminer::getAdminRoles($id);
    }

    /**
     * 获取到所有权限
     * @return array
     */
    public function getAllPermission(){
        return Permission::getAll();
    }

    /**
     * 获取对应角色权限
     * @return array
     */
    public function getRolePermission(Request $request){
        $id = intval($request->input('id'),0);
        if(!$id){
            return ['code' =>0,'message' => 'id不能为空'];
        }
        return Role::getRolePermission($id);
    }

    /**
     * 获取权限列表
     * @param Request $request
     * @return array
     */
    public function permissions(Request $request){
        $args = $request->post();
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):50;
        $args['name'] = $args['name'] ?? '';
        return Permission::permissions($args);
    }

    /**
     * 获取权限列表（下拉数据）
     * @return array
     */
    public function getPidOptions(){
        return Permission::getPidOptions();
    }

    /**
     * 权限提交
     * @param PermissionFormRequest $request
     * @return array
     */
    public function store(PermissionFormRequest $request){
        $args = $request->post();
        $args['id'] = intval($args['id'],0);
        if($args['id'] == 1 || $args['id'] == 2 || $args['id'] == 3){
            return response(['status_code' => 1,'message' => '此权限涉及到系统关键功能无法修改'],400);
        }
        return Permission::store($args);
    }

    /**
     * 删除权限
     */
    public function destroy(Request $request){
        $ids = $request->all();
        if(empty($ids)){
            return response(['status_code' => 422,'message' => 'ids不能空'],422);
        }
        foreach($ids as $v){
            if($v == 1){
                return response(['status_code' => 1,'message' => '此权限不能删除'],400);
            }
        }
        return Permission::destroy($ids);
    }
}
