
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Easy Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Sign Up :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{ url('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{{ url('assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{ url('assets/css/icon-font.min.css') }}" type='text/css' />
    <!-- //lined-icons -->
    <!-- chart -->
    <script src="{{ url('assets/js/Chart.js') }}"></script>
    <!-- //chart -->
    <!--animate-->
    <link href="{{ url('assets/css/animate.css') }}" rel="stylesheet" type="text/css" media="all">
    <script src="{{ url('assets/js/wow.min.js') }}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="{{ url('assets/js/jquery-1.10.2.min.js') }}"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h3>Biểu mẫu đăng kí học viên</h3>
						<p class="creating">Having hands on experience in creating innovative designs,I do offer design 
							solutions which harness.</p>
						<h5>Personal Information</h5>
						@if (count($errors)>0)
							<div class="alert alert-danger">
								<strong>Lỗi ! </strong>Vui lòng kiểm tra lại thông tin :
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
								</ul>
							</div>
						@endif ()
						<form method="post" action="{{route('admin.stu-register.postStuCreateAcc')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Họ và tên :</h4>
								</div>
								<div class="sign-up2">
									
										<input type="text" placeholder=" " name="name" required=" "/>
									
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Ngày sinh :</h4>
								</div>
								<div class="sign-up2">
										<br>
										<input type="date" placeholder=" " name="dob" required=" "/>
									
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Giới tính :</h4>

								</div>
								<div class="sign-up2">
										<br><br>
										
										<select name="sex">
										  <option value="Nam">Nam</option>
										  <option value="Nữ">Nữ</option>
										  <option value="Khác">Khác</option>
										  
										</select>
										<br><br>
										
								</div>
								<div class="clearfix"> </div>
							</div>

							<div class="sign-u">
								<div class="sign-up1">
									<h4>Địa chỉ hiện tại :</h4>

								</div>
								<div class="sign-up2">
										
										<input type="text" placeholder=" " name="address" required=" "/>
										
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Quê quán :</h4>

								</div>
								<div class="sign-up2">
										
										<input type="text" placeholder=" " name="hometown" required=" "/>
										
								</div>
								<div class="clearfix"> </div>
							</div>

							<div class="sign-u">
								<div class="sign-up1">
									<h4>Số điện thoại :</h4>

								</div>
								<div class="sign-up2">
										
										<input type="text" placeholder=" " name="phone" required=" "/>
										
								</div>
								<div class="clearfix"> </div>
							</div>

							

							<div class="sign-u">
								<div class="sign-up1">
									<h4>Trường đang theo học :</h4>

								</div>
								<div class="sign-up2">
										
										<input type="text" placeholder=" " name="school" required=" "/>
										
								</div>
								<div class="clearfix"> </div>
							</div>

							<div class="sign-u">
								<div class="sign-up1">
									<h4>Lớp :</h4>

								</div>
								<div class="sign-up2">
										
										<br><br>
										
										<select name="class_s">
										  <option value="1">1</option>
										  <option value="2">2</option>
										  <option value="3">3</option>
										  <option value="4">4</option>
										  <option value="5">5</option>
										  <option value="6">6</option>
										  <option value="7">7</option>
										  <option value="8">8</option>
										  <option value="9">9</option>
										  <option value="10">10</option>
										  <option value="11">11</option>
										 c
										</select>
										<br><br>
										
								</div>
								<div class="clearfix"> </div>
							</div>

							

							<div class="sign-u">
								<div class="sign-up1">
									<h4>Muốn đăng kí học gia sư :</h4>

								</div>
								<div class="sign-up2">
										<?php 
											$tutor = DB::select('select * from tutors');

										?>
										<br><br>
										<select name="tutor_id">
										  @foreach ($tutor as $a)
										  <?php $name = DB::select('select * from users where id = ?',[$a->user_id]); ?>
										  <option value="{{$a->id}}">{{$name[0]->name}}</option>
										  @endforeach
										</select>
										
								</div>
								<div class="clearfix"> </div>
							</div>

							<div class="sign-u">
								<div class="sign-up1">
									<h4>Đăng kí học môn :</h4>

								</div>
								<div class="sign-up2">
										
										<br><br>
										<?php
											$sub = DB::select('select * from subjects')
										?>
										<select name="subject_id">
											@foreach ($sub as $a)
										  <option value="{{$a->id}}">{{$a->name}}</option>
										  @endforeach
										</select>
										<br><br>
										
								</div>
								<div class="clearfix"> </div>
							</div>

							<!--<h6>Login Information</h6>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Password* :</h4>
								</div>
								<div class="sign-up2">
									
										<input type="password" placeholder=" " required=" "/>
									
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4>Confirm Password* :</h4>
								</div>
								<div class="sign-up2">
									
										<input type="password" placeholder=" " required=" "/>
									
								</div>
								<div class="clearfix"> </div>
							</div>-->
							<div class="sub_home">
								<div class="sub_home_left">
									
										<input type="submit" value="Submit">
									
								</div>
								<div class="sub_home_right">
									<p>Go Back to <a href="index.html">Home</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer>
			   <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
			</footer>
        <!--footer section end-->
	</section>
	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>