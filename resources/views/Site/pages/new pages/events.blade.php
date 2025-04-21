@extends('master')
@section('style')
@endsection
@section('main')
    <div class="container my-5">
        <h2 class="mb-4 text-center">رویدادهای حوزه علمیه</h2>

        <div class="row">
            @for ($i = 1; $i <= 3; $i++)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://via.placeholder.com/400x250.png?text=رویداد+{{ $i }}" class="card-img-top" alt="رویداد {{ $i }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">عنوان رویداد {{ $i }}</h5>
                            <p class="card-text">توضیح کوتاه در مورد رویداد شماره {{ $i }} که در حوزه علمیه برگزار می‌شود.</p>
                            <a href="{{ url('/events/' . $i) }}" class="mt-auto btn btn-primary">مشاهده جزئیات</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
