<?php
/**
 * 订单模块（需登陆）
 */
$api->version('v1', function ($api) {
    $api->group([
        'middleware' => 'jwt.api.auth',
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->post('orders','OrdersController@store');//创建订单
        $api->get('orders','OrdersController@orders');//创建订单
        $api->get('orders/{id}','OrdersController@show');//订单详情
        $api->get('payment/{order}/alipay','PaymentController@payByAlipay')->name('payment.alipay');//订单支付
        $api->get('payment/alipay/return','PaymentController@alipayReturn')->name('payment.alipay.return');//支付宝后端回调

    });
});

$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function ($api) {
        $api->post('payment/alipay/notify','PaymentController@alipayNotify')->name('payment.alipay.notify');//支付宝前端回调
    });
});

