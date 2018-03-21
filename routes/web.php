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

Auth::routes();

Route::get('/EmailConfirm/Activate/{confirmation_token}', 'EmailConfirmController@Activate');



// 邮箱激活
Route::get('/mail', function(){

    return new \App\Mail\UserVerifyMail(\App\User::find(1));
});

