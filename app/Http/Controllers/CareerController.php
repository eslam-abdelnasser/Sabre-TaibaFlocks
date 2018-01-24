<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerDescription;
class CareerController extends Controller
{
    //
    public function index(){


        $career = Career::where('status','=','1')->get();

        return view('front.careers.list')->withCareer($career);
    }


    public function details($slug){

        $careerDescription = CareerDescription::where('slug','=',urldecode($slug))->get()->first();
        $career = Career::find($careerDescription->career_id);

        return view('front.careers.details')->withCareer($career);
    }
}
