@extends('master')
@section('style')
    <style>
        /* پس‌زمینه صفحه */
        body {
            background: linear-gradient(to bottom, #a8e6ff, #ffffff);
        }

        /* استایل بخش عنوان صفحه */
        /*.page-title-area {*/
        /*    background: #ffd700;*/
        /*    padding: 30px 0;*/
        /*    border-radius: 20px;*/
        /*    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);*/
        /*}*/
        /*.page-title-area h2 {*/
        /*    color: #ff6f61;*/
        /*    font-size: 36px;*/
        /*    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);*/
        /*}*/

        /* استایل پست‌ها */
        .post-card {
            background: #ffffff;
            /*border: 1px solid #eabc7f;*/
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .post-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .post-card-body {
            padding: 15px;
            text-align: center;
        }

        .post-title {
            font-size: 18px;
            font-weight: bold;
            color: #1e2e45;
            margin-bottom: 10px;
        }

        .post-description {
            font-size: 14px;
            color: #666;
        }

        /* استایل تصویر اصلی */
        .about-content img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        /* استایل عناوین */
        h3 {
            color: rgba(25, 40, 60);
            margin-bottom: 20px;
        }

        .sun {
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, #FFD700 50%, #FFA500 100%);
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(255, 165, 0, 0.6);
            /*z-index: 10;*/
        }

        .sun::before,
        .sun::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, transparent 70%, #FFA500 75%, transparent 85%);
            border-radius: 50%;
            transform: translate(-50%, -50%) rotate(0deg);
            animation: rotateSun 10s linear infinite;
            z-index: -1;
        }

        .sun::after {
            width: 180px;
            height: 180px;
            animation-delay: -5s;
        }

        @keyframes rotateSun {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .sun.small {
            width: 60px;
            height: 60px;
        }

        .sun.medium {
            width: 100px;
            height: 100px;
        }

        .sun.large {
            width: 150px;
            height: 150px;
        }

        .sun-1 {
            top: 150px;
            left: 10%;
        }

        .sun-2 {
            top: 200px;
            right: 15%;
        }

        .sun-3 {
            top: 300px;
            left: 20%;
        }

        /* Mobile Responsiveness */
        @media screen and (max-width: 768px) {
            .sun {
                width: 80px;
                height: 80px;
            }

            .sun::before,
            .sun::after {
                width: 110px;
                height: 110px;
            }

            .sun::after {
                width: 140px;
                height: 140px;
            }

            .sun.small {
                width: 40px;
                height: 40px;
            }

            .sun.medium {
                width: 80px;
                height: 80px;
            }

            .sun.large {
                width: 120px;
                height: 120px;
            }

            .sun-1 {
                top: 100px;
                left: 5%;
            }

            .sun-2 {
                top: 150px;
                right: 10%;
            }

            .sun-3 {
                top: 200px;
                left: 15%;
            }
        }

        /* Even smaller screens */
        @media screen and (max-width: 480px) {
            .sun {
                width: 40px;
                height: 40px;
            }

            .sun::before,
            .sun::after {
                width: 50px;
                height: 50px;
            }

            .sun::after {
                width: 60px;
                height: 60px;
            }

            .sun.small {
                display: none;
                width: 30px;
                height: 30px;
            }

            .sun.medium {
                width: 60px;
                height: 60px;
            }

            .sun.large {
                width: 90px;
                height: 90px;
            }

            .sun-1 {
                top: 80px;
                left: 10%;
            }

            .sun-2 {
                top: 120px;
                right: 15%;
            }

            .sun-3 {
                top: 160px;
                left: 15%;
            }
        }

        /* پس‌زمینه رنگین‌کمان */
        .rainbow-bg {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #ff6f61, #ffd700, #4caf50, #00bcd4, #3f51b5, #9c27b0);
            clip-path: ellipse(70% 50% at center top);
            z-index: -1;
        }

        /* استایل عنوان اصلی */
        .kindergarten-title {
            /*font-family: 'Comic Sans MS', cursive, sans-serif;*/
            font-size: 48px;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            margin: 0;
            padding: 0;
            z-index: 11;
        }

        /* استایل ستاره‌های تزئینی */
        .stars {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
        }

        .star {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #ffd700;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            animation: twinkle 2s infinite;
        }

        .star-1 {
            animation-delay: 0s;
        }

        .star-2 {
            animation-delay: 0.5s;
        }

        .star-3 {
            animation-delay: 1s;
        }

        /* افکت درخشش ستاره‌ها */
        @keyframes twinkle {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.2);
            }
        }
    </style>
@endsection

@section('main')
    <!-- Start Decorative Clouds -->
    <div class="sun sun-1 small"></div>
    <div class="sun sun-2 medium"></div>
    <div class="sun sun-3 large z-0"></div>
    <!-- End Decorative Clouds -->

    <!-- Start Page Title Area -->
    <div class="text-center position-relative py-5">
        <!-- پس زمینه رنگین کمان -->
        <div class="rainbow-bg"></div>
        <!-- عنوان اصلی -->
        <h2 class="kindergarten-title">
            مهد کودک ضحی
        </h2>
        <!-- المان تزئینی ستاره -->
        <div class="stars">
            <span class="star star-1"></span>
            <span class="star star-2"></span>
            <span class="star star-3"></span>
        </div>
    </div>

    <!-- End Page Title Area -->

    <!-- Start About Section -->
    <div class="d-flex flex-column container my-4 justify-content-center align-items-center about-content-center">
        <section class="d-flex flex-column col-lg-9 justify-content-center align-items-center about-content-center">
            <span class="my-4 text-center z-3">
                محیطی شاد و پر از یادگیری برای کوچولوهای دوست‌داشتنی شما!
            </span>
            {{--            <img src="{{ asset('/site/img/kindergarten.jpg') }}" alt="مهدکودک ضحی">--}}
        </section>
    </div>
    <!-- End About Section -->

    <!-- Start Posts Section -->
    <div class="container my-5 z-3">
        <h3 class="text-center z-3">آخرین فعالیت‌های ما</h3>
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 4)
                    <div class="col-md-4 py-4 z-3">
                        <div class="post-card">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                            <div class="post-card-body">
                                <h4 class="post-title">{{ $post->title }}</h4>
                                <a href="{{ url('حوزه-علمیه-خواهران/مهد-کودک/'.$post->slug) }}"
                                   class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                            </div>
                        </div>
                    </div>
                @elseif($posts->isEmpty())
                    <p>هیچ فعالیتی برای نمایش وجود ندارد.</p>
                @endif
            @endforeach
        </div>
    </div>
    <!-- End Posts Section -->
@endsection
