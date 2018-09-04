<?php
/**
 * 商品分类
 */
$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('productClassify', 'ProductClassifyController@productClassify');//用户地址列表
    });
});