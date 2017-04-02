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
Route::any('/wechat', 'WechatController@serve');

// 报修链接
Route::get('/pchelp/{type_name}', 'Wap\User\TicketController@index');
