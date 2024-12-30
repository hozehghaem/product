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
    <div class="container d-flex flex-column justify-content-center about-content-center align-item-center my-5 col-lg-6 py-3 align-self-center"
        style="border: 1px solid rgba(69,69,69,0.2); border-radius: 16px; box-shadow: 0 4px 32px 0 rgba(0,0,0,0.1);">
        <section class="d-flex flex-column col-lg-9 align-self-center">
            <span class="my-4 col-lg-12" style="text-align: justify;justify-content: center;align-content: center;align-self: center">{!! $contents->description !!}      </span>
            <img src="{{asset($contents->image)}}" class="my-3 d-flex flex-row" alt="">
        </section>
        <section class="d-flex flex-column col-lg-9 align-self-center">
            <span class="my-4 col-lg-12" style="text-align: justify;justify-content: center;align-content: center;align-self: center">{!! $contents->description2 !!}      </span>
            <img src="{{asset($contents->image2)}}" class="my-3 d-flex flex-row" alt="">
        </section>
        <section class="d-flex flex-column col-lg-9 align-self-center">
            <span class="my-4 col-lg-12" style="text-align: justify;justify-content: center;align-content: center;align-self: center">{!! $contents->description3 !!}      </span>
            <img src="{{asset($contents->image3)}}" class="my-3 d-flex flex-row" alt="">
        </section>
    </div>

@endsection
