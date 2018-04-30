@extends('main.master')
@section('content')
    <div class="full">
        <div class="button-div">
            <a class="btn btn-lg btn-success" id="btn-tutor">Đăng ký Gia sư</a>
            <a class="btn btn-lg btn-success" id="btn-student">Đăng Ký học tập</a>
        </div>
    </div>
    <div class="form hidden" id="form-student">
        <div class="container">
            <form method="post" action="{{route('main.mainRegister', 'student')}}">
                <input name="_token" value="{{csrf_token()}}" type="hidden">
                <h2>Đăng Ký Học Tập</h2>
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
    <div class="form hidden" id="form-tutor">
        <div class="container">
            <form method="post" action="{{route('main.mainRegister', 'tutor')}}">
                <input name="_token" value="{{csrf_token()}}" type="hidden">
                <h2>Đăng Ký Gia sư</h2>
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input class="form-control" type="text" name="txtName" value="" placeholder="account" required>
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input class="form-control" type="date" name="txtDOB" value="" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" type="text" name="txtAddress" value="" placeholder="" required>
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
                    <input class="form-control" type="text" name="txtPhone" value="" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="txtEmail" value="" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label>Trường đã hoặc đang theo học</label>
                    <input class="form-control" type="text" name="txtSchool" value="" placeholder="password">
                </div>
                <div class="form-group">
                    <?php
                        $sp = DB::select('select * from specializes');
                    ?>
                    <label>Chuyên môn</label>
                    <select name="txtSpecialize" class="form-control">
                        @foreach($sp as $s)
                            <option value="{{$s->id}}">{{$s->specialize}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Thành tích (nếu có)</label>
                    <input class="form-control" type="text" value="" name="txtAchievement" placeholder="password">
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