<?php
/**
 * 购物车模块（需登陆）
 */
$api->version('v1', function ($api) {
    $api->group([
        'middleware' => 'jwt.api.auth',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('cart','CartController@cart');//购物车列表
        $api->post('cart','CartController@add');//加入购物车
        $api->delete('cart/{id}','CartController@remove');//从购物车移除商品
        $api->put('cart/{id}','CartController@update');//更新购物车商品
        $api->post('cart/settle','CartController@settle');//结算
    });
});