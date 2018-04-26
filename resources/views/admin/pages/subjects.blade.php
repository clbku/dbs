@extends('admin.master')
@section('content')
		<div id="page-wrapper">
            <div class="graphs">
                
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Danh sách môn học</h3>
                        <form class="col-sm-5" method="post" action="{{route('admin.subjects.postFind')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input class="sb-search-input" type="text" name="data" value="" placeholder="Nhập tên môn học cần tìm kiếm">
                            <input class="sb-icon-search" type="submit" name="submit" value="Search">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Thư mục</th>
                                <th>Ngày thêm</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subject as $a)
                            <tr>
                                <th scope="row">{{$a->id}}</th>

                                <td>{{$a->subjectName}}</td>
                                <td>{{$a->typeName}}</td>
                                <td>{{$a->created_at}}</td>

                                <td>
                                    @if ($a->state==1)
                                        {{'Còn mở'}}
                                    @else {{'Đã đóng'}}
                                    @endif
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