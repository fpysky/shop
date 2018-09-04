<?php

namespace App\Http\Controllers\Admin\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    public function products(Request $request){
        $args = $request->all();
        $args['title'] = isset($args['title'])?$args['title']:'';
        $args['pSize'] = isset($args['pSize'])?intval($args['pSize']):50;
        return Product::getList($args);
    }

    public function destroy(Request $request){
        $ids = $request->all();
        if(empty($ids)){
            return response(['status_code' => 422,'message' => 'ids不能空'],422);
        }
        return Product::destroy($ids);
    }

    public function store(ProductRequest $request){
        $args = $request->all();
        $args['id'] = 0;
        return Product::store($args);
    }

    public function getProduct($id){
        return Product::getProduct($id);
    }

    public function updateColor(Request $request){
        $args = $request->all();
        return Product::updateColor($args);
    }

    public function update(ProductRequest $request){
        $args = $request->all();
        return Product::store($args);
    }

    public function getSellProducts(){
        return Product::getSellProducts();
    }
}
