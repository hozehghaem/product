@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">فعالیت های تبلیغاتی و فرهنگی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- بخش معرفی فعالیت‌ها -->
        <div class="row">
            <!-- فعالیت ۱: تبلیغات شهری -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 rounded-3">
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('site/img/blog-image/1.jpg') }}" alt="تبلیغات شهری" class="mb-3">
                        <h4 class="card-title">تبلیغات شهری</h4>
                        <p class="card-text">
                            طراحی و اجرای تبلیغات شهری با رویکرد آگاهی‌بخشی دینی و فرهنگی در سطح مختلف.
                        </p>
                        <a href="#" class="btn btn-outline-dark mt-auto">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- فعالیت ۲: برگزاری دوره‌های فرهنگی -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('site/img/blog-image/1.jpg') }}" alt="دوره‌های فرهنگی" class="mb-3">
                        <h4 class="card-title">برگزاری دوره‌های فرهنگی</h4>
                        <p class="card-text">
                            برگزاری دوره‌ها و کارگاه‌های فرهنگی با محوریت آموزش و ارتقاء سطح آگاهی دینی و اجتماعی.
                        </p>
                        <a href="#" class="btn btn-outline-dark mt-auto">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- فعالیت ۳: مراسم و همایش‌ها -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('site/img/blog-image/1.jpg') }}" alt="مراسم و همایش‌ها" class="mb-3">
                        <h4 class="card-title">مراسم و همایش‌ها</h4>
                        <p class="card-text">
                            برگزاری مراسم و همایش‌های فرهنگی، مذهبی و آموزشی برای ترویج ارزش‌ها و اصول اسلامی.
                        </p>
                        <a href="#" class="btn btn-outline-dark mt-auto">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- فعالیت ۴: تولید محتوای دینی -->
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('site/img/blog-image/1.jpg') }}" alt="تولید محتوای دینی" class="mb-3">
                        <h4 class="card-title">تولید محتوای دینی</h4>
                        <p class="card-text">
                            تولید و انتشار محتوای دینی و آموزشی در قالب‌های دیجیتال و مکتوب برای ترویج مبانی اسلامی.
                        </p>
                        <a href="#" class="btn btn-outline-dark mt-auto">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- بخش ویژه -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="special-section text-center py-5">
                    <h2>همکاری با ما</h2>
                    <p class="mt-3 mb-4">
                        ما همواره به دنبال گسترش فعالیت‌های فرهنگی و تبلیغاتی خود هستیم. اگر شما نیز علاقه‌مند به مشارکت
                        و همکاری با ما در این حوزه هستید، می‌توانید از طریق دکمه زیر با ما در تماس باشید.
                    </p>
                    <a href="#" class="btn btn-lg btn-primary">تماس با ما</a>
                </div>
            </div>
        </div>
    </div>
@endsection
