<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\About ;
use App\Models\Review ;
use App\Models\Rate;
use Auth ;
use App\User ;
use App\Models\Question;
class GeneralController extends Controller
{
    //

    public function aboutUs(){
        $aboutUs = About::find(1);
        return view('front.about-us')->withAboutUs($aboutUs);
    }


    public function  contactUs(){
        return view('front.contact-us');
    }

    public function review(Request $request){

//        dd($request);
        $review = new Review();

        if ($request->email){
            $review->email = $request->email ;
        }else{
            $review->email = Auth::user()->email;
            $user =  User::find(Auth::user()->id);
            $user->points = Package::find(decrypt($request->package))->points ;
            $user->save();

        }
        $review->package_id = decrypt($request->package);
        $review->message = $request->message ;
        $review->status = '0';
        $review->save();

        $rate = new Rate();
        $rate->rate = $request->rating ;
        $rate->package_id = decrypt($request->package);
        $rate->save();

        session()->flash('message' , 'your review added waiting admin acceptance');
         return redirect()->back() ;



    }

    public function questions(Request $request){



        dd($request);
        $question = new Question();
    }
}
