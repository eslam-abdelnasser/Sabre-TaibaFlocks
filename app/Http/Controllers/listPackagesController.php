<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\CategoryDescription;
use Carbon\Carbon ;
class listPackagesController extends Controller
{
    //
    public function index($slug){

       $categoryDescription = CategoryDescription::where('slug' , '=' , urldecode($slug))->get()->first();
       $packages = Package::where([['category_id','=',$categoryDescription->category_id],['status','=','1'],['journey_start_date','>=', Carbon::now()->toDateTimeString()]])->get();

       return view('front.trips.list-packages')->withPackages($packages)->withCategory($categoryDescription->name);
    }
}
