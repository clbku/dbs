@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                @if($tutorform == "")
                     <div>
                        <row class="hidden">
                    </div>
                @else

                @foreach($tutorform as $a)
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Thông tin đăng ký gia sư</h3>

                    </div>
                    <p>Mã biểu mẫu: 1</p>
                    <p>Thời gian gửi: 11:23:45 11-2-2003</p>
                    <form action="#" style="width: 100%;">

                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="{{$a->name}}">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input class="form-control1" type="text" name="txtDOB" placeholder="Your name here" value="{{$a->dob}}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control1" type="text" name="txtAddress" placeholder="Your name here" value="{{$a->address}}">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label> <br>
                             <input class="form-control1" type="text" name="rdoGender" placeholder="Your name here" value="{{$a->sex}}">
                            
                        </div>
                        <div class="form-group">
                            <label>Quê quán</label>
                            <input class="form-control1" type="text" name="txtHomeTown" placeholder="Your name here" value="{{$a->hometown}}">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control1" type="text" name="txtPhone" placeholder="Your name here" value="{{$a->phone}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$a->email}}">
                        </div>
                        <div class="form-group">
                            <label>Trường</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$a->school}}">
                        </div>
                        <div class="form-group">
                            <label>Thành tích</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$a->achievements}}">
                        </div>
                        <div class="form-group">
                            <label>Chuyên môn</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$a->specializes}}">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="{{route('admin.form.getForm')}}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>
                @endforeach
                @endif

                @if($stuform == "")
                    <div>
                        <row class="hidden">
                    </div>
                @else 
                    @foreach($stuform as $b)
                    <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Thông tin đăng ký học tập</h3>

                    </div>

                    <p>Mã biểu mẫu: 1</p>
                    <p>Thời gian gửi: 11:23:45 11-2-2003</p>
                    <form action="#" style="width: 100%;">

                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="{{$b->name}}">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input class="form-control1" type="text" name="txtDOB" placeholder="Your name here" value="{{$b->dob}}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control1" type="text" name="txtAddress" placeholder="Your name here" value="{{$b->address}}">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label> <br>
                            <input class="form-control1" type="text" name="txtAddress" placeholder="Your name here" value="{{$b->sex}}">
                        </div>
                        <div class="form-group">
                            <label>Quê quán</label>
                            <input class="form-control1" type="text" name="txtHomeTown" placeholder="Your name here" value="{{$b->hometown}}">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control1" type="text" name="txtPhone" placeholder="Your name here" value="{{$b->phone}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Trường</label>
                            <input class="form-control1" type="school" name="txtSchool" placeholder="Your name here" value="{{$b->school}}">
                        </div>
                        <div class="form-group">
                            <label>Lớp</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$b->class}}">
                        </div>
                        <div class="form-group">
                            <label>Thời gian học</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Môn học</label>
                            <?php 
                            $temp1 = DB::select('select * from subjects where id = ?',[$b->subject_id]);
                            ?>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$temp1[0]->name}}">
                        </div>
                        <div class="form-group">
                            <label>Điểm trung bình môn hai học kỳ trước</label>
                            <input class="form-control1" type="text" name="txtEmail" placeholder="Your name here" value="">
                            <input class="form-control1" type="text" name="txtEmail" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Đăng ký gia sư</label>
                            <?php
                                $temp2 = DB::select('select * from tutors where id = ?',[$b->tutor_id]);
                            ?>
                            <input class="form-control1" type="text" name="txtEmail" placeholder="Your name here" value="{{$temp2[0]->name}}">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="{{route('admin.form.getForm')}}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>
                @endforeach
                @endif
               
                @if($ideaform == "")
                <div>
                        <row class="hidden">
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
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="Bill Gates">
                        </div>



                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control1" type="text" name="txtPhone" placeholder="Your name here" value="Bill Gates">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="Bill Gates">
                        </div>
                        <div class="form-group">
                            <label>Ý kiến</label>
                            <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="Bill Gates">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="forms.html" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>
                @endforeach
                @endif
            </div>

        </div>
@endsection