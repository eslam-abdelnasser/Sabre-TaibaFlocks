<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageDescription;
class BookNowController extends Controller
{
    //

    public function  index($slug){

        $packageDescription = PackageDescription::where('slug','=',urldecode($slug))->get()->first();

        $package = Package::find($packageDescription->package_id);
        return view('front.book-now.user-book-now')->withPackage($package)->withSlug($packageDescription->package_id);
    }



    public function  guest($slug){

        $packageDescription = PackageDescription::where('slug','=',urldecode($slug))->get()->first();

        $package = Package::find($packageDescription->package_id);
        return view('front.book-now.guest-book-now')->withPackage($package)->withSlug($packageDescription->package_id);
    }
}
