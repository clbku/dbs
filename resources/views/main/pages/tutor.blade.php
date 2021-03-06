@extends('main.master')
@section('content')
    <div class="row">
        <div class="container">
            <div class="content col-sm-9">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="content-title">
                            Danh sách gia sư
                        </div>

                        <div class="content-calender">
                            <i class="fa fa-calendar"></i>12/3/2014
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="" method="">
                        <!--<input type="hidden" name="_token" value="{{csrf_token()}}">-->
                            <input type="input" value="" placeholder="anything">
                            <input type="submit" value="Tìm">
                        </form>
                    </div>
                </div>

                <hr>
                <br>
                <div class="content-main">
                    <?php $i = 0 ?>
                    @foreach($tutor as $t)
                        @if ($i % 4 == 0)
                            <div class="row">
                        @endif
                        <?php $i++; ?>
                        <div class="col-sm-4">
                            <div class="tutor-item">
                                <div class="tutor-avatar">
                                    <img src="{{$t->avatar}}" class="img-responsive" alt="gates">
                                </div>
                                <div class="tutor-name">
                                    {{$t->name}}
                                </div>
                                <div class="tutor-specializes">
                                    <span>Chuyên môn: </span>{{$t->specialize}}
                                </div>
                                <div class="tutor-achievements">
                                    <span>Thành tích: </span> {{$t->achievement}}
                                </div>
                                <div class="tutor-point">
                                    <span>Đánh giá: </span>{{$t->point}}/10
                                </div>
                                <a class="btn btn-success" style="margin: 10px; " href="{{route('main.tutor.getTutorDetail', $t->user_id)}}">Chi tiết <i class="fa fa-play-circle"></i></a>
                            </div>
                        </div>
                        @if ($i % 4 == 0 || $i == count($tutor))
                            </div>
                        @endif
                    @endforeach
                </div>

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