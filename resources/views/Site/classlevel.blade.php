@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">مقاطع تحصیلی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            {{-- کارت مقطع مقدماتی --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">مقطع مقدماتی</h5>
                        <p class="card-text">در این مقطع، دانش‌آموزان با مبانی علوم اسلامی و مهارت‌های پایه آشنا می‌شوند.</p>
                        <ul class="list-unstyled mt-3">
                            <li><strong>اهداف:</strong></li>
                            <li>آشنایی با اصول اولیه فقه و علوم اسلامی</li>
                            <li>توسعه مهارت‌های خواندن و فهم متون دینی</li>
                            <li>ایجاد علاقه‌مندی به مباحث دینی</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- کارت مقطع میانی --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">مقطع میانی</h5>
                        <p class="card-text">این مقطع به تقویت دانش دینی و تخصصی در زمینه‌های مختلف علوم اسلامی پرداخته و مهارت‌های پیشرفته‌تری را به دانشجویان ارائه می‌دهد.</p>
                        <ul class="list-unstyled mt-3">
                            <li><strong>اهداف:</strong></li>
                            <li>درک عمیق‌تر از مبانی فقهی و اعتقادی</li>
                            <li>افزایش توانایی تحلیل متون فقهی و اصولی</li>
                            <li>پژوهش در مباحث دینی با دیدگاه‌های جدید</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- کارت مقطع عالی --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">مقطع عالی</h5>
                        <p class="card-text">این مقطع به تربیت متخصصان و پژوهشگران برجسته علوم اسلامی پرداخته و شامل مباحث عمیق‌تر و تخصصی‌تر است.</p>
                        <ul class="list-unstyled mt-3">
                            <li><strong>اهداف:</strong></li>
                            <li>تربیت اساتید و محققان علوم اسلامی</li>
                            <li>پژوهش‌های تخصصی در فقه، اصول، و کلام</li>
                            <li>ارتقای سطح علمی و عملی دانشجویان در حوزه علوم اسلامی</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
