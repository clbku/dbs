@extends('main.master')
@section('content')
    <div class="slide">

        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="pages/images/spin.svg" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
                <div data-p="225.00" style="position: absolute;">
                    <img data-u="image" src="pages/images/001.jpg" />
                    <div data-events="auto" data-display="block" style="z-index: 1;position: relative;">
                        <div data-events="auto" data-display="block" style="z-index: 1;color: white;text-transform:  uppercase;font-size:  34px;position: absolute;top: 200px;left:  100px;"><span data-events="auto" data-display="inline" style="z-index: 1;">Đánh thức tiềm năng</span></div>
                        <div data-events="auto" data-display="block" style="z-index: 1;position:  absolute;color:  green;top: 250px;font-size: 50px;text-transform: uppercase;left: 100px;"><span data-events="auto" data-display="inline" style="z-index: 1;">Trong con của bạn</span></div>
                        <div data-events="auto" data-display="block" style="z-index: 1;position:  absolute;top: 331px;font-size:  30px;width:  50%;left:  100px;color:  white;"><span data-events="auto" data-display="inline" style="z-index: 1;">Chúng tôi biết cách đánh thức tiềm năng trong con của bạn như thế nào</span></div>
                        <a class="btn btn-info" data-events="auto" data-display="inline-block" style="z-index: 1;position:  absolute;top: 422px;left: 100px;">Đăng ký ngay</a>
                    </div>
                </div>
                <div data-p="225.00">
                    <img data-u="image" src="pages/images/002.jpg" />
                    <div data-events="auto" data-display="block" style="z-index: 2; position: relative;">
                        <div data-events="auto" data-display="block" style="z-index: 3; position: absolute; color: green; top: 200px; font-size: 50px; text-transform: uppercase; left: 175px;">Đội ngũ gia sư chuyên môn cao</div>
                        <div data-events="auto" data-display="block" style="z-index: 2;position: absolute;top: 300px;font-size: 30px;width: 50%;left: 273px;color: white;text-align:  center;"><span data-events="auto" data-display="inline" style="z-index: 2;">Chúng tôi có đội ngũ gia sư uy tín, chuyên môn nghiệp vụ nhiều kinh nghiệm</span></div>
                        <a class="btn btn-info" data-events="auto" data-display="block" style="z-index: 2;position: absolute;top: 422px;left: 489px;">Tìm hiểu ngay</a>
                        <a class="btn btn-info" data-events="auto" data-display="block" style="z-index: 2;position: absolute;top: 422px;left: 647px;">Xem đội ngũ</a>
                    </div>
                </div>
                <div data-p="225.00">
                    <img data-u="image" src="pages/images/003.jpg" />
                    <div data-events="auto" data-display="block" style="z-index: 1;position: relative;">
                        <span data-events="auto" data-display="inline" style="z-index: 1;position:  absolute;right: 100px;font-size:  50px;color: green;text-transform: uppercase;top: 200px;">Luôn luôn hài lòng</span>
                        <span data-events="auto" data-display="inline" style="z-index: 1;position: absolute;right: 100px;text-align:  right;color:  white;top: 277px;font-size:  30px;">Không chỉ bạn hài lòng với chúng tôi,<br data-events="auto" data-display="inline" style="z-index: 1;"> ngay cả những đứa trẻ cũng sẽ như vậy</span>
                        <a class="btn btn-info" data-events="auto" data-display="inline-block" style="z-index: 1;position:  absolute;right: 100px;top: 382px;">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
        </div>
        <script type="text/javascript">jssor_1_slider_init();</script>
    </div>
    <div class="container">
        <div class="our-link text-center">
            <div class="row">
                <div class="col-sm-4">
                    <div class="container-fluid bg-color-green">
                        <div class="row">
                            <div class="icon col-sm-4">
                                <i class="fa fa-cloud"></i>
                            </div>
                            <div class="col-sm-8">
                                <h2><strong>Đăng ký online</strong></h2>
                                <p>Gửi yêu cầu của bạn qua phiếu đăng ký online cho chúng tôi ...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="icon col-sm-4">
                                <i class="fa fa-cloud"></i>
                            </div>
                            <div class="col-sm-8">
                                <h2><strong>Ký hợp đồng</strong></h2>
                                <p>Chúng tôi sẽ ký hợp đồng và cam kết kết quả cho quá trình giảng dạy...</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="container-fluid bg-color-green">
                        <div class="row">
                            <div class="icon col-sm-4">
                                <i class="fa fa-cloud"></i>
                            </div>
                            <div class="col-sm-8">
                                <h2><strong>Sự hiệu quả</strong></h2>

                                <p>Bạn sẽ nhận thấy sự hiệu quả rõ rệt sau một thời gian ngắn học tập...</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/z7ZDkZQzRUw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="col-sm-6">
                    <h1 style="
                            border-bottom: 3px solid green;
                            padding-bottom: 17px;
                        ">What is Lorem Ipsum?</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <a class="btn btn-success" href="{{route('about')}}">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    <div class="our-cources">
        <img src="http://localhost/dbs/public/pages/images/matmed.jpg" style="
    width:  100%;
    padding:  0;
    margin:  0;
    position:  absolute;
    top: 0;
    left:  0;
">
        <div class="grey" style="
    background: #808080bd;
    position:  absolute;
    top: 0;
    left:  0;
    width:  100%;
    height: 1000px;
    z-index:  2;
"></div>
        <div class="container" style="
    position:  absolute;
    z-index: 3;
    width:  100%;
">
            <h1 style="
    text-align:  center;
    text-transform:  uppercase;
    font-size: 38px;
    font-weight: 600;
    color:  green;
    width:  100%;
    margin: auto;
">Bạn cần gia sư cho môn học nào</h1>
            <div id="scrolling">
                <ul style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); transform: translate3d(0px, 0px, 0px);">
                    @foreach($courses as $c)
                    <li>
                        <div>
                            <div class="mo"></div>
                            <h2>{{$c->specialize}}</h2>
                            <a class="btn btn-success" href="#">Xem chi tiết</a>
                            <a class="btn btn-success" href="{{route('main.tutor.getList',[$c->id])}}">Xem chi tiết</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
    <div class="news">
        <div class="container">
            <h2 style="text-align:  center;font-weight:  600;color:  green;margin-bottom: 100px;">Tin tức - News</h2>
            <?php $i = 0?>
            @foreach($news as $n)
                @if ($i%3 == 0)
                <div class="row">
                @endif
                    <div class="col-sm-4">
                        <div class="new-item">
                            <div class="new-img">
                                <img src="{{$n->images}}">
                            </div>
                            <div class="black"></div>
                            <div class="line">
                            </div>
                            <span class="title">{!! $n->title !!}</span>
                            <span class="description">
                                {!! $n->description !!}
                            </span>
                            <a href="{{route('main.news.getNewsDetail', $n->id)}}" class="btn btn-success" >Xem chi tiết</a>
                        </div>
                    </div>
                    <?php $i++ ?>
                @if ($i%3 == 0 || $i >= count($news))
                    </div>
                @endif
            @endforeach
            <a href="{{route('main.getNews', [5, 0])}}" class="btn btn-success" style="margin-top: 30px;">Xem thêm <i class="fa fa-play-circle"></i></a>

        </div>
    </div>
@endsection