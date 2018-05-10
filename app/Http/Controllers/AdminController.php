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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Validator;


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
    public function getAddUser() {
        return view('admin.pages.add-user');
    }
    public function postAddUser(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'name'      => 'required',
                'dob'       => 'required',
                'address'   => 'required',
                'phone'     => 'required|numeric',
                'email'     => 'required|email',
                'file'      => 'required',
                'username'  => 'required|unique:users,username',
                'password'  => 'required|min:6',
                're-password'   => 'required|same:password'
            ],
            [
                'name.required'     => 'Bạn chưa nhập tên',
                'dob.required'      => 'Bạn chưa nhập ngày sinh',
                'address.required'  => 'Bạn chưa nhập địa chỉ',
                'phone.required'    => 'Bạn chưa nhập SĐT',
                'phone.numeric'     => 'SĐT không đúng',
                'email.required'    => 'Bạn chưa nhập email',
                'email.email'       => 'Không đúng định dạng email',
                'file.required'     => 'Bạn chưa chọn avatar',
                'username.required' => 'Bạn chưa nhập tên tài khoản',
                'username.unique'   => 'Tên tài khoản đã tồn tại',
                'password.required' => 'Bạn chưa nhập password',
                'password.min'      => 'Password phải lớn hơn 5 ký tự',
                're-password.required'=> 'Hai mật khẩu không khớp',
                're-password.same'=> 'Hai mật khẩu không khớp',
            ]
        );




        if ($validator->fails()) {
            return redirect()->route('getSignUp')
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->name;
        $dob = $request->dob;
        $address = $request->address;
        $sex = $request->sex;
        $hometown = $request->hometown;
        $phone = $request->phone;
        $email = $request->email;
        $type = $request->type;
        $file = $request->file;
        $avatar = $file->move('upload/images/user/avatar',$file->getClientOriginalName());
        $username = $request->username;
        $password = Hash::make($request->password);
        $state = 1;
        DB::insert('insert into users(name, dob, address, hometown, sex, phone, email, avatar, type, username, password, state)
                          values(?,?,?,?,?,?,?,?,?,?,?,?)', [$name, $dob, $address, $hometown, $sex, $phone, $email, $avatar, $type, $username, $password, $state]);
        return redirect()->route('admin.user.getList');
    }
    public function postFindUser(Request $request) {
        $user = DB::select('select * from users where '.$request->col.' LIKE "%' . $request->data . '%"');
        return view('admin.pages.users',compact('user'));
    }


    //profile page --------------------------------------------------------------

    public function getProfile($type, $id) {
        if ($type == 'user')
            $user = DB::select('select * from users where id = ?', [$id]);
        else if ($type == 'student')
            $user = DB::select('select * from students where id = ?', [$id]);
        return view('admin.pages.profile', compact('type','user'));
    }

    // subject page --------------------------------------------------------------
    public function getSubjectsList(){
        $subject = DB::select('select s.id, s.name as subjectName, t.name as typeName, s.created_at, s.state
                                      from subjects as s, subject_types as t 
                                      where s.subject_type = t.id');
        return view('admin.pages.subjects',compact('subject'));
    }
    public function getSubjectLock($id, $state) {
        DB::update('update subjects set state = ? where id = ?', [$state, $id]);
        return redirect()->route('admin.subjects.getList');
    }
    public function postSubjectFind(Request $request) {
        $subject = DB::select('select * from subjects where name LIKE "%' . $request->data . '%"   ');
        return view('admin.pages.subjects',compact('subject'));
    }
    public function postAddSubject(Request $request) {

        $validator = Validator::make($request->all(),
            [
                'subject_name'      => 'required',
            ],
            [
                'subject_name.required'     => 'Bạn chưa nhập tên môn học',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('admin.subjects.getList')
                ->withErrors($validator)
                ->withInput();
        }
        $name = $request->subject_name;
        $type = $request->subject_type;
        $state = 1;
        $created_at = date('Y-m-d H:i:s');
        DB::insert('insert into subjects(name, subject_type, state, created_at )
                          values(?,?,?,?)', [$name, $type, $state, $created_at]);
        return redirect()->route('admin.subjects.getList');
    }
    public function postFindSubject(Request $request) {
        $subject = DB::select('select s.id, s.name as subjectName, t.name as typeName, s.created_at, s.state
                                      from subjects as s, subject_types as t 
                                      where s.subject_type = t.id and s.  '.$request->col.' LIKE "%' . $request->data . '%"');
        return view('admin.pages.subjects',compact('subject'));
    }


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
        $student = DB::select('CALL getStudentList()');
        return view('admin.pages.students', compact('student'));
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

    public function getListPost() {
        $post = DB::select('select * from posts');

        return view('admin.pages.posts', compact('post'));
    }
    public function getAddPost($id) {

        return view('admin.pages.add-post',  compact('id'));
    }
    public function postAddPost(AddNewsReq $request, $id) {

        $author_id = Auth::user()->id;
        $title = $request->txtTitle;
        $description = $request->txtDescription;
        $content = $request->txtContent;
        $file = $request->txtFile;
        $images = $file->move('upload/images/post/news',$file->getClientOriginalName());
        $type = $id;
        $file = $request->txtAsss;
        if ($file) $file = $file->move('upload/file/post',$file->getClientOriginalName());
        $created_at = date('Y-m-d H:i:s');
        DB::insert('insert into posts(author_id, title, description, content, images, type, files, created_at) 
        values(?,?,?,?,?,?,?,?)', [$author_id, $title, $description, $content, $images, $type, $file, $created_at]);

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
        $class = DB::select('select * from class_s, studies');
        return view('admin.pages.class',compact('class'));
    }
    public function postAddStudent(Request $request) {
        $class = $request->classID;
        $student = $request->studentID;
        DB::insert('insert into studies(student_id, class_id) values(?,?)', [$student, $class]);
        return redirect()->route('admin.class.getList');
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
        $name = $request->txtName;
        $dob = $request->txtDOB;
        $address = $request->txtAddress;
        $hometown = $request->txtHomeTown;
        $sex = $request->txtSex;
        $phone = $request->txtPhone;
        $email = $request->txtEmail;
        $avatar = 'index.png';
        $type = 0;
        $username = AdminController::to_slug($request->txtName);
        $password = Hash::make($username);
        $state = 1;
        DB::insert("INSERT INTO users(name, dob, address,  hometown, sex, phone, email, avatar, type, username, password, state)
                          VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$name, $dob, $address, $hometown, $sex, $phone, $email, $avatar, $type, $username, $password, $state]);


        $s_id = $request->txtSid;
        $achievement = $request->txtAchievements;
        $user_id = DB::select('select MAX(id) as m from users');
        DB::insert("INSERT INTO tutors (s_id, achievement,  user_id, point, count)
                          VALUES (?, ?, ?, ?, ?)", [$s_id, $achievement, $user_id[0]->m, 0, 0]);


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
            $date = date('Y-m-d H:i:s');
            DB::insert("INSERT INTO studies (student_id, class_id, begin_at)
                          VALUES (?, ?, ?)", [$student_id[0]->m, $class_id[0]->m, $date]);
        }



        DB::delete("delete from study_registers where id = ?" , [$id]);
        return redirect()->route('admin.form.getForm');
    }
    public function getDeleteTutorForm($id) {
        DB::delete('delete from tutor_registers where id = ?', [$id]);
        return redirect()->route('admin.form.getForm')->with('success', 'Xóa thành công');
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


    // Login page ---------------------------------------------------

    public function getLogin() {
        return view('admin.pages.sign-in');
    }
    public function postLogin(Request $request) {
        $credentials = array('username'=>$request->username, 'password'=>$request->password);

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.pages.index');
        }
        else {
            return redirect()->route('getAdminLogin');
        }
    }




    public function postUpdatePass(PasswordRequest $request,$id){
//        UPDATE sinhvienk60 SET ten="Huong" WHERE mssv=3;
//        $account = Account::find($id);
//
//        if($account->password==$request->oldpassword){
//            $account->password=$request->password;
//            $account->save();
//            echo "thành công";
//        }
//        else return redirect()->route('admin.pages.profile',[$account->user_id]);
//        if ($request->)
        if (Hash::check($request->oldpassword, Auth::user()->password)) {
            DB::update('update accounts set username = ?, password = ? WHERE id = ?', [$request->name, Hash::make($request->password), $id]);

        }
        return redirect()->route('admin.pages.profile', Auth::user()->user_id);

    }
}
