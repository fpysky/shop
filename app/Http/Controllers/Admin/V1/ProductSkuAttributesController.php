<?php

namespace App\Http\Controllers\Admin\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSkuAttributeRequest;
use App\Models\ProductSkuAttribute;

class ProductSkuAttributesController extends Controller
{
    public function store(ProductSkuAttributeRequest $request){
        $attributes = $request->post();
        if(empty($attributes)){
            return response(['status_code' => 1,'message' => 'attributes不能为空'],422);
        }
        return ProductSkuAttribute::store($attributes);
    }

    public function getData($productId){
        return ProductSkuAttribute::getData($productId);
    }

    public function destroy($id){
        return ProductSkuAttribute::destroy($id);
    }
}
