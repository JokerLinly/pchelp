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
    return view('welcome');
});
Route::get('/test', 'TestController@index');

// 接入微信
Route::any('/wechat', 'WeChatController@serve');
Route::get('/wechat_callback', 'WeChatController@getWechatUserSession');
Route::get('/admin_wechat_callback', 'WeChatController@getAdminUserSession');

Route::group(['middleware' => 'wechat_user'], function () {
    // 报修链接
    Route::get('/pchelp/{type_name}', 'Wap\User\TicketController@index');

    // 我的订单
    Route::get('/myticket', 'Wap\User\TicketController@home');
});

Route::group(['middleware' => 'wechat_admin'], function () {
    // 报修链接
    Route::get('/super', 'Wap\Super\HomeController@index');

});


