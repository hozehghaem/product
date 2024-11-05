@extends('master')
@section('style')
@endsection
@section('main')
    <style>
        .alert{
            font-family: "Vazirmatn RD FD", sans-serif;
        }
    </style>

    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">دائره امتحانات</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- بخش اطلاعیه‌ها -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    <strong>اطلاعیه:</strong> مهلت ثبت‌نام در امتحانات پایان ترم از تاریخ ۱۰ آبان تا ۲۰ آبان می‌باشد.
                </div>
            </div>
        </div>

        <!-- بخش زمان‌بندی امتحانات -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg m-2">
                    <div class="card-body text-center">
                        <h4 class="card-title">زمان‌بندی امتحانات</h4>
                        <p class="card-text">
                            زمان‌بندی دقیق امتحانات حوزه برای هر دوره و ترم. لطفا جهت اطلاع از برنامه امتحانات، فایل زمان‌بندی را دانلود کنید.
                        </p>
                        <a href="#" class="btn btn-primary">دانلود زمان‌بندی</a>
                    </div>
                </div>
            </div>

            <!-- بخش ثبت‌نام امتحانات -->
            <div class="col-md-6">
                <div class="card border-0 shadow-lg m-2">
                    <div class="card-body text-center">
                        <h4 class="card-title">ثبت‌نام در امتحانات</h4>
                        <p class="card-text">
                            برای ثبت‌نام در امتحانات پایان ترم، از لینک زیر استفاده کنید و مراحل ثبت‌نام را تکمیل کنید.
                        </p>
                        <a href="#" class="btn btn-primary">ثبت‌نام در امتحانات</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- بخش قوانین و مقررات امتحانات -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title text-center">قوانین و مقررات امتحانات</h4>
                        <p class="card-text mt-3">
                        <ul>
                            <li>حضور در امتحانات با کارت شناسایی الزامی است.</li>
                            <li>استفاده از هرگونه وسایل الکترونیکی در جلسه امتحان ممنوع می‌باشد.</li>
                            <li>غیبت در جلسه امتحان بدون دلیل موجه به عنوان نمره صفر تلقی می‌شود.</li>
                            <li>نتایج امتحانات پس از بررسی و تأیید، در سامانه قرار می‌گیرد.</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- بخش مشاهده نتایج امتحانات -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body text-center">
                        <h4 class="card-title">مشاهده نتایج امتحانات</h4>
                        <p class="card-text">
                            پس از اعلام نتایج امتحانات، می‌توانید با استفاده از دکمه زیر نتایج خود را مشاهده کنید.
                        </p>
                        <a href="#" class="btn btn-primary">مشاهده نتایج</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
