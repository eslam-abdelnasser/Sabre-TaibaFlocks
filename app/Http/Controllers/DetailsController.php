<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageDescription;
use App\Models\Package;

use App\Models\Review ;
class DetailsController extends Controller
{
    //
    public function package($slug){


        $packageDescription = PackageDescription::where('slug','=',urldecode($slug))->get()->first();

        $package = Package::find($packageDescription->package_id);
        $reviews = Review::where(['package_id'=>$package->id, 'status'=> '1'])->get();
//        dd($package);
        $packages = Package::where(['category_id'=>$packageDescription->category_id,'status'=>'1'])->get();
        return view('front.details.package-details')->withPackage($package)->withRelatedPackages($packages)->withReviews($reviews);

    }
}
