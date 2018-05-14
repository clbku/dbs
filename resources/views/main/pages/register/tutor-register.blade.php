
@extends('main.master')
@section('content')

    <div class="form" id="form-tutor">
        <div class="container">
            <form method="post" action="{{route('main.mainRegister', 'tutor')}}">
                <input name="_token" value="{{csrf_token()}}" type="hidden">
                <h2 style="color:  green; border-bottom: 3px solid green;padding-bottom: 18px;">Đăng Ký Gia sư</h2>
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