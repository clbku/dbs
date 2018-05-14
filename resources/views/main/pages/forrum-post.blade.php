@extends('main.master')
@section('content')
    <div class="row">
        <div class="container">
            <div class="content">
                <p class="fa fa-home"> Forum </p>
                <hr>
                <div class="post-title">
                    <h2>{!! $data->title !!}</h2>
                    <p><i class="fa fa-square"></i>{!! $data->description  !!}</p>
                </div>
                <div class="post-content">
                    <div class="row">
                        <div class="forum-post-item-avatar col-sm-2">
                            <img src="{{url($data->avatar)}}">
                        </div>
                        <div class="col-sm-10">
                            <div class="forum-post-item-author">
                                <div class="row">
                                    <div class="col-sm-8 name">
                                        {{$data->name}} - {{$data->username}}
                                    </div>
                                    <div class="col-sm-4 time">
                                        {{$data->created_at}}
                                    </div>
                                </div>
                            </div>
                            <div class="forum-post-item-content">
                                <p>{!! $data->content !!}</p>
                                @if($data->images)
                                    <label>Hình ảnh: </label> <br>
                                    <img style="width: 200px;" src="{{url($data->images)}}">
                                @endif
                                @if($data->files)
                                <label>File : </label> <br>
                                <a href="{{url($data->file)}}">download</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    @foreach($comments as $c)
                    <div class="row">
                        <div class="forum-post-item-avatar col-sm-2">
                            <img src="{{url($c->avatar)}}">
                        </div>
                        <div class="col-sm-10">
                            <div class="forum-post-item-author">
                                <div class="row">
                                    <div class="col-sm-8 name">
                                        {{$c->name}} - {{$c->username}}
                                    </div>
                                    <div class="col-sm-4 time">
                                        {{$c->created_at}}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="forum-post-item-content">
                                {!! $c->comment !!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
            <form method="post" action="{{route('main.forum.addComment', $data->pid)}}">
                {!! csrf_field() !!}
                <label>Trả lời câu hỏi này</label>
                <textarea id="box" name="txtComment">
                </textarea>
                <script>
                    CKEDITOR.replace( 'box' );
                </script>
                <br>
                <input type="submit" class="btn btn-success" value="Gửi">
            </form>
        </div>
    </div>
@endsection