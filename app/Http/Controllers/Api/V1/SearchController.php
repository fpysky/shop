<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request){
        $searchKeyword = $request->input('searchKeyword');
        $product = Product::search($searchKeyword)->get();
        return response(['status_code' => 0,'list' => $product]);
    }
}
