@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                Người dùng(ID, Họ tên , Ngày sinh, Địa chỉ, Quê quán, Giới tính, SĐT, Email, Avatar, Mã tài khoản)
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách Lớp học</h3>
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
                                <th>Mã Lớp</th>
                                <th>Địa chỉ học</th>
                                <th>Khối lớp</th>
                                <th>Start</th>
                                <th>Finish</th>
                                <th>Số học sinh</th>
                                <th>Cấp độ</th>
                                <th>Ca học</th>
                                <th>Gia sư</th>
                                <th>Học sinh</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>

                                <td>Công Viên LVT</td>
                                <td>10</td>
                                <td>10-10-2010</td>
                                <td>10-01-2011</td>
                                <td>2</td>
                                <td>Cơ bản</td>
                                <td>19h-21h, 3-5-7</td>
                                <td><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>

                                        <a href="profile.html">Nguyễn Văn D</a><br>
                                        <a href="profile.html">Nguyễn Văn E</a>

                                </td>


                            </tr>
                            <tr>
                                <th scope="row">2</th>

                                <td>Công Viên LVT</td>
                                <td>10</td>
                                <td>10-10-2010</td>
                                <td>10-01-2011</td>
                                <td>2</td>
                                <td>Cơ bản</td>
                                <td>19h-21h, 3-5-7</td>
                                <td><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>

                                    <a href="profile.html">Nguyễn Văn D</a><br>
                                    <a href="profile.html">Nguyễn Văn E</a>

                                </td>


                            </tr>
                            <tr>
                                <th scope="row">3</th>

                                <td>Công Viên LVT</td>
                                <td>10</td>
                                <td>10-10-2010</td>
                                <td>10-01-2011</td>
                                <td>2</td>
                                <td>Cơ bản</td>
                                <td>19h-21h, 3-5-7</td>
                                <td><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>

                                    <a href="profile.html">Nguyễn Văn D</a><br>
                                    <a href="profile.html">Nguyễn Văn E</a>

                                </td>


                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection