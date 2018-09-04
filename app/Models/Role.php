<?php
namespace App\Models;

use App\Http\Resources\RoleResource;
use DB;

class Role extends Base{
    public static function getAdminerRoles($id){
        return Role::whereIn('id',function($query)use ($id){
            $query->select(['role_id'])->from('admin_has_roles')->where('adminer_id','=',$id);
        })->pluck('name');
    }

    public function roleHasPermission(){
        return $this->hasMany('App\Models\RoleHasPermission','role_id','id');
    }

    /**
     * 得到所有角色
     * @return array
     */
    public static function getAll(){
        $list = RoleResource::collection(Role::all());
        return ['code' => 0,'message' => '','list' =>$list];
    }

    /**
     * 获取角色
     */
    public static function roles($args){
        $where = [];
        if(!empty($args['name'])){
            $name = $args['name'];
            $where[] = ['name','like',"%$name%"];
        }
        $list = Role::where($where)->paginate($args['pSize']);
        $total = $list->total();
        $list = RoleResource::collection($list);
        $totalPage = ceil($total / $args['pSize']);
        return response(['status_code' => 0,'list' => $list,'total' => $total,'totalPage' => $totalPage]);
    }

    public static function store($args){
        DB::beginTransaction();
        try{
            if($args['id'] == 0){
                //保存角色
                $insertData = [
                    'name' => $args['name'],
                ];
                $roleId = Role::insertGetId($insertData);

                if(!isset($args['permissions'])){
                    return response(['status_code' => 422,'message' => '权限不能为空'],422);
                }

                //保存角色权限
                $insertData = [];
                foreach($args['permissions'] as $k => $v){
                    $insertData[] = [
                        'role_id' => $roleId,
                        'permission_id' => $v,
                    ];
                }
                RoleHasPermission::insert($insertData);
            }else{
                //保存角色
                $role = Role::where('id','=',$args['id'])->firstOrFail();
                $role->name = $args['name'];
                $role->updated_at = time();
                $res = $role->save();
                if(empty($res)){
                    throw new \Exception();
                }

                if(!isset($args['permissions'])){
                    return response(['status_code' => 422,'message' => '权限不能为空'],422);
                }

                //保存角色权限
                RoleHasPermission::where('role_id','=',$args['id'])->delete();
                $insertData = [];
                foreach($args['permissions'] as $k => $v){
                    $insertData[] = [
                        'role_id' => $args['id'],
                        'permission_id' => $v,
                    ];
                }
                RoleHasPermission::insert($insertData);
            }
            DB::commit();
            return response(['status_code' => 0,'message' => '操作成功']);
        }catch (\Exception $e){
            DB::rollback();
            return response(['status_code' => 1,'message' => $e->getMessage()],400);
        }
    }

    /**
     * 获取角色权限
     * @param $id
     * @return array
     */
    public static function getRolePermission($id){
        try{
            $roleHasPermission = Role::find($id)->roleHasPermission;
            $list = [];
            foreach($roleHasPermission as $k => $v){
                $list[] = $v['permission_id'];
            }
            return ['code' => 0,'message' => '','list' => $list];
        }catch (\Exception $e){
            return ['code' => 1,'message' => $e->getMessage()];
        }
    }

    /**
     * 删除角色
     * @param $ids
     * @return array
     */
    public static function destroy($ids){
        RoleHasPermission::whereIn('role_id',$ids)->delete();
        Role::whereIn('id',$ids)->delete();
        return response(['status_code' => 0,'message' => '操作成功']);
    }
}