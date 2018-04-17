@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">

                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách học sinh</h3>
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
                                <th>Giói tính</th>
                                <th>Trường</th>
                                <th>Lớp</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>

                                <td><a href="profile.html">Nguyễn Văn E</a></td>
                                <td>20-10-2000</td>
                                <td>Quận 1</td>
                                <td>Nam</td>
                                <td>THCS Hoàng Hoa Thám</td>
                                <td>10</td>
                                <td>0987654312</td>
                                <td>E@gmail.com</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>

                                <td><a href="profile.html">Nguyễn Văn D</a></td>
                                <td>20-10-2000</td>
                                <td>Quận 1</td>
                                <td>Nam</td>
                                <td>THCS Hoàng Hoa Thám</td>
                                <td>10</td>
                                <td>0987654312</td>
                                <td>E@gmail.com</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>

                                <td><a href="profile.html">Nguyễn Văn F</a></td>
                                <td>20-10-2000</td>
                                <td>Quận 1</td>
                                <td>Nam</td>
                                <td>THCS Hoàng Hoa Thám</td>
                                <td>10</td>
                                <td>0987654312</td>
                                <td>E@gmail.com</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection