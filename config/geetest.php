<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Config Language
    |--------------------------------------------------------------------------
    |
    | Here you can config your yunpian api key from yunpian provided.
    |
    | Options: ['zh-cn', 'zh-tw', 'en', 'ja', 'ko']
    |
    */
    'lang' => 'zh-cn',

    /*
    |--------------------------------------------------------------------------
    | Config Geetest Id
    |--------------------------------------------------------------------------
    |
    | Here you can config your yunpian api key from yunpian provided.
    |
    */
    'id' => env('GEETEST_ID',"9af3aa9e204402036ff03ca65b64621a"),

    /*
    |--------------------------------------------------------------------------
    | Config Geetest Key
    |--------------------------------------------------------------------------
    |
    | Here you can config your yunpian api key from yunpian provided.
    |
    */
    'key' => env('GEETEST_KEY',"7b1bf04abf1a550c16becb0afd086c2d"),

    /*
    |--------------------------------------------------------------------------
    | Config Geetest URL
    |--------------------------------------------------------------------------
    |
    | Here you can config your geetest url for ajax validation.
    |
    */
    'url' => '/geetest',

    /*
    |--------------------------------------------------------------------------
    | Config Geetest Protocol
    |--------------------------------------------------------------------------
    |
    | Here you can config your geetest url for ajax validation.
    |
    | Options: http or https
    |
    */
    'protocol' => 'http',

    /*
    |--------------------------------------------------------------------------
    | Config Geetest Product
    |--------------------------------------------------------------------------
    |
    | Here you can config your geetest url for ajax validation.
    |
    | Options: float, popup, custom, bind
    |
    */
    'product' => 'float',

    /*
    |--------------------------------------------------------------------------
    | Config Client Fail Alert Text
    |--------------------------------------------------------------------------
    |
    | Here you can config the alert text when it failed in client.
    |
    */
    'client_fail_alert' => '请正确完成验证码操作',

    /*
    |--------------------------------------------------------------------------
    | Config Server Fail Alert
    |--------------------------------------------------------------------------
    |
    | Here you can config the alert text when it failed in server (two factor validation).
    |
    */
    'server_fail_alert' => '验证码校验失败',


];