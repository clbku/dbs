@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                
                <div class="content-box-wrapper">
                    <div class="row">

                        <h3 id="h3" class="col-sm-5">Danh sách người dùng</h3>
                        <form class="col-sm-7" method="post" active="{{route('admin.user.postFindUser')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <row>
                                <div class="col-sm-3">
                                    <select name="col" class="form-control">
                                        <?php
                                        $col = DB::select('SELECT COLUMN_NAME as name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "db_ass2" AND TABLE_NAME="users"');
                                        ?>
                                        @foreach($col as $c)
                                            <option value="{{$c->name}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <input class="sb-search-input" type="text" name="data" value="" placeholder="Nhập tên người dùng cần tìm kiếm">
                                    <input class="sb-icon-search" type="submit" name="submit" value="Search">
                                </div>
                            </row>


                            
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Họ và tên</th>
                                <th>Tên người dùng</th>
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
                                <td>{{$a->username}}</td>
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