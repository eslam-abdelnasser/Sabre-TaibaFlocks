<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\GeneralSetting ; 

use DB ; 

class GeneralSettingController extends Controller
{
    
    public function index(){


	    $setting = GeneralSetting::updateOrCreate([
	    	'id'=>1 , 
	    	 
	    ]); 

	    return view('admin.general_settings.index')->withSetting($setting); 
    }

    public function update(Request $request , $id){


    	$rules = [


    		'site_url'=>'required', 
    		'site_email'=>'required', 
    		'site_description'=>'required',
            'points' => 'required',
            'review_points' => 'required',
            'address_arabic' => 'required',
            'address_english' => 'required',
            'phone' => 'required'

    	]; 

    	$this->validate($request , $rules ) ; 

    	$setting = GeneralSetting::find($id); 

    	// dd($setting); 

    	// $setting->site_url = $request->site_url ; 
    	// $setting->site_email = $request->site_email ; 
    	// $setting->site_description = $request->site_description ; 
    	// $setting->site_keywords = $request->site_keywords ; 
    	// $setting->site_google_analytics_id = $request->site_google_analytics_id ; 
    	// $setting->google_javascript_code = $request->google_javascript_code ; 


    	DB::table('general_settings') 
    			->where('id', $id )
            	->update(
		            	['site_url' => $request->site_url , 
		            	 'site_email'=> $request->site_email , 
		            	 'site_description'=> $request->site_description , 
		            	 'site_keywords'=> $request->site_keywords , 
		            	 'site_google_analytics_id'=> $request->site_google_analytics_id , 
		            	 'google_javascript_code'=> $request->google_javascript_code,
                         'points'=> $request->points,
                          'review_points' => $request->review_points,
                          'address_arabic' => $request->address_arabic,
                          'address_english' => $request->address_english,
                          'phone' => $request->phone,
                        ]);


        session()->flash('message','General Settings has been updated successfully'); 
    	return back(); 

    }
}
