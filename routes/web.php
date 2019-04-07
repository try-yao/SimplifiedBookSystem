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

//用户模块
//注册页面
Route::get('/register', 'RegisterController@index');
//注册行为
Route::post('/register', 'RegisterController@register');
//登录页面
Route::get('/login', 'LoginController@index');
//登录行为
Route::post('/login', 'LoginController@login');
//登出行为
Route::get('/logout', 'LoginController@logout');
//个人设置页面
Route::get('/user/me/setting', 'UserController@setting');
//个人设置保存
Route::post('/user/me/setting', 'UserController@settingStore');

Route::group(['prefix' => 'posts'], function () {
    //文章列表页
    Route::get('/', 'PostController@index');
//创建文章
    Route::get('/create', 'PostController@create');
    Route::post('/', 'PostController@store');
    //文章详情页
    Route::get('/{post}', 'PostController@show');
//编辑文章
    Route::get('/{post}/edit', 'PostController@edit');
    Route::put('/{post}', 'PostController@update');
//删除文章
    Route::get('/{post}/delete', 'PostController@delete');


//    图片上传
    Route::post('/image/upload', 'PostController@imageUpload');
});
