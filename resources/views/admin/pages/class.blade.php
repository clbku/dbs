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
                                <th>Finish</th>
                                <th>Số học sinh</th>
                                <th>Cấp độ</th>
                                <th>Ca học</th>
                                <th>Gia sư</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($class as $a)
                            <tr>
                                <th scope="row">{{$a->id}}</th>

                                <td>{{$a->study_address}}</td>
                                <td>{{$a->level}}</td>
                                <td>{{$a->begin_at}}</td>
                                <td></td>
                                <td>{{$a->student_num}}</td>
                                <td></td>
                                <td>{{$a->shift}}</td>

                                <?php 
                                    $b=DB::select('select name from tutors where id = ?',[$a->tutor_id]);
                                ?>
                                <td><a href="{{route('admin.tutors.getProfile',$a->tutor_id)}}">{{$b[0]->name}}</a></td>
                             


                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
@endsection