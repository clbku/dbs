@extends('admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
             <div class="content-box-wrapper">
                        <div class="row">
                            <h3 id="h3" class="col-sm-7">Thông tin Lớp học</h3>

                        </div>
                        <form action="#" style="width: 100%;" method="post" action="{{route('admin.class.postEdit', $class->id)}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group" >
                                <label>Mã lớp</label>
                                <input class="form-control1" type="text" name="class_id" placeholder="Your name here" value="{{$class->class_id}}" readonly>
                            </div>
                            <div class="form-group" >
                                <label>Địa chỉ học</label>
                                <input class="form-control1" type="text" name="address" placeholder="Your name here" value="{{$class->address}}" required>
                            </div>
                            <div class="form-group" >
                                <label>Khối lớp</label>
                                <input class="form-control1" type="text" name="class" placeholder="Your name here" value="{{$class->class_s}}" readonly>
                            </div>
                            <div class="form-group" >
                                <label>Bắt đầu học ngày</label>
                                <input class="form-control1" type="date" name="begin_at" placeholder="Your name here" value="{{$class->begin_at}}" required>
                            </div>
                            <div class="form-group" >
                                <label>Số học sinh</label>
                                <input class="form-control1" type="text" name="num_student" placeholder="Your name here" value="{{$class->student_num}}" readonly>
                            </div>
                            <div class="form-group" >
                                <label>Cấp độ</label>
                                <select name="level" required>
                                    <option value="{{$class->level}}">{{$class->level}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Ca học</label>
                                <input class="form-control1" type="text" name="shift" placeholder="Your name here" value="{{$class->shift}}" required>
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