@extends('master')
@section('style')
@endsection
@section('main')

    <style>

        .card-title {
            font-size: 20px;
        }

        .marquee {
            direction: rtl;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            font-size: large;
        }

        .marquee span {
            margin-bottom: 12px;
            margin-top: 12px;
            display: inline-block;
            animation: marquee 40s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(-20%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .container .row .col-md-3 img {
            transition: transform 0.4s ease-in-out;
        }

        .container .row .col-md-3 img:hover {
            transform: scale(1.1);
            transition: transform 0.4s ease-in-out;
        }

        .index-banner {
            padding-top: 235px;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* ارتفاع کامل صفحه */
        }

        .index-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
            z-index: 1; /* لایه‌بندی زیر متن */
        }

        .index-banner-content {
            text-align: center; /* متن‌ها را وسط چین می‌کند */
            display: flex;
            flex-direction: column;
            justify-content: center; /* محتوا را به مرکز محور عمودی قرار می‌دهد */
            align-items: center; /* محتوا را به مرکز محور افقی قرار می‌دهد */
            height: 100%; /* در صورت نیاز برای استفاده از فضای کامل بخش */
            z-index: 2;
        }

        .index-banner-content p {
            color: #f0f0f9;
            max-width: 500px;
        }

        .index-banner-content h1 {
            font-size: 50px;
            color: #f0f0f9;
            max-width: 500px;
        }

        .khat img {
            max-height: 50px;
        }

        @media (max-width: 768px) {
            .index-banner {
                padding-top: 60px;
                padding-bottom: 60px;
                height: 30vh;
            }

            .index-banner-content {

            }

            .index-banner-content h1 {
                font-size: 24px;
                color: #f0f0f9;
                max-width: 500px;
            }

            .index-banner-content p {
                font-size: 8px;
                color: #f0f0f9;
                max-width: 250px;
            }

            .khat img {
                max-height: 24px;
            }
        }

    </style>

    <!-- Start Digital Agency Banner -->
    <div id="indexBannerCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($slides as $slide)
                <li data-target="#indexBannerCarousel" data-slide-to="{{$slide->id}}"
                    class="@if($slides->min('id') == $slide->id) active @endif"></li>
            @endforeach
        </ol>

        <!-- Carousel items -->
        <div class="carousel-inner">
            @foreach($slides as $slide)
                <div class="carousel-item @if($slides->min('id') == $slide->id) active @endif ">
                    <section class="index-banner"
                             style="background-color: #f5f5f5; background-image: url('{{ asset('storage/'.$slide->file_link) }}');">
                        <div class="index-banner-content">
                            <h1 style="font-family: 'IranNastaliq', serif;">{{$slide->title1}}</h1>
                            <p>{!! $slide->text !!}</p>
                        </div>
                    </section>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#indexBannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#indexBannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Digital Agency Banner -->

    {{--   Start line   --}}
    <div class="container-fluid py-0 py-lg-2" style="background-color: #f0f0f9; display: flex;">
        <div class="container col-12 col-md-8" style="margin: 0 auto;display: flex;">
            <div class="d-flex khat align-items-center">
                <img src="{{asset('site/img/navaar-right.webp')}}" loading="lazy"
                     alt="">
            </div>
            <div class="marquee">
                <span>
                    @foreach($flowtexts as $flowtext)
                        {{$flowtext->matn}} |
                    @endforeach
                </span>
            </div>
            <div class="d-flex khat align-items-center">
                <img src="{{asset('site/img/navaar-left.webp')}}" loading="lazy"
                     alt="">
            </div>
        </div>
    </div>
    {{--   End line   --}}
    <!-- Start section cards -->
    <div class="features-card-section pt-100 pb-70 bg-f8fbfa">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 wow fadeInUp d-flex align-items-stretch" data-wow-delay=".2s">
                    <div class="single-features-card tx-center">
                        <i class='bx bxs-graduation bx-lg'></i>
                        <h3>
                            <a href="{{url('/حوزه-علمیه-خواهران/معاونت-آموزش')}}" class="card-title">
                                معاونت آموزش
                            </a>
                        </h3>
                        <p class="card-text text-center pt-2">
                            <a href="{{url('/حوزه-علمیه-خواهران/معاونت-آموزش')}}" class="btn btn-primary">مشاهده</a>
                        </p>
                        <div class="flex-grow-1"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 wow fadeInUp d-flex align-items-stretch" data-wow-delay=".3s">
                    <div class="single-features-card tx-center">
                        <i class='bx bx-book-reader bx-lg'></i>
                        <h3>
                            <a href="{{url('/حوزه-علمیه-خواهران/معاونت-پژوهش')}}" class="card-title">معاونت پژوهش</a>
                        </h3>
                        <p class="card-text text-center pt-2">
                            <a href="{{url('/حوزه-علمیه-خواهران/معاونت-پژوهش')}}" class="btn btn-primary">مشاهده</a>
                        </p>
                        <div class="flex-grow-1"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 wow fadeInUp d-flex align-items-stretch" data-wow-delay=".4s">
                    <div class="single-features-card tx-center">
                        <i class='bx bx-library bx-lg'></i>
                        <h3>
                            <a href="{{url('/حوزه-علمیه-خواهران/معاونت-فرهنگی')}}" class="card-title">معاونت فرهنگی</a>
                        </h3>
                        <p class="card-text text-center pt-2">
                            <a href="{{url('/حوزه-علمیه-خواهران/معاونت-فرهنگی')}}" class="btn btn-primary">مشاهده</a>
                        </p>
                        <div class="flex-grow-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section cards -->
    <section class="services-area mt-3 mb-3">
        <div class="container ">
            <div class="section-title text-left flex-row d-flex align-items-center">
                <img src="{{asset('/site/img/logo-without-text.png')}}" class="title-icon" alt="">
                <h2>سلسله نشست های دوره ای حوزه</h2>
            </div>
            <div class="row justify-content-between">
                @foreach($posts as $post)
                    @if($post->posttype == 2)
                        <div class="single-services-box col-lg-5 col-md-12">
                            <div class="row m-0">
                                <div class="col-lg-6 col-md-12 p-0">
                                    <div class="content">
                                        <h3><a href="{{ route('/') }}">{{ $post->title }}</a></h3>
                                        {!! Str::limit(strip_tags($post->description), 100, '...') !!}
                                        <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/نشست-ها/'.$post->slug) }}" class="read-more-btn">
                                            ادامه مطلب <i class='bx bx-left-arrow-alt'></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 p-0">
                                    <div class="image bg-1">
                                        <img src="{{asset($post->image)}}" alt="{{$post->title}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                <div class="services-btn-box text-center">
                    <a href="{{ url('نشست') }}" class="custom-btn">
                        مشاهده همه
                        <i class="bx bx-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Case Studies Area -->
    <section class="case-studies-area">
        <h2 class="mb-2 text-center" style="color: white;margin: 24px">اخبار</h2>

        <div class="container mt-5">

            <div id="case-studies-slides" class="case-studies-slides owl-carousel">
                @foreach($posts as $post)
                    @if($post->posttype == 5)
                        <div class="single-case-studies-item">
                            <a href="#" class="image d-block">
                                <img src="{{asset($post->image)}}" alt="image">
                            </a>
                            <div class="content">
                                <h3><a href="#">{{$post->title}}</a></h3>
                                <a href="#" class="link-btn"><i class='bx bx-left-arrow-alt'></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Case Studies Area -->

    <section class="services-area bg-right-shape mt-4 mb-4">
        <div class="container pt-3">
            <div class="row align-items-center">
                <div class="services-content it-service-content">
                    <div class="content left-content">
                        <h2> امکانات آموزشی </h2>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40
                            سال استاندارد صنعت بوده است.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class='bx bxs-badge-check'></i>
                                    حسینیه
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class='bx bxs-badge-check'></i>
                                    کلاس آموزشی
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class='bx bxs-badge-check'></i>
                                    خوابگاه طلاب
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class='bx bxs-badge-check'></i>
                                    دوره های پژوهش محور
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class='bx bxs-badge-check'></i>
                                    اردوهای جهادی
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class='bx bxs-badge-check'></i>
                                    سالن کنفرانس
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="services-image wow fadeInRight" data-wow-delay=".3s">
                    <div class="image">
                        <img src="{{asset('site/img/hozeslide2.jpg')}}" loading="lazy" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Partner Area -->
    <section class="partner-area-two ptb-70 bg-f9f9f9">
        <div class="container">
{{--            <div id="partner-row" class="d-flex justify-content-center row align-items-center">--}}
{{--                @foreach($customers as $customer)--}}
{{--                    <div class="col-lg-2 col-6 col-sm-3 col-md-4 wow fadeInUp">--}}
{{--                        <div class="single-partner-box">--}}
{{--                            <img src="{{asset($customer->image)}}" alt="{{$customer->name}}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--                --}}
{{--            </div>--}}
            <div id="partner-row" class="case-studies-slides owl-carousel">
                @foreach($customers as $customer)
                    <div class="col-12 col-md-4 wow d-flex flex-column justify-content-center fadeInUp">
                        <div class="single-partner-box d-flex justify-content-center">
                            <img src="{{asset($customer->image)}}" alt="{{$customer->name}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Partner Area -->

    <!-- Start Blog Area -->
    <section class="blog-area pt-70">
        <div class="container pb-5">
            <div id="blog-slides" class="blog-slides owl-carousel">
                @foreach($posts as $post)
                    @if($post->posttype == 3)
                        <div class="single-blog-post-item">
                            <div class="post-image">
                                <a href="#" class="d-block">
                                    <img src="{{asset($post->image)}}" alt="{{$post->title}}">
                                </a>
                            </div>
                            <div class="post-content">
                                <a href="#" class="category">خانواده</a>
                                <h3><a href="#">{{$post->title}}</a></h3>
                                <ul class="post-content-footer d-flex justify-content-between align-items-center">
                                    <li>
                                        <div class="post-author d-flex align-items-center">
                                            <!-- Author information can be added here -->
                                        </div>
                                    </li>
                                    <li>
                                        <i class='bx bx-calendar'></i> {{jdate($post->update_at)->format('Y/m/d')}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                <div class="services-btn-box text-center">
                    <a href="{{url('#')}}" class="default-btn">
                        مشاهده همه
                        <i class="bx bx-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

    <section class="faq-area ptb-5 bg-f8fbfa">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="faq-accordion">
                        <ul class="accordion">

                            @foreach($questions as $question)
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="bx bx-plus"></i>
                                        {{$question->question}}
                                    </a>

                                    <p class="accordion-content">
                                        {{$question->answer}}
                                    </p>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Let's Talk Area -->
    <section class="lets-talk-area mt-5 mb-5">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-12 col-md-12">
                    <div class="lets-talk-content">
                        <h2 class="wow fadeInUp pb-5">درباره حوزه علمیه و مدرسه حضرت قائم (عج) چیذر</h2>
                        <p class="wow fadeInUp text-justify">
                            حوزه علمیه حضرت قائم (عج) چیذر از سال ۱۳۴۶ در دو بخش برادران و خواهران آغاز به کار نمود.
                            از سال ۱۳۹۳ واحد خواهران با نظارت مرکز مدیریت حوزه های علمیه فعالیت خود را در سه رشته کلام
                            با گرایش امامت، تفسیر و علوم قرآنی و مشاوره خانواده در قالب موسسه آموزش عالی حوزوی ادامه
                            داد. این مؤسسه متشکل از سه معاونت آموزش آموزش ،پژوهش و فرهنگی می باشد .
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInRight" data-wow-delay=".2s">
                </div>
            </div>
        </div>
    </section>
@endsection
