<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/6
 * Time: 23:10
 */
//管理后台
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', '\App\Admin\Controllers\LoginController@index');
    Route::post('/login', '\App\Admin\Controllers\LoginController@login');
    Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/home', '\App\Admin\Controllers\HomeController@index');
    });
});