<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\sendmail;
use App\Models\Akhbar;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Dashboard\Customer;
use App\Models\Dashboard\Questionlist;
use App\Models\Dashboard\Slide;
use App\Models\Emploee;
use App\Models\mega_menu;
use App\Models\Menu;
use App\Models\Dashboard\Post;
use App\Models\Profile\Workshop;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class IndexController extends Controller
{
    public function sendmail(){

        $data = ['name' => 'John Doe'];

        Mail::to('hosseindbk@yahoo.com')->send(new sendmail($data));

        return 'Email sent successfully!';
        // Artisan::call('storage:link');
         //return view('Demo.index');
    }

    public function index(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.index')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function brothers(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.brothers')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function sisters(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.sisters')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function journal(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function loaninstitute(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.loan-institute')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function charity(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.charity')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function publishingcenter(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.publishingcenter')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function about(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.about')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function contact(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.contact')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function education(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.education')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function research(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.research')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function cultural(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.cultural')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function library(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.library')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function mahdia(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.mahdia')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function kindergarten(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.kindergarten')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

}
