<?php
/**
 * 用户地址
 */
$api->version('v1', function ($api) {
    $api->group([
        'middleware' => 'jwt.api.auth',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('productClassify', 'ProductClassifyController@productClassify');//用户地址列表
    });
});