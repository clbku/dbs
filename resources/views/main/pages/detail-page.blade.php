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