@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                @if($tutorform == "")
                     <div>
                         <row class="hidden"></row>
                     </div>
                @else

                @foreach($tutorform as $a)
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Thông tin đăng ký gia sư</h3>

                    </div>
                    <p>Mã biểu mẫu: {{$a->id}}</p>
                    <p>Thời gian gửi: {{$a->created_at}}</p>
                    <form action="#" style="width: 100%;" method="post" action="{{route('admin.tutorform-detail.postTutorFormDetail', $a->id)}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group" >
                            <label>Họ và tên</label>
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="{{$a->name}}" readonly>
                        </div>
                        <div class="form-group" >
                            <label>Ngày sinh</label>
                            <input class="form-control1" type="date" name="txtDOB" placeholder="Your name here" value="{{$a->dob}}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control1" type="text" name="txtAddress" placeholder="Your name here" value="{{$a->address}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label> <br>
                            <input class="form-control1" type="text" name="rdoGender" placeholder="Your name here" value="{{$a->sex}}" readonly>
                            <input type="hidden" name="txtSex" placeholder="Your name here" value="@if($a->sex == 'Nam') {{1}} @else {{0}} @endif" readonly>
                        </div>
                        <div class="form-group">
                            <label>Quê quán</label>
                            <input class="form-control1" type="text" name="txtHomeTown" placeholder="Your name here" value="{{$a->hometown}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control1" type="text" name="txtPhone" placeholder="Your name here" value="{{$a->phone}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$a->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Trường</label>
                            <input class="form-control1" type="text" name="txtSchool" placeholder="Your name here" value="{{$a->school}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Thành tích</label>
                            <input class="form-control1" type="text" name="txtAchievements" placeholder="Your name here" value="{{$a->achievements}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Chuyên môn</label>
                            <input class="form-control" type="text" value="{{(DB::select('CALL getSpecializeBySID(?)', [$a->specialize_id])[0]->specialize)}}" readonly>
                            <input type="hidden" name="txtSid" placeholder="Your name here" value="{{$a->specialize_id}}">

                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="{{route('admin.form.delete', $a->id)}}" class="btn btn-danger">Xóa</a>
                            <a href="{{route('admin.form.getForm')}}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>
                @endforeach
                @endif

                @if($stuform == "")
                    <div>
                        <row class="hidden"></row>
                    </div>
                @else 
                    @foreach($stuform as $b)
                    <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Thông tin đăng ký học tập</h3>

                    </div>

                    <p>Mã biểu mẫu: {{$b->id}}</p>
                    <p>Thời gian gửi: {{$b->created_at}}</p>
                    <form action="#" style="width: 100%;" action="{{route('admin.stuform-detail.postStuFormDetail', $b->id)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="{{$b->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input class="form-control1" type="text" name="txtDOB" placeholder="Your name here" value="{{$b->dob}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control1" type="text" name="txtAddress" placeholder="Your name here" value="{{$b->address}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label> <br>
                            <input class="form-control1" type="text" name="txtSex" placeholder="Your name here" value="{{$b->sex}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Quê quán</label>
                            <input class="form-control1" type="text" name="txtHomeTown" placeholder="Your name here" value="{{$b->hometown}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control1" type="text" name="txtPhone" placeholder="Your name here" value="{{$b->phone}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Trường</label>
                            <input class="form-control1" type="text" name="txtSchool" placeholder="Your name here" value="{{$b->school}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lớp</label>
                            <input class="form-control1" type="text" name="txtClass" placeholder="Your name here" value="{{$b->class_s}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Thời gian học</label>
                            <input class="form-control1" type="text" name="txtShift" placeholder="Your name here" value="{{$b->shift}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Môn học</label>
                            <?php 
                                $temp1 = DB::select('select * from subjects where id = ?',[$b->subject_id]);
                            ?>
                            <input class="form-control1" type="text" placeholder="Your name here" value="{{$temp1[0]->name}}" readonly>
                            <input type="hidden" name="txtSubject" value="{{$b->subject_id}}">
                        </div>
                        <div class="form-group">
                            <label>Điểm trung bình môn hai học kỳ trước</label>
                            <input class="form-control1" type="number" name="txtAvg1" placeholder="Your name here" value="{{$b->avg1}}" readonly>
                            <input class="form-control1" type="number" name="txtAvg2" placeholder="Your name here" value="{{$b->avg2}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Đăng ký gia sư</label>
                            <?php
                                $temp2 = DB::select('select * from tutors where id = ?',[$b->tutor_id]);
                                if ($temp2)
                                    $user = DB::select('select * from users where id = ?',[$temp2[0]->user_id]);
                            ?>
                            @if (isset($user))
                                <input class="form-control1" type="text" name="txtEmail" placeholder="Your name here" value="{{$user[0]->name}}" readonly>
                                <input type="hidden" name="txtTutor" value="{{$b->tutor_id}}">
                            @endif
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="forms.html" class="btn btn-danger">Xóa</a>
                            <a href="{{route('admin.form.getForm')}}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>
                @endforeach
                @endif
               
                @if($ideaform == "")
                <div>
                    <row class="hidden"></row>
                </div>
                @else
                @foreach($ideaform as $c)
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Ý kiến khách hàng</h3>
                    </div>

                    <p>Mã biểu mẫu: 1</p>
                    <p>Thời gian gửi: 11:23:45 11-2-2003</p>
                    <form action="#" style="width: 100%;">

                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="{{$c->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control1" type="text" name="txtPhone" placeholder="Your name here" value="{{$c->phone}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control1" type="text" name="txtEmail" placeholder="Your name here" value="{{$c->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Ý kiến</label>
                            <input class="form-control1" type="text" name="txtEmail" placeholder="Your name here" value="{{$c->message}}" readonly>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="forms.html" class="btn btn-danger">Xóa</a>
                            <a href="{{route('admin.form.getForm')}}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>
                @endforeach
                @endif
            </div>

        </div>
@endsection