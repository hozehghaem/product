@extends('master')
@section('style')
    <style>
        .activity-tag {
            font-size: 0.9rem;
            padding: 0.3rem 0.5rem;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            color: #6c757d;
        }
    </style>
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">کانون ها</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- توضیحات کانون‌ها -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body justify-content-between">
                        <h4 class="card-title">کانون نور الثقلین</h4>
                        <p class="card-text">
                            کانون نور الثقلین با هدف ایجاد زمینه فعالیت‌های قرآنی و نوحه‌خوانی به صورت تخصصی در
                            گرایش‌های
                            حفظ و قرائت قرآن کریم، تفسیر، آموزش مداحی و مقتل‌خوانی و... ویژه معلمان و قرآن‌پژوهان تشکیل
                            شده است.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body justify-content-between">
                        <h4 class="card-title">کانون زن و خانواده</h4>
                        <p class="card-text">
                            این کانون با زیرمجموعه‌های تخصصی مانند همیار خانواده و مشاوره، با هدف پاسخ به نیاز روز
                            جامعه، از جمله روانشناسی پیش از ازدواج، ارتباط بین فردی، زوج‌درمانی، روان‌درمانی اختلالات و
                            روانشناسی اعتیاد و... تأسیس شده است.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title">کانون دانش‌آموختگان</h4>
                        <p class="card-text">
                            کانون دانش‌آموختگان حوزه علمیه حضرت قائم (عج) با هدف بکارگیری استعدادها، توان، تجربه و تخصص
                            فارغ‌التحصیلان تأسیس گردیده است.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- کارت‌های فعالیت‌ها -->
        <h3 class="mb-4">فعالیت‌ها</h3>
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 9)
                    <div class="col-md-4 py-4 z-3">
                        <div class="post-card">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                            <div class="post-card-body">
                                <h4 class="post-title">{{ $post->title }}</h4>
                                <p class="post-description">{{ Str::limit(strip_tags($post->description), 40, '...') }}
                                </p>
                                <a href="{{ url('حوزه-علمیه-خواهران/مهد-کودک/'.$post->slug) }}"
                                   class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
