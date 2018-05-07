@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Biểu mẫu</h3>
                        <form class="col-sm-5">
                            <input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Mã đơn</th>
                                <th>Thời gian gửi</th>
                                <th>Người gửi</th>
                                <th>Loại biểu mẫu</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            @foreach ($tutorform as $a)

                            <tr>
                                <th scope="row"><?php echo($i); $i++;?></th>
                                <td>{{$a->created_at}}</td>
                                <td>{{$a->name}}</td>
                                <td>Đăng kí gia sư</td>
                                <td><a href="{{route('admin.tutorform-detail.getTutorFormDetail',$a->id)}}">Xem chi tiết</a></td>

                            </tr>
                            @endforeach


                            @foreach ($stuform as $b)

                            <tr>
                                <th scope="row"><?php echo($i); $i++;?></th>
                                <td>{{$b->created_at}}</td>
                                <td>{{$b->name}}</td>
                                <td>Đăng kí học viên</td>
                                <td><a href="{{route('admin.stuform-detail.getStuFormDetail',$b->id)}}">Xem chi tiết</a></td>

                            </tr>
                            @endforeach
                            @foreach ($idea as $b)
                                <tr>
                                    <th scope="row"><?php echo($i); $i++;?></th>
                                    <td>{{$b->created_at}}</td>
                                    <td>{{$b->name}}</td>
                                    <td>Ý kiến khách hàng</td>
                                    <td><a href="{{route('admin.ideaform-detail.getIdeaFormDetail',$b->id)}}">Xem chi tiết</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>

        </div>
@endsection