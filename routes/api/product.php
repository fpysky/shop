<?php
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
        $api->get('products/favorites','ProductController@favorites');//收藏列表
    });
});

/**
 * 商品模块
 */
$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {

        $api->get('products/{id}', 'ProductController@products');//商品详情
    });
});
