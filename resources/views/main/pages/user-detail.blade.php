@extends('main.master')
@section('content')
	 <div class="row">
        <div class="container">
            <div class="content col-sm-9">
                <div class="content-title">
                    
                </div>
                <div class="content-calender">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="content-main">
                    <div class="col-sm-4 text-center">
                        <img src="images/gates.jpg" style="width: 200px" class="img-circle">
                    </div>
                    <div class="col-sm-8">
                        <p><span style="color: green; font-weight: 900;">Họ và tên: </span></p>
                        <p><span style="color: green; font-weight: 900;">Ngày sinh: </span>20/10/1998</p>
                        <p><span style="color: green; font-weight: 900;">Địa chỉ: </span>Hoàng Công Lý</p>
                        <p><span style="color: green; font-weight: 900;">Quê quán: </span>20/10/1998</p>
                        <p><span style="color: green; font-weight: 900;">Giới tính: </span>Hoàng Công Lý</p>
                        <p><span style="color: green; font-weight: 900;">Email: </span>20/10/1998</p>
                        <p><span style="color: green; font-weight: 900;">Chuyên môn: </span>Hoàng Công Lý</p>
                        <p><span style="color: green; font-weight: 900;">Thành tích: </span>20/10/1998</p>
                        <p><span style="color: green; font-weight: 900;">Đánh giá: </span>10/10</p>
                    </div>
                </div>


                <hr>
                <br>
                <div class="content-main">
                  
                </div>
                <br>
                <hr>
                <br>
                
            </div>
            <div class="right-side col-sm-3">

                <div class="tutor-list">
                    <div class="right-title">Danh mục gia sư</div>
                    <ul>
                        <?php $tutorlist = DB::select('CALL getSpecializeListWithCountNumTutor()') ?>
                        @foreach($tutorlist as $t)
                            <li>
                                <a href="{{route('main.tutor.getList', $t->ids)}}">
                                    <div class="row">
                                        <span class="col-sm-10">{{$t->s_name}}</span>
                                        <div class="col-sm-2 num">{{$t->c}}</div>
                                    </div>
                                </a>
                            </li>

                        @endforeach
                    </ul>
                </div>
                <div class="news-list">

                    <div class="right-title">Tin tức</div>
                    <ul>
                        <?php $newslist = DB::select('CALL getRandomNewsList()') ?>
                        @foreach( $newslist as $n )
                            <li>
                                <div class="row">
                                    <div class="col-sm-4 image">
                                        <img src="{{url($n->images)}}" class="img-responsive" alt="hinh1">
                                    </div>
                                    <div class="col-sm-8 detail">
                                        <div class="title">
                                            <a href="{{route('main.news.getNewsDetail', $n->id)}}" >{!! $n->title !!}</a>
                                        </div>
                                        <div class="time" style="font-size: 10px;">
                                            <i class="fa fa-calendar"></i> {!! $n->created_at !!}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="right-title">Fanpages</div>
                <div class="fanpage">


                </div>

            </div>
        </div>
    </div>
@endsection