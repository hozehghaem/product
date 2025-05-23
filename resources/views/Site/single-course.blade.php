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
            background: url('{{ asset('site/img/blog-image/1.jpg') }}') no-repeat center center;
            content: "▶";
            font-size: 48px;
            color: black;
        }

        video {
            display: none;
            width: 100%;
        }

        video.playing {
            display: block;
            max-width: 100%;
            object-fit: fill;
        }
    </style>
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{$posts->title}}</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <!-- Service details -->
    <div class="service-details">
        <div class="container my-5" style="border: 1px solid rgba(69,69,69,0.2); border-radius: 16px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.1);">
            <div class="container mt-5">
                {{--                <div class="row " style="justify-content: center">--}}
                {{--                    <div class="col-md-8" >--}}
                {{--                        <div class="video-box">--}}
                {{--                            <img src="{{asset('/site/img/blog-image/1.jpg')}}" class="main-image" alt="image">--}}
                {{--                            <a href="{{asset('/site/video/1.mp4')}}" class="video-btn popup-youtube">--}}
                {{--                                <i class="bx bx-play"></i>--}}
                {{--                            </a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="card-image m-3 text-center">
                    <img src="{{asset($posts->image)}}" alt="{{$posts->title}}" class="single-image">

                    @if($posts->file)
                        <video controls preload="metadata" poster="{{asset($posts->image)}}" id="player"
                               style="width: 100%">
                            <source src="{{asset($posts->file)}}" type="video/mp4"/>
                        </video>
                    @elseif($posts->aparat)
                        {!! $posts->aparat !!}
                    @endif
                </div>
                <div class="service-details-content">

                    <p>{!! $posts->description !!}</p>

{{--                    <div class="service-details-info" style="margin-bottom: 100px">--}}
{{--                        <div class="single-info-box">--}}
{{--                            <h4>فعالیت</h4>--}}
{{--                            <span>مهد ضحی</span>--}}
{{--                        </div>--}}

{{--                        <div class="single-info-box">--}}
{{--                            <h4>دسته بندی</h4>--}}
{{--                            <span>کودکانه</span>--}}
{{--                        </div>--}}

{{--                        <div class="single-info-box">--}}
{{--                            <h4>تاریخ</h4>--}}
{{--                            <span>28 دی 1403</span>--}}
{{--                        </div>--}}

{{--                        <div class="single-info-box">--}}
{{--                            <h4>اشتراک گذاری</h4>--}}
{{--                            <ul class="social">--}}
{{--                                <li>--}}
{{--                                    <a target="_blank" href="#">--}}
{{--                                        <i class='bx bxl-linkedin'></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a target="_blank" href="#">--}}
{{--                                        <i class='bx bxl-twitter'></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a target="_blank" href="#">--}}
{{--                                        <i class='bx bxl-facebook'></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a target="_blank" href="#">--}}
{{--                                        <i class='bx bxl-instagram'></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Service details -->
@endsection
