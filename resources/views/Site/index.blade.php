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
            padding-bottom: 235px;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #f0f0f0;
            background-image: url('{{ asset('/site/img/banner-slider/banner-hozeh.jpg') }}');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* ارتفاع کامل صفحه */
        }

        .index-banner-content {
            text-align: center; /* متن‌ها را وسط چین می‌کند */
            display: flex;
            flex-direction: column;
            justify-content: center; /* محتوا را به مرکز محور عمودی قرار می‌دهد */
            align-items: center; /* محتوا را به مرکز محور افقی قرار می‌دهد */
            height: 100%; /* در صورت نیاز برای استفاده از فضای کامل بخش */
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

    </style>

    <!-- Start Digital Agency Banner -->
    <div id="indexBannerCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#indexBannerCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#indexBannerCarousel" data-slide-to="1"></li>
            <li data-target="#indexBannerCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Carousel items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <section class="index-banner" style="background-color: #f5f5f5;">
                    <div class="index-banner-content">
                        <h1 style="font-family: 'IranNastaliq', serif;">حوزه علمیه حضرت قائم (عج)</h1>
                        <p>
                            حوزه علمیه حضرت قائم (عج) چیذر از سال ۱۳۴۶ در دو بخش برادران و خواهران آغاز به کار نمود. از
                            سال ۱۳۹۳ واحد خواهران با نظارت مرکز مدیریت حوزه های علمیه فعالیت خود را در سه رشته کلام با
                            گرایش امامت، تفسیر و علوم قرآنی و مشاوره خانواده در قالب موسسه آموزش عالی حوزوی ادامه داد.
                            این مؤسسه متشکل از سه معاونت آموزش آموزش ،پژوهش و فرهنگی می باشد .

                        </p>
                    </div>
                </section>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <section class="index-banner" style="background-color: #f5f5f5;">
                    <div class="index-banner-content">
                        <h1 style="font-family: 'IranNastaliq', serif;">حوزه علمیه حضرت قائم (عج)</h1>
                        <p>
                            حوزه علمیه حضرت قائم (عج) چیذر از سال ۱۳۴۶ در دو بخش برادران و خواهران آغاز به کار نمود. از
                            سال ۱۳۹۳ واحد خواهران با نظارت مرکز مدیریت حوزه های علمیه فعالیت خود را در سه رشته کلام با
                            گرایش امامت، تفسیر و علوم قرآنی و مشاوره خانواده در قالب موسسه آموزش عالی حوزوی ادامه داد.
                            این مؤسسه متشکل از سه معاونت آموزش آموزش ،پژوهش و فرهنگی می باشد .

                        </p>
                    </div>
                </section>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <section class="index-banner" style="background-color: #f5f5f5;">
                    <div class="index-banner-content">
                        <h1 style="font-family: 'IranNastaliq', serif;">حوزه علمیه حضرت قائم (عج)</h1>
                        <p>
                            حوزه علمیه حضرت قائم (عج) چیذر از سال ۱۳۴۶ در دو بخش برادران و خواهران آغاز به کار نمود. از
                            سال ۱۳۹۳ واحد خواهران با نظارت مرکز مدیریت حوزه های علمیه فعالیت خود را در سه رشته کلام با
                            گرایش امامت، تفسیر و علوم قرآنی و مشاوره خانواده در قالب موسسه آموزش عالی حوزوی ادامه داد.
                            این مؤسسه متشکل از سه معاونت آموزش آموزش ،پژوهش و فرهنگی می باشد .
                        </p>
                    </div>
                </section>
            </div>
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
    <div class="container-fluid py-2" style="background-color: #f0f0f9; display: flex;">
        <div class="container col-12 col-md-8" style="margin: 0 auto;display: flex;">
            <div class="d-flex">
                <img src="{{asset('site/img/navaar-right.webp')}}" style="max-height: 50px;" loading="lazy"
                     alt="">
            </div>
            <div class="marquee">
                <span>
                    مقام معظم رهبری (مدظله العالی) پدیده خواهران طلبه پدیده عظیم و مبارکی است. هزاران عالم ،
                    پژوهشگر ، فقیه و فیلسوف در حوزه‌های علمی خواهران تربیت شوند این حرکت عظیمی خواهد بود.ٍ    |
                    الإمامُ الصّادقُ عليه السلام :مَن تَعَلَّمَ للّهِِ و عَمِلَ للّهِِ و عَلَّمَ للّهِِ دُعِيَ في مَلَكوتِ
                    السَّماواتِ عَظيما، فقيلَ : تَعَلَّمَ للّهِِ ، و عَمِلَ للّهِِ ، و عَلَّمَ للّهِِ !    |
                    امام صادق علیه السلام هر که برای خدا علم بیاموزد و به آن عمل کند و به دیگران آموزش دهد
                    در ملکوت آسمان‌ها به بزرگی یاد شود و گفته آید برای خدا آموخت برای خدا عمل کرد و برای خدا آموزش داد.    |
                    الکافی ۱/۳۵/۶
                </span>
            </div>
            <div class="d-flex">
                <img src="{{asset('site/img/navaar-left.webp')}}" style="max-height: 50px;" loading="lazy"
                     alt="">
            </div>
        </div>
    </div>
    {{--   End line   --}}

    {{--  Start brothers and sisters section  --}}
    <div class="container">
        <div class="row" style="justify-content: center; text-align: center">
            <div class="col-md-3 p-4">
                <a href="{{url('حوزه-علمیه-برادران')}}">
                    <img src="{{ asset('/site/img/برادران.png') }}" loading="lazy" alt="Image 1">
                </a></div>
            <div class="col-md-3 p-4">
                <a href="{{url('حوزه-علمیه-خواهران')}}">
                    <img src="{{ asset('/site/img/خواهران.png') }}" loading="lazy" alt="Image 2">
                </a>
            </div>
        </div>
    </div>
    {{--  End brothers and sisters section  --}}

    {{--    Start sections Card    --}}
    <div class="features-card-section pt-100 pb-70 bg-f8fbfa">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-features-card tx-center d-flex justify-content-center">
                        <img src="{{asset('/site/img/icon/male.png')}}" class="mx-auto" alt="">
                        <h3>
                            <a href="{{url('حوزه-علمیه-برادران')}}" class="card-title">حوزه علمیه برادران</a>
                        </h3>
                        <p>حوزه علمیه ویژه طلاب بخش برادران</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-features-card tx-center d-flex justify-content-center">
                        <img src="{{asset('/site/img/icon/hijab.png')}}" class="mx-auto" alt="">
                        <h3>
                            <a href="{{url('حوزه-علمیه-خواهران')}}" class="card-title">حوزه علمیه خواهران</a>
                        </h3>
                        <p>حوزه علمیه ویژه طلاب بخش خواهران</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-features-card tx-center d-flex justify-content-center">
                        <img src="{{asset('/site/img/icon/books-stack.png')}}" class="mx-auto" alt="">
                        <h3>
                            <a href="{{url('publishing-center')}}" class="card-title">مرکز نشر</a>
                        </h3>
                        <p>مرکز نشر کتب و مقالات اساتید و طلاب برجسته حوزه</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-features-card tx-center d-flex justify-content-center">
                        <img src="{{asset('/site/img/icon/hands.png')}}" class="mx-auto" alt="">
                        <h3>
                            <a href="{{url('/charity')}}" class="card-title">موسسه خیریه</a>
                        </h3>
                        <p>موسسه خیریه وابسته به حوزه جهت کمک به طلاب</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-features-card tx-center d-flex justify-content-center">
                        <img src="{{asset('/site/img/icon/speaking.png')}}" class="mx-auto" alt="">
                        <h3>
                            <a href="{{url('/mahdia')}}" class="card-title">مرکز مشاوره</a>
                        </h3>
                        <p>مرکز مشاوره با بهره گیری از متخصصین حوزه و دانشگاه</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-features-card tx-center d-flex justify-content-center">
                        <img src="{{asset('/site/img/icon/kid.png')}}" class="mx-auto" alt="">
                        <h3>
                            <a href="{{url('/kindergarten')}}" class="card-title">مهد کودک</a>
                        </h3>
                        <p>مهدکودک در زمینه آموزش مفاهیم قرآنی برای خردسالان</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--    End sections Card    --}}

    <!-- Start Services Area -->
    <section class="services-area mt-3 mb-3">
        <div class="container ">
            <div class="section-title text-left flex-row d-flex align-items-center">
                <img src="{{asset('/site/img/logo-without-text.png')}}" class="title-icon" alt="">
                <h2>سلسله نشست های دوره ای حوزه</h2>
            </div>
            <div class="row">
                @foreach($posts as $post)
                <div class="single-services-box col-lg-6 col-md-12">
                    <div class="row m-0">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="content">
                                <h3><a href="{{route('/')}}">{{$post->title}}</a></h3>
                                {!! $post->description !!}
                                <a href="{{url('نشست/'.$post->id)}}" class="read-more-btn">ادامه مطلب <i class='bx bx-left-arrow-alt'></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="image bg-1">
                                <img src="{{asset($post->image)}}" alt="{{$post->title}}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                <div class="services-btn-box">
                    <a href="{{url('/meeting')}}" class="default-btn">
                        مشاهده همه
                        <i class="bx bx-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Case Studies Area -->
    <section class="case-studies-area pt-70 pb-20">
        <div class="container">
            <div id="case-studies-slides" class="case-studies-slides owl-carousel">
                <div class="single-case-studies-item">
                    <a href="#" class="image d-block">
                        <img src="{{asset("site/img/case-studies/case-studies-img1.jpg")}}" alt="image">
                    </a>
                    <div class="content">
                        <h3><a href="#">سخنرانی و درس اخلاق آیت الله هاشمی اولیا</a></h3>
                        <a href="#" class="link-btn"><i class='bx bx-left-arrow-alt'></i></a>
                    </div>
                </div>
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
            <div id="partner-row" class="d-flex justify-content-center row align-items-center">
                <div class="col-lg-2 col-6 col-sm-3 col-md-4 wow fadeInUp">
                    <div class="single-partner-box">
                        <img src="{{asset('site/img/partner-image/1.png')}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-2 col-6 col-sm-3 col-md-4 wow fadeInUp">
                    <div class="single-partner-box">
                        <img src="{{asset('site/img/partner-image/1.png')}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-2 col-6 col-sm-3 col-md-4 wow fadeInUp">
                    <div class="single-partner-box">
                        <img src="{{asset('site/img/partner-image/1.png')}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-2 col-6 col-sm-3 col-md-4 wow fadeInUp">
                    <div class="single-partner-box">
                        <img src="{{asset('site/img/partner-image/1.png')}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-2 col-6 col-sm-3 col-md-4 wow fadeInUp">
                    <div class="single-partner-box">
                        <img src="{{asset('site/img/partner-image/1.png')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Partner Area -->

    <!-- Start Blog Area -->
    <section class="blog-area pt-70">
        <div class="container pb-5">
            <div id="blog-slides" class="blog-slides owl-carousel">
                @foreach($akhbars as $akhbar)
                <div class="single-blog-post-item">
                    <div class="post-image">
                        <a href="#" class="d-block">
                            <img src="{{asset($akhbar->image)}}" alt="image">
                        </a>
                    </div>
                    <div class="post-content">
                        <a href="#" class="category">خانواده</a>
                        <h3><a href="#">{{$akhbar->title}}</a></h3>
                        <ul class="post-content-footer d-flex justify-content-between align-items-center">
                            <li>
                                <div class="post-author d-flex align-items-center">
                                    <!-- Author information can be added here -->
                                </div>
                            </li>
                            <li>
                                <i class='bx bx-calendar'></i> {{jdate($akhbar->update_at)->format('Y/m/d')}}
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                <div class="services-btn-box">
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
