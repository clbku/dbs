<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\DB;
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
    public function getClassPage(){
    	return view('admin.pages.class');
    }
}
