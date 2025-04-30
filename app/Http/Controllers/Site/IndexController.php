<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\sendmail;
use App\Models\Akhbar;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Contactusform;
use App\Models\Dashboard\Customer;
use App\Models\Dashboard\Pagemanage;
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
use Illuminate\Support\Str;

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
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link' , 'link')->whereMenu_id($thispage->id)->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $sessionposts   = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(2)->orderBy('id' , 'DESC')->limit(6)->get();
        $speechposts    = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(5)->orderBy('id' , 'DESC')->limit(6)->get();
        $courseposts    = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(3)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.index')->with(compact('menus','speechposts', 'courseposts','sessionposts','thispage','questions', 'flowtexts', 'companies', 'slides', 'customers', 'submenus', 'akhbars'));

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

        $submenus       = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();
        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereMenu_id($thispage->id)->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $sessionposts   = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(2)->orderBy('id' , 'DESC')->limit(6)->get();
        $speechposts    = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(5)->orderBy('id' , 'DESC')->limit(6)->get();
        $courseposts    = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(3)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.brothers')->with(compact('menus','speechposts', 'courseposts','sessionposts','thispage','questions', 'flowtexts', 'companies', 'slides', 'customers', 'submenus', 'akhbars'));

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

        $submenus       = Submenu::select('id', 'title', 'slug', 'menu_id','mega_manu' , 'megamenu_id')->whereStatus(4)->get();
        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link', 'link')->whereMenu_id($thispage->id)->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $sessionposts   = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(2)->orderBy('id' , 'DESC')->limit(6)->get();
        $speechposts    = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $courseposts    = Post::whereStatus(4)->whereHome_show(1)->wherePosttype(3)->orderBy('id' , 'DESC')->limit(6)->get();
        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.sisters')->with(compact('menus','speechposts', 'courseposts','sessionposts','thispage','questions', 'flowtexts', 'companies', 'slides', 'customers', 'submenus', 'akhbars'));

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
        $pagename = Submenu::select('class' , 'id')->whereSlug($slug)->first();

        $companies      = Company::first();
        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->orderBy('id' , 'DESC')->get();
        $contents       = Pagemanage::where('submenu_id' , '=', $pagename->id)->first();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.matn as matn', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();

        return view('Site.'.$pagename->class)->with(compact('menus', 'thispage', 'companies', 'slides','contents', 'customers', 'submenus', 'posts', 'akhbars'));

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
        }elseif(count($url) == 4){
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

    public function singlekindergarten(Request $request , $slug)
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
//        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
//        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereSlug($slug)->first();
//        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
//        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();

        return view('Site.single-kindergarten')->with(compact('menus', 'thispage', 'companies', 'submenus', 'posts'));

    }

    public function singlelibrary(Request $request , $slug)
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
//        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
//        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereSlug($slug)->first();
//        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
//        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();

        return view('Site.single-library')->with(compact('menus', 'thispage', 'companies', 'submenus', 'posts'));

    }

    public function singlemahdia(Request $request , $slug)
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
//        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
//        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereSlug($slug)->first();
//        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
//        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();

        return view('Site.single-mahdia')->with(compact('menus', 'thispage', 'companies', 'submenus', 'posts'));

    }

    public function singlespeech(Request $request , $slug)
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
//        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
//        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereSlug($slug)->first();
//        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
//        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();

        return view('Site.single-speech')->with(compact('menus', 'thispage', 'companies', 'submenus', 'posts'));

    }

    public function singlenews(Request $request , $slug)
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
//        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
//        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereSlug($slug)->first();
//        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
//        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();

        return view('Site.single-news')->with(compact('menus', 'thispage', 'companies', 'submenus', 'posts'));
    }

    public function singleseat(Request $request , $slug)
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
//        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
//        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereSlug($slug)->first();
//        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
//        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();

        return view('Site.single-seat')->with(compact('menus', 'thispage', 'companies', 'submenus', 'posts'));
    }
    public function singleneshast(Request $request , $slug)
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
//        $slides         = Slide::select('id' , 'title1' , 'text', 'file_link')->whereStatus(4)->get();
//        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereSlug($slug)->first();
//        $questions      = Questionlist::whereStatus(4)->orderBy('id' , 'DESC')->limit(6)->get();
//        $flowtexts      = Flowtext::whereStatus(4)->limit(6)->get();

        return view('Site.single-meeting')->with(compact('menus', 'thispage', 'companies', 'submenus', 'posts'));
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

public function Contactusform(Request $request)
{
    try{
        $contacts = new Contactusform();

        $contacts->name        = $request->input('name');
        $contacts->email       = $request->input('email');
        $contacts->phone_number= $request->input('phone_number');
        $contacts->msg_subject = $request->input('msg_subject');
        $contacts->message     = $request->input('message');
        $result                = $contacts->save();

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
}
