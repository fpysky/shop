<?php

namespace App\Models;

use App\Http\Resources\ProductClassifyResource;
use Illuminate\Database\Eloquent\Model;

class ProductClassify extends Model
{
    public static function getRootClassify(){
        return ProductClassify::where('pid','=',0)->get()->toArray();
    }

    public static function getSecondRootClassify(){
        return ProductClassify::where('pid','<>',0)->get()->toArray();
    }

    public function product()
    {
        return $this->hasMany(Product::class,'classify_id','id');
    }

    public static function getProductClassify(){
        $root = ProductClassify::getRootClassify();
        $list = array();
        foreach($root as $k => $v){
            $r = $v;
            $r['_child'] = ProductClassify::getChild($v['id']);
            $list[] = $r;
            unset($r);
        }
        return response(['status_code' => 0,'list' => $list]);
    }

    protected static function getChild($id){
        return ProductClassify::where('pid','=',$id)->with('product')->get();
    }
}
