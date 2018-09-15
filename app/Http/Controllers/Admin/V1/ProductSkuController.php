<?php

namespace App\Http\Controllers\Admin\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductSku;

class ProductSkuController extends Controller
{
    public function destroy(Request $request){
        $id = $request->input('id');
        $id = intval($id);
        if($id == 0){
            return response(['status_code' => 422,'message' => 'ids不能空'],422);
        }
        return ProductSku::destroy($id);
    }
}
