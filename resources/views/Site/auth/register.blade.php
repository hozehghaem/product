@extends('master')
@section('style')
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
        <section class="signup-area">
            <div class="row m-0">
                <div class="col-lg-6 order-2 col-md-12 p-0 order-md-1">
                    <div class="signup-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="signup-form">
                                    <div class="logo">
                                        <a href={{url('/')}}><img src="{{asset('site/img/logo.png')}}" alt="image"></a>
                                    </div>

                                    <h3>ایجاد حساب کاربری در سایت</h3>
                                    <p> در صورتی که قبلا حساب کاربری داشته اید <a href="{{url('login')}}"> وارد شود </a></p>

                                    <form method="POST" action="{{ route('register') }}" class="form-account text-right">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" autocomplete="off" required placeholder="نام و نام خانوادگی" class="form-control @error('name') is-invalid @enderror">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" autocomplete="off" required placeholder="شماره موبایل" class="form-control @error('phone') is-invalid @enderror">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" autocomplete="off" required placeholder="آدرس ایمیل" class="form-control @error('email') is-invalid @enderror">
                                        </div>
                                        <div class="form-group">
                                            <select name="type_user" class="form-control" required>
                                                <option value="">نوع کاربری</option>
                                                @foreach(\App\Models\TypeUser::select('id' , 'title_fa')->whereIn('id' , [4,5,6,7])->get() as $type)
                                                    <option value="{{$type->id}}">{{$type->title_fa}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="کلمه عبور" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="تکرار کلمه عبور" class="form-control">
                                        </div>

                                        <button type="submit" class="default-btn"><i class="bx bx-log-in"></i>ثبت نام<span></span></button>
                                        <div class="connect-with-social">
                                            <button type="submit" class="google"><i class='bx bxl-google'></i> ورود توسط حساب گوگل</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0 order-md-2">
                    <div class="signup-image">
                        <img src="{{asset('site/img/signup-bg.jpg')}}" alt="image">
                    </div>
                </div>


            </div>
        </section>
        <!-- End Login Area -->
@endsection
@section('script')
@endsection
