@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                <div class="row">
                    <div class="col-sm-3">
                        <row>

                            <div class="content-box-wrapper position-center" style="width: 100%;">
                                <div class="profile_img_profile position-center">
                                    @if (count($errors)>0)
                                        <div class="alert alert-danger">
                                        <strong>Lỗi ! </strong>Vui lòng kiểm tra lại thông tin :
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    @endif ()
                                    <img src="{{url($user[0]->avatar)}}" alt="avatar">
                                </div>
                                <!--account info -->
                                @if ($type == 'user')
                                
                                <form method="post" action="{{route('admin.update-password.postUpdatePass',[$user[0]->id])}}" style="width: 100%;">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input class="form-control1" type="text" name="name" placeholder="Your name here" value="{{$user[0]->username}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu hiện tại</label>
                                        <input class="form-control1" type="password" name="oldpassword" placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập mật khẩu mới</label>
                                        <input class="form-control1" type="password" name="password" placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input class="form-control1" type="password" name="password_comfirmation" placeholder="" value="">
                                    </div>

                                    <input class="form-control1" type="submit" value="Cập nhật">
                                </form>
                                @endif
                                <!--end account info -->
                            </div>
                        </row>
                        <br>
                        @if ($type == "student")

                            <row>
                                <div class="content-box-wrapper position-center" style="width: 100%;">

                                    <form action="#" style="width: 100%;">

                                        <div class="form-group">
                                            <label>Tên phụ huynh</label>
                                            <input class="form-control1" type="text" placeholder="Your name here" value="Bill Gates">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input class="form-control1" type="text" placeholder="Your name here" value="Bill Gates">
                                        </div>

                                        <div class="form-group">
                                            <label>Tên phụ huynh</label>
                                            <input class="form-control1" type="text" placeholder="Your name here" value="Bill Gates">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input class="form-control1" type="text" placeholder="Your name here" value="Bill Gates">
                                        </div>

                                    </form>

                                </div>
                            </row>
                        @endif


                    </div>
                    <div class="col-sm-9">

                        <div class="content-box-wrapper">
                            <!--info -->
                            <h3 id="h3">Thông tin cơ bản</h3>
                            <form action="#" style="width: 100%;">

                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="{{$user[0]->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input class="form-control1" type="text" name="txtDOB" placeholder="Your name here" value="{{$user[0]->dob}}">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input class="form-control1" type="text" name="txtAddress" placeholder="Your name here" value="{{$user[0]->address}}">
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label> <br>
                                    <div class="radio-inline"><input type="radio" name="rdoGender" value="male" checked> Nam </div>
                                    <div class="radio-inline"><input type="radio" name="rdoGender" value="female" > Nữ </div>
                                    <div class="radio-inline"><input type="radio" name="rdoGender" value="orther" > Khác </div>


                                </div>
                                <div class="form-group">
                                    <label>Quê quán</label>
                                    <input class="form-control1" type="text" name="txtHomeTown" placeholder="Your name here" value="{{$user[0]->hometown}}">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control1" type="text" name="txtPhone" placeholder="Your name here" value="{{$user[0]->phone}}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="@if ($type=="user") {{$user[0]->email}} @endif">
                                </div>
                            </form>
                            <!-- end info -->
                        </div>
                        @if ($type == "student")
                            <div class="content-box-wrapper">
                                <h3 id="h3">Thông tin học sinh</h3>
                                <form action="#" style="width: 100%;">
                                    <div class="form-group">
                                        <label>Trường</label>
                                        <input class="form-control1" type="text" name="txtSchool" placeholder="Your name here" value="Bill Gates">
                                    </div>
                                    <div class="form-group">
                                        <label>Lớp</label>
                                        <input class="form-control1" type="text" name="txtClass" placeholder="Your name here" value="Bill Gates">
                                    </div>
                                </form>
                            </div>
                        @endif
                        @if ($type == "user" && $user[0]->type == 0)
                            <div class="content-box-wrapper">
                                <h3 id="h3">Thông tin Gia sư</h3>
                                <form action="#" style="width: 100%;">
                                    <div class="form-group">
                                        <label>Chuyên môn</label>
                                        <input class="form-control1" type="text" name="txtSchool" placeholder="Your name here" value="Toán 5, Lý 5, Hóa 5">
                                    </div>
                                    <div class="form-group">
                                        <label>Thành tích</label>
                                        <input class="form-control1" type="text" name="txtClass" placeholder="Your name here" value="Học sinh giỏi hóa cấp quốc tê :)">
                                    </div>
                                    <div class="form-group">
                                        <label>Điểm đánh giá</label>
                                        <input class="form-control1" type="text" name="txtClass" placeholder="Your name here" value="10/10 (15 lượt đánh giá)">
                                    </div>
                                </form>
                            </div>
                        @endif
                        <br>


                    </div>
                </div>
                @if ($type == "user" && $user[0]->type == 0)
                    <div class="content-box-wrapper">

                        <h3 id="h3">Các lớp học của bạn</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên học sinh</th>
                                    <th>Tên môn học</th>
                                    <th>Thời gian học</th>
                                    <th>Khối lớp</th>
                                    <th>Ca học</th>
                                    <th>Địa chỉ học</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>

                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div>
                @endif
                @if ($type == "student")
                    <div class="content-box-wrapper">

                        <h3 id="h3">Các lớp học của bạn</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên môn học</th>
                                    <th>Tên gia sư</th>
                                    <th>Thời gian học</th>
                                    <th>Khối lớp</th>
                                    <th>Ca học</th>
                                    <th>Địa chỉ học</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>

                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div>
                @endif
                @if ($type == "student")
                    <div class="content-box-wrapper">

                        <h3 id="h3">Bảng điểm</h3>
                        <div class="table-responsive">
                            <table class="table"  >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th colspan="2"  class="text-center">Điểm trung bình 2 kỳ gần nhất</th>
                                    <th class="text-center">Điểm học trung tâm</th>
                                    <th class="text-center">So sánh</th>
                                </tr>
                                </thead >
                                <tbody class="text-center">
                                <tr>
                                    <th scope="row">Toán</th>
                                    <td>3.4</td>
                                    <td>6.5</td>
                                    <td>7.7</td>
                                    <td>Cao hơn</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lý</th>
                                    <td>3.4</td>
                                    <td>6.5</td>
                                    <td>7.7</td>
                                    <td>Cao hơn</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hóa</th>
                                    <td>3.4</td>
                                    <td>6.5</td>
                                    <td>7.7</td>
                                    <td>Cao hơn</td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->

                    </div>
                @endif
            </div>
        </div>
        <!--footer section start-->
@endsection