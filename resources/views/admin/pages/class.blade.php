@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                
                <div class="content-box-wrapper">
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
                                <td></td>
                                <td>{{$a->begin_at}}</td>
                                <td>{{$a->student_num}}</td>
                                <td>{{$a->level}}</td>
                                <td>{{$a->shift}}</td>

                                <?php 
                                    $b=DB::select('select u.name from tutors as t, users as u where t.user_id = u.id and t.id = ?',[$a->tutor_id]);
                                ?>
                                <td><a href="{{route('admin.pages.profile',['user', $a->tutor_id])}}">{{$b[0]->name}}</a></td>
                                <td>
                                    <?php
                                        $student=DB::select('CALL getAllStudentNameByClassId(?)', [$a->id]);
                                    ?>
                                    @foreach($student as $s)
                                        <a href="{{route('admin.pages.profile', ['student', $s->student_id])}}">{{$s->name}}</a> <br>
                                    @endforeach
                                </td>
                                <td id="add-{{$a->id}}" class="hidden">
                                    <form action="{{route('admin.class.addStudent')}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>ID học sinh</label>
                                            <input class="form-control" name="studentID">
                                        </div>
                                        <input type="hidden" name="classID" value="{{$a->id}}">
                                        <input type="submit" value="Thêm">
                                    </form>
                                </td>
                                <td>
                                    <a href="#" id="addstudent-{{$a->id}}"><i class="fa fa-plus"></i>Thêm học sinh</a>
                                </td>
                                <script>
                                    $('#addstudent-{{$a->id}}').click(function () {
                                        $('#add-{{$a->id}}').removeClass('hidden');
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