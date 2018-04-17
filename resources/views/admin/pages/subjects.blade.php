@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                Người dùng(ID, Họ tên , Ngày sinh, Địa chỉ, Quê quán, Giới tính, SĐT, Email, Avatar, Mã tài khoản)
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách môn học</h3>
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
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Thời gian học</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>

                                <td>Toán 5</td>
                                <td>4 tháng</td>
                                <td>Còn Dạy</td>


                            </tr>
                            <tr>
                                <th scope="row">2</th>

                                <td>Vật lý 10</td>
                                <td>4 tháng</td>
                                <td>Đã hủy</td>


                            </tr>
                            <tr>
                                <th scope="row">3</th>

                                <td>Anh Văn 10</td>
                                <td>4 tháng</td>
                                <td>Còn Dạy</td>


                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection