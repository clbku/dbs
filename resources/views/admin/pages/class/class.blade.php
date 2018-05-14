@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                
                <div class="content-box-wrapper">

                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                    @endif
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách Lớp học</h3>
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
                                <th>Mã Lớp</th>
                                <th>Địa chỉ học</th>
                                <th>Khối lớp</th>
                                <th>Start</th>
                                <th>Số học sinh</th>
                                <th>Cấp độ</th>
                                <th>Ca học</th>
                                <th>Gia sư</th>
                                <th>Học sinh</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($class as $a)
                            <tr>
                                <th scope="row">{{$a->id}}</th>

                                <td>{{$a->address}}</td>
                                <td>{{$a->class_s}}</td>
                                <td>{{$a->begin_at}}</td>
                                <td>{{$a->student_num}}</td>

                                <td>{{$a->level}}</td>
                                <td>{{$a->shift}}</td>

                                <td><a href="{{route('admin.pages.profile',['user', $a->tid])}}">{{$a->tutor_name}}</a></td>
                                {{--<td>--}}
                                    {{--<?php--}}
                                        {{--$student=DB::select('CALL getAllStudentNameByClassId(?)', [$a->class_id]);--}}
                                    {{--?>--}}
                                    {{--@foreach($student as $s)--}}
                                        {{--<a href="{{route('admin.pages.profile', ['student', $s->sid])}}">{{$s->name}}</a> <a href="{{route('admin.class.getDelete', [$a->class_id, $s->sid])}}"><i class="fa fa-times"></i></a><br>--}}
                                    {{--@endforeach--}}
                                {{--</td>--}}
                                {{--<td id="add-{{$a->class_id}}" class="hidden">--}}
                                    {{--<form action="{{route('admin.class.addStudent')}}" method="post">--}}
                                        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label>Chọn học sinh</label>--}}
                                            {{--<select name="studentID" class="form-control">--}}
                                                {{--<?php--}}
                                                    {{--$students = DB::select('select * from students');--}}
                                                {{--?>--}}
                                                {{--@foreach($students as $s)--}}
                                                {{--<option value="{{$s->id}}">{{$s->id}} - {{$s->name}} - {{$s->class_s}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--<input class="form-control" name="studentID" required>--}}
                                        {{--</div>--}}
                                        {{--<input type="hidden" name="classID" value="{{$a->class_id}}">--}}
                                        {{--<input type="submit" value="Thêm">--}}
                                    {{--</form>--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<a href="{{route('admin.class.getEdit', $a->class_id)}}"><i class="fa fa-edit"></i></a>--}}
                                    {{--<a href="#" id="addstudent-{{$a->class_id}}"><i class="fa fa-plus"></i></a>--}}
                                {{--</td>--}}
                                {{--<script>--}}
                                    {{--$('#addstudent-{{$a->class_id}}').click(function () {--}}
                                        {{--$('#add-{{$a->class_id}}').removeClass('hidden');--}}
                                    {{--})--}}
                                {{--</script>--}}
                            </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <a href="{{route('admin.class.addClass')}}" class="btn btn-success">Create Class</a>
                </div>

            </div>
        </div>

@endsection