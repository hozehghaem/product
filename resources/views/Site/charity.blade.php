@extends('master')
@section('style')
@endsection
@section('main')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>موسسه خیریه حوزه قائم</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <div class="container my-4">
        <div class="row">
            <div class="col-12 mb-4 py-4">
                <p>
                    لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.
                </p>
            </div>
        </div>
        <div class="row py-4">
            <!-- اولین تصویر و متن -->
            <div class="col-md-6 mb-4">
                <img src="{{asset('/site/img/qarz.jpg')}}" class="img-fluid" alt="تصویر قرض الحسنه 1">
            </div>
            <div class="col-md-6 mb-4">
                <h3 class="text-center text-md-right pb-4">وام قرض الحسنه</h3>
                <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.</p>
            </div>
        </div>
        <div class="row py-8">
            <!-- دومین تصویر و متن -->
            <div class="col-md-6 mb-4 order-md-2">
                <img src="{{asset('/site/img/qarz2.jpg')}}" class="img-fluid float-left" alt="تصویر قرض الحسنه 2" >
            </div>
            <div class="col-md-6 mb-4 order-md-1">
                <h3 class="text-center text-md-right pb-4">بدون بهره و ربا</h3>
                <p>
                    در بخش انتشارات فرهنگی و دینی، مرکز نشر ما به انتشار کتاب‌ها و مقالات مرتبط با فرهنگ و دین می‌پردازد.
                    هدف این بخش ارتقاء سطح فرهنگی جامعه و ترویج ارزش‌های دینی و اخلاقی است.
                    کتاب‌ها و مقالات این بخش با دقت و توجه به منابع معتبر تهیه و منتشر می‌شوند.
                </p>
            </div>
        </div>
        <div class="row mb-80">
            <!-- اطلاعات تماس -->
            <div class="col-12">
                <p class="text-center">
                    برای اطلاعات بیشتر ، می‌توانید با ما تماس بگیرید:
                </p>
            </div>
        </div>
    </div>

@endsection
