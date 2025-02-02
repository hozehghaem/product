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
        .khat img{
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
            .khat img{
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
    <div class="container-fluid py-0 py-lg-2 line-background">
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
                <div class="col-lg-6 col-sm-6 wow fadeInUp d-flex align-items-stretch" data-wow-delay=".2s">
                    <div class="single-features-card tx-center">
                        <i class='bx bxs-graduation bx-lg'></i>
                        <h3>
                            <a href="{{url('/education')}}" class="card-title">
                                معاونت آموزش
                            </a>
                        </h3>
                        <p class="card-text text-justify">مؤسسه آموزش عالی حوزوی حضرت قائم (عج)
                            در راستای تحقق رسالت خود مبنی بر ارتقاء سطح علمی بانوان مسلمان متعهد پذ
                            یرای طلاب خواهر در دو مقطع کارشناسی (سطح ۲) و کارشناسی ارشد (سطح ۳) می باشد.
                            <a href="#moreText1" data-toggle="collapse">
                                ادامه مطلب ...
                            </a>
                        </p>
                        <div id="moreText1" class="collapse">
                            <p class="text-justify">
                                فارغ التحصیلان حوزوی پس از تکمیل دوره آموزشی و مهارتی تبلیغی
                                جهت فعالیت های علمی و تبلیغی جذب انجمن ها ارگانها و نهادهای ملی و بین المللی میشوند.
                            </p>
                        </div>
                        <div class="flex-grow-1"></div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 wow fadeInUp d-flex align-items-stretch" data-wow-delay=".3s">
                    <div class="single-features-card tx-center">
                        <i class='bx bx-book-reader  bx-lg'></i>
                        <h3>
                            <a href="{{url('/research')}}" class="card-title">معاونت پژوهش</a>
                        </h3>
                        <p class="card-text text-justify">وادی پژوهش و نویسندگی گسترۀ نقش آفرینی است که با آموزش صحیح
                            و روشمند و بهره گیری از روشهای پژوهش پر بار می گردد. یکی از اهداف حوزه های علمیه
                            تربیت طلاب محقق سخنور و نویسنده است. که در تبلور جامعه اسلامی بسیار مهم است.
                            <br>
                            <a href="#moreText2" data-toggle="collapse">ادامه مطلب ...</a>
                        </p>
                        <div id="moreText2" class="collapse">
                            <p class="text-justify">از این رو در این موسسه در راستای این هدف مطلوب
                                فعالیت های پژوهشی گسترده و متعددی در طی سالها و مقارن با دوره آموزش طلاب
                                برگزار شده است از قبیل: کرسی های علمی ترویجی با هدف ایجاد بستر نظریه
                                پردازی نشست های علمی تخصصی و علمی پژوهشی با هدف ترویج فرهنگ پژوهش و
                                آشنایی طلاب با مسائل روز و کاربردی ،جامعه برگزاری کارگاه های پژوهشی
                                نوین با هدف آشنایی طلاب با شیوه های نوین پژوهش انتشار فصلنامه پژوهشی
                                با هدف چاپ مقالات علمی طلاب و فعالیت های دیگری که در این مجال نمیگنجد.
                            </p>
                        </div>
                        <div class="flex-grow-1">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 wow fadeInUp d-flex align-items-stretch" data-wow-delay=".4s">
                    <div class="single-features-card tx-center">
                        <i class='bx bx-library  bx-lg'></i>
                        <h3>
                            <a href="{{url('/cultural')}}" class="card-title">معاونت فرهنگی</a>
                        </h3>
                        <p class="card-text text-justify">معاونت فرهنگی در کنار رسالت اصلی خود با تشکیل سه کانون
                            فرهنگی به شرح ذیل اقدام به فعالیتهای تخصصی در حوزه های
                            گوناگون نموده است.
                            <a href="#moreText3" data-toggle="collapse">ادامه مطلب ...</a>
                        </p>
                        <div id="moreText3" class="collapse">
                            <p class="text-justify">كانون نور الثقلين
                                <br>
                                کانون نور الثقلین با هدف ایجاد زمینه فعالیت های قرآنی و نوحه خوانی به صورت تخصصی در گرایش های حفظ
                                و قرائت قرآن کریم تفسیر ر، آموزش مداحی و مقتل خوانی و..... ویژه معلمان و قرآن پژوهان تشکیل شده
                                است.
                                <br>
                                کانون زن و خانواده
                                <br>
                                این کانون با زیر مجموعه های تخصصی همیار خانواده و ،مشاوره با هدف پاسخ به نیاز روز جامعه از جمله :
                                روانشناسی پیش از ،ازدواج ارتباط بین
                                فردی زوج درمانی روان درمانی اختلالات و روانشناسی اعتیاد و... تاسیس شده است.
                                <br>
                                کانون دانش آموختگان
                                <br>
                                کانون دانش آموختگان حوزه علمیه حضرت قائم (عج) با هدف بکارگیری استعدادها ،توان تجربه و تخصص
                                فارغ التحصیلان تاسیس گردیده است. این کانون با هدف ایجاد ارتباط علمی و مهارتی و ایجاد زمینه ارتقاء و تکمیل
                                دانش اعضا و تشکیل شبکه ملی با امتیاز دریافت کد تبلیغی و اولویت در اعزام جهت تبلیغ علوم
                                و معارف دینی پایه گذاری شده است تعدادی از سر فصلهای آموزشی علمی و مهارتی مبلغان عبارتند از:
                                ۱_ تربیت مربی و مبلغ معارف اسلامی با گرایش تبلیغ ،خطيب متخصص مشاوره دینی ، کودک و نوجوان نقد عرفانهای نوظهور نقد بهائیت وهابیت و .....
                                ۲_تربیت مربی سواد رسانه ای با گرایش نرم افزار و سخت افزار ، جریان شناسی فضای مجازی علوم ارتباطات مجازی برنامه نویسی نویسندگی و...
                            </p>
                        </div>
                        <div class="flex-grow-1">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 wow fadeInUp d-flex align-items-stretch" data-wow-delay=".5s">
                    <div class="single-features-card tx-center">
                        <i class='bx bxs-user-voice bx-lg'></i>
                        <h3>
                            <a href="{{url('/mahdia')}}" class="card-title">معاونت مشاوره</a>
                        </h3>
                        <p class="flex-grow-1">
                            لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد
                            صنعت بوده است.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section cards -->

    <!-- Start Services Area -->
    <section class="services-area mt-3 mb-3">
        <div class="container ">
            <div class="section-title text-left flex-row d-flex align-items-center">
                <img src="{{asset('/site/img/logo-without-text.png')}}" class="title-icon" alt="">
                <h2>سلسله نشست های دوره ای حوزه</h2>
            </div>
            <div class="row justify-content-between">
                @foreach($sessionposts as $post)
                    <div class="single-services-box col-lg-5 col-md-12">
                        <div class="row m-0">
                            <div class="col-lg-6 col-md-12 p-0">
                                <div class="content">
                                    <h3>
                                        <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/نشست-ها/'.$post->slug) }}">{!! Str::limit(strip_tags($post->title), 24, '...') !!}</a>
                                    </h3>
                                    {!! Str::limit(strip_tags($post->description), 60, '...') !!}
                                    <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/نشست-ها/'.$post->slug) }}"
                                       class="read-more-btn">
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
                @endforeach
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp d-flex justify-content-center pt-3" data-wow-delay=".6s">
                <div>
                    <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/نشست-ها') }}" class="custom-btn">
                        مشاهده همه
                        <i class="bx bx-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Case Studies Area -->
    <section class="case-studies-area pt-70 pb-20">
        <div class="container">
            <h2 class="text-center mb-5" style="color: aliceblue">سخنرانی های مذهبی</h2>
            <div id="case-studies-slides" class="case-studies-slides owl-carousel">
                @foreach($speechposts as $post)
                    <div class="single-case-studies-item">
                        <a href="#" class="image d-block">
                            <img src="{{asset($post->image)}}" alt="image">
                        </a>
                        <div class="content">
                            <h3><a href="#">{{$post->title}}</a></h3>
                            <a href="{{url('حوزه-علمیه-خواهران/معاونت-پژوهش/نشست-ها/'.$post->slug)}}"><i
                                    class="bx bx-left-arrow-alt"></i></a>
                        </div>
                    </div>
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
    <section class="partner-area-two bg-f9f9f9">
        <div class="container">
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
            <h2 class="text-center mb-5" style="color: darkslategray">دوره های آموزشی</h2>
            <div id="blog-slides" class="blog-slides owl-carousel">
                @foreach($courseposts as $post)
                    <div class="single-blog-post-item">
                        <div class="post-image">
                            <a href="{{url('حوزه-علمیه-خواهران/معاونت-فرهنگی/دوره-های-آموزشی/'.$post->slug)}}"
                               class="d-block">
                                <img src="{{asset($post->image)}}" alt="{{$post->title}}">
                            </a>
                        </div>
                        <div class="post-content">
                            {{--                                <a href="#" class="category">خانواده</a>--}}
                            <h3>
                                <a href="{{url('حوزه-علمیه-خواهران/معاونت-فرهنگی/دوره-های-آموزشی/'.$post->slug)}}">{{$post->title}}</a>
                            </h3>
                            {{--                                <ul class="post-content-footer d-flex justify-content-between align-items-center">--}}
                            {{--                                    <li>--}}
                            {{--                                        <div class="post-author d-flex align-items-center">--}}
                            {{--                                            <!-- Author information can be added here -->--}}
                            {{--                                        </div>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <i class='bx bx-calendar'></i> {{jdate($post->update_at)->format('Y/m/d')}}--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            <div>
                                <i class='bx bx-calendar'></i> {{jdate($post->update_at)->format('Y/m/d')}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay=".6s">
                <div class="services-btn-box text-center">
                    <a href="{{url('حوزه-علمیه-خواهران/معاونت-فرهنگی/دوره-های-آموزشی/')}}" class="default-btn">
                        مشاهده همه
                        <i class="bx bx-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

    <!-- Start Let's Talk Area -->
    <section class="lets-talk-area ptb-100 bg-f8fbfa">
        <div class="container justify-content-center">
            <div class="row align-items-center text-center">
                <div class="col-lg-12 col-md-12 ">
                    <div class="lets-talk-content ">
                        <h2 class="wow fadeInUp pb-3">درباره حوزه علمیه و مدرسه حضرت قائم (عج) چیذر</h2>
                        <p class="wow fadeInUp text-justify">
                            حوزه علمیه حضرت قائم (عج) چیذر از سال ۱۳۴۶ در دو بخش برادران و خواهران آغاز به کار نمود.
                            از سال ۱۳۹۳ واحد خواهران با نظارت مرکز مدیریت حوزه های علمیه فعالیت خود را در سه رشته کلام با گرایش امامت، تفسیر و علوم قرآنی و مشاوره خانواده در قالب موسسه آموزش عالی حوزوی ادامه داد. این مؤسسه متشکل از سه معاونت آموزش آموزش ،پژوهش و فرهنگی می باشد .
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInRight" data-wow-delay=".2s">
                </div>
            </div>
        </div>
    </section>
    <!-- End Let's Talk Area -->

@endsection
