<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
     //function này để load lại trang admin
    public function getHomePage(){
    	return view('admin.pages.index');
    }

    public function getUserPage(){
    	return view('admin.pages.users');
    }
    public function getSubjectsPage(){
    	return view('admin.pages.subjects');
    }
    public function getClassPage(){
    	return view('admin.page.class');
    }
    //public function getAccountPage()
}
