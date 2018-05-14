@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                
                <div class="content-box-wrapper">

                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                    @endif
                    <div class="row">

                        <h3 id="h3" class="col-sm-5">Danh sách lớp học</h3>
                        <form class="col-sm-7" method="post" active="{{route('admin.user.postFindClass')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <row>
                                <div class="col-sm-3">
                                    <select name="col" class="form-control">
                                        <?php
                                        $col = DB::select('SELECT COLUMN_NAME as name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "db_ass2" AND TABLE_NAME="class_s"');
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

                            @foreach ($class as $c)
                            <tr>
                                <th scope="row">{{$c->id}}</th>

                                <td>{{$c->address}}</td>
                                <td>{{$c->class_s}}</td>
                                <td>{{$c->begin_at}}</td>
                                <td>{{$c->student_num}}</td>

                                <td>{{$c->level}}</td>
                                <td>{{$c->shift}}</td>

                                <td><a href="{{route('admin.pages.profile',['user', $c->tid])}}">{{$c->tutor_name}}</a></td>
                                <td>
                                    <?php
                                        $student=DB::select('CALL getAllStudentNameByClassId(?)', [$c->id]);
                                    ?>
                                    @foreach($student as $s)
                                        <a href="{{route('admin.pages.profile', ['student', $s->sid])}}">{{$s->name}}</a> <a href="{{route('admin.class.getDelete', [$s->id, $s->sid])}}"><i class="fa fa-times"></i></a><br>
                                    @endforeach
                                </td>
                                <td id="add-{{$c->id}}" class="hidden">
                                    <form action="{{route('admin.class.addStudent')}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Chọn học sinh</label>
                                            <select name="studentID" class="form-control">
                                                <?php
                                                    $students = DB::select('select * from students');
                                                ?>
                                                @foreach($students as $s)
                                                <option value="{{$s->id}}">{{$s->id}} - {{$s->name}} - {{$s->class_s}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" class="form-control" name="classID" value="{{$c->id}}">
                                        </div>
                                        <input type="hidden" name="classID" value="{{$c->id}}">
                                        <input type="submit" value="Thêm">
                                    </form>
                                </td>
                                <td>
                                    @if ($c->state == 0)
                                    <a href="{{route('admin.class.getEdit', $c->id)}}"><i class="fa fa-edit"></i></a>
                                    <a href="#" id="addstudent-{{$c->id}}"><i class="fa fa-plus"></i></a>
                                    <a href="{{route('admin.class.getComplete', $c->id)}}"><i class="fa fa-check"></i></a>
                                    @else
                                        <label>Complete</label>
                                    @endif

                                </td>
                                <script>
                                    $('#addstudent-{{$c->id}}').click(function () {
                                        $('#add-{{$c->id}}').removeClass('hidden');
                                    })
                                </script>
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