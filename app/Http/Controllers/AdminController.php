<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
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
    	$subject = DB::select('select * from subjects');
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
        $account =DB::select('select * from accounts where username LIKE "%' . $request->data . '%"');
        return view('admin.pages.account',compact('account'));
    }


    public function getClassList(){
        $class = DB::select('select * from classes');
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
    }
}
