<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewsReq;
use App\Http\Requests\EditNewsReq;
use App\Post;
use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getUserList(){
        $user = DB::select('CALL getAllUser()');
        return view('admin.pages.users',compact('user'));
    }
    public function getProfile($id) {
        $user = DB::select('select * from users where id = ?', [$id]);
        return view('admin.pages.profile', compact('user'));
    }
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


    public function getHomePage(){
        return view('admin.pages.index');
    }

    public function getUserPage(){
        return view('admin.pages.users');
    }
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
    public function postUserFind(Request $request) {
        $user = DB::select('select * from users where name LIKE "%' . $request->data . '%"');
        return view('admin.pages.users',compact('user'));
    }
    public function postAccountFind(Request $request){
        $account =DB::select('select a.id, a.username, a.password, a.user_id, a.state
                                    from accounts as a, users as u 
                                    where a.user_id = u.id and u.name LIKE "%' . $request->data . '%"');
        return view('admin.pages.account',compact('account'));
    }


    public function getClassList(){
        $class = DB::select('select * from class_s');
    	return view('admin.pages.class',compact('class'));
    }

    public function getRegister(){
        return view('admin.pages.sign-up');
    }
    public function postRegister(RegisterRequest $request){
            echo $request->name;
            //echo $request->sex;
    }

    public function getTutorList() {
        $tutor = DB::select('select * from tutors');
        return view('admin.pages.tutor', compact('tutor'));
    }
    public function postFindTutor (Request $request) {
        $tutor = DB::select('select * from users as U, tutors as T where U.id = T.user_id and U.name like "%' . $request->txtFind . '%"  ');
//        $tutor = DB::select('select * from tutors  where id = ?', [$user_id[0]->id]);

        return view('admin.pages.tutor', compact('tutor'));
    }
<<<<<<< HEAD
    public function getForm(){
        $tutorform = DB::select('select * from tutor_registers');
        $stuform = DB::select('select * from study_registers');
        return view('admin.pages.form',compact('tutorform','stuform'));
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
    public function getIdeaFormDetail($id){
        $stuform = "";
        $tutorform = "";
        $ideaform = "";
        return view('admin.pages.form-detail',compact('tutorform','stuform','ideaform'));
=======

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
        $post->images = $file->move('upload/file/post',$file->getClientOriginalName());
        $post->save();
        Session::flash('deleted_user','The user has been deleted');
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
>>>>>>> 35bac2ff66822c8038c7e3119938783a92d23e75
    }
}
