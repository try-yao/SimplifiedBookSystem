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
Route::get('/user/{user}/setting', 'UserController@setting');
//个人设置保存
Route::post('/user/{user}/setting', 'UserController@settingStore');

//个人中心
Route::get('/user/{user}','UserController@show');
Route::post('/user/{user}/fan','UserController@fan');
Route::post('/user/{user}/unfan','UserController@unfan');

//专题详情页
Route::get('/topic/{topic}','TopicController@show');
//专题投稿
Route::post('/topic/{topic}/submit','TopicController@submit');

Route::group(['prefix' => 'posts'], function () {
    //文章列表页
    Route::get('/', 'PostController@index');
//创建文章
    Route::get('/create', 'PostController@create');
    Route::post('/', 'PostController@store');

    //文章搜索
    Route::get('/search', 'PostController@search');

    //文章详情页
    Route::get('/{post}', 'PostController@show');
//编辑文章
    Route::get('/{post}/edit', 'PostController@edit');
    Route::put('/{post}', 'PostController@update');
//删除文章
    Route::get('/{post}/delete', 'PostController@delete');


//    图片上传
    Route::post('/image/upload', 'PostController@imageUpload');

    //提交评论
    Route::post('/{post}/comment','PostController@comment');
    //点赞
    Route::get('/{post}/zan','PostController@zan');
    //取消赞
    Route::get('/{post}/unzan','PostController@unzan');


});

include_once('admin.php');
