<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\TutorRegister;
use App\StudyRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StuRegisterRequest;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getRegister()
    {
         return view('admin.pages.tutor-sign-up');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function postStuCreateAcc(StuRegisterRequest $request)
    {
        $stu =new StudyRegister;
        $stu->name=$request->name;
        $stu->dob=$request->dob;
        $stu->address=$request->address;
        $stu->hometown=$request->hometown;
        $stu->sex=$request->sex;
        $stu->phone=$request->phone;
        $stu->school=$request->school;
        $stu->achievements=$request->achievements;
        $stu->email=$request->email;
        $stu->specializes=$request->specializes;
        $stu->save();
        return view('admin.pages.regist-success');
    }


    protected function getStuRegister()
    {
         return view('admin.pages.student-sign-up');
    }

   
    protected function postCreateAcc(RegisterRequest $request)
    {
        $tutor =new TutorRegister;
        $tutor->name=$request->name;
        $tutor->dob=$request->dob;
        $tutor->address=$request->address;
        $tutor->hometown=$request->hometown;
        $tutor->sex=$request->sex;
        $tutor->phone=$request->phone;
        $tutor->school=$request->school;
        $tutor->achievements=$request->achievements;
        $tutor->email=$request->email;
        $tutor->specializes=$request->specializes;
        $tutor->save();
        return view('admin.pages.regist-success');
    }


}
