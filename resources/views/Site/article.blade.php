@extends('master')

@section('style')
    <style>
        .table thead th {
            font-family: 'Vazirmatn RD FD', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .table tbody td {
            font-family: 'Vazirmatn RD FD', sans-serif;
            font-size: 14px;
        }
    </style>
@endsection

@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center">پایان‌نامه‌ها و مقالات</h2>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h4 class="text-center mt-5 mb-4">مقالات</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">عنوان</th>
                    <th scope="col">نویسنده</th>
                    <th scope="col">تاریخ انتشار</th>
                    <th scope="col">خلاصه</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    @if($post->posttype == 15)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->writer ?? '---' }}</td>
                            <td>{{ $post->date ?? '---' }}</td>
{{--                            <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($post->date)->format('Y/m/d') }}</td>--}}
                            <td>{{ Str::limit(strip_tags($post->description), 100) }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
