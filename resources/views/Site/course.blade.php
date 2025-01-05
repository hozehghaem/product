@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">دوره های آموزشی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- فیلتر کردن دوره‌ها -->
{{--        <div class="d-flex justify-content-center mb-5">--}}
{{--            <button class="btn btn-outline-primary mx-2">همه دوره‌ها</button>--}}
{{--            <button class="btn btn-outline-primary mx-2">فقه و اصول</button>--}}
{{--            <button class="btn btn-outline-primary mx-2">تفسیر و علوم قرآنی</button>--}}
{{--            <button class="btn btn-outline-primary mx-2">اخلاق و عرفان</button>--}}
{{--            <button class="btn btn-outline-primary mx-2">تاریخ و سیره</button>--}}
{{--        </div>--}}

        <!-- لیست دوره‌ها -->
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 3)
                    <div class="col-md-4 py-4">
                        <div class="card br-16 h-100">
                            <img src="{{ asset($post->image) }}" class="" alt="{{ $post->title }}"
                                 style="border-top-right-radius: 16px; border-top-left-radius: 16px">
                            <div class="card-body">
                                <h4 class="post-title">{{ $post->title }}</h4>
                                <p class="post-description">{{ Str::limit(strip_tags($post->description), 20, '...') }}
                                </p>
                                <a href="{{ url('حوزه-علمیه-خواهران/معاونت-فرهنگی/دوره-های-آموزشی/'.$post->slug) }}"
                                   class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        </div>    </div>
@endsection
