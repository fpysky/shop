<?php

namespace App\Models;

use App\Http\Resources\UserAddressResource;
use Illuminate\Database\Eloquent\Model;
use Auth;

class UserAddress extends Model
{
    protected $fillable = [
        'province',
        'city',
        'district',
        'address',
        'zip',
        'contact_name',
        'contact_phone',
        'last_used_at',
    ];
    protected $dates = ['last_used_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }

    public static function addresses($args){
        $list = UserAddress::where('user_id','=',Auth::guard('api')->user()->id)->paginate($args['pSize']);
        $total = $list->total();
        $totalPage = ceil($total / $args['pSize']);
        $list = UserAddressResource::collection($list);
        return response(['status_code' => 0,'list' => $list,'total' => $total,'totalPage' => $totalPage]);
    }

    public static function store($args){
        $id = 0;
        if($args['id'] == 0){
            $insertData = [
                'user_id' => $args['user_id'],
                'province' => intval($args['province']),
                'city' => intval($args['city']),
                'district' => intval($args['district']),
                'address' => $args['address'],
                'zip' => intval($args['zip']),
                'contact_name' => $args['contact_name'],
                'contact_phone' => $args['contact_phone']
            ];
            if(isset($args['is_default'])){
                $insertData['is_default'] = $args['is_default'];
            }
            $id = UserAddress::insertGetId($insertData);
        }else{
            $id = $args['id'];
            $userAddress = UserAddress::where('id','=',$args['id'])->firstOrFail();
            $userAddress->province = intval($args['province']);
            $userAddress->city = intval($args['city']);
            $userAddress->district = intval($args['district']);
            $userAddress->address = $args['address'];
            $userAddress->zip = intval($args['zip']);
            if(isset($args['is_default'])){
                $userAddress->is_default = $args['is_default'];
            }
            $userAddress->contact_name = $args['contact_name'];
            $userAddress->contact_phone = $args['contact_phone'];
            $userAddress->save();
        }
        if(isset($args['is_default']) && $args['is_default']){
            UserAddress::where('id','<>',$id)->update(['is_default' => 0]);
        }
        return response(['status_code' => 0,'message' => '操作成功']);
    }

    public static function destroy($args){
        UserAddress::whereIn('id',$args['ids'])->delete();
        return response(['status_code' => 0,'message' => '操作成功']);
    }
}
