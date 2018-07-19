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
    //商品列表
    $router->get('products', 'ProductsController@index');
    $router->get('products/create', 'ProductsController@create');
    $router->post('products', 'ProductsController@store');
    $router->get('products/{id}/edit', 'ProductsController@edit');
    $router->put('products/{id}', 'ProductsController@update');
    //商品分类
    $router->get('productClassify','ProductClassifyController@index');
    $router->get('productClassify/create','ProductClassifyController@create');
    $router->get('productClassify/getRootClassify','ProductClassifyController@getRootClassify');
    $router->post('productClassify','ProductClassifyController@store');
    $router->delete('productClassify/{id}','ProductClassifyController@destroy');
    $router->get('productClassify/{id}/edit','ProductClassifyController@edit');
    $router->put('productClassify/{id}','ProductClassifyController@update');
});
