<?php
/**
 * 项目api开始
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Api\V1'],function($api){
        $api->post('login','AuthController@login');
//        $api->post('auth/login','AuthController@login');
//        $api->post('geetest_api_v1','AuthController@geetest_api_v1');//极验后端校验
//        $api->get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
//        $api->get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');//邮箱验证处理
//        $api->post('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');//主动发送验证邮件
        $api->post('geetest_api_v1', 'AuthController@geetest_api_v1');//极验验证v1
        $api->post('valiGeet', 'AuthController@valiGeet');
        $api->get('user','AuthController@user');
        $api->post('logout', 'AuthController@logout');
        $api->post('register', 'AuthController@register');
        $api->get('search', 'SearchController@search');
        $api->get('login/github', 'AuthController@redirectToProvider');
        $api->get('login/github/callback', 'AuthController@handleProviderCallback');
    });
//    $api->group([
//        'middleware' => 'jwt.api.refresh:api',//jwt.api.auth:api
//        'namespace' => 'App\Http\Controllers\Api\V1'
//    ], function ($api) {
//        $api->get('auth/user', 'AuthController@user');
//        $api->post('auth/logout', 'AuthController@logout');
//    });
//    $api->group([
//        'middleware' => 'jwt.api.refresh:api',
//        'namespace' => 'App\Http\Controllers\Api\V1'
//    ], function ($api) {
//        $api->get('auth/refresh', 'AuthController@refresh');
//    });
});

include 'address.php';
include 'productClassify.php';
include 'product.php';
include 'cart.php';
include 'order.php';
include 'indexCommon.php';