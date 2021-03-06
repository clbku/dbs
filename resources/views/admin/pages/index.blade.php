@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="graphs">
        <div class="col_3">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="fa fa-mail-forward"></i>
                    <div class="stats">
                        <h5>
                            <?php
                                $a = DB::select('CALL getTutorNumber()');
                                echo($a[0]->number);
                            ?>
                        </h5>
                        <div class="grow">
                            <p>Tổng Gia sư</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="fa fa-users"></i>
                    <div class="stats">
                        <h5>
                            <?php
                                $a = DB::select('CALL getStudentNumber()');
                                echo($a[0]->number);
                            ?>
                        </h5>
                        <div class="grow grow1">
                            <p>Tổng học sinh</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="fa fa-eye"></i>
                    <div class="stats">
                        <h5>
                            <?php
                                $a = DB::select('CALL getClassNumber()');
                                echo($a[0]->number);
                            ?>
                        </h5>
                        <div class="grow grow3">
                            <p>Số lớp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget">
                <div class="r3_counter_box">
                    <i class="fa fa-usd"></i>
                    <div class="stats">
                        <h5>
                            <?php
                                $a = DB::select('CALL getUserNumber()');
                                echo($a[0]->number);
                            ?>
                        </h5>
                        <div class="grow grow2">
                            <p>Số người dùng</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

        <div class="content-box-wrapper">
                <div class="row">
                    <h3 id="h3" class="col-sm-7">Bảng xếp hạng</h3>
                    <form class="col-sm-5" method="post" active="{{route('admin.account.postFind')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input class="sb-search-input" placeholder="Nhập tên tài khoản cần tìm kiếm" type="text" name="data" value="">
                        <input class="sb-icon-search" type="submit" value="Search">
                        
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Xếp hạng</th>
                            <th>Tên gia sư</th>
                            <th>Tên tài khoản</th>
                            <th>Chuyên môn</th>
                            <th>Số lớp đã dạy</th>
                            <th>Điểm</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $data = DB::select('CALL getTutorListSortByPoint()');
                                $i = 1;
                            ?>
                            @foreach($data as $d)
                                <tr>
                                    <th><?php echo($i); $i++;?></th>
                                    <th>{{$d->name}}</th>
                                    <th>{{$d->username}}</th>
                                    <th>{{$d->specialize}}</th>
                                    <th>{{$d->num_class}}</th>
                                    <th>{{$d->point}}</th>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div>


    </div>
    <!--body wrapper start-->

</div>
    @endsection