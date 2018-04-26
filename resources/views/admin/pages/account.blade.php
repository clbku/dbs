
@extends('admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">

            <div class="content-box-wrapper">
                <div class="row">
                    <h3 id="h3" class="col-sm-7">Danh sách Tài khoản</h3>
                    <form class="col-sm-5" method="post" active="{{route('admin.account.postFind')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input class="sb-search-input" placeholder="Nhập tên tài khoản cần tìm kiếm" type="text" name="data" value="">
                        <input class="sb-icon-search" type="submit" value="Search">
                        
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Người dùng</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($account as $a)
                        <tr>
                            <th scope="row">{{$a->id}}</th>
                            <td>{{$a->username}}</td>
                            <td>{{$a->password}}</td>
                            <?php
                                $a_name = DB::select('CALL getUserNameByID(?)', [$a->user_id]);
                            ?>
                            <td><a href="{{route('admin.pages.profile', $a->user_id)}}">{{$a_name[0]->name}}<a></td>
                            <td>
                                @if ($a->state == 0)
                                    {{"Bị khóa"}}
                                @else
                                    {{"Hoạt động"}}
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.account.getLock', $a->id)}}">
                                    @if ($a->state == 0)
                                        <i class="fa fa-unlock"></i></a>
                                    @else
                                        <i class="fa fa-lock"></i></a>
                                    @endif
                                <a><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div>
        </div>
    </div>
@endsection