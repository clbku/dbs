<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            $school = $request->txtSchool;
            $class = $request->txtClass;
            $shift = $request->txtTime;
            $avg1 = $request->txtAvg1;
            $avg2 = $request->txtAvg2;
            $subject_id = $request->txtSubject;
            $tutor_id = $request->txtTutor;
            if ($tutor_id)
                DB::insert('insert into study_registers(name, dob, address, hometown,  sex, phone, school, class_s, shift, avg1, avg2, subject_id, tutor_id)
                              values (?,?,?,?,?,?,?,?,?,?,?,?,?)', [$name,  $dob, $address, $hometown, $sex, $phone, $school, $class, $shift, $avg1, $avg2, $subject_id, $tutor_id]);
            else
                DB::insert('insert into study_registers(name, dob, address, hometown,  sex, phone, school, class_s, shift, avg1, avg2, subject_id)
                              values (?,?,?,?,?,?,?,?,?,?,?,?)', [$name,  $dob, $address, $hometown, $sex, $phone, $school, $class, $shift, $avg1, $avg2, $subject_id]);
            return redirect()->route('homepage');
        }
    }
    public function getTutorList($id) {
        $tutor = DB::select('CALL getTutorListBySpecializeId(?)', [$id]);
        return view('main.pages.tutor', compact('tutor'));
    }
    public function getTutorDetail($id) {
        return view('main.pages.tutor-detail');
    }
    public function getLogin() {
        return view('main.pages.sign-in');
    }
    public function postLogin(Request $request) {
        $credentials = array('username'=>$request->username, 'password'=>$request->password);

        if (Auth::attempt($credentials)) {
            return redirect()->route('homepage');
        }
        else {
            return redirect()->route('getLogin');
        }
    }
    public function getLogOut() {
        Auth::logout();
        return redirect()->route('homepage');
    }
    public function getSignUp() {
        return view('main.pages.sign-up');
    }
    public function postSignUp(Request $request) {
        $name = $request->name;
        $dob = $request->dob;
        $address = $request->address;
        $sex = $request->sex;
        $hometown = $request->hometown;
        $phone = $request->phone;
        $email = $request->email;
        $type = $request->type;
        $avatar = $request->file;
        DB::insert('insert into users(name, dob, address, hometown, sex, phone, email, avatar, type)
                          values(?,?,?,?,?,?,?,?,2)', [$name, $dob, $address, $hometown, $sex, $phone, $email, $avatar]);
        $username = $request->username;
        $password = $request->password;
        $state = 1;
        $user_id = DB::select('select MAX(id) as id from users')[0]->id;
        DB::insert('insert into accounts(username, password, state, user_id)
                  values(?,?,?,?)', [$username, Hash::make($password), $state, $user_id]);
        return redirect()->route('admin.user.getList');
    }
}
