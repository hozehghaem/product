@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">پذیرش و گزینش</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- مراحل پذیرش -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center">مراحل پذیرش</h3>
                <ul class="list-unstyled mt-4">
                    <li class="mb-3">
                        <h5>مرحله اول: ثبت‌نام آنلاین و ارسال مدارک اولیه</h5>
                        <p class="text-muted">متقاضیان ابتدا باید فرم ثبت‌نام را تکمیل و مدارک اولیه را به صورت آنلاین ارسال کنند.</p>
                    </li>
                    <li class="mb-3">
                        <h5>مرحله دوم: بررسی مدارک و دعوت به مصاحبه</h5>
                        <p class="text-muted">مدارک ارسالی داوطلبان توسط کارشناسان بررسی و در صورت تأیید اولیه، برای مصاحبه دعوت می‌شوند.</p>
                    </li>
                    <li class="mb-3">
                        <h5>مرحله سوم: ارزیابی علمی و اخلاقی</h5>
                        <p class="text-muted">در این مرحله، داوطلبان از نظر علمی و اخلاقی مورد ارزیابی قرار می‌گیرند تا شایستگی ورود به حوزه علمیه را داشته باشند.</p>
                    </li>
                    <li class="mb-3">
                        <h5>مرحله چهارم: اعلام نتایج و ثبت‌نام نهایی</h5>
                        <p class="text-muted">نتایج نهایی به داوطلبان اعلام شده و پذیرفته‌شدگان می‌توانند ثبت‌نام نهایی خود را تکمیل کنند.</p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- مدارک مورد نیاز -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center">مدارک مورد نیاز</h3>
                <ul class="list-unstyled mt-3">
                    <li><i class="fas fa-id-card me-2"></i>تصویر کارت ملی</li>
                    <li><i class="fas fa-graduation-cap me-2"></i>مدرک تحصیلی</li>
                    <li><i class="fas fa-file-medical me-2"></i>فرم تکمیل‌شده سلامت</li>
                    <li><i class="fas fa-id-badge me-2"></i>کپی شناسنامه</li>
                </ul>
            </div>
        </div>

        <!-- نکات مهم برای داوطلبان -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center">نکات مهم برای داوطلبان</h3>
                <p class="text-muted mt-3">
                    لطفاً قبل از ثبت‌نام، از واجد شرایط بودن خود مطمئن شوید و تمامی مدارک را به درستی آماده کنید. پذیرش نهایی منوط به تأیید صحت مدارک و نتایج مصاحبه می‌باشد.
                </p>
            </div>
        </div>

{{--        <!-- دکمه ثبت‌نام -->--}}
{{--        <div class="text-center mt-5">--}}
{{--            <a href="#" class="btn btn-primary btn-lg">ثبت‌نام آنلاین</a>--}}
{{--        </div>--}}
    </div>
@endsection
