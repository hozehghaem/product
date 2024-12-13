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
            color: #ff6f61;
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
            color: #ff6f61;
            margin-bottom: 20px;
        }

        /* ابرها */
        .cloud {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cloud.small {
            width: 60px;
            height: 60px;
        }

        .cloud.medium {
            width: 100px;
            height: 100px;
        }

        .cloud.large {
            width: 150px;
            height: 150px;
        }

        .cloud-1 {
            top: 150px;
            left: 10%;
        }

        .cloud-2 {
            top: 200px;
            right: 15%;
        }

        .cloud-3 {
            top: 300px;
            left: 20%;
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
    <div class="cloud cloud-1 small"></div>
    <div class="cloud cloud-2 medium"></div>
    <div class="cloud cloud-3 large"></div>
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
            <span class="my-4 text-center">
                محیطی شاد و پر از یادگیری برای کوچولوهای دوست‌داشتنی شما!
            </span>
            {{--            <img src="{{ asset('/site/img/kindergarten.jpg') }}" alt="مهدکودک ضحی">--}}
        </section>
    </div>
    <!-- End About Section -->

    <!-- Start Posts Section -->
    <div class="container my-5">
        <h3 class="text-center">آخرین فعالیت‌های ما</h3>
        <div class="row">

            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="post-card">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                        <div class="post-card-body">
                            <h4 class="post-title">{{ $post->title }}</h4>
                            <p class="post-description">{{ Str::limit(strip_tags($post->description), 50, '...') }}
                            </p>
                            <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/نشست-ها/'.$post->slug) }}"
                               class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Posts Section -->
@endsection
