@extends('Admin.admin')
@section('title')
    <title>{{$thispage['edit_title']}}</title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/sumoselect/sumoselect-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['edit_title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $pagemanages->id)}}" method="post" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="pagemanage_id" id="pagemanage_id" data-required="1" value="{{$pagemanages->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">عنوان محتوا </p>
                                                    <input type="text" name="title" id="title" value="{{$pagemanages->title}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب صفحه</p>
                                                    <select name="submenu_id" id="submenu_id" class="form-control select-lg select2">
                                                        @foreach($submenus as $submenu)
                                                            <option value="{{$submenu->id}}" >{{$submenu->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نمایش/عدم نمایش</p>
                                                    <select name="status" id="status" class="form-control select-lg select2">
                                                        <option value="0" {{$pagemanages->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                                                        <option value="4" {{$pagemanages->status == 4 ? 'selected' : '' }}> فعال</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">فایل ویدئو</p>
                                                    <input type="file" name="file" id="file" data-required="1" class="form-control" />
                                                </div>
                                            </div>

                                            <br>
                                            <br>

                                            <div class="col-md-3">
                                                <div class="form-group" style="position: absolute;">
                                                    <p class="mg-b-10">تصویر متن بخش اول </p>
                                                    <input type="file" id="image" name="image" class="dropify" data-default-file="{{asset($pagemanages->image)}}" data-height="200">
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>

                                            <div class="col-md-12" style="margin-top: 20px;">
                                                <div class="form-group" >
                                                    <p class="mg-b-10">متن بخش اول</p>
                                                    <textarea name="text" id="editor" cols="30" rows="5" class="form-control" >{{$pagemanages->description}}</textarea>
                                                </div>
                                            </div>

                                            <br>
                                            <br>

                                            <div class="col-md-3">
                                                <div class="form-group" style="position: absolute;">
                                                    <p class="mg-b-10">تصویر متن بخش دوم </p>
                                                    <input type="file" id="image2" name="image2" class="dropify" data-default-file="{{asset($pagemanages->image2)}}" data-height="200">
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>

                                            <div class="col-md-12" style="margin-top: 20px;">
                                                <div class="form-group" >
                                                    <p class="mg-b-10">متن  بخش دوم</p>
                                                    <textarea name="text2" id="editor2" cols="30" rows="5" class="form-control" >{{$pagemanages->description2}}</textarea>
                                                </div>
                                            </div>

                                            <br>
                                            <br>

                                            <div class="col-md-3">
                                                <div class="form-group" style="position: absolute;">
                                                    <p class="mg-b-10">تصویر متن بخش سوم </p>
                                                    <input type="file" id="image3" name="image3" class="dropify" data-default-file="{{asset($pagemanages->image3)}}" data-height="200">
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>

                                            <div class="col-md-12" style="margin-top: 20px;">
                                                <div class="form-group" >
                                                    <p class="mg-b-10">متن  بخش سوم</p>
                                                    <textarea name="text3" id="editor3" cols="30" rows="5" class="form-control" >{{$pagemanages->description3}}</textarea>
                                                </div>
                                            </div>
                                            <div  class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="submit"  class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    <script>
        CKEDITOR.replace( 'editor2' );
    </script>
    <script>
        CKEDITOR.replace( 'editor3' );
    </script>
    <script>
        window.addEventListener("load", function () {
            const checkInterval = setInterval(function () {
                const notificationsArea = document.querySelector("#cke_notifications_area_editor");

                if (notificationsArea) {
                    notificationsArea.style.display = "none";
                    clearInterval(checkInterval);
                }
            }, 500);
        });
        window.addEventListener("load", function () {
            const checkInterval = setInterval(function () {
                const notificationsArea = document.querySelector("#cke_notifications_area_editor2");

                if (notificationsArea) {
                    notificationsArea.style.display = "none";
                    clearInterval(checkInterval);
                }
            }, 500);
        });
        window.addEventListener("load", function () {
            const checkInterval = setInterval(function () {
                const notificationsArea = document.querySelector("#cke_notifications_area_editor3");

                if (notificationsArea) {
                    notificationsArea.style.display = "none";
                    clearInterval(checkInterval);
                }
            }, 500);
        });
    </script>
@endsection
