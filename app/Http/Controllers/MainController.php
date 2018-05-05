<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),
            [
                'username' => 'required',
                'password' => 'required|min:6'
            ],
            [
                'username.required' => 'Bạn chưa nhập username',
                'password.required' => 'Bạn chưa nhập password',
                'password.min'      => 'Password phải nhiều hơn 5 ký tự'
            ]);
        if ($validator->failed()) {
            return redirect()->route('getLogin')
                ->withErrors($validator)
                ->withInput();
        }
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
        $validator = Validator::make($request->all(),
            [
                'name'      => 'required',
                'dob'       => 'required',
                'address'   => 'required',
                'phone'     => 'required',
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
        $avatar = $request->file;
        $username = $request->username;
        $password = Hash::make($request->password);
        $state = 1;
        $type = 2;
        $date = date('Y-m-d H:i:s');
        var_dump($date);

        DB::insert('insert into users(name, dob, address, hometown, sex, phone, email, avatar, type, username, password, state, created_at)
                          values(?,?,?,?,?,?,?,?,?,?,?,?,?)', [$name, $dob, $address, $hometown, $sex, $phone, $email, $avatar, $type, $username, $password, $state, $date]);
        return redirect()->route('getLogin')->with('success', 'Tạo tài khoản thành công');
    }

   
}
