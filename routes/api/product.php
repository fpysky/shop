<?php
/**
 * 商品模块
 */
$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('hotProducts', 'ProductController@hotProducts');//首页热品推荐列表
        $api->get('products/{id}', 'ProductController@products');//商品详情
        $api->post('products/{id}/favorite','ProductController@favor');//收藏商品
        $api->delete('products/{id}/favorite','ProductController@disfavor');//取消收藏商品
    });
});
/**
 * 商品模块（需登陆）
 */
$api->version('v1', function ($api) {
    $api->group([
        'middleware' => 'jwt.api.auth',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->post('products/{id}/favorite','ProductController@favor');//收藏商品
        $api->delete('products/{id}/favorite','ProductController@disfavor');//取消收藏商品
    });
});