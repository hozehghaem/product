<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CustomertypeRequest;
use App\Models\Dashboard\Customertype;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CustomertypeController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت نوع کاربران',
            'list_title'    => 'لیست نوع کاربران',
            'add_title'     => 'افزودن نوع کاربران',
            'create_title'  => 'ایجاد نوع کاربران',
            'edit_title'    => 'ویرایش نوع کاربران',
            'enter_title'   => 'ورود اطلاعات نوع کاربران',
        ];
        $customertypes  =   Customertype::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('type_users')->where('id' , '>=' , 4)->get();
                //->join('menus' , 'slides.menu_id' , '=' , 'menus.id')
                //->select('menus.title as menu' , 'slides.id', 'slides.title1', 'slides.title2', 'slides.title3', 'slides.status', 'slides.file_link')


            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('title_fa', function ($data) {
                    return ($data->title_fa);
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('customer-type-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.customertypes.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'customertypes' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت نوع کاربران',
            'list_title'    => 'لیست نوع کاربران',
            'add_title'     => 'افزودن نوع کاربران',
            'create_title'  => 'ایجاد نوع کاربران',
            'edit_title'    => 'ویرایش نوع کاربران',
            'enter_title'   => 'ورود اطلاعات نوع کاربران',
        ];
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.customertypes.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage']));
    }

    public function store(Request $request)
    {
        try{
            $customertypes = new TypeUser();
            $customertypes->title        = $request->input('title');
            $customertypes->title_fa     = $request->input('title_fa');

            $result = $customertypes->save();

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

        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }

    public function edit($id)
    {
        $thispage       = [
            'title'         => 'مدیریت نوع کاربران',
            'list_title'    => 'لیست نوع کاربران',
            'add_title'     => 'افزودن نوع کاربران',
            'create_title'  => 'ایجاد نوع کاربران',
            'edit_title'    => 'ویرایش نوع کاربران',
            'enter_title'   => 'ورود اطلاعات نوع کاربران',
        ];
        $customertypes  =   TypeUser::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.customertypes.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'customertypes' , 'thispage']));

    }

    public function update(CustomertypeRequest $request)
    {
        try {
                $customer = TypeUser::findOrfail($request->input('customer_id'));
                $customer->title                 = $request->input('title');
                $customer->title_fa              = $request->input('title_fa');

                $result = $customer->save();

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

    public function deletecustomertypes(Request $request)
    {
        try {

            $customertype = TypeUser::findOrfail($request->input('id'));
            $result1 = $customertype->delete();
            if ($result1 == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';

            }else {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات منو ثبت نشد، لطفا مجددا تلاش نمایید';
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
