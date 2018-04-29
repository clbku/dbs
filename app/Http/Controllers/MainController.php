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
    public function getContact() {
        return view('main.pages.contact');
    }
    public function postContact(Request $request) {
        DB::insert('insert into customer_reviews(name, phone, email, message)
                          values(?, ?, ?, ?)', [$request->txtName, $request->txtPhone, $request->txtEmail, $request->txtMessage]);
        return redirect()->route('main.getContact');
    }
    public  function getRegister() {
        return view('main.pages.register');
    }
    public function postRegister(Request $request, $id) {
        if ($id == 'tutor') {
            $name = $request->txtName;
            $dob = $request->txtDOB;
            $address = $request->txtAddress;
            $hometown = $request->txtHometown;
            $sex = $request->rdoSex;
            $phone = $request->txtPhone;
            $email = $request->txtEmail;
            $school = $request->txtSchool;
            $specialize_id = $request->txtSpecialize;
            $achievement = $request->txtAchievement;
            DB::insert('insert into tutor_registers(name, dob, address, hometown,  sex, phone, email, school, specialize_id, achievements)
                              values (?,?,?,?,?,?,?,?,?,?)', [$name,  $dob, $address, $hometown, $sex, $phone, $email, $school, $specialize_id, $achievement]);
            return redirect()->route('homepage');
        }
        else if ($id == 'student') {
            $name = $request->txtName;
            $dob = $request->txtDOB;
            $address = $request->txtAddress;
            $hometown = $request->txtHometown;
            $sex = $request->rdoSex;
            $phone = $request->txtPhone;
            $email = $request->txtEmail;
            $school = $request->txtSchool;
            $specialize_id = $request->txtSpecialize;
            $achievement = $request->txtAchievement;
            DB::insert('insert into tutor_registers(name, dob, address, hometown,  sex, phone, email, school, specialize_id, achievements)
                              values (?,?,?,?,?,?,?,?,?,?)', [$name,  $dob, $address, $hometown, $sex, $phone, $email, $school, $specialize_id, $achievement]);
            return redirect()->route('homepage');
        }
    }
}
