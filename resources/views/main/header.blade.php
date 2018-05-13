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

                    <ul class="list-inline text-right" style="margin-bottom: 0;text-transform: uppercase;">
                        <li><a class="btn btn-secondary">Diễn đàn</a></li>

                        <li>
                            <div class="dropdown show">

                                    @if (Auth::check())
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{Auth::user()->name}}
                                    </a>
                                    @else
                                        <li><a class="btn btn-secondary" href="{{route('getLogin')}}">Đăng nhập</a></li>
                                    @endif
                            @if (Auth::check())
                                <?php
                                    $user = Auth::user();
                                ?>
                                @if ($user->type == "2")
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <a class="dropdown-item" href="{{route('getUserDetail')}}">Profile</a>
                                        <a class="dropdown-item" href="{{route('getLogout')}}">Đăng Xuất</a>
                                    </div>
                                @else
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <a class="dropdown-item" href="{{route('getUserDetail')}}">Profile</a>
                                        <a class="dropdown-item" href="{{route('admin.pages.index')}}">Quản Lý</a>
                                        <a class="dropdown-item" href="{{route('getLogout')}}">Đăng Xuất</a>
                                    </div>
                                @endif
                            @endif
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
                    <span style="text-transform:  uppercase;color: green;font-weight: 600;">Email</span>
                    <span>phoenix@gmail.com</span>
                </div>
                <div class="col-sm-4">
                        <span style="
    color: green;
    font-weight: 600;
    text-transform: uppercase;
">Hotline<br></span>
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
            <ul class="list-inline" style="text-transform: uppercase;">
                <li><a href="{{route('homepage')}}" class="btn btn-secondary">Trang Chủ</a></li>
                <li><a href="{{route('about')}}" class="btn btn-secondary">Giới thiệu</a></li>
                <li>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gia sư
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php 
                                $spec = DB::select('CALL getAllSpecialize()');
                            ?>
                            @foreach($spec as $a)
                            <a class="dropdown-item" href="{{route('main.tutor.getList',[$a->id])}}">{{$a->specialize}}</a>
                            @endforeach
                           
                        </div>
                    </div>


                </li>

                <li><a class="btn btn-secondary">Tin tức</a></li>
                <li><a class="btn btn-secondary" href={{route('getforum')}}>Forum</a></li>

                <li><a class="btn btn-secondary" href="{{route('main.getNews', [5, 0])}}">Tin tức</a></li>
               

                <li><a href="{{route('main.getContact')}}" class="btn btn-secondary">Liên hệ</a></li>
            </ul>
        </div>
    </div>

</div>