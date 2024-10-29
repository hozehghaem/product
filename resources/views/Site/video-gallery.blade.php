@extends('master')
@section('style')
@endsection
@section('main')
    <style>
        .video-container {
            position: relative;
            width: 100%;
            max-width: 640px;
            margin: 0 auto;
        }
        .video-cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ asset('site/img/blog-image/1.jpg') }}') no-repeat center center;
            background-size: cover;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .video-cover::before {
            background:url('{{ asset('site/img/blog-image/1.jpg') }}') no-repeat center center;
            content: "▶";
            font-size: 24px;
            color: black;
        }
        video {
            display: none;
            width: 100%;
        }
        video.playing {
            display: block;
        }
    </style>
    <body>
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>گالری ویدئوها</h2>
                <p>ویدئوها دوره ها، نشست ها و سخنرانی ها</p>

            </div>
        </div>
    </div>
    <section class="gallery-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="portfolio-filter pt-5 pb-5">
                        <li data-filter="*" class="active">همه</li>
                        <li data-filter=".mahdaviat">مهدویت</li>
                        <li data-filter=".family">خانواده</li>
                        <li data-filter=".hijab">حجاب</li>
                        <li data-filter=".media">رسانه</li>
                    </ul>
                </div>
                <!-- end col-lg-12 -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="generic-portfolio-list row">
                        <div class="video-box col-lg-4 p-1">
                            <img src="{{asset('/site/img/blog-image/1.jpg')}}" class="main-image" alt="image">

                            <a href="{{asset('/site/video/1.mp4')}}" class="video-btn popup-youtube">
                                <i class="bx bx-md bx-play"></i>
                            </a>
                        </div>
                        <div class="video-box col-lg-4 p-1">
                            <img src="{{asset('/site/img/blog-image/1.jpg')}}" class="main-image" alt="image">

                            <a href="{{asset('/site/video/1.mp4')}}" class="video-btn popup-youtube">
                                <i class="bx bx-md bx-play"></i>
                            </a>
                        </div>
                        <div class="video-box col-lg-4 p-1">
                            <img src="{{asset('/site/img/blog-image/1.jpg')}}" class="main-image" alt="image">

                            <a href="{{asset('/site/video/1.mp4')}}" class="video-btn popup-youtube">
                                <i class="bx bx-md bx-play"></i>
                            </a>
                        </div>
                        <div class="video-box col-lg-4 p-1">
                            <img src="{{asset('/site/img/blog-image/1.jpg')}}" class="main-image" alt="image">

                            <a href="{{asset('/site/video/1.mp4')}}" class="video-btn popup-youtube">
                                <i class="bx bx-md bx-play"></i>
                            </a>
                        </div>
                        <div class="video-box col-lg-4 p-1">
                            <img src="{{asset('/site/img/blog-image/1.jpg')}}" class="main-image" alt="image">

                            <a href="{{asset('/site/video/1.mp4')}}" class="video-btn popup-youtube">
                                <i class="bx bx-md bx-play"></i>
                            </a>
                        </div>
                        <div class="video-box col-lg-4 p-1">
                            <img src="{{asset('/site/img/blog-image/1.jpg')}}" class="main-image" alt="image">

                            <a href="{{asset('/site/video/1.mp4')}}" class="video-btn popup-youtube">
                                <i class="bx bx-md bx-play"></i>
                            </a>
                        </div>

                        <!-- end generic-portfolio-item -->
                    </div>
                    <!-- end portfolio-list -->
                </div>
                <!-- end col-lg-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    </body>



@endsection

