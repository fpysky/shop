<?php

namespace App\Models;

use App\Http\Resources\UserAddressResource;
use Illuminate\Database\Eloquent\Model;
use Auth;

class UserAddress extends Base
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
        $list = UserAddress::where('user_id','=',Auth::user()->id)->paginate($args['pSize']);
        $total = $list->total();
        $totalPage = ceil($total / $args['pSize']);
        $list = UserAddressResource::collection($list);
        return ['time' => time(),'code' => 0,'message' => '','list' => $list,'total' => $total,'totalPage' => $totalPage];
    }


}
