@extends('main.master')
@section('content')
    <div class="row">
        <div class="container">
            <div class="content col-sm-9">
                <h2 style="font-weight:  600;color:  green;margin-bottom: 100px;border-bottom:  2px solid green;padding-bottom: 28px;">Tin tức - News</h2>
                <ul>
                    @foreach($news as $n)
                    <li>
                        <div class="news-item-list">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="{{url($n->images)}}">
                                </div>
                                <div class="col-sm-9">
                                    <div class="news-item-title">
                                        {!! $n->title !!}
                                    </div>
                                    <span style="font-size: 10px;"><i class="fa fa-calendar"></i> {{$n->created_at}}</span>
                                    <div class="news-item-description">
                                        {!! $n->description !!}
                                    </div>
                                    <a class="btn btn-success" href="{{route('main.news.getNewsDetail', $n->id)}}">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <?php
                    $c = count(DB::select('CALL getAllNews()'));
                    $dem = 1;
                ?>
                <ul class="pagination">
                    @for ($i=0; $i< $c; $i+=$num)
                        @if ($i == $offset)
                            <li class="active"><a href="{{route('main.getNews', [$num, $num*$i])}}">{{$dem++}}</a></li>
                        @else
                            <li><a href="{{route('main.getNews', [$num, $num*$i])}}">{{$dem++}}</a></li>
                        @endif
                    @endfor
                </ul>
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