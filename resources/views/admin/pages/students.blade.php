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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($student as $s)
                            <tr>
                                <th scope="row">{{$s->id}}</th>

                                <td><a href="{{route('admin.pages.profile',['student', $s->id])}}">{{$s->name}}</a></td>
                                <td>{{$s->dob}}</td>
                                <td>{{$s->address}}</td>
                                <td>{{$s->sex}}</td>
                                <td>{{$s->school}}</td>
                                <td>{{$s->class_s}}</td>
                                <td>{{$s->phone}}</td>
                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a><i class="fa fa-times"></i></a>
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection