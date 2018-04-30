@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách người dùng</h3>
                        <form class="col-sm-5" method="post" active="{{route('admin.user.postFind')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input class="sb-search-input" type="text" name="data" value="" placeholder="Nhập tên người dùng cần tìm kiếm">
                            <input class="sb-icon-search" type="submit" name="submit" value="Search">
                            
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
                                <th>Giới tính</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Loại người dùng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $a)
                            <tr>
                                <th scope="row">{{$a->id}}</th>

                                <td><a href="{{route('admin.pages.profile',['user',$a->id])}}">{{$a->name}}</a></td>
                                <td>{{$a->dob}}</td>
                                <td>{{$a->address}}</td>
                                <td>{{$a->hometown}}</td>
                                <td>
                                    @if ($a->sex)
                                        {{"Nam"}}
                                    @else
                                        {{"Nữ"}}
                                    @endif
                                </td>
                                <td>{{$a->phone}}</td>
                                <td>{{$a->email}}</td>
                                <td>
                                    @if ($a->type == 0)
                                        {{"Gia sư"}}
                                    @elseif ($a->type == 1)
                                        {{"Admin"}}
                                    @else
                                        {{"Thành viên"}}

                                    @endif
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