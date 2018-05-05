@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                
                <div class="content-box-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <h3 id="h3" class="col-sm-5">Danh sách môn học</h3>
                        <form class="col-sm-7" method="post" active="{{route('admin.user.postFindUser')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <row>
                                <div class="col-sm-3">
                                    <select name="col" class="form-control">
                                        <?php
                                        $col = DB::select('SELECT COLUMN_NAME as name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "db_ass2" AND TABLE_NAME="subjects"');
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
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Thư mục</th>
                                <th>Ngày thêm</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subject as $a)
                            <tr>
                                <th scope="row">{{$a->id}}</th>

                                <td>{{$a->subjectName}}</td>
                                <td>{{$a->typeName}}</td>
                                <td>{{$a->created_at}}</td>

                                <td>
                                    @if ($a->state==1)
                                        {{'Còn mở'}}
                                    @else {{'Đã đóng'}}
                                    @endif
                                </td>
                                <td>
                                    @if ($a->state == 1)
                                    <a href="{{route('admin.subjects.getSubjectLock', [$a->id, 0])}}"><i class="fa fa-lock"></i></a>
                                    @else
                                    <a href="{{route('admin.subjects.getSubjectLock', [$a->id, 1])}}"><i class="fa fa-unlock"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <form class="hidden" id="add" action="{{route('admin.subjects.postAddSubject')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên Môn học</label>
                                <input class="form-control" type="text" name="subject_name">
                            </div>
                            <div class="form-group">
                                <lable>Loại môn học</lable>
                                <select name="subject_type" class="form-control">
                                    <?php
                                    $st = DB::select('select * from subject_types');
                                    ?>
                                    @foreach($st as $s)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <input type="submit" class="btn btn-success" value="Thêm"></input>
                        </form>
                        <div class="btn btn-success" id="addSubject">Tạo môn học mới</div>
                        <script>
                            $('#addSubject').click(function() {
                                $('#addSubject').addClass('hidden');
                                $('#add').removeClass('hidden');
                            })
                        </script>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection