<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function getList(){
		$user = DB::select('select * from users');
		return view('admin.pages.users',compact('user'));
	}
    public function getProfile($id) {
        $user = DB::select('select * from users where id = ?', [$id]);
        return view('admin.pages.profile', compact('user'));
    }


   
}
