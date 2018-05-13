@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                <div class="content-box-wrapper">
                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                    @endif
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách tin tức</h3>
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
                                <th>#</th>
                                <th>Thời gian</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Người đăng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post as $p)
                                @if ($p->type == 0)
                                <tr>
                                    <th scope="row">{{$p->id}}</th>
                                    <td>{{$p->created_at}}</td>
                                    <td>{{$p->title}}</td>
                                    <td>{!! $p->content !!}</td>
                                    <?php
                                        $user = DB::select('select u.name, u.id
                                                            from users as u
                                                            where u.id = ?
                                                           ', [$p->author_id])
                                    ?>
                                    {{--<td><a href="form-detail.html"></a></td>--}}
                                    <td><a href="{{route('admin.pages.profile', ['user', $user[0]->id])}}">{{$user[0]->name}}</a></td>
                                    <td>
                                        <a href="{{route('admin.post.getEdit', [0, $p->id])}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.post.getDelete', $p->id)}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                        <a href="{{route('admin.post.getAdd', 0)}}" class="btn btn-success">Thêm Tin tức</a>
                    </div><!-- /.table-responsive -->
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách Bài viết</h3>
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
                                <th>#</th>
                                <th>Thời gian</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Người đăng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post as $p)
                                @if ($p->type == 1)
                                    <tr>
                                        <th scope="row">{{$p->id}}</th>
                                        <td>{{$p->created_at}}</td>
                                        <td>{{$p->title}}</td>
                                        <td>{!! $p->content !!}</td>
                                        <?php
                                        $name = DB::select('select u.name, u.id
                                                        from users as u
                                                        where u.id = ?
                                                       ', [$p->author_id])
                                        ?>
                                        {{--<td><a href="form-detail.html"></a></td>--}}
                                        <td><a href="{{route('admin.pages.profile', ['user', $name[0]->id])}}">{{$name[0]->name}}</a></td>
                                        <td>
                                            <a href="{{route('admin.post.getEdit', [1, $p->id])}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.post.getDelete', $p->id)}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div><!-- /.table-responsive -->
                </div>
            </div>

        </div>
@endsection