@extends('master')
@section('style')
@endsection
@section('main')
    @include('sweetalert::alert')

        <!-- Start Preloader Area -->
        <div class="preloader-area">
            <div class="spinner">
                <div class="inner">
                    <div class="disc"></div>
                    <div class="disc"></div>
                    <div class="disc"></div>
                </div>
            </div>
        </div>
        <!-- End Preloader Area -->

        <!-- Start Login Area -->
        <section class="login-area">
            <div class="row m-0 justify-content-center align-items-center">
{{--                <div class="col-lg-6  p-0 order-1 col-md-12 order-md-2">--}}
{{--                    <div class="login-image">--}}
{{--                        <img src="{{asset('site/img/login-bg.jpg')}}" alt="image">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-lg-6  p-0 order-2 col-md-12 order-md-1">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">
                                    <div class="logo">
                                        <a href={{url('/')}}><img src="{{asset('site/img/logo/dark-logo.png')}}" alt="image"></a>
                                    </div>

                                    <h3>خوش آمدید</h3>
                                    <p>اگر ثبت نام نکرده اید جهت ثبت نام : <a href={{url('/login')}}>اینجا کلیک کنید</a></p>

                                    <form method="POST" action="{{ route('login-user') }}" class="form-account">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="آدرس ایمیل شما" required value=" " class="form-control @error('email') is-invalid @enderror" >
                                        </div>

                                        <div class="form-group">
                                            <input type="password" id="pass"  placeholder="کلمه عبور" required name="password" autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" />
                                        </div>

                                        <button type="submit" class="default-btn"><i class="bx bxs-hot"></i>ورود<span></span></button>

                                        <div class="forgot-password text-right">
                                            <a href="#">فراموشی رمز عبور؟</a>
                                        </div>
                                        <div class="form-account-title">
                                            <a href="{{url('login/google')}}" class="google"><i class="bx bxl-google"></i> ورود با حساب گوگل </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
@endsection
