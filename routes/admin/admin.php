<?php
/**
 * 后台项目api开始
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Admin\V1',
        'prefix' => 'admin',
        ],function($api){
        $api->get('user','AuthController@user');
        $api->post('uploadImage', 'CommonController@uploadImage');
        $api->post('geetest_api_v1', 'AuthController@geetest_api_v1');//极验验证v1
        $api->post('valiGeet', 'AuthController@valiGeet');
    });
    $api->group([
        'middleware' => 'auth:admin',
        'namespace' => 'App\Http\Controllers\Admin\V1',
        'prefix' => 'admin/permission',
    ],function($api){
        //管理员
        $api->get('adminers','AdminerController@adminers');
        $api->post('adminers','AdminerController@store');
        $api->delete('adminers','AdminerController@destroy');

        //角色
        $api->get('roles','RoleController@roles');
        $api->post('roles','RoleController@store');
        $api->delete('roles','RoleController@destroy');

        //权限
        $api->get('permissions','PermissionController@permissions');
        $api->post('permissions','PermissionController@store');
        $api->put('permissions','PermissionController@update');
        $api->delete('permissions','PermissionController@destroy');

        $api->get('getAllRole','PermissionController@getAllRole');//得到所有的角色
        $api->get('getAdminRoles','PermissionController@getAdminRoles');//获取管理员角色
        $api->get('getAllPermission','PermissionController@getAllPermission');//得到所有权限
        $api->get('getRolePermission','PermissionController@getRolePermission');//获取角色权限
        $api->get('getPidOptions','PermissionController@getPidOptions');//获取权限列表（下拉数据）
    });
    $api->group([
        'middleware' => 'auth:admin',
        'namespace' => 'App\Http\Controllers\Admin\V1',
        'prefix' => 'admin',
    ],function($api){
        //首页广告
        $api->get('indexBanners','IndexBannersController@indexBanners');
        $api->post('indexBanners','IndexBannersController@store');
        $api->delete('indexBanners','IndexBannersController@destroy');
        $api->get('indexBanners/{id}','IndexBannersController@getIndexBanner');

        //商品
        $api->get('products','ProductsController@products');
        $api->post('products','ProductsController@store');
        $api->put('products','ProductsController@update');
        $api->delete('products','ProductsController@destroy');
        $api->get('products/{id}', 'ProductsController@getProduct');
        $api->put('products/updateColor', 'ProductsController@updateColor');//保存商品颜色
        $api->get('getSellProducts','ProductsController@getSellProducts');

        //商品分类
        $api->get('productClassifies','ProductClassifyController@productClassifies');
        $api->delete('productClassifies','ProductClassifyController@destroy');
        $api->put('productClassifies','ProductClassifyController@update');
        $api->post('productClassifies','ProductClassifyController@store');
        $api->get('productClassify/getClassify','ProductClassifyController@getClassify');
        $api->get('productClassify/getSecondRootClassify','ProductClassifyController@getSecondRootClassify');
        $api->get('productClassify/getRootClassify','ProductClassifyController@getRootClassify');

        //商品sku类别
        $api->get('productSkuAttributes/{productId}', 'ProductSkuAttributesController@getData');
        $api->post('productSkuAttributes', 'ProductSkuAttributesController@store');
        $api->delete('productSkuAttributes/{id}', 'ProductSkuAttributesController@destroy');
    });
});