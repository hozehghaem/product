@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">سامانه های حوزوی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <!-- سامانه جامع طلاب -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('site/img/partner-image/2.png') }}" class="card-img-top p-3"
                         alt="سامانه جامع طلاب" style="height: 150px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">سامانه جامع طلاب</h5>
                        <p class="card-text">این سامانه برای مدیریت اطلاعات و سوابق آموزشی طلاب حوزه‌های علمیه طراحی شده
                            و شامل امکاناتی برای ثبت نام، پیگیری وضعیت تحصیلی و درخواست‌های مختلف است.</p>
                    </div>
                </div>
            </div>

            <!-- سامانه آموزش مجازی حوزه -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('site/img/partner-image/1.png') }}" class="card-img-top p-3"
                         alt="سامانه جامع طلاب" style="height: 150px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">سامانه آموزش مجازی حوزه</h5>
                        <p class="card-text">این سامانه برای ارائه دروس و برنامه‌های آموزشی به صورت آنلاین برای طلاب و
                            علاقه‌مندان به علوم دینی طراحی شده و امکان دسترسی به کلاس‌ها و منابع درسی را فراهم
                            می‌کند.</p>
                    </div>
                </div>
            </div>

            <!-- سامانه امور مالی طلاب -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('site/img/partner-image/2.png') }}" class="card-img-top p-3"
                         alt="سامانه جامع طلاب" style="height: 150px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">سامانه امور مالی طلاب</h5>
                        <p class="card-text">این سامانه به طلاب کمک می‌کند تا وضعیت مالی و دریافت‌های خود را مدیریت کنند
                            و شامل اطلاعات مرتبط با کمک هزینه‌ها و امور مالی است.</p>
                    </div>
                </div>
            </div>

            <!-- سامانه مرکز مدیریت حوزه -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('site/img/partner-image/3.png') }}" class="card-img-top p-3"
                         alt="سامانه جامع طلاب" style="height: 150px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">سامانه مرکز مدیریت حوزه</h5>
                        <p class="card-text">این سامانه جهت مدیریت کلی امور حوزه‌های علمیه و پشتیبانی از فعالیت‌های
                            علمی، فرهنگی و اجرایی طلاب و اساتید طراحی شده است.</p>
                    </div>
                </div>
            </div>

            <!-- سامانه نشر حوزه -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="{{ asset('site/img/partner-image/4.png') }}" class="card-img-top p-3"
                         alt="سامانه جامع طلاب" style="height: 150px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">سامانه نشر حوزه</h5>
                        <p class="card-text">این سامانه به منظور انتشار و توزیع کتب و مقالات علمی حوزوی طراحی شده و
                            دسترسی آسان به منابع آموزشی و پژوهشی را فراهم می‌کند.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
