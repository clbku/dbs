@extends('main.master')
@section('content')

    <div class="form" id="form-student">
        <div class="container">
            <form method="post" action="{{route('main.register.student')}}">
                <input name="_token" value="{{csrf_token()}}" type="hidden">
                <h2 style="color:  green; border-bottom: 3px solid green;padding-bottom: 18px;"><i class="fa fa-pencil"></i>Đăng Ký Học Tập</h2>
                @if (\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input class="form-control" type="text" name="txtName" value="account" placeholder="account" required>
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input class="form-control" type="date" name="txtDOB" value="" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="txtAddress" value="" placeholder="account" required>
                </div>
                <div class="form-group">
                    <label>Quê quán</label>
                    <input class="form-control" type="text" name="txtHometown" value="" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label>Giới tính</label><br>
                    <label class="radio-inline"><input type="radio" value="1" name="rdoSex">Nam</label>
                    <label class="radio-inline"><input type="radio" value="0" name="rdoSex">Nữ</label>
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input class="form-control" type="text" value="" placeholder="password" name="txtPhone" required>
                </div>
                <div class="form-group">
                    <label>Trường</label>
                    <input class="form-control" type="text" value="" name="txtSchool" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label>Lớp</label>
                    <input class="form-control" type="text" value="" name="txtClass" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label>Thời gian rảnh rỗi</label>
                    <input class="form-control" type="text" value="" name="txtTime" placeholder="password">
                </div>
                <div class="form-group">
                    <label>Điểm trung bình học kỳ trước</label>
                    <input class="form-control" type="text" value="" name="txtAvg1" placeholder="password">
                </div>
                <div class="form-group">
                    <label>Điểm trung bình học kỳ trước</label>
                    <input class="form-control" type="text" value="" name="txtAvg2" placeholder="password">
                </div>
                <div class="form-group">
                    <label>Môn học</label>
                    <?php
                    $tutor = DB::select('select id, name from subjects');
                    ?>
                    <select class="form-control" name="txtSubject" required>

                        @foreach($tutor as $t)
                            <option value="{{$t->id}}">{{$t->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Gia sư</label>
                    <?php
                    $tutor = DB::select('select u.name, t.id, s.specialize from users as u, tutors as t, specializes as s where u.id = t.user_id and s.id = t.s_id');
                    ?>
                    <select name="txtTutor" class="form-control" >
                        <option value="">--</option>
                        @foreach($tutor as $t)
                            <option value="{{$t->id}}">{{$t->name}} - {{$t->specialize}}</option>
                        @endforeach
                    </select>
                </div>
                <input class="form-control btn btn-success" type="submit" value="Đăng Ký">

            </form>
        </div>

    </div>

    <script type="text/javascript">
        $('#btn-tutor').click(function () {
            $('.full').addClass('hidden');
            $('#form-tutor').removeClass('hidden');
        });
        $('#btn-student').click(function () {
            $('.full').addClass('hidden');
            $('#form-student').removeClass('hidden');
        });
    </script>
@endsection