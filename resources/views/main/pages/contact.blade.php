@extends('main.master')
@section('content')
<div class="form">
    <div class="container">
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <h2 style="color:  green; border-bottom: 3px solid green;padding-bottom: 18px;"><i class="fa fa-pencil"></i>Chúng tôi ở</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15672.634396122683!2d106.8031835197754!3d10.87553915!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d8a5568c997f%3A0xdeac05f17a166e0c!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBCw6FjaCBLaG9hIFRQSENNIEPGoSBT4bufIDI!5e0!3m2!1svi!2s!4v1524550015992" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-sm-6">
                <form action="{{route('main.postContact')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h2 style="color:  green; border-bottom: 3px solid green;padding-bottom: 18px;"><i class="fa fa-pencil"></i>Ý kiến khách hàng</h2>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input class="form-control" type="text" name="txtName" value="" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>SĐT</label>
                        <input class="form-control" type="text" name="txtPhone" value="" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="txtEmail" value="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Ý kiến</label>
                        <textarea class="form-control" name="txtMessage" required></textarea>
                    </div>
                    <input class="form-control btn btn-success" type="submit" value="Gửi">
                </form>
            </div>
        </div>

    </div>

</div>
@endsection