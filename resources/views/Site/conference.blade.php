@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">همایش‌ها و کنگره‌ها</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <h4 class="mb-4">همایش‌ها و کنگره ها</h4>
        <div class="row">
            {{-- کارت‌های همایش‌ها --}}
            @foreach($posts as $post)
                @if($post->posttype == 12)
                    <div class="col-md-4 py-4">
                        <div class="card br-16 h-100">
                            <img src="{{ asset($post->image) }}" class="" alt="{{ $post->title }}"
                                 style="border-top-right-radius: 16px; border-top-left-radius: 16px">
                            <div class="card-body">
                                <h4 class="post-title">{{ $post->title }}</h4>
                                <p class="post-description">{{ Str::limit(strip_tags($post->description), 50, '...') }}
                                </p>
                                <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/همایش-ها/'.$post->slug) }}"
                                   class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="post-description">{{ Str::limit(strip_tags($post->description), 50, '...') }}
                        </p>
                        <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/همایش-ها/'.$post->slug) }}"
                           class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h6 class="card-title">همایش فقه و اخلاق</h6>
                        <p class="card-text"><strong>محل برگزاری:</strong> قم، دانشگاه معارف اسلامی</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۲/۰۹/۲۰</p>
                        <p class="card-text">در این همایش به بررسی تطبیقی بین فقه و اخلاق و چالش‌های آن پرداخته خواهد
                            شد.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{asset('/site/img/conference.jpg')}}" class="img-fluid" alt="">
                    <div class="card-body">
                        <h6 class="card-title">همایش پژوهش‌های نوین دینی</h6>
                        <p class="card-text"><strong>محل برگزاری:</strong> اصفهان، سالن اجتماعات</p>
                        <p class="card-text"><strong>تاریخ:</strong> ۱۴۰۲/۱۰/۰۵</p>
                        <p class="card-text">این همایش به معرفی دستاوردهای جدید پژوهشی در علوم دینی می‌پردازد.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
