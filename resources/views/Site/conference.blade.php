@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">همایش‌ها و کنگره‌ها</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">

        {{-- بخش همایش‌ها --}}
        <h4 class="mb-4">همایش‌ها</h4>
        <div class="row">
            {{-- کارت‌های همایش‌ها --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-title">همایش بین‌المللی علوم اسلامی</h5>
                        <p class="card-text"><strong>محل برگزاری:</strong> تهران، مرکز همایش‌ها</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۲/۰۸/۱۵</p>
                        <p class="card-text">این همایش به بررسی جدیدترین تحقیقات در زمینه علوم اسلامی پرداخته و اساتید برجسته‌ای سخنرانی خواهند داشت.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h6 class="card-title">همایش فقه و اخلاق</h6>
                        <p class="card-text"><strong>محل برگزاری:</strong> قم، دانشگاه معارف اسلامی</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۲/۰۹/۲۰</p>
                        <p class="card-text">در این همایش به بررسی تطبیقی بین فقه و اخلاق و چالش‌های آن پرداخته خواهد شد.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h6 class="card-title">همایش پژوهش‌های نوین دینی</h6>
                        <p class="card-text"><strong>محل برگزاری:</strong> اصفهان، سالن اجتماعات</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۲/۱۰/۰۵</p>
                        <p class="card-text">این همایش به معرفی دستاوردهای جدید پژوهشی در علوم دینی می‌پردازد.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- بخش کنگره‌ها --}}
        <h4 class="mt-5 mb-4">کنگره‌ها</h4>
        <div class="row">
            {{-- کارت‌های کنگره‌ها --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h6 class="card-title">کنگره بین‌المللی وحدت اسلامی</h6>
                        <p class="card-text"><strong>محل برگزاری:</strong> مشهد، سالن اجتماعات</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۲/۱۱/۱۰</p>
                        <p class="card-text">این کنگره با هدف ترویج وحدت بین مسلمانان و همبستگی اسلامی برگزار می‌شود.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">

                    <div class="card-body">
                        <h6 class="card-title">کنگره فقه و قانون</h6>
                        <p class="card-text"><strong>محل برگزاری:</strong> شیراز، مرکز پژوهش‌های اسلامی</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۲/۱۲/۱۵</p>
                        <p class="card-text">به بررسی نقش فقه در قوانین معاصر و تحولات آن در سطح ملی و بین‌المللی می‌پردازد.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h6 class="card-title">کنگره اندیشه‌های دینی و معاصر</h6>
                        <p class="card-text"><strong>محل برگزاری:</strong> تبریز، دانشگاه دینی</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۳/۰۱/۰۸</p>
                        <p class="card-text">این کنگره با هدف تبادل اندیشه‌ها در حوزه علوم دینی و بررسی چالش‌های جدید برگزار می‌شود.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
