<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
    // ユーザー一覧
    Route::get('/', 'UserController@index');
    // ユーザー詳細
    Route::get('/{id}', 'UserController@detail')->where('id', '[0-9]+');;

    // ユーザー登録
    Route::get('/register', 'RegisterController@input');
    Route::post('/register/confirm', 'RegisterController@confirm');
    Route::post('/register', 'RegisterController@store');
});

// Route::get('/users/{id}/records', 'Record\RegisterController@index');
// Route::post('/users/{id}/records', 'Record\RegisterController@add');

// Route::get('/records', 'Record\RecordController@index');
