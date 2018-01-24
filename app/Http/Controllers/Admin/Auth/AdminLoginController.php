<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){

        return view('admin.auth.login');
    }

    public function login(Request $request){

        //validate form data
        $this->validate($request,[
            'email'=>'required|email',
            'password' => 'required|min:6'

        ]);

        // attempt to log the user in
        if (Auth::guard('admin')->attempt(['email'=>trim($request->email),'password'=> trim($request->password )],$request->remember )){
            # code if true
            // if successful so redirect to their intend location

            return redirect()->intended(route('admin.dashboard'));
        }

        // if not successful redirect to the login with the form data

        return redirect()->back()->withInput($request->only('email','remember'));

    }
}
