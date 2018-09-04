<?php

namespace App\Http\Controllers\Admin\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductClassify;

class ProductClassifyController extends Controller
{
    public function getSecondRootClassify(){
        return ProductClassify::getSecondRootClassify();
    }

    public function productClassifies(Request $request){
        $args = $request->all();
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):50;
        return ProductClassify::productClassifies($args);
    }

    public function destroy(Request $request){
        $ids = $request->all();
        if(empty($ids)){
            return response(['status_code' => 422,'message' => 'ids不能空'],422);
        }
        return ProductClassify::destroy($ids);
    }

    public function store(Request $request){
        $args = $request->all();
        $args['id'] = intval($args['id'],0);
        $args['pid'] = isset($args['pid'])?intval($args['pid']):0;
        return ProductClassify::store($args);
    }

    public function getRootClassify(){
        return ProductClassify::getRootClassify();
    }

    public function getClassify(Request $request){
        $args = $request->all();
        if(empty($args['id'])){
            return response(['status_code' => 422,'message' => 'id不能空'],422);
        }
        return ProductClassify::getClassify($args);
    }
}
