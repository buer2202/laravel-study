<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/wechat', 'WechatController@serve');

Route::get('/scanlogin', 'ScanLoginController@index');
Route::get('/scanlogin/login', 'ScanLoginController@login')->name('login');
Route::get('/scanlogin/confirm', 'ScanLoginController@confirm')->name('confirm');

Route::get('/test/{user?}', 'TestController@index')->name('aljkdlkjsadfdsljk');

Route::group(['prefix' => 'admin'], function () {
    Route::get('index', 'TestController@index')->name('db');
});

Route::get('api/users/{user}/{user1}', 'TestController@index');

Route::resource('restful', 'RestfulController');

Route::get('/img', 'VController@index');
Route::get('selector/{id?}', 'VController@selector');
Route::get('sk/{id?}', 'VController@sk');
Route::post('v', 'VController@v');
Route::get('c', 'VController@change');

Route::get('/t/{user}', function (App\User $user) {
    return $user->name;
});

Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
    //
});
Route::auth();

Route::get('/home', 'HomeController@index');

// 测试api登陆
Route::group(['middleware' => 'auth'], function () {
    Route::get('/short/{id?}', 'TestController@index');
});
