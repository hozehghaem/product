@extends('master')
@section('style')
@endsection
@section('main')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>سلسله نشست ها</h2>
                <p>اخبار نشست های ما</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Blog Area -->
    <section class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area" id="secondary">
                        <section class="widget widget_search">
                            <form class="search-form">
                                <label>
                                    <span class="screen-reader-text">جستجو کنید:</span>
                                    <input type="search" class="search-field" placeholder="جستجو ...">
                                </label>
                                <button type="submit"><i class='bx bx-search-alt'></i></button>
                            </form>
                        </section>

                        <section class="widget widget_spacle_posts_thumb">
                            <h3 class="widget-title">نشست های محبوب</h3>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <time datetime="2019-06-30">10 دی 1398</time>
                                    <h4 class="title usmall"><a href="#">لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد.</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <time datetime="2019-06-30">10 دی 1398</time>
                                    <h4 class="title usmall"><a href="#">لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد.</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>

                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <time datetime="2019-06-30">10 دی 1398</time>
                                    <h4 class="title usmall"><a href="#">لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد.</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>
                        </section>

                        <section class="widget widget_categories">
                            <h3 class="widget-title">دسته بندی ها</h3>

                            <ul>
                                <li><a href="#">مهدویت</a></li>
                                <li><a href="#">امام شناسی</a></li>
                                <li><a href="#">فقه و تدین</a></li>
                                <li><a href="#">خانواده</a></li>
                                <li><a href="#">دسته بندی نشده</a></li>
                            </ul>
                        </section>

                        <section class="widget widget_archive">
                            <h3 class="widget-title">بایگانی ها</h3>

                            <ul>
                                <li><a href="#">مهر 1398</a></li>
                                <li><a href="#">آبان 1398</a></li>
                                <li><a href="#">آذر 1398</a></li>
                            </ul>
                        </section>

                    </aside>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="{{url('/single-meeting')}}"><img src="{{url('/site/img/blog-image/1.jpg')}}" alt="image"></a>

                                    <div class="date"><i class='bx bx-calendar'></i> 01 دی 1398</div>
                                </div>

                                <div class="post-content">
                                    <h3><a href="{{url('/single-meeting')}}">نشست خانواده و تربیت</a></h3>

                                    <div class="post-info">
                                        <div class="post-by">
                                            <img src="{{url('/site/img/author-image/1.jpg')}}" alt="image">

                                            <h6>فاطمه محمدی</h6>
                                        </div>

                                        <div class="details-btn">
                                            <a href="{{url('/single-meeting')}}"><i class="bx bx-left-arrow-alt"></i></a>
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

            </div>
        </div>
    </section>
    <!-- End Blog Area -->



@endsection


