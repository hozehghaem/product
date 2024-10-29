<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\Profile\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class UserController extends Controller
{

    protected function convertPersianToEnglishNumbers($string) {
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($persianNumbers, $englishNumbers, $string);
    }

    public function login(Request $request){

        $validData = $this->validate($request, [
            'phone' => 'required|exists:users',
            'password' => 'required'
        ]);


        if (! auth()->attempt($validData)){
            $response = [
                'error' => 'شماره موبایل و یا رمز عبور نادرست است',
            ];

            return Response::json(['ok' => false,'message' => 'failed','response' => $response]);

        }

//        $date = auth::user()->updated_at;
//        if ($date <= Carbon::today()->subDays( 1 )){
//            auth()->user()->update([
//                'api_token' => ''
//            ]);
//        }

        auth()->user()->update([
            'api_token' => Str::random(100)
        ]);

        $response = [
            'api_token'=>auth()->user()->api_token,
        ];
        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }

    public function getregister(){

        $citis              = City::select('id as city_id','title as city' , 'state_id')->get()->toArray();
        $state              = State::select('id as state_id','title as state')->get()->toArray();
        $response = [
            'city' => $citis,
            'state' => $state,
        ];

        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }

    public function register(Request $request)
    {

        $user = User::wherePhone($request->input('phone'))->first();
        if ($user === null) {

            $validData = $this->validate($request, [
                'phone'     => 'required',
                'name'      => 'required|string',
                'type_id'   => 'required|string',
                'password'  => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([

                'phone'     => $validData['phone'],
                'name'      => $validData['name'],
                'password'  => bcrypt($validData['password']),
                'type_id'   => $validData['type_id'],

            ]);

            $user->update([
                'api_token' => Str::random(100)
            ]);

            $code = ActiveCode::generateCode($user);

            $user->notify(new ActiveCodeNotification($code , $validData['phone']));
            $response = [
                'token' => $user->api_token,
            ];

            return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

        }else{
            $errorResponse = [
                'error' => 'شماره موبایل قبلا ثبت شده',
            ];
            return Response::json(['ok' =>false ,'message' => 'failed','response'=>$errorResponse]);
        }
    }

    public function token(Request $request){

        $token= (int)$request->input('token');

        $status = activeCode::whereCode($token)->where('expired_at' , '>' , now())->first();

        if(! $status) {
            $errorResponse = [
                'error' => 'کد فعال سازی نادرست',
            ];
            return Response::json(['ok' =>false ,'message' => 'failed','response'=>$errorResponse]);

        }else{
            $user = User::whereId($status->user_id)->first();
            $user->activeCode()->delete();
            $user->phone_verify = 1;
            $user->api_token = Str::random(100);
            $user->update();

            $response = [
                'api_token'=>$user->api_token,
            ];

            return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

        }
    }

    public function remember(Request $request){

        $validData = $request->validate([
            'phone' => ['required', 'exists:users,phone']
        ]);

        $user = User::wherePhone($validData['phone'])->first();

        $code = ActiveCode::generateCode($user);

        $user->notify(new ActiveCodeNotification($code , $user->phone));

        $response = 'ارسال موفق ، کد مد نظر را وارد نمایید' ;

        return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);

    }

    public function recoverpass(Request $request)
    {
        $user = User::findOrfail(auth::user()->id);
        if ($request->input('password_old') != null){
            if (auth::user()->password = Hash::make($request->input('password_old'))) {
                $request->validate(['password' => 'required|string|min:8|confirmed']);
                $user->password = Hash::make($request->input('password'));
                $user->update();

                $response = 'رمز جدید با موفقیت ثبت شد' ;
            }else{
                $response = 'رمز وارد شده اشتباه است' ;
            }
        }else {
            $request->validate(['password' => 'required|string|min:8|confirmed']);
            $user->password = Hash::make($request->input('password'));
            $user->update();
            $response = 'رمز جدید با موفقیت ثبت شد' ;
        }


        return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }

    public function profile(){
        if (Auth::check()) {
            $users = User::
            leftJoin('states', 'states.id', '=', 'users.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'users.city_id')
                ->select('users.name' , 'users.email' , 'users.state_status' ,  'users.image' , 'users.phone' , 'users.phone_number' , 'users.state_id' , 'users.city_id' , 'users.address', 'users.type_id' ,
                    'states.title as state' , 'cities.title as city', 'users.lat' , 'users.lng' ,
                    DB::raw( '(CASE
            WHEN users.type_id = "1" THEN "فروشگاه و تامین کننده"
            WHEN users.type_id = "3" THEN "تعمیرگاه و خدمات فنی"
            WHEN users.type_id = "4" THEN "کاربر عادی"
            END) AS type'),
                    DB::raw( '(CASE
            WHEN users.status = "1" THEN "درحال بررسی"
            WHEN users.status = "2" THEN "تایید مدیر سیستم"
            END) AS status'))
                ->findOrfail(auth::user()->id);

            $brandnames = Offer::
            leftJoin('products', 'products.unicode', '=', 'offers.unicode_product')
                ->leftJoin('product_groups', 'product_groups.id', '=', 'offers.product_group')
                ->leftJoin('product_brand_varieties', 'product_brand_varieties.id', '=', 'offers.brand_id')
                ->leftJoin('brands', 'brands.id', '=', 'product_brand_varieties.brand_id')
                ->leftJoin('states', 'states.id', '=', 'offers.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'offers.city_id')
                ->leftJoin('statuses', 'statuses.id', '='   , 'offers.status')
                ->leftJoin('users', 'users.id', '=', 'offers.user_id')
                ->select('offers.id' , 'offers.buyorsell' , 'offers.title_offer', 'offers.product_name', 'offers.unicode_product', 'products.id as product_id', 'offers.brand_name as brand_name' ,'brands.title_fa as brand' , 'offers.brand_id as brand_id'
                    , 'product_groups.id as product_group_id' , 'product_groups.title_fa as product_group_name' , 'offers.description' , 'offers.permanent_supplier', 'offers.image1 as image'
                    , 'offers.image2', 'offers.image3', 'offers.single_price as retailprice', 'offers.price as wholesaleprice', 'offers.total as numberofsell' , 'offers.mobile' , 'offers.phone' , 'states.title as state', 'states.id as state_id'
                    , 'cities.title as city' , 'cities.id as city_id', 'offers.address', 'offers.lat', 'offers.lng', 'offers.noe', 'offers.single',
                    DB::raw( '(CASE
                        WHEN users.type_id = "1" THEN "فروشگاه"
                        WHEN users.type_id = "3" THEN "شخصی"
                        WHEN users.type_id = "4" THEN "شخصی"
                        END) AS type'),
                    DB::raw( '(CASE
                        WHEN offers.buyorsell = "sell" THEN "آگهی فروش"
                        WHEN offers.buyorsell = "buy" THEN "آگهی خرید"
                        END) AS type'), 'statuses.title as status')
                ->where('offers.user_id' , auth::user()->id)
                ->get();

            $technicals      = Technical_unit::leftjoin('markusers' , 'markusers.technical_id' , '=' , 'technical_units.id')
                ->leftjoin('states' , 'states.id' , '=' , 'technical_units.state_id')
                ->leftjoin('cities' , 'cities.id' , '=' , 'technical_units.city_id')
                ->leftJoin('statuses', 'statuses.id', '='   , 'technical_units.status')

                ->select('markusers.id as mark_id'  , 'technical_units.id'          , 'technical_units.title'       , 'technical_units.slug'    , 'technical_units.address' , 'technical_units.manager' , 'technical_units.phone'
                    ,'technical_units.image'        , 'technical_units.image2'      , 'technical_units.image3'      , 'technical_units.mobile'  , 'technical_units.website' , 'technical_units.state_id'  , 'technical_units.city_id'
                    , 'technical_units.email'       , 'technical_units.whatsapp'    , 'technical_units.autokala'    , 'technical_units.lat'     , 'technical_units.lng'     , 'technical_units.autokala', 'technical_units.description as description'
                    ,'states.title as state_name','cities.title as city_name' , 'statuses.title as status')
                ->where('technical_units.user_id'  ,'=' , auth::user()->id)
                ->get();

            $suppliers       = Supplier::leftjoin('markusers' , 'markusers.supplier_id' , '=' , 'suppliers.id')
                ->leftjoin('states' , 'states.id' , '=' , 'suppliers.state_id')
                ->leftjoin('cities' , 'cities.id' , '=' , 'suppliers.city_id')
                ->leftJoin('statuses','statuses.id', '=', 'suppliers.status')

                ->select('markusers.id as mark_id'  ,'suppliers.id'         , 'suppliers.title'         , 'suppliers.slug'          , 'suppliers.address'   , 'suppliers.manager'   , 'suppliers.image'
                    , 'suppliers.manufacturer'      , 'suppliers.importer'  , 'suppliers.whole_seller'  , 'suppliers.retail_seller' , 'suppliers.phone'     , 'suppliers.mobile'    , 'suppliers.image2' , 'suppliers.image3'
                    , 'suppliers.website'           , 'suppliers.email'     , 'suppliers.whatsapp'      , 'suppliers.lat'           , 'suppliers.lng'       , 'suppliers.state_id'  , 'suppliers.city_id' ,'suppliers.autokala'
                    ,'suppliers.description as description','states.title as state_name','cities.title as city_name','statuses.title as status')
                ->where('suppliers.user_id' , '=', auth::user()->id)
                ->get();

            $response = [
                'user'          => $users,
                'offer'         => $brandnames,
                'technicals'    => $technicals,
                'suppliers'     => $suppliers
            ];
            return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
        }else{
            $response = [
                'user' => 'شما هنوز به حساب خود وارد نشده اید'
            ];
            return Response::json(['ok' => false , 'message' => 'faild' , 'response' => $response]);
        }

    }

    public function update(Request $request){

        $user = auth::user();

        $user->name             = $request->input('name');
        $user->state_id         = $request->input('state_id');
        $user->city_id          = $request->input('city_id');
        $user->lat              = $request->input('lat');
        $user->lng              = $request->input('lng');
        $user->address          = $request->input('address');
        if ($request->file('image') != null) {
            $file = $request->file('image');
            $img = Image::make($file);
            $imagePath ="images/user/";
            $imageName = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . '.jpg';
            $user->image = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $user->update();
        $response = 'تغییرات با موفقیت انجام شد' ;

        return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }
}
