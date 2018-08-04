<?php
/**
 * 项目api开始
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Api\V1'],function($api){
        $api->post('auth/register','AuthController@register');
        $api->post('auth/login','AuthController@login');
        $api->post('geetest_api_v1','AuthController@geetest_api_v1');//极验后端校验
        $api->get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
        $api->get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');//邮箱验证处理
        $api->post('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');//主动发送验证邮件
    });
    $api->group([
        'middleware' => 'jwt.api.auth',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('auth/user', 'AuthController@user');
        $api->post('auth/logout', 'AuthController@logout');
    });
    $api->group([
        'middleware' => 'jwt.api.refresh',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->get('auth/refresh', 'AuthController@refresh');
    });
});

include 'address.php';
include 'productClassify.php';
include 'product.php';
include 'cart.php';
include 'order.php';
include 'indexCommon.php';