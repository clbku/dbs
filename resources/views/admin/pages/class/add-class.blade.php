@extends('admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
             <div class="content-box-wrapper">
                        <div class="row">
                            <h3 id="h3" class="col-sm-7">Thông tin Lớp học</h3>

                        </div>
                        <form style="width: 100%;" method="post" action="{{route('admin.class.postAddClass')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group" >
                                <label>Tên học sinh</label>
                                <select name="student_id" class="form-control">
                                    <?php
                                        $students = DB::select('select name, id, class_s from students');
                                    ?>
                                    @foreach($students as $s)
                                        <option value="{{$s->id}}"> Mã Số {{$s->id}} - {{$s->name}} - Lớp {{$s->class_s}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Tên gia sư</label>
                                <select name="tutor_id" class="form-control">
                                    <?php
                                    $tutors = DB::select('select users.name, tutors.id, specialize from tutors, users, specializes WHERE tutors.user_id = users.id and tutors.s_id = specializes.id');
                                    ?>
                                    @foreach($tutors as $t)
                                        <option value="{{$t->id}}"> Mã Số {{$t->id}} - {{$t->name}} - {{$t->specialize}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Tên Môn học</label>
                                <select name="subject_id"class="form-control">
                                    <?php
                                    $subject = DB::select('select name, id from subjects');
                                    ?>
                                    @foreach($subject as $s)
                                        <option value="{{$s->id}}"> Mã Số {{$s->id}} - {{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Địa chỉ học</label>
                                <input class="form-control1" type="text" name="address" placeholder="Your name here" value="" required>
                            </div>
                            <div class="form-group" >
                                <label>Ca học</label>
                                <input class="form-control1" type="text" name="shift" placeholder="Your name here" value="" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-default" type="submit" value="Xác nhận">
                                <a href="{{route('admin.class.getList')}}" class="btn btn-danger">Quay lại</a>
                            </div>
                        </form>
                    </div>
        </div>

    </div>
@endsection