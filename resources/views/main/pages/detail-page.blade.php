@extends('main.master')
@section('content')
    <div class="row">
        <div class="container">
            <div class="content col-sm-9">
                <div class="content-title">
                    {{$news->title}}
                </div>
                <div class="content-calender">
                    <i class="fa fa-calendar"></i>{{$news->created_at}}
                </div>


                <hr>
                <br>
                <div class="content-main">
                    {!! $news->content !!}
                </div>

            </div>
            <div class="right-side col-sm-3">

                <div class="tutor-list">
                    <div class="right-title">Danh mục gia sư</div>
                    <ul>
                        <li>
                            <div class="row">
                                <span class="col-sm-10">Gia sư cấp 1</span>
                                <div class="col-sm-2 num">3</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <span class="col-sm-10">Gia sư cấp 2</span>
                                <div class="col-sm-2 num">1</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <span class="col-sm-10">Gia sư cấp 3</span>
                                <div class="col-sm-2 num">6</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <span class="col-sm-10">Gia sư tiếng anh</span>
                                <div class="col-sm-2 num">10</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <span class="col-sm-10">Gia sư luyện thi đại học</span>
                                <div class="col-sm-2 num">9</div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <span class="col-sm-10">Gia sư tin học văn phòng</span>
                                <div class="col-sm-2 num">5</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="news-list">

                    <div class="right-title">Tin tức</div>
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col-sm-4 image">
                                    <img src="images/img1.jpeg" class="img-responsive" alt="hinh1">
                                </div>
                                <div class="col-sm-8 detail">
                                    <div class="title">
                                        CLB tiếng anh cho trẻ
                                    </div>
                                    <div class="time">
                                        <i class="fa fa-calendar"></i> 12/3/2014
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-sm-4 image">
                                    <img src="images/img1.jpeg" class="img-responsive" alt="hinh1">
                                </div>
                                <div class="col-sm-8 detail">
                                    <div class="title">
                                        Giảm học phí cho học sinh
                                    </div>
                                    <div class="time">
                                        <i class="fa fa-calendar"></i> 12/3/2014
                                    </div>
                                </div>
                            </div>
                        </li>

                </div>
                <div class="right-title">Fanpages</div>
                <div class="fanpage">


                </div>

            </div>
        </div>
    </div>
@endsection