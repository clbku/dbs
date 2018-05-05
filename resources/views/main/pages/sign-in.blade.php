
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
					@if (\Illuminate\Support\Facades\Session::has('success'))
						<div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
					@endif
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Sign In to</span> <a href="index.html">Admin</a></p>
						</div>
						<div class="signin">
							<form action="{{route('postLogin')}}" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="log-input">
									<div class="log-input-left">
									   <input type="text" class="user" name='username' value="Yourname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="log-input">
									<div class="log-input-left">
									   <input type="password" class="lock" name='password' value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
									</div>
									<div class="clearfix"> </div>
								</div>
								<input type="submit" value="Login to your account">
							</form>
							<a href="{{route('getSignUp')}}">Sign Up</a>
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