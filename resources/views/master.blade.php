<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/tooltipster.bundle.css')}}">

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
    <div class="spinner">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>
<style>
    /* Preloader Background */
    .preloader-area {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    /* Spinner */
    .spinner {
        display: flex;
        gap: 8px;
    }

    /* Dots */
    .spinner .dot {
        width: 12px;
        height: 12px;
        background-color: #333;
        border-radius: 50%;
        animation: bounce 0.6s infinite alternate;
    }

    .spinner .dot:nth-child(1) {
        animation-delay: 0s;
    }

    .spinner .dot:nth-child(2) {
        animation-delay: 0.2s;
    }

    .spinner .dot:nth-child(3) {
        animation-delay: 0.4s;
    }

    /* Bounce Animation */
    @keyframes bounce {
        from {
            transform: translateY(0);
        }
        to {
            transform: translateY(-10px);
        }
    }

</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            document.querySelector('.preloader-area').style.display = 'none';
        }, 1000); // مخفی کردن پیش‌بارگذار بعد از 1 ثانیه
    });
</script>

<!-- Start Navbar Area -->
<div class="navbar-area d-flex justify-content-between">
    <div class="spacle-nav justify-content-between">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand headerLogo" href={{url('/')}}>
                    <img src="{{asset('site/img/logo.png')}}" alt="logo">
                </a>

                <!-- Toggler Button for Mobile -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="modal" data-target="#mobileMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                    <ul class="navbar-nav mx-4">
                        @if(request()->segment(1) == 'حوزه-علمیه-خواهران')
                            @foreach($menus as $menu)
                                @if($menu->id == 2)
                                    <li class="nav-item">
                                        <a href="{{url($menu->slug)}}" class="nav-link">{{$menu->title}}</a>
                                    </li>
                                @endif
                            @endforeach
                            @foreach($submenus as $submenu)
                                @if($submenu->mega_manu == 1)
                                    <li class="nav-item">
                                        <a href="{{url('حوزه-علمیه-خواهران'.'/'.$submenu->slug)}}"
                                           class="nav-link">{{$submenu->title}}</a>
                                    </li>
                                @elseif($submenu->mega_manu == 2)
                                    <li class="nav-item dropdown">
                                        <a href="{{url('حوزه-علمیه-خواهران'.'/'.$submenu->slug)}}"
                                           class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                            {{$submenu->title}}
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach($submenus as $megamenu)
                                                @if($submenu->id == $megamenu->megamenu_id)
                                                    <li class="nav-item">
                                                        <a href="{{url('حوزه-علمیه-خواهران'.'/'.$submenu->slug.'/'.$megamenu->slug)}}"
                                                           class="dropdown-item">{{$megamenu->title}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            @foreach($menus as $menu)
                                @if($menu->submenu == 0)
                                    <li class="nav-item">
                                        <a href="{{url($menu->slug)}}" class="nav-link">{{$menu->title}}</a>
                                    </li>
                                @elseif($menu->submenu == 1)
                                    <li class="nav-item dropdown">
                                        <a href="{{url($menu->slug)}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                            {{$menu->title}}
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach($submenus as $submenu)
                                                @if($submenu->megamenu_id == null && $menu->id == $submenu->menu_id)
                                                    <li class="nav-item">
                                                        <a href="{{url($menu->slug.'/'.$submenu->slug)}}"
                                                           class="dropdown-item">{{$submenu->title}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                    <!-- Authentication Links -->
                    <div class="others-options d-flex ms-auto">
                        @if(!Auth::check())
                            <a href="{{url('register')}}" class="default-btn me-2">
                                <i class="bx bxs-user"></i>ثبت نام<span></span>
                            </a>
                            <a href="{{url('login')}}" class="default-btn">
                                <i class="bx bx-log-in"></i>ورود<span></span>
                            </a>
                        @else
                            <a href="{{url('logout')}}" class="default-btn">
                                <i class="bx bx-log-out"></i>{{Auth::user()->name}}<span></span>
                            </a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<div class="modal modal-right fade" id="mobileMenu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">منو</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Authentication Links -->
                <div class="others-options d-flex mt-3">
                    @if(!Auth::check())
                        <a href="{{url('register')}}" class="btn btn-outline-primary mr-2">
                            <i class="bx bxs-user"></i> ثبت نام
                        </a>
                        <a href="{{url('login')}}" class="btn btn-primary">
                            <i class="bx bx-log-in"></i> ورود
                        </a>
                    @else
                        <a href="{{url('logout')}}" class="btn btn-danger">
                             {{Auth::user()->name}}<i class="bx bx-log-out"></i>
                        </a>
                    @endif
                </div>
                <ul class="navbar-nav">
                    <!-- Exactly same menu structure as desktop, but in modal -->
                    @if(request()->segment(1) == 'حوزه-علمیه-خواهران')
                        <!-- ... existing code ... -->
                    @else
                        @foreach($menus as $menu)
                            @if($menu->submenu == 0)
                                <li class="nav-item">
                                    <a href="{{url($menu->slug)}}" class="nav-item">{{$menu->title}}</a>
                                </li>
                            @elseif($menu->submenu == 1)
                                <li class="nav-item dropdown">
                                    <a href="{{url($menu->slug)}}" class="nav-item dropdown-toggle" data-toggle="dropdown">
                                        {{$menu->title}}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($submenus as $submenu)
                                            @if($submenu->megamenu_id == null && $menu->id == $submenu->menu_id)
                                                <li class="nav-item">
                                                    <a href="{{url($menu->slug.'/'.$submenu->slug)}}" class="dropdown-item">{{$submenu->title}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-right .modal-dialog {
        max-width: 100%;
        margin: 0;
        margin-left: auto;
        height: 100%;
    }
    .modal-right .modal-content {
        height: 100vh;
        border: none;
        border-radius: 0;
    }
    .dropdown-toggle::after {
        margin-right: 5px;
    }
</style>

<script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();

        // برای بستن dropdown با کلیک خارج از آن
        $(document).on('click', function(event) {
            var $trigger = $(".dropdown-toggle");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $(".dropdown-menu").removeClass('show');
            }
        });
    });
</script>
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
