<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth ;
use App\Models\PackageUser;
use App\Models\Option;
use App\Mail\SendEmailToregisteredUser;
use Carbon\Carbon ;
use App\Models\GeneralSetting ;
use App\Third_Party\PayfortIntegration ;
use App\Models\Payfort;
use Session;
use Curl;
class BookingController extends Controller
{


    public $payforttest;
    //

    public function __construct()
    {
        $this->payforttest = new PayfortIntegration() ;

    }
    public function index(Request $request){

        $cost = 0;
        if ($request->terms_condition == 'on'){

            // check if this user already registered to website
           if (Auth::check()){
               $rules = [
                   'choose_bank' => 'required'
               ];
               $user = User::find(Auth::user()->id);
               if ($request->points == 'yes'){
                    $general_setting = GeneralSetting::all()->first();


                    if ((int)Auth::user()->points  * $general_setting->points  > $request->total_price ){
                        $restOfPoints = round(((int)Auth::user()->points  * $general_setting->points - $request->total_price) / $general_setting->points);
                        $cost = ( (int)Auth::user()->points  * $general_setting->points) - $request->total_price  ;
                    }else{
                        $cost =  $request->total_price  - ( (int)Auth::user()->points  * $general_setting->points) ;
                        $restOfPoints = 0 ;
                    }


               }else{
                    $cost =  $request->total_price;
                   $restOfPoints = 0 ;
               }

               $user->points = $restOfPoints ;
               $user->save();
               $this->validate($request, $rules);
               $package_user = new PackageUser();
               $package_user->package_id =  decrypt($request->input('package')) ;
               $package_user->user_id = Auth::id() ;
               $package_user->booking_date = Carbon::now()->toDateTimeString();
               $package_user->status = 2 ; // unpaid
               $package_user->message = $request->message ;
               $package_user->amount = $cost ;
               $package_user->payment_method = $request->choose_bank == '1' ? 1 : 0 ;

               $package_user->save();

               $package_user->options()->attach($request->options);



           }else{

            // if this user is guest create new account and send email to him
//               dd($request);
//                dd(decrypt($request->input('package')));
               $rules = [
                   'first_name' => 'required',
                   'second_name' => 'required',
                   'email' => 'required|unique:users,email',
                   'mobile_number' => 'required',
                   'country' => 'required',
                   'city' => 'required',
               ];
               $this->validate($request, $rules);

               $user = new User;
               $user->username = $request->email;
               $user->first_name = $request->first_name;
               $user->last_name = $request->second_name;
               $user->email = $request->email;
               $user->password = crypt(trim($request->mobile_number), '');
               $user->country = $request->country;
               $user->city = $request->city;
               $user->street = $request->street;
               $user->mobile_number = $request->mobile_number;
               $user->user_type = 1 ;

               $user->save();
               Auth::guard()->attempt(['email'=>trim($request->email),'password'=> trim($request->mobile_number)] );
                //  send email and notification to user to inform him about new account and notification to change account password
//               Mail::to('test@test.com ')->send(new SendEmailToregisteredUser());



            //===========================================================================================================  package user and option scenario =======================
            // add package and user and this checkout  details with option

            $package_user = new PackageUser();
            $package_user->package_id =  decrypt($request->input('package')) ;
            $package_user->user_id = $user->id ;
            $package_user->booking_date = Carbon::now()->toDateTimeString();
            $package_user->status = 2 ; // unpaid
            $package_user->message = $request->message ;
            $package_user->amount = $request->total_price ;
            $package_user->payment_method = $request->choose_bank == '1' ? 1 : 0 ;

            $package_user->save();

            $package_user->options()->attach($request->options);

            $cost = $request->total_price ;
           }
            if($request->choose_bank == 0 ){
                return view('front.payment-method.bank-transfer');
            }else{

               $this->payforttest->setAmount((float) $cost);
               $this->payforttest->setEmail(Auth::user()->email);
               $this->payforttest->setName( Auth::user()->username);
                $merchant_data = $this->payforttest->getMerchantPageData();
                  Session::put('amount', encrypt((float) $cost));



                return view('front.payment-method.mechant_page')->withMerchantPage($merchant_data);
//                return redirect()->route('payfort');
            }
        }else{
            session()->flash('error' , 'You have to check on terms and condition');
            return redirect()->back()->withInput($request->all());
        }

    }


//    public function payfort(){
//
//        $merchant_data = $this->payforttest->getMerchantPageData();
//
//
//        return view('front.payment-method.mechant_page')->withMerchantPage($merchant_data);
//    }

    public function payfortFeedback(Request $request){

        $this->payforttest->setAmount((float) decrypt(Session::get('amount')));
        $this->payforttest->setEmail(trim(Auth::user()->email));
        $this->payforttest->setName(trim(Auth::user()->first_name));
        $result = $this->payforttest->merchantPageNotifyFort($_GET);


        return redirect($result['3ds_url']);
    }


    public function savePaymentResults(){


        $payfort = new Payfort();

        $payfort->amount = $_GET['amount'];
        $payfort->card_number = $_GET['card_number'];
        $payfort->holder_name = $_GET['card_holder_name'];
        $payfort->payment_option = $_GET['payment_option'];

        $payfort->customer_ip = $_GET['customer_ip'];
        $payfort->fort_id   = $_GET['fort_id'];
        $payfort->response_message = $_GET['response_message'];
        $payfort->customer_email =  $_GET['customer_email'];
        $payfort->customer_name =  $_GET['customer_name'];

        $payfort->save();

        return redirect()->route('get_profile') ;

    }

}
