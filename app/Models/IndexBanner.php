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
}
