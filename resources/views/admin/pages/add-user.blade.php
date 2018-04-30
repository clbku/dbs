@extends('admin.master')
@section('content')
	<div id="page-wrapper">
		<div class="graphs">
			<form action="{{route('admin.user.postAdd')}}" method="post" style="width: 100%;" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-3">
						<row>
							<div class="content-box-wrapper position-center" style="width: 100%;">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
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
							</div>
						</row>
					</div>
					<div class="col-sm-9">
						<div class="content-box-wrapper">
							<!--info -->
							<h3 id="h3">Thông tin cơ bản</h3>


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
							<div class="form-group">
								<label>Loại tài khoản</label> <br>
								<div class="radio-inline"><input type="radio" name="type" value="0" checked> Gia sư </div>
								<div class="radio-inline"><input type="radio" name="type" value="1" > Admin </div>
							</div>

							<!-- end info -->
						</div>
					</div>
				</div>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
	<!--footer section start-->
@endsection