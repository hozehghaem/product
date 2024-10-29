@extends('master')
@section('style')
@endsection
@section('main')

    <body>
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>گالری تصاویر</h2>
                <p>تصاویر دوره ها، نشست ها و سخنرانی ها</p>

            </div>
        </div>
    </div>
    <section class="gallery-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="portfolio-filter pt-5 pb-5">
                        <li data-filter="*" class="active">همه</li>
                        <li data-filter=".mahdaviat">مهدویت</li>
                        <li data-filter=".family">خانواده</li>
                        <li data-filter=".hijab">حجاب</li>
                        <li data-filter=".media">رسانه</li>
                    </ul>
                </div>
                <!-- end col-lg-12 -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="generic-portfolio-list row">
                        <div class="generic-portfolio-item col-lg-4 all">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/3.jpg')}}" data-fancybox="gallery" data-caption="Image 1">
                                    <img src="{{asset('site/img/blog-image/3.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 mahdaviat family">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/1.jpg')}}" data-fancybox="gallery" data-caption="Image 2">
                                    <img src="{{asset('site/img/blog-image/1.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 family media">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/3.jpg')}}" data-fancybox="gallery" data-caption="Image 3">
                                    <img src="{{asset('site/img/blog-image/3.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 media hijab">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/1.jpg')}}" data-fancybox="gallery" data-caption="Image 4">
                                    <img src="{{asset('site/img/blog-image/1.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 media hijab">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/2.jpg')}}" data-fancybox="gallery" data-caption="Image 5">
                                    <img src="{{asset('site/img/blog-image/2.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 media management">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/3.jpg')}}" data-fancybox="gallery" data-caption="Image 6">
                                    <img src="{{asset('site/img/blog-image/3.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 family hijab">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/3.jpg')}}" data-fancybox="gallery" data-caption="Image 7">
                                    <img src="{{asset('site/img/blog-image/3.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 mahdaviat hijab family">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/media/mahdia2.jpg')}}" data-fancybox="gallery" data-caption="Image 8">
                                    <img src="{{asset('site/img/media/mahdia2.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 mahdaviat family">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="{{asset('site/img/blog-image/1.jpg')}}" data-fancybox="gallery" data-caption="Image 9">
                                    <img src="{{asset('site/img/blog-image/1.jpg')}}" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="bx bx-md bx-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                    </div>
                    <!-- end portfolio-list -->
                </div>
                <!-- end col-lg-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    </body>



@endsection

