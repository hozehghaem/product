<?php

namespace Illuminate\Foundation\Auth;

use App\Models\Menu;
use App\Models\Submenu;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ActiveCode;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use Laravel\Socialite\Facades\Socialite;

trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('Admin.auth.login');
    }
    public function showLoginuserForm()
    {
//        if (Auth::check()){
//            return Redirect::url()->previous();
//        }
        if (Auth::check()) {
            return redirect()->intended();
        }
        //dd(intended());

        session(['url' => url()->previous()]);
        //session()->flash('url' , url()->previous());
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();

        $submenus = Submenu::select('id', 'title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();

        return view('Site.auth.login')->with(compact('menus','submenus'));
    }
    protected function convertPersianToEnglishNumbers($string) {
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($persianNumbers, $englishNumbers, $string);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginuser(Request $request)
    {
        $request->validate([
            //'phone'         => 'required|numeric',
            'email'         => 'required|email',
            'password'      => 'required|string|min:8',
            //'captcha'       => 'required|numeric|captcha|min:1',
        ]);

        //$phone      = $this->convertPersianToEnglishNumbers($request->input('phone'));
        $password   = $this->convertPersianToEnglishNumbers($request->input('password'));
        $email   = ($request->input('email'));

        if ($email  && $password) {

            $user = User::whereEmail($email)->first();
            if ($user != null) {
                if (Hash::check($password, $user->password)) {
                    Auth::loginUsingId($user->id);
                    if(Auth::check()){
                        alert()->success($user->name.' به وبسایت بستا ' , 'خوش آمدید' );
                        $url  = Session::get('url');
                        return redirect()->intended();
                    }else {
                        alert()->error('عملیات ناموفق', 'شماره موبایل و یا رمز عبور اشتباه است');
                        return Redirect::back();
                    }
                    //dd(url()->previous());
                    //return Redirect::to($url);
                    //return Redirect::route('indexfilter');
                } else {
                    alert()->error('عملیات ناموفق', 'شماره موبایل و یا رمز عبور اشتباه است');
                    return Redirect::back();
                }
            } else {
                alert()->error('عملیات ناموفق', 'شماره موبایل و یا رمز عبور اشتباه است');
                return Redirect::back();
            }
        } else {
            alert()->error('عملیات ناموفق', 'شماره موبایل و یا رمز عبور وارد نشده است');
            return Redirect::back();
        }
    }
    public function loginusermobile(Request $request)
    {
        $request->validate([
            'phone'         => 'required|numeric',
            'password'      => 'required|string|min:8',
            'captcha'       => 'required|numeric|captcha|min:1',
        ]);

        $phone      = $this->convertPersianToEnglishNumbers($request->input('phone'));
        $password   = $this->convertPersianToEnglishNumbers($request->input('password'));


        if ($phone  && $password) {
            $user = User::wherePhone($phone)->first();
            if ($user != null) {
                if (Hash::check($password, $user->password)) {
                    Auth::loginUsingId($user->id);
                    if(Auth::check()){
                        session()->flash('success', 'عملیات با موفقیت انجام شد!');
                        $url  = Session::get('url');
                        return redirect()->intended();
                    }else {
                        session()->flash('success', 'شماره موبایل و یا رمز عبور اشتباه است');
                        return Redirect::back();
                    }
                    //dd(url()->previous());
                    //return Redirect::to($url);
                    //return Redirect::route('indexfilter');
                } else {
                    session()->flash('success', 'شماره موبایل و یا رمز عبور اشتباه است');
                    return Redirect::back();
                }
            } else {
                session()->flash('success', 'شماره موبایل و یا رمز عبور اشتباه است');
                return Redirect::back();
            }
        } else {
            session()->flash('success', 'شماره موبایل و یا رمز عبور اشتباه است');
            return Redirect::back();
        }
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        try {
            $user = User::find(Auth::user()->id);
            $user->email_verify = 1;
            $user->save();
        }catch (Exception){

        }
        alert()->success($user->name.' به وبسایت ' , 'خوش آمدید' );
        $url  = Session::get('url');
        return Redirect::to(route('/'));
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::whereEmail($user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return  User::create([
            'name'          => $user->name,
            'username'      => $user->name,
            'email'         => $user->email,
            'phone'         => $user->phone,
            'image'         => $user->avatar,
            'type_id'       => 6,
            'email_verify'  => 1,
            'status'        => 4,
            'password'      => $user->id
        ]);
    }
    public function showLoginrememberForm()
    {
        return view('Site.auth.remember');
    }
    public function remember(Request $request){

        $validData = $request->validate([
            'phone'      => ['required', 'exists:users,phone'],
            'captcha'    => ['required' ,'numeric' , 'captcha' , 'min:1'],
        ]);

        $phone      = $this->convertPersianToEnglishNumbers($validData['phone']);
        $user = User::wherePhone($phone)->first();
        $user = User::find($user->id);
        $request->session()->flash('auth', [
            'user_id' => $user->id
        ]);

        $code = ActiveCode::generateCode($user);

        $user->notify(new ActiveCodeNotification($code , $user->phone));

        return redirect(route('phone.token'))->with(['phone' => $phone]);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

}
