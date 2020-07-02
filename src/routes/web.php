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
    // ユーザー登録
    Route::get('/register', 'RegisterController@input');
    Route::post('/register/confirm', 'RegisterController@confirm');
    Route::post('/register', 'RegisterController@store');

    Route::prefix('{id}')->group(function () {
        // ユーザー詳細
        Route::get('/', 'UserController@detail')->where('id', '[0-9]+');
        // 受診記録登録
        Route::get('/record', 'RecordController@input')->where('id', '[0-9]+');
        Route::post('/record/confirm', 'RecordController@confirm')->where('id', '[0-9]+');
        Route::post('/record', 'RecordController@store')->where('id', '[0-9]+');
    });
});
