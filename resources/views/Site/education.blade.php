@extends('master')
@section('style')
@endsection
@section('main')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>
                    معاونت آموزشی
                </h2>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <div
        class="container d-flex flex-column justify-content-center about-content-center align-item-center my-5 col-lg-6 py-3 align-self-center"
        style="border: 1px solid rgba(69,69,69,0.2); border-radius: 16px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.1);">
        <span
            class="my-4 col-lg-9" style="text-align: justify;justify-content: center;align-content: center;align-self: center">
            عنه عليه السلام : لَيسَ العِلمُ بِالتَّعَلُّمِ ، إنَّما هُوَ نورٌ يَقَعُ في قَلبِ مَن يُريدُ اللّه ُ تَبارَكَ و تَعالى أن يَهدِيَهُ ، فإن أرَدتَ العِلمَ فَاطلُب أوَّلاً في نَفسِكَ حَقيقَةَ العُبودِيَّةِ، وَ اطلُبِ العِلمَ بِاستِعمالِهِ، وَ استَفهِمِ اللّه َ يُفهِمْكَ (بحار الأنوار : 1/225/17 )
امام صادق عليه السلام: دانش به آموختن نيست، بلكه نورى است كه در دل هر كس كه خداوند تبارك و تعالى بخواهد هدايتش كند، مى افتد. بنا بر اين، اگر خواهان دانش هستى، نخست حقيقت عبوديت را در جان خودت جويا شو و دانش را از طريق به كار بستن آن بجوى و از خداوند فهم و دانايى بخواه تا تو را فهم و دانايى دهد.
حوزه علمیه حضرت قائم(عج) چیذر از سال 1346 در دو بخش برادران و خواهران آغاز به فعالیت نمود و در سال 1393 واحد خواهران زیر نظر مرکز مدیریت حوزه های علمیه در راستای تحقق رسالت خود مبنی بر ارتقاء سطح علمی بانوان با عنوان مؤسسه آموزش عالی حوزوی حضرت قائم(عج) فعالیت خود را در سه رشته کلام با گرایش امامت، تفسیر و علوم قرآنی و مشاوره خانواده با رویکرد اسلامی ادامه داد.
در حال حاضر این مؤسسه علمیه دارای رشته‌های تفسیر و علوم قرآنی و مشاوره خانواده با رویکرد اسلامی در سطح سه و تفسیر تطبیقی در سطح 4 می‌باشد.
        </span>
        <section class="d-flex flex-column col-lg-9 align-self-center">
            <h3 class="my-5 d-flex justify-content-center">
                مقاطع تحصیلی واحدها و دوره های آموزشی
            </h3>
            <a href="{{asset('/site/pdf/آشنایی با دوره های آموزشی.pdf')}}" class="default-btn my-3">آشنایی با نظام های
                آموزشی حوزه های علمیه خواهران</a>
            <a href="{{asset('/site/pdf/سطح3.pdf')}}" class="default-btn">معرفی رشته های سطح 3 حوزه های علمیه
                خواهران</a>
            <a href="{{asset('/site/pdf/سطح4.pdf')}}" class="default-btn my-3">معرفی رشته های سطح 4 حوزه های علمیه
                خواهران</a>

        </section>
        <section class="d-flex flex-column col-lg-9 align-self-center">
            <h3 class="my-5 d-flex justify-content-center">
                پذیرش و گزینش
            </h3>
            <img src="{{asset('/site/img/پذیرش 1403.webp')}}" class="my-3 d-flex flex-row" alt="">
            <a href="{{asset('/site/pdf/دفترچه سطح3.pdf')}}" class="default-btn">دفترچه راهنمای پذیرش سطح 3 حوزه های
                علمیه خواهران</a>
            <a href="{{asset('/site/pdf/دفترچه سطح4.pdf')}}" class="default-btn my-3">دفترچه راهنمای پذیرش سطح 4 حوزه
                های علمیه خواهران</a>

        </section>
        <section class="d-flex flex-column col-lg-9 align-self-center">
            <h3 class="my-5 d-flex justify-content-center">
                محتوای درسی
            </h3>
        </section>
        <section class="d-flex flex-column col-lg-9 align-self-center">
            <h3 class="my-5 d-flex justify-content-center">
                دائره امتحانات
            </h3>
            <img src="{{asset('/site/img/exams.jpg')}}" class="my-3 d-flex flex-row" alt="">

        </section>
    </div>

@endsection
