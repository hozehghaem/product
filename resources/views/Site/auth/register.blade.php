@extends('master')
@section('style')
    <style>
        .preloader-area {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 9999;
        }
        .spinner .disc {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #333;
            margin: 5px;
            animation: bounce 0.6s infinite alternate;
        }
        .disc:nth-child(1) { animation-delay: 0s; }
        .disc:nth-child(2) { animation-delay: 0.2s; }
        .disc:nth-child(3) { animation-delay: 0.4s; }
        @keyframes bounce {
            0% { transform: translateY(0); }
            100% { transform: translateY(-15px); }
        }
        .signup-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .signup-content {
            padding: 50px;
        }
        @media (max-width: 768px) {
            .signup-content {
                padding: 30px;
            }
            .signup-content h3 {
                font-size: 24px;
            }
        }
    </style>
@endsection

@section('main')
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

    <!-- Start Signup Area -->
    <section class="login-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">
                                    <div class="logo text-center mb-4">
                                        <a href="{{ url('/') }}"><img src="{{ asset('site/img/logo/dark-logo.png') }}" alt="logo"></a>
                                    </div>
                                    <h2 class="text-center">ایجاد حساب کاربری در سایت</h2>
                                    <p class="text-center">در صورتی که قبلا حساب کاربری داشته اید <a href="{{ url('login') }}">وارد شوید</a></p>

                                    <form method="POST" action="{{ route('register') }}" class="form-account text-right">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" autocomplete="off" required placeholder="نام و نام خانوادگی" class="form-control @error('name') is-invalid @enderror">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" autocomplete="off" required placeholder="شماره موبایل" class="form-control @error('phone') is-invalid @enderror">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" autocomplete="off" required placeholder="آدرس ایمیل" class="form-control @error('email') is-invalid @enderror">
                                        </div>
                                        <div class="form-group">
                                            <select name="type_user" class="form-control" required>
                                                <option value="">نوع کاربری</option>
                                                @foreach(\App\Models\TypeUser::select('id', 'title_fa')->where('id','>=' , 4)->get() as $type)
                                                    <option value="{{ $type->id }}">{{ $type->title_fa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="کلمه عبور" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="تکرار کلمه عبور" class="form-control">
                                        </div>

                                        <button type="submit" class="default-btn w-100"><i class="bx bx-log-in"></i> ثبت نام <span></span></button>
                                        <div class="connect-with-social mt-3 text-center">
                                            <button type="button" class="google btn btn-outline-primary w-100"><i class="bx bxl-google"></i> ورود توسط حساب گوگل</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="col-lg-6 order-1 order-lg-2 p-0">--}}
{{--                    <div class="signup-image">--}}
{{--                        <img src="{{ asset('site/img/signup-bg.jpg') }}" alt="image">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- End Signup Area -->
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.querySelector('.preloader-area').style.display = 'none';
            }, 1000); // hides the preloader after 1 second
        });
    </script>
@endsection
