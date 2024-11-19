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
use App\Models\Flowtext;
use App\Models\mega_menu;
use App\Models\Menu;
use App\Models\Dashboard\Post;
use App\Models\Post_type;
use App\Models\Profile\Workshop;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class IndexController extends Controller
{
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

        $submenus       = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();
        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage->id)->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.index')->with(compact('menus', 'thispage','questions', 'flowtexts', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage->id)->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.brothers')->with(compact('menus', 'thispage','flowtexts', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));
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

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();
        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage->id)->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.sisters')->with(compact('menus', 'thispage','questions', 'flowtexts','companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function subpage(Request $request , $slug)
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

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();
        $pagename = Submenu::select('class')->whereSlug($slug)->first();
        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.'.$pagename->class)->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function singlemeeting(Request $request , $slug)
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

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();
        if (count($url) == 3) {
            $pagename = Submenu::select('class')->whereSlug($url[2])->first();
        }elseif(count($url) == 2){
            $pagename = Submenu::select('class')->whereSlug($url[1])->first();
        }
        elseif(count($url) == 4){
            $pagename = Submenu::select('class')->whereSlug($url[1])->first();
        }
        $companies      = Company::first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $singleposts    = Post::whereStatus(4)->whereSlug($slug)->first();
        $posts          = Post::whereStatus(4)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.'.$pagename->class)->with(compact('menus', 'thispage', 'companies', 'customers', 'submenus', 'posts','singleposts', 'akhbars'));

    }

    public function singlepage(Request $request ,$harchi, $slug)
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

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();
        $pagename = Submenu::select('class')->whereSlug($url[2])->first();
        $companies = Company::first();
        $customers = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts     = Post::whereStatus(4)->whereSlug($slug)->first();
        $postpage  = Post_type::whereId($posts->posttype)->first();
        return view('Site.'.$postpage->class)->with(compact('menus', 'thispage', 'companies', 'customers', 'submenus', 'posts'));

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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function classlevel(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));
    }

    public function AcceptandSelect(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function classcontent(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function scopexam(Request $request)
    {
        dd('salam');
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.single-meeting')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function seat(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function meeting(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->paginate(6);
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.meeting')->with(compact('menus', 'thispage', 'companies', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function workshop(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.meeting')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function article(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function conference(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function scientific(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function classcenter(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function promotional(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.journal')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

    public function course(Request $request)
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
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

       $submenus = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions          = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.kindergarten')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'posts', 'akhbars'));

    }

}
