<?php
/**
 * 用户地址
 */
$api->version('v1', function ($api) {
    $api->group([
        'middleware' => 'auth:api',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('addresses', 'UserAddressesController@addresses');//用户地址列表
        $api->post('addresses', 'UserAddressesController@store');//地址添加&修改
        $api->delete('addresses','UserAddressesController@destroy');//删除地址
    });
});