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

Route::get('/' , [
    "as"=>"homepage",
    "uses" => 'MainController@getHomePage'
]);
Route::get('/about', [
    "as" => 'about',
    function () {
        return view('main.pages.about');
    }
]);
Route::get('/contact', [
    "as" => 'main.getContact',
    "uses" => "MainController@getContact"
]);
Route::post('/contact', [
    "as" => 'main.postContact',
    "uses" => "MainController@postContact"
]);
Route::get('/register', [
    'as'=>'main.register',
    'uses' => "MainController@getRegister"
]);
Route::post('/register/{id}', [
    'as' => 'main.mainRegister',
    'uses' => "MainController@postRegister"
]);
Route::group(['prefix'=>'tutor'],  function() {
    Route::get('list/{id}',[
        'as' => 'main.tutor.getList',
        'uses' => 'MainController@getTutorList'
    ]);
});

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
    Route::post('update-password/{id}',[
        'as'=>'admin.update-password.postUpdatePass',
        'uses'=>'AdminController@postUpdatePass'
    ]);


    


    Route::get('/tutor' , [
        'as' => "admin.tutor",
        'uses' => "AdminController@getTutorList"
    ]);
    Route::post('/tutor', [
        'as' => "admim.post",
        'uses' => "AdminController@postFindTutor"

    ]);

    Route::get('/form',[
        'as'=>'admin.form.getForm',
        'uses'=>'AdminController@getForm'
    ]);
    Route::get('/tutorform-detail/{id}',[
        'as'=>'admin.tutorform-detail.getTutorFormDetail',
        'uses'=>'AdminController@getTutorFormDetail'
    ]);
    Route::post('/tutorform-detail/{id}',[
        'as' => 'admin.tutorform-detail.postTutorFormDetail',
        'uses' => 'AdminController@postTutorFormDetail'
    ]);
    Route::get('/stuform-detail/{id}',[
        'as'=>'admin.stuform-detail.getStuFormDetail',
        'uses'=>'AdminController@getStuFormDetail'
    ]);
    Route::post('/stuform-detail/{id}',[
        'as'=>'admin.stuform-detail.postStuFormDetail',
        'uses'=>'AdminController@postStuFormDetail'
    ]);
    Route::get('/ideaform-detail/{id}',[
        'as'=>'admin.ideaform-detail.getIdeaFormDetail',
        'uses'=>'AdminController@getIdeaFormDetail'

    ]);


//    insert post
    Route::group(['prefix'=>'post'],function() {
        Route::get('list', [
            'as' => "admin.post.list",
            'uses' => 'AdminController@getListPost'
        ]);
        Route::get('add/{id}', [
            'as' => "admin.post.getAdd",
            'uses' => 'AdminController@getAddPost'
        ]);
        Route::post('add/{id}', [
            'as' => "admin.post.postAdd",
            'uses' => 'AdminController@postAddPost'
        ]);
        Route::get('edit/{id}/{id_post}', [
            'as' => "admin.post.getEdit",
            'uses' => 'AdminController@getEditPost'
        ]);
        Route::post('edit/{id}', [
            'as' => "admin.post.postEdit",
            'uses' => 'AdminController@postEditPost'
        ]);
        Route::get('delete/{id}', [
            'as' => "admin.post.getDelete",
            'uses' => 'AdminController@getDeletePost'
        ]);
    });
    Route::group(['prefix'=>'student'], function() {
        Route::get('list', [
            'as' => 'admin.students.getList',
            'uses' => 'AdminController@getStudentList'
        ]);
    });
    Route::group(['prefix'=>'test'], function() {
        Route::get('list', [
            'as' => 'admin.tests.getList',
            'uses' => 'AdminController@getTestList'
        ]);
    });
    Route::group(['prefix'=>'questions'], function() {
        Route::get('list', [
            'as' => 'admin.question.getList',
            'uses' => 'AdminController@getQuestionList'
        ]);
    });
    Route::group(['prefix'=>'student'], function() {
        Route::get('list', [
            'as' => 'admin.students.getList',
            'uses' => 'AdminController@getStudentList'
        ]);
    });
});


