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
Route::get('refresh-csrf', function(){
    return csrf_token();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'CekLevel:1' ],'prefix'=>'admin','namespace'=>'Admin'], function(){
    Route::get('home', 'HomeController@admin')->name('home.admin');
    Route::get('user/data','UserController@listData')->name('user.data');
    Route::resource('user', 'UserController');

});

Route::group(['middleware' => ['web', 'CekLevel:2' ],'prefix'=>'member','namespace'=>'Member'], function(){
    Route::get('home', 'HomeController@member')->name('home.member');

});
