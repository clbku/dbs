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
Route::get('/news/{id}/{offset}', [
    'as' => 'main.getNews',
    'uses' => 'MainController@getNews'
]);
Route::group(['prefix'=>'detail-page'],  function() {
    Route::get('/about',[
        'as' => 'about',
        function () {
            return view('main.pages.about');
        }
    ]);
    Route::get('/news/{id}',[
        'as' => 'main.news.getNewsDetail',
        'uses' => 'MainController@getNewsDetail'
    ]);
});
Route::get('/contact', [
    "as" => 'main.getContact',
    "uses" => "MainController@getContact"
]);
Route::post('/contact', [
    "as" => 'main.postContact',
    "uses" => "MainController@postContact"
]);
Route::group(['prefix'=>'register'],  function() {
    Route::get('choose', [
        'as' => "main.register",
        function () {
            return view('main.pages.register');
        }
    ]);
    Route::get('tutor', [
        'as'=>'main.register.tutor',
        'uses' => "MainController@getTutorRegister"
    ]);
    Route::post('tutor', [
        'as'=>'main.register.tutor',
        'uses' => "MainController@postTutorRegister"
    ]);
    Route::get('student', [
        'as'=>'main.register.student',
        'uses' => "MainController@getStudentRegister"
    ]);
    Route::post('student', [
        'as'=>'main.register.student',
        'uses' => "MainController@postStudentRegister"
    ]);
});

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
            'as'=>'admin.user.postFindUser',
            'uses'=>'AdminController@postFindUser'
        ])->middleware('auth');
        Route::get('add', [
            'as'=>'admin.user.getAdd',
            'uses'=>'AdminController@getAddUser'
        ])->middleware('auth');
        Route::post('add', [
            'as'=>'admin.user.postAdd',
            'uses'=>'AdminController@postAddUser'
        ])->middleware('auth');
    });
    Route::group(['prefix'=>'subjects'],function(){
        Route::get('/list',[
            'as'=> 'admin.subjects.getList',
            'uses'=>'AdminController@getSubjectsList'
        ])->middleware('auth');
        Route::post('/list', [
            'as'=> 'admin.subjects.postFind',
            'uses'=> "AdminController@postSubjectFind"
        ])->middleware('auth');
        Route::post('/add', [
            'as'=> 'admin.subjects.postAddSubject',
            'uses'=> "AdminController@postAddSubject"
        ])->middleware('auth');
        Route::get('lock/{id}/{state}', [
            'as'=> 'admin.subjects.getSubjectLock',
            'uses'=> "AdminController@getSubjectLock"
        ])->middleware('auth');
        Route::get('lock/{id}/{state}', [
            'as'=> 'admin.subjects.getSubjectLock',
            'uses'=> "AdminController@getSubjectLock"
        ])->middleware('auth');
        Route::post('list',[
            'as'=>'admin.user.postFindSubject',
            'uses'=>'AdminController@postFindSubject'
        ])->middleware('auth');
    });


    /* route này để load lại trang admin */
    Route::get('/Admin',[   
        'as'=>'admin.pages.index',
        'uses'=>'AdminController@getHomePage'
    ])->middleware('auth');


    Route::group(['prefix'=>'class'],function(){
        Route::get('list',[
            'as'=>'admin.class.getList',
            'uses'=>'AdminController@getClassList'
        ])->middleware('auth');
        Route::get('edit/{id}', [
            'as' => 'admin.class.getEdit',
            'uses' =>'AdminController@getEditClass'
        ])->middleware('auth');
        Route::post('edit/{id}', [
            'as' => 'admin.class.postEdit',
            'uses' =>'AdminController@postEditClass'
        ])->middleware('auth');
        Route::get('edit/{class_id}/{student_id}', [
            'as' => 'admin.class.getDelete',
            'uses' =>'AdminController@getDeleteStudent'
        ])->middleware('auth');
        Route::get('add', [
            'as' => 'admin.class.addClass',
            'uses' => 'AdminController@getAddClass'
        ])->middleware('auth');
        Route::post('add', [
            'as' => 'admin.class.postAddClass',
            'uses' => 'AdminController@postAddClass'
        ])->middleware('auth');
    });

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
    Route::group(['prefix'=>'form'], function() {
        Route::get('/list',[
            'as'=>'admin.form.getForm',
            'uses'=>'AdminController@getForm'
        ])->middleware('auth');
        Route::get('/delete/{id}', [
            'as' => "admin.form.delete",
            'uses' => 'AdminController@getDeleteTutorForm'
        ])->middleware('auth');
    });


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
Route::post('comment/{postid}', [
    'as' => 'postComment',
    'uses' => 'MainController@postComment'
])->middleware('auth');
Route::get('deleteComment/{post_id}/{id}', [
    'as' => 'getDeleteComment',
    'uses' => 'MainController@getDeleteComment'
])->middleware('auth');
Route::get('search/autocomplete', 'SearchController@autocomplete');
Route::get('/forum',[
    'as'=>'getforum',
    'uses'=>'MainController@getforum'
]);
Route::get('/forum-post',[
    'as'=>'getforumpost',
    'uses'=>'MainController@getforumpost'
]);
Route::get('/user-detail',[
    'as'=>'getUserDetail',
    'uses'=>'MainController@getUserDetail'
]);

