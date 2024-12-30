@extends('Admin.admin')
@section('title')
    <title>{{$thispage['title']}}</title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
@endsection
@section('main')

    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['enter_title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route(request()->segment(2).'.'.'store')}}" method="POST" enctype="multipart/form-data" id="form">
                                    <div class="row row-sm">
                                        @csrf
                                        <div class="col-md-12">
{{--                                            @include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان محتوا </p>
                                                <input type="text" name="title" id="title" placeholder="عنوان " class="form-control" />
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
                                                    <option value="4" >فعال</option>
                                                    <option value="0" >غیر فعال</option>
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
                                                <input type="file" name="image" id="image" class="dropify" data-height="200">
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
                                                <textarea name="text" id="editor" cols="30" rows="5" class="form-control" ></textarea>
                                            </div>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="col-md-3">
                                            <div class="form-group" style="position: absolute;">
                                                <p class="mg-b-10">تصویر متن بخش دوم </p>
                                                <input type="file" name="image2" id="image2" class="dropify" data-height="200">
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
                                                <textarea name="text2" id="editor2" cols="30" rows="5" class="form-control" ></textarea>
                                            </div>
                                        </div>

                                        <br>
                                        <br>

                                        <div class="col-md-3">
                                            <div class="form-group" style="position: absolute;">
                                                <p class="mg-b-10">تصویر متن بخش سوم </p>
                                                <input type="file" name="image3" id="image3" class="dropify" data-height="200">
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
                                                <textarea name="text3" id="editor3" cols="30" rows="5" class="form-control" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mg-b-10 text-center">
                                            <div class="form-group">
                                                <button type="button" id="submit" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
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
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
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
        jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    contentType : false,
                    processData : false,
                });

                let description = CKEDITOR.instances.editor.getData();
                let description2 = CKEDITOR.instances.editor2.getData();
                let description3 = CKEDITOR.instances.editor3.getData();


                let    _token       = jQuery('input[name="_token"]').val();
                let    title        = jQuery('#title').val();
                let    submenu_id   = jQuery('#submenu_id').val();
                let    status       = jQuery('#status').val();
                let    image        = jQuery('#image')[0].files[0];
                let    image2       = jQuery('#image2')[0].files[0];
                let    image3       = jQuery('#image3')[0].files[0];
                let    file         = jQuery('#file')[0].files[0];

                let formData = new FormData();
                formData.append('title'         , title);
                formData.append('status'        , status);
                formData.append('submenu_id'    , submenu_id);
                formData.append('description'   , description);
                formData.append('description2'   , description2);
                formData.append('description3'   , description3);
                formData.append('image'         , image);
                formData.append('image2'        , image2);
                formData.append('image3'        , image3);
                formData.append('file'          , file);
                formData.append('_token'        , _token);

                swal({
                        title: "Are you sure to delete this  of ?",
                        text: "Delete Confirmation?",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Delete",
                        closeOnConfirm: false
                    },
                    jQuery.ajax({
                        url: "{{route(request()->segment(2).'.'.'store')}}",
                        method: 'POST',
                        data: formData,

                        success: function (data) {
                            if(data.success == true){
                                swal(data.subject, data.message, data.flag);
                                $('#form')[0].reset();
                            } else {
                                swal(data.subject, data.message, data.flag);
                            }
                        },
                    }));
            });
        });
    </script>
    <script>
        window.addEventListener("load", function () {
            const checkInterval = setInterval(function () {
                const notificationsArea = document.querySelector("#cke_notifications_area_editor");

                if (notificationsArea) {
                    // پنهان کردن عنصر
                    notificationsArea.style.display = "none";
                    console.log("عنصر 'cke_notifications_area' پیدا و پنهان شد.");
                    clearInterval(checkInterval); // تایمر متوقف می‌شود
                }
            }, 500); // هر 500 میلی‌ثانیه بررسی می‌کند
        });

        window.addEventListener("load", function () {
            const checkInterval = setInterval(function () {
                const notificationsArea = document.querySelector("#cke_notifications_area_editor2");

                if (notificationsArea) {
                    // پنهان کردن عنصر
                    notificationsArea.style.display = "none";
                    console.log("عنصر 'cke_notifications_area' پیدا و پنهان شد.");
                    clearInterval(checkInterval); // تایمر متوقف می‌شود
                }
            }, 500); // هر 500 میلی‌ثانیه بررسی می‌کند
        });
        window.addEventListener("load", function () {
            const checkInterval = setInterval(function () {
                const notificationsArea = document.querySelector("#cke_notifications_area_editor3");

                if (notificationsArea) {
                    // پنهان کردن عنصر
                    notificationsArea.style.display = "none";
                    console.log("عنصر 'cke_notifications_area' پیدا و پنهان شد.");
                    clearInterval(checkInterval); // تایمر متوقف می‌شود
                }
            }, 500); // هر 500 میلی‌ثانیه بررسی می‌کند
        });

    </script>

@endsection
