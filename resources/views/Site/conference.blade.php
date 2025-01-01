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
        <h4 class="mb-4 text-center">همایش‌ها و کنگره ها</h4>
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 12)
                    <div class="col-md-4 py-4">
                        <div class="card h-100">
                            <img src="{{ asset($post->image) }}" class="" alt="{{ $post->title }}">
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
        </div>
    </div>
@endsection
