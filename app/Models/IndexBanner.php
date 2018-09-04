<?php

namespace App\Models;

use App\Http\Resources\IndexBannerResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class IndexBanner extends Model
{
    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }
        return \Storage::disk('public')->url($this->attributes['image']);
    }

    public static function banners(){
        $list = IndexBanner::all();
        $list = IndexBannerResource::collection($list);
        return response(['status_code' => 0,'list' => $list]);
    }

    public static function indexBanners($args){
        $list = IndexBanner::paginate($args['pSize']);
        $total = $list->total();
        $list = IndexBannerResource::collection($list);
        return response(['status_code' => 0,'list' => $list,'total' => $total]);
    }

    public static function destroy($ids){
        IndexBanner::whereIn('id',$ids)->delete();
        return response(['status_code' => 0,'message' => '操作成功']);
    }

    public static function store($args){
        if($args['id'] == 0){
            $indexBanner = new IndexBanner();
            $indexBanner->product_id = $args['product_id'];
            $indexBanner->image = strstr($args['image'],'/storage');
            $indexBanner->save();
        }else{
            $indexBanner = IndexBanner::where('id','=',$args['id'])->firstOrFail();
            $indexBanner->product_id = $args['product_id'];
            $indexBanner->image = strstr($args['image'],'/storage');
            $indexBanner->save();
        }
        return response(['status_code' => 0,'message' => '操作成功']);
    }

    public static function getIndexBanner($id){
        $list = IndexBanner::select(['id','image','product_id'])->where('id','=',$id)->firstOrFail()->toArray();
        return response(['status_code' => 0,'list' => $list]);
    }
}
