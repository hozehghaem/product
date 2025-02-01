@extends('master')
@section('style')
    <style>
        .green-pattern-box {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-bottom: #215c54 solid;
        }
    </style>
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">محتوای درسی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @foreach($posts as $post)
                @if($post->posttype == 11)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="green-pattern-box text-center">
                                <a href="{{url('حوزه-علمیه-خواهران/معاونت-آموزش/محتوای-درسی/'.$post->slug)}}">
                                    <img src="{{asset('site/img/logo-without-text.png')}}" alt="">

                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{url('حوزه-علمیه-خواهران/معاونت-آموزش/محتوای-درسی/'.$post->slug)}}"><h5
                                        class="card-title text-center">{{$post->title}}</h5>
                                </a>
{{--                                <p class="card-text">{!! Str::limit(strip_tags($post->description), 100, '...') !!}</p>--}}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
