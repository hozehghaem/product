@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">گروه های علمی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            {{-- کارت‌های گروه‌های علمی --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">گروه فقه و حقوق</h5>
                        <p class="card-text">این گروه به تحقیق و بررسی در زمینه فقه اسلامی و حقوق مرتبط با آن می‌پردازد.</p>
                        <p class="card-text"><strong>سرپرست گروه:</strong> دکتر محمد قاسمی</p>
                        <a href="#" class="btn btn-primary">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">گروه علوم قرآنی و حدیث</h5>
                        <p class="card-text">این گروه به بررسی و تفسیر آیات قرآنی و احادیث معتبر پرداخته و پژوهش‌های مختلفی انجام می‌دهد.</p>
                        <p class="card-text"><strong>سرپرست گروه:</strong> دکتر محمود رضایی</p>
                        <a href="#" class="btn btn-primary">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">گروه فلسفه و کلام اسلامی</h5>
                        <p class="card-text">تمرکز این گروه بر روی فلسفه اسلامی و مباحث کلامی مرتبط با اعتقادات اسلامی است.</p>
                        <p class="card-text"><strong>سرپرست گروه:</strong> دکتر علی هاشمی</p>
                        <a href="#" class="btn btn-primary">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">گروه تاریخ و تمدن اسلامی</h5>
                        <p class="card-text">این گروه به مطالعه تاریخ و تمدن اسلامی و تأثیرات آن بر جوامع معاصر می‌پردازد.</p>
                        <p class="card-text"><strong>سرپرست گروه:</strong> دکتر فاطمه کریمی</p>
                        <a href="#" class="btn btn-primary">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">گروه اخلاق و تربیت اسلامی</h5>
                        <p class="card-text">پژوهش‌های این گروه در حوزه‌های اخلاق و مباحث تربیتی در چارچوب آموزه‌های اسلامی صورت می‌گیرد.</p>
                        <p class="card-text"><strong>سرپرست گروه:</strong> دکتر مهدی نظری</p>
                        <a href="#" class="btn btn-primary">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
