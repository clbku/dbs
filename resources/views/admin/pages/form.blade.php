@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Biểu mẫu</h3>
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
                                <th>Mã đơn</th>
                                <th>Thời gian gửi</th>
                                <th>Người gửi</th>
                                <th>Loại biểu mẫu</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Nguyễn Văn G</td>
                                <td>Xin gia sư</td>
                                <td><a href="form-detail.html">Xem chi tiết</a></td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Nguyễn Văn G</td>
                                <td>Xin gia sư</td>
                                <td><a href="form-detail.html">Xem chi tiết</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Nguyễn Văn G</td>
                                <td>Xin gia sư</td>
                                <td><a href="form-detail.html">Xem chi tiết</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>

        </div>
@endsection