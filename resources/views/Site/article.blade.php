@extends('master')
@section('style')
@endsection
@section('main')
    <style>
        .table thead th {
            font-family: 'Vazirmatn RD FD', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .table tbody td {
            font-family: 'Vazirmatn RD FD', sans-serif;
            font-size: 14px;
        }
    </style>
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">پایان‌نامه‌ها و مقالات</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">

        {{-- بخش پایان‌نامه‌ها --}}
        <h4 class="text-center mb-4">پایان‌نامه‌ها</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">عنوان</th>
                    <th scope="col">نویسنده</th>
                    <th scope="col">تاریخ انتشار</th>
                    <th scope="col">خلاصه</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>بررسی تطبیقی مبانی فقهی و حقوقی معاملات</td>
                    <td>محمد حسینی</td>
                    <td>۱۴۰۱/۰۵/۱۰</td>
                    <td>این پژوهش به بررسی مقایسه‌ای مبانی فقهی و حقوقی انواع معاملات پرداخته است...</td>
                </tr>
                <tr>
                    <td>نقش اجتهاد در تکامل فقه شیعه</td>
                    <td>زهرا احمدی</td>
                    <td>۱۳۹۹/۰۳/۱۵</td>
                    <td>تحلیل و بررسی اهمیت اجتهاد در تحولات فقه شیعه از دوران معاصر...</td>
                </tr>
                <tr>
                    <td>فقه و حقوق تطبیقی در قوانین بین‌الملل</td>
                    <td>علی اکبری</td>
                    <td>۱۴۰۲/۰۱/۲۰</td>
                    <td>این تحقیق بررسی مبانی حقوق تطبیقی در فقه و تأثیرات آن بر قوانین بین‌المللی را پوشش می‌دهد...</td>
                </tr>
                </tbody>
            </table>
        </div>

        {{-- بخش مقالات --}}
        <h4 class="text-center mt-5 mb-4">مقالات</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">عنوان</th>
                    <th scope="col">نویسنده</th>
                    <th scope="col">تاریخ انتشار</th>
                    <th scope="col">خلاصه</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>اصول فقه اسلامی در عصر معاصر</td>
                    <td>حسین عباسی</td>
                    <td>۱۴۰۰/۰۸/۲۳</td>
                    <td>تحلیلی بر کاربرد اصول فقه اسلامی در مسائل عصر حاضر و چالش‌های جدید آن...</td>
                </tr>
                <tr>
                    <td>مطالعه تطبیقی حقوق زن در اسلام و قوانین مدرن</td>
                    <td>نرگس رضایی</td>
                    <td>۱۳۹۸/۱۲/۰۵</td>
                    <td>این مقاله به بررسی و مقایسه حقوق زن در فقه اسلامی و دیدگاه‌های مدرن پرداخته است...</td>
                </tr>
                <tr>
                    <td>تأثیر نظریه‌های فقهی بر قانون‌گذاری اسلامی</td>
                    <td>مهدی موسوی</td>
                    <td>۱۴۰۲/۰۲/۱۲</td>
                    <td>در این مقاله نقش نظریه‌های فقهی در تدوین قوانین اسلامی بررسی می‌شود...</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
