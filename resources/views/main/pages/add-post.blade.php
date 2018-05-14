@extends('main.master')
@section('content')
    <div class="row">
        <div class="container">
            <div class="content">
                <p class="fa fa-home"> Forum </p>
                <br>
                <form action="{{route('postAddForumPost', 0)}}" method="post" enctype="multipart/form-data" style="width: 100%;">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                        <input class="btn btn-default" type="submit" value="Duyệt">
                        <a href="forms.html" class="btn btn-danger">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection