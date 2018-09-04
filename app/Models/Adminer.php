<?php

namespace App\Models;

use App\Http\Resources\PermissionResource;
use App\Http\Resources\AdminerResource;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Adminer extends Authenticatable
{
    use HasApiTokens,Notifiable;

    public function findForPassport($username) {
        return $this->where('account', $username)->first();
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function adminHasRole(){
        return $this->hasMany('App\Models\AdminHasRole','adminer_id','id');
    }

    public static function user(){
        $id = Auth::guard('admin')->user()->id;
        $user = Adminer::find($id);
        $roles = Role::whereIn('id',function($query)use ($id){
            $query->select(['role_id'])->from('admin_has_roles')->where('adminer_id','=',$id);
        })->pluck('name');
        return response([
            'status_code' => 0,
            'data' => $user,
            'roles' => $roles,
            'name' => $user->name,
            'avatar' => $user->avatar,
            'introduction' => $user->introduction,
        ]);
    }

    /**
     * 获取管理员权限
     * @return array
     */
    public static function getAdminPermission($identity){
        //得到管理员角色
        $adminHasRole = Adminer::find($identity['adminer_id'])->adminHasRole;
        $ids = [];
        foreach($adminHasRole as $k => $v){
            //得到角色下的权限
            $roleHasPermission = RoleHasPermission::where('role_id','=',$v['role_id'])->get();
            foreach($roleHasPermission as $k => $v){
                $ids[] = $v['permission_id'];
            }
        }
        $list = Permission::whereIn('id',$ids)->get();
        $list = PermissionResource::collection($list);
        $ulist = [];
        foreach($list as $ks => $vs){
            if($vs['pid'] == 0){
                $r['id'] = $vs['id'];
                $r['pid'] = $vs['pid'];
                $r['icon'] = $vs['icon'];
                $r['route'] = $vs['route'];
                $r['name'] = $vs['name'];
                $ulist[] = $r;
                unset($r);
            }
        }

        //再找出子节点
        foreach($list as $ks => $vs){
            if($vs['pid'] != 0){
                foreach($ulist as $kss => $vss){
                    if($vss['id'] == $vs['pid']){
                        $r['id'] = $vs['id'];
                        $r['pid'] = $vs['pid'];
                        $r['icon'] = $vs['icon'];
                        $r['route'] = $vs['route'];
                        $r['name'] = $vs['name'];
                        $ulist[$kss]['_child'][] = $r;
                        unset($r);
                    }
                }
            }
        }
        return ['code' => 0,'message' => '','list' => $ulist];
    }

    /**
     * 获取管理员列表
     * @param $args
     * @return array
     */
    public static function getAdminList($args){
        $where = [];
        if(!empty($args['name'])){
            $name = $args['name'];
            $where[] = ['name','like',"%$name%"];
        }
        $list = Adminer::where($where)->paginate($args['pSize']);
        $total = $list->total();
        $list = AdminerResource::collection($list);
        $totalPage = ceil($total / $args['pSize']);
        return response(['status_code' => 0,'list' =>$list,'total' => $total,'totalPage' => $totalPage]);
    }

    /**
     * 管理员提交
     * @param $args
     * @return array
     */
    public static function store($args){
        DB::beginTransaction();
        try{
            if($args['id'] == 0){
                //保存管理员
                $insertData = [
                    'name' => $args['name'],
                    'account' => $args['account'],
                    'email' => $args['email'] ?? '',
                    'avatar' => $args['avatar']?strstr($args['avatar'],'/storage'):'',
                    'password' => bcrypt($args['password'])
                ];
                $adminerId = Adminer::insertGetId($insertData);

                if (!isset($args['roles'])) {
                    return response(['status_code' => 422,'message' => '角色不能为空'],422);
                }

                //指派角色
                $insertData = [];
                foreach($args['roles'] as $k => $v){
                    $insertData[] = [
                        'adminer_id' => $adminerId,
                        'role_id' => $v
                    ];
                }
                AdminHasRole::insert($insertData);
            }else{
                //保存管理员
                $adminer = Adminer::findOrFail($args['id']);
                $adminer->name = $args['name'];
                $adminer->email = $args['email'] ?? '';
                $adminer->avatar = $args['avatar']?strstr($args['avatar'],'/storage'):'';
                $adminer->account = $args['account'];
                $res = $adminer->save();
                if(empty($res)){
                    throw new \Exception();
                }

                if (!isset($args['roles'])) {
                    return response(['status_code' => 422,'message' => '角色不能为空'],422);
                }

                //指派角色
                AdminHasRole::where('adminer_id','=',$args['id'])->delete();
                $insertData = [];
                foreach($args['roles'] as $k => $v){
                    $insertData[] = [
                        'adminer_id' => $args['id'],
                        'role_id' => $v
                    ];
                }
                AdminHasRole::insert($insertData);
            }
            DB::commit();
            return response(['status_code' => 0,'message' => '操作成功']);
        }catch(\Exception $e){
            DB::rollback();
            return response(['status_code' => 1,'message' => $e->getMessage()],400);
        }
    }

    /**
     * 得到管理员角色
     * @param $id
     * @return array
     */
    public static function getAdminRoles($id){
        $adminer = Adminer::where('id','=',$id)->firstOrfail();
        $adminRoles = $adminer->adminHasRole;
        $list = [];
        foreach($adminRoles as $k => $v){
            $list[] = $v['role_id'];
        }
        return ['code' => 0,'message' => '','list' => $list];
    }

    /**
     * 删除管理员
     * @param $ids
     * @return array
     */
    public static function destroy($ids){
        AdminHasRole::whereIn('adminer_id',$ids)->delete();
        Adminer::whereIn('id',$ids)->delete();
        return response(['status_code' => 0,'message' => '操作成功']);
    }

    /**
     * 获取管理员详细信息
     * @param $identity
     * @return array
     */
    public static function getAdminInfo($identity){
        $list = Adminer::where('id','=',$identity['adminer_id'])->firstOrFail();
        $list = new AdminerResource($list);
        return ['code' => 0,'message' => '','list' => $list];
    }

    public static function adminInfoPost($args){
        try{
            $adminer = Adminer::where('id','=',$args['id'])->firstOrFail();
            $adminer->head_img = $args['imageUrl'];
            $res = $adminer->save();
            if(empty($res)){
                throw new \Exception();
            }
            return ['code' => 0,'message' => '操作成功'];
        }catch (\Exception $e){
            return ['code' => 1,'message' => $e->getMessage()];
        }

    }
}
