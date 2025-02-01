@extends('master')

@section('style')
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <style>
        /* استایل برای دکمه بستن */
        .fancybox-button--close {
            display: block !important;
            background: rgba(0, 0, 0, 0.7) !important; /* پس‌زمینه‌ی مشکی شفاف */
            color: white !important; /* رنگ سفید برای آیکون ضربدر */
            width: 40px !important;
            height: 40px !important;
            border-radius: 50%;
            font-size: 20px !important;
            top: 10px !important;
            right: 10px !important;
        }
    </style>
@endsection

@section('main')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $posts->title }}</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Service details -->
    <div class="service-details">
        <div class="container my-5"
             style="border: 1px solid rgba(69,69,69,0.2); border-radius: 16px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.1);">
            <div class="container mt-5">
                <div class="service-details-content text-center">
                    <!-- تصویر با قابلیت کلیک برای نمایش بزرگ‌تر -->
                    <a href="{{ asset($posts->image) }}" data-fancybox="gallery" data-caption="{{ $posts->title }}">
                        <img src="{{ asset($posts->image) }}" alt="{{ $posts->title }}" class="single-image"
                             style="cursor: pointer; max-width: 100%; border-radius: 10px;">
                    </a>

                    <!-- توضیحات -->
                    <p>{!! $posts->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service details -->
@endsection

@section('script')
    <!-- Fancybox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script>
        $(document).ready(function () {
            $("[data-fancybox]").fancybox({
                buttons: [
                    "zoom",       // قابلیت زوم
                    "slideShow",  // نمایش اسلایدی
                    "thumbs",     // نمایش تصاویر بندانگشتی
                    "close"       // دکمه بستن (×)
                ],
                loop: true,           // امکان نمایش چرخشی تصاویر
                keyboard: true,       // امکان استفاده از کلیدهای کیبورد برای بستن
                protect: false,       // جلوگیری از کلیک راست (اختیاری)
                animationEffect: "fade", // افکت انیمیشن هنگام باز شدن تصویر
                toolbar: true,        // نمایش نوار ابزار
                smallBtn: false       // دکمه بستن کوچک نباشد
            });
        });
    </script>
@endsection
