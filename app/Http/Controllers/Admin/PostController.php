<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Post;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Post_type;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت مدیا',
            'list_title'    => 'لیست مدیا',
            'add_title'     => 'افزودن مدیا',
            'create_title'  => 'ایجاد مدیا',
            'enter_title'   => 'ورود اطلاعات مدیا',
            'edit_title'    => 'ویرایش اطلاعات مدیا',
        ];
        $posts        =   Post::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('posts')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('description', function ($data) {
                    return ($data->description);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '"  width="100" class="img-rounded" align="center" />';
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('post-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action' , 'image'])
                ->make(true);
        }

        return view('Admin.posts.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'posts' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت مدیا',
            'list_title'    => 'لیست مدیا',
            'add_title'     => 'افزودن مدیا',
            'create_title'  => 'ایجاد مدیا',
            'enter_title'   => 'ورود اطلاعات مدیا',
            'edit_title'    => 'ویرایش اطلاعات مدیا',
        ];
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();
        $posttypes          =   Post_type::whereStatus(4)->get();

        return view('Admin.posts.create')
            ->with(compact(['menupanels' , 'submenupanels','posttypes' , 'thispage']));
    }

    public function store(Request $request)
    {
        try{

            $post = new Post();
            $post->title       = $request->input('title');
            $post->posttype    = $request->input('posttype');
            $post->status      = $request->input('status');
            $post->home_show   = $request->input('home_show');
            if($request->input('keyword')) {
                $post->keyword = json_encode(explode("،", $request->input('keyword')));
            }
            $post->aparat      = $request->input('aparat');
            $post->date        = $request->input('date');
            $post->writer      = $request->input('writer');
            $post->description = $request->input('text');
            $post->user_id     = Auth::user()->id;

            $id = md5(random_int(10 , 999999));

            if ($request->file('file')) {
                $file           = $request->file('file');
                $imagePath      = "posts/$id";
                $imageName      = Str::random(30).".".$file->clientExtension();
                $post->file     = 'posts/'.$id.'/'.$imageName;
                $file->move($imagePath, $imageName);
            }
            if ($request->file('voice')) {
                $file           = $request->file('voice');
                $imagePath      = "posts/$id";
                $imageName      = Str::random(30).".".$file->clientExtension();
                $post->voice    = 'posts/'.$id.'/'.$imageName;
                $file->move($imagePath, $imageName);
            }
            if ($request->file('pdf')) {
                $file           = $request->file('pdf');
                $imagePath      = "posts/$id";
                $imageName      = Str::random(30).".".$file->clientExtension();
                $post->pdf      = 'posts/'.$id.'/'.$imageName;
                $file->move($imagePath, $imageName);
            }
            if ($request->hasFile('image')) {
                $cover          = $request->file('image');
                $imagePath      = "posts/$id";
                $imageName      = md5(uniqid(rand(), true)) .'.'. $cover->clientExtension();
                $post->image    = 'posts/'.$id.'/'.$imageName;
                $cover->move($imagePath, $imageName);
            }
            $result = $post->save();

            if ($result == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت ثبت شد';
            }
            else {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return Redirect::back();
    }

    public function edit($id)
    {
        $thispage       = [
            'title'         => 'مدیریت مدیا',
            'list_title'    => 'لیست مدیا',
            'add_title'     => 'افزودن مدیا',
            'create_title'  => 'ایجاد مدیا',
            'enter_title'   => 'ورود اطلاعات مدیا',
            'edit_title'    => 'ویرایش اطلاعات مدیا',
        ];
        $posts            =   Post::whereId($id)->first();
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();
        $posttypes          =   Post_type::whereStatus(4)->get();

        return view('Admin.posts.edit')
            ->with(compact(['menupanels' , 'submenupanels'  ,'posttypes' , 'posts' , 'thispage']));

    }

    public function update(Request $request, $id)
    {
        try {
            $post = Post::whereId($id)->first();
            $post->title       = $request->input('title');
            $post->posttype    = $request->input('posttype');
            $post->status      = $request->input('status');
            $post->home_show   = $request->input('home_show');
            if($request->input('keyword')) {
                $post->keyword = json_encode(explode("،", $request->input('keyword')));
            }
            $post->aparat      = $request->input('aparat');
            $post->date        = $request->input('date');
            $post->writer      = $request->input('writer');
            $post->description = $request->input('text');
            $post->user_id     = Auth::user()->id;

            $id = md5(random_int(10 , 999999));

            if ($request->file('file')) {
                $file           = $request->file('file');
                $imagePath      = "posts/$id";
                $imageName      = Str::random(30).".".$file->clientExtension();
                $post->file     = 'posts/'.$id.'/'.$imageName;
                $file->move($imagePath, $imageName);
            }
            if ($request->file('voice')) {
                $file           = $request->file('voice');
                $imagePath      = "posts/$id";
                $imageName      = Str::random(30).".".$file->clientExtension();
                $post->voice    = 'posts/'.$id.'/'.$imageName;
                $file->move($imagePath, $imageName);
            }
            if ($request->file('pdf')) {
                $file           = $request->file('pdf');
                $imagePath      = "posts/$id";
                $imageName      = Str::random(30).".".$file->clientExtension();
                $post->pdf      = 'posts/'.$id.'/'.$imageName;
                $file->move($imagePath, $imageName);
            }
            if ($request->hasFile('image')) {
                $cover          = $request->file('image');
                $imagePath      = "posts/$id";
                $imageName      = md5(uniqid(rand(), true)) .'.'. $cover->clientExtension();
                $post->image    = 'posts/'.$id.'/'.$imageName;
                $cover->move($imagePath, $imageName);
            }
            $result = $post->save();
            if ($result == true) {
                Alert::success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد')->autoclose(3000);
            }
            else {
                Alert::error('عملیات نا موفق', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
            }
        } catch (Exception $e) {
            Alert::error('خطا در ارتباط با سرور', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
        }
        return Redirect::back();
    }

    public function deletepost(Request $request)
    {
        try{
            $post = Post::findOrfail($request->input('id'));
            $result = $post->delete();

            if ($result == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            }else{
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات ناموفق';
                $message = 'اطلاعات پاک نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
        }
        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }
}
