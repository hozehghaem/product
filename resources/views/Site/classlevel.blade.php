@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">مقاطع تحصیلی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 10)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <a href="{{url('حوزه-علمیه-خواهران/معاونت-آموزش/مقاطع-تحصیلی/'.$post->slug)}}"><h5
                                        class="card-title text-center">{{$post->title}}</h5>
                                </a>
                                <p class="card-text">{!! Str::limit(strip_tags($post->description), 100, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
