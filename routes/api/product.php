<?php
/**
 * 商品模块
 */
$api->version('v1', function ($api) {
    $api->group([
        'middleware' => 'jwt.api.auth',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('hotProducts', 'ProductController@hotProducts');//首页热品推荐列表
    });
});