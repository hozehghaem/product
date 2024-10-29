@extends('master')
@section('style')
@endsection
@section('main')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>نشریه</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <div class="container my-4">
        <div class="row">
            <!-- معرفی مرکز نشر -->
            <div class="col-12 mb-4 py-4">
                <p>
                    مرکز نشر ما با هدف ارتقاء سطح علمی و فرهنگی جامعه، به انتشار کتاب‌ها و مقالات علمی، فرهنگی و دینی می‌پردازد.
                    ما در تلاشیم تا با ارائه محتوای با کیفیت، نقش موثری در گسترش دانش و فرهنگ ایفا کنیم.
                </p>
            </div>
        </div>
        <div class="row py-4">
            <!-- اولین تصویر و متن -->
            <div class="col-md-6 mb-4">
                <img src={{asset('/site/img/publish-center.jpg')}} class="img-fluid" alt="تصویر مرکز نشر 1">
            </div>
            <div class="col-md-6 mb-4">
                <h3 class="text-center text-md-right pb-4">انتشارات علمی</h3>
                <p>
                    در بخش انتشارات علمی، مرکز نشر ما با همکاری پژوهشگران و اساتید برجسته، به انتشار کتاب‌ها و مقالات تخصصی در زمینه‌های مختلف علمی می‌پردازد.
                    این بخش با هدف ارتقاء سطح علمی جامعه و فراهم آوردن منابع معتبر برای پژوهشگران فعالیت می‌کند.
                </p>
            </div>
        </div>
        <div class="row py-8">
            <!-- دومین تصویر و متن -->
            <div class="col-md-6 mb-4 order-md-2">
                <img src={{asset('/site/img/publish-center2.jpg')}} class="img-fluid" alt="تصویر مرکز نشر 2">
            </div>
            <div class="col-md-6 mb-4 order-md-1">
                <h3 class="text-center text-md-right pb-4">انتشارات فرهنگی و دینی</h3>
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
                    برای اطلاعات بیشتر و سفارش کتاب‌ها، می‌توانید با ما تماس بگیرید:
                </p>
            </div>
        </div>
    </div>

@endsection
