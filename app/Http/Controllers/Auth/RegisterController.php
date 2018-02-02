<?php

namespace App\Http\Controllers\Auth;

use App\Events\CustomerLoyalty;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail ;
use Auth ;
use App\Mail\WelcomeToTaiba ;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }



     /**
     * store new user
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function register(Request $request)
    {

//        dd(ltrim($request->input('mobile_number'),0));
        $rules = [
            'first_name'=>'required',
            'last_name'=>'required',
            'name'=>'required|unique:users,username',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
            'country'=>'required',
            'city'=>'required',
            'mobile_number'=>'required',
            'street'=>'required',
        ];
        $this->validate($request , $rules);

            $user = new User();
            $user->username = $request->name ;
            $user->first_name = $request->input('first_name');
            $user->last_name   = $request->input('last_name');
            $user->email = $request->email ;
            $user->password = crypt( $request->password , '');
            $user->remember_token = str_random(12); 
            $user->city = $request->input('city');
            $user->country = $request->input('country');
            $user->street = $request->input('street');
            $user->mobile_number = $request->input('mobile_number');

            $user->save();
            event(new CustomerLoyalty($user ,70));
            session()->flash('message' , 'Registration Done Successfully'); 
         
//           Mail::send('emails.welcome', ['user' => $user ], function ($m) use ($user) {
//                $m->to($user->email, $user->username)->subject('Registration Successful');
//           });

        $phone = ltrim($request->input('mobile_number'),0);
            Mail::to(trim($request->email))->send(new WelcomeToTaiba);
            file_get_contents("http://ultramsg.com/api.php?send_sms&username=966508000653&password=123456&numbers=$phone&sender=966508000653&message=شكرا%20لتسجيلك%20معنا%20اسراب%20طيبة");
            // automatic login after registration 
            Auth::login($user);

           return redirect()->back();


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }




}
