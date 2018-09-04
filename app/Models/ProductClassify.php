<?php

namespace App\Models;

use App\Http\Resources\ProductClassifyResource;
use Illuminate\Database\Eloquent\Model;

class ProductClassify extends Model
{
    public static function getRootClassify(){
        $list = ProductClassify::select(['id','name'])->where('pid','=',0)->get()->toArray();
        $list[] = ['id' => 0,'name' => 'root'];
        return $list;
    }

    public static function getSecondRootClassify(){
        return ProductClassify::select(['id','name'])->where('pid','<>',0)->get()->toArray();
    }

    public function product()
    {
        return $this->hasMany(Product::class,'product_classify_id','id');
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

    public static function productClassifies($args){
        $where = [];
        if(isset($args['name'])){
            $where[] = ['name','=',$args['name']];
        }
        $list = ProductClassify::where($where)->paginate($args['pSize']);
        $total = $list->total();
        $list = ProductClassifyResource::collection($list);
        return response(['status_code' => 0,'list' => $list,'total' => $total]);
    }

    public static function destroy($ids){
        ProductClassify::whereIn('id',$ids)->delete();
        return response(['status_code' => 0,'message' => '操作成功']);
    }

    public static function store($args){
        if($args['id'] == 0){
            $productClassify = new ProductClassify();
            $productClassify->name = $args['name'];
            $productClassify->pid = $args['pid'];
            $productClassify->save();
        }else{
            $productClassify = ProductClassify::where('id','=',$args['id'])->firstOrFail();
            $productClassify->name = $args['name'];
            $productClassify->pid = $args['pid'];
            $productClassify->save();
        }
        return response(['status_code' => 0,'message' => '操作成功']);
    }

    public static function getClassify($args){
        $list = ProductClassify::select(['id','name','pid'])->where('id','=',$args['id'])->firstOrFail()->toArray();
        return response(['status_code' => 0,'list' => $list]);
    }
}
