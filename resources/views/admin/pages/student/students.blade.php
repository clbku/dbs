@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">

                <div class="content-box-wrapper">
                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}
                    @endif
                    <div class="row">

                        <h3 id="h3" class="col-sm-5">Danh sách học sinh</h3>
                        <form class="col-sm-7" method="post" active="{{route('admin.user.postFindStudent')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <row>
                                <div class="col-sm-3">
                                    <select name="col" class="form-control">
                                        <?php
                                        $col = DB::select('SELECT COLUMN_NAME as name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "db_ass2" AND TABLE_NAME="students"');
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
                                <td id="add-{{$s->id}}" class="hidden">
                                    <form action="{{route('admin.students.postInsertParent', $s->id)}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Thông tin phụ huynh</label>
                                            <input type="text" class="form-control" name="parentName" value="">
                                            <input type="text" class="form-control" name="parentPhone" value="">
                                        </div>
                                        {{--<input type="hidden" name="classID" value="{{$s->id}}">--}}
                                        <input type="submit" value="Thêm">
                                    </form>
                                </td>

                                <td>
                                    <a><i class="fa fa-edit"></i></a>
                                    <a  href="{{route('admin.students.getDelete', $s->id)}}"><i class="fa fa-times"></i></a>
                                    <a id="addparent-{{$s->id}}"><i class="fa fa-plus"></i></a>
                                </td>
                                <script>
                                    $('#addparent-{{$s->id}}').click(function () {
                                        $('#add-{{$s->id}}').removeClass('hidden');
                                    })
                                </script>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection