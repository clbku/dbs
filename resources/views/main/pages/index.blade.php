@extends('main.master')
@section('content')
    <div class="slide">

        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="pages/images/spin.svg" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
                <div data-p="225.00">
                    <img data-u="image" src="pages/images/001.jpg" />
                </div>
                <div data-p="225.00">
                    <img data-u="image" src="pages/images/002.jpg" />
                </div>
                <div data-p="225.00">
                    <img data-u="image" src="pages/images/003.jpg" />
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
                    <h1>What is Lorem Ipsum?</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="our-cources">
        <div class="container">
            <h1>Bạn cần gia sư cho môn học nào</h1>
            <div id="scrolling">
                <ul>
                    @foreach($courses as $c)
                        <li>
                            <div>
                                <div class="mo"></div>
                                <h2>{{$c->specialize}}</h2>
                                <a class="btn btn-success" href="#">Xem chi tiết</a>
                            </div>

                        </li>
                    @endforeach()

                </ul>
            </div>

        </div>
    </div>
    <div class="news">
        <div class="container">
            <h2>Tin tức - News</h2>
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

                        </div>
                    </div>
                    <?php $i++ ?>
                @if ($i%3 == 0)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection