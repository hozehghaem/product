<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Flowtext;
use App\Models\Menu;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class FlowtextController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت متن روان سایت',
            'list_title'    => 'لیست متن روان سایت',
            'add_title'     => 'افزودن متن روان سایت',
            'create_title'  => 'ایجاد متن روان سایت',
            'enter_title'   => 'ورود اطلاعات متن روان سایت',
        ];
        $menus          = Menu::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Flowtext::select('id', 'matn', 'status', 'priority')
                ->orderBy('priority')->get();

            return Datatables::of($data)
                ->addColumn('matn', function ($data) {
                    return ($data->matn);
                })
                ->addColumn('priority', function ($data) {
                    return ($data->priority);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('flowtext-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.flowtexts.all')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت متن روان سایت',
            'list_title'    => 'لیست متن روان سایت',
            'add_title'     => 'افزودن متن روان سایت',
            'create_title'  => 'ایجاد متن روان سایت',
            'enter_title'   => 'ورود اطلاعات متن روان سایت',
        ];
        $typeusers      = TypeUser::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();


        return view('Admin.flowtexts.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage' , 'typeusers']));
    }

    public function store(Request $request)
    {
//dd(json_encode($request->input('userlevel')));
        try{
            $flowtextcount = Flowtext::orderBy('priority' , 'DESC')->first('priority');

            $flowtext = new Flowtext();

            $flowtext->matn            = $request->input('matn');
            $flowtext->status           = 4;
            $flowtext->priority         = $flowtextcount['priority'] + 1;
            $flowtext->user_id          = Auth::user()->id;

            $result = $flowtext->save();
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
        $typeusers          = TypeUser::where('id' , '>=', 2)->get();
        $flowtexts          = Flowtext::whereId($id)->first();
        $idmenus            = Menu::pluck('priority')->toArray();
        $priorities         = Menu::count();
        $s                  = $priorities + 5;
        $values             = range(1, $s);
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.flowtexts.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'flowtexts' , 'typeusers' , 'values' , 'idmenus']));

    }

    public function update(Request $request , $id)
    {

        $flowtexts = Flowtext::findOrfail($id);
        $flowtexts->matn             = $request->input('matn');
        $flowtexts->status           = $request->input('status');

        $result = $flowtexts->update();
        try{
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
    public function deletemenus(Request $request)
    {
        try {
            $flowtexts = Flowtext::findOrfail($request->input('id'));
            $result = $flowtexts->delete();
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
