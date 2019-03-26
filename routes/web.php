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
    Route::get('/delete', 'PostController@delete');
});
