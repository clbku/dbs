@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                Bài kiểm tra (Mã, Mã lớp, Mã Học sinh, Ngày kiểm tra, Điểm)
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách Bài kiểm tra</h3>
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
                                <th>Mã bài kiểm tra</th>
                                <th>Mã đề</th>
                                <th>Tên học sinh</th>
                                <th>Tên gia sư</th>
                                <th>Ngày kiểm tra</th>
                                <th>Môn</th>
                                <th>Số câu hỏi</th>
                                <th>Số câu đúng</th>
                                <th>Điểm</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>

                                <th><a href="de-kiem-tra.html">1002</a></th>
                                <th><a href="profile.html">Nguyễn Văn E</a></th>
                                <th><a href="profile.html">Nguyễn Văn A</a></th>
                                <th>13-11-2011</th>
                                <th>Toán 5</th>
                                <th>20</th>
                                <th>20</th>
                                <th>10</th>


                            </tr>
                            <tr>
                                <th scope="row">2</th>

                                <th><a href="de-kiem-tra.html">1002</a></th>
                                <th><a href="profile.html">Nguyễn Văn E</a></th>
                                <th><a href="profile.html">Nguyễn Văn A</a></th>
                                <th>13-11-2011</th>
                                <th>Toán 5</th>
                                <th>20</th>
                                <th>20</th>
                                <th>10</th>


                            </tr>
                            <tr>
                                <th scope="row">3</th>

                                <th><a href="de-kiem-tra.html">1002</a></th>
                                <th><a href="profile.html">Nguyễn Văn E</a></th>
                                <th><a href="profile.html">Nguyễn Văn A</a></th>
                                <th>13-11-2011</th>
                                <th>Toán 5</th>
                                <th>20</th>
                                <th>20</th>
                                <th>10</th>


                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection