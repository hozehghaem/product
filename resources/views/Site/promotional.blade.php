@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">فعالیت های تبلیغاتی و فرهنگی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- بخش معرفی فعالیت‌ها -->
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 13)
                    <div class="col-md-4 py-4">
                        <div class="card br-16 h-100">
                            <img src="{{ asset($post->image) }}" class="" alt="{{ $post->title }}"
                                 style="border-top-right-radius: 16px; border-top-left-radius: 16px">
                            <div class="card-body">
                                <h4 class="post-title">{{ $post->title }}</h4>
                                <p class="post-description">{{ Str::limit(strip_tags($post->description), 50, '...') }}
                                </p>
                                <a href="{{ url('حوزه-علمیه-خواهران/معاونت-پژوهش/فعالیت-های-تبلیغی/'.$post->slug) }}"
                                   class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- بخش ویژه -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="special-section text-center py-5">
                    <h2>همکاری با ما</h2>
                    <p class="mt-3 mb-4">
                        ما همواره به دنبال گسترش فعالیت‌های فرهنگی و تبلیغاتی خود هستیم. اگر شما نیز علاقه‌مند به مشارکت
                        و همکاری با ما در این حوزه هستید، می‌توانید از طریق دکمه زیر با ما در تماس باشید.
                    </p>
                    <a href="#" class="btn btn-lg btn-primary">تماس با ما</a>
                </div>
            </div>
        </div>
    </div>
@endsection
