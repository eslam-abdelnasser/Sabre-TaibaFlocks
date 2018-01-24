<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravellerHistory;
use App\Models\TravellerHistoryDescription;
class TravellerController extends Controller
{
    //
    public function index(){


        $traveller = TravellerHistory::where('status','=','1')->get();

        return view('front.traveller-experience.list')->withTraveller($traveller);
    }


    public function details($slug){

        $travellerDescription = TravellerHistoryDescription::where('slug','=',urldecode($slug))->get()->first();
        $traveller = TravellerHistory::find($travellerDescription->traveller_history_id);

        return view('front.traveller-experience.details')->withTraveller($traveller);
    }
}
