<?php
/**
 * 首页通用接口
 */
$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('index/banners','IndexBannerController@banners');//购物车列表
        $api->get('index/hotProducts', 'ProductController@hotProducts');//首页热品推荐列表
        $api->get('index/mobilePhones', 'ProductController@mobilePhones');//首页热品推荐列表
    });
});