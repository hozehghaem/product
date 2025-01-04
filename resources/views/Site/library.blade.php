@extends('master')
@section('style')
@endsection
@section('main')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>کتابخانه</h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <div class="container card br-16 my-4">
        <div class="row">
            <!-- معرفی مرکز نشر -->
            <div class="col-12 mb-4 py-4">
                <p>
                    كتابخانه حوزه علميه حضرت قائم ( عجّل الله تعالي فرجه الشريف )
                    با درود به پيشگاه مقدّس حضرت وليّ عصر ( عج ) و در سايه‌ي عنايات حضرات معصومين ( عليهم السّلام )
                    كتابخانه ي مركزي حوزه علميه قائم ( عج ) با هدف ترويج فرهنگ مطالعه و كتابخواني‌، آماده خدمتگزاري به
                    طلّاب گرامي‌، محققين و پژوهشگران حوزه و دانشگاه‌، مي‌باشد .
                    گروه‌های ذیل مي‌توانند از منابع كتابخانه استفاده نمايند:
                    کتابخانه دارای 8000 جلد کتاب با موضوعات فقه، تفسیر، کلام، مشاوره و غیره
                    تماس با ما: 22201120 – 22203301 داخلي: 140
                </p>
            </div>
        </div>
        <div class="row py-4">
            <!-- اولین تصویر و متن -->
            <div class="col-md-6 mb-4">
                <img src={{asset('/site/img/publish-center.jpg')}} class="img-fluid" alt="تصویر مرکز نشر 1">
            </div>
            <div class="col-md-6 mb-4">
{{--                <h3 class="text-center text-md-right pb-4">انتشارات علمی</h3>--}}
                <ul>
                    <li>
                        الف- اساتيد و طلاب حوزه‌هاي علميه

                    </li>
                    <li>
                        ب- پژوهشگران حوزوي

                    </li>
                    <li>
                        ج- همكاران مركز

                    </li>
                    <li>
                        د- دانشجويان و پژوهشگران آزاد

                    </li>
                </ul>
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
                    در بخش انتشارات فرهنگی و دینی، مرکز نشر ما به انتشار کتاب‌ها و مقالات مرتبط با فرهنگ و دین
                    می‌پردازد.
                    هدف این بخش ارتقاء سطح فرهنگی جامعه و ترویج ارزش‌های دینی و اخلاقی است.
                    کتاب‌ها و مقالات این بخش با دقت و توجه به منابع معتبر تهیه و منتشر می‌شوند.
                </p>
            </div>
        </div>
        <div class="row mb-80">
            <!-- اطلاعات تماس -->
            <div class="col-12">
                <h3 class="text-center">
                    فعالیت های ما
                </h3>
            </div>
        </div>
        <h2></h2>
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 14)
                    <div class="col-md-4 py-4">
                        <div class="card br-16 h-100">
                            <img src="{{ asset($post->image) }}" class="" alt="{{ $post->title }}"
                                 style="border-top-right-radius: 16px; border-top-left-radius: 16px">
                            <div class="card-body">
                                <h4 class="post-title">{{ $post->title }}</h4>
                                <p class="post-description">{{ Str::limit(strip_tags($post->description), 40, '...') }}
                                </p>
                                <a href="{{ url('حوزه-علمیه-خواهران/کتابخانه/'.$post->slug) }}"
                                   class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        </div>
    </div>

@endsection
