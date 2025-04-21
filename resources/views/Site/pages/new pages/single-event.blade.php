@extends('master')
@section('style')
@endsection
@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-3">عنوان رویداد نمونه</h2>
                <img src="https://via.placeholder.com/800x400.png?text=تصویر+رویداد" class="img-fluid rounded mb-4" alt="تصویر رویداد">

                <p>
                    این یک متن نمونه برای توضیح کامل درباره همایش یا رویدادی است که در حوزه علمیه برگزار می‌شود.
                    اطلاعات تکمیلی، اهداف، سخنرانان، زمان و مکان در این بخش آورده می‌شود تا کاربر بتواند تصمیم به شرکت در آن بگیرد.
                </p>

                <a href="{{ url('/events/1/register') }}" class="btn btn-success">ثبت‌نام در این رویداد</a>
            </div>
        </div>
    </div>
@endsection
