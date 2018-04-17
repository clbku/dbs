@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách tin tức</h3>
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
                                <th>Thời gian</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Người đăng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Chứng nhận trung tâm xuất sắc</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Chứng nhận trung tâm xuất sắc</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Chứng nhận trung tâm xuất sắc</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="add-post.html" class="btn btn-success">Thêm Tin tức</a>
                    </div><!-- /.table-responsive -->
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách Bài Tập</h3>
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
                                <th>Thời gian</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Người đăng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Ôn tập chương 1</td>
                                <td><a href="de-bai-tap.html">Xem chi tiết</a></td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Ôn tập chương 1</td>
                                <td><a href="de-bai-tap.html">Xem chi tiết</a></td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Ôn tập chương 1</td>
                                <td><a href="de-bai-tap.html">Xem chi tiết</a></td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="add-post.html" class="btn btn-success">Thêm Bài tập</a>
                    </div><!-- /.table-responsive -->
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách Bài viết</h3>
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
                                <th>Thời gian</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Người đăng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Giải phương trình bậc 2</td>
                                <td>Mọi người chỉ em cách giải phương trình bậc 2 với ạ?</td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                    <a><i class="fa fa-reply"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Giải phương trình bậc 2</td>
                                <td>Mọi người chỉ em cách giải phương trình bậc 2 với ạ?</td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                    <a><i class="fa fa-reply"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>11:23:45 11-2-2003</td>
                                <td>Giải phương trình bậc 2</td>
                                <td>Mọi người chỉ em cách giải phương trình bậc 2 với ạ?</td>
                                <td><a href="form-detail.html"></a><a href="profile.html">Nguyễn Văn A</a></td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                    <a><i class="fa fa-reply"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>

        </div>
@endsection