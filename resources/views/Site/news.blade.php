@extends('master')
@section('style')
@endsection
@section('main')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>اخبار و رویدادها</h1>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Filter Area -->
    <div class="container my-4">
        <div class="row">
            <!-- ستون اول: دراپ‌دان برای دسته‌بندی مطالب -->
            <div class="col-md-4 mb-3">
                <select class="form-control">
                    <option value="" disabled selected>انتخاب دسته‌بندی</option>
                    <option value="category1">دسته‌بندی 1</option>
                    <option value="category2">دسته‌بندی 2</option>
                    <option value="category3">دسته‌بندی 3</option>
                </select>
            </div>

            <!-- ستون دوم: دراپ‌دان برای مرتب‌سازی بر اساس زمان انتشار -->
            <div class="col-md-4 mb-3">
                <select class="form-control">
                    <option value="" disabled selected>مرتب‌سازی بر اساس</option>
                    <option value="newest">جدیدترین</option>
                    <option value="oldest">قدیمی‌ترین</option>
                </select>
            </div>

            <!-- ستون سوم: فیلد جستجو -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="جستجو...">
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary" style="background-color: #58A399">تایید</button>
            </div>
        </div>
    </div>
    <!-- End Filter Area -->


    <!-- Start Blog Area -->
    <section class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="post-image">
                            <a href="{{url('/single-news')}}"><img src="{{asset('/site/img/media/mahdia3.jpg')}}" alt="image"></a>

                            <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                        </div>

                        <div class="post-content">
                            <h3><a href="{{url('/single-news')}}">حجاب و عفاف و تاثیر آن بر جامعه</a></h3>

                            <div class="post-info">
                                <div class="post-by">
                                    <img src="{{asset('/site/img/author-image/6.jpg')}}" alt="image">

                                    <h6>زهرا محمدی</h6>
                                </div>

                                <div class="details-btn">
                                    <a href="{{url('/single-news')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        <a href="#" class="prev page-numbers"><i class='bx bxs-arrow-to-right'></i></a>
                        <a href="#" class="page-numbers">1</a>
                        <span class="page-numbers current" aria-current="page">2</span>
                        <a href="#" class="page-numbers">3</a>
                        <a href="#" class="next page-numbers"><i class='bx bxs-arrow-to-left'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->



@endsection
@section('script')
@endsection
