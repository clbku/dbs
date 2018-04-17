@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                <div class="row">
                    <div class="col-sm-3">
                        <row>
                            <div class="content-box-wrapper position-center" style="width: 100%;">
                                <div class="profile_img_profile position-center">
                                    <span style="background:url(images/bill-gates.jpg) no-repeat center"> </span>
                                </div>
                                <!--account info -->
                                <form action="#" style="width: 100%;">
                                    <?php
                                        $account = DB::select("select * from accounts where user_id = ?", [$user[0]->id]);

                                    ?>
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input class="form-control1" type="text" placeholder="Your name here" value="{{$account[0]->username}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input class="form-control1" type="password" placeholder="" value="{{$account[0]->password}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input class="form-control1" type="text" placeholder="" value="">
                                    </div>

                                    <input class="form-control1" type="submit" value="Cập nhật">
                                </form>
                                <!--end account info -->
                            </div>
                        </row>
                        <br>
                        @if ($user[0]->type == "Học Sinh")
                            <row class="">
                        @else
                            <row class="hidden">
                        @endif

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
                                    <input class="form-control1" type="email" name="txtEmail" placeholder="Your name here" value="{{$user[0]->email}}">
                                </div>
                            </form>
                            <!-- end info -->
                        </div>
                        @if ($user[0]->type == "Học Sinh")
                            <div class="content-box-wrapper">
                        @else
                            <div class="content-box-wrapper hidden">
                        @endif

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
                        @if ($user[0]->type == "Gia sư")
                            <div class="content-box-wrapper">
                        @else
                            <div class="content-box-wrapper hidden">
                        @endif

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
                        <br>


                    </div>
                </div>
                @if ($user[0]->type == "Gia sư")
                    <div class="content-box-wrapper">
                @else
                    <div class="content-box-wrapper hidden">
                @endif
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
                @if ($user[0]->type == "Học sinh")
                    <div class="content-box-wrapper">
                        @else
                            <div class="content-box-wrapper hidden">
                                @endif
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
                <div class="row">


                </div>

                @if ($user[0]->type == "Học sinh")
                    <div class="content-box-wrapper">
                        @else
                            <div class="content-box-wrapper hidden">
                                @endif
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
            </div>
        </div>
        <!--footer section start-->
@endsection