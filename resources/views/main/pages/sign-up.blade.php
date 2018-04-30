
<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Sign In :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{url('assets/css/style.css')}}" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{{url('assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{url('assets/css/icon-font.min.css')}}" type='text/css' />
    <!-- //lined-icons -->
    <!-- chart -->
    <script src="{{url('assets/js/Chart.js')}}"></script>
    <!-- //chart -->
    <!--animate-->
    <link href="{{url('assets/css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
    <script src="{{url('assets/js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!----webfonts--->
    <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Meters graphs -->
    <script src="{{url('assets/js/jquery-1.10.2.min.js')}}"></script>
    <!-- Placed js at the end of the document so the pages load faster -->

</head>

<body class="sign-in-up">
<section>
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-in-form">
                <div class="sign-in-form-top">
                    <p><span>Sign Up</p>
                </div>
                <div class="signin">
                    <form action="{{route('postSignUp')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input class="form-control1" type="text" name="name" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input class="form-control1" type="date" name="dob" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control1" type="text" name="address" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label> <br>
                            <div class="radio-inline"><input type="radio" name="sex" value="1" checked> Nam </div>
                            <div class="radio-inline"><input type="radio" name="sex" value="0" > Nữ </div>
                            <div class="radio-inline"><input type="radio" name="sex" value="orther" > Khác </div>
                        </div>
                        <div class="form-group">
                            <label>Quê quán</label>
                            <input class="form-control1" type="text" name="hometown" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control1" type="text" name="phone" placeholder="Your name here" value="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control1" type="email" name="email" placeholder="Your name here" value="">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input class="form-control1" type="text" name="username" placeholder="Your name here" value="">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input class="form-control1" type="password" name="password" placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Mật khẩu</label>
                            <input class="form-control1" type="password" name="re-password" placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input class="form-control1" type="file" name="file">
                        </div>
                        <input type="submit" value="Create your account">
                    </form>
                    <a href="{{route('getLogin')}}">Sign In</a>
                </div>
            </div>
        </div>
    </div>
    <!--footer section start-->
    <footer>
        <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
    </footer>
    <!--footer section end-->
</section>

<script src="{{url('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('assets/js/scripts.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>