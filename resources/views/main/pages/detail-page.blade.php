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
                <br>
                <hr>
                <br>
                <div class="comment-area" id="#comment">
                    <h2>Bình Luận</h2>
                    <br>
                    <div class="line"></div>
                    <div class="other-comment">
                        @foreach($comments as $c)
                        <div class="comment-item">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="{{url($c->avatar)}}" class="img-responsive">
                                </div>
                                <div class="col-sm-10">
                                    <p><strong>{{$c->name}}</strong> - <i class="fa fa-calendar-o"></i>{{$c->created_at}}</p>
                                    <p>{!! $c->comment !!}</p>
                                    @if(Auth::user()->id == $c->id)
                                    <a href="{{route('getDeleteComment', [$c->post_id, $c->cid])}}" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="fa fa-trash-o"></i>Delete</a>
                                    @endif
                                    <hr>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="your-comment">
                        <form style="width: 100%;" method="post" action="{{route('postComment', $news->id)}}">
                            <input name="_token" value="{{csrf_token()}}" type="hidden">
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea id="editor1" name="txtComment"></textarea>
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                            </div>
                            <input class="btn btn-success" type="submit" value="Bình Luận">
                        </form>

                    </div>
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