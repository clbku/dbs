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

Route::get('/admin', function () {
    return view('admin.pages.index');
});
Route::group(['prefix'=>'admin'],  function() {
    Route::group(['prefix' => 'account'], function () {
        Route::get('list', [
            'as' => 'admin.account.getList',
            'uses' => 'AccountController@getList'
        ]);
        Route::get('add', [
            'as' => 'admin.account.getAdd',
            'uses' => 'AccountController@getAdd'
        ]);
        Route::post('add', [
            'as' => 'admin.account.postAdd',
            'uses' => 'AccountController@postAdd'
        ]);
        Route::get('delete/{id}', [
            'as' => 'admin.account.getDelete',
            'uses' => 'AccountController@getDelete'
        ]);
        Route::get('edit/{id}', [
            'as' => 'admin.account.getEdit',
            'uses' => 'AccountController@getEdit'
        ]);
        Route::post('edit/{id}', [
            'as' => 'admin.account.postEdit',
            'uses' => 'AccountController@postEdit'
        ]);
        Route::get('lock/{id}', [
            'as' => 'admin.account.getLock',
            'uses' => 'AccountController@getLock'
        ]);
    });
    Route::get('/profile/{id}', [
        'as' => "admin.profile",
        'uses' => "UserController@getProfile"
    ]);
});


