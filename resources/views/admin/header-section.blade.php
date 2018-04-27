<div class="header-section">

    <!--toggle button start-->
    <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->

    <!--notification menu start -->
    <div class="menu-right">
        <div class="user-panel-top">
            <div class="profile_details_left">
                <ul class="nofitications-dropdown">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>

                        <ul class="dropdown-menu">
                            <li>
                                <div class="notification_header">
                                    <h3>Có 3 bài viết mới được đăng</h3>
                                </div>
                            </li>
                            <?php
                                $post = DB::select('select * from posts where new = 1');
                            ?>
                            @foreach ($post as $a)
                            <li><a href="{{route('admin.post.list')}}">
                                    <div class="user_img"><img src="assets/images/1.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>{{$a->title}}</p>
                                        <p><span>{{$a->created_at}}</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                            </li>
                            @endforeach
                            
                                <div class="notification_bottom">
                                    <a href="{{route('admin.post.list')}}">See all messages</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="login_box" id="loginContainer">
                        <div class="search-box">
                            <div id="sb-search" class="sb-search">
                                <form>
                                    <input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search"> </span>
                                </form>
                            </div>
                        </div>
                        <!-- search-scripts -->
                        <script src="assets/js/classie.js"></script>
                        <script src="aseets/js/uisearch.js"></script>
                        <script>
                            new UISearch( document.getElementById( 'sb-search' ) );
                        </script>
                        <!-- //search-scripts -->
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="notification_header">
                                    <h3>Có 3 biểu mẫu chưa được xác nhận</h3>
                                </div>
                            </li>
                            <?php 
                                $tutor = DB::select('select * from tutor_registers');
                                $student = DB::select('select * from study_registers');
                            ?>
                            @foreach($tutor as $a)
                            <li><a href="{{route('admin.tutorform-detail.getTutorFormDetail',[$a->id])}}">

                                    <div class="user_img"><img src="assets/images/1.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>{{$a->name}} đăng kí làm gia sư</p>
                                        <p><span>{{$a->created_at}}</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                            </li>
                            @endforeach
                            @foreach($student as $b)
                            <li class="odd"><a href="{{route('admin.stuform-detail.getStuFormDetail',[$b->id])}}">
                                    <div class="user_img"><img src="assets/images/1.png" alt=""></div>
                                    <div class="notification_desc">
                                        <p>{{$b->name}} Đăng kí học</p>
                                        <p><span>{{$b->created_at}}</span></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                            </li>
                            @endforeach
                            
                                <div class="notification_bottom">
                                    <a href="{{route('admin.form.getForm')}}">See all notification</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                        
                    
                </ul>
            </div>
            <div class="profile_details">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <span style="background:url(assets/images/1.jpg) no-repeat center"> </span>
                                <div class="user-name">
                                    <p>Michael<span>Administrator</span></p>
                                </div>
                                <i class="lnr lnr-chevron-down"></i>
                                <i class="lnr lnr-chevron-up"></i>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <!--<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> -->
                            <li> <a href="{{route('admin.pages.profile', 1)}}"><i class="fa fa-user"></i>Profile</a> </li>
                            <li> <a href="sign-up.html"><i class="fa fa-sign-out"></i> Logout</a> </li>
                        </ul>
                    </li>
                    <div class="clearfix"> </div>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!--notification menu end -->
</div>