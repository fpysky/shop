<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Requests\IndexBannerRequest;
use App\Models\IndexBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexBannersController extends Controller
{
    public function indexBanners(Request $request){
        $args = $request->all();
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):50;
        return IndexBanner::indexBanners($args);
    }

    public function destroy(Request $request){
        $ids = $request->all();
        if(empty($ids)){
            return response(['status_code' => 422,'message' => 'ids不能空'],422);
        }
        return IndexBanner::destroy($ids);
    }

    public function store(IndexBannerRequest $request){
        $args = $request->all();
        $args['product_id'] = intval($args['product_id']);
        return IndexBanner::store($args);
    }

    public function getIndexBanner($id){
        return IndexBanner::getIndexBanner($id);
    }
}
