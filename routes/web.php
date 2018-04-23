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
            'uses' => 'AdminController@getAccountList'
        ]);
        Route::get('lock/{id}', [
            'as' => 'admin.account.getLock',
            'uses' => 'AdminController@getLock'
        ]);
        Route::post('list',[
            'as'=>'admin.account.postFind',
            'uses'=>'AdminController@postAccountFind'
        ]);
    });
    Route::get('/profile/{id}', [
        'as' => "admin.pages.profile",
        'uses' => "AdminController@getProfile"
    ]); 


    Route::group(['prefix'=>'user'],function(){
        Route::get('list',[
            'as'=>'admin.user.getList',
            'uses'=>'AdminController@getUserList'
        ]);
        Route::post('list',[
            'as'=>'admin.user.postFind',
            'uses'=>'AdminController@postUserFind'
        ]);
    });


    /* route này để load lại trang admin */
    Route::get('/Admin',[   
        'as'=>'admin.pages.index',
        'uses'=>'AdminController@getHomePage'
    ]);
    Route::get('/subjects',[
        'as'=> 'admin.subjects.getList',
        'uses'=>'AdminController@getSubjectsList'
    ]);
    Route::post('/subjects', [
        'as'=> 'admin.subjects.postFind',
        'uses'=> "AdminController@postSubjectFind"
    ]);
    Route::get('class',[
        'as'=>'admin.class.getList',
        'uses'=>'AdminController@getClassList'
    ]);
    Route::get('tutors/{id}',[
        'as'=>'admin.tutors.getProfile',
        'uses'=>'AdminController@getProfile'
    ]);
    Route::get('authen/register',[
        'as'=>'admin.register.getRegister',
        'uses'=>'Auth\RegisterController@getRegister'
    ]);
    Route::post('authen/postregister',[
        'as'=>'admin.register.postCreateAcc',
        'uses'=>'Auth\RegisterController@postCreateAcc'
    ]);
    Route::get('authen/stu-register',[
        'as'=>'admin.stu-register.getStuRegister',
        'uses'=>'Auth\RegisterController@getStuRegister'
    ]);
    Route::post('authen/poststu-register',[
        'as'=>'admin.stu-register.postStuCreateAcc',
        'uses'=>'Auth\RegisterController@postStuCreateAcc'
    ]);
});


