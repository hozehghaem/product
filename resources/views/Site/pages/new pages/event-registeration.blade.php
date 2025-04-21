@extends('master')
@section('style')
@endsection
@section('main')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="mb-4 text-center">فرم ثبت‌نام در: عنوان رویداد نمونه</h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="#" method="POST" class="p-4 shadow-sm bg-light rounded">
                    @csrf

                    <div class="mb-3">
                        <label for="first_name" class="form-label">نام</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">نام خانوادگی</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">شماره تلفن</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
