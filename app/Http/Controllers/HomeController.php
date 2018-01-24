<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Package;
use App\Models\PackageDescription ;
use App\Third_Party\PayfortIntegration ;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


//        $x =  view('test')->render();
//
//      dd($x);

        $destination = PackageDescription::pluck('destination');
        $package_name = PackageDescription::pluck('name');

        $slider1 = Slider::find(1);
        $slider2 = Slider::find(2);
        $slider3 = Slider::find(3);
        $packages = Package::where('status','=','1')->orderBy('price','ASC')->get()->take(16);
        $packages_latest = Package::where('status','=','1')->latest()->get()->take(4);
//        dd($packages_latest);
        return view('front.index')->withSliderOne($slider1)->withSliderTwo($slider2)->withSliderThree($slider3)->withPackages($packages)->withPackagesLatest($packages_latest)->withDestination($destination)->withPackageName($package_name);
    }

    public function filterData(Request $request){

        $data = array();
        $package_des = array();
        $package_data = array();
        $package_description = new PackageDescription();
        $package = new Package();

        if ($request->has('package_name')){
            $package_des =  $package_description->where('name' , '=' , $request->package_name)->get();
        }

        if ($request->has('destination')){
            $package_des = $package_description->where('destination' , '=' ,$request->destination)->get();
        }

        if (count($package_des)&& isset($package_des)){

            foreach($package_des as $just_test){
                if (!in_array($just_test->package, $data)){
                    if (!$request->has('date_from') && !$request->has('date_from')){
                        $data[] = $just_test->package()->get();
                    }else{
                        $data[] = $just_test->package();
                    }

                }
            }
        }
//        dd($data);
        if ($request->has('date_from')){
            $date = date('Y-m-d H:i:s', strtotime($request->date_from));
            if (count($data)){
                foreach ($data as $package){
                    if (!in_array($package->where('journey_start_date' , '>=' , $date)->get(),$package_data ) && count($package->where('journey_start_date' , '>=' , $date)->get())){
                        $package_data[] = $package->where('journey_start_date' , '>=' , $date)->get();
                    }
                }
            }else{
                $package_data = $package->where('journey_start_date' , '>=' , $date)->get();
            }

            unset($data);
            $data = $package_data ;
        }


        if ($request->has('date_to')){
            $date = date('Y-m-d H:i:s', strtotime($request->date_to));
            if (count($data) || is_array($data)){
                foreach ($data as $package){
                    if (!in_array($package->where('journey_end_date' , '>=' , $date),$package_data ) && count($package->where('journey_end_date' , '>=' , $date))){
                        $package_data[] =$package->where('journey_end_date' , '>=' , $date);
                    }
                }
            }else{
                $package_data = $data->where('journey_end_date' , '>=' , $date);
            }

            unset($data) ;

            $data = $package_data ;
        }

        // if array of collection view render
        if (is_array($data)){
            return view('front.filtration.packages-collections')->withPackagees($data);

//            dd('fuck');
        }else{
            return view('front.filtration.packages')->withPackages($data);
//            dd('fuck off');
        }

//        dd($data);
//        dd($package);
        return view('front.filtration.packagers');
    }
}
