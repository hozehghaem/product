@extends('master')
@section('style')
@endsection
@section('main')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>کرسی های ما</h2>
                <p>اخبار کرسی های ما</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Blog Area -->
    <section class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    @if($post->posttype == 6)
                        <div class="col-md-4 py-4 z-3">
                            <div class="card br-16 h-100">
                                <img src="{{ asset($post->image) }}" class="" alt="{{ $post->title }}"
                                     style="border-top-right-radius: 16px; border-top-left-radius: 16px">
                                <div class="card-body">
                                    <h4 class="post-title">{{ $post->title }}</h4>
                                    <p class="post-description">{{ Str::limit(strip_tags($post->description), 50, '...') }}
                                    </p>
                                    <a href="{{ url('حوزه-علمیه-خواهران/اخبار/'.$post->slug) }}"
                                       class="btn btn-primary btn-sm">مشاهده بیشتر</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>        </div>
    </section>
    <!-- End Blog Area -->



@endsection


