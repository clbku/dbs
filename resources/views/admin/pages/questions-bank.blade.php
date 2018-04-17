@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">

                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Trắc nghiệm</h3>
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
                                <th>Mã câu hỏi</th>
                                <th>Môn học</th>
                                <th>Cấp độ</th>
                                <th>Câu hỏi</th>
                                <th>Đáp án đúng</th>
                                <th>Đáp án sai</th>
                                <th>Đáp án sai</th>
                                <th>Đáp án sai</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Toán 5</td>
                                <td>Dễ</td>
                                <th>1+1=?</th>
                                <td>2</td>
                                <td>1</td>
                                <td>3</td>
                                <td>4</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Anh văn 3</td>
                                <td>Trung bình</td>
                                <td>What is your name?</td>
                                <td>My name is Tom</td>
                                <td>Thanks</td>
                                <td>I am fine</td>
                                <td>Goodbye</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Hóa</td>
                                <td>Khó</td>
                                <td>Đốt cháy hoàn toàn, một hợp chất X, cần dùng hết 10,08 lít O2 (ĐKTC). Sau khi phản kết thúc phản ứng, chỉ thu được 13,2 gam khí CO2 và 7,2gam nước. Tìm công thức hoá học của X (Biết công thức dạng đơn giản chính là công thức hoá học của X)</td>
                                <td>C3H8O</td>
                                <td>Không biết</td>
                                <td>Nghỉ học</td>
                                <td>H2O</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Tự Luận</h3>
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
                                <th>Mã câu hỏi</th>
                                <th>Môn học</th>
                                <th>Cấp độ</th>
                                <th>Câu hỏi</th>
                                <th>Đáp án đúng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Toán 5</td>
                                <td>Dễ</td>
                                <th>1+1=?</th>
                                <td>2</td>

                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Anh văn 3</td>
                                <td>Trung bình</td>
                                <td>What is your name?</td>
                                <td>My name is Tom</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Hóa</td>
                                <td>Khó</td>
                                <td>Đốt cháy hoàn toàn, một hợp chất X, cần dùng hết 10,08 lít O2 (ĐKTC). Sau khi phản kết thúc phản ứng, chỉ thu được 13,2 gam khí CO2 và 7,2gam nước. Tìm công thức hoá học của X (Biết công thức dạng đơn giản chính là công thức hoá học của X)</td>
                                <td>C3H8O</td>
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