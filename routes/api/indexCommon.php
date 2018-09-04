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
        $api->get('index/mobilePhones', 'ProductController@mobilePhones');//首页手机专栏列表
        $api->get('index/digitalAudio', 'ProductController@digitalAudio');//首页数码配件列表
        $api->get('index/perimeterLife', 'ProductController@perimeterLife');//首页数码配件列表
    });
});