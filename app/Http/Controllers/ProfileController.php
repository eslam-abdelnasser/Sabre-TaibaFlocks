<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contry; 
use App\Models\City; 
use App\Models\Language ; 
use App\Models\PackageDescription;
use App\Models\Ticket;
use LaravelLocalization ; 
use Lang ; 
use Carbon\Carbon ;
use Auth;

class ProfileController extends Controller
{
    public $language ;

    public function __construct(){
        $this->middleware('auth'); 
      
    }

    public function profile()
    {
// dd(Auth::user()->notifications );
        $default_locale  = Lang::getLocale() ;
        $language = Language::where(['label'=>$default_locale])->first(); 



        $user = Auth::user();  



        $packages = $user->packages()->where('package_user.status' , '!=' , 3)->get();
       $packages_incoming =  $user->packages()->where([['package_user.status' , '!=' , 3],['journey_start_date','>=', Carbon::now()->toDateTimeString()]])->get();

//       dd($packages_incoming);

        // we are using 2 for canceld  --- 1=>paid 2=>not paid 3=>canceld
        // i used package_user.status not status directely to avoid ambiguous between packages and package user table  .
        $canceld_packages = $user->packages()->where(['package_user.status'=>3])->get();
        // dd($canceld_packages);
      


        $countries = Contry::all(); 
        $cities = City::all(); 

        // we need to fetch all user packages that he booked as following  : 
        // this senario applies to registered users only 
        /**
        *  up coming trips 
        *  previous trips 
        * canceld trips  
        */

        /**
         * get all tickets related to this user 
         */
        $tickets = Ticket::where(['user_id'=>Auth::Id()])->get();


        return view('front.profile',compact('user','countries','cities','packages','language','canceld_packages','tickets','packages_incoming'));
    }

    public function postProfile(Request $request)
    {
    	// find logged in user 
    	$user = Auth::user(); 

    	$id = $user->id; 

    	// dd($request->all());

    	// post updates to this user profile 
    	$rules = [

    		'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'sometimes|confirmed',

    	]; 

    	$this->validate($request, $rules); 

    	$user->username = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if(!empty($request->password)){

        	$user->password = crypt($request->password, '');
        	
        }
        $user->country = $request->country;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->mobile_number = $request->mobile_number;
        $user->user_type = 0;

        $user->save(); 

        session()->flash('message','Profile has been updated successfully');

        return back(); 


        
    }


    public function postTicket(Request $request )
    {
        // rules to be applied on ticket form  
        $rules = [

            'ticket_name' => 'required',
            'ticket_email' => 'required' , 
            'message' => 'required',
            'department'=>'required'

        ]; 
        $this->validate($request,$rules); 

        // store this ticket  : 
        $ticket = new Ticket ; 
        $ticket->name = $request->ticket_name ; 
        $ticket->email = $request->ticket_email ; 
        $ticket->message = $request->message ; 
        $ticket->department = $request->department ; 
        $ticket->status = 0  ; 
        $ticket->user_id = Auth::Id()  ; 
        $ticket->save(); 

        session()->flash('message','your ticket has been submitted successfully , waiting action to be taken from the spcializied department');

        return back(); 
    }
}
