@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">دوره های آموزشی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- فیلتر کردن دوره‌ها -->
        <div class="d-flex justify-content-center mb-5">
            <button class="btn btn-outline-primary mx-2">همه دوره‌ها</button>
            <button class="btn btn-outline-primary mx-2">فقه و اصول</button>
            <button class="btn btn-outline-primary mx-2">تفسیر و علوم قرآنی</button>
            <button class="btn btn-outline-primary mx-2">اخلاق و عرفان</button>
            <button class="btn btn-outline-primary mx-2">تاریخ و سیره</button>
        </div>

        <!-- لیست دوره‌ها -->
        <div class="row">
            <!-- دوره ۱ -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('/site/img/speech/speech1.jpg') }}" class="card-img-top" alt="دوره تفسیر قرآن">
                    <div class="card-body">
                        <h5 class="card-title">دوره تفسیر قرآن</h5>
                        <p class="card-text">آشنایی با مبانی تفسیر قرآن کریم و بررسی موضوعات مهم در علوم قرآنی.</p>
                        <a href="#" class="btn btn-primary w-100">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- دوره ۲ -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('/site/img/speech/speech2.jpg') }}" class="card-img-top" alt="دوره تفسیر قرآن">
                    <div class="card-body">
                        <h5 class="card-title">دوره اصول فقه</h5>
                        <p class="card-text">این دوره برای آشنایی با مباحث اصول فقه و قواعد استنباط احکام شرعی طراحی شده است.</p>
                        <a href="#" class="btn btn-primary w-100">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- دوره ۳ -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('/site/img/speech/speech3.jpg') }}" class="card-img-top" alt="دوره تفسیر قرآن">
                    <div class="card-body">
                        <h5 class="card-title">دوره اخلاق اسلامی</h5>
                        <p class="card-text">آشنایی با اصول و مبانی اخلاق اسلامی و راه‌های تزکیه نفس و رشد معنوی.</p>
                        <a href="#" class="btn btn-primary w-100">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- دوره ۴ -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('/site/img/speech/speech3.jpg') }}" class="card-img-top" alt="دوره تفسیر قرآن">
                    <div class="card-body">
                        <h5 class="card-title">دوره تاریخ اسلام</h5>
                        <p class="card-text">بررسی وقایع مهم تاریخی از صدر اسلام تا دوران معاصر با تاکید بر سیره معصومین.</p>
                        <a href="#" class="btn btn-primary w-100">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- دوره ۵ -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('/site/img/speech/speech2.jpg') }}" class="card-img-top" alt="دوره تفسیر قرآن">
                    <div class="card-body">
                        <h5 class="card-title">دوره منطق</h5>
                        <p class="card-text">آموزش اصول و قواعد منطق و استدلال صحیح در تفکر و استنباط علمی.</p>
                        <a href="#" class="btn btn-primary w-100">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>

            <!-- دوره ۶ -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('/site/img/speech/speech1.jpg') }}" class="card-img-top" alt="دوره تفسیر قرآن">
                    <div class="card-body">
                        <h5 class="card-title">دوره حدیث و روایات</h5>
                        <p class="card-text">شناخت اصول علم حدیث و بررسی روایات مهم در منابع اسلامی.</p>
                        <a href="#" class="btn btn-primary w-100">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
