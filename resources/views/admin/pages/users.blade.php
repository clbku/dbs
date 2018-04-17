@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                Người dùng(ID, Họ tên , Ngày sinh, Địa chỉ, Quê quán, Giới tính, SĐT, Email, Avatar, Mã tài khoản)
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách người dùng</h3>
                        <form class="col-sm-5">
                            <input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Họ và tên</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Quên quán</th>
                                <th>Giói tính</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Loại người dùng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>

                                <td><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>30-10-1990</td>
                                <td>KTX KHU A</td>
                                <td>Nam Định</td>
                                <td>Nam</td>
                                <td>0987654321</td>
                                <td>khach@gmail.com</td>
                                <td>Khách</td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>

                                <td><a href="profile.html">Nguyễn Văn C</a></td>
                                <td>30-10-1990</td>
                                <td>KTX KHU A</td>
                                <td>Nam Định</td>
                                <td>Nam</td>
                                <td>0987654321</td>
                                <td>khach@gmail.com</td>
                                <td>Gia sư</td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>

                                <td><a href="profile.html">Nguyễn Văn B</a></td>
                                <td>30-10-1990</td>
                                <td>KTX KHU A</td>
                                <td>Nam Định</td>
                                <td>Nam</td>
                                <td>0987654321</td>
                                <td>khach@gmail.com</td>
                                <td>Admin</td>

                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection