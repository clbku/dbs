@extends('admin.master')
@section('content')      
        <div id="page-wrapper">
            <div class="graphs">
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Đăng tin tức</h3>

                    </div>

                    <form action="#" style="width: 100%;">

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="Bill Gates">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="editor1"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="forms.html" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <h3 id="h3" class="col-sm-7">Đăng Bài tập</h3>

                    </div>

                    <form action="#" style="width: 100%;" id="post-question">

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control1" type="text" name="txtName" placeholder="Your name here" value="Bill Gates">
                        </div>
                        <div class="form-group">
                            <label>Chọn môn</label>
                            <select class="form-control1">
                                <option>Toán</option>
                                <option>Lý</option>
                                <option>Hóa</option>
                                <option>Anh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Câu 1</label>
                            <select class="">
                                <option>Dễ</option>
                                <option>Trung Bình</option>
                                <option>Khó</option>
                            </select>
                            <input class="form-control1" type="text" name="txtQ1" placeholder="Mã câu hỏi" value="">
                        </div>
                        <script>
                            function add() {
                                var $num = $('form#post-question').children().length - 4;
                                $('#add-question').before('<div class="form-group">' +
                                    '<label>Câu' + $num+ '</label>' +
                                    '<select class="">' +
                                    '<option>Dễ</option>' +
                                    '<option>Trung Bình</option>' +
                                    '<option>Khó</option>' +
                                    '</select>' +
                                    '<input class="form-control1" type="text" name="txtQ1" placeholder="Mã câu hỏi" value="">' +
                                    '</div>');

                                return false;
                            }
                        </script>
                        <a class="btn btn-default" id="add-question" onclick="add()">Thêm câu hỏi</a>
                        <div class="form-group">
                            <input class="btn btn-default" type="submit" value="Duyệt">
                            <a href="forms.html" class="btn btn-danger">Quay lại</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
@endsection