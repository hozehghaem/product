@extends('master')
@section('style')
@endsection
@section('main')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-center display-4 mb-4">محتوای درسی</h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- فیلتر جستجوی درس‌ها -->
        <div class="mb-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="#" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="جستجوی درس یا موضوع..." aria-label="Search">
                            <button class="btn btn-primary" type="submit">جستجو</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- دسته‌بندی درس‌ها -->
        <div class="row">
            <!-- دسته‌بندی: دروس قرآنی -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">دروس قرآنی</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">حفظ و تفسیر قرآن کریم</a></li>
                            <li><a href="#" class="text-decoration-none">تجوید و قرائت</a></li>
                            <li><a href="#" class="text-decoration-none">علوم قرآن</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- دسته‌بندی: دروس حدیث و روایات -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">دروس حدیث و روایات</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">احادیث و روایات اهل بیت</a></li>
                            <li><a href="#" class="text-decoration-none">اصول حدیث‌شناسی</a></li>
                            <li><a href="#" class="text-decoration-none">تفسیر حدیث</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- دسته‌بندی: دروس فقه و اصول -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">دروس فقه و اصول</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">فقه اسلامی</a></li>
                            <li><a href="#" class="text-decoration-none">اصول فقه</a></li>
                            <li><a href="#" class="text-decoration-none">فقه تطبیقی</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- دسته‌بندی‌های دیگر -->
        <div class="row">
            <!-- دسته‌بندی: دروس کلام و عقاید -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">دروس کلام و عقاید</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">کلام اسلامی</a></li>
                            <li><a href="#" class="text-decoration-none">تاریخ عقاید اسلامی</a></li>
                            <li><a href="#" class="text-decoration-none">عرفان و فلسفه</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- دسته‌بندی: دروس اخلاق و تربیت -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">دروس اخلاق و تربیت</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">اخلاق اسلامی</a></li>
                            <li><a href="#" class="text-decoration-none">تربیت دینی</a></li>
                            <li><a href="#" class="text-decoration-none">سیره تربیتی ائمه</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- دسته‌بندی: دروس زبان‌های خارجی -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">دروس زبان‌های خارجی</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">زبان انگلیسی</a></li>
                            <li><a href="#" class="text-decoration-none">زبان عربی</a></li>
                            <li><a href="#" class="text-decoration-none">زبان فارسی برای غیر فارسی‌زبانان</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
