<?php

return [
    /**
     * 公众菜单报修栏 Key
     */
    'event_key' => [
        '1' => 'night',
        '2' => 'day',
        '3' => 'volunteer'
    ],
    /**
     * 微信用户身份权限
     */
    'user_type' => [
        '0' => 'user',
        '1' => 'volunteer',
        '2' => 'admin',
        '3' => 'super'
    ],
    /**
     * 微信回调信息
     */
    'wechat_callback' => [
        'debug'    => true,
        'app_id'   => env('WECHAT_APPID'),
        'secret'   => env('WECHAT_SECRET'),
        'token'    => env('WECHAT_TOKEN'),
        'aes_key'  => env('WECHAT_AES_KEY'),
        'oauth'    => [
            'scopes'   => ['snsapi_base'],
            'callback' => '/wechat_callback',
        ],
    ]
];
