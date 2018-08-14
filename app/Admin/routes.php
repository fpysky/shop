<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->get('users', 'UsersController@index');
    $router->post('uploadImage', 'CommonController@uploadImage')->name('admin.uploadImage');
    //商品列表
    $router->get('products', 'ProductsController@index');
    $router->get('products/create', 'ProductsController@create');
    $router->post('products', 'ProductsController@store');
    $router->get('products/{id}/edit', 'ProductsController@edit');
    $router->get('products/{id}', 'ProductsController@getProduct');
    $router->put('products/{id}', 'ProductsController@update');
    $router->delete('products/{id}','ProductsController@destroy');
    $router->get('products/getAllSellProduct', 'ProductsController@getAllSellProduct');
    $router->put('products/updateColor/{id}', 'ProductsController@updateColor');//保存商品颜色
    //商品sku类别
    $router->get('productSkuAttributes/{productId}', 'ProductSkuAttributesController@getData');
    $router->post('productSkuAttributes', 'ProductSkuAttributesController@store');
    $router->delete('productSkuAttributes/{id}', 'ProductSkuAttributesController@destroy');
    //商品分类
    $router->get('productClassify','ProductClassifyController@index');
    $router->get('productClassify/create','ProductClassifyController@create');
    $router->get('productClassify/getRootClassify','ProductClassifyController@getRootClassify');
    $router->get('productClassify/getSecondRootClassify','ProductClassifyController@getSecondRootClassify');
    $router->post('productClassify','ProductClassifyController@store');
    $router->delete('productClassify/{id}','ProductClassifyController@destroy');
    $router->get('productClassify/{id}/edit','ProductClassifyController@edit');
    $router->put('productClassify/{id}','ProductClassifyController@update');
    //订单
    $router->get('orders', 'OrdersController@index')->name('admin.orders.index');
    //首页banner
    $router->get('indexBanner', 'IndexBannerController@index');
    $router->get('indexBanner/create', 'IndexBannerController@create');
    $router->post('indexBanner', 'IndexBannerController@store');
    $router->get('indexBanner/{id}/edit', 'IndexBannerController@edit');
    $router->put('indexBanner/{id}', 'IndexBannerController@update');
    $router->delete('indexBanner/{id}','IndexBannerController@destroy');
});
