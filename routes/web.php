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
    Route::get('detail/{id}',[
        'as' => 'main.tutor.getTutorDetail',
        'uses' => 'MainController@getTutorDetail'
    ]);
});

Route::get('/admin', function () {
    return view('admin.pages.index');
})->middleware('auth');
Route::group(['prefix'=>'admin'],  function() {
    Route::group(['prefix' => 'account'], function () {
        Route::get('list', [
            'as' => 'admin.account.getList',
            'uses' => 'AdminController@getAccountList'
        ])->middleware('auth');
        Route::get('lock/{id}', [
            'as' => 'admin.account.getLock',
            'uses' => 'AdminController@getLock'
        ])->middleware('auth');
        Route::post('list',[
            'as'=>'admin.account.postFind',
            'uses'=>'AdminController@postAccountFind'
        ])->middleware('auth');
    });
    Route::get('/profile/{type}/{id}', [
        'as' => "admin.pages.profile",
        'uses' => "AdminController@getProfile"
    ])->middleware('auth');


    Route::group(['prefix'=>'user'],function(){
        Route::get('list',[
            'as'=>'admin.user.getList',
            'uses'=>'AdminController@getUserList'
        ])->middleware('auth');
        Route::post('list',[
            'as'=>'admin.user.postFind',
            'uses'=>'AdminController@postUserFind'
        ])->middleware('auth');
        Route::get('add', [
            'as'=>'admin.user.getAdd',
            'uses'=>'AdminController@getAddUser'
        ]);
        Route::post('add', [
            'as'=>'admin.user.postAdd',
            'uses'=>'AdminController@postAddUser'
        ]);
    });


    /* route này để load lại trang admin */
    Route::get('/Admin',[   
        'as'=>'admin.pages.index',
        'uses'=>'AdminController@getHomePage'
    ])->middleware('auth');
    Route::get('/subjects',[
        'as'=> 'admin.subjects.getList',
        'uses'=>'AdminController@getSubjectsList'
    ])->middleware('auth');
    Route::post('/subjects', [
        'as'=> 'admin.subjects.postFind',
        'uses'=> "AdminController@postSubjectFind"
    ])->middleware('auth');

    Route::get('class',[
        'as'=>'admin.class.getList',
        'uses'=>'AdminController@getClassList'
    ])->middleware('auth');
    Route::get('tutors/{id}',[
        'as'=>'admin.tutors.getProfile',
        'uses'=>'AdminController@getProfile'
    ])->middleware('auth');
    Route::get('authen/register',[
        'as'=>'admin.register.getRegister',
        'uses'=>'Auth\RegisterController@getRegister'
    ])->middleware('auth');
    Route::post('authen/postregister',[
        'as'=>'admin.register.postCreateAcc',
        'uses'=>'Auth\RegisterController@postCreateAcc'
    ])->middleware('auth');
    Route::get('authen/stu-register',[
        'as'=>'admin.stu-register.getStuRegister',
        'uses'=>'Auth\RegisterController@getStuRegister'
    ])->middleware('auth');
    Route::post('authen/poststu-register',[
        'as'=>'admin.stu-register.postStuCreateAcc',
        'uses'=>'Auth\RegisterController@postStuCreateAcc'
    ])->middleware('auth');
    Route::post('update-password/{id}',[
        'as'=>'admin.update-password.postUpdatePass',
        'uses'=>'AdminController@postUpdatePass'
    ])->middleware('auth');


    


    Route::get('/tutor' , [
        'as' => "admin.tutor",
        'uses' => "AdminController@getTutorList"
    ])->middleware('auth');
    Route::post('/tutor', [
        'as' => "admim.post",
        'uses' => "AdminController@postFindTutor"

    ])->middleware('auth');

    Route::get('/form',[
        'as'=>'admin.form.getForm',
        'uses'=>'AdminController@getForm'
    ])->middleware('auth');
    Route::get('/tutorform-detail/{id}',[
        'as'=>'admin.tutorform-detail.getTutorFormDetail',
        'uses'=>'AdminController@getTutorFormDetail'
    ])->middleware('auth');
    Route::post('/tutorform-detail/{id}',[
        'as' => 'admin.tutorform-detail.postTutorFormDetail',
        'uses' => 'AdminController@postTutorFormDetail'
    ])->middleware('auth');
    Route::get('/stuform-detail/{id}',[
        'as'=>'admin.stuform-detail.getStuFormDetail',
        'uses'=>'AdminController@getStuFormDetail'
    ])->middleware('auth');
    Route::post('/stuform-detail/{id}',[
        'as'=>'admin.stuform-detail.postStuFormDetail',
        'uses'=>'AdminController@postStuFormDetail'
    ])->middleware('auth');
    Route::get('/ideaform-detail/{id}',[
        'as'=>'admin.ideaform-detail.getIdeaFormDetail',
        'uses'=>'AdminController@getIdeaFormDetail'

    ])->middleware('auth');


//    insert post
    Route::group(['prefix'=>'post'],function() {
        Route::get('list', [
            'as' => "admin.post.list",
            'uses' => 'AdminController@getListPost'
        ])->middleware('auth');
        Route::get('add/{id}', [
            'as' => "admin.post.getAdd",
            'uses' => 'AdminController@getAddPost'
        ])->middleware('auth');
        Route::post('add/{id}', [
            'as' => "admin.post.postAdd",
            'uses' => 'AdminController@postAddPost'
        ])->middleware('auth');
        Route::get('edit/{id}/{id_post}', [
            'as' => "admin.post.getEdit",
            'uses' => 'AdminController@getEditPost'
        ])->middleware('auth');
        Route::post('edit/{id}', [
            'as' => "admin.post.postEdit",
            'uses' => 'AdminController@postEditPost'
        ])->middleware('auth');
        Route::get('delete/{id}', [
            'as' => "admin.post.getDelete",
            'uses' => 'AdminController@getDeletePost'
        ])->middleware('auth');
    });
    Route::group(['prefix'=>'student', 'middleware'=>'auth'], function() {
        Route::get('list', [
            'as' => 'admin.students.getList',
            'uses' => 'AdminController@getStudentList'
        ])->middleware('auth');
    });
    Route::group(['prefix'=>'test'], function() {
        Route::get('list', [
            'as' => 'admin.tests.getList',
            'uses' => 'AdminController@getTestList'
        ])->middleware('auth');
    });
    Route::group(['prefix'=>'questions'], function() {
        Route::get('list', [
            'as' => 'admin.question.getList',
            'uses' => 'AdminController@getQuestionList'
        ])->middleware('auth');
    });
    Route::group(['prefix'=>'student'], function() {
        Route::get('list', [
            'as' => 'admin.students.getList',
            'uses' => 'AdminController@getStudentList'
        ])->middleware('auth');
    });
    Route::post('class/add', [
        'as' => 'admin.class.addStudent',
        'uses' => 'AdminController@postAddStudent'
    ])->middleware('auth');
});

Route::get('login', [
    'as' => 'getLogin',
    'uses' => 'MainController@getLogin'
]);
Route::post('login', [
    'as' => 'postLogin',
    'uses' => 'MainController@postLogin'
]);
Route::get('logout', [
    'as' => 'getLogout',
    'uses' => 'MainController@getLogout'
]);
Route::get('sign-up', [
    'as' => 'getSignUp',
    'uses' => 'MainController@getSignUp'
]);
Route::post('sign-up', [
    'as' => 'postSignUp',
    'uses' => 'MainController@postSignUp'
]);



