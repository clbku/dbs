<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" >
                    <ul class="list-inline text-left">
                        <li><i class="fa fa-twitter"></i></li>
                        <li><i class="fa fa-facebook-square"></i></li>
                        <li><i class="fa fa-google-plus"></i></li>
                        <li><i class="fa fa-youtube-square"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                    </ul>
                </div>
                <div class="col-sm-6">

                    <ul class="list-inline text-right">
                        <li><a class="btn btn-secondary">Diễn đàn</a></li>
                        <li><a class="btn btn-secondary">Đăng nhập</a></li>
                        <li>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lục Nghi
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Quản lý</a>
                                </div>
                            </div>


                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="header-logo">
                        <img src="{{url('pages/images/logo1.png')}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-4">
                        <span>Email</span>
                        <span>phoenix@gmail.com</span>
                    </div>
                    <div class="col-sm-4">
                        <span>Hotline</span>
                        <span>0987.654.321</span>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('main.register')}}" class="btn btn-success">Đăng ký online <i class="fa fa-play-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{route('homepage')}}" class="btn btn-secondary">Trang Chủ</a></li>
                <li><a href="{{route('about')}}" class="btn btn-secondary">Giới thiệu</a></li>
                <li>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gia sư
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Gia sư cấp 1</a>
                            <a class="dropdown-item" href="#">Gia sư cấp 2</a>
                            <a class="dropdown-item" href="#">Gia sư cấp 3</a>
                            <a class="dropdown-item" href="#">Gia sư Tiếng anh</a>
                            <a class="dropdown-item" href="#">Luyện thi đại học</a>
                            <a class="dropdown-item" href="#">Gia sư tin học văn phòng</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>


                </li>
                <li><a class="btn btn-secondary">Dịch vụ</a></li>
                <li><a class="btn btn-secondary">Tin tức</a></li>
                <li><a href="{{route('main.getContact')}}" class="btn btn-secondary">Liên hệ</a></li>
            </ul>
        </div>
    </div>

</div>