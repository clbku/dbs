<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getHomePage() {
        $courses = DB::select('select * from specializes');
        $news = DB::select('select * from posts where type = 0');
        return view('main.pages.index', compact('courses', 'news'));
    }
}
