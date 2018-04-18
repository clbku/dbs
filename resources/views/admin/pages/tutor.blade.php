@extends('admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="graphs">
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách gia sư</h3>
                        <form class="col-sm-5" method="post" action="{{route('admin.tutor')}}">
                            <div class="row">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="col-sm-7" type="text" value="" placeholder="what you want to find?" name="txtFind">
                                <input class="col-sm-3 col-sm-offset-1 btn btn-default" type="submit" value="Tìm Kiếm" name="btnSearch">
                            </div>

                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>T^^en gia sư</th>
                                <th>Chuy^^en m^^on</th>
                                <th>Th``anh tích</th>
                                <th>Đi^^ểm đánh giá</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tutor as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <?php
                                //$name = DB::select('select name from users where id =' . $item->user_id ) // cach 1
                                    $name = DB::select('select name from users where id = ?', [$item->user_id]); // cach 2
                                    //var_dump($name);
                                ?>
                                <td><a href="{{route('admin.pages.profile', $item->user_id )}}">{{ $name[0]->name  }}</a></td>
                                <td>{{$item->specialize }}</td>
                                <td>{{$item->achievements }}</td>
                                <td>{{$item->point}}</td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
        <!--footer section start-->
@endsection