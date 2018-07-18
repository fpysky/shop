<?php

namespace App\Models;

use App\Http\Resources\ProductClassifyResource;
use Illuminate\Database\Eloquent\Model;

class ProductClassify extends Model
{
    public static function getRootClassify(){
        $list = ProductClassify::where('pid','=',0)->get();
        return ProductClassifyResource::collection($list);
    }
}
