@extends('layouts.user')
@section('title')
    <title>تایید شماره موبایل کاربران سایت</title>

@endsection
@section('main')
    <section class="d-flex vh-100 align-items-center">
        <div class="container">
            @include('sweetalert::alert')
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="card shadow-lg islamic-card br-16">
                        <div class="card-header text-center ">
                            <h3 class="islamic-title">تایید شماره موبایل</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center">
                                برای شماره همراه {{ Session::get('phone') }} کد تایید ارسال گردید.
                            </p>
                            <div class="text-center mb-3">
                                <a href="{{ route('remember') }}" class="btn btn-link">ویرایش شماره</a>
                            </div>

                            <form method="POST" action="{{ route('verify.phone.token') }}">
                                @csrf
                                <div class="form-group text-center ">
                                    <label for="code" class="islamic-label text-center">کد فعال سازی پیامک شده را وارد کنید</label>
                                    <input type="text" name="code" id="code_input" class="form-control text-center islamic-input" maxlength="7" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" id="sender">تایید کد</button>
                            </form>

                            <div class="mt-3 bg-dark text-center">
                                <p id="countdown" class="text-warning">زمان باقی مانده: 02:59</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@php
    $times = \App\Models\ActiveCode::select('expired_at')->whereUser_id(\Illuminate\Support\Facades\Session::get('auth.user_id'))->first();
    $time_now = jdate();
//    dd($times);
@endphp
@endsection
@section('script')
    @if ($errors->any())
        <script>
            // نمایش خطاها با SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
    <script>
        function getRemainingTimeFromDatabase() {
            // کدی برای اتصال به بانک اطلاعاتی و دریافت زمان باقی مانده
            // مثلا:
            // const remainingTime = اتصال به بانک اطلاعاتی و دریافت زمان باقی مانده
            const remainingTime = @if($times) {{jdate($times->expired_at)->getTimestamp() - jdate()->getTimestamp()}}; @else 0 @endif// فرضا زمان باقی مانده در ثانیه
            return remainingTime;
        }

        function displayRemainingTime() {
            let remainingTime = getRemainingTimeFromDatabase(); // دریافت زمان باقی مانده از بانک اطلاعاتی
            let intervalId;

            function updateRemainingTime() {
                const minutes = Math.floor(remainingTime / 60);
                const seconds = remainingTime % 60;
                document.getElementById('countdown').innerText = `زمان باقی مانده: ${minutes}:${seconds}`;

                if (remainingTime <= 0) {
                    clearInterval(intervalId);
                    document.getElementById('countdown').innerText = 'زمان اعتبار کد پیامک شده به پایان رسیده';
                    document.getElementById('code_input').disabled = true; // غیرفعال کردن ورودی
                    document.getElementById('sender').disabled = true; // غیرفعال کردن ورودی

                } else {
                    remainingTime--;
                }
            }

            updateRemainingTime();
            intervalId = setInterval(updateRemainingTime, 1000);
        }

        displayRemainingTime();
    </script>
@endsection
