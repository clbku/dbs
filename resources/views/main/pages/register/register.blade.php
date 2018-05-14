@extends('main.master')
@section('content')
    <div class="full">
        <div class="button-div">
            <a class="btn btn-lg btn-success" id="btn-tutor" href="{{route('main.register.tutor')}}">Đăng ký Gia sư</a>
            <a class="btn btn-lg btn-success" id="btn-student" href="{{route('main.register.student')}}">Đăng Ký học tập</a>
        </div>
    </div>

@endsection