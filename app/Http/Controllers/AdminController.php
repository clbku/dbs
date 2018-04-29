<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewsReq;
use App\Http\Requests\EditNewsReq;
use App\Post;
use App\Func;
use App\Tutor;
use App\User;
use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PasswordRequest;


class AdminController extends Controller
{
    public function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '_', $str);
        return $str;
    }
    // index page
    public function getIndex() {

        return view('admin.pages.index', '');
    }

    // user page ---------------------------------------------------------

    public function getUserList(){
        $user = DB::select('CALL getAllUser()');
        return view('admin.pages.users',compact('user'));
    }
    public function getUserPage(){
        return view('admin.pages.users');
    }

    //profile page --------------------------------------------------------------

    public function getProfile($id) {
        $user = DB::select('select * from users where id = ?', [$id]);
        return view('admin.pages.profile', compact('user'));
    }

    // subject page --------------------------------------------------------------
    public function getSubjectsList(){
        $subject = DB::select('select s.id, s.name as subjectName, t.name as typeName, s.created_at, s.state
                                      from subjects as s, subject_types as t 
                                      where s.subject_type = t.id');
        return view('admin.pages.subjects',compact('subject'));
    }
    public function postSubjectFind(Request $request) {
        $subject = DB::select('select * from subjects where name LIKE "%' . $request->data . '%"   ');
        return view('admin.pages.subjects',compact('subject'));
    }



    //class page ----------------------------------------------------------------



    //Account page -------------------------------------------------------------
    public function getAccountList() {
        $account = DB::select('select * from accounts ');
        return view('admin.pages.account', compact('account'));
    }
    public function getLock($id) {
        $account = Account::find($id);
        $account->state = !$account->state;
        $account->save();
        return redirect()->route('admin.account.getList');
    }
    public function postAccountFind(Request $request){
        $account =DB::select('select a.id, a.username, a.password, a.user_id, a.state
                                    from accounts as a, users as u 
                                    where a.user_id = u.id and u.name LIKE "%' . $request->data . '%"');
        return view('admin.pages.account',compact('account'));
    }



    // tutor page ------------------------------------------------------------
    public function getTutorList() {
        $tutor = DB::select('select * from tutors');
        return view('admin.pages.tutor', compact('tutor'));
    }
    public function postFindTutor (Request $request) {
        $tutor = DB::select('select * from users as U, tutors as T where U.id = T.user_id and U.name like "%' . $request->txtFind . '%"  ');
//        $tutor = DB::select('select * from tutors  where id = ?', [$user_id[0]->id]);

        return view('admin.pages.tutor', compact('tutor'));
    }


    // student page ------------------------------------------------------------
    public function getStudentList() {
        return view('admin.pages.students');
    }


    // test page ---------------------------------------------------------------
    public function getTestList() {
        return view('admin.pages.kiemtra');
    }

    // question bank --------------------------------------------------
    public  function getQuestionList() {
        return view('admin.pages.questions-bank');
    }

    // post page -------------------------------------------------------
    public function postUserFind(Request $request) {
        $user = DB::select('select * from users where name LIKE "%' . $request->data . '%"');
        return view('admin.pages.users',compact('user'));
    }
    public function getListPost() {
        $post = DB::select('select * from posts');

        return view('admin.pages.posts', compact('post'));
    }
    public function getAddPost($id) {

        return view('admin.pages.add-post',  compact('id'));
    }
    public function postAddPost(AddNewsReq $request, $id) {
        $post = new Post();
        $post->date = now();
        $post->author_id = 1;
        $post->title = $request->txtTitle;
        $post->description = $request->txtDescription;
        $post->content = $request->txtContent;
        $file = $request->txtFile;
        $post->images = $file->move('upload/images/post/news',$file->getClientOriginalName());
        $post->type = $id;
        $file = $request->txtAsss;
        if ($file) $post->file = $file->move('upload/file/post',$file->getClientOriginalName());
        $post->save();

        return redirect()->route('admin.post.list');
    }
    public function getDeletePost($id) {
        $post = DB::table('posts')->where('id', $id)->first();

        if (file_exists(public_path() . '/' . $post->images)) {
            unlink(public_path() . '/' . $post->images );
        };
        if (file_exists(public_path() . '/' . $post->file)) {
            unlink(public_path() . '/' . $post->file );
        };
        DB::table('posts')->where('id', $id)->delete();


        return redirect()->route('admin.post.list');
    }
    public function getEditPost($id, $id_post) {
        $post = DB::select('select * from posts where id = ? ',  [$id_post]);
        return view('admin.pages.edit-post', compact('id','post'));
    }
    public function postEditPost(EditNewsReq $request, $id) {
        $post = Post::find($id);
        $post->author_id = 1;
        $post->title = $request->txtTitle;
        $post->description = $request->txtDescription;
        $post->content = $request->txtContent;
        $file = $request->txtFile;
        if ($request->txtFile) {
            $post->images = $file->move('upload/images/post/news',$file->getClientOriginalName());
        }
        $post->save();
        Session::flash('deleted_user','The user has been deleted');
        return redirect()->route('admin.post.list');

    }



    // class page ------------------------------------
    public function getClassList(){
        $class = DB::select('select * from class_s');
        return view('admin.pages.class',compact('class'));
    }



    // requets page -------------------------------------------

    public function getForm(){
        $tutorform = DB::select('select * from tutor_registers');
        $stuform = DB::select('select * from study_registers');
        $idea = DB::select('select * from customer_reviews');
        return view('admin.pages.form',compact('tutorform','stuform', 'idea'));
    }
    public function getTutorFormDetail($id){
        $tutorform = DB::select('select * from tutor_registers where id = ?',[$id]);
        $stuform="";
        $ideaform="";
        return view('admin.pages.form-detail',compact('tutorform','stuform','ideaform'));
    }
    public function getStuFormDetail($id){
        $stuform = DB::select('select * from study_registers where id = ?',[$id]);
        $tutorform = "";
        $ideaform = "";
        return view('admin.pages.form-detail',compact('tutorform','stuform','ideaform'));
    }
    public function getIdeaFormDetail($id)
    {
        $stuform = "";
        $tutorform = "";
        $ideaform = DB::select('select * from customer_reviews where id = ?',[$id]);;

        return view('admin.pages.form-detail',compact('tutorform','stuform','ideaform'));

        return view('admin.pages.form-detail', compact('tutorform', 'stuform', 'ideaform'));

    }
    public function postTutorFormDetail(Request $request, $id) {
        DB::insert("INSERT INTO users(name, dob, address,  hometown, sex, phone, email, avatar, type)
                          VALUES (?, str_to_date('". $request->txtDOB ."', '%Y-%m-%d'), ?, ?, ?, ?, ?, 'index.png', '2')", [$request->txtName, $request->txtAddress, $request->txtHomeTown, $request->txtSex, $request->txtPhone, $request->txtEmail]);


        $username = AdminController::to_slug($request->txtName);
        $password = Hash::make($username);
        $user_id = DB::select('select MAX(id) as m from users');


        DB::insert("INSERT INTO accounts (username, password, state,  user_id)
                          VALUES (?, ?, '1', ?)", [$username, $password, $user_id[0]->m]);


        DB::insert("INSERT INTO tutors (s_id, achievement, user_id, point, count)
                          VALUES (?, ?, ?, ?, ?)", [$request->txtSid, $request->txtAchievements, $user_id[0]->m, 0, 0]);


        DB::delete("delete from tutor_registers where id = ?" , [$id]);


        return redirect()->route('admin.form.getForm');
    }
    public function postStuFormDetail(Request $request, $id) {
        DB::insert("INSERT INTO students (name, dob, address,  hometown, sex, phone, school, class_s, avatar)
                          VALUES (?, str_to_date('". $request->txtDOB ."', '%Y-%m-%d'), ?, ?, ?, ?, ?, ?,'index.png')", [$request->txtName, $request->txtAddress, $request->txtHomeTown, $request->txtSex, $request->txtPhone, $request->txtSchool, $request->txtClass]);


        $username = AdminController::to_slug($request->txtName);
        $password = Hash::make($username);
        $student_id = DB::select('select MAX(id) as m from students');


        DB::insert("INSERT INTO scores (student_id, subject_id, avg1, avg2, avg3)
                          VALUES (?, ?, ?, ?, '0')", [$student_id[0]->m, $request->txtSubject, $request->txtAvg1, $request->txtAvg2]);


        if ($request->txtAvg1 + $request->txtAvg2 < 5) $level = 0;
        else if ($request->txtAvg1 + $request->txtAvg2 > 7) $level = 2;
        else $level = 1;


        if ($request->txtTutor) {
            DB::insert("INSERT INTO class_s (address, level, student_num, shift, tutor_id, subject_id,  state)
                          VALUES (?, ?, '1', ?, ?, ?, '0')", [$request->txtAddress, $level, $request->txtShift, $request->txtTutor,  $request->txtSubject]);
            $class_id =  DB::select('select MAX(id) as m from class_s');
            DB::insert("INSERT INTO studies (student_id, class_id)
                          VALUES (?, ?)", [$student_id[0]->m, $class_id[0]->m]);
        }



        DB::delete("delete from study_registers where id = ?" , [$id]);
        return redirect()->route('admin.form.getForm');
    }


    public function getHomePage(){
        return view('admin.pages.index');
    }


    public function getRegister(){
        return view('admin.pages.sign-up');
    }
    public function postRegister(RegisterRequest $request){
            echo $request->name;
            //echo $request->sex;
    }













    public function postUpdatePass(PasswordRequest $request,$id){
        $account = Account::find($id);
       
        if($account->password==$request->oldpassword){
            $account->password=$request->password;
            $account->save();
            echo "thành công";    
        }
        else return redirect()->route('admin.pages.profile',[$account->user_id]);

    }
}
