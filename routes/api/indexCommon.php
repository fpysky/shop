<?php
/**
 * 首页通用接口
 */
$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('getIndexBanners','IndexBannerController@getIndexBanners');//购物车列表
    });
});