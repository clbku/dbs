<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewsReq;
use App\Post;
use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getUserList(){
		$user = DB::select('select * from users');
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

    public function getListPost() {
        $post = DB::select('select * from posts');

        return view('admin.pages.posts', compact('post'));
    }
    public function getAddPost($id) {

        return view('admin.pages.add-post',  compact('id'));
    }
    public function postAddPost(AddNewsReq $request) {
        $post = new Post();
        $post->date = now();
        $post->author_id = 1;
        $post->title = $request->txtTitle;
        $post->description = $request->txtDescription;
        $post->content = $request->txtContent;
        $file = $request->txtFile;
        $post->images = $file->move('upload/images/post/news',$file->getClientOriginalName());
        $post->type = 0;
        $post->save();
        Session::flash('deleted_user','The user has been deleted');
        return redirect()->route('admin.post.list');
    }
    public function getDeletePost($id) {
        $post = DB::table('posts')->where('id', $id)->first();

        if (file_exists(public_path() . '/' . $post->images)) {
            unlink(public_path() . '/' . $post->images );
        };
        DB::table('posts')->where('id', $id)->delete();


        return redirect()->route('admin.post.list');
    }
}
