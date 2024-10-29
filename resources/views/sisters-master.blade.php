<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">

    <title>حوزه علمیه حضرت قائم (عج)</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('site/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('site/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('site/img/favicon/favicon-16x16.png')}}">
    {{--    <link rel="icon" href="{{url($companies['favicon16'])}}" sizes="16x16" type="image/png">--}}
    {{--    <link rel="icon" href="{{url($companies['favicon32'])}}" sizes="32x32" type="image/png">--}}

    @yield('style')
</head>

<body>

<div class="preloader-area">
    <div class="loading-message">
        <p>
            <span class="dot-1" style="font-size: 80px;font-family:IranNastaliq,serif !important;"> حوزه علمیه </span>
            <span class="dot-2" style="font-size: 80px;font-family:IranNastaliq,serif !important;"> </span>
            <span class="dot-3"
                  style="font-size: 80px;font-family:IranNastaliq,serif !important;"> حضرت قائم (عج) </span>
        </p>
    </div>
</div>

<!-- Start Navbar Area -->
<div class="navbar-area bg-white p-relative">
    <div class="spacle-responsive-nav">
        <div class="container">
            <div class="spacle-responsive-menu">
                <div class="logo">
                    <a href="{{url('/news')}}">
                        <img src="{{asset('site/img/logo.png')}}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="spacle-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand headerLogo" href={{url('/')}}>
                    <img src="{{asset('site/img/logo.png')}}" style="max-width:35%" alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{url('/education')}}" class="nav-link">معاونت آموزش<i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">مقاطع تحصیلی</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">پذیرش و گزینش</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">محتوای درسی</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">دائره امتحانات</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/education')}}" class="nav-link">معاونت پژوهش<i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{url('/meeting')}}" class="nav-link">کرسی ها</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/meeting')}}" class="nav-link">نشست ها</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">کارگاه ها</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">پایانامه ها و مقالات</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/journal')}}" class="nav-link">نشریه</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">همایش ها و کنگره ها</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">گروه های علمی</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/cultural')}}" class="nav-link">معاونت فرهنگی<i
                                    class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">کانون ها</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">فعالیت های تبلیغی و فرهنگی</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/news')}}" class="nav-link">دوره های آموزشی</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">سامانه های حوزوی</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/library')}}" class="nav-link">کتابخانه</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/mahdia')}}" class="nav-link">مرکز مشاوره مهدیا</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/kindergarten')}}" class="nav-link">مهد کودک ضحی</a>
                        </li>
                    </ul>


                    <div class="others-options">
                        <a href="{{url('register')}}" class="default-btn">
                            <i class="bx bxs-user"></i>ثبت نام<span></span>
                        </a>
                        <a href="{{url('login')}}" class="default-btn">
                            <i class="bx bx-log-in"></i>ورود<span></span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

@yield('main')


<!-- Start footer Area -->
<footer class="footer-area">
    <div class="divider"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{asset('site/img/logo/white-logo.png')}}"
                                                    style="max-width:60px" alt="image"></a>
                    </div>
                    <p class="text-justify">
                        حوزه علمیه حضرت قائم (عج) چیذر از سال ۱۳۴۶ در دو بخش برادران و خواهران آغاز به کار نمود.
                        از سال ۱۳۹۳ واحد خواهران با نظارت مرکز مدیریت حوزه های علمیه فعالیت خود را در سه
                        رشته کلام با گرایش امامت، تفسیر و علوم قرآنی و مشاوره خانواده در قالب موسسه آموزش عالی حوزوی
                        ادامه داد. این مؤسسه متشکل از سه معاونت آموزش آموزش ،پژوهش و فرهنگی می باشد .
                    </p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>منو ما</h3>

                    <ul class="services-list">
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">آخرین اخبار</a></li>
                        <li><a href="#">حریم خصوصی</a></li>
                        <li><a href="#">شرایط و ضوابط</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>لینک های مرتبط</h3>

                    <ul class="support-list">
                        <li><a href="#">سایت رهبری</a></li>
                        <li><a href="#">سایت حوزه علمیه</a></li>
                        <li><a href="#">سایت سازمان تبلیغات</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>اطلاعات تماس</h3>

                    <ul class="footer-contact-info">
                        <li>موقعیت:
                            <a href="https://goo.gl/maps/MQ78iGP5g9VgZcJ38" target="_blank">
                                تهران، شمیران، چیذر، خیابان شهید افشین محمودیان، کوی علمیه خواهران
                            </a>
                        </li>
                        <li>ایمیل: <a href="mailto:hello@spacle.com">info@hozehghaem.ir</a></li>
                        <li>تلفن: <a href="tel:021-12345678">021-22203301</a></li>
                        <li>تلفن: <a href="tel:021-12345678">021-22211382</a></li>
                    </ul>
                    <ul class="social">
                        <li><a href="#" target="_blank"><i class="bx bxl-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="bx bxl-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <p><i class="bx bx-copyright"></i> تمام محتوای این وبسایت به حوزه و مدرسه علمیه حضرت قائم (عج) تعلق دارد.
                طراحی و توسعه توسط <a href="https://bestagroup.ir" target="_blank">Bestagroup</a></p>
        </div>
    </div>
</footer>
<!-- End footer Area -->


<div class="go-top"><i class='bx bx-chevron-up'></i></div>

<script src="{{asset('site/js/jquery.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('site/js/jquery.appear.min.js')}}"></script>
<script src="{{asset('site/js/odometer.min.js')}}"></script>
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/jquery.meanmenu.js')}}"></script>
<script src="{{asset('site/js/wow.min.js')}}"></script>
<script src="{{asset('site/js/conversation.js')}}"></script>
<script src="{{asset('site/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('site/js/form-validator.min.js')}}"></script>
<script src="{{asset('site/js/contact-form-script.js')}}"></script>
<script src="{{asset('site/js/particles.min.js')}}"></script>
<script src="{{asset('site/js/coustom-particles.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>


@yield('script')
</body>
</html>
