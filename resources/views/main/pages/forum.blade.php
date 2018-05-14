@extends('main.master')
@section('content')
	<div class="row">
        <div class="container">
            <div class="content">
                <p class="fa fa-home"> Forum </p>
                @if (\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                @endif
                <div class="question-area" >

                    <table>
                        <tr>
                            <th colspan="5">Khu vực chia sẻ, trao đổi</th>
                        </tr>

                        <tr>
                            <th>Chủ đề</th>
                            <th>Người đăng</th>
                            <th>Thời gian</th>
                            <th>Số trả lời</th>
                            <th>Trả lời giần nhất</th>
                        </tr>
                        @foreach($data as $p)
                            @if ($p->type == 1)
                                <tr>
                                    <td><a href="{{route('admin.forum.getForumPost', $p->pid)}}">{{$p->title}}</a></td>
                                    <td><a>{{$p->name}}</a></td>
                                    <td>{{$p->created_at}}</td>
                                    <td>{{$p->num_reply}}</td>
                                    <td><span style="color: green"> {{$p->lastname}} </span>({{$p->lasttime}}): {!! $p->lastcomment !!}</td>

                                </tr>
                            @endif
                        @endforeach

                    </table>
                    <br>
                    <a class="btn btn-success" href="{{route('main.forum.addPost')}}">Thêm bài viết</a>
                </div>
                <hr>
                <div class="exercise-area">
                    <div class="question-area" >

                        <table>
                            <tr>
                                <th colspan="5">Khu vực tài liệu học tập</th>
                            </tr>

                            <tr>
                                <th>Chủ đề</th>
                                <th>Người đăng</th>
                                <th>Thời gian</th>
                                <th>Số trả lời</th>
                                <th>Trả lời giần nhất</th>
                            </tr>
                            @foreach($data as $p)
                                @if ($p->type == 2)
                                    <tr>
                                        <td><a href="{{route('admin.forum.getForumPost', $p->pid)}}">{{$p->title}}</a></td>
                                        <td><a>{{$p->author_id}}</a></td>
                                        <td>{{$p->created_at}}</td>
                                        <td>{{$p->num_reply}}</td>
                                        <td><span style="color: green"> {{$p->lastname}} </span>({{$p->lasttime}}): {{$p->lastcomment}}</td>

                                    </tr>
                                @endif
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection