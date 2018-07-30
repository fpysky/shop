<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('alipay', function() {
//    dd(app('alipay'));
    return app('alipay')->web([
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject' => 'test subject - 测试',
    ]);
});

//Route::any('/payment/alipay/notify','Api\V1\PaymentController@alipayReturn')->name('payment.alipay.notify');//支付宝前端回调
//Route::any('payment/alipay/return','Api\V1\PaymentController@alipayReturn')->name('payment.alipay.return');