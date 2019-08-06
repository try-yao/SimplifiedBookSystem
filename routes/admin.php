<?php
/**
 * Created by PhpStorm.
 * User: Yoger
 * Date: 2019/8/6
 * Time: 23:10
 */
//管理后台
Route::group(['prefix' => 'admin'],function (){
    Route::get('/login',function (){
       return "this is login";
    });
});