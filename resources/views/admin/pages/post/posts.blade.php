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
                                    <td>{!! $p->description !!}</td>
                                    <?php
                                        $user = DB::select('select u.name, u.id
                                                            from users as u
                                                            where u.id = ?
                                                           ', [$p->author_id])
                                    ?>
                                    {{--<td><a href="form-detail.html"></a></td>--}}
                                    <td width="10%"><a href="{{route('admin.pages.profile', ['user', $user[0]->id])}}">{{$user[0]->name}}</a></td>
                                    <td width="7%">
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
                                @if ($p->type != 0)
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
                                        <td  width="10%"><a href="{{route('admin.pages.profile', ['user', $name[0]->id])}}">{{$name[0]->name}}</a></td>
                                        <td width="7%">
                                            <a onclick="return false;" id="reply-{{$p->id}}"><i class="fa fa-reply"></i></a>
                                            <a href="{{route('admin.post.getDelete', $p->id)}}"><i class="fa fa-times"></i></a>
                                            <a href="{{route('admin.forum.getForumPost', $p->id)}}"><i class="fa fa-sign-out"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="add-{{$p->id}} hidden">
                                       <td colspan="6">
                                           <form action="{{route('admin.post.postReply', $p->id)}}" method="post">
                                               {!! csrf_field() !!}
                                               <textarea id="editor-{{$p->id}}" name="txtComment"></textarea>
                                               <script>
                                                   CKEDITOR.replace("editor-{{$p->id}}");
                                               </script>
                                               <br>
                                               <input type="submit" value="Xác nhận" class="btn btn-success">
                                           </form>
                                       </td>
                                    </tr>
                                @endif
                                <script>
                                    $("#reply-{{$p->id}}").click(function () {
                                        $('.add-{{$p->id}}').toggleClass('hidden');
                                    })
                                </script>
                            @endforeach
                            </tbody>

                        </table>

                    </div><!-- /.table-responsive -->
                </div>
                <div class="content-box-wrapper ">
                    <h3 id="h3" class="">Thêm bài viết</h3>
                    <form action="{{route('postForumPost')}}" method="post" enctype="multipart/form-data" class="add hidden">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Chọn khu vực</label>
                            <select class="form-control" name="type">
                                <option value="1">Khu vực chia sẻ, trao đổi</option>
                                <option value="2">Khu vực tài liệu học tập</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" type="text" name="txtTitle" placeholder="Your name here" value="Bill Gates">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" class="form-control" name="txtDescription">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="editor1" name="txtContent"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="custom-file-input" name="image">
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" class="custom-file-input" name="file">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Đăng">

                        </div>
                    </form>
                    <label class="btn btn-success" id="addbtn">Thêm bài viết</label>
                </div>
                <br>

                <script>
                    $('#addbtn').click(function () {
                        $('.add').toggleClass('hidden');
                    })
                </script>
            </div>

        </div>
@endsection