<?php

/*
|----------- ---------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
 * 网站后台
 */

Route::get('/admin/login','AdminController@login');
Route::post('/admin/login','AdminController@dologin');
Route::group(['middleware'=>'login'],function() {
Route::controller('/admin','AdminController');	
});

/**
 * 网站首页
 */
Route::controller('/','IndexController');//把/放到最后,不然除了/全部是404,因为/都可以匹配,其他的也就不能匹配到了
