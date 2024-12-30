<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Pagemanage;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PagemanageController extends Controller
{

    public function index(Request $request)
    {
        $thispage = [
            'title'        => 'مدیریت محتوای صفحات سایت',
            'list_title'   => 'لیست محتوای صفحات سایت',
            'add_title'    => 'افزودن محتوای صفحات سایت',
            'create_title' => 'ایجاد محتوای صفحات سایت',
            'enter_title'  => 'ورود اطلاعات محتوای صفحات سایت',
            'edit_title'   => 'ویرایش اطلاعات محتوای صفحات سایت',
        ];
        $pagemanages    = Pagemanage::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('pagemanages')
                //->join('menus' , 'slides.menu_id' , '=' , 'menus.id')
                //->select('menus.title as menu' , 'slides.id', 'slides.title1', 'slides.title2', 'slides.title3', 'slides.status', 'slides.file_link')
                ->get();

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
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '"  width="100" class="img-rounded" align="center" />';
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('page-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal' . $data->id . '" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('Admin.pagemanages.all')
            ->with(compact(['menupanels', 'submenupanels', 'pagemanages', 'thispage']));
    }

    public function create()
    {
        $thispage = [
            'title'         => 'مدیریت محتوای صفحات سایت',
            'list_title'    => 'لیست محتوای صفحات سایت',
            'add_title'     => 'افزودن محتوای صفحات سایت',
            'create_title'  => 'ایجاد محتوای صفحات سایت',
            'enter_title'   => 'ورود اطلاعات محتوای صفحات سایت',
            'edit_title'    => 'ویرایش اطلاعات محتوای صفحات سایت',
        ];
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();
        $submenus       = Submenu::where('mega_manu' , '=' , 2)->get();

        return view('Admin.pagemanages.create')
            ->with(compact(['menupanels', 'submenupanels', 'thispage' , 'submenus']));
    }

    public function store(Request $request)
    {
        try {

            $pagemanages = new Pagemanage();
            $pagemanages->title         = $request->input('title');
            $pagemanages->description   = $request->input('description');
            $pagemanages->description2  = $request->input('description2');
            $pagemanages->description3  = $request->input('description3');
            $pagemanages->submenu_id    = $request->input('submenu_id');
            $pagemanages->status        = $request->input('status');
            $pagemanages->user_id       = Auth::user()->id;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath = public_path("pagemanages");
                $imagelink = "pagemanages";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $pagemanages->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            if ($request->hasfile('image2')) {
                $file = $request->file('image2');
                $imagePath = public_path("pagemanages");
                $imagelink = "pagemanages";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $pagemanages->image2 = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            if ($request->hasfile('image3')) {
                $file = $request->file('image3');
                $imagePath = public_path("pagemanages");
                $imagelink = "pagemanages";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $pagemanages->image3 = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $result = $pagemanages->save();
            if ($result == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت ثبت شد';
            } else {
                $success = false;
                $flag = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success' => $success, 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $thispage = [
            'title' => 'مدیریت محتوای صفحات سایت',
            'list_title' => 'لیست محتوای صفحات سایت',
            'add_title' => 'افزودن محتوای صفحات سایت',
            'create_title' => 'ایجاد محتوای صفحات سایت',
            'enter_title' => 'ورود اطلاعات محتوای صفحات سایت',
            'edit_title' => 'ویرایش اطلاعات محتوای صفحات سایت',
        ];
        $pagemanages = Akhbar::whereId($id)->first();
        $menupanels = Menu_panel::whereStatus(4)->get();
        $submenupanels = Submenu_panel::whereStatus(4)->get();

        return view('Admin.pagemanages.edit')
            ->with(compact(['menupanels', 'submenupanels', 'pagemanages', 'thispage']));

    }

    public function update(Request $request, $id)
    {
        try {
            $pagemanages = Pagemanage::whereId($id)->first();

            $pagemanages->title         = $request->input('title');
            $pagemanages->description   = $request->input('description');
            $pagemanages->description2  = $request->input('description2');
            $pagemanages->description3  = $request->input('description3');
            $pagemanages->submenu_id    = $request->input('submenu_id');
            $pagemanages->status        = $request->input('status');
            $pagemanages->user_id       = Auth::user()->id;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath = public_path("pagemanages");
                $imagelink = "pagemanages";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $pagemanages->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            if ($request->hasfile('image2')) {
                $file = $request->file('image2');
                $imagePath = public_path("pagemanages");
                $imagelink = "pagemanages";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $pagemanages->image2 = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            if ($request->hasfile('image3')) {
                $file = $request->file('image3');
                $imagePath = public_path("pagemanages");
                $imagelink = "pagemanages";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $pagemanages->image3 = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $result = $pagemanages->save();
            if ($result == true) {
                Alert::success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد')->autoclose(3000);
            } else {
                Alert::error('عملیات نا موفق', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
            }
        } catch (Exception $e) {
            Alert::error('خطا در ارتباط با سرور', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
        }
        return Redirect::back();
    }

    public function deletepagemanage(Request $request)
    {
        try {
            $pagemanage = Pagemanage::findOrfail($request->input('id'));
            $result = $pagemanage->delete();

            if ($result == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            } else {
                $success = false;
                $flag = 'error';
                $subject = 'عملیات ناموفق';
                $message = 'اطلاعات پاک نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag = 'error';
            $subject = 'خطا در ارتباط با سرور';
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
        }
        return response()->json(['success' => $success, 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }
}
